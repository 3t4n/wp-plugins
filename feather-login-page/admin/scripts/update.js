feather_LoginBuilderApp.prevStateOption = false;
const setUpdateObject = (obj, path, val) => { 
    const keys = path.split('.');
    const lastKey = keys.pop();
    const lastObj = keys.reduce((obj, key) => 
        obj[key] = obj[key] || {}, 
        obj);
    if (typeof(lastObj) != 'undefined') {
        feather_LoginBuilderApp.prevStateOption = _.clone(lastObj[lastKey]);
        lastObj[lastKey] = val;
    }
    
    
};


function mergeDifferentObjProps(source,target){

	Object.keys(target).forEach(function (k) {

      if (typeof source[k] === 'undefined') {
        source[k] = target[k];
      }else{

        if (typeof(target[k]) == 'object' ) {
          Object.keys(target[k]).forEach(function (k2) {

            if (typeof source[k][k2] === 'undefined') {
              source[k][k2] = target[k][k2];
            }else{


              if (typeof(target[k][k2]) == 'object' ) {
                Object.keys(target[k][k2]).forEach(function (k3) {

                  if (typeof source[k][k2][k3] === 'undefined') {
                    source[k][k2][k3] = target[k][k2][k3];
                  }

                });
              }


            }

          });
        }

      }


    });

}


function updateModel(changedOptionName,changedValue){


	if (feather_LoginBuilderApp.mobileMode == 'active') {

		setUpdateObject(feather_LoginBuilderApp.options.mobileOptions, changedOptionName, changedValue);


		var thisChangeRedoProps = {
			changedOpName:changedOptionName,
			changedOpValue:feather_LoginBuilderApp.prevStateOption,
		}

		sendDataBackToUndoStack(thisChangeRedoProps);


	}else{

		setUpdateObject(feather_LoginBuilderApp.options.updatedOptions, changedOptionName, changedValue);

		var thisChangeRedoProps = {
			changedOpName:changedOptionName,
			changedOpValue:feather_LoginBuilderApp.prevStateOption,
		}

		sendDataBackToUndoStack(thisChangeRedoProps);
	}

		

}

function showRelatedOptionsOnChange(changedOptionName,changedValue){

		


	// Bg Ops Starts Here

		if (changedOptionName == 'bgOps.bgType') {

			jQuery('.bgColorOpContainer').css('display','none');
			jQuery('.bgGradOpContainer').css('display','none');
			jQuery('.bgImageOpsContainer').css('display','none');

			if (changedValue == 'solid') { jQuery('.bgColorOpContainer').css('display','block'); }

			if (changedValue == 'gradient') { jQuery('.bgGradOpContainer').css('display','block'); }

			if (changedValue == 'image') { jQuery('.bgImageOpsContainer').css('display','block'); }

		}

		if (changedOptionName == 'bgOps.bgImage') {

			jQuery( '.bgImgOpsExtra').css('display','none');

			if (changedValue != '') {
				jQuery( '.bgImgOpsExtra').css('display','block');
			}

		}


		if (changedOptionName == 'bgOps.bgImgOps.pos') {

			jQuery( '.bgImgCustomPositionDiv').css('display','none');

			if (changedValue == 'custom') {
				jQuery( '.bgImgCustomPositionDiv').css('display','block');
			}

		}


		if (changedOptionName == 'bgOps.bgImgOps.size') {

			jQuery( '.bgImgCustomSizeDiv').css('display','none');

			if (changedValue == 'custom') {
				jQuery( '.bgImgCustomSizeDiv').css('display','block');
			}

		}

		if (changedOptionName == 'bgOps.bgGradient.bgGrType') {

			jQuery( '.bgGradientAngleContainer').css('display','none');
			jQuery( '.bgGradientPosContainer').css('display','none');

			if (changedValue == 'linear') {
				jQuery( '.bgGradientAngleContainer').css('display','block');
			}

			if (changedValue == 'radial') {
				jQuery( '.bgGradientPosContainer').css('display','block');
			}

		}

	// Bg Ops Ends Here


	// Form Container Starts Here 

		if (changedOptionName == 'formContBgOps.fbgType') {

			jQuery('.fbgColorOpContainer').css('display','none');
			jQuery('.fbgGradOpContainer').css('display','none');
			jQuery('.fbgImageOpsContainer').css('display','none');

			if (changedValue == 'solid') { jQuery('.fbgColorOpContainer').css('display','block'); }

			if (changedValue == 'gradient') { jQuery('.fbgGradOpContainer').css('display','block'); }

			if (changedValue == 'image') { jQuery('.fbgImageOpsContainer').css('display','block'); }

		}

		if (changedOptionName == 'formContBgOps.fbgImage') {

			jQuery( '.fbgImgOpsExtra').css('display','none');

			if (changedValue != '') {
				jQuery( '.fbgImgOpsExtra').css('display','block');
			}

		}


		if (changedOptionName == 'formContBgOps.fbgImgOps.fpos') {

			jQuery( '.fbgImgCustomPositionDiv').css('display','none');

			if (changedValue == 'custom') {
				jQuery( '.fbgImgCustomPositionDiv').css('display','block');
			}

		}


		if (changedOptionName == 'formContBgOps.fbgImgOps.fsize') {

			jQuery( '.fbgImgCustomSizeDiv').css('display','none');

			if (changedValue == 'custom') {
				jQuery( '.fbgImgCustomSizeDiv').css('display','block');
			}

		}

		if (changedOptionName == 'formContBgOps.fbgGradient.fbgGrType') {

			jQuery( '.fbgGradientAngleContainer').css('display','none');
			jQuery( '.fbgGradientPosContainer').css('display','none');

			if (changedValue == 'linear') {
				jQuery( '.fbgGradientAngleContainer').css('display','block');
			}

			if (changedValue == 'radial') {
				jQuery( '.fbgGradientPosContainer').css('display','block');
			}

		}

	// Form Container Ends Here 



	// Button Container Starts Here 

		if (changedOptionName == 'formButtonBg.bbgType') {

			jQuery('.bbgColorOpContainer').css('display','none');
			jQuery('.bbgGradOpContainer').css('display','none');

			if (changedValue == 'solid') { jQuery('.bbgColorOpContainer').css('display','block'); }

			if (changedValue == 'gradient') { jQuery('.bbgGradOpContainer').css('display','block'); }

		}



		if (changedOptionName == 'formButtonBg.bbgGradient.bbgGrType') {

			jQuery( '.bbgGradientAngleContainer').css('display','none');
			jQuery( '.bbgGradientPosContainer').css('display','none');

			if (changedValue == 'linear') {
				jQuery( '.bbgGradientAngleContainer').css('display','block');
			}

			if (changedValue == 'radial') {
				jQuery( '.bbgGradientPosContainer').css('display','block');
			}

		}

	// Button Container Ends Here 


}


