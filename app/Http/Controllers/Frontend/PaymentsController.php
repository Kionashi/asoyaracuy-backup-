<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AsoyaracuyController;
use App\Payment;
use Auth;
use PDF;
use JsValidator;

class PaymentsController extends AsoyaracuyController
{
	public function index(){
		
    	// Get payments
		$payments = Payment::where('user_id', Auth::id())->get();

		// Show view
		return $this->view('pages.frontend.payments.index')
			->with('payments', $payments)
		;
    }
    
    public function create(){
    	
		// Create new payment
		$payment = new Payment();
    	$data['payment'] = $payment;
    	$paymentTypes = array('DEPOSIT' => 'DEPOSITO', 'TRANSFERENCE' => 'TRASNFERENCIA');

    	// Show view
    	return $this->view('pages.frontend.payments.create')
    		->with('payment', $payment)
    		->with('paymentTypes', $paymentTypes)
    	;
	}
	public function store(Request $request) {
    	$user = Auth::user();
        $file = $request->paymentFile;
        // dump($file);die;
        //the store method returns a path to the file, 
        // $path = $request->file('file')->store('comprobantes');
        
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
        $payment->save();
        
        if($file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $payment->id."-voucher".".".$fileExtension;
            $destinationPath = 'uploads'.DIRECTORY_SEPARATOR.'payments';
            $path = $file->move($destinationPath,$fileName);
            $payment->file = $destinationPath.DIRECTORY_SEPARATOR.$fileName;
            $payment->save();
        }
    	
        return redirect(route('payments'));
    }
    
    public function detail($paymentId) {
		// Get payment detail
    	$payment = Payment::find($paymentId);
    	
    	// Show view
    	return $this->view('pages.frontend.payments.detail')
    		->with('payment', $payment);
	}
	
	public function downloadPDF($paymentId)
    {
        $payment = Payment::find($paymentId);
		$pdf = PDF::loadView('pdf.invoice', array('payment' => $payment));
		return $pdf->download('factura.pdf');
		  	
    }
}