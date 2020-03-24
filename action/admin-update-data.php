<?php
  require '../include/connection.php';
  require '../include/class/userclass.php';
  require '../include/class/AdminClass.php';

  $classAdmin = new AdminClass($pdo);

  $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
  $bulan_bayar = $_POST['bulan_bayar'];
  $id_pembayaran = $_POST['id_pembayaran'];
  $nomer_meter = $_POST['nomer_meter'];

  $update_data = $classAdmin->adminUpdate($tanggal_pembayaran, $bulan_bayar, $id_pembayaran);
  if ($update_data) {
    echo "<script>
            alert('berhasil');
          </script>";
    header("Location:../admin.php?no_meter=$nomer_meter");
  }
  else {
    echo "gagal masuk";
  }
 ?>
