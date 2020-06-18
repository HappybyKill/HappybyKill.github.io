<?php
  $email = filter_var(trim($_POST['e-mail']),FILTER_SANITIZE_STRING);
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
  $password_again = filter_var(trim($_POST['password-again']),FILTER_SANITIZE_STRING);

  if(mb_strlen($email) < 5 || mb_strlen($email) > 90) {
    echo "Недопустимый e-mail адрес";
    exit();
  } else if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
  } else if(mb_strlen($password) < 2 || mb_strlen($password) > 6) {
    echo "Пароль должен быть от 2 до 6 символов";
    exit();
  } else if($password != $password_again) {
    echo "Пароли не совпадают";
    exit();
  }

  $password = md5($password."f2ghj31k4d");
  $password_again = md5($password_again."f2ghj31k4d");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $mysql->query("INSERT INTO `users` (`e-mail`, `login`, `password`, `password-again`)
  VALUES('$email', '$login', '$password', '$password_again')");

  $mysql->close();

  header('Location: /');
?>
