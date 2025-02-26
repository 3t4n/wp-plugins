/*
 * adscaped WordPress Plugin JavaScript Include
 * 
 */
var adscaped_serve_url = "http://serve.adscaped.com/g/";

// request ad and insert it into div (ajax)
function request_ad(id, adElement){
	$.ajax({
	url: adscaped_serve_url+id+".json" ,
	context: document.body,
	crossDomain: true,
	dataType: "jsonp",
	success: function(data) {
		$('#'+adElement).html('<a href="http://serve.adscaped.com/r/'+data.id+'?si='+data.si+'" target="_blank">'+data.title+'</a><span class="asc_adcontent_small">served by <a href="http://adscaped.com" target="_blank" style="display:inline">adscaped</a></span>');
	}
	});
	
}

