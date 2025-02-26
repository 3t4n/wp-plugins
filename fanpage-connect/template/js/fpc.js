jQuery(document).ready(function(){
	/*
	jQuery('fb\\:like, fb\\:send').each(function(){
		$this = jQuery(this);
		socialURL = $this.attr('href');
		console.log(socialURL);
		ogURL = jQuery('meta[property="og:url"]').attr('content');
		if((socialURL.toLowerCase().indexOf('facebook.com') != -1 || socialURL.toLowerCase().indexOf('fb.me') != -1)
			&& (window.self === window.top)){
			theURL = ogURL;
		} else {
			theURL = socialURL;
		}
		theURL = fbEnforceDesktop(theURL);
		$this.attr('href',theURL);
		console.log(theURL);
	});
	*/

	if(popLinks){
		jQuery("#fpc-content a").each(function(){
			if(
				fpcCheckLinkAttributes(jQuery(this)) &&
				fpcCheckLinkToAnchor(jQuery(this)) &&
				fpcCheckLinkJQuery(jQuery(this))
			){
				jQuery(this).attr("target","_blank");
			}
		});
	}
	if(popForms){
		jQuery("#fpc-content form").each(function(){
			if(
				jQuery(this).attr("action") != undefined &&
				jQuery(this).attr("target") == undefined
			){
				jQuery(this).attr("target","_blank");
			}
		});
	}
});

function fbEnforceDesktop(url){
	if(url.toLowerCase().indexOf('facebook.com') != -1 || url.toLowerCase().indexOf('fb.me') != -1){
		paramPrefix = (url.indexOf('?') != -1)? '&' : '?';
		url += (url.indexOf('ref=ts') != -1)? '' : paramPrefix + 'ref=ts';
	}
	return url;
}

function fpcSetCookie(n,d){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + d);
	var cval = 'hide' + ';expires=' + exdate.toUTCString();
	document.cookie = n + '=' + cval;
}

function fpcCheckLinkAttributes(jQueryl){
	return !(
		jQueryl.attr("target") != undefined ||
		jQueryl.attr("onclick") != undefined ||
		jQueryl.attr("mousedown") != undefined ||
		jQueryl.attr("mouseup") != undefined ||
		jQueryl.attr("href") == undefined
	);
}

function fpcCheckLinkToAnchor(jQueryl){
	return !(
		jQueryl.attr("href").indexOf("#") != -1 ||
		jQueryl.attr("href").indexOf("javascript") != -1
	);
}

function fpcCheckLinkJQuery(jQueryl){
	return !(jQueryl.data("events") != undefined);
}