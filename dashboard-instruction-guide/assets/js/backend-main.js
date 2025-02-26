( function( $ ){
	  // Close to hide Info Box
   $('body').on('click','.close-dig', function(){
 	$('.dig-popup-wrapper-outer').hide();
	console.log('eee');
  } );
  
	// Viewing Data On Click
   $('.view-button').click( function(){
	let ViewId = $(this).data('id');
    event.preventDefault();
    $.ajax({
      type : 'post',
      url : dig_ajax_global.ajax_url,
      data : {
        action: 'dig_view_action',
		itemId: ViewId,
        _ajax_nonce: dig_ajax_global.nonce
      },
      success: function( response ) {
		  if(response != null){
 			 $('#dig_response').html(response);
			 $('.dig-response-inner').show();
		  }
      }
    })
  } );
  
  
  	// Viewing Data On Click
   $('.instruction-list').click( function(){
	let ViewId = $(this).data('id');
	 $('#postdivrich .dig-popup-wrapper-outer').html('').remove();
 		$.ajax({
		  type : 'post',
		  url : dig_ajax_global.ajax_url,
		  data : {
			action: 'dig_individual_view_action',
			itemId: ViewId,
			_ajax_nonce: dig_ajax_global.nonce
		  },
		  success: function( response ) {
			  if(response != null){
				  $('#postdivrich').append(response);
				  console.log(response)
			  }
		  }
		})
  } );
  

  
  
  
 
  
  
   // Confirmation Message On Delete Button.
  $('.delete-button').click(function() {
   event.preventDefault();
    if (confirm("Are you sure?")) { 
        let deleteId = $(this).data('id');
			$.ajax({
			  type : 'post',
			  url : dig_ajax_global.ajax_url,
			  data : {
				action: 'dig_delete_action',
				deleteId: deleteId,
				_ajax_nonce: dig_ajax_global.nonce
			  },
			  success: function( response ) {
				  if(response != null){
					   // Conditin Here
				  }
			  }
			})  
		$(this).closest('tr').remove();	
   }
    return false;
 
 } );
  
} )( jQuery );






 