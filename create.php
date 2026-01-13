<?php
require 'db.php';
require 'header.php';

if ($_POST && !empty($_POST['name'])) {
    execSQL(
        "INSERT INTO students (name) VALUES (?)",
        [$_POST['name']]
    );
    header("Location: index.php");
    exit;
}
?>

<h2>Add Student</h2>

<form method="post">
  <input
    name="name"
    placeholder="Student name"
    required
  >
  <button>Save</button>
</form>

<?php require 'footer.php'; ?>
