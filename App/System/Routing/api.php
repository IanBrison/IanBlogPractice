<?php

use Core\Routing\Router;

return [
    Router::post('/image/upload', 'Api\ImageController', 'upload')->withAuth(),
];
