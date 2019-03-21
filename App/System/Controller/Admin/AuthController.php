<?php

namespace App\System\Controller\Admin;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use Core\Session\Session;
use App\Service\Usecase\Login;

class AuthController extends Controller {

    public function getLogin() {
        if (Di::get(Session::class)->isAuthenticated()) {
            return $this->redirect('/admin/post');
        }

        $loginPageViewModel = Di::get(Login::class)
            ->getLoginPageViewModel();
        return $this->view($loginPageViewModel);
    }

    public function postLogin() {
        $loginService = Di::get(Login::class);
        if (!$loginService->attemptLoginFromLoginPage()) {
            return $this->redirect('/admin/login');
        }

        return $this->redirect('/admin/post');
    }
}
