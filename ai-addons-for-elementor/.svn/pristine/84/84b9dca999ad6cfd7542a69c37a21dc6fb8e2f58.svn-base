/*
 * AIEA Dashboard Script
 */
 
(function( $ ) {
	
	"use strict";
	
	$( document ).ready(function() {
		
		// set theme
		aiea_set_dashboard_theme();
		
		// widget saving
		if( $("#aiea-admin-general-save").length ){			
			$("#aiea-admin-general-save").on( "click", function(e) {
				e.preventDefault();
				
				let _ele = $(this);
				_ele.addClass("processing");
				
				if( $(document).find(".aiea-admin-settings").hasClass("active") ) {
					
					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: $("#ai-settings-form").serialize(),
						success: function ( data ) {
							_ele.removeClass("processing");
							$("body").addClass( "ai-saving inc-save-done" );
						}, error: function(xhr, status, error) {
							
						}, complete: function () {
							
							$("body").append('<div id="ai-save-settings-check"><svg width="115px" height="115px" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" > <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5" r="54.5"/> <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5"/> <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5" cy="66.5" r="54.5"/> <polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49"/> </g></svg></div>');
							setTimeout( function(){ 
								$("body").removeClass("ai-saving inc-save-done");
								$(document).find("#ai-save-settings-check").fadeOut( 350, function() { $(this).remove(); });
							}, 1800 );
							
						}
					});
					
				} else if( $(document).find(".aiea-admin-widgets").hasClass("active") ) {
														
					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: $("#ai-widgets-form").serialize(),
						success: function ( data ) {
							_ele.removeClass("processing");
							$("body").addClass( "ai-saving inc-save-done" );
						}, error: function(xhr, status, error) {
							
						}, complete: function () {
							
							$("body").append('<div id="ai-save-settings-check"><svg width="115px" height="115px" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" > <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5" r="54.5"/> <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5"/> <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5" cy="66.5" r="54.5"/> <polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49"/> </g></svg></div>');
							setTimeout( function(){ 
								$("body").removeClass("ai-saving inc-save-done");
								$(document).find("#ai-save-settings-check").fadeOut( 350, function() { $(this).remove(); });
							}, 1800 );
							
						}
					});
						
				}
			
				return false;
			});			
		}
		
		if( $("ul.aiea-admin-tab").length ){
			$("ul.aiea-admin-tab li a").on( "click", function(e) {
				e.preventDefault();
				
				
				
				let _ele = $(this);
				
				if( _ele.hasClass("active") && !_ele.attr("id") ) {
					return false;
				}
				
				
								
				if( _ele.attr("data-id") ) {
					_ele.parents("ul.aiea-admin-tab").find("a.active").removeClass("active");
					_ele.addClass("active");
					aiea_set_cookie( 'aiea_dashboard_tab', _ele.attr("data-id"), 1 );
					let _content_wrap = $(document).find(".aiea-admin-tab-content");
					_content_wrap.find(".aiea-admin-tab-pane").removeClass("active show");
					$("#"+ _ele.attr("data-id")).addClass("active show");
				} else {
					let dashboard_theme = aiea_get_cookie( "aiea_dashboard_theme" );
					if( dashboard_theme && dashboard_theme == 'l' ) {
						aiea_set_cookie( 'aiea_dashboard_theme', 'd', 360 );
					} else {
						aiea_set_cookie( 'aiea_dashboard_theme', 'l', 360 );
					}
					aiea_set_dashboard_theme();
				}
				
				return false;
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
		
		if( $( ".aiea-bulk-active" ).length ){
			$( ".aiea-bulk-active input" ).on( "change", function(e){
				let _ele = $(this);
				let _part = _ele.data("id");
				if( _ele.is(':checked') ) { 
					$("#aiea-part-"+ _part +" input.aiea-inner-switch").each(function( index ) {
						$(this).prop("checked", false).trigger("click");
					});
				} else {
					$("#aiea-part-"+ _part +" input.aiea-inner-switch").each(function( index ) {
						$(this).prop("checked", true).trigger("click");
					});
				}
			});	
		}
		
	}); // document ready end
	
	$( window ).load(function() {
		
		// trigger saved tab
		let dashboard_tab = aiea_get_cookie( "aiea_dashboard_tab" );
		if( dashboard_tab != '' ) {
			$(document).find('.aiea-admin-tab a[data-id="'+ dashboard_tab +'"' ).trigger("click");
		}
		
	}); // window load end
	
	function aiea_set_dashboard_theme() {		
		let dashboard_theme = aiea_get_cookie( "aiea_dashboard_theme" );
		if( dashboard_theme == 'l' ) {
			$("body").removeClass("aiea-theme-dark").addClass("aiea-theme-light");
		} else {
			$("body").removeClass("aiea-theme-light").addClass("aiea-theme-dark");
		}
		
		// make visible
		$(".aiea-admin-wrap").addClass("active");
	}
	
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

