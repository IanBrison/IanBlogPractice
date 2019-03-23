<?php

namespace App\System\Controller;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Usecase\ReadPosts;

class PostController extends Controller {

    public function getIndex() {
        $postPagePresenter = Di::get(ReadPosts::class)
            ->withPostById(0)
            ->getPostPage();
        return $this->view($postPagePresenter);
    }
}
