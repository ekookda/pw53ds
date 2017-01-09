<?php
include_once 'core/init.php';

if (isset($_POST['btn-daftar'])) {
	// ambil value dari form registrasi
	$nama_lengkap = trim(sql_injection($_POST['namalengkap']));
	$email		  = trim(sql_injection($_POST['emailuser']));
	$password	  = trim(sql_injection($_POST['password']));
	$level		  = trim(sql_injection($_POST['level']));
	$status		  = trim(sql_injection($_POST['status']));

	if (empty($nama_lengkap) || empty($email) || empty($password)) { // cek jika form belum terisi
		// direct ke form register
		echo "
			<script>
				window.location.href='register.php?page=register&notif=empty';
			</script>
		";
	} else { // form sudah terisi semua
		// cek password. minimum 6 karakter mengandung huruf, angka dan simbol.
		// pattern
		$pattern_tolower = "/[a-z]/";
		$pattern_toupper = "/[A-Z]/";
		$pattern_digit   = "/[0-9]/";
		$pattern_symbol = "/[!@#$%^&*()_+<>?:]/";

		if(strlen($password) < 6){ // cek jumlah karakter kurang dari 6 karakter
			echo "
				<script>
					window.location.href='register.php?page=register&notif=char';
				</script>
			";
		} else {
			// cek karakter huruf kecil
			if(!preg_match($pattern_tolower, $password) || !preg_match($pattern_toupper, $password) || 
				!preg_match($pattern_digit, $password) || !preg_match($pattern_symbol, $password)) {
					echo "
						<script>
							window.location.href='register.php?page=register&notif=char';
						</script>
					";
			} else {
				// password sudah sesuai aturan penulisan. masukkan ke database
				// encrypt password ke hash
				$password = password_hash($password, PASSWORD_DEFAULT);

				$insert = "INSERT INTO users (nama_lengkap, email, password, status, kode_level, tgl_input) VALUES ('$nama_lengkap', '$email', '$password', '$status', '$level', CURRENT_TIMESTAMP)
				";

				$exec = mysqli_query($link, $insert);

				if ($exec) {
					echo "
						<script>
							window.alert('Registrasi Berhasil');
							window.location.href='login.php?page=login';
						</script>
					";
				} else {
					echo "
						<script>
							window.alert('Registrasi Berhasil');
						</script>
					";
				}

			} // end !preg_match()
			
		} // end strlen($password)

	} // end form empty

} // end isset


?>