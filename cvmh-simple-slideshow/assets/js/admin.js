jQuery( document ).ready( function( $ ) {
    $( '#cvmh_slideshow' ).addClass( 'cvmh_postbox no_box' );
    
    // image
    var cvmhFrame,
        cvmhField = $( '#slide-img' ),
        cvmhAddImgLink = cvmhField.find( '#upload_image_button' ),
        cvmhHasImgContainer = cvmhField.find( '.has-image' ),
        cvmhImg = cvmhHasImgContainer.find( 'img' ),
        cvmhImgIdInput = cvmhField.find( '#slide_image' ),
        cvmhNoImgContainer = cvmhField.find( '.no-image' ),
        cvmhDelImgLink = cvmhField.find( '.cvmh-button-delete' );

    if ( cvmhImgIdInput.val() !== '' ) {
        cvmhHasImgContainer.show();
        cvmhNoImgContainer.hide();
    }
        
    // ADD IMAGE LINK
    cvmhAddImgLink.on( 'click', function( event ) {
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( cvmhFrame ) {
            cvmhFrame.open();
            return;
        }

        // Create a new media frame
        cvmhFrame = wp.media( {
            title: cvmhTranslate.select,
            button: {text: cvmhTranslate.use_selection},
            library: {type: 'image'},
            multiple: false
        } );


        // When an image is selected in the media frame...
        cvmhFrame.on( 'select', function() {

            // Get media attachment details from the frame state
            var attachment = cvmhFrame.state().get( 'selection' ).first().toJSON();

            // Send the attachment URL to our custom image input field.
            cvmhImg.attr( 'src', attachment.sizes.medium.url );

            // Send the attachment id to our hidden input
            cvmhImgIdInput.val( attachment.id );

            cvmhHasImgContainer.show();
            cvmhNoImgContainer.hide();

        } );

        // Finally, open the modal on click
        cvmhFrame.open();
    } );

    // REMOVE IMAGE
    cvmhDelImgLink.on( 'click', function( event ) {
        event.preventDefault();
        
        cvmhImg.attr( 'src', '' );
        cvmhImgIdInput.val( '' );
        
        cvmhHasImgContainer.hide();
        cvmhNoImgContainer.show();
    } );
    
    // SUBMIT FORM
    $(document).on('submit', '#post', function(){
        $error = false;
        $form = $(this);

        $('.field.required').each(function(){
            if( $(this).find('input[type="text"], input[type="email"], input[type="number"], input[type="hidden"], textarea').val() == "" ) {
                
                $(this).closest('.field').addClass('error');
                
                $form.siblings('#message').remove();
                $form.before('<div id="message" class="error"><p>Validation échouée. Un ou plusieurs champs sont requis.</p></div>');

                // hide ajax stuff on submit button
                // remove disabled classes
                $('#submitdiv').find('.disabled').removeClass('disabled');
                $('#submitdiv').find('.button-disabled').removeClass('button-disabled');
                $('#submitdiv').find('.button-primary-disabled').removeClass('button-primary-disabled');

                // remove spinner
                $('#submitdiv .spinner').removeClass('is-active');
                $error = true;
                return false;
            }
        } );
        
        if ( $error ) {
            return false;
        } else {
            return true;
        }
            
    } );
    
    // SORT
    if ( $( 'input[name="post_type"]' ).val() === 'cvmh_slideshow' && $( 'input[name="post_status"]' ).val() !== 'trash' ) {       
        $('table.posts #the-list').sortable({
            'items': 'tr',
            'axis': 'y',
            'helper': fixHelper,
            'update' : function(e, ui) {
                $.post( ajaxurl, {
                    action: 'update-menu-order',
                    order: $('#the-list').sortable('serialize')
                });
            }
        });

        var fixHelper = function(e, ui) {
            ui.children().children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };
    }
    
    // SETTINGS
    $( '.cvmh-slideshow-fields' ).on( 'click', '.cvmh-field-delete', function( event ){
        event.preventDefault();
        $( this ).parent().remove();
    });
    
    $( '.cvmh-slideshow-fields' ).on( 'click', '.cvmh-field-add', function( event ){
        event.preventDefault();
        var clone = $( this ).next().clone();
        var count = $( '.cvmh-slideshow-field' ).length;
        clone.find( 'label' ).attr( 'for', 'field_' + count ).html( count + '.' );
        clone.find( 'input' ).attr( 'id', 'field_' + count ).attr( 'name', 'options[fields][]' );
        clone.removeClass( 'to-clone' );
        $( this ).before( clone );
    });
    
} );