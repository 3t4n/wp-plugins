/**
 * FancyNav - Mobile Navigation with CSS3 Transitions
 * http://kratzik.com/fancynav
 * Copyright (c) 2020 Johann Kratzik
 * Version 1.1.0
 */


;(function($, $win) {
	'use strict';

	/* Constructor function
       ========================================================================== */
	function FancyNav(link, options) {
		this.options = options;
		this.$currentLink = link;
		this.$rootBody = $('body');

		/** Get lists to be cloned from data attributes */
		if (link.data('fancynav-add')  !== undefined) {
			this.options = $.extend({}, this.options, {add: link.data('fancynav-add')});
		}

		/** Get menu transition effects from data attributes */
		if(link.data('fancynav-animation')  !== undefined) {
			this.options = $.extend({}, this.options, {animation: link.data('fancynav-animation')});
		}

		/** Get menu opening direction from data attributes */
		if(link.data('fancynav-open')  !== undefined) {
			this.options = $.extend({}, this.options, {navOpen: link.data('fancynav-open')});
		}

		/** Get submenu transition effect from data attributes */
		if(link.data('fancynav-subnav-animation')  !== undefined) {
			this.options = $.extend({}, this.options, {subAnimation: link.data('fancynav-subnav-animation')});
		}

		/** Get the additional menu class from data attributes */
		if (link.data('fancynav-class') !== undefined) {
			this.options = $.extend({}, this.options, {navClass: link.data('fancynav-class')});
		}

		/** Get text for header from data attributes */
		if (link.data('fancynav-header') !== undefined) {
			this.options = $.extend({}, this.options, {navHeader: link.data('fancynav-header')});
		}

		/** Get the back text from data attributes */
		if (link.data('fancynav-back') !== undefined) {
			this.options = $.extend({}, this.options, {backText: link.data('fancynav-back')});
		}

		this.init();
	}

	FancyNav.prototype = {
		init: function() {
			this.initNavLinkEvents();
		},

		/* Function to init nav opener events, generate nav block and page layout
       	   ========================================================================== */
		initNavLinkEvents: function() {
			var self = this;

			this.$currentLink.on('click', function(e) {
				e.preventDefault();

				if(self.$currentLink.hasClass('fancynav-hamburger')) {
					self.$currentLink.addClass('is-active');
					setTimeout( function () {
						self.initPageLayout();
						self.generateNavBlock();
					}, 260 );
				}

				setTimeout( function () {
					self.$rootBody.addClass('fancynav-opened');
					self.initOverlay();
				}, 270 );
			});
		},

		/* Generate page wrapper and content
       	   ========================================================================== */
		initPageLayout: function() {
			this.$outerWrap = $('<div class="fancynav-outer"></div>');
			this.$innerWrap = $('<div class="fancynav-inner"></div>');
			this.$innerWrap.append(this.$rootBody.contents());
			this.$outerWrap.append(this.$innerWrap);
			this.$rootBody.append(this.$outerWrap);
		},

		/* Init overlay that is shown when nav is opened and add events
       	   ========================================================================== */
		initOverlay: function() {
			var self = this;

			this.pageOverlay = $('<div class="fancynav-overlay">');
			this.pageOverlay.on('click', function(e) {
				setTimeout(function () {
					$('.fancynav-hamburger').removeClass('is-active');
				}, self.options.hideDelay + 5);
				self.destroy();
			});

			this.$innerWrap.append(this.pageOverlay);
		},

		/* Generate nav block
       	   ========================================================================== */
		generateNavBlock: function() {
			var self = this;
			var elemId = self.$currentLink.parents('.elementor-element').data('id');

			this.$mainNavContent = $('<nav class="fancynav-mainnav"></nav>');
			if(self.options.subAnimation) {
				this.$mainNavContent.addClass('fancynav-sub-' + self.options.subAnimation);
			}
			this.$mainNav = $('<ul>');

			/** Add classes to the <body> */
			self.$rootBody.addClass('fancynav fancynav-animation-' + self.options.animation + ' fancynav-open-' + self.options.navOpen);
			if(self.options.navClass) {
				self.$rootBody.addClass(self.options.navClass);
			}

			/** Nav header */
			this.$navHeader = $('<header class="fancynav-header"></header>');

			/** Nav title */
			this.$navTitle = $('<div class="fancynav-title"></div>');
			this.$navTitle.text(self.options.navHeader);

			/** Nav closer */
			this.$navCloser = $('<span class="fancynav-close"></span>');
			this.$navCloser.on('click', function(e) {
				setTimeout(function () {
					$('.fancynav-hamburger').removeClass('is-active');
				}, self.options.hideDelay + 5);
				self.destroy();
			});

			/** Get all cloned blocks passed into the plugin, convert them to an array, loop through them and generate the navigation */
			this.navBlocksClone = this.convertIntoArray(this.options.add);
			this.navBlocksClone.forEach(function(item) {
				var navHolderClone = $(item).clone();
				self.setNavLinksFromClone(navHolderClone.contents());
			});

			/** Call the customize function to add submenu and close button functionality */
			this.customizeNavBlock();

			/** Add the generated nav components to the main nav block and the main nav block to the outer wrap */
			this.$mainNavContent
				.prepend(this.$navHeader)
				.append(this.$mainNav);
			this.$outerWrap
				.prepend(this.$mainNavContent)
				.attr('data-fancynav-id', elemId);

			/** Add the title and closer to the header */
			this.$navHeader
				.prepend(this.$navTitle)
				.append(this.$navCloser);

			/** Add classes to the nav items */
			this.listItems = $('li', this.$mainNavContent);
			this.listItems.each(function(item){
				var counter = item + 1;
				$(this).addClass('fancynav-item-' + counter);
			});
		},

		/* Function to convert comma separated values to array
       	   ========================================================================== */
		convertIntoArray: function(objInput) {
			if (typeof objInput === 'string') {
				var newarray = $.map(objInput.split(','), $.trim);
				return newarray;
			}

			return objInput;
		},

		/* Append the list items to the generated main nav
       	   ========================================================================== */
		setNavLinksFromClone: function($listItem) {
			this.$mainNav.append($listItem);
		},

		/* Customize the generated nav block
       	   ========================================================================== */
		customizeNavBlock: function() {
			var self = this;

			/** Find all the nav items that have sub navigations */
			var navLinks = this.$mainNav.find('li:has("ul")');

			navLinks.each(function() {

				var item = $(this);
				var itemLink = item.find("> a");
				var holderUl = item.find('ul').eq(0);

				/** Add a class to nav items that have sub navigations */
				item.addClass('fancynav-has-inner');

				/** Back link text */
				var backText = self.options.backText ? self.options.backText : itemLink.text();

				/** The main holder of the submenu */
				var holder = $('<div>');
				holder.addClass('fancynav-subnav');

				/** Generate the back button to return to parent menu */
				var holderLink = $('<span class="fancynav-back"></span>');
				holderLink.text(backText);
				holderLink.on('click', function(e){
					e.preventDefault();
					holder.removeClass('fancynav-subnav-active');
				});

				/** Generate a <span> to go to next level submenu */
				var spanLink = $('<span class="fancynav-next"></span>');

				/** Bind a click envent to add a class to the parent list item */
				spanLink.on('click', function(e) {
					e.preventDefault();
					if(self.options.subAnimation == 'slide-down') {
						spanLink.toggleClass('fancynav-subnav-opened');
						holderUl.slideToggle(self.options.slideDuration);
					}
					else {
						if (! holder.hasClass('fancynav-subnav-active')) {
							holder.addClass('fancynav-subnav-active');
						}
					}
				});

				/** Append the <span> to the list item */
				itemLink.append(spanLink);

				/** Append the generated subnavigation to the list item */
				if(self.options.subAnimation != 'slide-down') {
					holder.append(holderLink).append(holderUl);
					item.append(holder);
				}
				else {
					item.append(holderUl);
				}
			});

		},

		/* Destroy all components and take the page back to its initial state
       	   ========================================================================== */
		destroy: function() {
			var self = this;
			var menu = self.$rootBody.find('.fancynav-mainnav');
			self.$rootBody.removeClass('fancynav-opened');

			/** Revert all DOM modification when the main navigation back transition is completed */
			setTimeout(function() {
				self.$navCloser.off();
				self.$currentLink.removeData('FancyNav');
				self.pageOverlay.off();
				self.pageOverlay.remove();
				self.$mainNavContent.remove();
				self.$rootBody
					.removeClass('fancynav fancynav-animation-' + self.options.animation + ' fancynav-open-' + self.options.navOpen)
					.removeClass(self.options.navClass)
					.append(self.$innerWrap.contents());
				self.$outerWrap.remove();
			}, self.options.hideDelay);
		}
	};

	/* Register the plugin and define default options
	   ========================================================================== */
	$.fn.fancynav = function(options) {
		/**
		 List of built-in animations:
		 slide-top (default)
		 slide-along
		 slide-reverse
		 reveal
		 push
		 rotate-in
		 rotate-out
		 rotate-delayed
		 scale-up
		 fall-down
		 */
		options = $.extend({}, {
			add:           '.fancynav-add',     /** CSS selectors for lists that are to be added to the mobile navigation */
			animation:     'slide-top',         /** Default animation effect */
			navOpen:       'left',              /** Default opening direction */
			subAnimation:  '',                  /** Default animation effect for the submenus */
			slideDuration: 500,                 /** Default animation duration for sliding down/up submenus */
			navClass:      '',                  /** Additional class(es) added to the <body> */
			navHeader:     '',                  /** Text for the header */
			backText:      '',                  /** Back text on top of submenus to return to parent menu items */
			hideDelay:     510                  /** Timeout before the navigation and the wrappers are removed from the DOM */
		}, options);

		return this.each(function() {
			var link = $(this);
			link.data('FancyNav', new FancyNav(link, options));
		});
	};

}(jQuery, jQuery(window)));


/**
 * Initialize the widget
 */
jQuery( window ).on( 'elementor/frontend/init', function() {
	if( typeof( elementor ) != 'undefined' ) {
		elementor.hooks.addAction( 'panel/open_editor/widget/elementor-fancynav', function( panel, model, view ) {
			model.attributes.settings.on( 'change:fnav_button_effect', function() {
				setTimeout( function () {
					view.$el.find( '.fancynav-hamburger' ).addClass( 'is-active' );
				}, 500 );
				setTimeout( function () {
					view.$el.find( '.fancynav-hamburger' ).removeClass( 'is-active' );
				}, 2000 );
			} );
		} );
	}
} );


( function( $ ) {
	$( '.fancynav-hamburger' ).fancynav();
} )( jQuery );
