(function() {
	  tinymce.create('tinymce.plugins.BOrange', {
        init : function(ed, url) {
            ed.addButton('BOrange', {
                title : 'BOrange Nexxuz',
                image : url+'/BOrange.png',
                onclick : function() {
                     //ed.selection.setContent('[url]' + ed.selection.getContent() + '[/url]');
                     tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, "[button_jc type='BOrange'  size='1' label='']"+ed.selection.getContent()+"[/button_jc]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('BOrange', tinymce.plugins.BOrange);
})();
