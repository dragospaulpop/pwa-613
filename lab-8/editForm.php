<?php
  require_once('./readDb.php');

  $id = $_GET['id'];
  $userId = $_GET['userid'];

  $idsExist = isset($id) && isset($userId);

  if ($idsExist) {
    $foundTodo = false;
    foreach ($data as $todo) {
      if ($todo['id'] == $id && $todo['userId'] == $userId) {
        $foundTodo = $todo;
      }
    }

    if (!$foundTodo) {
      header('Location: index.php');
    }
  } else {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require_once('./head.php'); ?>
  <body>
    <div class="row">
      <div class="col s12">
        <div class="card-panel">
          <span class="card-title">Modificare Todo</span>
          <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?= $foundTodo['id'] ?>">
            <input type="hidden" name="userid" value="<?= $foundTodo['userId'] ?>">
            <div class="row">
              <div class="input-field col s6">
                <input
                  placeholder="Todo title"
                  id="title"
                  type="text"
                  class="validate"
                  name="title"
                  value="<?= $foundTodo['title']; ?>">
                <label for="title">Titlu</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <button class="btn blue">Modifica</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

