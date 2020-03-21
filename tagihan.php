<?php
  require 'include/connection.php';
  require 'include/class/userclass.php';

  $classUsers = new UsersClass($pdo);

  $userid = $_SESSION['id'];
  $loginId = $classUsers->loginUser($userid);
  $username = $loginId->username;
  $alamat = $loginId->alamat;
  $nomor_kwh = $loginId->nomor_kwh;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" href="style.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/uikit.css" />
      <link rel="stylesheet" href="style.css">
      <script src="js/uikit.min.js"></script>
      <script src="js/uikit-icons.min.js"></script>

    <title>PLN PASCA BAYAR</title>
  </head>
  <body>
        <nav style="background-color: black;"class="uk-navbar uk-navbar-container uk-margin">
          <div class="uk-navbar-left">
              <a style="color:white; margin-top:2px;"class="uk-navbar-toggle" uk-navbar-toggle-icon href="#my-id" uk-toggle></a>
              <h3 style="margin: 0; color:white;">PLN PASCA BAYAR</h3>
          </div>
          <div style="color:white;" class="uk-navbar-right uk-margin-right">=
                <a style="color:white;" class="uk-navbar-toggle" uk-search-icon href="#"></a>
                <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                    <form class="uk-search uk-search-navbar uk-width-1-1">
                        <input style="color:white;" class="uk-search-input" type="search" placeholder="Search..." autofocus>
                    </form>
                </div>
          </div>
        </nav>

        <div id="my-id" uk-offcanvas="overlay: true">
            <div class="uk-offcanvas-bar">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <h3>Menu</h3>
                <a style="text-decoration: none;" href="pembayaran.php"><span uk-icon="icon: cart"></span> Pembayaran</a><br><br>
                <a style="text-decoration: none;" href="tagihan.php"><span uk-icon="icon: credit-card"></span> Tagihan</a><br><br>
                <a style="text-decoration: none;" href="riwayat.php"><span uk-icon="icon: history"></span> Riwayat</a><br><br>
                <a style="text-decoration: none;" href="action/logout-action.php"><span uk-icon="icon: sign-out"></span> Sign Out</a><br><br>
            </div>
        </div>

        <div class="uk-child-width-1-2@s" uk-grid>
          <div>
            <div style="position:relative; top: 1%; left: 50%;" class="uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">TAGIHAN</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title"><?= $username ?></h3>
                <ul>
                  <li>Nama Lengkap : <?= $username; ?></li>
                  <li>No Meter : <?= $nomor_kwh; ?></li>
                  <li>Alamat : <?= $alamat; ?> </li>
                  <li>Bulan : </li>
                  <li>Tahun : </li>
                  <li>Jumlah Meter : </li>
                </ul>
                  <button onclick="window.location.href='pembayaran.php';" class="uk-button uk-button-primary uk-button-xlarge" type="submit" name="button"> BAYAR </button>
              </div>
            </div>
          </div>

      </div>

    </body>
  </html>
