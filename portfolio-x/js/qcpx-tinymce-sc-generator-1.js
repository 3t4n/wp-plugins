;(function( $ ) {
    tinymce.PluginManager.add('qcpx_shortcode_cmn', function( editor,url )
    {
        var shortcodeValues = [];

        editor.addButton('qcpx_shortcode_cmn', {
			title : 'Portfolio-X Shortcode',
            text: 'Portfolio-X',
            icon: false,
            onclick : function(e){
                $.post(
                    ajaxurl,
                    {
                        action : 'show_qcpx_shortcode_cmn'
                        
                    },
                    function(data){
                        $('#wpwrap').append(data);
                    }
                )
            },
            values: shortcodeValues
        });
    });



}(jQuery));

