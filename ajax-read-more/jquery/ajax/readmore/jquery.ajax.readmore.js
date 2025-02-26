var backgroundAction = false; 

jQuery.fn.AJAXReadMore = function (options) {
	var
		$ = jQuery,
		options = $.extend({ 
			animateSpeed: 'slow',
			errorMessage: "Error.<br/>Try again later.",
			errorClass: "loading-error",
			loadingClass: "loading",
			spacerClass: "loading-spacer",
			loadedClass: "loaded",
			contentElSelector: ".entry-part",
			moreElSelector: ".more-link",
			moreContainerSelector: ".more-link-container",
			onUpdateEvent: "onupdate",
			parentScrollableEl: $("html,body"),
			scroll: true,
			scrollToSelector: ".entry-header",
			scrollLowBound: 0,
			ajaxData: {
			}
		}, options); 

	return this.each(function() {
		var post = {
			data: $.extend(options.ajaxData, {
				'AJAX-mode':'1'
			}),
			moreLink: $(options.moreElSelector,this),
			navigation: $(options.moreContainerSelector,this)
				.add(options.moreElSelector,this)
			,
			content: $(options.contentElSelector,this),
			el: $(this)
		},
		busy = false;
		if (!(post.content.length)) post.content=post.el;

		post.moreLink
		.unbind('click')
		.click(function(e) {
			if (busy) return false;
			var scroll = (options.scroll) && !(backgroundAction);
			busy = true;

			post.scrollTo = $(options.scrollToSelector,post.el);
			if (!(post.scrollTo.length)) post.scrollTo=post.el;

			var newContent = post.content
				.clone(true)
				.hide()
				.addClass(options.loadingClass)
				.html("")
				.insertAfter(post.content)
			, spacerHeight1 = options.parentScrollableEl.scrollTop() + options.parentScrollableEl.height() - newContent.offset().top 
			, spacerHeight = (spacerHeight1 > 0) ? spacerHeight1 : 0 
			, spacer = newContent
				.clone()
				.addClass(options.spacerClass)
				.addClass(options.loadingClass)
				.insertBefore(newContent)
				.animate(
					{height:(spacerHeight) + "px"},
					options.animateSpeed 
				)
				.show()
			;
			post.navigation.addClass(options.loadingClass);
			if (scroll) {
				if ((post.scrollTo.offset().top - options.parentScrollableEl.scrollTop() > options.scrollLowBound)) {
					options.parentScrollableEl.animate({scrollTop: post.scrollTo.offset().top+ "px"}, options.animateSpeed);
				};
			};
			$.when(
				$.ajax ({
					type: "GET",
					url: post.moreLink.attr('href'),
					dataType: "html",
					cache: true,
					data: post.data
				}),
				post.scrollTo,
				options.parentScrollableEl
			).then(
				/*success:*/ function(args) {
					/*args: [ data, "success", jqXHR ]*/
					var data = args[0];
					var dataObj;
					var bodyEl = {length: 0};
					try {
						dataObj = $(data);
						bodyEl = dataObj.find('body');
					} catch(e) {};
					var dt = {
						url: post.moreLink.attr('href'),
						referrer: $(location).attr('href')
					};
					var textStatus = args[1];
					
					if (bodyEl.length) {
						dt = $.extend(dt, {
							body: bodyEl.html(),
							title: dataObj.find('title').text()
						});
					} else {
						dt = $.extend(dt, {
							body: data
						});
					};
					
					post.navigation
						.addClass(options.loadedClass)
						.removeClass(options.loadingClass)
					;
					newContent
						.html(dt.body)
						.show()
						.removeClass(options.loadingClass)
						.slideDown(options.animateSpeed)
						.trigger(options.onUpdateEvent)
						.trigger('counter.hit', dt)
					;
					spacer
						.addClass(options.loadedClass)
						.removeClass(options.loadingClass)
						.slideUp(options.animateSpeed, function(){
							$(this).remove();
						})
					;
					busy = false;
				},
				/*error:*/ function() {
					/*args: [ request, "error", jqXHR ]*/
					var request = args[0], textStatus = args[1];
					newContent.remove();
					post.navigation.addClass(options.errorClass);
					spacer
						.hide()
						.addClass(options.errorClass)
						.removeClass(options.loadingClass)
						.html(options.errorMessage)
						.fadeIn(options.animateSpeed)
						.delay(1000)
						.fadeOut(options.animateSpeed)
						.delay(100)
						.hide(options.animateSpeed, function(){
							$(this).remove();
							post.navigation
								.removeClass(options.loadingClass)
								.removeClass(options.errorClass)
							;
						})
					;
					busy = false;
				}
			);
			return false;
		});
	});
};