<?php
$images = [];
foreach ($jm->imageUrls() as $imageUrl) {
    $images[] = $imageUrl;
}
return $images;
