<?php

namespace App\Http\Controllers\pages\admin\settings\theme;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeSetting extends Controller
{
    public function index(){
        $theme = Theme::first();
        return view('content.admin.settings.theme.index')->with(compact('theme'));
    }
    public function store(Request $request){
        Theme::updateOrCreate(['id'=>$request->id],$request->all());
        return redirect()->back();
    }
}
