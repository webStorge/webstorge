<?php
session_start();

// initializing variables
$username = "";
$errors = "";

// connect to the database
$con = mysqli_connect('localhost', 'root', 'Tkddyd@135', 'oss');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form

  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
  
  if ($password_1 != $password_2) {
	$errors = "The two passwords do not match.";
  }

  $uppercase = preg_match('@[A-Z]@', $password_1);
  $lowercase = preg_match('@[a-z]@', $password_1);
  $number    = preg_match('@[0-9]@', $password_1);

if(!$uppercase || !$lowercase || !$number || strlen($password_1) < 8) {
  $errors = "Please format your password.";
}


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1;";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      $errors = "Username already exists.";
    }
  }
  
  if($errors == "") {
	$password = md5($password_1);  
	$query = "INSERT INTO login(username,password) 
		      VALUES('$username', '$password');";
  	mysqli_query($con, $query);
  	$_SESSION['username'] = $username;
 	$_SESSION['success'] = "You are now logged in";
 	header('location: index.php');
	exit();
  }
	
}