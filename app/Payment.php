<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\User;

class Payment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	public static function approve($id) 
	{
		$payment = Payment::find($id);
		$payment->status = "APPROVED";
		$payment->save();
		return $payment;
		
	}
	
	public static function getAllMoneyCollected() {
		$total = Payment::where('status', 'APPROVED')
                ->sum('amount');
        return $total;
	}

	public static function getPendingPaymentsCount() {
		$payments = Payment::where('status', '=', 'PENDING')->where('user_status','ENABLED')->get();
		return count($payments);
	}
	
	public static function getPaymentsFromUser($id) {
		$payments = Payment::where( 'user_id', '=', $id )->get();
		return $payments;
	}
	
	public static function reject($id) {
		$payment = Payment::find($id);
		$payment->status = "REJECTED";
		$payment->save();
	
	}
}
