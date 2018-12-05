<!DOCTYPE html>
<?php
session_start();
include("functions/function.php");
?>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="stylesheet/w3.css"/>
<link rel="stylesheet" href="stylesheet/style.css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
<body>

<div class="w3-container">
	<div class="w3-left">
	<div>
		<div class="w3-tag w3-xxxlarge w3-red">S</div>
		<div class="w3-tag w3-xxxlarge">P</div>
		<div class="w3-tag w3-xxxlarge w3-yellow">O</div>
		<div class="w3-tag w3-xxxlarge">R</div>
		<div class="w3-tag w3-xxxlarge w3-deep-orange">T</div>
		<div class="w3-tag w3-xxxlarge">E</div>
		<div class="w3-tag w3-xxxlarge w3-cyan">E</div>
	</div>
	</div>
	<?php
	isLogin();
	?>
	
	<div class="w3-dropdown-hover w3-right w3-margin">
	<a class="w3-btn-floating w3-light-grey w3-hover-black"><i class="material-icons w3-xxlarge w3-center">add_shopping_cart</i></a>
	
	<div class="w3-dropdown-content w3-border">
		<ul class="w3-ul w3-card-4">
		<li>Jill <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-margin-right w3-medium">x</span></li>
		<li>Adam <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-margin-right w3-medium">x</span></li>
		<li>Eve <span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-margin-right w3-medium">x</span></li>
		</ul>
	</div>
	</div>
</div>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center"><br>
      <i class="material-icons w3-jumbo">person</i>
    </div>
	
    <div class="w3-container">
	 <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
		<li><a href="#" class="tablink" onclick="openCity(event, 'login')">Login</a></li>
		<li><a href="#" class="tablink" onclick="openCity(event, 'reg')">Register</a></li>
	</ul>
      <div id="login" class="w3-section r">
		
		<form name="loginform" method="post" action="redirect_login.php">

			<p>
			<input class="w3-input" type="text" name="username">
			<label>username</label></p>

			<p>      
			<input class="w3-input" type="password" name="password">
			<label>Password</label></p>
			
			<button type="submit" class="w3-btn w3-btn-block w3-green w3-section" name="login">Login</button>
		</form>
		
      </div>
	  <div id="reg" class="w3-section r">
		
		<form name="regform" method="post" action="redirect.php">

			<p>
			<input class="w3-input" type="text" name="name" required>
			<label>Name</label></p>
			
			<p>
			<input class="w3-input" type="text" name="username" required>
			<label>username</label></p>
			
			<p>
			<input class="w3-input" type="number" name="mob" required>
			<label>Mobile Number</label></p>
			
			<p>      
			<input class="w3-input" type="password" name="password" required>
			<label>Password</label></p>
			
			<p>      
			<input class="w3-input" type="password" name="repassword" required>
			<label>Retype Password</label></p>
			
			<button type="submit" class="w3-btn w3-btn-block w3-blue w3-section" name="register">Register</button>
		</form>
		
      </div>
    </div>

    <div class="w3-container w3-border-top w3-padding-hor-16 w3-light-grey">
      <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
    </div>

  </div>
</div>

<?php
getNav();
?>

<div class="ecommerce">
<div class="w3-container w3-padding-hor-64 w3-theme-l5">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-hor-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Like Us , Comment Us</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chennai, India</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +91 9515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">
	
      <form class="w3-container w3-card-4 w3-padding-hor-16 w3-white" method="post" action="contact.php">
      <div class="w3-group">      
        <label class="w3-label">Name</label>
        <input class="w3-input" type="text" name="name" required>
      </div>
      <div class="w3-group">      
        <label class="w3-label">Email</label>
        <input class="w3-input" type="text" name="email" required>
      </div>
      <div class="w3-group">      
        <label class="w3-label">Subject</label>
        <input class="w3-input" type="text" name="comment" required>
      </div>  
      <input class="w3-check" type="checkbox" checked>
      <label class="w3-validate">I Like it!</label>
      <button type="submit" class="w3-btn w3-right w3-theme" name="send">Send</button>
      </form>
	  <?php
		sendcomment();
	  ?>
    </div>
  </div>
</div>

<!-- Google Maps -->
<div id="googleMap" style="width:100%;height:420px;"></div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(12.841904, 80.153760);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:5,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</div>
 	
<!-- Footer -->
<footer class="w3-container w3-padding-hor-64 w3-grey w3-center w3-margin-top w3-opacity"> 

<p style="font-weight:normal">Copyright &copy; 
<div>
		<div class="w3-tag w3-large w3-red">S</div>
		<div class="w3-tag w3-large">P</div>
		<div class="w3-tag w3-large w3-yellow">O</div>
		<div class="w3-tag w3-large">R</div>
		<div class="w3-tag w3-large w3-deep-orange">T</div>
		<div class="w3-tag w3-large">E</div>
		<div class="w3-tag w3-large w3-cyan">E</div>
</div>
</p>

 <div class="w3-xlarge w3-padding-hor-32">
   <a href="#" class="w3-hover-text-indigo w3-show-inline-block"><i class="fa fa-facebook-official"></i></a>
   <a href="#" class="w3-hover-text-red w3-show-inline-block"><i class="fa fa-pinterest-p"></i></a>
   <a href="#" class="w3-hover-text-light-blue w3-show-inline-block"><i class="fa fa-twitter"></i></a>
   <a href="#" class="w3-hover-text-grey w3-show-inline-block"><i class="fa fa-flickr"></i></a>
   <a href="#" class="w3-hover-text-indigo w3-show-inline-block"><i class="fa fa-linkedin"></i></a>
 </div>
 
  <p style="font-weight:normal">Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementsByClassName("tablink")[0].click();

function openCity(evt, type) {
  var i, x, tablinks;
  x = document.getElementsByClassName("r");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(type).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}

</script>

</body>
</html>
