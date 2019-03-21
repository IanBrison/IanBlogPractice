<?php

namespace App\System\Controller;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Presenter\Top\TopPage;

class TopController extends Controller {

    public function getIndex() {
        $topPagePresenter = Di::get(TopPage::class);
        return $this->view($topPagePresenter);
    }

    public function getAbout() {
        return $this->render('about');
    }
}
