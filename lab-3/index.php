<?php
  $dbFile= "./todos.json";
  $fileExists = file_exists($dbFile);
  if($fileExists){
    $rawData=file_get_contents($dbFile);
  } else {
    $rawData = file_get_contents('https://jsonplaceholder.typicode.com/todos/');
    file_put_contents($dbFile,$rawData);
  }
  $data = json_decode($rawData, true);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Title" id="title" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
    </form>
  </div>
  <table class="striped">
    <thead>
      <tr>
        <th>user id</th>
        <th>id</th>
        <th>title</th>
        <th>completed</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data as $row): ?>
      <tr>
        <?php foreach($row as $index=>$cell): ?>
          <?php if($index === 'completed'): ?>
            <td>
              <?php if($cell == 1): ?>
                <i class="material-icons green-text">done</i>
              <?php else: ?>
                <i class="material-icons red-text">close</i>
              <?php endif; ?>                            
            </td>
            <?php else: ?>
            <td><?= $cell; ?></td>
          <?php endif; ?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
