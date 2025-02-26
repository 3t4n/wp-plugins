// it make appears the "How to use" popup
jQuery( document ).ready( function( $ ) {
    $( '#aidm-how-to-use' ).on( 'click', ( e ) => {
        e.preventDefault();

        const {
            ajaxUrl,
            errorMessage 

        } = aidmHelpPanelData;

        // request php file
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                action: 'aidm_load_help_panel'
            },
            success: ( htmlContent ) => {

                $( htmlContent )
                .appendTo( 'body' )
                .hide()
                .fadeIn();

                $( '.aidm-help-modal' ).on( 'click', ( e ) => {
                    const helpPanelContainer = $( '.aidm-help-modal' );
                    const closeIcon = $( '#aidm-close-help' );

                    if ( 
                        e.target == helpPanelContainer[0]
                        || e.target == closeIcon[0]
                    ) {
                        helpPanelContainer.fadeOut( () => {
                            helpPanelContainer.remove() 
                        });
                    }
                });
            },
            error: () => {
                alert( errorMessage );
            }
        })

    });
});
