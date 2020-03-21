<?php

  require '../include/connection.php';
  require '../include/class/userclass.php';

  $classUsers = new UsersClass($pdo);

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 =  $_POST['password2'];

  //cek password sama atau tidak
  if ($password != $password2) {
    header("Location:../register-bank.php?page=register&error=3");
  }
  else {
    $register = $classUsers->register_bank($username, $email, $password);

    if ($register == '1') {
      echo "<script>
            alert('Data Berhasil Masuk');
            </script>";
            header("Location:../login-bank.php");
    }
    elseif ($register == 'emailada') {
      header("Location:../register-bank.php?page=register&error=2"); //email ada
    }
    else {
        header("Location:../register-bank.php?page=register&error=0"); //data gagal masuk
    }
  }
 ?>
