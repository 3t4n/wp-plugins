(function( $ ) {
	'use strict';

	function embedJavascript(key, version) {
		var mountpoint = document.querySelector('body');
		// Insert the integration script, but without the defer attribute
		var scriptNode = document.createElement('script');
		scriptNode.setAttribute('type', 'text/javascript');
		scriptNode.setAttribute('src', 'https://chat.aiaibot.com/bootstrap.js');
		scriptNode.setAttribute('data-aiaibot-key', key);
		scriptNode.setAttribute('data-aiaibot-integration', 'wordpress');
		scriptNode.setAttribute('data-aiaibot-integration-version', version);
		mountpoint.insertAdjacentElement('beforeend', scriptNode);
	}

	$(function() {
		if (aiaibotData && aiaibotData['key']) {
			embedJavascript(aiaibotData['key'], aiaibotData['version']);
		}
	});
})( jQuery );
