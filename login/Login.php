<?php
include('Check.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
	header("location: ../index.php"); // Redirecting To Genertor Page
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body class="body-type">
	<a href="Menu.php" class="back">Back To Menu</a>
	<div class="login-wrapper">
		<div class="title"> Sign In </div>
			<div class="form">
				<form class="login-form" action="" method = "POST">
				<input type="text" name="username" placeholder="Username" required autofocus/>
				<input type="password" name="password" placeholder="Password" required/>
				<input class = "sub" type ="submit" name="submit" value="Login"></input>
				<span class="error"><?php echo $error; ?></span>
				<p class="message">Not registered? <a href="SignUP.php">Create an account</a></p>
				</form>
			</div>
	</div>
</body>

</html>