<?php

namespace App\Service\Presenter\admin\image;

use Core\Presenter\ViewModel;
use Core\Presenter\JsonModel;
use Core\Presenter\BasicViewModel;
use Core\Presenter\BasicJsonModel;

class ImageListPage implements ViewModel, JsonModel {

    use BasicViewModel, BasicJsonModel;

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