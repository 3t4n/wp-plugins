function ajx_submitCommentSettings()
{
	jQuery('#commentform').live('submit', function(e){  
		e.preventDefault();  

			if(jQuery("#errComment").length == 0 )
			var $message=jQuery('<span class="errorComments" id="errComment"></span>').appendTo("#commentform");			

		 jQuery.ajax({
			 beforeSend:function(xhr){ 
				jQuery("#errComment").html('processing...');
			 },
			 type:'post',
			 url:jQuery(this).attr('action'),
			 data:jQuery(this).serialize(),
			 dataType:'html',
			 error:function(xhr){
				 if(xhr.status==500){ 
				  jQuery("#errComment").html(xhr.responseText.split('<p>')[1].split('</p>')[0]); 
				 }
				 else if(xhr.status=='timeout'){ 
				  jQuery("#errComment").html('Error:Server time out,try again!'); 
				 }
				 else{ 
				  jQuery("#errComment").html('too fast error'); //too fast error
				 }
			 },
		success:function(data){ 
				jQuery('#comments').html('loading..');  //loading
				var link = document.location.href;

				jQuery.ajax({
				   type: "GET",
				   cache: false,
				   url: link, 
				   success: function(data){ 
						var oneval =jQuery(data).find('#comments');
						jQuery('#comments').html(oneval.html());					 
				   }
				  }).done(function(){ 
				});

				//ajx_submitCommentSettings();
				jQuery("#errComment").html('thank you'); //thank you 
				}
		});//end of ajax
		 return false;

	 });
}

function ajx_pagingComment()
 {  
	 jQuery('#comment-nav-below a, #comment-nav-above a').live('click', function(e){  
		 e.preventDefault();  
		jQuery('html, body').scrollTop(jQuery("#comment-nav-below").offset().top); 
		var link = jQuery(this).attr('href');  
		jQuery('#comments').html('loading...');  //loading
	 
		 jQuery.ajax({
				   type: "GET",
				   cache: false,
				   url: link, 
				   success: function(data){ 
						var oneval =jQuery(data).find('#comments');
						jQuery('#comments').html(oneval.html());					 
				   }
				  }).done(function(){ 
				});
 
		   //ajx_submitCommentSettings();
		});  
	 
 }


jQuery(document).ready(function(){  
		ajx_pagingComment();
		ajx_submitCommentSettings(); 
 });  
