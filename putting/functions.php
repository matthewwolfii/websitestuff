<?php
	function establishSQL(){
		$host = "localhost";
		$user = "putt";
		$pass = "";
		$name = "putting";
		$conn = mysqli_connect($host,$user,$pass,$name);
		if(!$conn):
			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		endif;
		return $conn;
	}
	$sql_selectAll = "SELECT * from weekOne";
	function queryHandler($sql){
		return mysqli_query(establishSQL(), $sql);
	}
	function getDropDown($stringIn){
		$result = queryHandler($stringIn);
		if(isset($_SESSION['name'])){	#causes selected player to be displayed at top, if a player has previously been selected
			echo "<option value='none'>" . $_SESSION['name'] . "</option>";
		}
		else{
			echo "<option value='none'>Select a Player</option>";
		}

		while($row = $result->fetch_array()){ #prints list of players
			if(!isset($_SESSION['name']) || $_SESSION['name'] != $row['name']){ #prevents the previous conditional from causing the same name to display twice within the dropdown
				echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        	}
		}
	}

	if(isset($_POST['name']) && strlen($_POST['name']) > 0 && strlen($_POST['name']) < 16){
		for($i = 1; $i < 7;  $i++){
			$sql_add_player = "INSERT INTO " . tableSwitch($i) . " (name, r120r, r125r, r133r, r125m, r133m, r1total, r220r, r225r, r233r, r225m, r233m, r2total, r320r, r325r, r333r, r325m, r333m, r3total, ftotal) VALUES ('" . stringClean($_POST['name']) . "',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
			queryHandler($sql_add_player);
		}
		queryHandler("INSERT INTO grandTotal (name,weekOne,weekTwo,weekThree,weekFour,weekFive,weekSix,total) VALUES ('" . $_POST['name'] . "',0,0,0,0,0,0,0)");
		$_SESSION['name'] = $_POST['name'];
		#$_POST['NAME'] = NULL;
		header('Location: input.php');
	}
	if(isset($_POST['delete'])){
		for($i = 1; $i < 7;  $i++){
			$sql_delete_player = "DELETE FROM " . tableSwitch($i) . " WHERE name='" . $_SESSION['name'] . "'";
			queryHandler($sql_delete_player);
		}

		queryHandler("DELETE FROM grandTotal WHERE name='" . $_SESSION['name'] . "'");
		$_SESSION['name'] = NULL;
		header('Location: index.php');

	}
	if(isset($_POST['player'])){
		$_SESSION['name'] = $_POST['player'];
		#$_POST['player'] = NULL;
		#header('Location: input.php');
	}
	##########INPUT##############################################################
	if(isset($_POST['first'])){
		$sqlTemp = inputSQLHelper();
		#echo $sqlTemp;
		queryHandler($sqlTemp);
		updateTotals();
		header('Location: scores.php');
	}
	function inputSQLHelper(){
		$sql;
		$sql_week;
		$sql_round;
		switch($_POST['sixth']){
			case 1:
				$sql_week = "weekOne";
			break;
			case 2:
				$sql_week = "weekTwo";
			break;
			case 3:
				$sql_week = "weekThree";
			break;
			case 4:
				$sql_week = "weekFour";
			break;
			case 5:
				$sql_week = "weekFive";
			break;
			case 6:
				$sql_week = "weekSix";
			break;
		};
		switch($_POST['seventh']){
			case 1:
				$sql_round = "r1";
			break;
			case 2:
				$sql_round = "r2";
			break;
			case 3:
				$sql_round = "r3";
			break;
		};
		$sql = "UPDATE " . $sql_week . " SET " . $sql_round . "20r=" . $_POST['first'] . "," . $sql_round . "25r=" . $_POST['second'] . "," . $sql_round . "33r=" . $_POST['third'] . "," . $sql_round . "25m=" . $_POST['fourth'] . "," . $sql_round . "33m=" . $_POST['fifth'] . "," . $sql_round . "total=" . $_POST['eight'] . " WHERE name='" . $_SESSION['name'] . "'";
		return $sql;
	}
