(function(blocks, editor, components, i18n, element, wp, data, jquery) {

    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var BlockControls = editor.BlockControls;
    var AlignmentToolbar = editor.AlignmentToolbar;
    var MediaUpload = editor.MediaUpload;
    var RichText = editor.RichText;
    var InspectorControls = editor.InspectorControls;
    var TextControl = components.TextControl;
    var Notice = window.wp.data.dispatch('core/notices');


    // TODO: Create Resized Svg
    var testicon = el(
        'svg', { width: 50, height: 50 },
        el('g', { transform: 'translate(0.000000,129.000000) scale(0.100000,-0.100000)', fill: '#000000', stroke: 'none' },
            el('path', { d: 'M845 1154 c-16 -3 -113 -21 -214 -41 -159 -31 -197 -35 -280 -30 -53 3 -116 12 -140 21 -24 9 -47 14 -50 10 -3 -3 -6 -78 -6 -167 1 -214 23 -294 132 -480 l46 -79 311 4 c289 3 455 10 396 18 -14 2 -30 3 -37 3 -7 0 0 21 18 51 16 28 34 50 40 48 5 -1 9 3 7 10 -1 7 3 23 10 36 7 12 11 22 8 22 -4 0 6 29 33 95 23 54 31 130 27 260 -2 77 -7 150 -11 162 -5 16 -22 27 -58 38 -53 16 -182 26 -232 19z m216 -30 l58 -16 7 -56 c4 -30 4 -103 1 -161 -8 -155 -42 -267 -122 -404 l-46 -78 -295 3 c-161 2 -294 -1 -294 -5 0 -25 -44 23 -82 90 -93 163 -122 270 -122 455 -1 75 2 139 6 143 4 4 31 -1 60 -11 99 -35 228 -23 573 49 52 11 203 6 256 -9z' }),
            el('path', { d: 'M700 1080 c-9 -6 -10 -10 -3 -10 6 0 15 5 18 10 8 12 4 12 -15 0z' }),
            el('path', { d: 'M1058 1083 c7 -3 16 -2 19 1 4 3 -2 6 -13 5 -11 0 -14 -3 -6 -6z' }),
            el('path', { d: 'M415 959 c-4 -6 -5 -12 -2 -15 2 -3 7 2 10 11 7 17 1 20 -8 4z' }),
            el('path', { d: 'M860 960 c-9 -6 -10 -10 -3 -10 6 0 15 5 18 10 8 12 4 12 -15 0z' }),
            el('path', { d: 'M471 951 c-12 -7 -10 -14 8 -36 20 -26 21 -38 21 -225 0 -184 -1 -199 -21 -224 -11 -14 -19 -26 -17 -26 228 -5 228 -5 228 10 0 9 -5 21 -10 26 -6 6 -12 48 -13 92 l-2 82 31 0 c87 0 184 55 204 116 29 86 -27 154 -146 179 -76 16 -261 20 -283 6z m327 -35 c70 -30 106 -88 86 -140 -3 -9 -10 -13 -15 -10 -5 3 -9 -4 -9 -16 0 -12 -4 -18 -10 -15 -5 3 -10 2 -10 -3 0 -37 -192 -85 -205 -51 -3 8 -7 51 -9 97 -2 45 -6 86 -10 89 -6 7 -9 -11 -7 -39 1 -10 -2 -18 -7 -18 -10 0 5 -131 17 -143 5 -5 3 -28 -5 -53 -7 -24 -10 -44 -6 -44 4 0 7 -25 7 -55 l0 -55 -42 0 c-34 0 -43 4 -44 18 0 12 -3 10 -10 -7 -5 -13 -12 -22 -14 -19 -3 3 -1 17 5 32 5 15 10 111 10 215 0 103 3 191 7 194 3 4 13 1 21 -6 13 -9 14 -9 8 1 -5 9 12 12 73 12 68 0 84 -3 101 -20 18 -18 20 -18 21 -2 0 10 3 12 6 4 2 -6 8 -10 13 -7 5 3 16 -2 24 -11 9 -8 16 -12 16 -8 0 18 30 -21 35 -47 8 -36 25 -38 25 -3 0 16 -13 39 -33 59 -41 41 -102 55 -237 55 -62 0 -101 4 -106 11 -12 20 252 6 304 -15z m-146 -356 c2 -41 8 -83 12 -92 5-12 4 -18 -3 -18 -19 0 -31 48 -31 128 0 98 17 84 22 -18z' }),
            el('path', { d: 'M636 871 c4 -9 9 -47 10 -86 1 -38 3 -76 3 -82 1 -7 14 -13 30 -13 65 0 97 109 48 165 -26 31 -104 45 -91 16z m79 -29 c36 -61 16 -131 -37 -132 -14 0 -17 13 -20 80 l-3 81 25 -6 c14 -4 30 -14 35 -23z' }),
            el('path', { d: 'M683 816 c4 -10 7 -24 7 -32 0 -8 5 -14 11 -14 15 0 6 53 -10 58 -10 3 -12 0 -8 -12z' }),
            el('path', { d: 'M778 827 c-3 -15 -1 -30 4 -33 13 -9 15 -3 8 31 l-6 30 -6 -28z' }),
            el('path', { d: 'M683 816 c4 -10 7 -24 7 -32 0 -8 5 -14 11 -14 15 0 6 53 -10 58 -10 3 -12 0 -8 -12z' }),
            el('path', { d: 'M807 826 c-4 -10 -1 -13 8 -9 8 3 12 9 9 14 -7 12 -11 11 -17 -5z' }),
            el('path', { d: 'M808 746 c-2 -22 0 -32 7 -29 6 2 9 17 7 33 -6 39 -9 38 -14 -4z' }),
            el('path', { d: 'M410 909 c0 -5 5 -7 10 -4 6 3 10 8 10 11 0 2 -4 4 -10 4 -5 0 -10 -5 -10 -11z' }),
            el('path', { d: 'M436 903 c-6 -14 -5 -15 5 -6 7 7 10 15 7 18 -3 3 -9 -2 -12 -12z' }),
            el('path', { d: 'M210 795 c0 -8 2 -15 4 -15 2 0 6 7 10 15 3 8 1 15 -4 15 -6 0 -10 -7 -10 -15z' }),
            el('path', { d: 'M1081 744 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z' }),
            el('path', { d: 'M294 558 c0 -14 4 -24 8 -22 3 2 8 -2 11 -8 2 -7 4 -1 3 14 0 14 -4 24 -8 22 -3 -2 -8 2 -11 8 -2 7 -4 1 -3 -14z' }),
            el('path', { d: 'M975 513 c4 -14 2 -23 -4 -23 -6 0 -11 -8 -11 -17 0 -14 3 -14 16 5 11 17 12 26 4 39 -9 16 -10 15 -5 -4z' }),
            el('path', { d: 'M248 402 c-19 -4 -23 -14 -11 -25 3 -4 11 -3 17 2 6 5 20 11 31 13 20 4 20 4 0 9 -11 3 -28 3 -37 1z' }),
            el('path', { d: 'M275 370 c-7 -12 2 -12 30 0 19 8 19 9 -2 9 -12 1 -25 -3 -28 -9z' }),
            el('path', { d: 'M1059 370 c0 -3 0 -42 1 -87 l1 -83 -165 0 c-91 0 -166 -4 -166 -9 0 -4 -18 -20 -41 -35 l-40 -27 -33 21 c-19 11 -39 27 -46 35 -7 9 -29 15 -51 15 -29 0 -37 3 -33 14 3 8 1 17 -5 21 -7 3 -8 0 -5 -9 5 -14 -7 -16 -90 -16 -57 0 -96 -4 -96 -10 0 -6 45 -10 116 -10 117 0 154 -9 154 -36 0 -8 5 -12 11 -9 6 4 20 -2 32 -13 32 -28 65 -34 86 -14 23 22 53 46 71 57 8 5 65 10 127 12 104 3 113 2 123 -17 10 -18 21 -20 106 -20 61 0 93 4 89 10 -3 6 4 10 15 10 18 0 13 8 -29 46 -52 47 -62 64 -37 64 7 0 30 20 50 44 l36 45 -90 3 c-49 2 -90 1 -91 -2z m60 -32 c1 8 7 12 14 9 6 -2 24 0 40 4 15 4 27 5 27 3 0 -3 -19 -23 -42 -44 -41 -40 -41 -40 -22 -62 12 -13 13 -18 4 -13 -12 7 -13 6 -3 -7 17 -20 4 -31 -16 -15 -14 11 -14 10 -2 -6 13 -17 15 -17 34 0 19 16 20 16 14 1 -4 -12 -2 -15 7 -12 8 3 17 1 20 -4 4 -6 -23 -10 -70 -11 -76 -1 -77 -1 -55 18 14 12 18 22 11 26 -6 3 -8 9 -6 13 2 4 5 30 7 57 3 52 19 77 31 47 4 -10 7 -12 7 -4z' }),
            el('path', { d: 'M50 360 c13 -8 13 -11 1 -19 -11 -7 -10 -10 6 -15 10 -3 33 -21 51 -39 l31 -32 -48 -40 c-27 -22 -46 -46 -44 -52 4 -9 34 -13 105 -13 66 0 103 4 111 13 14 13 16 37 5 37 -5 0 -13 0 -19 0 -5 0 -7 -4 -4 -10 4 -6 -26 -10 -82 -10 l-87 0 34 29 c39 32 54 33 25 1 -16 -17 -16 -20 -3 -15 35 14 32 76 -6 106 -25 19 -58 68 -39 56 20 -13 92 -15 97 -4 2 7 5 3 6 -8 1 -20 1 -20 10 0 6 13 9 -7 9 -62 1 -45 6 -85 11 -88 6 -4 10 27 10 84 l0 91 -97 0 c-68 0 -93 -3 -83 -10z' }),
            el('path', { d: 'M268 295 c4 -43 22 -65 22 -26 0 11 9 21 21 24 32 9 20 41 -16 45 -30 3 -30 3 -27 -43z m50 17 c2 -7 -3 -12 -12 -12 -9 0 -16 7 -16 16 0 17 22 14 28 -4z' }),
            el('path', { d: 'M329 284 c-14 -29 -22 -54 -17 -54 4 0 8 5 8 10 0 6 7 10 15 10 9 0 12 6 9 15 -4 9 0 15 9 15 8 0 18 -7 21 -16 4 -9 9 -14 12 -11 7 6 -17 87 -25 86 -3 0 -18 -25 -32 -55z m36 16 c3 -5 1 -10 -4 -10 -6 0 -11 5 -11 10 0 6 2 10 4 10 3 0 8 -4 11 -10z' }),
            el('path', { d: 'M412 328 c-30 -30 -2 -86 38 -73 20 6 28 25 10 25 -5 0 -10 -5 -10 -10 0 -7 -6 -7 -20 0 -24 13 -26 33 -3 51 13 11 17 11 20 1 3 -6 9 -10 14 -6 14 8 1 24 -20 24 -9 0 -22 -5 -29 -12z' }),
            el('path', { d: 'M480 295 c0 -25 4 -45 9 -45 5 0 9 20 9 45 0 25 -4 45 -9 45 -5 0 -9 -20 -9 -45z' }),
            el('path', { d: 'M519 317 c-16 -21 -15 -24 1 -45 25 -30 36 -28 15 4 -13 20 -14 28 -4 40 19 24 29 16 29 -24 0 -35 2 -38 30 -40 17 -1 30 2 30 8 0 5 -10 9 -22 7 -18 -2 -22 4 -25 30 -3 30 -1 32 27 30 28 -2 30 -5 30 -39 0 -21 5 -38 10 -38 6 0 10 18 10 40 0 39 12 52 26 29 3 -6 1 -15 -6 -19 -14 -9 3 -50 22 -50 6 0 6 6 -3 16 -10 12 -10 20 -1 34 17 28 -3 37 -83 38 -62 1 -72 -1 -86 -21z' }),
            el('path', { d: 'M708 295 l4 -45 39 0 c28 0 39 4 39 15 0 8 7 15 15 15 8 0 15 -7 15 -15 0 -9 9 -15 25 -15 22 0 24 3 19 33 l-6 32 32 -35 c25 -28 30 -31 29 -15 -1 11 -1 31 0 45 1 19 3 22 10 10 6 -8 7 -27 4 -42 -5 -24 -2 -28 16 -28 36 0 61 19 61 45 0 29 -26 45 -75 45 -34 0 -35 -1 -29 -27 l7 -28 -30 28 c-16 15 -31 27 -34 27 -2 0 -3 -19 -2 -42 l3 -43 -21 44 -21 44 -18 -39 c-10 -21 -19 -35 -19 -31 -1 4 -10 3 -21 -3 -17 -9 -20 -8 -21 12 -2 45 -4 51 -14 55 -6 2 -9 -15 -7 -42z m276 13 c7 -12 6 -21 -3 -32 -21 -25 -31 -19 -31 20 0 37 14 42 34 12z' }),
            el('path', { d: 'M590 300 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10 -4 -10 -10z' }),
            el('path', { d: 'M383 223 c9 -2 25 -2 35 0 9 3 1 5 -18 5 -19 0 -27 -2 -17 -5z' }),
            el('path', { d: 'M583 198 c-4 -7 48 -13 71 -9 5 1 13 -4 17 -11 7 -10 9 -10 9 0 0 6 8 12 17 12 9 0 14 3 10 6 -8 9 -118 10 -124 2z' }),
        )
    );

    //blocks.updateCategory( 'pwgu-category', { icon: 'wordpress' });

    registerBlockType('pcb/advanced-paragraph', {
        transforms: {
            from: [{
                type: 'block',
                blocks: ['core/paragraph'],
                transform: ({ content }) => blocks.createBlock('pcb/advanced-paragraph', { content }),
            }, ],
            to: [{
                type: 'block',
                blocks: ['core/paragraph'],
                transform: ({ content }) => blocks.createBlock('core/paragraph', { content }),
            }, ],
        },
        title: i18n.__('Advanced Paragraph'),
        description: i18n.__('A paragraph block with extra options'),
        icon: 'media-code',
        keywords: [i18n.__('pdf'), i18n.__('viewer'), i18n.__('reader')],
        category: 'pcb-category',
        example: {
            attributes: {
                content: i18n.__('Packerland Custom Blocks - Advanced Paragraph'),
                alignment: 'center'
            },
        },
        attributes: {
            mediaID: {
                type: 'number'
            },
            mediaURL: {
                type: 'string',
                source: 'attribute',
                selector: 'a',
                attribute: 'href'
            },
            mediaWidth: {
                type: 'string',
                source: 'attribute',
                selector: 'a',
                attribute: 'data-width'
            },
            mediaHeight: {
                type: 'string',
                source: 'attribute',
                selector: 'a',
                attribute: 'data-height'
            },
            alignment: {
                type: 'string',
                default: 'left'
            },
            paddingLeft: {
                type: 'number',
                default: 0
            },
            content: {
                type: 'html'
            },
        },

        edit: function(props) {
            var attributes = props.attributes
            var alignment = props.attributes.alignment
            var paddingLeft = props.attributes.paddingLeft
            var content = props.attributes.content
            var onSelectPDF = function(media) {

                var url = media.url;
                var input = jQuery('<input>').val(url).appendTo('body').select();
                document.execCommand('copy');

                Notice.createNotice(
                    'info',
                    'URL Copied', {
                        isDismissible: true,
                        type: 'snackbar',
                        // 						actions: [
                        // 							{
                        // 								label: 'Undo',
                        // 								onClick: () => {
                        // 									console.log('Hi Developer!');
                        // 								},
                        // 							}
                        // 						]
                    }
                );

            }

            function onChangeAlignment(newAlignment) {
                props.setAttributes({ alignment: newAlignment })
            }

            function onChangeAddPaddingLeft(newPaddingLeft) {
                paddingLeft = paddingLeft + 40;
                props.setAttributes({ paddingLeft: paddingLeft })
            }

            function onChangeRemovePaddingLeft(newPaddingLeft) {
                if (paddingLeft != 0) {
                    paddingLeft = paddingLeft - 40;
                    props.setAttributes({ paddingLeft: paddingLeft })
                }

            }


            return [
                el(BlockControls, { key: 'controls' },
                    el(
                        'div', { className: 'components-toolbar' },
                        el(MediaUpload, {
                            onSelect: onSelectPDF,
                            type: 'a',
                            render: function(obj) {
                                return el(
                                    components.Button, {
                                        className: 'components-icon-button components-toolbar__control openMedia',
                                        onClick: obj.open
                                    },
                                    el(
                                        'svg', {
                                            className: '',
                                            width: '20',
                                            height: '20'
                                        },
                                        el(
                                            'path', {
                                                d: 'M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z'
                                            }
                                        )
                                    )
                                )
                            }
                        })
                    ),

                    el(
                        AlignmentToolbar, {
                            value: alignment,
                            onChange: onChangeAlignment
                        }
                    ),
                    el(
                        'div', {
                            className: 'mce-widget mce-btn',
                        },
                        el(
                            components.Button, {
                                className: '',
                                onClick: onChangeAddPaddingLeft
                            },
                            el(
                                'i', {
                                    className: 'mce-ico mce-i-indent',
                                }
                            ),
                        ),
                    ),
                    el(
                        'div', {
                            className: 'mce-widget mce-btn',
                        },
                        el(
                            components.Button, {
                                className: '',
                                onClick: onChangeRemovePaddingLeft
                            },
                            el(
                                'i', {
                                    className: 'mce-ico mce-i-outdent',
                                }
                            ),
                        ),
                    ),
                ),
                el(
                    InspectorControls, { key: 'inspector' },
                    el(
                        components.PanelBody, {
                            title: i18n.__('Advanced Paragraph'),
                            className: 'block-packerland-advanced-paragraph',
                            initialOpen: true
                        },
                        el('p', {}, i18n.__('Can do everything a normal paragraph can do plus get a media library file url!')),

                        el(
                            MediaUpload, {
                                onSelect: onSelectPDF,
                                type: 'application/pdf',
                                value: attributes.mediaID,
                                render: function(obj) {
                                    return !attributes.mediaID ? el(
                                        components.Button, {
                                            className: attributes.mediaID ? 'media-button' : 'button button-large  copy-url-button',
                                            onClick: obj.open
                                        }, 'Get Media Url') : el(
                                        'a', {
                                            className: attributes.mediaID ? 'copy-url-button' : 'button button-large copy-url-button',
                                            target: '_blank',
                                            'data-url-link': attributes.mediaURL,
                                            href: attributes.mediaURL,
                                        }, attributes.mediaURL)

                                }
                            }
                        )

                    ),


                ),
                el(
                    'div', { className: props.className },

                    el(
                        RichText, {
                            value: attributes.content,
                            style: { textAlign: alignment, textIndent: paddingLeft },
                            onChange: function(newContent) {
                                props.setAttributes({ content: newContent })
                            },
                            placeholder: 'Start Typing Here',
                            keepPlaceholderOnFocus: true,
                        },

                    ),

                )
            ]
        },

        save: function(props) {
            var attributes = props.attributes
            var alignment = props.attributes.alignment
            var content = props.attributes.content
            var paddingLeft = props.attributes.paddingLeft


            return (
                el(
                    'p', {
                        className: props.className,
                        style: { textAlign: alignment, textIndent: paddingLeft + 'px', }
                    }, content,
                )
            )
        }

    })

})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
    window.wp.data,
    jQuery
)