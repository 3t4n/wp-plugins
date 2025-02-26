(function( $ ) {

var adminUrl = menu_obj.ajaxUrl;
	'use strict';
	 jQuery( document ).ready(function() {
		jQuery(".menu-move-anywhere").on("change",function(){
 			var change_value = jQuery(this).val();
 			var change_value_class = jQuery("#menu-item-"+change_value).attr("class");
 			var current_id = $(this).closest("li").attr("id");
 			var current_class = $(this).closest("li").attr("class");
 			
 			if(current_class.indexOf('menu-item-depth-0') != -1)
 			{

 				jQuery.each(jQuery("#"+current_id).nextAll(), function( index, value ) {
 					var curr_class = jQuery(this).attr("class");
					if(jQuery(this).hasClass("menu-item-depth-1")){
						jQuery(this).removeClass("menu-item-depth-1").addClass("menu-item-depth-0");
					}else if(jQuery(this).hasClass("menu-item-depth-2")){
						jQuery(this).removeClass("menu-item-depth-2").addClass("menu-item-depth-1");
					}else if(jQuery(this).hasClass("menu-item-depth-3")){
						jQuery(this).removeClass("menu-item-depth-3").addClass("menu-item-depth-2");
					}else if(jQuery(this).hasClass("menu-item-depth-4")){
						jQuery(this).removeClass("menu-item-depth-4").addClass("menu-item-depth-3");
					}else{
						jQuery(this).removeClass("menu-item-depth-0").addClass("menu-item-depth-0");
					}
 					if(curr_class.indexOf('menu-item-depth-0') != -1){
 						return false;	
 					}
				});
 			}else if(current_class.indexOf('menu-item-depth-1') != -1){
 				jQuery.each(jQuery("#"+current_id).nextAll(), function( index, value ) {
 					var curr_class = jQuery(this).attr("class");
					
					if(jQuery(this).hasClass("menu-item-depth-2")){
						jQuery(this).removeClass("menu-item-depth-2").addClass("menu-item-depth-1");
					}else if(jQuery(this).hasClass("menu-item-depth-3")){
						jQuery(this).removeClass("menu-item-depth-3").addClass("menu-item-depth-2");
					}else if(jQuery(this).hasClass("menu-item-depth-4")){
						jQuery(this).removeClass("menu-item-depth-4").addClass("menu-item-depth-3");
					}else{
						jQuery(this).removeClass("menu-item-depth-0").addClass("menu-item-depth-0");
					}
 					if(curr_class.indexOf('menu-item-depth-0') != -1){
 						return false;
 					}
				});
 			}else if(current_class.indexOf('menu-item-depth-2') != -1){
 				jQuery.each(jQuery("#"+current_id).nextAll(), function( index, value ) {
 					var curr_class = jQuery(this).attr("class");
					if(jQuery(this).hasClass("menu-item-depth-3")){
						jQuery(this).removeClass("menu-item-depth-3").addClass("menu-item-depth-2");
					}else if(jQuery(this).hasClass("menu-item-depth-4")){
						jQuery(this).removeClass("menu-item-depth-4").addClass("menu-item-depth-3");
					}else{
						jQuery(this).removeClass("menu-item-depth-0").addClass("menu-item-depth-0");
					}
					if(curr_class.indexOf('menu-item-depth-0') != -1){
 						return false;
 					}
				});
 			}else{
				jQuery.each(jQuery("#"+current_id).nextAll(), function( index, value ) {
					var curr_class = jQuery(this).attr("class");
					if(jQuery(this).hasClass("menu-item-depth-4")){
						jQuery(this).removeClass("menu-item-depth-4").addClass("menu-item-depth-3");
					}else{
						jQuery(this).removeClass("menu-item-depth-0").addClass("menu-item-depth-0");
					}
					if(curr_class.indexOf('menu-item-depth-0') != -1){
 						return false;
 					}
				});
 			}

 			if(change_value_class.indexOf('menu-item-depth-0') != -1){
 				jQuery("#"+current_id).removeClass("menu-item-depth-1").addClass("menu-item-depth-0");
 				jQuery("#"+current_id).removeClass("menu-item-depth-2").addClass("menu-item-depth-0");
 				jQuery("#"+current_id).removeClass("menu-item-depth-3").addClass("menu-item-depth-0");
 				jQuery("#"+current_id).removeClass("menu-item-depth-4").addClass("menu-item-depth-0");
 			}else if(change_value_class.indexOf('menu-item-depth-1') != -1){
 				jQuery("#"+current_id).removeClass("menu-item-depth-0").addClass("menu-item-depth-1");
 				jQuery("#"+current_id).removeClass("menu-item-depth-2").addClass("menu-item-depth-1");
 				jQuery("#"+current_id).removeClass("menu-item-depth-3").addClass("menu-item-depth-1");
 				jQuery("#"+current_id).removeClass("menu-item-depth-4").addClass("menu-item-depth-1");
 			}else if(change_value_class.indexOf('menu-item-depth-2') != -1){
 				jQuery("#"+current_id).removeClass("menu-item-depth-0").addClass("menu-item-depth-2");
 				jQuery("#"+current_id).removeClass("menu-item-depth-1").addClass("menu-item-depth-2");
 				jQuery("#"+current_id).removeClass("menu-item-depth-3").addClass("menu-item-depth-2");
 				jQuery("#"+current_id).removeClass("menu-item-depth-4").addClass("menu-item-depth-2");
 			}else if(change_value_class.indexOf('menu-item-depth-3') != -1){
 				jQuery("#"+current_id).removeClass("menu-item-depth-0").addClass("menu-item-depth-3");
 				jQuery("#"+current_id).removeClass("menu-item-depth-1").addClass("menu-item-depth-3");
 				jQuery("#"+current_id).removeClass("menu-item-depth-2").addClass("menu-item-depth-3");
 				jQuery("#"+current_id).removeClass("menu-item-depth-4").addClass("menu-item-depth-3");
 			}else if(change_value_class.indexOf('menu-item-depth-4') != -1){
 				jQuery("#"+current_id).removeClass("menu-item-depth-0").addClass("menu-item-depth-4");
 				jQuery("#"+current_id).removeClass("menu-item-depth-1").addClass("menu-item-depth-4");
 				jQuery("#"+current_id).removeClass("menu-item-depth-3").addClass("menu-item-depth-4");
 				jQuery("#"+current_id).removeClass("menu-item-depth-4").addClass("menu-item-depth-4");
 			}else{
 				return false;
 			}

 			var div_content = document.querySelector("#"+current_id);
 			jQuery("#menu-item-"+change_value).after(div_content);
 		});
 		var menu_parent_id = jQuery("#menu").val();
		var data = {
 			'action' : 'menus_retrive',
 			'menuparentId' : menu_parent_id
 		}
		jQuery.ajax({
		    type : "POST",
		    url : adminUrl,
		    data : data,		    
		    success : function(response) {
		        jQuery(".menu-move-anywhere").append(response);	        
		    },
		    error: function(){
		    	alert('something went wrong');
		    }
		}); 			


 	});
})( jQuery );