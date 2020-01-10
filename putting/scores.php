<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scores-style.css">
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
	<!--<li><a onclick='toggleTable("all")'>Show All</a></li>	-->
</ul>

<script type="text/javascript">
	function swapStyleSheet(sheet) {
    		document.getElementById("pagestyle").setAttribute("href", sheet);
	}
	function mobileMode(){
    		var x= navigator.userAgent;
    			if (x.indexOf('Mobile')>=0){
        			swapStyleSheet("scores-stylemobile.css") ;
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
<style>
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  background-color: #111;
}</style>
<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
		exit();
	}
	include 'functions.php';
	loadTables();
?>
<!--<form action="index.php">
    <input type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/home.png" alt="Home">
</form>-->


</body>
</html>