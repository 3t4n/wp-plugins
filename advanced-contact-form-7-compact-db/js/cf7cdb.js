jQuery(document).ready(function(){
	var cf7cdb_view = jQuery('.cf7cdb_view');
	
	cf7cdb_view.on('click',function(e){
		e.preventDefault();
		jQuery(this).parent().parent().parent('.cf7_cdb_item').stop().toggleClass('cf7cdb_opened');
		jQuery(this).parent().parent().siblings('.cf7_cdb_item_content').stop().slideToggle()
	})

	
	
})

