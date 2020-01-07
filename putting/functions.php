<?php
	#$connection = establishSQL();
	function establishSQL(){
	$host = "localhost";
	$user = "putt";
 	#$pass = "MW01fPa$$w0rd";
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
		echo "<option value='none'>Select a Player</option>";
		while($row = $result->fetch_array()){
			echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        	}
	}
	function displayTable(){
		#$sql = "SELECT * from weekOne WHERE name='" . $_SESSION['name'] . "'";
		$sql = "SELECT * from weekOne";
		$result = queryHandler($sql);	
		echo "<table border='1'> <tr><th>Name</th><th>r120r</th><th>r125r</th><th>r133r</th><th>r125m</th><th>r133m</th><th>r1total</th><th>r220r</th><th>r225r</th><th>r233r</th><th>r225m</th><th>r233m</th><th>r2total</th><th>r320r</th><th>r325r</th><th>r333r</th><th>r325m</th><th>r333m</th><th>r3total</th><th>ftotal</th> </tr>";
		while($row = $result->fetch_array()){
			echo "<tr><td>" . $row['name'] . "</td><td>" . $row['r120r'] . "</td><td>" . $row['r125r'] . "</td><td>" . $row['r133r'] . "</td><td>" . $row['r125m'] . "</td><td>" . $row['r133m'] . "</td><td>" . $row['r1total'] . "</td><td>" . $row['r220r'] . "</td><td>" . $row['r225r'] . "</td><td>" . $row['r233r'] . "</td><td>" . $row['r225m'] . "</td><td>" . $row['r233m'] . "</td><td>" . $row['r2total'] . "</td><td>" . $row['r320r'] . "</td><td>" . $row['r325r'] . "</td><td>" . $row['r333r'] . "</td><td>" . $row['r325m'] . "</td><td>" . $row['r333m'] . "</td><td>" . $row['r3total'] . "</td><td>" . $row['ftotal'] . "</td></tr>";
        	}
		echo "</table>";
	}		
	if(isset($_POST['name']) && strlen($_POST['name']) > 0){
		$sql_add_player = "INSERT INTO weekOne (name, r120r, r125r, r133r, r125m, r133m, r1total, r220r, r225r, r233r, r225m, r233m, r2total, r320r, r325r, r333r, r325m, r333m, r3total, ftotal) VALUES ('" . $_POST['name'] . "',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";			
		queryHandler($sql_add_player);
		$_SESSION['name'] = $_POST['name'];
		#$_POST['NAME'] = NULL;
		header('Location: input.php');
	}
	if(isset($_POST['delete'])){
		#echo "DELETE FROM weekOne WHERE person='" . $_SESSION['name'] . "'";
		$sql_delete_player = "DELETE FROM weekOne WHERE name='" . $_SESSION['name'] . "'";
		queryHandler($sql_delete_player);
		header('Location: index.php');

	}
	if(isset($_POST['player'])){
		$_SESSION['name'] = $_POST['player'];
		#$_POST['player'] = NULL;
		header('Location: input.php');		
	}
?>