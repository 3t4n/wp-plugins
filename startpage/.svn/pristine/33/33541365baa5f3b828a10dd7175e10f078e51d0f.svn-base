const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, CheckboxControl, SelectControl } = wp.components;
const classNames = require( 'classnames' );

function get_search_form_attributes( attributes ) {
	const htmlAttributes = {
		form: {},
		input: {
			name: 'q',
			autocomplete: 'off',
			autofocus: attributes.autofocus || false,
		},
		button: {}
	};

	switch ( attributes.searchengine ) {
		default:
		case 'duckduckgo':
			htmlAttributes.form.action = 'https://duckduckgo.com/';
			htmlAttributes.input.placeholder = 'Duckduckgo...';
			break;
		case 'google':
			htmlAttributes.form.action = 'https://google.com/';
			htmlAttributes.input.placeholder = 'Google...';
			break;
		case 'wikipedia':
			htmlAttributes.form.action = 'https://de.wikipedia.org/wiki/Special:Search';
			htmlAttributes.input.placeholder = 'Wikipedia...';
			htmlAttributes.input.name = 'search';
			break;
		case 'yahoo':
			htmlAttributes.form.action = 'https://search.yahoo.com/';
			htmlAttributes.input.placeholder = 'Yahoo...';
			htmlAttributes.input.name = 'p';
			break;
		case 'bing':
			htmlAttributes.form.action = 'https://bing.com/';
			htmlAttributes.input.placeholder = 'Bing...';
			break;
		}

	return htmlAttributes;
}

function get_search_form( htmlAttributes, className ) {
	return (
		<form className={ classNames( className, 'search-form' ) } { ...htmlAttributes.form }>
			<input className="search-field" { ...htmlAttributes.input } />
			<button className="search-submit" { ...htmlAttributes.button }>{ __( 'Search', 'startpage' ) }</button>
		</form>
	);
}

registerBlockType( 'startpage/search-engine-form', {
	title: 'Search Engine Form',
	icon: 'search',
	category: 'layout',
	attributes: {
		searchengine: {
			type: 'string',
		},
		autofocus: {
			type: 'boolean',
			default: false,
		},
	},

	edit( { attributes, setAttributes, className } ) {
		const inspector = (
			<InspectorControls>
				<PanelBody>
					<SelectControl
						label={ __( 'Search Engine', 'startpage' ) }
						onChange={ searchengine => setAttributes( { searchengine } ) }
						value={ attributes.searchengine }
						options={ [
							{
								label: 'DuckDuckGo',
								value: 'duckduckgo',
							},
							{
								label: 'Google',
								value: 'google',
							},
							{
								label: 'Wikipedia',
								value: 'wikipedia',
							},
							{
								label: 'Bing',
								value: 'bing',
							},
							{
								label: 'Yahoo',
								value: 'yahoo',
							},
						] }
					/>
					<CheckboxControl
						label={ __( 'Autofocus', 'startpage' ) }
						checked={ attributes.autofocus }
						onChange={ autofocus => setAttributes( { autofocus } ) }
						/>
				</PanelBody>
			</InspectorControls>
		);

		const htmlAttributes = get_search_form_attributes( attributes );
		htmlAttributes.input.autofocus = false;
		htmlAttributes.button.disabled = true;

		return (
			<Fragment>
				{ inspector }
				{ get_search_form( htmlAttributes, className ) }
			</Fragment>
		);
	},

	save( { attributes, className }  ) {
		return get_search_form( get_search_form_attributes( attributes ), className );
	},
} );
