<?php

namespace App\Service\Presenter\admin\image;

use Core\Presenter\ViewModel;
use Core\Presenter\BasicViewModel;

class ImageListPage implements ViewModel{

    use BasicViewModel;

    protected $template = 'admin/image/page';

    private $images;

    public function __construct(array $images) {
        $this->images = $images;
    }

    public function imageUrls(): array {
        return array_map(function($image) {
            return $image->url()->fullString();
        }, $this->images);
    }
}