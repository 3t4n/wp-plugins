(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var SelectControl = wp.components.SelectControl;

    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-buy', {
        title: __('Buy', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            link_title: {
                type: 'string'
            },
            gateway: {
                type: 'string'
            },
            type: {
                type: 'string'
            },
            amount: {
                type: 'string'
            },
            gift_to: {
                type: 'string'
            },
            clss: {
                type: 'string',
                default: 'mycred-buy-link btn btn-primary btn-lg'
            },
            login: {
                type: 'string',
                default: 'buyCRED Settings'
            }

        },
        edit: function (props) {
            var link_title = props.attributes.link_title;
            var gateway = props.attributes.gateway;
            var type = props.attributes.type;
            var amount = props.attributes.amount;
            var gift_to = props.attributes.balance_el;

            var clss = props.attributes.clss;
            var login = props.attributes.login;

            var options = [];
            var gatewayopt = [];

            function setLinkTitle(value) {
                props.setAttributes({link_title: value});
            }
            function setGateway(value) {
                props.setAttributes({gateway: value});
            }

            function setType(value) {
                props.setAttributes({type: value});
            }
            function setAmount(value) {
                props.setAttributes({amount: value});
            }
            function setGiftTo(value) {
                props.setAttributes({gift_to: value});
            }
            function setClass(value) {
                props.setAttributes({clss: value});
            }
            function setLogin(value) {
                props.setAttributes({login: value});
            }

            Object.keys(mycred_types).forEach(function (key) {
                options.push({
                    label: mycred_types[key],
                    value: key
                });
            });

            Object.keys(mycred_buy).forEach(function (key) {
                gatewayopt.push({
                    label: key,
                    value: mycred_buy[key]
                });
            });
            return el('div', {}, [
                el('p', {}, __('Buy Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('Link Title', 'mycred-gutenberg'),
                            help: __('The purchase link title. If not set, the anchor element will be rendered but will be empty. Only leave this entry if you intend to style the element and need this to be empty!', 'mycred-gutenberg'),
                            value: link_title,
                            onChange: setLinkTitle
                        }),
                        el(SelectControl, {
                            label: __('Gateway', 'mycred-gutenberg'),
                            help: __('Required payment gateway to use for this purchase.', 'mycred-gutenberg'),
                            value: gateway,
                            onChange: setGateway,
                            options: gatewayopt
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to show.', 'mycred-gutenberg'),
                            value: type,
                            onChange: setType,
                            options
                        }),
                        el(TextControl, {
                            label: __('Amount', 'mycred-gutenberg'),
                            help: __('Amount of points to purchase.', 'mycred-gutenberg'),
                            value: amount,
                            onChange: setAmount
                        }),
                        el(TextControl, {
                            label: __('Gift to', 'mycred-gutenberg'),
                            help: __('By default, the current user will receive the purchased amount. Use "author" to gift purchases to the post author or a specific users ID. Leave empty if not used!', 'mycred-gutenberg'),
                            value: gift_to,
                            onChange: setGiftTo
                        }),
                        el(TextControl, {
                            label: __('Class', 'mycred-gutenberg'),
                            help: __('Optional class to add to the purchase link element', 'mycred-gutenberg'),
                            value: clss,
                            onChange: setClass
                        }),
                        el(TextControl, {
                            label: __('Login Message', 'mycred-gutenberg'),
                            help: __('Optional message to show logged out users viewing this shortcode. Nothing is returned if left empty.', 'mycred-gutenberg'),
                            value: login,
                            onChange: setLogin
                        }),
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);