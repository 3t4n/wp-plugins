(function() {
    tinymce.create('tinymce.plugins.NofollowPlugin', {
        init : function(ed, url) {
            // Register commands
            ed.addCommand('mceNoFollow', function() {
		
                if(ed.selection.getNode().nodeName=="A"){
                    ed.selection.getNode().setAttribute("rel", "nofollow");
                }
                else
                    alert("Please Select a Hyperlink.")
            });
 
            // Register buttons
            ed.addButton('nofollow', {
                title : 'No Follow',
                cmd : 'mceNoFollow',
                image: url + '/nofollow-tag.png'
                });
        },
 
        getInfo : function() {
            return {
                longname : 'NoFollow Plugin',
                author : 'Alex Jose (Spikes)',
                authorurl : 'http://alexjose.in',
                infourl : 'http://alexjose.in',
                version : tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add('nofollow', tinymce.plugins.NofollowPlugin);
})();
