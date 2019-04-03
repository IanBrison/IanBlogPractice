<?php

namespace App\System\Controller;

use App\Service\Presenter\admin\image\ImageListPage;
use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use Core\Request\Request;
use App\Domain\Repository\ImageRepository;
use App\Service\Usecase\UploadImage;

class ImageController extends Controller {

    public function getList() {
        $images = Di::get(ImageRepository::class)->getAll();
        $imageListPage = Di::get(ImageListPage::class, $images);
        return $this->view($imageListPage);
    }

    public function upload() {
        $file = Di::get(Request::class)->getFile('image');
        $fileName = Di::get(UploadImage::class, $file)->execute();
        return $fileName;
    }
}
