<!doctype html>
<?php include_once "../lib/check_session.php" ;?>
<html>
	<head>
		<meta name="description" content="Bloov">
		<meta property="og:title" content="Bloov" />
        <meta property="og:description" content="Bloov" />
		<meta charset="utf-8">
		<meta name="author" content="Murewa Ayodele">
		<title>Bloov|Menu</title>
		<link rel="shortcut icon" href="../images/bloov_logo.png" type="image/png"/>
		<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/bloov_menu.css" type="text/css" />
		<script src="../js/jquery.js"></script>
		<script src="../js/bloov_menu.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
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
					<a title="Home" class="logo navbar-brand" href="index.php" style="padding: 0;">
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
		<div class="container" id="menu_container">
			<div class="row">
				<div id="cards_menu_item" class="col-tn-1 col-xs-6 col-sm-3 col-md-3 col-lg-3 icon_container" >
					<div class="meta-image-container">
						<img id="cards_menu_icon" src="../images/card_icon.png" />
					</div>
					<div class="meta-data">
						Cards
					</div>
				</div>
				<div id="guests_menu_item" class="col-tn-1 col-xs-6 col-sm-3 col-md-3 col-lg-3 icon_container">
					<div class="meta-image-container">
						<img id="guests_menu_icon" src="../images/employee_icon.png" />
					</div>
					<div class="meta-data">
						Guests
					</div>
				</div>
				<div id="settings_menu_item" class="col-tn-1 col-xs-6 col-sm-3 col-md-3 col-lg-3 icon_container">
					<div class="meta-image-container">
						<img id="settings_menu_icon" src="../images/setting_icon.png" />
					</div>
					<div class="meta-data">
						Settings
					</div>
				</div>
				<div id="play_menu_item" class="col-tn-1 col-xs-6 col-sm-3 col-md-3 col-lg-3 icon_container" onClick="go_to_report_page()">
					<div class="meta-image-container">
						<img id="play_menu_icon" src="../images/play_icon.png" />
					</div>
					<div class="meta-data">
						Go live
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
