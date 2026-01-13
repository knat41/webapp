<?php
require 'db.php';
require 'header.php';

$rows = all("SELECT * FROM students");
?>

<h2>Students</h2>

<a href="create.php" role="button">+ Add</a>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  <?php if (empty($rows)): ?>
    <tr><td colspan="2">No data</td></tr>
  <?php endif ?>

  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= htmlspecialchars($r['name']) ?></td>
      <td>
        <a href="edit.php?id=<?= $r['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $r['id'] ?>"
           onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
  <?php endforeach ?>

  </tbody>
</table>

<?php require 'footer.php'; ?>
