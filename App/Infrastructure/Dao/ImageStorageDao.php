<?php

namespace App\Infrastructure\Dao;

use App\Infrastructure\Entity\Image\LocalImage;
use Core\Di\DiContainer as Di;
use Core\Storage\Storage;
use App\Domain\Repository\ImageRepository;
use App\Domain\Model\Image;
use App\Domain\Model\ValueObject\Url;

class ImageStorageDao implements ImageRepository {

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
