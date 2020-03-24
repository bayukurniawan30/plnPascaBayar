<?php
  require 'include/connection.php';
  require 'include/class/AdminClass.php';

    if (empty($_SESSION['login'])) {
      header("Location:login-admin.php");
      exit;
    }
    $classAdmin = new AdminClass($pdo);
    $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : NULL;
    $nomerMeter   = isset($_GET['no_meter']) ? $_GET['no_meter'] : NULL;

    $userid = $_SESSION['id'];
    $cekuser = $classAdmin->usernomerMeter($nomerMeter);
    // var_dump($userid);
    // die;
    $tagihan = $classAdmin->pembayaran($cekuser->id);
    $tagihanTerakhir = $classAdmin->tagihanTerakhir($cekuser->id);
    if ($tagihanTerakhir) {
      if ($tagihanTerakhir->tanggal_pembayaran == NULL && $tagihanTerakhir->bulan_bayar == NULL) {
        $status = 'BELUM LUNAS';
      }
      else {
        $status = 'LUNAS';
      }
    }

    $riwayat = $classAdmin->riwayatPembayaran($cekuser->id);

    function rupiah($angka) {
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
    }

    function bulanIndo($tanggal) {
      $bulan = array (1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          );
      $split = explode('-', $tanggal);
      return $bulan[ (int)$split[0] ] . ' ' . $split[1];
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
                <a style="text-decoration: none;" href="admin-nomer-meter.php"><p><span uk-icon="icon: history"></span>  Masukan Nomer Meter</p></a>
                <a style="text-decoration: none;" href="action/logout-action.php"><p><span uk-icon="icon: sign-out"></span> Sign Out</p></a>
            </div>
        </div>

        <div class="uk-child-width-1-2@s" uk-grid>
          <div>
            <div class="uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">PEMBAYARAN</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title"><?= $cekuser->nama_pelanggan; ?></h3>
                <ul>
                  <li>Nama Lengkap : <?= $cekuser->nama_pelanggan; ?></li>
                  <li>No Meter : <?= $cekuser->nomor_kwh;?></li>
                  <li>Alamat : <?= $cekuser->alamat; ?> </li>
                  <form action="action/admin-update-data.php" method="post">
                    <li>
                      <?php
                          $date = date('d');
                       ?>
                       Tanggal :
                       <select  name="tanggal_pembayaran">
                         <option value="01" <?=$date == '01' ? 'selected="selected"' : ''?>>01</option>
                         <option value="01" <?=$date == '02' ? 'selected="selected"' : ''?>>02</option>
                         <option value="01" <?=$date == '03' ? 'selected="selected"' : ''?>>03</option>
                         <option value="01" <?=$date == '04' ? 'selected="selected"' : ''?>>04</option>
                         <option value="01" <?=$date == '05' ? 'selected="selected"' : ''?>>05</option>
                         <option value="01" <?=$date == '06' ? 'selected="selected"' : ''?>>06</option>
                         <option value="01" <?=$date == '07' ? 'selected="selected"' : ''?>>07</option>
                         <option value="01" <?=$date == '08' ? 'selected="selected"' : ''?>>08</option>
                         <option value="01" <?=$date == '09' ? 'selected="selected"' : ''?>>09</option>
                         <option value="01" <?=$date == '10' ? 'selected="selected"' : ''?>>10</option>
                         <option value="01" <?=$date == '11' ? 'selected="selected"' : ''?>>11</option>
                         <option value="01" <?=$date == '12' ? 'selected="selected"' : ''?>>12</option>
                         <option value="01" <?=$date == '13' ? 'selected="selected"' : ''?>>13</option>
                         <option value="01" <?=$date == '14' ? 'selected="selected"' : ''?>>14</option>
                         <option value="01" <?=$date == '15' ? 'selected="selected"' : ''?>>15</option>
                         <option value="01" <?=$date == '16' ? 'selected="selected"' : ''?>>16</option>
                         <option value="01" <?=$date == '17' ? 'selected="selected"' : ''?>>17</option>
                         <option value="01" <?=$date == '18' ? 'selected="selected"' : ''?>>18</option>
                         <option value="01" <?=$date == '19' ? 'selected="selected"' : ''?>>19</option>
                         <option value="01" <?=$date == '20' ? 'selected="selected"' : ''?>>20</option>
                         <option value="01" <?=$date == '21' ? 'selected="selected"' : ''?>>21</option>
                         <option value="01" <?=$date == '22' ? 'selected="selected"' : ''?>>22</option>
                         <option value="01" <?=$date == '23' ? 'selected="selected"' : ''?>>23</option>
                         <option value="01" <?=$date == '24' ? 'selected="selected"' : ''?>>24</option>
                         <option value="01" <?=$date == '25' ? 'selected="selected"' : ''?>>25</option>
                         <option value="01" <?=$date == '26' ? 'selected="selected"' : ''?>>26</option>
                         <option value="01" <?=$date == '27' ? 'selected="selected"' : ''?>>27</option>
                         <option value="01" <?=$date == '28' ? 'selected="selected"' : ''?>>28</option>
                         <option value="01" <?=$date == '29' ? 'selected="selected"' : ''?>>29</option>
                         <option value="01" <?=$date == '30' ? 'selected="selected"' : ''?>>30</option>
                         <option value="01" <?=$date == '31' ? 'selected="selected"' : ''?>>31</option>
                       </select>
                    <li>
                    <?php
    									$bulan_sekarang = date('m');
    								?>
                    Bulan :
                    <select name="bulan_bayar">
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
                    <input type="hidden" name="id_pembayaran" value="<?=$tagihanTerakhir->id; ?>"><br>
                    <input type="hidden" name="nomer_meter" value="<?=$nomerMeter; ?>"><br>
                    <button type="submit" name="button">SUBMIT</button>
                  </form>
                </ul>
              </div>
            </div>
          </div>

          <div>
            <div style="margin-top: 15px;"class="uk-card uk-card-default uk-card-xlarge uk-card-body ">
              <h3 class="uk-card-title">TAGIHAN</h3>
              <div class="uk-card uk-card-default uk-card-xlarge uk-card-body uk-card-hover">
                <h3 class="uk-card-title"><?= $tagihan->nama_pelanggan ?></h3>
                <ul>
                  <li>Nama Lengkap : <?= $tagihan->nama_pelanggan ?></li>
                  <li>No Meter : <?= $tagihan->nomor_kwh ?></li>
                  <li>Alamat : <?= $tagihan->alamat ?> </li>
                  <li>Bulan Tunggak : <?= bulanIndo(date('m-Y', strtotime('01-' . $tagihan->bulan . '-' . $tagihan->tahun))) ?></li>
                  <li>Tagihan Listrik : <?= rupiah($tagihan->total_bayar) ?></li>
                  <li>Pajak Bank : <?= rupiah($tagihan->biaya_admin) ?></li>
                  <li><strong>TOTAL : <?= rupiah($tagihan->biaya_admin + $tagihan->total_bayar) ?></strong></li>
                </ul>
                <h3>Status : <?= $status ?></h3>
              </div>
            </div>
          </div>
      </div>

        <div class="uk-child-width-1-2@s" uk-grid>
          <div>
            <div class="uk-card uk-card-default uk-card-xlarge uk-card-body">
              <h3 class="uk-card-title">RIWAYAT PEMBAYARAN</h3>
              <div class="uk-card uk-card-default uk-card-small uk-card-body uk-card-hover">
              <?php
                if ($riwayat):
              ?>
                <table class="uk-table">
                  <thead>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>Bulan</th>
                      <th>Total Bayar</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach ($riwayat as $data):
                      if ($data->tanggal_pembayaran == NULL && $data->bulan_bayar == NULL) {
                        $statusRiwayat = 'Belum Lunas';
                      }
                      else {
                        $statusRiwayat = 'Lunas';
                      }
                  ?>
                    <tr>
                      <td><?= $data->nama_pelanggan ?></td>
                      <td><?= bulanIndo(date('m-Y', strtotime('01-' . $data->bulan . '-' . $data->tahun))) ?></td>
                      <td><?= rupiah($data->biaya_admin + $data->total_bayar) ?></td>
                      <td><?= $statusRiwayat ?></td>
                    </tr>
                  <?php
                    endforeach;
                  ?>
                  </tbody>
                </table>    
              <?php
                else:
                  echo 'Belum ada riwayat pembayaran';
                endif;
              ?>
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
