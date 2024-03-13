<?php
view("contact/success.view.php", [
    'heading' => 'Thank you',
    'errors' => Core\Session\Session::get('errors'),
]);
