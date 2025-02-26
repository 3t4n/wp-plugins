<?php defined('ABSPATH') or die(); ?>

var _<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__obj = document.createElement("div");
_<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__obj.innerHTML = decodeURIComponent(escape(window.atob("<?php print_r($data_inject); ?>")));
document.querySelector("body").appendChild(_<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__obj.querySelector("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container"));

{var _<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__loader_code = `
	<div class="_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap_a _<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-spinner">
		<svg width="100%" height="100%" viewBox="0 0 50 50"><circle cx="25" cy="25" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" style="stroke: #fff;"></circle></svg>
	</div>
`;}

document.addEventListener("click", (e) => {if (e.target.closest("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_apply")) {
	
//	console.log(e);
	
	var This = e.target.closest("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_apply");
	var popup_container = document.querySelector("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container");
	var popup = popup_container.querySelector("._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup");
	
	popup.classList.add("_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wait");
	This.classList.add("_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content");
	This.innerHTML = _<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__loader_code + This.innerHTML;
//	return;
	
	var xhttp1 = new XMLHttpRequest();
	xhttp1.open("POST", "<?php print_r($VARS['links']['admin_ajax_url']); ?>", true);
	xhttp1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp1.send('action=xhr_get&type=popup_apply&_wpnonce=<?php print_r($VARS['WP']['_wpnonce']); ?>&id_rnd='+'<?php print_r($VARS['id_rnd']); ?>');
	xhttp1.onload = function() {
		
		if (xhttp1.status!=200) {return;}
		
		var e = xhttp1.responseText;
		e = JSON.parse(e);
	//	console.log(e);
		
		if (e.status) {
			document.querySelector("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container").remove();
			document.querySelector("head style#_<?php print_r(@$VARS["name"]["code-"]); ?>style-inline-css").remove();
			document.querySelector("head script#_<?php print_r(@$VARS["name"]["code-"]); ?>script-js-after").remove();
		}
		
	}
	
}});

document.addEventListener("click", (e) => {if (e.target.closest("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_deny")) {
	
//	console.log(e);
	
	var This = e.target.closest("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-btn_deny");
	var popup_container = document.querySelector("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container");
	var popup = popup_container.querySelector("._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup");
	
	popup.classList.add("_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wait");
	This.classList.add("_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-hide_content");
	This.innerHTML = _<?php print_r(@$VARS["name"]["code_"]); ?><?php print_r($VARS['id_rnd']); ?>_popup__loader_code + This.innerHTML;
//	return;
	
	var xhttp2 = new XMLHttpRequest();
	xhttp2.open("POST", "<?php print_r($VARS['links']['admin_ajax_url']); ?>", true);
	xhttp2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp2.send('action=xhr_get&type=popup_deny&_wpnonce=<?php print_r($VARS['WP']['_wpnonce']); ?>&id_rnd='+'<?php print_r($VARS['id_rnd']); ?>');
	xhttp2.onload = function() {
		
		if (xhttp2.status!=200) {return;}
		
		var e = xhttp2.responseText;
		e = JSON.parse(e);
	//	console.log(e);
		
		if (e.status) {
			
			if (e.deny_redirect_url) {
				location = e.deny_redirect_url;
			}
			else
			if (e.data != '') {
				document.querySelector("#_<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-container ._<?php print_r(@$VARS["name"]["code-"]); ?><?php print_r($VARS['id_rnd']); ?>-popup-wrap").innerHTML = e.data;
			}
			else
			{
				location = '';
			}
			
		}
		
	}
	
}});
