<?php

namespace App\Infrastructure\Entity\Post;

use App\Domain\Model\Post;
use App\Domain\Model\ValueObject\Title;
use App\Domain\Model\ValueObject\Content;
use App\Domain\Model\ValueObject\Date;

class PublishedPost implements Post {

    public function title(): Title {
        return new Title();
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
