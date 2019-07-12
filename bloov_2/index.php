<?php

	session_start();
	
	if (isset($_REQUEST["action"])){
		
		if (isset($_SESSION["admin"]) && ($_REQUEST["action"] == "logout")){
			
			unset($_SESSION["admin"]);
			session_destroy();
			
		}
		
	}

	/*elseif (isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
	{
		require_once(dirname(__FILE__) . "/lib/account_functions.php");
		
		$id = clock_in($_REQUEST["username"], $_REQUEST["password"], "admin");
		
		if ($id != -1){
			
			$_SESSION["admin"] = $id;
			header("Location: menu/");
			
		}
		
	}
	
	elseif (isset($_SESSION["admin"])&& isset($_REQUEST["action"]))
	{
		require_once(dirname(__FILE__) . "/lib/account_functions.php");
		
		if ($_REQUEST["action"] = "logout")
		{
			
			clock_out($_SESSION["admin"]);
			unset($_SESSION["admin"]);
			session_destroy();
			
		}
		
	}
	
	elseif (isset($_SESSION["admin"]))
	{
		
		$_SESSION["admin"] = $_SESSION["admin"];
		header("Location: menu/");
		
	}*/

?>

<!doctype html>
<html>
	<head>
		<meta name="description" content="Bloov">
		<meta property="og:title" content="Bloov" />
        <meta property="og:description" content="Bloov" />
		<meta charset="utf-8">
		<meta name="author" content="Murewa Ayodele">
		<title>Bloov|Welcome</title>
		<link rel="shortcut icon" href="images/bloov_logo.png" type="image/png"/>
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bloov_home.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery.js"></script>
		<script src="js/bloov_home.js"></script>
	</head>
	<body>
		<div id="container">
			<header>
				<img src="images/bloov_logo_text.png" />
				<?php
					if (isset($_SESSION["admin"])){
						echo '<a href="menu/">Welcome back</a>';
					}
					else{
						echo '<a href="sign-in/">Login/Sign Up</a>';
					}
				?>
			</header>
			<div id="body" class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div>
						<p>Bloov makes invitations super easy.</p>
					</div>
					<div>
						<?php
							if (isset($_SESSION["admin"])){
								echo '<button onClick="window.location.href = \'menu/\';">GET STARTED</button>';
							}
							else{
								echo '<button onClick="window.location.href = \'sign-in/\';">GET STARTED</button>';
							}
						?>
					</div>
				</div>
				<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
					<img src="images/bloov_card_bg.png" id="bloov_card"/>
				</div>
			</div>
			<footer>
			</footer>
		</div>
	</body>

</html>