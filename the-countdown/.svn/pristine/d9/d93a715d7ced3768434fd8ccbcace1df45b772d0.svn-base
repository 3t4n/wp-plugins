/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

import { 
	Button, 
	CheckboxControl, 
	Panel, 
	PanelBody, 
	Label, 
	PanelRow, 
	Dropdown,  	
	Flex, 
	FlexItem,
} from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

export default function Format( { attributes, setAttributes } ) {

	const optionsObj = {
		years: __( 'Years', 'the-countdown' ),
		months: __( 'Months', 'the-countdown' ),
		weeks: __( 'Weeks', 'the-countdown' ),
		days: __( 'Days', 'the-countdown' ),
		hours: __( 'Hours', 'the-countdown' ),
		minutes: __( 'Minutes', 'the-countdown' ),
		seconds: __( 'Seconds', 'the-countdown' ),
	};	
	
	const onChangeOption = ( val ) => {
		
		const format = attributes.format.slice(0);
		let pos = format.indexOf( val );
		
		pos > -1 ? format.splice( pos, 1 ) : format.push( val );

		setAttributes( { format } );
	}

	const renderOptions = Object.keys( optionsObj ).map( key => {
		return (
			<FlexItem>
				<CheckboxControl
					label={ optionsObj[ key ] }
					checked={ attributes.format.indexOf( key ) > -1 ? true : false }
					onChange={ val => onChangeOption( key ) }
				/>
			</FlexItem>
		);
	});
	
	const displayText = attributes.format.map( k => optionsObj[ k ] ).join(', ').substring( 0, 20 ) + '...';

	return (
		<Panel>
			<PanelRow>
				<label>{ __('Format', 'the-countdown-pro') }</label>
				<Dropdown
					headerTitle="Format"
					popoverProps={ { placement: 'bottom-start' } }
					renderToggle={ ( { isOpen, onToggle } ) => (
						<Button
							variant="tertiary"
							onClick={ onToggle }
							aria-expanded={ isOpen }
						>
							{ displayText }
						</Button>
					) }
					renderContent={ () => {
						return (
							<Flex direction="row" align="top" wrap={ true } className="box">
								{ renderOptions }
							</Flex>
						)
					} }
				/>
			</PanelRow>
		</Panel>
	);
}
