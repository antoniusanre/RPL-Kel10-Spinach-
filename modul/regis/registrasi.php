<?php
require '../config/koneksi.php';
require 'reg.php';


if (isset($_POST["registrasi_p"])) {

	if (registrasi($_POST) > 0) {
		echo "<script>
		alert('user baru berhasil ditambahkan')
		</script>";
		header("Location: login.html");
	} else {
		echo mysqli_error($db);
	}
}
