( function( $, api ) {


	/* === Radio Image Control === */

	api.controlConstructor['radio-image'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( 'input:radio', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);

			$(control.selector).find('input').each(function(){
				var $this = $(this);
				var $value = $this.val();
				$html = preloader($value);

				$this.parent().append($html);
			});
		}
	} );

	api.controlConstructor['button'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( '.pf-preloaders-preview', control.container ).on('click', function() {
				control.setting.set('');
				if ( ! $( this).hasClass('active') ) {
					$( this).addClass('active');
					control.setting.set('clicked');
				} else {
					$( this).removeClass('active');
					control.setting.set('click');
				}
			});

			$(control.selector).find('input').each(function(){
				var $this = $(this);
				var $value = $this.val();
				$html = preloader($value);

				$this.parent().append($html);
			});
		}
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

} )( jQuery, wp.customize );

( function( $ ) {
	//Update site title color in real time...



} )( jQuery );

