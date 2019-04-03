<?php

namespace App\Domain\Repository;

use App\Domain\Model\Image;
use App\Domain\Model\ValueObject\Url;

interface ImageRepository {

    public function getAll(): array;

    public function getByUrl(Url $url): Image;
}
