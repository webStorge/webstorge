<?php
session_start();
unset($_SESSION['login_user']);
if(!isset($_SESSION["login_user"])){
	header("location: Menu.php"); // Redirecting To Home Page
}
?>