<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Service\Presenter\Admin\Post\PostEditPage;

class PublishPost {

    const MAX_TITLE_LENGTH = 50;

    public function getPostEditPageViewModel(): PostEditPage {
        return Di::get(PostEditPage::class);
    }

    public function createPostFromEditPage(): bool {
        $postEditPage = Di::get(PostEditPage::class);
        $title = $postEditPage->retrieveTitle();
        $titleLength = mb_strlen($title);
        if ($titleLength === 0) {
            $postEditPage->preserveContent();
            $postEditPage->setNoTitleErrorMessage();
            return false;
        }
        if ($titleLength > self::MAX_TITLE_LENGTH) {
            $postEditPage->preserveTitle();
            $postEditPage->preserveContent();
            $postEditPage->setTooLongTitleErrorMessage();
            return false;
        }
        return true;
    }
}
