<?php

namespace App\Infrastructure\Query;

use App\Infrastructure\Entity\Image\LocalImage;
use Core\Di\DiContainer as Di;
use Core\Storage\Storage;
use App\Service\Repository\ImageRepository;
use App\Model\Read\Image;
use App\Model\ValueObject\Url;

class ImageStorageQuery implements ImageRepository {

    public function getAll(): array {
        $imageStorage = Di::get(Storage::class)->location('image');
        return array_map(function ($fileName) use ($imageStorage) {
            $url = Url::constructFromFullString($imageStorage->url($fileName));
            return new LocalImage($url);
        }, $imageStorage->list());
    }

    public function getByUrl(Url $url): Image {
    }
}
