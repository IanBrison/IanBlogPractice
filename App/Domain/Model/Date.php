<?php

namespace App\Domain\Model;

interface Date {

    /*
     * format could be either
     * 'Y-m-d' or
     * 'Y-m-d H:i:s'
     */
    public function show(string $format): string;
}
