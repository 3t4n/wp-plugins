/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

import { 
	TextControl, 
	Panel,  
	SelectControl, 
} from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

export default function OnExpiry( { attributes, setAttributes } ) {

	const {
		onExpiry,
		expiryText,
		expiryURL
	} = { ...attributes };
	
	const actionHelp = __('This action always be executed after the countdown has expired','the-countdown');
	
	const renderInput = () => {
		switch ( attributes.onExpiry ) {
			case "show_message":
				return (
					<TextControl
						value={ expiryText }
						placeholder="Insert text to display"
						help={ actionHelp }
						onChange={ value => setAttributes( { expiryText: value } ) }
					/>
				);
				
			case "js_callback":
				return (
					<TextControl
						value={ expiryText }
						placeholder="Example: myFunction()"
						help={ actionHelp }
						onChange={ value => setAttributes( { expiryText: value } ) }
					/>
				);

			case "redirect_url":
				return (
					<TextControl						
						value={ expiryURL }
						placeholder="Example: http://www.example.com/index.html"
						type="url"
						help={ actionHelp }
						onChange={ value => setAttributes( { expiryURL: value } ) }
					/>
				);
		}
	};
	
	return (
		<Panel className="on-expiry-panel">	
			<SelectControl
				label="On Expiry Action"
				value={ onExpiry }
				options={ [
					{ value: 'none', label: 'Do nothing' },
					{ value: 'show_message', label: 'Show Text' },
					{ value: 'redirect_url', label: 'Redirect to URL' },
					{ value: 'js_callback', label: 'Run JavaScript function' },
				] }
				onChange={ value => setAttributes( { onExpiry: value } ) }
				className="narrow-margin-bottom"
			/>
			
			{ renderInput() }
		</Panel>
	);
}
