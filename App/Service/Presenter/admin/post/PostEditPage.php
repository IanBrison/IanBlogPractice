<?php

namespace App\Service\Presenter\Admin\Post;

use Core\Di\DiContainer as Di;
use Core\Request\Request;
use Core\Session\Session;
use App\Service\Usecase\PublishPost;

class PostEditPage {

    const FORM_ACTION = '/admin/post';
    const TITLE_FORM_NAME = 'title';
    const CONTENT_FORM_NAME = 'content';
    const PRESERVED_TITLE_SESSION_KEY = 'preserved_title';
    const PRESERVED_CONTENT_SESSION_KEY = 'preserved_content';
    const ERROR_SESSION_KEY = 'post_edit_page_error';

    public function formAction(): string {
        return self::FORM_ACTION;
    }

    public function titleFormName(): string {
        return self::TITLE_FORM_NAME;
    }

    public function contentFormName(): string {
        return self::CONTENT_FORM_NAME;
    }

    public function preservedTitle(): string {
        return Di::get(Session::class)->get(self::PRESERVED_TITLE_SESSION_KEY, '');
    }

    public function preservedContent(): string {
        return Di::get(Session::class)->get(self::PRESERVED_CONTENT_SESSION_KEY, '');
    }

    public function retrieveTitle(): string {
        return Di::get(Request::class)->getPost(self::TITLE_FORM_NAME, '');
    }

    public function retrieveContent(): string {
        return Di::get(Request::class)->getPost(self::CONTENT_FORM_NAME, '');
    }

    public function preserveTitle() {
        Di::get(Session::class)->oneTimeSet(self::PRESERVED_TITLE_SESSION_KEY, $this->retrieveTitle());
    }

    public function preserveContent() {
        Di::get(Session::class)->oneTimeSet(self::PRESERVED_CONTENT_SESSION_KEY, $this->retrieveContent());
    }

    public function setNoTitleErrorMessage() {
        $message = "You can't create a post without a title.";
        $this->preserveErrorMessage($message);
    }

    public function setTooLongTitleErrorMessage() {
        $message = "You can't create a title longer than " . PublishPost::MAX_TITLE_LENGTH . " characters.";
        $this->preserveErrorMessage($message);
    }

    private function preserveErrorMessage(string $message) {
        Di::get(Session::class)->oneTimeSet(self::ERROR_SESSION_KEY, $message);
    }

    public function hasError(): bool {
        return mb_strlen($this->errorMessage()) > 0;
    }

    public function errorMessage(): string {
        return Di::get(Session::class)->get(self::ERROR_SESSION_KEY, '');
    }
}
