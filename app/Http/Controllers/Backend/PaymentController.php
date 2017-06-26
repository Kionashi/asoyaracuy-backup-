<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;
use Storage;

class PaymentController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $payments = Payment::where('user_status','ENABLED')->get();
        return $this->view('pages.backend.payments.index')
            ->with('payments',$payments)
        ;
    }

    
    public function detail($id) {
        $payment = Payment::find($id);
        $url = Storage::disk('local')->url($payment->file);
        // echo('url = '. $url.'\n' );
        // echo ('///////////////////////file = '.$payment->file);
        // die;
        return $this->view('pages.backend.payments.detail')
            ->with('payment',$payment)
            ->with('url',$url)
        ;
    }
    
    public function approve($id) {
        // Approve payment
        $payment = Payment::approve($id);
        if($payment != null){   
            // Update balance
            $user = User::find($payment->user_id);
            $user->balance += $payment->amount;
            $user->save();
            return redirect()->route('admin/payments')
                ->with('message','Pago aprobado exitosamente')
            ;
        }else{

            return redirect()->route('admin/payments')
                ->with('message','No se encontro el pago')
            ;
        }

    }
    
    public function reject($id) {
        $payment = Payment::reject($id);
        if($payment != null){   
            return redirect()->route('admin/payments')
                ->with('message','Pago rechazado exitosamente')
            ;
        }else{

            return redirect()->route('admin/payments')
                ->with('message','No se encontro el pago')
            ;    
        }
    }
        
    
}
