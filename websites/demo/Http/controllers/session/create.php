<?php

use Core\Session;

view('session/create.view.php', [
    'errors' => Session::getFlash('errors') ?? [],
]);
