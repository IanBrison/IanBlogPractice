<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Model\ValueObject\PublishPostErrors;
use App\Service\Presenter\Admin\Post\PostEditPage;

class PublishPost {

    const MAX_TITLE_LENGTH = 50;

    private $publishPostErrors;

    public function __construct() {
        $this->publishPostErrors = new PublishPostErrors();
    }

    public function createPostFromEditPage(string $title): bool {
        $titleLength = mb_strlen($title);
        if ($titleLength === 0) {
            $this->publishPostErrors->addNoTitleError();
            return false;
        }
        if ($titleLength > self::MAX_TITLE_LENGTH) {
            $this->publishPostErrors->addTooLongTitleError();
            return false;
        }
        return true;
    }

    public function retrieveErrors(): PublishPostErrors {
        return $this->publishPostErrors;
    }
}
