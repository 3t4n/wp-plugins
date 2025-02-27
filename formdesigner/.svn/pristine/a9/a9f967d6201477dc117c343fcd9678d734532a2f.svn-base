(function($, wp, host, langs) {
    var el = wp.element.createElement,
        Fragment = wp.element.Fragment,
        BlockControls = wp.editor.BlockControls,
        Toolbar = wp.components.Toolbar,
        Dashicon = wp.components.Dashicon,
        registerBlockType = wp.blocks.registerBlockType,
        isLoadScript = false,
        forms = {};

    function createIconFormDesigner() {
        return el("svg", {
            width: "19",
            height: "20",
            viewBox: "0 0 19 20",
            fill: "none",
            xmlns: "http://www.w3.org/2000/svg",
        }, [
            el("path", {
                d: "M2.3,2.3H17v3.4H5.8v2.8h9v3.4h-9v6.2H2.3V2.3z",
                fill: "#33A6DE",
            }),
        ]);
    }

    function getFormDesignerWidget(id, center, slug) {
        if (!id) {
            return;
        }
        return [
            el('div', {id: 'form_' + id}),
            el('script', null, '(function (d, w, c) {(w[c] = w[c] || []).push({formId:' + id + (slug ? ',slug:"' + slug + '"': '') + ',host:"' + host + '",formHeight:100, el: "form_' + id + '", center: ' + center + '});var s = d.createElement("script"), g = "getElementsByTagName";s.type = "text/javascript"; s.charset="UTF-8"; s.async = true;s.src = (d.location.protocol == "https:" ? "https:" : "http:")+"//' + host + '/js/iform.js?v=0.0.2";var h=d[g]("head")[0] || d[g]("body")[0];h.appendChild(s);})(document, window, "fdforms")')
        ];
    }

    registerBlockType('formdesigner/block', {
        title: 'FormDesigner',

        icon: createIconFormDesigner(),

        category: 'widgets',

        attributes: {
            id: {
                type: 'integer',
                default: 0
            },
            idSelect: {
                type: 'integer',
                default: 0
            },
            edit: {
                type: 'bool',
                default: true
            },
            center: {
                type: 'integer',
                default: 1
            },
            rand: {
                type: 'float',
                default: false
            },
            slug: {
                type: 'string',
                default: null
            }
        },

        edit: function(props) {
            var attributes = props.attributes;

            function handleChangeForm(e) {
                var select = e.target;
                var idSelect = +select.options[select.selectedIndex].value;
                props.setAttributes({
                    idSelect: idSelect,
                    slug: forms[idSelect] ? forms[idSelect]['slug'] : null
                });
            }

            function handleClickSaveButton(e) {
                e.preventDefault();
                props.setAttributes({
                    id: +attributes.idSelect,
                    edit: false,
                    slug: forms[attributes.idSelect] ? forms[attributes.idSelect]['slug'] : null
                });
                setTimeout(function() {
                    if (!isLoadScript) {
                        loadScript();
                    } else {
                        changeForm(attributes.idSelect, attributes.center, attributes.slug);
                    }
                }, 0);
            }

            function handleClickSetEditMode() {
                props.setAttributes({
                    id: +attributes.idSelect,
                    edit: true,
                    slug: forms[attributes.idSelect] ? forms[attributes.idSelect]['slug'] : null
                });
            }

            function handleClickSetAlignLeft() {
                setFormAlign(0);
            }
            
            function handleClickSetAlignCenter() {
                setFormAlign(1);
            }
            
            function setFormAlign(center) {
                if (attributes.center === center) {
                    return;
                }
                props.setAttributes({center: center});
                if (attributes.id) {
                    changeForm(attributes.id, center, attributes.slug);
                }
            }

            function changeForm(id, center, slug) {
                var el = document.getElementById('form_' + id);
                var iframe = el.getElementsByTagName('iframe')[0];
                if (iframe) {
                    var page = slug ? '/form/i' + id + '-' + slug + '.html' : '/form/iframe/' + id;
                    iframe.src = '//' + host + page + '?center=' + center;
                } else {
                    window.createForm({
                        formId: id,
                        host: host,
                        formHeight: 100,
                        el: "form_" + id,
                        center: center,
                        slug: slug
                    });
                }
            }

            function getOptions() {
                if (!$.isEmptyObject(forms)) {
                    return $.map(forms, function(form, id) {
                        return createOption(id, form.name);
                    });
                } else {
                    return [createOption(0, langs.loading)];
                }
            }
            
            function createOption(id, name) {
                return el('option', {value: id}, name);
            }

            function getBlockControls() {
                return [
                    el(Toolbar, {
                        isCollapsed: false,
                        controls: [{
                            icon: el(Dashicon, {icon: 'randomize'}),
                            title: langs.chooseForm,
                            isActive: attributes.edit,
                            onClick: handleClickSetEditMode
                        }]
                    }),
                    el(Toolbar, {
                        isCollapsed: false,
                        controls: [
                            {
                                icon: el(Dashicon, {icon: 'editor-alignleft'}),
                                title: langs.alignLeft,
                                isActive: false,
                                onClick: handleClickSetAlignLeft
                            },
                            {
                                icon: el(Dashicon, {icon: 'editor-aligncenter'}),
                                title: langs.alignCenter,
                                isActive: false,
                                onClick: handleClickSetAlignCenter
                            },
                        ]
                    })
                ];
            }

            function getBlockContent() {
                return [
                    el('div', {
                        className: props.className + '-mode ' + (attributes.edit ? props.className + '-mode-edit' : ''),
                    }, [
                        el('div', {className: props.className}, getFormDesignerWidget(attributes.id, attributes.center, attributes.slug)),
                        el('div', {className: props.className + '-placeholder components-placeholder'}, [
                            el('div', {className: 'components-placeholder__label'}, [
                                el('span', {className: 'block-editor-block-icon'}, createIconFormDesigner()),
                                langs.formList
                            ]),
                            el('div', {className: 'components-placeholder__fieldset'}, [
                                el('select', {
                                    onChange: handleChangeForm,
                                    value: attributes.idSelect,
                                }, getOptions()),
                                el('button', {
                                    className: 'components-button is-button is-primary is-large',
                                    onClick: handleClickSaveButton,
                                }, langs.insertForm)
                            ]),
                        ]),
                    ])
                ];
            }

            function loadForms() {
                if (Object.keys(forms).length) {
                    return;
                }

                $.get(ajaxurl, {action: 'formdesigner_load_forms'}, function(response) {
                    var json = JSON.parse(response);
                    if (json.status === 'OK') {
                        forms = json.data.forms;
                        forms[0] = {
                            name: langs.chooseFormOption,
                            slug: null
                        };
                    }
                    props.setAttributes({rand: Math.random()});
                });
            }

            function loadScript() {
                if (isLoadScript) {
                    return;
                }
                var forms = document.getElementsByClassName(props.className);
                [].forEach.call(forms, function(form) {
                    var script = form.getElementsByTagName('SCRIPT');
                    if (script.length) {
                        eval(script[0].innerHTML);
                        isLoadScript = true;
                    }
                });
            }

            loadForms();
            setTimeout(loadScript, 100);

            return el(Fragment, null, [
                el(BlockControls, null, getBlockControls()),
                getBlockContent()
            ]);
        },

        save: function(props) {
            var id = props.attributes.id;
            return id ? el('div', {className: props.className}, getFormDesignerWidget(id, props.attributes.center, props.attributes.slug)) : '';
        }
    });
})(jQuery, wp, formdesigner_host, formdesigner_langs);