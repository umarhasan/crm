<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Illuminate\Support\Facades\View;
// use App\Models\Category;
// use App\Models\GeneralSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $REQUEST)
    {
        // $data['page'] = Request::segment(1);
        // $data['category'] = Category::all();
        // $data['generalsetting'] = GeneralSetting::first();
        // return View::share($data);

    }
}
