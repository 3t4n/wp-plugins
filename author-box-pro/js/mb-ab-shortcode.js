/**
 * TinyMCE Shortcode
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
tinymce.create('tinymce.plugins.MBAuthorBox', {
    init: function (ed, url) {

        ed.addButton('mb_author_box_shortcode', {
            title: 'MB Author Box',
            cmd: 'mb-author-box-shortcode-insert',
            icon: 'author'
        });

        ed.addCommand('mb-author-box-shortcode-insert', function () {
            var return_text = '';
            return_text = '[wp-mb-author-box]';
            ed.execCommand('mceInsertContent', 0, return_text);
        });
    },
    createControl: function (n, cm) {
        return null;
    }
});

tinymce.PluginManager.add('mb_author_box_shortcode', tinymce.plugins.MBAuthorBox);