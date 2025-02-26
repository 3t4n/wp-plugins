(function($) {
	"use strict";

	var AnyPostsWidget = function() {
		var tplSelectPost = wp.template('apw-widget-select-post');

		this.initSortable = function() {
			$('.js-apw-widget-settings-posts').sortable();
		};

		this.initAddBtn = function() {
			$(document).on( 'click', '.js-apw-widget-settings-add-btn', function() {
				var elPosts = $(this).closest('.js-apw-widget-settings').find('.js-apw-widget-settings-posts'),
					elPostName = elPosts.attr('data-select-post-name');

				elPosts.append( tplSelectPost({ name: elPostName }) );
				elPosts.find('li:last-child select').focus();
			});
		};

		this.initRemoveBtn = function() {
			$(document).on('click', '.js-apw-widget-settings-remove-btn', function(e) {
				e.preventDefault();

				$(this).closest('li').remove();
			});
		};

		this.init = function() {
			this.initSortable();
			this.initAddBtn();
			this.initRemoveBtn();
		};

		this.init();
	};

	$(document).ready(function() {
		var anyPostsWidget = new AnyPostsWidget();

		$( document ).ajaxStop( function() {
			anyPostsWidget.initSortable();
		} );
	});
})(jQuery);
