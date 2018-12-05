<?php
include("include/db.php");
include("include/imp.php");

global $conn;

$n=test_input_en($_POST["name"]);
$u=test_input_en($_POST["username"]);
$p=test_input_en($_POST["password"]);
$m=test_input_en($_POST["mob"]);

$sql = "INSERT INTO user (name, username,mob,password)
			VALUES ('$n', '$u', '$m', '$p')";

if ($conn->query($sql) === TRUE) {
		return true;
	} else {
		return false;
	}


?>