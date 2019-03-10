<?php

namespace App\System\Controller;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use App\Service\Usecase\ReadPosts;

class TopController extends Controller {

    public function getIndex() {
        $postViewModels = Di::get(ReadPosts::class)->getForTop();
        $variables = [
            'posts' => $postViewModels,
        ];
        return $this->render('top/page', $variables);
    }

    public function getAbout() {
        return $this->render('about');
    }
}
