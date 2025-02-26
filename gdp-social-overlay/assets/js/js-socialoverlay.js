jQuery('.gdp-close').click(function(){
	jQuery('#gdp-overlayBox').hide();
	jQuery('#gdp-modalBox').hide();
});

jQuery('#gdp-overlayBox').click(function(){
	jQuery('#gdp-overlayBox').hide();
	jQuery('#gdp-modalBox').hide();
});

jQuery('#dontShowMeAgain').click(function(){
	dontShowMeAgain();
});

function gdpSetCookie(name,value,expire)
{
  var scadenza = new Date();
  var adesso = new Date();
  scadenza.setTime(adesso.getTime() + (parseInt(expire) * 60000));
  document.cookie = name + '=' + escape(value) + '; expires=' + scadenza.toGMTString() + '; path=/';
}

function gdpGetCookie(name)
{
	if (document.cookie.length > 0)
	{
		var inizio = document.cookie.indexOf(name + "=");
		if (inizio != -1)
		{
			inizio = inizio + name.length + 1;
			var fine = document.cookie.indexOf(";",inizio);
			if (fine == -1) fine = document.cookie.length;
			return unescape(document.cookie.substring(inizio,fine));
		}else{
			return "";
		}
	}
	return "";
}

function gdpDeleteCookie(name)
{
  scriviCookie(name,'',-1);
}

function dontShowMeAgain(){
	gdpSetCookie('gdpSTOP','1',4464);
        jQuery('#gdp-overlayBox').hide();
        jQuery('#gdp-modalBox').hide();
}

