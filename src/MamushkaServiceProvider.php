<?php

namespace Sargilla\Mamushka;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MamushkaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache',function($expresion){
            return "<?php if( !Sargilla\Mamushka\BladeDirective::setUp{$expresion} ) {  ?>";
        });
        Blade::directive('endcache',function(){
            return "<?php } echo Sargilla\Mamushka\BladeDirective::tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeDirective::class, function(){
            return new BladeDirective(
                new RussianCaching(
                    app('Illuminate\Contracts\Cache\Repository')
                )
            );
        });
    }
}
