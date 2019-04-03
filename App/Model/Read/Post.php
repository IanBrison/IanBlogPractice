<?php

namespace App\Model\Read;

use App\Model\ValueObject\Title;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;

interface Post {

    public function title(): Title;

    public function content(): Content;

    public function isPublished(): bool;

    public function publishedAt(): Date;
}
