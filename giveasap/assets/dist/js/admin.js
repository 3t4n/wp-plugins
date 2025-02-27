/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/magnific-popup/dist/jquery.magnific-popup.js":
/*!*******************************************************************!*\
  !*** ./node_modules/magnific-popup/dist/jquery.magnific-popup.js ***!
  \*******************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*! Magnific Popup - v1.1.0 - 2016-02-20
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2016 Dmitry Semenov; */
;(function (factory) { 
if (true) { 
 // AMD. Register as an anonymous module. 
 !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "jquery")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)); 
 } else {} 
 }(function($) { 

/*>>core*/
/**
 * 
 * Magnific Popup Core JS file
 * 
 */


/**
 * Private static constants
 */
var CLOSE_EVENT = 'Close',
	BEFORE_CLOSE_EVENT = 'BeforeClose',
	AFTER_CLOSE_EVENT = 'AfterClose',
	BEFORE_APPEND_EVENT = 'BeforeAppend',
	MARKUP_PARSE_EVENT = 'MarkupParse',
	OPEN_EVENT = 'Open',
	CHANGE_EVENT = 'Change',
	NS = 'mfp',
	EVENT_NS = '.' + NS,
	READY_CLASS = 'mfp-ready',
	REMOVING_CLASS = 'mfp-removing',
	PREVENT_CLOSE_CLASS = 'mfp-prevent-close';


/**
 * Private vars 
 */
/*jshint -W079 */
var mfp, // As we have only one instance of MagnificPopup object, we define it locally to not to use 'this'
	MagnificPopup = function(){},
	_isJQ = !!(window.jQuery),
	_prevStatus,
	_window = $(window),
	_document,
	_prevContentType,
	_wrapClasses,
	_currPopupType;


/**
 * Private functions
 */
var _mfpOn = function(name, f) {
		mfp.ev.on(NS + name + EVENT_NS, f);
	},
	_getEl = function(className, appendTo, html, raw) {
		var el = document.createElement('div');
		el.className = 'mfp-'+className;
		if(html) {
			el.innerHTML = html;
		}
		if(!raw) {
			el = $(el);
			if(appendTo) {
				el.appendTo(appendTo);
			}
		} else if(appendTo) {
			appendTo.appendChild(el);
		}
		return el;
	},
	_mfpTrigger = function(e, data) {
		mfp.ev.triggerHandler(NS + e, data);

		if(mfp.st.callbacks) {
			// converts "mfpEventName" to "eventName" callback and triggers it if it's present
			e = e.charAt(0).toLowerCase() + e.slice(1);
			if(mfp.st.callbacks[e]) {
				mfp.st.callbacks[e].apply(mfp, $.isArray(data) ? data : [data]);
			}
		}
	},
	_getCloseBtn = function(type) {
		if(type !== _currPopupType || !mfp.currTemplate.closeBtn) {
			mfp.currTemplate.closeBtn = $( mfp.st.closeMarkup.replace('%title%', mfp.st.tClose ) );
			_currPopupType = type;
		}
		return mfp.currTemplate.closeBtn;
	},
	// Initialize Magnific Popup only when called at least once
	_checkInstance = function() {
		if(!$.magnificPopup.instance) {
			/*jshint -W020 */
			mfp = new MagnificPopup();
			mfp.init();
			$.magnificPopup.instance = mfp;
		}
	},
	// CSS transition detection, http://stackoverflow.com/questions/7264899/detect-css-transitions-using-javascript-and-without-modernizr
	supportsTransitions = function() {
		var s = document.createElement('p').style, // 's' for style. better to create an element if body yet to exist
			v = ['ms','O','Moz','Webkit']; // 'v' for vendor

		if( s['transition'] !== undefined ) {
			return true; 
		}
			
		while( v.length ) {
			if( v.pop() + 'Transition' in s ) {
				return true;
			}
		}
				
		return false;
	};



/**
 * Public functions
 */
MagnificPopup.prototype = {

	constructor: MagnificPopup,

	/**
	 * Initializes Magnific Popup plugin. 
	 * This function is triggered only once when $.fn.magnificPopup or $.magnificPopup is executed
	 */
	init: function() {
		var appVersion = navigator.appVersion;
		mfp.isLowIE = mfp.isIE8 = document.all && !document.addEventListener;
		mfp.isAndroid = (/android/gi).test(appVersion);
		mfp.isIOS = (/iphone|ipad|ipod/gi).test(appVersion);
		mfp.supportsTransition = supportsTransitions();

		// We disable fixed positioned lightbox on devices that don't handle it nicely.
		// If you know a better way of detecting this - let me know.
		mfp.probablyMobile = (mfp.isAndroid || mfp.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent) );
		_document = $(document);

		mfp.popupsCache = {};
	},

	/**
	 * Opens popup
	 * @param  data [description]
	 */
	open: function(data) {

		var i;

		if(data.isObj === false) { 
			// convert jQuery collection to array to avoid conflicts later
			mfp.items = data.items.toArray();

			mfp.index = 0;
			var items = data.items,
				item;
			for(i = 0; i < items.length; i++) {
				item = items[i];
				if(item.parsed) {
					item = item.el[0];
				}
				if(item === data.el[0]) {
					mfp.index = i;
					break;
				}
			}
		} else {
			mfp.items = $.isArray(data.items) ? data.items : [data.items];
			mfp.index = data.index || 0;
		}

		// if popup is already opened - we just update the content
		if(mfp.isOpen) {
			mfp.updateItemHTML();
			return;
		}
		
		mfp.types = []; 
		_wrapClasses = '';
		if(data.mainEl && data.mainEl.length) {
			mfp.ev = data.mainEl.eq(0);
		} else {
			mfp.ev = _document;
		}

		if(data.key) {
			if(!mfp.popupsCache[data.key]) {
				mfp.popupsCache[data.key] = {};
			}
			mfp.currTemplate = mfp.popupsCache[data.key];
		} else {
			mfp.currTemplate = {};
		}



		mfp.st = $.extend(true, {}, $.magnificPopup.defaults, data ); 
		mfp.fixedContentPos = mfp.st.fixedContentPos === 'auto' ? !mfp.probablyMobile : mfp.st.fixedContentPos;

		if(mfp.st.modal) {
			mfp.st.closeOnContentClick = false;
			mfp.st.closeOnBgClick = false;
			mfp.st.showCloseBtn = false;
			mfp.st.enableEscapeKey = false;
		}
		

		// Building markup
		// main containers are created only once
		if(!mfp.bgOverlay) {

			// Dark overlay
			mfp.bgOverlay = _getEl('bg').on('click'+EVENT_NS, function() {
				mfp.close();
			});

			mfp.wrap = _getEl('wrap').attr('tabindex', -1).on('click'+EVENT_NS, function(e) {
				if(mfp._checkIfClose(e.target)) {
					mfp.close();
				}
			});

			mfp.container = _getEl('container', mfp.wrap);
		}

		mfp.contentContainer = _getEl('content');
		if(mfp.st.preloader) {
			mfp.preloader = _getEl('preloader', mfp.container, mfp.st.tLoading);
		}


		// Initializing modules
		var modules = $.magnificPopup.modules;
		for(i = 0; i < modules.length; i++) {
			var n = modules[i];
			n = n.charAt(0).toUpperCase() + n.slice(1);
			mfp['init'+n].call(mfp);
		}
		_mfpTrigger('BeforeOpen');


		if(mfp.st.showCloseBtn) {
			// Close button
			if(!mfp.st.closeBtnInside) {
				mfp.wrap.append( _getCloseBtn() );
			} else {
				_mfpOn(MARKUP_PARSE_EVENT, function(e, template, values, item) {
					values.close_replaceWith = _getCloseBtn(item.type);
				});
				_wrapClasses += ' mfp-close-btn-in';
			}
		}

		if(mfp.st.alignTop) {
			_wrapClasses += ' mfp-align-top';
		}

	

		if(mfp.fixedContentPos) {
			mfp.wrap.css({
				overflow: mfp.st.overflowY,
				overflowX: 'hidden',
				overflowY: mfp.st.overflowY
			});
		} else {
			mfp.wrap.css({ 
				top: _window.scrollTop(),
				position: 'absolute'
			});
		}
		if( mfp.st.fixedBgPos === false || (mfp.st.fixedBgPos === 'auto' && !mfp.fixedContentPos) ) {
			mfp.bgOverlay.css({
				height: _document.height(),
				position: 'absolute'
			});
		}

		

		if(mfp.st.enableEscapeKey) {
			// Close on ESC key
			_document.on('keyup' + EVENT_NS, function(e) {
				if(e.keyCode === 27) {
					mfp.close();
				}
			});
		}

		_window.on('resize' + EVENT_NS, function() {
			mfp.updateSize();
		});


		if(!mfp.st.closeOnContentClick) {
			_wrapClasses += ' mfp-auto-cursor';
		}
		
		if(_wrapClasses)
			mfp.wrap.addClass(_wrapClasses);


		// this triggers recalculation of layout, so we get it once to not to trigger twice
		var windowHeight = mfp.wH = _window.height();

		
		var windowStyles = {};

		if( mfp.fixedContentPos ) {
            if(mfp._hasScrollBar(windowHeight)){
                var s = mfp._getScrollbarSize();
                if(s) {
                    windowStyles.marginRight = s;
                }
            }
        }

		if(mfp.fixedContentPos) {
			if(!mfp.isIE7) {
				windowStyles.overflow = 'hidden';
			} else {
				// ie7 double-scroll bug
				$('body, html').css('overflow', 'hidden');
			}
		}

		
		
		var classesToadd = mfp.st.mainClass;
		if(mfp.isIE7) {
			classesToadd += ' mfp-ie7';
		}
		if(classesToadd) {
			mfp._addClassToMFP( classesToadd );
		}

		// add content
		mfp.updateItemHTML();

		_mfpTrigger('BuildControls');

		// remove scrollbar, add margin e.t.c
		$('html').css(windowStyles);
		
		// add everything to DOM
		mfp.bgOverlay.add(mfp.wrap).prependTo( mfp.st.prependTo || $(document.body) );

		// Save last focused element
		mfp._lastFocusedEl = document.activeElement;
		
		// Wait for next cycle to allow CSS transition
		setTimeout(function() {
			
			if(mfp.content) {
				mfp._addClassToMFP(READY_CLASS);
				mfp._setFocus();
			} else {
				// if content is not defined (not loaded e.t.c) we add class only for BG
				mfp.bgOverlay.addClass(READY_CLASS);
			}
			
			// Trap the focus in popup
			_document.on('focusin' + EVENT_NS, mfp._onFocusIn);

		}, 16);

		mfp.isOpen = true;
		mfp.updateSize(windowHeight);
		_mfpTrigger(OPEN_EVENT);

		return data;
	},

	/**
	 * Closes the popup
	 */
	close: function() {
		if(!mfp.isOpen) return;
		_mfpTrigger(BEFORE_CLOSE_EVENT);

		mfp.isOpen = false;
		// for CSS3 animation
		if(mfp.st.removalDelay && !mfp.isLowIE && mfp.supportsTransition )  {
			mfp._addClassToMFP(REMOVING_CLASS);
			setTimeout(function() {
				mfp._close();
			}, mfp.st.removalDelay);
		} else {
			mfp._close();
		}
	},

	/**
	 * Helper for close() function
	 */
	_close: function() {
		_mfpTrigger(CLOSE_EVENT);

		var classesToRemove = REMOVING_CLASS + ' ' + READY_CLASS + ' ';

		mfp.bgOverlay.detach();
		mfp.wrap.detach();
		mfp.container.empty();

		if(mfp.st.mainClass) {
			classesToRemove += mfp.st.mainClass + ' ';
		}

		mfp._removeClassFromMFP(classesToRemove);

		if(mfp.fixedContentPos) {
			var windowStyles = {marginRight: ''};
			if(mfp.isIE7) {
				$('body, html').css('overflow', '');
			} else {
				windowStyles.overflow = '';
			}
			$('html').css(windowStyles);
		}
		
		_document.off('keyup' + EVENT_NS + ' focusin' + EVENT_NS);
		mfp.ev.off(EVENT_NS);

		// clean up DOM elements that aren't removed
		mfp.wrap.attr('class', 'mfp-wrap').removeAttr('style');
		mfp.bgOverlay.attr('class', 'mfp-bg');
		mfp.container.attr('class', 'mfp-container');

		// remove close button from target element
		if(mfp.st.showCloseBtn &&
		(!mfp.st.closeBtnInside || mfp.currTemplate[mfp.currItem.type] === true)) {
			if(mfp.currTemplate.closeBtn)
				mfp.currTemplate.closeBtn.detach();
		}


		if(mfp.st.autoFocusLast && mfp._lastFocusedEl) {
			$(mfp._lastFocusedEl).focus(); // put tab focus back
		}
		mfp.currItem = null;	
		mfp.content = null;
		mfp.currTemplate = null;
		mfp.prevHeight = 0;

		_mfpTrigger(AFTER_CLOSE_EVENT);
	},
	
	updateSize: function(winHeight) {

		if(mfp.isIOS) {
			// fixes iOS nav bars https://github.com/dimsemenov/Magnific-Popup/issues/2
			var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
			var height = window.innerHeight * zoomLevel;
			mfp.wrap.css('height', height);
			mfp.wH = height;
		} else {
			mfp.wH = winHeight || _window.height();
		}
		// Fixes #84: popup incorrectly positioned with position:relative on body
		if(!mfp.fixedContentPos) {
			mfp.wrap.css('height', mfp.wH);
		}

		_mfpTrigger('Resize');

	},

	/**
	 * Set content of popup based on current index
	 */
	updateItemHTML: function() {
		var item = mfp.items[mfp.index];

		// Detach and perform modifications
		mfp.contentContainer.detach();

		if(mfp.content)
			mfp.content.detach();

		if(!item.parsed) {
			item = mfp.parseEl( mfp.index );
		}

		var type = item.type;

		_mfpTrigger('BeforeChange', [mfp.currItem ? mfp.currItem.type : '', type]);
		// BeforeChange event works like so:
		// _mfpOn('BeforeChange', function(e, prevType, newType) { });

		mfp.currItem = item;

		if(!mfp.currTemplate[type]) {
			var markup = mfp.st[type] ? mfp.st[type].markup : false;

			// allows to modify markup
			_mfpTrigger('FirstMarkupParse', markup);

			if(markup) {
				mfp.currTemplate[type] = $(markup);
			} else {
				// if there is no markup found we just define that template is parsed
				mfp.currTemplate[type] = true;
			}
		}

		if(_prevContentType && _prevContentType !== item.type) {
			mfp.container.removeClass('mfp-'+_prevContentType+'-holder');
		}

		var newContent = mfp['get' + type.charAt(0).toUpperCase() + type.slice(1)](item, mfp.currTemplate[type]);
		mfp.appendContent(newContent, type);

		item.preloaded = true;

		_mfpTrigger(CHANGE_EVENT, item);
		_prevContentType = item.type;

		// Append container back after its content changed
		mfp.container.prepend(mfp.contentContainer);

		_mfpTrigger('AfterChange');
	},


	/**
	 * Set HTML content of popup
	 */
	appendContent: function(newContent, type) {
		mfp.content = newContent;

		if(newContent) {
			if(mfp.st.showCloseBtn && mfp.st.closeBtnInside &&
				mfp.currTemplate[type] === true) {
				// if there is no markup, we just append close button element inside
				if(!mfp.content.find('.mfp-close').length) {
					mfp.content.append(_getCloseBtn());
				}
			} else {
				mfp.content = newContent;
			}
		} else {
			mfp.content = '';
		}

		_mfpTrigger(BEFORE_APPEND_EVENT);
		mfp.container.addClass('mfp-'+type+'-holder');

		mfp.contentContainer.append(mfp.content);
	},


	/**
	 * Creates Magnific Popup data object based on given data
	 * @param  {int} index Index of item to parse
	 */
	parseEl: function(index) {
		var item = mfp.items[index],
			type;

		if(item.tagName) {
			item = { el: $(item) };
		} else {
			type = item.type;
			item = { data: item, src: item.src };
		}

		if(item.el) {
			var types = mfp.types;

			// check for 'mfp-TYPE' class
			for(var i = 0; i < types.length; i++) {
				if( item.el.hasClass('mfp-'+types[i]) ) {
					type = types[i];
					break;
				}
			}

			item.src = item.el.attr('data-mfp-src');
			if(!item.src) {
				item.src = item.el.attr('href');
			}
		}

		item.type = type || mfp.st.type || 'inline';
		item.index = index;
		item.parsed = true;
		mfp.items[index] = item;
		_mfpTrigger('ElementParse', item);

		return mfp.items[index];
	},


	/**
	 * Initializes single popup or a group of popups
	 */
	addGroup: function(el, options) {
		var eHandler = function(e) {
			e.mfpEl = this;
			mfp._openClick(e, el, options);
		};

		if(!options) {
			options = {};
		}

		var eName = 'click.magnificPopup';
		options.mainEl = el;

		if(options.items) {
			options.isObj = true;
			el.off(eName).on(eName, eHandler);
		} else {
			options.isObj = false;
			if(options.delegate) {
				el.off(eName).on(eName, options.delegate , eHandler);
			} else {
				options.items = el;
				el.off(eName).on(eName, eHandler);
			}
		}
	},
	_openClick: function(e, el, options) {
		var midClick = options.midClick !== undefined ? options.midClick : $.magnificPopup.defaults.midClick;


		if(!midClick && ( e.which === 2 || e.ctrlKey || e.metaKey || e.altKey || e.shiftKey ) ) {
			return;
		}

		var disableOn = options.disableOn !== undefined ? options.disableOn : $.magnificPopup.defaults.disableOn;

		if(disableOn) {
			if($.isFunction(disableOn)) {
				if( !disableOn.call(mfp) ) {
					return true;
				}
			} else { // else it's number
				if( _window.width() < disableOn ) {
					return true;
				}
			}
		}

		if(e.type) {
			e.preventDefault();

			// This will prevent popup from closing if element is inside and popup is already opened
			if(mfp.isOpen) {
				e.stopPropagation();
			}
		}

		options.el = $(e.mfpEl);
		if(options.delegate) {
			options.items = el.find(options.delegate);
		}
		mfp.open(options);
	},


	/**
	 * Updates text on preloader
	 */
	updateStatus: function(status, text) {

		if(mfp.preloader) {
			if(_prevStatus !== status) {
				mfp.container.removeClass('mfp-s-'+_prevStatus);
			}

			if(!text && status === 'loading') {
				text = mfp.st.tLoading;
			}

			var data = {
				status: status,
				text: text
			};
			// allows to modify status
			_mfpTrigger('UpdateStatus', data);

			status = data.status;
			text = data.text;

			mfp.preloader.html(text);

			mfp.preloader.find('a').on('click', function(e) {
				e.stopImmediatePropagation();
			});

			mfp.container.addClass('mfp-s-'+status);
			_prevStatus = status;
		}
	},


	/*
		"Private" helpers that aren't private at all
	 */
	// Check to close popup or not
	// "target" is an element that was clicked
	_checkIfClose: function(target) {

		if($(target).hasClass(PREVENT_CLOSE_CLASS)) {
			return;
		}

		var closeOnContent = mfp.st.closeOnContentClick;
		var closeOnBg = mfp.st.closeOnBgClick;

		if(closeOnContent && closeOnBg) {
			return true;
		} else {

			// We close the popup if click is on close button or on preloader. Or if there is no content.
			if(!mfp.content || $(target).hasClass('mfp-close') || (mfp.preloader && target === mfp.preloader[0]) ) {
				return true;
			}

			// if click is outside the content
			if(  (target !== mfp.content[0] && !$.contains(mfp.content[0], target))  ) {
				if(closeOnBg) {
					// last check, if the clicked element is in DOM, (in case it's removed onclick)
					if( $.contains(document, target) ) {
						return true;
					}
				}
			} else if(closeOnContent) {
				return true;
			}

		}
		return false;
	},
	_addClassToMFP: function(cName) {
		mfp.bgOverlay.addClass(cName);
		mfp.wrap.addClass(cName);
	},
	_removeClassFromMFP: function(cName) {
		this.bgOverlay.removeClass(cName);
		mfp.wrap.removeClass(cName);
	},
	_hasScrollBar: function(winHeight) {
		return (  (mfp.isIE7 ? _document.height() : document.body.scrollHeight) > (winHeight || _window.height()) );
	},
	_setFocus: function() {
		(mfp.st.focus ? mfp.content.find(mfp.st.focus).eq(0) : mfp.wrap).focus();
	},
	_onFocusIn: function(e) {
		if( e.target !== mfp.wrap[0] && !$.contains(mfp.wrap[0], e.target) ) {
			mfp._setFocus();
			return false;
		}
	},
	_parseMarkup: function(template, values, item) {
		var arr;
		if(item.data) {
			values = $.extend(item.data, values);
		}
		_mfpTrigger(MARKUP_PARSE_EVENT, [template, values, item] );

		$.each(values, function(key, value) {
			if(value === undefined || value === false) {
				return true;
			}
			arr = key.split('_');
			if(arr.length > 1) {
				var el = template.find(EVENT_NS + '-'+arr[0]);

				if(el.length > 0) {
					var attr = arr[1];
					if(attr === 'replaceWith') {
						if(el[0] !== value[0]) {
							el.replaceWith(value);
						}
					} else if(attr === 'img') {
						if(el.is('img')) {
							el.attr('src', value);
						} else {
							el.replaceWith( $('<img>').attr('src', value).attr('class', el.attr('class')) );
						}
					} else {
						el.attr(arr[1], value);
					}
				}

			} else {
				template.find(EVENT_NS + '-'+key).html(value);
			}
		});
	},

	_getScrollbarSize: function() {
		// thx David
		if(mfp.scrollbarSize === undefined) {
			var scrollDiv = document.createElement("div");
			scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
			document.body.appendChild(scrollDiv);
			mfp.scrollbarSize = scrollDiv.offsetWidth - scrollDiv.clientWidth;
			document.body.removeChild(scrollDiv);
		}
		return mfp.scrollbarSize;
	}

}; /* MagnificPopup core prototype end */




/**
 * Public static functions
 */
$.magnificPopup = {
	instance: null,
	proto: MagnificPopup.prototype,
	modules: [],

	open: function(options, index) {
		_checkInstance();

		if(!options) {
			options = {};
		} else {
			options = $.extend(true, {}, options);
		}

		options.isObj = true;
		options.index = index || 0;
		return this.instance.open(options);
	},

	close: function() {
		return $.magnificPopup.instance && $.magnificPopup.instance.close();
	},

	registerModule: function(name, module) {
		if(module.options) {
			$.magnificPopup.defaults[name] = module.options;
		}
		$.extend(this.proto, module.proto);
		this.modules.push(name);
	},

	defaults: {

		// Info about options is in docs:
		// http://dimsemenov.com/plugins/magnific-popup/documentation.html#options

		disableOn: 0,

		key: null,

		midClick: false,

		mainClass: '',

		preloader: true,

		focus: '', // CSS selector of input to focus after popup is opened

		closeOnContentClick: false,

		closeOnBgClick: true,

		closeBtnInside: true,

		showCloseBtn: true,

		enableEscapeKey: true,

		modal: false,

		alignTop: false,

		removalDelay: 0,

		prependTo: null,

		fixedContentPos: 'auto',

		fixedBgPos: 'auto',

		overflowY: 'auto',

		closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>',

		tClose: 'Close (Esc)',

		tLoading: 'Loading...',

		autoFocusLast: true

	}
};



$.fn.magnificPopup = function(options) {
	_checkInstance();

	var jqEl = $(this);

	// We call some API method of first param is a string
	if (typeof options === "string" ) {

		if(options === 'open') {
			var items,
				itemOpts = _isJQ ? jqEl.data('magnificPopup') : jqEl[0].magnificPopup,
				index = parseInt(arguments[1], 10) || 0;

			if(itemOpts.items) {
				items = itemOpts.items[index];
			} else {
				items = jqEl;
				if(itemOpts.delegate) {
					items = items.find(itemOpts.delegate);
				}
				items = items.eq( index );
			}
			mfp._openClick({mfpEl:items}, jqEl, itemOpts);
		} else {
			if(mfp.isOpen)
				mfp[options].apply(mfp, Array.prototype.slice.call(arguments, 1));
		}

	} else {
		// clone options obj
		options = $.extend(true, {}, options);

		/*
		 * As Zepto doesn't support .data() method for objects
		 * and it works only in normal browsers
		 * we assign "options" object directly to the DOM element. FTW!
		 */
		if(_isJQ) {
			jqEl.data('magnificPopup', options);
		} else {
			jqEl[0].magnificPopup = options;
		}

		mfp.addGroup(jqEl, options);

	}
	return jqEl;
};

/*>>core*/

/*>>inline*/

var INLINE_NS = 'inline',
	_hiddenClass,
	_inlinePlaceholder,
	_lastInlineElement,
	_putInlineElementsBack = function() {
		if(_lastInlineElement) {
			_inlinePlaceholder.after( _lastInlineElement.addClass(_hiddenClass) ).detach();
			_lastInlineElement = null;
		}
	};

$.magnificPopup.registerModule(INLINE_NS, {
	options: {
		hiddenClass: 'hide', // will be appended with `mfp-` prefix
		markup: '',
		tNotFound: 'Content not found'
	},
	proto: {

		initInline: function() {
			mfp.types.push(INLINE_NS);

			_mfpOn(CLOSE_EVENT+'.'+INLINE_NS, function() {
				_putInlineElementsBack();
			});
		},

		getInline: function(item, template) {

			_putInlineElementsBack();

			if(item.src) {
				var inlineSt = mfp.st.inline,
					el = $(item.src);

				if(el.length) {

					// If target element has parent - we replace it with placeholder and put it back after popup is closed
					var parent = el[0].parentNode;
					if(parent && parent.tagName) {
						if(!_inlinePlaceholder) {
							_hiddenClass = inlineSt.hiddenClass;
							_inlinePlaceholder = _getEl(_hiddenClass);
							_hiddenClass = 'mfp-'+_hiddenClass;
						}
						// replace target inline element with placeholder
						_lastInlineElement = el.after(_inlinePlaceholder).detach().removeClass(_hiddenClass);
					}

					mfp.updateStatus('ready');
				} else {
					mfp.updateStatus('error', inlineSt.tNotFound);
					el = $('<div>');
				}

				item.inlineElement = el;
				return el;
			}

			mfp.updateStatus('ready');
			mfp._parseMarkup(template, {}, item);
			return template;
		}
	}
});

/*>>inline*/

/*>>ajax*/
var AJAX_NS = 'ajax',
	_ajaxCur,
	_removeAjaxCursor = function() {
		if(_ajaxCur) {
			$(document.body).removeClass(_ajaxCur);
		}
	},
	_destroyAjaxRequest = function() {
		_removeAjaxCursor();
		if(mfp.req) {
			mfp.req.abort();
		}
	};

$.magnificPopup.registerModule(AJAX_NS, {

	options: {
		settings: null,
		cursor: 'mfp-ajax-cur',
		tError: '<a href="%url%">The content</a> could not be loaded.'
	},

	proto: {
		initAjax: function() {
			mfp.types.push(AJAX_NS);
			_ajaxCur = mfp.st.ajax.cursor;

			_mfpOn(CLOSE_EVENT+'.'+AJAX_NS, _destroyAjaxRequest);
			_mfpOn('BeforeChange.' + AJAX_NS, _destroyAjaxRequest);
		},
		getAjax: function(item) {

			if(_ajaxCur) {
				$(document.body).addClass(_ajaxCur);
			}

			mfp.updateStatus('loading');

			var opts = $.extend({
				url: item.src,
				success: function(data, textStatus, jqXHR) {
					var temp = {
						data:data,
						xhr:jqXHR
					};

					_mfpTrigger('ParseAjax', temp);

					mfp.appendContent( $(temp.data), AJAX_NS );

					item.finished = true;

					_removeAjaxCursor();

					mfp._setFocus();

					setTimeout(function() {
						mfp.wrap.addClass(READY_CLASS);
					}, 16);

					mfp.updateStatus('ready');

					_mfpTrigger('AjaxContentAdded');
				},
				error: function() {
					_removeAjaxCursor();
					item.finished = item.loadError = true;
					mfp.updateStatus('error', mfp.st.ajax.tError.replace('%url%', item.src));
				}
			}, mfp.st.ajax.settings);

			mfp.req = $.ajax(opts);

			return '';
		}
	}
});

/*>>ajax*/

/*>>image*/
var _imgInterval,
	_getTitle = function(item) {
		if(item.data && item.data.title !== undefined)
			return item.data.title;

		var src = mfp.st.image.titleSrc;

		if(src) {
			if($.isFunction(src)) {
				return src.call(mfp, item);
			} else if(item.el) {
				return item.el.attr(src) || '';
			}
		}
		return '';
	};

$.magnificPopup.registerModule('image', {

	options: {
		markup: '<div class="mfp-figure">'+
					'<div class="mfp-close"></div>'+
					'<figure>'+
						'<div class="mfp-img"></div>'+
						'<figcaption>'+
							'<div class="mfp-bottom-bar">'+
								'<div class="mfp-title"></div>'+
								'<div class="mfp-counter"></div>'+
							'</div>'+
						'</figcaption>'+
					'</figure>'+
				'</div>',
		cursor: 'mfp-zoom-out-cur',
		titleSrc: 'title',
		verticalFit: true,
		tError: '<a href="%url%">The image</a> could not be loaded.'
	},

	proto: {
		initImage: function() {
			var imgSt = mfp.st.image,
				ns = '.image';

			mfp.types.push('image');

			_mfpOn(OPEN_EVENT+ns, function() {
				if(mfp.currItem.type === 'image' && imgSt.cursor) {
					$(document.body).addClass(imgSt.cursor);
				}
			});

			_mfpOn(CLOSE_EVENT+ns, function() {
				if(imgSt.cursor) {
					$(document.body).removeClass(imgSt.cursor);
				}
				_window.off('resize' + EVENT_NS);
			});

			_mfpOn('Resize'+ns, mfp.resizeImage);
			if(mfp.isLowIE) {
				_mfpOn('AfterChange', mfp.resizeImage);
			}
		},
		resizeImage: function() {
			var item = mfp.currItem;
			if(!item || !item.img) return;

			if(mfp.st.image.verticalFit) {
				var decr = 0;
				// fix box-sizing in ie7/8
				if(mfp.isLowIE) {
					decr = parseInt(item.img.css('padding-top'), 10) + parseInt(item.img.css('padding-bottom'),10);
				}
				item.img.css('max-height', mfp.wH-decr);
			}
		},
		_onImageHasSize: function(item) {
			if(item.img) {

				item.hasSize = true;

				if(_imgInterval) {
					clearInterval(_imgInterval);
				}

				item.isCheckingImgSize = false;

				_mfpTrigger('ImageHasSize', item);

				if(item.imgHidden) {
					if(mfp.content)
						mfp.content.removeClass('mfp-loading');

					item.imgHidden = false;
				}

			}
		},

		/**
		 * Function that loops until the image has size to display elements that rely on it asap
		 */
		findImageSize: function(item) {

			var counter = 0,
				img = item.img[0],
				mfpSetInterval = function(delay) {

					if(_imgInterval) {
						clearInterval(_imgInterval);
					}
					// decelerating interval that checks for size of an image
					_imgInterval = setInterval(function() {
						if(img.naturalWidth > 0) {
							mfp._onImageHasSize(item);
							return;
						}

						if(counter > 200) {
							clearInterval(_imgInterval);
						}

						counter++;
						if(counter === 3) {
							mfpSetInterval(10);
						} else if(counter === 40) {
							mfpSetInterval(50);
						} else if(counter === 100) {
							mfpSetInterval(500);
						}
					}, delay);
				};

			mfpSetInterval(1);
		},

		getImage: function(item, template) {

			var guard = 0,

				// image load complete handler
				onLoadComplete = function() {
					if(item) {
						if (item.img[0].complete) {
							item.img.off('.mfploader');

							if(item === mfp.currItem){
								mfp._onImageHasSize(item);

								mfp.updateStatus('ready');
							}

							item.hasSize = true;
							item.loaded = true;

							_mfpTrigger('ImageLoadComplete');

						}
						else {
							// if image complete check fails 200 times (20 sec), we assume that there was an error.
							guard++;
							if(guard < 200) {
								setTimeout(onLoadComplete,100);
							} else {
								onLoadError();
							}
						}
					}
				},

				// image error handler
				onLoadError = function() {
					if(item) {
						item.img.off('.mfploader');
						if(item === mfp.currItem){
							mfp._onImageHasSize(item);
							mfp.updateStatus('error', imgSt.tError.replace('%url%', item.src) );
						}

						item.hasSize = true;
						item.loaded = true;
						item.loadError = true;
					}
				},
				imgSt = mfp.st.image;


			var el = template.find('.mfp-img');
			if(el.length) {
				var img = document.createElement('img');
				img.className = 'mfp-img';
				if(item.el && item.el.find('img').length) {
					img.alt = item.el.find('img').attr('alt');
				}
				item.img = $(img).on('load.mfploader', onLoadComplete).on('error.mfploader', onLoadError);
				img.src = item.src;

				// without clone() "error" event is not firing when IMG is replaced by new IMG
				// TODO: find a way to avoid such cloning
				if(el.is('img')) {
					item.img = item.img.clone();
				}

				img = item.img[0];
				if(img.naturalWidth > 0) {
					item.hasSize = true;
				} else if(!img.width) {
					item.hasSize = false;
				}
			}

			mfp._parseMarkup(template, {
				title: _getTitle(item),
				img_replaceWith: item.img
			}, item);

			mfp.resizeImage();

			if(item.hasSize) {
				if(_imgInterval) clearInterval(_imgInterval);

				if(item.loadError) {
					template.addClass('mfp-loading');
					mfp.updateStatus('error', imgSt.tError.replace('%url%', item.src) );
				} else {
					template.removeClass('mfp-loading');
					mfp.updateStatus('ready');
				}
				return template;
			}

			mfp.updateStatus('loading');
			item.loading = true;

			if(!item.hasSize) {
				item.imgHidden = true;
				template.addClass('mfp-loading');
				mfp.findImageSize(item);
			}

			return template;
		}
	}
});

/*>>image*/

/*>>zoom*/
var hasMozTransform,
	getHasMozTransform = function() {
		if(hasMozTransform === undefined) {
			hasMozTransform = document.createElement('p').style.MozTransform !== undefined;
		}
		return hasMozTransform;
	};

$.magnificPopup.registerModule('zoom', {

	options: {
		enabled: false,
		easing: 'ease-in-out',
		duration: 300,
		opener: function(element) {
			return element.is('img') ? element : element.find('img');
		}
	},

	proto: {

		initZoom: function() {
			var zoomSt = mfp.st.zoom,
				ns = '.zoom',
				image;

			if(!zoomSt.enabled || !mfp.supportsTransition) {
				return;
			}

			var duration = zoomSt.duration,
				getElToAnimate = function(image) {
					var newImg = image.clone().removeAttr('style').removeAttr('class').addClass('mfp-animated-image'),
						transition = 'all '+(zoomSt.duration/1000)+'s ' + zoomSt.easing,
						cssObj = {
							position: 'fixed',
							zIndex: 9999,
							left: 0,
							top: 0,
							'-webkit-backface-visibility': 'hidden'
						},
						t = 'transition';

					cssObj['-webkit-'+t] = cssObj['-moz-'+t] = cssObj['-o-'+t] = cssObj[t] = transition;

					newImg.css(cssObj);
					return newImg;
				},
				showMainContent = function() {
					mfp.content.css('visibility', 'visible');
				},
				openTimeout,
				animatedImg;

			_mfpOn('BuildControls'+ns, function() {
				if(mfp._allowZoom()) {

					clearTimeout(openTimeout);
					mfp.content.css('visibility', 'hidden');

					// Basically, all code below does is clones existing image, puts in on top of the current one and animated it

					image = mfp._getItemToZoom();

					if(!image) {
						showMainContent();
						return;
					}

					animatedImg = getElToAnimate(image);

					animatedImg.css( mfp._getOffset() );

					mfp.wrap.append(animatedImg);

					openTimeout = setTimeout(function() {
						animatedImg.css( mfp._getOffset( true ) );
						openTimeout = setTimeout(function() {

							showMainContent();

							setTimeout(function() {
								animatedImg.remove();
								image = animatedImg = null;
								_mfpTrigger('ZoomAnimationEnded');
							}, 16); // avoid blink when switching images

						}, duration); // this timeout equals animation duration

					}, 16); // by adding this timeout we avoid short glitch at the beginning of animation


					// Lots of timeouts...
				}
			});
			_mfpOn(BEFORE_CLOSE_EVENT+ns, function() {
				if(mfp._allowZoom()) {

					clearTimeout(openTimeout);

					mfp.st.removalDelay = duration;

					if(!image) {
						image = mfp._getItemToZoom();
						if(!image) {
							return;
						}
						animatedImg = getElToAnimate(image);
					}

					animatedImg.css( mfp._getOffset(true) );
					mfp.wrap.append(animatedImg);
					mfp.content.css('visibility', 'hidden');

					setTimeout(function() {
						animatedImg.css( mfp._getOffset() );
					}, 16);
				}

			});

			_mfpOn(CLOSE_EVENT+ns, function() {
				if(mfp._allowZoom()) {
					showMainContent();
					if(animatedImg) {
						animatedImg.remove();
					}
					image = null;
				}
			});
		},

		_allowZoom: function() {
			return mfp.currItem.type === 'image';
		},

		_getItemToZoom: function() {
			if(mfp.currItem.hasSize) {
				return mfp.currItem.img;
			} else {
				return false;
			}
		},

		// Get element postion relative to viewport
		_getOffset: function(isLarge) {
			var el;
			if(isLarge) {
				el = mfp.currItem.img;
			} else {
				el = mfp.st.zoom.opener(mfp.currItem.el || mfp.currItem);
			}

			var offset = el.offset();
			var paddingTop = parseInt(el.css('padding-top'),10);
			var paddingBottom = parseInt(el.css('padding-bottom'),10);
			offset.top -= ( $(window).scrollTop() - paddingTop );


			/*

			Animating left + top + width/height looks glitchy in Firefox, but perfect in Chrome. And vice-versa.

			 */
			var obj = {
				width: el.width(),
				// fix Zepto height+padding issue
				height: (_isJQ ? el.innerHeight() : el[0].offsetHeight) - paddingBottom - paddingTop
			};

			// I hate to do this, but there is no another option
			if( getHasMozTransform() ) {
				obj['-moz-transform'] = obj['transform'] = 'translate(' + offset.left + 'px,' + offset.top + 'px)';
			} else {
				obj.left = offset.left;
				obj.top = offset.top;
			}
			return obj;
		}

	}
});



/*>>zoom*/

/*>>iframe*/

var IFRAME_NS = 'iframe',
	_emptyPage = '//about:blank',

	_fixIframeBugs = function(isShowing) {
		if(mfp.currTemplate[IFRAME_NS]) {
			var el = mfp.currTemplate[IFRAME_NS].find('iframe');
			if(el.length) {
				// reset src after the popup is closed to avoid "video keeps playing after popup is closed" bug
				if(!isShowing) {
					el[0].src = _emptyPage;
				}

				// IE8 black screen bug fix
				if(mfp.isIE8) {
					el.css('display', isShowing ? 'block' : 'none');
				}
			}
		}
	};

$.magnificPopup.registerModule(IFRAME_NS, {

	options: {
		markup: '<div class="mfp-iframe-scaler">'+
					'<div class="mfp-close"></div>'+
					'<iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe>'+
				'</div>',

		srcAction: 'iframe_src',

		// we don't care and support only one default type of URL by default
		patterns: {
			youtube: {
				index: 'youtube.com',
				id: 'v=',
				src: '//www.youtube.com/embed/%id%?autoplay=1'
			},
			vimeo: {
				index: 'vimeo.com/',
				id: '/',
				src: '//player.vimeo.com/video/%id%?autoplay=1'
			},
			gmaps: {
				index: '//maps.google.',
				src: '%id%&output=embed'
			}
		}
	},

	proto: {
		initIframe: function() {
			mfp.types.push(IFRAME_NS);

			_mfpOn('BeforeChange', function(e, prevType, newType) {
				if(prevType !== newType) {
					if(prevType === IFRAME_NS) {
						_fixIframeBugs(); // iframe if removed
					} else if(newType === IFRAME_NS) {
						_fixIframeBugs(true); // iframe is showing
					}
				}// else {
					// iframe source is switched, don't do anything
				//}
			});

			_mfpOn(CLOSE_EVENT + '.' + IFRAME_NS, function() {
				_fixIframeBugs();
			});
		},

		getIframe: function(item, template) {
			var embedSrc = item.src;
			var iframeSt = mfp.st.iframe;

			$.each(iframeSt.patterns, function() {
				if(embedSrc.indexOf( this.index ) > -1) {
					if(this.id) {
						if(typeof this.id === 'string') {
							embedSrc = embedSrc.substr(embedSrc.lastIndexOf(this.id)+this.id.length, embedSrc.length);
						} else {
							embedSrc = this.id.call( this, embedSrc );
						}
					}
					embedSrc = this.src.replace('%id%', embedSrc );
					return false; // break;
				}
			});

			var dataObj = {};
			if(iframeSt.srcAction) {
				dataObj[iframeSt.srcAction] = embedSrc;
			}
			mfp._parseMarkup(template, dataObj, item);

			mfp.updateStatus('ready');

			return template;
		}
	}
});



/*>>iframe*/

/*>>gallery*/
/**
 * Get looped index depending on number of slides
 */
var _getLoopedId = function(index) {
		var numSlides = mfp.items.length;
		if(index > numSlides - 1) {
			return index - numSlides;
		} else  if(index < 0) {
			return numSlides + index;
		}
		return index;
	},
	_replaceCurrTotal = function(text, curr, total) {
		return text.replace(/%curr%/gi, curr + 1).replace(/%total%/gi, total);
	};

$.magnificPopup.registerModule('gallery', {

	options: {
		enabled: false,
		arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
		preload: [0,2],
		navigateByImgClick: true,
		arrows: true,

		tPrev: 'Previous (Left arrow key)',
		tNext: 'Next (Right arrow key)',
		tCounter: '%curr% of %total%'
	},

	proto: {
		initGallery: function() {

			var gSt = mfp.st.gallery,
				ns = '.mfp-gallery';

			mfp.direction = true; // true - next, false - prev

			if(!gSt || !gSt.enabled ) return false;

			_wrapClasses += ' mfp-gallery';

			_mfpOn(OPEN_EVENT+ns, function() {

				if(gSt.navigateByImgClick) {
					mfp.wrap.on('click'+ns, '.mfp-img', function() {
						if(mfp.items.length > 1) {
							mfp.next();
							return false;
						}
					});
				}

				_document.on('keydown'+ns, function(e) {
					if (e.keyCode === 37) {
						mfp.prev();
					} else if (e.keyCode === 39) {
						mfp.next();
					}
				});
			});

			_mfpOn('UpdateStatus'+ns, function(e, data) {
				if(data.text) {
					data.text = _replaceCurrTotal(data.text, mfp.currItem.index, mfp.items.length);
				}
			});

			_mfpOn(MARKUP_PARSE_EVENT+ns, function(e, element, values, item) {
				var l = mfp.items.length;
				values.counter = l > 1 ? _replaceCurrTotal(gSt.tCounter, item.index, l) : '';
			});

			_mfpOn('BuildControls' + ns, function() {
				if(mfp.items.length > 1 && gSt.arrows && !mfp.arrowLeft) {
					var markup = gSt.arrowMarkup,
						arrowLeft = mfp.arrowLeft = $( markup.replace(/%title%/gi, gSt.tPrev).replace(/%dir%/gi, 'left') ).addClass(PREVENT_CLOSE_CLASS),
						arrowRight = mfp.arrowRight = $( markup.replace(/%title%/gi, gSt.tNext).replace(/%dir%/gi, 'right') ).addClass(PREVENT_CLOSE_CLASS);

					arrowLeft.click(function() {
						mfp.prev();
					});
					arrowRight.click(function() {
						mfp.next();
					});

					mfp.container.append(arrowLeft.add(arrowRight));
				}
			});

			_mfpOn(CHANGE_EVENT+ns, function() {
				if(mfp._preloadTimeout) clearTimeout(mfp._preloadTimeout);

				mfp._preloadTimeout = setTimeout(function() {
					mfp.preloadNearbyImages();
					mfp._preloadTimeout = null;
				}, 16);
			});


			_mfpOn(CLOSE_EVENT+ns, function() {
				_document.off(ns);
				mfp.wrap.off('click'+ns);
				mfp.arrowRight = mfp.arrowLeft = null;
			});

		},
		next: function() {
			mfp.direction = true;
			mfp.index = _getLoopedId(mfp.index + 1);
			mfp.updateItemHTML();
		},
		prev: function() {
			mfp.direction = false;
			mfp.index = _getLoopedId(mfp.index - 1);
			mfp.updateItemHTML();
		},
		goTo: function(newIndex) {
			mfp.direction = (newIndex >= mfp.index);
			mfp.index = newIndex;
			mfp.updateItemHTML();
		},
		preloadNearbyImages: function() {
			var p = mfp.st.gallery.preload,
				preloadBefore = Math.min(p[0], mfp.items.length),
				preloadAfter = Math.min(p[1], mfp.items.length),
				i;

			for(i = 1; i <= (mfp.direction ? preloadAfter : preloadBefore); i++) {
				mfp._preloadItem(mfp.index+i);
			}
			for(i = 1; i <= (mfp.direction ? preloadBefore : preloadAfter); i++) {
				mfp._preloadItem(mfp.index-i);
			}
		},
		_preloadItem: function(index) {
			index = _getLoopedId(index);

			if(mfp.items[index].preloaded) {
				return;
			}

			var item = mfp.items[index];
			if(!item.parsed) {
				item = mfp.parseEl( index );
			}

			_mfpTrigger('LazyLoad', item);

			if(item.type === 'image') {
				item.img = $('<img class="mfp-img" />').on('load.mfploader', function() {
					item.hasSize = true;
				}).on('error.mfploader', function() {
					item.hasSize = true;
					item.loadError = true;
					_mfpTrigger('LazyLoadError', item);
				}).attr('src', item.src);
			}


			item.preloaded = true;
		}
	}
});

/*>>gallery*/

/*>>retina*/

var RETINA_NS = 'retina';

$.magnificPopup.registerModule(RETINA_NS, {
	options: {
		replaceSrc: function(item) {
			return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
		},
		ratio: 1 // Function or number.  Set to 1 to disable.
	},
	proto: {
		initRetina: function() {
			if(window.devicePixelRatio > 1) {

				var st = mfp.st.retina,
					ratio = st.ratio;

				ratio = !isNaN(ratio) ? ratio : ratio();

				if(ratio > 1) {
					_mfpOn('ImageHasSize' + '.' + RETINA_NS, function(e, item) {
						item.img.css({
							'max-width': item.img[0].naturalWidth / ratio,
							'width': '100%'
						});
					});
					_mfpOn('ElementParse' + '.' + RETINA_NS, function(e, item) {
						item.src = st.replaceSrc(item, ratio);
					});
				}
			}

		}
	}
});

/*>>retina*/
 _checkInstance(); }));

