jQuery(function(t) {
	if (typeof fdoe === 'undefined') {
		return false;
	}
	if (fdoe.is_checkout == 1) {
		if (fdoe.show_error_messages == 1) {
			jQuery('ul.woocommerce-error').css('display', 'block');
			t(document.body).on('checkout_error', function() {
				jQuery('ul.woocommerce-error').css('display', 'block');
			});
		}
	}
	if (fdoe.js_frontend == 1) {
		var top_bar, sticky_mobile_parent_original;
		Category = Backbone.Model.extend({
			defaults: {
				"updating": false
			},

		});
		Categories = Backbone.Collection.extend({
			parse: function(t) {

			},
			model: Category,
			filterByIds: function(idArray) {
				return this.reset(_.map(idArray, function(id) {
					return this.get(id);
				}, this));
			},
		});
		TopmenuView = Backbone.View.extend({
			tagName: "li",
			isUpdating: !1,
			initialize: function() {
				this.$el.attr("id", "headingtop_menucat_" + this.model.get("cat_ID"));
				this.template = _.template(t("#topmenuTemplate").html());

			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				if (fdoe.subcat_with_parent == 1) {
					if ((this.model.get('has_sub') === false && this.model.get('category_count') == 0) || this.model.get('category_parent') !== 0) {
						return this;
					}
				}
				return this.$el.html(this.template(t)), this;
			},
			events: {
				'click a[href^="#"]': "collapse_dropdown",
			},
			collapse_dropdown: function() {

				t('#fdoe_products_id.arocollapse').arocollapse('hide');
			}
		});
		SidemenuView = Backbone.View.extend({
			tagName: "div",
			className: 'fdoe_menuitem',
			isUpdating: !1,
			initialize: function() {
				this.$el.attr("id", "heading_menucat_" + this.model.get("cat_ID")),
					this.template = _.template(t("#sidemenuTemplate").html())
			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				if (fdoe.subcat_with_parent == 1) {
					if ((this.model.get('has_sub') === false && this.model.get('category_count') == 0) || this.model.get('category_parent') !== 0) {
						return this;
					}
				}
				return this.$el.html(this.template(t)), this
			},
		});
		MenuView = Backbone.View.extend({
			container: null,
			container2: null,
			el: "#menu_headings",
			initialize: function() {},
			render: function() {
				container2 = document.createDocumentFragment();
				container = document.createDocumentFragment();
				this.collection.categories.forEach(this.addOne, this);
				t('#menu_headings').append(container);
				t('#menu_headings_2').append(container2);
			},
			reset: function() {},
			destroy_view: function() {
				// COMPLETELY UNBIND THE VIEW
				this.undelegateEvents();
				this.$el.removeData().unbind();
				// Remove view from DOM
				this.remove();
				Backbone.View.prototype.remove.call(this);
			},
			addOne: function(e, i) {
				if (fdoe.subcat_with_parent == 1) {
					if (e.get('has_sub') === false && (e.get('category_count') == 0)) {
						return;
					}
					if (e.get('category_parent') !== 0) {
						return;
					}
				}
				var topmenu = new TopmenuView({
					model: e
				});
				container.appendChild(topmenu.render().el);
				var sidemenu = new SidemenuView({
					model: e
				});
				container2.appendChild(sidemenu.render().el);
				if (i == 0 && fdoe.is_accordian) {
					topmenu.$('a').attr("aria-expanded", "true");
					sidemenu.$('a').attr("aria-expanded", "true");
				}
			},
		});
		// Backbone model, collection and views
		// Premium views
		/*AddressForm1 = Backbone.View.extend({

			el:"#fdoe_address_form",
			initialize: function() {
				this.template = _.template(t("#fdoe_address_form_1").html());

			},
			render: function() {
			//	var t = _.extend(this.model.attributes, {});
				return this.$el.html(this.template()), this
			},
		}),*/
		// End of Premium Views
		Product = Backbone.Model.extend({
			defaults: {
				"updating": false
			}
		});
		Products = Backbone.Collection.extend({
			parse: function(t) {
				//this.url = t.next;
				this.url = t.next_page;
				return t.products;
			},
			model: Product,
			firstAsCollection: function(numItems) {
				var models = this.first(numItems);
				return new Products(models);
			},
			restAsCollection: function(numItems) {
				var models = this.rest(numItems);
				return new Products(models);
			},
			filterById: function(idArray) {
				return this.reset(_.map(idArray, function(cat_id) {
					return this.get(cat_id);
				}, this));
			}
		});
		Cat_Menu_Titles = Backbone.View.extend({
			tagName: "div",
			className: "menu_titles",
			initialize: function() {
				this.template = _.template(t("#categoryTemplate").html());
				if (fdoe.is_accordian == 1) {
					this.$el.attr("id", "acc_menucat_" + this.model.get("cat_ID"));
					this.$el.addClass('menu_titles_accord');
					if (fdoe.layout == 'fdoe_twentytwenty') {
						this.$el.addClass('aro-style-twenty-title');
					}
				}
			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				return this.$el.html(this.template(t)), this
			},
		});
		CategoryView = Backbone.View.extend({
			tagName: "div",
			className: "cat_tbody scrollspy",
			isUpdating: !1,
			initialize: function() {
				this.$el.attr("id", "menucat_" + this.model.get("cat_ID"));
				this.$el.attr("role", "presentation");
				if (fdoe.is_accordian == 1) {
					this.$el.addClass('arocollapse');
				}
				if (fdoe.layout == 'fdoe_twentytwenty') {
					this.$el.addClass('aro-style-twenty');
				}
			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				return this.$el.html(), this
			},
			events: {},
		});
		MainView = Backbone.View.extend({
			el: "#the_main_container",
			first: true,
			initialize: function() {
				var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
				if (isIE11) {
					this.undelegateEvents();
				}
			},
			events: {
				'shown.bs.arocollapse .arocollapse': "on_accordian_shown",
				'click  #menu_headings a[href^="#"]': "smooth_scrolling",
				'click  #menu_headings_2 a[href^="#"]': "smooth_scrolling",
			},
			on_accordian_shown: function(e) {
				if (fdoe.is_accordian == 1 && (jQuery('#fdoe_products_id.aroaffix').length || jQuery('#fdoe-top-element.aroaffix').length)) {
					e.preventDefault();
					this.do_scrolling(t(e.currentTarget), e);
				} else if (fdoe.is_accordian == 1 && jQuery('#menu_headings_2.aroaffix').length) {
					(t(e.currentTarget)[0]).scrollIntoView({
						behavior: 'auto',
						block: "start",
						inline: "nearest"
					});
				}
			},
			smooth_scrolling: function(e) {
				this.$el.find('input#fdoe-search').val('').trigger('input');
				if (fdoe.is_accordian == 1) {
					let navElem = t(e.currentTarget);
					navElem.parent().addClass('fdoe-active-link').siblings().removeClass('fdoe-active-link');
					navElem.addClass('fdoe-active-link-2').parent().siblings().find('a').removeClass('fdoe-active-link-2');
					return;
				} else {

					this.do_scrolling(t(e.currentTarget.getAttribute('href')), e);
				}
			},
			do_scrolling: function(element, event) {
				if(_.isUndefined(element.offset()) || _.isUndefined(element[0] ) ){

					return;
				}

				const supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style;
				const fdoe_smoothscroll = fdoe.smooth_scrolling == 'yes' && supportsNativeSmoothScroll ? 'smooth' : 'auto';
				var isMobile = window.matchMedia("only screen and (max-width: 767px)").matches;
				var check_header = t('header').css('position') == 'fixed' || t('.nav-container.fixed').css('position') == 'fixed' || (fdoe.sticky_bar == 'yes' && (fdoe.top_bar_menu == 1 && !isMobile) || (isMobile && fdoe.sticky_mobile !== 'no')) ? true : false;
				if (!check_header && fdoe_smoothscroll == 'auto') {
					return;
				} else if (!check_header) {
					event.preventDefault();
					(element[0]).scrollIntoView({
						behavior: fdoe_smoothscroll,
						block: "start",
						inline: "nearest"
					});
					return;
				} else {
					event.preventDefault();
					var extra = 0;
					var drop = 0;
					var t_header = t('header').css('position') == 'fixed' && t('header').length > 0 ? t('header').outerHeight(true) : 0;
					var admin_height = t('#wpadminbar').outerHeight(true) === null || t('#wpadminbar').outerHeight(true) === undefined || isMobile ? 0 : t('#wpadminbar').outerHeight(true);
					if ((fdoe.sticky_bar == 'yes' && fdoe.sticky_mobile !== 'no' && isMobile)) {
						admin_height = 0;
						var aroaffix = t('.aroaffix');
						if ((fdoe.sticky_mobile == 'cats' && fdoe.is_preem == 1) || fdoe.is_preem != 1) {
							extra = aroaffix.outerHeight() === null || aroaffix.outerHeight() === undefined ? 20 + 2 * t('#menu_headings:not(.fdoe-dropdown-categories)').outerHeight(true) : aroaffix.outerHeight(true);
						} else if (fdoe.sticky_mobile == 'selector') {
							if (fdoe.top_bar != 1) {
								extra = aroaffix.outerHeight() === null || aroaffix.outerHeight() === undefined ? 2 * t('.aroaffix-top').outerHeight(true) : aroaffix.outerHeight(true);
							} else {
								extra = aroaffix.outerHeight() === null || aroaffix.outerHeight() === undefined ? 2 * t('#fdoe-top-bar-element').find('.fdoe-top-bar-header').outerHeight(true) + t('#fdoe_delivery_notice_wrapper').outerHeight(true) : aroaffix.outerHeight(true);
							}
						} else if (fdoe.sticky_mobile == 'both') {
							if (fdoe.top_bar != 1) {
								extra = aroaffix.outerHeight() === null || aroaffix.outerHeight() === undefined ? 2 * t('.aroaffix-top').outerHeight(true) + 2 * t('#menu_headings:not(.fdoe-dropdown-categories)').outerHeight(true) : aroaffix.outerHeight(true);
							} else {
								extra = aroaffix.outerHeight() === null || aroaffix.outerHeight() === undefined ? 5 + t('.fdoe_menu_header').outerHeight(true) + 2 * t('#fdoe-top-bar-element').outerHeight(true) - (t('#fdoe_delivery_notice_wrapper').outerHeight() - t('#fdoe_delivery_notice_wrapper').find('#fdoe_delivery_notice').outerHeight()) : aroaffix.outerHeight(true);
							}
						}
						if (fdoe.top_bar_mobile_dropdown == 1) {
							extra = aroaffix.outerHeight(true) !== null && aroaffix.outerHeight(true) !== undefined ? 0 : extra;
							if (fdoe.layout == 'fdoe_twentytwenty') {
								drop = aroaffix.outerHeight(true) === null || aroaffix.outerHeight(true) === undefined ? -(t('.navbar-default').outerHeight(true) - t('.fdoe-nav-header').outerHeight(true)) + 2 * t('.navbar-default').outerHeight(true) : aroaffix.outerHeight(true) - aroaffix.find('.arocollapsing.fdoe_menu_header').outerHeight(true);
							} else {
								drop = aroaffix.outerHeight(true) === null || aroaffix.outerHeight(true) === undefined ? -(t('.navbar-default').outerHeight(true) - t('.fdoe-nav-header').outerHeight(true)) + 2 * t('.navbar-default').outerHeight(true) : aroaffix.outerHeight(true) - aroaffix.find('.arocollapsing.fdoe_menu_header').outerHeight(true);
							}
							drop = fdoe.sticky_mobile == 'selector' && t('.navbar-default').length > 0 ? drop - 2 * t('.navbar-default').outerHeight(true) : drop;
						}
					} else {
						var top_sticky = t('.fdoe-top-sticky');
						if (!isMobile && fdoe.sticky_bar == 'yes' && fdoe.top_bar_menu == 1) {
							extra = top_sticky.length > 0 ? top_sticky.outerHeight(true) : 0;
							extra = top_sticky.css('position') == 'fixed' ? extra : 2 * extra;
						} else if (isMobile && fdoe.top_bar_mobile_dropdown == 1 && fdoe.layout !== 'fdoe_twentytwenty') {
							drop = t('.fdoe-dropdown-categories').length > 0 ? t('.fdoe-dropdown-categories').outerHeight(true) : 0;
						}
					}
					extra = isNaN(extra) ? 0 : extra;
					var navfixed = t('.nav-container.fixed').length > 0 ? t('.nav-container.fixed').outerHeight(true) : 0;

					window.scrollTo({
						top: element.offset().top - t_header - navfixed - admin_height - extra - drop,
						behavior: fdoe_smoothscroll
					});
				}
			},
			smooth_reset: function() {
				this.first = true;
			},
		});
		CategoryListView = Backbone.View.extend({
			visible_products: new Products(),
			visible_cats: new Categories(),
			products_stock: new Products(),
			categories_stock: new Categories(),
			modals: null,
			collection: null,
			sortedproducts: null,
			sortedcats: null,
			counter: 0,
			container: null,
			el: ".fdoe-products",
			initialize: function() {
				_.bindAll(this, 'refresh_handler');
				// bind to window
				if (fdoe.lazy_load == 1) {
					this.$el.addClass('fdoe-lazy-loading');
					jQuery(window).scroll(this.refresh_handler);
					jQuery(window).load(this.refresh_handler);
					jQuery(window).resize(this.refresh_handler);
				}
			},
			events: {
				'fdoe_change_to_pickup': 'load_from_server',
				'fdoe_change_to_delivery': 'load_from_server',
				'fdoe_change_to_eathere': 'load_from_server',
				"fdoe_menu_shown": "when_menu_shown",
				"fdoe_do_search": "init_search",
			},
			when_menu_shown: function() {
				//alert(JSON.stringify(this.collection.products));
				var pops = this.collection.products.where({
					add_mode: 'popup',
				});
				this.modals.addmodals(pops);
				if (this.menu_is_empty) {
					this.$el.trigger('fdoe_menu_is_empty');
				}
			},
			reset: function() {
				this.$el.find('div.cat_tbody').remove();
				this.$el.find('#fdoe_products_id ul').find('li').remove();
				this.load_from_server();
			},
			load_from_server: function(e) {
				if (fdoedel.menu_by_mode != 1) {
					return;
				}
				this.visible_products.reset();
				this.visible_cats.reset();
				this.reset_search();
				t('#fdoe_delivery_notice_wrapper').children().fadeOut('slow').remove();
				var block = this.$el;
				block.addClass('processing').block({
					message: null,
					overlayCSS: {
						background: '#fff',
						opacity: 0.6
					}
				});
				var $this = this;
				//alert(e.type);
				var products_exclude = this.products_stock.pluck('id');
				var categories_exclude = this.categories_stock.pluck('id');
				var request = {
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_load_products'),
					method: "POST",
					data: {
						'mode': e.type,
						'exclude': products_exclude,
						'exclude_cats': categories_exclude
					},
					success: function(response) {
						$this.$el.find('div.cat_tbody').remove();
						$this.$el.find('#fdoe_products_id ul').find('li').remove();
						t('#menu_headings_2').find('div').remove();
						if ((!_.isNull(response.categories) && typeof response.cat_ids != 'undefined' && response.cat_ids.length)) {
							$this.new_render(response, false);
						} else {

							$this.$el.trigger('fdoe_menu_is_empty');
						}
					},
					complete: function() {
						block.unblock();
						update_layout();
					},
					error: function(data) {}
				};
				jQuery.ajax(request);
			},
			reset_search:function(){

				this.displayingSearch = false;

				this.$el.find('input#fdoe-search').val('');
				this.$el.find('#fdoe_no_search_result').hide();
				this.$el.find('.fdoe-search-icon').removeClass('fa-search-minus').addClass('fa-search');
					this.$el.find('div.fdoe-item').remove();
					this.$el.find('ul#menu_headings').find('li').remove();
					t('#menu_headings_2').find('div').remove();



				},
			init_search: function() {

				var block = this.$el;
				block.addClass('processing').block({
					message: null,
					overlayCSS: {
						background: '#fff',
						opacity: 0.6
					}
				});

				var term = this.$el.find('input#fdoe-search').val();
				if (term.length > 1) {
					this.displayingSearch = true;
					this.$el.find('.fdoe-search-icon').removeClass('fa-search').addClass('fa-search-minus');
					this.do_search_of_visible(term, block);


				} else if (term.length == 0) {
					if(!this.displayingSearch){
						block.removeClass('processing').unblock();
						return;
					}
					this.reset_search();
					let response = {};
					response.categories = this.visible_cats.models;
					response.products = this.visible_products.models;
					response.cat_ids = this.visible_cats.pluck('id');


					this.$el.find('.fdoe-search-icon').removeClass('fa-search-minus').addClass('fa-search');
					this.new_render(response, false);
					block.removeClass('processing').unblock();
					update_layout();



				} else {

					this.displayingSearch = true;
					block.removeClass('processing').unblock();
				}
			},
			do_search_of_visible: function(search, block) {
				var searchresult = this.visible_products.filter(function(model) {
					let title = model.get('title').toLowerCase();
					return title.indexOf(search.toLowerCase()) != -1;
				});
				this.$el.find('div.cat_tbody').remove();

				this.$el.find('.fdoe-item').remove();
				if (searchresult.length) {
					this.$el.find('#fdoe_no_search_result').slideUp();
					var pp = new Products();
					pp.add(searchresult);
					pp.forEach(function(e) {
						var p = new ProductView({
							model: e
						});
						this.$el.append(p.render().el);
					}, this);

				} else {
					this.$el.find('#fdoe_no_search_result').fadeIn();
				}
				block.removeClass('processing').unblock();
				update_layout();
			},
			do_search_request: function(term) {
				var block = this.$el;
				block.addClass('processing').block({
					message: null,
					overlayCSS: {
						background: '#fff',
						opacity: 0.6
					}
				});
				var $this = this;

				var products_exclude = this.products_stock.pluck('id');

				var request = {
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_search_products'),
					method: "POST",
					data: {

						'exclude': products_exclude,
						's': term

					},
					success: function(response) {
						$this.$el.find('div.cat_tbody').remove();
						$this.$el.find('#fdoe_products_id ul').find('li').remove();
						t('#menu_headings_2').find('div').remove();
						$this.$el.find('.fdoe-item').remove();
						if ((!_.isNull(response.products) && typeof response.products != 'undefined' && response.products.length)) {
							var pp = new Products();
							pp.add(response.products);
							pp.forEach(function(e) {
								var p = new ProductView({
									model: e
								});
								$this.$el.append(p.render().el);
							});
						} else {
							$this.$el.trigger('fdoe_menu_is_empty');
						}
					},
					complete: function() {
						block.unblock();
						update_layout();
					},
					error: function(data) {}
				};
				jQuery.ajax(request);
			},
			new_render: function(response, from_pageload) {
				this.menu_is_empty = false;
				this.categories_stock.add(response.categories);
				this.products_stock.add(response.products);
				var u = this.get_categories(response, from_pageload);

				var new_cats;
				if (fdoe.subcat_with_parent == 1) {
					var non_sub_cats_ = u.filter({
						category_parent: 0
					});
					var non_sub_cats = new Categories(non_sub_cats_);
					var sub_cats_ = u.reject({
						category_parent: 0
					});
					non_sub_cats.add(sub_cats_);
					new_cats = non_sub_cats;
				} else {
					var uuu = u.reject({
						category_count_not_children: 0
					});
					new_cats = new Categories(uuu);
				}
				u.reset();
				this.collection = {
					products: this.products_stock,
					categories: new_cats
				};
				var r = this.render();
				new_cats = r[1];
				var top = new MenuView({
					collection: {
						categories: new_cats
					}
				});
				top.render();
				if (from_pageload) {
					var ii = r[0].reject({
						single_shortcode: ''
					});
					var iii = new Products(ii);
					var pops = iii.where({
						add_mode: 'popup',
					});
					this.modals = new ProductListViewModal();
					this.modals.collection.add(pops);
				} else {
					var coll = r[0].where({
						add_mode: 'popup',
					});

					var test = new Products();
					var $this = this;

					test.add(coll.filter(function(model) {
						return ($this.modals.collection.pluck('id')).indexOf(model.id) === -1;
					}));

					this.modals.addmodals(test.models);
				}
			},
			render: function() {
				this.visible_products.reset();
				this.sortedproducts = new Products();
				this.sortedcats = new Categories();
				this.container = document.createDocumentFragment();
				// Search unactivated
				if (fdoe.show_search == 1 && _.isUndefined(this.search)) {
					this.search = new SearchForm();
					this.container.append(this.search.render().el);
				}

				this.collection.categories.forEach(this.addOne, this);
				t('#the_menu').append(this.container);
				this.visible_products = this.sortedproducts;
				this.visible_cats = this.sortedcats;
				return [this.sortedproducts, this.sortedcats];
			},
			get_categories(response, from_pageload) {
				var u = new Categories();
				if (((typeof fdoedel != 'undefined' && from_pageload && typeof response.cat_ids == 'undefined' && fdoedel.menu_by_mode == 1 && typeof fdoedel.cats_for_delivery_session != 'undefined' && typeof fdoedel.fdoe_shipping_method != 'undefined'))) {
					let method = fdoedel.fdoe_shipping_method;
					let mode_;
					switch (method) {
						case 'local_pickup':
							mode_ = 'pickup';
							break;
						case 'flat_rate':
							mode_ = 'delivery';
							break;
						case 'eathere':
							mode_ = 'eathere';
							break;
						case '':
							mode_ = false;
							break;
					}
					let cats = fdoedel.cats_for_delivery_session[mode_];
					var cat_ids = mode_ !== false ? cats : '3way';
					if (cat_ids !== '3way') {
						u.reset();
						u.comparator = 'sortIndex';
						u.add(this.categories_stock.models.filter(function(model) {
							if (typeof cat_ids == 'undefined') {
								// Check if to filter along with with delivery mode
								return false;
							} else {
								return cat_ids.indexOf(model.id) !== -1;
							}
						}));
						if (typeof cat_ids == 'undefined') {
							this.menu_is_empty = true;
						}
					}
					//alert(method);
				} else if (((typeof fdoedel != 'undefined' && !from_pageload && typeof response.cat_ids != 'undefined' && fdoedel.menu_by_mode == 1 && typeof fdoedel.cats_for_delivery_session != 'undefined' && typeof fdoedel.fdoe_shipping_method != 'undefined'))) {
					var cat_ids_ = response.cat_ids;
					u.reset();
					u.comparator = 'sortIndex';
					u.add(this.categories_stock.models.filter(function(model) {
						if (typeof cat_ids_ == 'undefined') {
							// Check if to filter along with with delivery mode
							return false;
						} else {
							return cat_ids_.indexOf(model.id) !== -1;
						}
					}));
					if (typeof cat_ids_ == 'undefined') {
						this.menu_is_empty = true;
					}
				} else {
					u.add(this.categories_stock.models);
				}
				return u;
			},
			destroy_view: function() {
				this.undelegateEvents();
				this.$el.removeData().unbind();
				this.remove();
				Backbone.View.prototype.remove.call(this);
			},
			refresh_handler: function(e) {
				var elements = this.$(".fdoe_thumb");
				_.each(elements, function(element, i, list) {
					var boundingClientRect = elements[i].getBoundingClientRect();
					if (boundingClientRect.top < window.innerHeight + 500) {
						var id = jQuery(elements[i]).parents('.fdoe-item').data('pid');
						var amodel = this.collection.products.get(id);
						if (jQuery(elements[i]).find('img').length) {} else {
							jQuery(elements[i]).html(amodel.get('image').src);
						}
					}
				}, this);
			},
			addOne: function(e, i) {
				var m = this.collection.products.filter(function(b) {
					return _.indexOf(b.get("cat_id"), e.get("cat_ID"), false) !== -1;
				});
				if (fdoe.subcat_with_parent == 1) {
					if (e.get('has_sub') === false && (e.get('category_count') == 0 || m.length === 0)) {
						return;
					}
					if (e.get('category_parent') !== 0 && m.length !== 0) {
						this.add_sub(e, i);
						return;
					}
				} else {
					if (m.length === 0) {
						return;
					}
				}
				var o = new CategoryView({
					model: e
				});
				var title = new Cat_Menu_Titles({
					model: e
				});
				var titles = title.render().el;
				var container2 = o.render().el;
				if (this.counter === 0 && fdoe.is_accordian) {
					o.$el.addClass("in-aro");
					title.$('a').attr("aria-expanded", "true");
				}
				this.counter++;
				this.sortedproducts.add(m);
				this.sortedcats.add(e);
				m.forEach(function(e) {
					var p = new ProductView({
						model: e
					});
					container2.appendChild(p.render().el);
				}, container2);
				if (fdoe.layout == 'fdoe_twentytwenty') {
					title.$('.menu_titles_image').addClass('menu_titles_image_main').appendTo(container2);
					if (fdoe.is_accordian == 1 && (fdoe.top_bar_menu == 0 && fdoe.show_left_menu == 1)) {
						this.container.appendChild(titles);
					} else if (fdoe.is_accordian == 1) {
						o.$el.addClass('aro-style-twenty_2');
						container2.insertBefore(titles, container2.childNodes[0]);
					} else {
						container2.insertBefore(titles, container2.childNodes[0]);
					}
					this.container.appendChild(container2);
				} else {
					if (fdoe.is_accordian == 1 && (fdoe.top_bar_menu == 0 && fdoe.show_left_menu == 1)) {
						this.container.appendChild(titles);
						this.container.appendChild(container2);
					} else {
						container2.insertBefore(titles, container2.childNodes[0]);
						this.container.appendChild(container2);
					}
				}
			},
			add_sub: function(e, i) {
				var o = new CategoryView({
					model: e
				});
				var title = new Cat_Menu_Titles({
					model: e
				});
				var titles = title.render().el;
				var container2 = o.render().el;
				var m = this.collection.products.filter(function(b) {
					return _.indexOf(b.get("cat_id"), e.get("cat_ID"), false) !== -1;
				});
				sortedproducts.add(m);
				sortedcats.add(e);
				var parent_id = e.get('category_parent');
				m.forEach(function(e) {
					var p = new ProductView({
						model: e
					});
					container2.appendChild(p.render().el);
				}, container2);
				if (fdoe.layout == 'fdoe_twentytwenty') {
					title.$el.addClass('twenty-sub-title');
					title.$('.menu_titles_image').appendTo(container2);
					if (fdoe.is_accordian == 1 && (fdoe.top_bar_menu == 0 && fdoe.show_left_menu == 1)) {
						o.$el.addClass('aro-style-twenty_2 twenty-sub-cat twenty-sub-cat-accord').removeClass('arocollapse');
						container2.insertBefore(titles, container2.childNodes[0]);
					} else if (fdoe.is_accordian == 1) {
						o.$el.addClass('aro-style-twenty_2 twenty-sub-cat twenty-sub-cat-accord').removeClass('arocollapse');
						container2.insertBefore(titles, container2.childNodes[0]);
					} else {
						o.$el.addClass('aro-style-twenty_2 twenty-sub-cat').removeClass('arocollapse');
						container2.insertBefore(titles, container2.childNodes[0]);
					}
					var string = '#menucat_' + parent_id;
					var par_el_ = jQuery(this.container).find(string);
					if (par_el_ !== null) {
						par_el_.append(container2);
					}
				} else {
					if (fdoe.is_accordian == 1) {
						o.$el.removeClass('arocollapse');
					}
					container2.insertBefore(titles, container2.childNodes[0]);
					var string2 = '#menucat_' + parent_id;
					var par_el2 = jQuery(this.container).find(string2);
					if (par_el2 !== null) {
						par_el2.append(container2);
					}
				}
			},
		});
		CartView = Backbone.View.extend({
			isUpdating: true,
			initialize: function() {
				$this = this;
				window.first = true;
				window.queue = [];
				_.bindAll(this, 'item_added_plus', 'item_added_minus');
				jQuery(document.body).off('wc_fragments_refreshed.fdoe').on('wc_fragments_refreshed.fdoe', function() {
					jQuery('.fdoe').removeClass('processing').unblock();
				});
			},
			events: {
				"click .fdoe_incre_button.fdoe_plus_button": "item_added_plus",
				"click .fdoe_incre_button.fdoe_minus_button": "item_added_minus",
			},
			blocking: function($current) {
				if (!jQuery('.fdoe').hasClass('processing')) {
					jQuery('.fdoe').addClass('processing').block({
						message: null,
						baseZ: 100000,
						overlayCSS: {
							background: '#fff',
							opacity: 0.01,
						}
					});
				}
				var ele = $current.parents('.fdoe_mini_cart').find('.fdoe_minicart_checkout_button');
				if (!ele.hasClass('processing')) {
					ele.addClass('processing').block({
						message: null,
						baseZ: 100000,
						overlayCSS: {
							background: '#fff',
							opacity: 0.6,
						}
					});
				}
				var ele2 = $current.parents('.fdoe_mini_cart_2').find('.fdoe_minicart_checkout_button');
				if (!ele2.hasClass('processing')) {
					ele2.addClass('processing').block({
						message: null,
						baseZ: 100000,
						overlayCSS: {
							background: '#fff',
							opacity: 0.6,
						}
					});
				}
			},
			item_added_plus: function(evt) {
				var me = this;
				var $current = this.$(evt.currentTarget).siblings(".quantity").find(".qty");
				var val = +($current.val());
				var max = parseInt($current.attr("max"));
				var step = 1;
				if (val === max) {
					if (this.$(evt.currentTarget).parents('#fdoe_mini_cart_id').length) {
						jQuery('#stock_aromodal').aromodal('show');
					}
					return false;
				}
				if (val + step > max) {
					jQuery.when($current.val(max)).done(function() {
						me.item_added($current);
					});
				} else {
					jQuery.when($current.val(val + step)).done(function() {
						me.item_added($current);
					});
				}
			},
			item_added_minus: function(evt) {
				var me = this;
				var $current = this.$(evt.currentTarget).siblings(".quantity").find(".qty");
				var val = +($current.val());
				var min = parseInt($current.attr("min"));
				var step = 1;
				if (val === min) {
					return false;
				}
				if (val - step < min) {
					jQuery.when($current.val(min)).done(function() {
						me.item_added($current);
					});
				} else {
					jQuery.when($current.val(val - step)).done(function() {
						me.item_added($current);
					});
				}
			},
			item_added: function($current) {
				var me = this;
				me.blocking($current);
				var value = +($current.val());
				if (value == 0) {
					$current.parents('.fdoe_minicart_item').fadeOut();
				}
				var hash = $current.attr('name').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
				if (isNaN(value)) {
					value = 0;
				}
				var $form = $current.closest("form");
				window.queue.forEach(function(e, i) {
					if (jQuery.inArray(hash, e) !== -1) {
						window.queue.splice(i, 1);
					}
				});
				window.queue.push([value, hash]);
				if (window.first === true) {
					window.first = false;
					me.moveAlong();
				}
			},
			moveAlong: function() {
				var request;
				if (window.queue.length) {
					request = queue.shift();
					clearTimeout(this.timeout);
					var $this = this;
					this.timeout = setTimeout(function() {
						$this.updateQuantity(request);
					}, 500);
				} else {
					jQuery.ajax(jQueryfdoe_fragment_refresh);
					window.first = true;
				}
			},
			updateQuantity: function(item) {
				var u = this;
				var value = item[0];
				var hash = item[1];
				isNaN(value) && (value = 0);
				if (hash) {
					data = {
						hash: hash,
						quantity: value,
						update_cart: true,
					};
					t.ajax({
						url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_qty_cart'),
						type: "POST",
						data: data,
						beforeSend: function() {}
					}).done(function() {}).done(function(response) {
						if (response.is_sold_indi == true && response.try_qty != 0) {
							jQuery('#stock_indi_aromodal').aromodal('show');
						}
						u.moveAlong();
					});
				}
			},
		});
		ProductView = Backbone.View.extend({
			tagName: "div",
			className: "fdoe-item",
			events: {
				"click .fdoe_add_item.fdoe-simple": "add_simple",
				"click input[type='radio']": "change_url",
				"click .fdoe_add_item.fdoe-variable": "add_var",
				"click .fdoe_add_item.fdoe-bundle": "add_simple",
			},
			isUpdating: !1,
			initialize: function() {
				//	_.bindAll(this, 'add_simple', 'render');
				this.$el.attr("data-pid", this.model.get("id"));
				if (this.model.get("add_mode") == 'popup') {
					this.$el.attr("role", "button"), this.$el.attr("data-toggle", "aromodal");
					this.$el.attr("data-target", "#fdoe_productmodal_" + this.model.get("parent_id"));
				} else {
					this.$el.addClass('fdoe_is_button')
				}
				this.$el.addClass('fdoe-border-' + fdoe.fdoe_item_separator), this.$el.addClass(fdoe.layout), this.$el.attr("id", "fdoe_item_" + this.model.get("id") + _.random(0, 1000)),
					this.template = _.template(t("#productTemplate").html()), this
			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				return this.$el.html(this.template(t)), this
			},
			change_url: function(e) {
				var variation_id = t(e.currentTarget).data('variation_id');
				var p_id = t(e.currentTarget).data('p_id');
				t(e.currentTarget).parents('.fdoe-vari-form').find('input[name="p_id"]').val(p_id);
				t(e.currentTarget).parents('.fdoe-vari-form').find('input[name="variation_id"]').val(variation_id);
				t(e.currentTarget).parents('.fdoe-item').find('.fdoe_var_add').data('inactive', false);
			},
			add_var: function(e) {
				var $$this = t(e.currentTarget).find('.fdoe_var_add');
				if (t(e.currentTarget).find('.fdoe-product-link').length) {} else {
					e.preventDefault();
				}
				if (!$$this.parents('.fdoe-item').hasClass('fdoe_is_button')) {
					return;
				}
				if ($$this.data('inactive') === true) {
					alert(fdoe.make_a_selection);
					return;
				}
				jQuery.blockUI({
					baseZ: 100000,
					message: "",
					overlayCSS: {
						backgroundColor: '#ffffff0d',
						opacity: 1
					},
				});
				// Ajax add to cart on the product page
				var jQueryform = $$this.parents('.fdoe-item').find('form.fdoe-vari-form');
				jQuery.ajax({
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_add'),
					method: "POST",
					data: jQueryform.serialize()
				}).done(function() {
					jQuery.ajax(jQueryfdoe_fragment_refresh);
				}).done(function(response) {
					jQueryform[0].reset();
					$$this.data('inactive', true);
					var added;
					if (response.passed_vali !== false) {
						added = true;
						if (fdoe.show_conf == 'yes') {
							$$this.parent('span').siblings('.fdoe_confirm_check').fadeIn().delay(2000).fadeOut();
						}
					} else if (response.status == 'addon_error') {
						added = false;
						alert(fdoe.make_a_selection);
					}
					if (response.is_sold_indi == true) {
						added = false;
						jQuery('#stock_indi_aromodal').aromodal('show');
					}
					if (response.overstock == true) {
						added = false;
						jQuery('#stock_aromodal').aromodal('show');
					}
					if (added) {
						jQuery(document).trigger('ajaxfdoe_added');
						t( document.body ).trigger( 'added_to_cart' );
					}
					jQuery.unblockUI();
				});
			},
			add_simple: function(e) {
				var $this = jQuery(e.currentTarget);
				if ((fdoe.popup_simple == 'redirect' && $this.hasClass('fdoe-simple')) || (fdoe.popup_bundle == 'redirect' && $this.hasClass('fdoe-bundle'))) {
					return;
				}
				e.preventDefault();
				var $$this = $this.find('a.fdoe_simple_add_to_cart_button');
				if (!$$this.parents('.fdoe-item').hasClass('fdoe_is_button')) {
					return;
				}
				jQuery.blockUI({
					baseZ: 100000,
					message: null,
					overlayCSS: {
						backgroundColor: '#ffffff0d',
						opacity: 0.6
					},
					css: {
						padding: 0,
						margin: 0,
						width: '30%',
						top: '40%',
						left: '35%',
						textAlign: 'center',
						backgroundColor: '#fff',
						cursor: 'wait'
					},
				});
				var p_id = $$this.data('product_id');
				var q = $$this.data('quantity');
				var data = {
					p_id: p_id,
					quantity: q
				};
				jQuery.ajax({
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_add'),
					method: "POST",
					data: data
				}).done(function() {
					jQuery.ajax(jQueryfdoe_fragment_refresh);
				}).done(function(response) {
					var added;
					if (response.passed_vali !== false) {
						added = true;
						if (fdoe.show_conf == 'yes') {
							$$this.parent('span').siblings('.fdoe_confirm_check').fadeIn().delay(2000).fadeOut();
						}
					} else if (response.status == 'addon_error') {
						added = false;
						alert(fdoe.make_a_selection);
					}
					if (response.is_sold_indi == true) {
						added = false;
						jQuery('#stock_indi_aromodal').aromodal('show');
					}
					if (response.overstock == true) {
						added = false;
						jQuery(".aromodal.product-aromodal").aromodal("hide");
						jQuery('#stock_aromodal').aromodal('show');
					}
					if (added) {
						jQuery(document).trigger('ajaxfdoe_added');
						t( document.body ).trigger( 'added_to_cart' );
					}
					jQuery.unblockUI();
				});
			}
		});
		ProductViewModal = Backbone.View.extend({
			tagName: "div",
			className: "fdoe-modal-wrapper",
			isUpdating: !1,
			events: {
				"click .plus, .minus, .fdoe-plus, .fdoe-minus": "change_increment_buttons",
				"show.bs.aromodal  .product-aromodal.fdoe-nonfallback": "on_show",
				"show.bs.aromodal  .product-aromodal.fdoe-modaltype-themefalse": "on_show",
				"show.bs.aromodal  .product-aromodal.fdoe_fallback": "on_show_fallback",
				"hidden.bs.aromodal  .product-aromodal": "on_hidden",
				"click  .aromodal .single_add_to_cart_button": "on_click",
				"click  .aromodal .cart-button": "on_click",
			},
			initialize: function() {
				_.bindAll(this, 'on_show', 'on_show_fallback', 'on_click');
				this.template = fdoe.product_modal_template == 1 ? _.template(t("#productmodalTemplate2").html()) : _.template(t("#productmodalTemplate").html());
			},
			render: function() {
				var t = _.extend(this.model.attributes, {});
				return this.$el.html(this.template(t)), this
			},
			change_increment_buttons: function(e) {
				var tthis = t(e.currentTarget);
				if (fdoe.fdoe_deactivate_plus_minus_js_buttons == 1 && (tthis.is('.plus') || tthis.is('.minus'))) {
					return;
				}
				var tthis = t(e.currentTarget);
				var qty = tthis.closest('form.cart').find('.qty');
				var val = parseFloat(qty.val());
				var max = parseFloat(qty.attr('max'));
				var min = parseFloat(qty.attr('min'));
				var step = parseFloat(qty.attr('step'));
				if (tthis.is('.plus') || tthis.is('.fdoe-plus')) {
					if (max && (max <= val)) {
						qty.val(max);
					} else {
						qty.val(val + step);
					}
				} else {
					if (min && (min >= val)) {
						qty.val(min);
					} else if (val > 1) {
						qty.val(val - step);
					}
				}
			},
			on_click: function(e) {
				var tthis = t(e.currentTarget);
				var $this = this;
				if (jQuery(e.currentTarget).hasClass('wc-variation-selection-needed')) {
					return;
				}
				if (jQuery(e.currentTarget).hasClass('disabled')) {
					return;
				}
				if (jQuery(e.currentTarget).parents('.product-aromodal').find('.wc-pao-required-addon').length !== 0) {
					//return;
				}
				e.preventDefault();
				jQuery.blockUI({
					baseZ: 100000,
					message: "",
					overlayCSS: {
						backgroundColor: '#ffffff0d',
						opacity: 1
					},
				});
				// Ajax add to cart on the product page
				var jQueryform = jQuery(e.currentTarget).closest('form');
				var formdata = jQueryform.serializeArray();
				var variations = {};
				_.each(formdata, function(el, i) {
					if (el.name === "add-to-cart") {
						el.name = "p_id";
					}
					if ((el.name).indexOf('attribute_') > -1) {
						variations[el.name] = el.value;
					}
				});
				formdata.push({
					'name': 'variation_atts',
					'value': JSON.stringify(variations)
				});
				jQuery.ajax({
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_add'),
					method: "POST",
					data: formdata
				}).done(function() {
					jQuery.ajax(jQueryfdoe_fragment_refresh);
				}).done(function(response) {
					if (Array.isArray(response)) {
						_.each(response, function(response_) {
							$this.add_response(response_, tthis);
						});
					} else {
						$this.add_response(response, tthis);
					}
					jQuery.unblockUI();
				});
			},
			add_response: function(response, tthis) {
				var added;
				if (response.is_sold_indi == true) {
					added = false;
					jQuery(".aromodal.product-aromodal").aromodal("hide");
					jQuery('#stock_indi_aromodal').aromodal('show');
				} else if (response.overstock == true) {
					added = false;
					jQuery(".aromodal.product-aromodal").aromodal("hide");
					jQuery('#stock_aromodal').aromodal('show');
				} else if (response.passed_vali !== false) {
					jQuery(".aromodal.product-aromodal").aromodal("hide");
					added = true;
					if (fdoe.show_conf == 'yes') {
						var data_id_fdoe = tthis.closest('.product-aromodal').data('id');
						jQuery('#the_menu').find('[data-target="#fdoe_productmodal_' + data_id_fdoe + '"]').find('.fdoe-alert').fadeIn(400).delay(2500).fadeOut(400);
					}
				} else {
					if (response.status == 'addon_error') {
						var message_2 = fdoe.addon_required;
						alert(message_2);
						added = true;
					}
				}
				if (added) {
					jQuery(document).trigger('ajaxfdoe_added');
					t( document.body ).trigger( 'added_to_cart' );
				}
			},
			on_hidden: function(e) {
				try {
					var tthis = t(e.currentTarget);
					if (fdoe.fallback_popup == 0)
						tthis.find('.fdoe-modal-2-add').html();
				} catch (err) {}
			},
			change_addon_price: function(elem) {
				elem.block({
					message: null,
					baseZ: 100000,
					overlayCSS: {
						background: '#fff',
						opacity: 0.6,
					}
				});
				var price = elem.find('.woocommerce-variation-price').find('.woocommerce-Price-amount.amount').text();
				var price2 = (Number(price.replace(/[^\d.-]/g, '')));
				var form_rows = elem.find('.form-row');
				form_rows.each(function(index) {
					var per = t(this).find('input[data-price-type="percentage_based"]').data('price');
					if (typeof per !== 'number') {
						return;
					}
					var label = t(this).find('input[data-price-type="percentage_based"]').data('label');
					var labelel = t(this).find('input[data-price-type="percentage_based"]').parent('label');
					var input = t(this).find('input[data-price-type="percentage_based"]');
					var data = per * price2 / 100;
					jQuery.ajax({
						url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_get_wc_price_2'),
						method: "POST",
						data: {
							price: data
						}
					}).success(function(response) {
						input.detach();
						labelel.html(label + ' ' + response.price);
						labelel.insertBefore(input, labelel.childNodes[0]);
						if (form_rows.length - 1 == index) {
							elem.unblock();
						}
					});
				});
			},
			on_show: function(e) {
				try {
					var tthis = t(e.currentTarget);
					if (fdoe.product_modal_template_ == 'style-1') {
						tthis.find('.fdoe-modal-2-add').html(this.model.get("single_shortcode"));
						if (!tthis.find('.fdoe-modal-2-title').children().length) {
							tthis.find('.fdoe-modal-2-title').html(this.model.get("title"));
						}
						if (!tthis.find('.fdoe-modal-2-price').children().length) {
							tthis.find('.fdoe-modal-2-price').html(this.model.get("price_html"));
						}
						if (!tthis.find('.fdoe-modal-2-image').children().length) {
							tthis.find('.fdoe-modal-2-image').html(this.model.get("image").src);
						}
						if (!tthis.find('.fdoe-modal-2-description').children().length) {
							tthis.find('.fdoe-modal-2-description').html(this.model.get("short_description"));
						}
						//for compatibility with YITH Points & Rewards
						if (fdoe.yith_points == 1) {
							t.fn.yith_ywpar_variations();
						}
					} else if (fdoe.product_modal_template_ == 'custom') {
						tthis.find('.fdoe_insert_product_shortcode').html(this.model.get("single_shortcode"));
					}
					tthis.find(('.variations_form')).wc_variation_form();
					// Initialize if bundle product type
					this.init_bundle();
				} catch (err) {}
				// Uncomment below to view and update Product Add Ons Cart in modals
				//t( 'body' ).trigger( 'quick-view-displayed');
				jQuery(e.currentTarget).find('form.cart').trigger('woocommerce-product-addons-update');
				jQuery(e.currentTarget).find('.wc-tabs-wrapper, .woocommerce-tabs, #rating').trigger('init');
			},
			on_show_fallback: function(e) {
				try {
					var tthis = t(e.currentTarget);
					if (fdoe.product_modal_template_ == 'style-1') {
						if (this.model.get('id') !== undefined) {
							if (!tthis.find('.fdoe-modal-2-image').children().length) {
								tthis.find('.fdoe-modal-2-image').html(this.model.get("image").src);
							}
							//for compatibility with YITH Points & Rewards
							if (fdoe.yith_points == 1) {
								t.fn.yith_ywpar_variations();
							}
						}
					} else if (fdoe.product_modal_template_ == 'custom') {}
				} catch (err) {}
				// Uncomment below to view and update Product Add Ons Cart in modals
				//t( 'body' ).trigger( 'quick-view-displayed');
				jQuery(e.currentTarget).find('form.cart').trigger('woocommerce-product-addons-update');
				jQuery(e.currentTarget).find('.wc-tabs-wrapper, .woocommerce-tabs, #rating').trigger('init');
			},
			init_bundle: function() {
				t('.bundle_form .bundle_data').each(function() {
					var $bundle_data = t(this),
						$composite_form = $bundle_data.closest('.composite_form');
					if ($composite_form.length === 0) {
						$bundle_data.wc_pb_bundle_form();
					}
				});
			},
		});
		FeaturedViewModal = Backbone.View.extend({
			el: ".extra_aromodal",
			isUpdating: !1,
			events: {
				"click .single_add_to_cart_button": "on_click",
			},
			initialize: function() {
				_.bindAll(this, 'on_click');
			},
			on_click: function(e) {
				var tthis = t(e.currentTarget);
				e.preventDefault();
				jQuery.blockUI({
					baseZ: 100000,
					message: "",
					overlayCSS: {
						backgroundColor: '#ffffff0d',
						opacity: 1
					},
				});
				// Ajax add to cart from featured extra modal
				var jQueryform = jQuery(e.currentTarget).closest('form');
				var formdata = jQueryform.serializeArray();
				_.each(formdata, function(el, i) {
					if (el.name === "add-to-cart") el.name = "p_id";
				});
				jQuery.ajax({
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_add'),
					method: "POST",
					data: formdata
				}).done(function() {
					jQuery.ajax(jQueryfdoe_fragment_refresh);
				}).done(function(response) {
					var added;
					if (response.passed_vali !== false) {
						added = true;
						tthis.siblings('.fdoe_confirm_check').fadeIn();
					} else {
						if (response.status == 'addon_error') {
							added = false;
							tthis.siblings('.fdoe_confirm_check').after('<span class="fdoe-temp-error">error</span>');
							setTimeout(function() {
								t('.fdoe-temp-error').fadeIn().remove();
							}, 5000);
						}
					}
					if (response.is_sold_indi == true) {
						added = false;
						window.alert(fdoe.can_not_add_message);
					} else if (response.overstock == true) {
						added = false;
						window.alert(fdoe.can_not_add_message);
					}
					if (added) {
						jQuery(document).trigger('ajaxfdoe_added');
						t( document.body ).trigger( 'added_to_cart' );
					}
					jQuery.unblockUI();
				});
			},
		});
		ProductListViewModal = Backbone.View.extend({
			el: "#fdoe-product-modals-inner",
			initialize: function() {
				this.collection = new Products();
				this.listenTo(this.collection, 'add', this.addOne);
			},
			render: function() {
				var container = document.createDocumentFragment();
				this.collection.forEach(function(e) {
					var o = new ProductViewModal({
						model: e
					});

					container.appendChild(o.render().el);
				}, this);
				this.$el.append(container);
			},
			reset: function() {
				this.$el.find("div.fdoe-modal-wrap-test").remove(), this.render()
			},
			destroy_view: function() {
				// COMPLETELY UNBIND THE VIEW
				this.undelegateEvents();
				this.$el.removeData().unbind();
				// Remove view from DOM
				this.remove();
				Backbone.View.prototype.remove.call(this);
			},
			addOne: function(e) {
				var o = new ProductViewModal({
					model: e
				});
				this.$el.append(o.render().el);
				//	this.container.appendChild(o.render().el);
			},
			addmodals: function(v) {
				var the_ids = _.pluck(v, 'id');
				if (the_ids.length !== 0) {
					this.sample = the_ids.chunk_fdoe(25);
					this.do_request();
				}
			},
			do_request: function() {
				var sample = this.sample.shift();
				this.fdoe_inject_shortcode(sample);
			},
			fdoe_inject_shortcode: function(sample) {
				var $this = this;
				var request = {
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_make_product_shortcode'),
					method: "POST",
					data: {
						'id': sample
					},
					success: function(response) {
						var new_modals = new Products();
						new_modals.add(response.content);
						$this.collection.add(new_modals.models);
					},
					complete: function() {
						if ($this.sample.length) {
							$this.do_request();
						}
						extras();
					},
					error: function(data) {}
				};
				jQuery.ajax(request);
			},
		});
		SearchForm = Backbone.View.extend({
			id: 'fdoe-search-feature',
			tagName: 'div',
			initialize: function() {

				this.template = _.template(t("#searchTemplate").html());


			},
			render: function() {

				return this.$el.html(this.template()), this;
			},
			events: {
				'input input#fdoe-search': 'liveSearch',
				'click .fdoe-search-icon': 'clear_input'
			},
			clear_input: function(){

				this.$el.find('input#fdoe-search').val('').trigger('input');
				},
			liveSearch: function(e) {
				var me = this;
				clearTimeout(this.timeout);
				this.timeout = setTimeout(function() {
					if (!me.displayingSearch) {

					}
				me.$el.parents('.fdoe-products').trigger('fdoe_do_search');
				}, 150);
			},
		});
		//
		t(".woocommerce-pagination").hide();
		new MainView();
		if ((typeof fdoe_short != 'undefined' || (typeof fdoe != 'undefined' && typeof fdoe.cats != 'undefined' && fdoe.cats.length)) &&
			("undefined" !== typeof Food_Online_Items && Food_Online_Items !== null)
		) {
			var new_collection = {
				'products': Food_Online_Items.products
			};

			if (typeof fdoe_short == 'undefined') {
				new_collection.categories = fdoe.cats;
			} else {
				new_collection.categories = fdoe_short.cats;

			}

			var first = new CategoryListView();
			first.new_render(new_collection, true);
		}
		if (typeof fdoedel !== 'undefined' && fdoedel.is_featured_products) {
			new FeaturedViewModal();
		}
		jQuery('#the_main_container').find('div.linear-background').fadeOut(50).remove();
		jQuery('div.fdoe, div.fdoe-element').show().promise().then(function() {
			if(!_.isUndefined(first) ){
			first.$el.trigger('fdoe_menu_shown');
			}
		}).done(function() {
			init_minicart_increment();
			set_cookie_ajax();
		});
		jQuery('#menu_headings_2').fadeIn(400);
		//////////////7
		//////////////7
		var jQueryfdoe_fragment_refresh = {
			url: wc_cart_fragments_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments'),
			type: 'POST',
			beforeSend: function() {},
			success: function(data) {
				if (data && data.fragments) {
					if (window.no_cart_view === true || (window.first && ((window.fdoe_counter <= 1 && window.fdoe_counter_active === true) || window.fdoe_counter_active === false))) {
						jQuery.each(data.fragments, function(key, value) {
							jQuery(key).replaceWith(value);
						});
						jQuery('div.fdoe_mini_cart').html(data.fragments['div.widget_shopping_cart_content']).show(function() {});
						jQuery('div.fdoe_mini_cart_2').html(data.fragments['div.widget_shopping_cart_content']).show(function() {});
						jQuery(document.body).trigger('wc_fragments_refreshed');
						window.fdoe_counter = 0;
						window.fdoe_counter_active = false;
						if (fdoe.minicart_style != 'theme') {
							init_minicart();
						}
					}
				}
				if (fdoe.is_checkout == 1 && t("form.woocommerce-checkout").length) {
					t('body').trigger('update_checkout');
				}
			},
			complete: function() {
				if (window.fdoe_counter_active === true) {
					if (window.fdoe_counter <= 1) {
						window.fdoe_counter_active = false;
					}
					window.fdoe_counter--;
				}
				jQuery.ajax({
					url: fdoe.wc_ajax_url.replace('%%endpoint%%', 'ajaxfdoe_get_updated_time'),
					method: "POST",
				}).done(function(response) {
					let children = jQuery(response.time_html).children();
					jQuery(".fdoe_order_time").html(children);
					if (fdoe.is_prem == 1 && (jQuery('div.fdoe-element').find('.jtoggler-control').find('.is-active').index() === 1 || jQuery('#fdoe_delivery_dropdown').find('option').filter(':selected').val() == '')) {
						return;
					}
					var products;
					switch (response.shipping_session) {
						case 'default':
							jQuery('.fdoe_pickup_time').css('display', 'flex');
							products = _.find(response.products_not_ok, function(element) {
								return _.has(element, 'default');
							});
							if (products !== undefined && _.isArray(products.default) && !_.isEmpty(products.default) && jQuery('.fdoe_pickup_time').length) {
								let string = get_products_string(products.default);
								show_popover_message(fdoe.ava_msg1_first + ' ' + string + ' ' + fdoe.ava_msg1_last);
							}
							break;
						case 'local_pickup':
							jQuery('.fdoe_pickup_time').css('display', 'flex');
							products = _.find(response.products_not_ok, function(element) {
								return _.has(element, 'pickup');
							});
							if (products !== undefined && _.isArray(products.pickup) && !_.isEmpty(products.pickup) && jQuery('.fdoe_pickup_time').length) {
								let string = get_products_string(products.pickup);
								show_popover_message(fdoe.ava_msg1_first + ' ' + string + ' ' + fdoe.for+' ' + fdoe.pickup + ' ' + fdoe.ava_msg1_last);
							}
							break;
						case 'flat_rate':
							jQuery('.fdoe_delivery_time').css('display', 'flex');
							products = _.find(response.products_not_ok, function(element) {
								return _.has(element, 'delivery');
							});
							if (products !== undefined && _.isArray(products.delivery) && !_.isEmpty(products.delivery) && jQuery('.fdoe_delivery_time').length) {
								let string = get_products_string(products.delivery);
								show_popover_message(fdoe.ava_msg1_first + ' ' + string + ' ' + fdoe.for+' ' + fdoe.delivery + ' ' + fdoe.ava_msg1_last);
							}
							break;
						case 'eathere':
							jQuery('.fdoe_eathere_time').css('display', 'flex');
							products = _.find(response.products_not_ok, function(element) {
								return _.has(element, 'eathere');
							});
							if (products !== undefined && _.isArray(products.eathere) && !_.isEmpty(products.eathere) && jQuery('.fdoe_eathere_time').length) {
								let string = get_products_string(products.eathere);
								show_popover_message(fdoe.ava_msg1_first + ' ' + string + ' ' + fdoe.when_eating_at_the_restaurant + ' ' + fdoe.ava_msg1_last);
							}
							break;
					}
				});
			}
		};
		run_sequenze(init_menu_mode, do_style, do_sticky_bars, extras, add_event_listeners, init_minicart, fdoefree_default_popover_message);
	}

	function get_products_string(a) {
		var string = '';
		var length = a.length;
		_.each(a, function(element, i, list) {
			string += i === 0 ? element : ((i == 1 && i != length - 1) ? (', ' + element) : (' ' + fdoe.or + ' ' + element));
		});
		return string;
	}

	function init_minicart_increment() {
		if (fdoe.minicart_style == 'increment') {
			window.fdoe_counter = 0;
		window.fdoe_counter_active = false;
			window.no_cart_view = false;
			if (fdoe.hide_minicart != 'yes') {
				new CartView({
					el: '#fdoe_mini_cart_id'
				});
			}
			new CartView({
				el: '#fdoe_mini_cart_id_2'
			});
		} else {
			window.no_cart_view = true;
		}
	}

	function set_cookie_ajax() {
		if (fdoe.early_set_cookie == 1) {
			jQuery.post(
				woocommerce_params.ajax_url, {
					'action': 'fdoe_set_cookie',
				}
			);
		}
	}

	function run_sequenze(cb_init_menu_mode, cb_do_style, cb_do_sticky_bars, cb_extras, cb_add_event_listeners, cb_init_minicart, cb_fdoefree_default_popover_message) {
		t(document.body).trigger('wc_fragment_refresh');
		cb_init_menu_mode();
		cb_do_style();
		var from_update = false;
		sticky_mobile_parent_original = t('.fdoe-sticky-mobile').parent();
		cb_do_sticky_bars(activate_scroll);
		cb_extras();
		cb_add_event_listeners();
		if (fdoe.minicart_style != 'theme') {
			cb_init_minicart();
		}
		// Init pop message
		if (top_bar == 1 && (fdoe.is_prem == 0 || (typeof fdoedel != 'undefined' && fdoedel.fdoe_enable_delivery_switcher == 'no'))) {
			cb_fdoefree_default_popover_message(fdoe.top_bar_info);
		}
	}

	function init_menu_mode() {
		top_bar = typeof fdoe.is_only_topbar === 'undefined' ? fdoe.top_bar : fdoe.is_only_topbar;
	}

	function init_minicart() {
		//Mini Cart

		var is_touch_device = 'ontouchstart' in document.documentElement;
		if (!is_touch_device && fdoe.minicart_style == "popover") {
			// Minicart remove button aropopover
			t(document).aropopover({
				selector: '.woocommerce-mini-cart-item',
			});
			t('.fdoe_minicart_item[data-toggle="aropopover"]').aropopover({
				delay: {
					show: 50,
					hide: 1800
				}
			}, {
				template: '<div class="aropopover" role="tooltip"><div class="arrow"></div><div class="aropopover-content fdoe_remove_aropopover"></div></div>'
			});
		} else if (is_touch_device || fdoe.minicart_style !== "popover") {
			// Minicart remove button aropopover
			t('.fdoe-mini-cart-remove').show();
			t('.fdoe-minicart-main-column').removeClass('arocol-xs-10').addClass('arocol-xs-12');
			t('#fdoe_mini_cart_id').addClass('minicart_items_basic');
			t('.fdoe_mini_cart_2 [data-toggle="aropopover"]').aropopover('destroy');
			t('.fdoe_mini_cart [data-toggle="aropopover"]').aropopover('destroy');
		}
	}

	function update_layout() {
		var from_update = true;
		var menu_headings = t("#menu_headings");
		do_sticky_bars(activate_scroll);
		if (((window.matchMedia('(max-width: 767px)').matches) && fdoe.top_bar_mobile == 1) || ((!window.matchMedia('(max-width: 767px)').matches && fdoe.top_bar_menu == 1))) {
			var parentwidth33 = menu_headings.parent().width();
			menu_headings.parent().width(parentwidth33);
			jQuery('#fdoe_products_id').find('#menu_headings').css('display', 'flex');
			jQuery('#fdoe_products_id').css('width', 'unset');
		} else {
			menu_headings.css('display', 'none');
		}
		do_style();
		do_sticky_bars(activate_scroll);
		var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
	}

	function add_responsivness() {
		window.setTimeout(function() {
			jQuery(window).off('resize.fdoe').on('resize.fdoe', _.debounce(update_layout, 1000));
		}, 4000);
		jQuery(window).off("orientationchange.fdoe").on("orientationchange.fdoe", _.debounce(update_layout, 300));
	}

	function failSafeAndroid() {
		var userAgent = navigator.userAgent.toLowerCase();
		var isAndroid = userAgent.indexOf("android") > -1;
		if (isAndroid) {
			t('#autocomplete_, #fdoe_zip').on('click', function() {
				t(window).off('resize.fdoe');
			});
			t('#autocomplete_, #fdoe_zip').on('focusout', function() {
				add_responsivness();
			});
		}
	}

	function add_event_listeners() {
		add_responsivness();
		failSafeAndroid();
		jQuery(document).on('submit', '.entry-summary form.cart', function(event) {
			event.preventDefault();
		});
		//hide product aromodal after added to cart
		jQuery('#cart_aromodal').on('show.bs.aromodal', function() {
			jQuery(".aromodal.product-aromodal").aromodal("hide");
		});
		// Hide cart aromodal on checkout
		jQuery(document).on('click', '#checkout_button_1', function() {
			jQuery("#cart_aromodal").aromodal('hide');
		});
		// Update mini cart on item removal
		jQuery(document.body).on('removed_from_cart', function(event) {
			event.preventDefault();
			jQuery.ajax(jQueryfdoe_fragment_refresh);
		});
		jQuery(document.body).on('wc_fragments_refreshed', function() {
			jQuery.unblockUI();
			init_minicart();
		});
		// Toggle class on clicked remove button
		jQuery(document).on('click', '.fdoe-mini-cart-remove a.fdoe_remove', function() {
			jQuery(this).parents('.fdoe_minicart_item').addClass('processing').block({
				message: null,
				baseZ: 100000,
				overlayCSS: {
					background: '#fff',
					opacity: 0.6
				}
			});
		});
		jQuery(document).on('click', '.aropopover-content a.fdoe_remove', function() {
			jQuery(this).parents('.aropopover').addClass('fdoe_clicked');
			jQuery(this).parents('.aropopover').prev('.fdoe_minicart_item').addClass('processing').block({
				message: null,
				overlayCSS: {
					background: '#fff',
					opacity: 0.6
				}
			});
		});
		// Readjust aromodal
		jQuery(document).on('shown.bs.aromodal', '.fdoe-aromodal', function() {
			jQuery(this).aromodal('handleUpdate');
		});
		jQuery('#fdoe_bypass_checkbox').on('change', function() {
			var is_checked = this.checked;
			var data = {
				'action': 'fdoe_set_checkout_props',
				'validation_mode': is_checked
			};
			jQuery.post(
				woocommerce_params.ajax_url,
				data,
				function(response) {
					//outcome.resolve(true);
				});
		});

		if (typeof fdoe.is_only_topbar != 'undefined' && fdoe.is_only_topbar == 1) {
			jQuery(document.body).on('added_to_cart', function() {
				jQuery.ajax(jQueryfdoe_fragment_refresh);
			});
		}
	}

	function extras() {
		//Styling
		jQuery('#fdoe-product-modals').find('.product-modal-style-1 button.modal-close').css("color", fdoe.menu_color);
		//for woocommerce-product-addons above version 3.0.0
		if (fdoe.addonabove3 == '1') {
			jQuery('li.fdoe_minicart_item.woocommerce-mini-cart-item').css('flex-direction', 'column');
			jQuery('#fdoe-product-modals').find('.product-aromodal').off('show.bs.aromodal.fdoe').on('show.bs.aromodal.fdoe', function() {
				jQuery(this).find('form.cart').trigger('woocommerce-product-addons-update');
				if (jQuery('.wc-bookings-booking-form', this).length === false || true) {
					var qty_2 = parseFloat(jQuery('.cart', this).find('input.qty').val());
					var productname_new = t('.product_title', this).html();
					jQuery('.wc-pao-col1', this).first().html('<strong>' + qty_2 + 'x ' + productname_new + '</strong>');
					tthis = jQuery(this);
					jQuery('body').off('woocommerce-product-addons-update.fdoe').on('woocommerce-product-addons-update.fdoe', function() {
						var qty_2 = parseFloat(jQuery('.cart', tthis).find('input.qty').val());
						var productname_new = jQuery('.product_title', tthis).html();
						jQuery('.wc-pao-col1', tthis).first().html('<strong>' + qty_2 + 'x ' + productname_new + '</strong>');
					});
				}
			});
		}
		//for compatibility with YITH Points & Rewards
		if (fdoe.yith_points == 1) {
			t.fn.yith_ywpar_variations();
		}
	}

	function fdoefree_default_popover_message(message) {
		var content;
		if (message == '') {
			return;
		}
		content = '<span class="fdoe_popover_message">' + message + '</span>';
		var popover = jQuery('#fdoe-pop-min[data-toggle="aropopover"]').aropopover({
			'template': '<div class="aropopover" role="tooltip"><div class="arrow"></div><div class="aropopover-content"></div></div>',
			'content': content,
			'html': true,
			'trigger': 'hover click',
			'placement': function(context, source) {
				if (window.matchMedia("only screen and (max-width: 767px)").matches) {
					if (t('.fdoe-mobile-affixed.aroaffix').length) {
						return 'left';
					} else {
						return 'top';
					}
				}
				var position = t(source).position();
				if (typeof position === 'undefined') {
					return 'top';
				}
				if (position.top === 0) {
					return "auto";
				}
				if (position.top < 110) {
					return "bottom";
				}
				return "auto";
			}
		});
		var pop_timeout;
		if (typeof pop_timeout !== "undefined") {
			clearTimeout(pop_timeout);
		}
		popover.off('show.bs.aropopover.change').on('show.bs.aropopover.change', function() {
			if (typeof pop_timeout !== "undefined") {
				clearTimeout(pop_timeout);
			}
			pop_timeout = setTimeout(function() {
				jQuery('#fdoe-pop-min[data-toggle="aropopover"]').aropopover('hide');
			}, 8000);
		});
		popover.off('hidden.bs.aropopover.change').on('hidden.bs.aropopover.change', function(e) {
			if (typeof pop_timeout !== "undefined") {
				clearTimeout(pop_timeout);
			}
		});
	}

	function show_popover_message(message) {
		if (!jQuery('.fdoe_order_time').length) {
			return;
		}
		jQuery('.fdoe_order_time').aropopover({
			'template': '<div class="aropopover" role="tooltip"><div class="arrow"></div><div class="aropopover-content"></div></div>',
			'html': true,
			'trigger': 'manual',
			'placement': 'top auto',
			'toggle': 'aropopover',
		});
		var pop_timeout;
		if (typeof pop_timeout !== "undefined") {
			clearTimeout(pop_timeout);
		}
		jQuery('.fdoe_order_time').off('show.bs.aropopover.change2').on('show.bs.aropopover.change2', function() {
			if (typeof pop_timeout !== "undefined") {
				clearTimeout(pop_timeout);
			}
			pop_timeout = setTimeout(function() {
				jQuery('.fdoe_order_time').aropopover('hide');
			}, 10000);
		});
		jQuery('.fdoe_order_time').off('hidden.bs.aropopover.change2').on('hidden.bs.aropopover.change2', function() {
			if (typeof pop_timeout !== "undefined") {
				clearTimeout(pop_timeout);
			}
		});
		let popover = jQuery('.fdoe_order_time').attr('data-content', '<span class="fdoe_popover_message">' + message + '</span>').data('bs.aropopover');
		popover.setContent();
		popover.$tip.addClass(popover.options.placement);
		jQuery('.fdoe_order_time').aropopover('show');
	}
	// Sticky right and left-left containers
	function do_sticky_bars(callback_activate_scroll) {
		var right_aroaffix_top = 20;
		if (fdoe.sticky_bar == 'yes') {
			if (!window.matchMedia('(min-width: 768px)').matches) {
				if (fdoe.sticky_mobile != 'no') {
					init_sticky_mobile();
				}
				callback_activate_scroll();
				return;
			} else {
				t('#menu_headings').detach().removeClass('menu_headings_fixed').appendTo('#fdoe_products_id');
				t('.fdoe-right-sticky').removeClass('top_small_affixed');
			}
			var mode_is_big_screen = (window.matchMedia('(min-width: 768px)').matches && fdoe.hide_minicart == 'no') ? true : false;
			if (mode_is_big_screen) {
				t(".fdoe-right-sticky").css('top', get_sticky_top(right_aroaffix_top) + 'px');
				var leftheight = t('#fdoe-left-container').length > 0 ? t('#fdoe-left-container').outerHeight(true) : 0;
				var lefttop = t('#fdoe-left-container').length > 0 ? t('#fdoe-left-container').offset().top : 0;
				t(".fdoe-right-sticky").aroaffix({
					offset: {
						bottom: function() {
							return (this.bottom = t(document).height() - lefttop - leftheight);
						},
						top: function() {
							var top = top_bar == 0 || mode_is_big_screen ? t('.fdoe-right-sticky').offset().top : t('.fdoe-top-bar-header').offset().top;
							return (this.top = top);
						}
					}
				});
				do_scrolling(right_aroaffix_top);
				var parentwidth = t("#fdoe-right-container").width();
				t(".fdoe-right-sticky").width(parentwidth);
			}
			t('.fdoe-right-sticky').off('aroaffixed.bs.aroaffix').on('aroaffixed.bs.aroaffix', function() {
				t(this).aroaffix('checkPosition');
			});
			if (window.matchMedia('(min-width: 768px)').matches) {
				var right_aroaffix_top_ = t('.fdoe-top-sticky').css('top') != null ? t('.fdoe-top-sticky').css('top').replace("px", "") : 0;
				t(".fdoe-top-sticky").css('top', get_sticky_top(0) + 'px');
				t(".fdoe-top-sticky").aroaffix({
					offset: {
						top: function() {
							return (this.top = t('.fdoe-top-sticky').offset().top);
						},
						bottom: function() {
							return (this.bottom = t('footer').outerHeight(true));
						}
					}
				});
				var parentwidth_ = t(".fdoe").width();
				t(".fdoe-top-sticky").width(parentwidth_);
			}
			t(".fdoe-sticky").css('top', get_sticky_top(right_aroaffix_top) + 'px');
			t(document).on('aroaffix.bs.aroaffix', '.fdoe-top-sticky', function() {
				t(this).css('top', get_sticky_top(0) + 'px');
			});
			t(document).on('aroaffix.bs.aroaffix', '.fdoe-sticky', function() {
				t(this).css('top', get_sticky_top(right_aroaffix_top) + 'px');
			});
			var leftheight_ = t('#fdoe-left-container').length > 0 ? t('#fdoe-left-container').outerHeight(true) : 0;
			t(".fdoe-sticky").aroaffix({
				offset: {
					top: function() {
						return (this.top = t('.fdoe-sticky').offset().top);
					},
					bottom: function() {
						//return (this.bottom = t('footer').outerHeight(true))
						return (this.bottom = t(document).height() - t('#fdoe-left-container').offset().top - leftheight_);
					}
				}
			});
			var parentwidth2 = t("#fdoe-left-left-container").width();
			t("#menu_headings_2").width(parentwidth2);
		}
		callback_activate_scroll();
	}

	function init_sticky_mobile() {
		if (typeof menu_parent == 'undefined') {
			var menu_parent = t('#menu_headings').parent();
			var noticewrapper = t('#fdoe_delivery_notice_wrapper');
			var noticeParent = noticewrapper.parent();
		}
		init_event_list_mobile(menu_parent, noticewrapper, noticeParent);
		var scrollelement;
		scrollelement = t('#fdoe-left-container');
		if (typeof fdoe.is_only_topbar != 'undefined' && fdoe.is_only_topbar == 1) {
			if (fdoe.is_shop) {
				scrollelement = t('body').find('.site-content');
			} else {
				scrollelement = t('body').find('.fdoe-element').parent();
			}
		}
		var leftheight = scrollelement.length > 0 ? scrollelement.outerHeight(true) : 0;
		var lefttop = scrollelement.length > 0 ? scrollelement.offset().top : 0;
		t("#fdoe-top-element").aroaffix({
			offset: {
				bottom: function() {
					return (this.bottom = t(document).height() - lefttop - leftheight)
				},
				top: function() {
					var top = top_bar == 0 ? t("#fdoe-top-element").offset().top : t('.fdoe-top-bar-header').offset().top;
					return (this.top = top)
				}
			}
		});
		init_event_list_mobile(menu_parent, noticewrapper, noticeParent);
	}

	function init_event_list_mobile(menu_parent, noticewrapper, noticeParent) {
		var parentwidth_;
		t('.fdoe_menu_header.arocollapse').off('hidden.bs.arocollapse').on('hidden.bs.arocollapse', function() {
			t('.fdoe-dropdown-icon').removeClass('fa-caret-up').addClass('fa-caret-down')
		});
		t('.fdoe_menu_header.arocollapse').off('shown.bs.arocollapse').on('shown.bs.arocollapse', function() {
			t('.fdoe-dropdown-icon').removeClass('fa-caret-down').addClass('fa-caret-up')
		});
		t('#fdoe-top-element').off('aroaffix.bs.aroaffix').on('aroaffix.bs.aroaffix', function() {
			var right_aroaffix_top = 20;
			t(this).css('top', get_sticky_top(right_aroaffix_top) + 'px');
			var bg_el_color = t('body').css('background-color');
			t(this).css('background-color', bg_el_color);
			t(this).css('left', '0px');
			if (fdoe.sticky_mobile == 'cats') {
				t('#fdoe_checker_big_devices').hide();
				t('.fdoe_order_time').hide();
			}
			//Dropdown
			if (fdoe.top_bar_mobile_dropdown == 1 && (fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'cats')) {
				t('.fdoe-sticky-mobile').detach().hide().addClass('menu_headings_fixed').appendTo(this).css('background-color', bg_el_color).show();
			}
			if ((fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'selector')) {
				t('#fdoe-top-bar-element').addClass('top-bar-sticky').prependTo(this);
				if (fdoe.sticky_mobile == 'both' && fdoe.top_bar_mobile_dropdown == 0 && fdoe.top_bar_mobile == 1) {
					t('#menu_headings').detach().hide().addClass('menu_headings_fixed').appendTo(this).css('background-color', bg_el_color).show();
				}
				t(this).addClass('top_small_affixed');
			} else if (fdoe.top_bar_mobile == 1 && (fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'cats')) {
				if (fdoe.top_bar_mobile_dropdown == 0) {
					t('#menu_headings').detach().hide().addClass('menu_headings_fixed').appendTo(this).css('background-color', bg_el_color).show();
				}
				t(this).addClass('top_small_affixed');
			}
			jQuery(this).addClass('fdoe-mobile-affixed');
		});
		t('#fdoe-top-element').off('aroaffix-top.bs.aroaffix').on('aroaffix-top.bs.aroaffix', function() {
			t('#menu_headings').removeClass('menu_headings_fixed')
			//Dropdown
			if (fdoe.top_bar_mobile_dropdown == 1 && (fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'cats')) {
				t('.fdoe-sticky-mobile').detach().hide().removeClass('menu_headings_fixed').prependTo(sticky_mobile_parent_original).show();
			}
			if (fdoe.sticky_mobile == 'cats') {
				t('#fdoe_checker_big_devices').show();
				t('.fdoe_order_time').show();
			}
			if ((fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'selector')) {
				t('.top-bar-sticky').insertBefore(this).removeClass('top-bar-sticky')
				if (fdoe.sticky_mobile == 'both' && fdoe.top_bar_mobile_dropdown == 0 && fdoe.top_bar_mobile == 1) {
					t('#menu_headings').detach().hide().removeClass('menu_headings_fixed').appendTo(menu_parent).css('display', 'flex');
				}
				t(this).removeClass('top_small_affixed');
			} else if (fdoe.top_bar_mobile == 1 && fdoe.top_bar_mobile_dropdown == 0 && (fdoe.sticky_mobile == 'both' || fdoe.sticky_mobile == 'cats')) {
				t('#menu_headings').detach().hide().removeClass('menu_headings_fixed').appendTo(menu_parent).css('display', 'flex');
				t(this).removeClass('top_small_affixed');
			}
			jQuery(this).removeClass('fdoe-mobile-affixed');
		});
	}

	function get_sticky_top(right_aroaffix_top) {
		var extra_header = t('.nav-container.fixed').length > 0 && t('.nav-container.fixed').css('position') == 'fixed' ? t('.nav-container.fixed').outerHeight(true) : 0;
		var iii = !window.matchMedia('(max-width: 600px)').matches && t("#wpadminbar").length > 0 ? t('#wpadminbar').height() : 0;
		var eee = t('header').css('position') == 'fixed' ? t('header').outerHeight(true) - iii : 0;
		right_aroaffix_top = (!window.matchMedia('(min-width: 768px)').matches && fdoe.sticky_mobile !== 'no') ? 0 : right_aroaffix_top;
		var fdoe_top = parseFloat(right_aroaffix_top) + eee + extra_header + iii;
		return fdoe_top;
	}

	function do_scrolling(right_aroaffix_top) {
		t('.fdoe-right-sticky').off('aroaffix.bs.aroaffix').on('aroaffix.bs.aroaffix', function() {
			gateup = true;
			gatedown = true;
		});
		t('.fdoe-right-sticky').one('aroaffix.bs.aroaffix', function() {
			t('.fdoe-right-sticky.aroaffix').css({
				'top': get_sticky_top(right_aroaffix_top) + 'px'
			});
		});
		var lastScrollTop = t('.fdoe-sticky').scrollTop();
		var user_scroll = true;
		var atop, iii2, eee2, extra_header2, up_active, css_obj;
		var win_height = t(window).height();
		gateup = true;
		gatedown = true;
		t(window).off('scroll.test').on('scroll.test', function() {
			if (user_scroll) {
				var st = t(this).scrollTop();
				if (st > lastScrollTop && gatedown) {
					// downscroll code
					iii2 = t("#wpadminbar").length > 0 ? t('#wpadminbar').height() : 0;
					eee2 = t('header').css('position') == 'fixed' ? t('header').outerHeight(true) : 0;
					extra_header2 = t('.nav-container.fixed').length > 0 && t('.nav-container.fixed').css('position') == 'fixed' ? t('.nav-container.fixed').outerHeight(true) : 0;
					if ((win_height - eee2 - extra_header2 - iii2) < t('.fdoe-right-sticky').outerHeight(true)) {
						atop = win_height - t('.fdoe-right-sticky').outerHeight(true);
						t('.fdoe-right-sticky.aroaffix').css({
							'top': atop + 'px'
						});
						lastScrollTop = st;
						gateup = true;
						gatedown = false;
					} else {
						lastScrollTop = st;
						gateup = true;
						gatedown = true;
					}
				} else if (st < lastScrollTop && gateup) {
					// upscroll code
					let rightheight = t('.fdoe-right-sticky').length > 0 ? t('.fdoe-right-sticky').outerHeight(true) : 0;
					let leftheight = t('#fdoe-left-container').length > 0 ? t('#fdoe-left-container').outerHeight(true) : 0;
					up_active = t(window).scrollTop() + rightheight + 30 < t('#fdoe-left-container').offset().top + t('#fdoe-left-container').outerHeight(true);
					css_obj = up_active ? {
						'top': get_sticky_top(right_aroaffix_top) + 'px'
					} : {
						'top': win_height - rightheight + 'px'
					};
					t('.fdoe-right-sticky.aroaffix').css(
						css_obj
					);
					lastScrollTop = st;
					gatedown = true;
					gateup = up_active ? false : true;
				} else {
					user_scroll = true;
					lastScrollTop = st;
				}
			}
			t('.fdoe-sticky.aroaffix').css(
				get_sticky_top(right_aroaffix_top) + 'px'
			);
		});
	}
	// Adding scrollspy for Menu category
	function activate_scroll() {
		if (fdoe.is_accordian == 1) {
			return;
		}
		var freeze = false;
		var fdoe_timeout;
		t(window).on('scroll', function() {
			var currentTop = t(window).scrollTop();
			var elems = t('.scrollspy');
			elems.each(function() {
				let smallheight = t('.top_small_affixed.aroaffix').length > 0 ? t('.top_small_affixed.aroaffix').outerHeight(true) : 0;
				let topheight = t('.fdoe-top-sticky.aroaffix').length > 0 ? t('.fdoe-top-sticky.aroaffix').outerHeight(true) : 0;
				var adjust_for_sticky = smallheight + topheight;
				var elemTop = t(this).offset().top * 0.95 - adjust_for_sticky;
				var elemBottom = elemTop + t(this).outerHeight();
				var docHeight = t(document).height();
				var winScrolled = t(window).height() + t(window).scrollTop();
				if (freeze === false && ((t(this).is('.scrollspy:nth-last-child(2)') && (docHeight - winScrolled) < t(this).outerHeight()) || (t(this).is('.scrollspy:last-child') && (docHeight - winScrolled) < 1) || currentTop >= elemTop && currentTop <= elemBottom)) {
					var id = t(this).attr('id');
					var navElem = t('#menu_headings_2 a[href="#' + id + '"]');
					navElem.parent().addClass('fdoe-active-link').siblings().removeClass('fdoe-active-link');
					var navElem2 = t('#menu_headings a[href="#' + id + '"]');
					navElem2.addClass('fdoe-active-link-2').parent().siblings().find('a').removeClass('fdoe-active-link-2');
				}
			});
		});
		t('.fdoe_menuitem a').off('click').on('click', function() {
			clearTimeout(fdoe_timeout);
			freeze = true;
			t(this).parent('.fdoe_menuitem').addClass('fdoe-active-link').siblings().removeClass('fdoe-active-link');
			fdoe_timeout = setTimeout(function() {
				t('.fdoe_menuitem').trigger('fdoe_clicked_');
			}, 2000);
		});
		t('#menu_headings a').off('click').on('click', function() {
			clearTimeout(fdoe_timeout);
			freeze = true;
			t(this).addClass('fdoe-active-link-2').removeClass('fdoe-temp-class').parent().siblings().find('a').removeClass('fdoe-active-link-2').removeClass('fdoe-temp-class');
			fdoe_timeout = setTimeout(function() {
				t('#menu_headings a').trigger('fdoe_clicked_2');
			}, 2000);
		});
		t('.fdoe_menuitem').on('fdoe_clicked_', function() {
			freeze = false;
			clearTimeout(fdoe_timeout);
		});
		t('#menu_headings a').on('fdoe_clicked_2', function() {
			freeze = false;
			clearTimeout(fdoe_timeout);
		});
		t('#menu_headings a').on('mouseenter',function() {
			t(this).parent().siblings().find('a.fdoe-active-link-2').toggleClass('fdoe-active-link-2').toggleClass('fdoe-temp-class');
		}).on('mouseleave', function() {
			t(this).parent().siblings().find('a.fdoe-temp-class').toggleClass('fdoe-active-link-2').toggleClass('fdoe-temp-class');
		});
	}

	function resize_item_heights() {
		var timeout;
		clearTimeout(timeout);
		jQuery('#the_menu .cat_tbody.aro-style-twenty').not('.twenty-sub-cat').each(function(i) {
			var $this = this;
			var count = t($this).not('.twenty-sub-cat').children("div.fdoe-item").length;
			if (count === 0) {
				t($this).not('.twenty-sub-cat').find('.menu_titles_image_main').remove();
			}
			var img = t($this).not('.twenty-sub-cat').find('.menu_titles_image img');
			var yy = img.height();
			if (yy == 0) {
				timeout = setTimeout(function() {
					resize_item_heights();
				}, 100);
				return false;
			}
			var heights = t($this).not('.twenty-sub-cat').find("div.fdoe-item").not(":first").map(function() {
				return t(this).height();
			}).get();
			var h = Math.max.apply(null, heights);
			img.parent('.menu_titles_image').css('grid-row-end', function() {
				var span = Math.round((yy / h));
				return 'span ' + span;
			}).promise().done(function() {
				t($this).css('visibility', 'visible');
			});
		});
		if (fdoe.is_accordian == 0) {
			jQuery('.cat_tbody.aro-style-twenty.twenty-sub-cat').each(function(i) {
				var $this2 = this;
				var heights = t($this2).find("div.fdoe-item").not(":first").map(function() {
					return t(this).height();
				}).get();
				var h = Math.max.apply(null, heights);
				t($this2).find('.menu_titles_image'). /*appendTo(t($this)).*/ css('grid-row-end', function() {
					var yy = t($this2).find('.menu_titles_image img').height();
					var span = Math.round((yy / h));
					return 'span ' + span;
				}).promise().done(function() {
					t($this2).css('visibility', 'visible');
				});
			});
		}
	}

	function do_style() {
		jQuery('.fdoe-item-icon').css("color", fdoe.menu_color);
		jQuery('.fdoe-menu-title-icon').css("color", fdoe.menu_color);
		if (window.matchMedia('(max-width: 767px)').matches) {
			if (fdoe.top_bar_mobile_dropdown == 1) {
				t('#menu_headings').addClass('fdoe-dropdown-categories');
			}
			t('#fdoe_checker_big_devices').prependTo('#fdoe-top-element');
			if (top_bar != 1) {
				jQuery('.fdoe_order_time').appendTo('#fdoe-top-element');
			}
		} else {
			t('#menu_headings').removeClass('fdoe-dropdown-categories');
		}
		if (((window.matchMedia('(max-width: 767px)').matches) && fdoe.top_bar_mobile == 1) || ((!window.matchMedia('(max-width: 767px)').matches && fdoe.top_bar_menu == 1))) {
			jQuery('#fdoe_products_id').find('#menu_headings').css('display', 'flex');
			//jQuery('.arocollapse.in-aro #menu_headings').show();
		}
		if (jQuery('ul#menu_headings li').length > 0 || jQuery('#menu_headings_2 div').length > 0) {
			jQuery('#menu_headings  a').css("color", fdoe.menu_color);
			jQuery('#menu_headings_2  a').css("color", fdoe.menu_color);
			if (jQuery('ul#menu_headings li').length == 1) {
				jQuery("#menu_headings").hide();
			}
		}
		jQuery('input.qty').addClass('features-form');
		/* CSS Modifications */
		/* Detach the Woocommerce products Header */
		if (!jQuery.trim(jQuery(".woocommerce-products-header").html())) {
			jQuery('.woocommerce-products-header').detach();
		}
		// Layout options CSS
		if (fdoe.layout == 'fdoe_twocols') {
			jQuery(".fdoe-item  .flex-container-row").append("<div class='fdoe_aggregate_row'></div>");
			jQuery('.fdoe-item  .flex-container-row .fdoe_thumb').each(function() {
				jQuery(this).parent().find('.fdoe_aggregate_row').append(jQuery(this));
			});
			jQuery('.fdoe-item  .flex-container-row .fdoe_item_price').each(function() {
				jQuery(this).parent().find('.fdoe_aggregate_row').append(jQuery(this));
			});
			jQuery('.fdoe-item  .flex-container-row .fdoe_add_item').each(function() {
				jQuery(this).parent().find('.fdoe_aggregate_row').append(jQuery(this));
			});
			jQuery('.fdoe_aggregate_row').wrap("<div class='fdoe_second_row'></div>");
			jQuery('.fdoe-item  .flex-container-row .fdoe_aggregate_row').each(function() {
				jQuery(this).find('.fdoe_add_price_item').wrapAll("<span class='fdoe_price_and_add'></div>");
			});
			jQuery('.fdoe_summary').css("margin-right", 'unset');
			jQuery('.fdoe_title').css("text-align", 'center');
			jQuery('.flex-container-row').css("align-items", 'unset');
			jQuery('.flex-container-row').css("flex-direction", 'column');
			jQuery('.fdoe_summary').css("order", '0');
			jQuery(".fdoe_aggregate_row").css("order", '1');
			if (fdoe.fdoe_show_images == 'hide') {
				jQuery(".fdoe_aggregate_row").css("justify-content", 'space-around');
			}
			if (fdoe.fdoe_item_border == 'hide') {
				jQuery(".fdoe_aggregate_row").css("justify-content", 'space-around');
			}
		} else if (fdoe.layout == 'fdoe_twentytwenty') {
			jQuery('#the_main_container').addClass('fdoe-main-twentytwenty');
			if (!(window.matchMedia('(max-width: 767px)').matches) && t('.fdoe').width() > 600) {
				if (document.readyState == 'complete') {
					resize_item_heights();
				} else {
					jQuery(window).on("load", function() {
						resize_item_heights();
					});
				}
				jQuery('.aro-style-twenty.arocollapse').on('show.bs.arocollapse', function() {
					t(this).find("div.fdoe-item").css('visibility', 'hidden');
				});
				jQuery('.aro-style-twenty.arocollapse').on('shown.bs.arocollapse', function() {
					var $this = this;
					var heights = t($this).not('.twenty-sub-cat').children("div.fdoe-item").not(":first").map(function() {
						return t(this).height();
					}).get();
					var h = Math.min.apply(null, heights);
					t($this).not('.twenty-sub-cat').children('.menu_titles_image').css('grid-row-end', function() {
						var yy = t(this).children('.menu_titles_image img').height();
						var span = Math.round((yy / h));
						return 'span ' + span;
					}).promise().done(function() {
						t($this).css('visibility', 'visible');
						t($this).not('.twenty-sub-cat').find("div.fdoe-item").css('visibility', 'visible');
					});
					jQuery($this).find('.cat_tbody.aro-style-twenty.twenty-sub-cat').each(function(i) {
						var $this2 = this;
						var heights = t($this2).find("div.fdoe-item").not(":first").map(function() {
							return t(this).height();
						}).get();
						var h = Math.max.apply(null, heights);
						t($this2).find('.menu_titles_image').css('grid-row-end', function() {
							var yy = t($this2).find('.menu_titles_image img').height();
							var span = Math.round((yy / h));
							return 'span ' + span;
						}).promise().done(function() {
							t($this2).css('visibility', 'visible');
						});
					});
				});
			} else {
				jQuery('.cat_tbody').addClass('twentytwenty_small_screen');
				t('.aro-style-twenty').css('visibility', 'visible');
			}
			// Category Menu
			if (((window.matchMedia('(max-width: 767px)').matches) && fdoe.top_bar_mobile == 1 && fdoe.top_bar_mobile_dropdown == 0) || ((!window.matchMedia('(max-width: 767px)').matches && fdoe.top_bar_menu == 1))) {
				jQuery('.fdoe_menu_header').fadeIn();
			} else {}
		}
		//
		// Hide Minicart option
		//
		if (fdoe.hide_minicart == 'yes' && (typeof fdoedel === "undefined" || (typeof fdoedel !== "undefined" && (fdoedel.fdoe_enable_delivery_switcher == 'no' || fdoedel.fdoe_enable_delivery_switcher == 'only_pickup')))) {
			if (fdoe.show_left_menu == 1) {
				jQuery(".fdoe-flex-1").addClass('fdoe-only-menu');
				jQuery('.fdoe_extra_checkout').css('display', 'block').addClass('fdoe-extra-checkout-flex');
				if (top_bar != 1) {
					jQuery('.fdoe_order_time').prependTo('.fdoe-flex-1').removeClass('fdoe_hidden').fadeIn('slow');
				}
			} else {
				if (top_bar != 1) {
					jQuery('#fdoe-left-left-container').css('margin-top', '0px').css('margin-right', '0px');
					jQuery('.fdoe_extra_checkout').css('margin-left', '0px').css('float', 'none').css('margin-top', '0px').css('margin-right', '0px').prependTo('#fdoe-left-left-container').show();
					jQuery('.fdoe_order_time').removeClass('fdoe_hidden').fadeIn('slow');
				}
			}
			if (top_bar == 1) {
				if (t('#fdoe_checker_top-bar').children().length != 0) {
					jQuery('.fdoe-top-bar-header').css({
						'grid-template-columns': 'auto'
					});
				}
				jQuery('.fdoe_pickup_time').css({
					'margin-right': '1em'
				});
				jQuery('.fdoe_order_time').css({
					'display': 'flex',
					'align-items': 'center',
					'min-width': '7em'
				});
				jQuery(".fdoe_order_time").addClass('top-bar-icon').removeClass('fdoe_hidden').fadeIn('slow');
			}
		} else if (fdoe.hide_minicart == 'yes' && (typeof fdoedel === "undefined" || (typeof fdoedel !== "undefined" && fdoedel.fdoe_enable_delivery_switcher != 'no'))) {
			if (top_bar == 0) {
				jQuery(".fdoe_order_time").removeClass('fdoe_hidden').fadeIn('slow');
				jQuery('.fdoe_extra_checkout').addClass('fdoe_sole_chk_btn').appendTo('#fdoe-right-container').show();
			} else {
				jQuery('.fdoe_order_time').css({
					'display': 'flex',
					'align-items': 'center',
					'min-width': '7em'
				});
				jQuery(".fdoe_order_time").addClass('top-bar-icon').removeClass('fdoe_hidden').fadeIn('slow');
			}
			jQuery("#fdoe-right-container").fadeIn('slow');
		} else {
			jQuery("#fdoe-right-container").fadeIn('slow');
			if (top_bar == 0) {
				jQuery(".fdoe_order_time").removeClass('fdoe_hidden').fadeIn('slow');
			} else {
				jQuery('.fdoe_order_time').css({
					'display': 'flex',
					'align-items': 'center',
					'min-width': '7em',
					'justify-content': 'center'
				});
				jQuery(".fdoe_order_time").addClass('top-bar-icon').removeClass('fdoe_hidden').fadeIn('slow');
			}
		}
		if (top_bar == 1) {
			jQuery('.fdoe-top-bar-header').css({
				'display': 'grid'
			});
			var size = t('.fdoe-top-bar-header').children().length;
			if (size < 2) {
				jQuery('.fdoe-top-bar-header').css({
					'grid-template-columns': 'auto'
				});
				jQuery('.top-bar-place-right').css({
					'border-bottom': 'unset',
					'margin-bottom': '0',
					'padding-bottom': '5px',
					'padding-top': '5px'
				});
			}
			if ((window.matchMedia('(max-width: 767px)').matches)) {
				jQuery('.fdoe-top-bar-header').addClass('fdoe-top-bar-header-small');
				jQuery('.fdoe-flex-1').addClass('top-bar-fdoe-flex-1');
			} else {
				jQuery('.fdoe-top-bar-header').removeClass('fdoe-top-bar-header-small');
				jQuery('.fdoe-flex-1').removeClass('top-bar-fdoe-flex-1');
			}
		}
		// Theme fixes for known problem with certain Themes
		if (fdoe.theme == 'Bridge' || fdoe.theme_parent == 'Bridge') {
			jQuery('.fdoe-aromodal').on('shown.bs.aromodal', function() {
				jQuery('body').addClass('fdoe-aromodal-open');
			});
			jQuery('.fdoe-aromodal').on('hidden.bs.aromodal', function() {
				jQuery('body').removeClass('fdoe-aromodal-open');
			});
		}
	}
});
//Polyfill & properties
(function() {
	Object.defineProperty(Array.prototype, 'chunk_fdoe', {
		value: function(n) {
			var this_ = this;
			return Array(Math.ceil(this.length / n)).fill().map(function(_, i) {
				return this_.slice(i * n, i * n + n);
			});
		}
	});
	if (!Array.prototype.fill) {
		Object.defineProperty(Array.prototype, 'fill', {
			value: function(value) {
				// Steps 1-2.
				if (this == null) {
					throw new TypeError('this is null or not defined');
				}
				var O = Object(this);
				// Steps 3-5.
				var len = O.length >>> 0;
				// Steps 6-7.
				var start = arguments[1];
				var relativeStart = start >> 0;
				// Step 8.
				var k = relativeStart < 0 ?
					Math.max(len + relativeStart, 0) :
					Math.min(relativeStart, len);
				// Steps 9-10.
				var end = arguments[2];
				var relativeEnd = end === undefined ?
					len : end >> 0;
				// Step 11.
				var finalValue = relativeEnd < 0 ?
					Math.max(len + relativeEnd, 0) :
					Math.min(relativeEnd, len);
				// Step 12.
				while (k < finalValue) {
					O[k] = value;
					k++;
				}
				// Step 13.
				return O;
			}
		});
	}
})();
