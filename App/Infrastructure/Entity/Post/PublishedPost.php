<?php

namespace App\Infrastructure\Entity\Post;

use App\Domain\Model\Post;
use App\Domain\Model\ValueObject\Content;
use App\Domain\Model\ValueObject\Date;

class PublishedPost implements Post {

    public function title(): string {
        return 'test タイトル';
    }

    public function content(): Content {
        return new Content();
    }

    public function isPublished(): bool {
        return true;
    }

    public function publishedAt(): Date {
        return new Date();
    }
}
