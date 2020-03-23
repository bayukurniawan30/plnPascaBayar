<?php
  require '../include/connection.php';
  require '../include/class/AdminClass.php';

  $classUsers = new AdminClass($pdo);

  $username = $_POST['username'];
  $nama_admin = $_POST['nama_admin'];
  $password = $_POST['password'];
  $password2 =  $_POST['password2'];

  //cek password sama atau tidak
  if ($password != $password2) {
    header("Location:../register-admin.php?page=register&error=3");
  }
  else {
    $register = $classUsers->register_admin($username, $nama_admin, $password);

    if ($register == '1') {
      echo "<script>
            alert('Data Berhasil Masuk');
            </script>";
            header("Location:../login-admin.php");
    }
    elseif ($register == 'usernameada') {
      header("Location:../register-admin.php?page=register&error=2"); //email ada
    }
    else {
        header("Location:../register-admin.php?page=register&error=0"); //data gagal masuk
    }
  }
 ?>
