(function ($) {
	var AF_Filter = function (opts) {
		this.init(opts);
	};
	AF_Filter.prototype = {
		selected: function () {
			var self = this,
				arr = this.loop($('.' + self.selected_filters));
			// Join the array with an & so we can break it later.
	        return arr.join('&');
		},
		progress: function (i) {
			// Increase the progress bar based on the value passed.
	        this.progbar.stop(true, true).animate({
	            width: i + '%'
	        }, 30);
		},
		loop: function (node) {
			// Return an array of selected navigation classes.
			var arr = [];
			node.each(function () {
				var id = $(this).data('tax');
				arr.push(id);
			});
			return arr;
		},
		filter: function (arr) {
			var self = this;
			// Return all the relevant posts...
			$.ajax({
	            url: AF_CONFIG['ajaxurl'],
	            type: 'post',
	            data: {
	                'action': 		'affilterposts',
	                'filters': 		arr,
	                'posttypes': 	AF_CONFIG['posttypes'],
	                'qo': 			AF_CONFIG['qo'],
	                'paged': 		AF_CONFIG['thisPage'],
	                '_ajax_nonce': 	AF_CONFIG['nonce']
	            },
	            beforeSend: function () {
	            	self.loader.fadeIn();
	                self.section.animate({
	                	'opacity': .4
	                }, 'slow');
	                self.progress(33);
	            },
	            success: function (html) {
	            	self.progress(80);
	                //alert('before');
	                self.section.empty();
	                self.section.append(html);
	                //alert('after');
	            },
	            complete: function () {
	            	self.section.animate({
	                	'opacity': 1
	            	}, 'slow');
	                self.progress(100);
	                self.loader.fadeOut();
	                self.running = false;
	            },
	            error: function () {}
	        });
		},
		clicker: function () {
			var self = this;
			$('body').on('click', this.links, function (e) {
		        if (self.running == false) {
		        	// Set to true to stop function chaining.
		        	self.running = true;
		            // The following line reset the qo var so that in an ajax request it page's queried object is ignored.
		            AF_CONFIG['qo'] = 'af_na';
		            // Cache some of the DOM elements for re-use later in the method.
		            var link = $(this),
		            	parent = link.parent('li'),
		            	relation = link.attr('rel');
		            if (parent.length > 0) {
		            	parent.toggleClass(self.selected_filters);
		                AF_CONFIG['thisPage'] = 1;
		            }
		            if (relation === 'next') {
		            	AF_CONFIG['thisPage']++;
		            } else if (relation === 'prev') {
		            	AF_CONFIG['thisPage']--;
		            } else if (link.hasClass('pagelink')) {
		            	AF_CONFIG['thisPage'] = relation;
		            }
		            self.filter(self.selected());
		        }
		        e.preventDefault();
		    });
		},
		init: function (opts) {
			// Set up the properties
			this.opts = opts;
			this.running = false;
			this.loader = $(this.opts['loader']);
			this.section = $(this.opts['section']);
			this.links = this.opts['links'];
			this.progbar = $(this.opts['progbar']);
			this.selected_filters = this.opts['selected_filters'];
			// Run the methods.
			this.clicker();
		}
	};
	var af_filter = new AF_Filter({
		'loader': 			'#ajax-loader',
		'section': 			'#ajax-filtered-section',
		'links': 			'.ajax-filter-label, .paginationNav, .pagelink',
		'progbar': 			'#progbar',
		'selected_filters': 'filter-selected'
	});
})(jQuery);