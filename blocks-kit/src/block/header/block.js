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
import HeadingToolbar from './hedtool.js';
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

registerBlockType( 'bk/bk-heading-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Advance Heading' ), // Block title.
	icon: icons.Heading,
    description: __( 'Advanced heading blocks to beautify title of your sections, topics and much more.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        level:{
            type:'number',
            default:2,
        },
        hedhext:{
            type:'array',
        },
        hedborder:{
            type:'number'
        },
        hedbordertype:{
            type:'string',
            default:'bk-double'
        },
        body: {
            type: 'array',
            source: 'children',
            selector: 'h1,h2,h3,h4,h5,h6',
        },
        fsize:{
            type:'number',
        },
        hedborderColor:{
            type:'string'
        },
        fontColor:{
            type:'string'    
        },
        bgColor:{
            type:'string',
            default:'#ddf1ff',
        },
        hedpadding:{
            type:'number',
            default:20,
        },
        alignment:{
            type:'string',
            default:'center',
        }
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { level,alignment,body,fsize,fontColor,bgColor,hedpadding,
                    hedbordertype,hedborder,hedborderColor } = attributes;
            const tagName = 'h' + level;
            const hedbordertypeOptions = [
                { value: 'bk-dotted', label: __( 'Dotted' ) },
                { value: 'bk-dashed', label: __( 'Dashed' ) },
                { value: 'bk-double', label: __( 'Double' ) },
                { value: 'bk-solid', label: __( 'Solid' ) },
                { value: 'bk-groove', label: __( 'Groove' ) },
                { value: 'bk-ridge', label: __( 'Ridge' ) },
                { value: 'bk-inset', label: __( 'Inset' ) },
                { value: 'bk-outset', label: __( 'Outset' ) },
                { value: 'bk-none', label: __( 'none' ) },
            ];

      	return ( [
            isSelected && (<BlockControls key="controls">
               <HeadingToolbar minLevel={ 1 } maxLevel={ 7 } selectedLevel={ level } onChange={ ( newLevel ) => setAttributes( { level: newLevel } ) } />
               <AlignmentToolbar value={ alignment } onChange={ ( value ) => setAttributes( { alignment: value } ) } />
                </BlockControls>
                ),
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody>
                    <HeadingToolbar minLevel={ 1 } maxLevel={ 7 } selectedLevel={ level } onChange={ ( newLevel ) => setAttributes( { level: newLevel } ) } />
                    <h3> Text Align </h3>
                    <AlignmentToolbar value={ alignment } onChange={ ( value ) => setAttributes( { alignment: value } ) } />    
                </PanelBody>
 
                <PanelBody title={ __( 'Font Settings' ) }initialOpen={ false }>
 
                    <h3> Custom Fontsize (rem) </h3>
                    <RangeControl max={ 5 } value={fsize} onChange={ ( value ) => setAttributes( { fsize: value } ) } />
 
                    <h3> Padding (px) </h3>
                    <RangeControl min={0} max={ 100 } value={hedpadding} onChange={ ( value ) => setAttributes( { hedpadding: value } ) } />
                
                    <h2>{ __('Font Color') }</h2>
                    <ColorPalette 
                        value={fontColor}
                        onChange={ (value) => setAttributes( { fontColor: value } ) }
                    />  
               
                </PanelBody>
                <PanelBody title={'Background Color'} colorValue={ bgColor } initialOpen={ false }>
                        <ColorPalette 
                            value={bgColor}
                            onChange={ (value) => setAttributes( { bgColor: value } ) }
                        />  
                </PanelBody>
                <PanelBody title = { __('Border Settings') } initialOpen={ false }>
                    <SelectControl
                            label={ __( 'Border Type' ) }
                            value={ hedbordertype }
                            options={ hedbordertypeOptions.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newType ) => { setAttributes( { hedbordertype: newType } ) } }
                        />
                   
                        <h2>{ __('Border Color') }</h2>
                         <ColorPalette 
                            value={hedborderColor}
                            onChange={ (value) => setAttributes( { hedborderColor: value } ) }
                        />  
                </PanelBody>
            </InspectorControls>),
			<div className={ `bk-heading` } style={{ padding:hedpadding + 'px',backgroundColor:bgColor }}>
              <div className={`bk-heading-wrapper ${hedbordertype}`} style={{ textAlign:alignment,borderColor:hedborderColor }}>
                <RichText
                        tagName={ tagName }
                        value={ body }
                        placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers.') }
                        className={ 'bk-heading-body' }
                        onChange={ (text) => setAttributes( { body: text } ) }
                        isSelected={ isSelected }
                        style={ {
                            textAlign: alignment,
                            fontSize: fsize + 'rem',
                            color: fontColor                            
                        } }
                        keepPlaceholderOnFocus
                    />
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { level,alignment,body,fsize,fontColor,bgColor,hedpadding,
                hedbordertype,hedborder,hedborderColor } = attributes;
        const tagName = 'h' + level;
    	return (
		    <div className={ `bk-heading`} style={{padding:hedpadding + 'px',backgroundColor:bgColor}}>
                <div className={`bk-heading-wrapper ${hedbordertype}`} style={{ textAlign:alignment,borderColor:hedborderColor  }}>
                    <RichText.Content
                        tagName={ tagName }
                        style={ { textAlign: alignment } }
                        className={ 'bk-heading-body' }
                        value={ body }
                        style={ {
                            textAlign: alignment,
                            fontSize: fsize + 'rem',
                            color:fontColor
                        } }
                    />
                </div>
            </div>
        );
	},
} );