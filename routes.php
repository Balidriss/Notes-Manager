<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/contact', 'contact/create.php');
$router->post('/contact', 'contact/store.php');
$router->get('/submited', 'contact/success.php');

$router->get('/notes', 'notes/index.php')->only('log');
$router->get('/note', 'notes/show.php')->only('log');
$router->delete('/note', 'notes/destroy.php')->only('log');

$router->get('/note/edit', 'notes/edit.php')->only('log');
$router->patch('/note', 'notes/update.php')->only('log');

$router->get('/notes/create', 'notes/create.php')->only('log');
$router->post('/notes', 'notes/store.php')->only('log');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');

$router->delete('/session', 'session/destroy.php')->only('log');
