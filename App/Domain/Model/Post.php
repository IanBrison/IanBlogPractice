<?php

namespace App\Domain\Model;

use App\Domain\Model\ValueObject\Content;
use App\Domain\Model\ValueObject\Date;

interface Post {

    public function title(): string;

    public function content(): Content;

    public function isPublished(): bool;

    public function publishedAt(): Date;
}