/***/ }),

/***/ "./node_modules/tlite/tlite.js":
/*!*************************************!*\
  !*** ./node_modules/tlite/tlite.js ***!
  \*************************************/
/***/ (function(module) {

function tlite(getTooltipOpts) {
  document.addEventListener('mouseover', function (e) {
    var el = e.target;
    var opts = getTooltipOpts(el);

    if (!opts) {
      el = el.parentElement;
      opts = el && getTooltipOpts(el);
    }

    opts && tlite.show(el, opts, true);
  });
}

tlite.show = function (el, opts, isAuto) {
  var fallbackAttrib = 'data-tlite';
  opts = opts || {};

  (el.tooltip || Tooltip(el, opts)).show();

  function Tooltip(el, opts) {
    var tooltipEl;
    var showTimer;
    var text;

    el.addEventListener('mousedown', autoHide);
    el.addEventListener('mouseleave', autoHide);

    function show() {
      text = el.title || el.getAttribute(fallbackAttrib) || text;
      el.title = '';
      el.setAttribute(fallbackAttrib, '');
      text && !showTimer && (showTimer = setTimeout(fadeIn, isAuto ? 150 : 1))
    }

    function autoHide() {
      tlite.hide(el, true);
    }

    function hide(isAutoHiding) {
      if (isAuto === isAutoHiding) {
        showTimer = clearTimeout(showTimer);
        var parent = tooltipEl && tooltipEl.parentNode;
        parent && parent.removeChild(tooltipEl);
        tooltipEl = undefined;
      }
    }

    function fadeIn() {
      if (!tooltipEl) {
        tooltipEl = createTooltip(el, text, opts);
      }
    }

    return el.tooltip = {
      show: show,
      hide: hide
    };
  }

  function createTooltip(el, text, opts) {
    var tooltipEl = document.createElement('span');
    var grav = opts.grav || el.getAttribute('data-tlite') || 'n';

    tooltipEl.innerHTML = text;

    el.appendChild(tooltipEl);

    var vertGrav = grav[0] || '';
    var horzGrav = grav[1] || '';

    function positionTooltip() {
      tooltipEl.className = 'tlite ' + 'tlite-' + vertGrav + horzGrav;

      var arrowSize = 10;
      var top = el.offsetTop;
      var left = el.offsetLeft;

      if (tooltipEl.offsetParent === el) {
        top = left = 0;
      }

      var width = el.offsetWidth;
      var height = el.offsetHeight;
      var tooltipHeight = tooltipEl.offsetHeight;
      var tooltipWidth = tooltipEl.offsetWidth;
      var centerEl = left + (width / 2);

      tooltipEl.style.top = (
        vertGrav === 's' ? (top - tooltipHeight - arrowSize) :
        vertGrav === 'n' ? (top + height + arrowSize) :
        (top + (height / 2) - (tooltipHeight / 2))
      ) + 'px';

      tooltipEl.style.left = (
        horzGrav === 'w' ? left :
        horzGrav === 'e' ? left + width - tooltipWidth :
        vertGrav === 'w' ? (left + width + arrowSize) :
        vertGrav === 'e' ? (left - tooltipWidth - arrowSize) :
        (centerEl - tooltipWidth / 2)
      ) + 'px';
    }

    positionTooltip();

    var rect = tooltipEl.getBoundingClientRect();

    if (vertGrav === 's' && rect.top < 0) {
      vertGrav = 'n';
      positionTooltip();
    } else if (vertGrav === 'n' && rect.bottom > window.innerHeight) {
      vertGrav = 's';
      positionTooltip();
    } else if (vertGrav === 'e' && rect.left < 0) {
      vertGrav = 'w';
      positionTooltip();
    } else if (vertGrav === 'w' && rect.right > window.innerWidth) {
      vertGrav = 'e';
      positionTooltip();
    }

    tooltipEl.className += ' tlite-visible';

    return tooltipEl;
  }
};

tlite.hide = function (el, isAuto) {
  el.tooltip && el.tooltip.hide(isAuto);
};

if ( true && module.exports) {
  module.exports = tlite;
}


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

"use strict";
module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!****************************!*\
  !*** ./assets/js/admin.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var tlite__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tlite */ "./node_modules/tlite/tlite.js");
/* harmony import */ var tlite__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(tlite__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_magnific_popup_dist_jquery_magnific_popup_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../node_modules/magnific-popup/dist/jquery.magnific-popup.js */ "./node_modules/magnific-popup/dist/jquery.magnific-popup.js");
/* harmony import */ var _node_modules_magnific_popup_dist_jquery_magnific_popup_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_node_modules_magnific_popup_dist_jquery_magnific_popup_js__WEBPACK_IMPORTED_MODULE_1__);


