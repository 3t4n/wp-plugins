jQuery(function($) {

	"use strict";

	var is_rtl = $('html').attr('dir') == "rtl";

    if ( window.gs_debounce == undefined ) {

        window.gs_debounce = function( fn, threshold ) {
    
            var timeout;
    
            return function gs_debounced() {
    
                if ( timeout ) clearTimeout( timeout );
    
                function gs_delayed() {
                    fn();
                    timeout = null;
                }
    
                timeout = setTimeout( gs_delayed, threshold || 100 );
    
            };
        }
    }

    function do_carousel( $sliders ) {

		if ( ! $sliders.length ) return;

        let settings = $sliders.parent().parent().data('carousel-settings');        
        
		$sliders.each( function() {			
			$(this).owlCarousel({
				rtl: is_rtl,
				autoplay: settings.enable_autoplay,
				autoplayHoverPause: true,
				loop: true,
				margin: 30,
				rewind: false,
                smartSpeed: settings.speed || 1400,
				autoplayTimeout: settings.delay || 3000,
				navSpeed: 1000,
				responsiveClass: true,
				lazyLoad: true,
				responsive: {
					0: {
						items: 12 / Number(settings.columns_mobile)
					},
					576: {
						items: 12 / Number(settings.columns_mobile_portrait)
					},
					768: {
						items: 12 / Number(settings.columns_tablet)
					},
					1025: {
						items: 12 / Number(settings.columns)
					}
				}
			});
		});
	}

    function load_filter_class() {

        function GS_Behance_filter( $wrapper ) {

            this.$wrapper = $wrapper;
            this.$widget  = this.$wrapper.find( '.grid' );
            this.filters  = {};
            this.initIsotope();
            this.setFilterEvents();

            return this;
        }

        GS_Behance_filter.prototype.initIsotope = function() {

            if( ! this.filters.group ) {
                this.filters.group = this.$wrapper.find('.filters-button-group > button').first().addClass('active').data('filter');
            }

            this.$filter_widget = this.$widget.gs_isotope({
                itemSelector: '.beh-projects',
                layoutMode: 'fitRows',
                originLeft: !is_rtl,
                filter: this.isotopeFilter.bind(this)
            });

        }

        GS_Behance_filter.prototype.isotopeFilter = function( index, item ) {

            var $item   = $(item);	
			var filters = [ this.filters.group ? $item.is( this.filters.group ) : true ];
			
			return filters.every(function( _filter ) {
				return !! _filter;
			});

        }

        GS_Behance_filter.prototype.setFilterEvents = function() {

            var _this = this;
	
			this.$wrapper.find('.filters-button-group').on( 'click', 'button', function(e) {
				e.preventDefault();
				_this.filters.group = $(this).data('filter');
				$(this).parent().addClass('active').siblings().removeClass('active');
				_this.refreshIsotope();
			});

			$(window).on( 'load', function() {
				_this.refreshIsotope();
				setTimeout(function() {
					_this.refreshIsotope();
				}, 200 );
			}); 

        }

        GS_Behance_filter.prototype.refreshIsotope = function() {
            this.$filter_widget.gs_isotope();
        }

        $.fn.gs_behance_filter = function() {
                      
            return new GS_Behance_filter( $(this).first() );
        }
    }

    function do_filter( $widget_box ) {
        
        if( ! $widget_box.length ) return;

        if( ! $.fn.gs_behance_filter ) load_filter_class();

        $widget_box.each( function() {
            $(this).gs_behance_filter();
        });        

    }

    function do_popup( $popup ) {

        $popup.magnificPopup({
            type: 'inline',
            midClick: true,
            gallery: {
                enabled: true
            },
            delegate: 'a.gs_beh_pop',
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function () {
                    var extraClass = ['mfp-gsbehance'];

                    extraClass.push( this.st.el.attr('data-effect') ? this.st.el.attr('data-effect') : 'mfp-fade' );

                    extraClass.push( this.st.el.attr('data-theme') ? this.st.el.attr('data-theme') : 'gs-behance-popup--default' );

                    this.st.mainClass = this.st.mainClass + ' ' + extraClass.join(' ');

                    // this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
            closeOnContentClick: true,
        });
    }

    function gs_beh_widget_single_init( widget_box ) {
        
        if( widget_box.find('.beh_slider').length ) {
            do_carousel( $('.beh_slider', widget_box) );
        }

        if( widget_box.find('.filter').length ) {
            do_filter( $( widget_box ) );
        }
        
        if( widget_box.find('.beh-projects-pop').length ) {
            do_popup( $('.beh-projects-pop', widget_box) );
        }

        widget_box.addClass('gs_beh__loaded');
    }

    window.gs_beh_init = function() {
            
        var behance_container = $('.gs_beh_area');

        if ( ! behance_container.length ) return;

        behance_container.each(function() {
            
            if ( ! $(this).parent().is(':visible') ) return;
            
            if ( $(this).data('et-js-processed') ) return;

            if ( $(this).hasClass('gs_beh__loaded') ) return;

            $(this).data( 'et-js-processed', 1 );

            gs_beh_widget_single_init( $(this) );
            
            gs_debounce( function() {
                jQuery(window).trigger('resize');
            }, 30 )();

        });
    }

    // Init
    gs_beh_init();

    // Init on Editor
    $(window).on('gsbeh:scripts:reprocess', function() {
        gs_beh_init();
    });

    // Init on Load
    $(window).on('load', function() {
        gs_beh_init();
    });

});
