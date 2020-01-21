<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

<head>
	<link id="pagestyle" rel="stylesheet" type="text/css" href="scores-style.css">
	<script src="sortable.js"></script>
</head>
<body onload="mobileMode()">
<ul>
	<li><a onclick='location.replace("https://putting.matthew-wolf.org")'>Home</a></li>
	<li><a onclick='toggleTable("weekOne")'>Week 1</a></li>
	<li><a onclick='toggleTable("weekTwo")'>Week 2</a></li>
	<li><a onclick='toggleTable("weekThree")'>Week 3</a></li>
	<li><a onclick='toggleTable("weekFour")'>Week 4</a></li>
	<li><a onclick='toggleTable("weekFive")'>Week 5</a></li>
	<li><a onclick='toggleTable("weekSix")'>Week 6</a></li>
	<li><a onclick='toggleTable("total")'>Total</a></li>
</ul>

<script type="text/javascript">
	function swapStyleSheet(sheet) {
    			document.getElementById("pagestyle").setAttribute("href", sheet);
		}


		function mobileMode(){
    			var x= navigator.userAgent;
    				if (x.indexOf('Mobile')>=0){
        			swapStyleSheet("scores-stylemobile.css");
    				}
   		else{
    		}
		}
	function toggleTable(idNum){
		if(idNum == "all"){
			document.getElementById("weekOne").style.display = 'block';
			document.getElementById("weekOneTable").style.display = 'table';
			document.getElementById("weekTwo").style.display = 'block';
			document.getElementById("weekTwoTable").style.display = 'table';
			document.getElementById("weekThree").style.display = 'block';
			document.getElementById("weekThreeTable").style.display = 'table';
			document.getElementById("weekFour").style.display = 'block';
			document.getElementById("weekFourTable").style.display = 'table';
			document.getElementById("weekFive").style.display = 'block';
			document.getElementById("weekFiveTable").style.display = 'table';
			document.getElementById("weekSix").style.display = 'block';
			document.getElementById("weekSixTable").style.display = 'table';
			document.getElementById("total").style.display = 'block';
			document.getElementById("totalTable").style.display = 'table';

		}
		var current = document.getElementById(idNum).style.display;
		if(current == 'none'){
			var h = document.getElementsByTagName('h3');
			var t = document.getElementsByTagName('table');
			for(var i = h.length; i--;){
				h[i].style.display='none';
				t[i].style.display='none';
			}

			document.getElementById(idNum).style.display = 'block';
			document.getElementById(idNum + "Table").style.display = 'table';
		}

	}
</script>
<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
		exit();
	}
	include 'functions.php';
	loadTables();
?>
</body>
</html>
