(function( $ ) {
  "use strict";
  
    

jQuery(document).ready(function($){
	
			
  $("#klaro_zindex,#klaro_opacity,#disable_css").parent().parent().parent().hide();
  $("#klaro_bgcolor,#klaro_linkcolor,#klaro_buttonokcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor,#klaro_disable_at_front_home").parent().parent().parent().hide();
  $("#klaro_bgcolor,#klaro_buttonokcolor,#klaro_linkcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor").parent().parent().parent().parent().parent().parent().hide();
  $("#klaro_cssstyle").parent().parent().hide();
  $(".klaro-hideformreset").hide();
  $(".mysticky-hideform,.klaro-general").fadeIn(300);
  
  
  $(".btn-general").click(function(){
    $(".btn-general").addClass("nav-tab-active");
    $(".btn-style,.btn-advanced").removeClass("nav-tab-active");
    $("#klaro_id_selector,#klaro_cookie_expires,#default_state,#must_consent,#klaro_privacy_link").parent().parent().parent().show();
    $("#klaro_zindex,#klaro_opacity,#klaro_transition_time,#disable_css,#klaro_disable_at_front_home").parent().parent().parent().hide();
    $("#klaro_bgcolor,#klaro_linkcolor,#klaro_buttonokcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor").parent().parent().parent().parent().parent().parent().hide();
    $("#klaro_cssstyle,#klaro_disable_at_front_home").parent().parent().hide();
    $(".klaro-general").fadeIn(300);
    $(".klaro-style,.klaro-advanced,.klaro-hideformreset") .hide();				
  });
						
  $(".btn-general,.btn-style,.btn-advanced").hover(function() {
    $(".btn-general,.btn-style,.btn-advanced").css("cursor","pointer");
  });
							
  $(".btn-style").click(function(){
    $(".btn-style").addClass("nav-tab-active");
    $(".btn-general,.btn-advanced").removeClass("nav-tab-active");
    $("#klaro_id_selector,#klaro_cookie_expires,#default_state,#must_consent,#klaro_disable_at_front_home,#klaro_privacy_link").parent().parent().parent().hide();
    $("#klaro_zindex,#klaro_bgcolor,#klaro_linkcolor,#klaro_buttonokcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor,#klaro_opacity,#disable_css").parent().parent().parent().show();
    $("#klaro_cssstyle").parent().parent().show();
    $("#klaro_disable_at_front_home").parent().parent().hide();
    $("#klaro_bgcolor,#klaro_linkcolor,#klaro_buttonokcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor").parent().parent().parent().parent().parent().parent().show();
    $(".klaro-general").hide();
    $(".klaro-hideformreset").hide();
    $(".klaro-style") .fadeIn(300);
    $(".klaro-advanced").hide();
  });
						
  $(".btn-advanced").click(function(){
    $(".btn-advanced").addClass("nav-tab-active");
    $(".btn-style,.btn-general").removeClass("nav-tab-active");		
    $("#klaro_id_selector,#klaro_cookie_expires,#default_state,#must_consent,#klaro_privacy_link").parent().parent().parent().hide();
    $("#klaro_zindex,#klaro_opacity,#disable_css").parent().parent().parent().hide();
    $("#klaro_cssstyle").parent().parent().hide();
    $("#klaro_bgcolor,#klaro_linkcolor,#klaro_buttonokcolor,#klaro_buttondeclinecolor,#klaro_toggleactivecolor").parent().parent().parent().parent().parent().parent().hide();
	$("#klaro_disable_at_front_home").parent().parent().parent().show();
	$("#klaro_disable_at_front_home").parent().parent().show();
    $(".klaro-hideformreset").fadeIn(300);
    $(".klaro-general").hide();
    $(".klaro-style") .hide();
    $(".klaro-advanced").fadeIn(300);
  });		
						
						
						
  $(".confirm").click(function() {
    return window.confirm("Reset to default settings?");
  });
	
});		
	
})(jQuery);	