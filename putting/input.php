<!DOCTYPE html>
<html>
<head>
    <link href="input-style.css" type="text/css" rel="stylesheet"/>
</head>
<?php
	session_start();
?>

<h1>Player:</h1>

<h2><?php echo $_SESSION['name'];?></h2>

<p>&nbsp;</p>



<body>
    <script type="text/javascript">
    var twentyr = 0;
    function increment() {
        if (twentyr < 5){
            twentyr += 1;
            document.getElementById("twentyr").innerHTML = twentyr;
        }
    };

    function decrement() {
        if (twentyr > 0 ){
            twentyr -= 1;
            document.getElementById("twentyr").innerHTML = twentyr;
        }
    };

var twentyfiver = 0;
    function increment1() {
        if (twentyfiver < 5){
            twentyfiver += 1;
            document.getElementById("twentyfiver").innerHTML = twentyfiver;
        }
    };

    function decrement1() {
        if (twentyfiver > 0 ){
            twentyfiver -= 1;
            document.getElementById("twentyfiver").innerHTML = twentyfiver;
        }
    };


var thirtythreer = 0;
    function increment2() {
        if (thirtythreer < 5){
            thirtythreer += 1;
            document.getElementById("thirtythreer").innerHTML = thirtythreer;
        }
    };

    function decrement2() {
        if (thirtythreer > 0 ){
            thirtythreer -= 1;
            document.getElementById("thirtythreer").innerHTML = thirtythreer;
        }
    };


var twentyfivem = 0;
    function increment3() {
        if (twentyfivem < 5){
            twentyfivem += 1;
            document.getElementById("twentyfivem").innerHTML = twentyfivem;
        }
    };

    function decrement3() {
        if (twentyfivem > 0 ){
            twentyfivem -= 1;
            document.getElementById("twentyfivem").innerHTML = twentyfivem;
        }
    };


var thirtythreem = 0;
    function increment4() {
        if (thirtythreem < 5){
            thirtythreem += 1;
            document.getElementById("thirtythreem").innerHTML = thirtythreem;
        }
    };

    function decrement4() {
        if (thirtythreem > 0 ){
            thirtythreem -= 1;
            document.getElementById("thirtythreem").innerHTML = thirtythreem;
        }
    };

	
	function submit() {
		document.getElementById('first').value= twentyr
		document.getElementById('second').value= twentyfiver
		document.getElementById('third').value= thirtythreer
		document.getElementById('fourth').value= twentyfivem
		document.getElementById('fifth').value= thirtythreem
		document.forms[0].submit();
}

    </script>

</body>

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

<h2>Total Points</h2>

<input type="image"  onClick="submit()" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/submit-button.png" alt="show">

<form action="scores.php">
    <input type="image" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/showscores.png" alt="show">
</form>

<form method = "post">

    <input id="first" type="hidden" name="first">
    <input id="second" type="hidden" name="second">
    <input id="third" type="hidden" name="third">
    <input id="fourth" type="hidden" name="fourth">
    <input id="fifth" type="hidden" name="fifth">
</form>

</html>




