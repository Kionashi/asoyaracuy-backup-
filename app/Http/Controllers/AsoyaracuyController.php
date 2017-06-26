<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Auth;

class AsoyaracuyController extends Controller
{
    use ValidatesRequests;

    function view($view = null, $data = [], $mergeData = [])
    {
        // Load common data
        $user = Auth::user();
        
        // Show view
        return view($view, $data, $mergeData)
            ->with('user', $user)
        ;
    }
}
