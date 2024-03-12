<?php

use Core\Container;
use Core\App;

$container = new Container();

$container->bind('Core\Database', function () {

    $config = require base_path('config.php');
    return new Core\Database($config['database']);
});

$container->resolve('Core\Database');

App::setContainer($container);
