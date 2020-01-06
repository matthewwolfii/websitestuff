<!DOCTYPE html>
<html>
<head>
    <link href="index-style.css" type="text/css" rel="stylesheet" />

</head>
<h1>Player:</h1>

<h2>Player Name</h2>

<p>&nbsp;</p>

<p>20ft Recruit:</p>

<?php
    function button1() {
    echo "Up Score";
}
    function button2() {
    echo "Down Score";
}
?>

<input id="arrow" type="image" value="button1" onclick="alert('Score Up')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="20ftR">0</p>

<input id="arrow" type="image" onclick="alert('Score Down')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>25ft Recruit:&nbsp;&nbsp;</p>

<input id="arrow" type="image" onclick="alert('Score Up')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="25ftR">0</p>

<input id="arrow" type="image" onclick="alert('Score Down')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>33ft Recruit:</p>

<input id="arrow" type="image" onclick="alert('Score Up')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="33ftR">0</p>

<input id="arrow" type="image" onclick="alert('Score Down')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>25ft Marksmen:</p>

<input id="arrow" type="image" onclick="alert('Score Up')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="25ftM">0</p>

<input id="arrow" type="image" onclick="alert('Score Down')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<p>33ft Marksmen:</p>

<input id="arrow" type="image" onclick="alert('Score Up')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/uparrow.png" alt="show">

<p id="33ftM">0</p>

<input id="arrow" type="image" onclick="alert('Score Down')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/downarrow.png" alt="show">

<h1>Total:</h1>

<h2>Total Points</h2>

<input type="image" onclick="alert('Submited Score')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/submit-button.png" alt="show">

<input type="image" onclick="alert('Showing Scores')" src="https://github.com/matthewwolfii/websitestuff/raw/master/putting/showscores.png" alt="show">
</html>
