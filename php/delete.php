<?php
	include $_SERVER['DOCUMENT_ROOT']."db.php";
	$uname = $_GET["uname"];
	query("delete from FileDownload where uname='$uname';");
	header("location: index.php")
?>
	