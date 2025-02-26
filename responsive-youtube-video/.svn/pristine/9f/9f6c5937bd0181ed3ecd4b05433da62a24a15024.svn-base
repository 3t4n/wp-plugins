(function() {
    tinymce.create("tinymce.plugins.responsive_youtube_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button    
            ed.addButton("green", {
                title : "Responsive Youtube Video",
                cmd : "responsive_youtube",
                image : "../wp-content/plugins/responsive-youtube/assets/youtube.png"
            });

            //button functionality.
            ed.addCommand("responsive_youtube", function() {
                var return_text = '[responsive-youtube id="your_youtube_id"]';
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Responsive Youtube Video",
                author : "Infyways",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("responsive_youtube_plugin", tinymce.plugins.responsive_youtube_plugin);
})();