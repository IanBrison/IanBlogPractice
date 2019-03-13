<?php

namespace App\Service\Presenter\Post;

use Core\Di\DiContainer as Di;
use App\Domain\Model\Post;
use App\Service\Presenter\Post\Components\ContentMarkdownDisplay;

class PostPage {

    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function title(): string {
        return $this->post->title();
    }

    public function publishedDate(): string {
        return $this->post->publishedAt()->show('Y-m-d');
    }

    public function contentMarkdownDisplay(): ContentMarkdownDisplay {
        return Di::get(ContentMarkdownDisplay::class, $this->post->content());
    }
}
