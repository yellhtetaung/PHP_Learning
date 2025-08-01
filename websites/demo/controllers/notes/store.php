<?php

use Core\Database;
use Core\App;
use Core\Validator;

// Connect to the database, and execute a query.

$db = App::resolve(Database::class);
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 characters is required";
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'Create note',
        'errors' => $errors,
    ]);
    return;
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
    ':body' => $_POST['body'],
    ':user_id' => 3,
]);

header('Location: /notes');
die();





