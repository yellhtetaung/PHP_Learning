<?php

// Connect to the database, and execute a query.

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Notes";

$notes = $db->query('SELECT * FROM notes')->get();

require "views/notes.view.php";

