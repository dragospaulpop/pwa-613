<?php
  require_once('guard.php');

  if (!hasAccess()) {
    header('Location: login.php');
  }
?>
<table class="striped">
  <thead>
    <tr>
      <th>user id</th>
      <th>id</th>
      <th>title</th>
      <th>completed</th>
      <th>actions</th>
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
      <td>
        <div style="display: flex">
          <form action="delete.php" method="post" style="margin: 0 1em">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="userid" value="<?= $row['userId'] ?>">
            <button class="btn red">
              <i class="material-icons">delete</i>
            </button>
          </form>
          <form action="editForm.php" method="get" style="margin: 0 1em">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="userid" value="<?= $row['userId'] ?>">
            <button class="btn blue">
              <i class="material-icons">edit</i>
            </button>
          </form>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>