<?php
  require '../include/connection.php';
  require '../include/class/userclass.php';
  require '../include/class/AdminClass.php';

  $classAdmin = new AdminClass($pdo);

  $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
  $bulan_bayar = $_POST['bulan_bayar'];

  $update_data = $classAdmin->adminUpdate($tanggal_pembayaran, $bulan_bayar);
  if ($update_data) {
    echo "<script>
            alert('berhasil');
          </script>";
    header("Location:../admin.php");
  }
  else {
    echo "gagal masuk";
  }
 ?>
