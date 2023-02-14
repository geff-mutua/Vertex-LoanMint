<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::Check()){
           
            if(auth()->user()->company==null){
                return redirect()->route('setting-company',['domain'=>auth()->user()->domain->name])->withMessage('Fill in the company details to get you started');;
            }elseif(auth()->user()->company->logo==null){
                return redirect()->route('setting-company',['domain'=>auth()->user()->domain->name])->withMessage('Company Logo is required');
            }
        }
        return $next($request);
    }
}
