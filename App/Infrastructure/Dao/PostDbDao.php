<?php

namespace App\Infrastructure\Dao;

use Core\Datasource\DbDao;
use App\Domain\Repository\PostRepository;
use App\Domain\Model\Post;
use App\Infrastructure\Entity\Post\PublishedPost;
use App\Infrastructure\Entity\Post\DraftPost;

class PostDbDao extends DbDao implements PostRepository {

    public function getById(int $id): Post {
        return new PublishedPost();
    }

    public function getLatests(): array {
        return [
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
        ];
    }

    public function getPostsFromPage(): array {
        return [
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
            new PublishedPost(),
        ];
    }
}
