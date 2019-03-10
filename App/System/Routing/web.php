<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getIndex'),
    Router::get('/about', 'TopController', 'getAbout'),
    Router::get('/post', 'PostController', 'getIndex'),

    Router::get('/admin/login', 'Admin\AuthController', 'getLogin'),
    Router::post('/admin/login', 'Admin\AuthController', 'postLogin'),
    Router::get('/admin/post', 'Admin\PostController', 'getNew')->withAuth('/admin/login'),
    Router::post('/admin/post', 'Admin\PostController', 'postNew')->withAuth('/admin/login'),
];
