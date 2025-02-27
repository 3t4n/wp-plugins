(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;

    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-email-subsc', {
        title: __('Email Subscriptions', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            success: {
                type: 'string',
                default: 'Settings Updated'
            }
        },
        edit: function (props) {
            var success = props.attributes.success;

            function setSuccess(value) {
                props.setAttributes({success: value});
            }

            return el('div', {}, [
                el('p', {}, __('Email Subscriptions Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('Success', 'mycred-gutenberg'),
                            help: __('Message to show when settings have been changed.', 'mycred-gutenberg'),
                            value: success,
                            onChange: setSuccess
                        })
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);