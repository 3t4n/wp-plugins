(function( $ ) {
	// 'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	function isUrlValid(url) {
		return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	}
	$(".btn").click(function() {
		$(".form-signin").toggleClass("form-signin-left");
		$(".form-signup").toggleClass("form-signup-left");
		$(".frame").toggleClass("frame-long");
		$(".signup-inactive").toggleClass("signup-active");
		$(".signin-active").toggleClass("signin-inactive");
		$(".forgot").toggleClass("forgot-left");
		$(this).removeClass("idle").addClass("active");
	});
	/* $(".btn-signup").click(function() {
		$(".nav").toggleClass("nav-up");
		$(".form-signup-left").toggleClass("form-signup-down");
		$(".success").toggleClass("success-left");
		$(".frame").toggleClass("frame-short");
	});
	$(".btn-signin").click(function() {
        $(".btn-animate").toggleClass("btn-animate-grow");
        $(".welcome").toggleClass("welcome-left");
        $(".cover-photo").toggleClass("cover-photo-down");
        $(".frame").toggleClass("frame-short");
        $(".profile-photo").toggleClass("profile-photo-down");
        $(".btn-goback").toggleClass("btn-goback-up");
        $(".forgot").toggleClass("forgot-fade");
    }); */

	$("#singup_login").on("click", function(){
		if($.trim($("#login_username").val()) == ""){
			alert("Please enter your username");
			$("#login_username").focus();
			return false;
		}
		if($.trim($("#login_password").val()) == ""){
			alert("Please enter your password");
			$("#login_password").focus();
			return false;
		}
	});
	$("#signup_register").on("click", function(){

		/* if($.trim($("#signup_username").val()) == ""){
			alert("Please enter your username");
			$("#signup_username").focus();
			return false;
		} */
		if($.trim($("#signup_email").val()) == ""){
			alert("Please enter your email address");
			$("#signup_email").focus();
			return false;
		}
		if($.trim($("#signup_password").val()) == ""){
			alert("Please enter your password");
			$("#signup_password").focus();
			return false;
		}
		
	});

	$("#atalki_link_page_submit").on("click", function(){
		if($.trim($("#atalki_link_title").val()) == ""){
			alert("Please enter title");
			$("#atalki_link_title").focus();
			return false;
		}
		if($.trim($("#atalki_link_desc").val()) == ""){
			alert("Please enter description");
			$("#atalki_link_desc").focus();
			return false;
		}
		if($.trim($("#atalki_link_url").val()) == ""){
			alert("Please enter url of page");
			$("#atalki_link_url").focus();
			return false;
		}
		if(!isUrlValid($("#atalki_link_url").val())){
			alert("Please enter correct url of page");
			$("#atalki_link_url").focus();
			return false;
		}
	});

	setTimeout(function() {
		if($("#trigger_login").length > 0){
			console.log("trigger");
			$("#trigger_login")[0].click();
		}
		
	}, 3000);
	

	if(atalki_admin_vars.login_message != ""){
		$(".btn-animate").toggleClass("btn-animate-grow");
		$(".welcome").toggleClass("welcome-left");
		$(".cover-photo").toggleClass("cover-photo-down");
		$(".frame").toggleClass("frame-short");
		$(".profile-photo").toggleClass("profile-photo-down");
		$(".btn-goback").toggleClass("btn-goback-up");
		$(".forgot").toggleClass("forgot-fade");
		$('.welcome-signup').hide();
	}
	if(atalki_admin_vars.signup_message != ""){
		$(".btn-animate").toggleClass("btn-animate-grow");
		$(".welcome").toggleClass("welcome-left");
		$(".cover-photo").toggleClass("cover-photo-down");
		$(".frame").toggleClass("frame-short");
		$(".profile-photo").toggleClass("profile-photo-down");
		$(".btn-goback").toggleClass("btn-goback-up");
		$(".forgot").toggleClass("forgot-fade");
		$('.welcome-login').hide();
		$('.nav').hide();
	}
	$(document).on("click", ".text-center.bz-text-login", function(){
		$(".btn-animate").toggleClass("btn-animate-grow");
		$(".welcome").toggleClass("welcome-left");
		$(".cover-photo").toggleClass("cover-photo-down");
		$(".frame").toggleClass("frame-short");
		$(".profile-photo").toggleClass("profile-photo-down");
		$(".btn-goback").toggleClass("btn-goback-up");
		$(".forgot").toggleClass("forgot-fade");
		$('.welcome-login').show();
		$('.nav').show();
	});


})( jQuery );