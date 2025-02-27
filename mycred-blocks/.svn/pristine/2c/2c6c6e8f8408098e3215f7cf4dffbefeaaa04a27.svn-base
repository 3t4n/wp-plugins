(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var SelectControl = wp.components.SelectControl;
    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-list-ranks', {
        title: __('List Ranks', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            order: {
                type: 'string'
            },
            ctype: {
                type: 'string'
            },
            wrap: {
                type: 'string',
                default: 'div'
            }
        },
        edit: function (props) {
            var order = props.attributes.order;
            var ctype = props.attributes.ctype;
            var wrap = props.attributes.wrap;

            var options = [];

            function setOrder(value) {
                props.setAttributes({order: value});
            }
            function setPtType(value) {
                props.setAttributes({ctype: value});
            }
            function setWrap(value) {
                props.setAttributes({wrap: value});
            }
            Object.keys(mycred_types).forEach(function (key) {
                options.push({
                    label: mycred_types[key],
                    value: key
                });
            });

            return el('div', {}, [
                el('p', {}, __('List Ranks Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(SelectControl, {
                            label: __('Order', 'mycred-gutenberg'),
                            help: __('Rank listing order', 'mycred-gutenberg'),
                            value: order,
                            onChange: setOrder,
                            options: [
                                {label: 'Descending', value: 'DESC'},
                                {label: 'Ascending', value: 'ASC'}
                            ]
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to show', 'mycred-gutenberg'),
                            value: ctype,
                            onChange: setPtType,
                            options
                        }),
                        el(TextControl, {
                            label: __('Wrapper', 'mycred-gutenberg'),
                            help: __('The HTML element to use as the main wrapper around this shortcodes results', 'mycred-gutenberg'),
                            value: wrap,
                            onChange: setWrap
                        }),
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);