

function logoRender(options) {

	var loginLogo = options;

	
	if (loginLogo['hideLogo'] == 'true') {
		jQuery('.login h1').css('display', 'none' );
	}else{
		jQuery('.login h1').css('display', 'block' );
	}

	if (loginLogo['logoImage'] != '') {
		jQuery('.login h1 a').css('background-image', 'url('+loginLogo['logoImage']+')' );
	}

	if (loginLogo['logoImageWidth'] != '') {
		jQuery('.login h1 a').css('background-size', loginLogo['logoImageWidth']+'px' );
		jQuery('.login h1 a').css('width', loginLogo['logoImageWidth']+'px' );
	}else{
		jQuery('.login h1 a').css('background-size', '84px' );
		jQuery('.login h1 a').css('width', '84px' );
	}

	if (loginLogo['logoImageHeight'] != '') {
		jQuery('.login h1 a').css('height', loginLogo['logoImageHeight']+'px' );
	}else{
		jQuery('.login h1 a').css('height', '84px' );
	}

	if (loginLogo['logoAlignment'] != '') {
		jQuery('.login h1').css('text-align', loginLogo['logoAlignment'] );
	}

	if (loginLogo['logoLink'] != '') {
		jQuery('.login h1 a').attr('href', loginLogo['logoLink'] );
	}

	if (loginLogo['logoTitle'] != '') {
		jQuery('.login h1 a').attr('title', loginLogo['logoTitle'] );
		jQuery('.login h1 a').text( loginLogo['logoTitle'] );
	}


}


function pageBgRender(options){

	var loginPageBg = options;

	if (loginPageBg['bgType'] == 'solid') {
		if (loginPageBg['bgColor'] != '') {
			jQuery('.plbp_login-preview , body.login').css('background-color', loginPageBg['bgColor'] );
			jQuery('.plbp_login-preview , body.login').css('background', loginPageBg['bgColor'] );
		}
	}

	if (loginPageBg['bgType'] == 'image') {

		if (loginPageBg['bgImage'] != '') {
			jQuery('.plbp_login-preview , body.login').css('background-image', 'url('+loginPageBg['bgImage']+')' );
			jQuery('.plbp_login-preview , body.login').css('background-color', 'transparent' );
		}

		if (loginPageBg['bgImgOps']['pos'] != '') {

			if (loginPageBg['bgImgOps']['pos'] == 'custom') {

				jQuery('.plbp_login-preview , body.login').css('background-position-x', loginPageBg['bgImgOps']['xPos']+loginPageBg['bgImgOps']['xPosU'] );

				jQuery('.plbp_login-preview , body.login').css('background-position-y', loginPageBg['bgImgOps']['yPos']+loginPageBg['bgImgOps']['yPosU'] );

			}else{
				jQuery('.plbp_login-preview , body.login').css('background-position', loginPageBg['bgImgOps']['pos'] );
			}

		}

		if (loginPageBg['bgImgOps']['rep'] != '') {
			jQuery('.plbp_login-preview , body.login').css('background-repeat', loginPageBg['bgImgOps']['rep'] );
		}

		if (loginPageBg['bgImgOps']['size'] != '') {

			if (loginPageBg['bgImgOps']['size'] == 'custom') {

				jQuery('.plbp_login-preview , body.login').css('background-size', loginPageBg['bgImgOps']['cWid']+loginPageBg['bgImgOps']['widU'] );

			}else{
				jQuery('.plbp_login-preview , body.login').css('background-size', loginPageBg['bgImgOps']['size'] );
			}
		}


	}

	if (loginPageBg['bgType'] == 'gradient') {

		if (loginPageBg['bgGradient']['bgGrType'] == 'linear') {

			jQuery('.plbp_login-preview , body.login').css(
				'background',
				'linear-gradient('+
					loginPageBg['bgGradient']['bgGrAngle']+'deg,'+
					loginPageBg['bgGradient']['bgGr1Color']+' '+loginPageBg['bgGradient']['bgGr1Loc']+'%,'+
					loginPageBg['bgGradient']['bgGr2Color']+' '+loginPageBg['bgGradient']['bgGr2Loc']+'%'+
				')'
			);

		}

		if (loginPageBg['bgGradient']['bgGrType'] == 'radial') {

			jQuery('.plbp_login-preview , body.login').css(
				'background',
				'radial-gradient(at '+
					loginPageBg['bgGradient']['bgGrPos']+','+
					loginPageBg['bgGradient']['bgGr1Color']+' '+loginPageBg['bgGradient']['bgGr1Loc']+'%,'+
					loginPageBg['bgGradient']['bgGr2Color']+' '+loginPageBg['bgGradient']['bgGr2Loc']+'%'+
				')'
			);
			
		}
			

	}


}



