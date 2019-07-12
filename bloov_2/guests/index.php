
<?php
	include_once "../lib/check_session.php" ;
	require_once(dirname(dirname(__FILE__)) . "/lib/event_calls.php");
	require_once(dirname(dirname(__FILE__)) . "/lib/upload_calls.php");
	require_once(dirname(dirname(__FILE__)) . "/lib/event_invitation_calls.php");

	if (isset($_REQUEST["event"]) && isset($_REQUEST["action"])){
		
		echo fetch_event_invitation_format($_REQUEST["event"]);
		exit();
		
	}

	session_start();
	$_SESSION["admin"] = 1;
	
	if (isset($_REQUEST["event"]) && isset($_FILES["front_bg"])
		&& isset($_FILES["back_bg"]) && isset($_REQUEST["color_code"])){
			
			$front_bg = store_upload($_FILES["front_bg"]);
			$back_bg = store_upload($_FILES["back_bg"]);
			
			insert_event_invitation_format($_REQUEST["event"], $front_bg, $back_bg, $_REQUEST["color_code"]);
			
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
		<title>Bloov|Guests</title>
		<link rel="shortcut icon" href="../images/bloov_logo.png" type="image/png"/>
		<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/bloov_menu.css" type="text/css" />
		<link rel="stylesheet" href="../css/bloov_guest.css" type="text/css" />
		<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css" type="text/css" />
		<script src="../js/jquery.js"></script>
		
		<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="../js/JsBarcode.all.min.js"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-light" id="header">
			<div class="container-fluid">
				<div class="navbar-header">
					<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>-->
					<a title="Home" class="logo navbar-brand" href="../menu/index.php" style="padding: 0;">
						<img id="logo" src="../images/bloov_logo_text.png" style="height: 100%;">
					</a>
				</div>
				<!--<div class="collapse navbar-collapse" id="myNavbar"> -->
					<ul class="nav navbar-nav navbar-right" id="myNavbar">
					  <li><a title="Sign Out" href="../index.php?action=logout">Sign Out</a></li>
					</ul>
				<!--</div>-->
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-12 col-lg-3" >
					<div class="cards_container">
						<div class="meta-image-container" id="card_front">
							<img id="guests_menu_icon" src="../images/employee_icon.png" />
						</div>
						<p>Guests</p>
						
						
					</div>
				</div>
				
				</br></br></br>
				
				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-6" >
					<form action="index.php" id="form" method="post" enctype="multipart/form-data">
						
					
						<div class="cont row col-xs-12 col-sm-12 col-md-12 col-lg-12">

							
							<input type="file"  class="cont" name="back_bg"/>
							
							
							
							<select class="cont" name="event">
								<option value="">Choose Event</option>
								<?php echo fetch_user_events($_SESSION["admin"]); ?>
							</select>
							

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
									<button class="yellow_b" onClick="Save_Form()" type="button">Import</button>
							</div>

						</div>

					</form>
					
				

					</br></br></br>
				
				
					<form action="index.php" id="form" method="post" enctype="multipart/form-data">
						
					
						<div class="cont row col-xs-12 col-sm-12 col-md-12 col-lg-12">

							
							
							<div class="input_container">
								<input type="text" placeholder="First Name" id="" name="" maxlength="20"/>
							</div>

							<div class="input_container">
								<input type="text" placeholder="Last Name" id="" name="" maxlength="20"/>
							</div>

							<div class="input_container">
								<input type="text" placeholder="Accompanying Text" id="" name="" maxlength="20"/>
							</div>

							
							<select class="cont" name="event">
								<option value="">Choose Event</option>
								<?php echo fetch_user_events($_SESSION["admin"]); ?>
							</select>
							

							

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
								<button class="green_b" type="button" >Save</button>
							</div>

						</div>

					</form>
					
				</div>


			</div>
		</div>
	</body>
	
</html>

<?php

?>
