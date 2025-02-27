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
    ColorPalette,
} = wp.components;

const {
	InspectorControls,
    BlockControls,
    AlignmentToolbar,
    RichText,
    URLInput,
    MediaUpload,
} = wp.editor

registerBlockType( 'bk/bk-author-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Author Box' ), // Block title.
	icon: icons.Author,
    description: __( 'Add an author biography with social media links to follow.' ),
	category: 'bk-blocks',
    keywords: [
        __( 'author' ),
        __( 'admin' ),
        __( 'Blocks Kit' ),
    ],
	attributes: {
        mediaURL: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.author-image-one',
        },
        mediaID: {
            type: 'number',
        },
        authorTitle: {
            type: 'array',
            source: 'children',
            selector: '.bk-author-column-one h2',
        },
        position: {
            type: 'array',
            source: 'children',
            selector: '.bk-author-position',
        },
        buttonUrlone: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.social-fb',
        },
        buttonUrltwo: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.social-gp',
        },
        buttonUrlthree: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.social-ln',
        },
        buttonUrlfour: {
            type: 'string',
            source: 'attribute',
             attribute: 'href',
            selector: '.social-tw',
        },
        body: {
            type: 'array',
            source: 'children',
            selector: '.bk-author-body',
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
        buttonTarget: {
            type: 'boolean',
            default: true,
        },
        showfb:{
            type:'boolean',
            default:false,            
        },
        showgp:{
            type:'boolean',
            default:false,            
        },
        showln:{
            type:'boolean',
            default:false,            
        },
        showtw:{
            type:'boolean',
            default:false,            
        },
        alignment:{
            type:'string',
            default:'left',
        }
    },
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { alignment,showfb,showtw,showln,showgp,buttonTarget,buttonUrlone,buttonUrltwo,buttonUrlthree,buttonUrlfour,mediaID,mediaURL,tsbackground,authorTitle,position,body,titleColor,posColor,bodyTextColor,iconColor,columns } = attributes;
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
                <PanelBody initialOpen={ false } title={ __( 'Social Media Settings' ) } >
                    <ToggleControl
                        label={ __( 'Facebook' ) }
                        checked={ showfb }
                        onChange={ ( btnTarget ) => setAttributes( { showfb: btnTarget } ) }
                    />
                    <ToggleControl
                        label={ __( 'Google Plus' ) }
                        checked={ showgp }
                        onChange={ ( btnTarget ) => setAttributes( { showgp: btnTarget } ) }
                    />
                    <ToggleControl
                        label={ __( 'Twitter' ) }
                        checked={ showtw }
                        onChange={ ( btnTarget ) => setAttributes( { showtw: btnTarget } ) }
                    />
                    <ToggleControl
                        label={ __( 'Linkedin' ) }
                        checked={ showln }
                        onChange={ ( btnTarget ) => setAttributes( { showln: btnTarget } ) }
                    />
                    <hr/>
                    <ToggleControl
                        label={ __( 'Open link in new window' ) }
                        checked={ buttonTarget }
                        onChange={ ( btnTarget ) => setAttributes( { buttonTarget: btnTarget } ) }
                    />
                </PanelBody>
                <PanelBody initialOpen={ false } title={ __( 'Color Settings' ) } >
                        <h2> { __( 'Background Color' ) } </h2>
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

                        <h2> { __( 'Content Color' ) } </h2>
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

                        <h2> { __( 'Title Color' ) } </h2>
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

                        <h2> { __( 'Position Color' ) } </h2>
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
			<div className={ `bk-author` } style={{ backgroundColor:tsbackground }} >
              <div className={ 'bk-author-column-one' } style={{ textAlign:alignment  }}>
                <div className={`author-img`}>
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
                                { ! mediaID ? icons.upload : <img className="author-image-one" src={ mediaURL } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                  </div> 
                <div className={`author-inner`}> 
                  <div className={`author-detail`}>
                    <RichText
                        tagName={ 'h2' }
                        placeholder={ __('Blocks Kit') }
                        value={ authorTitle }
                        onChange={ (text) => setAttributes( { authorTitle: text } ) }
                        isSelected={ isSelected && editable === 'authorTitle' }
                        style={ {
                            color: titleColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    <RichText
                        tagName={'p'}
                        placeholder={ __('Founder') }
                        value={ position }
                        className={ 'bk-author-position' }
                        onChange={ (text) => setAttributes( { position: text } ) }
                        isSelected={ isSelected && editable === 'position' }
                        style={ {
                            color: posColor
                        } }
                        keepPlaceholderOnFocus
                    />
                  </div> 
                  <div className="author-desc">
                  <RichText
                        tagName={'p'}
                        value={ body }
                        placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                        className={ `bk-author-body` }
                        onChange={ (text) => setAttributes( { body: text } ) }
                        isSelected={ isSelected && editable === 'body' }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                  </div>  
                  <div className="author-follow">   
                  <RichText
                        tagName={'i'}
                        className={ `fab fa-facebook-square ${showfb ? 'is-inline' : 'is-none'}`}
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    { isSelected && (
                        <form onSubmit={ ( event ) => event.preventDefault() } className={`${showfb ? 'is-inline' : 'is-none'}`} >
                            <TextControl
                                type="url"
                                className={`button-url`}
                                value={ buttonUrlone }
                                onChange={ ( value ) => setAttributes( { buttonUrlone: value } ) }
                            />
                        </form>)}
                    <RichText
                        tagName={'i'}
                        className={ `fab fa-twitter-square ${showtw ? 'is-inline' : 'is-none'}` }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                     { isSelected && (<form 
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={`${showtw ? 'is-inline' : 'is-none'}`}
                          >
                            <TextControl
                                type="url"
                                className="button-url"
                                value={ buttonUrltwo }
                                onChange={ ( value ) => setAttributes( { buttonUrltwo: value } ) }
                            />
                        </form>)}
                    <RichText
                        tagName={'i'}
                        className={ `fab fa-google-plus ${showgp ? 'is-inline' : 'is-none'}` }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                     { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={`${showgp ? 'is-inline' : 'is-none'}`}
                          >
                            <TextControl
                                type="url"
                                className="button-url"
                                value={ buttonUrlthree }
                                onChange={ ( value ) => setAttributes( { buttonUrlthree: value } ) }
                            />
                        </form>)}
                    <RichText
                        tagName={'i'}
                        className={ `fab fa-linkedin ${showln ? 'is-inline' : 'is-none'}` }
                        style={ {
                            color: bodyTextColor
                        } }
                        keepPlaceholderOnFocus
                    />
                    { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={`${showln ? 'is-inline' : 'is-none'}`}
                          >
                            <TextControl
                                type="url"
                                className="button-url"
                                value={ buttonUrlfour }
                                onChange={ ( value ) => setAttributes( { buttonUrlfour: value } ) }
                            />
                        </form>)}
                  </div>  
               </div> 
            </div>
        </div>
      ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { alignment,showfb,showtw,showln,showgp,buttonTarget,buttonUrlone,buttonUrltwo,buttonUrlthree,buttonUrlfour,mediaID,mediaURL,tsbackground,authorTitle,position,body,titleColor,posColor,bodyTextColor,iconColor,columns } = attributes;
    	return (
		    <div className={ `bk-author`} style={{ backgroundColor:tsbackground }}>
               <div className={ 'bk-author-column-one' } style={{ textAlign:alignment  }} >
                     <div className="author-img">
                        <img class="author-image-one" src={ mediaURL } alt="avatar" />
                     </div>
                <div className={`author-inner`}>
                    <div className={`author-detail`}>
                        { authorTitle && !! authorTitle.length && (
                            <h2 style={ { color: titleColor } }>
                                { authorTitle }
                            </h2>
                        ) }
                        { position && !! position.length && (
                            <h6 className={ 'bk-author-position' } style={ { color: posColor } }>
                                { position }
                            </h6>
                        ) }
                     </div>
                    <div className="author-desc">
                    { body && !! body.length && (
                        <p className={ 'bk-author-body' } style={ { color: bodyTextColor } }>
                            { body }
                        </p>
                    ) }
                    </div>
                    <div className="author-follow">
                        <a className={`social-fb ${showfb ? ' ' : 'is-none'}`} rel="noopener noreferrer" style={ { color: bodyTextColor } }  href={ buttonUrlone } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-facebook-square"></i></a>
                        <a className={`social-gp ${showgp ? ' ' : 'is-none'}`} rel="noopener noreferrer" style={ { color: bodyTextColor } } href={ buttonUrltwo } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-twitter-square"></i></a>
                        <a className={`social-ln ${showln ? ' ' : 'is-none'}`} rel="noopener noreferrer" style={ { color: bodyTextColor } } href={ buttonUrlthree } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-google-plus"></i></a>   
                        <a className={`social-tw ${showtw ? ' ' : 'is-none'}`} rel="noopener noreferrer" style={ { color: bodyTextColor } } href={ buttonUrlfour } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-linkedin"></i></a>
                    </div>    
                </div>
            </div>
            </div>
        );
	},
} );
