<?php

use Core\Database;
use Core\App;

// Connect to the database, and execute a query.

$db = App::resolve(Database::class);

$currentUserId = getCurrentUserId();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note,
]);
