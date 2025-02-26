(function( $ ) {

	"use strict";
	
	var custom_uploader;
	
	$( document ).ready(function() {
		
		if( $( "#inc-widgets .inc-trigger-all-shortcodes" ).length ){
			$( "#inc-widgets .inc-trigger-all-shortcodes" ).on( "click", function(){
				if( $(this).is(':checked') ) {
					$( "#inc-widgets .inc-checkbox input:not(.inc-trigger-all-shortcodes)" ).each(function( index ) {
						$(this).prop("checked", false).trigger("click");
					});
				}else{
					$( "#inc-widgets .inc-checkbox input:not(.inc-trigger-all-shortcodes)" ).each(function( index ) {
						$(this).prop("checked", true).trigger("click");
					});
				}
			});
		}
		
		if( $( "#inc-features .inc-trigger-all-modules" ).length ){
			$( "#inc-features .inc-trigger-all-modules" ).on( "click", function(){
				if( $(this).is(':checked') ) {
					$( "#inc-features .inc-checkbox input:not(.inc-trigger-all-modules)" ).each(function( index ) {
						$(this).prop("checked", false).trigger("click");
					});
				}else{
					$( "#inc-features .inc-checkbox input:not(.inc-trigger-all-modules)" ).each(function( index ) {
						$(this).prop("checked", true).trigger("click");
					});
				}
			});
		}
		
		/* Custom Reqiured Field */
		if( $( ".ai-tab .field-set[data-required]" ).length ){
			$( ".ai-tab .field-set[data-required]" ).hide();
			$( ".ai-tab .field-set[data-required]" ).each(function( index ) {
				var hidden_ele = this;
				var req_field = '#'+ $(this).attr('data-required');
				req_field = $(req_field).find("select");
				var req_val = $(this).attr('data-required-value');
				var req_condition = $(this).attr('data-required-condition');
				var req_selected = $( req_field ).find(":selected").val();
				
				if( req_condition == '!=' ){
					if( req_selected != req_val ){
						$(hidden_ele).show();
					}else{
						if( $( hidden_ele ).find('select').length ){
							var t_val = $(hidden_ele).find('select').attr('id');
							$(hidden_ele).find('select').prop('selectedIndex',0);
							$(hidden_ele).parents('.ai-tab').find('.field-set').filter('[data-req="'+ t_val +'"]').hide();
						}
						$(hidden_ele).hide();
					}
				}else{
					if( req_selected == req_val ){
						$(hidden_ele).show();
					}else{
						if( $( hidden_ele ).find('select').length ){
							var t_val = $(hidden_ele).find('select').attr('id');
							$(hidden_ele).find('select').prop('selectedIndex',0);
							$(hidden_ele).parents('.ai-tab').find('.field-set').filter('[data-req="'+ t_val +'"]').hide();
						}
						$(hidden_ele).hide();
					}
				}
				
				if( req_condition == '!=' ){
					$( req_field ).change(function() {
						req_selected = $( this ).find(":selected").val();
						if( req_selected != req_val ){
							$(hidden_ele).show();
						}else{
							if( $( hidden_ele ).find('select').length ){
								var t_val = $(hidden_ele).find('select').attr('id');
								$(hidden_ele).find('select').prop('selectedIndex',0);
								$(hidden_ele).parents('.ai-tab').find('.field-set').filter('[data-req="'+ t_val +'"]').hide();
							}
							$(hidden_ele).hide();
						}
					});
				}else{
					$( req_field ).change(function() {
						req_selected = $( this ).find(":selected").val();
						if( req_selected == req_val ){
							$(hidden_ele).show();
						}else{
							if( $( hidden_ele ).find('select').length ){
								var t_val = $(hidden_ele).find('select').attr('id');
								$(hidden_ele).find('select').prop('selectedIndex',0);
								$(hidden_ele).parents('.ai-tab').find('.field-set').filter('[data-req="'+ t_val +'"]').hide();
							}
							$(hidden_ele).hide();
						}
					});
				}
				
			});
		}
		
		// Admin page tab
		if( $( ".inc-admin-menu" ).length ){
			$( ".inc-admin-menu button" ).on( "click", function(e){
				//e.preventDefault();
				var _ele = $(this);
				var _target = _ele.attr("data-tab");
				
				aiea_set_cookie( 'aiea_dashboard_tab', _target.replace( '#', '' ), 1 );
				
				var _tab_parent = _ele.parents(".ai-settings-tabs");
				//$(_tab_parent).find("ul.ai-tabs > li a, .ai-settings-tab").removeClass("active");
				//_ele.addClass("active");
				$(_tab_parent).find(".ai-settings-tab").removeClass("active");
				$(_tab_parent).find(_target).addClass("active");
				//return false;
			});
		}
			
		if( $( ".icon-show-password" ).length ){
			$( ".icon-show-password" ).on( "click", function(e){
				e.preventDefault();
				$(this).toggleClass("shown");
				if( $(this).hasClass("shown") ) {
					$(this).prev("input").attr("type", "text");
				} else {
					$(this).prev("input").attr("type", "password");
				}
			});	
		}
			
		if( $( "a.inc-save-changes-button" ).length ){
			$( "a.inc-save-changes-button" ).on( "click", function(e){
				e.preventDefault();
				
				var _cur_ele = $(this);
				$(document).find("#ai-save-settings-check").remove();
				$("body").addClass("ai-saving");

				let inc_form = $("#"+_cur_ele.data("form"));
				
				$.ajax({
					type: "POST",
					url: ajaxurl,
					data: 'action=aiea_save_settings&'+ inc_form.serialize(),
					success: function (data) {
						$("body").addClass("inc-save-done");
						$("body").append('<div id="ai-save-settings-check"><svg width="115px" height="115px" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" > <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5" r="54.5"/> <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5"/> <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5" cy="66.5" r="54.5"/> <polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49"/> </g></svg></div>');
						setTimeout( function(){ 
							$("body").removeClass("ai-saving inc-save-done");
							$(document).find("#ai-save-settings-check").fadeOut( 350, function() { $(this).remove(); });
						}, 1800 );
					},error: function(xhr, status, error) {
						$("body").removeClass("ai-saving inc-save-done");
						$(document).find("#ai-save-settings-check").remove();
					}
				});
				
			});
		}
		
	});	
	
	$( window ).load(function() {
		
		
		if( $(".ai-settings-tabs").length ) {
			const aiea_queryString = window.location.search;
			const aiea_urlParams = new URLSearchParams(aiea_queryString);
			const _settings_param = aiea_urlParams.get('ai-addons-settings');
			if( _settings_param ) {
				$('button[data-tab="#inc-settings"]').trigger("click");
			} else {
				let dashboard_tab = aiea_get_cookie( "aiea_dashboard_tab" );
				if( dashboard_tab != '' ) {
					$(document).find('.inc-admin-menu button[data-tab="#'+ dashboard_tab +'"]').trigger("click");
				}
			}
		}		
		
		if( $( ".admin-box-slide-wrap .owl-carousel" ).length ){
			$( ".admin-box-slide-wrap .owl-carousel" ).owlCarousel({
				loop: true,
				margin: 0,
				autoplay: true,
				autoplayTimeout: 4000,
				items: 1
			});
		}
	});
	
	function aiea_set_cookie(cname,cvalue,exdays) {
		const d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		let expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function aiea_get_cookie(cname) {
		let name = cname + "=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(';');
		for(let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	
})( jQuery );