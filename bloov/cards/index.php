<?php

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
		<title>Bloov|Cards</title>
		<link rel="shortcut icon" href="../images/bloov_logo.png" type="image/png"/>
		<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/bloov_menu.css" type="text/css" />
		<link rel="stylesheet" href="../css/bloov_cards.css" type="text/css" />
		<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css" type="text/css" />
		<script src="../js/jquery.js"></script>
		<script src="../js/bloov_cards.js"></script>
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
				<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6" >
					<div class="cards_container">
						<div class="card" id="card_front">
							<p>Full Name</p>
						</div>
						<p>Front</p>
						
						<div class="card" id="card_back">
							<svg id="barcode_thumbnail"></svg>
						</div>
						<p>Back</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-4" >
					<form action="index.php" id="form" method="post" enctype="multipart/form-data">
						<div class="input_container">
							<select placeholder="Choose event" id="event" name="event">
								<option value="">Choose Event</option>
								<?php echo fetch_user_events($_SESSION["admin"]); ?>
							</select>
						</div>
						<div class="input_container">
							<input type="file" accept="image/*" id="front_bg" name="front_bg"/>
							<button class="browse-btn" id="browse-btn-1" type="button">
								Upload Background Image (Front)
							</button>
							<span class="fa fa-upload fa-lg file-info" id="file-info-1"></span>
						</div>
						<div class="input_container">
							<input type="file" accept="image/*" id="back_bg" name="back_bg"/>
							<button class="browse-btn" id="browse-btn-2" type="button">
								Upload Background Image (Back)
							</button>
							<span class="fa fa-upload fa-lg file-info" id="file-info-2"></span>
						</div>
						<div class="input_container">
							<input type="text" placeholder="Change text colour (E.g. #ffffff)" id="color_code" name="color_code" maxlength="7"/>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
							<button class="yellow_b" onClick="Save_Form()" type="button">Save</button>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
							<button class="green_b" type="button" onClick="Print_Em()">Print</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	
</html>

<?php

?>