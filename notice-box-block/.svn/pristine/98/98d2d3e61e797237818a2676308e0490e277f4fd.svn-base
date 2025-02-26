(function (blocks, blockEditor, element, components) {
    var el = element.createElement;
    var InnerBlocks = blockEditor.InnerBlocks;
    var InspectorControls = blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var RadioControl = components.RadioControl;
    var useState = element.useState;

    blocks.registerBlockType('lucidgen/notice-box', {
        title: 'Notice Box',
        icon: 'info',
        category: 'layout',
        attributes: {
            noticeType: {
                type: 'string',
                default: 'info'
            }
        },
        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;
            var noticeType = attributes.noticeType;

            function onChangeBoxType(newType) {
                setAttributes({ noticeType: newType });
            }

            return [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: 'Notice type', initialOpen: true },
                        el(RadioControl, {
                            label: 'Select notice type',
                            selected: noticeType,
                            options: [
                                { label: 'Info', value: 'info' },
                                { label: 'Warning', value: 'warning' },
                                { label: 'Success', value: 'success' },
                                { label: 'Danger', value: 'danger' },
                            ],
                            onChange: onChangeBoxType
                        })
                    )
                ),
                el('div', { className: 'notice-box ' + noticeType },
                    el(InnerBlocks)
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            var noticeType = attributes.noticeType;

            return el('div', { className: 'notice-box ' + noticeType },
                el(InnerBlocks.Content)
            );
        },
    });
})(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.element,
    window.wp.components
);