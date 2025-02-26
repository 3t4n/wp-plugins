(function() {
    tinymce.create("tinymce.plugins.ut_btn_cmd", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button     
            ed.addButton("green", {
                title : "Insert Page Title",
                cmd : "ut_command",
                image : url + "/btn.png"
            });

            //button functionality.
            ed.addCommand("ut_command", function() {
                
                var return_text = "[ut_pt]";
                ed.execCommand("mceInsertContent", 0, return_text);
            });

        },

    });

    tinymce.PluginManager.add("ut_btn_cmd", tinymce.plugins.ut_btn_cmd);
})();

