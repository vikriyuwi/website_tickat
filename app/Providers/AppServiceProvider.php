<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        Blade::directive('price', function ($amount) {
            setlocale(LC_ALL, 'IND');
            return "<?php echo 'IDR <b>' . number_format($amount, 0) . '</b>';?>";
        });
    }
}
