<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;
use App\SpecialFee;
use App\Fee;

class FeeController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	

		$fee = Fee::where('status','ENABLED')->first();
        		
        // Show view
    	return $this->view('pages.backend.fee.index')
    		->with('fee',$fee)
		;
    }

    public function store(Request $request) {
        $user = Auth::user();
        $id = $request->input('user_id');
        $oldFee = Fee::where('status','ENABLED')->first();
        if($oldFee != null){
            $oldFee->status = 'DISABLED';
            $oldFee->save();    
        }
        $fee = new Fee();
        $fee->amount = $request->input('amount');
        $fee->status = "ENABLED";
        $fee->save();
   
        return redirect(route('admin/fees'));
    }

    public function collect(){
        $loggedUser = Auth::user();
        $fee = Fee::where('status','ENABLED')->first();
        $specialFees = SpecialFee::where('status','ENABLED');
        $users = User::where('role','USER')->get();
        foreach($users as $user){
            $amount = $fee->amount;
            foreach($specialFees as $specialFee){
                if($specialFee->user_id == $user->id){
                    $amount = $specialFee->amount;
                }
            }

            $user->balance = $user->balance - $amount;
            $user->save();
        }   
        $fee->last_collection = date('Y-m-d');
        $fee->save();
        return $this->view('pages.backend.fee.index')
            ->with('fee',$fee)
        ;
    }
}    
