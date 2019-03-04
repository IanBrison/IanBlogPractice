<?php

namespace App\Infrastructure\ValueObject\Content;

use App\Domain\Model\Content as ContentModel;

class Content implements ContentModel {

    public function display(): string {
        return 'Yeah it is a fantastic post!! This is the whole thing written in the Post.';
    }

    public function displayBeginning(): string {
        return 'Yeah it is a fantastic post!!';
    }
}
