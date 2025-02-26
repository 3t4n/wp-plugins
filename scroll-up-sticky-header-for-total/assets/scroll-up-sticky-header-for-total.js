if ( 'function' !== typeof window.totalStickyHeaderScrollUp ) {
	window.totalStickyHeaderScrollUp = function( context ) {

		const getWinScrollTop = () => {
			const scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
			if ( scrollTop < 0 ) {
				scrollTop = 0; // return 0 if negative to prevent issues with elastic scrolling in Safari.
			}
			return scrollTop;
		};

		const getOffset = ( element ) => {
			var rect = element.getBoundingClientRect();
			return {
				top: rect.top + getWinScrollTop(),
				left: rect.left + getWinScrollTop(),
			};
		};

		const isVisible = ( element )=> {
			if ( ! element ) {
				return false;
			}
			return !!( element.offsetWidth || element.offsetHeight || element.getClientRects().length );
		};

		const stickyHeader = document.querySelector( '.wpex-sticky-header-holder > #site-header' );

		if ( ! stickyHeader ) {
			return;
		}

		let lastScrollTop = 0;
		const stickyHeaderHolder = document.querySelector( '.wpex-sticky-header-holder' );

		if ( ! stickyHeaderHolder ) {
			return;
		}

		const header = document.querySelector( '.wpex-sticky-header-holder #site-header' );

		if ( ! header ) {
			return;
		}

		// Get sticky header bottom.
		let stickyHeaderBottom = 0;
		if ( document.querySelector( '#overlay-header-wrap' ) ) {
			// For the overlay header we want it sticky right away.
			stickyHeaderBottom = getOffset( stickyHeaderHolder ).top;
		} else {
			stickyHeaderBottom = getOffset( stickyHeaderHolder ).top + stickyHeaderHolder.getBoundingClientRect().height;
		}

		const onScroll = () => {
			const winTop = getWinScrollTop();
			const isSticky = stickyHeaderHolder.classList.contains( 'is-sticky' );

			if ( isSticky
				&& ( winTop + window.innerHeight < document.documentElement.scrollHeight )
				&& ( winTop < lastScrollTop || ( winTop <= stickyHeaderBottom ) )
			) {
				stickyHeaderHolder.classList.add( 'sushft-show' );
				stickyHeaderHolder.classList.remove( 'sushft-hidden' );
			} else {
				stickyHeaderHolder.classList.remove( 'sushft-show' );
				stickyHeaderHolder.classList.add( 'sushft-hidden' );
			}

			lastScrollTop = winTop;
		};

		if ( isVisible( stickyHeaderHolder )  ) {
			window.addEventListener( 'scroll', onScroll, { passive: true } );
		}

	};
}

window.addEventListener( 'load', totalStickyHeaderScrollUp );