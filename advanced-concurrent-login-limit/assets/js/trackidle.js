jQuery(document).idle({
  onIdle: function(){
    //alert('I\'m idle');
	is_user_idle_ajax_update('idle');
  },
  onActive: function(){
    //alert('Hey, I\'m back!');
	is_user_idle_ajax_update('active');
  },
  events: 'mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick',
  idle: 900000
})

function is_user_idle_ajax_update(eventname){
	jQuery.ajax({
		type: "POST",
		url: ustsLimitloginAjax.ajaxurl,
		data: {
			action:'gen_alimitl_keeptrack_user_idletime',
			tevent : eventname
		},
		success: function(data)
		{
		},
		error : function(s , i , error){
				console.log(error);
		}
	}).done(function(data){
			data = data.trim();
			//usts_loading_hide();
			//jQuery("#inner_content").html(data);
	});	
}