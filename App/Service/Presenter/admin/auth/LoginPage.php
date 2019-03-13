<?php

namespace App\Service\Presenter\Admin\Auth;

use Core\Di\DiContainer as Di;
use Core\Request\Request;
use Core\Presenter\BasicViewModel;

class LoginPage {

    use BasicViewModel;

    const FORM_ACTION = '/admin/login';
    const PASSWORD_FORM_NAME = 'password';

    public function formAction(): string {
        return self::FORM_ACTION;
    }

    public function passwordFormName(): string {
        return self::PASSWORD_FORM_NAME;
    }

    public function retrievePassword(): string {
        return Di::get(Request::class)->getPost(self::PASSWORD_FORM_NAME, '');
    }
}
