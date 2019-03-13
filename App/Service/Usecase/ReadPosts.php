<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Domain\Repository\PostRepository;
use App\Service\Presenter\Top\Components\PostItem;
use App\Service\Presenter\Post\PostPage;

class ReadPosts {

    private $post;
    private $posts;

    public function withLatestPosts(): self {
        $this->posts = Di::get(PostRepository::class)->getLatests();
        return $this;
    }

    public function getPostItemViewModels(): array {
        if (is_null($this->posts)) {
            throw new \Exception("No Posts sepcified in ReadPosts service");
        }
        $postViewModels = array_map(function ($post) {
            return Di::get(PostItem::class, $post);
        }, $this->posts);
        return $postViewModels;
    }

    public function withPostById(int $id): self {
        $this->post = Di::get(PostRepository::class)->getById($id);
        return $this;
    }

    public function getPostPageViewModel(): PostPage {
        if (is_null($this->post)) {
            throw new \Exception("No Post sepcified in ReadPosts service");
        }
        return Di::get(PostPage::class, $this->post);
    }
}
