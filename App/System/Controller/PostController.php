<?php

namespace App\System\Controller;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Usecase\ReadPosts;

class PostController extends Controller {

    public function getIndex() {
        $postPageViewModel = Di::get(ReadPosts::class)->getPostPage(0);
        $variables = [
            'postPage' => $postPageViewModel,
        ];
        return $this->render('post/page', $variables);
    }
}
