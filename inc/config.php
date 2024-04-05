<?php
// Database connection file
$db = new SQLite3('inc/form_database.db');

// Create table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS tblskills (id INTEGER PRIMARY KEY, skill TEXT)");
?>