<?php

namespace App\Infrastructure\Query;

use Core\Datasource\DbDao;
use App\Service\Repository\PostRepository;
use App\Model\Read\Post;
use App\Infrastructure\Entity\Post\PublishedPost;
use App\Infrastructure\Entity\Post\DraftPost;

class PostDbQuery extends DbDao implements PostRepository {

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
