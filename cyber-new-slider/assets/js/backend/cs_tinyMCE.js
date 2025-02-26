(function() {
    tinymce.PluginManager.add('cyberslider_mce_button', function( editor,url) {
        editor.addButton('cyberslider_mce_button', {
            text: '',
            icon: 'icon cyberslider-icon',
            tooltip: 'Cyber Slider',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Insert Slide',
                    width: 400,
                    height: 100,
                    body: [
                        {
                            type: 'listbox',
                            name: 'SliderName',
                            label: 'Slider',
                            'values': editor.settings.cybersliderList
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[cyberslider id="' + e.data.SliderName + '"]');
                    }
                });
            }
        });
    });
})();