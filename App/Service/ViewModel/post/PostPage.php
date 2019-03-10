<?php

namespace App\Service\ViewModel\Post;

use Core\Di\DiContainer as Di;
use Core\View\ViewModel;
use App\Domain\Model\Post;
use App\Service\ViewModel\Post\Components\ContentMarkdownDisplay;

class PostPage extends ViewModel {

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
