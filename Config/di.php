<?php

/*
 * config file for di container
 *
 * singletons are instances that are to be saved when they are constructed
 * aliases are for choosing the right classes to use for construction
 */
return [
    'singletons' => [
        Core\Request\Request::class,
        Core\Response\Response::class,
        Core\Session\Session::class,
        Core\Datasource\DbManager::class,
        Core\Datasource\GhostDbDao::class,
        Core\Routing\Router::class,
        Core\Storage\Storage::class,
    ],

    'aliases' => [
        App\Domain\Repository\PostRepository::class => App\Infrastructure\Dao\PostDbDao::class,
        App\Domain\Repository\ImageRepository::class => App\Infrastructure\Dao\ImageStorageDao::class,
    ]
];
