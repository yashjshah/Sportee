<?php
session_start();

if(isset($_SESSION["user"])){
		$u = $_SESSION["user"];
	}
	else{
		$u="Guest";
	}
	

include("include/db.php");

$s=$_GET['s'];
$i=$_GET['i'];

$sql = "INSERT INTO cart (id, sport,username)
			VALUES ('$i', '$s', '$u')";

		if ($conn->query($sql) === TRUE) {
			echo "<script>window.history.back();</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
return;
?>