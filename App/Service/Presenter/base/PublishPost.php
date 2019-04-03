<?php

namespace App\Service\Presenter\Base;

use Core\Di\DiContainer as Di;
use Core\Request\Request;
use Core\Session\Session;
use App\Model\ValueObject\PublishPostErrors;
use App\Service\Usecase\PublishPost as PublishPostUsecase;
use App\System\Controller\Admin\PostController;

class PublishPost {

    const PRESERVED_TITLE_SESSION_KEY = 'preserved_title';
    const PRESERVED_CONTENT_SESSION_KEY = 'preserved_content';
    const ERROR_MESSAGE_SESSION_KEY = 'post_edit_page_error';

    public function preservedTitle(): string {
        return Di::get(Session::class)->get(self::PRESERVED_TITLE_SESSION_KEY, '');
    }

    public function preservedContent(): string {
        return Di::get(Session::class)->get(self::PRESERVED_CONTENT_SESSION_KEY, '');
    }

    private function preserveTitle() {
        Di::get(Session::class)->oneTimeSet(self::PRESERVED_TITLE_SESSION_KEY, Di::get(Request::class)->getPost(PostController::TITLE_REQUEST_KEY, ''));
    }

    private function preserveContent() {
        Di::get(Session::class)->oneTimeSet(self::PRESERVED_CONTENT_SESSION_KEY, Di::get(Request::class)->getPost(PostController::CONTENT_REQUEST_KEY, ''));
    }

    private function preserveErrorMessage(string $message) {
        Di::get(Session::class)->oneTimeSet(self::ERROR_MESSAGE_SESSION_KEY, $message);
    }

    public function errorMessage(): string {
        return Di::get(Session::class)->get(self::ERROR_MESSAGE_SESSION_KEY, '');
    }

    public function dealWithErrors(PublishPostErrors $publishPostErrors) {
        if (!$publishPostErrors->hasError()) {
            return;
        }
        $message = '';
        if ($publishPostErrors->hasNoTitleError()) {
            $message = "You can't create a post without a title.";
        } else if ($publishPostErrors->hasTooTitleError()) {
            $message = "You can't create a title longer than " . PublishPostUsecase::MAX_TITLE_LENGTH . " characters.";
        }
        $this->preserveErrorMessage($message);
        $this->preserveTitle();
        $this->preserveContent();
    }
}
