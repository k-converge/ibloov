$(document).ready(function(e) {
	
	$("#cards_menu_item").mouseenter(function() {
			$("#cards_menu_icon").attr("src", "../images/card_icon_active.png");
			$("#cards_menu_item").css("color", "#f7b152");
		}
	);
	
	$("#cards_menu_item").mouseleave(function() {
			$("#cards_menu_icon").attr("src", "../images/card_icon.png");
			$("#cards_menu_item").css("color", "#012325");
		}
	);
	
	$("#cards_menu_item").click(function() {
			window.location.href = "../cards/index.php";
		}
	);
	
	
	
	$("#guests_menu_item").mouseenter(function() {
			$("#guests_menu_icon").attr("src", "../images/employee_icon_active.png");
			$("#guests_menu_item").css("color", "#f7b152");
		}
	);
	
	$("#guests_menu_item").mouseleave(function() {
			$("#guests_menu_icon").attr("src", "../images/employee_icon.png");
			$("#guests_menu_item").css("color", "#012325");
		}
	);
	
	$("#guests_menu_item").click(function() {
			window.location.href = "../guests/index.php";
		}
	);
	
	
	
	$("#play_menu_item").mouseenter(function() {
			$("#play_menu_icon").attr("src", "../images/play_icon_active.png");
			$("#play_menu_item").css("color", "#f7b152");
		}
	);
	
	$("#play_menu_item").mouseleave(function() {
			$("#play_menu_icon").attr("src", "../images/play_icon.png");
			$("#play_menu_item").css("color", "#012325");
		}
	);
	
	$("#play_menu_item").click(function() {
			window.location.href = "../play/index.php";
		}
	);
	
	
	
	$("#settings_menu_item").mouseenter(function() {
			$("#settings_menu_icon").attr("src", "../images/setting_icon_active.png");
			$("#settings_menu_item").css("color", "#f7b152");
		}
	);
	
	$("#settings_menu_item").mouseleave(function() {
			$("#settings_menu_icon").attr("src", "../images/setting_icon.png");
			$("#settings_menu_item").css("color", "#012325");
		}
	);
	
	$("#settings_menu_item").click(function() {
			window.location.href = "../settings/index.php";
		}
	);

});
