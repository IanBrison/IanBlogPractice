<?php

namespace App\Service\Repository;

use App\Model\Read\Image;
use App\Model\ValueObject\Url;

interface ImageRepository {

    public function getAll(): array;

    public function getByUrl(Url $url): Image;
}
