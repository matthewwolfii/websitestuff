<!DOCTYPE html>
<html>
<head>
    <link href="input-style.css" type="text/css" rel="stylesheet"/>
</head>
<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
		exit();
	}
	include 'functions.php';
?>

<h1>Player:</h1>

<h2><?php echo $_SESSION['name'];?></h2>

<p>&nbsp;</p>



<body onload="mobileMode()">
    <script type="text/javascript">

		function swapStyleSheet(sheet) {
    			document.getElementById("pagestyle").setAttribute("href", sheet);
		}


		function mobileMode(){
    			var x= navigator.userAgent;
    				if (x.indexOf('Mobile')>=0){
        			swapStyleSheet("input-stylemobile.css") ;
    				}
   		else{
    		}
		}
	var totalpoints = 0;
    	var twentyr = 0;
    function increment() {
        if (twentyr < 5){
            twentyr += 1;
	}
	else{
		twentyr = 0;
	}
            document.getElementById("twentyr").innerHTML = twentyr;
		total();
        
    };

    function decrement() {
        if (twentyr > 0 ){
            twentyr -= 1;
	}
	else{
		twentyr = 5;
	}
            document.getElementById("twentyr").innerHTML = twentyr;
		total();
        
    };

var twentyfiver = 0;
    function increment1() {
        if (twentyfiver < 5){
            twentyfiver += 1;
	}
	else{
		twentyfiver = 0;
	}
            document.getElementById("twentyfiver").innerHTML = twentyfiver;
		total();
        
    };

    function decrement1() {
        if (twentyfiver > 0 )
            twentyfiver -= 1;
	else
		twentyfiver = 5;
            document.getElementById("twentyfiver").innerHTML = twentyfiver;
		total();
        
    };


var thirtythreer = 0;
    function increment2() {
        if (thirtythreer < 5)
            thirtythreer += 1;
	else
		thirtythreer = 0;
            document.getElementById("thirtythreer").innerHTML = thirtythreer;
		total();
        
    };

    function decrement2() {
        if (thirtythreer > 0 )
            thirtythreer -= 1;
	else
		thirtythreer = 5;
            document.getElementById("thirtythreer").innerHTML = thirtythreer;
		total();
        
    };


var twentyfivem = 0;
    function increment3() {
        if (twentyfivem < 5)
            twentyfivem += 1;
	else
		twentyfivem = 0;
            document.getElementById("twentyfivem").innerHTML = twentyfivem;
		total();
        
    };

    function decrement3() {
        if (twentyfivem > 0 )
            twentyfivem -= 1;
	else
		twentyfivem = 5;
            document.getElementById("twentyfivem").innerHTML = twentyfivem;
		total();
        
    };


var thirtythreem = 0;
    function increment4() {
        if (thirtythreem < 5)
            thirtythreem += 1;
	else
		thirtythreem = 0;
            document.getElementById("thirtythreem").innerHTML = thirtythreem;
		total();
        
    };

    function decrement4() {
        if (thirtythreem > 0 )
            thirtythreem -= 1;
	else
		thirtythreem = 5;
            document.getElementById("thirtythreem").innerHTML = thirtythreem;
		total();
        
    };

var week = 1;
    function increment5() {
        if (week < 6)
            week += 1;
	else
		week = 1;
            document.getElementById("week").innerHTML = week;
        
    };

    function decrement5() {
        if (week > 1 )
            week -= 1;
	else
		week = 6;
            document.getElementById("week").innerHTML = week;
        
    };

var round = 1;
    function increment6() {
        if (round < 3)
            round += 1;
	else
		round = 1;
            document.getElementById("round").innerHTML = round;
        
    };

    function decrement6() {
        if (round > 1 )
            round -= 1;
	else
		round = 3;
            document.getElementById("round").innerHTML = round;
        
    };
	
	function submit() {
		document.getElementById('first').value= twentyr;
		document.getElementById('second').value= twentyfiver;
		document.getElementById('third').value= thirtythreer;
		document.getElementById('fourth').value= twentyfivem;
		document.getElementById('fifth').value= thirtythreem;
		document.getElementById('sixth').value= week;
		document.getElementById('seventh').value= round;
		document.getElementById('eight').value= totalpoints;
		document.forms[2].submit();
}

	function total() {
		totalpoints = (twentyr) + (2 * twentyfiver) + (3 * thirtythreer) + (4 * twentyfivem) + (5 * thirtythreem);
		document.getElementById("totalpoints").innerHTML = totalpoints;

};

    </script>



<p>Week:</p>

<input id="uparrow" type="image" onClick="increment5()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

	<p id="week">1</p>

<input id="downarrow" type="image" onClick="decrement5()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">


<p>Round:</p>

<input id="uparrow" type="image" onClick="increment6()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

	<p id="round">1</p>

<input id="downarrow" type="image" onClick="decrement6()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">


<p>20ft Recruit:</p>

<input id="uparrow" type="image" onClick="increment()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

    <p id="twentyr">0</p>

<input id="downarrow" type="image" onClick="decrement()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>25ft Recruit:&nbsp;&nbsp;</p>

<input id="uparrow" type="image" onClick="increment1()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="twentyfiver">0</p>

<input id="downarrow" type="image" onClick="decrement1()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>33ft Recruit:</p>

<input id="uparrow" type="image" onClick="increment2()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="thirtythreer">0</p>

<input id="downarrow" type="image" onClick="decrement2()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>25ft Marksmen:</p>

<input id="uparrow" type="image" onClick="increment3()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="twentyfivem">0</p>

<input id="downarrow" type="image" onClick="decrement3()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>33ft Marksmen:</p>

<input id="uparrow" type="image" onClick="increment4()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="thirtythreem">0</p>

<input id="downarrow" type="image" onClick="decrement4()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<h1>Total:</h1>

<h2 id="totalpoints">0</h2>

<input type="image"  onClick="submit()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/submit-button.png" alt="show">

<form action="scores.php">
    <input type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/showscores.png" alt="Scores">
</form>

<form action="index.php">
    <input type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/home.png" alt="Home">
</form>

<form method = "post">

    	<input id="first" type="hidden" name="first">
    	<input id="second" type="hidden" name="second">
    	<input id="third" type="hidden" name="third">
    	<input id="fourth" type="hidden" name="fourth">
    	<input id="fifth" type="hidden" name="fifth">
	<input id="sixth" type="hidden" name="sixth">
    	<input id="seventh" type="hidden" name="seventh">
	<input id="eight" type="hidden" name="eight">

</form>

</body>

</html>




