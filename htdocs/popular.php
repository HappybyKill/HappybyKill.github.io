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
          <h1 class="jumbotron-heading">Популярная музыка</h1>
        </div>
      </section>

      <div class="container mt-5">
        <h3 class="mb-4 ml-5">Поп-музыка</h3>
        <div class="d-flex flex-wrap">
          <?php
          $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

            $result = $mysql->query("SELECT `id` FROM `popular`");
            $audio = mysqli_num_rows($result);

            for($i = 0; $i < $audio; ++$i):
          ?>
              <div class="card mb-4 box-shadow">
                <img class="card-img-top img-thumbnail" style="height: 225px; width: 100%; display: block;" src="img/<?php echo ($i + 1) ?>.webp" data-holder-rendered="true">
                <div class="card-body">
                    <?php
                        $a = $i + 1;
                        $art = $mysql->query("SELECT `Name` FROM `execotur` WHERE `id` = (SELECT `id_executor` FROM `audio` WHERE `id` = (SELECT `id_audio` FROM `popular` WHERE `id` = '$a'))");
                        $executor = $art->fetch_assoc();
                        $executor = $executor['Name'];
                    ?>

                  <p class="card-text"><?php echo $executor; ?></p>

                  <?php

                        $art2 = $mysql->query("SELECT `Name` FROM `audio` WHERE `id` = (SELECT `id_audio` FROM `popular` WHERE `id` = '$a')");
                        $exe = $art2->fetch_assoc();
                        $exe = $exe['Name'];
                    ?>
                  <p class="card-text"><?php echo $exe; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play</button>
                    </div>
                    <small class="text-muted">3 mins</small>
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

      <?php require "blocks/footer.php" ?>

      </body>
    </html>
