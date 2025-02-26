
( function( $ ) {
	
	window.isEditMode = false;

	//var aiea_smoke_sections = (typeof aiea_ajax_var !== 'undefined') ? aiea_ajax_var.aiea_smoke_sections : '';
	//var aiea_raindrops_sections = (typeof aiea_ajax_var !== 'undefined') ? aiea_ajax_var.aiea_raindrops_sections : '';
	
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */
	 
	/* Typing Text Handler */
	var aiea_fancy_text_handler = function( $scope, $ ) {
		$scope.find('.ai-typing-text').each(function( index ) {
			aiea_fancy_text_view( this, index );
		});
	};
	
	/* Circle Progress Handler */
	var aiea_circle_progress_handler = function( $scope, $ ) {
		if( $scope.find('.circle-progress-circle').length ){
			var circle_ele = $scope.find('.circle-progress-circle');
			aiea_circle_progress_view(circle_ele);
		}		
	};
	
	/* Progress Bar Handler */
	var aiea_progress_bar_handler = function( $scope, $ ) {
		if( $scope.find('.horizontal-progress-bar').length ){
			var progress_ele = $scope.find('.horizontal-progress-bar');
			aiea_progress_bar_view(progress_ele);
		}		
	};
	
	/* Counter Handler */
	var aiea_counter_up_handler = function( $scope, $ ) {
		if( $scope.find('.counter-up').length ){
			var counter_ele = $scope.find('.counter-up');
			aiea_counter_up_view(counter_ele);
		}		
	};
	
	/* AIEAMap Handler */
	var aiea_iea_map_handler = function( $scope, $ ) {
		if( $scope.find(".aigmap").length ){
			init_aiea_gmap();
		}
	};
	
	/* Chart Handler */
	var aiea_chart_handler = function( $scope, $ ) {
		$scope.find('.pie-chart').each(function() {
			aiea_pie_chart_view( this );
		});		
		$scope.find('.line-chart').each(function() {
			aiea_line_chart_view( this );
		});		
	};
	
	/* Weather Handler */
	var aiea_weather_handler = function( $scope, $ ) {
		if( $scope.find(".ai-weather-wrapper").length ){
			$scope.find('.ai-weather-wrapper').each(function( index ) {
				aiea_weather( this );
			});
		}
	};
  	
	/* Toggle Content Handler */
	var aiea_toggle_content_handler = function( $scope, $ ) {
		if( $scope.find(".toggle-content-wrapper").length ){
			$scope.find('.toggle-content-wrapper').each(function( index ) {
				aiea_toggle_content_view( this );
			});
			$( window ).resize(function() {
				setTimeout( function() {
					$scope.find('.toggle-content-wrapper').each(function( index ) {
						aiea_toggle_content_view( this );
					});
				}, 100 );
			});
		}
	};
	
	/* Tabs Handler */
	var aiea_tab_handler = function( $scope, $ ) {
		if( $scope.find(".ai-tab-elementor-widget").length ){
			$scope.find('.ai-tab-elementor-widget').each(function( index ) {
				aiea_tab_content_view( this );
			});
			
			//Call Every Element
			AICallEveryElement($scope)
		}
	};
	
	/* Switcher Content Handler */
	var aiea_switcher_content_handler = function( $scope, $ ) {
		if( $scope.find(".switcher-content-wrapper").length ){
			$scope.find('.switcher-content-wrapper').each(function( index ) {
				aiea_switcher_content( this );
			});
			
			//Call Every Element
			AICallEveryElement($scope)
		}
	};
		
	/* Data Table Handler */
	var aiea_data_table_handler = function( $scope, $ ){
		if( $scope.find(".ai-data-table-elementor-widget").length  ){			//&& !isEditMode
			var table_ele = $scope.find(".ai-data-table-elementor-widget .ai-data-table");
			var table_id = $scope.find(".ai-data-table-elementor-widget").find(".ai-data-table-inner").data("shortcode-id");
			var sort_stat = $(table_ele).data("sort");
			var search_stat = $(table_ele).data("search");
			var page_stat = $(table_ele).data("page");
			var page_max = $(table_ele).data("page-max");
			page_max = page_max ? parseInt( page_max ) : 10;
			
			$scope.find(".ai-data-table-elementor-widget .ai-data-table").makeAITable({
				sort_opt: sort_stat,
				search_opt: search_stat,
				search_ele: $('#ai-data-table-input-'+table_id),
				pagination_opt: page_stat,
				pagination_ele: $('#ai-table-pagination-'+table_id),
				pagination_max_row: page_max
			});
		}
	};
	
	/* Offcanvas Handler */
	var aiea_offcanvas_handler = function( $scope, $ ) {
		if( $scope.find(".ai-offcanvas-elementor-widget").length ){
			$scope.find('.ai-offcanvas-elementor-widget').each(function( index ) {
				aiea_offcanvas_content_handler( this, $scope );
			});
						
			$(document).find(".ai-offcanvas-close").on( "click", function(){
				$("body").removeClass("ai-offcanvas-active");	
				$(this).parent(".ai-offcanvas-wrap").removeClass("active");
				var ani_type = $(this).parent(".ai-offcanvas-wrap").data("canvas-animation");
				if( ani_type == 'left-push' ){
					$("body").css({"margin-left":"", "margin-right":""});
				}else if( ani_type == 'right-push' ){
					$("body").css({"margin-left":"", "margin-right":""});
				}	
				return false;
			});
		}
	};
	
	/* Menu Handler */
	var aiea_menu_handler = function( $scope, $ ){
		if( $scope.find(".ai-menu-wrap").length  ){	
			$scope.find('.ai-menu-wrap').each(function( index ) {
				aiea_menu_content( this );
			});
		}
	};
	
	/* Search Handler */
	var aiea_search_handler = function( $scope, $ ){
		if( $scope.find(".ai-overlay-search-toggle").length  ){	
			$scope.find('.ai-overlay-search-toggle').each(function( index ) {
				aiea_search_content( this );
			});
		}
	};
	
	/* Isotope Handler */
	var aiea_masonry_handler = function( $scope, $ ) {
		$scope.find('.ai-isotope').each(function() {
			aiea_masonry_view( this );
		});		
	};
	
	/* Slider Handler */
	var aiea_slider_handler = function( $scope, $ ) {
		$scope.find('.ai-slider').each(function() {
			aiea_slider_view( this );
		});
	};
	
	/* Accordion Handler */
	var aiea_accordion_handler = function( $scope, $ ) {
		if( $scope.find(".ai-accordion-elementor-widget").length ){
			$scope.find('.ai-accordion-elementor-widget').each(function( index ) {
				aiea_accordion_content_view( this );
			});
			
			//Call Every Element
			AICallEveryElement($scope)
		}
	};
	
	/* Section Handler */
	var aiea_section_custom_options_handler = function( $scope, $t ) {		
		if ( $scope.data("element_type") == 'section' || $scope.data("element_type") == 'container' ){
			if ( $scope.is('.elementor-section-parallax-yes' ) ){
				aiea_section_parallax_view( $scope );
			}			
		}		
	};	
	
		
	/* Make sure you run this code under Elementor. */
	
	$( window ).on( 'elementor/frontend/init', function() {

		// Common Shortcodes
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-fancy-text.default', aiea_fancy_text_handler );		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/inc-circle-progress.default', aiea_circle_progress_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/aiea-progress-bar.default', aiea_progress_bar_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-counter.default', aiea_counter_up_handler );			
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-google-map.default', aiea_iea_map_handler );		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-chart.default', aiea_chart_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/toggle-content.default', aiea_toggle_content_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-tab.default', aiea_tab_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-accordion.default', aiea_accordion_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-content-switcher.default', aiea_switcher_content_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-weather.default', aiea_weather_handler );
		
		// Table
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-data-table.default', aiea_data_table_handler );
		
		// Menu
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-menu.default', aiea_menu_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-menu.default', aiea_offcanvas_handler );
		
		// search
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-search.default', aiea_search_handler );		
		
		// Post Type Shortcodes
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-posts.default', aiea_masonry_handler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-posts.default', aiea_slider_handler );
				
		// Content Slider		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-content-carousel.default', aiea_slider_handler );
				
		window.isEditMode = elementorFrontend.isEditMode();
		if (isEditMode) {
				
			// custom section options show updated output while change
			//elementor.hooks.addAction( 'panel/open_editor/section', aiea_open_editor_hook );	
			elementor.hooks.addAction( 'panel/open_editor/container', aiea_open_editor_hook );	

			// custom panel editor hook for choose option
			elementor.hooks.addAction( 'panel/open_editor/widget/ai-icon-box', function( panel, model, view ) {	
				const $panel_ele = $(panel.$el);
				aiea_icon_choose_on_change( $panel_ele );
			});
			elementor.hooks.addAction( 'panel/open_editor/widget/ai-image-box', function( panel, model, view ) {	
				const $panel_ele = $(panel.$el);
				aiea_image_choose_on_change( $panel_ele );
			});
						
		}
		
		// Container
		elementorFrontend.hooks.addAction( 'frontend/element_ready/global', aiea_section_custom_options_handler );
		
		// Mega menu
		if( $(".ai-elementor-mega-menu").length ) {
			let _width = $(".ai-elementor-mega-menu").data("width");
			_width = _width ? _width : $(".ai-elementor-mega-menu").parents('.elementor-container').width();
			$(".ai-elementor-mega-menu").css({width: _width + 'px'});
		}
		
		
	} );
	
	/* AIEA js function defenitions */
	function aiea_open_editor_hook( panel, model, view ) {
								
		const $panel_ele = $(panel.$el);
		const $view_ele = $(view.el);
		let _atts = model.attributes.settings.attributes;
		aiea_parallax_on_change( $panel_ele, $view_ele );
    						
	}
  
	function aiea_fancy_text_view( cur_ele, index ){
		var cur_ele = $(cur_ele);
		var type_ani = cur_ele.parents(".ai-animated-text-elementor-widget").hasClass("ai-fancytext-type") ? true : false;
		//ai-fancytext-
		var typing_text = cur_ele.attr("data-typing") ? cur_ele.attr("data-typing") : [];
		if( typing_text && type_ani ){
			typing_text = typing_text.split(",");
			
			var type_speed = cur_ele.data("typespeed") ? cur_ele.data("typespeed") : 100;
			var back_speed = cur_ele.data("backspeed") ? cur_ele.data("backspeed") : 100;
			var back_delay = cur_ele.data("backdelay") ? cur_ele.data("backdelay") : 1000;
			var start_delay = cur_ele.data("startdelay") ? cur_ele.data("startdelay") : 1000;
			var cur_char = cur_ele.data("char") ? cur_ele.data("char") : '|';
			var loop = cur_ele.data("loop") && cur_ele.data("loop") == 'yes' ? true : false;
			var fadeout = cur_ele.data("fadeout") && cur_ele.data("fadeout") == 'yes' ? true : false;

			var typed = new Typed(cur_ele[index], {
				typeSpeed: type_speed,
				backSpeed: back_speed,
				backDelay: back_delay,
				startDelay: start_delay,
				strings: typing_text,
				loop: loop,
				cursorChar: cur_char,
				fadeOut: fadeout
			});
		} else if( typing_text ) {
			var ani_type = cur_ele.data("animate-type") ? cur_ele.data("animate-type") : "zoomIn";
			var animation_speed = cur_ele.data("animate-speed") ? cur_ele.data("animate-speed") : 3500;
			cur_ele.Morphext({
				animation: ani_type,
				separator: ",",
				speed: animation_speed,
				complete: function () {}
			});
		}
	}
	
	function aiea_circle_progress_view( circle_ele ) {		
		circle_ele.appear(function() {
			var c_circle = $( this );
			var c_value = c_circle.attr( "data-value" );
			var c_value_suffix = c_circle.attr( "data-value-suffix" );
			var c_size = c_circle.attr( "data-size" );
			var c_thickness = c_circle.attr( "data-thickness" );
			var c_duration = c_circle.attr( "data-duration" );
			var c_empty = c_circle.attr( "data-empty" ) != '' ? c_circle.attr( "data-empty" ) : 'transparent';
			var c_scolor = c_circle.attr( "data-scolor" );
			var c_ecolor = c_circle.attr( "data-ecolor" ) != '' ? c_circle.attr( "data-ecolor" ) : c_scolor;
								
			c_circle.circleProgress({
				value: Math.floor( c_value ) / 100,
				size: Math.floor( c_size ),
				thickness: Math.floor( c_thickness ),
				emptyFill: c_empty,
				animation: {
					duration: Math.floor( c_duration )
				},
				lineCap: 'round',
				fill: {
					gradient: [c_scolor, c_ecolor]
				}
			}).on( 'circle-animation-progress', function( event, progress ) {
				$( this ).find( '.progress-value' ).html( Math.round( c_value * progress ) + c_value_suffix );
			});
		});
	}
	
	function aiea_progress_bar_view( progress_ele ) {
		progress_ele.appear(function() {
			let progress_bar = $( this );
			let progress_value = progress_bar.attr( "data-pvalue" );
			let progress_duration = progress_bar.attr( "data-duration" );
			progress_duration = progress_duration ? parseInt( progress_duration ) : 0;
			progress_bar.find(".progress-value").animate({
				width: progress_value + '%'
			}, progress_duration );
		});
	}
	
	function aiea_counter_up_view( counterup ){
		counterup.appear(function() {
			var $this = $(this),
			countTo = $this.attr( "data-count" ),
			duration = $this.attr( "data-duration" );
			$({ countNum: $this.text()}).animate({
					countNum: countTo
				},
				{
				duration: parseInt( duration ),
				easing: 'swing',
				step: function() {
					$this.text( Math.floor( this.countNum ) );
				},
				complete: function() {
					$this.text( this.countNum );
				}
			});  
		});
	}
	
	function init_aiea_gmap() {
		
		var map_styles = '{ "Aubergine" : [	{"elementType":"geometry","stylers":[{"color":"#1d2c4d"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#8ec3b9"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#1a3646"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#64779e"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#334e87"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#023e58"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#283d6a"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#6f9ba5"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#023e58"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#3C7680"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#304a7d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2c6675"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#255763"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#b0d5ce"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#023e58"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#283d6a"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#3a4762"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0e1626"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#4e6d70"}]}], "Silver" : [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}], "Retro" : [{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}], "Dark" : [{"elementType":"geometry","stylers":[{"color":"#212121"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#212121"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#757575"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"administrative.land_parcel","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#181818"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"color":"#1b1b1b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8a8a8a"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#373737"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#3c3c3c"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#3d3d3d"}]}], "Night" : [{"elementType":"geometry","stylers":[{"color":"#242f3e"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#746855"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#242f3e"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#263c3f"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#6b9a76"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#38414e"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#212a37"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9ca5b3"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#746855"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#1f2835"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#f3d19c"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2f3948"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#17263c"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#515c6d"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#17263c"}]}] }';
		
		var map_style_obj = JSON.parse(map_styles);
		
		var map_style_mode = [];
		var map_mode = '';
		var map_lang = '';
		var map_lat = '';
		var map_marker = '';
		var map_options = '';
		
		$( ".aigmap" ).each(function( index ) {
			
			var gmap = this;

			if( $( gmap ).attr( "data-map-style" ) ){
				map_mode = $( gmap ).data("map-style");
				map_lang = $( gmap ).data("map-lang");
				map_lat = $( gmap ).data("map-lat");
				map_marker = $( gmap ).data("map-marker");
				if( map_mode === 'aubergine' )
					map_style_mode = map_style_obj.Aubergine;
				else if( map_mode === 'silver' )
					map_style_mode = map_style_obj.Silver;
				else if( map_mode === 'retro' )
					map_style_mode = map_style_obj.Retro;
				else if( map_mode === 'dark' )
					map_style_mode = map_style_obj.Dark;
				else if( map_mode === 'night' )
					map_style_mode = map_style_obj.Night;
				else if( map_mode === 'custom' ){
					var c_style = $( gmap ).attr( "data-custom-style" ) && $( gmap ).attr( "data-custom-style" ) != '' ? JSON.parse( $( gmap ).attr( "data-custom-style" ) ) : '[]';
					map_style_mode = c_style;
				}else{
					map_style_mode = "[]";
				}
			}
			
			if( $( gmap ).attr( "data-multi-map" ) && $( gmap ).attr( "data-multi-map" ) == 'true' ){
				
				var map_values = JSON.parse( $( gmap ).attr( "data-maps" ) );
				var map_wheel = $( gmap ).attr( "data-wheel" ) && $( gmap ).attr( "data-wheel" ) == 'true' ? true : false;
				var map_zoom = $( gmap ).attr( "data-zoom" ) && $( gmap ).attr( "data-zoom" ) != '' ? parseInt( $( gmap ).attr( "data-zoom" ) ) : 14;
				var map;

				var map_stat = 1;

				map_values.forEach( function( map_value ) {
					map_lat = map_value.map_latitude;
					map_lang = map_value.map_longitude;
					var LatLng = new google.maps.LatLng( map_lat, map_lang );
					var mapProp= {
						center: LatLng,
						scrollwheel: map_wheel,
						zoom: map_zoom,
						styles: map_style_mode
					};
					
					//Create Map
					if( map_stat ){
						var t_gmap = $( gmap );
						map = new google.maps.Map( t_gmap[0], mapProp );
						
						google.maps.event.addDomListener( window, 'resize', function() {
							var center = map.getCenter();
							google.maps.event.trigger( map, "resize" );
							map.setCenter( LatLng );
						});
						
						map_stat = 0;
					}
					
					//Map Marker
					var marker = new google.maps.Marker({
						position: LatLng,
						icon: map_value.map_marker,
						map: map
					});
					
					//Info Window
					if( map_value.map_info_opt == 'on' ) {
						var info_title = map_value.map_info_title;
						var info_addr = map_value.map_info_address;
						var contentString = '<div class="gmap-info-wrap"><h3>'+ info_title +'</h3><p>'+ info_addr +'</p></div>';
						var infowindow = new google.maps.InfoWindow({
						  content: contentString
						});
						marker.addListener( 'click', function() {
						  infowindow.open( map, marker );
						});
					}
				});
				
			}else{
			
				var LatLng = {lat: parseFloat(map_lat), lng: parseFloat(map_lang)};
				
				var map_wheel = $( gmap ).attr( "data-wheel" ) && $( gmap ).attr( "data-wheel" ) == 'true' ? true : false;
				var map_zoom = $( gmap ).attr( "data-zoom" ) && $( gmap ).attr( "data-zoom" ) != '' ? parseInt( $( gmap ).attr( "data-zoom" ) ) : 14;
				
				var mapProp= {
					center: LatLng,
					scrollwheel: map_wheel,
					zoom: map_zoom,
					styles: map_style_mode
				};
				var t_gmap = $( gmap );
				var map = new google.maps.Map( t_gmap[0], mapProp );
				
				var marker = new google.maps.Marker({
				  position: LatLng,
				  icon: map_marker,
				  map: map
				});
				
				if( $( gmap ).attr( "data-info" ) == 1 ){
					var info_title = $( gmap ).attr( "data-info-title" ) ? $( gmap ).attr( "data-info-title" ) : '';
					var info_addr = $( gmap ).attr( "data-info-addr" ) ? $( gmap ).attr( "data-info-addr" ) : '';
					var contentString = '<div class="gmap-info-wrap"><h3>'+ info_title +'</h3><p>'+ info_addr +'</p></div>';
					var infowindow = new google.maps.InfoWindow({
					  content: contentString
					});
					marker.addListener( 'click', function() {
					  infowindow.open( map, marker );
					});
				}
				
				google.maps.event.addDomListener( window, 'resize', function() {
					var center = map.getCenter();
					google.maps.event.trigger(map, "resize");
					map.setCenter(LatLng);
				});
				
			}// data multi map false part end
			
		}); // end map each
		
	}
	
	function aiea_pie_chart_view( chart_ele ){
		var chart_ele = $( chart_ele );
		var c_chart = $('#' + chart_ele.attr("id") );
		var chart_labels = c_chart.attr("data-labels");
		var chart_values = c_chart.attr("data-values");
		var chart_bgs = c_chart.attr("data-backgrounds");
		var chart_responsive = c_chart.attr("data-responsive");
		var chart_legend = c_chart.attr("data-legend-position");
		var chart_type = c_chart.attr("data-type");
		var chart_zorobegining = c_chart.attr("data-yaxes-zorobegining");
		var chart_title = c_chart.attr("data-chart-title");
		var display_title = chart_title ? true : false;
		
		var legend_title = c_chart.attr("data-legend-title");
		
		chart_labels = chart_labels ? chart_labels.split(",") : [];
		chart_values = chart_values ? chart_values.split(",") : [];
		chart_bgs = chart_bgs ? chart_bgs.split(",") : [];
		chart_responsive = chart_responsive ? chart_responsive : 1;
		chart_legend = chart_legend ? chart_legend : 'none';
		chart_type = chart_type ? chart_type : 'doughnut';
		
		if( chart_zorobegining ){
			chart_zorobegining = {
				yAxes: [{
					ticks: {
						beginAtZero: parseInt( chart_zorobegining )
					}
				}]
			}
		}
		
		var ctx = c_chart[0].getContext('2d');
		var myChart = new Chart(ctx, {
			
			type: chart_type,
			data: {
				labels: chart_labels,
				datasets: [{
					label: legend_title,
					data: chart_values,
					backgroundColor: chart_bgs,
					borderWidth: 1
				}]
			},
			options: {
					
				scales: chart_zorobegining,
				responsive: parseInt( chart_responsive ),
				maintainAspectRatio: false,
				legend: {
					position: chart_legend,
				},
				title: {
					display: display_title,
					text: chart_title
				}
			},
		});
	}
	
	function aiea_weather( _ele ) {
		let chart_ele = $( _ele );
		chart_ele.find(".aiea-weather-temp-buttons > span").on("click", function(e){
			e.preventDefault();
			let _ele = $(this);
			_ele.parents(".aiea-weather-temp").toggleClass("aiea-weather-temp-f");
			return false;
		});
	}
	
	function aiea_line_chart_view( chart_ele ){
		var chart_ele = $( chart_ele );
		var c_chart = $('#' + chart_ele.attr("id") );
		var chart_labels = c_chart.attr("data-labels");
		var chart_values = c_chart.attr("data-values");
		var chart_bg = c_chart.attr("data-background");
		var chart_border = c_chart.attr("data-border");
		var chart_fill = c_chart.attr("data-fill");
		var chart_zorobegining = c_chart.attr("data-yaxes-zorobegining");
		var chart_title = c_chart.attr("data-chart-title");
		var chart_responsive = c_chart.attr("data-responsive");
		var chart_legend = c_chart.attr("data-legend-position");
		
		var legend_title = c_chart.attr("data-legend-title");
		
		chart_labels = chart_labels ? chart_labels.split(",") : [];
		chart_values = chart_values ? chart_values.split(",") : [];
		chart_bg = chart_bg ? chart_bg : '';
		chart_border = chart_border ? chart_border : '';
		chart_fill = chart_fill ? chart_fill : 0;
		
		chart_zorobegining = chart_zorobegining ? chart_zorobegining : 1;
		var display_title = chart_title ? true : false;
		chart_responsive = chart_responsive ? chart_responsive : 1;
		chart_legend = chart_legend ? chart_legend : 'none';

		var ctx = c_chart[0].getContext('2d');
		var myChart = new Chart(ctx, {

			type: 'line',
			data: {
				labels: chart_labels,
				datasets: [{
					label: legend_title,
					data: chart_values,
					fill: parseInt( chart_fill ),
					backgroundColor: chart_bg,
					borderColor: chart_border,
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: parseInt( chart_zorobegining )
						}
					}]
				},
				responsive: parseInt( chart_responsive ),
				maintainAspectRatio: false,
				legend: {
					position: chart_legend,
					label: chart_title
				},
				title: {
					display: display_title,
					text: chart_title
				}
			}
			
		});
	}
	
	function aiea_toggle_content_view( toggle_ele ){
		var toggle_ele = $(toggle_ele).find(".toggle-content");	
		$(toggle_ele).css('max-height', '');
		$(toggle_ele).removeClass("toggle-content-shown");
		
		var c = parseFloat($(toggle_ele).css("line-height"));
		var line_height = c ? c.toFixed(2) : 150;
		var data_hght = $(toggle_ele).data("height");
		data_hght = data_hght ? data_hght : 5;
		var toggle_hgt = data_hght * line_height;
		toggle_hgt = toggle_hgt.toFixed(2);
		toggle_hgt = toggle_hgt + 'px';
		
		var org_hgt = $(toggle_ele).height();
		$(toggle_ele).css('max-height', toggle_hgt);
		$(toggle_ele).addClass("toggle-content-shown");
		var btn_txt_wrap = $(toggle_ele).parents(".toggle-content-inner").find( ".toggle-btn-txt" );
		var btn_org_txt = $(btn_txt_wrap).text();
		var btn_atl_txt = $(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).data("less");
		$(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).unbind( "click" );
		$(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).bind( "click", function(e){			
			event.preventDefault();
			$(toggle_ele).toggleClass("height-expandable");

			$(toggle_ele).parent(".toggle-content-inner").find('.toggle-content-trigger .button-inner-down').fadeToggle(0);
			$(toggle_ele).parent(".toggle-content-inner").find('.toggle-content-trigger .button-inner-up').fadeToggle(0);
			if( $(toggle_ele).hasClass("height-expandable") ){
				$(toggle_ele).css('max-height', org_hgt);
				$(btn_txt_wrap).text(btn_atl_txt);				
			}else{
				$(toggle_ele).css('max-height', toggle_hgt);
				$(btn_txt_wrap).text(btn_org_txt);
			}			
		});
	}
	
	function aiea_tab_content_view( tabs_ele ){
		var tabs_ele = $(tabs_ele);
		
		if( tabs_ele.find(".ai-tab-id-to-element").length && ! $("body.elementor-editor-active").length ){
			tabs_ele.find(".ai-tab-id-to-element").each(function( index ) {
				var tab_id_ele = $(this).data("id");
				var clone_tab = $("#"+tab_id_ele).clone();
				$(document).find("#"+tab_id_ele).remove();
				$(this).replaceWith(clone_tab);			
			});
		}

		$(tabs_ele).find(".ai-tabs a").on( "click", function(e){
			e.preventDefault();
			var cur_tab = $(this);
			var tab_id = $(cur_tab).attr("data-id");
			$(cur_tab).parents(".ai-tabs").find("a").removeClass("active");
			$(cur_tab).addClass("active");
			
			var tab_content_wrap = $(cur_tab).parents(".ai-tabs").next(".ai-tab-content");
			$(tab_content_wrap).find(".ai-tab-pane").fadeOut(0);
			$(tab_content_wrap).find(".ai-tab-pane").removeClass("active");
			$(tab_content_wrap).find(tab_id).fadeIn( 350, function(){
				$(tab_content_wrap).find(tab_id).addClass("active");
			});
			
			return false; 
		});
	}
	
	function aiea_switcher_content( switcher_ele ){
		var switcher_ele = $(switcher_ele);
		
		let _init_ele = $(switcher_ele).find(".ai-swticher-list > li:nth-child(2)");
		let _position = $(_init_ele).position();
		let _width = $(_init_ele).outerWidth();
		$(switcher_ele).find(".ai-swticher-slider").css({ "left": +_position.left, "width": _width});
		
		$(switcher_ele).find(".ai-swticher-list > li").on( "click", function(){
			let position = $(this).position();
			let width = $(this).outerWidth();
			$(switcher_ele).find(".ai-swticher-slider").css({"left":+ position.left,"width":width});
			
			$(switcher_ele).find(".ai-switcher-content > div").fadeOut(0);
			if( !$(this).hasClass("ai-primary-switch") ){
				$(this).parents("ul").find("li").removeClass("switcher-active");
				$(this).parents("ul").find(".ai-secondary-switch").addClass("switcher-active");
				$(switcher_ele).find(".ai-switcher-content > div.ai-switcher-secondary").fadeIn(350);
			}else{
				$(this).parents("ul").find("li").removeClass("switcher-active");
				$(this).parents("ul").find(".ai-primary-switch").addClass("switcher-active");
				$(switcher_ele).find(".ai-switcher-content > div.ai-switcher-primary").fadeIn(350);
			}
			
		});
		
		if( switcher_ele.find(".ai-switcher-id-to-element").length && ! $("body.elementor-editor-active").length ){
			switcher_ele.find(".ai-switcher-id-to-element").each(function( index ) {
				var switcher_id_ele = $(this).data("id");
				var clone_tab = $("#"+switcher_id_ele).clone();
				$(document).find("#"+switcher_id_ele).remove();
				$(this).replaceWith(clone_tab);
			});
		}
	}
	
	function aiea_offcanvas_content_handler( offcanvas_ele, $scope ){
		var offcanvas_ele = $(offcanvas_ele);	
		
		if( $(".ai-offcanvas-id-to-element").length && ! $("body.elementor-editor-active").length ){
			$(offcanvas_ele).find(".ai-offcanvas-id-to-element").each(function( index ) {
				var offcanvas_id_ele = $(this).data("id");
				var clone_offcanvas = $("#"+offcanvas_id_ele).clone();
				$("#"+offcanvas_id_ele).remove();
				$(this).replaceWith(clone_offcanvas);
			});
		}
				
		$(offcanvas_ele).find(".ai-offcanvas-trigger").on( "click", function(){
			$("body").addClass("ai-offcanvas-active");
			$(offcanvas_ele).find(".ai-overlay-bg").addClass("active");
			$(this).addClass("active");
			var offcanvas_id = $(this).data("offcanvas-id");
			if( $('#'+offcanvas_id).length ){
				$('#'+offcanvas_id).addClass("active");
				var ani_type = $('#'+offcanvas_id).data("canvas-animation");
				let _body_styles = '';
				let _offcanvas_width = $('#'+offcanvas_id).outerWidth();
				if( ani_type == 'left-push' ){
					//$("body").css({"margin-left": _offcanvas_width +"px", "margin-right": "-"+ _offcanvas_width +"px"});
					_body_styles = 'body{margin-left: '+ _offcanvas_width +'px; margin-right: -'+ _offcanvas_width +'px;}';
				}else if( ani_type == 'right-push' ){
					//$("body").css({"margin-left": "-"+ _offcanvas_width +"px", "margin-right": _offcanvas_width +"px"});
					_body_styles = 'body{margin-left: -'+ _offcanvas_width +'px; margin-right: '+ _offcanvas_width +'px;}';
				}
				
				setTimeout( function() {
					
					if( _body_styles ) {
						_body_styles = '<style id="ai-offcanvas-custom-style">'+ _body_styles +'</style>';
						$("body").append(_body_styles);
					}
					
					AICallEveryElement( $scope );
					
				}, 350 );
			}
			
			return false;
		});
		
		$(offcanvas_ele).find(".ai-offcanvas-close, .ai-overlay-bg").on( "click", function(){
			$("body").removeClass("ai-offcanvas-active");
			$(offcanvas_ele).find(".ai-overlay-bg, .ai-offcanvas-wrap, .ai-offcanvas-trigger").removeClass("active");
			setTimeout( function() {
				$("body").find("#ai-offcanvas-custom-style").remove();
			}, 350 );
		});
		
		if( $(offcanvas_ele).find( "ul.ai-nav-menu" ).length ){
			$(offcanvas_ele).find( "ul.ai-nav-menu" ).addClass("ai-mobile-menu");
			$(offcanvas_ele).find( "ul.ai-nav-menu li.menu-item > ul.sub-menu" ).each(function() {
				$(this).parent("li").append( '<span class="ai-down-arrow"></span>' );
				$(this).slideUp(350);					
			});
			
			$( offcanvas_ele ).on( "click", "ul.ai-nav-menu span.ai-down-arrow", function() {
				$(this).removeClass("ai-down-arrow").addClass("ai-up-arrow");
				$(this).prev("ul.sub-menu").slideDown(350);
				return false;
			});	
			$( offcanvas_ele ).on( "click", "ul.ai-nav-menu span.ai-up-arrow", function() {
				var parent_li = $(this).parent("li.menu-item");
				$(parent_li).find("span.ai-up-arrow").removeClass("ai-up-arrow").addClass("ai-down-arrow");
				$(parent_li).find("ul.sub-menu").slideUp(350);
				return false;
			});				
		}
	}
	
	function aiea_menu_content( _ele ) {
		
		let _menu_ele = $(_ele);
		let _parent_container = _menu_ele.parent(".ai-menu-elementor-widget");
		let _res_from = $(_parent_container).data("responsive");
		
		// on load
		aiea_menu_class_formation( _res_from, _parent_container );
		
		// on resize
		$( window ).resize(function() {
			setTimeout( function() {
				aiea_menu_class_formation( _res_from, _parent_container );
			}, 100 );
			
			setTimeout( function() {
				aiea_set_mega_menu_width(_menu_ele);
			}, 200 );
		});
		
		// set mega menu width
		setTimeout( function() {
			aiea_set_mega_menu_width(_menu_ele);
		}, 350 );
		
	}
	
	function aiea_set_mega_menu_width(_menu_ele) {
		if( _menu_ele.find("li.has-ai-mega-menu").length ) {
			_menu_ele.find("li.has-ai-mega-menu").each( function(){
				let _cur = $(this);
				
				if( !$(_cur).parents(".ai-offcanvas-wrap").length ) {
					
					$(_cur).find(".ai-elementor-mega-menu").addClass("positioning");
					
					let _width = $(_cur).find(".ai-elementor-mega-menu").data("width");
					_width = _width ? _width : $(_cur).find(".ai-elementor-mega-menu").parents('.elementor-container').width();
					$(_cur).find(".ai-elementor-mega-menu").css({width: _width + 'px'});
					
					$(_cur).find(".ai-elementor-mega-menu").css({'left': '0' });
					let _top_section = _cur.parents("section.elementor-top-section > .elementor-container");
					let _top_container_left = $(_top_section).offset().left;
					//console.log( _top_container_left );
					if( _top_container_left ) {
						
						let _li_mid = aiea_get_mid_offset(_cur);
						let _mega_mid = aiea_get_mid_offset($(_cur).find(".ai-elementor-mega-menu"));
						let _mega_left = _mega_mid - _li_mid;

						$(_cur).find(".ai-elementor-mega-menu").css({'left': '-'+ _mega_left +'px' });
					
						let _mega_left_afc = $(_cur).find(".ai-elementor-mega-menu").offset().left; // afc - after calculation
						if( _top_container_left > _mega_left_afc ) {
							let _mleft = _mega_left - ( _top_container_left - _mega_left_afc );						
							$(_cur).find(".ai-elementor-mega-menu").css({'left': '-'+ _mleft +'px' });
						} else {
							let _mleft = _mega_left + ( _mega_left_afc - _top_container_left );						
							$(_cur).find(".ai-elementor-mega-menu").css({'left': '-'+ _mleft +'px' });
						}
					} else {
						let _mega_left = $(_cur).find(".ai-elementor-mega-menu").offset().left;
						$(_cur).find(".ai-elementor-mega-menu").css({'left': '-'+ _mega_left +'px' });
					}
					
					$(_cur).find(".ai-elementor-mega-menu").removeClass("positioning");
					
				}
			});
		}
	}
		
	function aiea_get_mid_offset( _ele ) {
		let _width = $(_ele).outerWidth();
		return _width / 2;
	}
	
	function aiea_search_content( _ele ) {
		let _search_ele = $(_ele);
		$(_search_ele).on("click", function(e){
			e.preventDefault();
			$(".ai-overlay-search-warp").addClass("active");
			return false;
		});
		
		$(".ai-search-close").on("click", function(e){
			e.preventDefault();
			$(".ai-overlay-search-warp").removeClass("active");
			return false;
		});
	}
	
	function aiea_masonry_view( c_elem ){
		var c_elem = $(c_elem);
		var parent_width = c_elem.width();
		var gutter_size = c_elem.data( "gutter" );
		var grid_cols = c_elem.data( "cols" );
		var filter = '';

		var layoutmode = c_elem.is('[data-layout]') ? c_elem.data( "layout" ) : '';
		layoutmode = layoutmode ? layoutmode : 'masonry';
		
		if( $(window).width() < 768 ) grid_cols = 1;
		
		var net_width = Math.floor( ( parent_width - ( gutter_size * ( grid_cols - 1 ) ) ) / grid_cols );
		c_elem.find( ".isotope-item" ).css({'width':net_width+'px', 'margin-bottom':gutter_size+'px'});
		
		var cur_isotope;
		
		/* Call ssotope after image loaded */
		$(document).imagesLoaded( function(){
			setTimeout(function(){
				cur_isotope = c_elem.isotope({
					itemSelector: '.isotope-item',
					layoutMode: layoutmode,
					filter: filter,
					masonry: {
						gutter: gutter_size
					},
					fitRows: {
					  gutter: gutter_size
					}
				});
			}, 100 );
		});
		
		/* Isotope filter item */
		var filter_wrap = '';
		filter_wrap = $(c_elem).prev(".isotope-filter");
		$(filter_wrap).find( ".isotope-filter-item" ).on( 'click', function() {
			$( this ).parents("ul.nav").find("li").removeClass("active");
			$( this ).parent("li").addClass("active");
			filter = $( this ).attr( "data-filter" );
			if( c_elem.find( ".isotope-item" + filter ).hasClass( "ai-animate" ) ){
				if( filter ){
					c_elem.find( ".isotope-item" + filter ).removeClass("run-animate");
				}else{
					c_elem.find( ".isotope-item" ).removeClass("run-animate");
				}
				aiea_scroll_animation(c_elem);
			}
			cur_isotope.isotope({ 
				filter: filter
			});
			
			return false;
		});
		
		//Animate isotope items
		if( c_elem.find( ".isotope-item" ).hasClass( "ai-animate" ) ){
			aiea_scroll_animation(c_elem);
			$(window).on('scroll', function(){
				aiea_scroll_animation(c_elem);
			});
		}else{
			c_elem.children(".isotope-item").addClass("item-visible");
		}
		
		/* Isotope infinite */

		if( c_elem.data( "infinite" ) == 1 ){
			
			var _uniq_id = c_elem.parents(".elementor-widget").data("id");
			c_elem.parents(".elementor-widget").find(".page-load-status").addClass("page-load-status-"+_uniq_id);
			c_elem.parents(".elementor-widget").find(".infinite-scroll-last").addClass("infinite-scroll-last-"+_uniq_id);
			c_elem.parents(".elementor-widget").find(".infinite-scroll-error").addClass("infinite-scroll-error-"+_uniq_id);
			let _links = c_elem.parents(".elementor-widget").find(".page-load-status").data("links");
			
			c_elem.infiniteScroll({
				path: function(){ 
					const nextPenSlugs = _links; 
					let slug = nextPenSlugs[ this.loadCount ];
					if ( slug ) return `${slug}`;
					else {
						setTimeout(function(){ $(".infinite-scroll-last-"+ _uniq_id +", .page-load-status-"+ _uniq_id).fadeIn(350); }, 250 );
						setTimeout(function(){ $(".infinite-scroll-last-"+ _uniq_id +", .page-load-status-"+ _uniq_id).fadeOut(350); }, 5000 );
					}
				},
				status: ".page-load-status",
				history: false
			});

			// append items on load
			c_elem.on( 'load.infiniteScroll', function( event, response, path ) {
				var $items = $( response ).find('.isotope-item');

				$items.css({'width':net_width+'px', 'margin-bottom':gutter_size+'px'});

				// append items after images loaded
				$items.imagesLoaded( function() {
					c_elem.append( $items );
					c_elem.isotope( 'insert', $items );
				});

				//Animate isotope items
				if( $items.hasClass( "ai-animate" ) ){
					aiea_scroll_animation(c_elem);
				}else{
					$items.addClass("item-visible");
				}

			});
			
		}

		/* Isotope resize */
		$( window ).resize(function() {
			setTimeout(function(){ 
				grid_cols = c_elem.data( "cols" );
				if( $(window).width() < 768 ) grid_cols = 1;
				
				var parent_width = c_elem.width();
				net_width = Math.floor( ( parent_width - ( gutter_size * ( grid_cols - 1 ) ) ) / grid_cols );
				c_elem.find( ".isotope-item" ).css({'width':net_width+'px'});
				c_elem.imagesLoaded( function(){
					var $isot = c_elem.isotope({
						itemSelector: '.isotope-item',
						masonry: {
							gutter: gutter_size
						}
					});
				});
				
			}, 200);			
		});

	}
	
	function aiea_slider_view( c_slider ){
			
		let slide_data = $(c_slider).data("slide-atts");
		
		$(c_slider).slick({
			rtl: $( "body.rtl" ).length ? true : false,
			centerMode: slide_data.slide_center == "yes" ? true : false,
			dots: slide_data.slide_dots == "yes" ? true : false,
			arrows: slide_data.slide_nav == "yes" ? true : false,
			autoplay: slide_data.slide_item_autoplay == "yes" ? true : false,
			autoplaySpeed: slide_data.autoplay_speed ? slide_data.autoplay_speed : 2500,
			infinite: slide_data.slide_item_loop == "yes" ? true : false,
			speed: slide_data.animation_speed ? slide_data.animation_speed : 300,
			slidesToShow: slide_data.slide_item ? slide_data.slide_item : 3,
			slidesToScroll: slide_data.slide_to_scroll ? slide_data.slide_to_scroll : 1,
			adaptiveHeight: slide_data.slide_adaptive_height == "yes" ? true : false,
			prevArrow: '<i class="ti-angle-left"></i>',
			nextArrow: '<i class="ti-angle-right"></i>',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: slide_data.slide_item_tab ? slide_data.slide_item_tab : 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: slide_data.slide_item_mobile ? slide_data.slide_item_mobile : 1,
						slidesToScroll: 1
					}
				}
			]
		});	
		
	}
	
	function aiea_accordion_content_view( accordion_ele ){
		var accordion_ele = $(accordion_ele);
		if( accordion_ele.find(".ai-accordion-id-to-element").length && ! $("body.elementor-editor-active").length ){
			accordion_ele.find(".ai-accordion-id-to-element").each(function( index ) {
				var accordion_id_ele = $(this).data("id");
				var clone_tab = $("#"+accordion_id_ele).clone();
				$(document).find("#"+accordion_id_ele).remove();
				$(this).replaceWith(clone_tab);			
			});
		}

		$(accordion_ele).find(".ai-accordion-header a").on( "click", function(e){
			e.preventDefault();
			var cur_tab = $(this);
			var accordion_id = $(cur_tab).attr("data-id");
			var accordion_wrap = $(cur_tab).parents(".ai-accordion-elementor-widget");
			
			if( $(accordion_wrap).data("toggle") == 1 ){
				if( cur_tab.hasClass("active") ) {
					cur_tab.removeClass("active");
					$(accordion_wrap).find(accordion_id).slideUp(350);
				} else {					
					cur_tab.addClass("active");
					$(accordion_wrap).find(accordion_id).slideDown(350);
				}
				
			}else{			
				if( cur_tab.hasClass("active") ){				
					$(accordion_wrap).find(".ai-accordion-header a").removeClass("active");
					$(accordion_wrap).find(".ai-accordion-content").slideUp(350);
					//$(accordion_wrap).find(accordion_id).slideDown(350);
				}else{
					//$(accordion_wrap).find(".ai-accordion-content").slideUp(350);
					$(accordion_wrap).find(".ai-accordion-header a").removeClass("active");
					$(accordion_wrap).find(".ai-accordion-content").slideUp(350);
					cur_tab.addClass("active");
					$(accordion_wrap).find(accordion_id).slideDown(350);
				}
			}
			
			return false;
		});
	}
	
	function aiea_section_parallax_view( pr_ele ){
		
		pr_ele = $(pr_ele);
		var pr_json;
		window.isEditMode = elementorFrontend.isEditMode();
		if ( isEditMode ) {			
			let _aiea_pointer = pr_ele.children(".ai-section-pointer").data("ai");	
			pr_json = { parallax_image: _aiea_pointer.parallax_image, parallax_speed: _aiea_pointer.parallax_speed, parallax_type: _aiea_pointer.parallax_type };
		} else {
			pr_json = pr_ele.attr("data-ai-parallax") ? JSON.parse(pr_ele.attr("data-ai-parallax")) : '';
		}
		var ele_id = pr_ele.attr("data-id");
		
		pr_ele.find('#ai-parallax-'+ ele_id).remove();
		pr_ele.prepend('<div id="ai-parallax-'+ ele_id +'" class="ai-parallax-element jarallax"></div>');
		
		$(".jarallax").jarallax({
			type: pr_json.parallax_type,
			speed: pr_json.parallax_speed,
			imgSrc: pr_json.parallax_image.url
		});
		
	}
	
	function aiea_icon_choose_on_change( $panel_ele ) {
		$panel_ele.unbind( 'click' );
		$panel_ele.on( 'click', 'input[name*="elementor-choose-icon_position"]', function () {
			if( $(this).is(':checked') ) $panel_ele.find('textarea[data-setting="icon_position_trigger"]').val($(this).val()).trigger("click");
			else $panel_ele.find('textarea[data-setting="icon_position_trigger"]').val('').trigger("click");
			
		});
	}
	
	function aiea_image_choose_on_change( $panel_ele ) {
		$panel_ele.unbind( 'click' );
		$panel_ele.on( 'click', 'input[name*="elementor-choose-image_position"]', function () {
			if( $(this).is(':checked') ) $panel_ele.find('textarea[data-setting="image_position_trigger"]').val($(this).val()).trigger("click");
			else $panel_ele.find('textarea[data-setting="image_position_trigger"]').val('').trigger("click");
		});
	}
	
	function aiea_parallax_on_change( $panel_ele, $view_ele ) {
		$panel_ele.on( 'change', 'input[data-setting="parallax_opt"]', function () {
			$view_ele = $(document).find("section.elementor-element-editable");
			if( $(this).is(":checked") ) {
				aiea_section_parallax_view( $view_ele );
			} else {				
				var ele_id = $view_ele.attr("data-id");
				$view_ele.find('#ai-parallax-'+ ele_id).remove();
			}
		});
	}
	
	function AICallEveryElement( $scope ){

		$(window).trigger("resize");	
		
	}
	
	function aiea_scroll_animation(c_elem){
		setTimeout( function() {
			var anim_time = 300;
			$(c_elem).find('.ai-animate:not(.run-animate)').each( function() {
				
				var elem = $(this);
				var bottom_of_object = elem.offset().top;
				var bottom_of_window = $(window).scrollTop() + $(window).height();
				
				if( bottom_of_window > bottom_of_object ){
					setTimeout( function() {
						elem.addClass("run-animate");
					}, anim_time );
				}
				anim_time += 300;
				
			});
		}, 300 );
	}
	
	function aiea_menu_class_formation( _res_from, _parent_container ) {
		if( $(window).width() <= _res_from ) {
			$(_parent_container).addClass("responsive-mode-on");
		} else {
			$(_parent_container).removeClass("responsive-mode-on");
		}
	}
	
	jQuery.fn.redraw = function() {
		return this.hide(0, function() {
			$(this).show();
		});
	};
	
} )( jQuery );


