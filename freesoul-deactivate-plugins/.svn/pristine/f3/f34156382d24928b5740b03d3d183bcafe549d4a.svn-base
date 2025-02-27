jQuery(document).ready(function($){
	
	performance.getEntriesByType('navigation')[0].nextHopProtocol
	
	var active_plugins = JSON.parse(eos_dp_optimization_integration.active_plugins);
	$(active_plugins).each(function(){
		$(document).delegate(this.js,'click',function(){
			eos_dp_alert_concatenation(this);
		});
		$(document).delegate(this.css,'click',function(){
			eos_dp_alert_concatenation(this);
		});
		$(document).delegate('.eos-dp-close-concat','click',function(){
			$(this).closest('.eos-dp-concat-warning').remove();
		});
		$(document).delegate('.eos-dp-never-again-concat','click',function(){
			$(this).closest('.eos-dp-concat-warning').remove();
			$.ajax({
				type : "POST",
				url : eos_dp_optimization_integration.ajax_url,
				data : {
					"nonce" : eos_dp_optimization_integration.nonce,
					"msg" : 'concatenation',
					"action" : 'eos_dp_msg_never_again'
				}
			});			
			
			
			
			
			
		});
		eos_dp_alert_concatenation(this.js);
	});
});
function eos_dp_alert_concatenation(el){
	jQuery('.eos-dp-concat-msg').attr('style','display:none');
	if(jQuery(el).is(':checked')){
		if('h2' === eos_dp_is_http2()){
			msg = eos_dp_optimization_integration.msg_http2;
		}
		else if('unknown' === eos_dp_optimization_integration.msg_http1){
			msg = eos_dp_optimization_integration.msg_unkown;
		}
		else{
			msg = eos_dp_optimization_integration.msg_http1;
		}
		if(jQuery('.eos-dp-concat-warning').length < 1){
			var style = 'box-shadow:2px 2px #D3C4B8;margin-left:-200px;-o-transform:translateY(-50%);-ms-transform:translateY(-50%);-moz-transform:translateY(-50%);-webkit-transform:translateY(-50%);transform:translateY(-50%);position:fixed;left:50%;top:50%;background-color:#fff;color:#000;z-index:999;padding:0 20px 20px 20px',
				popup = '<div class="eos-dp-concat-warning" style="' + style + '">';
			popup += '<div style="height:20px;background-color:#D3C4B8;margin-left:-20px;margin-right:-20px;margin-bottom:20px"></div>';
			popup += '<div style="margin-bottom:32px;width:300px">' + msg + '</div>';
			popup += '<div style="margin-bottom:32px"><a class="eos-dp-learn-more" href="' + eos_dp_optimization_integration.learn_more_url + '" target="_blank" rel="noopener">' + eos_dp_optimization_integration.learn_more + '</a></div>';
			popup += '<div>';
			popup += '<span class="eos-dp-never-again-concat button">' + eos_dp_optimization_integration.never_again + '</span>';
			popup += ' <span class="eos-dp-close-concat button">' + eos_dp_optimization_integration.close + '</span>';
			
			popup += '</div>';
			jQuery('body').append(popup);
		}
	}
}

function eos_dp_is_http2(){
	var output = false;
	if ( window.performance && performance.timing.nextHopProtocol ) {
		output = performance.timing.nextHopProtocol;
	} 
	else if (window.performance && window.performance.getEntries) {
		output = performance.getEntries()[0].nextHopProtocol;
	} 
	else if ( window.chrome && window.chrome.loadTimes ) {
		output = window.chrome.loadTimes().connectionInfo;
	}
	else{
		output = 'unknown';
	}
	return output;
}	