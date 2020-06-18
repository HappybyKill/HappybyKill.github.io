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
              <h4 class="jumbotron-heading">Регистрация</h4>
              <form action="validation-form/check.php" method="post">
                <input type="text" class="form-control" name="e-mail" id="e-mail" placeholder="e-mail"><br>
                <input type="text" class="form-control" name="login" id="login" placeholder="login"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"><br>
                <input type="password" class="form-control" name="password-again" id="password-again" placeholder="password-again"><br>
                <button class="btn btn-secondary my-2" type="submit">Зарегистрироваться</button>
              </form>
            </div>
            <div class="col">
              <h4 class="jumbotron-heading">Вход</h4>
              <form action="validation-form/auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="login"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"><br>
                <button class="btn btn-secondary my-2" type="submit">Войти</button>
              </form>
            </div>
          </div>
        </div>

        <?php require "blocks/footer.php" ?>

      </body>
    </html>
