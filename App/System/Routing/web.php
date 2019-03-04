<?php

use Core\Routing\Router;

return [
    Router::get('/', 'ExampleController', 'getIndex'),
    Router::get('/about', 'ExampleController', 'getAbout'),
    Router::get('/post', 'ExampleController', 'getPost'),
];
