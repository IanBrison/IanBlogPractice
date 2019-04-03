<?php

namespace App\Infrastructure\Entity\Image;

use App\Domain\Model\Image;
use App\Domain\Model\ValueObject\Url;

class LocalImage implements Image{

    private $url;

    public function __construct(Url $url) {
        $this->url = $url;
    }

    public function url(): Url {
        return $this->url;
    }
}