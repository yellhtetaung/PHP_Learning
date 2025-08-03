<?php

use Core\Database;
use Core\App;
use Core\Validator;

// Connect to the database, and execute a query.

$db = App::resolve(Database::class);

$currentUserId = 3;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 characters is required";
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
    return;
}


$db->query('UPDATE notes SET body = :body WHERE id = :id', [':body' => $_POST['body'], ':id' => $_POST['id']]);

header('Location: /notes');
exit();
