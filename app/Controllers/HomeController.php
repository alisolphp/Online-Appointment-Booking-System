<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{

    public function __construct(){
        
    }

    function index(){
        return view('home/index');
    }


}
