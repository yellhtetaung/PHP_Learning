<?php

// Connect to the database, and execute a query.

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Notes";

$currentUserId = 3;
$note = $db->query('SELECT * FROM notes WHERE id = :id', [':id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";

