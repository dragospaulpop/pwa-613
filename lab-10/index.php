<?php
  require_once('guard.php');

  if (hasAccess()) {
    require_once('./mysql.php');

    $data = readTodos($_SESSION['id_user']);
  } else {
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require_once('./head.php'); ?>
<body>
  <a href="logout.php">Logout, <?= $_SESSION['username']; ?></a>
  <?php include('./addForm.php'); ?>

  <?php include('./table.php'); ?>
</body>
</html>
