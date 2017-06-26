<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AsoyaracuyController;
use App\Payment;
use Auth;
use PDF;
use JsValidator;


class ProfileController extends AsoyaracuyController
{

	// Validation rules
	protected $validationRules=[
		'email' 				=> 'required|email',
		'phone' 				=> 'required',
		'passwordConfirmation' 	=> 'required_with:password|same:password'
	];

    public function index()
    {
    	// Get payments
		$payments = Payment::where('user_id', Auth::id())->get();

		// Create client side validator
		$validator = JsValidator::make($this->validationRules, [], [], '#update-profile-form');

		// Show view
		return $this->view('pages.frontend.profile.index')
			->with('payments', $payments)
			->with('validator', $validator)
		;
    }

    public function update(Request $request)
	{
		// Validate
		$this->validate($request, $this->validationRules);
  		
  		// Get form values
  		$values = $request->all();

		$user = Auth::user();

		$user->email = $request->get('email');
		$user->phone = $request->get('phone');
		
		if($request->get('password') != null)
			$user->password = bcrypt($request->get('password'));

		$user->save();
		return redirect(route('profile'));
	}

	public function createPayment()
	{
		// Create new payment
		$payment = new Payment();
    	$data['payment'] = $payment;
    	$paymentTypes = array('DEPOSIT' => 'DEPOSITO', 'TRANSFERENCE' => 'TRASNFERENCIA');

    	// Show view
    	return $this->view('pages.frontend.profile.create-payment')
    		->with('payment', $payment)
    		->with('paymentTypes', $paymentTypes)
    	;
	}

	public function downloadPDF($paymentId)
    {
        $payment = Payment::find($paymentId);
		$pdf = PDF::loadView('pdf.invoice', array('payment' => $payment));
		return $pdf->download('factura.pdf');
		  	
    }

    public function paymentDetail($paymentId)
	{
		// Get payment detail
    	$payment = Payment::find($paymentId);
    	
    	// Show view
    	return $this->view('pages.frontend.profile.payment-detail')
    		->with('payment', $payment);
	}

	public function storePayment(Request $request) {
    	$user = Auth::user();

    	//the store method returns a path to the file, 
    	$path = $request->file('file')->store('public/comprobantes');
    	
    	// echo($path);die;
    	// dump($request->all());die;
    	$payment = new Payment();
    	$payment->bank = $request->input('bank');
    	$payment->date = $request->input('paymentDate');
    	$payment->type = $request->input('type');
    	$payment->confirmation_code = $request->input('confirmation_code');
    	$payment->amount = $request->input('amount');
    	$payment->note = $request->input('note');
    	$payment->status = "PENDING";
    	$payment->user_id = $user->id;
    	$payment->file = $path;
    	$payment->save();
    	return redirect(route('profile'));
    }

}
