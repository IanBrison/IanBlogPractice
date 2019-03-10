<?php

namespace App\Infrastructure\ValueObject\Content;

use App\Domain\Model\Content as ContentModel;

class Content implements ContentModel {

    public function display(): string {
        return "# Bravel Hi guys. This is a framework that I'm making for some reasons.";
    }

    public function displayBeginning(): string {
        return 'Yeah it is a fantastic post!!';
    }
}
