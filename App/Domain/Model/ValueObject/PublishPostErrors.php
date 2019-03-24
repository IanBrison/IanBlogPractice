<?php

namespace App\Domain\Model\ValueObject;

class PublishPostErrors {

    private $noTitleError;
    private $tooLongTitleError;

    public function __construct() {
        $this->noTitleError = false;
        $this->tooLongTitleError = false;
    }

    public function hasError(): bool {
        if ($this->hasNoTitleError()) return true;
        if ($this->hasTooTitleError()) return true;
        return false;
    }

    public function hasNoTitleError(): bool {
        return $this->noTitleError;
    }

    public function addNoTitleError() {
        if ($this->noTitleError) return;
        $this->noTitleError = true;
    }

    public function hasTooTitleError(): bool {
        return $this->tooLongTitleError;
    }

    public function addTooLongTitleError() {
        if ($this->tooLongTitleError) return;
        $this->tooLongTitleError = true;
    }
}
