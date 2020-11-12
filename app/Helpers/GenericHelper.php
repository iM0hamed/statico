<?php

use Illuminate\Support\Facades\Auth;

function checkGuard()
{
    $result = null;
    if (Auth::guard('admin')->check() == true) {
        $result = 'admin';
    } elseif (Auth::guard('player')->check() == true) {
        $result = 'player';
    }

    return $result;
}

function checkGuardIsAdmin()
{
    return Auth::guard('admin')->check();
}

function checkGuardIsPlayer()
{
    return Auth::guard('player')->check();
}

function redirectIfAuthenticated()
{
    if (checkGuardIsAdmin()) {
        return redirect(route('admin.dashboard'));
    }

    return redirect(route('home'));
}
