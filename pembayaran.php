<?php
require 'include/connection.php';
require 'include/class/userclass.php';

$userid = $_SESSION['id'];

$classUsers = new UsersClass($pdo);

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
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Pembayaran</title>
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
        <div style="position:relative; top: 1%; left: 50%;" class=" uk-card uk-card-default uk-card-xlarge uk-card-body ">
          <h3 class="uk-card-title">PEMBAYARAN</h3>
          <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
            <h3 class="uk-card-title"><?=$username;?></h3>
            <ul>
              <li>Nama Lengkap : <?=$username;?></li>
              <li>No Meter : <?=$nomor_kwh;?></li>
              <li>Alamat : <?=$alamat;?> </li>

              <form action="action/penggunaan-action.php" method="post">
              <li>
                <?php
                  $bulan_sekarang = date('m');
                ?>
                Bulan :
                <select name="bulan">
                    <option value="01" <?=$bulan_sekarang == '01' ? 'selected="selected"' : ''?>>Januari</option>
                    <option value="02" <?=$bulan_sekarang == '02' ? 'selected="selected"' : ''?>>Februari</option>
                    <option value="03" <?=$bulan_sekarang == '03' ? 'selected="selected"' : ''?>>Maret</option>
                    <option value="04" <?=$bulan_sekarang == '04' ? 'selected="selected"' : ''?>>April</option>
                    <option value="05" <?=$bulan_sekarang == '05' ? 'selected="selected"' : ''?>>Mei</option>
                    <option value="06" <?=$bulan_sekarang == '06' ? 'selected="selected"' : ''?>>Juni</option>
                    <option value="07" <?=$bulan_sekarang == '07' ? 'selected="selected"' : ''?>>Juli</option>
                    <option value="08" <?=$bulan_sekarang == '08' ? 'selected="selected"' : ''?>>Agustus</option>
                    <option value="09" <?=$bulan_sekarang == '09' ? 'selected="selected"' : ''?>>September</option>
                    <option value="10" <?=$bulan_sekarang == '10' ? 'selected="selected"' : ''?>>Oktober</option>
                    <option value="11" <?=$bulan_sekarang == '11' ? 'selected="selected"' : ''?>>November</option>
                    <option value="12" <?=$bulan_sekarang == '12' ? 'selected="selected"' : ''?>>Desember</option>
                </select>
              </li>
              <li>
                Tahun :
                <?php
                  $tahun_lalu = date('Y') - 1;
                  $tahun_sekarang = date('Y');
                ?>
                <select  name="tahun">
                  <option value="<?=$tahun_lalu?>"><?=$tahun_lalu?></option>
                  <option value="<?=$tahun_sekarang?>" selected="selected"><?=$tahun_sekarang?></option>
                </select>
              </li>
              <li>
                Meter Awal :
                <input type="tel" name="meter_awal" placeholder="KWH" value="">
              </li>
              <li>
                Meter Akhir :
                <input type="tel" name="meter_akhir" placeholder="KWH" value="">
              </li>
            </ul>
          <button class="uk-button uk-button-primary uk-button-xlarge" type="submit" href="#modal-center" name="button" uk-toggle>BAYAR</button>
        </form>

            <h3>Status : <button class="uk-button uk-button-danger" disabled>Belum Lunas</button> </h3>
          </div>
        </div>
      </div>
    </div>

      <!-- <div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

          <button class="uk-modal-close-default" type="button" uk-close></button>

          <form action="bank-action.php" method="post">
            <ul class="uk-list uk-list-divider">
              <li>No Rekening</li>
              <ul>
                <li><input class="uk-input uk-form-width-large " type="number" placeholder="Masukan No Rekening ..."></li>
              </ul>
              <li>Saldo Anda</li>
              <ul>
                <li>Rp. 1.000.000</li>
              </ul>
              <li><button class="uk-button uk-button-primary uk-button-xlarge" type="button" href="#modal-center-2" name="button" uk-toggle>BELI</button></li>
            </ul>
          </form>
          <hr class="uk-divider-icon">
        </div>
      </div>

      <div id="modal-center-2" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
          <button class="uk-modal-close-default" type="button" uk-close></button>
            <ul class="uk-list uk-list-divider">
              <li><h2 style="text-align: center;">LUNAS</h2></li>
              <li>Sisa Saldo</li>
              <ul>
                <li>Rp.800.000</li>
              </ul>
            </ul>
          <hr class="uk-divider-icon">
          <h4 style="text-align:center; color:#95a5a6;">Terimakasi Sudah Membayar Tagihan</h4>
            <h5 style="text-align:center; color:#95a5a6; margin:0;">@PLNPASCABAYAR</h5>
        </div>
      </div> -->
      <!-- Data Modal Barang Pembeli End Session -->
  </body>
</html>
