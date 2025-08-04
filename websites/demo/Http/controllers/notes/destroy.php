<?php

use Core\Database;
use Core\App;

// Connect to the database, and execute a query.

$db = App::resolve(Database::class);

$currentUserId = getCurrentUserId();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [':id' => $_POST['id']]);

header('Location: /notes');
exit();
