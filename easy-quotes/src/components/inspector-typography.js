import { __ } from '@wordpress/i18n';
import {
	PanelBody,
	SelectControl,
	RangeControl,
	__experimentalGrid as Grid
} from '@wordpress/components';

import { createStyleForFont } from './helper';

export class InspectorTypography extends React.Component {
	componentDidMount() {
		const { fontFamily } = this.props.attributes;

		this.props.setAttributes( { selectedFontsCategory: '-1' } );
		this.fetchFonts( '-1' );
		this.fetchFontsCategories();
		this.fetchFontVariants( fontFamily.family );
	}

	fetchFonts( category ) {
		wp.apiFetch( {
			url: '/wp-json/layart/v1/fonts?cat=' + category,
		} ).then( ( fonts ) => {
			let result = [];
			fonts.map( ( font ) => {
				return result.push( { label: font, value: font } );
			} );
			fonts = result;
			this.props.setAttributes( { fonts } );
		} );
	}

	fetchFontsCategories() {
		wp.apiFetch( {
			url: '/wp-json/layart/v1/fonts-categories',
		} ).then( ( fontsCategories ) => {
			this.props.setAttributes( { fontsCategories } );
		} );
	}

	fetchFontFamily( family, variant_id ) {
		wp.apiFetch( {
			url:
				'/wp-json/layart/v1/fonts?family=' +
				family +
				'&variant_id=' +
				variant_id,
		} ).then( ( fontFamily ) => {
			this.props.setAttributes( { fontFamily } );
			createStyleForFont( this.props.clientId, fontFamily );
		} );
	}

	fetchFontVariants( family ) {
		wp.apiFetch( {
			url: '/wp-json/layart/v1/font-variants?family=' + family,
		} ).then( ( fontVariants ) => {
			this.props.setAttributes( { fontVariants } );
			this.fetchFontFamily( family, fontVariants[ 0 ].value );
			this.props.setAttributes( {
				selectedVariant: fontVariants[ 0 ].value,
			} );
		} );
	}

	render() {
		const {
			selectedFontsCategory,
			fontsCategories,
			fontFamily,
			fonts,
			selectedVariant,
			fontVariants,
			fontSize,
			lineHeight,
		} = this.props.attributes;

		const { setAttributes } = this.props;

		if ( ! ( fontsCategories && fonts && fontVariants ) ) return null;

		return (
			<PanelBody
				title={ __( 'Typography', 'easy-quotes' ) }
				initialOpen={ false }
			>
				<Grid columns={ 4 } templateColumns={ '3fr 8fr 4fr' }>
					<SelectControl
						label={ __( 'Filter', 'easy-quotes' ) }
						value={ selectedFontsCategory }
						options={ fontsCategories }
						onChange={ ( category ) => {
							setAttributes( {
								selectedFontsCategory: category,
							} );
							this.fetchFonts( category );
						}}
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label={ __( 'Font Family', 'easy-quotes' ) }
						value={ fontFamily.family }
						options={ fonts }
						onChange={ ( family ) =>
							this.fetchFontVariants( family )
						}
						__nextHasNoMarginBottom
					/>
					<SelectControl
						label={ __( 'Variants', 'easy-quotes' ) }
						value={ selectedVariant }
						options={ fontVariants }
						onChange={ ( selectedVariant ) => {
							setAttributes( { selectedVariant } );
							this.fetchFontFamily(
								fontFamily.family,
								selectedVariant
							);
						}}
						__nextHasNoMarginBottom
					/>
					<div style={ { visibility: 'hidden' } }></div>
				</Grid>
				<RangeControl
					label={ __( 'Font Size (em)', 'easy-quotes' ) }
					value={ parseFloat( fontSize ) }
					min={ 1 }
					max={ 5 }
					step={ 0.05 }
					showTooltip={ false }
					onChange={ ( fontSize ) =>
						setAttributes( { fontSize: fontSize.toFixed( 2 ) } )
					}
					__nextHasNoMarginBottom
				/>
				<RangeControl
					label={ __( 'Line Height (em)', 'easy-quotes' ) }
					value={ parseFloat( lineHeight ) }
					min={ 1 }
					max={ 3 }
					step={ 0.05 }
					showTooltip={ false }
					onChange={ ( lineHeight ) =>
						setAttributes( { lineHeight: lineHeight.toFixed( 2 ) } )
					}
					__nextHasNoMarginBottom
				/>
			</PanelBody>
		);
	}
}
