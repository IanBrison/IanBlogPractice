<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use Core\Storage\Storage;
use Core\Storage\File;

class UploadImage {

    private $file;

    public function __construct(File $file) {
        $this->file = $file;
    }

    public function execute(): string {
        $fileName = 'image' . time();
        $storage = Di::get(Storage::class)->location('image');
        if (!$storage->save($this->file, $fileName)) {
            return 'upload failed';
        }
        return $storage->url($fileName);
    }
}
