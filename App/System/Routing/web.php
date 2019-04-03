<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getIndex'),
    Router::get('/about', 'TopController', 'getAbout'),
    Router::get('/post', 'PostController', 'getIndex'),

    Router::group('/admin', [
        Router::get('/login', 'Admin\AuthController', 'getLogin'),
        Router::post('/login', 'Admin\AuthController', 'postLogin'),
        Router::get('/post', 'Admin\PostController', 'getNew')->withAuth('/admin/login'),
        Router::post('/post', 'Admin\PostController', 'postNew')->withAuth('/admin/login'),

        Router::group('/image', [
            Router::get('/', 'Admin\ImageController', 'getList')->withAuth(),
//            Router::get('/upload', 'ImageController', 'upload')->withAuth(),
        ]),
    ]),
];
