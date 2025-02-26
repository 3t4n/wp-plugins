var documentCPD = function () {
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			if (xmlHttp.responseText) {
				var response = JSON.parse(xmlHttp.responseText);
				if (response.query_status && response.query_status.query_status_code === 'OK') {
					if (response.geolocation_data.country_code_iso3166alpha3 === 'NZL') {
						window.open("https://www.ausmed.co.nz/dashboard/?blogUrl=" + window.location.href, "_self");
					} else {
						window.open("https://www.ausmed.com/dashboard/?blogUrl=" + window.location.href, "_self");
					}
				} else {
					window.open("https://www.ausmed.com/dashboard/?blogUrl=" + window.location.href, "_self");
				}
			} else {
				window.open("https://www.ausmed.com/dashboard/?blogUrl=" + window.location.href, "_self");
			}
		} else {
			window.open("https://www.ausmed.com/dashboard/?blogUrl=" + window.location.href, "_self");
		}

	}
	xmlHttp.open("GET", 'https://api.ausmed.com/account/locateip', false); // true for asynchronous
	xmlHttp.send(null);

}
