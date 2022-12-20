<?php
  function hasAccess () {
    if (!isset($_SESSION)){
      session_start();
    }

    return isset($_SESSION['username']) && isset($_SESSION['id_user']);
  }
?>