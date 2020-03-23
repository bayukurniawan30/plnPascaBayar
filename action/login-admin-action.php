<?php
  require '../include/connection.php';
  require '../include/class/AdminClass.php';

  $classUsers = new AdminClass($pdo);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = $classUsers->login_admin($username, $password);
    if ($login) {
      echo "1";
        header("Location: ../admin-nomer-meter.php");
    }
    else {
      echo "0";
      header("Location:../login-admin.php?error=0");
    }

 ?>
