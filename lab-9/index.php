<?php
  require_once('guard.php');

  if (hasAccess()) {
    require_once('./readDb.php');
  } else {
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require_once('./head.php'); ?>
<body>
  <?php include('./addForm.php'); ?>

  <?php include('./table.php'); ?>
</body>
</html>
