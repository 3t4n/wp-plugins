/**
 * BLOCK: Button
 *
 * Registering a basic Button block with Gutenberg.
 *
 * Styles:
 *        style.css — Frontend styles for the block.
 */
import './style.scss';
import icons from './components/icons';
const { __, setLocaleData } = wp.i18n; // Import __() from wp.i18n
// const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { registerBlockType } = wp.blocks;
const {
	SelectControl,
	ToggleControl,
	Button,
	PanelBody,
    PanelColor,
} = wp.components;

const {
	InspectorControls,
	BlockControls,
	ColorPalette,
	AlignmentToolbar,
	RichText,
	MediaUpload,
} = wp.editor.InspectorControls ? wp.editor : wp.blocks;

registerBlockType( 'bk/bk-info-block', { // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Info Box' ), // Block title.
	icon: 'info',
    description:'Showcase your Products,Services or Features of the products',
	category: 'bk-blocks',
    keywords: [
        __( 'landing' ),
        __( 'comparison' ),
        __( 'Blocks kit' ),
    ],
	attributes: {
		mediaURL: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.infobox-image',
        },
        mediaURLTwo: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-infobox-col-two .infobox-image',
            attribute: 'src',
        },
        mediaURLThree: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-infobox-col-three .infobox-image',
            attribute: 'src',
        },
        mediaURLFour: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-infobox-col-four .infobox-image',
            attribute: 'src',
        },
        mediaURLFive: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-infobox-col-five .infobox-image',
            attribute: 'src',
        },
        mediaURLSix: {
            type: 'string',
            source: 'attribute',
            selector: '.bk-infobox-col-six .infobox-image',
            attribute: 'src',
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
        mediaIDFive: {
            type: 'number',
        },
        mediaIDSix: {
            type: 'number',
        },
        name: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-one h4',
        },
        nameTwo: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-two h4',
        },
        nameThree: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-three h4',
        },
        nameFour: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-four h4',
        },
        nameFive: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-five h4',
        },
        nameSix: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-col-six h4',
        },
        desc: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-desc',
        },
        descTwo: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-descTwo',
        },
        descThree: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-descThree',
        },
        descFour: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-descFour',
        },
        descFive: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-descFive',
        },
        descSix: {
            type: 'array',
            source: 'children',
            selector: '.bk-infobox-descSix',
        },
        nameColor:{
            type:'string',
        },
        descColor:{
            type:'string',
        },
        columns: {
            type: 'select',
            default: '3',
        },
        alignment: {
            type: 'string',
            default:'left'
        },
    },

	edit( { attributes, className, setAttributes, isSelected } ) {
		const { alignment,mediaID,mediaIDTwo,
                mediaIDThree,mediaIDFour,mediaIDFive,mediaIDSix,
                mediaURL,mediaURLTwo,mediaURLThree,mediaURLFour,mediaURLFive,mediaURLSix,
                desc,descTwo,descThree,descFour,descFive,descSix,
                name,nameTwo,nameThree,nameFour,nameFive,nameSix,nameColor,descColor,columns} = attributes;
        const column = [
                { value: '1', label: __( 'One Column' ) },
                { value: '2', label: __( 'Two Column' ) },
                { value: '3', label: __( 'Three Column' ) },
                { value: '4', label: __( 'Four Column' ) },
                { value: '5', label: __( 'Five Column' ) },
                { value: '6', label: __( 'Six Column' ) },
            ];
	
            function onSelectImage(media){
                setAttributes( { mediaURL: media.url, mediaID: media.id } )
            }

		return ( [
			isSelected && ( <InspectorControls>
				<PanelBody title={'InfoBox Settings'}>
                    <div>
                        <h3>Text alignment</h3>
                        <AlignmentToolbar
                            value={ alignment }
                            onChange={ (alignment) => setAttributes( { alignment: alignment } ) }
                        />
                    </div>
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
                    
                    <h2> { __( 'Title Color' ) } </h2>
                        <ColorPalette
                            value={ nameColor }
                            onChange={ ( colorValue ) => setAttributes( { nameColor: colorValue } ) }
                        />
                    
                    <h2> { __( 'Description Color' ) } </h2>
                        <ColorPalette
                            value={ descColor }
                            onChange={ ( colorValue ) => setAttributes( { descColor: colorValue } ) }
                        />
                 </PanelBody>  
			</InspectorControls>),
			<div className={ `bk-infobox column-${columns} ` } style={{ textAlign: alignment }}>
               <div className={ 'box-item bk-infobox-col-one' } >
				<div>
				  <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaID: media.id,
                                mediaURL: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaID }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaID ? icons.upload : <img className="infobox-image" data-src={ mediaURL } src={ mediaURL } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
				</div>
                <RichText
                    tagName={ 'h4' }
                    value={ name }
                    onChange={ (text) => setAttributes( { name: text } ) }
                    placeholder={ __('1st Title') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ desc }
                    className={ 'bk-infobox-desc' }
                    onChange={ (text) => setAttributes( { desc: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
			</div>
           { (columns >= 2)  && ( <div className={ 'box-item bk-infobox-col-two' } >
                <div>
                    <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaIDTwo: media.id,
                                mediaURLTwo: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDTwo }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDTwo ? icons.upload : <img className="infobox-image" data-src={mediaURLTwo} src={ mediaURLTwo } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameTwo }
                    onChange={ (text) => setAttributes( { nameTwo: text } ) }
                    placeholder={ __('2nd Title') }
                    style={ {
                        color: nameColor
                     } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ descTwo }
                    className={ 'bk-infobox-descTwo' }
                    onChange={ (text) => setAttributes( { descTwo: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
            </div>)}
          { (columns >= 3)  && (  <div className={ 'box-item bk-infobox-col-three'} >
                <div>
                    <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaIDThree: media.id,
                                mediaURLThree: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDThree }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDThree ? icons.upload : <img className="infobox-image" data-src={ mediaURLThree } src={ mediaURLThree } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameThree }
                    onChange={ (text) => setAttributes( { nameThree: text } ) }
                    placeholder={ __('3rd Title') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ descThree }
                    className={ 'bk-infobox-descThree' }
                    onChange={ (text) => setAttributes( { descThree: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
            </div>)}
          { (columns >= 4)  && (  <div className={ 'box-item bk-infobox-col-four' }>
                <div>
                    <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaIDFour: media.id,
                                mediaURLFour: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDFour }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDFour ? icons.upload : <img className="infobox-image" data-src={ mediaURLFour } src={ mediaURLFour } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameFour }
                    onChange={ (text) => setAttributes( { nameFour: text } ) }
                    placeholder={ __('4th Title') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ descFour }
                    className={ 'bk-infobox-descFour' }
                    onChange={ (text) => setAttributes( { descFour: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
            </div>)}
        { (columns >= 5)  && (<div className={ 'box-item bk-infobox-col-five' }>
                <div>
                    <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaIDFive: media.id,
                                mediaURLFive: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDFive }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDFive ? icons.upload : <img className="infobox-image" data-src={ mediaURLFive } src={ mediaURLFive } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameFive }
                    onChange={ (text) => setAttributes( { nameFive: text } ) }
                    placeholder={ __('5th Title') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ descFive }
                    className={ 'bk-infobox-descFive' }
                    onChange={ (text) => setAttributes( { descFive: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
            </div>)}
         { (columns >= 6)  && (   <div className={ 'box-item bk-infobox-col-six' }>
                <div>
                    <MediaUpload
                        buttonProps={ {
                            className: 'change-image'
                        } }
                        onSelect={ ( media ) => setAttributes( 
                            {
                                mediaIDSix: media.id,
                                mediaURLSix: media.url,
                            }
                        ) }
                        type="image"
                        value={ mediaIDSix }
                        render={ ( { open } ) => (
                            <Button onClick={ open }>
                                { ! mediaIDSix ? icons.upload : <img className="infobox-image" data-src={ mediaURLSix } src={ mediaURLSix } alt='avatar' /> }
                            </Button>
                        ) }
                    >
                  </MediaUpload>
                </div>
                <RichText
                    tagName={ 'h4' }
                    value={ nameSix}
                    onChange={ (text) => setAttributes( { nameSix: text } ) }
                    placeholder={ __('6th Title') }
                    style={ {
                        color: nameColor
                    } }
                    keepPlaceholderOnFocus
                />
                <RichText
                    tagName={'p'}
                    value={ descSix }
                    className={ 'bk-infobox-descSix' }
                    onChange={ (text) => setAttributes( { descSix: text } ) }
                    placeholder={ __('Blocks Kit is an additional Gutenberg Blocks for Freelancers with advanced styles and options.') }
                    style={ {
                        color: descColor
                    } }
                    keepPlaceholderOnFocus
                />
            </div>)}
            </div>,
		] );
	},

	save( { attributes } ) {
		const { alignment,mediaIDFour,mediaIDFive,mediaIDSix,
                mediaURL,mediaURLTwo,mediaURLThree,mediaURLFour,mediaURLFive,mediaURLSix,
                name,nameTwo,nameThree,nameFour,nameFive,nameSix,
                desc,descTwo,descThree,descFour,descFive,descSix,
                nameColor,descColor,columns } = attributes;

		return (
		       <div className={ `bk-infobox column-${columns}` } style={{ textAlign: alignment }}>
                   <div className={ 'box-item bk-infobox-col-one' }>
                    { mediaURL && !! mediaURL.length && <img class="infobox-image" src={ mediaURL } alt="avatar" /> }
                    { name && !! name.length && <h4 style={ { color: nameColor } }>{ name }</h4>} 
                    { desc && !! desc.length && <p className={ 'bk-infobox-desc' } style={{ color:descColor}}>{ desc }</p>}
                   </div>
                  { (columns >= 2) && ( <div className={ 'box-item bk-infobox-col-two' }>
                    { mediaURLTwo && !! mediaURLTwo.length && <img class="infobox-image" src={ mediaURLTwo } alt="avatar" /> }
                    { nameTwo && !! nameTwo.length && <h4 style={ { color: nameColor } }>{ nameTwo }</h4> }
                    { descTwo && !! descTwo.length && <p className={ 'bk-infobox-descTwo' } style={{ color:descColor}}>{ descTwo }</p> }
                   </div>)}
                  { (columns >= 3) && ( <div className={ 'box-item bk-infobox-col-three' }>
                    { mediaURLThree && !! mediaURLThree.length && <img class="infobox-image" src={ mediaURLThree } alt="avatar" /> }
                    { nameThree && !! nameThree.length && <h4 style={ { color: nameColor } }>{ nameThree }</h4> }
                    { descTwo && !! nameThree.length && <p className={ 'bk-infobox-descThree' } style={{ color:descColor }}>{ descThree }</p> }
                   </div>)}
                 { (columns >= 4) && (  <div className={ 'box-item bk-infobox-col-four' }>
                    { mediaURLFour && !! mediaURLFour.length && <img class="infobox-image" src={ mediaURLFour } alt="avatar" /> }
                    { nameFour && !! nameFour.length && <h4 style={ { color: nameColor } }>{ nameFour }</h4> }
                    { descFour && !! descFour.length && <p className={ 'bk-infobox-descFour' } style={{ color:descColor }}>{ descFour }</p> }
                   </div>)}
                 { (columns >= 5) && (  <div className={ 'box-item bk-infobox-col-five' }>
                    { mediaURLFive && !! mediaURLFive.length && <img class="infobox-image" src={ mediaURLFive } alt="avatar" /> }
                    { nameFive && !! nameFive.length && <h4 style={ { color: nameColor } }>{ nameFive }</h4> }
                    { descFive && !! nameSix.length && <p className={ 'bk-infobox-descFive' } style={{ color:descColor}}>{ descFive }</p> }
                   </div>)}
                 { (columns >= 6) && (  <div className={ 'box-item bk-infobox-col-six' }>
                     { mediaURLSix && !! mediaURLSix.length && <img class="infobox-image" src={ mediaURLSix } alt="avatar" /> }
                     { nameSix && !! nameSix.length &&  <h4 style={ { color: nameColor } }>{ nameSix }</h4> }
                     { descSix && !! descSix.length &&  <p className={ 'bk-infobox-descSix' } style={{ color:descColor }}>{ descSix }</p> }
                   </div>)}
               </div>
       );
	},
} );