/**
 * Creating the Media Uploader
 *
 * @param $imageContainer
 * @param $imageInput
 */

function giveasap_image_media($imageContainer, $imageInput) {
  'use strict';

  var file_frame;
  /**
   * If an instance of file_frame already exists, then we can open it
   * rather than creating a new instance.
   */

  if (undefined !== file_frame) {
    file_frame.open();
    return;
  }
  /**
   * If we're this far, then an instance does not exist, so we need to
   * create our own.
   *
   * Here, use the wp.media library to define the settings of the Media
   * Uploader. We're opting to use the 'post' frame which is a template
   * defined in WordPress core and are initializing the file frame
   * with the 'insert' state.
   *
   * We're also not allowing the user to select more than one image.
   */


  file_frame = wp.media({
    multiple: false
  });
  file_frame.on('open', function () {
    var selection = file_frame.state().get('selection');
    var ids = $imageInput.val().split(',');
    ids.forEach(function (id) {
      var attachment = wp.media.attachment(id);
      attachment.fetch();
      selection.add(attachment ? [attachment] : []);
    });
  }); // When an image is selected in the media frame...

  file_frame.on('select', function () {
    // Get media attachment details from the frame state
    var attachments = file_frame.state().get('selection').toJSON();
    var attachmentIDs = [];
    $imageContainer.empty();
    console.log($imageContainer);
    var $galleryID = $imageContainer.attr("id");

    for (var i = 0; i < attachments.length; i++) {
      if (attachments[i].type == "image") {
        attachmentIDs.push(attachments[i].id);
        $imageContainer.append(sortable_gallery_image_create(attachments[i], $galleryID));
      }
    }

    $imageInput.val(attachmentIDs.join()); // sortable_gallery_image_remove();
  }); // Now display the actual file_frame

  file_frame.open();
}

