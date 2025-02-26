const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InspectorControls, useBlockProps } = wp.blockEditor;
const { PanelBody, Panel, TextControl, RangeControl, SelectControl } = wp.components;
import metadata from './block.json';

const GetContent = (props) => {
    const { attributes } = props;

    const style = {
        '--gbpe-headline-padding-top': attributes.padding_top + 'px',
        '--gbpe-headline-padding-bottom': attributes.padding_bottom + 'px',
    };

    const inner_style = {
        '--gbpe-headline-text-align': attributes.position,
    }

    return (
        <div className="gbpe-headline" style={style}>
            <div className="gbpe-headline__inner" style={inner_style}>
                {attributes.before && (
                   <div className="gbpe-headline__before">{attributes.before}</div>
                )}
                {attributes.title && (
                   <h2 className="gbpe-headline__title">{attributes.title}</h2>
                )}
                {attributes.desc && (
                   <p className="gbpe-headline__desc">{attributes.desc}</p>
                )}
            </div>
        </div>
    );
};

/**
 * Block - Headline
 */
registerBlockType(metadata, {
    edit: (props) => {
        const { attributes, setAttributes } = props;
        const blockProps = useBlockProps({
            className: 'gbpe-block-wrapper'
        });

        const onChangeValue = (attribute) => (newValue) => {
            setAttributes({ [attribute]: String(newValue) });
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody
                        title={__("Headline settings", 'goodblocks')}
                        initialOpen={true}>

                        <Panel>
                            <TextControl
                                label={__('Before', 'goodblocks')}
                                value={attributes.before}
                                onChange={(value) => setAttributes({ before: value })}
                            />
                        </Panel>
                        <Panel>
                            <TextControl
                                label={__('Title', 'goodblocks')}
                                value={attributes.title}
                                onChange={(value) => setAttributes({ title: value })}
                            />
                        </Panel>
                        <Panel>
                            <TextControl
                                label={__('Description', 'goodblocks')}
                                value={attributes.desc}
                                onChange={(value) => setAttributes({ desc: value })}
                            />
                        </Panel>
                        <Panel> 
                            <RangeControl
                                label={ __( 'Space top', 'goodblocks' ) }
                                value={ Number(attributes.padding_top) }
                                onChange={ onChangeValue('padding_top') }
                                min={ 0 }
                                max={ 1000 }
                                step={ 1 }
                            />
                        </Panel>

                        <Panel> 
                            <RangeControl
                                label={ __( 'Space bottom', 'goodblocks' ) }
                                value={ Number(attributes.padding_bottom) }
                                onChange={ onChangeValue('padding_bottom') }
                                min={ 0 }
                                max={ 1000 }
                                step={ 1 }
                            />
                        </Panel>

                        <Panel>
                            <SelectControl
                                label={ __( 'Banner position', 'goodblocks' ) }
                                value={ attributes.position }
                                options={ [
                                    { label: 'Default (Left)', value: 'left', disabled: true },
                                    { label: 'Left', value: 'left' },
                                    { label: 'Center', value: 'center' }
                                ] }
                                onChange={ ( value ) => setAttributes( { position: value } ) }
                            />
                        </Panel>
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    <GetContent {...props} />
                </div>
            </>
        );
    },

    save: (props) => {
        const blockProps = useBlockProps.save({
            className: 'gbpe-block-wrapper'
        });

        return (
            <div {...blockProps}>
                <GetContent {...props} />
            </div>
        );
    }
});
