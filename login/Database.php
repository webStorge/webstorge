<?php

define("HOST", "localhost");
define("USER","root");
define("PASS","");
define("DB","mydata");
$con=mysqli_connect(HOST,USER,PASS,DB);
mysqli_set_charset($con,"utf8");

?>