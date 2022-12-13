<?php
  $username = isset($_POST['username']) ? trim($_POST['username']) : null;
  $password = isset($_POST['password']) ? trim($_POST['password']) : null;

  if ($username && $password) {
    if ($username === 'User1' && $password === 'pass') {
      session_start();
      $_SESSION['username'] = 'User1';
      header('Location: index.php');
    } else {
      $msg = 'Credentiale incorecte';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php require_once('./head.php'); ?>
<body>
  <div class="row">
    <div class="col s12">
      <div class="card-panel">
        <span class="card-title">Login</span>
        <form action="login.php" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input
                placeholder="Username"
                id="username"
                type="text"
                class="validate"
                name="username">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input
                placeholder="Password"
                id="password"
                type="password"
                class="validate"
                name="password">
              <label for="Password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button class="btn blue">Login</button>
            </div>
          </div>
          <?php if (isset($msg)): ?>
            <div class="row">
              <p class="red-text"><?= $msg; ?></p>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</body>
</html>