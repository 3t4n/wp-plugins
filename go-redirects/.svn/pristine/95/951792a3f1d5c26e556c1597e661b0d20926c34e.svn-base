(function() {

	jQuery(function($) {

		$('.gr-copy').each(function() {
			
			var $this = $(this);
			var clipboard = new ClipboardJS($this[0]);

			clipboard.on('success', function(ev) {
				$this.next().show().delay(1000).fadeOut();
			});

			clipboard.on('error', function(ev) {
				window.prompt(grAdminL10n.promptText, ev.text);
			});
		});

	});

})();
