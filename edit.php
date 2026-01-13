<?php
require 'db.php';
require 'header.php';

$id = $_GET['id'] ?? null;
if (!$id) die('No ID');

$row = one(
    "SELECT * FROM students WHERE id=?",
    [$id]
);

if ($_POST && !empty($_POST['name'])) {
    execSQL(
        "UPDATE students SET name=? WHERE id=?",
        [$_POST['name'], $id]
    );
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Student</h2>

<form method="post">
  <input
    name="name"
    value="<?= htmlspecialchars($row['name']) ?>"
    required
  >
  <button>Update</button>
</form>

<?php require 'footer.php'; ?>
