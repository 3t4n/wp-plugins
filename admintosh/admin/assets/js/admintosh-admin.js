( function($) {
	"use strict";

	/**************************
	 * Tabs
	 * ************************/
	$( '.admintosh-tab' ).on( 'click', function(e) {
 		e.preventDefault();

		let $selector = $(this).attr('href'),
			$activateTab = localStorage.getItem("admintoshTabActivation"),
			$adminWrap = $('.admintosh-admin-wrap');

		//
		if( $activateTab != null ) {
			$adminWrap.removeClass( $activateTab.replace('#','') );
		}
		
		$adminWrap.find('.active').removeClass('active');
		$(this).parent().addClass('active');
		$('.admintosh-active').removeClass('admintosh-active').addClass('admintosh-hide');

		$adminWrap.addClass( $selector.replace('#','') );

		$($selector).removeClass('admintosh-hide').addClass('admintosh-active');
		// Cache active tab seclector
		localStorage.setItem("admintoshTabActivation", $selector);

	} );

	// On reload current tab active
	let activateTab = localStorage.getItem("admintoshTabActivation");
	
    if( activateTab ) {

    	$( '.admintosh-admin-wrap' ).find('.active').removeClass('active');
    	$('.admintosh-admin-wrap').addClass( activateTab.replace('#','') );
		$('[href="'+activateTab+'"]').parent().addClass('active');
		$('.admintosh-active').removeClass('admintosh-active').addClass('admintosh-hide');
        $(activateTab).removeClass('admintosh-hide').addClass('admintosh-active');
    }

	// Admin inner tab
	$( '.admintosh-inner-tab' ).on( 'click', function(e) {

		e.preventDefault();

		let $t = $(this),
			$pt = $t.closest('.admintosh-tab-content-wrap'),
			$selector = $t.attr('href'),
			$adminWrap = $t.closest('.admintosh-admin-wrap'),
			$innerTabWrap = $t.closest('.inner-tab');
		$innerTabWrap.find('.inner-tab-active').removeClass('inner-tab-active');
		$t.addClass( 'inner-tab-active' );
		

		$pt.find('.admintosh-inner-active').removeClass('admintosh-inner-active').addClass('admintosh-hide');

		$($selector).removeClass('admintosh-hide').addClass('admintosh-inner-active');
				

	} );

	$('.admintosh-admin-wrap').addClass('settings_tab');

	

	/**************************
	 * Color Picker
	 * *************************/
	$('.color-field').wpColorPicker();


	/**************************
	 * Media Upload
	 * ************************/
	var mediaUploader, t;

	$('.admintosh_image_upload_btn').on( 'click', function(e) {

		e.preventDefault();

		t = $(this).parent().find('.admintosh_background_image');

		if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose Image',
		  button: {
		  text: 'Choose Image'
		}, multiple: false });
		mediaUploader.on('select', function() {
		var attachment = mediaUploader.state().get('selection').first().toJSON();

			t.val( attachment.url )

		});
		mediaUploader.open();
	});

	/**************************
	 * conditional fields
	 * ************************/

    $('[data-condition]').each( function( i, item ) {

        let $item =  $(item).data('condition');
        
        $.each( $item, function( i, val ) {

            // type Switch 
            let s = $( '[name="admintosh_options['+i+']"]' );

            switch( s.attr('type') ) {

                case 'checkbox':
                    // On click
                    s.on( 'click', function() {
                
                        let t = $(this).is(':checked') == true ? 'yes' : '';

                        if( $(this).val() == t ) {
                            $(item).fadeIn();
                        } else {
                            $(item).fadeOut();
                        }
                        
                    } )
                    // On load 
                    if( s.is(':checked') != false ) {
                        $(item).fadeIn();
                    } else {
                        $(item).fadeOut();
                    }
                break;
                default:
                    // On change
                    s.on( 'change', function() {

                        if( $.inArray( $(this).val(), val ) != -1 ) {
                            $(item).fadeIn();
                        } else {
                            $(item).fadeOut();
                        }
                        
                    } )
                    // On load
                    if( $.inArray( s.val(), val ) != -1 ) {
                        $(item).fadeIn();
                    } else {
                        $(item).fadeOut();
                    }
                break;

            }
            
        } )

    } )


	/**************************
	 * Data Table
	 * ************************/

	$('#admintosh_login_history_tbl').DataTable( {
	    responsive: true,
	    scrollX: true
	} );

	
	/**************************
	 * select2
	 * ************************/
	$(document).ready(function() {
    	$('.input-select-multiple').select2();
	});


} )(jQuery);