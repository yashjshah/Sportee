<?php
session_start();
include("functions/function.php");
?>
<?php
		logout();
?>

<?php
	isLogin();
?>

<script type="text/javascript">
	window.location="index.php";
</script>