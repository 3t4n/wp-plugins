jQuery(function($){

	if ( !$('#gtpm-menu')[0] ) { return; }

	var GTPM_MENU_WIDTH = parseInt(GTPM_OPTIONS && GTPM_OPTIONS.menuWidth || 250, 10),
		menuBar = '';

	GTPM_OPTIONS.menuBarStyle = GTPM_OPTIONS.menuBarStyle || 'bar'; // default value, just in case

	function getBarImage() {
		var attrs = [
			'width="'+GTPM_OPTIONS.menuBarImageW+'px"',
			'height="'+GTPM_OPTIONS.menuBarImageH+'px"'
		];

		var dpr = ( typeof window.devicePixelRatio !== 'undefined' ) ? window.devicePixelRatio : 1;

		if ( dpr == 1 ) {
			attrs.push('src="'+GTPM_OPTIONS.menuBarImageUrl+'"');
		} else {
			// retina
			attrs.push('src="'+GTPM_OPTIONS.menuBar2xImageUrl+'"');
		}

		return '<img '+attrs.join(' ')+'>';

	}

	if ( ['bar','fixed'].indexOf(GTPM_OPTIONS.menuBarStyle) >= 0 ) {
		var title = GTPM_OPTIONS.menuBarImage ? getBarImage() : '<span>'+GTPM_OPTIONS.menuTitle+'</span>';

		var mbiPosStyle = GTPM_OPTIONS.menuBarImage ? ' style="text-align: '+GTPM_OPTIONS.menuBarImagePos+'"' : '';

		menuBar = [
			'<div id="gtpm-menu-button" class="gtpm-menu-bar"'+mbiPosStyle+'>',
				'<i class="gtpmb-icon gtpmb-icon-reorder gtpm-menu-icon"></i> '+title,
				// @ifdef PRO
				'<i id="extra-btn" class="gtpm-icon '+GTPM_OPTIONS.extraMenuIcon+'"></i>',
				// @endif
			'</div>'
		].join('');
	} else if ( ['square-left', 'square-right'].indexOf(GTPM_OPTIONS.menuBarStyle) >= 0 ) { // sqaure button
		var posClass = 'gtpm-menu-btn-'+GTPM_OPTIONS.menuBarStyle;
		menuBar = [
			'<div id="gtpm-menu-button" class="gtpm-menu-bar gtpm-menu-btn-square '+posClass+'">',
				'<i class="gtpmb-icon gtpmb-icon-reorder gtpm-menu-icon"></i>',
			'</div>'
		].join('');
	}

	// Transforming layout
	var children = $(document.body).children(),
		layout = $([
			'<div class="gtpm-container">',
				'<!-- Push Wrapper -->',
				'<div class="gtpm-pusher" id="gtpm-pusher">',					
					'<div class="gtpm-lining"></div>',
					'<div class="gtpm-scroller"><!-- this is for emulating position fixed of the nav -->',
						(GTPM_OPTIONS.menuBarStyle !== 'bar') ? menuBar : '',
						'<div class="gtpm-scroller-inner">',
							(GTPM_OPTIONS.menuBarStyle === 'bar') ? menuBar : '',
							'<!-- site content goes here -->',
						'</div><!-- /scroller-inner -->',
					'</div><!-- /scroller -->',
					'<div id="gtpm-scroll-top-btn"><i class="gtpm-icon gtpm-icon gtpm-icon-caret-up"></i> Top</div>',
					// @ifdef PRO
					'<div class="gtpm-extra-menu"></div>',
					// @endif
				'</div><!-- /pusher -->',
			'</div><!-- /container -->'
		].join(''));

		layout.appendTo(document.body);

	var contentWrap = $('.gtpm-scroller-inner', layout),
		// @ifdef PRO
		extraMenu = $('.gtpm-extra-menu', layout),
		extraBtn = $('#extra-btn', layout),
		// @endif
		menuParent = $('#gtpm-pusher', layout);

	$('.gtpm-original-menu-container').hide();

	$('.gtpm-level ul').niceScroll();

	$('#gtpm-menu')
		.appendTo(menuParent)
		.show();

	$('html').addClass('gtpm');

	var b = $('body');

	contentWrap.css('padding', b.css('padding'));

	$('.gtpm-scroller-inner').css({
		paddingTop: b.css('paddingTop'),
		paddingRight: b.css('paddingRight'),
		paddingBottom: b.css('paddingBottom'),
		paddingLeft: b.css('paddingLeft')
	});

	b.css('padding', 0);

	// @ifdef PRO
	setTimeout(function() {
		$('#gtpm-sidebar-wrap').appendTo($('.gtpm-extra-menu'));
		setTimeout(function() {
			$('#gtpm-sidebar-wrap').niceScroll();
		}, 1);
	}, 1);
	// @endif

	// hash-links handlers

	function gtpmScrollToEl(el, hash) {
		if ( !el && !el[0] ) { return; }

		var scroll = contentWrap.scrollTop(),
			top = el.position().top, // for some reason, position() gets top position minus scrollTop of the parent
			realTop = scroll + top,
			$target = el;

		contentWrap.animate({ scrollTop: realTop }, 500);
		$target.removeAttr('id');
		window.location.hash = hash;
		$target.attr('id', hash.replace(/^#/, ''));
	}

	var hash = window.location.hash

	if ( hash ) {
		var hashTarget = $(hash);
		if ( hashTarget[0] ) {
			hashTarget.removeAttr('id');
			setTimeout(function(){
				hashTarget.attr('id', hash.replace(/^#/, ''));
				gtpmScrollToEl(hashTarget, hash);
			}, 100);
		}
	}

	$('[href^="#"]').click(function(e){		
		e.preventDefault();

		gtpmScrollToEl($(this.hash), this.hash);
	});

	// ---

	children.appendTo(contentWrap);

	if ( GTPM_OPTIONS.menuBarStyle === 'fixed' ) {
		contentWrap.css({ paddingBottom: $('#gtpm-menu-button').outerHeight()+'px' });
	}

	if ( GTPM_OPTIONS.hideOrigMenu ) {
		$(GTPM_OPTIONS.origMenuSelector).hide();
	}

	var levelStack = [];

	function slide(el, val) {
		el = $(el)[0];
		var st = el.style;

		function getCurretValue() {			
			var currentSt = st.webkitTransform || st.MozTransform || st.transform || '',
				currentVal = currentSt.match(/translate3d\(([\-\d]+)(px|%),/i);
				currentVal = currentVal ? parseInt(currentVal[1], 10) : 0;
			return currentVal;
		}

		var valParsed = val.match(/^(-=|\+=|-|)(\d+)(px|%)/i),
			vpOp = valParsed[1] || '=',
			vpVal = parseInt(valParsed[2], 10) || 0,
			vpUnits = valParsed[3] || 'px',
			cv;

		switch ( vpOp ) {
			case '-=':
				cv = getCurretValue();
				vpVal = cv - vpVal;
				break;
			case '+=':
				cv = getCurretValue();
				vpVal = cv + vpVal;
				break;
			case '-':
				vpVal = vpVal * -1;
				break;
		}

		var s = 'translate3d('+vpVal+vpUnits+', 0px, 0px)';
		if ( typeof st.webkitTransform !== 'undefined' ) st.webkitTransform = s;
		if ( typeof st.MozTransform !== 'undefined' ) st.MozTransform = s;
		if ( typeof st.transform !== 'undefined' ) st.transform = s;
	}

	function resetLevel(el) {
		if (!el) { return; }
		el = el[0];
		var st = el.style;
		if ( typeof st.webkitTransform !== 'undefined' ) { st.webkitTransform = ''; }
		if ( typeof st.MozTransform !== 'undefined' ) { st.MozTransform = ''; }
		if ( typeof st.transform !== 'undefined' ) { st.transform = ''; }
	}

	// -------------------------------------

	/**
     * Calculating top offset for the list inside each menu level
	 */
	$('.gtpm-level').each(function(){
		var lvl = $(this);
		var headerHeight = lvl.find('> h2').outerHeight(),
			backBtnHeight = lvl.find('> .gtpm-back').outerHeight() || 0,
			searchFieldHeight = lvl.find('> .gtpm-search').outerHeight() || 0;

		lvl.find('.gtpm-list-wrap').css({ top: (headerHeight+backBtnHeight+searchFieldHeight)+'px' });
	});

	function updateOffsets() {
		var scrollerLevelsOffset;

		// getting room for home level
		if ( GTPM_OPTIONS.overlapMode && GTPM_OPTIONS.showHomeLevel && levelStack.length >= 2 ) {
			scrollerLevelsOffset = 45;
		} else {
			scrollerLevelsOffset = GTPM_OPTIONS.overlapMode ? 0 : (levelStack.length-1)*45;
		}			

		var pushScroller = ( levelStack.length === 0 ) ? 0 : GTPM_MENU_WIDTH + scrollerLevelsOffset,
			pushLevel,
			parentLevelsOffset;


		for (var i = 0; i < levelStack.length; i++) {
			// stacking only home level
			if ( GTPM_OPTIONS.overlapMode && GTPM_OPTIONS.showHomeLevel && levelStack.length >= 2 && i == 0 ) {
				parentLevelsOffset = 45;
			} else {
				parentLevelsOffset = GTPM_OPTIONS.overlapMode ? 0 : (levelStack.length-i-1)*45;	
			}
			
			pushLevel = GTPM_MENU_WIDTH + parentLevelsOffset;
			slide(levelStack[i], pushLevel+'px');
		}

		if ( !levelStack.length ) {
			$('.gtpm-scroller').removeClass('gtpm-pushed');
			$('.gtpm-lining').removeClass('gtpm-lining-pushed');
		}

		// @ifdef PRO
		if ( extraMenu.hasClass('gtpm-extra-pushed') ) {
			extraMenu.removeClass('gtpm-extra-pushed');
		}
		// @endif

		slide('.gtpm-scroller', pushScroller+'px');	
	}

	function pushLevel(el) {
		el = $(el);
		if ( levelStack.length ) {
			levelStack[levelStack.length-1].addClass('gtpm-level-overlay');	
		}		
		var zIndex = (levelStack.length+1) * 10;
		levelStack.push(el.css({ zIndex: zIndex }));
		updateOffsets();
	}

	function popLevel() {
		var lvl = levelStack.pop()
		resetLevel(lvl);
		if ( levelStack.length ) { levelStack[levelStack.length-1].removeClass('gtpm-level-overlay'); }

		updateOffsets();
		return lvl;
	}

	function closeMenu() {
		$(levelStack).each(function(i, lvl){
			resetLevel(lvl);
			lvl.removeClass('gtpm-level-overlay');
		});	
		levelStack = [];
		updateOffsets();
	}
	
	function toggleMenu(e) {
		var scroller = $('.gtpm-scroller');
		if ( scroller.hasClass('gtpm-pushed') && !$(e.target).closest('.gtpm-menu')[0] ) {
			e.stopPropagation();
			e.preventDefault();
			closeMenu();				
		} else if ( !scroller.hasClass('gtpm-pushed') && 
			( $(e.target).closest('.gtpm-menu-bar')[0] || $(e.target).hasClass('gtpm-menu-bar') )
		) {
			scroller.addClass('gtpm-pushed');
			$('.gtpm-lining').addClass('gtpm-lining-pushed');
			pushLevel('#gtpm-menu-level-0');
			e.stopPropagation();
			e.preventDefault();
		}
	}

	$('#gtpm-menu-button').on('tap', toggleMenu);

	// @ifdef PRO

	var rAF = (function(){
		return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) { window.setTimeout(callback, 1000 / 60); };
	})();	

	var gtpmScroller = $('.gtpm-scroller')[0];

	function update() {
		var pushScroller = GTPM_MENU_WIDTH * -1;
		gtpmScroller.className += ' gtpm-pushed';
		slide('.gtpm-scroller', pushScroller+'px');		
		extraMenu[0].className += ' gtpm-extra-pushed';
		openExtra = false;
	}

	var extraBtnClick = function(e){
		if (e) {
			e.preventDefault();
			e.stopPropagation();			
		}

		rAF(update);
	};
	extraBtn.on('tap', extraBtnClick);

	// @endif

	if ( GTPM_OPTIONS.extraMenuTrigger ) {
		$(GTPM_OPTIONS.extraMenuTrigger).on('tap', function(e){
			var scroller = $('.gtpm-scroller');
			if ( !scroller.hasClass('gtpm-pushed') ) {
				scroller.addClass('gtpm-pushed');
				$('.gtpm-lining').addClass('gtpm-lining-pushed');
				pushLevel('#gtpm-menu-level-0');
				e.stopPropagation();
				e.preventDefault();
			}
		});
	}

	// adding close trigger
	$('.gtpm-scroller').on('tap', toggleMenu);

	$('.gtpm-level li span').on('tap', function(e){
		if ( $(e.target).is('span') ) {
			e.stopPropagation();
			e.preventDefault();
			var menuId = $(this).attr('id').match(/gtpm-menu-item-(\d+)/)[1];		
			pushLevel('#gtpm-menu-level-'+menuId);
		}
	});

	$('.gtpm-level li a').on('tap', function(e){
		window.location = $(this).attr('href');
		closeMenu();
	});


	$('.gtpm-level').on('tap', function(e){
		var lvl, pureEl = $(this)[0];

		if ( $(this).hasClass('gtpm-level-overlay') ) {
			e.stopPropagation();
			e.preventDefault();
			do {
				lvl = popLevel();
			} while ( levelStack[levelStack.length-1][0] !== pureEl );
		}
	});

	$('.gtpm-back').on('tap', function(e){
		e.stopPropagation();
		e.preventDefault();
		popLevel();
	});


	if ( $('#wpadminbar')[0] ) {
		$('#wpadminbar')
			.appendTo($('.gtpm-scroller'))
			.css({position: 'absolute'});

		$('.gtpm-scroller').css({ paddingTop: $('#wpadminbar').height()+'px' })

		if ( $('.gtpm-menu-bar').hasClass('gtpm-menu-btn-square') ) {
			$('.gtpm-menu-bar').css({ top: '+='+$('#wpadminbar').height() });
		}
	}	

	// converting fixed elements to pseudo-fixed
	if ( GTPM_OPTIONS.fixedEls ) {
		$(GTPM_OPTIONS.fixedEls)
			.appendTo($('.gtpm-scroller'))
			.css({ position: 'absolute' });
	}

	// -------------------------------------

	// admin menu bar hack
	$('style').each(function(i, st){
		if ( st.textContent.match(/\*\s*html\s*(body|)\s*{\s+margin-top:\s*\d+px\s+!important/i) ) {

			st.remove();
		}
	});

});
