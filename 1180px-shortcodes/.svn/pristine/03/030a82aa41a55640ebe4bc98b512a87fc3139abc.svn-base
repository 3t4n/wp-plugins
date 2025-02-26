(function() {
  tinymce.create('tinymce.plugins.WP1180px', {

    init : function(ed, url) {

      /**
       * Row shortcode button commands
       */
      ed.addCommand('wp1180px_insert_row_shortcode', function() {
        selected = tinyMCE.activeEditor.selection.getContent();

        if( selected ){
          //If text is selected when button is clicked
          //Wrap shortcode around it.
          content =  '[row]' + selected + '[/row]';
        } else {
          content =  '[row][/row]';
        }

        tinymce.execCommand('mceInsertContent', false, content);
      });

      // Register buttons - trigger above command when clicked
      ed.addButton('wp1180px_row', {
        title : 'Insert New Rows',
        cmd : 'wp1180px_insert_row_shortcode',
        image: 'http://0.gravatar.com/avatar/074dd4bb739d528d8453890dbee21f12?s=64&d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D64&r=G'
      });

      /**
       * Span shortcode button commands
       */
      ed.addCommand('wp1180px_insert_span_shortcode', function() {
        var number = prompt("How many columns will this content be?");
        selected = tinyMCE.activeEditor.selection.getContent();

        if( selected ){
          //If text is selected when button is clicked
          //Wrap shortcode around it.
          content =  '[span col="' + number + '"]' + selected + '[/span]';
        } else {
          content =  '[span col="' + number + '"][/span]';
        }

        tinymce.execCommand('mceInsertContent', false, content);
      });

      // Register buttons - trigger above command when clicked
      ed.addButton('wp1180px_span', {
        title : 'Insert New Columns',
        cmd : 'wp1180px_insert_span_shortcode',
        image: 'http://0.gravatar.com/avatar/074dd4bb739d528d8453890dbee21f12?s=64&d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D64&r=G'
      });

    }

  });
  // Register plugin
  tinymce.PluginManager.add( 'wp1180px_buttons', tinymce.plugins.WP1180px );
})();
