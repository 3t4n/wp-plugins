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

registerBlockType( 'bk/bk-ourteam-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Our Team' ), // Block title.
	icon: icons.Ourteam,
    description: __("Showcas your team member"),
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks Kit' ),
    ],
  attributes: {
        alignment: {
                type: 'string',
                default:'left',
            },
        href: {
            type: 'url',
        },
        hrefTwo: {
            type: 'url',
        },
        hrefThree: {
            type: 'url',
        },
        mediaID: {
            type: 'number',
        },
        mediaIDTwo: {
            type: 'number',
        },
        mediaIDThree: {
            type: 'number',
        },
        mediaIDFour: {
            type: 'number',
        },
        mediaURL: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.our-team-img-one',
        },
        mediaURLTwo: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.our-team-img-two',
        },
        mediaURLThree: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.our-team-img-three',
        },
        mediaURLFour: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.our-team-img-four',
        },
        slinkColor:{
            type:'string',
        },
        sbColor:{
            type:'string'
        },
        name: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-one h4',
        },
        nameTwo: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-two h4',
        },
        nameThree: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-three h4',
        },
        nameFour: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-four h4',
        },
        position: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-one .bk-our-team-position',
        },
        positionTwo: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-two .bk-our-team-position',
        },
        positionThree: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-three .bk-our-team-position',
        },
        positionFour: {
            type: 'array',
            source: 'children',
            selector: '.bk-our-team-column-four .bk-our-team-position',
        },
       nameColor: {
            type: 'string',
        },
        posColor: {
            type: 'string',
        },
        desColor: {
            type: 'string',
        },
        iconColor: {
            type: 'string',
        },
        columns: {
            type: 'select',
            default: '1'
        },
        shapes: {
            type: 'select',
            default: 'square'
        },
        buttonTarget: {
            type: 'boolean',
            default: false,
        },
        teamonefb:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-one .social-fb',
        },
        teamonetw:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-one .social-tw',
        },
        teamonegp:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-one .social-gp',
        },
        teamonein:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-one .social-in',
        },
        teamtwofb:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-two .social-fb',
        },
        teamtwotw:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-two .social-tw',
        },
        teamtwogp:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-two .social-gp',
        },
        teamtwoin:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-two .social-in',
        },
        teamthreefb:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-three .social-fb',
        },
        teamthreetw:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-three .social-tw',
        },
        teamthreegp:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-three .social-gp',
        },
        teamthreein:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-three .social-in',
        },
         teamfourfb:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-four .social-fb',
        },
        teamfourtw:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-four .social-tw',
        },
        teamfourgp:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-four .social-gp',
        },
        teamfourin:{
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.bk-our-team-column-four .social-in',
        },
        
    },  
        
	edit( { attributes, className, setAttributes,editable,setState, isSelected } ) {    
            const { name,nameTwo,nameThree,des,desTwo,desThree,position,positionTwo,positionThree,href,nameFour,positionFour,
                    hrefTwo,hrefThree,mediaID,mediaIDTwo,mediaIDThree,mediaURL,mediaURLTwo,mediaURLThree,
                    columns,nameColor,posColor,desColor,iconColor,shapes,buttonTarget,alignment,fontColor,
                    teamonefb,teamonegp,teamonein,teamonetw,slinkColor,sbColor,mediaIDFour,mediaURLFour,
                    teamtwofb,teamtwogp,teamtwoin,teamtwotw,
                    teamthreefb,teamthreegp,teamthreein,teamthreetw,
                    teamfourfb,teamfourgp,teamfourin,teamfourtw } = attributes;

        const column = [
            { value: '1', label: __( 'One Column' ) },
            { value: '2', label: __( 'Two Column' ) },
            { value: '3', label: __( 'Three Column' ) },
            { value: '4', label: __( 'Four Column' ) },
        ];
        const shape = [
            { value: 'square', label: __( 'Square' ) },
            { value: 'circle', label: __( 'Circle' ) },
        ];
    	return ( [
			isSelected && (
            <BlockControls key="controls">
                <AlignmentToolbar value={ alignment }  onChange={ ( newAlignment ) => { setAttributes( { alignment: newAlignment } ) } } />
            </BlockControls>
        ),
        isSelected && (
            <InspectorControls key={ 'inspector' }>
                <PanelBody>
                    <ToggleControl
                            label={ __( 'Open link in new window' ) }
                            checked={ buttonTarget }
                            onChange={ ( newShape ) => { setAttributes( { buttonTarget: newShape } ) } }
                        />
                    <SelectControl
                        label={ __( 'Image Shape' ) }
                        value={ shapes }
                        options={ shape.map( ({ value, label }) => ( {
                            value: value,
                            label: label,
                        } ) ) }
                        onChange={ ( newShape ) => { setAttributes( { shapes: newShape } ) } }
                    />
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
                <PanelBody title={ __( 'Color Settings' ) }initialOpen={ false }>
                   
                   <h2> { __( 'Name Color' ) } </h2>
                    <ColorPalette
                        value={ nameColor }
                        onChange={ ( colorValue ) => setAttributes( { nameColor: colorValue } ) }/>
                   
                   <h2> { __( 'Position Color' ) } </h2>
                     <ColorPalette value={posColor} onChange={ ( newColor ) => { setAttributes( { posColor: newColor } ) } } />
                   
                   <h2> { __( 'Social link Color' ) } </h2>
                     <ColorPalette value={slinkColor} onChange={ ( newColor ) => { setAttributes( { slinkColor: newColor } ) } } />
                   
                   <h2> { __( 'Social Background' ) } </h2>
                   
                     <ColorPalette value={sbColor} onChange={ ( newColor ) => { setAttributes( { sbColor: newColor } ) } } />
                    
                </PanelBody>
            </InspectorControls>
        ),
        <div key={'editable'} className={ `bk-our-team column-${columns} image-${ shapes }`} style={{textAlign:alignment}}>
            <div className={ 'box-item bk-our-team-column-one' }>
                <div>
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
                                { ! mediaID ? icons.upload : <img className="our-team-img-one" src={ mediaURL } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ name }
                    onChange={ (text) => setAttributes( { name: text } ) }
                    placeholder={ __('Blocks Kit') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ position }
                    className={ 'bk-our-team-position' }
                    onChange={ (text) => setAttributes( { position: text } ) }
                    placeholder={ __('Founder') }
                    style={ {
                        color: posColor
                    } }
                    keepPlaceholderOnFocus
                />
                <div className="team-follow">   
                    <ul>
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-facebook-square`}></span></a></li>
                    { isSelected && (
                        <form onSubmit={ ( event ) => event.preventDefault() } className={``} >
                            <URLInput
                                className={`button-url`}
                                value={ teamonefb }
                                onChange={ ( value ) => setAttributes( { teamonefb: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                   <li><a style={{color:slinkColor,backgroundColor:sbColor}}> <span className={ `fab fa-twitter-square`}></span></a></li>
                     { isSelected && (<form 
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamonetw }
                                onChange={ ( value ) => setAttributes( { teamonetw: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                   <li><a style={{color:slinkColor,backgroundColor:sbColor}}> <span className={ `fab fa-google-plus`}></span></a></li>
                     { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamonegp }
                                onChange={ ( value ) => setAttributes( { teamonegp: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-linkedin`}></span></a></li>
                    { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamonein }
                                onChange={ ( value ) => setAttributes( { teamonein: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    </ul>
                  </div>
            </div>
        { (columns >= 2) && (  <div className={ 'box-item bk-our-team-column-two' }>
                <div>
                    <MediaUpload
                        onSelect={ ( img ) => setAttributes( 
                            {
                                mediaIDTwo: img.id,
                                mediaURLTwo: img.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDTwo }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDTwo ? icons.upload : <img className="our-team-img-two" src={ mediaURLTwo } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameTwo }
                    onChange={ (text) => setAttributes( { nameTwo: text } ) }
                    placeholder={ __('Blocks Kit') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ positionTwo }
                    className={ 'bk-our-team-position' }
                    onChange={ (text) => setAttributes( { positionTwo: text } ) }
                    placeholder={ __('Manager') }
                    style={ {
                        color: posColor
                    } }
                    keepPlaceholderOnFocus
                />
                <div className="team-follow">   
                 <ul>
                  <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-facebook-square`}></span></a></li>
                    { isSelected && (
                        <form onSubmit={ ( event ) => event.preventDefault() } className={``} >
                            <URLInput
                                className={`button-url`}
                                value={ teamtwofb }
                                onChange={ ( value ) => setAttributes( { teamtwofb: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-twitter-square`}></span></a></li>
                     { isSelected && (<form 
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamtwotw }
                                onChange={ ( value ) => setAttributes( { teamtwotw: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-google-plus`}></span></a></li>
                     { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamtwogp }
                                onChange={ ( value ) => setAttributes( { teamtwogp: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                   <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-linkedin`}></span></a></li>
                    { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamtwoin }
                                onChange={ ( value ) => setAttributes( { teamtwoin: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    </ul>
              </div></div>)}
        { (columns >=3 ) && (  <div className={ 'box-item bk-our-team-column-three' }>
                <div>
                    <MediaUpload
                        onSelect={ ( img ) => setAttributes( 
                            {
                                mediaIDThree: img.id,
                                mediaURLThree: img.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDThree }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDThree ? icons.upload : <img className="our-team-img-three" src={ mediaURLThree } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameThree }
                    onChange={ (text) => setAttributes( { nameThree: text } ) }
                    placeholder={ __('Blocks Kit') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ positionThree }
                    className={ 'bk-our-team-position' }
                    onChange={ (text) => setAttributes( { positionThree: text } ) }
                    placeholder={ __('Programmer') }
                    style={ {
                        color: posColor
                    } }
                    keepPlaceholderOnFocus
                />
            <div className="team-follow">   
                <ul>
                  <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-facebook-square`}></span></a></li>
                    { isSelected && (
                        <form onSubmit={ ( event ) => event.preventDefault() } className={``} >
                            <URLInput
                                className={`button-url`}
                                value={ teamthreefb }
                                onChange={ ( value ) => setAttributes( { teamthreefb: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                   <li><a style={{color:slinkColor,backgroundColor:sbColor}}> <span className={ `fab fa-twitter-square`}></span></a></li>
                     { isSelected && (<form 
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamthreetw }
                                onChange={ ( value ) => setAttributes( { teamthreetw: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                     <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-google-plus`}></span></a></li>
                     { isSelected && (<form
                            onSu style={{color:slinkColor,backgroundColor:sbColor}}bmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamthreegp }
                                onChange={ ( value ) => setAttributes( { teamthreegp: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                     <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-linkedin`}></span></a></li>
                    { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamthreein }
                                onChange={ ( value ) => setAttributes( { teamthreein: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    </ul>
                  </div>    
            </div>)}
        
        { (columns >= 4) && (  <div className={ 'box-item bk-our-team-column-four' }>
                <div>
                    <MediaUpload
                        onSelect={ ( img ) => setAttributes( 
                            {
                                mediaIDFour: img.id,
                                mediaURLFour: img.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDFour }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDFour ? icons.upload : <img className="our-team-img-four" src={ mediaURLFour } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                    </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameFour }
                    onChange={ (text) => setAttributes( { nameFour: text } ) }
                    placeholder={ __('Blocks Kit') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ positionFour }
                    className={ 'bk-our-team-position' }
                    onChange={ (text) => setAttributes( { positionFour: text } ) }
                    placeholder={ __('Tester') }
                    style={ {
                        color: posColor
                    } }
                    keepPlaceholderOnFocus
                />
                <div className="team-follow">   
                 <ul>
                  <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-facebook-square`}></span></a></li>
                    { isSelected && (
                        <form onSubmit={ ( event ) => event.preventDefault() } className={``} >
                            <URLInput
                                className={`button-url`}
                                value={ teamfourfb }
                                onChange={ ( value ) => setAttributes( { teamfourfb: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-twitter-square`}></span></a></li>
                     { isSelected && (<form 
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamfourtw }
                                onChange={ ( value ) => setAttributes( { teamfourtw: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-google-plus`}></span></a></li>
                     { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamfourgp }
                                onChange={ ( value ) => setAttributes( { teamfourgp: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                   <li><a style={{color:slinkColor,backgroundColor:sbColor}}><span className={ `fab fa-linkedin`}></span></a></li>
                    { isSelected && (<form
                            onSubmit={ ( event ) => event.preventDefault() }
                            className={``}
                          >
                            <URLInput
                                className="button-url"
                                value={ teamfourin }
                                onChange={ ( value ) => setAttributes( { teamfourin: value } ) }
                            />
                            <IconButton
                                // icon="editor-break"
                                // label={ __( 'Apply' ) }
                                // type="submit"
                            />
                        </form>)}
                    </ul>
              </div></div>)}
        </div>
    ]);
	},

	save( { attributes, className, setAttributes } ) {
		const { name,nameTwo,nameThree,des,desTwo,desThree,position,positionTwo,positionThree,href,nameFour,positionFour,
                hrefTwo,hrefThree,mediaID,mediaIDTwo,mediaIDThree,mediaURL,mediaURLTwo,mediaURLThree,
                columns,nameColor,posColor,desColor,iconColor,shapes,buttonTarget,alignment,fontColor,
                teamonefb,teamonegp,teamonein,teamonetw,sbColor,slinkColor,mediaIDFour,mediaURLFour,
                teamtwofb,teamtwogp,teamtwoin,teamtwotw,
                teamthreefb,teamthreegp,teamthreein,teamthreetw,
                teamfourfb,teamfourgp,teamfourin,teamfourtw } = attributes;

		return (
		    <div className={ `bk-our-team column-${columns} image-${ shapes }`} style={{textAlign:alignment}}>
            <div className={ 'box-item bk-our-team-column-one' }>
                { mediaURL && <img class="our-team-img-one" src={ mediaURL } alt="avatar" /> }
                { name && !! name.length && (
                    <h4 style={ { color: nameColor } }>
                        { name }
                    </h4>
                ) }
                { position && !! position.length && (
                    <p className={ 'bk-our-team-position' } style={ { color: posColor } }>
                        { position }
                    </p>
                ) }
               <div className="team-follow">
                 <ul>
                    <li><a className={`social-fb teamonefb`} style={{color:slinkColor,backgroundColor:sbColor}}  href={ teamonefb } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-facebook-square"></i></a></li>
                    <li><a className={`social-tw teamonetw`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamonetw } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-twitter-square"></i></a></li>
                    <li><a className={`social-gp teamonegp `} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamonegp } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-google-plus"></i></a></li>
                    <li><a className={`social-in teamonein`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamonein } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-linkedin"></i></a></li>
                 </ul>
              </div>   
            </div>
            { (columns >= 2) && (
                <div className={ 'box-item bk-our-team-column-two' }>
                    { mediaURLTwo && <img class="our-team-img-two" src={ mediaURLTwo } alt="avatar" /> }
                    { nameTwo && !! nameTwo.length && (
                        <h4 style={ { color: nameColor } }>
                            { nameTwo }
                        </h4>
                    ) }
                    { positionTwo && !! positionTwo.length && (
                        <p className={ 'bk-our-team-position' } style={ { color: posColor } }>
                            { positionTwo }
                        </p>
                    ) }
                    <div className="team-follow">
                        <ul>
                         <li><a className={`social-fb teamtwofb`} style={{color:slinkColor,backgroundColor:sbColor}}  href={ teamtwofb } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-facebook-square"></i></a></li>
                         <li><a className={`social-tw teamtwotw`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamtwotw } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-twitter-square"></i></a></li>
                         <li><a className={`social-gp teamtwogp `} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamtwogp } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-google-plus"></i></a></li>
                         <li><a className={`social-in teamtwoin`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamtwoin } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-linkedin"></i></a></li>   
                       </ul> 
                    </div> 
                    </div>
            ) }
            { columns >=3  && (
                <div className={ 'box-item bk-our-team-column-three' }>
                    { mediaURLThree && <img class="our-team-img-three" src={ mediaURLThree } alt="avatar" /> }
                    { nameThree && !! nameThree.length && (
                        <h4 style={ { color: nameColor } }>
                            { nameThree }
                        </h4>
                    ) }
                    { positionThree && !! positionThree.length && (
                        <p className={ 'bk-our-team-position' } style={ { color: posColor } }>
                            { positionThree }
                        </p>
                    ) }
                    <div className="team-follow">
                        <ul>
                         <li><a className={`social-fb teamthreefb`} style={{color:slinkColor,backgroundColor:sbColor}}  href={ teamthreefb } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-facebook-square"></i></a></li>
                         <li><a className={`social-tw teamthreetw`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamthreetw } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-twitter-square"></i></a></li>
                         <li><a className={`social-gp teamthreegp `} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamthreegp } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-google-plus"></i></a></li>
                         <li><a className={`social-in teamthreein`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamthreein } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-linkedin"></i></a></li>   
                        </ul>
                    </div> 
                    </div>
            ) }
             { columns >=4  && (
                <div className={ 'box-item bk-our-team-column-four' }>
                    { mediaURLFour && <img class="our-team-img-four" src={ mediaURLFour } alt="avatar" /> }
                    { nameFour && !! nameFour.length && (
                        <h4 style={ { color: nameColor } }>
                            { nameFour }
                        </h4>
                    ) }
                    { positionFour && !! positionFour.length && (
                        <p className={ 'bk-our-team-position' } style={ { color: posColor } }>
                            { positionFour }
                        </p>
                    ) }
                    <div className="team-follow">
                        <ul>
                         <li><a className={`social-fb teamfourfb`} style={{color:slinkColor,backgroundColor:sbColor}}  href={ teamfourfb } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-facebook-square"></i></a></li>
                         <li><a className={`social-tw teamfourtw`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamfourtw } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-twitter-square"></i></a></li>
                         <li><a className={`social-gp teamfourgp `} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamfourgp } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-google-plus"></i></a></li>
                         <li><a className={`social-in teamfourin`} style={{color:slinkColor,backgroundColor:sbColor}} href={ teamfourin } target={ buttonTarget ? '_blank' : '_self' }><i className="fab fa-linkedin"></i></a></li>   
                        </ul>
                    </div> 
                    </div>
            ) }
        </div>
        );
	},
} );