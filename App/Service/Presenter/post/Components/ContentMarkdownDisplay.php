<?php

namespace App\Service\Presenter\Post\Components;

use Core\Presenter\ViewModel;
use Core\Presenter\BasicViewModel;
use App\Model\ValueObject\Content;

class ContentMarkdownDisplay implements ViewModel {

    use BasicViewModel;

    protected $template = 'post/components/content_markdown_display';

    private $content;

    public function __construct(Content $content) {
        $this->content = $content;
    }

    public function renderMarkdown(): string {
        return $this->content->display();
    }
}
