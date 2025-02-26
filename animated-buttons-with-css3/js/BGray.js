(function() {
	  tinymce.create('tinymce.plugins.BGray', {
        init : function(ed, url) {
            ed.addButton('BGray', {
                title : 'BGray Nexxuz',
                image : url+'/BGray.png',
                onclick : function() {
                     //ed.selection.setContent('[url]' + ed.selection.getContent() + '[/url]');
                      tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, "[button_jc type='BGray'  size='1' label='']"+ed.selection.getContent()+"[/button_jc]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('BGray', tinymce.plugins.BGray);
})();
