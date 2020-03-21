<?php
  require '../include/connection.php';
  require '../include/class/userclass.php';

  $classUsers = new UsersClass($pdo);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = $classUsers->login_bank($username, $password);
    if ($login) {
      echo "1";
        header("Location: ../bank-dashboard.php");
    }
    else {
      echo "0";
      header("Location:../login-bank.php?error=0");
    }

 ?>
