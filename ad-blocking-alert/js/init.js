var r = [
		["Message", '<textarea cols="34" rows="4" name="adb_display_message" id="adb_display_message"></textarea>'],
		["Image", '<input class="image_location" type="hidden" name="adb_display_image" value="'+jQuery("#adb_display_status_img").attr("data-il")+'"/><input class="image_location il" type="text" value="'+jQuery("#adb_display_status_img").attr("data-il")+'" disabled/><input type="button" value="Browse" class="browse_button">']
	];
	
jQuery(document).ready(function() {
	r[parseInt(jQuery("[name=adb_display_status]:checked").val())][1] = jQuery("#adb_content").html();
		
	jQuery("#adb_display_status_msg").click(function() {
		jQuery("#adb_title").html(r[0][0]);
		jQuery("#adb_content").html(r[0][1]);
	});
	
	jQuery("#adb_display_status_img").click(function() {
		jQuery("#adb_title").html(r[1][0]);
		jQuery("#adb_content").html(r[1][1]);
	});
	
});

function preview(loc) {
	window.open('about:blank', 'popup', 'width=auto,height=auto');
	document.getElementsByTagName("form")[0].action = loc;
	document.getElementsByTagName("form")[0].setAttribute('target', 'popup');
	document.getElementsByTagName("form")[0].setAttribute('onsubmit', '');
	document.getElementsByTagName("form")[0].submit();
	
	//back to normal
	document.getElementsByTagName("form")[0].action = "options.php";
	document.getElementsByTagName("form")[0].removeAttribute('target');
	document.getElementsByTagName("form")[0].removeAttribute('onsubmit');
}