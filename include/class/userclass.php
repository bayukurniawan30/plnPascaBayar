<?php

class UsersClass
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo; //memasukan koneksi database dengan pdo
    }

    public function register($username, $password, $nomor_kwh, $nama_pelanggan, $alamat, $id_tarif)
    {
        //mengecek apakah sudah ada nomor_kwh yang sama pada database
        $cekregister = $this->pdo->query("SELECT * FROM pelanggan WHERE nomor_kwh = '$nomor_kwh'");

        if ($cekregister->rowCount() > 0) {
            return 'nomerada'; //bahwa email ada
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            //masukan data
            $masukanregister = $this->pdo->prepare("INSERT INTO pelanggan
            (username, password, nomor_kwh, nama_pelanggan, alamat, id_tarif) VALUES
            (:username, :password, :nomor_kwh, :nama_pelanggan, :alamat, :id_tarif)");

            //menghubung data ke variabel
            $masukanregister->bindParam(':username', $username);
            $masukanregister->bindParam(':password', $password);
            $masukanregister->bindParam(':nomor_kwh', $nomor_kwh);
            $masukanregister->bindParam(':nama_pelanggan', $nama_pelanggan);
            $masukanregister->bindParam(':alamat', $alamat);
            $masukanregister->bindParam(':id_tarif', $id_tarif);

            //meng execute
            if ($masukanregister->execute()) {
                return '1'; //data berhasil masuk
            } else {
                return '0'; //data gagal masuk
            }
        }
    }

    public function tarif() //munculin data daya dari database

    {
<<<<<<< Updated upstream
        $tarif = $this->pdo->query("SELECT * FROM tarif");
        if ($tarif->rowCount() > 0) {
            while ($rows = $tarif->fetch(PDO::FETCH_OBJ)) {
                $data[] = $rows;
            }

            return $data;
        }
        return false;
=======
<<<<<<< Updated upstream
      $tarif = $this->pdo->query("SELECT * FROM tarif");
      if ($tarif->rowCount()>0)
      {
          while ($rows = $tarif->fetch(PDO::FETCH_OBJ))
            $data[] = $rows;
          return $data;
      }
      return false;
>>>>>>> Stashed changes
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
=======
        $tarif = $this->pdo->query("SELECT * FROM tarif");
        if ($tarif->rowCount() > 0) {
            while ($rows = $tarif->fetch(PDO::FETCH_OBJ)) {
                $data[] = $rows;
            }
            return $data;
        }
        return false;
    }

>>>>>>> Stashed changes

    public function register_bank($username, $email, $password)
    {
        //mengecek apakah sudah ada email yang sama pada database
        $cekregister = $this->pdo->query("SELECT * FROM bank WHERE email = '$email'");

        if ($cekregister->rowCount() > 0) {
            return 'emailada'; //bahwa email ada
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);

            //masukan data
            $masukanregister = $this->pdo->prepare("INSERT INTO bank
            (username, email, password, date) VALUES
            (:username, :email, :password, :date)");
            date_default_timezone_set("Asia/Makassar");
            $date = date('Y-m-d H:i:s');

            //menghubung data ke variabel
            $masukanregister->bindParam(':username', $username);
            $masukanregister->bindParam(':email', $email);
            $masukanregister->bindParam(':password', $password);
            $masukanregister->bindParam(':date', $date);

            //meng execute
            if ($masukanregister->execute()) {
                return '1'; //data berhasil masuk
            } else {
                return '0'; //data gagal masuk
            }
        }
    }

    public function login_user($username, $password)
    {
        $query = $this->pdo->query("SELECT * FROM pelanggan WHERE username = '$username'");
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

    public function loginUser($id)
    {
        $checkloginUser = $this->pdo->query("SELECT * FROM pelanggan WHERE id = '$id'");
        if ($checkloginUser->rowCount() > 0) {
            $rows = $checkloginUser->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

<<<<<<< Updated upstream
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

=======
>>>>>>> Stashed changes
    public function login_bank($username, $password)
    {
        $query = $this->pdo->query("SELECT * FROM bank WHERE username = '$username'");
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

    public function penggunaan($bulan, $tahun, $meter_awal, $meter_akhir)
    {
        $id_pelanggan = $_SESSION['id'];

        $masukanpenggunaan = $this->pdo->prepare("INSERT INTO
        penggunaan (id_pelanggan, bulan, tahun, meter_awal, meter_akhir)
        VALUES (:id_pelanggan, :bulan, :tahun, :meter_awal, :meter_akhir)");

        $masukanpenggunaan->bindParam('id_pelanggan', $id_pelanggan);
        $masukanpenggunaan->bindParam(':bulan', $bulan);
        $masukanpenggunaan->bindParam(':tahun', $tahun);
        $masukanpenggunaan->bindParam(':meter_awal', $meter_awal);
        $masukanpenggunaan->bindParam(':meter_akhir', $meter_akhir);

        if ($masukanpenggunaan->execute()) {
<<<<<<< Updated upstream
            $status        = 0;
            $id_penggunaan = $this->pdo->lastinsertId();
			$jumlah_meter  = $meter_akhir - $meter_awal;
			
            $masukantagihan = $this->pdo->prepare("INSERT INTO
=======
<<<<<<< Updated upstream

          $status = 0;
          $id_penggunaan = $this->pdo->lastinsertId();
          $jumlah_meter = $meter_akhir - $meter_awal ;
          $masukantagihan = $this->pdo->prepare("INSERT INTO
=======
            $status        = 0;
            $id_penggunaan = $this->pdo->lastinsertId();
			      $jumlah_meter  = $meter_akhir - $meter_awal;

            $masukantagihan = $this->pdo->prepare("INSERT INTO
>>>>>>> Stashed changes
>>>>>>> Stashed changes
            tagihan(id_penggunaan, id_pelanggan, bulan, tahun, jumlah_meter, status)
            VALUES(:id_penggunaan, :id_pelanggan, :bulan, :tahun, :jumlah_meter, :status)");

            $masukantagihan->bindParam(':id_penggunaan', $id_penggunaan);
            $masukantagihan->bindParam(':id_pelanggan', $id_pelanggan);
            $masukantagihan->bindParam(':bulan', $bulan);
            $masukantagihan->bindParam(':tahun', $tahun);
            $masukantagihan->bindParam(':jumlah_meter', $jumlah_meter);
            $masukantagihan->bindParam(':status', $status);

            if ($masukantagihan->execute()) {

                $id_tagihan = $this->pdo->lastinsertId();

<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream
                 $sessionId = $_SESSION['id'];
                 $tarif = $this->pdo->query("SELECT a.*, b.* FROM pelanggan a INNER JOIN tarif b ON a.id_pelanggan = b.id_tarif WHERE a.id = '$sessionId' LIMIT 1");
                 if ($tarif->rowCount(  ) > 0 ) {
                   $fetch = $tarif->fetch(PDO::FETCH_OBJ);
                   $tarifperkwh = $fetch->tarifperkwh;
                   $total_bayar = $jumlah_meter * $tarifperkwh;
                   $biaya_admin = 2500;
                 }

                 	 $masukanpembayaran = $this->pdo->prepare("INSERT INTO
                   pembayaran(id_tagihan, id_pelanggan, biaya_admin, total_bayar)
                   VALUES(:id_tagihan, :id_pelanggan, :biaya_admin, :total_bayar)");

                   $masukanpembayaran->bindParam(':id_tagihan', $id_tagihan);
                   $masukanpembayaran->bindParam(':id_pelanggan', $id_pelanggan);
                   $masukanpembayaran->bindParam(':biaya_admin', $biaya_admin);
                   $masukanpembayaran->bindParam(':total_bayar', $total_bayar);
                   //tanggal, bulan, id_admin NULL dulu

                  if ($masukanpembayaran->execute([$id_tagihan, $id_pelanggan, $biaya_admin, $total_bayar])) {
                    return '1';
                  }
              }
        }
        else {
          return '0';
        }
=======
>>>>>>> Stashed changes
                $sessionId = $_SESSION['id'];
                $tarif = $this->pdo->query("SELECT a.*, b.* FROM pelanggan a INNER JOIN tarif b ON a.id_tarif = b.id WHERE a.id = '$sessionId' LIMIT 1");
                if ($tarif->rowCount() > 0) {
                    $fetch = $tarif->fetch(PDO::FETCH_OBJ);
                    $tarifperkwh = $fetch->tarifperkwh;
                    $total_bayar = $jumlah_meter * $tarifperkwh;
                    $biaya_admin = 2500;

                    $masukanpembayaran = $this->pdo->prepare("INSERT INTO
                  	pembayaran(id_tagihan, id_pelanggan, biaya_admin, total_bayar)
                  	VALUES(:id_tagihan, :id_pelanggan, :biaya_admin, :total_bayar)");

                    $masukanpembayaran->bindParam(':id_tagihan', $id_tagihan);
                    $masukanpembayaran->bindParam(':id_pelanggan', $id_pelanggan);
                    $masukanpembayaran->bindParam(':biaya_admin', $biaya_admin);
                    $masukanpembayaran->bindParam(':total_bayar', $total_bayar);
                    //tanggal, bulan, id_admin NULL dulu

                    if ($masukanpembayaran->execute()) {
                        return true;
                    }
                }
            }
<<<<<<< Updated upstream
		} 
		
		return false;
=======
		}
		return false;
>>>>>>> Stashed changes
>>>>>>> Stashed changes
    }
}
