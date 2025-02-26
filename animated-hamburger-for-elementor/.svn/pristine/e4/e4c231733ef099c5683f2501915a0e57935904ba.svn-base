( function( $ ) {
	
		  /**
		   * @param $scope The Widget wrapper element as a jQuery element
		   * @param $ The jQuery alias
		   */
		  var elementorCliccheHandler = function( $scope, $ ) {				
					
					if ( typeof  elementor !== 'undefined')
					{
						
							elementor.channels.editor.on('clicche:hamburger:preview', function( event, id ) {
								
									$('.clicche-hamburger').addClass('is-active');
									
									setTimeout( () => $('.clicche-hamburger').removeClass('is-active'), 2000);
									
							});
							
					}
					
					let timeS 			= "";
					const hamburger 	= $scope.find('.clicche-hamburger-block');
					const target_type 	= hamburger.attr('data-target-type');
					
					if( target_type == 'popup' )
					{
						
							const target_id = hamburger.attr('data-target');
							
							$( document ).on( 'elementor/popup/hide', ( event, id, instance  ) => {
								
									
									if( id == target_id )
									{							
											timeS = event.timeStamp 
											hamburger.find('.clicche-hamburger').removeClass('is-active');	
											setTimeout( () => $('body').removeClass('dialog-prevent-scroll') , 200);													
																			
									}
								
							} );
							
							$( document ).on( 'elementor/popup/show', ( event, id, instance  ) => {
									
									if( id == target_id &&  ( event.timeStamp - timeS ) > 200 )
									{				
											timeS = event.timeStamp 
											hamburger.find('.clicche-hamburger').addClass('is-active');
											
									}
								
							} );
						
						
					}
		  };
		   
		  // Make sure you run this code under Elementor.
		  $( window ).on( 'elementor/frontend/init', () => {
			
					elementorFrontend.hooks.addAction( 'frontend/element_ready/animated-hamburger-for-elementor.default', elementorCliccheHandler );					
					
		  } );
		  
		 
		  
		  
} )( jQuery );