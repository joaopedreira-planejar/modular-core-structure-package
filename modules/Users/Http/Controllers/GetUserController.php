<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Users\Models\User;

class GetUserController extends Controller
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
