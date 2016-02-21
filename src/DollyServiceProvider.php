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
            return "<?php if( !Sargilla\Dolly\RussianCaching::setUp{$expresion} ) {  ?>";
        });
        Blade::directive('endcache',function(){
            return "<?php } echo Sargilla\Dolly\RussianCaching::tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
