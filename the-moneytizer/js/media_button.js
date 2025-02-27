jQuery(function($) {

    $('#themoneytizer_buttons_popup button').click(themoneytizer_insert_shortcode);

    function themoneytizer_insert_shortcode() {
        var id = $('#themoneytizer_select_space').val();
        var align = $('#themoneytizer_select_align').val();
        wp.media.editor.insert('<div style="text-align:'+align+';">[themoneytizer id="'+id+'"]</div><p></p>');
    }

});