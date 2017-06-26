<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AsoyaracuyController;
use Illuminate\Http\Request;
use Auth;

class HomeController extends AsoyaracuyController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        // Show view
    	return $this->view('pages.frontend.home.index');
    }
}
