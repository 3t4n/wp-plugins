var acb_complete = [];
var acb_autoload = [];

( function( $ ) {
	"use strict";

	function acb_ajax( acb, append = false ) {
		// This grid was already finished.
		if ( $.inArray( acb.attr( 'data-id' ), acb_complete ) !== -1 ) {
			return false;
		}

		var data = [];

		var attrs = {};
		$.each( acb_params.keys, function( index, key ) {
			attrs[ key ] = acb.attr( 'data-' + key );
		} );

		data = $.extend( {
			action: 	'acb_load_content',
			security: 	acb_params.ajax_nonce,
			attrs:      attrs,
			append:     append,
		}, data );

		// This applies when data is inserted, not appended.
		if ( append == false ) {
			acb.removeClass( 'acb-visible' );
		} else {
			// Add ajax load more text.
			acb.after( '<div class="acb-loading">' + acb_params.load_more + '</div>' );
		}

		$.post( acb_params.ajaxurl, data, function( response ) {
			console.log( 'acb "' + acb.attr( 'data-id' ) + '" ajax request' );
			acb.parent().find( '.acb-loading').remove();

			// Overwrite the content.
			if ( append == false ) {
				if ( acb.data( 'masonry' ) ) {
					acb.masonry( 'destroy' );
					acb.removeData( 'masonry' );
				}
				acb.html( response );
				acb.imagesLoaded( function() {
					acb.masonry( {
						itemSelector:		'.acb-grid-item',
						columnWidth:		'.acb-grid-sizer',
						gutter:				'.acb-gutter-sizer',
						percentPosition:	true,
						resize: 			false,
						initLayout:			false,
						transitionDuration: 0,
					} );
					// Fix the initial masonry load.
					acb.masonry( 'layout' );
					// Re-init tooltips.
					$( document.body ).trigger( 'acb-init-tooltips' );
					acb.addClass( 'acb-visible' );
				} );
			} else {
				if ( ! response ) {
					acb_complete.push( acb.attr( 'data-id' ) );
				}
				acb.append( response );
				acb.imagesLoaded( function() {
					acb.masonry( 'reloadItems' );
					acb.masonry( 'layout' );
					// Re-init tooltips.
					$( document.body ).trigger( 'acb-init-tooltips' );
					if ( $.inArray( acb.attr( 'data-id' ), acb_autoload ) !== -1 ) {
						acb_autoload.splice( acb.attr( 'data-id' ), 1 );
					}
				} );
			}
		} );
	}

	/***
	 * @The masonry work.
	 **/

	// Masonry.
	function acb_grid() {
		var $container = $( '.acb-grid' );
		$container.each( function() {
			$( this ).imagesLoaded( function() {
				$container.masonry( {
					itemSelector:		'.acb-grid-item',
					columnWidth:		'.acb-grid-sizer',
					gutter:				'.acb-gutter-sizer',
					percentPosition:	true,
					resize: 			false,
					initLayout:			false,
					transitionDuration: 0,
				} );
				// Fix the initial masonry load.
				$container.masonry( 'layout' );
				// Re-init tooltips.
				$( document.body ).trigger( 'acb-init-tooltips' );
				$container.addClass( 'acb-visible' );
				// Everything loaded.
				acb_get_query();
			} );
		} );
	}

	// Run the grid again when window finish resizing.
	var rtime;
	var timeout = false;
	var delta = 200;
	$( window ).resize( function() {
		rtime = new Date();
		if ( timeout === false ) {
			timeout = true;
			setTimeout( resizeend, delta );
		}
	} );

	// End resize.
	function resizeend() {
		if ( new Date() - rtime < delta ) {
			setTimeout( resizeend, delta );
		} else {
			timeout = false;
			acb_grid();
		}
	}

	// Initial.
	acb_grid();
	
	/***
	 * @Lets write custom functions below.
	 * @Add and remove filters then ajax load.
	 **/

	// Add data to the grid container.
	function acb_add_data( grid, filter, value ) {
		if ( $.inArray( filter, acb_params.filters ) !== -1 && ( filter != 's' ) && ( filter != 'author' ) && ( filter != 'price' ) && ( filter != 'date' ) && ( filter != 'sortby' ) ) {
			var current = grid.find( '.acb-grid' ).attr( 'data-' + filter );
			if ( current ) {
				value = current + '::' + value;
			}
			grid.find( '.acb-grid' ).attr( 'data-' + filter, value );
		} else {
			grid.find( '.acb-grid' ).attr( 'data-' + filter, value );
		}
	}

	// Remove data from the grid container.
	function acb_remove_data( grid, filter, value ) {
		if ( $.inArray( filter, acb_params.filters ) !== -1 && ( filter != 's' ) && ( filter != 'author' ) && ( filter != 'price' ) && ( filter != 'date' ) && ( filter != 'sortby' ) ) {
			var current = grid.find( '.acb-grid' ).attr( 'data-' + filter );
			if ( current ) {
				current = current.replace( '::' + value, '' );
				current = current.replace( value, '' );
				if ( current ) {
					grid.find( '.acb-grid' ).attr( 'data-' + filter, current );
				} else {
					grid.find( '.acb-grid' ).removeAttr( 'data-' + filter );
				}
			}
		} else {
			grid.find( '.acb-grid' ).removeAttr( 'data-' + filter );
		}
	}

	// Adds a filter.
	function acb_add_filter( grid, that, update = true ) {
		var filter = that.attr( 'data-filter' ),
			value  = that.attr( 'data-value' ),
			label  = that.attr( 'data-label' ),
			tags   = grid.find( '.acb-tags' ),
			tpl    = tags.find( '.acb-tag-tpl' );

		// This is to avoid adding invalid filters.
		if ( ! filter || ! value ) {
			return false;
		}

		// This is to ignore duplicate filters.
		if ( tags.find( '.acb-tag[data-filter=' + filter + '][data-value="' + value + '"]' ).length ) {
			return false;
		}

		// These filters need to appear once only in the tags. Like 'search' and price'
		var oneuse_filters = [ 's', 'price', 'date', 'sortby' ];
		if ( $.inArray( filter, oneuse_filters ) !== -1 ) {
			if ( tags.find( '.acb-tag[data-filter=' + filter + ']' ).length ) {
				tags.find( '.acb-tag[data-filter=' + filter + ']' ).remove();
			}
		}

		// Add filter to the grid data.
		acb_add_data( grid, filter, value );

		// Make the grid tags appears.
		tags.removeClass( 'acb-tags-none' );

		// Clone and setup new filter.
		var $new_filter = tpl.clone().insertBefore( tags.find( '.acb-tag-clear' ) ).removeClass( 'acb-tag-tpl' );
		if ( that.find( 'img' ).length ) {
			label = '<img src="' + that.find( 'img' ).attr( 'src' ) + '" alt="" />' + label;
		}
		$new_filter.html( $new_filter.html().replace( '[name]', label ) );
		$new_filter.attr( 'data-filter', filter );
		$new_filter.attr( 'data-value', value );
		$new_filter.attr( 'data-label', label );
		
		// This is a checkbox filter?
		if ( that.hasClass( 'acb-filter-item-link' ) ) {
			that.addClass( 'acb-checked' );
			that.find( 'span.acb-uncheck' ).removeClass().addClass( 'acb-check' );
		}

		// Check if we have a sort filter. These filters need to remove other selections.
		if ( that.parent().hasClass( 'acb-sort' ) ) {
			that.parents( 'ul' ).find( '.acb-filter-item-link[data-default=true]' ).find( 'span' ).removeClass().addClass( 'acb-uncheck' );
			that.parents( 'ul' ).find( '.acb-filter-item-link' ).not( that ).removeClass( 'acb-checked' ).find( 'span' ).removeClass().addClass( 'acb-uncheck' );
		}

		if ( update ) {
			// When we add a filter, offset need to be restarted.
			if ( $.inArray( grid.find( '.acb-grid' ).attr( 'data-id' ), acb_complete ) !== -1 ) {
				acb_complete.splice( grid.find( '.acb-grid' ).attr( 'data-id' ), 1 );
				acb_autoload.splice( grid.find( '.acb-grid' ).attr( 'data-id' ), 1 );
				grid.find( '.acb-grid' ).attr( 'data-offset', 0 );
			}

			acb_hash( grid, tags );
			acb_ajax( grid.find( '.acb-grid' ) );
		}
	}

	// Removes a filter.
	function acb_remove_filter( grid, that, update = true ) {
		var filter = that.attr( 'data-filter' ),
			value  = that.attr( 'data-value' ),
			label  = that.attr( 'data-label' ),
			tags   = grid.find( '.acb-tags' ),
			tpl    = tags.find( '.acb-tag-tpl' );

		// Filter not added even.
		if ( ! tags.find( '.acb-tag[data-filter=' + filter + '][data-value="' + value + '"]' ).length ) {
			return false;
		} else {
			tags.find( '.acb-tag[data-filter=' + filter + '][data-value="' + value + '"]' ).remove();
			// Clear all filters if this was the last filter.
			if ( tags.find( '.acb-tag:not(.acb-tag-tpl,.acb-tag-clear)' ).length == 0 ) {
				acb_remove_all_filters( grid );
			}
		}

		// Remove the data from attributes.
		acb_remove_data( grid, filter, value );

		// Checks the state or when this click has happened.
		if ( that.hasClass( 'acb-filter-item-link' ) ) {
			that.removeClass( 'acb-checked' );
			that.find( 'span.acb-check' ).removeClass().addClass( 'acb-uncheck' );
		} else {
			grid.find( '.acb-add-filter[data-filter=' + filter + '][data-value="' + value + '"]' ).removeClass( 'acb-checked' );
			grid.find( '.acb-add-filter[data-filter=' + filter + '][data-value="' + value + '"]' ).find( 'span.acb-check' ).removeClass().addClass( 'acb-uncheck' );
		}

		// When clearing is done on the search input.
		if ( that.is( 'input[type=text]' ) ) {
			that.val( '' );
			that.attr( 'data-value', '' );
			that.attr( 'data-label', acb_params.search + '' );
		}

		// When clearing is done on the selected search tag.
		if ( that.hasClass( 'acb-tag' ) ) {
			var input = grid.find( '.acb-search input' );
			input.val( '' );
			input.attr( 'data-value', '' );
			input.attr( 'data-label', acb_params.search + '' );
		}

		// When we clear a price filter.
		if ( that.attr( 'data-filter' ) == 'price' ) {
			var pricedata = grid.find( '.acb-price-input--js' );
			pricedata.parents( '.acb-filter' ).find( '#acb_price_min' ).val( '' );
			pricedata.parents( '.acb-filter' ).find( '#acb_price_max' ).val( '' );
			pricedata.attr( 'data-value', '' );
			pricedata.attr( 'data-label', '' );
		}

		// When we clear a sortby filter.
		if ( that.attr( 'data-filter' ) == 'sortby' ) {
			var sortby = grid.find( '.acb-sorting-select select' );
			sortby.val(  sortby.find( 'option:first' ).val() );
		}

		// Re-enforces the default filter.
		if ( that.hasClass( 'acb-tag' ) && $.inArray( filter, [ 'date', 'sortby' ] ) !== -1 ) {
			grid.find( '.acb-filter[data-filter=' + filter + ']' ).find( '.acb-filter-item-link[data-default="true"]' ).click();
		}

		if ( update ) {
			acb_hash( grid, tags );
		}

		// When we remove a filter, offset need to be restarted.
		if ( $.inArray( grid.find( '.acb-grid' ).attr( 'data-id' ), acb_complete ) !== -1 ) {
			acb_complete.splice( grid.find( '.acb-grid' ).attr( 'data-id' ), 1 );
			acb_autoload.splice( grid.find( '.acb-grid' ).attr( 'data-id' ), 1 );
			grid.find( '.acb-grid' ).attr( 'data-offset', 0 );
		}

		// Run ajax event.
		acb_ajax( grid.find( '.acb-grid' ) );
	}

	// Removes all filters.
	function acb_remove_all_filters( grid ) {
		grid.find( '.acb-search input' ).val( '' );
		grid.find( '.acb-tags' ).addClass( 'acb-tags-none' ).find( '.acb-tag:not(.acb-tag-tpl,.acb-tag-clear)' ).each( function() {
			$( this ).click();
		} );
	}

	// This function update the hash when filter is added or removed.
	function acb_hash( grid, tags ) {
		var hash = '';
		hash = hash + 'id=' + grid.attr( 'data-id' );
		tags.find( '.acb-tag:not(.acb-tag-tpl,.acb-tag-clear)' ).each( function() {
			var filter = $( this ).attr( 'data-filter' );
			if ( hash.indexOf( filter ) > 0 && ( filter != 's' ) && ( filter != 'author' ) && ( filter != 'price' ) && ( filter != 'date' ) && ( filter != 'sortby' ) ) {
				hash = hash.replace( filter + '=', filter + '=' + $( this ).attr( 'data-value' ) + '::' );
			} else {
				hash = hash + '&' + filter + '=' + $( this ).attr( 'data-value' );
			}
		} );
		window.location.hash = hash;
	}

	// Add a filter to the ajax grid.
	$( document ).on( 'click', '.acb-add-filter:not(.acb-checked)', function( event ) {
		event.preventDefault();
		acb_add_filter( $( this ).parents( '.acb' ), $( this ) );
	} );

	// Remove a filter.
	$( document ).on( 'click', '.acb-add-filter.acb-checked, .acb-tag:not(.acb-tag-tpl,.acb-tag-clear)', function( event ) {
		event.preventDefault();
		if ( $( this ).attr( 'data-add-only' ) ) {
			return false;
		}
		acb_remove_filter( $( this ).parents( '.acb' ), $( this ) );
	} );

	// Clear all filters.
	$( document ).on( 'click', '.acb-tag-clear', function( event ) {
		event.preventDefault();
		acb_remove_all_filters( $( this ).parents( '.acb' ) );
	} );

	// When default sort filter is clicked.
	$( document ).on( 'click', '.acb-filter-item-link[data-default=true]', function( event ) {
		event.preventDefault();
		var filter = $( this ).parents( '.acb-filter' ).attr( 'data-filter' );
		if ( $( this ).find( 'span.acb-check' ).length ) {
			return false;
		}
		$( this ).find( 'span' ).removeClass().addClass( 'acb-check' );
		$( this ).parents( '.acb' ).find( '.acb-tags' ).find( '.acb-tag[data-filter=' + filter + ']' ).click();
	} );

	// Expand and minimize filter toggle.
	$( document ).on( 'click', '.acb-expanded', function( event ) {
		$( this ).removeClass( 'acb-expanded' ).addClass( 'acb-minimized' );
		$( this ).parents( '.acb-filter' ).find( 'ul, .acb-filter-ul' ).hide();
	} );

	$( document ).on( 'click', '.acb-minimized', function( event ) {
		$( this ).removeClass( 'acb-minimized' ).addClass( 'acb-expanded' );
		$( this ).parents( '.acb-filter' ).find( 'ul, .acb-filter-ul' ).show();
	} );

	/***
	 * @Onload. Get data attributes and apply them.
	 **/

	// Get a parameter from URL.
	function acb_get_param( param ) {
		var sPageURL = window.location.hash.replace( '#', '' ),
			sURLVariables = sPageURL.split( '&' ),
			sParameterName,
			i;

		for ( i = 0; i < sURLVariables.length; i++ ) {
			sParameterName = sURLVariables[i].split( '=' );

			if ( sParameterName[0] === param ) {
				return sParameterName[1] === undefined ? true : decodeURIComponent( sParameterName[1] );
			}
		}
	}

	// Get active grid and data attributes from query.
	function acb_get_query() {
		var acb_id = acb_get_param( 'id' );
		var acb_call_ajax = false;
		if ( acb_id ) {
			var param = null;
			var filters = acb_params.filters;
			filters.push( 's' );
			filters.push( 'author' );
			filters.push( 'price' );
			filters.push( 'date' );
			filters.push( 'sortby' );
			$.each( filters, function( index, val ) {
				param = acb_get_param( val );
				if ( param ) {
					// We have multiple values for the same filter.
					if ( param.indexOf( '::' ) >= 0 ) {
						var values = param.split( '::' );
						$.each( values, function( index, filter ) {
							acb_add_filter( $( '.acb#acb-' + acb_id ), $( '.acb#acb-' + acb_id ).find( '.acb-add-filter[data-filter=' + val + '][data-value="' + filter + '"]' ), false );
							acb_call_ajax = true;
						} );
					} else {
						// Sortby param.
						if ( val == 'sortby' ) {
							$( '.acb#acb-' + acb_id ).find( '.acb-sorting-select select' ).val( param ).trigger( 'change' );
						// Search filter.
						} else if ( val == 's' ) {
							var input = $( '.acb#acb-' + acb_id ).find( '.acb-add-filter[data-filter=' + val + ']' );
							input.val( param );
							input.attr( 'data-value', encodeURIComponent( param ) );
							input.attr( 'data-label', acb_params.search + param );
							acb_add_filter( input.parents( '.acb' ), input, false );
							acb_call_ajax = true;
						// Price filter.
						} else if ( val == 'price' ) {
							var pricedata = $( '.acb#acb-' + acb_id ).find( '.acb-add-filter[data-filter=' + val + ']' );
							var pricearr = param.split( '-' );
							pricedata.parents( '.acb-filter' ).find( '#acb_price_min' ).val( pricearr[0] );
							pricedata.parents( '.acb-filter' ).find( '#acb_price_max' ).val( pricearr[1] );
							pricedata.attr( 'data-value', encodeURIComponent( param ) );
							pricedata.attr( 'data-label', pricedata.attr( 'data-currency' ) + pricearr[0] + '&nbsp;&ndash;&nbsp;' + pricearr[1] );
							acb_add_filter( pricedata.parents( '.acb' ), pricedata, false );
							acb_call_ajax = true;
						} else {
							acb_add_filter( $( '.acb#acb-' + acb_id ), $( '.acb#acb-' + acb_id ).find( '.acb-add-filter[data-filter=' + val + '][data-value="' + param + '"]' ), false );
							acb_call_ajax = true;
						}
					}
				}
			} );
			if ( acb_call_ajax ) {
				acb_ajax( $( '.acb#acb-' + acb_id ).find( '.acb-grid' ) );
			}
		}
	}

	// Triggered when sorting is changed.
	$( document ).on( 'change', '.acb-sorting-select select', function( event ) {
		var $this = $( this );
		$this.attr( 'data-value', encodeURIComponent( $this.val() ) );
		$this.attr( 'data-label', $this.find( ':selected' ).text() );
		acb_add_filter( $this.parents( '.acb' ), $this );
	} );

	// Trigger search.
	$( document ).on( 'keypress', '.acb-search input', function( event ) {
		if ( event.which == 13 ) {
			if ( $( this ).val() ) {
				$( this ).attr( 'data-value', encodeURIComponent( $( this ).val() ) );
				$( this ).attr( 'data-label', acb_params.search + $( this ).val() );
				acb_add_filter( $( this ).parents( '.acb' ), $( this ) );
				return false;
			} else {
				acb_remove_filter( $( this ).parents( '.acb' ), $( this ) );
			}
		}
	} );

	// If search is produced by a button.
	$( document ).on( 'click', '.acb-search button', function( event ) {
		var input = $( this ).parents( '.acb-search' ).find( 'input' );
		if ( input.val() ) {
			input.attr( 'data-value', encodeURIComponent( input.val() ) );
			input.attr( 'data-label', acb_params.search + input.val() );
			acb_add_filter( input.parents( '.acb' ), input );
			return false;
		} else {
			acb_remove_filter( input.parents( '.acb' ), input );
		}
	} );

	// Apply price filtering.
	$( document ).on( 'click', '.acb-filter-price button', function( event ) {
		var $from,
			$to,
			from = $( this ).parents( '.acb-filter-price' ).find( '#acb_price_min' ),
			to   = $( this ).parents( '.acb-filter-price' ).find( '#acb_price_max' );

		if ( parseInt( from.val() ) > 0 || parseInt( to.val() ) > 0 ) {
			$from = parseInt( from.val() ) > 0 ? parseInt( from.val() ) : '0';
			$to   = parseInt( to.val() ) > 0 ? parseInt( to.val() ) : '0';
			$( this ).attr( 'data-value', encodeURIComponent( $from + '-' + $to ) );
			$( this ).attr( 'data-label', $( this ).attr( 'data-currency' ) + $from + '&nbsp;&ndash;&nbsp;' + $to );
			acb_add_filter( $( this ).parents( '.acb' ), $( this ) );
			return false;
		}
	} );

	// Like an item.
	$( document ).on( 'click', '.acb-like:not(.acb-liked), .acb-like.acb-liked', function( event ) {
		event.preventDefault();
		var $this = $( this ),
			data = {
				action: 	'acb_like_item',
				security:	acb_params.like_nonce,
				post_id:    $this.attr( 'data-post_id' ),
				to_like:    $this.hasClass( 'acb-liked' ) ? 'unlike' : 'like',
			};

		$.post( acb_params.ajaxurl, data, function( response ) {
			if ( data.to_like == 'like' ) {
				$this.addClass( 'acb-liked acb-pulse' ).find( 'span' ).html( response );
				$this.parent().attr( 'data-tip', $this.parent().attr( 'data-unlike' ) );
				$( document.body ).trigger( 'acb-init-tooltips' );
				$this.parent().trigger( 'mouseenter' );
			} else {
				$this.removeClass( 'acb-liked acb-pulse' ).find( 'span' ).html( response );
				$this.parent().attr( 'data-tip', $this.parent().attr( 'data-like' ) );
				$( document.body ).trigger( 'acb-init-tooltips' );
				$this.parent().trigger( 'mouseenter' );
			}
		} );

	} );

	// Add item to cart.
	$( document ).on( 'click', '.add_to_cart_button', function( event ) {
		$( this ).hide();
	} );

	// Tooltips
	$( document.body ).on( 'acb-init-tooltips', function() {
		$( '.acb-tip' ).each( function() {
			var tip = $( this );
			tip.tipTip( {
				'defaultPosition': 'top',
				'edgeOffset' : 5,
				'attribute': 'data-tip',
				'fadeIn': 50,
				'fadeOut': 50,
				'delay': 200,
			} );
		} );
	} ).trigger( 'acb-init-tooltips' );

	// Handle the auto load of new posts.
	var grids = $( '.acb' );
	$( window ).scroll( function() {
		var windowpos = $( window ).scrollTop();
		grids.each( function() {
			var acb = $( this );
			var grid = acb.find( '.acb-grid' );

			// Stop triggering at this point. maybe loaded all items?
			if ( $.inArray( acb.attr( 'data-id' ), acb_autoload ) !== -1 ) {
				return false;
			}

			/*
			if ( $( window ).scrollTop() >= acb.offset().top + acb.outerHeight() - window.innerHeight ) {
			*/
			if ( $( window ).scrollTop() >= grid.offset().top + grid.outerHeight() - window.innerHeight ) {
				console.log( 'Initializing load more...' );
				// Load more.
				acb_autoload.push( acb.attr( 'data-id' ) );
				setTimeout( function() {
					grid.attr( 'data-offset', grid.find( '.acb-item' ).length );
					acb_ajax( grid, true ); // append new items. That's why we set true flag.
				}, 250 );
			}

		} );
	} );

} )( jQuery );