(function() {
       tinymce.PluginManager.add('rmb_mce_button', function( editor, url ) {
           editor.addButton('rmb_mce_button', {
                       text: 'RMB',
                       icon: 'wp_more',
			   		   tooltip: 'Insert or Remove Read More Buddy Shortcode',
                       onclick: function() {
						   selected = tinyMCE.activeEditor.selection.getContent();
						   
						   if( !selected.indexOf('[readmb]')){
				
							   selected = selected.replace('[readmb]','');
							   selected = selected.replace('[/readmb]',' ');
							   content = selected;
							   
						   }else{
							   
							   if( selected ){
								   content = '[readmb]'+selected+'[/readmb]';
							   }else{
								   content = '[readmb]';
							   }
							   
						   }
						   
						   
						   editor.execCommand('mceInsertContent', false, content);
						   
                      }
             });
       });
})();