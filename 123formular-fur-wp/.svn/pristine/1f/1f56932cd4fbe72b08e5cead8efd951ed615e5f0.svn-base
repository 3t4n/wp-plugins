(function() {
    tinymce.create('tinymce.plugins.contact_123', {

        init : function(ed, url){
        	ed.addCommand('123_embed_window', function() {

                ed.windowManager.open({
                    file   : url + '/dialog.php',
                    width  : 600, 
                    height : 160,
                    inline : 1
                }, { plugin_url : url });
            });
            ed.addButton('123formular', {
                title : 'Insert form',
                cmd : '123_embed_window',
                image: url + "/123logo.gif"
            });
        },

        getInfo : function() {
            return {
                longname : '123Formular for Wordpress plugin',
                author : '123Formular',
                authorurl : 'http://www.123formular.de',
                infourl : '',
                version : "1.0.0"
            };
        }
    });

    tinymce.PluginManager.add('contact_123', tinymce.plugins.contact_123);
    
})();
