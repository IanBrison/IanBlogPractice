<?php

namespace App\Service\Repository;

use App\Model\Read\Post;

interface PostRepository {

    public function getById(int $id): Post;

    public function getLatests(): array;

    public function getPostsFromPage(): array;
}
