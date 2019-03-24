<?php

namespace App\Service\Presenter\Admin\Post;

use Core\Presenter\ViewModel;
use Core\Presenter\BasicViewModel;
use App\Service\Presenter\Base\PublishPost;
use App\System\Controller\Admin\PostController;

class PostEditPage extends PublishPost implements ViewModel{

    use BasicViewModel;

    protected $template = 'admin/post/page';

    public function formAction(): string {
        return PostController::POST_URL;
    }

    public function titleFormName(): string {
        return PostController::TITLE_REQUEST_KEY;
    }

    public function contentFormName(): string {
        return PostController::CONTENT_REQUEST_KEY;
    }
}
