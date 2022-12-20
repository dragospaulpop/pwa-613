<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }


  $id = isset($_POST['id']) ? $_POST['id'] : null;

  if ($id) {
    require('mysql.php');

    deleteTodo($id, $_SESSION['id_user']);
  }

  header('Location: index.php');
?>