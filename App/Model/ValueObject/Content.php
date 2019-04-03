<?php

namespace App\Model\ValueObject;

class Content {

    /*
     * return the whole content in html
     */
    public function display(): string {
        return "# Bravel Hi guys. This is a framework that I'm making for some reasons.";
    }

    /*
     * return the begging of the content in html
     */
    public function displayBeginning(): string {
        return 'Yeah it is a fantastic post!!';
    }
}
