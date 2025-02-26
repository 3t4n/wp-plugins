(function() {
    tinymce.PluginManager.add('jawda-yt-button', function( editor, url, wpcats ) {
        editor.addButton( 'jawda-yt-button', {
            text: 'Video',
            icon: 'mce-ico mce-i-pluscircle',
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Add YT Video',
                    body: [
                        {
                            type: 'textbox',
                            label: 'Vidro URL',
                            name: 'url',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            label: 'Video title',
                            name: 'title',
                            value: ''
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[jawda_yt url="' + e.data.url + '" title="' + e.data.title + '"]');
                    }
                });
            },
        });
    });

})();
