<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Auth;
use App\Payment;
class BackendController extends Controller
{
    use ValidatesRequests;

    function view($view = null, $data = [], $mergeData = [])
    {
        // Load common data
        $auth = Auth::user();
        $paymentsCount = Payment::where('status','PENDING')->count();
        // Show view
        return view($view, $data, $mergeData)
            ->with('auth', $auth)
            ->with('paymentsCount',$paymentsCount);
        ;
    }
    
    public function storeAudit($action, $details, $ip) {
        // Get logged user 
        $user = Auth::user();
        
        // Create audit
        $audit = new Audit();
        $audit->action = $action;
        $audit->details = $details;
        $audit->ipAddress = $ip;
        $audit->user_id = $user->id;
        
        // Store audit
        $audit->save();
        
    }
}
