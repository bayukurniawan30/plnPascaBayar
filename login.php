<?php
  $error = isset($_GET['error']) ? $_GET['error'] : NULL;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Login</title>
  </head>
  <body>
        <div class="image-container">
          <div class="login-container">
            <div class="login-wrap">

              <h1 style="text-align: center; color:white">LOGIN</h1>
              <form action="action/login-action.php" method="post">
                <?php if ($error == "0") : ?>
                  <p style="text-align: center; margin: 0; padding: 0;color: red;">Username or Password Invalid</p>
                <?php endif; ?>

                <div class="uk-margin">
                  <div class="uk-inline">
                    <span class="uk-form-icon " uk-icon="icon: user"></span>
                    <input class="uk-input uk-form-width-large" type="text" placeholder="Username" value="" name="username" required>
                  </div>
                </div>

                <div class="uk-margin">
                  <div class="uk-inline">
                    <span class="uk-form-icon " uk-icon="icon: lock"></span>
                    <input class="uk-input uk-form-width-large" type="password" placeholder="Password" value="" name="password" required>
                  </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Login</button>
                </div>
                <p class="uk-text-center">Don't have account | <a style="color:white;" href="register.php">Create an account</a></p>

              </form>
            </div>
          </div>
        </div>
    </body>
</html>
