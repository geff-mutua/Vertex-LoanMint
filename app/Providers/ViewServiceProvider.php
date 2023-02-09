<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\SystemConfigComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $share=[
            'layouts.blankLayout',
            'layouts.commonMaster',
            'layouts.contentNavbarLayout',
            'layouts.horizontalLayout',
        ];

       
        View::composer($share, SystemConfigComposer::class);
    }
}
