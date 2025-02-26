(function() {
	  tinymce.create('tinymce.plugins.BBlue', {
        init : function(ed, url) {
            ed.addButton('BBlue', {
                title : 'BBlue Nexxuz',
                image : url+'/BBlue.png',
                onclick : function() {
                     //ed.selection.setContent('[url]' + ed.selection.getContent() + '[/url]');
                      tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, "[button_jc type='BBlue' size='1' label='']"+ed.selection.getContent()+"[/button_jc]");

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('BBlue', tinymce.plugins.BBlue);
})();
