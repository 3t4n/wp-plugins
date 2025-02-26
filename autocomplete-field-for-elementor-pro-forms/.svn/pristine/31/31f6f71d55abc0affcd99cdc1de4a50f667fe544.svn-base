(function($) {
    
    $( document ).ready( () => {

        const possibleSelectValues = {}

        $('.elementor-field-type-gh-select-autocomplete').each(function( index ) {

                const id = $(this).find('input').attr('id')

                possibleSelectValues[ id ] = $( this ).find('.elementor-select-autocomplete-option').map( function(){
                    return $.trim( $(this).text() );
                 }).get()               
        });
       
        $( ".elementor-select-autocomplete-container" ).on("click", ".autocomplete-row", function(){
                    
                $(this).closest('.elementor-field-type-gh-select-autocomplete').find( "input" ).val( $(this).text() )

                setTimeout( () => {
                    $('.elementor-select-autocomplete-container').addClass('hidden')							
                }, 100 )

        })	

        $( 'input[type="gh-select-autocomplete"]' ).on('input', function(){
               
                const val 		        = $(this).val()
                const startWith         = $(this).attr('data-startswith') == 'yes'
                const container         = $(this).parent().find('.elementor-select-autocomplete-container')
                const possibleValues    = possibleSelectValues[ $(this).attr('id') ]           
                
                container.find('> div:not(.select-options)').addClass('hidden')	
                container.find('.select-options').html('')					
               
                if( val.length < parseInt( $(this).attr('data-limit') ))
                {                    
                    container.find('.chars-limit').removeClass('hidden')
                    return
                } 						
                
                let validValues = possibleValues.filter( el => {
                    
                    if( startWith ) return el.toLowerCase().startsWith( val.toLowerCase() )
                    return	el.toLowerCase().includes( val.toLowerCase() )
                    
                })

                validValues.forEach( el => {
                    container.find('.select-options').append(`<div class='autocomplete-row'>${el}</div>`)
                })	
                
                if( !validValues.length )
                {
                    container.find('.empty').removeClass('hidden')
                }

        })

        $( 'input[type="gh-select-autocomplete"]' ).on('focus', function(){

                $('.elementor-select-autocomplete-container').addClass('hidden')
                $(this).parent().find('.elementor-select-autocomplete-container').removeClass('hidden')

        })
        /* Close autosearch containers when clicking outside */
        $(document).click( function( e ) {           

                if( !$( e.target ).closest('.elementor-field-type-gh-select-autocomplete').length ) 
                {
                    $('.elementor-select-autocomplete-container').addClass('hidden')
                }        
        })

    });

})( jQuery );