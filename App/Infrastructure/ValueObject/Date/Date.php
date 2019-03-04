<?php

namespace App\Infrastructure\ValueObject\Date;

use App\Domain\Model\Date as DateModel;

class Date implements DateModel {

    public function show(string $format): string {
        return '2019-03-04';
    }
}
