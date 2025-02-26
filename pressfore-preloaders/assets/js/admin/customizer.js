/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	//Update preloader preview
	wp.customize( 'pf_loaders[preview]', function( value ) {
		value.bind( function( newval ) {
			var $type = '';
			wp.customize( 'pf_loaders[type]', function( value ) {
				$type = value._value;
			});

			$html = preloader($type);
			$('.pf-gi-preloader-container').remove();
			$('body').append($html);
			setTimeout(function(){
				$('.pf-gi-preloader-container').fadeOut( 360, function() {
					$('.pf-gi-preloader-container').remove();
				});
			},2500);
		});
	} );

	// Update background color
	wp.customize( 'pf_loaders[bg]', function( value ) {
		value.bind( function( newval ) {
			$css = '.pf-gi-preloader-container {background-color: '+newval+'}';

			$style = '<style id="pf-preloader">' + $css + '</style>';
			if( $('head').find('#pf-preloader').length ) {
				$css = $('head').find('#pf-preloader').text() + $css;
				$('head').find('#pf-preloader').text($css);

				$('head').append($style);
			} else {
				$('head').append($style);
			}
		});
	} );

	// Update preloader parts
	wp.customize( 'pf_loaders[clr]', function( value ) {
		value.bind( function( newval ) {
			var $css = '.cssload-thecube .cssload-cube:before, \
					.cssload-loading-center, \
					.cssload-loading::after, \
					.cssload-loading::before, \
					.cssload-loading::after, \
					.cssload-loading::before,\
					.spinningSquaresG, \
					#cssload-loader ul li, \
				   .cssload-ball_1, \
				   .cssload-ball_2, \
				   .cssload-ball_3, \
				   .cssload-ball_4 { \
				   	background: ' + newval + ' \
				   } \
					\
					.fountainTextG { \
					    color: ' + newval + ' \
					} \
					\
				   .cssload-inner.cssload-one, \
				   .cssload-inner.cssload-two, \
				   .cssload-inner.cssload-three { \
				   	border-color: ' + newval + ' \
				   } \
					\
				   @keyframes bounce_spinningSquaresG{ \
				   	0%{ \
				   		transform:scale(1); \
				   		background-color: ' + newval + ' \
				   	} \
					\
				   	100%{ \
				   		transform:scale(.3) rotate(90deg); \
				   		background-color: ' + newval + ' \
				   	} \
				   } \
					\
				   @-webkit-keyframes bounce_spinningSquaresG{ \
				   	0%{ \
				   	-webkit-transform:scale(1); \
				   	background-color: ' + newval + ' \
				   } \
					\
				   	100%{ \
						-webkit-transform:scale(.3) rotate(90deg); \
						background-color: ' + newval + '\
				   	}; \
				  } \
				  \
				  @keyframes bounce_fountainTextG{ \
						0%{ \
							transform:scale(1); \
						color: ' + newval + ' \
					} \
					\
						100%{ \
							transform:scale(.5); \
						color: ' + newval + ' \
					} \
					} \
						\
						@-webkit-keyframes bounce_fountainTextG{ \
						0%{ \
						-webkit-transform:scale(1); \
						color: ' + newval + ' \
					} \
					\
						100%{ \
						-webkit-transform:scale(.5); \
						color: ' + newval + ' \
					} \
					} \
						\
					@-moz-keyframes bounce_fountainTextG{ \
						0%{ \
						  -moz-transform:scale(1); \
						  color: ' + newval + ' \
						} \
					\
						100%{ \
							-moz-transform:scale(.5); \
							color: ' + newval + ' \
						} \
					} \
			     } \
			';

			$style = '<style id="pf-preloader">' + $css + '</style>';

			if( $('head').find('#pf-preloader').length ) {
				$css = $('head').find('#pf-preloader').text() + $css;
				$('head').find('#pf-preloader').text($css);

				$('head').append($style);
			} else {
				$('head').append($style);
			}
		});
	} );

	function preloader(type) {
		$html = '<div class="pf-gi-preloader-container"><div class="pf-gi-load-container">';

		if ( type === 'default' ) {
			$html +='<ul class="cssload-flex-container"> \
						<li> \
						<span class="cssload-loading cssload-one"></span> \
						<span class="cssload-loading cssload-two"></span> \
						<span class="cssload-loading-center"></span> \
						</li> \
					</ul>';
		} else if ( type === 'cube' ) {
			$html += '<div class="cssload-thecube"> \
						<div class="cssload-cube cssload-c1"></div> \
						<div class="cssload-cube cssload-c2"></div> \
						<div class="cssload-cube cssload-c4"></div> \
						<div class="cssload-cube cssload-c3"></div> \
					</div>';
		} else if ( type === 'squares' ) {
			$html += '<div id="spinningSquaresG"> \
						<div id="spinningSquaresG_1" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_2" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_3" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_4" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_5" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_6" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_7" class="spinningSquaresG"></div> \
						<div id="spinningSquaresG_8" class="spinningSquaresG"></div> \
					 </div>';
		} else if ( type === 'equalizers' ) {
			$html += '<div id="cssload-loader"> \
						<ul> \
						<li></li> \
						<li></li> \
						<li></li> \
						<li></li> \
						<li></li> \
						<li></li> \
						</ul> \
					</div>';
		} else if ( type === 'loading' ) {
			$html += '<div id="fountainTextG"><div id="fountainTextG_1" class="fountainTextG">L</div><div id="fountainTextG_2" class="fountainTextG">o</div><div id="fountainTextG_3" class="fountainTextG">a</div><div id="fountainTextG_4" class="fountainTextG">d</div><div id="fountainTextG_5" class="fountainTextG">i</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">g</div></div>';
		}

		$html += '</div></div>';

		return $html;
	}

} )( jQuery );