#####################scores#####################################################
	function loadTables(){
		for($i = 1; $i < 7; $i++){

			$current = tableSwitch($i);
			$result = queryHandler("SELECT * from " . $current);
			if($result->num_rows < 1 && $i == 1){
				echo "There is no data to be displayed.";
				return;
			}
			echo "<h3 style='display:none' id='". tableSwitch($i) . "'>Week " . $i . ":<br></h3>";
			echo "<table class='sortable' class='tables' style='display:none' border='1' id='". tableSwitch($i) . "Table'> <tr><th>Name</th><th>Round 1 20ft Recruit</th><th>Round 1 25ft Recruit</th><th>Round 1 33ft Recruit</th><th>Round 1 25ft Marksmen</th><th>Round 1 33ft Marksmen</th><th>Round 1 Total</th><th>Round 2 20ft Recruit</th><th>Round 2 25ft Recruit</th><th>Round 2 33ft Recruit</th><th>Round 2 25ft Marksmen</th><th>Round 2 33ft Marksmen</th><th>Round 2 Total</th><th>Round 3 20ft Recruit</th><th>Round 3 25ft Recruit</th><th>Round 3 33ft Recruit</th><th>Round 3 25ft Marksmen</th><th>Round 3 33ft Marksmen</th><th>Round 3 Total</th><th>Final Total</th> </tr>";
			while($row = $result->fetch_array()){
				if($row['ftotal'] > 0){
					echo "<tr><td onclick='toggleTable(\"" . $row['name'] . "\")'>" . $row['name'] . "</td><td>" . $row['r120r'] . "</td><td>" . $row['r125r'] . "</td><td>" . $row['r133r'] . "</td><td>" . $row['r125m'] . "</td><td>" . $row['r133m'] . "</td><td>" . $row['r1total'] . "</td><td>" . $row['r220r'] . "</td><td>" . $row['r225r'] . "</td><td>" . $row['r233r'] . "</td><td>" . $row['r225m'] . "</td><td>" . $row['r233m'] . "</td><td>" . $row['r2total'] . "</td><td>" . $row['r320r'] . "</td><td>" . $row['r325r'] . "</td><td>" . $row['r333r'] . "</td><td>" . $row['r325m'] . "</td><td>" . $row['r333m'] . "</td><td>" . $row['r3total'] . "</td><td>" . $row['ftotal'] . "</td></tr>";
				}
			}
			echo "</table>";
		}
		echo "<h3 id = 'total'>Overall Totals:<br></h3>";
		echo "<table class='sortable' class='tables' border='1' id='totalTable'> <tr><th>Name</th><th>Week 1</th><th>Week 2</th><th>Week 3</th><th>Week 4</th><th>Week 5</th><th>Week 6</th><th>Total</th></tr>";
		$sql_readOver = "SELECT * from grandTotal";
		$result = queryHandler($sql_readOver);
		while($row = $result->fetch_array()){
			if($row['total'] > 0){
				echo "<tr><td onclick='toggleTable(\"" . $row['name'] . "\")'>" . $row['name'] . "</td><td>" . $row['weekOne'] . "</td><td>" . $row['weekTwo'] . "</td><td>" . $row['weekThree'] . "</td><td>" . $row['weekFour'] . "</td><td>" . $row['weekFive'] . "</td><td>" . $row['weekSix'] . "</td><td>" . $row['total'] . "</td></tr>";
			}
		}
		echo "</table>";

		$result = queryHandler("SELECT * from weekOne");
		while($row = $result->fetch_array()){
			loadPlayerTables($row['name']);
		}
	}
	function loadPlayerTables($name){
		echo "<h3 style='display:none' id='" . $name . "' >" . $name . ":</h3>";
		echo "<table class='tables'style='display:none' border='1' id='" . $name . "Table' ><tr><th>Week</th><th>Round 1 20ft Recruit</th><th>Round 1 25ft Recruit</th><th>Round 1 33ft Recruit</th><th>Round 1 25ft Marksmen</th><th>Round 1 33ft Marksmen</th><th>Round 1 Total</th><th>Round 2 20ft Recruit</th><th>Round 2 25ft Recruit</th><th>Round 2 33ft Recruit</th><th>Round 2 25ft Marksmen</th><th>Round 2 33ft Marksmen</th><th>Round 2 Total</th><th>Round 3 20ft Recruit</th><th>Round 3 25ft Recruit</th><th>Round 3 33ft Recruit</th><th>Round 3 25ft Marksmen</th><th>Round 3 33ft Marksmen</th><th>Round 3 Total</th><th>Final Total</th> </tr>";
		for($i = 1; $i < 7; $i++){
			$result = queryHandler("SELECT * from " . tableSwitch($i) . " WHERE name='" . $name . "'");
			$row = $result->fetch_array();
			echo "<tr><td>" . $i . "</td><td>" . $row['r120r'] . "</td><td>" . $row['r125r'] . "</td><td>" . $row['r133r'] . "</td><td>" . $row['r125m'] . "</td><td>" . $row['r133m'] . "</td><td>" . $row['r1total'] . "</td><td>" . $row['r220r'] . "</td><td>" . $row['r225r'] . "</td><td>" . $row['r233r'] . "</td><td>" . $row['r225m'] . "</td><td>" . $row['r233m'] . "</td><td>" . $row['r2total'] . "</td><td>" . $row['r320r'] . "</td><td>" . $row['r325r'] . "</td><td>" . $row['r333r'] . "</td><td>" . $row['r325m'] . "</td><td>" . $row['r333m'] . "</td><td>" . $row['r3total'] . "</td><td>" . $row['ftotal'] . "</td></tr>";
		}
		echo "</table>";
	}
	function updateTotals(){
		for($i = 1; $i < 7; $i++){
			$current = tableSwitch($i);
			$sql_read = "SELECT * from " . $current;
			$result = queryHandler($sql_read);
			while($row = $result->fetch_array()){
				$total = $row['r1total'] + $row['r2total'] + $row['r3total'];
				$sql_write = "UPDATE " . $current . " SET ftotal=" . $total . " WHERE name='" . $row['name'] . "'";
				queryHandler($sql_write);
				$sql_otherTable = "UPDATE grandTotal SET " . $current . "=" . $total . " WHERE name='" . $row['name'] . "'";
				queryHandler($sql_otherTable);
			}
		}
		$sql_readTotals = "SELECT * from grandTotal";
		$result = queryHandler($sql_readTotals);
		while($row = $result->fetch_array()){
			$currentTotal = $row['weekOne'] + $row['weekTwo'] + $row['weekThree'] + $row['weekFour'] + $row['weekFive'] + $row['weekSix'];
			#echo $currentTotal;
			$sql_writeTotals = "UPDATE grandTotal SET total= " . $currentTotal . " WHERE name='" . $row['name'] . "'";
			queryHandler($sql_writeTotals);
		}
	}
	function tableSwitch($in){
		$output;
		#echo $in;
		switch($in){
			case 1:
				$output = "weekOne";
			break;
			case 2:
				$output = "weekTwo";
			break;
			case 3:
				$output = "weekThree";
			break;
			case 4:
				$output = "weekFour";
			break;
			case 5:
				$output = "weekFive";
			break;
			case 6:
				$output = "weekSix";
			break;
		};
		return $output;
	}
###########################helper#####################################################
	function addAccount(){
		$user = "devonelson50";
		$password = "no";
		$email = "devon@gobigred.org";
		$password_encrypted = password_hash($password, PASSWORD_BCRYPT);
		$sql = "INSERT INTO auth ('username', 'password', 'email') VALUES ()";

	}
	function stringClean($string){
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	}
?>
