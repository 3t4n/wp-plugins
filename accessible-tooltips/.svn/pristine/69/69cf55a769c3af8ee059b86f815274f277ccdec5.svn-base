if (typeof accessible_tooltips_mce_data !== 'undefined') {
  tinymce.PluginManager.add( 'tooltipbutton', function( editor, url ) {
    // Add Button to Visual Editor Toolbar
    editor.addButton('tooltipbutton', {
      title: accessible_tooltips_mce_data.click_to_add_a_tooltip,
      cmd: 'tooltipbutton',
      image: accessible_tooltips_mce_data.stylesheet_directory+'assets/tooltip.svg',
    });
    editor.addCommand('tooltipbutton', function() {
      var selected_text = editor.selection.getContent({
        'format': 'html'
      });

      var open_column = '[accessible-tooltip]' + selected_text + '[/accessible-tooltip]';
      var close_column = '';
      var return_text = '';
      return_text = open_column + close_column;
      editor.execCommand('mceReplaceContent', false, return_text);
      return;
    });
  });  
}
