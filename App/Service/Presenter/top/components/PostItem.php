<?php

namespace App\Service\Presenter\Top\Components;

use Core\Presenter\ViewModel;
use Core\Presenter\BasicViewModel;
use App\Domain\Model\Post;

class PostItem implements ViewModel {

    use BasicViewModel;

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
