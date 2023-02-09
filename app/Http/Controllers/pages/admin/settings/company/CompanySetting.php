<?php

namespace App\Http\Controllers\pages\admin\settings\company;

use Alert;
use Storage;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanySetting extends Controller
{
    public function index(){
        
        
        $settings = Company::first();
        return view('content.admin.settings.company.index')->with(compact('settings'));
    }

    public function store(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'zipcode'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'town'=>'required',
            
        ]);
        $file=null;
        $settings=Company::first();
        if(!is_null($request->logo)){
            $request->validate([
                'logo' => 'mimes:png,jpg|max:2048'
            ]);
            if(!is_null($settings)){
                if(!\is_null($settings->logo)){
                    
                    Storage::disk('logo')->delete($settings->logo);
                }
            }
            
            $file = $request->logo->store('/', 'logo');
            
        }else{
            $file=null;
            if(is_null($settings)){
                $file = null;
            }else{
                $file = $settings->logo;
            }
        }
        Company::updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'email'=>$request->email,
            'zipcode'=>$request->zipcode,
            'address'=>$request->address,
            'town'=>$request->town,
            'mobile'=>$request->mobile,
            'country'=>$request->country,
            'logo'=>$file,
        ]);
        Alert::success('Company details has been updated', 'Success Message');
        return redirect()->back();

    }

}
