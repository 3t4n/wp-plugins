(function () {
    tinymce.create('tinymce.plugins.Wptuts', {
        init: function (ed, url) {
            ed.addButton('bs_video_slider', {
                text: 'Add Slider',
                title: 'Add Video Slider',
                cmd: 'bs_video_slider_ed',
                //image: 'http://archive.tinymce.com/images/subimage/docs.gif'
            });
            ed.addCommand('bs_video_slider_ed', function () {

                shortcode = "[bs_video_slider category='']";
                ed.execCommand('mceInsertContent', 0, shortcode);


            });
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add('wptuts', tinymce.plugins.Wptuts);
})();