function loadSavedOptions(options){
	
	
	jQuery.each(options,function(index, value) {


		var thisOptionParent = index;
		jQuery.each(value,function(childIndex, childValue) {
			
			if (typeof(childValue) == 'object') {

				jQuery.each(childValue,function(childIndex2, childValue2) {

					jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'.'+childIndex2+'"]').val(childValue2);

					if (childIndex2.indexOf('Color') != -1) {
						jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'.'+childIndex2+'"]').spectrum( 'set', childValue2 );
					}

					if (childIndex2.indexOf('color') != -1) {
						jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'.'+childIndex2+'"]').spectrum( 'set', childValue2 );
					}

					var thisOptionName = thisOptionParent+'.'+childIndex+'.'+childIndex2;
					var thisOptionValue = childValue2;
					showRelatedOptionsOnChange(thisOptionName,thisOptionValue);

				});

			}else{


				if (typeof(childValue) == 'undefined') {
					childValue = '';
				}

				jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'"]').val(childValue);

				if (childIndex == 'logoImage') {
					jQuery( '.image_upload_preview01').attr( 'src', childValue );
					jQuery( '.image_upload_preview01').parent('.image_preview_wrapper').css('display','block');
				}

				if (childIndex == 'bgImage') {
					jQuery( '.image_upload_preview02').attr( 'src', childValue );
					jQuery( '.image_upload_preview02').parent('.image_preview_wrapper').css('display','block');
				}

				if (childIndex == 'fbgImage') {
					jQuery( '.image_upload_preview03').attr( 'src', childValue );
					jQuery( '.image_upload_preview03').parent('.image_preview_wrapper').css('display','block');
				}

				if (childIndex.indexOf('color') != -1) {
					jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'"]').spectrum( 'set', childValue );
				}

				if (childIndex.indexOf('Color') != -1) {
					jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'"]').spectrum( 'set', childValue );
				}


				if (childIndex.indexOf('fontFamily') != -1) {


					if (childValue != '') {
						
						jQuery('[data-optname="'+thisOptionParent+'.'+childIndex+'"]')
						.siblings('.font-select')
						.children('a')
						.children('.font_select_placeholder')
						.html( childValue.replace(/\+/g, ' ') );

						
						WebFont.load({
							google: { 
								families: [ childValue.replace(/\+/g, ' ') +':300,400,700' ]
							},
							loading: function() {
								console.log("Fonts are being loaded");
							},
							active: function() {
								console.log("Fonts have been rendered")
							}
				        });

					}
						
				}

				var thisOptionName = thisOptionParent+'.'+childIndex;
				var thisOptionValue = childValue;
				showRelatedOptionsOnChange(thisOptionName,thisOptionValue);

			}

				
		});

		
	});


	logoRender(options.logo);
	pageBgRender(options.bgOps);
	//formAlignmentRender(options.alignment);
	formBgRender(options.formContBgOps);
	formStylesRender(options.formContOps);
	labelStylesRender(options.formLabels);
	inputStylesRender(options.formInput);
	buttonBgRender(options.formButtonBg);
	buttonStylesRender(options.formButton);
	footerLinksStylesRender(options.footerLinks);
	formTextMessagesRender(options.formTexts);
	formScriptsRender(options.scripts);
	formRecaptchaRender(options.recaptcha);



}


( function( $ ) {

	jQuery(document).ready(function($) {
		
		$('.login_options_panel input, .login_options_panel select, .login_options_panel textarea').on('change',function(){
			var changedValue = $(this).val();
			var changedOptionName = $(this).attr('data-optname');

			if (changedOptionName != '') {

				updateModel(changedOptionName,changedValue);

				if (feather_LoginBuilderApp.mobileMode == 'active') {
					renderChangeMobile(changedOptionName,changedValue);
				}else{
					renderChange(changedOptionName,changedValue);
				}
				

				// addToUndoRedo(changedOptionName,changedValue);

				showRelatedOptionsOnChange(changedOptionName,changedValue);
				
			}

				

		});

	});

})(jQuery);