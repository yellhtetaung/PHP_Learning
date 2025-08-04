<?php

use Core\Database;
use Core\App;

// Connect to the database, and execute a query.

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes')->get();

view('notes/notes.view.php', [
    'heading' => 'Notes',
    'notes' => $notes,
]);


