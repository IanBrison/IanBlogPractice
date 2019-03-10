<?php

namespace App\Service\ViewModel\Post\Components;

use Core\View\ViewModel;
use App\Domain\Model\Content;

class ContentMarkdownDisplay extends ViewModel {

    protected $template = 'post/components/content_markdown_display';

    private $content;

    public function __construct(Content $content) {
        $this->content = $content;
    }

    public function renderMarkdown(): string {
        return $this->content->display();
    }
}
