/*!
* Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
* @realwebcare - https://www.realwebcare.com/
*/
jQuery(document).ready(function () {
    if (typeof tinymce !== 'undefined') {  // Check if tinymce is loaded
        tinymce.PluginManager.add('awrpg_gallery_id', function(editor, url) {
            editor.addButton('awrpg_gallery_id', {
                icon: 'dashicon dashicons-format-gallery',
                tooltip: 'Add Gallery ID',
                onclick: function() {
                    editor.windowManager.open({
                        title: 'Add Gallery ID',
                        body: [
                            {
                                type: 'textbox',
                                name: 'galleryId',
                                label: 'Gallery ID'
                            }
                        ],
                        onsubmit: function(e) {
                            let content = editor.selection.getContent();

                            if (content.includes('[gallery')) {
                                const idRegex = /id="[^"]*"/;
                                const newId = `id="${e.data.galleryId}"`;

                                if (idRegex.test(content)) {
                                    content = content.replace(idRegex, newId);
                                } else {
                                    content = content.replace('[gallery', `[gallery ${newId}`);
                                }

                                editor.selection.setContent(content);
                            } else {
                                alert('Please select a gallery shortcode to add or modify the ID.');
                            }
                        }
                    });
                }
            });
        });
    } else {
        // console.error('TinyMCE is not loaded yet.');
    }
});
