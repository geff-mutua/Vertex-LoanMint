<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function about(){
        return view('frontend.about');
    }
    public function features(){
        return view('frontend.features');
    }
    public function pricing(){
        return view('frontend.pricing');
    }
}
