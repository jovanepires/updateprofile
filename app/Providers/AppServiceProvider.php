<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use App\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configs = collect([
            'app_name' => 'app_name',
            'app_description' => 'app_description',
        ]);

        if (Schema::hasTable('configs')) {
            $configs = Config::all()->mapWithKeys(function ($item) {
                return [$item['param'] => $item['value']];
            });
        }

        View::share('configs', $configs);
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
