<?php
$container = new Core\Container();

$container->bind('Core\Database', function () {

    $config = require base_path('config.php');
    return new Core\Database($config['database']);
});

$db = $container->resolve('Core\Database');

Core\App::setContainer($container);
