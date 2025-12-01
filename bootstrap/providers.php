<?php

use Modules\Produto\Providers\ProdutoServiceProvider;
use Modules\Users\Providers\UsersServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    UsersServiceProvider::class,
    ProdutoServiceProvider::class
];
