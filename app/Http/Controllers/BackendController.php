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
}
