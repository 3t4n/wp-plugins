
(function() {
        tinymce.create('tinymce.plugins.wp_3721upPlugin', {

                init : function(ed, url) {
             
                        ed.addCommand('mcewp_3721up', function() {
						
							ws_3721up_upload();
                        });

     
                        ed.addButton('wp_3721up', {
                                title : '',
                                cmd : "mcewp_3721up",
                                image : url + '/../styles/images/logo.gif'
                        });
						
                        ed.onNodeChange.add(function(ed, cm, n) {
                                cm.setActive('wp_3721up', n.nodeName == 'IMG');
                        });
                },

        });

        // Register plugin
        tinymce.PluginManager.add('wp_3721up', tinymce.plugins.wp_3721upPlugin);
})();