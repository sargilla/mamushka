<?php

namespace Sargilla\Dolly;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DollServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache',function($expresion){
            return "<?php if( ! app(Sargilla\Dolly\BladeDirective)->setUp{$expresion} ) {  ?>";
        });
        Blade::directive('endcache',function(){
            return "<?php } echo app(Sargilla\Dolly\BladeDirective)->tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeDirective:class,function(){
            return new BladeDirective();
        })
    }
}
