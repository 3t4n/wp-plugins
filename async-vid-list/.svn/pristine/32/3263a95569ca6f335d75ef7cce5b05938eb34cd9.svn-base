	jQuery(function(){
		
	jQuery( document.getElementsByClassName('async-vid-list') ).each(function() {
	
		var vid_string = '#'+ jQuery(this).attr('id')+' a' ;	
		var list_id = jQuery(this).attr('data-list_id') ;
		
		var desc = jQuery(vid_string).attr('data-async-vid-list-desc');
		var new_vid = jQuery(vid_string).attr('data-async-vid-list-vid');
		
		jQuery(this).children('ul').children('li').children('a').first().addClass('selected');
		
		document.getElementById('async-vid-list-divVideo'+list_id).innerHTML = new_vid; 
		
		document.getElementById('async-vid-list-divChoice'+list_id).innerHTML = desc;
	});
		
	jQuery('.async-vid-list a').click(function(e) {

		var list_id = jQuery(this).closest('div').attr('data-list_id') ;
	
		var desc = jQuery(this).attr('data-async-vid-list-desc');
		var new_vid = jQuery(this).attr('data-async-vid-list-vid');
		
		jQuery(this).addClass("selected");
		jQuery('#async-vid-list'+list_id+' a').not(this).removeClass("selected");	
		
		if(new_vid)
		{
			document.getElementById('async-vid-list-divVideo'+list_id).innerHTML = new_vid;
		}
		if(desc)
		{
			document.getElementById('async-vid-list-divChoice'+list_id).innerHTML = desc;
		}
		
	});
	
	

});