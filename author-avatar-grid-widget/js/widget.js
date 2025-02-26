(function ($) {
	"use strict";
	$(function () {
		$('.cuda-gravatar').hover(function (event) {

			var $this, authName, $nameDisplay;

			$this = $(this);
			authName = $this.attr('title');

			$this.removeAttr('title');

			$nameDisplay = $( '<span>', { html : authName, id: "nameDisplay", 'class': 'author-name' } );

			$this.append($nameDisplay);

			window.setTimeout(function () {$nameDisplay.addClass('show');},10);


		}, function () {
			var $nameDisplay, name;
			$nameDisplay = $("#nameDisplay");

			name = $nameDisplay.text();

			$nameDisplay.parent().attr('title',name);
			$nameDisplay.remove();
		});
	});
}(jQuery));
