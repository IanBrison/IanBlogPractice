<?php

namespace App\System\Controller\Api;

use Core\Di\DiContainer as Di;
use Core\Controller\Controller;
use Core\Request\Request;
use App\Service\Usecase\UploadImage;

class ImageController extends Controller {

    public function upload() {
        $file = Di::get(Request::class)->getFile('image');
        $fileName = Di::get(UploadImage::class, $file)->execute();
        return $fileName;
    }
}
