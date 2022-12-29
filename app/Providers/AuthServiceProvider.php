<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Biodata;
use App\Policies\BiodataPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    Biodata::class => BiodataPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    //
    Gate::before(function ($user) {
      return $user->isAdmin() ? true : null;
    });

    Gate::define('create', [BiodataPolicy::class, 'create']);
  }
}
