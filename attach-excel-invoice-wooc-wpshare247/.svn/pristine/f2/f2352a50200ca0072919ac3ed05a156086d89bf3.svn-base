// JavaScript Document
function wpshare247_aeiwooc_setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function wpshare247_aeiwooc_getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function wpshare247_aeiwooc_eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

jQuery(document).ready(function(e) {
	jQuery( '.colorpicker' ).wpColorPicker();
	
	jQuery(".file_name_save_event").change(function() {
		var sel_id = jQuery(this).attr("id");
		var data = jQuery( "#"+sel_id+" option:selected" ).data("file");
		jQuery("."+sel_id).text(data);
	});
	
	jQuery(".aeiwooc_excel_template").change(function() {
		var sel_id = jQuery(this).attr("id");
		var data = jQuery( "#"+sel_id+" option:selected" ).data("url");
		jQuery("img."+sel_id).attr("src", data)
	});
	
	jQuery("#aeiwooc-pro-box a").click(function(e) {
		jQuery(".form-table.aeiwooc-tab.active").removeClass('active');
		var aeiwooc_tab_id = jQuery(this).attr("href");
		jQuery(aeiwooc_tab_id).addClass("active");
		
		jQuery("#aeiwooc-pro-box a").addClass("active");
		jQuery(this).removeClass("active");
		return false;
	});
	
	wpshare247_aeiwooc_tab();
	wpshare247_aeiwooc_removeItem();
	wpshare247_aeiwooc_image_init();
	wpshare247_aeiwooc_load_tabs();
});

function wpshare247_aeiwooc_tab(){
	jQuery(".is_AEIWOOC_tab a").click(function(e) {
		var aeiwooc_tab_id = jQuery(this).attr("href");
		if( aeiwooc_tab_id.indexOf('#') == 0 ){
			var parent_e = jQuery(this).parent();
			jQuery(parent_e).find("a.nav-tab-active").removeClass("nav-tab-active");
			jQuery(this).addClass("nav-tab-active");
			jQuery(".form-table.aeiwooc-tab.active").removeClass('active');
			jQuery(aeiwooc_tab_id).addClass("active");
			
			wpshare247_aeiwooc_setCookie('wpshare247_aeiwooc_current_tab_id',aeiwooc_tab_id,1);
		 	return false;
		}
	});
}

function wpshare247_aeiwooc_load_tabs(){
	var current_tab_id = wpshare247_aeiwooc_getCookie('wpshare247_aeiwooc_current_tab_id');
	if(current_tab_id){
		jQuery('.is_AEIWOOC_tab a[href="'+current_tab_id+'"]').click();
	}
}


function wpshare247_aeiwooc_removeItem(){
	jQuery(".wpshare247_aeiwooc_removeit").click(function(){
		var container_id = jQuery(this).attr("container");
		jQuery(container_id+" .hdn").val('');
		jQuery(jQuery(this).parent()).remove();
	});
}

function wpshare247_aeiwooc_create_img_block_html(attachment, container_id, is_multiple){
	var type = attachment.type; var src_attachment = '';
	var id_attachment = attachment.id;
	
	if(!is_multiple){
		if(type == 'image'){
			if((attachment.sizes).hasOwnProperty('thumbnail')){
				var src_attachment = attachment.sizes.thumbnail.url;
			}else{
				var src_attachment = attachment.url;
			}
		}
		if(id_attachment){
			jQuery(container_id+" .hdn").val(id_attachment);
		}
		
		var sitem = '<li id="'+id_attachment+'" data-id="'+id_attachment+'" class="attachment save-ready"><a class="dashicons dashicons-no wpshare247_aeiwooc_removeit" container='+container_id+'></a><div class="attachment-preview js--select-attachment type-image subtype-png landscape"><div class="thumbnail"><div class="centered"><img src="'+src_attachment+'" draggable="false"></div></div></div></li>';
		jQuery(container_id+" .images").html(sitem);
	}
}

function wpshare247_aeiwooc_image_init(){

	jQuery('.wpshare247-aeiwooc-media').on('click',function(e){
		
		var container_id = jQuery(this).attr("rel");
		
		e.preventDefault();
		var frame_multiple = false;
		
		if (frame_multiple) {
			frame_multiple.open();
			return;
		}
		
		//Select many photos
		var i_number = jQuery(this).attr("data-number");
		if(i_number=='*'){
			var is_multiple = true;
		}else{
			var is_multiple = false;
		}
		
		var media_upload_title = jQuery(this).data('title');
		if(media_upload_title==''){
			media_upload_title = 'Select or Upload Media Of Your Chosen Persuasion';
		}
		
		var media_upload_btn_text = jQuery(this).data('btntext');
		if(media_upload_btn_text==''){
			media_upload_btn_text = 'Use this media';
		}
		
		frame_multiple = wp.media({
			title: media_upload_title,
			button: {
				text: media_upload_btn_text
			},
			library: {
					type: [ 'image' ]
			},
			multiple: is_multiple
		});
		
		
		// Register Event
		frame_multiple.on( "select", function() {
			var selection = frame_multiple.state().get('selection');
				selection.map( function( attachment ) {
					attachment = attachment.toJSON();
					//console.log(attachment);
					
					// append image
					wpshare247_aeiwooc_create_img_block_html(attachment, container_id, is_multiple)
				});
				
				wpshare247_aeiwooc_removeItem();
				
				// Close the media frame_multiple
				frame_multiple.close();
		});
		
		// Show media frame_multiple
		frame_multiple.open();
	});//------------------------------------------------------------------------
	
	return false;
///////////////////////////////////////////////////////
}