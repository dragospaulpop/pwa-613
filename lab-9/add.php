<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }

  require_once('./readDb.php');

  $title = $_POST['title'];
  $titleExists = isset($title);
  $sanitizedTitle = trim($title);
  $titleLength = strlen($sanitizedTitle);

  if ($titleExists && $titleLength) {
    $data[] = [
      "userId" => 1,
      "id" => generateId($data, 1),
      "title" => $sanitizedTitle,
      "completed" => false
    ];
  }

  $dataString = json_encode($data);
  file_put_contents($dbFile, $dataString);

  header('Location: index.php');

  function generateId ($data, $userId) {
    $userTodos = [];
    foreach($data as $todo) {
      if ($todo['userId'] === $userId) {
        $userTodos[] = $todo;
      }
    }

    $maxId = 0;
    foreach($userTodos as $todo) {
      if ($todo['id'] > $maxId) {
        $maxId = $todo['id'];
      }
    }

    return $maxId + 1;
  }
?>