<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\SpecialFee;
use App\Payment;
use Validator;

class SpecialFeeController extends BackendController
{
    public function index() {
        $specialFees = SpecialFee::where('status','ENABLED')->get();
        return $this->view('pages.backend.specialfee.index')
            ->with('specialFees',$specialFees)
        ;
    }
    
    // public function store(Request $request) {
    // 	$user = Auth::user();
    // 	$id = $request->input('user_id');
    // 	$oldFee = SpecialFee::where('user_id',$id)->where('status','ENABLED')->first();
    // 	if($oldFee != null){
    // 		$oldFee->status = 'DISABLED';
    // 		$oldFee->save();	
    // 	}
    // 	$fee = new SpecialFee();
    // 	$fee->user_id = $request->input('user_id');
    // 	$fee->amount = $request->input('amount');
    // 	$fee->status = "ENABLED";
    //    	$fee->save();
   
    // 	return redirect(route('admin/specialfee'));
    // }
    
    public function delete($id){
    	$specialFee = SpecialFee::find($id);
    	$specialFee->delete();
		return redirect(route('admin/specialfees'));		
	}
}	
