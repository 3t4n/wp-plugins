// LettersMarket Clipboard Button
// LMCButton
// http://www.lettersmarket.com

function isNotEmpty(str) {
 return !((str == undefined) || (str == ''));
}

function showCopyPopUp(cliptext, capt){
	var top = (jQuery(window).height()/4) + (jQuery(window).scrollTop()) ;
	jQuery(".pw-clippy-div").css('top', top + "px");
	jQuery('#pw-clippy-header').html("<strong>"+capt+"</strong>");
	jQuery("#pw-clippy-text").val(decodeURIComponent(cliptext));
	jQuery('.pw-clippy-div').slideDown();
	jQuery("#pw-clippy-text").select();
}

function ShowLMCButton(cliptext, capt, js, furl, width, height)
{
	//if(true){
	if(!FlashDetect.installed){
		var params = encodeURIComponent(cliptext);//.replace(/'/g, "\\'");
		var header = "Copy to Clipboard";
		 document.write('<input type="submit" onClick="showCopyPopUp(\''+params+'\', \'Select All, Copy And Paste\');'+js+';" value="'+capt+'" />');
	}
	else{
		 var params = 'txt=' + encodeURIComponent(cliptext); 
		 if (!isNotEmpty(furl)) { furl = "lmcbutton.swf"; }
		 if (isNotEmpty(capt)) { params += '&capt=' + capt; }
		 if (isNotEmpty(js)) { params += '&js=' + js; }
		 
		document.write('<object width="'+width+'" height="'+height+'">');
		document.write(' <param name="movie" value="' + furl + '">');
		document.write(' <PARAM NAME=FlashVars VALUE="' + params + '">');
		document.write('<PARAM NAME=wmode VALUE="transparent"><param name="scale" value="exactfit" >');
		document.write(' <embed src="' + furl + '" flashvars="' + params + '" scale="exactfit"   width="'+width+'" height="'+height+'"></embed>');
		document.write('</object>');
	}

//alert('file: ' + furl + ' Params: ' + params); // debug
}

function pwTrackGoogleEvent(capt, flash){
	if(!(typeof ga === 'undefined'))
	{
		ga('send', 'event', 'CopyToClipboard', 'click', capt+" "+((flash)?"With Flash":"Without Flash"), 1);
	}
	else if(!(typeof _gaq === 'undefined'))
	{
		 _gaq.push(['_trackEvent', 'CopyToClipboard', 'click', capt+" "+((flash)?"With Flash":"Without Flash"), 1]);
	}
}