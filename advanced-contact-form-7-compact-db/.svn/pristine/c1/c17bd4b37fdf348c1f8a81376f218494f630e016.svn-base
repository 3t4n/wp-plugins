jQuery(document).ready( function($){


	var cf7cdb_delete = jQuery('.cf7cdb_delete');
	var cf7cdb_export = jQuery('.cf7cdb_export');

  	cf7cdb_delete.on('click',function(){
  		 var current = jQuery(this);
		  $.ajax({
		    url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
		    type: 'POST',
		    data:{ 
		      action: 'cf7cdb_delete', // this is the function in your functions.php that will be triggered
		      form_id: jQuery(this).attr('data-id'),		     
		    },
		    success: function( data ){
		     jQuery('#cf7cdb_messages').html(data.message).fadeIn();
		     current.parent().parent().parent().remove()
		     setTimeout(function(){
		     	jQuery('#cf7cdb_messages').fadeOut().html('')
		     },2000)
		    }
		  });
	 })

  	cf7cdb_export.on('click',function(){
		  $.ajax({
		    url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
		    type: 'POST',
		    data:{ 
		      action: 'cf7cdb_export', // this is the function in your functions.php that will be triggered		      	     
		    },
		    success: function( data ){
		     jQuery('#cf7cdb_messages').html(data.message).fadeIn();
		     setTimeout(function(){
		     	jQuery('#cf7cdb_messages').fadeOut().html('')
		     },2000)		    
		    }
		  });
	 })
});