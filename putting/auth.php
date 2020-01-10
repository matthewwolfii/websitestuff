<?php
	session_start();
	include 'functions.php';
	if(isset($_POST['uname']) && isset($_POST['pwd'])){
		if(isset($_POST['email']) && isset($_POST['verifyPwd'])){ 
			if($_POST['pwd'] == $_POST['verifyPwd']){
				$result = queryHandler("INSERT INTO auth (username,password,email) VALUES ('" . $_POST['uname'] . "','" . password_hash($_POST['pwd'],PASSWORD_DEFAULT) . "', '" . $_POST['email'] . "')");
				#$_SESSION['loggedin'] = "yessirhedoneloggedin";
				header('Location: login.php');
			}
		}
	}
	if(isset($_POST['username']) && isset($_POST['password'])){
		$result = queryHandler("SELECT * FROM auth WHERE username='" . $_POST['username'] . "'");
		$row = $result->fetch_array();
		if($row['active'] == 0){
			header('Location: login.php');
		}
		else if(password_verify($_POST['password'],$row['password'])){
			$_SESSION['loggedin'] = "yessirhedoneloggedin";
			header('Location: index.php');
		}
		else{
			header('Location: login.php');
		}
	}


?>