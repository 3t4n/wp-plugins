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

registerBlockType( 'bk/bk-pquotes-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Pull Quotes' ), // Block title.
	icon: icons.Pquotes,
    description: __( 'Showcase useful notes or highlight quote to present great words beautifully.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'quotes' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        qborderpos:{
            type:'string',
            default:'bk-default'
        },
        qauthorname:{
            type:'string',
            selector:'.bk-qauth-name',
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
            selector: '.bk-pquotes-body',
        },
        fsize:{
            type:'number',
            default:1.2,
        },
        atsize:{
            type:'number',
            default:0.8,
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
        brColor:{
            type:'string',
            default:'#333',
        },
        divborderwidth:{
            type:'number',
            default:1,
        },
        alignment:{
            type:'string',
            default:'left',
        }
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { body,fsize,fontColor,bgColor,divborderwidth,qauthorname,alignment,atsize,
                    brColor,divbordertype,qborderpos,hedborder,divborderColor } = attributes;
          return ( [
            isSelected && (<BlockControls key="controls">
                 <AlignmentToolbar value={ alignment } onChange={ ( value ) => setAttributes( { alignment: value } ) } />
                </BlockControls>
                ),
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody title={ __( 'Font Settings' ) }initialOpen={ false }>
                    <h3> Quotes Fontsize (rem) </h3>
                    <RangeControl min={ 1 } max={ 5 } value={fsize} onChange={ ( value ) => setAttributes( { fsize: value } ) } />
                    <h3> Author Fontsize (rem) </h3>
                    <RangeControl min={ 1 } max={ 5 } value={atsize} onChange={ ( value ) => setAttributes( { atsize: value } ) } />
                    
                    <h2>{ __( 'Font Color' ) }</h2>
                    <ColorPalette 
                        value={fontColor}
                        onChange={ (value) => setAttributes( { fontColor: value } ) }
                    /> 
                    <h3>Border Color</h3>
                    <ColorPalette 
                        value={brColor}
                        onChange={ (value) => setAttributes( { brColor: value } ) }
                    />  
                </PanelBody>
            </InspectorControls>),
			<div className={ `bk-pquotes` }>
              <div className={`bk-pquotes-wrapper ${qborderpos}`} style={{borderColor:brColor}}>
                <RichText
                    tagName={ 'p' }
                    value={ body }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    className={ 'bk-pquotes-body' }
                    onChange={ (text) => setAttributes( { body: text } ) }
                    style={ {
                        fontSize: fsize + 'rem',
                        color: fontColor,
                        textAlign:alignment,                            
                    } }
                    keepPlaceholderOnFocus
                />
                <div className={`bk-pquotes-au`}>
                    <RichText
                        tagName={ 'p' }
                        value={ qauthorname  }
                        placeholder={ __('Blocks Kit Team') }
                        className={ 'bk-qauth-name' }
                        onChange={ (text) => setAttributes( { qauthorname : text } ) }
                        style={ {
                            fontSize: atsize + 'rem',
                            color: fontColor,
                            textAlign:alignment,
                        } }
                        keepPlaceholderOnFocus
                    />
                </div>
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { body,fsize,fontColor,bgColor,divborderwidth,qauthorname,brColor,atsize,
                    divbordertype,qborderpos,hedborder,divborderColor } = attributes;
        return (
		    <div className={ `bk-pquotes` }>
              <div className={`bk-pquotes-wrapper ${qborderpos}`} style={{borderColor:brColor}}>
                  <div className={`bk-pquotes-body`}>
                    <p className={``} style={{color:fontColor,fontSize:fsize + 'rem'}}>{body}</p> 
                  </div>
                  <div className={`bk-pquotes-au`} >
                     <p className={ 'bk-qauth-name' } style={{fontSize:atsize + 'rem',color:fontColor}}>{qauthorname}</p>  
                  </div>   
               </div>
            </div>
        );
	},
} );