<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
          <script src="js/uikit.min.js"></script>
            <script src="js/uikit-icons.min.js"></script>
    <title>PLN PASCA BAYAR</title>
  </head>
  <body>
    <div class="uk-background-primary uk-light uk-padding uk-panel" style="background-image: linear-gradient(#92E6FB, #6DD5ED);">


    <nav class="uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <img src="img/logo.png" style="margin-left: 1em;"alt="" width="150">
      </div>

    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
              <button class="btn-login" type="submit" name="button"
              style="margin-top:25px; margin-right: 10px;"><a href="#my-id" uk-toggle>LOGIN</a></button>
              <div id="my-id" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                  <h2>Login Sebagai</h2>
                  <button class="uk-modal-close-default" type="button" uk-close></button>
                  <button style="width:200px; background: rgb(251, 8, 8);" onclick="window.location.href='login-admin.php';" class="btn-register" type="submit" name="register">Sebagai Admin</button>
                  <button style="width:200px; margin: 10px; background: #0038FF;" onclick="window.location.href='login.php';" class="btn-register" type="submit" name="register">Sebagai User</button>
                </div>
              </div>
            </li>
            <li>
             <button style="margin-top:25px; margin-right: 10px; font-size:14px;" class="btn-register" type="submit" name="button"><a href="#modal-center" uk-toggle>REGISTER</a></button>
              <div id="modal-center" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                  <h2>Register Sebagai</h2>
                  <button class="uk-modal-close-default" type="button" uk-close></button>
                  <button style="width:200px; background: rgb(251, 8, 8);" onclick="window.location.href='register-admin.php';" class="btn-register" type="submit" name="register">Sebagai Admin</button>
                  <button style="width:200px; margin: 10px; background: #0038FF;" onclick="window.location.href='register.php';" class="btn-register" type="submit" name="register">Sebagai User</button>
                </div>
              </div>
            </li>
        </ul>

      </div>

    </nav>
<br>
<br>

    <div style="margin:2em;"class="uk-child-width-expand@s" uk-grid>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body">
              <img src="img/bayar.jpg" alt="">
            </div>
         </div>
        <div style="margin-top: 3em;" >
            <h2 style="background:white; color:#3D5CFF; width: 220px; font-family:Roboto; text-align: center; border-radius: 20px; padding:7px;" >
            AYO BAYAR
          </h2>
            <p style="color:black;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

        </div>
    </div>

    <div style="margin:2em;"class="uk-child-width-expand@s" uk-grid>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body">
              <img src="img/tagihan.jpg" alt="">
            </div>
         </div>
        <div style="margin-top: 3em;">
            <h2 style="background:white; color:#3D5CFF; width: 220px; font-family:Roboto; text-align: center; border-radius: 20px; padding:7px;" >
            TAGIHAN
          </h2>
            <p style="color:black;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

        </div>
    </div>

    <div style="margin:2em;" class="uk-child-width-expand@s" uk-grid>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body">
              <img src="img/pesan.jpg" alt="">
            </div>
         </div>
        <div>
            <h2 style="background:white; color:#3D5CFF; width: 220px; font-family:Roboto; text-align: center; border-radius: 20px; padding:7px;" >
              RIWAYAT
          </h2>
            <p style="color:black;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

        </div>
    </div>
  </div>

  </body>
</html>
