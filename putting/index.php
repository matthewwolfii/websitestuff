<!DOCTYPE html>
<html>
	<head>
		<title>SBU PUTTING LEAGUE</title>
		<link id="pagestyle" rel="stylesheet" type="text/css" href="index-style.css">


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
			var txt;
			if (confirm("Do you want to delete this player?", "Delete Player")) {
					document.getElementById("deletein").value = "potato";
    				document.forms['deletename'].submit();
  			}
		}

		function clickSelect() {
			//document.forms['submitform'].submit();
			location.replace('input.php');
		}

	</script>
	<div id="whole" class="container">
	<img id="menu" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/MenuForPutting.png" alt="Menu">
		<?php
			session_start();
			if (!isset($_SESSION['loggedin'])) {
				header('Location: login.php');
				exit();
			}
			include 'functions.php';


		?>
		<form method = "post" id="submitform">
			<select id="submitformselect" name="player" onchange="this.form.submit()">
				<?php
					getDropDown($sql_selectAll);
				?>
			</select>
		</form>
		<p id="welcome">Welcome to the Putting League Counter!</p>
		<?php
			if(isset($_SESSION['name'])){
				echo "<p id='selecttext'>Currently selected:</p>";
			}
			else{
				echo "<p id='selecttext'>Select a player to continue:</p>";
			}
		 ?>
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
			<input id="deletein" type="hidden" name="delete">
		</form>
		<!--oldform:<form method = "post" id="deletename">
			<input type="hidden" type="submit" name="delete" value="Delete Selected Player">
		</form>-->

		<form action="scores.php">
    			<input class="showscorebutton" type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/showscores.png" alt="show">
		</form>
	</div>
	</body>
</html>