function formAlignmentRender(options){

	if (options['alignX'] != '' && options['alignX'] != 'default') {

		jQuery('#login').css('left','unset');
		jQuery('#login').css('right','unset');
		jQuery('#login').css('position','absolute');

		if (options['alignX'] == 'left') {
			jQuery('#login').css('left','0');
		}

		if (options['alignX'] == 'right') {
			jQuery('#login').css('right','0');
		}

		if (options['alignX'] == 'center') {
			jQuery('#login').css('position','unset');
		}

	}


	if (options['alignY'] != '' && options['alignY'] != 'default') {

		jQuery('#login').css('top','unset');
		jQuery('#login').css('bottom','unset');
		jQuery('#login').css('position','absolute');

		if (options['alignY'] == 'top') {
			jQuery('#login').css('top','0');
		}

		if (options['alignY'] == 'bottom') {
			jQuery('#login').css('bottom','0');
		}

		if (options['alignY'] == 'middle') {
			jQuery('#login').css('position','unset');
		}

	}

}



function formBgRender(options){

	jQuery('#loginform').css('background', 'transparent' );
	jQuery('#loginform').css('border', 'none' );
	jQuery('#loginform').css('box-shadow', 'none' );

	if (options['fbgType'] == '') {
		jQuery('#login').css('background-color', '#fff' );
		jQuery('#login').css('background', '#fff' );
	}

	if (options['fbgType'] == 'solid') {
		if (options['fbgColor'] != '') {
			jQuery('#login').css('background-color', options['fbgColor'] );
			jQuery('#login').css('background', options['fbgColor'] );
		}else{
			jQuery('#login').css('background-color', '#fff' );
			jQuery('#login').css('background', '#fff' );
		}
	}

	if (options['fbgType'] == 'image') {

		if (options['fbgImage'] != '') {
			jQuery('#login').css('background-image', 'url('+options['fbgImage']+')' );
			jQuery('#login').css('background-color', 'transparent' );
		}

		if (options['fbgImgOps']['fpos'] != '') {

			if (options['fbgImgOps']['fpos'] == 'custom') {

				jQuery('#login').css('background-position-x', options['fbgImgOps']['fxPos']+options['fbgImgOps']['xPosU'] );

				jQuery('#login').css('background-position-y', options['fbgImgOps']['fyPos']+options['fbgImgOps']['fyPosU'] );

			}else{
				jQuery('#login').css('background-position', options['fbgImgOps']['fpos'] );
			}

		}

		if (options['fbgImgOps']['frep'] != '') {
			jQuery('#login').css('background-repeat', options['fbgImgOps']['frep'] );
		}


		if (options['fbgImgOps']['fsize'] != '') {

			if (options['fbgImgOps']['fsize'] == 'custom') {

				jQuery('#login').css('background-size', options['fbgImgOps']['fcWid']+options['fbgImgOps']['fwidU'] );

			}else{
				jQuery('#login').css('background-size', options['fbgImgOps']['fsize'] );
			}
		}


	}

	if (options['fbgType'] == 'gradient') {

		if (options['fbgGradient']['fbgGrType'] == 'linear') {

			jQuery('#login').css(
				'background',
				'linear-gradient('+
					options['fbgGradient']['fbgGrAngle']+'deg,'+
					options['fbgGradient']['fbgGr1Color']+' '+options['fbgGradient']['fbgGr1Loc']+'%,'+
					options['fbgGradient']['fbgGr2Color']+' '+options['fbgGradient']['fbgGr2Loc']+'%'+
				')'
			);

		}

		if (options['fbgGradient']['fbgGrType'] == 'radial') {

			jQuery('#login').css(
				'background',
				'radial-gradient(at '+
					options['fbgGradient']['fbgGrPos']+','+
					options['fbgGradient']['fbgGr1Color']+' '+options['fbgGradient']['fbgGr1Loc']+'%,'+
					options['fbgGradient']['fbgGr2Color']+' '+options['fbgGradient']['fbgGr2Loc']+'%'+
				')'
			);
			
		}
			

	}


}


