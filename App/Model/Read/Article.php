<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;

interface Article {

    public function id(): int;

    public function key(): string;

    public function title(): string;

    public function content(): Content;

    public function isPublished(): bool;
}