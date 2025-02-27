(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var ToggleControl = wp.components.ToggleControl;
    var SelectControl = wp.components.SelectControl;
    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-users-of-all-ranks', {
        title: __('Users of all ranks', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            login: {
                type: 'string'
            },
            number: {
                type: 'string'
            },
            show_logo: {
                type: 'bool',
                default: true
            },
            logo_size: {
                type: 'string',
                default: 'post-thumbnail'
            },
            wrap: {
                type: 'string',
                default: 'div'
            },
            nothing: {
                type: 'string',
                default: 'No users found with this rank'
            },
            ctype: {
                type: 'string'
            }
        },
        edit: function (props) {
            var login = props.attributes.login;
            var number = props.attributes.number;
            var show_logo = props.attributes.show_logo;
            var logo_size = props.attributes.logo_size;
            var wrap = props.attributes.wrap;
            var nothing = props.attributes.nothing;
            var ctype = props.attributes.ctype;

            var options = [];

            function setLogin(value) {
                props.setAttributes({login: value});
            }
            function setNumber(value) {
                props.setAttributes({number: value});
            }

            function setShowLogo(value) {
                props.setAttributes({show_logo: value});
            }
            function setLogoSize(value) {
                props.setAttributes({logo_size: value});
            }
            function setWrap(value) {
                props.setAttributes({wrap: value});
            }
            function setNothing(value) {
                props.setAttributes({nothing: value});
            }

            function setPtType(value) {
                props.setAttributes({ctype: value});
            }

            Object.keys(mycred_types).forEach(function (key) {
                options.push({
                    label: mycred_types[key],
                    value: key
                });
            });

            return el('div', {}, [
                el('p', {}, __('Users of all ranks Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('Login Message', 'mycred-gutenberg'),
                            help: __('Message to show for logged out users. This shortcode will not return anything if this is left empty.', 'mycred-gutenberg'),
                            value: login,
                            onChange: setLogin
                        }),
                        el(TextControl, {
                            label: __('Number of Users', 'mycred-gutenberg'),
                            help: __('The number of users to return. Use -1 to return all users of this rank.', 'mycred-gutenberg'),
                            value: number,
                            onChange: setNumber
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to show', 'mycred-gutenberg'),
                            value: ctype,
                            onChange: setPtType,
                            options
                        }),
                        el(ToggleControl, {
                            label: __('Show Logo', 'mycred-gutenberg'),
                            help: __('Option to show the rank logo. Defaults to no.', 'mycred-gutenberg'),
                            checked: show_logo,
                            onChange: setShowLogo
                        }),
                        el(TextControl, {
                            label: __('Logo Size', 'mycred-gutenberg'),
                            help: __('The logo size to show. Defaults to "post-thumbnail".', 'mycred-gutenberg'),
                            value: logo_size,
                            onChange: setLogoSize
                        }),
                        el(TextControl, {
                            label: __('Wrapper Element', 'mycred-gutenberg'),
                            help: __('Option to wrap each row in a specific type of HTML element. Defaults to "div" but you can also use "table" to render a table. Can not be empty!', 'mycred-gutenberg'),
                            value: wrap,
                            onChange: setWrap
                        }),
                        el(TextControl, {
                            label: __('No Results', 'mycred-gutenberg'),
                            help: __('Message to show when the given rank has no users.', 'mycred-gutenberg'),
                            value: nothing,
                            onChange: setNothing
                        }),
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);