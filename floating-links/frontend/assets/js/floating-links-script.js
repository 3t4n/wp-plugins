var $ = jQuery;
$( document ).ready(
	function($){
		

		/**
		 * On click of the floating link, will scroll to top
		 */
		$( '.fl_top.fl_icon_holder' ).click(
			function(){
				$( 'html, body' ).animate( {scrollTop:0}, 'slow' );
			}
		);

		/**
		 * On click of the floating link, will scroll to bottom
		 */
		$( '.fl_bottom.fl_icon_holder' ).click(
			function(){
				$( "html, body" ).animate( { scrollTop: $( document ).height() }, "slow" );
			}
		);

		/**
		 * Display or hide the floating link
		 */
		$( '#fl_slimer_primary_wrap' ).click(
			function(e){
				e.preventDefault();
				$( '#fl_inner_primary_wrap' ).slideToggle( 'slow' );
				$( '.fl_primary_bar .fl_slimer_Wrap' ).toggleClass( 'fl-close' );
			}
		);
		$( '#fl_slimer_social_wrap' ).click(
			function(e){
				e.preventDefault();
				$( '#fl_social_icons_inner_wrap' ).slideToggle( 'slow' );
				$( '.fl_social_icons_bar .fl_slimer_Wrap' ).toggleClass( 'fl-close' );
			}
		);

		$( document ).on(
			"click",
			".fl_social_icons_bar .fl_icon_holder",
			function(e) {
				e.preventDefault();
				window.open( $( this ).attr( "href" ), "popupWindow", "width=600,height=600,scrollbars=yes" );
				return false;
			}
		);

		/*
		* Copy to Clipboard functions
		*/
		$.fn.CopyToClipboard = function() {
			var textToCopy = false;
			if (this.is( 'select' ) || this.is( 'textarea' ) || this.is( 'input' )) {
				textToCopy = this.val();
			} else {
				textToCopy = this.text();
			}
			CopyToClipboard( textToCopy );
		};

		function CopyToClipboard( val ){
			var hiddenClipboard = $( '#_hiddenClipboard_' );
			if ( ! hiddenClipboard.length) {
				$( 'body' ).append( '<textarea style="position:absolute;top: -9999px;" id="_hiddenClipboard_"></textarea>' );
				hiddenClipboard = $( '#_hiddenClipboard_' );
			}
			hiddenClipboard.html( val );
			hiddenClipboard.select();
			document.execCommand( 'copy' );
			document.getSelection().removeAllRanges();
		}

		$(
			function(){
				$( '[data-clipboard-target]' ).each(
					function(){
						$( this ).click(
							function() {
								$( $( this ).data( 'clipboard-target' ) ).CopyToClipboard();
							}
						);
					}
				);
				$( '[data-clipboard-text]' ).each(
					function(){
						$( this ).click(
							function(){
								CopyToClipboard( $( this ).data( 'clipboard-text' ) );
							}
						);
					}
				);
			}
		);

		$( '.fl_copy_url' ).click(
			function(){
				$( ".fl_copied" ).slideDown();
				setTimeout( function(){ $( ".fl_copied" ).slideUp(); }, 3000 );
			}
		);

	}
);
