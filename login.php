<?php 
session_start();

require 'config/koneksi.php';

// cek masih dalam session atau tidak
if( isset($_SESSION["login_p"])){
	header("Location: index.php");
	exit;
}

// cek masih dalam waktu cookie atau tidak
if(isset($_COOKIE['III']) && isset($_COOKIE['PII'])){
	$id = $_COOKIE['III'];
	$key = $_COOKIE['PII'];

	// ambil username pake id
	$result = mysqli_query($db, "SELECT username_p FROM penyewa WHERE id_penyewa = $id");
	$row = mysqli_fetch_assoc($result);

	// cek password bener ga
	if($key === hash('sha256', $row['username_p'])){
		$_SESSION['login'] = true;
	}

}

if( isset($_POST["login_p"])){

	$username = $_POST["username_p"];
	$password = $_POST["password_p"];

	$res = mysqli_query($db, "SELECT * FROM penyewa WHERE username_p = '$username'");

	if(mysqli_num_rows($res) === 1){

		// cek pw
		$row = mysqli_fetch_assoc($res);

		if(password_verify($password, $row["pw_p"])){
			// set session
			$_SESSION["login_p"] = true;

			// cek remember me
			if( isset($_POST['remember'])){
				// buat cookie
				setcookie('III', $row['id'], time()+60);
				setcookie('PII', hash('sha256', $row['username_p']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}
header("Location: login.html");

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/login.css">
    <script src="https://kit.fontawesome.com/7b2e6c4dc6.js" crossorigin="anonymous"></script>
    <title>SIGN IN</title>
</head>
<body>
    <div class="login">
        <div class="navbar">
            <a href="landingpage.html"><img src="asset/logo.png" class="logo"></a>
            <ul>
                <li><a href="#">Favorit</a></li>
                <li><a href="#">Notifikasi</a></li>
                <li><a href="login.html">Masuk</a></li>
                <li><a href="registrasi.html">Daftar</a></li>
            </ul>
        </div>
        <form action="" method="post">
        <div class="loginForm">
            <h1>Sign In</h1>
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Username or Email" name="username_p" value="">
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password_p" value="">
            </div>
            <button type="button" name="login_p"><span></span>Sign In</button>

            <p>Dont have an account? <a href="registrasi.html">Sign Up</a></p>
            </div>
        </form> 
    </div>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Login to AgriRental</title>

</head>
<body>

<h1>Welcome to AgriRental</h1>
<p>First of all please login!</p>

<form action="" method="post" accept-charset="utf-8">
	<ul>
		<li>
			<label>Username : <input type="text" name="username_p"></label>
		</li>
		<li>
			<label>Password : <input type="password" name="password_p"></label>
		</li>
	</ul>
	<button type="submit" name="login_p">Login</button>
	<p>Don't have account yet? <a href="registrasi.php" title="Sign Up!">Sign Up!</a> </p>
</form>



</body>
</html> -->

