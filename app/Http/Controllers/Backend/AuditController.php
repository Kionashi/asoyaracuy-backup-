<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;
use App\SpecialFee;
use App\Audit;

class AuditController extends BackendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        // Find all audits
        $audits = Audit::all();
                
        // Show view
        return $this->view('pages.backend.audit.index')
           ->with('audits',$audits)
        ;
    }
}
