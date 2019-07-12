function rgb2hex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

$(document).ready(function(){
	
	$(".card_back").each(function(){
		
		try {
			
			JsBarcode("#svg" + $(this).attr('id'), $(this).attr('id'), {
				height: 40,
				background: "transparent",
				lineColor: rgb2hex($(".card_front").css("color")),
				fontSize: 0,
				font: "Gothic",
				marginTop: 147,
				marginLeft: 0,
			});
			
		}
		catch(err) {
			alert(err.message);
		}

	
	});
	
});