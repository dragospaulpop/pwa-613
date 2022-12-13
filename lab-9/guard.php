<?php
  function hasAccess () {
    if (!isset($_SESSION)){
      session_start();
    }

    return isset($_SESSION['username']);
  }
?>