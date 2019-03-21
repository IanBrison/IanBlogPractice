<?php

namespace App\System\Controller\Admin;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Usecase\PublishPost;

class PostController extends Controller {

    public function getNew() {
        $postEditPageViewModel = Di::get(PublishPost::class)
            ->getPostEditPageViewModel();
        return $this->view($postEditPageViewModel);
    }

    public function postNew() {
        $publishPostService = Di::get(PublishPost::class);
        if (!$publishPostService->createPostFromEditPage()) {
            return $this->redirect('/admin/post');
        }

        return $this->redirect('/post');
    }
}
