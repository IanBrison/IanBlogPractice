<?php

namespace App\Domain\Model\ValueObject;

class Date {

    /*
     * format could be either
     * 'Y-m-d' or
     * 'Y-m-d H:i:s'
     */
    public function show(string $format): string {
        return '2019-03-04';
    }
}
