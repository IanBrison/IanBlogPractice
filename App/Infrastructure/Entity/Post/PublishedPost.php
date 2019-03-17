<?php

namespace App\Infrastructure\Entity\Post;

use App\Domain\Model\Post;
use App\Domain\Model\Content;
use App\Domain\Model\Date;
use App\Domain\Model\ValueObject\Content\Content as ContentObject;
use App\Domain\Model\ValueObject\Date\Date as DateObject;

class PublishedPost implements Post {

    public function title(): string {
        return 'test タイトル';
    }

    public function content(): Content {
        return new ContentObject();
    }

    public function isPublished(): bool {
        return true;
    }

    public function publishedAt(): Date {
        return new DateObject();
    }
}
