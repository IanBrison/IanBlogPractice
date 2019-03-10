<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getIndex'),
    Router::get('/about', 'TopController', 'getAbout'),
    Router::get('/post', 'PostController', 'getIndex'),

    Router::get('/admin/post', 'Admin\PostController', 'getNew'),
    Router::post('/admin/post', 'Admin\PostController', 'postNew'),
];
