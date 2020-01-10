<!DOCTYPE html>
<html>
	<head>
		<title>SBU PUTTING LEAGUE</title>
		<link id="pagestyle" rel="stylesheet" type="text/css" href="index-style.css">
		<script type="text/javascript" src="javascript.js"></script>
		
		
	</head>
	<body onload="mobileMode()">
		
	<script type="text/javascript">

		function swapStyleSheet(sheet) {
    			document.getElementById("pagestyle").setAttribute("href", sheet);
		}


		function mobileMode(){
    			var x= navigator.userAgent;
    				if (x.indexOf('Mobile')>=0){
        			swapStyleSheet("index-stylemobile.css") ;
    				}
   		else{
    		}
		}
		
		function clickCreate() {
			document.forms['insertname'].submit();
		}

		function clickDelete() {
			document.forms['deletename'].submit();
		}
		
		function clickSelect() {
			document.forms['submitform'].submit();
		}

	</script>
	<div class="container">
	<img id="menu" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/MenuForPutting.png" alt="Menu">
		<?php
			session_start();
			if (!isset($_SESSION['loggedin'])) {
				header('Location: login.php');
				exit();
			}
			include 'functions.php';
	
									
		?>
		<form method = "post" id="submitform" onchange="this.form.submit()">
			<select id="submitformselect" name="player">
				<?php 
					getDropDown($sql_selectAll); 
				?>	
			</select>
		</form>
		<p id="selecttext">Select a player to continue:</p>
		<input class="selectplayerbutton" type="image"  onClick="clickSelect()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/selectplayer.png" alt="Select">
		<p id="createplayertext">Or create a new player:</p>
		<div class="submitbuttons">
		<input class="createplayerbutton" type="image"  onClick="clickCreate()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/createplayer.png" alt="Create">
		<input class="deleteplayerbutton" type="image"  onClick="clickDelete()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/deleteplayer.png" alt="Delete">
		</div>		

		<form method = "post" id="insertname">
			Name: <input id="name" type="text" name="name"><br>
			<input type="hidden" type="submit" value="Create Player">
		</form>
		<form method = "post" id="deletename">
			<input type="hidden" name="delete">
<!--			<input type="submit" name="delete" value="Delete Selected Player">-->
		</form>

		<form action="scores.php">
    			<input class="showscorebutton" type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/showscores.png" alt="show">
		</form>
	</div>
	</body>
</html>