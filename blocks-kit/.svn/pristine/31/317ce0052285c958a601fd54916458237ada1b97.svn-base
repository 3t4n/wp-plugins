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
const {  registerBlockType } = wp.blocks;
const {
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
} = wp.components

const {
    InspectorControls,
    BlockControls,
    ColorPalette,
    AlignmentToolbar,
    RichText,
    URLInput,
    MediaUpload,
} = wp.editor.InspectorControls ? wp.editor : wp.blocks

registerBlockType( 'bk/block-button-block',{  // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
        title: __( 'Button' ), // Block title.
        icon: icons.Button,
        category: 'bk-blocks',
        description:'Advance button with different style options like Size, Shape etc.',
        keywords: [
        __( 'button' ),
        __( 'Blocks Kit' ),
    ],
        attributes: {
        alignment: {
            type: 'string',
            default:'left',
        },
        texbktring: {
        type: 'string',
        selector: 'span',
        },
        fontColor: { 
            type: 'string',
            default: '#fff',
        },
        backgroundColor:{
            type:'string',
        },
        buttonSize:{
            type:'string',
            default:'bk-normal',
        },
        buttonShape:{
            type:'string',
            default:'bk-rounded',
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
    },

    edit( { attributes, className, setAttributes,isSelected } ) {
        const { content, alignment,fontColor,buttoneffect,dualButtontext,button2Target,dulbtnfontColor,dualbtnbgColor,buttonUrl,dualbuttonUrl,buttonSize,buttonShape,backgroundColor,buttonTarget,dualButton, texbktring } = attributes;
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
        function onChangeContent( newContent ) {
            setAttributes( { content: newContent } );
        }
        function onChangeAlignment( newAlignment ) {
            setAttributes( { alignment: newAlignment } );
        }
        function onChangeTextColor( newTextColor ) {
            setAttributes( { tex_color: newTextColor } );
        }
        function onTextChange(texbktring) {
             setAttributes({ texbktring: texbktring  });
        }
        function onTextColorChange(onTextColorChange) {
           setAttributes({ fontColor: onTextColorChange });
        }
        function onBtnBackgroundChange(onBtnBackgroundChange) {
           setAttributes({ backgroundColor: onBtnBackgroundChange });
        }
        function onbuttonTarget(onbuttonTarget){
            setAttributes({ buttonTarget:  onbuttonTarget});
        }
        return ([ isSelected && (
             <BlockControls key="controls">
                <AlignmentToolbar
                    value={ alignment }
                    onChange={ onChangeAlignment }
                />
            </BlockControls>), 
           isSelected && ( <InspectorControls>
                <PanelBody title={'Button Style'} initialOpen={ false }>
                        <ToggleControl
                            label={ __( 'Open link in new window' ) }
                            checked={ buttonTarget }
                            onChange={ onbuttonTarget }
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
                    </PanelBody>
                <PanelBody title={ __( 'Button Text Color' ) }initialOpen={ false }>
                   <div>
                      <h3>Button 1</h3>
                       <ColorPalette 
                        value={fontColor}
                        onChange={onTextColorChange}
                    />  
                   </div>
                </PanelBody>
                <PanelBody title={'Background Color'} initialOpen={ false }>
                    <div>
                        <h3>Button 1</h3>
                        <ColorPalette 
                            value={backgroundColor}
                            onChange={onBtnBackgroundChange}
                        />
                    </div>
                </PanelBody>
            </InspectorControls>),
           <div className={`bk-button-wrapper `} style={ {textAlign: alignment} }>
             <RichText
                tagName="span"
                className={ `bk-button-plus ${buttonSize} ${buttonShape}`}
                value={ texbktring }
                placeholder={ __('Button Text') }
                onChange={ onTextChange }
                isSelected={ isSelected }
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
            ]);
        },

    save( { attributes, className, isSelected } ) {
        const { content, alignment,fontColor,buttoneffect,buttonUrl,dualButtontext,button2Target,dualbuttonUrl,dulbtnfontColor,dualbtnbgColor,texbktring,buttonSize,buttonShape,buttonTarget,dualButton,backgroundColor} = attributes;

        return (
           <div className={`bk-button-wrapper `} style={ {textAlign: alignment} }>
            <a style={ { color: fontColor,backgroundColor: backgroundColor} } rel="noopener noreferrer"
                    className={`bk-button-plus ${ buttonSize } ${buttonShape}`} target={ buttonTarget ? '_blank' : '_self' } href={ buttonUrl }>{ texbktring }</a>
           </div> 
        );
    },
} );