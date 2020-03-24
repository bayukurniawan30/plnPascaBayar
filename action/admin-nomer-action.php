<?php
  require '../include/connection.php';
  require '../include/class/AdminClass.php';

  $classAdmin = new AdminClass($pdo);

  $nomor_kwh = trim($_POST['nomor_kwh']);

  $masuknomor = $classAdmin->nomerMeter($nomor_kwh);
  if ($masuknomor) {
    echo "berhasil";
    header("Location:../admin.php?no_meter=$nomor_kwh");
  }
  else {
    echo "gagal masuk";
  }
 ?>
