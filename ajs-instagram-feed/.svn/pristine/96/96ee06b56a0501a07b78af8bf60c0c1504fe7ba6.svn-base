jQuery(document).ready(function($){
    $('.ajs-color-field').wpColorPicker();
	
	var query = location.href.split('#');
	var access_token = query[1].split('=');
	var user = access_token[1].split('.');
	
	$("#ajs_access_token").val(access_token[1]);
	$("#ajs_user_id").val(user[0]);
});