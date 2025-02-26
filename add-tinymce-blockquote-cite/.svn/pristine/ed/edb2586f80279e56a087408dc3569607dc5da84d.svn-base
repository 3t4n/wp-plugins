(function () {
    tinymce.PluginManager.add('add_tinymce_blockquote_cite_snippets_plugin', function (editor, url) {

        /* right click function */
        editor.on('contextmenu', function (e) {
            e.preventDefault();
            blockquoteciteopendialog(e);
        });

        /* double click function */
        editor.on('DblClick', function (e) {
            e.preventDefault();
            blockquoteciteopendialog(e);
        });

        /* open dialog on special click functions */
        function blockquoteciteopendialog(e) {
            var data = {
                target: $(e.target)
            };
            var isValidElement = false;

            var currentNode = tinyMCE.activeEditor.selection.getNode();

            if (e.target.nodeName == 'blockquote' || e.target.nodeName == 'BLOCKQUOTE') {
                if ($(e.target).attr('cite') !== undefined) {
                    data.cite = $(e.target).attr("cite")
                }

                isValidElement = true;

            } else if ($($(editor.dom.getParent(tinyMCE.activeEditor.selection.getNode(), 'BLOCKQUOTE'))).is('BLOCKQUOTE')) {
                if ($($(editor.dom.getParent(tinyMCE.activeEditor.selection.getNode(), 'BLOCKQUOTE'))).attr('cite') !== undefined) {
                    data.cite = $($(editor.dom.getParent(tinyMCE.activeEditor.selection.getNode(), 'BLOCKQUOTE'))).attr('cite');
                }

                data.target = $($(editor.dom.getParent(tinyMCE.activeEditor.selection.getNode(), 'BLOCKQUOTE')));

                isValidElement = true;
            }

            if (isValidElement == true) {
                editor.windowManager.open({
                    title: 'Blockquote Cite',
                    /* width: 400, */
                    data: data,
                    $: $,
                    editor: editor,
                    body: [
                        {
                            type: 'container',
                            name: 'container',
                            id: 'err-message',
                            html: 'Please insert your cite text. This can be a author name or url to the blockquotes source.<br /><br />'
                        },
                        {
                            name: 'cite',
                            type: 'textbox',
                            label: 'Cite text:',
                            value: data.cite,
                            onchange: function () {
                                data.cite = this.value();
                            }
                        }
                    ],
                    onSubmit: function (e) {
                        data = tinymce.extend(data, e.data);
                        if (data.cite.length == 0) {
                            $(data.target).removeAttr("cite");
                        } else {
                            $(data.target).attr("cite", data.cite);
                        }
                    }
                });
            }
        }
    });
})();
