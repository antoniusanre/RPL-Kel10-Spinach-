<?php 

$db = mysqli_connect("localhost", "root", "", "db_agrirental");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

function query($que){
	global $db;
	$out = mysqli_query($db, $que);
	$rows = [];
	while($row = mysqli_fetch_assoc($out)){
		$rows[] = $row;
	}
	return $rows;
}
?>