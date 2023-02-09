<?php

namespace App\View\Composers;

use App\Models\Theme;
use Illuminate\View\View;
use App\Models\AppSetting;
use Illuminate\Support\Facades\Auth;

class SystemConfigComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $settings = Theme::first();
            $logo = 'logo.png';
            $pageConfigs=[];
            if (!is_null($settings)) {
                $pageConfigs = [
                    'menuFixed' => $settings->menuFixed== 0 ? false:true,
                    'navbarFixed' => $settings->navbarFixed== 0 ? false:true,
                    'footerFixed' => $settings->footerFixed== 0 ? false:true,
                    'menuCollapsed' => $settings->menuCollapsed== 0 ? false:true,
                    'myStyle' => $settings->myStyle,
                    'myLayout'=>$settings->myLayout,
                    'myTheme' => $settings->myTheme,
                    'hasCustomizer' =>  false,
                ];
                // if (!is_null($settings->logo)) {
                //     $logo = $settings->logo;
                // }
              
            } else {
                $pageConfigs=[
                        
                        'menuCollapsed' =>  false ,
                        'myStyle' => 'light',
                        'myLayout'=>'horizontal',
                        'myTheme' => 'theme-semi-dark',
                        'hasCustomizer' =>  false,
                        'menuFixed' => false,
                        'navbarFixed' => true,
                        'footerFixed' => true,
                 ];
            }
          
           
            $view->with(\compact('pageConfigs'));
        }
    }
}
