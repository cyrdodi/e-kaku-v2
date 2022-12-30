<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
    Blade::if('isadmin', function () {
      return auth()->user() && auth()->user()->is_admin == 1;
    });

    Blade::if('isuser', function () {
      return auth()->user() && auth()->user()->is_admin == 0;
    });
  }
}
