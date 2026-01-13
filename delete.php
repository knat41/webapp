<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die('No ID');

execSQL(
    "DELETE FROM students WHERE id=?",
    [$id]
);

header("Location: index.php");
exit;
