<?php

	require_once(dirname(__FILE__) . "/globals.php");

	function fetch_user_events($user_id){
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		$query = "CALL fetch_user_events($user_id)";
		$rs = mysqli_query($dbc, $query);
		$result = "";
		
		while ($row = mysqli_fetch_array($rs)){
			
			$result = $result . '<option value="'.$row[0].'">'.$row[1].'</option>';
			
		}
		
		mysqli_close($dbc);
		
		return $result;
		
	}
	
?>