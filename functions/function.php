<?php
include("include/db.php");

function test_input_en($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return base64_encode($data);
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

function userRegister(){
	global $conn;
	if(isset($_POST["register"])){
		
		$na=$_POST["username"];
		$n=test_input_en($_POST["name"]);
		$u=test_input_en($_POST["username"]);
		$p=test_input_en($_POST["password"]);
		$m=test_input_en($_POST["mob"]);
		$sql = "INSERT INTO user (name, username,mob,password)
			VALUES ('$n', '$u', '$m', '$p')";

		if ($conn->query($sql) === TRUE) {
			echo "<div class='w3-green'>
				<h3>Registered</h3>
				</div>
				";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

function userLogin(){
	
	global $conn;
	if(isset($_POST['login'])){
	
	$username = test_input_en($_POST['username']);
	$password = test_input_en($_POST['password']);
	
	$get_user = "select * from user where username='$username' AND password='$password'";
	
	$result = $conn->query($get_user);
	
		if($result->num_rows > 0){
			$_SESSION["user"]=$username;
		}
		else{
			echo "<script>alert('error');</script>
				";
		}
	}
	
}

function islogin(){
	if(isset($_SESSION["user"])){
		loggedin();
	}
	else{
		login();
	}
}

function login(){
	echo "<a class='w3-btn-floating w3-light-grey w3-hover-black w3-right w3-margin' onclick="."document.getElementById('id01').style.display='block'"."><i class='material-icons w3-xxlarge w3-center'>person</i></a>";
}

function loggedin(){
	echo "<a class='w3-btn w3-light-grey w3-hover-black w3-right w3-margin w3-large' href='logout.php'>X</a>";
}

function logout(){
	session_unset();
	session_destroy();
}

function getNav(){
	global $conn;
	echo "<ul class='w3-navbar w3-card-2 w3-teal w3-medium' style='padding-left:50px'>
					<li><a href='index.php'>Home</a></li>";
	$get_cat = "select * from category";
	
	$result = $conn->query($get_cat);
	
	if($result->num_rows > 0){
		while($r = $result->fetch_assoc()){
			$get_pro = "select DISTINCT type from ".$r['sport'];
			$result1 = $conn->query($get_pro);
				echo "<li class='w3-dropdown-hover w3-hover-indigo'>
					<a class='w3-hover-orange' href='#'>".$r['sport']." <i class='fa fa-caret-down'></i></a>
					<div class='w3-dropdown-content w3-white w3-card-4'>";
					if($result1->num_rows > 0){
						while($r1 = $result1->fetch_assoc()){
							echo "<a href='product.php?sport=".$r['sport']."&id=".$r1['type']."'>".$r1['type']."</a>";
						}
					}
					echo "</div></li>";
		}
	}
	
	echo "<li><a href='contact.php'>Contact</a></li>
				  
					<li><a href='about.php'>About</a></li>
					</ul>";
	return;
}

function productDetail($s,$type){
	global $conn;
	echo "<ul class='w3-navbar'>";
	$get_pro = "select * from ".$s." where type = '".$type."'";
	
	$result = $conn->query($get_pro);
	
	if($result->num_rows > 0){
		while($r = $result->fetch_assoc()){
			$p = $r['price'];
			$di = $r['discount'];
			$d = $p - $p*($di/100);
			echo "<li><div class='product'>
					<div class='w3-card-2 w3-light-grey w3-btn w3-hover-shadow'>

					<div class='w3-container w3-left'>
					  <h3>".$r['name']."</h3>
					  <img src='admin/product_images/".$r['image']."' alt='Avatar' width='240' height='240'>
					  <h5>Price : <strike>".$r['price']."</strike>      <mark>".$d."</mark> </h5>
					  <h6>Type : ".$r['type']."</h6>
					  <h6>Description : ".$r['desp']."</h6>
					  <p>
						<a class='w3-btn w3-green' id='add' href='add.php?s=".$s."&i=".$r['id']."'>Add to cart</a>
					  </p>
					</div>

					</div>
					</div></li>";
		}
	}
	echo "</ul>";
	return;
	
}

function sendcomment(){
	global $conn;
	if(isset($_POST['send'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$fb = $_POST['comment'];
	
	$ins = "insert into feedback (name,email,comment) values ('$name','$email','$fb')";
	
	if ($conn->query($ins) === TRUE) {
			echo "<div class='w3-green'>
				<h3>Sent</h3>
				</div>
				";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

function dealOfDay(){
	global $conn;
	
	echo "<ul class='w3-navbar'>";
	$get_pro = "select * from dod";
	
	$result = $conn->query($get_pro);
	
	if($result->num_rows > 0){
		while($r1 = $result->fetch_assoc()){
			$pid = $r1['pid'];
			$s = $r1['sport'];
			$gett = "select * from $s where id = '".$pid."'";
			$res = $conn->query($gett);
				if($res->num_rows > 0){
					while($r = $res->fetch_assoc()){
					$p = $r['price'];
					$di = $r['discount'];
					$d = $p - $p*($di/100);
					echo "<li><div class='product'>
							<div class='w3-card-2 w3-light-grey w3-btn w3-hover-shadow'>

							<div class='w3-container w3-left'>
							  <h3>".$r['name']."</h3>
							  <img src='admin/product_images/".$r['image']."' alt='Avatar' width='240' height='240'>
							  <h5>Price : <strike>".$r['price']."</strike>      <mark>".$d."</mark> </h5>
							  <h6>Type : ".$r['type']."</h6>
							  <h6>Description : ".$r['desp']."</h6>
							  <p>
								<a class='w3-btn w3-green' id='add' href='add.php?s=".$s."&i=".$pid."'>Add to cart</a>
							  </p>
							</div>

							</div>
							</div></li>";
						}
				}
		}
	}
	echo "</ul>";
	return;
}
function myCart($u){
	global $conn;
	$get_cart = "select * from cart where username='".$u."'";
	
	$result = $conn->query($get_cart);
	echo "<div class='w3-dropdown-content w3-border'>
		<ul class='w3-ul w3-card-4'>";
		if($result->num_rows > 0){
			while($r = $result->fetch_assoc()){
				$get_sp = "select * from ".$r['sport']." where id='".$r['id']."'";
		
				$res = $conn->query($get_sp);
				while($r1 = $res->fetch_assoc()){
					echo "<li class='w3-medium'>".$r1['name']."</li>";
				}
			}
	}
	echo "<br><button class='w3-btn w3-amber'> Check Out</button>
		</ul>
	</div>";
	return;
	
}
?>