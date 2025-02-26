
/******************** ASK TAB  ********************/
const askWrapper = document.querySelectorAll( '.ask__wrapper' );

askWrapper.forEach( ( tab ) => {
	const allQuestion = tab.querySelector( '.ask__tab__questions' );
	const tabButton = tab.querySelectorAll( '.ask__tab__question' );
	const contents = tab.querySelectorAll( '.ask__tab__content' );

	if ( allQuestion !== null ) {
		allQuestion.onclick = ( e ) => {
			const id = e.target.dataset.id;
			if ( id ) {
				tabButton.forEach( ( question ) => {
					question.classList.remove( 'ask-active' );
				} );
				e.target.classList.add( 'ask-active' );

				contents.forEach( ( content ) => {
					content.classList.remove( 'ask-active' );
				} );
				const element = document.getElementById( id );
				element.classList.add( 'ask-active' );
			}
		};
	}

	/******************** QUESTION SEARCH  ********************/
	const input = tab.querySelector( '.tab-search-input' );

	if ( input !== null ) {
		input.addEventListener( 'input', function () {
			let searchKeyword, i, txtValue, displayed;
			const filter = input.value.toLowerCase();
			const container = tab.querySelector(
				'.mdc-tab-scroller__scroll-content'
			);
			let noQuestionText =
				container.querySelector( '.no-question-found' );
			const question = tab.getElementsByClassName( 'mdc-tab' );
			displayed = false;
			for ( i = 0; i < question.length; i++ ) {
				searchKeyword = question[ i ].getElementsByClassName(
					'mdc-tab__text-label'
				)[ 0 ];
				txtValue = searchKeyword.textContent || searchKeyword.innerText;
				if ( txtValue.toLowerCase().indexOf( filter ) > -1 ) {
					question[ i ].style.display = '';
					displayed = true;
				} else {
					question[ i ].style.display = 'none';
				}
			}
			if ( ! displayed ) {
				if ( ! noQuestionText ) {
					noQuestionText = document.createElement( 'p' );
					noQuestionText.textContent = 'No question found';
					noQuestionText.className = 'no-question-found';
					container.appendChild( noQuestionText );
				}
			} else if ( noQuestionText ) {
				container.removeChild( noQuestionText );
			}
		} );
		input.addEventListener( 'change', function () {
			const container = tab.querySelector(
				'.mdc-tab-scroller__scroll-content'
			);
			const noQuestionText =
				container.querySelector( '.no-question-found' );
			if ( input.value === '' && noQuestionText ) {
				container.removeChild( noQuestionText );
			}
		} );
	}
} );

/******************** AUDIO PLAYER  ********************/
const audioPlayers = document.querySelectorAll( '.audio-player' );
audioPlayers.forEach( ( player ) => {
	const playPauseBtn = player.querySelector( '.playpause-track' );
	const seekSlider = player.querySelector( '.seek_slider' );
	const volumeSlider = player.querySelector( '.volume_slider' );
	const currTime = player.querySelector( '.current-time' );
	const totalDuration = player.querySelector( '.total-duration' );
	const currTrack = player.querySelector( '.audio-play' );
	const loader = player.querySelector( '.loader' );

	let isPlaying = false;
	let updateTimer;

	loadTrack();

	function loadTrack() {
		clearInterval( updateTimer );
		reset();
		currTrack.load();
		updateTimer = setInterval( setUpdate, 1000 );
	}
	function reset() {
		currTime.textContent = '00:00';
		totalDuration.textContent = '00:00';
		seekSlider.value = 0;
	}
	function playTrack() {
		currTrack.play();
		isPlaying = true;
		playPauseBtn.innerHTML =
			'<svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"/></svg>';
		loader.classList.remove( 'animatedPlay' );
	}
	function pauseTrack() {
		currTrack.pause();
		isPlaying = false;
		playPauseBtn.innerHTML =
			'<svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>';
		loader.classList.add( 'animatedPlay' );
	}
	function playPauseTrack() {
		// eslint-disable-next-line no-unused-expressions
		isPlaying ? pauseTrack() : playTrack();
	}
	function seekTo() {
		const seek = currTrack.duration * ( seekSlider.value / 100 );
		currTrack.currentTime = seek;
	}
	function setVolume() {
		currTrack.volume = volumeSlider.value / 100;
	}
	playPauseBtn.addEventListener( 'click', playPauseTrack );
	seekSlider.addEventListener( 'click', seekTo );
	volumeSlider.addEventListener( 'change', setVolume );

	function setUpdate() {
		let seekPosition = 0;
		if ( ! isNaN( currTrack.duration ) ) {
			seekPosition = currTrack.currentTime * ( 100 / currTrack.duration );
			seekSlider.value = seekPosition;

			let currentMinutes = Math.floor( currTrack.currentTime / 60 );
			let currentSeconds = Math.floor(
				currTrack.currentTime - currentMinutes * 60
			);
			let durationMinutes = Math.floor( currTrack.duration / 60 );
			let durationSeconds = Math.floor(
				currTrack.duration - durationMinutes * 60
			);
			if ( currentSeconds < 10 ) {
				currentSeconds = '0' + currentSeconds;
			}
			if ( durationSeconds < 10 ) {
				durationSeconds = '0' + durationSeconds;
			}
			if ( currentMinutes < 10 ) {
				currentMinutes = '0' + currentMinutes;
			}
			if ( durationMinutes < 10 ) {
				durationMinutes = '0' + durationMinutes;
			}
			currTime.textContent = currentMinutes + ':' + currentSeconds;
			totalDuration.textContent = durationMinutes + ':' + durationSeconds;
		}
	}

	/******************** AUDIO VIDEO PAUSE  ********************/
	const audioVideoPlayer = document.querySelectorAll( 'video, audio' );
	const acc = document.querySelectorAll( '.ask-faq' );
	// Pause media when button is clicked
	function handleButtonClick() {
		audioVideoPlayer.forEach( function ( element ) {
			element.pause();
			isPlaying = false;
			playPauseBtn.innerHTML =
				'<svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>';
			loader.classList.add( 'animatedPlay' );
		} );
	}
	// Add event listeners to accordion
	acc.forEach( function ( singleAcc ) {
		singleAcc.addEventListener( 'click', handleButtonClick, false );
	} );
} );

