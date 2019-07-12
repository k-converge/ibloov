<?php

	session_start();
	//$_SESSION["admin"] = 1;
	
	if($_POST['email'])
	{
		//require_once(dirname(__FILE__) . "/globals.php");
		
		require_once(dirname(dirname(__FILE__)) . "/lib/login_calls.php");
		
		$dbc = mysqli_connect($host, $user, $pass, $name, $port);
	
		//lets begin the login process after the POST request
	
		//get the raw variables
		
		$firstname_raw=mysqli_real_escape_string($dbc, $_POST['firstname']);
		
		$lastname_raw=mysqli_real_escape_string($dbc, $_POST['lastname']);
	
		$email_raw=mysqli_real_escape_string($dbc, $_POST['email']);
	
		$password_raw=mysqli_real_escape_string($dbc, $_POST['password']);
	
		//encrypt the password variable
	
		$encrypted_password=crc32($password_raw);
	
	
		register($firstname_raw, $lastname_raw, $email_raw, $encrypted_password);
	}
?>
<!doctype html>
<html>
	<head>
		<meta name="description" content="Bloov">
		<meta property="og:title" content="Bloov" />
        <meta property="og:description" content="Bloov" />
		<meta charset="utf-8">
		<meta name="author" content="Murewa Ayodele">
		<title>Bloov|Sign Up</title>
		<link rel="shortcut icon" href="../images/bloov_logo.png" type="image/png"/>
		<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/bloov_home.css" type="text/css" />
		<link rel="stylesheet" href="../css/bloov_cards.css" type="text/css" />
		<script src="../js/jquery.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="container">
			<header>
				<img src="../images/bloov_logo_text.png" />
				<a href="../sign-in/">Login</a>
			</header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5" >
						<div>
							<p class="smaller_p">Sign Up and easily print and design invitation cards.</p>
						</div>
						<form action="index.php" method="POST">
							<div class="login_form">
								<div class="input_container">
									<input type="text" name="firstname" placeholder="Firstname" type="text"/>
								</div>
								<div class="input_container">
									<input type="text" name="lastname" placeholder="Lastname" type="text"/>
								</div>
								<div class="input_container">
									<input type="email" name="email" placeholder="Email" type="email"/>
								</div>
								<div class="input_container">
									<input type="password" name="password" placeholder="Password" type="password"/>
								</div>
								
								<button>Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		</br></br></br>
		
	</body>
	
	<!--<script>
	
		window.setTimeout(function () {
			window.location.href = "../index.php";
		},
		15000);
		
	</script>-->

</html>
