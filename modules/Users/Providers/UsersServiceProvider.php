<?php

namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Core\Providers\ModuleServiceProvider;

class UsersServiceProvider extends ModuleServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->modulePath = __DIR__ . "/..";
    }

    public function register() {}

    public function boot()
    {
        $this->loadRoutes();
        $this->loadMigrations();
    }

    protected function loadRoutes()
    {
        $routesPath = __DIR__ . '/../routes/web.php';

        if (file_exists($routesPath)) {
            Route::middleware('web')
                ->group($routesPath);
        }
    }

    protected function loadMigrations()
    {
        $migrationsPath = __DIR__ . '/../database/migrations';

        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
