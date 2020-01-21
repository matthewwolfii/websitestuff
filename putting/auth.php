<?php
	session_start();
	include 'functions.php';
	#creating a new account
	if(isset($_POST['uname']) && isset($_POST['pwd'])){
		if(isset($_POST['email']) && isset($_POST['verifyPwd'])){
			if($_POST['pwd'] == $_POST['verifyPwd']){
				$result = queryHandler("INSERT INTO auth (username,password,email) VALUES ('" . strtolower(stringClean($_POST['uname'])) . "','" . password_hash($_POST['pwd'],PASSWORD_DEFAULT) . "', '" . $_POST['email'] . "')");
				$_SESSION['loginError'] = "Account creation successful! Please check your inbox for your verification code!";
				sendMyMail();
				header('Location: emailvalidation.php');
			}
			else{
				$_SESSION['loginError'] = "ERROR: The passwords did not match!";
				header('Location: register.php');
			}
		}
		else{
			$_SESSION['loginError'] = "ERROR: Please fill out all the fields!";
			header('Location: register.php');
		}

	}
	#logging into existing account
	if(isset($_POST['username']) && isset($_POST['password'])){
		$result = queryHandler("SELECT * FROM auth WHERE username='" . strtolower(stringClean($_POST['username'])) . "'");
		$row = $result->fetch_array();
		if($row['active'] == 0){ #verify email screen
			header('Location: emailvalidation.php');
		}
		else if(password_verify($_POST['password'],$row['password'])){
			$_SESSION['loggedin'] = "yessirhedoneloggedin";
			header('Location: index.php');
		}
		else{
			$_SESSION['loginError'] = "ERROR: Invalid credentials!";
			header('Location: login.php');
		}
	}
	if(isset($_POST['valcode'])){
		queryHandler("UPDATE auth SET active = 1 WHERE activation_code = '" . $_POST['valcode'] .  "'");
		queryHandler("UPDATE auth SET activation_code = 'none' WHERE activation_code = '" . $_POST['valcode'] .  "'");
		header('Location: login.php');
		#Congrats its been activated plz login thx sir

		#also think about conditions in which it would be fine to allow users in without username/password a second time. May take reworking conditionals....
	}
	function sendMyMail(){
		require_once('PHPMailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 2;
		$mail->Debugoutput = error_log;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		#$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Host = "smtp.gmail.com";
		#$mail->Port = '587';                    // set the SMTP port for the GMAIL server
		$mail->Username = "putting.matthew.wolf.org@gmail.com"; // SMTP account username example
		$mail->Password = "MW01fPassw0rd";        // SMTP account password example
		$mail->SetFrom('no-reply@putting.matthew-wolf.org');

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Welcome to the SBU Putting League, ' . $_POST['uname'] . '!';
		$mail->Body = "Hello " . $_POST['uname'] . ", <br />Thank you for signing up! Here is your verification code: <strong>" . validationCodeHandler(strtolower(stringClean($_POST['uname']))) . "</strong>";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->AddAddress($_POST['email']);
		$mail->send();


	}
	function validationCodeHandler($username){
		$result = queryHandler("SELECT * FROM auth");
		$code = createRandomCode();
		while($row = $result->fetch_array()){
				if($row['activation_code'] == $code){
					return validationCodeHandler($username);
				}
		}
		$update_statement = queryHandler("UPDATE auth SET activation_code = '" . $code . "' WHERE username = '" . $username . "'");

		return $code;

	}
	function createRandomCode() {

    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while($i <= 25){
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;

}


?>
