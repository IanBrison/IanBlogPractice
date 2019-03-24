<?php

namespace App\System\Controller\Admin;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use Core\Request\Request;
use App\Service\Usecase\PublishPost;
use App\Service\Presenter\Base\PublishPost as PublishPostPresenter;
use App\Service\Presenter\Admin\Post\PostEditPage;

class PostController extends Controller {

    const POST_URL = '/admin/post';
    const TITLE_REQUEST_KEY = 'title';
    const CONTENT_REQUEST_KEY = 'content';

    public function getNew() {
        $postEditPagePresenter = Di::get(PostEditPage::class);
        return $this->view($postEditPagePresenter);
    }

    public function postNew() {
        $title = Di::get(Request::class)->getPost(PostController::TITLE_REQUEST_KEY, '');

        $publishPostUsecase = Di::get(PublishPost::class);
        if (!$publishPostUsecase->createPostFromEditPage($title)) {
            Di::get(PublishPostPresenter::class)->dealWithErrors($publishPostUsecase->retrieveErrors());
            return $this->redirect('/admin/post');
        }

        return $this->redirect('/post');
    }
}
