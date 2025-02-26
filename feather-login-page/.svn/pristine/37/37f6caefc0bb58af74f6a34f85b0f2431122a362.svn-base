function convertToCamelCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}



function enableMobileMode(){

	feather_LoginBuilderApp.mobileMode = 'active';
	if (typeof(feather_LoginBuilderApp.options.mobileOptions) == 'undefined') {

		feather_LoginBuilderApp.options.mobileOptions = {
			formContOps:{
				fwidth: '305',
				margin:{
					top:'10',
					right:'1',
					bottom:'10',
					left:'1',
					unit:'%'
				},
				padding:{
					top:'10',
					right:'10',
					bottom:'10',
					left:'10',
					unit:'px'
				},
			}
		};

	}

	jQuery('.plbp_login-preview').css({
		'max-width': '350px',
		right:'35%',
		'max-height':'815px',
		margin:'5% auto',
		'background-color':'#fff',
	});	


	jQuery('#login').css({
		margin:'10% 1%',
		width: '305px',
		padding:'10px',
	});


	if (feather_LoginBuilderApp.options.updatedOptions.bgOps.bgImgOps.size == 'custom') {

		if (feather_LoginBuilderApp.options.updatedOptions.bgOps.bgImgOps.widU == 'vw') {
			newWidthInPercent = feather_LoginBuilderApp.options.updatedOptions.bgOps.bgImgOps.cWid+'%';
			jQuery('.plbp_login-preview').css({
				'background-size':newWidthInPercent,
			});
		}

	}


	mobileOptionsRender = {};

	mobileOptionsRender = JSON.stringify(feather_LoginBuilderApp.options.mobileOptions);
	mobileOptionsRender = JSON.parse(mobileOptionsRender);

	mergeDifferentObjProps(mobileOptionsRender,feather_LoginBuilderApp.options.updatedOptions);

	loadSavedOptions(mobileOptionsRender);

	

}


function disableMobileMode(){

	feather_LoginBuilderApp.mobileMode = 'inactive';

	

	jQuery('.plbp_login-preview').css({
		'max-width': '100%',
		right:'0',
		'max-height':'105vh',
		margin:'-4% 0 0 0',
	});	


	jQuery('#login').css({
		margin:'auto',
		width: 'auto',
		padding:'auto',
	});


	loadSavedOptions(feather_LoginBuilderApp.options.updatedOptions);

	

}

