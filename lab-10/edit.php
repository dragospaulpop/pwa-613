<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }

  $id = isset($_POST['id']) ? $_POST['id'] : null;
  $title = isset($_POST['title']) ? trim($_POST['title']) : null;

  if ($id && strlen($title)) {
    require_once('mysql.php');

    editTodo($id, $_SESSION['id_user'], $title);
  }

  header('Location: index.php');
?>