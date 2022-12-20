<?php
  if (!isset($_SESSION['username'])) {
    session_start();
  }
  unset($_SESSION['username']);

  header('Location: login.php');
?>