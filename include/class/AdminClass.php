<?php
  class AdminClass
  {

    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function nomerMeter($nomor_kwh)
    {
      $sessionId = $_SESSION['id'];
      $query = $this->pdo->query("SELECT * FROM pelanggan WHERE nomor_kwh = '$nomor_kwh'");
      if ($query->rowCount() > 0) {
          $row = $query->fetch(PDO::FETCH_OBJ);
          return true;
        }
        return false;
      }

      public function usernomerMeter($sessionId)
      {
        $sessionId = $_SESSION['id'];
        $query = $this->pdo->query("SELECT * FROM pelanggan a INNER JOIN pembayaran b ON a.id = b.id WHERE a.id = $sessionId");
        $query->execute();
        if ($query->rowCount() > 0) {
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
      }

    public function register_admin($username, $nama_admin, $password)
    {
      //mengecek apakah sudah ada email yang sama pada database
      $cekregister = $this->pdo->query("SELECT * FROM admin WHERE username = '$username'");

      if ($cekregister->rowCount() > 0) {
        return 'usernameada'; //bahwa email ada
      } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $id_level = 1;

        //masukan data
        $masukanregister = $this->pdo->prepare("INSERT INTO admin
          (username, nama_admin, password, id_level) VALUES
          (:username, :nama_admin, :password, :id_level)");

          //menghubung data ke variabel
          $masukanregister->bindParam(':username', $username);
          $masukanregister->bindParam(':nama_admin', $nama_admin);
          $masukanregister->bindParam(':password', $password);
          $masukanregister->bindParam(':id_level', $id_level);

          //meng execute
          if ($masukanregister->execute()) {
            return '1'; //data berhasil masuk
          } else {
            return '0'; //data gagal masuk
          }
        }
      }

      public function login_admin($username, $password)
      {
          $query = $this->pdo->query("SELECT * FROM admin WHERE username = '$username'");
          if ($query->rowCount() > 0) {
              $row = $query->fetch(PDO::FETCH_OBJ);
              if (password_verify($password, $row->password)) {
                  $_SESSION['id']    = $row->id;
                  $_SESSION['login'] = true;
                  return true;
              }
              return false;
          }
      }

      public function loginadmin($id)
      {
          $checkloginadmin = $this->pdo->query("SELECT * FROM admin WHERE id = '$id'");
          if ($checkloginadmin->rowCount() > 0) {
              $rows = $checkloginadmin->fetch(PDO::FETCH_OBJ);
              return $rows;
          }
          return false;
      }


    public function pembayaran($id_pelanggan)
    {
        $pembayaranId = $this->pdo->query("SELECT * FROM pembayaran WHERE id_pelanggan = '$id_pelanggan' LIMIT 1");
        $pembayaranId = $pembayaranId->fetch(PDO::FETCH_OBJ);
        return $pembayaranId;
    }

    public function adminUpdate($tanggal_pembayaran, $bulan_bayar)
    {
      $id_admin = $_SESSION['id'];
      $sql = "UPDATE pembayaran SET tanggal_pembayaran=:tanggal_pembayaran, bulan_bayar=:bulan_bayar WHERE id=:id";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindParam(':tanggal_pembayaran', $tanggal_pembayaran);
      $stmt->bindParam(':bulan_bayar', $bulan_bayar);
      $stmt->bindParam(':id', $id);

      if ($stmt->execute()) {
        return true;
      }
      else {
        return false;
      }
    }
  }

?>