function sortable_image_gallery_media($imageContainer, $imageInput) {
  'use strict';

  var file_frame;
  /**
   * If an instance of file_frame already exists, then we can open it
   * rather than creating a new instance.
   */

  if (undefined !== file_frame) {
    file_frame.open();
    return;
  }
  /**
   * If we're this far, then an instance does not exist, so we need to
   * create our own.
   *
   * Here, use the wp.media library to define the settings of the Media
   * Uploader. We're opting to use the 'post' frame which is a template
   * defined in WordPress core and are initializing the file frame
   * with the 'insert' state.
   *
   * We're also not allowing the user to select more than one image.
   */


  file_frame = wp.media({
    multiple: true
  });
  file_frame.on('open', function () {
    var selection = file_frame.state().get('selection');
    var ids = $imageInput.val().split(',');
    ids.forEach(function (id) {
      var attachment = wp.media.attachment(id);
      attachment.fetch();
      selection.add(attachment ? [attachment] : []);
    });
  }); // When an image is selected in the media frame...

  file_frame.on('select', function () {
    // Get media attachment details from the frame state
    var attachments = file_frame.state().get('selection').toJSON();
    var attachmentIDs = [];
    $imageContainer.empty();
    var $galleryID = $imageContainer.attr("id");

    for (var i = 0; i < attachments.length; i++) {
      if (attachments[i].type == "image") {
        attachmentIDs.push(attachments[i].id);
        $imageContainer.append(sortable_gallery_image_create(attachments[i], $galleryID));
      }
    }

    $imageInput.val(attachmentIDs.join()); // sortable_gallery_image_remove();
  }); // Now display the actual file_frame

  file_frame.open();
}

