<?php

namespace App\System\Controller;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Usecase\ReadPost;

class PostController extends Controller {

    public function getIndex() {
        $postPagePresenter = Di::get(ReadPost::class)->readSpecificPost(0);
        return $this->view($postPagePresenter);
    }
}
