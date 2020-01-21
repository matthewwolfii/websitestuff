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
	$sql_selectAll = "SELECT * from test";
	function queryHandler($sql){
		return mysqli_query(establishSQL(), $sql);
	}
	function getDropDown($stringIn){
		$result = queryHandler($stringIn);
		echo "<option value='none'>Select a Player</option>";
		while($row = $result->fetch_array()){
			echo "<option value='" . $row['person'] . "'>" . $row['person'] . "</option>";
        	}
	}
	function displayTable(){
		$sql = "SELECT * from test";
		$result = queryHandler($sql);	
		echo "<table> <tr> <th>Person</th><th>Score</th><th>TestNum</th><th>Wowline</th> </tr>";
		while($row = $result->fetch_array()){
			echo "<tr><td>" . $row['person'] . "</td><td>" . $row['score'] . "</td><td>" . $row['testnum'] . "</td><td>" . $row['wowline'] . "</td></tr>";
        	}
		echo "</table>";
	}
	function displayPlayerTable($input){
		$sql = "SELECT * from test WHERE person='" . $input . "'";
		$result = queryHandler($sql);	
		if(!$result){
			echo "ya goofed";
		}
		echo "<table> <tr> <th>Person</th><th>Score</th><th>TestNum</th><th>Wowline</th> </tr>";
		while($row = $result->fetch_array()){
			echo "<tr><td>" . $row['person'] . "</td><td>" . $row['score'] . "</td><td>" . $row['testnum'] . "</td><td>" . $row['wowline'] . "</td></tr>";
        	}
		echo "</table>";
	}



	
			

	if(isset($_POST['name']) && strlen($_POST['name']) > 0){
		$sql_add_player = "INSERT INTO test (person, score, testnum, wowline) VALUES ('" . $_POST['name'] . "',0,0,0)";			
		queryHandler($sql_add_player);
		header('Location: index.php');
	}
	if(isset($_POST['delete'])){
		echo "DELETE FROM test WHERE person='" . $_SESSION['name'] . "'";
		$sql_delete_player = "DELETE FROM test WHERE person='" . $_SESSION['name'] . "'";
		queryHandler($sql_delete_player);
		header('Location: index.php');

	}
	if(isset($_POST['player'])){
		$_SESSION['name'] = $_POST['player'];		
	}
?>