function sortable_gallery_image_create($attachment, $galleryID) {
  var image_url = '';

  if ($attachment.sizes.thumbnail) {
    image_url = $attachment.sizes.thumbnail.url;
  } else {
    image_url = $attachment.sizes.full.url;
  }

  var $output = '<li tabindex="0" role="checkbox" aria-label="' + $attachment.title + '" aria-checked="true" data-id="' + $attachment.id + '" class="attachment save-ready selected details">';
  $output += '<div class="attachment-preview js--select-attachment type-image subtype-jpeg portrait">';
  $output += '<div class="thumbnail">';
  $output += '<div class="centered">';
  $output += '<img src="' + image_url + '" draggable="false" alt="">';
  $output += '</div>';
  $output += '</div>';
  $output += '</div>';
  $output += '<button type="button" data-gallery="#' + $galleryID + '" class="button-link check remove-sortable-wordpress-gallery-image" tabindex="0"><span class="media-modal-icon"></span><span class="screen-reader-text">Deselect</span></button>';
  $output += '</li>';
  return $output;
}

function sortable_gallery_image_remove() {
  jQuery(".remove-sortable-wordpress-gallery-image").on('click', function () {
    var $id = jQuery(this).parent().attr("data-id");
    var $gallery = jQuery(this).attr("data-gallery");
    var $imageInput = jQuery($gallery + "_input");
    jQuery(this).parent().remove();
    var ids = $imageInput.val().split(',');
    var $idIndex = ids.indexOf($id);

    if ($idIndex >= 0) {
      ids.splice($idIndex, 1);
      $imageInput.val(ids.join());
    }
  });
}

