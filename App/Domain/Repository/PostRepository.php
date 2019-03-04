<?php

namespace App\Domain\Repository;

use App\Domain\Model\Post;

interface PostRepository {

    public function getById(int $id): Post;

    public function getLatests(): array;

    public function getPostsFromPage(): array;
}
