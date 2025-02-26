function switch_tabs(obj)
{
    jQuery('.tab-content').hide();
    jQuery('#ar-main-menu ul a').removeClass("selected");
    var id = obj.attr("rel");
                                   
    jQuery('#'+id).fadeIn(500);
                                    
    obj.addClass("selected");
}

jQuery.fn.slideFadeToggle = function(speed, easing, callback) {
  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};

function checked_img($this){
    if($this.is(':checked')){
        $this.closest('label').addClass('ar-img-selected');
    }
        
    else{
        $this.closest('label').removeClass('ar-img-selected');
    }
}

function checked_img_radio($this){
    if($this.is(':checked')){
        $this.closest('.cOf').find('label.ar-img-selected').removeClass('ar-img-selected');
        $this.closest('label').addClass('ar-img-selected');
    }
        
    else{
        $this.closest('label').removeClass('ar-img-selected');
    }
}





/* DOCUMENT READY */


jQuery(document).ready(function() {
                            
                            
    jQuery("#ar-main-menu > li > p").click(function(){
                     
        jQuery(this).next().slideToggle(300);
    });
                     
                                    
                                    
    // Tabs
    jQuery('#ar-main-menu ul a').click(function(){
        switch_tabs(jQuery(this));
    });
                     
    jQuery('.tab-content').hide();
                                    
    var id = jQuery('.defaulttab').attr('rel');
    jQuery('#'+id).show();
                        
    jQuery('.default-accordion').show();
                        
                        
    //Color picker
                        
    jQuery( '.ar-color-picker' ).ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            jQuery(el).val(hex);
            jQuery(el).ColorPickerHide();
            jQuery(el).attr('style', 'background-color: #'+hex);
        },
        onBeforeShow: function () {
            jQuery(this).ColorPickerSetColor(this.value);
        }
    })
    .bind('keyup', function(){
        jQuery(this).ColorPickerSetColor(this.value);
    });  
    
    // Checkboxes and radio
    
    jQuery('.ar-image-checkbox-b').click(function(){
        var $this = jQuery(this);
        
        checked_img($this);
    });
    
    jQuery('.ar-image-radio-b').click(function(){
        var $this = jQuery(this);
        
        checked_img_radio($this);
    });
    
    
    
    
    
    //Checkbox HIDE/SHOW
    jQuery('input[type="checkbox"]').each(function(){
        var $this = jQuery(this);
        var id = $this.attr("id");
        if(!$this.is(':checked'))
            jQuery('div[rel="'+id+'"]').hide();
    });
    
    jQuery('input[type="checkbox"]').click(function(){
        var $this = jQuery(this);
        var id = $this.attr("id");
        if($this.is(':checked'))
            jQuery('div[rel="'+id+'"]').slideFadeToggle(500);
        else
            jQuery('div[rel="'+id+'"]').slideFadeToggle(500);
    });
    
    
    
    //AJAX upload
    jQuery('.ar_upload').each(function(){
				
        var the_button=jQuery(this);
        var image_input=jQuery(this).prev();
        var image_id=jQuery(this).attr('id');
				
        new AjaxUpload(image_id, {
            action: ajaxurl,
            name: image_id,
					  
            // Additional data
            data: {
                action: 'ar_ajax_upload',
                data: image_id
            },
            autoSubmit: true,
            responseType: false,
            onChange: function(file, extension){},
            onSubmit: function(file, extension) {
                the_button.html("Uploading...");				  
            },
            onComplete: function(file, response) {	
                the_button.html("Upload Image");
							
                if(response.search("Error") > -1){
                    alert("There was an error uploading:\n"+response);
                }
							
                else{							
                    image_input.val(response);
                    var image_preview='<img src="' + response + '" class="ar_image_preview" />';							
								
                    var remove_button_id='remove_'+image_id;
                    var rem_id="#"+remove_button_id;
                    if(!(jQuery(rem_id).length > 0)){
                        the_button.after('<span class="ar_remove ar-button" id="'+remove_button_id+'">Remove Image</span>');
                    }
								
								
                    the_button.next().next().html(image_preview);
                }
								
								
							
            }
        });
    });
			
			
    //AJAX image remove
    jQuery('.ar_remove').live('click', function(){
        var remove_button=jQuery(this);
        var image_remove_id=jQuery(this).prev().attr('id');
        remove_button.html('Removing...');
				
        var data = {
            action: 'ar_ajax_remove',
            data: image_remove_id
        };
				
        jQuery.post(ajaxurl, data, function(response) {
            remove_button.prev().prev().val('');
            remove_button.next().html('');
            remove_button.remove();
        });
				
    });
    
});