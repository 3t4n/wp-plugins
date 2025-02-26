/*=========================================
                SHORTCODE
==========================================*/          
(function() {
    tinymce.PluginManager.add('alpha', function( editor, url ) {
        editor.addButton( 'alpha', {
            title: 'Alpha Testimonials',
            icon: 'icon dashicons-format-quote',
            onclick: function() {
                editor.insertContent('[ates]');
            }
        });
    });
})();
