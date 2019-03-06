<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Domain\Repository\PostRepository;
use App\Service\ViewModel\Top\Components\PostItem;

class ReadPosts {

    public function getForTop(): array {
        $posts = Di::get(PostRepository::class)->getLatests();
        $postViewModels = array_map(function ($post) {
            return Di::get(PostItem::class, $post);
        }, $posts);
        return $postViewModels;
    }
}
