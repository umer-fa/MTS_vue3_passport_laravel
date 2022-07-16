<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $a = explode("/",url()->full());
        $a = explode(".",$a[2]);
        if($a[0]!='localhost') {
            DB::purge('tenant');
            DB::setDefaultConnection('mysql');
            $dt = DB::table('users')->where("name", $a[0])->first();
            if($dt){
                $this->app->configPath('database.connections.tenant.database',$dt->name);
                DB::purge('mysql');
                DB::setDefaultConnection('tenant');
                \config([
                    'database.connections.tenant.database' => $dt->name,
                ]);
                DB::reconnect();

//                Artisan::call('migrate', ['--path' => '/app/database/migrations/tenants']);
            }else{
                dd($a[0]." sub Domain Doesn't Exist");
            }
        }else{
            DB::purge('tenant');
            DB::setDefaultConnection('mysql');
            config([
                'database.connections.mysql.database' => env('DB_DATABASE', 'vue3_jwt'),
            ]);
            DB::reconnect("mysql");
            DB::setDefaultConnection('mysql');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (! $this->app->routesAreCached()) {
//            $this->registerPolicies();
            Passport::routes();
        }
    }
}
