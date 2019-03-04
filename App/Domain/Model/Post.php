<?php

namespace App\Domain\Model;

interface Post {

    public function title(): string;

    public function content(): Content;

    public function isPublished(): bool;

    public function publishedAt(): Date;
}
