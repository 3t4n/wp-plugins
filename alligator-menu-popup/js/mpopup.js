document.addEventListener('DOMContentLoaded', function() {

	var mpopupLinks = document.querySelectorAll('.mpopup > a');

	mpopupLinks.forEach(function(mpopupLink) {

		mpopupLink.addEventListener('click', function(event) {
			event.preventDefault();

			var w = mPopupParams.mpWidth;
			var h = mPopupParams.mpHeight;
			var s = mPopupParams.mpScroll;

			var left = (window.screen.width / 2) - (w / 2);
			var top = (window.screen.height / 2) - (h / 2);

			var mpopupWindow = window.open(mpopupLink.href, '', 'scrollbars=' + s + ',resizable=yes,width=' + w + ',height=' + h + ',top=' + top + ',left=' + left);

			if (mpopupWindow) {
				mpopupWindow.focus();
			}
		});
	});
});