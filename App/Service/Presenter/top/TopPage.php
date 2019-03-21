<?php

namespace App\Service\Presenter\Top;

use Core\Di\DiContainer as Di;
use Core\Presenter\ViewModel;
use Core\Presenter\BasicViewModel;
use App\Domain\Repository\PostRepository;
use App\Service\Presenter\Top\Components\PostItem;

class TopPage implements ViewModel{

    use BasicViewModel;

    protected $template = 'top/page';
    private $postPresenters;

    public function __construct() {
        $posts = Di::get(PostRepository::class)->getLatests();
        $this->postPresenters = array_map(function ($post) {
            return Di::get(PostItem::class, $post);
        }, $posts);
    }

    public function postPresenters(): array {
        return $this->postPresenters;
    }
}
