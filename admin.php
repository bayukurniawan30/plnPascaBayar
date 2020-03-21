<?php
  require 'include/connection.php';
  require 'include/class/userclass.php';
    if (empty($_SESSION['login'])) {
      header("Location:login-admin.php");
      exit;
    }
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
                <a style="text-decoration: none;" href="register-bank.php"><p><span uk-icon="icon: user"></span> Tambah User Bank</p></a>
                <a style="text-decoration: none;" href="#"><p><span uk-icon="icon: history"></span>  Riwayat Pembayaran</p></a>
                <a style="text-decoration: none;" href="action/logout-action.php"><p><span uk-icon="icon: sign-out"></span> Sign Out</p></a>
            </div>
        </div>

        <div class="uk-child-width-1-2@s" uk-grid>

          <div>
            <div class="uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">PEMBAYARAN</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title">Dananjaya</h3>
                <ul>
                  <li>Nama Lengkap : I Gusti Dananjaya</li>
                  <li>No Meter : 510078987</li>
                  <li>Alamat : Jalan Jauh Banget </li>
                  <li>No Telp : 08009098089 </li>
                  <li>Total Tagihan dan Pajak Bank : Rp. 200.000</li>
                </ul>
                <h3>Status : LUNAS !</h3>
              </div>
            </div>
          </div>

          <div>
            <div style="margin-top: 15px;"class="uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">TAGIHAN</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title">Dananjaya</h3>
                <ul>
                  <li>Nama Lengkap : I Gusti Dananjaya</li>
                  <li>No Meter : 510078987</li>
                  <li>Alamat : Jalan Jauh Banget </li>
                  <li>No Telp : 08009098089 </li>
                  <li>Tanggal Tunggak : 02-03-2020 s/d 02-04-2020</li>
                  <li>Tagihan Listrik : Rp. 195.000</li>
                  <li>Pajak Bank : Rp. 5.000</li>
                </ul>
              </div>
            </div>
          </div>
      </div>

        <div class="uk-child-width-1-2@s" uk-grid>
          <div>
            <div class="uk-card uk-card-default uk-card-xlarge uk-card-body">
              <h3 class="uk-card-title">RIWAYAT PEMBAYARAN</h3>
              <div class="uk-card uk-card-default uk-card-small uk-card-body uk-card-hover">
                <h3 class="uk-card-title">Dananjaya</h3>
                <ul>
                  <li>Nama Lengkap : I Gusti Dananjaya</li>
                  <li>No Meter : 510078987</li>
                  <li>Alamat : Jalan Jauh Banget </li>
                  <li>No Telp : 08009098089 </li>
                  <li>Tanggal Tunggak : 02-03-2020 s/d 02-04-2020</li>
                  <li>Tagihan Listrik : Rp. 195.000</li>
                  <li>Pajak Bank : Rp. 5.000</li>
                  <li>Total Tagihan dan Pajak Bank : Rp. 200.000</li>
                </ul>
                <h3>Status : LUNAS !</h3>
              </div>
            </div>
          </div>

          <div>
            <div class=" uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">LAPORAN BANK</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title">Dananjaya</h3>
                <ul>
                  <li>Nama Lengkap : I Gusti Dananjaya</li>
                  <li>No Meter : 510078987</li>
                  <li>Alamat : Jalan Jauh Banget </li>
                  <li>No Telp : 08009098089 </li>
                  <li>Tanggal Tunggak : 02-03-2020 s/d 02-04-2020</li>
                  <li>Tagihan Listrik : Rp. 195.000</li>
                  <li>Pajak Bank : Rp. 5.000</li>
                  <li>Total Tagihan dan Pajak Bank : Rp. 200.000</li>
                </ul>
              <button class="uk-button uk-button-primary uk-button-xlarge" type="button" href="#modal-center" name="button" uk-toggle>Generate Laporan</button>
              </div>
            </div>
          </div>

        </div>

        <div id="modal-center" class="uk-flex-top" uk-modal>
          <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <ul class="uk-list uk-list-divider">
              <li><h2>BANK</h2></li>
              <li>Nama Pembeli</li>
              <ul>
                <li>I Gusti Dananjaya</li>
              </ul>
              <li>Alamat</li>
              <ul>
                <li>Jalan Jauh Banget</li>
              </ul>
              <li>Nomer Hp</li>
              <ul>
                <li>08089898909</li>
              </ul>
              <li>Tanggal Tunggak</li>
              <ul>
                <li>02-06-2020 s/d 02-07-2020</li>
              </ul>
              <li>Total Bayar</li>
              <ul>
                <li>Rp. 200.000</li>
              </ul>
            </ul>
            <h3>TERCETAK ✔</h3>
            <hr class="uk-divider-icon">
          </div>
          <!-- Data Modal Barang Pembeli End Session -->
        </div>

    </body>
  </html>
