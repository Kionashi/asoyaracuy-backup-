<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;
use App\SpecialFee;

class DashboardController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	

		$usersCount = User::where('status', '=', 'ENABLED')->count();
		$totalFunding = Payment::getAllMoneyCollected();
		$debtorsCount = User::getDebtors();
		
        // Show view
    	return $this->view('pages.backend.dashboard.index')
    		->with('debtorsCount',$debtorsCount)
    		->with('usersCount',$usersCount)
    		->with('totalFunding',$totalFunding)
		;
    }

    

    
}
