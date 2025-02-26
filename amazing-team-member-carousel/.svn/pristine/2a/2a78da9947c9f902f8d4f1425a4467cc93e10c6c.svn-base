jQuery(function($){
			// bind event handlers to modal triggers
			$('body').on('click', '.trigger', function(e){
				e.preventDefault();
				$('#test-modal').modal().open();
			});

			// attach modal close handler
			$('.modal .close').on('click', function(e){
				e.preventDefault();
				$.modal().close();
			});

			// below isn't important (demo-specific things)
			$('.modal .more-toggle').on('click', function(e){
				e.stopPropagation();
				$('.modal .more').toggle();
			});
		});