<!DOCTYPE html>
<html lang="en">
<head>
    <title>Î° ∑∏  /   õêÍ∞ ûÖ </title>
    <link rel="stylesheet">
<?php 

//Connects to your Database 
$conect = mysqli_connect("localhost", "root", "Tkddyd@135","oss") or die(mysqli_error()); 

//Checks if there is a login cookie
if(isset($_COOKIE['ID_your_site'])){ //if there is, it logs you in and directes you to the members page
 	$username = $_COOKIE['ID_your_site']; 
 	$pass = $_COOKIE['Key_your_site'];
 	$check = mysqli_query($conect, "SELECT * FROM users WHERE username = '$username';")or die(mysqli_error());

 	while($info = mysqli_fetch_array( $check )){
 		if ($pass != $info['password']){}
 		else{
 			header("Location: login_cloud.php");
		}
 	}
 }

 //if the login form is submitted 
 if (isset($_POST['submit'])) {

	// makes sure they filled it in
 	if(!$_POST['username']){
 		die('You did not fill in a username.');
 	}
 	if(!$_POST['pass']){
 		die('You did not fill in a password.');
 	}

 	// checks it against the database
 	if (!get_magic_quotes_gpc()){
 		$_POST['email'] = addslashes($_POST['email']);
 	}

 	$check = mysqli_query($conect, "SELECT * FROM users WHERE username = '".$_POST['username']."';");

 $check2 = mysqli_num_rows($check);
 if ($check2 == 0){
	die('That user does not exist in our database.<br /><br />If you think this is wrong <a href="login.php">try again</a>.');
}

while($info = mysqli_fetch_array( $check )){
	$_POST['pass'] = stripslashes($_POST['pass']);
 	$info['password'] = stripslashes($info['password']);
 	$_POST['pass'] = md5($_POST['pass']);

	//gives error if the password is wrong
 	if ($_POST['pass'] != $info['password']){
 		die('Incorrect password, please <a href="login.php">try again</a>.');
 	}
	
	else{ // if login is ok then we add a cookie 
		$_POST['username'] = stripslashes($_POST['username']); 
		$hour = time() + 3600; 
		setcookie(ID_your_site, $_POST['username'], $hour); 
		setcookie(Key_your_site, $_POST['pass'], $hour);	 
 
		//then redirect them to the members area 
		header("Location: ./index.php"); 
		exit();
	}
}
}
else{
// if they are not logged in 
?>    
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    .wrap {
        height: 100%;
        width: 100%;
        /* background-image: url(icon_images/background.jpg); */
        background-color: bisque;
        background-position: center;
        background-size: cover;
        position: absolute;
    }
    .form-wrap {
        width: 380px;
        height: 480px;
        position: relative;
        margin: 6% auto;
        background: #fff;
        padding: 5px;
        overflow: hidden;
    }
    .button-wrap {
        width: 230px;
        margin: 35px auto;
        position: relative;
        box-shadow: 0 0 600px 9px #fcae8f;
        border-radius: 30px;
    }
    .togglebtn {
        padding: 10px 30px;
        cursor: pointer;
        background: transparent;
        border: 0;
        outline: none;
        position: relative;
    }
    #btn {
        top: 0;
        left: 0;
        position: absolute;
        width: 110px;
        height: 100%;
        background: linear-gradient(to right, #ff105f, #ffad06);
        border-radius: 30px;
        transition: .5s;
    }
    .input-group {
        top: 180px;
        position: absolute;
        width: 280px;
        transition: .5s;
    }
    .input-field {
        width: 100%;
        padding: 10px 0;
        margin: 5px 0;
        border: none;
        border-bottom: 1px solid #999;
        outline: none;
        background: transparent;
    }
    .submit {
        width: 85%;
        padding: 10px 30px;
        cursor: pointer;
        display: block;
        margin: auto;
        background: linear-gradient(to right, #ff105f, #ffad06);
        border: 0;
        outline: none;
        border-radius: 30px;
    }
    .checkbox {
        margin: 30px 10px 30px 0;
    }
    span {
        color: #777;
        font-size: 12px;
        bottom: 68px;
        position: absolute;
    }
    #login {
        left: 50px;
    }
    #register {
        left: 450px;
    }
</style>
</head>
<body>
    <div class="wrap">
         <div class="form-wrap">
            <div class="button-wrap">
                <div id="btn"></div>
                <button type="button" class="togglebtn" onclick="login()">LOG IN</button>
                <button type="button" class="togglebtn" onclick="register()">REGISTER</button>
            </div>
            <form id="login" action="<?php echo $_SERVER['PHP_SELF']?>" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="User name or Email" required>
                <input type="password" name="username" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" name="pass"  class="checkbox"><span>Remember Password</span>
                <button class="submit" name="submit">Login</button>
            </form>
            <?php 
 }
 ?>

<?php 
//Connects to your Database 
$db = mysqli_connect("localhost", "root", "Tkddyd@135","oss") or die(mysqli_error());  

//This code runs if the form has been submitted
if (isset($_POST['submit1'])) { 

//This makes sure they did not leave any fields blank
if (!$_POST['username1'] | !$_POST['pass1'] | !$_POST['pass2'] ) {
	die('You did not complete all of the required fields');
}

// checks if the username is in use
if (!get_magic_quotes_gpc()) {
	$_POST['username1'] = addslashes($_POST['username1']);
}

$usercheck = $_POST['username1'];
$check = mysqli_query($db,"SELECT * FROM users WHERE username = '$usercheck';");
$check2 = mysqli_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) {
 	die('Sorry, the username '.$_POST['username1'].' is already in use.');
}

// this makes sure both passwords entered match
if ($_POST['pass1'] != $_POST['pass2']) {
	die('Your passwords did not match. ');
}

// here we encrypt the password and add slashes if needed
$_POST['pass1'] = md5($_POST['pass1']);

if (!get_magic_quotes_gpc()) {
	$_POST['pass1'] = addslashes($_POST['pass1']);
	$_POST['username1'] = addslashes($_POST['username1']);
}

// now we insert it into the database
$insert = "INSERT INTO users (username, password) VALUES ('".$_POST['username1']."', '".$_POST['pass1']."');";
$add_member = mysqli_query($db,$insert);
?>

 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now <a href="login_register.php">login</a>.</p>

 <?php 
 }

 else 
 {	
 ?>
            <form id="register" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="input-group">
                <input type="text" name="username1" class="input-field" placeholder="User name or Email" required>
                <input type="password" name="pass1" class="input-field" placeholder="Enter Password" required>
                <input type="password" name="pass2" class="input-field" placeholder="cheak Password" required>
                <input type="checkbox" class="checkbox"><span>Terms and conditions</span>
                <button class="submit" name="submit1">REGISTER</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
            
            
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
 <?php
 }
 ?> 
    </script>
</body>
