<!DOCTYPE html>
    <html lang="ru">
		<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">

			<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
      <title>Music Life</title>
    </head>

      <body >

		<?php require "blocks/header.php" ?>

        <div class="container mb-5">
          <div class="row">
            <div class="col">
              <h4 class="jumbotron-heading">Добавить аудиозапись</h4>
              <form action="validation-form/add_music.php" method="post">
                <div>Жанр</div>
              <select name="select1" class="form-control form-control-2" id="select1">
              <?php

                $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

                $result = $mysql->query("SELECT `Name` FROM `genre`");
                $genre = mysqli_num_rows($result);


                for($i = 0; $i < $genre; ++$i):

                $a = $i + 1;
                $art = $mysql->query("SELECT `Name` FROM `genre` WHERE `id` = '$a'");

                $executor = $art->fetch_assoc();
                $executor = $executor['Name'];
              ?>


                    <option value=<?php echo $executor; ?>><?php echo $executor; ?></option>
                    <?php endfor; ?>
                </select><br>
                <div>Исполнитель</div>
                <select name="select2" class="form-control form-control-2" id="select2">
                <?php


                $result2 = $mysql->query("SELECT `Name` FROM `executor`");
                $exe = mysqli_num_rows($result2);


                for($i = 0; $i < $exe; ++$i):

                $a = $i + 1;
                $art2 = $mysql->query("SELECT `Name` FROM `executor` WHERE `id` = '$a'");

                $exec = $art2->fetch_assoc();
                $exec = $exec['Name'];
              ?>


                    <option value=<?php echo $exec; ?>><?php echo $exec; ?></option>
                    <?php endfor; ?>
                </select><br><br>
                <input type="text" class="form-control form-control-2" name="name" id="name" placeholder="Название"><br>
                <button class="btn btn-secondary my-2" type="submit">Добавить</button>
              </form>
            </div>
        </div>

        <?php require "blocks/footer.php" ?>

      </body>
    </html>
