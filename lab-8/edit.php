<?php
  require_once('./readDb.php');

  $title = $_POST['title'];
  $titleExists = isset($title);
  $sanitizedTitle = trim($title);
  $titleLength = strlen($sanitizedTitle);

  $id = $_POST['id'];
  $userId = $_POST['userid'];
  $idsExist = isset($id) && isset($userId);

  if ($titleExists && $titleLength && $idsExist) {
    $foundIndex = null;
    foreach ($data as $index => $todo) {
      if ($todo['id'] == $id && $todo['userId'] == $userId) {
        $foundIndex = $index;
        break;
      }
    }

    if ($foundIndex !== null) {
      $data[$foundIndex]['title'] = $sanitizedTitle;
      $dataString = json_encode($data);
      file_put_contents($dbFile, $dataString);
    }
  } else {
    header('Location: index.php');
  }
  header('Location: index.php');
?>