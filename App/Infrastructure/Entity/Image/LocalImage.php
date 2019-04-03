<?php

namespace App\Infrastructure\Entity\Image;

use App\Model\Read\Image;
use App\Model\ValueObject\Url;

class LocalImage implements Image{

    private $url;

    public function __construct(Url $url) {
        $this->url = $url;
    }

    public function url(): Url {
        return $this->url;
    }
}