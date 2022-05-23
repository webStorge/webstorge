<?php
include('check.php');
if(!isset($_SESSION['login_user'])){
	header("location: Menu.php");
}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
    <meta charset="utf-8">
    <title>securedLogin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
	
	<script type="text/javascript" src="words.js"></script>
	
    </head>
	
<body class="body-type">
	<div class="login-page">
		<title class="welcome">Hey <?php echo $_SESSION["login_user"]; ?></title>
		<p class="form-menu"> You've Succesfully logged in ! </p>
		<a class="logout" href="Logout.php">Logout</a>
		
	</div>
</body>
</html>