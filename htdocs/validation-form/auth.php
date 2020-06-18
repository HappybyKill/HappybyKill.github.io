<?php
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

  $password = md5($password."f2ghj31k4d");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

  $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
  $user = $result->fetch_assoc();
  if (count($user) == 0) {

    $result = $mysql->query("SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");
    $user = $result->fetch_assoc();


    if (count($user) != 0) {
      setcookie('admin', $user['login'], time() + 3600, "/");

      $mysql->close();

      header('Location: /');
      exit();
    }
    else{
      echo "Пользователь не найден";
      exit();
    }
  }

  setcookie('user', $user['login'], time() + 3600, "/");

  $mysql->close();

  header('Location: /');
 ?>