function formStylesRender(options){

	if (options['fwidth'] != '') {
		jQuery('#login').css('width',options['fwidth']+'px');
	}else{
		jQuery('#login').css('width','320px');
	}

	if (options['fheight'] != '') {
		jQuery('#loginform').css('min-height',options['fheight']+'px');
	}else{
		jQuery('#loginform').css('min-height','auto');
	}


	if (options['border']['color'] != '') {
		jQuery('#login').css('border-color',options['border']['color']);
	}else{
		jQuery('#login').css('border-color','#ccd0d4');
	}

	if (options['border']['style'] != '') {
		jQuery('#login').css('border-style',options['border']['style']);
	}else{
		jQuery('#login').css('border-style','solid');
	}



	if (options['border']['top'] != '') {
		jQuery('#login').css('border-top-width',options['border']['top']+'px');
	}else{
		jQuery('#login').css('border-top-width','1px');
	}

	if (options['border']['right'] != '') {
		jQuery('#login').css('border-right-width',options['border']['right']+'px');
	}else{
		jQuery('#login').css('border-right-width','1px');
	}

	if (options['border']['bottom'] != '') {
		jQuery('#login').css('border-bottom-width',options['border']['bottom']+'px');
	}else{
		jQuery('#login').css('border-bottom-width','1px');
	}

	if (options['border']['left'] != '') {
		jQuery('#login').css('border-left-width',options['border']['left']+'px');
	}else{
		jQuery('#login').css('border-left-width','1px');
	}



	if (options['borderRadius']['tleft'] != '') {
		jQuery('#login').css('border-top-left-radius',options['borderRadius']['tleft']+'px');
	}else{
		jQuery('#login').css('border-top-left-radius','asd');
	}

	if (options['borderRadius']['tright'] != '') {
		jQuery('#login').css('border-top-right-radius',options['borderRadius']['tright']+'px');
	}else{
		jQuery('#login').css('border-top-right-radius','asd');
	}

	if (options['borderRadius']['bleft'] != '') {
		jQuery('#login').css('border-bottom-left-radius',options['borderRadius']['bleft']+'px');
	}else{
		jQuery('#login').css('border-bottom-left-radius','asd');
	}

	if (options['borderRadius']['bright'] != '') {
		jQuery('#login').css('border-bottom-right-radius',options['borderRadius']['bright']+'px');
	}else{
		jQuery('#login').css('border-bottom-right-radius','asd');
	}


	if (options['shadow']['posV'] != '' && options['shadow']['posH'] != '') {
		jQuery('#login').css('box-shadow', options['shadow']['color']+' '+ options['shadow']['posH']+'px '+ options['shadow']['posV']+'px '+ options['shadow']['blur']+'px ');
	}else{
		jQuery('#login').css('box-shadow','rgba(0, 0, 0, 0.04) 0px 1px 3px');
	}




	if (options['margin']['top'] != '') {
		jQuery('#login').css('margin-top', options['margin']['top'] + options['margin']['unit'] );
	}else{
		jQuery('#login').css('margin-top','8%');
	}

	if (options['margin']['right'] != '') {
		jQuery('#login').css('margin-right', options['margin']['right'] + options['margin']['unit'] );
		jQuery('#login').css('display', 'inline-block' );
	}else{
		jQuery('#login').css('margin-right','auto');
		jQuery('#login').css('display', 'block' );
	}

	if (options['margin']['bottom'] != '') {
		jQuery('#login').css('margin-bottom', options['margin']['bottom'] + options['margin']['unit'] );
	}else{
		jQuery('#login').css('margin-bottom','0');
	}

	if (options['margin']['left'] != '') {
		jQuery('#login').css('margin-left', options['margin']['left'] + options['margin']['unit'] );
		jQuery('#login').css('display', 'inline-block' );
	}else{
		jQuery('#login').css('margin-left','auto');
		jQuery('#login').css('display', 'block' );
	}




	if (options['padding']['top'] != '') {
		jQuery('#login').css('padding-top', options['padding']['top'] + options['padding']['unit'] );
	}else{
		jQuery('#login').css('padding-top','15px');
	}

	if (options['padding']['right'] != '') {
		jQuery('#login').css('padding-right', options['padding']['right'] + options['padding']['unit'] );
	}else{
		jQuery('#login').css('padding-right','15px');
	}

	if (options['padding']['bottom'] != '') {
		jQuery('#login').css('padding-bottom', options['padding']['bottom'] + options['padding']['unit'] );
	}else{
		jQuery('#login').css('padding-bottom','15px');
	}

	if (options['padding']['left'] != '') {
		jQuery('#login').css('padding-left', options['padding']['left'] + options['padding']['unit'] );
	}else{
		jQuery('#login').css('padding-left','15px');
	}



}


