jQuery( document ).ready( function( $ ) {

        "use strict";
	/**
         * The file is enqueued from inc/admin/class-admin.php.
	 */        
        $( '#cat' ).change( function( event ) {
            
            event.preventDefault(); // Prevent the default form submit.            
            
            // serialize the form data
            var ajax_form_data = $("#grit_filter_form").serialize();
			//var catid = $(this). children("option:selected"). val();
            //add our own ajax check as X-Requested-With is not always reliable
            ajax_form_data = ajax_form_data+'&ajaxrequest=true&submit=Submit+Form';
			//catid = catid;
			//var ajax_form_data = 'cat=' + catid +'&ajaxrequest=true&submit=Submit+Form';
            $.ajax({
                url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
                type:   'post',                
                data:   ajax_form_data
            })
            
            .done( function( response ) { // response from the PHP action
                $(" #business_type ").html(response);
				
				
            })
            
            // something went wrong  
            .fail( function() {
                $(" #business_type ").html( "<option>Something went wrong.</option><br>" );                  
            })
        
        
       });
	   
	   //If second taxonomy dropdown is changed
	       $( '#business_type' ).change( function( event ) {
            
            event.preventDefault(); // Prevent the default form submit.            
            
            // serialize the form data
            var ajax_form_data2 = $("#grit_filter_form2").serialize();
			//var ajax_form_data = $(this). children("option:selected"). val();
            //add our own ajax check as X-Requested-With is not always reliable
            ajax_form_data2 = ajax_form_data2+'&ajaxrequest=true&submit=Submit+Form';
			
			
			
            $.ajax({
                url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
                type:   'post',                
                data:   ajax_form_data2,
            })
           
            .done( function( response ) { // response from the PHP action
                $(" #business ").html(response);
				
				
            })
            
            // something went wrong  
            .fail( function() {
                $(" #business ").html( "<option>Something went wrong.</option><br>" );                  
            })
        
  
        
       });
	   
	
	   
        
});



