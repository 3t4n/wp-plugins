(function() {
	  tinymce.create('tinymce.plugins.BGreen', {
        init : function(ed, url) {
            ed.addButton('BGreen', {
                title : 'BGreen Nexxuz',
                image : url+'/BGreen.png',
                onclick : function() {
                     //ed.selection.setContent('[url]' + ed.selection.getContent() + '[/url]');
                      tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, "[button_jc type='BGreen'  size='1' label='']"+ed.selection.getContent()+"[/button_jc]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('BGreen', tinymce.plugins.BGreen);
})();
