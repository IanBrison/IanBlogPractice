<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getIndex'),
    Router::get('/about', 'TopController', 'getAbout'),
    Router::get('/post', 'TopController', 'getPost'),
];
