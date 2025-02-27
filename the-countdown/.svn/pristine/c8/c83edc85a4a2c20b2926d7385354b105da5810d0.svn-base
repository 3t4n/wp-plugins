/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __, _x } from '@wordpress/i18n';

import { 
	PanelBody,
	Flex,
	FlexBlock,
} from '@wordpress/components';

import { PanelColorSettings } from '@wordpress/block-editor';

import Size from '../styles/size.js';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function flipTemplate( { attributes, setAttributes, clientId } ) {
	const {
		digitColor,
		digitBgColor,
		labelColor,
		labelBgColor,
	} = attributes.styles;

	
	const updateStyle = ( key, value ) => {
		const styles = Object.assign( {}, attributes.styles );
		styles[ key ] = value;
		setAttributes( { styles } );
	}

	return (
		<>
			<PanelBody>	
				<Flex>
					<FlexBlock>
						{ Size( 'width', __( 'Width' ), attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'height', __( 'Height' ), attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'gap', __( 'Gap' ), attributes, setAttributes ) }
					</FlexBlock>
				</Flex>

				<Flex>
					<FlexBlock>
						{ Size( 'digitSize', __( 'Digit Size' ), attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'labelSize', __( 'Label Size' ), attributes, setAttributes ) }
					</FlexBlock>
				</Flex>

				<Flex>
					<FlexBlock>
						{ Size( 'digitPadV', 'Digit Padding', attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'digitPadH', 'Digit Padding', attributes, setAttributes ) }
					</FlexBlock>
				</Flex>

				<Flex>
					<FlexBlock>
						{ Size( 'labelPadV', 'Label Padding', attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'labelPadH', 'Label Padding', attributes, setAttributes ) }
					</FlexBlock>
				</Flex>
			</PanelBody>		
		
			<PanelColorSettings
				className="tx-default-color"
				colorSettings={ [
					{
						value: digitColor,
						onChange: color => updateStyle( 'digitColor', color ),
						label: __( 'Digit Color' ),
					},
					{
						value: digitBgColor,
						onChange: color => updateStyle( 'digitBgColor', color ),
						label: __( 'Digit Background Color' ),
					},
					{
						value: labelColor,
						onChange: color => updateStyle( 'labelColor', color ),
						label: __( 'Label Color' ),
					},
					{
						value: labelBgColor,
						onChange: color => updateStyle( 'labelBgColor', color ),
						label: __( 'Label Background Color' ),
					},
				] }
			/>
		</>
	);
}
