( function( $ ) {

    $( document ).on( 'ready ', function() {
		
		$('.iconpicker-item').addClass("phoeiconpicker");
				
		$('.phoeiconpicker-component').mouseenter(function(){
			
				$(this).iconpicker();
						
		});	
		
		
		 $('.phoeiconpicker-component').click(function(){
			
				$('.phoeiconpicker-component .iconpicker-popover').show();
					
				
		});	
	
		
		$( 'body' ).on( 'mousedown', '.phoeiconpicker-component', function(e) { 

	    		
		    $( this ).trigger( 'click' );

		})
		
		.on( 'click', '.phoen-iconpicker', function(e) {

			$( this ).find( '.iconpicker-search' ).focus();
			
		});


		$( '.phoeiconpicker-component' ).on( 'iconpickerSelect', function( e ) {
			
					
			wp.media.editor.insert( '[phoe-icon name="' + e.iconpickerItem.context.title.replace( '.', '' ) + '"]' );
			
			$('.phoeiconpicker-component .iconpicker-popover').hide();
			
				
		});

    });

	
})( jQuery );