function labelStylesRender(options){

	if (options['textColor'] != '') {
		jQuery('#loginform label').css('color', options['textColor']);
	}

	if (options['textSize'] != '') {
		jQuery('#loginform label').css('font-size', options['textSize']+options['textSizeU']);
	}else{
		jQuery('#loginform label').css('font-size', '14px');
	}

	if (options['fontFamily'] != '') {
		jQuery('#loginform label').css('font-family', options['fontFamily'].replace(/\+/g, ' ') );
	}else{
		jQuery('#loginform label').css('font-family', '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif');
	}



	if (options['margin']['top'] != '') {
		jQuery('#loginform label').css('margin-top', options['margin']['top'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform label').css('margin-top','0');
	}

	if (options['margin']['right'] != '') {
		jQuery('#loginform label').css('margin-right', options['margin']['right'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform label').css('margin-right','0');
	}

	if (options['margin']['bottom'] != '') {
		jQuery('#loginform label').css('margin-bottom', options['margin']['bottom'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform label').css('margin-bottom','3px');
	}

	if (options['margin']['left'] != '') {
		jQuery('#loginform label').css('margin-left', options['margin']['left'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform label').css('margin-left','0');
	}


}


function inputStylesRender(options){


	if (options['bgColor'] != '') {
		jQuery('#loginform .input').css('background', options['bgColor']);
		jQuery('#loginform input[type=checkbox]').css('background', options['bgColor']);
	}

	if (options['textColor'] != '') {
		jQuery('#loginform .input').css('color', options['textColor']);
		jQuery('#loginform input[type=checkbox]').css('color', options['textColor']);
	}

	if (options['fontFamily'] != '') {
		jQuery('#loginform .input').css('font-family', options['fontFamily'].replace(/\+/g, ' ') );
	}


	if (options['textSize'] != '') {
		jQuery('#loginform .input').css('font-size', options['textSize'] + options['textSizeU']);
	}


	if (options['border']['color'] != '') {
		jQuery('#loginform .input').css('border-color',options['border']['color']);
	}else{
		jQuery('#loginform .input').css('border-color','asd');
	}

	if (options['border']['style'] != '') {
		jQuery('#loginform .input').css('border-style',options['border']['style']);
	}else{
		jQuery('#loginform .input').css('border-style','asd');
	}


	if (options['border']['top'] != '') {
		jQuery('#loginform .input').css('border-top-width',options['border']['top']+'px');
	}else{
		jQuery('#loginform .input').css('border-top-width','asd');
	}

	if (options['border']['right'] != '') {
		jQuery('#loginform .input').css('border-right-width',options['border']['right']+'px');
	}else{
		jQuery('#loginform .input').css('border-right-width','asd');
	}

	if (options['border']['bottom'] != '') {
		jQuery('#loginform .input').css('border-bottom-width',options['border']['bottom']+'px');
	}else{
		jQuery('#loginform .input').css('border-bottom-width','asd');
	}

	if (options['border']['left'] != '') {
		jQuery('#loginform .input').css('border-left-width',options['border']['left']+'px');
	}else{
		jQuery('#loginform .input').css('border-left-width','asd');
	}



	if (options['borderRadius']['tleft'] != '') {
		jQuery('#loginform .input').css('border-top-left-radius',options['borderRadius']['tleft']+'px');
	}else{
		jQuery('#loginform .input').css('border-top-left-radius','asd');
	}

	if (options['borderRadius']['tright'] != '') {
		jQuery('#loginform .input').css('border-top-right-radius',options['borderRadius']['tright']+'px');
	}else{
		jQuery('#loginform .input').css('border-top-right-radius','asd');
	}

	if (options['borderRadius']['bleft'] != '') {
		jQuery('#loginform .input').css('border-bottom-left-radius',options['borderRadius']['bleft']+'px');
	}else{
		jQuery('#loginform .input').css('border-bottom-left-radius','asd');
	}

	if (options['borderRadius']['bright'] != '') {
		jQuery('#loginform .input').css('border-bottom-right-radius',options['borderRadius']['bright']+'px');
	}else{
		jQuery('#loginform .input').css('border-bottom-right-radius','asd');
	}






	if (options['margin']['top'] != '') {
		jQuery('#loginform .input').css('margin-top', options['margin']['top'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform .input').css('margin-top','0');
	}

	if (options['margin']['right'] != '') {
		jQuery('#loginform .input').css('margin-right', options['margin']['right'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform .input').css('margin-right','0');
	}

	if (options['margin']['bottom'] != '') {
		jQuery('#loginform .input').css('margin-bottom', options['margin']['bottom'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform .input').css('margin-bottom','16px');
	}

	if (options['margin']['left'] != '') {
		jQuery('#loginform .input').css('margin-left', options['margin']['left'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform .input').css('margin-left','0');
	}




	if (options['padding']['top'] != '') {
		jQuery('#loginform .input').css('padding-top', options['padding']['top'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform .input').css('padding-top','3');
	}

	if (options['padding']['right'] != '') {
		jQuery('#loginform .input').css('padding-right', options['padding']['right'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform .input').css('padding-right','5');
	}

	if (options['padding']['bottom'] != '') {
		jQuery('#loginform .input').css('padding-bottom', options['padding']['bottom'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform .input').css('padding-bottom','3');
	}

	if (options['padding']['left'] != '') {
		jQuery('#loginform .input').css('padding-left', options['padding']['left'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform .input').css('padding-left','5');
	}






	if (options['shadow']['posV'] != '' && options['shadow']['posH'] != '') {
		jQuery('#loginform .input').css('box-shadow', options['shadow']['color']+' '+ options['shadow']['posH']+'px '+ options['shadow']['posV']+'px '+ options['shadow']['blur']+'px ');
	}else{
		jQuery('#loginform .input').css('box-shadow','none');
	}


}



function buttonStylesRender(options){



	if (options['textColor'] != '') {
		jQuery('#loginform #wp-submit').css('color', options['textColor']);
	}


	if (options['fontFamily'] != '') {
		jQuery('#loginform #wp-submit').css('font-family', options['fontFamily'].replace(/\+/g, ' ') );
	}


	if (options['textSize'] != '') {
		jQuery('#loginform #wp-submit').css('font-size', options['textSize'] + options['textSizeU']);
	}


	if (typeof(options['width']) == 'undefined') { options['width'] = 'default'; }

	if (options['width'] != '') {

		if (options['width'] == 'default') {
			jQuery('#loginform #wp-submit').css('width', 'auto' );
		}else{
			jQuery('#loginform #wp-submit').css('width', '100%' );
		}
		
	}


	if (options['border']['color'] != '') {
		jQuery('#loginform #wp-submit').css('border-color',options['border']['color']);
	}else{
		jQuery('#loginform #wp-submit').css('border-color','asd');
	}

	if (options['border']['style'] != '') {
		jQuery('#loginform #wp-submit').css('border-style',options['border']['style']);
	}else{
		jQuery('#loginform #wp-submit').css('border-style','asd');
	}


	if (options['border']['top'] != '') {
		jQuery('#loginform #wp-submit').css('border-top-width',options['border']['top']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-top-width','asd');
	}

	if (options['border']['right'] != '') {
		jQuery('#loginform #wp-submit').css('border-right-width',options['border']['right']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-right-width','asd');
	}

	if (options['border']['bottom'] != '') {
		jQuery('#loginform #wp-submit').css('border-bottom-width',options['border']['bottom']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-bottom-width','asd');
	}

	if (options['border']['left'] != '') {
		jQuery('#loginform #wp-submit').css('border-left-width',options['border']['left']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-left-width','asd');
	}



	if (options['borderRadius']['tleft'] != '') {
		jQuery('#loginform #wp-submit').css('border-top-left-radius',options['borderRadius']['tleft']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-top-left-radius','asd');
	}

	if (options['borderRadius']['tright'] != '') {
		jQuery('#loginform #wp-submit').css('border-top-right-radius',options['borderRadius']['tright']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-top-right-radius','asd');
	}

	if (options['borderRadius']['bleft'] != '') {
		jQuery('#loginform #wp-submit').css('border-bottom-left-radius',options['borderRadius']['bleft']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-bottom-left-radius','asd');
	}

	if (options['borderRadius']['bright'] != '') {
		jQuery('#loginform #wp-submit').css('border-bottom-right-radius',options['borderRadius']['bright']+'px');
	}else{
		jQuery('#loginform #wp-submit').css('border-bottom-right-radius','asd');
	}




	if (options['shadow']['posV'] != '' && options['shadow']['posH'] != '') {
		jQuery('#loginform #wp-submit').css('box-shadow', options['shadow']['color']+' '+ options['shadow']['posH']+'px '+ options['shadow']['posV']+'px '+ options['shadow']['blur']+'px ');
	}else{
		jQuery('#loginform #wp-submit').css('box-shadow','none');
	}





	if (options['margin']['top'] != '') {
		jQuery('#loginform #wp-submit').css('margin-top', options['margin']['top'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('margin-top','0');
	}

	if (options['margin']['right'] != '') {
		jQuery('#loginform #wp-submit').css('margin-right', options['margin']['right'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('margin-right','0');
	}

	if (options['margin']['bottom'] != '') {
		jQuery('#loginform #wp-submit').css('margin-bottom', options['margin']['bottom'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('margin-bottom','0');
	}

	if (options['margin']['left'] != '') {
		jQuery('#loginform #wp-submit').css('margin-left', options['margin']['left'] + options['margin']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('margin-left','0');
	}




	if (options['padding']['top'] != '') {
		jQuery('#loginform #wp-submit').css('padding-top', options['padding']['top'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('padding-top','0');
	}

	if (options['padding']['right'] != '') {
		jQuery('#loginform #wp-submit').css('padding-right', options['padding']['right'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('padding-right','12px');
	}

	if (options['padding']['bottom'] != '') {
		jQuery('#loginform #wp-submit').css('padding-bottom', options['padding']['bottom'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('padding-bottom','0');
	}

	if (options['padding']['left'] != '') {
		jQuery('#loginform #wp-submit').css('padding-left', options['padding']['left'] + options['padding']['unit'] );
	}else{
		jQuery('#loginform #wp-submit').css('padding-left','12px');
	}



}


function buttonBgRender(options){


	if (options['bbgType'] == 'solid') {
		if (options['bbgColor'] != '') {
			jQuery('#loginform #wp-submit').css('background-color', options['bbgColor'] );
			jQuery('#loginform #wp-submit').css('background', options['bbgColor'] );

			jQuery('.wp-pwd .dashicons').css('color', options['bbgColor'] );

			
		}
	}


	if (options['bbgType'] == 'gradient') {

		if (options['bbgGradient']['bbgGrType'] == 'linear') {

			jQuery('#loginform #wp-submit').css(
				'background',
				'linear-gradient('+
					options['bbgGradient']['bbgGrAngle']+'deg,'+
					options['bbgGradient']['bbgGr1Color']+' '+options['bbgGradient']['bbgGr1Loc']+'%,'+
					options['bbgGradient']['bbgGr2Color']+' '+options['bbgGradient']['bbgGr2Loc']+'%'+
				')'
			);

		}

		if (options['bbgGradient']['bbgGrType'] == 'radial') {

			jQuery('#loginform #wp-submit').css(
				'background',
				'radial-gradient(at '+
					options['bbgGradient']['bbgGrPos']+','+
					options['bbgGradient']['bbgGr1Color']+' '+options['bbgGradient']['bbgGr1Loc']+'%,'+
					options['bbgGradient']['bbgGr2Color']+' '+options['bbgGradient']['bbgGr2Loc']+'%'+
				')'
			);
			
		}

	}

}


function footerLinksStylesRender(options){

	if (options['textColor'] != '') {
		jQuery('#nav a, #backtoblog a').css('color', options['textColor']);
	}

	if (options['textSize'] != '') {
		jQuery('#nav, #backtoblog').css('font-size', options['textSize']+options['textSizeU']);
	}else{
		jQuery('#nav, #backtoblog').css('font-size', '13px');
	}

	if (options['fontFamily'] != '') {
		jQuery('#nav, #backtoblog').css('font-family', options['fontFamily'].replace(/\+/g, ' ') );
	}else{
		jQuery('#nav, #backtoblog').css('font-family', '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif');
	}


	if (options['alignment'] != '') {
		jQuery('#nav, #backtoblog').css('text-align', options['alignment']);
	}else{
		jQuery('#nav, #backtoblog').css('text-align', 'left');
	}



	if (options['margin']['top'] != '') {
		jQuery('#nav').css('margin-top', options['margin']['top'] + options['margin']['unit'] );
	}else{
		jQuery('#nav').css('margin-top','15px');
	}

	if (options['margin']['right'] != '') {
		jQuery('#nav').css('margin-right', options['margin']['right'] + options['margin']['unit'] );
	}else{
		jQuery('#nav').css('margin-right','0');
	}

	if (options['margin']['bottom'] != '') {
		jQuery('#nav').css('margin-bottom', options['margin']['bottom'] + options['margin']['unit'] );
	}else{
		jQuery('#nav').css('margin-bottom','0');
	}

	if (options['margin']['left'] != '') {
		jQuery('#nav').css('margin-left', options['margin']['left'] + options['margin']['unit'] );
	}else{
		jQuery('#nav').css('margin-left','0');
	}


}



function formTextMessagesRender(options){


	if (options['unLabel'] != '') {

		if (options['unLabel'] !== 'Username or Email Address') {

			jQuery('[for="user_login"]').contents().filter(function(){ return this.nodeType == 3; }).first().replaceWith( options['unLabel'] );

		}


	}

	if (options['passLabel'] != '') {

		if (options['passLabel'] !== 'Password') {

			jQuery('[for="user_pass"]').contents().filter(function(){ return this.nodeType == 3; }).first().replaceWith( options['passLabel'] );
			
		}
		

	}

	if (options['rembLabel'] != '') {

		if (options['rembLabel'] !== 'Remember Me') {

			jQuery('[for="rememberme"]').contents().filter(function(){ return this.nodeType == 3; }).first().replaceWith( options['rembLabel'] );

		}


	}

	if (options['btnText'] != '') {

		if (options['btnText'] !== 'Log In') {

			jQuery('#wp-submit').val(options['btnText']);

		}

	}else{
		jQuery('#wp-submit').val('Login');	
	}


	if (options['lostPass'] !== '') {

		if (options['lostPass'] !== 'Lost your password?') {

		

			if(jQuery('#nav').children().length > 1){
				jQuery('#nav a:nth-child(2').text(options['lostPass']);
			}else{
				jQuery('#nav a').text(options['lostPass']);
			}

		}

	}


	if (options['backtoblog'] != '') {
		jQuery('#backtoblog a').text(options['backtoblog']);
	}

}


function formScriptsRender(options){

	if (options['customcss'] != '') {

		if ( jQuery('#customCSSLoadElContainer').length ) {

		}else{
			jQuery('body').append("<div id='customCSSLoadElContainer'></div>");
		}

		jQuery('#customCSSLoadElContainer').html('');
		jQuery('#customCSSLoadElContainer').append('<style>'+ options['customcss'] +'</style>');
		
	}

}

function formRecaptchaRender(options){

	if (typeof(options) != 'undefined' ) {

		if (typeof(options['enable']) != 'undefined' ) {

			if (options['enable'] == 'true') {
				jQuery('.feather-recaptcha').remove();
				jQuery('.user-pass-wrap').append(
					'<div class="feather-recaptcha">'+
						'<script src="https://www.google.com/recaptcha/api.js" async defer></script>'+
						'<div class="g-recaptcha" data-sitekey="'+options['siteKey']+'" data-theme="'+options['theme']+'"></div>'+
					'</div>'
				);

			}else{
				jQuery('.feather-recaptcha').remove();
			}

		}

	}

		

}



function renderChange(changedOptionName,changedValue){

	if (changedOptionName.indexOf('logo') != -1) {
		logoRender(feather_LoginBuilderApp.options.updatedOptions.logo);
	}

	if (changedOptionName.indexOf('bgOps') != -1) {
		pageBgRender(feather_LoginBuilderApp.options.updatedOptions.bgOps);
	}


	// if (changedOptionName.indexOf('alignment') != -1) {
	// 	formAlignmentRender(feather_LoginBuilderApp.options.updatedOptions.alignment);
	// }

	if (changedOptionName.indexOf('formContBgOps') != -1) {
		formBgRender(feather_LoginBuilderApp.options.updatedOptions.formContBgOps);
	}

	if (changedOptionName.indexOf('formContOps') != -1) {
		formStylesRender(feather_LoginBuilderApp.options.updatedOptions.formContOps);
	}

	if (changedOptionName.indexOf('formLabels') != -1) {
		labelStylesRender(feather_LoginBuilderApp.options.updatedOptions.formLabels);
	}

	if (changedOptionName.indexOf('formInput') != -1) {
		inputStylesRender(feather_LoginBuilderApp.options.updatedOptions.formInput);
	}

	if (changedOptionName.indexOf('formButton') != -1) {
		buttonStylesRender(feather_LoginBuilderApp.options.updatedOptions.formButton);
	}

	if (changedOptionName.indexOf('formButton') != -1) {
		buttonBgRender(feather_LoginBuilderApp.options.updatedOptions.formButtonBg);
	}

	if (changedOptionName.indexOf('footerLinks') != -1) {
		footerLinksStylesRender(feather_LoginBuilderApp.options.updatedOptions.footerLinks);
	}

	if (changedOptionName.indexOf('formTexts') != -1) {
		formTextMessagesRender(feather_LoginBuilderApp.options.updatedOptions.formTexts);
	}

	if (changedOptionName.indexOf('scripts') != -1) {
		formScriptsRender(feather_LoginBuilderApp.options.updatedOptions.scripts);
	}

	if (changedOptionName.indexOf('recaptcha') != -1) {
		formRecaptchaRender(feather_LoginBuilderApp.options.updatedOptions.recaptcha);
	}



	



}



function renderChangeMobile(changedOptionName,changedValue){


	mobileOptionsRender = {};

	mobileOptionsRender = JSON.stringify(feather_LoginBuilderApp.options.mobileOptions);
	mobileOptionsRender = JSON.parse(mobileOptionsRender);

	mergeDifferentObjProps(mobileOptionsRender,feather_LoginBuilderApp.options.updatedOptions);

	
	if (changedOptionName.indexOf('logo') != -1) {
		logoRender(mobileOptionsRender.logo);
	}

	if (changedOptionName.indexOf('bgOps') != -1) {
		pageBgRender(mobileOptionsRender.bgOps);
	}


	// if (changedOptionName.indexOf('alignment') != -1) {
	// 	formAlignmentRender(mobileOptionsRender.alignment);
	// }

	if (changedOptionName.indexOf('formContBgOps') != -1) {
		formBgRender(mobileOptionsRender.formContBgOps);
	}

	if (changedOptionName.indexOf('formContOps') != -1) {
		formStylesRender(mobileOptionsRender.formContOps);
	}

	if (changedOptionName.indexOf('formLabels') != -1) {
		labelStylesRender(mobileOptionsRender.formLabels);
	}

	if (changedOptionName.indexOf('formInput') != -1) {
		inputStylesRender(mobileOptionsRender.formInput);
	}

	if (changedOptionName.indexOf('formButton') != -1) {
		buttonStylesRender(mobileOptionsRender.formButton);
	}

	if (changedOptionName.indexOf('formButton') != -1) {
		buttonBgRender(mobileOptionsRender.formButtonBg);
	}

	if (changedOptionName.indexOf('footerLinks') != -1) {
		footerLinksStylesRender(mobileOptionsRender.footerLinks);
	}

	if (changedOptionName.indexOf('formTexts') != -1) {
		formTextMessagesRender(mobileOptionsRender.formTexts);
	}

	if (changedOptionName.indexOf('scripts') != -1) {
		formScriptsRender(mobileOptionsRender.scripts);
	}

	if (changedOptionName.indexOf('recaptcha') != -1) {
		formRecaptchaRender(mobileOptionsRender.recaptcha);
	}



	



}








