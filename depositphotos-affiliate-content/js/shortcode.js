(function() {
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
    jQuery('.add_media').on('click', function() {
        _custom_media = false;
    });
    tinymce.PluginManager.add('dpaff_insert_shortcode', function(editor, url) {
        editor.addButton('dpaff_insert_shortcode_button', {
            image: url + '/../img/button.png',
            onclick: function() {
                var width = jQuery(window).width(),
                    H = jQuery(window).height(),
                    W = (720 < width) ? 720 : width;
                    //W = W - 80;
                    H = H - 120;
                tb_show('Depositphotos Affiliate', url + '/../dpaff_popup.html?width=' + W + '&height=' + H);
            }
        });
    });
    jQuery(function() {
        var form = jQuery('#depositphotos-affiliate-form');
        var table = form.find('table');
        form.appendTo('body').hide();
        jQuery('#depositphotos-affiliate-submit').live('click', function() {
            var options = {
                'block_type': '',
                'tracking_link': '',
                'feed': '',
                'category_list': '',
                'author_id': '',
                'portfolio_checkbox': '',
                'search_query': '',
                'theme': '',
                'background': '',
                'image_type_photo': '',
                'image_type_vector': '',
                'image_type_video': '',
                'editorial': '',
                'sortby': '',
                'thumb_size': '',
                'thumb_size_custom': '300',
                'feed_width': '',
                'feed_height': '',
                'search_bar': '',
                'show_logo': '',
                'thumbnails_preview': '',
                'hide_pagination': '',
                'show_borders': '',
                'responsive': '',
                'additional_nofollow': '',
            };
            var shortcode = '[depositphotos_affiliate';
            for (var index in options) {
                var value = jQuery('#depositphotos-affiliate-form [name=' + index + ']').val();
                // attaches the attribute to the shortcode only if it's different from the default value
                if(value != options[index]) {
                    if(value != 'on' && value != 'yes' && value != 'iframe') {
                        shortcode += ' ' + index + '="' + value + '"';
                    }
                    if (jQuery('#depositphotos-affiliate-form input[type=checkbox][name=' + index + ']:checked')[0] !== undefined) {
                        shortcode += ' ' + index + '="on"';
                    }
                    if (jQuery('#depositphotos-affiliate-form input[type=radio][name=' + index + ']:checked')[0] !== undefined) {
                        shortcode += ' ' + index + '="' + jQuery('#depositphotos-affiliate-form input[type=radio][name=' + index + ']:checked')[0].value + '"';
                    }
                }
            }
            shortcode += ']';
            // inserts the shortcode into the active editor
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
            tb_remove();
        });
    });
})()