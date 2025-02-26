jQuery(document).ready(function(){
	
jQuery(function(i){
    
    var template = jQuery('.copyHtml').clone();
    
    var attendeesCount = 1;
    window.addAttendee = function(){
		
        attendeesCount++;
        var attendee = template.clone().find(':input').each(function(){
            //var newId = this.id.substring(0, this.id.length-1) + attendeesCount;
			var newId = jQuery(this).attr('name');
           
            jQuery(this).prev().attr('for', newId); // update label for
            jQuery(this).attr('class','cloned'); 
            this.name = newId; // update id and name (assume the same)
            
        }).end()
        .attr('id', 'att' + attendeesCount)
        .insertBefore('#before');
    };

    
    jQuery('.add').click(function(){
        
			addAttendee();
			jQuery("input.cloned[name='elemId']").val('');
			jQuery(this).fadeOut();
		});
	});


	
});