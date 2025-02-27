<?php
header('Content-type: text/javascript');
?>
jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.owc_section_page_plugin', {
        init : function(ed, url) {
            ed.addCommand('owc_section_page_insert_dropdown_block', function() {
				selected = tinyMCE.activeEditor.selection.getContent();

				if( selected ){
					content =  '[section=TITLE HERE]'+selected+'[endsection]';
				} else {
					content =  '[section=TITLE HERE][endsection]';
				}

				tinymce.execCommand('mceInsertContent', false, content);
			});

            ed.addButton('owc_section_page_button', {title : 'Insert dropdown block', cmd : 'owc_section_page_insert_dropdown_block', image: url + '/../assets/icon.png' });
        },   
    });

    tinymce.PluginManager.add('owc_section_page_button', tinymce.plugins.owc_section_page_plugin);
});