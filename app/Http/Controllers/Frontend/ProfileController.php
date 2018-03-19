<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AsoyaracuyController;
use App\Payment;
use Auth;
use PDF;
use Validator;
use JsValidator;


class ProfileController extends AsoyaracuyController
{

	// Validation rules
	protected $profileValidationRules=[
		'email' 				=> 'required|email',
		'phone' 				=> 'required',
	];
    
    protected $passwordValidationRules=[
        'password'                 => 'required',
        'passwordConfirmation'     => 'same:password',
    ];
    
    public function index()
    {
    	// Get payments
		$payments = Payment::where('user_id', Auth::id())->get();

		// Create client side validator
		// $validator = JsValidator::make($this->validationRules, [], [], '#update-profile-form');

		// Show view
		return $this->view('pages.frontend.profile.index')
			->with('payments', $payments)
			// ->with('validator', $validator)
		;
    }

    public function update(Request $request)
	{
  //       // Validate
  //       $validation = Validator::make($request->all(),$this->profileValidationRules);
  //       if($validation->fails()){
    
  //           return redirect()->back()->withInput()->withErrors($validation->messages());
  //       }
  //       // dump('entre');die;
        
		// $user = Auth::user();

		// $user->email = $request->get('email');
		// $user->phone = $request->get('phone');
		
		// if($request->get('password') ) {
		// 	$user->password = bcrypt($request->get('password'));
  //       }

		// $user->save();
        
         // $id = $request->get('id');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'phone' => 'required'
            ]);

        if($validator->fails()){
            return redirect(route('profile'))->withInput()->withErrors($validator);
        }

        $user = Auth::user();
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        $user->save();
		return redirect(route('profile'));
	}
    
    public function editPassword() {
        $user = Auth::user();
        return $this->view('pages.frontend.profile.update-password')
            ->with('user',$user)
            ;
    }
    
    public function updatePassword(Request $request)
    {
        // Validate
        $validation = Validator::make($request->all(),$this->passwordValidationRules);
        if($validation->fails()){
    
            return redirect()->back()->withInput()->withErrors($validation->messages());
        }
        // dump('entre');die;
        
        $user = Auth::user();
        
        $user->password = bcrypt($request->get('password'));

        $user->save();
        return redirect(route('profile'));
    }
	
    

}
