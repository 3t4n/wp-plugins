jQuery.fn.AJAXCounters = function(method, arg) {
	var methods = {
		bind: function(id, counter) {
			$('body')
				.delegate(
					'',
					'counter.hit.' + id,
					{
						url: $(location).attr('href'),
						title: $(document).attr('title'),
						referrer: $(document).attr('referrer'),
						params: {}
					},
					function (e, params) {
						params = $.extend(e.data, params);
						if ($.isFunction(counter.hit))
							counter.hit(params.url, params.title, params.referrer, params.params);
						return true;
					}
				)
				.delegate(
					'',
					'counter.reachGoal.' + id,
					{
						target: '',
						params: {}
					},
					function (e, params) {
						params = $.extend(e.data, params);
						if ($.isFunction(counter.reachGoal))
							counter.reachGoal(params.target, params.params);
						return true;
					}
				)
			;
			return this;
		},
		unbind: function(id) {
			$('body').undelegate(id);
			return this;
		},
		hit: function(params) {
			$('body').trigger('counter.hit', params);
			return this;
		},
		reachGoal: function(params) {
			$('body').trigger('counter.reachGoal', params);
			return this;
		}
	};

    if ( methods[method] ) {
		return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
	} else if ( typeof arg === 'object' ) {
		return methods.bind( method, arg );
	} else {
		$.error( 'Метод "' +  method + '" не найден в плагине jQuery.AJAXcounters' );
	};
};

jQuery( function() {
	jQuery().AJAXCounters('hit');
});