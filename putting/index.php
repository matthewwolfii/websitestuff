<!DOCTYPE html>
<html>
	<head>
		<title>PUTTING</title>
		<link rel="stylesheet" type="text/css" href="index-style.css">
		<script type="text/javascript" src="javascript.js"></script>

	</head>
	<body>
		<?php
			session_start();
			include 'functions.php';
			
									
		?>
		<form method = "post">
			<select name="player" onchange="this.form.submit()">
				<?php 
					getDropDown($sql_selectAll); 
				?>	
			</select>
		</form>
		<p>Or create a new player:</p>
		<form method = "post">
			Name: <input type="text" name="name"><br>
			<input type="submit" value="Create Player">
		</form>
		<form method = "post">
			<input type="submit" name="delete" value="Delete Selected Player"></input>
		</form>


	</body>


</html>