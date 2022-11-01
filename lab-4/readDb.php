<?php
    $dbFile= "./todos.json";
    $fileExists = file_exists($dbFile);
    if($fileExists){
      $rawData=file_get_contents($dbFile);
    } else {
      $rawData = file_get_contents('https://jsonplaceholder.typicode.com/todos/');
      file_put_contents($dbFile, $rawData);
    }
    $data = json_decode($rawData, true);
?>