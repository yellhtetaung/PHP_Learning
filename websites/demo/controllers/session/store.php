<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];

$email = $_POST["email"];
$password = $_POST["password"];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors,
    ]);

    return;
}

$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->findOrFail();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        exit();
    }
}


view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
