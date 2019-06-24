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
		<link rel="stylesheet" href="../css/bloov_prints.css?ver=2.2" type="text/css" />
		<script src="../js/jquery.js"></script>
		<script src="../js/JsBarcode.all.min.js"></script>
		<script src="../js/bloov_prints.js?ver=2.1"></script>
	</head>
	
	<body>

	<?php

		session_start();
		
		if (isset($_SESSION["admin"]) && isset($_REQUEST["event"])){
			
			require_once(dirname(dirname(__FILE__)) . "/lib/event_invitation_calls.php");
			
			echo fetch_all_invites_for_event($_REQUEST["event"]);
			
			
			$display_settings = explode(",#", fetch_event_invitation_format($_REQUEST["event"]));
			
			echo '<style>
				.card_front{
					color: '.$display_settings[2].';
					background-image: url(../'.$display_settings[0].');
				}
				
				.card_back{
					background-image: url(../'.$display_settings[1].');
				}
			</style>';
		
		}

	?>

	</body>
	
</html>