<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use App\Model\Web;

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
    public function boot()
    {
        //
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        $web = Web::first();
        $headerDefault = [
            'meta_title' => $web->seo['meta_title'],
            'meta_desc' => $web->seo['meta_desc'],
            'meta_keyword' => $web->seo['meta_keyword'],
            'img' => asset('imgs/img-home2.png')
        ];

        Config::set('HEADER', $headerDefault);
        View::share('HEADER', $headerDefault );
        View::share('_WEB', $web );
    }
}
