<?php
	require '../include/connection.php';
	require '../include/class/userclass.php';

	$classUsers = new UsersClass($pdo);

	$bulan       = $_POST['bulan'];
	$tahun       = $_POST['tahun'];
	$meter_awal  = $_POST['meter_awal'];
	$meter_akhir = $_POST['meter_akhir'];

	$penggunaan = $classUsers->penggunaan($bulan, $tahun, $meter_awal, $meter_akhir);

	if ($penggunaan) {
		echo "<script>
			alert('Data Berhasil Masuk');
			</script>";
		header("Location: ../dashboard.php");
	} else {
		echo "<script>
			alert('Data Gagal Masuk');
			</script>";
	}
?>