<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\SpecialFee;
use App\Payment;
use Validator;

class UserController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        
        $users = User::where('status','ENABLED')->get();
            
        return $this->view('pages.backend.users.index')
            ->with('users',$users)
        ;
    }

    public function filteredUsers(Request $request) {
        $filter = $request->get('filter');
        switch ($filter) {
            case 'debtors':
                $users = User::where('status','ENABLED')
                    ->where('balance','<',0)
                    ->get()
                    ;
                break;
            
            default:
        }
        return $this->view('pages.backend.users.index')
            ->with('users',$users)
        ;
    }


    public function create()
    {
        return $this->view('pages.backend.users.create');
    }
    
  
    
    public function detail($id) {
        
        $user = User::find($id);
        $specialFee = SpecialFee::where('user_id',$id)->where('status','ENABLED')->first();

        return $this->view('pages.backend.users.detail')
            ->with('user',$user)
            ->with('specialFee',$specialFee)
        ;
    }
    
    public function store(Request $request)
    {

        $response = "";
        $validation = Validator::make($request->all(),[
            'house' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validation->fails()){
    
            return redirect()->back()->withInput()->withErrors($validation->messages());
        }
        
        // Create user
        User::create([
            'balance' => 0,
            'email' => $request->get('email'),
            'house' => $request->get('house'),
            'password' => bcrypt($request->get('password')),
            'phone' => $request->get('phone'),
            'status' => 'ENABLED',
            'role' => $request->get('role'),
        ]);
        // Store Audit
        $role = '';
        if($request->get('role') == 'USER')
            $role = 'Usuarios';
        else if ($request->get('role') == 'DIRECTIVE') 
            $role = 'Directivo';
        else if($request->get('role') == 'ADMIN')
            $role = 'Administrador';
        }
        $this->storeAudit('Crear usuario', 'Usuario creado ' . $request->get('house') . ' con rol '. $role, $request->ip());

        // Create reponse
        $response = 'Usuario creado exitosamente';
        /*
         $Autorid = Auth::id();
         $action = 'Crear Usuario';
         $value = $user->house;
         $this->setHistory($Autorid,$action,$value);*/
    
        return redirect()->route('admin/users')
            ->with('response', $response)
        ;
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $specialFee = SpecialFee::where('user_id',$id)->first();
        
        return $this->view('pages.backend.users.update')
            ->with('user',$user)
            ->with('specialFee',$specialFee)
        ;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');

        $validator = Validator::make($request->all(), [
            'house' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
            'phone' => 'required'
            ]);

        if($validator->fails()){
            return redirect(route('admin/users/edit/',$id))->withInput()->withErrors($validator);
        }

        $user = User::find($id);
        $user->house = $request->get('house');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->role = $request->get('role');
        $user->balance = $request->get('balance');  
        if($request->get('password') != null){
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();
        // dump($request->get('hasSpecialFee'));die;
        if($request->get('hasSpecialFee') == 'on'){
            $specialFeeValidator = Validator::make($request->all(), [
            'amount' => 'numeric'
             ]);
            if($specialFeeValidator->fails()){
                // dump($validator);die;
                return redirect(route('admin/users/edit/',$id))->withInput()->withErrors($specialFeeValidator);
            }

            $specialFeeOld = SpecialFee::where('user_id',$id)->first();
            if($specialFeeOld != null){
                $specialFeeOld->status = 'DISABLED';
                $specialFeeOld->save();
            }
            $specialFee = new SpecialFee();
            $specialFee->user_id = $id;
            $specialFee->amount = $request->get('amount');
            $specialFee->status = 'ENABLED';
            $specialFee->save();
        }

        return redirect(route('admin/users'))
            ->with('message','Usuario editado exitosamente')
        ;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->house = '[DISABLED-'.date('Y-m-d H:i:s').']'.$user->house;
        $user->email = '[DISABLED-'.date('Y-m-d H:i:s').']'.$user->email;
        $user->status = 'DISABLED';
        $user->save();
        $payments = Payment::getPaymentsFromUser($user->id);
        $specialFee = SpecialFee::where('user_id',$id)->where('status','ENABLED');
        if($specialFee != null){
            $specialFee->user_status = 'DISABLED';
            // $specialFee->save();
        }
        foreach($payments as $payment){
            $payment->user_status = 'DISABLED';
            $payment->save();
        }
        return redirect(route('admin/users'));
    }

    public function signout(){

        Auth::logout();
        return redirect()->guest('login');
    }
}