( function( $ ) {

	jQuery(document).ready(function($) {

		jQuery('#pbbtnRedo').css('background','#9e9e9e');
		jQuery('#pbbtnUndo').css('background','#9e9e9e');

		$("#wp-submit").on( "click", function() {
			return false;
		} );

		$("#loginform").attr( "autocomplete", "off" );
		$("#loginform").attr( "spellcheck", "off" );
		$("#loginform").attr( "autofill", "off" );
		
		$("#loginform input").attr( "autocomplete", "off" );

		jQuery( ".plpb_accordion_wrapper" ).accordion({
	        collapsible: true,
	        heightStyle: "content",
	     });

		$('.linkfieldBtn').on('click',function(ev){
		  var clickedEl = $(this);
		  if (clickedEl.is('span')) {
		    if (clickedEl.hasClass('linkedBtn') ) {
		      clickedEl.removeClass('linkedBtn');
		    }else{
		      clickedEl.addClass('linkedBtn');
		    }
		  }else{
		    clickedEl = $(this).parent('span');
		    if (clickedEl.hasClass('linkedBtn') ) {
		      clickedEl.removeClass('linkedBtn');
		    }else{
		      clickedEl.addClass('linkedBtn');
		    }
		  }
		});

		$('.linkedField').on('change', function(ev){
		  changedField = $(ev.target);
		  var changeUpdatedAttr = $(changedField).attr('data-changeupdated');
		  if (typeof(changeUpdatedAttr) == 'undefined') {
		    changeUpdatedAttr = 'false';
		  }
		  if (changeUpdatedAttr == 'true') {
		  }else{
		    linkedBtn = changedField.siblings('.linkfieldBtn');
		    if ( linkedBtn.hasClass('linkedBtn') ) {
		      changedFieldVal = $(changedField).val();
		      changedField.siblings('.linkedField').val(changedFieldVal);

		      var siblings = changedField.siblings('.linkedField');
		      $.each(siblings,function(i,v){
		        $(v).val(changedFieldVal);
		        $(v).attr('data-changeupdated','true');
		        $(v).trigger('change');
		      });
		    }
		  }
		   
		  $(changedField).attr('data-changeupdated','false'); 
		});


		$('.image_preview_close_btn').on('click',function(event){

			$(this).prev('img').attr('src',' ');

			$(this).parent('.image_preview_wrapper').css('display','none');
			$(this).parent('.image_preview_wrapper').siblings('.imageUploadFeild').val('').trigger('change');

		});


		var file_frame;
   		var buttonID;
		$('.image_upload_button').on('click', function( event ){

			try {
		    
				event.preventDefault();

			    var id = $(this).data('id');

			    // Create the media frame.
			    file_frame = wp.media.frames.file_frame = wp.media({
			      title: $( this ).data( 'uploader_title' ),
			      button: {
			        text: $( this ).data( 'uploader_button_text' ),
			      },
			      multiple: false  // Set to true to allow multiple files to be selected
			    });

			    // When an image is selected, run a callback.
			    file_frame.on( 'select', function() {
			      
			      // We set multiple to false so only get one image from the uploader
			      attachment = file_frame.state().get('selection').first().toJSON();
			      
			      $( '.upload_image_button'+id).val( attachment.url );

			      $( '.image_upload_preview'+id).attr( 'src', attachment.url );

			      $( '.image_upload_preview'+id).parent('.image_preview_wrapper').css('display','block');

			      $( '.upload_image_button'+id).trigger('change');
			     
			    });

			    // Finally, open the modal
			    file_frame.open();

			} catch(e) {
		    	// statements
		    	console.log(e);
			}
		    
		});


		$('.fontSelector').fontselect({
	        style: 'font-select',
	        placeholder: 'Select a font',
	        placeholderSearch: 'Search...',
	        lookahead: 1,
	        searchable: true,
	        localFontsUrl: '/fonts/' // End with a slash!
	      });


	  	$(document).on('change','.fontSearchField',function(){

		    var fontvalue = $(this).val();
		    fontvalue = convertToCamelCase(fontvalue);
		    var thisFsResults = $(this).parents('.font-select').find('.fs-results');
		    $(thisFsResults).scrollTop( 0 );

		    var scrollToEl = $(thisFsResults).find('li:contains("'+fontvalue+'")');


		    if ($(scrollToEl).length > 0 ) {
		    	var childPos = scrollToEl.offset();
		    	var parentPos = thisFsResults.parent().offset();
		    	var childOffset = {
		            top: childPos.top - parentPos.top,
		            left: childPos.left - parentPos.left
		        }
		        $(thisFsResults).scrollTop( childOffset.top-40 );
		    }

	  	});


	    try {
	      	if ( ! isUndoAvailable() ) {
	          	jQuery('#polpb_undo').css('background','#9e9e9e');
	      	}else{
	          	jQuery('#polpb_undo').css('background','#e3e3e3');
	      	}

	      	if ( ! isRedoAvailable() ) {
	          jQuery('#polpb_redo').css('background','#9e9e9e');
	      	}else{
	          jQuery('#polpb_redo').css('background','#e3e3e3');
	      	}
	    } catch(e) {
	      	// statements
	      	console.log(e);
	    }



	    jQuery("#pbbtnUndo").on('click', function(){

	    	if (isUndoAvailable() == true) {
	    		popb_undo();
	    	}

	    });


	    jQuery("#pbbtnRedo").on('click', function(){

	    	if (isRedoAvailable() == true) {
	    		popb_redo();
	    	}

	    });

	    jQuery('.featherHideOptions').on('click',function(){

	    	jQuery('.plbp_login-editor').css('display','none');
	    	jQuery('.plbp_login-preview').css('width','100%');

	    	jQuery(this).css('display','none');
	    	jQuery('.featherShowOptions').css('display','block');

	    });

	    jQuery('.featherShowOptions').on('click',function(){

	    	jQuery('.plbp_login-editor').css('display','block');
	    	jQuery('.plbp_login-preview').css('width','75%');

	    	jQuery(this).css('display','none');
	    	jQuery('.featherHideOptions').css('display','block');

	    });


	    jQuery('.desktopModeSwitch').on('click',function(){

	    	jQuery('.desktopModeSwitch').addClass('switchActive');
	    	jQuery('.phoneModeSwitch').removeClass('switchActive');

	    	disableMobileMode();

	    });

	    jQuery('.phoneModeSwitch').on('click',function(){

	    	jQuery('.phoneModeSwitch').addClass('switchActive');
	    	jQuery('.desktopModeSwitch').removeClass('switchActive');

	    	enableMobileMode();

	    });


	    setTimeout(function(){
	    	jQuery('#user_login').val(' ');
	    	jQuery('#user_pass').val('');
	    }, 700);

	    setTimeout(function(){
	    	jQuery('#user_login').val(' ');
	    	jQuery('#user_pass').val('');
	    }, 1700);


	});

})(jQuery);