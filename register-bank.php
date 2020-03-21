<?php

  $page = isset($_GET['page']) ? $_GET['page'] : NULL;
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
    <title>Register Bank</title>
  </head>
  <body>
    <div class="image-container">
    <div style="height: 80vh;" class="register-container">
      <div  style="top: 15%;" class="register-wrap">

        <h1 style="text-align: center; color:white">REGISTER BANK</h1>
        <form action="action/register-bank-action.php" method="post">

          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon " uk-icon="icon: user"></span>
              <input class="uk-input uk-form-width-large" type="text" placeholder="Username" name="username" required>
            </div>
          </div>

          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon " uk-icon="icon: user"></span>
              <input class="uk-input uk-form-width-large" type="text" placeholder="Email" name="email" required>
            </div>
          </div>

          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon " uk-icon="icon: lock"></span>
              <input class="uk-input uk-form-width-large" type="password" placeholder="Password" name="password" required>
            </div>
          </div>

          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon " uk-icon="icon: lock"></span>
              <input class="uk-input uk-form-width-large" type="password" placeholder="Re-Type password" name="password2" required>
            </div>
          </div>

            <button class="uk-button uk-width-1-1  uk-button-primary" type="submit"
            style=" margin-right: 10px;">REGISTER</button>
          </form>
        </div>
      </div>
    </div>

    <?php

      if ($page == 'register'):
        if ($error == '2'):
          echo "<script>
                  alert('Email Sudah Ada !');
                </script>";

                elseif ($error == '3'):
                  echo "<script>
                          alert('Password Tidak Sama');
                        </script>";

                      else :
                        echo "<script>
                                alert('Data Gagal Masuk');
                              </script>";

                    endif;
                  endif;
    ?>
  </body>
</html>
