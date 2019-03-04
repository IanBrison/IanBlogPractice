<?php

namespace App\Domain\Model;

interface Content {

    /*
     * return the whole content in html
     */
    public function display(): string;

    /*
     * return the begging of the content in html
     */
    public function displayBeginning(): string;
}
