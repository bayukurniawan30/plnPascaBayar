<?php

  require '../include/connection.php';
  require '../include/class/userclass.php';

  $classUsers = new UsersClass($pdo);

  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 =  $_POST['password2'];
  $nomor_kwh = $_POST['nomor_kwh'];
  $id_tarif = $_POST['id_tarif'];
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $alamat = $_POST['alamat'];

  //cek password sama atau tidak
  if ($password != $password2) {
    header("Location:../register.php?page=register&error=3");
  }
  else {
    $register = $classUsers->register($username, $password, $nomor_kwh, $nama_pelanggan, $alamat, $id_tarif);

    if ($register == '1') {
      echo "<script>
            alert('Data Berhasil Masuk');
            </script>";
            header("Location:../login.php");
    }
    elseif ($register == 'nomerada') {
      header("Location:../register.php?page=register&error=2"); //email ada
    }
    else {
        header("Location:../register.php?page=register&error=0"); //data gagal masuk
    }
  }
 ?>
