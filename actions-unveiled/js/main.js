// Reposition the action list soemwhere better
(function($) {
	$(document).ready(function() {
		window['be_mch_actunv'] = function() {
			var ol = $('OL.be_mch_actunv').detach();
			
			// On frontend actions list lays inside a comment node after html tag
			if (ol.length != 1) {
				for (var  i = document.childNodes.length; i > 0;) {
					var node = document.childNodes[--i];
					
					if (typeof(Node) == 'unefined' || typeof(Node.COMMENT_NODE) == 'undefined') {
						alert('"Actions unveiler" error:\r\n\
Try with a better web browser.');
						return;
					}
					
					if (node.nodeType != Node.COMMENT_NODE) {
						continue;
					}
					
					if (node.textContent.indexOf('actunv') !== 0) {
						continue;
					}
					
					ol = $(node.textContent.substr(6));
					
					break;
				}
			}
			
			$('BODY,#wpcontent .wrap').last().append(ol.addClass('show'));
			
			window['be_mch_actunv'] = function() {
				$('OL.be_mch_actunv').toggleClass('show');
			}
		}
	});
})(jQuery);