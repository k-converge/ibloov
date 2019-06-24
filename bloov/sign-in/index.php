<?php

	session_start();
	//$_SESSION["admin"] = 1;

?>
<!doctype html>
<html>
	<head>
		<meta name="description" content="Bloov">
		<meta property="og:title" content="Bloov" />
        <meta property="og:description" content="Bloov" />
		<meta charset="utf-8">
		<meta name="author" content="Murewa Ayodele">
		<title>Bloov|Login</title>
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
				<a href="../register/">Sign Up</a>
			</header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5" >
						<div>
							<p class="smaller_p">Bloov helps you easily print and design invitation cards.</p>
						</div>
						<div class="login_form">
							<div class="input_container">
								<input type="email" name="email" placeholder="Email" type="email"/>
							</div>
							<div class="input_container">
								<input type="password" name="password" placeholder="Password" type="password"/>
							</div>
							<a>forgot password?</a>
							<button>LOGIN</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	
	<!--<script>
	
		window.setTimeout(function () {
			window.location.href = "../index.php";
		},
		15000);
		
	</script>-->

</html>