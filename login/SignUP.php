<?php
include('CheckUP.php');
if(isset($_SESSION['login_user'])){
	header("location: Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="Style.css?after">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body class="body-type">
		<a href="Menu.php" class="back">Back To Menu</a>
		<div class="login-wrapper">
			<div class="title"> Sign Up </div>		
			<div class="form">
				<form class="login-form" action="CheckUP.php" method = "POST">
					<input type="text" name="username" placeholder="Username" required autofocus/>
					<input type="password" name="password_1" placeholder="Password (eg. Aaazzz12)" required/>
					<input type="password" name="password_2" placeholder="Confirm Password" required/>
					<input class = "sub" type ="submit" name="submit" value="Join Us!"></input>
					<span class="error"><?php echo $errors; ?></span>
					<p class="message">Already Registed ? <a href="Login.php">Sign In</a></p>
				</form>
			</div>
		</div>
	</body>
</html>