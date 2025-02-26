const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InspectorControls, useBlockProps, PanelColorSettings } = wp.blockEditor;
const { PanelBody, Panel, TextControl, SelectControl, RangeControl } = wp.components;
import metadata from './block.json';

const GetCTA = (props) => {
    const { attributes } = props;
    const style = {
        '--gbpe-cta-ve-space': attributes.space_ve + 'px',
        '--gbpe-cta-ho-space': attributes.space_ho + 'px',
    };

    const buttonStyle = {
        '--gbpe-cta-primary-color': attributes.space_ve + 'px',
        '--gbpe-cta-border-radius': attributes.border_radius + 'px',
        backgroundColor: attributes.button_color, 
        color: attributes.background_color
    }

    return (
        <>
            <div className="gbpe-cta__inner" style={style}>
                <div className="gbpe-cta__desc">
                    <h3 className="gbpe-cta__title">{attributes.cta_title}</h3>
                    <p className="gbpe-cta__text">{attributes.cta_text}</p>
                </div>
                <div className="gbpe-cta__link">
                    <a href={( '#' !== attributes.button_link) ? `/${attributes.button_link}` : '#'} alt={attributes.button_text} className={attributes.class} style={buttonStyle} target="_blank" rel="noopener">{attributes.button_text}</a>
                </div>
            </div>
        </>
    );
};

/**
 * Block - Create an account
 */
registerBlockType(metadata, {
    edit: (props) => {        
        const { attributes, setAttributes } = props;
        const blockProps = useBlockProps({
            className: `gbpe-cta ${attributes.cta_style}`
        });
        const style = {
            '--gbpe-cta-space-top': attributes.space_top + 'px',
            '--gbpe-cta-space-bottom': attributes.space_bottom + 'px'
        };

        const onChangeValueSpaceTop = ( newValue ) => {
            setAttributes( { space_top: String(newValue)} )
        }

        const onChangeValueSpaceBottom = ( newValue ) => {
            setAttributes( { space_bottom: String(newValue)} )
        }

        const onChangeValueSpaceVe = ( newValue ) => {
            setAttributes( { space_ve: String(newValue)} )
        }

        const onChangeValueSpaceHo = ( newValue ) => {
            setAttributes( { space_ho: String(newValue)} )
        }

        const onChangeValue = (attribute) => (newValue) => {
            setAttributes({ [attribute]: String(newValue) });
        };

        return ( 
            <>
             <InspectorControls>
                <PanelBody
                    title={__("Settings", 'goodblocks')}
                    initialOpen={true} >

                    <Panel>
                        <TextControl
                            label={ __( 'CTA title', 'goodblocks' ) }
                            value={ attributes.cta_title }
                            onChange={ ( value ) => setAttributes( { cta_title: value } ) }
                        />
                    </Panel>

                    <Panel>
                        <TextControl
                            label={ __( 'CTA text', 'goodblocks' ) }
                            value={ attributes.cta_text }
                            onChange={ ( value ) => setAttributes( { cta_text: value } ) }
                        />
                    </Panel>

                    <Panel>
                        <SelectControl
                            label={ __( 'CTA style', 'goodblocks' ) }
                            value={ attributes.cta_style }
                            options={ [
                                { label: 'Default', value: 'light', disabled: true },
                                { label: 'Light', value: 'light' },
                                { label: 'Dark', value: 'dark' },
                            ] }
                            onChange={ ( value ) => setAttributes( { cta_style: value } ) }
                        />
                    </Panel>

                    <Panel> 
                        <RangeControl
                            label={ __( 'Space top', 'goodblocks' ) }
                            value={ Number(attributes.space_top) }
                            onChange={ onChangeValueSpaceTop }
                            min={ 0 }
                            max={ 100 }
                            step={ 1 }
                        />
                    </Panel>

                    <Panel> 
                        <RangeControl
                            label={ __( 'Space bottom', 'goodblocks' ) }
                            value={ Number(attributes.space_bottom) }
                            onChange={ onChangeValueSpaceBottom }
                            min={ 0 }
                            max={ 100 }
                            step={ 1 }
                        />
                    </Panel>

                     <Panel> 
                        <RangeControl
                            label={ __( 'Space vertical', 'goodblocks' ) }
                            value={ Number(attributes.space_ve) }
                            onChange={ onChangeValueSpaceVe }
                            min={ 0 }
                            max={ 100 }
                            step={ 1 }
                        />
                    </Panel>

                    <Panel> 
                        <RangeControl
                            label={ __( 'Space horizontal', 'goodblocks' ) }
                            value={ Number(attributes.space_ho) }
                            onChange={ onChangeValueSpaceHo }
                            min={ 0 }
                            max={ 100 }
                            step={ 1 }
                        />
                    </Panel>

                </PanelBody>

                <PanelBody
                    title={__("Button settings", 'goodblocks')}
                    initialOpen={true} >

                    <Panel>
                        <TextControl
                            label={ __( 'Button class', 'goodblocks' ) }
                            value={ attributes.class }
                            onChange={ ( value ) => setAttributes( { class: value } ) }
                        />
                    </Panel>
                    <Panel>
                        <TextControl
                            label={ __( 'Button text', 'goodblocks' ) }
                            value={ attributes.button_text }
                            onChange={ ( value ) => setAttributes( { button_text: value } ) }
                        />
                    </Panel>
                    <Panel>
                        <TextControl
                            label={ __( 'Button link', 'goodblocks' ) }
                            value={ attributes.button_link }
                            onChange={ ( value ) => setAttributes( { button_link: value } ) }
                        />
                    </Panel>

                    <Panel> 
                        <RangeControl
                            label={ __( 'Border radius', 'goodblocks' ) }
                            value={ Number(attributes.border_radius) }
                            onChange={ onChangeValue('border_radius') }
                            min={ 0 }
                            max={ 50 }
                            step={ 1 }
                        />
                    </Panel>
                    
                    <PanelColorSettings
                        title={__('Button color', 'goodblocks')}
                        initialOpen={false}
                        colorSettings={[
                            {
                                value: attributes.button_color,
                                onChange: onChangeValue('button_color'),
                                label: __('Button Color', 'goodblocks'),
                            }
                        ]}
                    />

                    <PanelColorSettings
                        title={__('Background color', 'goodblocks')}
                        initialOpen={false}
                        colorSettings={[
                            {
                                value: attributes.background_color,
                                onChange: onChangeValue('background_color'),
                                label: __('Background color', 'goodblocks'),
                            }
                        ]}
                    />

                </PanelBody>
            </InspectorControls>

            <div {...blockProps} style={style}>
                <GetCTA {...props}/>
            </div>
            </>
        )
    },

    save: (props) => {
        const { attributes } = props;
        const style = {
            '--gbpe-cta-space-top': attributes.space_top + 'px',
            '--gbpe-cta-space-bottom': attributes.space_bottom + 'px'
        };
    
        const blockProps = useBlockProps.save({
            className: `gbpe-cta ${attributes.cta_style}`
        });

        return (
           <>
           <div {...blockProps} style={style}>
                <GetCTA {...props}/>
            </div>
           </>
        )
    }
});