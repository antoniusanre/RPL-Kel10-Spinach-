<?php 

function registrasi($input){
	global $db;

	// masukkan semua input ke dalam variabel
	$username = strtolower(stripcslashes($input["username_p"]));
	$password = mysqli_real_escape_string($db, $input['password_p']);
	$password2 = mysqli_real_escape_string($db, $input['password_p2']);
	$nama = htmlspecialchars($input["nama_p"]);
	$jk = htmlspecialchars($input["jk"]);
	$telepon = htmlspecialchars($input["telepon_p"]);
	$alamat = htmlspecialchars($input["alamat_p"]);
	$email = htmlspecialchars($input["email_p"]);


	// cek username udah ada apa belum
	$result = mysqli_query($db, "SELECT username_p FROM penyewa WHERE username_p ='$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
		alert('Username Already Exist');
		</script>"	;
		return false;
	}

	// cek konfirmasi
	if( $password !== $password2){
		echo "<script>
		alert('Wrong Re-Type Password');
		</script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// var_dump($password); die;

	// tambahin ke database
	mysqli_query($db, "INSERT INTO penyewa VALUES('','$username','$password',
	'$nama', '$jk', '$telepon', '$alamat', '$email' )");

	// kembalikan jumlah baris yang terubah
	return mysqli_affected_rows($db);
}

?>