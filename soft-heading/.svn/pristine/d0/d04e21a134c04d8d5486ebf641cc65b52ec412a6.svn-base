(function() {
    tinymce.create("tinymce.plugins.softheading_button_plugin", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button    
            ed.addButton("WordPressHeading", {
                title : "Insert New Stylish Heading",
                cmd : "wpheading",
                image : "https://raw.githubusercontent.com/the-mcnaveen/WordPress-Sub-heading/master/button.png"
            });

            //button functionality.
            ed.addCommand("wpheading", function() {
                var selected_text = ed.selection.getContent();
                var return_text = "[h]Your Heading Text[/h]<br>";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "WP Heading Buttons",
                author : "mcnaveen",
                version : "1.2"
            };
        }
    });

    tinymce.PluginManager.add("softheading_button_plugin", tinymce.plugins.softheading_button_plugin);
})();