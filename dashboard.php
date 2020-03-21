<?php
  require 'include/connection.php';
  require 'include/class/userclass.php';
    if (empty($_SESSION['login'])) {
      header("Location:login.php");
      exit;
    }
?>
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
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <button onclick="window.location.href='pembayaran.php';" class="btn-lihat-detail" type="submit" name="login" style="margin-top:25px; margin-right: 10px;">
              LIHAT DETAIL<span uk-icon="icon: arrow-right"></span>
            </button>
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
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <button onclick="window.location.href='tagihan.php';" class="btn-lihat-detail" type="submit" name="login" style="margin-top:25px; margin-right: 10px;">
              LIHAT DETAIL<span uk-icon="icon: arrow-right"></span>
            </button>
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
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <button onclick="window.location.href='riwayat.php';" class="btn-lihat-detail" type="submit" name="login" style="margin-top:25px; margin-right: 10px;">
              LIHAT DETAIL<span uk-icon="icon: arrow-right"></span>
            </button>
        </div>
    </div>

  </div>

  </body>
</html>
