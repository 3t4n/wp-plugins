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

registerBlockType( 'bk/bk-testimonial-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Testimonial' ), // Block title.
	icon: icons.Testimonial,
    description: __( 'Add a testimonial with reviewer name, designation and review text.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        mediaURL: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.testimonial-image-one',
        },
        mediaID: {
            type: 'number',
        },
        testimonialTitle: {
            type: 'array',
            source: 'children',
            selector: '.bk-testimonial-column-one h4',
        },
        position: {
            type: 'array',
            source: 'children',
            selector: '.bk-testimonial-position',
        },
        body: {
            type: 'array',
            source: 'children',
            selector: '.bk-testimonial-body',
        },
        titleColor: {
            type: 'string',
        },
        tsbackground:{
            type:'string',
            default:'#f5f5f5',
        },
        posColor: {
            type: 'string',
        },
        bodyTextColor: {
            type: 'string',
        },
        iconColor: {
            type: 'string',
        },
        alignment:{
            type:'string',
            default:'center',
        }
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { alignment,mediaID,mediaURL,tsbackground,testimonialTitle,position,body,titleColor,posColor,bodyTextColor,iconColor,columns } = attributes;
            const tesitimonialIcon = (
                <div key='button' className={ 'quote-icon' }>
                    <svg viewBox="0 0 246 187.5" style={ { fill: iconColor } }>
                        <path d="M98.5,0h-93C2.5,0,0,2.5,0,5.5v93c0,3,2.5,5.5,5.5,5.5h39c-1.7,15.5-8.8,50-39,50c-3,0-5.5,2.5-5.5,5.5V182c0,3,2.5,5.5,5.5,5.5c5.2,0,98.5-4.5,98.5-89v-93C104,2.5,101.5,0,98.5,0z"/>
                        <path d="M240.5,0h-93c-3,0-5.5,2.5-5.5,5.5v93c0,3,2.5,5.5,5.5,5.5h39c-1.7,15.5-8.8,50-39,50c-3,0-5.5,2.5-5.5,5.5V182c0,3,2.5,5.5,5.5,5.5c5.2,0,98.5-4.5,98.5-89v-93C246,2.5,243.5,0,240.5,0z"/>
                        <path d="M161.3-86.3c3.2,0,3.2-5,0-5C158.1-91.3,158.1-86.3,161.3-86.3L161.3-86.3z"/>
                    </svg>
                </div>
            )
     	return ( [
			isSelected &&(<InspectorControls key={ 'inspector' }>
                <PanelBody>
                    <h3> Text Align </h3>
                    <AlignmentToolbar
                    value={ alignment }
                    onChange={ ( value ) => setAttributes( { alignment: value } ) }
                />
                </PanelBody>
                <PanelBody initialOpen={ false } title={ __( 'Color Settings' ) } >
                    <h2>{ __( 'Background Color' ) }</h2>
                        <ColorPalette
                            value={ tsbackground }
                            onChange={ ( colorValue ) => setAttributes( { tsbackground: colorValue } ) }
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
                   
                    <h2>{ __( 'Position Color' ) }</h2> 
                        <ColorPalette
                            value={ posColor }
                            onChange={ ( colorValue ) => setAttributes( { posColor: colorValue } ) }
                            colors={[
                                { color: '#00d1b2', name: 'teal' },
                                { color: '#3373dc', name: 'royal blue' },
                                { color: '#209cef', name: 'sky blue' },
                                { color: '#22d25f', name: 'green' },
                            ]}
                        />
                </PanelBody>
            </InspectorControls>),
			<div className={ `bk-testimonial` } style={{ backgroundColor:tsbackground }} >
              <div className={ 'bk-testimonial-column-one' } style={{ textAlign:alignment  }}>
                <RichText
                        tagName={'p'}
                        value={ body }
                        placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                        className={ 'bk-testimonial-body' }
                        onChange={ (text) => setAttributes( { body: text } ) }
                        isSelected={ isSelected && editable === 'body' }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
               <div className={`testimonial-inner`}> 
                  <div className={`testimonial-img`}>
                    <MediaUpload
                        onSelect={ ( img ) => setAttributes( 
                            {
                                mediaID: img.id,
                                mediaURL: img.url,
                            }
                        ) }
                        type="image"
                        value={ mediaID }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaID ? icons.upload : <img className="testimonial-image-one" src={ mediaURL } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                  </div>    
                  <div className={`testimonial-detail`}>
                    <RichText
                        tagName={ 'h4' }
                        placeholder={ __('Blocks Kit') }
                        value={ testimonialTitle }
                        onChange={ (text) => setAttributes( { testimonialTitle: text } ) }
                        isSelected={ isSelected && editable === 'testimonialTitle' }
                        style={ {
                            color: titleColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        placeholder={ __('Founder') }
                        value={ position }
                        className={ 'bk-testimonial-position' }
                        onChange={ (text) => setAttributes( { position: text } ) }
                        isSelected={ isSelected && editable === 'position' }
                        style={ {
                            color: posColor
                        } }
                        keepPlaceholderOnFocus
                    />
                  </div>  
               </div> 
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { alignment,mediaURL,testimonialTitle,tsbackground,position,body,titleColor,posColor,bodyTextColor,iconColor,columns,tesitimonialIcon } = attributes;
    	return (
		    <div className={ `bk-testimonial`} style={{ backgroundColor:tsbackground }}>
               <div className={ 'bk-testimonial-column-one' } style={{ textAlign:alignment  }} >
                { body && !! body.length && (
                    <p className={ 'bk-testimonial-body' } style={ { color: bodyTextColor } }>
                        { body }
                    </p>
                ) }
                <div className={`testimonial-inner`}>
                     <div className="testimonial-img">
                        <img class="testimonial-image-one" src={ mediaURL } alt="avatar" />
                     </div>
                     <div className={`testimonial-detail`}>
                        { testimonialTitle && !! testimonialTitle.length && (
                            <h4 style={ { color: titleColor } }>
                                { testimonialTitle }
                            </h4>
                        ) }
                        { position && !! position.length && (
                            <small className={ 'bk-testimonial-position' } style={ { color: posColor } }>
                                { position }
                            </small>
                        ) }
                     </div>   
                </div>
            </div>
            </div>
        );
	},
} );