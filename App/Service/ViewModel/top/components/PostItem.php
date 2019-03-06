<?php

namespace App\Service\ViewModel\Top\Components;

use Core\View\ViewModel;
use App\Domain\Model\Post;

class PostItem extends ViewModel {

    protected $template = 'components/post_item';

    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function title(): string {
        return $this->post->title();
    }

    public function contentBeginning(): string {
        return $this->post->content()->displayBeginning();
    }

    public function publishedDate(): string {
        return $this->post->publishedAt()->show('Y-m-d');
    }
}