function giveasap_prepare_format_from_php(format) {
  format = format.replace("d", "dd");
  format = format.replace("j", "d");
  format = format.replace("Y", "yy");
  format = format.replace("m", "mm");
  return format;
}

function giveasap_initialize_code_editor() {
  var $ = jQuery;

  if ($('.sg-code-editor').length) {
    $('.sg-code-editor').each(function () {
      var editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
      var mode = $(this).attr('data-mode');

      if (typeof mode === 'undefined') {
        mode = false;
      }

      editorSettings.codemirror = _.extend({}, editorSettings.codemirror, {
        indentUnit: 2,
        tabSize: 2
      });

      if (mode) {
        editorSettings.codemirror.mode = mode;
      }

      var editor = wp.codeEditor.initialize($(this), editorSettings);
    });
  }
}

(function ($) {
  $(document).ready(function () {
    $(document.body).on('click', '#notify', function (e) {
      if (!$('#sg_allow_awarding').length) {
        return;
      }

      if (!$('#sg_allow_awarding').prop('checked')) {
        return;
      }

      if (!$('.sg-select-prizes-manual').length) {
        return;
      }

      if (!$('.sg-prizes-field-container ').length) {
        return;
      }

      if (!$('.sg-prizes-field-container ').children().length) {
        return;
      }

      var prizesDropdown = $('.sg-select-prizes-manual');
      var havePricesSelected = true;
      prizesDropdown.each(function () {
        var value = $(this).find('select').val();

        if (!value.length) {
          havePricesSelected = false;
        }
      });

      if (!havePricesSelected) {
        e.preventDefault();
        alert('Some users don\'t have their prizes selected! Please make sure all have their prizes selected, save the giveaway and click again to notify.');
      }
    });
    tlite__WEBPACK_IMPORTED_MODULE_0___default()(el => el.classList.contains('sg-tooltip'));
    $('#sgToggleAwardPrizes').on('click', function (e) {
      e.preventDefault();
      var $this = $(this),
          $target = $this.attr('data-target'),
          $class = $this.attr('data-class');
      $($target).toggleClass($class);

      if ($($target).hasClass($class)) {
        $('#sg_awarding_prizes_manually').removeAttr('checked');
      } else {
        $('#sg_awarding_prizes_manually').attr('checked', 'checked');
      }
    });
    $('.sg-toggle').on('click', function (e) {
      e.preventDefault();
      var $this = $(this),
          $target = $this.attr('data-target'),
          $class = $this.attr('data-class'),
          $text = $this.attr('data-text');
      $($target).toggleClass($class);

      if ($text) {
        var old_text = $this.text();
        $this.attr('data-text', old_text);
        $this.html($text);
      }
    });

    if ($('#sg_giveaway_add_subscriber').length) {
      $('#sg_giveaway_add_subscriber').on('change', function () {
        $.ajax({
          url: gasap.ajax_url,
          dataType: 'json',
          type: 'GET',
          data: {
            action: 'sg_get_giveaway_form_fields',
            giveaway: $(this).val(),
            nonce: gasap.nonce
          },
          success: function (resp) {
            if (resp.success) {
              $('#sgGiveawayFields').html(resp.data);
            }
          }
        });
      });
    }

    var imageButton = $(".add-sortable-wordpress-gallery");
    $(document).on('click', '.remove-sortable-wordpress-gallery-image', function (e) {
      e.preventDefault();
      var $this = $(this),
          $id = $this.parent().attr('data-id'),
          $gallery = $this.attr('data-gallery'),
          $input = $($gallery + '_input');
      var ids = $input.val().split(','),
          $idIndex = ids.indexOf($id);

      if ($idIndex >= 0) {
        ids.splice($idIndex, 1);
        $input.val(ids.join());
      }

      $this.parent().remove();
    }); // sortable_gallery_image_remove();

    imageButton.each(function () {
      var galleryID = $(this).attr("data-gallery");
      var imageContainer = $(galleryID);
      var imageInput = $(galleryID + "_input");
      imageContainer.sortable();
      imageContainer.on("sortupdate", function (event, ui) {
        var $ids = [];
        var $images = imageContainer.children("li");
        $images.each(function () {
          $ids.push($(this).attr("data-id"));
        });
        imageInput.val($ids.join());
      });
      $(this).on('click', function () {
        sortable_image_gallery_media(imageContainer, imageInput);
      });
    });
    $(document).on('click', '.add-single-wordpress-image', function (e) {
      e.preventDefault();
      var galleryID = $(this).attr("data-gallery");
      var imageContainer = $(galleryID);
      var imageInput = $(galleryID + "_input");
      giveasap_image_media(imageContainer, imageInput);
    });
    $(document).on('change', '#giveasap_end_date, #giveasap_end_time', function () {
      var end_time = $('#giveasap_end_time').val(),
          end_date = $('#giveasap_end_date').val().split('-').reverse().join('-'),
          winner_time = $('#giveasap_winner_time').val(),
          winner_date = $('#giveasap_winner_date').val().split('-').reverse().join('-'),
          end_date_object = Date.parse(end_date + 'T' + end_time),
          winner_date_object = Date.parse(winner_date + 'T' + winner_time);

      if (end_date_object > winner_date_object) {
        $('#giveasap_winner_date').val($('#giveasap_end_date').val());
        $('#giveasap_winner_time').val($('#giveasap_end_time').val());
      }
    });
    $(document).on('change', '#giveasap_winner_time, #giveasap_winner_date', function () {
      var end_time = $('#giveasap_end_time').val(),
          end_date = $('#giveasap_end_date').val().split('-').reverse().join('-'),
          winner_time = $('#giveasap_winner_time').val(),
          winner_date = $('#giveasap_winner_date').val().split('-').reverse().join('-'),
          end_date_object = Date.parse(end_date + 'T' + end_time),
          winner_date_object = Date.parse(winner_date + 'T' + winner_time);

      if (end_date_object > winner_date_object) {
        alert(gasap.text.winner_before_end);
      }
    });
    var $expand_users = $("#giveasap_expand_users");
    $expand_users.on('click', function () {
      var $users_container = $("#giveasap_users_container");
      $users_container.toggleClass("hidden");
    });
    var $date_format = $("#date_format");
    $date_format.on('change', function () {
      $format = giveasap_prepare_format_from_php($(this).val());
      $(".datepicker").datepicker('option', {
        altFormat: $format
      });
    });
    $(document).on('click', '.button-integration-deactivate', function (e) {
      e.preventDefault();
      var integration = $(this).attr('data-integration'),
          $this = $(this);

      if (integration) {
        $.ajax({
          url: gasap.ajax_url,
          dataType: 'json',
          type: 'POST',
          data: {
            action: 'giveasap_deactivate_integration',
            integration: integration,
            nonce: gasap.nonce
          },
          success: function (resp) {
            if (resp.success) {
              $this.removeClass('button-integration-deactivate').removeClass('button-default').addClass('button-integration-activate').addClass('button-primary').html(gasap.text.activate);
            }
          }
        });
      }
    });
    $(document).on('click', '.button-integration-activate', function (e) {
      e.preventDefault();
      var integration = $(this).attr('data-integration'),
          $this = $(this);

      if (integration) {
        $.ajax({
          url: gasap.ajax_url,
          dataType: 'json',
          type: 'POST',
          data: {
            action: 'giveasap_activate_integration',
            integration: integration,
            nonce: gasap.nonce
          },
          success: function (resp) {
            if (resp.success) {
              $this.addClass('button-integration-deactivate').addClass('button-default').removeClass('button-integration-activate').removeClass('button-primary').html(gasap.text.deactivate);
            }
          }
        });
      }
    });
    /**
     * Searching Email on User List.
     */

    $(document).on('click', '.ga-search-email', function (e) {
      e.preventDefault();
      var inputs = $(this).parent().find('input'),
          url = window.location.href,
          parts = url.split('?'),
          query = parts[1],
          qparams = query.split('&'),
          params = {};

      for (var i = 0; i < qparams.length; i++) {
        var strings = qparams[i].split('=');
        params[strings[0]] = strings[1];
      }

      inputs.each(function () {
        var name = $(this).attr('name'),
            val = $(this).val();

        if (val) {
          params[name] = val;
        } else {
          delete params[name];
        }
      });
      var params_array = [];

      for (var key in params) {
        params_array.push(key + '=' + params[key]);
      }

      var location = parts[0] + '?' + params_array.join('&');
      window.location.href = location;
    });
    $(document).on('click', '.sg-metaboxes li.sg-metabox a', function (e) {
      e.preventDefault();
      $('.sg-metabox-fields').addClass('hidden');
      $('.sg-metaboxes li.active').removeClass('active');
      var target = $(this).attr('href');
      $(target).removeClass('hidden');
      $(this).parent().addClass('active');
      $(target).find('.wp-editor-wrap').each(function () {
        var frame = $(this).find('iframe'),
            height = frame.height();

        if (height < 200) {
          frame.height(200);
        }
      });

      if ($(target).find('.sg-code-editor')) {
        giveasap_initialize_code_editor();
      }
    });
    $(document).on('change', '.sg-admin-form.sg-action-form :input', function () {
      var form = $(this).parents('.sg-admin-form');

      if (!$(this)[0].checkValidity()) {
        var txt = $(this)[0].validationMessage;
        var error = form.find('.error');
        $(this).focus();

        if (error.length) {
          error.find('p').html(txt);
        } else {
          form.prepend('<div class="notice error"><p>' + txt + '</p></div>');
        }

        setTimeout(function () {
          form.find('.error').fadeOut().remove();
        }, 5000);
      }
    });
    $('.sg-image-popup-link').magnificPopup({
      type: 'image'
    });
    /**
     * Sharing Methods.
     */

    $('#addShareMethod').on('click', function (e) {
      e.preventDefault();
      var template = wp.template('sharing-method'),
          index = $('.giveaway-sharing-methods').children().length,
          data = {
        index: index,
        title: 'New Method'
      },
          html = template(data);
      $('.giveaway-sharing-methods').append(html);
      $('.giveaway-sharing-methods').children().eq(index).find('.method-select').trigger('change');
    });

    function giveaway_reset_methods_index() {
      var index = 0;
      $('.giveaway-sharing-methods').children().each(function () {
        var _index = parseInt($(this).attr('data-index'));

        if (_index !== index) {
          var html = $(this).html(),
              reg = new RegExp('giveasap_methods\\[' + _index + '\\]', 'g');

          var _html = html.replace(reg, 'giveasap_methods[' + index + ']');

          $(this).html(_html);
          $(this).attr('data-index', index);
        }

        index++;
      });
    }

    $('.giveaway-sharing-methods').sortable({
      update: function (event, ui) {
        giveaway_reset_methods_index();
      }
    });
    $(document).on('click', '.giveaway-sharing-method .method-header', function () {
      $(this).parent().toggleClass('active');
    });
    $(document).on('click', '.giveaway-sharing-method .button-delete', function () {
      $(this).parents('.giveaway-sharing-method').remove();
      giveaway_reset_methods_index();
    });
    $(document).on('change', '.giveaway-sharing-method .method-select', function () {
      var value = $(this).val();

      if ('custom' === value) {
        var template = wp.template('sharing-method-custom'),
            method = $(this).parents('.giveaway-sharing-method'),
            index = method.attr('data-index'),
            data = {
          index: index,
          url: '',
          title: method.attr('data-title'),
          attributes: {
            url: '',
            text: '',
            image: ''
          }
        },
            html = template(data);
        method.find('.giveasap-method-html').html(html);
        method.find('.color-picker').wpColorPicker();
      } else {
        var method = $(this).parents('.giveaway-sharing-method');
        method.find('.giveasap-method-html').html('');
      }
    });

    function strip_tags(input, allowed) {
      allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)

      var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
          commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
      commentsAndPhpTags = /<(script|style)[^>]*?>.*?<\/\1>/g;
      return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
        return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
      });
    }

    $(document).on('keyup', '.giveaway-sharing-method .method-title', function () {
      var val = strip_tags($(this).val());
      console.log(val);
      $(this).parents('.giveaway-sharing-method').find('.method-header strong').html(val);
    });

    if ($('.giveaway-sharing-methods').length) {
      $('.giveaway-sharing-methods .color-picker').wpColorPicker();
    }
    /** Form Fields ********/


    function giveaway_reset_form_fields_index() {
      var index = 0;
      $('.sg-form-fields-container').children().each(function () {
        var _index = parseInt($(this).attr('data-index'));

        if (_index !== index) {
          var html = $(this).html(),
              reg = new RegExp('form_fields\\[' + _index + '\\]', 'g');

          var _html = html.replace(reg, 'form_fields[' + index + ']');

          $(this).html(_html);
          $(this).attr('data-index', index);
        }

        index++;
      });
    }

    function giveaway_reset_prizes_fields_index() {
      var index = 0;
      $('.sg-prizes-field-container').children().each(function () {
        var _index = parseInt($(this).attr('data-index'));

        if (_index !== index) {
          var html = $(this).html(),
              reg = new RegExp('form_fields\\[' + _index + '\\]', 'g');

          var _html = html.replace(reg, 'form_fields[' + index + ']');

          $(this).html(_html);
          $(this).attr('data-index', index);
        }

        index++;
      });
    }

    $(document.body).on('change', '.sg-field-type', function (e) {
      var type = $(this).val(),
          $this = $(this),
          parent = $this.parent();

      if ('radio' === type || 'select' === type) {
        if (parent.find('.sg-form-field-options').length === 0) {
          var index = $this.parents('.sg-form-field').attr('data-index'),
              tmpl = wp.template('sg-form-field-options'),
              html = tmpl({
            index: index
          });
          parent.append(html);
        }
      } else {
        var options = parent.find('.sg-form-field-options');

        if (options.length) {
          options.remove();
        }
      }
    });
    $(document.body).on('click', '.sg-remove-form-field-option', function (e) {
      $(this).parent().remove();
    });
    $(document.body).on('click', '.sg-add-form-field-option', function (e) {
      e.preventDefault();
      var index = $(this).parents('.sg-form-field').attr('data-index'),
          tmpl = wp.template('sg-form-field-option'),
          html = tmpl({
        index: index
      });
      $(this).parent().find('.sg-form-field-options-container').append(html);
    });
    $('.sg-form-fields-container').sortable({
      placeholder: "ui-state-highlight",
      handle: '.sg-form-row-handle',
      update: function (event, ui) {
        giveaway_reset_form_fields_index();
      }
    });
    $('#sgAddFormField').on('click', function () {
      var tmpl = wp.template('sg-form-field'),
          count = $('.sg-form-fields-container').children().length,
          html = tmpl({
        index: count
      });
      $('.sg-form-fields-container').append(html);
    });
    $(document.body).on('click', '.sg-delete-form-field', function () {
      $(this).parents('.sg-form-field').remove();
      giveaway_reset_form_fields_index();
    });
    $(document.body).on('click', '.sg-form-field-header .sg-field-name', function () {
      $(this).parents('.sg-form-field').toggleClass('open');
    });
    $(document.body).on('keyup', '.sg-form-field-body .sg-field-name input', function () {
      var value = $(this).val();
      value = strip_tags(value);
      $(this).parents('.sg-form-field').find('.sg-form-field-header .sg-field-name').html(value);
    });
    $('#sgAddPrizesField').on('click', function () {
      var tmpl = wp.template('sg-prizes-field'),
          count = $('.sg-prizes-field-container').children().length,
          html = tmpl({
        index: count
      });
      $('.sg-prizes-field-container').append(html);
      var prizesBox = $('.sg-prizes-field-container .sg-form-field').last();
      prizesBox.toggleClass('open');
      prizesBox.find('.sg-field-name input').focus();
      sg_hide_show_metabox_fields_per_type();
      $(document.body).triggerHandler('sg_prizes_field_added');
    });
    $(document.body).on('click', '.sg-delete-prizes-field', function () {
      $(this).parents('.sg-form-field').remove();
      giveaway_reset_prizes_fields_index();
    });
    $('.sg-prizes-field-container').sortable({
      placeholder: "ui-state-highlight",
      handle: '.sg-form-row-handle',
      update: function (event, ui) {
        giveaway_reset_prizes_fields_index();
      }
    });
    /** Giveaway ***********/

    function sg_hide_show_metabox_fields_per_type() {
      var giveaway_type = $('#giveasap_type').val();
      $('.sg-metaboxes .hide_if_any').hide();
      $('.sg-metaboxes .show_if_any').show();
      $('.hide_if_' + giveaway_type).hide();
      $('.show_if_' + giveaway_type).show(); // $('.sg-metaboxes tr:not(.hide_if_' + giveaway_type + ')').show();

      $(document.body).triggerHandler('sg_giveaway_type_changed', [giveaway_type]);
    }

    if ($('#sg-metaboxes').length) {
      sg_hide_show_metabox_fields_per_type();
      $('#giveasap_type').on('change', sg_hide_show_metabox_fields_per_type);
    }
    /** Globals ***********/


    $(document).on('click', '.sg-button-action', function (e) {
      e.preventDefault();
      var $this = $(this),
          ajax = $this.attr('data-ajax') || '',
          reload = $this.attr('data-reload') || '0',
          callback = $this.attr('data-callback') || '',
          nonce = $this.attr('data-nonce') || '',
          text2 = $this.attr('data-text'),
          text = $this.text(),
          href = $this.attr('href');

      if (text2) {
        $this.text(text2);
      }

      if (ajax) {
        var data = {
          action: ajax
        };

        if (nonce) {
          data.nonce = gasap.nonce;
        }

        if (this.attributes.length) {
          for (var i = 0; i < this.attributes.length; i++) {
            var attr = this.attributes[i];
            data[attr.nodeName.replace('-', '_')] = attr.nodeValue;
          }
        }

        $.ajax({
          url: gasap.ajax_url,
          dataType: 'json',
          data: data,
          success: function (resp) {
            if (callback) {
              var fn = window[callback];

              if (typeof fn === 'function') {
                fn($this, resp);
              }
            }

            if (text2 && '1' !== reload) {
              $this.text(text);
            }

            if ('1' === reload) {
              if (href) {
                window.location.href = href;
              } else {
                location.reload(false);
              }
            }
          }
        });
      } else {
        if (callback) {
          var fn = window[callback];

          if (typeof fn === 'function') {
            fn($this);
          }
        }

        if (text2 && '1' !== reload) {
          $this.text(text);
        }

        if ('1' === reload) {
          if (href) {
            window.location.href = href;
          } else {
            location.reload(false);
          }
        }
      }
    });
    $('.sg-action-category-title').on('click', function (e) {
      $(this).parent().toggleClass('active');
    });
    $('.sg-action').on('click', function (e) {
      var $actionContainer = $('#sgEntriesActions'),
          count = $actionContainer.children().length,
          slug = $(this).attr('data-slug'),
          template = wp.template(slug);

      if ($('#tmpl-' + slug).length) {
        e.preventDefault();
        $actionContainer.append(template({
          index: count
        }));
        $(document.body).trigger('sg-enhanced-select-search-init');
        $(document.body).trigger('sg-color-picker-init');
        var action = $actionContainer.children().last();
        action.find('.sg-admin-action-title').trigger('click');
        window.giveasap_max_instance_id = window.giveasap_max_instance_id + 1;
        action.find('.sg-action-form-instance').val(window.giveasap_max_instance_id);
        $([document.documentElement, document.body]).animate({
          scrollTop: $actionContainer.children().last().offset().top - 24 // admin bar.

        }, 500);
      }
    });
    $('.sg-extra-actions').sortable({
      update: function (event, ui) {
        giveaway_reset_extra_action_index();
        giveasap_update_specific_mandatory_actions();
      }
    });
    $(document).on('click', '.sg-admin-action-remove', function (e) {
      e.preventDefault();
      $(this).parents('.sg-admin-action').remove();
      giveaway_reset_extra_action_index();
      giveasap_update_specific_mandatory_actions();
    });

    function giveaway_reset_extra_action_index() {
      var index = 0;
      $('.sg-extra-actions').children().each(function () {
        var _index = parseInt($(this).attr('data-index'));

        if (_index !== index) {
          var html = $(this).html(),
              reg = new RegExp('entries_actions\\[' + _index + '\\]', 'g');

          var _html = html.replace(reg, 'entries_actions[' + index + ']');

          $(this).html(_html);
          $(this).attr('data-index', index);
        }

        index++;
      });
    }

    $(document).on('click', '.sg-admin-action-title', function (e) {
      e.preventDefault();
      $(this).parent().toggleClass('active');
    });
    $(document).on('click', '.sg-multioption-button', function (e) {
      e.preventDefault();
      var id = $(this).attr('data-id'),
          name = $(this).attr('data-name'),
          tmpl = $(this).attr('data-template'),
          count = $('#' + id).children().length,
          template = wp.template(tmpl),
          html = template({
        index: count,
        id: id,
        name: name
      });
      $('#' + id).append(html);
    });
    $(document).on('click', '.sg-multioption-delete', function (e) {
      e.preventDefault();
      $(this).parent().remove();
    });
    $(document).on('keyup', '.sg-form-field-title input', function () {
      var parent = $(this).parents('.sg-admin-form');
      var instance = parent.find('.sg-action-form-instance').val();
      var title = $(this).val();
      title = strip_tags(title);
      giveasap_update_specific_mandatory_action(instance, title);
      giveasap_update_specific_mandatory_actions();
    });
    $(document).on('change', '.mandatory-specific-action-checkbox', function () {
      var parent = $(this).parents('.sg-admin-form');
      var field = $(this).parents('.sg-form-field');
      var selected = field.attr('data-value');
      var instance = parent.find('.sg-action-form-instance').val();
      var value = $(this).val();
      selected = selected.split(',');

      if ($(this).prop('checked') && selected.indexOf(value) < 0) {
        selected.push(value);
      }

      if (!$(this).prop('checked') && selected.indexOf(value) >= 0) {
        var index = selected.indexOf(value);

        if (index > -1) {
          selected.splice(index, 1);
        }
      }

      field.attr('data-value', selected.join(','));
    });

    function giveasap_update_specific_mandatory_action(instance, title) {
      var ids = window.giveasap_actions.map(function (action) {
        return parseInt(action.instance);
      });

      if (ids.indexOf(parseInt(instance)) >= 0) {
        window.giveasap_actions = window.giveasap_actions.map(function (action) {
          if (parseInt(action.instance) !== parseInt(instance)) {
            return action;
          }

          action.title = title;
          return action;
        });
      } else {
        window.giveasap_actions.push({
          instance: instance,
          title: title
        });
      }
    }

    function giveasap_update_specific_mandatory_actions() {
      $(document).find('.sg-select-specific-mandatory-actions').each(function () {
        var $this = $(this);
        var parent = $this.parents('.sg-admin-form');
        var field = $this.parents('.sg-form-field');
        var selected = field.attr('data-value');
        var name = field.attr('data-name');
        var instance = parent.find('.sg-action-form-instance').val();
        var data = [];

        if (selected) {
          selected = selected.split(',');
        }

        if (window.giveasap_actions && window.giveasap_actions.length) {
          for (var g = 0; g < window.giveasap_actions.length; g++) {
            var action_id = window.giveasap_actions[g].instance;

            if (parseInt(instance) === parseInt(action_id)) {
              continue;
            }

            var optionSelected = selected && selected.indexOf(action_id) >= 0;
            data.push({
              id: action_id,
              text: window.giveasap_actions[g].title,
              selected: optionSelected
            });
          }
        }

        if (!data.length) {
          field.addClass('hidden');
          return;
        }

        var html = '';

        for (var d = 0; d < data.length; d++) {
          var action = data[d];
          var checkedHTML = '';

          if (action.selected) {
            checkedHTML = 'checked="checked"';
          }

          html += '<label for="' + instance + '_specific_action_' + d + '">';
          html += '<input class="mandatory-specific-action-checkbox" ' + checkedHTML + ' id="' + instance + '_specific_action_' + d + '" type="checkbox" name="' + name + '" value="' + action.id + '"/>';
          html += action.text;
          html += '</label>';
        }

        $this.html(html);
        field.removeClass('hidden');
      });
    }

    giveasap_update_specific_mandatory_actions();
    $(document).find('.sg-select2:not(.enhanced)').each(function () {
      if ($(this).parents('.sg-report-options').length) {
        return;
      }

      var $this = $(this);
      $(this).select2({
        placeholder: $this.attr('placeholder') || '',
        minimumInputLength: $this.attr('data-mininput') || 3,
        ajax: {
          url: gasap.ajax_url,
          dataType: 'json',
          data: function (params) {
            var query = {
              search: params.term,
              type: 'public',
              action: $this.attr('data-action') || 'sg_get_giveaways'
            }; // Query parameters will be ?search=[term]&type=public

            return query;
          },
          processResults: function (data) {
            if (data.success) {
              var items = [];

              for (var index in data.data) {
                items.push({
                  id: data.data[index].ID,
                  text: data.data[index].post_title
                });
              }

              return {
                results: items
              };
            } // Transforms the top-level key of the response object from 'items' to 'results'


            return {
              results: data.items
            };
          }
        }
      }).addClass('enhanced');
    });
    

    /** Select2 Ajax **/

    $(document.body).on('sg-enhanced-select-search-init', function () {
      // Ajax product search box
      $(':input.sg-select-search').filter(':not(.enhanced)').each(function () {
        var select2_args = {
          allowClear: $(this).data('allow_clear') ? true : false,
          placeholder: $(this).data('placeholder'),
          minimumInputLength: $(this).data('minimum_input_length') ? $(this).data('minimum_input_length') : '3',
          escapeMarkup: function (m) {
            return m;
          },
          ajax: {
            url: gasap.ajax_url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                term: params.term,
                action: $(this).data('action') || 'sg_select_search',
                security: gasap.nonce,
                exclude: $(this).data('exclude'),
                exclude_type: $(this).data('exclude_type'),
                include: $(this).data('include'),
                limit: $(this).data('limit'),
                display_stock: $(this).data('display_stock')
              };
            },
            processResults: function (data) {
              var terms = [];

              if (data) {
                $.each(data, function (id, text) {
                  terms.push({
                    id: id,
                    text: text
                  });
                });
              }

              return {
                results: terms
              };
            },
            cache: true
          }
        };
        $(this).select2(select2_args).addClass('enhanced');

        if ($(this).prop('multiple')) {
          $(this).on('change', function () {
            var $children = $(this).children();
            $children.sort(function (a, b) {
              var atext = a.text.toLowerCase();
              var btext = b.text.toLowerCase();

              if (atext > btext) {
                return 1;
              }

              if (atext < btext) {
                return -1;
              }

              return 0;
            });
            $(this).html($children);
          });
        }
      });
    }).trigger('sg-enhanced-select-search-init');
    $(document.body).on('sg-color-picker-init', function () {
      // Ajax product search box
      $(':input.sg-color-picker').filter(':not(.enhanced)').each(function () {
        $(this).wpColorPicker();
      });
    }).trigger('sg-color-picker-init');

    function sgImportSiteUsers(giveaway_id) {
      $('#sgImportSiteUsersSpinner').addClass('is-active');
      $.ajax({
        url: gasap.ajax_url,
        data: {
          action: 'sg_import_site_users',
          giveaway_id: giveaway_id,
          nonce: gasap.nonce
        },
        success: function (resp) {
          if (!resp.success) {
            $('#sgImportSiteUsersSpinner').removeClass('is-active');
            alert('Something went wrong. Try again.');
            return;
          }

          $('#sgImportSiteUsers span').html(resp.data.users);

          if (resp.data.done) {
            $('#sgImportSiteUsersSpinner').removeClass('is-active');
            alert('Imported All Users');
            window.location.reload();
            return;
          }

          sgImportSiteUsers(giveaway_id);
        },
        error: function (resp) {
          $('#sgImportSiteUsersSpinner').removeClass('is-active');
          alert('Something went wrong. Try again.');
        }
      });
    }

    $(document.body).on('click', '#sgImportSiteUsers', function () {
      var giveaway_id = $(this).attr('data-giveaway');
      sgImportSiteUsers(giveaway_id);
    });
  });
})(jQuery);
}();
/******/ })()
;
//# sourceMappingURL=admin.js.map