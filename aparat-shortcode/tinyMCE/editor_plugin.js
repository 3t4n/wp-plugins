(function() {

    tinymce.create('tinymce.plugins.aparatplugin', {

        init : function(ed, url){
            ed.addButton('aparatplugin', {
                title : 'Insert Aparat Video shortcode for selected url',
                onclick : function() {
                     ed.selection.setContent('[aparat]' + ed.selection.getContent() + '[/aparat]');
                },
                image: url + "/wand.png"
            });
        },

        getInfo : function() {
            return {
                longname : 'Aparat Video Shrotcut',
                author : 'Ali Aghdam',
                authorurl : 'http://aliaghdam.com/',
                infourl : '',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('aparatplugin', tinymce.plugins.aparatplugin);
    
})();
