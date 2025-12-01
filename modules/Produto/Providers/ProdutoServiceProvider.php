<?php

namespace Modules\Produto\Providers;

use Modules\Core\Providers\ModuleServiceProvider;

class ProdutoServiceProvider extends ModuleServiceProvider
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
}
