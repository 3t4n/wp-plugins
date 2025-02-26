jQuery(document).ready(function(){	
	jQuery('.caption_color').wpColorPicker();
	jQuery(".fruit_slider_title").html(jQuery("#slider_title").val());
	jQuery(".fruit_slider_content").html(jQuery("#slider_content").val());
	jQuery(".fruit_slider_link").html(jQuery("#slider_link").val());
	jQuery(".fruit_slider_link").attr("href",jQuery( "#slider_url").val());	 
   
    jQuery(".fruit_slider_title").css({ "top" : jQuery(".fruit-element-top_title").val()+ "px"  , "left" : jQuery(".fruit-element-left_title").val()+ "px"});
    jQuery(".fruit_slider_content").css({ "top" : jQuery(".fruit-element-top_text").val()+ "px"  , "left" : jQuery(".fruit-element-left_text").val()+ "px"});
    jQuery(".fruit_slider_link").css({ "top" : jQuery(".fruit-element-top_link").val()+ "px"  , "left" : jQuery(".fruit-element-left_link").val()+ "px"});     
	
	jQuery( "#slider_title" ).keyup(function() {		
	    jQuery(".fruit_slider_title").html(jQuery("#slider_title").val());	   
	});		
	
	jQuery( "#slider_content" ).keyup(function() {		
	    jQuery(".fruit_slider_content").html(jQuery("#slider_content").val());
	});	
	
	jQuery( "#slider_link" ).keyup(function() {		
	    jQuery(".fruit_slider_link").html(jQuery("#slider_link").val());
	});
	
	jQuery( "#slider_url" ).keyup(function() {			
		jQuery(".fruit_slider_link").attr("href",jQuery( "#slider_url").val());	    
	});
	
	jQuery( "#slider_target_link" ).click(function() {					
		 if (!jQuery(this).is(':checked')) {
				jQuery(".fruit_slider_link").removeAttr("target");				
         }
         else {
			 jQuery(".fruit_slider_link").attr("target","_blank");	
		 }
	 });	

    /* Drag drop js*/
	jQuery('div.fruit_slider_title').draggable(
		{
			cursor:       "move",
			containment: jQuery('div.fruit_slider img'),  
			drag: function(){
            var offset = jQuery(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;          
			},			
			stop: function(event, ui) {
				var originalPosition = ui.position;
				jQuery('.fruit-element-left_title').val(originalPosition.left);
				jQuery('.fruit-element-top_title').val(originalPosition.top);				
			}
		}
	);
	jQuery('p.fruit_slider_content').draggable(
		{
			cursor:       "move",
			containment: jQuery('div.fruit_slider img'),  
			drag: function(){
            var offset = jQuery(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;          
			},			
			stop: function(event, ui) {
				var originalPosition = ui.position;
				jQuery('.fruit-element-left_text').val(originalPosition.left);
				jQuery('.fruit-element-top_text').val(originalPosition.top);				
			}
		}
	);	
	jQuery('a.fruit_slider_link').draggable(
		{
			cursor:       "move",
			containment: jQuery('div.fruit_slider img'),  
			drag: function(){
            var offset = jQuery(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;          
			},			
			stop: function(event, ui) {
				var originalPosition = ui.position;
				jQuery('.fruit-element-left_link').val(originalPosition.left);
				jQuery('.fruit-element-top_link').val(originalPosition.top);				
			}
		}
	);
	
	var anim_1 = jQuery('#select_inanimation').val();
	jQuery(".fruit-element-data_in option[value=" + anim_1 + "]").attr('selected', 'selected');
	
	var anim_2 = jQuery('#select_outanimation').val();
	jQuery(".fruit-element-data_out option[value=" + anim_2 + "]").attr('selected', 'selected');
	
	var anim_3 = jQuery('#select_image_in').val();
	jQuery(".fruit-image-data_in option[value=" + anim_3 + "]").attr('selected', 'selected');
	
	var anim_4 = jQuery('#select_image_out').val();
	jQuery(".fruit-image-data_out option[value=" + anim_4 + "]").attr('selected', 'selected');	
	
	jQuery('#edit_gallery').click(function(){
		var gname=jQuery('#Gallery_title').val();
		if (gname==''){
			window.location=jQuery('#gallery_url').val();
			return false;
		}else{
				jQuery.ajax({
					url:fruit_ajax.ajax_url,
					type:'POST',
					dataType:'json',
					data:{
							action:'edit_gallery',
							gname:gname,
							gid:jQuery('#gid').val(),
					},
					success:function(response){
						window.location=jQuery('#gallery_url').val();
					}
				});
		}
		
	});
	jQuery('#galllery_sort').change(function(){
		var galllery_id=jQuery('#galllery_sort').val();
		var galleryurl=jQuery('#galleryurl').val();
		if(galllery_id == '')
			window.location=galleryurl;
		else
			window.location=galleryurl+"&gid="+galllery_id;
	});
});

	function jqCheckAll(checker, formid, name) {					
		jQuery('input:checkbox[name="' + name + '[]"]').each(function() {
			jQuery(this).attr("checked", checker.checked);
		});
	}
