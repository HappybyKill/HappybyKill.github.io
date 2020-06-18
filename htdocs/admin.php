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

				<section class="jumbotron text-center">
        <div class="container">

          <h1 class="jumbotron-heading">Администратор</h1>
          <p class="lead text-muted mt-">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-secondary my-2">Авторизоваться</a>
          </p>
        </div>
      </section>

      <div class="container mt-5">
        <h3 class="mb-4 ml-5">Поп-музыка</h3>
        <div class="d-flex flex-wrap">
          <?php
          $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

            $result = $mysql->query("SELECT `Name` FROM `audio`");
            $audio = mysqli_num_rows($result);

            for($i = 0; $i < $audio; ++$i):
          ?>
              <div class="card mb-4 box-shadow">
                <img class="card-img-top img-thumbnail" style="height: 225px; width: 100%; display: block;" src="img/<?php echo ($i + 1) ?>.webp" data-holder-rendered="true">
                <div class="card-body">
                    <?php
                        $a = $i + 1;
                        $art = $mysql->query("SELECT `Name` FROM `executor` WHERE `id` = (SELECT `id_executor` FROM `audio` WHERE `id` = '$a')");
                        $executor = $art->fetch_assoc();
                        $executor = $executor['Name'];
                    ?>

                  <p class="card-text"><?php echo $executor; ?></p>

                  <?php


                        $exe = $result->fetch_assoc();
                        $exe = $exe['Name'];
                    ?>
                  <p class="card-text"><?php echo $exe; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play</button>
                    </div>
                    <small class="text-muted">33 mins</small>
                  </div>
                </div>
              </div>
          <?php endfor; ?>
          <?php 
            echo $cook;
            if($_COOKIE['admin'] != ''):
          ?>
          <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="add.php">
                <button type="button" class="btn btn-sm btn-outline-secondary ml-5">Добавить трек</button>
            </a>
            </div>
            </div>
          <?php endif; ?>
          </div>
      </div>

      <div class="container mt-5">
        <h3 class="mb-4 ml-5">Топ-треки</h3>
        <div class="d-flex flex-wrap">
          <?php
            for($i = 0; $i < 10; $i++):
          ?>
              <div class="card mb-4 box-shadow">
                <img class="card-img-top img-thumbnail" style="height: 225px; width: 100%; display: block;" src="img/TopTreck/<?php echo ($i + 1) ?>.webp" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Плейлист 1</p>
                  <p class="card-text">Tomorrow X Together</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play</button>
                    </div>
                    <small class="text-muted">33 mins</small>
                  </div>
                </div>
              </div>
          <?php endfor; ?>
          </div>
      </div>

      <?php require "blocks/footer.php" ?>

      </body>
    </html>
