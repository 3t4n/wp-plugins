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
	__experimentalUnitControl as UnitControl,
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
export default function circularTemplate( { attributes, setAttributes } ) {
	const { 
		baseColor,
		progressColor,
		digitColor,
		labelColor,
		width,
	} = { ...attributes.styles };

	
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
						<UnitControl
							__next40pxDefaultSize={ false }
							className="block-editor-hooks__layout-controls-unit-input"
							label={ __( 'Block Width' ) }
							labelPosition="top"
							value={ width }
							onChange={ value => {
								if ( parseInt( value ) <= 100 ) {
									updateStyle( 'width', value );
								}
							} }
							units={ [
								{ value: '%', label: '%' },
							] }
							style={ { marginBottom: '16px' } }
						/>	
					</FlexBlock>
					<FlexBlock>
						{ Size( 'gap', __( 'Gap' ), attributes, setAttributes ) }
					</FlexBlock>
				</Flex>

				<Flex>
					<FlexBlock>
						{ Size( 'baseSize', 'Base Size', attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'progressSize', 'Progress Size', attributes, setAttributes ) }
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
						{ Size( 'digitTop', 'Digit Top', attributes, setAttributes ) }
					</FlexBlock>
					<FlexBlock>
						{ Size( 'labelTop', 'Label top', attributes, setAttributes ) }
					</FlexBlock>
				</Flex>

				<PanelColorSettings
					title={ __( 'Colors' ) }
					className="tc-inside-panel"
					colorSettings={ [
						{
							value: baseColor,
							onChange: color => updateStyle( 'baseColor', color ),
							label: __( 'Circle Base Color' ),
						},
						{
							value: progressColor,
							onChange: color => updateStyle( 'progressColor', color ),
							label: __( 'Progress Circle Color' ),
						},
						{
							value: digitColor,
							onChange: color => updateStyle( 'digitColor', color ),
							label: __( 'Digit Color' ),
						},
						{
							value: labelColor,
							onChange: color => updateStyle( 'labelColor', color ),
							label: __( 'Label Color' ),
						},
					] }
				/>
			</PanelBody>
		</>
	);
}
