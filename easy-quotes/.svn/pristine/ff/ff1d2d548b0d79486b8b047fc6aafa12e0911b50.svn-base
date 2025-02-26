/**
 * Input a string with spaces and invalid characters
 * returns valid html classes with one space between every classname
 *
 * @param string value
 * @returns string
 */
export const sanitizeHtmlClasses = function ( value ) {
	if ( ! value ) return '';

	let classes = getClassesFromString( value );
	if ( ! classes ) return '';

	let result = [];
	classes.forEach( ( element ) => {
		let sanitized = sanitizeHtmlClass( element );
		if ( sanitized ) result.push( sanitized );
	} );
	return result.join( ' ' );
};

/**
 * Returns array of strings (classes) cutting out spaces
 * @param string value
 * @returns array
 */
const getClassesFromString = function ( value ) {
	const regexp = /\S+/g;
	let result = value.match( regexp );
	return result;
};

/**
 * Returns a Sanitized ClassName as string
 * @param string value
 * @returns string
 */
const sanitizeHtmlClass = function ( value ) {
	let sanitized = value.replace( /|%[a-fA-F0-9][a-fA-F0-9]|/g, '' );
	sanitized = sanitized.replace( /[^A-Za-z0-9_-]/g, '' );
	return sanitized;
};

/**
 * Creates style css for the fontfamily
 * @param {*} clientId
 * @param {*} fontFamilySlug
 * @param {*} url
 */
export const createStyleForFont = function ( clientId, fontFamily ) {
	// First check for Website-Editor or Post
	// Website-Editor runs in iframe "editor-canvas";
	var myDocument;
	const iframe = document.getElementsByName( 'editor-canvas' )[ 0 ];
	if ( iframe === undefined ) myDocument = document;
	else {
		myDocument = iframe.contentDocument;
	}

	// Now build the font style
	let font_slug = fontFamily.family_slug + '-' + fontFamily.variant.id;

	let styleId = 'easy-quotes-' + font_slug;
	let className = 'easy-quotes-' + clientId;

	let url =
		'https://fonts.gstatic.com/s/' +
		fontFamily.family_slug +
		'/' +
		fontFamily.version +
		'/' +
		fontFamily.variant.file;

	let oldFont = myDocument.head.querySelector( '.' + className );
	if ( oldFont ) {
		if ( oldFont.id === styleId ) {
			return;
		} else {
			oldFont.classList.remove( className );
			if ( oldFont.classList.length === 0 ) {
				myDocument.head.removeChild( oldFont );
			}
		}
	}

	let style = myDocument.getElementById( styleId );
	if ( style ) {
		style.classList.add( className );
		return;
	}

	style = myDocument.createElement( 'style' );
	style.id = styleId;
	style.classList.add( className );
	let selector = '.' + font_slug;
	style.innerHTML = `
		@font-face {
			font-family: ${ font_slug };
			src: url("${ url }");
		}
		${ selector } {
			font-family: ${ font_slug };
		}
	`;
	myDocument.head.appendChild( style );
};
