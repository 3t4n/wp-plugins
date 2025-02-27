/**
 * BLOCK: Button
 *
 * Registering a basic Button block with Gutenberg.
 *
 * Styles:
 *        style.css — Frontend styles for the block.
 */
import './editor.scss';
import './style.scss';
import icons from '../../icons/icons';

const { __, setLocaleData } = wp.i18n; // Import __() from wp.i18n
// const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { Component } = wp.element;
const { registerBlockType } = wp.blocks;
const {
	withState,
    PanelColor,
    RangeControl,
    SelectControl,
    TextControl,
    ToggleControl,
    Dashicon,
    IconButton,
    Button,
    Toolbar,
    ServerSideRender,
    Panel, 
    PanelBody
} = wp.components;

const {
	InspectorControls,
    BlockControls,
    ColorPalette,
    AlignmentToolbar,
    RichText,
    URLInput,
    MediaUpload,
} = wp.editor.InspectorControls ? wp.editor : wp.blocks;

registerBlockType( 'bk/bk-pricing-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Pricing Table' ), // Block title.
	icon: icons.pricetableIcon,
    description: __('Showcase a Pricing Table or Service Plans'),
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        url: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-pricing-box-column-one a',
            attribute: 'href',
        },
        url2: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-pricing-box-column-two a',
            attribute: 'href',
        },
        url3: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-pricing-box-column-three a',
            attribute: 'href',
        },
        pricingBoxTitle: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-one h3',
        },
        pricingBoxTitle2: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-two h3',
        },
        pricingBoxTitle3: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-three h3',
        },
        price: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-one .bk-pricing-box-pricing',
        },
        price2: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-two .bk-pricing-box-pricing',
        },
        price3: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-three .bk-pricing-box-pricing',
        },
        perMonthLabel: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-one .bk-pricing-box-per-month-label',
        },
        perMonthLabel2: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-two .bk-pricing-box-per-month-label',
        },
        perMonthLabel3: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-three .bk-pricing-box-per-month-label',
        },
        buttonText: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-one a',
        },
        buttonText2: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-two a',
        },
        buttonText3: {
            type: 'array',
            source: 'children',
            selector: '.bk-pricing-box-column-three a',
        },
        features: {
            type:'array',
            source: 'children',
            filterElements: true,
            selector: '.bk-pricing-box-feature-list-one',
            default:[],
        },
        featurestwo: {
            type:'array',
            source: 'children',
            filterElements: true,
            selector: '.bk-pricing-box-feature-list-two',
            default:[],
        },
        featuresthree: {
            type:'array',
            source: 'children',
            filterElements: true,
            selector: '.bk-pricing-box-feature-list-three',
            default:[],
        },
        pricingBoxColor: {
            type: 'string',
        },
        buttonColor: {
            type: 'string',
            default:'#3c48d5',
        },
        buttonTextColor: {
            type: 'string',
            default:'#fff',
        },
        buttonStyle:{
            type:'string',
        },
        columns: {
            type: 'select',
            default: '2'
        },
        size: {
            type: 'string',
            default: 'normal',
        },
        hedbgclr:{
            type:'string',
            default:'#ddf1ff',
        },
        cornerButtonRadius: {
            type: 'number',
            default: 25,
        },
        buttonTarget: {
            type: 'boolean',
            default: false,
        },
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { url,url2,url3,pricingBoxTitle,pricingBoxTitle2,pricingBoxTitle3,price,price2,price3,buttonTarget,
                    features,featurestwo,featuresthree,hedbgclr,perMonthLabel,perMonthLabel2,perMonthLabel3,
                    buttonText,buttonText2,buttonText3,boxBackground,pricingBoxColor,buttonColor,buttonTextColor,buttonStyle,columns,size,cornerButtonRadius } = attributes;
        const column = [
                { value: '1', label: __( 'One Column' ) },
                { value: '2', label: __( 'Two Column' ) },
                { value: '3', label: __( 'Three Column' ) },
            ];
        const buttonSizes = [
                { value: 'small', label: __( 'Small' ) },
                { value: 'normal', label: __( 'Normal' ) },
                { value: 'medium', label: __( 'Medium' ) },
                { value: 'large', label: __( 'Large' ) },
            ];    
	   function onFeatureChange( nextFeatures ) {
            setAttributes( { features: nextFeatures } )
       }
       function onFeatureChangeTwo( nextFeatures ) {
            setAttributes( { featurestwo: nextFeatures } )
       }
       function onFeatureChangeThree( nextFeatures ) {
            setAttributes( { featuresthree: nextFeatures } )
       }
    	return ( [
			isSelected &&(<InspectorControls key={ 'inspector' }>
             <PanelBody>   
                <SelectControl
                    label={ __( 'Column Number' ) }
                    value={ columns }
                    options={ column.map( ({ value, label }) => ( {
                        value: value,
                        label: label,
                    } ) ) }
                    onChange={ ( newColumns ) => { setAttributes( { columns: newColumns } ) } }
                />
               </PanelBody> 
                <PanelBody initialOpen={ false } title={ __( 'Color Settings' ) } >
                    <h2>{ __( 'Background Color' ) }</h2>
                        <ColorPalette
                            value={ hedbgclr }
                            onChange={ ( colorValue ) => setAttributes( { hedbgclr: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                             ]}
                        />
                    
                    <h2>{ __( 'Content Color' ) }</h2>
                        <ColorPalette
                            value={ pricingBoxColor }
                            onChange={ ( colorValue ) => setAttributes( { pricingBoxColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                    <h2>{ __( 'Button Color' ) }</h2>
                        <ColorPalette
                            value={ buttonColor }
                            onChange={ ( colorValue ) => setAttributes( { buttonColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                    
                        <h2>{ __( 'Button Text Color' ) }</h2>
                        <ColorPalette
                            value={ buttonTextColor }
                            onChange={ ( colorValue ) => setAttributes( { buttonTextColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                    <RangeControl
                        label={ __( 'Border Radius' ) }
                        value={ cornerButtonRadius }
                        min='1'
                        max='50'
                        onChange={ ( cornerRad ) => setAttributes( { cornerButtonRadius: cornerRad } ) }
                    /> 
                    <ToggleControl
                        label={ __( 'Open link in new window' ) }
                        checked={ buttonTarget }
                        onChange={ ( btnTarget ) => { setAttributes( { buttonTarget: btnTarget } ) } }
                    />
               </PanelBody>
            </InspectorControls>),
			<div className={ `bk-pricing-box column-${columns}` }>
              <div className={ 'box-item bk-pricing-box-column-one' } style={{ backgroundColor:hedbgclr }}>
                <div className={`box-head`}>
                    <RichText
                        tagName={ 'h3' }
                        multiline="false"
                        value={ pricingBoxTitle }
                        placeholder={ __('Basic') }
                        onChange={ (text) => setAttributes( { pricingBoxTitle: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ price }
                        placeholder={ __('$29') }
                        className={ 'bk-pricing-box-pricing' }
                        onChange={ (text) => setAttributes( { price: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ perMonthLabel }
                        placeholder={ __('PER MONTH') }
                        className={ 'bk-pricing-box-per-month-label' }
                        onChange={ (text) => setAttributes( { perMonthLabel: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                </div>
                <div className={'features-list-item'}>
                    <RichText
                        tagName="ul"
                        multiline="li"
                        placeholder={ __( 'Add features' ) }
                        value={ features }
                        className={ 'bk-pricing-box-feature-list-one' }
                        onChange={onFeatureChange }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus={true}
                    />
                </div>    
                <div className={`box-button`}>
                <span key={ 'button' }
                    className={ 'wp-block-button' }>
                    <RichText
                        tagName={ 'div' }
                        value={ buttonText }
                        placeholder={ __('Buy Now') }
                        onChange={ (text) => setAttributes( { buttonText: text } ) }
                        className={`wp-bk-button bk-button-${size}`}
                        style={ {
                            backgroundColor: buttonColor,
                            color: buttonTextColor,
                            borderRadius: cornerButtonRadius + 'px',
                        } }
                        keepPlaceholderOnFocus
                    />
                </span>
                 <div>
                    {
                        isSelected && (
                            <form
                                key={ 'form-link' }
                                onSubmit={ ( event ) => event.preventDefault() }
                                className={ `blocks-button__inline-link pricing-box`}>
                                <URLInput
                                    value={ url }
                                    onChange={ ( value ) => setAttributes( { url: value } ) }
                                />
                                <IconButton
                                    icon={ 'editor-break' }
                                    label={ __( 'Apply' ) }
                                    type={ 'submit' }
                                />
                            </form>
                        )
                    }
                   </div> 
                </div>
            </div>
          { ( columns >= 2 ) && ( <div className={ 'box-item bk-pricing-box-column-two' } style={{ backgroundColor:hedbgclr }} >
                <div className={`box-head`} >
                    <RichText
                        tagName={ 'h3' }
                        multiline="false"
                        placeholder={ __('Standard') }
                        value={ pricingBoxTitle2 }
                        onChange={ (text) => setAttributes( { pricingBoxTitle2: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ price2 }
                        placeholder={ __('$49') }
                        className={ 'bk-pricing-box-pricing' }
                        onChange={ (text) => setAttributes( { price2: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ perMonthLabel2 }
                        placeholder={ __('PER MONTH') }
                        className={ 'bk-pricing-box-per-month-label' }
                        onChange={ (text) => setAttributes( { perMonthLabel2: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                </div>
                <div className={'features-list-item'}>
                    <RichText
                        tagName="ul"
                        multiline="li"
                        placeholder={ __( 'Add features' ) }
                        value={ featurestwo }
                        className={ 'bk-pricing-box-feature-list-two' }
                        onChange={onFeatureChangeTwo }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus={true}
                    />
                </div>    
                <div className={`box-button`}>
                <span key={ 'button' }
                    className={ 'wp-block-button' }>
                    <RichText
                        tagName={ 'div' }
                        value={ buttonText2 }
                        placeholder={ __('Buy Now') }
                        onChange={ (text) => setAttributes( { buttonText2: text } ) }
                        className={`wp-bk-button bk-button-${size}`}
                        style={ {
                            backgroundColor: buttonColor,
                            color: buttonTextColor,
                            borderRadius: cornerButtonRadius + 'px',
                        } }
                        keepPlaceholderOnFocus
                    />
                </span>
                   <div>
                     {
                        isSelected && (
                            <form
                                key={ 'form-link' }
                                onSubmit={ ( event ) => event.preventDefault() }
                                className={ `blocks-button__inline-link pricing-box`}>
                                <URLInput
                                    value={ url2 }
                                    onChange={ ( value ) => setAttributes( { url2: value } ) }
                                />
                                <IconButton
                                    icon={ 'editor-break' }
                                    label={ __( 'Apply' ) }
                                    type={ 'submit' }
                                />
                            </form>
                        )
                    }  
                   </div>
                </div>
            </div>)}
             
          { ( columns >= 3 ) && ( <div className={ 'box-item bk-pricing-box-column-three' } style={{ backgroundColor:hedbgclr }}>
                <div className={`box-head`}>
                    <RichText
                        tagName={ 'h3' }
                        multiline="false"
                        placeholder={ __('Ultimate') }
                        value={ pricingBoxTitle3 }
                        onChange={ (text) => setAttributes( { pricingBoxTitle3: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ price3 }
                        placeholder={ __('$69') }
                        className={ 'bk-pricing-box-pricing' }
                        onChange={ (text) => setAttributes( { price3: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        value={ perMonthLabel3 }
                        placeholder={ __('PER MONTH') }
                        className={ 'bk-pricing-box-per-month-label' }
                        onChange={ (text) => setAttributes( { perMonthLabel3: text } ) }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus
                    />
                </div>
                <div className={'features-list-item'}>
                    <RichText
                        tagName="ul"
                        multiline="li"
                        placeholder={ __( 'Add features' ) }
                        value={ featuresthree }
                        className={ 'bk-pricing-box-feature-list-three' }
                        onChange={onFeatureChangeThree }
                        style={ {
                            color: pricingBoxColor
                        } }
                        keepPlaceholderOnFocus={true}
                    />
                </div>    
                <div className={`box-button`}>
                    <span key={ 'button' } className={ 'wp-block-button' }>
                        <RichText
                            tagName={ 'div' }
                            value={ buttonText3 }
                            placeholder={ __('Buy Now') }
                            onChange={ (text) => setAttributes( { buttonText3: text } ) }
                            className={`wp-bk-button bk-button-${size}`}
                            style={ {
                                backgroundColor: buttonColor,
                                color: buttonTextColor,
                                borderRadius: cornerButtonRadius + 'px',
                            } }
                            keepPlaceholderOnFocus
                        />
                    </span>
                    <div>
                    {
                        isSelected && (
                            <form
                                key={ 'form-link' }
                                onSubmit={ ( event ) => event.preventDefault() }
                                className={ `blocks-button__inline-link pricing-box`}>
                                <URLInput
                                    value={ url3 }
                                    onChange={ ( value ) => setAttributes( { url3: value } ) }
                                />
                                <IconButton
                                    icon={ 'editor-break' }
                                    label={ __( 'Apply' ) }
                                    type={ 'submit' }
                                />
                            </form>
                        )
                    }
                    </div>
                </div>
            </div>
           )} 
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { url,
        url2,url3,pricingBoxTitle,pricingBoxTitle2,pricingBoxTitle3,price,price2,boxBackground,features,featurestwo,featuresthree,
        price3,perMonthLabel,perMonthLabel2,perMonthLabel3,buttonText,buttonText2,hedbgclr,
        buttonText3,pricingBoxColor,priceColor,perMonthLabelColor,buttonColor,buttonTarget,
        buttonTextColor,buttonStyle,featureListColor,columns,size,cornerButtonRadius} = attributes;

		return (
		    <div className={ `bk-pricing-box column-${columns}`}>
               <div className={ 'box-item bk-pricing-box-column-one' } style={{ backgroundColor:hedbgclr }} >
                    <div className={`box-head`}>
                        <h3 style={ { color: pricingBoxColor } }>
                            { pricingBoxTitle }
                        </h3>
                        <p className={ 'bk-pricing-box-pricing' } style={ { color: pricingBoxColor } }>
                            { price }
                        </p>
                        <p className={ 'bk-pricing-box-per-month-label' } style={ { color: pricingBoxColor } }>
                            { perMonthLabel }
                        </p>
                    </div>
                    <div className={'features-list-item'}>
                       <ul className={'bk-pricing-box-feature-list-one'} style={ { color: pricingBoxColor } }>
                            { features }
                       </ul>
                    </div>  
                    <div className={'bk-box-btn'}>
                        <a
                            rel="noopener noreferrer"
                            href={ url }
                            className={ `wp-bk-button bk-button-${size} box-button` }
                            target={ buttonTarget ? '_blank' : '_self' }
                            style={{ backgroundColor:buttonColor,color:buttonTextColor,borderRadius: cornerButtonRadius + 'px' }}>
                            { buttonText }
                        </a>
                    </div>
               </div>
            { ( columns >= 2 ) && ( <div className={ 'box-item bk-pricing-box-column-two' } style={{ backgroundColor:hedbgclr }} >
                    <div className={`box-head`} >
                        <h3 style={ { color: pricingBoxColor } }>
                            { pricingBoxTitle2 }
                        </h3>
                        <p className={ 'bk-pricing-box-pricing' } 
                           style={ { color: pricingBoxColor } }>
                            { price2 }
                        </p>
                        <p className={ 'bk-pricing-box-per-month-label' } style={ { color: pricingBoxColor } }>
                            { perMonthLabel2 }
                        </p>
                    </div>
                    <div className={'features-list-item'}>
                       <ul className={'bk-pricing-box-feature-list-two'} style={ { color: pricingBoxColor } }>
                            { featurestwo }
                       </ul>
                    </div>  
                    <div className={'bk-box-btn'}>
                        <a
                            rel="noopener noreferrer"
                            href={ url2 }
                            className={ `wp-bk-button bk-button-${size} box-button` }
                            target={ buttonTarget ? '_blank' : '_self' }
                            style={{ backgroundColor:buttonColor,color:buttonTextColor,borderRadius: cornerButtonRadius + 'px' }}>
                            { buttonText2 }
                        </a>
                    </div>
               </div>)}
            { ( columns >= 3 ) && ( <div className={ 'box-item bk-pricing-box-column-three' } style={{ backgroundColor:hedbgclr }} >
                    <div className={`box-head`}>
                        <h3 style={ { color: pricingBoxColor } }>
                            { pricingBoxTitle3 }
                        </h3>
                        <p className={ 'bk-pricing-box-pricing' } 
                        style={ { color: pricingBoxColor } }>
                            { price3 }
                        </p>
                        <p className={ 'bk-pricing-box-per-month-label' } style={ { color: pricingBoxColor } }>
                            { perMonthLabel3 }
                        </p>
                    </div>
                    <div className={'features-list-item'}>
                       <ul className={'bk-pricing-box-feature-list-three'} style={ { color: pricingBoxColor } }>
                            { featuresthree }
                       </ul>
                    </div>  
                    <div className={'bk-box-btn'}>
                        <a
                            href={ url3 }
                            rel="noopener noreferrer"
                            className={ `wp-bk-button bk-button-${size} box-button` }
                            target={ buttonTarget ? '_blank' : '_self' }
                            style={{ backgroundColor:buttonColor,color:buttonTextColor,borderRadius: cornerButtonRadius + 'px' }}>
                            { buttonText3 }
                        </a>
                    </div>
               </div>)}
            </div>
        );
	},
} );