<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Domain\Repository\PostRepository;
use App\Service\Presenter\Top\Components\PostItem;
use App\Service\Presenter\Post\PostPage;

class ReadPosts {

    private $post;

    public function withPostById(int $id): self {
        $this->post = Di::get(PostRepository::class)->getById($id);
        return $this;
    }

    public function getPostPage(): PostPage {
        if (is_null($this->post)) {
            throw new \Exception("No Post sepcified in ReadPosts service");
        }
        return Di::get(PostPage::class, $this->post);
    }
}
