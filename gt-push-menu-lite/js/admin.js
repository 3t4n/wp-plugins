jQuery(function($){

	var GTPM_NAME = 'GT Push Menu Lite';
	$.widget( "gt.colorSwatch", {
		// default options
		options: {
			color: '#FFFFFF',

			// callbacks
			change: null
		},

		// the constructor
		_create: function() {
			var el = this.element,
				_this = this;

			_this.opened = false;

			if ( !el.hasClass('gt-push-menu-color-swatch') ) {
				el.addClass( 'gt-push-menu-color-swatch' )
			}		

			el.disableSelection(); // prevent double click to select text

			this.colorEl = $('<div></div>').appendTo( this.element );

			// holder for color picker dropdown
			this.holderEl = 
				$('<div style="display: none;"></div>')
					.css({ 'position': 'absolute', 'zIndex': '9000' })
					.appendTo(document.body);

			this.picker = 
				this.holderEl.colpick({
					flat:true,
					color: _this.options.color,
					onSubmit: function(hsb, hex){
						_this.options.color = '#'+hex;
						_this._refresh('picker submit');
						_this.holderEl.hide();
						_this.opened = false;						
					},
					onChange: function(hsb, hex){
						_this.options.color = '#'+hex;
						_this._refresh('picker change');
					}
				});

			this._on( this.element, {
				click: function() {
					var o = $(_this.element).offset();
					_this.holderEl.css({
						top: o.top,
						left: o.left+36
					}).show();
					_this.opened = true;
				}
			});	

			this._on(document.body, {
				click: function(e) {
					var holder = _this.holderEl,
						isPickerSubControl = !!$(e.target).closest('.colpick')[0];

					if ( !isPickerSubControl &&
						  holder.is(':visible') && 
						  e.target != holder && 
						  $(e.target).parents('.gt-push-menu-color-swatch').length == 0 
					   ) {
						holder.hide();
						_this.opened = false;
					}
				}
			});	

			this._refresh('init');
		},

		// called when created, and later when changing options
		_refresh: function(evType) {
			this.colorEl.css({ backgroundColor: this.options.color });
			if ( evType == 'init' ) {
				this.picker.colpickSetColor(this.options.color, 'current');	
			} else {
				// trigger a callback/event
				this._trigger( "change", { type: evType }, { color: this.options.color, manual: this.opened });
			}
		},

		// events bound via _on are removed automatically
		// revert other modifications here
		_destroy: function() {
			// remove generated elements
			this.colorEl.remove();

			this.element
				.removeClass( 'gt-push-menu-color-swatch' )
				.enableSelection();
		},

		// _setOptions is called with a hash of all options that are changing
		// always refresh when changing options
		_setOptions: function() {
			// _super and _superApply handle keeping the right this-context
			this._superApply( arguments );
			this._refresh('optins refresh');
		},

		// _setOption is called for each individual option that is changing
		_setOption: function( key, value ) {
			this._super( key, value );
		}
	});

	function addAccordionSection(opts) {

		// var iconsMap = {
		// 	"71": {
		// 		"1121": "icon-home"
		// 	}
		// };

		// show waring message if there are no menus
		if ( $('#menu').val() == '0' ) {

			var warnTpl = [
				'<div class="manage-menus" style="background: #FFFAD8;">',
	 				'<span class="add-edit-menu-action">',
	 					'<strong style="margin-right: 1em;">'+GTPM_NAME+'</strong>Please create a menu to enable GT Push Menu configuration interface.',
					'</span>',
				'</div>'
			].join('');

			$(warnTpl).insertAfter('.nav-tab-wrapper');

			return;
		}

		var optsDefaults = {
			iconsMap: {},

			menuColor: '#BADA55',
			borderColor: '#82993b',
			textColor: '#FFFFFF',
			headerTextColor: '#000000',
			extraMenuLinkColor: '#BADA55',
			hideOrigMenu: true,
			origMenuSelector: '',
			menuIcon: '',
			extraMenuIcon: '',
			menuTitle: 'Menu',
			alwaysShow: false,

			menuWidth: 250,

			linkColors: true,
			textColorAuto: true,
			headerTextColorAuto: true,
			showSearchBox: true,
			menuBarStyle: 'fixed',
			fixedEls: '',
			overlapMode: false,
			showHomeLevel: false,
			extraMenuTrigger: '',
			menuId: 0
		};

		if ( $.isArray(opts) && !opts.length ) {
			opts = optsDefaults;
		}

		opts = $.extend(optsDefaults, opts);

		var icons = opts.iconsMap[$('#menu').val()] || {},
			menuChanged = false;

		$([
			'<div class="updated">',
				'<p>Hey, do you know there\'s a Pro version of the GT Push Menu plugin? <a href="http://griffinthemes.com/product/gt-push-menu-pro/">Check out it\'s advantages</a> and see how you can make your menu even more awesome.</p>',
			'</div>'
		].join('')).insertBefore($('#nav-menus-frame'));
		
		// accordion menu section template
		var tpl = $([
			'<li class="control-section accordion-section gt-push-menu top open" id="gt-push-menu">',
				'<h3 class="accordion-section-title hndle" tabindex="0" title="'+GTPM_NAME+'">'+GTPM_NAME+'</h3>',
				'<div class="accordion-section-content gt-push-menu-section">',
					'<div class="inside">',
						'<div class="gt-push-menu-section-row">',
							'<label><input id="gt-push-menu-cb-use-this-menu" type="checkbox"> Enable for this menu</label>',
						'</div>',						
						'<div class="gt-push-menu-section-row">',
							'<label>Menu title</label>',
							'<input type="text" id="gt-push-menu-ed-menu-title" value="'+opts.menuTitle+'">',	
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<div class="gt-col-1">',
								'<label>Icon</label>',
							'</div>',
							'<div class="gt-col-2">',
							
							'</div>',
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<div class="gt-col-1">',
								'<i id="gt-push-menu-icon" class="gtpm-icon '+opts.menuIcon+'"></i>',
								'<div style="display: none;" id="gtpm-no-icon">no icon</div>',
							'</div>',
							'<div class="gt-col-2">',
								'<button type="button" class="button-secondary" id="gt-push-menu-set-menu-icon">Set icon</button>',
								'<button type="button" class="button-secondary" id="gt-push-menu-remove-menu-icon">Remove icon</button>',
							'</div>',
						'</div>',
						'<hr>',						
						'<div class="gt-push-menu-section-row">',
							'<label class="gt-push-menu-color-swatch-label">Background color</label>',
							'<div id="gt-push-menu-color-picker" class="gt-push-menu-color-swatch"></div>',
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<label class="gt-push-menu-color-swatch-label">Heading text color</label>',
							'<div id="gt-push-menu-color-picker-header" class="gt-push-menu-color-swatch"></div>',
							'<label class="gt-push-menu-color-swatch-label-auto"><input id="gt-push-menu-cb-header-auto" type="checkbox"> auto</label>',
						'</div>',						
						'<div class="gt-push-menu-section-row">',
							'<label class="gt-push-menu-color-swatch-label">Text color</label>',
							'<div id="gt-push-menu-color-picker-text" class="gt-push-menu-color-swatch"></div>',
							'<label class="gt-push-menu-color-swatch-label-auto"><input id="gt-push-menu-cb-text-color-auto" type="checkbox"> auto</label>',
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<label class="gt-push-menu-color-swatch-label">Border color</label>',
							'<div id="gt-push-menu-color-picker-border" class="gt-push-menu-color-swatch"></div>',
							'<label class="gt-push-menu-color-swatch-label-auto"><input id="gt-push-menu-cb-linkColors" type="checkbox"> auto</label>',
						'</div>',
						'<hr>',
						'<div class="gt-push-menu-section-row">',
							'<label>Menu bar style:</label>',
							'<select id="gt-push-menu-sel-show-menu-bar">',
								'<option value="hide">Don&apos;t show</option>',
								'<option value="bar">Bar with title</option>',
								'<option value="fixed">Fixed bar with title</option>',
								'<option value="square-left">Square button on the left</option>',
								'<option value="square-right">Square button on the right</option>',
							'</select>',
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<label>Additional open/close menu button:</label>',
							'<input type="text" placeholder="CSS selector" id="gt-push-menu-menu-trigger-selector">',
						'</div>',						

						'<hr>',
						'<div class="gt-push-menu-section-row">',						
							'<label>Menu width:</label>',
							'<input type="text" id="gt-push-menu-width">px',
						'</div>',
						'<div class="gt-push-menu-section-row">',
							'<label><input id="gt-push-menu-cb-overlap-mode" type="checkbox"> Use overlap mode</label>',
						'</div>',
						'<div class="gt-push-menu-section-row" id="gt-push-menu-row-show-home-level">',
							'<label><input id="gt-push-menu-cb-show-home-level" type="checkbox"> Show home level</label>',
						'</div>',						
						'<hr>',
						'<div class="gt-push-menu-section-row">',
							'<label><input id="gt-push-menu-cb-hide-orig-menu" type="checkbox"> Hide original menu</label>',
						'</div>',						
						'<div class="gt-push-menu-section-row">',						
							'<label>Original menu CSS selector:</label>',
							'<input type="text" id="gt-push-menu-original-menu-selector">',
						'</div>',
						'<hr>',
						// 
						// '<div class="gt-push-menu-section-row">',
						// 	'<label>Fixed elements selectors:</label>',
						// 	'<input type="text" id="gt-push-menu-fixed-els-selector">',
						// '</div>',
						// '<hr>',						
						'<div class="gt-push-menu-section-row">',
							'<label><input id="gt-push-menu-cb-show-search-box" type="checkbox"> Show search box</label>',
						'</div>',
						'<div class="gt-push-menu-section-row">',							
							'<label><input id="gt-push-menu-cb-always-show" type="checkbox"> Show menu on all devices</label>',
						'</div>',	
					'</div>',
				'</div>',
			'</li>'
		].join(''));

		$('#side-sortables ul li.open').removeClass('open');
		tpl.prependTo($('#side-sortables > ul'));

		function setAutoBorderColor() {
			var c = pusher.color(opts.menuColor);
			c = ( c.hsv()[2] < 60 ) ? c.tint(.2).hex6() : c.shade(.2).hex6();
			cpBorder.colorSwatch({ color: c });
		}

		function getAutoHeaderTextColor() {
			var c = pusher.color(opts.menuColor);
			return ( c.hsv()[2] < 60 ) ? c.tint(.4).hex6() : c.shade(.4).hex6();
		}

		function setAutoHeaderTextColor() {
			if ( cpHeaderText ){
				cpHeaderText.colorSwatch({ color: getAutoHeaderTextColor() });
			}
		}

		// --- 

		function getAutoTextColorValue() {
			var c = pusher.color(opts.menuColor);
			return ( c.hsv()[2] < 60 ) ? '#FFFFFF' : '#000000';
		}

		function setAutoTextColor() {
			if ( cpText ) {
				cpText.colorSwatch({ color: getAutoTextColorValue() });
			}
		}

		$('#gt-push-menu-original-menu-selector')
			.val(opts.origMenuSelector)
			.change(function(){
				opts.origMenuSelector = $(this).val();
			});	

		$('#gt-push-menu-width')
			.val(opts.menuWidth)
			.change(function(){
				opts.menuWidth = $(this).val();
				menuChanged = true;
			});	


		// color picker initialisation
		var cpBG, 
			cpBorder,
			cpText, 
			cpHeaderText;

		cpBorder = $('#gt-push-menu-color-picker-border').colorSwatch({
			color: opts.borderColor,
			change: function(ev, data){
				menuChanged = true;
				opts.borderColor = data.color;				
				if ( data.manual ) {
					$('#gt-push-menu-cb-linkColors').prop('checked', false);
				}
			}
		});

		cpBG = $('#gt-push-menu-color-picker').colorSwatch({
			color: opts.menuColor,
			change: function(ev, data){
				opts.menuColor = data.color;
				menuChanged = true;

				if ( ev.originalEvent.type !== 'init' ) {
					if ( opts.linkColors ) {
						setAutoBorderColor();
					}

					if ( opts.headerTextColorAuto ) {
						setAutoHeaderTextColor();
					}			

					if ( opts.textColorAuto ) {
						setAutoTextColor();
					}
				}
			}
		});

		cpText = $('#gt-push-menu-color-picker-text').colorSwatch({
			color: opts.textColorAuto ? getAutoTextColorValue() : opts.textColor,
			change: function(ev, data){
				opts.textColor = data.color;
				menuChanged = true;	
				if ( data.textColorAuto ) {
					$('#gt-push-menu-cb-text-color-auto').prop('checked', false);
				}
			}			
		});

		cpHeaderText = $('#gt-push-menu-color-picker-header').colorSwatch({
			color: ( opts.headerTextColorAuto ) ? getAutoHeaderTextColor() : opts.headerTextColor,
			change: function(e, data){
				opts.headerTextColor = data.color;
				menuChanged = true;
				if ( data.manual ) {
					$('#gt-push-menu-cb-header-auto').prop('checked', false);
				}
			}
		});
		// initializing color dependencies

		$('#gt-push-menu-cb-linkColors')
			.prop('checked', opts.linkColors)
			.change(function(){
				opts.linkColors = $(this).prop('checked');
				if ( opts.linkColors ) {
					setAutoBorderColor();
				}
			});

		$('#gt-push-menu-cb-text-color-auto')
			.prop('checked', opts.textColorAuto)
			.change(function(){
				opts.textColorAuto = $(this).prop('checked');
				if ( opts.textColorAuto ) {
					setAutoTextColor();
				}
			});

		$('#gt-push-menu-cb-header-auto')
			.prop('checked', opts.headerTextColorAuto)
			.change(function(){				
				opts.headerTextColorAuto = $(this).prop('checked');
				if ( opts.headerTextColorAuto ) {
					setAutoHeaderTextColor();
				}
			});

		$('#gt-push-menu-cb-hide-orig-menu')
			.prop('checked', opts.hideOrigMenu)
			.change(function(){	
				menuChanged = true;
				opts.hideOrigMenu = $(this).prop('checked');
			});

		$('#gt-push-menu-cb-always-show')
			.prop('checked', opts.alwaysShow)
			.change(function(){
				menuChanged = true;
				opts.alwaysShow = $(this).prop('checked');
			});

		$('#gt-push-menu-cb-show-search-box')
			.prop('checked', opts.showSearchBox)
			.change(function(){
				menuChanged = true;
				opts.showSearchBox = $(this).prop('checked');
			});

		$('#gt-push-menu-menu-trigger-selector')
			.val(opts.extraMenuTrigger)
			.change(function(){
				menuChanged = true;
				opts.extraMenuTrigger = $(this).val();
			});

		var oldMenuId = 0;

		$('#gt-push-menu-cb-use-this-menu')
			.prop('checked', opts.menuId == $('#menu').val() )
			.change(function(){
				menuChanged = true;
				if ( $(this).prop('checked') ) {
					oldMenuId = opts.menuId;
					opts.menuId = $('#menu').val();	
				} else {
					opts.menuId = oldMenuId;
				}				
			});


		function updateDependentControls() {
			var isBarStyle = ['fixed','bar'].indexOf(opts.menuBarStyle) >= 0;
			$('#gt-push-menu-row-show-home-level')[ opts.overlapMode ? 'show' : 'hide' ]();
		}

		$('#gt-push-menu-sel-show-menu-bar')
			.val(opts.menuBarStyle)
			.change(function(){
				menuChanged = true;
				opts.menuBarStyle = $(this).val();				
				updateDependentControls();
			});

		if ( !findIconClass($('#gt-push-menu-icon')[0]) ) {
			$('#gtpm-no-icon').show();
		}

		if ( !opts.menuIcon ) {
			$('#gt-push-menu-icon').hide();
			$('#gtpm-no-icon').show();
		}

		// set menu icon

		function setMenuIcon(iconEl, noIconEl, optionName) {
			return function() {
				var currentClass = findIconClass($(iconEl)[0]);
				createDialog(currentClass, function(newClassName){
					if ( newClassName !== currentClass ) {
						$(iconEl)
							.removeClass(currentClass)
							.addClass(newClassName).
							show();
						opts[optionName] = newClassName;
						$(noIconEl).hide();
						menuChanged = true;
					}
				});
			};
		}

		function removeMenuIcon(iconEl, noIconEl, optionName) {
			return function(){
				var currentClass = findIconClass($(iconEl)[0]);

				if ( currentClass ) {
					$(iconEl)
						.removeClass(currentClass)
						.hide();
					$(noIconEl).show();
					opts[optionName] = '';
					menuChanged = true;					
				}
			};
		}

		$('#gt-push-menu-set-menu-icon')
			.click(setMenuIcon('#gt-push-menu-icon', '#gtpm-no-icon', 'menuIcon'));
		$('#gt-push-menu-remove-menu-icon')
			.click(removeMenuIcon('#gt-push-menu-icon', '#gtpm-no-icon', 'menuIcon'));


		$('#gt-push-menu-ed-menu-title')
			.change(function(){
				opts.menuTitle = $(this).val();
				menuChanged = true;
			});

		$('#gt-push-menu-cb-overlap-mode')
			.prop('checked', opts.overlapMode)
			.change(function(){
				menuChanged = true;
				opts.overlapMode = $(this).prop('checked');
				updateDependentControls();
			});

		$('#gt-push-menu-cb-show-home-level')
			.prop('checked', opts.showHomeLevel)
			.change(function(){
				menuChanged = true;
				opts.showHomeLevel = $(this).prop('checked');
			});

		updateDependentControls();


		function findIconClass(el) {
			if ( !el ) { return null; }
			var res = el.className.match(/(gtpm-icon-[\w\-]+)/);
			return res ? res[1] : null;
		}

		function updateIconsMap(done) {
			var icons = {};

			$('.menu-item').each(function(i, el){
				var id = el.id.replace('menu-item-', ''),
					className = findIconClass($(el).find('.item-title')[0]);
				icons[id] = className;
			});

			opts.iconsMap[$('#menu').val()] = icons;

			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'gtpmAjSetOptions',
					json: JSON.stringify(opts)
				}
			}).done(function(data){
				//console.log(data.msg);
			}).fail(function(err){
				console.error(err);
			}).always(function(){
				done();
			});
		}

		$('#update-nav-menu').submit(function(e){
			var form = $(this);
			if ( menuChanged ) {
				e.preventDefault();
				updateIconsMap(function(){
					menuChanged = false;
					form.submit();
				});				
			}
		});		

		// ------------------------------------

		// creation of set icon buttons
		$([
			'<button class="gt-set-icon button-secondary">+ icon</button>',
			'<button class="gt-remove-icon button-secondary">- icon</button>',
		].join('')).prependTo($('.menu-item-handle .item-type'));		

		$('.gt-set-icon').click(function(e){
			var btn = $(this);
			e.preventDefault();
			var currentClass = findIconClass(btn.closest('.menu-item').find('.item-title')[0]);
			createDialog(currentClass, function(newClassName){
				var title = btn.closest('.menu-item').find('.item-title');
				if ( !title.hasClass('gtpm-icon') ) { title.addClass('gtpm-icon'); } 
				var cls = findIconClass(title[0]);
				if ( cls ) {
					title.removeClass(cls);
				}
				if ( cls !== newClassName ) {
					menuChanged = true;
				}
				title.addClass(newClassName);
			});
		});

		$('.gt-remove-icon').click(function(e){
			var title = $(this).closest('.menu-item').find('.item-title');
			e.preventDefault();

			if ( title[0] ) {
				var currentClass = findIconClass(title[0]);
				title.removeClass(currentClass);
				menuChanged = true;
			}
		});		

		// menu icons initialisation
		$('.menu-item').each(function(i, el){
			var id = el.id.replace('menu-item-', '');
			if ( icons[id] ) {
				$(el).find('.item-title').addClass('gtpm-icon '+icons[id]);
			}
		});
	}

	function createDialog(currentClass, cb) {
		var selectedIcon = '';
		var tpl = $([
			'<div tabindex="0" class="supports-drag-drop">',
				'<div class="media-modal wp-core-ui">',
					'<a class="media-modal-close" href="#" title="Close"><span class="media-modal-icon"></span></a>',
					'<div class="media-modal-content">',
						'<div class="media-frame hide-menu hide-router media-gt-icon-select wp-core-ui">',
							'<div class="media-frame-title"><h1>Select Icon</h1></div>',
							'<div class="media-frame-content">',								
							'</div>',
							'<div class="media-frame-toolbar">',
								'<div class="media-toolbar">',
									'<div class="media-toolbar-secondary">',
										'<div class="media-selection empty">',
											'<div class="selection-info">',
												'<span class="count">0 selected</span>',
												'<a class="edit-selection" href="#">Edit</a>',
												'<a class="clear-selection" href="#">Clear</a>',
											'</div>',
											'<div class="selection-view">',
												'<ul class="attachments ui-sortable" id="__attachments-view-44"></ul>',
											'</div>',
										'</div>',
									'</div>',
									'<div class="media-toolbar-primary">',
										'<a href="#" class="button media-button button-primary button-large media-button-use">Use icon</a>',
									'</div>',
								'</div>',
							'</div>',
						'</div>',
					'</div>',
				'</div>',
				'<div class="media-modal-backdrop"></div>',
			'</div>'
		].join(''));

		tpl.appendTo(document.body);

		function closeDialog(){
			tpl.remove();
		}

		$('a.media-modal-close', tpl).click(function(e){
			e.preventDefault();
			closeDialog();			
		});

		function useIcon() {
			cb(selectedIcon);
			closeDialog();			
		}

		$('a.media-button-use', tpl).click(function(e){
			e.preventDefault();
			useIcon();
		});

		getIconsList(function(err, icons){
			var html = [];
			$(icons).each(function(i, icon){
				var active = ( icon.class == currentClass ) ? 'gt-active' : '';
				html.push('<div class="gt-icon '+active+'" iconclass="'+icon.class+'" title="'+icon.name+'"><i class="gtpm-icon '+icon.class+'"></i></div>');
			});

			$(html.join('')).appendTo( $('.media-frame-content', tpl) );

			$('.gt-icon', tpl).click(function(e){
				$('.gt-active', tpl).removeClass('gt-active');
				$(this).addClass('gt-active');
				selectedIcon = $(this).attr('iconclass');
			});

			$('.gt-icon', tpl).dblclick(function(e){
				$('.gt-active', tpl).removeClass('gt-active');
				$(this).addClass('gt-active');
				selectedIcon = $(this).attr('iconclass');
				useIcon();
			});			

		});
	}

	function getIconsList(cb) {
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'gtpmAjListIcons'
			}
		}).done(function(data){
			cb(null, data.icons);
		}).fail(function(err){
			cb(err);
		});
	}

	window.createDialog = createDialog;
	window.getIconsList = getIconsList;

	if ( (window.location+'').indexOf('nav-menus.php') > 0 ) {
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'gtpmAjGetOptions'
			}
		}).done(function(data){
			addAccordionSection(data.opts);
		}).fail(function(err){
			console.error(err);
		});		
		
	}
});