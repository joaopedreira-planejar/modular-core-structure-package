<?php

namespace Modules\Produto\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Users\Models\User;

class GetProdutoController extends Controller
{
    public function __invoke(): Response
    {
        $users = User::all();

        return Inertia::render(
            'Dale',
            compact('users')
        );
    }
}
