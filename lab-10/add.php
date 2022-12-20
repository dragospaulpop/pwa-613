<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }

  $title = isset($_POST['title']) ? trim($_POST['title']) : null;

  if ($title && strlen($title)) {
    require_once('mysql.php');

    addTodo($_SESSION['id_user'], $title);
  }

  header('Location: index.php');
?>