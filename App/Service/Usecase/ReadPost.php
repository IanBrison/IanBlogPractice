<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Domain\Repository\PostRepository;
use App\Service\Presenter\Top\Components\PostItem;
use App\Service\Presenter\Post\PostPage;

class ReadPost {

    public function readSpecificPost(int $id): PostPage {
        $post = Di::get(PostRepository::class)->getById($id);
        return Di::get(PostPage::class, $post);
    }
}
