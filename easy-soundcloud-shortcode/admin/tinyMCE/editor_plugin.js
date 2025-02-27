/* global tinymce */

(function() {
    tinymce.create('tinymce.plugins.ScldShortcode', {
        init : function(ed, url){
            ed.addButton('ScldShortcode', {
                title : 'Insert URL Soundcloud',
                onclick : function() {
					var Get_url = prompt("Insert Soundcloud url address: \n e.g. https://soundcloud.com/itroz/sound-name",'');
					if( Get_url )ed.selection.setContent('[soundcloud]'+ Get_url +'[/soundcloud]'); },
                image: url + "/soundcloud.png"
            });
        }
    });
    tinymce.PluginManager.add('ScldShortcode', tinymce.plugins.ScldShortcode);
})();