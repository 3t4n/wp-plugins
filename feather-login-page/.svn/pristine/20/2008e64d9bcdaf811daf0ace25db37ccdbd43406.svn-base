plbp_LoginPageBuilderTemplates = [];

( function( $ ) {

	jQuery(document).ready(function($) {

		// setTimeout(function(){
		// 	jQuery('.templateasd').css('display','block');
		// 	jQuery('.templateasd').val( JSON.stringify(feather_LoginBuilderApp.options.updatedOptions) );
		// }, 1000);
		


		$('.template_select_btn').on('click',function(){

			if ( ! confirm( "The design data associated with the current template will be lost. It can be recovered using the UNDO/REDO controls at the bottom. Confirm to proceed this action" ) )
				return false;

			var thisTemplateID = $(this).attr('data-templateid');

			if (thisTemplateID == '') {
				thisTemplateID = false;
			}

			var template1 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"1","customCSS":"Insert Custom CSS Code Here"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/dummy-logo-WHITE.png","logoImageWidth":"200","logoImageHeight":"","logoAlignment":"","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"#F1F1F1","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/photo-1483356256511-b48749959172.jpeg","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center center","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"default","repM":"default","size":"cover","sizeM":"","cWid":"","cWidM":"","widU":"px","widUM":"px"}},"formContOps":{"fwidth":"","fheight":"","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"10","tright":"10","bleft":"10","bright":"10"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"12","right":"","bottom":"","left":"","unit":"%"},"padding":{"top":"35","right":"44","bottom":"65","left":"44","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"rgba(0, 0, 0, 0.39)","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(15, 15, 15)","fbgGr1Loc":"24","fbgGr2Color":"rgb(21, 21, 21)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"rgba(58, 58, 58, 0.39)","textColor":"rgb(255, 255, 255)","fontFamily":"sans-serif","textSize":"","textSizeU":"px","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"3","tright":"3","bleft":"3","bright":"3"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"10","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"rgb(62, 62, 62)","hoverTextColor":"#fff","fontFamily":"Lato","textSize":"14","textSizeU":"px","border":{"style":"solid","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"3","tright":"3","bleft":"3","bright":"3"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"20","bottom":"","left":"20","unit":"px"},"width":"default"},"formButtonBg":{"bbgType":"solid","bbgColor":"rgb(255, 255, 255)","bbgHoverColor":"rgb(255, 255, 255)","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"rgb(255, 255, 255)","fontFamily":"Mandali","textSize":"","textSizeU":"px","margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":""},"footerLinks":{"textColor":"rgba(255, 255, 255, 0.48)","fontFamily":"","textSize":"","textSizeU":"px","margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"scripts":{"customcss":""}};


			var template2 = {"loginDefaults":{"version":"1.0","userType":1,"selectedTemplate":"2","customCSS":"Insert Custom CSS Code Here"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/dummy-logo-WHITE.png","logoImageWidth":"200","logoImageHeight":"","logoAlignment":"","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"#F1F1F1","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/photo-1517248135467-4c7edcad34c4.jpeg","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center center","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"default","repM":"default","size":"cover","sizeM":"","cWid":"","cWidM":"","widU":"px","widUM":"px"}},"formContOps":{"fwidth":"","fheight":"","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"50","tright":"0","bleft":"0","bright":"50"},"shadow":{"color":"rgb(0, 0, 0)","posH":"0","posV":"10","blur":"15"},"margin":{"top":"15","right":"10","bottom":"","left":"","unit":"%"},"padding":{"top":"26","right":"30","bottom":"26","left":"30","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"#febf01","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(255, 255, 255)","fbgGr1Loc":"24","fbgGr2Color":"rgb(122, 122, 122)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"rgb(255, 255, 255)","textColor":"","fontFamily":"","textSize":"","textSizeU":"px","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"2","tright":"2","bleft":"2","bright":"2"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"3","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"#fff","hoverTextColor":"#fff","fontFamily":"","textSize":"16","textSizeU":"px","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"","tright":"","bleft":"","bright":""},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"20","bottom":"","left":"20","unit":"px"},"width":"default"},"formButtonBg":{"bbgType":"solid","bbgColor":"rgb(231, 111, 81)","bbgHoverColor":"rgb(255, 255, 255)","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"#444","fontFamily":"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif","textSize":"14","textSizeU":"px","margin":{"top":"","right":"","bottom":"3","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":""},"footerLinks":{"textColor":"#555d66","fontFamily":"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif","textSize":"13","textSizeU":"px","margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"scripts":{"customcss":""}};



			var template3 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"default","customCSS":"Insert Custom CSS Code Here"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/dummy-logo-WHITE.png","logoImageWidth":"225","logoImageHeight":"","logoAlignment":"","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"rgb(241, 241, 241)","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/photo-1477959858617-67f85cf4f1df.jpg","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center center","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"default","repM":"default","size":"cover","sizeM":"","cWid":"","cWidM":"","widU":"px","widUM":"px"}},"formContOps":{"fwidth":"400","fheight":"","border":{"style":"solid","color":"rgba(0, 0, 0, 0)","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"10","tright":"10","bleft":"10","bright":"10"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"60","right":"50","bottom":"60","left":"60","unit":"px"}},"formContBgOps":{"fbgType":"gradient","fbgColor":"#fff","fbgImage":"","fbgGradient":{"fbgGr1Color":"#7678ff","fbgGr1Loc":"35","fbgGr2Color":"#b125ee","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"rgba(0, 0, 0, 0)","textColor":"rgb(255, 255, 255)","fontFamily":"","textSize":"","textSizeU":"px","border":{"style":"solid","color":"rgba(255, 255, 255, 0.37)","top":"0","right":"0","bottom":"3","left":"0"},"borderRadius":{"tleft":"","tright":"","bleft":"","bright":""},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"rgb(75, 74, 74)","hoverTextColor":"#fff","fontFamily":"","textSize":"17","textSizeU":"px","border":{"style":"","color":"rgb(255, 255, 255)","top":"","right":"","bottom":"","left":""},"borderRadius":{"tleft":"50","tright":"50","bleft":"50","bright":"50"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"35","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"3","right":"40","bottom":"3","left":"40","unit":"px"},"width":"full width"},"formButtonBg":{"bbgType":"solid","bbgColor":"rgb(255, 255, 255)","bbgHoverColor":"#0073AA","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"rgb(255, 255, 255)","fontFamily":"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif","textSize":"14","textSizeU":"px","margin":{"top":"10","right":"","bottom":"3","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":""},"footerLinks":{"textColor":"rgb(255, 255, 255)","fontFamily":"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif","textSize":"13","textSizeU":"px","margin":{"top":"60","right":"","bottom":"","left":"","unit":"px"},"alignment":"center"},"scripts":{"customcss":""}};


			var template4 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"default"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/pexels-photo-3777570.png","logoImageWidth":"100","logoImageHeight":"100","logoAlignment":"center","logoGap":"","logoLink":"","logoTitle":"Welcome"},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"solid","bgColor":"rgb(255, 255, 255)","bgImage":"","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center center","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"default","repM":"default","size":"cover","sizeM":"","cWid":"","cWidM":"","widU":"px","widUM":"px"}},"formContOps":{"fwidth":"400","fheight":"","border":{"style":"solid","color":"rgb(0, 0, 0)","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"0","tright":"0","bleft":"0","bright":"0"},"shadow":{"color":"rgba(0, 0, 0, 0)","posH":"0","posV":"0","blur":"0"},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"26","right":"24","bottom":"46","left":"24","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"rgb(255, 255, 255)","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(255, 255, 255)","fbgGr1Loc":"24","fbgGr2Color":"rgb(122, 122, 122)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"#fff","textColor":"#474747","fontFamily":"Nunito+Sans","textSize":"20","textSizeU":"px","border":{"style":"solid","color":"#57b847","top":"0","right":"0","bottom":"2","left":"0"},"borderRadius":{"tleft":"0","tright":"0","bleft":"0","bright":"0"},"shadow":{"color":"rgba(0, 0, 0, 0)","posH":"0","posV":"0","blur":"0"},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"15","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"#fff","hoverTextColor":"#fff","fontFamily":"Lato","textSize":"17","textSizeU":"px","width":"full width","border":{"style":"solid","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"50","tright":"50","bleft":"50","bright":"50"},"shadow":{"color":"rgba(87, 184, 71, 0.49)","posH":"0","posV":"5","blur":"10"},"margin":{"top":"20","right":"","bottom":"15","left":"","unit":"px"},"padding":{"top":"5","right":"","bottom":"5","left":"","unit":"px"}},"formButtonBg":{"bbgType":"solid","bbgColor":"#57b847","bbgHoverColor":"#0073AA","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"#9a9a9a","fontFamily":"Nunito+Sans","textSize":"15","textSizeU":"px","margin":{"top":"15","right":"","bottom":"3","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":""},"footerLinks":{"textColor":"rgb(182, 182, 182)","fontFamily":"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif","textSize":"13","textSizeU":"px","margin":{"top":"150","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"scripts":{"customcss":""}};



			var template5 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"default"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/Logo.svg","logoImageWidth":"220","logoImageHeight":"","logoAlignment":"","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"#F1F1F1","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/brooke-lark-08bOYnH_r_E-unsplash-1.jpg","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center right","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"no-repeat","repM":"default","size":"cover","sizeM":"","cWid":"","cWidM":"","widU":"px","widUM":"px"}},"formContOps":{"fwidth":"","fheight":"","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"0","tright":"0","bleft":"0","bright":"0"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"15","right":"","bottom":"","left":"5","unit":"vw"},"padding":{"top":"26","right":"24","bottom":"46","left":"24","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"rgba(0, 0, 0, 0)","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(255, 255, 255)","fbgGr1Loc":"24","fbgGr2Color":"rgb(122, 122, 122)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"#fff","textColor":"","fontFamily":"Maven+Pro","textSize":"","textSizeU":"px","border":{"style":"solid","color":"#7e8993","top":"1","right":"1","bottom":"1","left":"1"},"borderRadius":{"tleft":"4","tright":"4","bleft":"4","bright":"4"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"#fff","hoverTextColor":"#fff","fontFamily":"Lato","textSize":"16","textSizeU":"px","width":"full width","border":{"style":"solid","color":"rgba(0, 0, 0, 0)","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"3","tright":"3","bleft":"3","bright":"3"},"shadow":{"color":"rgb(255, 255, 255)","posH":"","posV":"","blur":""},"margin":{"top":"25","right":"0","bottom":"50","left":"0","unit":"px"},"padding":{"top":"0","right":"12","bottom":"0","left":"12","unit":"px"}},"formButtonBg":{"bbgType":"solid","bbgColor":"#57a773","bbgHoverColor":"#0073AA","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"#444","fontFamily":"Maven+Pro","textSize":"13","textSizeU":"px","margin":{"top":"","right":"","bottom":"3","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":""},"footerLinks":{"textColor":"#555d66","fontFamily":"sans-serif","textSize":"13","textSizeU":"px","margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"scripts":{"customcss":""}};


			var template6 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"default"},"logo":{"hideLogo":"false","logoImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2021/03/temp-logo-blue.png","logoImageWidth":"200","logoImageHeight":"100","logoAlignment":"center","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"#F1F1F1","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2021/03/pexels-evg-culture-1126993-scaled-1.jpeg","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"top right","posM":"","xPos":"62","xPosM":"","xPosU":"%","xPosUM":"px","yPos":"5","yPosM":"","yPosU":"%","yPosUM":"px","rep":"no-repeat","repM":"default","size":"custom","sizeM":"","cWid":"135","cWidM":"","widU":"vw","widUM":"px"}},"formContOps":{"fwidth":"350","fheight":"","border":{"style":"solid","color":"rgba(0, 0, 0, 0)","top":"","right":"","bottom":"","left":""},"borderRadius":{"tleft":"0","tright":"0","bleft":"0","bright":"0"},"shadow":{"color":"rgba(189, 76, 76, 0)","posH":"0","posV":"0","blur":"0"},"margin":{"top":"22","right":"","bottom":"","left":"60","unit":"%"},"padding":{"top":"26","right":"24","bottom":"46","left":"24","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"rgba(0, 0, 0, 0)","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(255, 255, 255)","fbgGr1Loc":"24","fbgGr2Color":"rgb(122, 122, 122)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"rgba(255, 255, 255, 0.202)","textColor":"rgb(248, 248, 248)","fontFamily":"Pontano+Sans","textSize":"18","textSizeU":"px","border":{"style":"solid","color":"rgba(83, 83, 83, 0.163)","top":"1","right":"1","bottom":"1","left":"1"},"borderRadius":{"tleft":"4","tright":"4","bleft":"4","bright":"4"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"5","right":"","bottom":"5","left":"","unit":"px"}},"formButton":{"textColor":"#fff","hoverTextColor":"#fff","fontFamily":"Be+Vietnam","textSize":"15","textSizeU":"px","width":"full width","border":{"style":"solid","color":"rgba(0, 0, 0, 0)","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"3","tright":"3","bleft":"3","bright":"3"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"10","right":"0","bottom":"10","left":"0","unit":"px"},"padding":{"top":"6","right":"6","bottom":"6","left":"6","unit":"px"}},"formButtonBg":{"bbgType":"solid","bbgColor":"rgb(0, 172, 193)","bbgHoverColor":"#0073AA","bbgGradient":{"bbgGr1Color":"rgb(255, 255, 255)","bbgGr1Loc":"55","bbgGr2Color":"rgb(122, 122, 122)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"#ffffff","fontFamily":"Be+Vietnam","textSize":"14","textSizeU":"px","margin":{"top":"","right":"","bottom":"10","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username","passLabel":"Password","rembLabel":"Remember","btnText":"Sign In","lostPass":"Forgot Password ?","backtoblog":" "},"footerLinks":{"textColor":"#ffffff","fontFamily":"sans-serif","textSize":"13","textSizeU":"px","margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"alignment":""},"scripts":{"customcss":""},"recaptcha":{"enable":"false","siteKey":"","siteSecret":"","theme":""}};


			var template6Mobile = {"formContOps":{"fwidth":"305","margin":{"top":"30","right":"1","bottom":"10","left":"3","unit":"%"},"padding":{"top":"10","right":"10","bottom":"10","left":"10","unit":"px"}},"bgOps":{"bgImgOps":{"size":"cover"}}};



			var template7 = {"loginDefaults":{"version":"1.0","userType":"1","selectedTemplate":"default"},"logo":{"hideLogo":"true","logoImage":"","logoImageWidth":"","logoImageHeight":"","logoAlignment":"","logoGap":"","logoLink":"","logoTitle":""},"alignment":{"alignX":"","alignY":""},"bgOps":{"bgType":"image","bgColor":"#F1F1F1","bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2021/05/business-woman.png","bgGradient":{"bgGr1Color":"rgb(255, 255, 255)","bgGr1Loc":"24","bgGr2Color":"rgb(122, 122, 122)","bgGr2Loc":"100","bgGrType":"linear","bgGrPos":"top left","bgGrAngle":"180"},"bgImgOps":{"pos":"center right","posM":"","xPos":"","xPosM":"","xPosU":"px","xPosUM":"px","yPos":"","yPosM":"","yPosU":"px","yPosUM":"px","rep":"no-repeat","repM":"default","size":"cover","sizeM":"","cWid":"128","cWidM":"","widU":"vw","widUM":"px"}},"formContOps":{"fwidth":"","fheight":"","border":{"style":"","color":"","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"3","tright":"3","bleft":"3","bright":"3"},"shadow":{"color":"#ffffff","posH":"","posV":"","blur":""},"margin":{"top":"15","right":"","bottom":"","left":"12","unit":"vw"},"padding":{"top":"35","right":"30","bottom":"32","left":"30","unit":"px"}},"formContBgOps":{"fbgType":"solid","fbgColor":"rgb(255, 255, 255)","fbgImage":"","fbgGradient":{"fbgGr1Color":"rgb(255, 255, 255)","fbgGr1Loc":"24","fbgGr2Color":"rgb(122, 122, 122)","fbgGr2Loc":"100","fbgGrType":"linear","fbgGrPos":"top left","fbgGrAngle":"180"},"fbgImgOps":{"fpos":"center center","fposM":"","fxPos":"","fxPosM":"","fxPosU":"px","fxPosUM":"px","fyPos":"","fyPosM":"","fyPosU":"px","fyPosUM":"px","frep":"default","frepM":"default","fsize":"cover","fsizeM":"","fcWid":"","fcWidM":"","fwidU":"px","fwidUM":"px"}},"formInput":{"bgColor":"#fff","textColor":"rgb(71, 71, 71)","fontFamily":"Open+Sans","textSize":"","textSizeU":"px","border":{"style":"solid","color":"rgb(163, 159, 159)","top":"1","right":"1","bottom":"1","left":"1"},"borderRadius":{"tleft":"4","tright":"4","bleft":"4","bright":"4"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"","right":"","bottom":"","left":"","unit":"px"},"padding":{"top":"","right":"","bottom":"","left":"","unit":"px"}},"formButton":{"textColor":"#fff","hoverTextColor":"#fff","fontFamily":"Open+Sans","textSize":"17","textSizeU":"px","width":"full width","border":{"style":"solid","color":"#0071a1","top":"0","right":"0","bottom":"0","left":"0"},"borderRadius":{"tleft":"4","tright":"4","bleft":"4","bright":"4"},"shadow":{"color":"","posH":"","posV":"","blur":""},"margin":{"top":"10","right":"0","bottom":"0","left":"0","unit":"px"},"padding":{"top":"4","right":"12","bottom":"4","left":"12","unit":"px"}},"formButtonBg":{"bbgType":"gradient","bbgColor":"#0073AA","bbgHoverColor":"#0073AA","bbgGradient":{"bbgGr1Color":"rgb(244, 176, 175)","bbgGr1Loc":"40","bbgGr2Color":"rgb(251, 160, 159)","bbgGr2Loc":"100","bbgGrType":"linear","bbgGrPos":"top left","bbgGrAngle":"180"}},"formLabels":{"textColor":"rgb(163, 159, 159)","fontFamily":"Open+Sans","textSize":"14","textSizeU":"px","margin":{"top":"","right":"","bottom":"3","left":"","unit":"px"},"alignment":""},"formTexts":{"unLabel":"Username or Email Address","passLabel":"Password","rembLabel":"Remember Me","btnText":"Log In","lostPass":"Lost your password?","backtoblog":" "},"footerLinks":{"textColor":"rgb(163, 159, 159)","fontFamily":"Open+Sans","textSize":"12","textSizeU":"px","margin":{"top":"25","right":"","bottom":"","left":"-23","unit":"px"},"alignment":""},"scripts":{"customcss":".plbp_login-preview {\nbackground-color:#fff;\nbackground:#fff;\n}"},"recaptcha":{"enable":"false","siteKey":"","siteSecret":"","theme":""}};


			var template7Mobile = {"formContOps":{"fwidth":"305","margin":{"top":"5","right":"3","bottom":"10","left":"3","unit":"%"},"padding":{"top":"10","right":"10","bottom":"10","left":"10","unit":"px"}},"bgOps":{"bgImgOps":{"size":"contain","pos":"bottom center","rep":"no-repeat"},"bgImage":"https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2021/05/business-woman-mobile.jpeg"},"logo":{"logoImage":""}};



			var checkRecaptchaValues = jQuery('[data-optname="recaptcha.siteKey"]');

			var recaptchaValuesObject = null;

			if (checkRecaptchaValues != '' && checkRecaptchaValues != ' ') {
				var recaptchaValuesObject = {
					enable: jQuery('[data-optname="recaptcha.enable"]').val(),
					siteKey: jQuery('[data-optname="recaptcha.siteKey"]').val(),
					siteSecret: jQuery('[data-optname="recaptcha.siteSecret"]').val(),
					theme:jQuery('[data-optname="recaptcha.theme"]').val()
				}
			}

			defaultLogoUrls = [
				'https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/w-logo-blue.png',
				'https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/dummy-logo-WHITE.png',
				'https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/pexels-photo-3777570.png',
				'https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/Logo.svg',
				''
			];

			prevLogo = 'https://storage.googleapis.com/imagelibrarystorage.pluginops.com/FP/2020/08/dummy-logo-WHITE.png'; prevLogoW = ''; prevLogoH = ''; prevFormTexts = '';
			if (feather_LoginBuilderApp.options.updatedOptions != '') {
				var prevLogo = feather_LoginBuilderApp.options.updatedOptions.logo.logoImage;
				var prevLogoW = feather_LoginBuilderApp.options.updatedOptions.logo.logoImageWidth;
				var prevLogoH = feather_LoginBuilderApp.options.updatedOptions.logo.logoImageHeight;
				var prevFormTexts = feather_LoginBuilderApp.options.updatedOptions.formTexts;
			}
				

			feather_LoginBuilderApp.prevTemplateData = JSON.stringify(feather_LoginBuilderApp.options.updatedOptions);

			if (thisTemplateID == '0') {

				var plbp_LoginBuilderDuplicatedOps = JSON.stringify(feather_LoginBuilderApp.options.defaultOps);

				 

				//jQuery('.templateasd').val(JSON.stringify(feather_LoginBuilderApp.options.updatedOptions) )

				feather_LoginBuilderApp.options.updatedOptions = _.clone( JSON.parse(plbp_LoginBuilderDuplicatedOps) );

				if (typeof(recaptchaValuesObject) == 'object') {
					feather_LoginBuilderApp.options.updatedOptions.recaptcha = recaptchaValuesObject;
				}

				feather_LoginBuilderApp.options.updatedOptions.formTexts = prevFormTexts;

				if (defaultLogoUrls.includes(prevLogo)) {
				}else{
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImage = prevLogo;
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImageWidth = prevLogoW;
				 	feather_LoginBuilderApp.options.updatedOptions.logo.logoImageHeight = prevLogoH;
				}

				loadSavedOptions(feather_LoginBuilderApp.options.updatedOptions);


				var lastActionTemplateChange = false;

				if ( typeof(stackUndo[stackUndo.length-1]) != 'undefined') {

					if ( typeof(stackUndo[stackUndo.length-1]['changedOpName']) != 'undefined' ) {

						if (stackUndo[stackUndo.length-1]['changedOpName'] == 'templateChange') {
							lastActionTemplateChange = true;
						}

					}

				}


				if (lastActionTemplateChange == true) {

					// console.log(stackUndo[stackUndo.length-1]['changedOpValue']);

					// var thisChangeRedoProps = {
					// 	changedOpName:'templateChange',
					// 	changedOpValue:thisTemplateID,
					// }

					// sendDataBackToUndoStack(thisChangeRedoProps);

				}else{

					var thisChangeRedoProps = {
						changedOpName:'templateChange',
						changedOpValue:feather_LoginBuilderApp.prevTemplateData,
					}

					sendDataBackToUndoStack(thisChangeRedoProps);

				}
					

			}else{

				plbp_LoginBuilderDuplicatedMobileOps = false;

				switch(thisTemplateID) {
					case '1':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template1);
					break;
					case '2':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template2);
					break;
					case '3':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template3);
					break;
					case '4':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template4);
					break;
					case '5':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template5);
					break;
					case '6':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template6);
						var plbp_LoginBuilderDuplicatedMobileOps = JSON.stringify(template6Mobile);
					break;
					case '7':
						var plbp_LoginBuilderDuplicatedOps = JSON.stringify(template7);
						var plbp_LoginBuilderDuplicatedMobileOps = JSON.stringify(template7Mobile);
					break;
					default:
						return false;
					break;
				}

				
				 

				feather_LoginBuilderApp.options.updatedOptions = _.clone( JSON.parse(plbp_LoginBuilderDuplicatedOps) );

				if (plbp_LoginBuilderDuplicatedMobileOps != false) {
					feather_LoginBuilderApp.options.mobileOptions = _.clone( JSON.parse(plbp_LoginBuilderDuplicatedMobileOps) );
				}else{
					delete feather_LoginBuilderApp.options.mobileOptions;
				}
				



				if (typeof(recaptchaValuesObject) == 'object') {
					feather_LoginBuilderApp.options.updatedOptions.recaptcha = recaptchaValuesObject;
				}

				feather_LoginBuilderApp.options.updatedOptions.formTexts = prevFormTexts;

				if (defaultLogoUrls.includes(prevLogo)) {
				}else{
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImage = prevLogo;
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImageWidth = prevLogoW;
				 	feather_LoginBuilderApp.options.updatedOptions.logo.logoImageHeight = prevLogoH;
				}

				feather_LoginBuilderApp.options.updatedOptions.formTexts = prevFormTexts;

				if (defaultLogoUrls.includes(prevLogo)) {
				}else{
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImage = prevLogo;
					feather_LoginBuilderApp.options.updatedOptions.logo.logoImageWidth = prevLogoW;
				 	feather_LoginBuilderApp.options.updatedOptions.logo.logoImageHeight = prevLogoH;
				}

				loadSavedOptions(feather_LoginBuilderApp.options.updatedOptions);


				var lastActionTemplateChange = false;

				if ( typeof(stackUndo[stackUndo.length-1]) != 'undefined') {

					if ( typeof(stackUndo[stackUndo.length-1]['changedOpName']) != 'undefined' ) {

						if (stackUndo[stackUndo.length-1]['changedOpName'] == 'templateChange') {
							lastActionTemplateChange = true;
						}

					}

				}


				if (lastActionTemplateChange == true) {

					// console.log(stackUndo[stackUndo.length-1]['changedOpValue']);

					// var thisChangeRedoProps = {
					// 	changedOpName:'templateChange',
					// 	changedOpValue:thisTemplateID,
					// }

					// sendDataBackToUndoStack(thisChangeRedoProps);

				}else{

					var thisChangeRedoProps = {
						changedOpName:'templateChange',
						changedOpValue:feather_LoginBuilderApp.prevTemplateData,
					}

					sendDataBackToUndoStack(thisChangeRedoProps);
					
				}


			}



		});
		
	});
		

})(jQuery);