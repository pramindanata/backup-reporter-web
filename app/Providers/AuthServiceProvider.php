<?php

namespace App\Providers;

use App\Models\AccessToken;
use App\Models\BackupReportLog;
use App\Models\User;
use App\Policies\AccessTokenPolicy;
use App\Policies\BackupReportLogPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        AccessToken::class => AccessTokenPolicy::class,
        BackupReportLog::class => BackupReportLogPolicy::class,
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
    }
}
