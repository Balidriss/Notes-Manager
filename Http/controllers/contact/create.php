<?php

view("contact/create.view.php", [
    'errors' => Core\Session\Session::get('errors'),
]);
