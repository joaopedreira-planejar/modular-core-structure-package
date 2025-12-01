<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

abstract class ModuleServiceProvider extends ServiceProvider
{
    protected string $modulePath;

    protected function loadRoutes()
    {
        $routesPath = $this->modulePath . '/../routes/web.php';

        if (file_exists($routesPath)) {
            Route::middleware('web')
                ->group($routesPath);
        }
    }

    protected function loadMigrations()
    {
        $migrationsPath = $this->modulePath . '/../database/migrations';

        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
