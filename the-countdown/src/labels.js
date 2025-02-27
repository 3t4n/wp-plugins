/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

import { 
	Button, 
	TextControl, 
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

export default function Labels( { attributes, setAttributes } ) {

	const labels1 = ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'];
	const labels = ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'];

	const renderLabels1 = ( attKey, whichLabel ) => {
		
		const onChangeLabel = ( val, index ) => {
			
			const lbl = attributes[ attKey ].map( ( label, idx ) => {
				if ( index === idx ) {
					label = val;
				}
				return label;
			});

			setAttributes( { [attKey]: lbl } );
		}

		const flexText = ( label, index ) => {
			return (
				<FlexItem>
					<TextControl
						className="textLabel"
						label={ label }
						value={ attributes[ attKey ][ index ] }
						onChange={ (val) => onChangeLabel( val, index )  }
					/>
				</FlexItem>
			);
		};

		const renderFlexText = whichLabel.map( ( label, index ) => flexText( label, index ) );

		return(
			<Dropdown
				popoverProps={ { placement: 'bottom-start' } }
				renderToggle={ ( { isOpen, onToggle } ) => (
					<Button
						variant="tertiary"
						onClick={ onToggle }
						aria-expanded={ isOpen }
					>
						{ attributes[ attKey ].join(', ').substring( 0, 20 ) + '...' }
					</Button>
				) }
				renderContent={ () => {				
					return (
						<Flex direction="row" align="top" wrap={ true } className="box">
							{ renderFlexText }
						</Flex>
					)
				} }
			/>
		)
	}

	return (
		<Panel>
			<PanelRow>
				<label>Singular Label</label>
				{ renderLabels1( 'labels1', labels1 ) }
			</PanelRow>

			<PanelRow>
				<label>Plural Label</label>
				{ renderLabels1( 'labels', labels ) }
			</PanelRow>
		</Panel>
	);
}
