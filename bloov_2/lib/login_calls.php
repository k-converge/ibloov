<?php

	require_once(dirname(__FILE__) . "/globals.php");
	
	function login($email, $password){
	
		session_start();
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		
		$run_login=mysqli_query($dbc, "SELECT * from user where email='$email' and password='$password' ");
		$security_check=mysqli_num_rows($run_login);
		
		if($security_check==1)
		{
			while($loginresult=mysqli_fetch_array($run_login))
			{
				$id=$loginresult['id'];
		
			}
			
			$_SESSION["id"]=$id;
			
			header("location:../menu");
		}
		else
		{
		
			header("location:../sign-in");
			
		}
		
	}
	
	
	
	
	function register($firstname, $lastname, $email, $password){
		
		global $host, $user, $pass, $name, $port;
			
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
		
		$run_check=mysqli_query($dbc, "SELECT * from user where email='$email' and password='$password' ");
		$duplication_check=mysqli_num_rows($run_check);
		
		if($duplication_check==1)
		{
			
			header("location:../register");
			
		}
		else
		{
		
			mysqli_query($dbc, "INSERT into user (firstname, lastname, email, password)VALUES('$firstname', '$lastname', '$email', '$password')");
			
			header("location:../sign-in");
			
		}
		
	}



?>
