<?php

namespace App\Domain\Model;

use App\Domain\Model\ValueObject\Url;

interface Image {

    public function url(): Url;
}
