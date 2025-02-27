/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */

/* global jQuery, MakeFrontEnd */

var MakeFrontEnd = MakeFrontEnd || {};

(function($, MakeFrontEnd) {
	'use strict';

	if ( ! MakeFrontEnd ) { return; }

	/**
	 * MakeFrontEnd
	 *
	 * Starts with the following data properties added via script localization:
	 * - fitvids
	 */

	var Make = $.extend(MakeFrontEnd, {
		/**
		 * Object for storing data.
		 *
		 * @since 1.0.0
		 */
		cache: {},

		/**
		 * Initialize the script.
		 *
		 * @since 1.0.0
		 */
		init: function() {
			this.cacheElements();
			this.bindEvents();
		},

		/**
		 * Cache jQuery objects for later.
		 *
		 * @since 1.0.0
		 */
		cacheElements: function() {
			this.cache = {
				$window: $(window),
				$document: $(document)
			};
		},

		/**
		 * Set up event listeners.
		 *
		 * @since 1.0.0
		 */
		bindEvents: function() {
			var self = this;

			self.cache.$document.ready(function() {
				self.fitVidsInit( $('.ttfmake-embed-wrapper') );
				self.handleGalleryOverlayOnMobileDevices();
			} );

			// Infinite Scroll support
			self.cache.$document.on('post-load', function() {
				// FitVids
				var $elements = $('.ttfmake-embed-wrapper:not(:has(".fluid-width-video-wrapper"))');
				self.fitVidsInit($elements);
			});
		},

		/**
		 * Initialize FitVids.
		 *
		 * @since  1.0.0
		 *
		 * @return void
		 */
		fitVidsInit: function($elements) {
			// Make sure lib is loaded.
			if (! $.fn.fitVids) {
				return;
			}

			var self = this,
				$container = $elements || $('.ttfmake-embed-wrapper'),
				selectors = self.fitvids.selectors || '',
				args = {};

			// Get custom selectors
			if (selectors) {
				args.customSelector = selectors;
			}

			// Run FitVids
			$container.fitVids(args);

			// Fix padding issue with Blip.tv. Note that this *must* happen after Fitvids runs.
			// The selector finds the Blip.tv iFrame, then grabs the .fluid-width-video-wrapper div sibling.
			$container.find('.fluid-width-video-wrapper:nth-child(2)').css({ 'paddingTop': 0 });
		},

		/**
		 * Handle gallery overlay show / hide on mobile devices "hover".
		 *
		 * @since  1.8.6
		 *
		 * @return void
		 */
		handleGalleryOverlayOnMobileDevices: function() {
			$('.builder-section-gallery .builder-gallery-item').on('touchstart', function() {
				var $this = $(this);

				if ($this.find('.builder-gallery-content').length) {
					$this.addClass('touchstart');
				}
			});

			$('body:not(.builder-gallery-item)').on('touchstart', function() {
				$('.builder-gallery-item').removeClass('touchstart');
			});
		}
	});

	Make.init();
})(jQuery, MakeFrontEnd);
