<?php

namespace App\System\Controller\Admin;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use Core\Session\Session;
use App\Service\Usecase\Login;
use App\Service\Presenter\Admin\Auth\LoginPage;

class AuthController extends Controller {

    public function getLogin() {
        if (Di::get(Session::class)->isAuthenticated()) {
            return $this->redirect('/admin/post');
        }

        $loginPagePresenter = Di::get(LoginPage::class);
        return $this->view($loginPagePresenter);
    }

    public function postLogin() {
        $password =  Di::get(LoginPage::class)->retrievePassword();
        if (!Di::get(Login::class)->attemptLoginFromLoginPage($password)) {
            return $this->redirect('/admin/login');
        }

        return $this->redirect('/admin/post');
    }
}
