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
	TextControl,
	SelectControl,
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
export default function minimalTemplate( { attributes, setAttributes } ) {
	const { 
		fontColor,
		separator,
		fontWeight,
	} = { ...attributes.styles };

	const updateStyle = ( key, value ) => {
		const styles = Object.assign( {}, attributes.styles );
		styles[ key ] = value;
		setAttributes( { styles } );
	}

	return (
		<>
			<PanelBody>
				<TextControl
					label={ __( 'Separator', 'the-countdown' ) }
					type="text"
					value={ separator }
					onChange={ text => updateStyle( 'separator', text ) }
					help={ __( 'String for each digit separator.', 'the-countdown' ) }
				/>

				<Flex>
					<FlexBlock>
						{ Size( 'fontSize', __( 'Font Size' ), attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>

					</FlexBlock>
				</Flex>

				<SelectControl
					label={ __( 'Font Weight', 'the-countdown' ) }
					value={ fontWeight }
					options={ [
						{ value: '100', label: __( 'Thin', 'the-countdown' ) },
						{ value: '200', label: __( 'Extra Light', 'the-countdown' ) },
						{ value: '300', label: __( 'Light', 'the-countdown' ) },
						{ value: '400', label: __( 'Normal', 'the-countdown' ) },
						{ value: '500', label: __( 'Medium', 'the-countdown' ) },
						{ value: '600', label: __( 'Semi Bold', 'the-countdown' ) },
						{ value: '700', label: __( 'Bold', 'the-countdown' ) },
						{ value: '800', label: __( 'Extra Bold', 'the-countdown' ) },
						{ value: '900', label: __( 'Black', 'the-countdown' ) },
						{ value: '950', label: __( 'Extra Black', 'the-countdown' ) },
					] }
					onChange={ value => updateStyle( 'fontWeight', value ) }
					help={ __( 'Some weight might not work for current theme.', 'the-countdown' ) }
				/>ß
			</PanelBody>

			<PanelColorSettings
				className="tx-default-color"
				colorSettings={ [
					{
						value: fontColor,
						onChange: color => updateStyle( 'fontColor', color ),
						label: __( 'Font Color' ),
					},
				] }
			/>

		</>
	);
}
