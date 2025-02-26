(function( $ ) {
	'use strict';
	$(document).ready(function(){
		function init(){
			/*if( $('#wp_abl_plugin_settings_one_operator').is(':checked') ){
				$('#wp_abl_plugin_settings_public_key').removeClass('disabled');
			}else{
				$('#wp_abl_plugin_settings_public_key').addClass('disabled');
			}*/
			if( $('#wp_abl_plugin_settings_add_custom_css').is(':checked') ){
				$('#wp_abl_plugin_settings_custom_css').removeClass('disabled');
			}else{
				$('#wp_abl_plugin_settings_custom_css').addClass('disabled');
			}
			validForm();
		}
		function validForm(){
			var valid = [];
			if( $('#wp_abl_plugin_settings_one_operator').is(':checked') ){
				if( $('#wp_abl_plugin_settings_public_key').val().length == 0 ){
					valid.push('wp_abl_plugin_settings_one_operator');
				}
			}
			if( $('#wp_abl_plugin_settings_add_custom_css').is(':checked') ){
				if( $('#wp_abl_plugin_settings_custom_css').val().length == 0 ){
					valid.push('wp_abl_plugin_settings_add_custom_css');
				}
			}
			$('#submit.button-primary').attr('disabled', valid.length == 0 ? false : true);
		}
		
		/*$('#wp_abl_plugin_settings_one_operator').on('click', function(){
			if( $(this).is(':checked') ){
				$('#wp_abl_plugin_settings_public_key').removeClass('disabled');
			}else{
				$('#wp_abl_plugin_settings_public_key').addClass('disabled');
			}
			validForm();
		});*/
		
		$('#wp_abl_plugin_settings_add_custom_css').on('click', function(){
			if( $(this).is(':checked') ){
				$('#wp_abl_plugin_settings_custom_css').removeClass('disabled');
			}else{
				$('#wp_abl_plugin_settings_custom_css').addClass('disabled');
			}
			validForm();
		});
		
		$('#wp_abl_plugin_settings_public_key').on('keyup', function(){
			validForm();
		});
		$('#wp_abl_plugin_settings_custom_css').on('keyup', function(){
			validForm();
		});
		init();
	});

})( jQuery );
