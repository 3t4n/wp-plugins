(function() {
    tinymce.create('tinymce.plugins.FormDesigner', {
        init : function(ed, url) {
        	ed.addCommand('formdesignerPopup', function() {
                ed.windowManager.open({
                    file: ajaxurl + '?action=formdesigner_popup',
                    width: 600, 
                    height: 120
                });
            });
            ed.addButton('FormDesigner', {
                title: 'FormDesigner',
                image: url + '/icon.svg',
                cmd: 'formdesignerPopup'
            });
        },
        getInfo : function() {
            return {
                longname: "FormDesigner",
                author: 'FormDesigner',
                authorurl: 'https://formdesigner.pro',
                infourl: 'https://formdesigner.pro',
                version: "2.2.0"
            };
        }
    });
    tinymce.PluginManager.add('FormDesigner', tinymce.plugins.FormDesigner);
})();