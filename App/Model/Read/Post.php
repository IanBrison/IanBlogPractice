<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;

interface Post extends Article {

    public function publishedAt(): Date;
}
