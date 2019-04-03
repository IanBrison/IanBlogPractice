<?php

namespace App\Model\Read;

use App\Model\ValueObject\Url;

interface Image {

    public function url(): Url;
}
