(function ($) {
	'use strict';

	$(function () {
		$(".homeasap-search-input").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: 'https://api.homeasap.com/NPlay.Services.NPlayApi/api/listings/search/suggestions/' + encodeURIComponent(request.term) + '/10',
					dataType: "json",
					type: "GET",
					success: function (data) {
						response($.map(data, function (item) {
							return {
								label: item.value,
								value: item.value,
								suggest: item,
							}
						}));
					}
				});
			},
			minLength: 2,
			select: function (event, ui) {
				console.log("Selected: ", ui.item.suggest);
				this.value = '';
				var searchUrl = homeasapAutosuggestLink($(this).attr('data-agentid'), ui.item.suggest)
				if ($(this).attr('data-mode') === 'modal') {
					openIFrameModal(searchUrl);
				} else {
					window.open(searchUrl, '_blank');
				}
				return false;
			}
		});

		function homeasapAutosuggestLink(agentId, suggestion) {
			var locationStr = suggestion.location.lat + ',' + suggestion.location.lon + ',6200';

			var route = 'https://homeasap.com/' + (agentId ? agentId + '/' : '') + 'search/map/' + locationStr +
				(
					(suggestion.location.locType === 'A') ?
						(agentId ? '/' + suggestion.location.locId : '/listing/' + suggestion.location.locId)
						: ''
				) + '?ob=1';
			return route;
		}

		function openIFrameModal(url) {
			var iframeHTML = '<div class="homeasap-fullscreen-iframe-container" onclick="window.jQuery(\'.homeasap-fullscreen-iframe-container\').remove()"><div width="800" class="homeasap-fullscreen-iframe-popup-container"><img src="data:image/gif;base64,R0lGODlhEQARAIAAAODn7P///yH5BAEHAAEALAAAAAARABEAAAIqBIKpab3v3EMyVHWtWZluf0za0XFNKDJfCq5i5JpomdUxqKLQVmInqyoAADs=" class="homeasap-fullscreen-iframe-popup-close" onclick="window.jQuery(\'.homeasap-fullscreen-iframe-container\').remove()"><iframe src="' + url + '&target=self' + '" frameborder="0" height="100%" width="100%" style="border: 0px; -webkit-mask-image: -webkit-radial-gradient(center, circle cover, white, black); transform: translateZ(0px);"></iframe></div></div>';
			$(iframeHTML).appendTo($('body'));
		}
	});

})(jQuery);
