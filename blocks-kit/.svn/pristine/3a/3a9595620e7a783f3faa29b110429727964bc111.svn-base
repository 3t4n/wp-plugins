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

registerBlockType( 'bk/bk-stickynotes-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Sticky Notes' ), // Block title.
	icon: icons.Snotes,
    description: __( 'Highlight notes, important points of your post or page with sticky note presentation.' ),
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
        alignment:{
            type:'string',
            default:'left'
        },
        divborderwidth:{
            type:'number',
            default:1,
        },
        bkhead:{
            type:'string',
            selector:'h3',
            source:'children',
        },
        body: {
            type: 'array',
            source: 'children',
            selector: 'p',
        },
        tsize:{
            type:'number',
            default:'',
        },
        fsize:{
            type:'number',
            default:1.5,
        },
        divborderColor:{
            type:'string',
            default:'#000000'
        },
        fontColor:{
            type:'string',
            default:'#000000'
        },  
        swidth:{
            type:'number',
            default:50,
        },
        notpos:{
            type:'string',
            default:'bk-default'
        },
        bgColor:{
            type:'string',
            default:'#f8de59',
        },
        divborderwidth:{
            type:'number',
            default:1,
        },
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { body,fsize,fontColor,bgColor,divborderwidth,alignment,notpos,tsize,
                    divbordertype,swidth,bkhead,divborderpos,hedborder,divborderColor } = attributes;
            const notesPostition = [
                { value: 'bk-default', label: __( 'Default' ) },
                { value: 'bk-center', label: __( 'Center' ) },
                { value: 'bk-right', label: __( 'Left' ) },
            ];        
      	return ( [
            isSelected && (<BlockControls key="controls">
                 <AlignmentToolbar value={ alignment } onChange={ (text) => setAttributes( { alignment: text } ) } />
                </BlockControls>
                ),
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody title={ __( 'Font Settings' ) } initialOpen={ false }>
                    <SelectControl
                            label={ __( 'Note Position' ) }
                            value={ notpos }
                            options={ notesPostition.map( ({ value, label }) => ( {
                                value: value,
                                label: label,
                            } ) ) }
                            onChange={ ( newPos ) => { setAttributes( { notpos: newPos } ) } }
                        />
                    <h3> Title Fontsize (rem) </h3>
                        <RangeControl min={ 1 } max={ 5 } value={tsize} onChange={ ( value ) => setAttributes( { tsize: value } ) } />
                    <h3> Content Fontsize (rem) </h3>
                        <RangeControl min={ 1 } max={ 5 } value={fsize} onChange={ ( value ) => setAttributes( { fsize: value } ) } />
                    <h3> Custom width (%) </h3>
                        <RangeControl max={ 100 } value={swidth} onChange={ ( value ) => setAttributes( { swidth: value } ) } />
                </PanelBody>
                <PanelBody title = { __('Color Settings') } initialOpen={ false }>
                   <h2>{ __( 'Background Color' ) }</h2>
                        <ColorPalette value={bgColor} onChange={ (value) => setAttributes( { bgColor: value } ) } />  
                   
                   <h2>{ __( 'Font Color' ) }</h2>
                        <ColorPalette value={fontColor} onChange={ (value) => setAttributes( { fontColor: value } ) } />  
                
                </PanelBody>
            </InspectorControls>),
			<div className={ `bk-sticky ${notpos}` }>
              <div className={`bk-sticky-wrapper`} style={{width:swidth + '%',backgroundColor:bgColor}}>
                <div class='pin'></div>
                <div className={`bk-sticky-head`}>
                  <RichText
                        tagName={ 'h3' }
                        value={ bkhead }
                        placeholder={ __('Blocks Kit') }
                        className={ '' }
                        onChange={ (text) => setAttributes( { bkhead: text } ) }
                        style={ {
                            fontSize: tsize + 'rem',
                            color: fontColor,
                            textAlign:alignment                            
                        } }
                        keepPlaceholderOnFocus
                    />
                </div>
                <RichText
                    tagName={ 'p' }
                    value={ body }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    className={ 'bk-sticky-body' }
                    onChange={ (text) => setAttributes( { body: text } ) }
                    style={ {
                        fontSize: fsize + 'rem',
                        color: fontColor,
                        textAlign:alignment                            
                    } }
                    keepPlaceholderOnFocus
                />
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { body,fsize,fontColor,bgColor,divborderwidth,bkhead,swidth,alignment,notpos,
                tsize,divbordertype,divborderpos,hedborder,divborderColor } = attributes;
        return (
		    <div className={ `bk-sticky ${notpos}` }>
              <div className={`bk-sticky-wrapper`} style={{width:swidth + '%',backgroundColor:bgColor}}>
                 <div className='pin'></div>
                 <div className={`bk-sticky-head`}>
                    <h3 style={{ fontSize: tsize + 'rem', color: fontColor,textAlign:alignment}}>{bkhead}</h3>
                 </div>  
                     <p className={`bk-sticky-body`} style={{color:fontColor,fontSize:fsize + 'rem',textAlign:alignment}}>{body}</p> 
                 </div>
            </div>
        );
	},
} );