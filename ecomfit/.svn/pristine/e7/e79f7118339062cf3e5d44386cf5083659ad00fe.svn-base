var ecomfit_info_website = {
	domain: document.domain,
	url: document.URL,
	location_href : document.location.href,
	location_origin : document.location.origin,
	location_hostname : document.location.hostname,
	location_host : document.location.host,
	location_pathname : document.location.pathname
};

function ecomfitLoginParent(webId, token, meteorToken) {
	var form = document.createElement("form");
	var webIdElement = document.createElement("input");
	var tokenElement = document.createElement("input");
	var meteorTokenElement = document.createElement("input");

	form.method = "POST";
	form.action = window.location.href;

	webIdElement.value = webId;
	webIdElement.name = 'webId';
	webIdElement.type = 'hidden';
	form.appendChild(webIdElement);

	tokenElement.value = token;
	tokenElement.name = 'token';
	tokenElement.type = 'hidden';
	form.appendChild(tokenElement);

	meteorTokenElement.value = meteorToken;
	meteorTokenElement.name = 'meteorToken';
	meteorTokenElement.type = 'hidden';
	form.appendChild(meteorTokenElement);

	document.body.appendChild(form);

	form.submit();
}


var ecomfit_interval;
function ecomfitOpenChildWindow(url_ecomfit) {
	var urlPopup = url_ecomfit + 'wordpress/login?domain=' + ecomfit_info_website.domain;
	var child = window.open(urlPopup,'Ratting','width=800,height=600,0,status=0');
	ecomfit_interval = setInterval(function(){
		child.postMessage({ message: "requestResult"}, "*");
	}, 500);
}

window.addEventListener("message", function(event) {
	if ((event.data.message === "deliverResult") && event.data.result.status) {
		var data = event.data.result.data;
		var webId = '';
		var token = '';
		var meteorToken = '';
		if (data.webId !== undefined) {
			webId = data.webId;
		}
		if (data.token !== undefined) {
			token = data.token;
		}
		if (data.meteorToken !== undefined) {
			meteorToken = data.meteorToken;
		}
		ecomfitLoginParent(webId, token, meteorToken);
		event.source.close();
		clearInterval(ecomfit_interval);
	}
});
