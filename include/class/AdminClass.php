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

      public function usernomerMeter($nomerMeter)
      {
        $query = $this->pdo->query("SELECT * FROM pelanggan WHERE nomor_kwh = '$nomerMeter'");
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

    public function tagihanTerakhir($id_pelanggan) {
      $query = $this->pdo->query("SELECT * FROM pembayaran WHERE id_pelanggan = '$id_pelanggan' ORDER BY id LIMIT 1");
      if ($query->rowCount() > 0) {
        $fetch = $query->fetch(PDO::FETCH_OBJ);
        return $fetch;
      }

      return false;
    }
    public function pembayaran($id_pelanggan)
    {
        $pembayaran = $this->pdo->query("SELECT a.*, b.*, c.* FROM pembayaran a INNER JOIN tagihan b ON a.id_tagihan = b.id INNER JOIN pelanggan c ON a.id_pelanggan = c.id WHERE a.id_pelanggan = '$id_pelanggan' ORDER BY a.id DESC LIMIT 1");
        $pembayaranFetch = $pembayaran->fetch(PDO::FETCH_OBJ);
        return $pembayaranFetch;
    }
    public function riwayatPembayaran($id_pelanggan)
    {
        $pembayaran = $this->pdo->query("SELECT a.*, b.*, c.* FROM pembayaran a INNER JOIN tagihan b ON a.id_tagihan = b.id INNER JOIN pelanggan c ON a.id_pelanggan = c.id WHERE a.id_pelanggan = '$id_pelanggan' ORDER BY a.id DESC");
        if ($pembayaran->rowCount() > 0) {
          while ($rows = $pembayaran->fetch(PDO::FETCH_OBJ)) {
              $data[] = $rows;
          }

          return $data;
        }

        return false;
    }

    public function adminUpdate($tanggal_pembayaran, $bulan_bayar, $id_pembayaran)
    {
      $id_admin = $_SESSION['id'];
      $sql = "UPDATE pembayaran SET tanggal_pembayaran=:tanggal_pembayaran, bulan_bayar=:bulan_bayar WHERE id=:id";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindParam(':tanggal_pembayaran', $tanggal_pembayaran);
      $stmt->bindParam(':bulan_bayar', $bulan_bayar);
      $stmt->bindParam(':id', $id_pembayaran);

      if ($stmt->execute()) {
        return true;
      }
      else {
        return false;
      }
    }
  }

?>