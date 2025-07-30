<?php

require 'function.php';
//require 'router.php';
require 'Database.php';

// Connect to the database, and execute a query.

$config = require('config.php');

$db = new Database($config['database']);
$posts = $db->query("SELECT * FROM `posts` WHERE id = :id", [':id' => 1])->fetchAll();

dd($posts);