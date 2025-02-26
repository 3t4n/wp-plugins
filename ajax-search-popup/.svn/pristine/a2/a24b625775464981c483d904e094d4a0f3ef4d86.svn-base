jQuery(document).ready(function ($) {

jQuery(document).on('keyup', '.text-search', function() {


		jQuery("#ajax-response2").html('<h5 style="text-align:center"> loading... </h5>');
		
		var search_title = $(".text-search").val();
	
		$check = $('.search_post').prop("checked");
		if($check){
		var post = $(".search_post").val();
		}		
		$check2 = $('.search_page').prop("checked");
		if($check2){
		var page = $(".search_page").val();
		}
	



    var security = s_url.security_nonce;
	
		     jQuery.ajax({
			 url: s_url.ajax_url,
			 type: 'POST',
			 data:{
			  action: 'my_ajax_s_functions' ,
			  search_title: search_title,
              post: post,
              page: page,
              security_nonce: security
			},
    success: function( response ){

      jQuery( '#ajax-response2' ).html( response );
	  
    }

	
  });
  
 });

});



