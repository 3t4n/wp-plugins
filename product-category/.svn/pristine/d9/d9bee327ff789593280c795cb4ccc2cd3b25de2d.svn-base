/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import Select from 'react-select';
import ServerSideRender from '@wordpress/server-side-render';
import axios from 'axios';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { Fragment, useState, useEffect } from '@wordpress/element';
import { RadioControl, PanelBody, PanelRow, RangeControl, Button, ButtonGroup, FormToggle, FontSizePicker, SelectControl, __experimentalBorderBoxControl as BorderBoxControl, __experimentalNumberControl as NumberControl, __experimentalBoxControl as BoxControl } from '@wordpress/components';
import classnames from "classnames";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({
	attributes,
	setAttributes,
	className,
	clientId,
}) {

	const classes = classnames(
		className,
		'wp-block-product-cat__main',
	);

	const [ allcategories, setCategories ] = useState( [] );
	const [ isCatsLoading, setIsCatsLoading ] = useState( true );

	useEffect( () => {
		const categories = [];
		const catAjaxData = () => {
		
			let formData  = new FormData();
			const ajaxurl = `${window.location.origin + window.ajaxurl}`;
	
			formData.append('action', 'pcb_get_woo_categories');
	
			axios.post(ajaxurl, formData).then( function(response) {
				response.data.forEach( ( item ) => {
									categories.push( {
										label: htmlDecode( item.name ),
										value: item.term_id,
									} );
								} );
				setCategories( categories );
				setIsCatsLoading( false );
			}).catch(err =>{
				console.log(err);
			});
		}
		catAjaxData();
	}, [] );

	const htmlDecode = ( input ) => {
		const doc = new DOMParser().parseFromString( input, 'text/html' );
		return doc.documentElement.textContent;
	};

	const changeTaxonomies = ( taxonomies, attributeKey ) => {
		const taxValues = taxonomies.map( ( item ) => item.value );
		setAttributes( {
			[ attributeKey ]: JSON.stringify(taxValues),
		} );
	};

	const {
		blockID,
		layoutSelection,
		layoutColumns,
		numberOfCat,
		catOrderByItems,
		catOrderBy,
		catOrderItems,
		catOrder,
		hideEmptyCat,
		parentCat,
		categories,
		paging,
		showCatTitle,
		showCatDesc,
		showCatCount,
		showCatImage,
		titleListItems,
		fontSize,
		descFontSize,
		fontColor,
		bgColor,
		fontDescColor,
		fontWeight,
		fontStyle,
		fontDecoration,
		fontLetterSpacing,
		fontLineHeight,
		fontTransform,
		descFontWeight,
		descFontStyle,
		descFontDecoration,
		descFontLetterSpacing,
		descFontLineHeight,
		descFontTransform,
		imageSize,
		imageEqualHeight,
		imageBorder,
		heightVal,
		imageRadius,
		catBoxBorder,
		catBoxRadius,
		boxMargin,
		boxPadding
	} = attributes;

	const blockProps = useBlockProps();

	setAttributes({ blockID: `product-category-block-${clientId}` });

	useEffect(() => {
		if (0 === catOrderByItems.length) {
			catOrderByInitList();
		}
		if (0 === catOrderItems.length) {
			catOrderInitList();
		}
		if ( 0 === titleListItems.length ) {
			titleInitList();
		}
	}, []);
	
	const catOrderByInitList = () => {
		setAttributes({
			catOrderByItems: [
				...catOrderByItems,
				{
					catOrderByName: true,
					catOrderBySlug: false,
					catOrderByMenu: false,
					catOrderByCount: false
				},
			],
		});
	};
	const catOrderInitList = () => {
		setAttributes({
			catOrderItems: [
				...catOrderItems,
				{
					catOrderAsc: false,
					catOrderDesc: true,
				},
			],
		});
	};
	const titleInitList = () => {
		setAttributes( {
			titleListItems: [
				...titleListItems,
				{
					index: 0,
					fontSize: '14px',
					fontWeight: '600',
					fontStyle: '',
					fontTransform: '',
					fontDecoration: '',
					fontLineHeight: '',
					fontLetterSpacing: '',
					fontColor: '#000000',
				},
			],
		} );
	};

	/* Attributes - Order By : Start */
	const pressedName = (e) => {
		let arrayCopy = [...catOrderByItems];
		arrayCopy.catOrderByName = true;
		arrayCopy.catOrderBySlug = false;
		arrayCopy.catOrderByMenu = false;
		arrayCopy.catOrderByCount = false;
		setAttributes({ catOrderByItems: arrayCopy });
		setAttributes({ catOrderBy: "name" });
	}
	const pressedSlug = (e) => {
		let arrayCopy = [...catOrderByItems];
		arrayCopy.catOrderByName = false;
		arrayCopy.catOrderBySlug = true;
		arrayCopy.catOrderByMenu = false;
		arrayCopy.catOrderByCount = false;
		setAttributes({ catOrderByItems: arrayCopy });
		setAttributes({ catOrderBy: "slug" });
	}
	const pressedMenu = (e) => {
		let arrayCopy = [...catOrderByItems];
		arrayCopy.catOrderByName = false;
		arrayCopy.catOrderBySlug = false;
		arrayCopy.catOrderByMenu = true;
		arrayCopy.catOrderByCount = false;
		setAttributes({ catOrderByItems: arrayCopy });
		setAttributes({ catOrderBy: "menu_order" });
	}
	const pressedCount = (e) => {
		let arrayCopy = [...catOrderByItems];
		arrayCopy.catOrderByName = false;
		arrayCopy.catOrderBySlug = false;
		arrayCopy.catOrderByMenu = false;
		arrayCopy.catOrderByCount = true;
		setAttributes({ catOrderByItems: arrayCopy });
		setAttributes({ catOrderBy: "count" });
	}
	/* Attributes - Order By : End */

	/* Attributes - Order : Start */
	const pressedAsc = (e) => {
		let arrayCopy = [...catOrderItems];
		arrayCopy.catOrderAsc = true;
		arrayCopy.catOrderDesc = false;
		setAttributes({ catOrderItems: arrayCopy });
		setAttributes({ catOrder: "asc" });
	}
	const pressedDesc = (e) => {
		let arrayCopy = [...catOrderItems];
		arrayCopy.catOrderAsc = false;
		arrayCopy.catOrderDesc = true;
		setAttributes({ catOrderItems: arrayCopy });
		setAttributes({ catOrder: "desc" });
	}
	/* Attributes - Order : End */

	/* Typography : Start */
	const fontSizes = [
		{
			name: __( 'Small' ),
			slug: 'small',
			size: '14px',
		},
		{
			name: __( 'Medium' ),
			slug: 'big',
			size: '20px',
		},
		{
			name: __( 'Big' ),
			slug: 'big',
			size: '26px',
		},
	];

	const selectOptionsWeight = [
		{
			label: 'Default',
			value: '' 
		},
		{
			label: '100',
			value: '100' 
		},
		{
			label: '200',
			value: '200'
		},
		{
			label: '300',
			value: '300'
		},
		{
			label: '400',
			value: '400'
		},
		{
			label: '500',
			value: '500'
		},
		{
			label: '600',
			value: '600'
		},
		{
			label: '700',
			value: '700'
		},
		{
			label: '800',
			value: '800'
		},
		{
			label: '900',
			value: '900'
		}
	];

	const selectOptionsStyle = [
		{
			label: 'Default',
			value: '' 
		},
		{
			label: 'Italic',
			value: 'italic'
		},
		{
			label: 'Oblique',
			value: 'oblique'
		}
	];

	const selectOptionsTransform = [
		{
			label: 'Default',
			value: '' 
		},
		{
			label: 'Normal',
			value: 'normal'
		},
		{
			label: 'Capitalize',
			value: 'capitalize'
		},
		{
			label: 'Uppercase',
			value: 'uppercase'
		},
		{
			label: 'Lowercase',
			value: 'lowercase'
		},
	];

	const selectOptionsDecoration = [
		{
			label: 'Default',
			value: '' 
		},
		{
			label: 'None',
			value: 'none'
		},
		{
			label: 'Underline',
			value: 'underline'
		},
		{
			label: 'Overline',
			value: 'overline'
		},
		{
			label: 'Line Through',
			value: 'line-through'
		},
	];

	const selectOptionsImageSize = [
		{
			label: 'Default',
			value: ''
		},
		{
			label: 'Thumbnail',
			value: 'thumbnail'
		},
		{
			label: 'Medium',
			value: 'medium'
		},
		{
			label: 'Medium Large',
			value: 'medium_large'
		},
		{
			label: 'Large',
			value: 'large'
		},
		{
			label: 'Full',
			value: 'full'
		},
	];

	const fallbackFontSize = 14;
	/* Typography : End */

	const colors = [
		{ name: 'Blue 20', color: '#72aee6' },
		{ name: 'Black', color: '#000000' },
		{ name: 'Red', color: '#FF0000' },
		{ name: 'Cyan', color: '#00FFFF' },
		{ name: 'LightBlue', color: '#ADD8E6' },
		{ name: 'Green', color: '#008000' }
	];
	
    const onBorderChange = ( newBorders ) => { setAttributes({ imageBorder: newBorders }) }
	
	return (
		<Fragment>
			<InspectorControls>
				<PanelColorSettings
					title={__('Color', 'dotstore-revamp')}
					colorSettings={[
						{
							value: bgColor,
							onChange: value => { setAttributes({ bgColor: value }) },
							label: __('Background', 'dotstore-revamp')
						},
						{
							value: fontColor,
							onChange: value => { setAttributes({ fontColor: value }) },
							label: __('Title', 'dotstore-revamp')
						},
						{
							value: fontDescColor,
							onChange: value => { setAttributes({ fontDescColor: value }) },
							label: __('Description', 'dotstore-revamp')
						}
					]}
					initialOpen={false}
				/>
				<PanelBody
					title={__('General')}
					initialOpen={true}
					className="pcb-block-panel general-settings"
				>
					<PanelRow>
						<div className="pcb-components-base-control">
							<RadioControl
								label="Layout"
								help=""
								selected={ layoutSelection }
								options={ [
									{ label: 'Grid', value: 'pcb-grid' },
									//{ label: 'Carousel', value: 'pcb-carousel' },
								] }
								onChange={ (newVal) => setAttributes({ layoutSelection: newVal }) }
							/>
						</div>
					</PanelRow>
					<PanelRow>
						{ "pcb-grid" === layoutSelection && <div className="pcb-components-base-control">
							<RangeControl
								label="Columns"
								value={ layoutColumns }
								onChange={ ( newVal ) => setAttributes({ layoutColumns: newVal }) }
								min={ 2 }
								max={ 8 }
							/>
						</div> }
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control">
							<span className="pcb-control-label">Order By</span>
							<ButtonGroup className='pcb-multi-button-group'>
								<Button variant={ catOrderBy === "name" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderByItems.length !== 0 ? catOrderByItems.catOrderByName : '' } onClick={ pressedName } value="name">Name</Button>
								<Button variant={ catOrderBy === "slug" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderByItems.length !== 0 ? catOrderByItems.catOrderBySlug : '' } onClick={ pressedSlug } value="slug">Slug</Button>
								<Button variant={ catOrderBy === "menu_order" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderByItems.length !== 0 ? catOrderByItems.catOrderByMenu : '' } onClick={ pressedMenu } value="menu_order">Menu Order</Button>
								<Button variant={ catOrderBy === "count" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderByItems.length !== 0 ? catOrderByItems.catOrderByCount : '' } onClick={ pressedCount } value="count">Count</Button>
							</ButtonGroup>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control">
							<span className="pcb-control-label">Order</span>
							<ButtonGroup className='pcb-multi-button-group'>
								<Button variant={ catOrder === "asc" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderItems.length !== 0 ? catOrderItems.catOrderAsc : '' } onClick={ pressedAsc } value="asc">Asc</Button>
								<Button variant={ catOrder === "desc" ? "primary" : "secondary" } className="pcb-multi-button" isPressed={ catOrderItems.length !== 0 ? catOrderItems.catOrderDesc : '' } onClick={ pressedDesc } value="desc">Desc</Button>
							</ButtonGroup>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control">
							<RangeControl
								label="No. of Categories"
								value={ numberOfCat }
								onChange={ ( newVal ) => setAttributes({ numberOfCat: newVal }) }
								min={ 1 }
								max={ 100 }
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Hide Empty</span>
							<FormToggle
								checked={ hideEmptyCat }
								onChange={ (event) => 
									setAttributes({ hideEmptyCat: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Parent</span>
							<FormToggle
								checked={ parentCat }
								onChange={ (event) => 
									setAttributes({ parentCat: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Pagination</span>
							<FormToggle
								checked={ paging }
								onChange={ (event) => 
									setAttributes({ paging: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Show Count</span>
							<FormToggle
								checked={ showCatCount }
								onChange={ (event) => 
									setAttributes({ showCatCount: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Show Title</span>
							<FormToggle
								checked={ showCatTitle }
								onChange={ (event) => 
									setAttributes({ showCatTitle: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Show Description</span>
							<FormToggle
								checked={ showCatDesc }
								onChange={ (event) => 
									setAttributes({ showCatDesc: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
					<PanelRow>
						<div className="pcb-components-base-control form-toggle">
							<span className="pcb-control-label">Show Image</span>
							<FormToggle
								checked={ showCatImage }
								onChange={ (event) => 
									setAttributes({ showCatImage: event.target.checked })
								}
							/>
						</div>
					</PanelRow>
				</PanelBody>
				{ showCatTitle && 
					<PanelBody
						title={__('Title')}
						initialOpen={false}
						className="pcb-block-panel title-settings"
					>
						<FontSizePicker
							__nextHasNoMarginBottom
							fontSizes={ fontSizes }
							value={ fontSize }
							fallbackFontSize={ fallbackFontSize }
							onChange={ (newVal) => setAttributes({ fontSize: newVal }) }
						/>
						<SelectControl
							label="Font Weight"
							value={ fontWeight }
							options={ selectOptionsWeight }
							onChange={ (newVal) => setAttributes({ fontWeight: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Font Style"
							value={ fontStyle }
							options={ selectOptionsStyle }
							onChange={ (newVal) => setAttributes({ fontStyle: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Transform"
							value={ fontTransform }
							options={ selectOptionsTransform }
							onChange={ (newVal) => setAttributes({ fontTransform: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Decoration"
							value={ fontDecoration }
							options={ selectOptionsDecoration }
							onChange={ (newVal) => setAttributes({ fontDecoration: newVal }) }
							__nextHasNoMarginBottom
						/>
						<div className="inspector-field pcb-flex-width">
							<span className="pcb-control-label">Line Height</span>
							<RangeControl
								value={ fontLineHeight }
								min={-50}
								max={200}
								onChange={ (newVal) => setAttributes({ fontLineHeight: newVal }) }
							/>
						</div>
						<div className="inspector-field pcb-flex-width">
							<span className="pcb-control-label">Letter Spacing</span>
							<RangeControl
								value={ fontLetterSpacing }
								min={-50}
								max={200}
								onChange={ (newVal) => setAttributes({ fontLetterSpacing: newVal }) }
							/>
						</div>
					</PanelBody>
				}
				{ showCatDesc && 
					<PanelBody
						title={__('Description')}
						initialOpen={false}
						className="pcb-block-panel desc-settings"
					>
						<FontSizePicker
							__nextHasNoMarginBottom
							fontSizes={ fontSizes }
							value={ descFontSize }
							fallbackFontSize={ fallbackFontSize }
							onChange={ (newVal) => setAttributes({ descFontSize: newVal }) }
						/>
						<SelectControl
							label="Font Weight"
							value={ descFontWeight }
							options={ selectOptionsWeight }
							onChange={ (newVal) => setAttributes({ descFontWeight: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Font Style"
							value={ descFontStyle }
							options={ selectOptionsStyle }
							onChange={ (newVal) => setAttributes({ descFontStyle: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Transform"
							value={ descFontTransform }
							options={ selectOptionsTransform }
							onChange={ (newVal) => setAttributes({ descFontTransform: newVal }) }
							__nextHasNoMarginBottom
						/>
						<SelectControl
							label="Decoration"
							value={ descFontDecoration }
							options={ selectOptionsDecoration }
							onChange={ (newVal) => setAttributes({ descFontDecoration: newVal }) }
							__nextHasNoMarginBottom
						/>
						<div className="inspector-field pcb-flex-width">
							<span className="pcb-control-label">Line Height</span>
							<RangeControl
								value={ descFontLineHeight }
								min={-50}
								max={200}
								onChange={ (newVal) => setAttributes({ descFontLineHeight: newVal }) }
							/>
						</div>
						<div className="inspector-field pcb-flex-width">
							<span className="pcb-control-label">Letter Spacing</span>
							<RangeControl
								value={ descFontLetterSpacing }
								min={-50}
								max={200}
								onChange={ (newVal) => setAttributes({ descFontLetterSpacing: newVal }) }
							/>
						</div>
					</PanelBody>
				}
				{ showCatImage && 
					<PanelBody
						title={__('Image')}
						initialOpen={false}
						className="pcb-block-panel image-settings"
					>
						<SelectControl
							label="Image Size"
							value={ imageSize }
							options={ selectOptionsImageSize }
							onChange={ (newVal) => setAttributes({ imageSize: newVal }) }
							__nextHasNoMarginBottom
						/>
						<PanelRow>
							<div className="pcb-components-base-control form-toggle">
								<span className="pcb-control-label">Equal Height</span>
								<FormToggle
									checked={ imageEqualHeight }
									onChange={ (event) => 
										setAttributes({ imageEqualHeight: event.target.checked })
									}
								/>
							</div>
						</PanelRow>
						{ imageEqualHeight && <NumberControl
							isShiftStepEnabled={ true }
							onChange={ (newVal) => setAttributes({ heightVal: newVal }) }
							shiftStep={ 10 }
							value={ heightVal }
							min={0}
						/> }
						<BorderBoxControl
							colors={ colors }
							label={ __( 'Borders' ) }
							onChange={ onBorderChange }
							value={ imageBorder }
						/>
						<div className='pcb-components-base-control'>
							<NumberControl
								isShiftStepEnabled={ true }
								label={ __( 'Radius' ) }
								onChange={ (newVal) => setAttributes({ imageRadius: newVal }) }
								shiftStep={ 10 }
								value={ imageRadius }
								min={0}
							/>
						</div>
					</PanelBody>
				}
				<PanelBody
					title={__('Category Box')}
					initialOpen={false}
					className="pcb-block-panel cat-box-settings"
				>
					<BorderBoxControl
						colors={ colors }
						label={ __( 'Borders' ) }
						onChange={ (newVal) => setAttributes({ catBoxBorder: newVal }) }
						value={ catBoxBorder }
					/>
					<div className='pcb-components-base-control'>
						<NumberControl
							isShiftStepEnabled={ true }
							label={ __( 'Radius' ) }
							onChange={ (newVal) => setAttributes({ catBoxRadius: newVal }) }
							shiftStep={ 10 }
							value={ catBoxRadius }
							min={0}
						/>
					</div>
					<BoxControl
						values={ boxMargin }
						label={ __( 'Margin' ) }
						onChange={ ( newVal ) => setAttributes({ boxMargin: newVal }) }
					/>
					<BoxControl
						values={ boxPadding }
						label={ __( 'Padding' ) }
						onChange={ ( newVal ) => setAttributes({ boxPadding: newVal }) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps } class={"product-category-block "+layoutSelection} id={blockID}>
				<div { ...blockProps } class="pcb-components-base-control">
					<Select
						class="pcb-select-control"
						name="categories"
						isLoading={ isCatsLoading }
						value={
							null !== categories && categories.length
								? allcategories.filter( ( item ) =>
										JSON.parse(
											categories
										).includes(
											item.value
										)
									)
								: []
						}
						onChange={ ( value ) => changeTaxonomies( value, 'categories' ) }
						options={ allcategories }
						isMulti="true"
					/>
				</div>
				<ServerSideRender
					block="product-category/product-category-block"
					className={classes}
					attributes={ {
						blockID,
						layoutSelection,
						layoutColumns,
						numberOfCat,
						catOrderBy,
						catOrder,
						hideEmptyCat,
						parentCat,
						categories,
						paging,
						showCatTitle,
						showCatDesc,
						showCatCount,
						showCatImage,
						titleListItems,
						fontSize,
						descFontSize,
						fontColor,
						bgColor,
						fontDescColor,
						fontWeight,
						fontStyle,
						fontDecoration,
						fontLetterSpacing,
						fontLineHeight,
						fontTransform,
						descFontWeight,
						descFontStyle,
						descFontDecoration,
						descFontLetterSpacing,
						descFontLineHeight,
						descFontTransform,
						imageSize,
						imageEqualHeight,
						heightVal,
						imageBorder,
						imageRadius,
						catBoxBorder,
						catBoxRadius,
						boxMargin,
						boxPadding
					} }
				/>
			</div>
		</Fragment>
	);
}
