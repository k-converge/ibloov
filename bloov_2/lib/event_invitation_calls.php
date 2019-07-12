<?php

	require_once(dirname(__FILE__) . "/globals.php");
	
	function insert_event_invitation_format($event, $front_bg, $back_bg, $color_code){
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		$query = "CALL insert_event_invitation_format($event, '$front_bg', '$back_bg', '$color_code')";
		mysqli_query($dbc, $query);
		mysqli_commit($dbc);
		mysqli_close($dbc);
		
	}
	
	function fetch_event_invitation_format($event){
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		$query = "CALL fetch_event_invitation_format($event)";
		$rs = mysqli_query($dbc, $query);
		
		$row = mysqli_fetch_array($rs);
			
		$result = "$row[0]#,#$row[1]#,#$row[2]";
		
		mysqli_close($dbc);
		
		return $result;
		
	}
	
	function fetch_all_invites_for_event($event) {
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		$query = "CALL fetch_all_invites_for_event($event)";
		$rs = mysqli_query($dbc, $query);
		
		$result = "";
		
		while ($row = mysqli_fetch_array($rs)) {
			
			$result = $result . '<div class="card card_front">
									<p>'.$row[1].' '.$row[2].'</p>
								</div>
						
								<div class="card card_back" id="'.$row[0].'">
									<svg id="svg'.$row[0].'"></svg>
								</div>';
			
		}
		
		mysqli_close($dbc);
		
		return $result;
		
	}
	
	
?>