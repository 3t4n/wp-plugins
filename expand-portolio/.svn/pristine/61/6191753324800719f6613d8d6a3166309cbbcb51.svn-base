/**
 * Lamped.co.uk General Support Library
 * Copyright 2011 Lamped.co.uk.
 *
 * @author Marc Gray support@lamped.co.uk
 * @version 1.0.1
 *
 * This library provides a number of browser compatibility fixes and common
 * utility functions.
 */
(function($, d){
	lamped = {
		// Used to stop double ready calls and allow ready calls after ready
		domReadyDone: false,
		cssReadyDone: false,
		allReadyDone: false,
		pauseCount: 0,

		// Non-double-firing version of $.ready
		domReadyFuncs: [],

		// Webkit safe ready after CSS is loaded
		cssReadyFuncs: [],

		// Overlay/Flash compatibility, meaning ready to load flash content
		allReadyFuncs: [],

		init: function() {
			if (lamped.domReadyDone)
				return;
			lamped.domReadyDone = true;

			$('body').append('<div id="lamped-csscheck"></div>');

			var fns = lamped.domReadyFuncs;
			for(var i=0; i<fns.length; i++)
				fns[i]('dom');

			if (d.getElementById && (navigator.userAgent.match(/Safari\//) != null) && (d.getElementById('lamped-csscheck')))
				lamped.checkCss()
			else
				lamped.cssReadyNow();
		},

		/**
		 * Calls f when the DOM is ready
		 */
		domReady: function(f) {
			if (lamped.domReadyDone)
				f('dom')
			else
				lamped.domReadyFuncs.push(f);
		},

		/**
		 * Calls f when the CSS is loaded
		 */
		cssReady: function(f) {
			if (lamped.cssReadyDone)
				f('css')
			else
				lamped.cssReadyFuncs.push(f);
		},

		checkCss: function() {
			if (parseInt($('#lamped-csscheck').css('top')) == 4)
				lamped.cssReadyNow()
			else
				setTimeout(lamped.checkCss, 50);
		},

		cssReadyNow: function() {
			lamped.cssReadyDone = true;
			$('#lamped-csscheck').remove();
			var fns = lamped.cssReadyFuncs;
			for(var i=0; i<fns.length; i++)
				fns[i]('css');
		},

		/**
		 * Calls f when pre-flash content is ready (like overlays)
		 */
		allReadyFuncs: function(f) {
			if (lamped.allReadyDone)
				f('all')
			else
				lamped.allReadyFuncs.push(f);
		},

		pause: function() {
			lamped.pauseCount++;
		},

		resume: function() {
			lamped.pauseCount--;
			if (!lamped.pauseCount) {
				lamped.allReadyDone = true;
				var fns = lamped.allReadyFuncs;
				for(var i=0; i<fns.length; i++)
					fns[i]('all');
			}
		}
	}

	$(lamped.init);
})(jQuery, document);