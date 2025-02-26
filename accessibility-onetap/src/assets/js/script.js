/* eslint no-undef: "off", no-alert: "off" */
( function( $ ) {
	'use strict';

	const accessibilityOnetapToggleClose = $( '.onetap-accessibility-plugin .onetap-close' );
	const accessibilityOnetapToggleOpen = $( '.onetap-accessibility-plugin .onetap-toggle' );
	const accessibilityOnetapAccessibility = $( '.onetap-accessibility-plugin .onetap-accessibility' );
	const accessibilityOnetapLanguageList = $( '.onetap-accessibility-plugin .onetap-list-of-languages' );
	const accessibilityOnetapToggleLanguages = $( '.onetap-accessibility-plugin .onetap-languages' );

	const accessibilityOnetapSkipElements = '.onetap-plugin-onetap, .onetap-plugin-onetap *, .onetap-toggle, .onetap-toggle *, #wpadminbar, #wpadminbar *, rs-fullwidth-wrap, rs-fullwidth-wrap *, rs-module-wrap, rs-module-wrap *, sr7-module, sr7-module *';

	// Open Accessibility.
	accessibilityOnetapToggleOpen.click( function( event ) {
		event.stopPropagation();
		accessibilityOnetapAccessibility.removeClass( 'onetap-toggle-close' ).addClass( 'onetap-toggle-open' );
		accessibilityOnetapToggleClose.show( 100 );
	} );

	// Close Accessibility.
	accessibilityOnetapToggleClose.click( function( event ) {
		event.stopPropagation();
		accessibilityOnetapAccessibility.removeClass( 'onetap-toggle-open' ).addClass( 'onetap-toggle-close' );
		accessibilityOnetapToggleClose.hide( 100 );
	} );

	// Prevent auto-close when clicking inside accessibility panel.
	accessibilityOnetapAccessibility.click( function( event ) {
		accessibilityOnetapLanguageList.fadeOut( 350 );
		accessibilityOnetapToggleLanguages.removeClass( 'onetap-active' );
		if ( ! $( event.target ).closest( '.onetap-reset-settings' ).length ) {
			event.stopPropagation();
		}
	} );

	// Toggle list of languages.
	accessibilityOnetapToggleLanguages.click( function( event ) {
		event.stopPropagation();
		$( this ).toggleClass( 'onetap-active' );
		accessibilityOnetapLanguageList.fadeToggle( 350 );
	} );

	// Auto-close elements when clicking outside
	$( document ).click( function( event ) {
		const isClickInsideAccessibility = $( event.target ).closest( '.onetap-accessibility' ).length > 0;
		const isClickInsideLanguages = $( event.target ).closest( '.onetap-languages, .onetap-list-of-languages' ).length > 0;

		// If clicking outside the accessibility panel, close accessibility
		if ( ! isClickInsideAccessibility ) {
			accessibilityOnetapAccessibility.removeClass( 'onetap-toggle-open' ).addClass( 'onetap-toggle-close' );
			accessibilityOnetapToggleClose.hide( 100 );
		}

		// If clicking outside the language list, close the language list
		if ( ! isClickInsideLanguages ) {
			accessibilityOnetapLanguageList.fadeOut( 350 );
			accessibilityOnetapToggleLanguages.removeClass( 'onetap-active' );
		}
	} );

	// Get the current date
	const accessibilityOnetapToday = new Date();

	// Extract the accessibilityOnetapYear, accessibilityOnetapMonth, and accessibilityOnetapDay
	const accessibilityOnetapYear = accessibilityOnetapToday.getFullYear(); // Get the full accessibilityOnetapYear (e.g., 2024)
	const accessibilityOnetapMonth = String( accessibilityOnetapToday.getMonth() + 1 ).padStart( 2, '0' ); // Get the accessibilityOnetapMonth (0-11) and add 1; pad with 0 if needed
	const accessibilityOnetapDay = String( accessibilityOnetapToday.getDate() ).padStart( 2, '0' ); // Get the accessibilityOnetapDay of the accessibilityOnetapMonth (1-31) and pad with 0 if needed

	// Create a formatted date string for the start date in the format YYYY-MM-DD
	const accessibilityOnetapStartDate = `${ accessibilityOnetapYear }-${ accessibilityOnetapMonth }-${ accessibilityOnetapDay }`;

	// Create a new date object for the end date by adding 2 days to the current date
	const accessibilityOnetapEndDateObject = new Date( accessibilityOnetapToday ); // Create a new Date object based on accessibilityOnetapToday
	accessibilityOnetapEndDateObject.setDate( accessibilityOnetapEndDateObject.getDate() + 2 ); // Add 2 days

	// Extract the year, month, and day for the end date
	const accessibilityOnetapEndYear = accessibilityOnetapEndDateObject.getFullYear();
	const accessibilityOnetapEndMonth = String( accessibilityOnetapEndDateObject.getMonth() + 1 ).padStart( 2, '0' );
	const accessibilityOnetapEndDay = String( accessibilityOnetapEndDateObject.getDate() ).padStart( 2, '0' );

	// Create a formatted date string for the end date
	const accessibilityOnetapEndDate = `${ accessibilityOnetapEndYear }-${ accessibilityOnetapEndMonth }-${ accessibilityOnetapEndDay }`;

	// console.log(accessibilityOnetapStartDate); // Output the start date
	// console.log(accessibilityOnetapEndDate);   // Output the end date

	// Default values for accessibilityOnetapLocalStorage
	const accessibilityOnetapDefault = {
		activeBorders: {
			biggerText: 0,
			cursor: 0,
			grayscale: 0,
			letterSpacing: 0,
		},
		biggerText: false,
		cursor: false,
		highlightAll: false,
		grayscale: false,
		readingLine: false,
		letterSpacing: false,
		highlightLinks: false,
		stopAnimations: false,
		readableFont: false,
		information: {
			updated: 'onetap-version-9',
			language: accessibilityOnetapAjaxObject.getSettings.language,
			developer: 'Yuky Hendiawan',
			startDate: accessibilityOnetapStartDate,
			endDate: accessibilityOnetapEndDate,
		},
	};

	// If 'accessibilityOnetapLocalStorage' does not exist in localStorage, create it
	const accessibilityOnetapLocalStorage = 'accessibility-onetap';
	if ( ! localStorage.getItem( accessibilityOnetapLocalStorage ) ) {
		localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( accessibilityOnetapDefault ) );
	} else {
		// Retrieve the existing data from localStorage
		const accessibilityData = JSON.parse( localStorage.getItem( accessibilityOnetapLocalStorage ) );

		// Check if 'information.updated' exists and whether its value is 'onetap-version-9'
		if ( typeof accessibilityData.information === 'undefined' ||
			typeof accessibilityData.information.updated === 'undefined' ||
			accessibilityData.information.updated !== 'onetap-version-9' ) {
			localStorage.removeItem( accessibilityOnetapLocalStorage );
			localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( accessibilityOnetapDefault ) );
		}
	}

	// Retrieves accessibility data from local storage.
	function accessibilityOnetapGetData() {
		const accessibilityData = JSON.parse( localStorage.getItem( accessibilityOnetapLocalStorage ) );
		return accessibilityData;
	}

	// Updates the country flag based on the selected language.
	updateLanguageFlag();
	function updateLanguageFlag() {
		// Remove the 'onetap-active' class from all country flag images
		$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img' ).removeClass( 'onetap-active' );

		// Add the 'onetap-active' class to the image with the alt attribute matching the selected language
		$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img[alt="' + accessibilityOnetapGetData().information.language + '"]' ).addClass( 'onetap-active' );
	}

	// Event handler for language selection
	$( 'nav.onetap-accessibility header.onetap-header-top .onetap-list-of-languages ul li' ).click( function() {
		const selectedLanguage = $( this ).attr( 'data-language' ); // Get the selected language from the data attribute
		const languageName = $( this ).text(); // Get the name of the selected language

		// Remove active class from the images
		$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img' ).removeClass( 'onetap-active' );

		// Add active class from the images
		$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img[alt="' + selectedLanguage + '"]' ).addClass( 'onetap-active' );

		// Remove active class from the language toggle
		$( accessibilityOnetapToggleLanguages ).removeClass( 'onetap-active' );

		// Update the displayed language name
		$( 'nav.onetap-accessibility header.onetap-header-top .onetap-languages .onetap-text span' ).text( languageName );

		// Update the header content based on the selected language
		accessibilityOnetapUpdateContentBasedOnLanguage( selectedLanguage );

		// Fade out the language settings panel
		$( '.onetap-accessibility-settings header.onetap-header-top .onetap-list-of-languages' ).fadeOut( 350 );

		const getDataAccessibilityDefault = accessibilityOnetapGetData();
		getDataAccessibilityDefault.information.language = selectedLanguage;
		localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( getDataAccessibilityDefault ) );
	} );

	// Function to update content based on the selected language
	accessibilityOnetapUpdateContentBasedOnLanguage( accessibilityOnetapGetData().information.language );
	function accessibilityOnetapUpdateContentBasedOnLanguage( language ) {
		// Define a list of valid languages
		const validLanguages = [ 'en', 'de', 'es', 'fr', 'it', 'pl', 'se', 'fi', 'pt', 'ro', 'si', 'sk', 'nl', 'dk', 'gr', 'cz', 'hu', 'lt', 'lv', 'ee', 'hr', 'ie', 'bg' ];

		// Check if the provided language is valid
		if ( validLanguages.includes( language ) ) {
			const languageData = accessibilityOnetapAjaxObject.languages[ language ];

			// Define an array of selectors and their corresponding data keys
			const updates = [
				{ selector: 'nav.onetap-accessibility header.onetap-header-top .onetap-languages .onetap-text span', text: languageData.header.language },
				{ selector: 'nav.onetap-accessibility header.onetap-header-top .onetap-site-container .onetap-site-info .onetap-title h2', text: languageData.header.title },
				{ selector: 'nav.onetap-accessibility header.onetap-header-top .onetap-site-container .onetap-site-info .onetap-desc p span', text: languageData.header.desc },
				{ selector: 'nav.onetap-accessibility header.onetap-header-top .onetap-site-container .onetap-site-info .onetap-desc p a', text: languageData.header.anchor },

				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-bigger-text .onetap-title h3', text: languageData.general.biggerText },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-cursor .onetap-title h3', text: languageData.general.cursor },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-readable-font .onetap-title h3', text: languageData.general.readableFont },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-letter-spacing .onetap-title h3', text: languageData.general.letterSpacing },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-highlight-all .onetap-title h3', text: languageData.general.highlightAll },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-stop-animations .onetap-title h3', text: languageData.general.stopAnimations },

				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-grayscale .onetap-title h3', text: languageData.colors.grayscale },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-reading-line .onetap-title h3', text: languageData.navigation.readingLine },
				{ selector: 'nav.onetap-accessibility .onetap-features .onetap-highlight-links .onetap-title h3', text: languageData.navigation.highlightLinks },

				{ selector: 'nav.onetap-accessibility .onetap-divider-separator .onetap-colors', text: languageData.divider.colors },
				{ selector: 'nav.onetap-accessibility .onetap-divider-separator .onetap-navigation', text: languageData.divider.navigation },

				{ selector: 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-reset-settings span', text: languageData.resetSettings },

				{ selector: 'nav.onetap-accessibility .onetap-footer-bottom .onetap-icon-list-text', text: languageData.footer.accessibilityStatement },
				{ selector: 'nav.onetap-accessibility footer.onetap-footer-bottom .onetap-divider-container .onetap-divider__text', text: languageData.footer.version },
			];

			// Update each element with the corresponding text
			updates.forEach( ( update ) => {
				$( update.selector ).text( update.text );
			} );
		}
	}

	// Updates the font-size of elements except for the excluded selectors
	function accessibilityOnetapUpdateHeadingFontSize( heading, excludedSelectors, fontSize, activeBorderValue ) {
		$( '*' ).not( excludedSelectors ).each( function() {
			// Get the current inline style of the element, or use an empty string if none exists
			let currentStyle = $( this ).attr( 'style' ) || '';

			if ( 0 === activeBorderValue ) {
				// Remove the font-size if activeBorderValue is 0
				currentStyle = currentStyle.replace( /font-size:\s*[^;]+;?/, '' );
			} else if ( [ 1, 2, 3 ].includes( activeBorderValue ) ) {
				// Check if 'font-size' is already defined in the style
				if ( /font-size:\s*[^;]+;?/.test( currentStyle ) ) {
					// If it exists, replace the existing font-size with the new value
					currentStyle = currentStyle.replace( /font-size:\s*[^;]+;?/, 'font-size: ' + fontSize );
				} else {
					// If font-size is not present, append it to the style attribute
					currentStyle += ' font-size: ' + fontSize;
				}
			}

			// Trim any extra spaces and ensure there's no trailing space
			currentStyle = currentStyle.trim();

			// Set the updated style attribute back to the element
			$( this ).attr( 'style', currentStyle );
		} );
	}

	// Updates the letter-spacing of elements except for the excluded selectors
	function accessibilityOnetapUpdateLetterSpacing( letter, excludedSelectors, letterSpacing, activeBorderValue ) {
		$( '*' ).not( excludedSelectors ).each( function() {
			// Get the current inline style of the element, or use an empty string if none exists
			let currentStyle = $( this ).attr( 'style' ) || '';

			if ( 0 === activeBorderValue ) {
				// Remove the letter-spacing if activeBorderValue is 0
				currentStyle = currentStyle.replace( /letter-spacing:\s*[^;]+;?/, '' );
			} else if ( [ 1, 2, 3 ].includes( activeBorderValue ) ) {
				// Check if 'letter-spacing' is already defined in the style
				if ( /letter-spacing:\s*[^;]+;?/.test( currentStyle ) ) {
					// If it exists, replace the existing letter-spacing with the new value
					currentStyle = currentStyle.replace( /letter-spacing:\s*[^;]+;?/, 'letter-spacing: ' + letterSpacing );
				} else {
					// If letter-spacing is not present, append it to the style attribute
					currentStyle += ' letter-spacing: ' + letterSpacing;
				}
			}

			// Trim any extra spaces and ensure there's no trailing space
			currentStyle = currentStyle.trim();

			// Set the updated style attribute back to the element
			$( this ).attr( 'style', currentStyle );
		} );
	}

	// This function adjusts the text size based on the 'biggerText'
	function accessibilityOnetapFeatureBiggerText( key, activeBorderValue ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'bigger-text' ] ) {
			return;
		}

		// Check if the key is 'fontSize'. If it is, the function will proceed with font size adjustments.
		if ( 'biggerText' === key ) {
			let fontSize = null;
			let fontSizeH1 = null;
			let fontSizeH2 = null;
			let fontSizeH3 = null;
			let fontSizeH4 = null;
			let fontSizeH5 = null;
			let fontSizeH6 = null;

			// Determine fontSize value based on activeBorderValue
			if ( 1 === activeBorderValue ) {
				fontSize = '19px !important;';
				fontSizeH1 = '48px !important;';
				fontSizeH2 = '43px !important;';
				fontSizeH3 = '31px !important;';
				fontSizeH4 = '24px !important;';
				fontSizeH5 = '19px !important;';
				fontSizeH6 = '19px !important;';
			} else if ( 2 === activeBorderValue ) {
				fontSize = '22px !important;';
				fontSizeH1 = '56px !important;';
				fontSizeH2 = '50px !important;';
				fontSizeH3 = '36px !important;';
				fontSizeH4 = '28px !important;';
				fontSizeH5 = '22px !important;';
				fontSizeH6 = '22px !important;';
			} else if ( 3 === activeBorderValue ) {
				fontSize = '25px !important;';
				fontSizeH1 = '64px !important;';
				fontSizeH2 = '57px !important;';
				fontSizeH3 = '41px !important;';
				fontSizeH4 = '32px !important;';
				fontSizeH5 = '25px !important;';
				fontSizeH6 = '25px !important;';
			} else {
				fontSize = null;
				fontSizeH1 = null;
				fontSizeH2 = null;
				fontSizeH3 = null;
				fontSizeH4 = null;
				fontSizeH5 = null;
				fontSizeH6 = null;
			}

			// General
			$( '*' ).not( 'h1, h2, h3, h4, h5, h6, ' + accessibilityOnetapSkipElements ).each( function() {
				// Get the current inline style of the element, or use an empty string if none exists
				let currentStyle = $( this ).attr( 'style' ) || '';

				if ( 0 === activeBorderValue ) {
					// Remove the font-size if activeBorderValue is 0
					currentStyle = currentStyle.replace( /font-size:\s*[^;]+;?/, '' );
				} else if ( 1 === activeBorderValue || 2 === activeBorderValue || 3 === activeBorderValue ) {
					// Check if 'font-size' is already defined in the style
					if ( /font-size:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing font-size with the new value
						currentStyle = currentStyle.replace( /font-size:\s*[^;]+;?/, 'font-size: ' + fontSize );
					} else {
						// If font-size is not present, append it to the style attribute
						currentStyle += ' font-size: ' + fontSize;
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle = currentStyle.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle );
			} );

			// Call the function for each heading type
			accessibilityOnetapUpdateHeadingFontSize( 'h1', 'h2, h3, h4, h5, h6, ' + accessibilityOnetapSkipElements, fontSizeH1, activeBorderValue );
			accessibilityOnetapUpdateHeadingFontSize( 'h2', 'h1, h3, h4, h5, h6, ' + accessibilityOnetapSkipElements, fontSizeH2, activeBorderValue );
			accessibilityOnetapUpdateHeadingFontSize( 'h3', 'h1, h2, h4, h5, h6, ' + accessibilityOnetapSkipElements, fontSizeH3, activeBorderValue );
			accessibilityOnetapUpdateHeadingFontSize( 'h4', 'h1, h2, h3, h5, h6, ' + accessibilityOnetapSkipElements, fontSizeH4, activeBorderValue );
			accessibilityOnetapUpdateHeadingFontSize( 'h5', 'h1, h2, h3, h4, h6, ' + accessibilityOnetapSkipElements, fontSizeH5, activeBorderValue );
			accessibilityOnetapUpdateHeadingFontSize( 'h6', 'h1, h2, h3, h4, h5, ' + accessibilityOnetapSkipElements, fontSizeH6, activeBorderValue );
		}
	}

	// This function modifies the cursor size by adding and removing classes
	function accessibilityOnetapFeatureCursor( key, activeBorderValue ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules.cursor ) {
			return;
		}

		// Check if the key is 'Cursor'. If it is, the function will proceed with font size adjustments.
		if ( 'cursor' === key ) {
			if ( 1 === activeBorderValue ) {
				// Add the class to the root <html> element
				$( 'html' ).addClass( 'onetap-cursor-feature1' );
				$( 'html' ).removeClass( 'onetap-cursor-feature2' );
				$( 'html' ).removeClass( 'onetap-cursor-feature3' );
			} else if ( 2 === activeBorderValue ) {
				// Add the class to the root <html> element
				$( 'html' ).removeClass( 'onetap-cursor-feature1' );
				$( 'html' ).addClass( 'onetap-cursor-feature2' );
				$( 'html' ).removeClass( 'onetap-cursor-feature3' );
			} else if ( 3 === activeBorderValue ) {
				// Add the class to the root <html> element
				$( 'html' ).removeClass( 'onetap-cursor-feature1' );
				$( 'html' ).removeClass( 'onetap-cursor-feature2' );
				$( 'html' ).addClass( 'onetap-cursor-feature3' );
			} else {
				// Add the class to the root <html> element
				$( 'html' ).removeClass( 'onetap-cursor-feature1' );
				$( 'html' ).removeClass( 'onetap-cursor-feature2' );
				$( 'html' ).removeClass( 'onetap-cursor-feature3' );
			}
		}
	}

	// This function adjusts the hide images based on the 'highlightAll'
	function accessibilityOnetapHighlightAll( key, accessibilityDataKey ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'highlight-all' ] ) {
			return;
		}

		// Check if the key is 'highlightAll'. If it is, the function will proceed with font size adjustments.
		if ( 'highlightAll' === key ) {
			// Update style for all elements except specific ones
			if ( ! accessibilityDataKey ) {
				$( 'body' ).removeClass( 'onetap-highlight-all' );
			} else if ( accessibilityDataKey ) {
				$( 'body' ).addClass( 'onetap-highlight-all' );
			}
		}
	}

	// This function adjusts the line height based on the 'grayscale'
	function accessibilityOnetapGrayscale( key, activeBorderValue ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules.grayscale ) {
			return;
		}

		// Check if the key is 'grayscale'. If it is, the function will proceed with font size adjustments.
		if ( 'grayscale' === key ) {
			let grayscale = null;

			// Determine grayscale value based on activeBorderValue
			if ( 1 === activeBorderValue ) {
				grayscale = 'grayscale(33%) !important;';
			} else if ( 2 === activeBorderValue ) {
				grayscale = 'grayscale(66%) !important;';
			} else if ( 3 === activeBorderValue ) {
				grayscale = 'grayscale(100%) !important;';
			} else {
				grayscale = null;
			}

			// Update style for all elements except specific ones
			$( 'html' ).not( accessibilityOnetapSkipElements ).each( function() {
				let currentStyle = $( this ).attr( 'style' ) || '';

				if ( 0 === activeBorderValue ) {
					// Remove the filter if activeBorderValue is 0
					currentStyle = currentStyle.replace( /filter:\s*[^;]+;?/, '' );
				} else if ( 1 === activeBorderValue || 2 === activeBorderValue || 3 === activeBorderValue ) {
					if ( /filter:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing filter with the new value
						currentStyle = currentStyle.replace( /filter:\s*[^;]+;?/, 'filter: ' + grayscale );
					} else {
						// If filter is not present, append it to the style attribute
						currentStyle += ' filter: ' + grayscale;
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle = currentStyle.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle );
			} );
		}
	}

	// This function adjusts the reading line based on the 'readingLine'
	function accessibilityOnetapReadingLine( key, accessibilityDataKey ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'reading-line' ] ) {
			return;
		}

		// Check if the key is 'readingLine'. If it is, the function will proceed with font size adjustments.
		if ( 'readingLine' === key ) {
			// Update style for all elements except specific ones
			if ( ! accessibilityDataKey ) {
				$( '.onetap-markup-reading-line' ).removeClass( 'onetap-active' );
			} else if ( accessibilityDataKey ) {
				$( '.onetap-markup-reading-line' ).addClass( 'onetap-active' );
				$( document ).mousemove( function( event ) {
					// Get the X and Y coordinates of the mouse
					const mouseY = event.pageY; // Vertical position

					// Apply the Y position to the 'top' style of the '.onetap-markup-reading-line' element
					$( '.onetap-markup-reading-line' ).css( 'top', mouseY + 'px' );
				} );
			}
		}
	}

	// This function adjusts the text size based on the 'letterSpacing'
	function accessibilityOnetapFeatureLetterSpacing( key, activeBorderValue ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'letter-spacing' ] ) {
			return;
		}

		// Check if the key is 'letterSpacing'. If it is, the function will proceed with font size adjustments.
		if ( 'letterSpacing' === key ) {
			let letterSpacing = null;

			// Determine letterSpacing value based on activeBorderValue
			if ( 1 === activeBorderValue ) {
				letterSpacing = '1px !important;';
			} else if ( 2 === activeBorderValue ) {
				letterSpacing = '3px !important;';
			} else if ( 3 === activeBorderValue ) {
				letterSpacing = '5px !important;';
			} else {
				letterSpacing = null;
			}

			// General
			$( '*' ).not( accessibilityOnetapSkipElements ).each( function() {
				// Get the current inline style of the element, or use an empty string if none exists
				let currentStyle = $( this ).attr( 'style' ) || '';

				if ( 0 === activeBorderValue ) {
					// Remove the letter-spacing if activeBorderValue is 0
					currentStyle = currentStyle.replace( /letter-spacing:\s*[^;]+;?/, '' );
				} else if ( 1 === activeBorderValue || 2 === activeBorderValue || 3 === activeBorderValue ) {
					// Check if 'letter-spacing' is already defined in the style
					if ( /letter-spacing:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing letter-spacing with the new value
						currentStyle = currentStyle.replace( /letter-spacing:\s*[^;]+;?/, 'letter-spacing: ' + letterSpacing );
					} else {
						// If letter-spacing is not present, append it to the style attribute
						currentStyle += ' letter-spacing: ' + letterSpacing;
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle = currentStyle.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle );
			} );

			// Call the function for each heading type
			accessibilityOnetapUpdateLetterSpacing( null, accessibilityOnetapSkipElements, letterSpacing, activeBorderValue );
		}
	}

	// This function adjusts the highligh links based on the 'highlightLinks'
	function accessibilityOnetapHighlightLinks( key, accessibilityDataKey ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'highlight-links' ] ) {
			return;
		}

		// Check if the key is 'highlightLinks'. If it is, the function will proceed with font size adjustments.
		if ( 'highlightLinks' === key ) {
			// Update style for all elements except specific ones
			$( 'a' ).not( accessibilityOnetapSkipElements ).each( function() {
				let currentStyle = $( this ).attr( 'style' ) || '';

				if ( ! accessibilityDataKey ) {
					// Remove the background and color if accessibilityDataKey is 0
					currentStyle = currentStyle.replace( /background:\s*[^;]+;?/, '' );
					currentStyle = currentStyle.replace( /color:\s*[^;]+;?/, '' );
				} else if ( accessibilityDataKey ) {
					// Handle background
					if ( /background:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing background with the new value
						currentStyle = currentStyle.replace( /background:\s*[^;]+;?/, 'background: #000 !important;' );
					} else {
						// If background is not present, append it to the style attribute
						currentStyle += ' background: #000 !important;';
					}

					// Handle color
					if ( /color:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing color with the new value
						currentStyle = currentStyle.replace( /color:\s*[^;]+;?/, 'color: #f7ff00 !important;' );
					} else {
						// If color is not present, append it to the style attribute
						currentStyle += ' color: #f7ff00 !important;';
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle = currentStyle.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle );
			} );
		}
	}

	// This function adjusts the hide images based on the 'stopAnimations'
	function accessibilityOnetapStopAnimations( key, accessibilityDataKey ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'stop-animations' ] ) {
			return;
		}

		// Check if the key is 'stopAnimations'. If it is, the function will proceed with font size adjustments.
		if ( 'stopAnimations' === key ) {
			// Update style for all elements except specific ones
			$( '*' ).not( accessibilityOnetapSkipElements ).each( function() {
				// Transition.
				let currentStyle1 = $( this ).attr( 'style' ) || '';
				if ( ! accessibilityDataKey ) {
					// Remove the background and color if accessibilityDataKey is 0
					currentStyle1 = currentStyle1.replace( /transition:\s*[^;]+;?/, '' );
				} else if ( accessibilityDataKey ) {
					if ( /transition:\s*[^;]+;?/.test( currentStyle1 ) ) {
						// If it exists, replace the existing transition with the new value
						currentStyle1 = currentStyle1.replace( /transition:\s*[^;]+;?/, 'transition: none !important;' );
					} else {
						// If transition is not present, append it to the style attribute
						currentStyle1 += ' transition: none !important;';
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle1 = currentStyle1.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle1 );

				// Animations.
				let currentStyle2 = $( this ).attr( 'style' ) || '';
				if ( ! accessibilityDataKey ) {
					// Remove the background and color if accessibilityDataKey is 0
					currentStyle2 = currentStyle2.replace( /animation:\s*[^;]+;?/, '' );
				} else if ( accessibilityDataKey ) {
					if ( /animation:\s*[^;]+;?/.test( currentStyle2 ) ) {
						// If it exists, replace the existing animation with the new value
						currentStyle2 = currentStyle2.replace( /animation:\s*[^;]+;?/, 'animation: none !important;' );
					} else {
						// If animation is not present, append it to the style attribute
						currentStyle2 += ' animation: none !important;';
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle2 = currentStyle2.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle2 );
			} );
		}
	}

	// This function adjusts the hide images based on the 'readableFont'
	function accessibilityOnetapReadableFont( key, accessibilityDataKey ) {
		// if value off, return.
		if ( 'off' === accessibilityOnetapAjaxObject.showModules[ 'readable-font' ] ) {
			return;
		}

		// Check if the key is 'readableFont'. If it is, the function will proceed with font size adjustments.
		if ( 'readableFont' === key ) {
			// Update style for all elements except specific ones
			$( '*' ).not( accessibilityOnetapSkipElements ).each( function() {
				let currentStyle = $( this ).attr( 'style' ) || '';
				if ( accessibilityDataKey ) {
					if ( /font-family:\s*[^;]+;?/.test( currentStyle ) ) {
						// If it exists, replace the existing font-family with the new value
						currentStyle = currentStyle.replace( /font-family:\s*[^;]+;?/, 'font-family: Roboto, sans-serif !important;' );
					} else {
						// If font-family is not present, append it to the style attribute
						currentStyle += ' font-family: Roboto, sans-serif !important;';
					}
				}

				// Trim any extra spaces and ensure there's no trailing space
				currentStyle = currentStyle.trim();

				// Set the updated style attribute back to the element
				$( this ).attr( 'style', currentStyle );
			} );
		}
	}

	// List of accessibilityOnetapGetTlements and their keys
	const accessibilityOnetapGetTlements = [
		{ selector: '.onetap-bigger-text', key: 'biggerText' },
		{ selector: '.onetap-cursor', key: 'cursor' },
		{ selector: '.onetap-grayscale', key: 'grayscale' },
		{ selector: '.onetap-readable-font', key: 'readableFont' },
		{ selector: '.onetap-reading-line', key: 'readingLine' },
		{ selector: '.onetap-highlight-links', key: 'highlightLinks' },
		{ selector: '.onetap-letter-spacing', key: 'letterSpacing' },
		{ selector: '.onetap-highlight-all', key: 'highlightAll' },
		{ selector: '.onetap-stop-animations', key: 'stopAnimations' },
	];

	// Utility function to update class based on current value
	function accessibilityOnetapToggleLevelClass( $element, currentValue ) {
		const levels = [ 'onetap-lv1', 'onetap-lv2', 'onetap-lv3' ];
		$element.removeClass( levels.join( ' ' ) );

		if ( currentValue >= 1 && currentValue <= 3 ) {
			$element.addClass( levels[ currentValue - 1 ] );
		}
	}

	// Toggles the 'onetap-active' class on the provided element
	function toggleActiveClass( $element ) {
		$element.toggleClass( 'onetap-active ' );
	}

	// Utility function to handle click events
	let activeStagedValue = 0;
	function accessibilityOnetapHandleClick( $element, key, accessibilityData, useActiveBorder ) {
		$element.on( 'click', function() {
			accessibilityData = accessibilityOnetapGetData();
			if ( useActiveBorder ) {
				activeStagedValue = accessibilityData.activeBorders[ key ] = ( accessibilityData.activeBorders[ key ] + 1 ) % 4;
				accessibilityData[ key ] = activeStagedValue !== 0;

				accessibilityOnetapToggleLevelClass( $element, activeStagedValue );
				accessibilityOnetapFeatureBiggerText( key, activeStagedValue );
				accessibilityOnetapFeatureCursor( key, activeStagedValue );
				accessibilityOnetapGrayscale( key, activeStagedValue );
				accessibilityOnetapFeatureLetterSpacing( key, activeStagedValue );
			} else {
				accessibilityData[ key ] = ! accessibilityData[ key ];
				toggleActiveClass( $element, accessibilityData[ key ] );
				accessibilityOnetapHighlightAll( key, accessibilityData[ key ] );
				accessibilityOnetapReadingLine( key, accessibilityData[ key ] );
				accessibilityOnetapHighlightLinks( key, accessibilityData[ key ] );
				accessibilityOnetapStopAnimations( key, accessibilityData[ key ] );
				accessibilityOnetapReadableFont( key, accessibilityData[ key ] );
			}

			localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( accessibilityData ) );
		} );
	}

	// Initialize functionality for multiple accessibilityOnetapGetTlements
	function accessibilityOnetapInitAccessibilityHandlers( accessibilityData ) {
		accessibilityOnetapGetTlements.forEach( ( { selector, key } ) => {
			const $element = $( `nav.onetap-accessibility.onetap-plugin-onetap .onetap-accessibility-settings ${ selector }` );
			if ( $element.length ) {
				// Use activeBorder for some keys, otherwise, just toggle true/false
				const useActiveBorder = ! [
					'highlightAll',
					'readingLine',
					'highlightLinks',
					'stopAnimations',
					'readableFont',
				].includes( key );

				accessibilityOnetapHandleClick( $element, key, accessibilityData, useActiveBorder );
			}
		} );
	}

	// Handles the application of accessibility features on elements based on user settings
	function handleAccessibilityFeatures() {
		accessibilityOnetapGetTlements.forEach( ( { selector, key } ) => {
			const $element = $( `nav.onetap-accessibility.onetap-plugin-onetap .onetap-accessibility-settings ${ selector }` );
			if ( $element.length && accessibilityOnetapGetData()[ key ] !== undefined ) {
				const useActiveBorder = ! [
					'highlightAll',
					'readingLine',
					'highlightLinks',
					'stopAnimations',
					'readableFont',
				].includes( key );

				if ( useActiveBorder ) {
					if ( accessibilityOnetapGetData().activeBorders[ key ] !== undefined ) {
						accessibilityOnetapToggleLevelClass( $element, accessibilityOnetapGetData().activeBorders[ key ] );
						if ( 0 !== accessibilityOnetapGetData().activeBorders[ key ] ) {
							accessibilityOnetapFeatureBiggerText( key, accessibilityOnetapGetData().activeBorders[ key ] );
							accessibilityOnetapFeatureCursor( key, accessibilityOnetapGetData().activeBorders[ key ] );
							accessibilityOnetapGrayscale( key, accessibilityOnetapGetData().activeBorders[ key ] );
							accessibilityOnetapFeatureLetterSpacing( key, accessibilityOnetapGetData().activeBorders[ key ] );
						}
					}
				} else if ( accessibilityOnetapGetData()[ key ] !== undefined ) {
					if ( accessibilityOnetapGetData()[ key ] !== undefined && accessibilityOnetapGetData()[ key ] ) {
						toggleActiveClass( $element, accessibilityOnetapGetData()[ key ] );
						accessibilityOnetapHighlightAll( key, accessibilityOnetapGetData()[ key ] );
						accessibilityOnetapReadingLine( key, accessibilityOnetapGetData()[ key ] );
						accessibilityOnetapHighlightLinks( key, accessibilityOnetapGetData()[ key ] );
						accessibilityOnetapStopAnimations( key, accessibilityOnetapGetData()[ key ] );
						accessibilityOnetapReadableFont( key, accessibilityOnetapGetData()[ key ] );
					}
				}
			}
		} );

		// Initialize handlers
		accessibilityOnetapInitAccessibilityHandlers( accessibilityOnetapGetData() );
	}
	handleAccessibilityFeatures();

	// Reset settings
	$( document ).on( 'click', 'nav.onetap-accessibility.onetap-plugin-onetap .onetap-reset-settings span', function( event ) {
		event.stopPropagation(); // Ensure this doesn't trigger auto-close

		// Select all elements with the class .onetap-box-feature
		$( 'nav.onetap-accessibility.onetap-plugin-onetap .onetap-box-feature' ).each( function() {
			// Remove specified classes
			$( this ).removeClass( 'onetap-lv1 onetap-lv2 onetap-lv3 onetap-active' );
		} );

		// Check if the localStorage item exists
		if ( localStorage.getItem( accessibilityOnetapLocalStorage ) ) {
			// Parse the existing localStorage item
			const currentSettings = JSON.parse( localStorage.getItem( accessibilityOnetapLocalStorage ) );

			// Check if any of the specified values are true
			const hasActiveSettings = currentSettings.biggerText ||
				currentSettings.cursor ||
				currentSettings.highlightAll ||
				currentSettings.grayscale ||
				currentSettings.readingLine ||
				currentSettings.letterSpacing ||
				currentSettings.highlightLinks ||
				currentSettings.stopAnimations ||
				currentSettings.readableFont ||
				currentSettings.information.language;

			if ( hasActiveSettings ) {
				// Remove the 'onetap-active' class from all country flag images
				$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img' ).removeClass( 'onetap-active' );

				// Add the 'onetap-active' class to the image with the alt attribute matching the selected language
				$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img[alt="en"]' ).addClass( 'onetap-active' );

				// Remove the 'onetap-active' class from all country flag images
				$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img' ).removeClass( 'onetap-active' );

				// Add the 'onetap-active' class to the image with the alt attribute matching the selected language
				$( 'nav.onetap-accessibility .onetap-accessibility-settings .onetap-languages .onetap-icon img[alt="' + accessibilityOnetapAjaxObject.getSettings.language + '"]' ).addClass( 'onetap-active' );

				// Reset language
				accessibilityOnetapUpdateContentBasedOnLanguage( accessibilityOnetapAjaxObject.getSettings.language );

				// Remove localStorage item if any value is true
				localStorage.removeItem( accessibilityOnetapLocalStorage );

				// Create a new localStorage item with default values
				localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( accessibilityOnetapDefault ) );

				// Remove style inline
				$( '*' ).not( accessibilityOnetapSkipElements ).each( function() {
					let currentStyle = $( this ).attr( 'style' ) || '';

					// ============= General =============

					// Reset (Bigger Text)
					currentStyle = currentStyle.replace( /font-size:\s*[^;]+;?/, '' );

					// Reset (Line Height)
					currentStyle = currentStyle.replace( /line-height:\s*[^;]+;?/, '' );

					// Reset (Hide Images)
					currentStyle = currentStyle.replace( /background-size:\s*[^;]+;?/, '' );
					currentStyle = currentStyle.replace( /visibility:\s*[^;]+;?/, '' );

					// Reset (Letter Spacing)
					currentStyle = currentStyle.replace( /letter-spacing:\s*[^;]+;?/, '' );

					// Reset (Stop Animations)
					currentStyle = currentStyle.replace( /transition:\s*[^;]+;?/, '' );
					currentStyle = currentStyle.replace( /animation:\s*[^;]+;?/, '' );

					// Reset (Readable Font & Dyslexic Font)
					currentStyle = currentStyle.replace( /font-family:\s*[^;]+;?/, '' );

					// Trim any extra spaces and ensure there's no trailing space
					currentStyle = currentStyle.trim();

					// Set the updated style attribute back to the element
					$( this ).attr( 'style', currentStyle );
				} );

				// Remove style inline
				$( 'a' ).not( accessibilityOnetapSkipElements ).each( function() {
					let currentStyle = $( this ).attr( 'style' ) || '';

					// ============= Navigation =============

					// Reset (Highlight Links)
					currentStyle = currentStyle.replace( /background:\s*[^;]+;?/, '' );
					currentStyle = currentStyle.replace( /color:\s*[^;]+;?/, '' );

					// Trim any extra spaces and ensure there's no trailing space
					currentStyle = currentStyle.trim();

					// Set the updated style attribute back to the element
					$( this ).attr( 'style', currentStyle );
				} );

				// Remove style inline
				$( 'img' ).not( accessibilityOnetapSkipElements ).each( function() {
					let currentStyle = $( this ).attr( 'style' ) || '';

					// ============= General =============

					// Reset (Hide Images)
					currentStyle = currentStyle.replace( /visibility:\s*[^;]+;?/, '' );

					// Trim any extra spaces and ensure there's no trailing space
					currentStyle = currentStyle.trim();

					// Set the updated style attribute back to the element
					$( this ).attr( 'style', currentStyle );
				} );

				// ============= General =============

				// Reset (Cursor)
				$( 'html' ).removeClass( 'onetap-cursor-feature1' );
				$( 'html' ).removeClass( 'onetap-cursor-feature2' );
				$( 'html' ).removeClass( 'onetap-cursor-feature3' );

				// Reset (Highlight all)
				$( 'body' ).removeClass( 'onetap-highlight-all' );

				// ============= Colors =============

				$( 'html, img' ).not( accessibilityOnetapSkipElements ).each( function() {
					let currentStyle = $( this ).attr( 'style' ) || '';

					// Remove the filter if activeBorderValue is 0
					currentStyle = currentStyle.replace( /filter:\s*[^;]+;?/, '' );

					// Trim any extra spaces and ensure there's no trailing space
					currentStyle = currentStyle.trim();

					// Set the updated style attribute back to the element
					$( this ).attr( 'style', currentStyle );
				} );

				// ============= Navigation =============

				// Reset (Reading line)
				$( '.onetap-markup-reading-line' ).removeClass( 'onetap-active' );

				// Reset (Reading mask)
				$( '.onetap-markup-reading-mask' ).removeClass( 'onetap-active' );
			}
		} else {
			// Create localStorage item if it does not exist
			localStorage.setItem( accessibilityOnetapLocalStorage, JSON.stringify( accessibilityOnetapDefault ) );
		}
	} );
}( jQuery ) );
