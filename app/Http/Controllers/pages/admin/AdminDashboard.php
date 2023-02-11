<?php

namespace App\Http\Controllers\pages\admin;

use App\Http\Services\Lms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboard extends Controller
{
    public function index(){
        $lms=new Lms();
        $data=$lms->adminDashboard();
       
        return view('content.admin.dashboard.index')->with(compact('data'));
    }
}
