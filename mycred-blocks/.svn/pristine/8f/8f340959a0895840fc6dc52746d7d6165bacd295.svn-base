(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var ToggleControl = wp.components.ToggleControl;
    var SelectControl = wp.components.SelectControl;
    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-my-rank', {
        title: __('My Rank', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            user_id: {
                type: 'string'
            },
            show_title: {
                type: 'bool',
                default: true
            },
            show_logo: {
                type: 'bool'
            },
            logo_size: {
                type: 'string',
                default: 'post-thumbnail'
            },
            first: {
                type: 'string',
                default: 'logo'
            },
            ctype: {
                type: 'string'
            }
        },
        edit: function (props) {
            var user_id = props.attributes.user_id;
            var show_title = props.attributes.show_title;
            var show_logo = props.attributes.show_logo;
            var logo_size = props.attributes.logo_size;
            var first = props.attributes.first;
            var ctype = props.attributes.ctype;

            var options = [];
            function setUserId(value) {
                props.setAttributes({user_id: value});
            }
            function setShowTitle(value) {
                props.setAttributes({show_title: value});
            }

            function setShowLogo(value) {
                props.setAttributes({show_logo: value});
            }
            function setLogoSize(value) {
                props.setAttributes({logo_size: value});
            }
            function setFirst(value) {
                props.setAttributes({first: value});
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
                el('p', {}, __('My Rank Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('User ID', 'mycred-gutenberg'),
                            help: __('Optional ID of a specific user. If you want to show the rank of the user viewing this shortcode, leave this field empty.', 'mycred-gutenberg'),
                            value: user_id,
                            onChange: setUserId

                        }),
                        el(ToggleControl, {
                            label: __('Show Title', 'mycred-gutenberg'),
                            help: __('Option to show the rank title. Defaults to yes', 'mycred-gutenberg'),
                            checked: show_title,
                            onChange: setShowTitle
                        }),
                        el(ToggleControl, {
                            label: __('Show Logo', 'mycred-gutenberg'),
                            help: __('Option to show the rank logo. Defaults to no.', 'mycred-gutenberg'),
                            checked: show_logo,
                            onChange: setShowLogo
                        }),
                        el(TextControl, {
                            label: __('Logo Size', 'mycred-gutenberg'),
                            help: __('Registered image size or size in pixels e.g. 100x100', 'mycred-gutenberg'),
                            value: logo_size,
                            onChange: setLogoSize
                        }),
                        el(SelectControl, {
                            label: __('Order', 'mycred-gutenberg'),
                            help: __('Select what you want to show first. This is ignored if you have selected to only show one detail', 'mycred-gutenberg'),
                            value: first,
                            onChange: setFirst,
                            options: [
                                {label: 'Logo then Title', value: 'logo'},
                                {label: 'Title then Logo', value: 'title'}
                            ]
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to show', 'mycred-gutenberg'),
                            value: ctype,
                            onChange: setPtType,
                            options
                        }),
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);