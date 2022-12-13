<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }
  require_once('./readDb.php');

  $id = $_POST['id'];
  $userId = $_POST['userid'];

  $idsExist = isset($id) && isset($userId);

  if ($idsExist) {
    $newTodos = [];
    foreach ($data as $todo) {
      if (!($todo['id'] == $id && $todo['userId'] == $userId)) {
        $newTodos[] = $todo;
      }
    }

    $dataString = json_encode($newTodos);
    file_put_contents($dbFile, $dataString);

    header('Location: index.php');
  }
?>