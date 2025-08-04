<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;

$email = $_POST["email"];
$password = $_POST["password"];


$form = LoginForm::validate($attributes = [
    'email' => $email,
    'password' => $password
]);


$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form->error('email', 'No matching account found for that email address and password.')->throw();
}

redirect('/');
