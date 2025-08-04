<?php

use Core\Session;

view('registration/create.view.php', [
    'errors' => Session::getFlash('errors') ?? [],
]);
