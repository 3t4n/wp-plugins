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

registerBlockType( 'bk/bk-cta-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Call To Action' ), // Block title.
	icon: icons.callAction,
    description: __( 'Create an user centric call-to-action to conveince clients and users.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        ctaTitle: {
            type: 'array',
            source: 'children',
            selector: '.bk-cta-wrapper h2',
        },
        body: {
            type: 'array',
            source: 'children',
            selector: '.bk-cta-body',
        },
        titleColor: {
            type: 'string',
        },
        bodyTextColor: {
            type: 'string',
        },
        backgroundColor:{
            type:'string',
        },
        btntext:{
            type:'string',
            source:'children',
            selector:'.bk-button-plus',
        },
        ctaBackground:{
            type:'string',
            default:'#f5f5f5',
        },
        buttonSize:{
            type:'string',
            default:'bk-normal',
        },
        buttonShape:{
            type:'string',
            default:'bk-square',
        },
        buttonUrl: {
            type: 'string',
            source: 'attribute',
            selector: 'a',
            attribute: 'href',
        },
        buttonTarget: {
            type: 'boolean',
            default: false,
        },
        descColor:{
            type:'string',
        },
        alignment:{
            type:'string',
            default:'center',
        }
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { alignment,backgroundColor,buttonSize,buttonUrl,buttonShape,btntext,ctaBackground,mediaID,mediaURL,ctaTitle,position,
                    body,titleColor,posColor,fontColor,descColor,bodyTextColor,iconColor,columns,buttonTarget } = attributes;
            const buttonSizeOptions = [
                    { value: 'bk-small', label: __( 'Small' ) },
                    { value: 'bk-normal', label: __( 'Normal' ) },
                    { value: 'bk-medium', label: __( 'Medium' ) },
                    { value: 'bk-large', label: __( 'Large' ) },
                    { value: 'bk-extra-large', label: __( 'Extra Large' ) },
                ];
            const buttonShapeOptions = [
                    { value: 'bk-square', label: __( 'Square' ) },
                    { value: 'bk-rounded', label: __( 'Rounded Square' ) },
                    { value: 'bk-circular', label: __( 'Circular' ) },
                    { value: 'bk-extra-circular', label: __( 'Extra Circular' ) },
                ];        
         return ( [
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody>
                    <h3> Alignment </h3>
                    <AlignmentToolbar
                    value={ alignment }
                    onChange={ ( value ) => setAttributes( { alignment: value } ) }
                />
                </PanelBody>
                <PanelBody title={'Text Settings'} initialOpen={ false }>
                    
                        <h2>{ __( 'Background Color' ) }</h2>
                        <ColorPalette
                            value={ ctaBackground }
                            onChange={ ( colorValue ) => setAttributes( { ctaBackground: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                   
                        <h2>{ __( 'Title Color' ) }</h2>    
                        <ColorPalette
                            value={ titleColor }
                            onChange={ ( colorValue ) => setAttributes( { titleColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                   
                        <h2>{ __( 'Description Color' ) }</h2>
                        <ColorPalette
                            value={ bodyTextColor }
                            onChange={ ( colorValue ) => setAttributes( { bodyTextColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                </PanelBody>
                <PanelBody title={'Button Settings'} initialOpen={ false }>
                        <ToggleControl
                            label={ __( 'Open link in new window' ) }
                            checked={ buttonTarget }
                            onChange={ ( newTarget ) => { setAttributes( { buttonTarget: newTarget } ) } }
                        />
                        <SelectControl
                            label={ __( 'Button Size' ) }
                            value={ buttonSize }
                            options={ buttonSizeOptions.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newSize ) => { setAttributes( { buttonSize: newSize } ) } }
                        />
                        <SelectControl
                            label={ __( 'Button Shape' ) }
                            value={ buttonShape }
                            options={ buttonShapeOptions.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newShape ) => { setAttributes( { buttonShape: newShape } ) } }
                        />
                       <PanelBody title={ __( 'Button Text Color' ) }initialOpen={ false }>
                           <div>
                               <ColorPalette 
                                value={fontColor}
                                onChange={ ( newFontColor ) => { setAttributes( { fontColor: newFontColor } ) } }
                            />  
                           </div>
                        </PanelBody>
                        <PanelBody title={'Background Color'} initialOpen={ false }>
                            <div>
                                <ColorPalette 
                                    value={backgroundColor}
                                    onChange={ ( newBackground ) => { setAttributes( { backgroundColor: newBackground } ) } }
                                />
                            </div>
                        </PanelBody>
                   </PanelBody>
            </InspectorControls>),
			<div className={ `bk-cta` } style={{ backgroundColor:ctaBackground }}>
              <div className={ 'bk-cta-wrapper' } style={{ textAlign:alignment  }}>
                <RichText
                        tagName={'h2'}
                        placeholder={ __('Blocks Kit is an additional Gutenberg Blocks') }
                        value={ ctaTitle }
                        className={ 'bk-cta-title' }
                        onChange={ (text) => setAttributes( { ctaTitle: text } ) }
                        style={ {
                            color: titleColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={ 'p' }
                        placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                        value={ body }
                        onChange={ (text) => setAttributes( { body: text } ) }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <div className={`bk-button-wrapper `} style={ {textAlign: alignment} }>
                         <RichText
                            tagName="span"
                            className={ `bk-button-plus ${buttonSize} ${buttonShape}`}
                            value={ btntext }
                            onChange={ (text) => setAttributes( { btntext: text } ) }
                            placeholder={ __('Blocks Kit') }
                            style={
                                {   color: fontColor,
                                    backgroundColor: backgroundColor,
                                    textAlign: alignment
                                }
                            }
                           keepPlaceholderOnFocus 
                        />
                        <div className={`bk-btn-form`} >
                            { isSelected && (<form
                                onSubmit={ ( event ) => event.preventDefault() }
                                className={`bk-button bk-button-dual`}
                              >
                                <URLInput
                                    className="button-url"
                                    value={ buttonUrl }
                                    onChange={ ( value ) => setAttributes( { buttonUrl: value } ) }
                                />
                                <IconButton
                                    icon="editor-break"
                                    label={ __( 'Apply' ) }
                                    type="submit"
                                />
                            </form>)}
                     </div>
                </div>
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { alignment,backgroundColor,buttonSize,buttonUrl,buttonShape,btntext,ctaBackground,mediaID,mediaURL,ctaTitle,position,
                body,titleColor,posColor,fontColor,descColor,bodyTextColor,iconColor,columns,buttonTarget } = attributes;
    	return (
		    <div className={ `bk-cta` } style={{ backgroundColor:ctaBackground }}>
               <div className={ 'bk-cta-wrapper' } style={{ textAlign:alignment  }} >
               { ctaTitle && !! ctaTitle.length && (
                    <h2 style={{ color:titleColor }}> { ctaTitle } </h2>
                ) }
                { body && !! body.length && (
                    <p className={ 'bk-cta-body' } style={ { color: bodyTextColor } }>
                        { body }
                    </p>
                ) }
                <div className={`bk-button-wrapper `} style={ {textAlign: alignment} }>
                    <a style={ { color: fontColor,backgroundColor: backgroundColor} }
                        rel="noopener noreferrer"
                        className={`bk-button-plus ${ buttonSize } ${buttonShape}`} target={ buttonTarget ? '_blank' : '_self' } href={ buttonUrl }>{ btntext }</a>
                </div>
            </div>
            </div>
        );
	},
} );