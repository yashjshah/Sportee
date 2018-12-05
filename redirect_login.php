<?php
session_start();
include("functions/function.php");
?>
<?php
		userLogin();
?>

<?php
	isLogin();
?>

<script type="text/javascript">
	window.location="index.php";
</script>