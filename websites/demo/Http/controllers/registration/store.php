<?php

use Core\App;
use Core\Database;
use Core\Authenticator;
use Http\Forms\RegisterForm;

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$form = RegisterForm::validate($attributes = [
    'name' => $name,
    'email' => $email,
    'password' => $password
]);

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

    (new Authenticator)->login($user);
}

redirect('/');

