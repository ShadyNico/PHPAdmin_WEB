<?php

namespace App\Middleware;

use SessionManager;

class Authenticated
{
    public static function handle(): void
    {
        SessionManager::start();
        if (empty($_SESSION['user_authenticated'])) {
            SessionManager::flash('alert', 'Debes iniciar sesión para continuar.');
            redirect('/');
        }
    }
}
