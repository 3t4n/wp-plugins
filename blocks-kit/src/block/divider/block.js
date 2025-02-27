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
    PanelBody, 
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

registerBlockType( 'bk/bk-devider-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Section Divider' ), // Block title.
	icon: icons.Divider,
    description: __( 'Differentiate sections, decorate headings and much more in such beautiful way via horizontal line with text.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'devider' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        divborderpos:{
            type:'string',
            default:'bk-default'
        },
        divbordertype:{
            type:'string',
            default:'bk-solid'
        },
        divborderwidth:{
            type:'number',
            default:1,
        },
        body: {
            type: 'array',
            source: 'children',
            selector: 'h1,h2,h3,h4,h5,h6',
        },
        fsize:{
            type:'number',
        },
        divborderColor:{
            type:'string',
            default:'#000000'
        },
        fontColor:{
            type:'string',
            default:'#000000'
        },
        bgColor:{
            type:'string',
        },
        divborderwidth:{
            type:'number',
            default:1,
        },
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { body,fsize,fontColor,bgColor,divborderwidth,
                    divbordertype,divborderpos,hedborder,divborderColor } = attributes;
            const divbordertypeOptions = [
                    { value: 'bk-default', label: __( 'Default' ) },
                    { value: 'bk-left', label: __( 'Left' ) },
                    { value: 'bk-right', label: __( 'Right' ) },
                ];
            const divborderOptions = [
                    { value: 'bk-dotted', label: __( 'Dotted' ) },
                    { value: 'bk-solid', label: __( 'Solid' ) },
                    { value: 'bk-double', label: __( 'Double' ) },
                    { value: 'bk-ridge', label: __( 'Ridge' ) },
                ];

      	return ( [
            isSelected && (<BlockControls key="controls">
                </BlockControls>
                ),
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody title={ __( 'Font Settings' ) }initialOpen={ false }>
                    <h3> Custom Fontsize (px) </h3>
                    <RangeControl min={ 1 } max={ 5 } value={fsize} onChange={ ( value ) => setAttributes( { fsize: value } ) } />
                    
                   
                    <h2>{ __( 'Font Color' ) }</h2>
                    <ColorPalette 
                        value={fontColor}
                        onChange={ (value) => setAttributes( { fontColor: value } ) }
                    />  
                   
                </PanelBody>
                <PanelBody title = { __('Border Settings') } initialOpen={ false }>
                    <h3> Border Width (px) </h3>
                    <RangeControl min={1} max={ 10 } value={divborderwidth} onChange={ ( value ) => setAttributes( { divborderwidth: value } ) } />
                    <SelectControl
                            label={ __( 'Border Position' ) }
                            value={ divborderpos }
                            options={ divbordertypeOptions.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newType ) => { setAttributes( { divborderpos: newType } ) } }
                        />
                        <SelectControl
                            label={ __( 'Border Type' ) }
                            value={ divbordertype }
                            options={ divborderOptions.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newType ) => { setAttributes( { divbordertype: newType } ) } }
                        />
                   
                   <h2>{ __( 'Border Color' ) }</h2>
                    <ColorPalette value={divborderColor} onChange={ (value) => setAttributes( { divborderColor: value } ) } />  
                   
                </PanelBody>
            </InspectorControls>),
			<div className={ `bk-divider` }>
              <div className={`bk-divider-wrapper ${divborderpos}`}>
                <span
                    className={ `bk-divider-left ${divbordertype}` }
                    style={ {
                        borderColor:divborderColor,
                        borderWidth:divborderwidth + 'px',
                    } }
                />
                <RichText
                    tagName={ 'h3' }
                    value={ body }
                    placeholder={ __('Blocks Kit Divider') }
                    className={ 'bk-heading-body' }
                    onChange={ (text) => setAttributes( { body: text } ) }
                    isSelected={ isSelected }
                    style={ {
                        fontSize: fsize + 'rem',
                        color: fontColor                            
                    } }
                    keepPlaceholderOnFocus
                />
                <span
                    className={ `bk-divider-right ${divbordertype}` }
                    style={ {
                        borderColor:divborderColor,
                        borderWidth:divborderwidth + 'px',
                    } }
                />
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { body,fsize,fontColor,bgColor,divborderwidth,
                    divbordertype,divborderpos,hedborder,divborderColor } = attributes;
        return (
		    <div className={ `bk-divider` }>
              <div className={`bk-divider-wrapper ${divborderpos}`}>
                <span className={ `bk-divider-left ${divbordertype}`} style={ { borderColor:divborderColor,borderWidth:divborderwidth + 'px',} } /> 
                     <h3 className={`bk-devider-body`} style={{color:fontColor,fontSize:fsize + 'rem'}}>{body}</h3> 
                <span className={ `bk-divider-right ${divbordertype}`} style={ { borderColor:divborderColor,borderWidth:divborderwidth + 'px',} } /> 
               </div>
            </div>
        );
	},
} );