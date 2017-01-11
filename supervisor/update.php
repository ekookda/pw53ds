<?php
include_once '../init.php';

if (isset($_POST['btn-update'])) {
	// ambil value dari form registrasi
	$user_id      = trim(sql_injection($_POST['user_id']));
	$nama_lengkap = trim(sql_injection($_POST['namalengkap']));
	$level		  = trim(sql_injection($_POST['level']));
	$status		  = trim(sql_injection($_POST['status']));
	$tgl_register = trim(sql_injection($_POST['tgl_register']));

    $sess_id = $_SESSION['user_id'];

    // cek jika form belum terisi
	if (empty($nama_lengkap)) {
		// direct ke form register
		echo "
			<script>
				window.location.href='edit.php?id=".$sess_id."&notif=empty';
			</script>
		";
	} else { // form sudah terisi semua
		$update = "UPDATE users SET nama_lengkap='$nama_lengkap', status='$status', kode_level='$level', tgl_input='$tgl_register' WHERE users.user_id='$user_id'";

		$exec = mysqli_query($link, $update);

		if ($exec) {
			echo "
				<script>
					window.alert('Update Data Berhasil');
					window.location.href='index.php?page=supervisor&act=success';
				</script>
			";
		} else {
			echo "
				<script>
					window.alert('Update Data Gagal');
                    window.location.href='edit.php?id=".$sess_id."&notif=gagal';
				</script>
			";
		}

	} // end form empty

} // end isset
?>
