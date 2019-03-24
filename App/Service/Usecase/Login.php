<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use Core\Session\Session;

class Login {

    public function attemptLoginFromLoginPage(string $password): bool {
		// password: test
        if (password_verify($password, '$2y$10$0jlTUTi.NVQKeEt/.D0BkO8EEMQtK.ZNEP0k7h73215xthJtvgw6W')) {
            Di::get(Session::class)->setAuthenticated(true);
            return true;
        }
        return false;
    }
}
