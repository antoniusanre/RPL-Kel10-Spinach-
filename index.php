<?php 
session_start();

if( !isset($_SESSION["login_p"])){
	header("Location: login.html");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AgriRental</title>
</head>
<body>
<h1>Welcome to AgriRental</h1>

<a href="logout.php" title="Logout">Logout</a>

</body>
</html>