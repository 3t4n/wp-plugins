(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var SelectControl = wp.components.SelectControl;
    var TextareaControl = wp.components.TextareaControl;

    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-link', {
        title: __('Link', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            href: {
                type: 'string'
            },
            amount: {
                type: 'integer'
            },
            ctype: {
                type: 'string'
            },
            id: {
                type: 'string'
            },
            rel: {
                type: 'string'
            },
            clss: {
                type: 'string'
            },
            title: {
                type: 'string'
            },
            target: {
                type: 'string'
            },
            style: {
                type: 'string'
            },
            hreflang: {
                type: 'string'
            },
            media: {
                type: 'string'
            },
            type: {
                type: 'string'
            },
            onclick: {
                type: 'string'
            },
            content: {
                type: 'string'
            }
        },
        edit: function (props) {
            var href = props.attributes.href;
            var amount = props.attributes.amount;
            var ctype = props.attributes.ctype;
            var id = props.attributes.id;
            var rel = props.attributes.rel;

            var clss = props.attributes.clss;
            var title = props.attributes.title;
            var target = props.attributes.target;

            var style = props.attributes.style;
            var hreflang = props.attributes.hreflang;
            var media = props.attributes.media;
            var type = props.attributes.type;
            var onclick = props.attributes.onclick;
            var content = props.attributes.content;

            var options = [];

            function setHref(value) {
                props.setAttributes({href: value});
            }
            function setAmount(value) {
                props.setAttributes({amount: value});
            }
            function setCtype(value) {
                props.setAttributes({ctype: value});
            }

            function setId(value) {
                props.setAttributes({id: value});
            }
            function setRel(value) {
                props.setAttributes({rel: value});
            }

            function setClass(value) {
                props.setAttributes({clss: value});
            }

            function setTitle(value) {
                props.setAttributes({title: value});
            }
            function setTarget(value) {
                props.setAttributes({target: value});
            }

            function setStyle(value) {
                props.setAttributes({style: value});
            }

            function setHrefLang(value) {
                props.setAttributes({hreflang: value});
            }

            function setMedia(value) {
                props.setAttributes({media: value});
            }
            function setType(value) {
                props.setAttributes({type: value});
            }

            function setOnClick(value) {
                props.setAttributes({onclick: value});
            }
            function setContent(value) {
                props.setAttributes({content: value});
            }

            Object.keys(mycred_types).forEach(function (key) {
                options.push({
                    label: mycred_types[key],
                    value: key
                });
            });
            return el('div', {}, [
                el('p', {}, __('Link Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('Amount', 'mycred-gutenberg'),
                            help: __('Amount of points for clicking on this link. Use zero to give the amount you set in your "Points for clicking on links" hook settings.', 'mycred-gutenberg'),
                            value: amount,
                            onChange: setAmount

                        }),
                        el(TextControl, {
                            label: __('HREF', 'mycred-gutenberg'),
                            help: __('Required href attribute for the anchor element.', 'mycred-gutenberg'),
                            value: href,
                            onChange: setHref
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to give', 'mycred-gutenberg'),
                            value: ctype,
                            onChange: setCtype,
                            options
                        }),
                        el(TextControl, {
                            label: __('ID', 'mycred-gutenberg'),
                            help: __('Optional id attribute for the anchor element', 'mycred-gutenberg'),
                            value: id,
                            onChange: setId
                        }),
                        el(TextControl, {
                            label: __('Rel', 'mycred-gutenberg'),
                            help: __('Optional rel attribute for the anchor element.', 'mycred-gutenberg'),
                            value: rel,
                            onChange: setRel
                        }),
                        el(TextControl, {
                            label: __('Title', 'mycred-gutenberg'),
                            help: __('Optional title attribute for the anchor element.', 'mycred-gutenberg'),
                            value: title,
                            onChange: setTitle
                        }),
                        el(TextControl, {
                            label: __('Target', 'mycred-gutenberg'),
                            help: __('Optional target attribute for the anchor element.', 'mycred-gutenberg'),
                            value: target,
                            onChange: setTarget
                        }),
                        el(TextControl, {
                            label: __('Style', 'mycred-gutenberg'),
                            help: __('Optional style attribute for the anchor element.', 'mycred-gutenberg'),
                            value: style,
                            onChange: setStyle
                        }),
                        el(TextControl, {
                            label: __('Class', 'mycred-gutenberg'),
                            help: __('Optional class attribute for the anchor element', 'mycred-gutenberg'),
                            value: clss,
                            onChange: setClass
                        }),
                        el(TextControl, {
                            label: __('HREFLANG', 'mycred-gutenberg'),
                            help: __('Optional hreflang attribute for the anchor element', 'mycred-gutenberg'),
                            value: hreflang,
                            onChange: setHrefLang
                        }),
                        el(TextControl, {
                            label: __('Media', 'mycred-gutenberg'),
                            help: __('Optional media attribute for the anchor element.', 'mycred-gutenberg'),
                            value: media,
                            onChange: setMedia
                        }),
                        el(TextControl, {
                            label: __('Type', 'mycred-gutenberg'),
                            help: __('Optional type attribute for the anchor element.', 'mycred-gutenberg'),
                            value: type,
                            onChange: setType
                        }),
                        el(TextControl, {
                            label: __('OnClick', 'mycred-gutenberg'),
                            help: __('Optional onclick attribute.', 'mycred-gutenberg'),
                            value: onclick,
                            onChange: setOnClick
                        }),
                        el(TextareaControl, {
                            label: __('Link Title', 'mycred-gutenberg'),
                            value: content,
                            onChange: setContent
                        })
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);