/******************** ACCORDION  ********************/
const accordionWrapper = document.querySelectorAll( '.ask-accordion' );
accordionWrapper.forEach( ( accordion ) => {
	function createAccordions() {
		const acc = accordion.getElementsByClassName( 'ask__accordion' );
		if ( acc.length !== 0 ) {
			let i;
			for ( i = 0; i < acc.length; i++ ) {
				acc[ i ].addEventListener( 'click', function () {
					const current = this;
					for ( i = 0; i < acc.length; i++ ) {
						if (
							acc[ i ] !== current &&
							acc[ i ].classList.contains( 'ask__active' )
						) {
							acc[ i ].classList.remove( 'ask__active' );
							acc[ i ].nextElementSibling.style.maxHeight = null;
						}
					}
					current.classList.toggle( 'ask__active' );

					const panel = current.nextElementSibling;
					if ( panel.style.maxHeight ) {
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + 'px';
					}
				} );
			}
			window.addEventListener( 'load', function () {
				acc[ 0 ].click();
			} );
		}
	}
	createAccordions();
	/******************** SEARCH FUNCTIONALITY  ********************/
	const searchInput = accordion.querySelector( '.accordion-search-input' );

	if ( searchInput !== null ) {
		searchInput.addEventListener( 'input', function () {
			let searchKeyword, i, txtValue, displayed;
			const searchText = this.value.toLowerCase();
			const sections = accordion.getElementsByClassName(
				'ask__single__accordion'
			);
			const container = accordion.querySelector(
				'.ask__accordion__wrapper'
			);
			let noSectionText = container.querySelector( '.no-question-found' );
			displayed = false;
			for ( i = 0; i < sections.length; i++ ) {
				searchKeyword =
					sections[ i ].getElementsByClassName( 'title' )[ 0 ];
				txtValue = searchKeyword.textContent || searchKeyword.innerText;
				if ( txtValue.toLowerCase().indexOf( searchText ) > -1 ) {
					sections[ i ].style.display = '';
					displayed = true;
				} else {
					sections[ i ].style.display = 'none';
				}
			}
			if ( ! displayed ) {
				if ( ! noSectionText ) {
					noSectionText = document.createElement( 'p' );
					noSectionText.textContent = 'No question found';
					noSectionText.className = 'no-question-found';
					container.appendChild( noSectionText );
				}
			} else if ( noSectionText ) {
				container.removeChild( noSectionText );
			}
		} );
		searchInput.addEventListener( 'change', function () {
			const container = accordion.querySelector(
				'.ask__accordion__wrapper'
			);
			const noSectionText =
				container.querySelector( '.no-question-found' );
			if ( searchInput.value === '' && noSectionText ) {
				container.removeChild( noSectionText );
			}
		} );
	}
} );

//TODO: Refactoring...
document.addEventListener( 'DOMContentLoaded', function () {
	const ele = document.querySelectorAll( '.mdc-tab-bar' );
	if ( ! ele ) return;

	ele.forEach( ( tabElement, index ) => {
		const tabBar = new mdc.tabBar.MDCTabBar( tabElement );
		const tabWrap = document.querySelectorAll( '.tab-wrap' );
		const contentEls =
			tabWrap[ index ].querySelectorAll( '.brand-tab-screen' );
		contentEls[ 0 ].classList.add( 'brand-tab-screen--active' );
		tabBar.listen( 'MDCTabBar:activated', function ( event ) {
			// Hide currently-active content

			if ( tabWrap[ index ].querySelector( '.brand-tab-screen--active' ) )
				tabWrap[ index ]
					.querySelector( '.brand-tab-screen--active' )
					.classList.remove( 'brand-tab-screen--active' );
			// Show content for newly-activated tab
			contentEls[ event.detail.index ].classList.add(
				'brand-tab-screen--active'
			);
		} );
	} );
} );
