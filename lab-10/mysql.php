<?php
  function connect () {
    $link = mysqli_connect('localhost', 'root', '', 'todos');

    return $link;
  }

  function login ($user, $pass) {
    $link = connect();

    $sql = "SELECT id, username  FROM `users` WHERE `username` = '$user' AND password = PASSWORD('$pass') AND active = 1;";

    $result = mysqli_query($link, $sql);

    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        return $row;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function readTodos ($id_user) {
    $link = connect();

    $sql = "SELECT *  FROM `todos` WHERE `id_user` = $id_user;";

    $result = mysqli_query($link, $sql);

    $todos = [];

    if ($result) {
      while($row = mysqli_fetch_assoc($result)) {
        $todos[] = $row;
      }
    }

    return $todos;
  }

  function addTodo ($id_user, $title) {
    $link = connect();

    $sql = "INSERT INTO `todos` (`id_user`, `title`) VALUES ('$id_user', '$title');";

    $result = mysqli_query($link, $sql);
  }

  function findTodo ($id, $id_user) {
    $link = connect();

    $sql = "SELECT *  FROM `todos` WHERE `id` = $id AND `id_user` = $id_user;";

    $result = mysqli_query($link, $sql);

    if ($result) {
      $row = mysqli_fetch_assoc($result);

      return $row;
    }

    return false;
  }

  function editTodo ($id, $id_user, $title) {
    $link = connect();

    $sql = "UPDATE `todos` SET `title` = '$title' WHERE `id` = $id AND id_user = $id_user;";

    $result = mysqli_query($link, $sql);
  }

  function deleteTodo ($id, $id_user) {
    $link = connect();

    $sql = "DELETE FROM todos WHERE `id` = $id AND id_user = $id_user;";

    $result = mysqli_query($link, $sql);
  }
?>