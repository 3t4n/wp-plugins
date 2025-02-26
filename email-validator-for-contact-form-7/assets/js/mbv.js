jQuery(document).ready(function($) {
	// $( "#blacklist_domain" ).click(function() {
	// $("#blacklist_domain").on("focus",function(e) {
	// $("form").on("submit",function(e) {
		// e.preventDefault();
		// var $this = $(this);
		// var formData = $this.serialize();
		// console.log (formData);
		// alert (formData);
		// console.log('Hello');
		// var blacklist_domain_list = "";
		// var lines = $('#blacklist_domain').val().split('\n');
		// for (var i = 0; i < lines.length; i++) {
			// blacklist_domain_list += lines[i];
			// blacklist_domain_list += ",";
		// }
		// blacklist_domain_list = blacklist_domain_list.substring(0,blacklist_domain_list.length-1);
		// var data = 
		// $("#blacklist_domain").html(blacklist_domain_list);
		// console.log(blacklist_domain_list);
		// alert(blacklist_domain_list);
		// console.log("Hello World");
		// $.ajax({
		   // post: $this.attr('action'),
		   // data: yourData,
		   // ...
		// })
		// var VAL = $('#blacklist_domain').val();
		// alert(VAL);

        // var email = new RegExp('^[A-Z0-9\.\_\-\,]+$');

        // if (email.test(VAL)) {
            // alert('Great, you entered an E-Mail-address');
        // } else {
			// alert('Invalid character found');
		// }
	// });
	/*
	var regex = /^[a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/;
	
	$('#blacklist_domain').tagsInput({
		defaultText: '',
		delimiter: ';',
		width: '400px',
		pattern: regex,
		// onChange: function(obj, tag){
			// if($('#frontend_ip_whitelist').tagExist(tag)){
				// $('#frontend_ip_blacklist').removeTag(tag);
			// }
		// }
	});*/
	
	$('#radio1').change(function(){
		selected_value = $("input[name='mbv_wpcf7_email_validator_for_contact_form_7[invalid_on_off]']:checked").val();
		// alert(selected_value);
		if (selected_value == 'on') {
			$("#invalid_error_message").prop('disabled', false);
		} else {
			$("#invalid_error_message").prop('disabled', true);
		}
	});
	
	$('#radio2').change(function(){
		selected_value = $("input[name='mbv_wpcf7_email_validator_for_contact_form_7[disposable_on_off]']:checked").val();
		// alert(selected_value);
		if (selected_value == 'on') {
			$("#disposable_error_message").prop('disabled', false);
		} else {
			$("#disposable_error_message").prop('disabled', true);
		}
	});
	
	$('#radio3').change(function(){
		selected_value = $("input[name='mbv_wpcf7_email_validator_for_contact_form_7[free_on_off]']:checked").val();
		// alert(selected_value);
		if (selected_value == 'on') {
			$("#free_error_message").prop('disabled', false);
		} else {
			$("#free_error_message").prop('disabled', true);
		}
	});
	
	$('#radio4').change(function(){
		selected_value = $("input[name='mbv_wpcf7_email_validator_for_contact_form_7[role_on_off]']:checked").val();
		// alert(selected_value);
		if (selected_value == 'on') {
			$("#role_error_message").prop('disabled', false);
		} else {
			$("#role_error_message").prop('disabled', true);
		}
	});
	
});