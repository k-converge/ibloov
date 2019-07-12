var root_url = "http://127.0.0.1/events/"


function refresh_card_thumbnail(){
	$.ajax({
		url: root_url + "cards/index.php?action=fetch&event=" + $("#event").val(),
		success: function(result){
			var results = result.split("#,#");
			$("#card_front").css("background-image", "url(" + root_url + results[0] + ")");
			$("#card_front").css("color", results[2]);
			$("#card_back").css("background-image", "url(" + root_url + results[1] + ")");
			JsBarcode("#barcode_thumbnail", "001", {
				height: 40,
				background: "transparent",
				lineColor: results[2],
				fontSize: 0,
				font: "Gothic",
				marginTop: 97,
				marginLeft: 0,
			});
		}
	});
	
}

function confirm_color_code(color_code){
		
	var pattern = /^#[0-9a-f]{6}/i;
	
	return pattern.test(color_code);
	
}

function Print_Em(){
	
	if ($("#event").val() != ""){
		window.open("print_em.php?event=" + $("#event").val(), '_blank');
	}
	else {
		alert("Choose Event");
	}
	
}

function Save_Form(){
	
	if (confirm_color_code($("#color_code").val())){
		if ($("#front_bg").val() != ""){
			if ($("#back_bg").val() != ""){
				if ($("#front_bg")[0].files[0].size <= 2097152){
					if ($("#back_bg")[0].files[0].size <= 2097152){
						if ($.inArray($("#front_bg")[0].files[0].type, ["image/gif", "image/jpeg", "image/png"]) > 0) {
								if ($.inArray($("#back_bg")[0].files[0].type, ["image/gif", "image/jpeg", "image/png"]) > 0) {
									if ($("#event").val() != ""){
										$("#form").submit();
									}
									else{
										alert("Choose Event");
									}
								}
								else{
									alert("Invalid Back Image Type");
								}
						}
						else{
								alert("Invalid Front Image Type");
						}
					}
					else {
						alert("Back Image Size is Greater than 2MB");
					}
				}
				else {
					alert("Front Image Size is Greater than 2MB");
				}
			}
			else {
				alert("Back Image Not Set");
			}
		}
		else{
			alert("Front Image Not Set");
		}
	}
	else{
		alert("Invalid Color Code");
	}
}


var x, i, j, selElmnt, a, b, c;

$(document).ready(function(){
	
	JsBarcode("#barcode_thumbnail", "001", {
		height: 40,
		background: "#012325",
		lineColor: "#ffffff",
		fontSize: 0,
		font: "Gothic",
		marginTop: 97,
		marginLeft: 0,
	});
	
	
	
	/*$("#event").change(function(){
		
		alert("here");
		refresh_card_thumbnail();
		
	});*/
	
	
	
	
	$("#color_code").keyup(function(){
		
		if (confirm_color_code($("#color_code").val())) {
			$("#color_code").css("color", "#f7b152");
		}
		else {
			$("#color_code").css("color", "#012325");
		}
		
	});
	
	
	
	
	
	$("#browse-btn-1").click(function(){
		$("#front_bg").trigger("click");
	});
	
	$("#file-info-1").click(function(){
		$("#front_bg").trigger("click");
	});
	
	$("#front_bg").change(function(){
		$("#file-info-1").css("color", "#f7b152");
	});
	
	
	$("#browse-btn-2").click(function(){
		$("#back_bg").trigger("click");
	});
	
	$("#file-info-2").click(function(){
		$("#back_bg").trigger("click");
	});
	
	$("#back_bg").change(function(){
		$("#file-info-2").css("color", "#f7b152");
	});
	
	
	
	
	x = document.getElementsByClassName("input_container");
	
	for (i = 0; i < x.length; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  
	  /* For each element, create a new DIV that will act as the selected item: */
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  
	  /* For each element, create a new DIV that will contain the option list: */
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  
	  for (j = 1; j < selElmnt.length; j++) {
		/* For each option in the original select element,
		create a new DIV that will act as an option item: */
		c = document.createElement("DIV");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.addEventListener("click", function(e) {
			/* When an item is clicked, update the original select box,
			and the selected item: */
			var y, i, k, s, h;
			s = this.parentNode.parentNode.getElementsByTagName("select")[0];
			h = this.parentNode.previousSibling;
			for (i = 0; i < s.length; i++) {
			  if (s.options[i].innerHTML == this.innerHTML) {
				s.selectedIndex = i;
				h.innerHTML = this.innerHTML;
				y = this.parentNode.getElementsByClassName("same-as-selected");
				for (k = 0; k < y.length; k++) {
				  y[k].removeAttribute("class");
				}
				this.setAttribute("class", "same-as-selected");
				break;
			  }
			}
			refresh_card_thumbnail();
			h.click();
		});
		b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function(e) {
		/* When the select box is clicked, close any other select boxes,
		and open/close the current select box: */
		e.stopPropagation();
		closeAllSelect(this);
		this.nextSibling.classList.toggle("select-hide");
		this.classList.toggle("select-arrow-active");
	  });
	}

	function closeAllSelect(elmnt) {
	  /* A function that will close all select boxes in the document,
	  except the current select box: */
	  var x, y, i, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  for (i = 0; i < y.length; i++) {
		if (elmnt == y[i]) {
		  arrNo.push(i)
		} else {
		  y[i].classList.remove("select-arrow-active");
		}
	  }
	  for (i = 0; i < x.length; i++) {
		if (arrNo.indexOf(i)) {
		  x[i].classList.add("select-hide");
		}
	  }
	}

	/* If the user clicks anywhere outside the select box,
	then close all select boxes: */
	document.addEventListener("click", closeAllSelect);
	$("body").click(function(){ closeAllSelect(); });
	
});