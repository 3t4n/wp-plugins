tinyMCEPopup.requireLangPack();
	
var GrpdocsComparisonInsertDialog = {
	init : function() {
		var f = document.forms[0];
        var shortcode;
				jQuery('.diy').click(function(){
				// diy option selected
					var dis = jQuery('.opt').attr('disabled');
					
					if (dis) {					
						jQuery('.opt').attr('disabled', ''); 
						jQuery('.gray').css('color','black');					
						jQuery('#shortcode').val('');
						
					} else {					
						jQuery('.opt').attr('disabled', 'disabled');
						jQuery('.gray').css('color','gray');
						jQuery('#shortcode').val('[grpdocscomparison guid_embed=""]');
					}
				
				});
				
				jQuery('.restrict_dl').click(function(){
					 update_sc();
				});	
				jQuery('.disable_cache').click(function(){
					 update_sc();
				});	
				jQuery('.bypass_error').click(function(){
					 update_sc();
				});
				jQuery('.save').click(function(){
					 update_sc();
				});
				
				jQuery('#height').blur(function(){
					update_sc();
				});
				jQuery('#width').blur(function(){
					update_sc();
				});
				jQuery('#guid_embed').blur(function(){
					update_sc();
				});		
				
				jQuery('#guid_redline').blur(function(){
					update_sc();
				});
        function strip_tags(str){
            return str.replace(/<\/?[^>]+>/gi, '');
        };
		
		function update_sc() {
			 shortcode = 'grpdocscomparison';

				if (( jQuery('#guid_redline').val() !=0 ) & ( jQuery('#guid_redline').val() ) !=null) {
					shortcode = shortcode + '  guid_redline="'+strip_tags(jQuery('#guid_redline').val())+'"';
				} else if ( jQuery('#guid_redline').val() == '' ) {
					jQuery('#uri-note').html('');
					shortcode = shortcode + ' guid_redline=""';
				}
				if (( jQuery('#guid_embed').val() !=0 ) & ( jQuery('#guid_embed').val() ) !=null) {
					shortcode = shortcode + '  guid_embed="'+strip_tags(jQuery('#guid_embed').val())+'"';
				}
				if (( jQuery('#height').val() !=0 ) & ( jQuery('#height').val() ) !=null) {
					shortcode = shortcode + '  height="'+strip_tags(jQuery('#height').val())+'"';
				}
				if (( jQuery('#width').val() !=0 ) & ( jQuery('#width').val() ) !=null) {
					shortcode = shortcode + '  width="'+strip_tags(jQuery('#width').val())+'"';
				}
				 
				var newsc = shortcode.replace(/  /g,' ');
				 
				jQuery('#shortcode').val('['+newsc+']');
		}
	},
	insert : function() {
            // insert the contents from the input into the document
            tinyMCEPopup.editor.execCommand('mceInsertContent', false, jQuery('#shortcode').val());
            tinyMCEPopup.close();
        
	}
};

tinyMCEPopup.onInit.add(GrpdocsComparisonInsertDialog.init, GrpdocsComparisonInsertDialog);
