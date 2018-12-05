<?php
function test_input_en($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   //return base64_encode($data);
   return $data;
}

function decode($data){
	return base64_decode($data);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>