(function() {
    tinymce.PluginManager.requireLangPack('changelang', 'de,en,fr,es,it');
    tinymce.create('tinymce.plugins.ChangeLangPlugin', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         */
        init : function(ed, url) {
            ed.addCommand('mceClang', function() {
                // use jquery
                $ = ed.getWin().parent.jQuery;

                // current selection node
                var node = ed.selection.getNode();

                // content of current node
                var selected_text = ed.selection.getContent();

                // get lang value of current node
                var node_attribute_lang = node.getAttribute('lang');

                // get hreflang value of current node
                var node_attribute_hreflang = node.getAttribute('hreflang');

                var return_text = '';

                ed.windowManager.open( {
                    title: 'attribs_title',
                    body: [{
                                type: 'textbox',
                                name: 'language',
                                label: 'attribute_label_langcode',
                                value: node_attribute_lang
                            },
                            {
                                type: 'textbox',
                                name: 'hreflang',
                                label: 'attribute_label_hreflangcode',
                                value: node_attribute_hreflang
                            },
                            {
                                type: 'checkbox',
                                name: 'deletelang',
                                label: 'attribs_remove'
                            }
                    ],
                    onsubmit: function( e ) {
                        // check if lang attribute should be deleted (option checked true)
                        var delete_lang = e.data.deletelang;

                        // delete lang attribute
                        if (delete_lang) {

                            // current selection has content
                            if (selected_text) {
                                ed.dom.remove(node);
                                return_text = selected_text;
                                ed.selection.setContent(return_text);

                                // if only cursor is set
                            } else {
                                ed.dom.setAttribs(node, {'lang': '','hreflang': ''});
                            }

                        // add lang attribute
                        } else {
                            // set attribute lang and class=lang for current node
                            var attr_language = e.data.language;
                            var attr_hreflanguage = e.data.hreflang;

                            if (attr_language || attr_hreflanguage) {

                                // if node is a link
                                if (node.nodeName.toLowerCase() == 'a') {

                                    // if link attribute hreflang is inserted
                                    if (attr_hreflanguage) {
                                        ed.dom.setAttribs(node, {'lang': attr_language, 'hreflang': attr_hreflanguage});
                                        // if value is attribute lang
                                    } else if (attr_language) {
                                        ed.dom.setAttribs(node, {'lang': attr_language, 'hreflang': ''});
                                        // if no value
                                    } else {
                                        ed.dom.setAttribs(node, {'lang': '', 'hreflang': ''});
                                    }

                                // if value is attribute lang
                                } else if (attr_language) {

                                    // if span and lang attribute exists
                                    if (node.nodeName.toLowerCase() == 'span' && node_attribute_lang) {
                                        ed.dom.setAttribs(node, {'lang': attr_language});

                                    } else {
                                        // current selection has content
                                        if (selected_text) {
                                            return_text = '<span lang="' + attr_language + '">' + selected_text + '</span>';
                                            ed.selection.setContent(return_text);
                                            // iif only cursor is set
                                        } else {
                                            ed.dom.setAttribs(node, {'lang': attr_language});
                                        }
                                    }

                                    // if no value
                                } else {
                                    // if span and lang attribute exists
                                    if (node.nodeName.toLowerCase() == 'span' && node_attribute_lang) {

                                        ed.dom.remove(node);
                                        return_text = selected_text;
                                        ed.selection.setContent(return_text);

                                        // if no value
                                    } else {
                                        ed.dom.setAttribs(node, {'lang': ''});
                                    }
                                }

                                // if no value
                            } else {
                                ed.dom.setAttribs(node, {'lang': '', 'hreflang': ''});
                            }

                        }

                    }
                });
            });

            ed.addButton('clang', {
                title : 'clang_desc',
                cmd : 'mceClang',
                image : url + '/img/change_lang_picto.png'
            });
        },

        /**
         * Creates control instances based in the incomming name
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'MCE Accessible Language Change',
                author : 'Sylvia Egger',
                authorurl : 'http://sprungmarker.de',
                infourl : 'http://sprungmarker.de',
                version : "1.3"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('changelang', tinymce.plugins.ChangeLangPlugin);
})();