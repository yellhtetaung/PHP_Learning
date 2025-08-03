<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if (!Validator::string($name, 3, 255)) {
    $errors['name'] = 'Please provide a name of at least 3 characters.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors,
    ]);

    return;
}

$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if (!$user) {
    $db->query('INSERT INTO users(name, email, password) VALUES (:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    login($user);
}

header('location: /');
exit();

