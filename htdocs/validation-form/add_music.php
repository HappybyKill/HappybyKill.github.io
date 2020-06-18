<?php
  $genre = filter_var(trim($_POST['select1']),FILTER_SANITIZE_STRING);
  $executor = filter_var(trim($_POST['select2']),FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
  
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

  $result = $mysql->query("SELECT `id` FROM `genre` WHERE `Name` = '$genre'");
  $gn = $result->fetch_assoc();
    $gn = $gn['id'];
    
    $res = $mysql->query("SELECT `id` FROM `executor` WHERE `Name` = '$executor'");
  $ex = $res->fetch_assoc();
    $ex = $ex['id'];
    
  $mysql->query("INSERT INTO `audio` (`id_genre`, `id_executor`, `Name`)
  VALUES('$gn', '$ex', '$name')");

  $mysql->close();

  header('Location: /admin.php');
 ?>
