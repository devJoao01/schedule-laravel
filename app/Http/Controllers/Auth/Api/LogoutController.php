<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;

class LogoutController extends Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function logout()
    {
        $this->guard->logout();
        return redirect()->route('login');
    }
}
