<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scores-style.css">
</head>
<body>
<?php
	session_start();
	include 'functions.php';
	#echo $_SESSION['name'];
	displayTable();
?>
</body>
</html>