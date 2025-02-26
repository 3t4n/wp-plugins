(function() {
  tinymce.PluginManager.add('aFIDs', function(editor, url) {
    function aFUseTextForID() {
      // Make sure editor has focus.
      editor.focus();
      // Get current node
      var selectednode = editor.selection.getNode();
      // Get content of current node
      var nodetext = editor.selection.getNode().innerHTML;
      // Clean up string for use as an ID
      var nodetext = nodetext.replace(/<(?:.|\n)*?>/g,""); // https://stackoverflow.com/a/822464/1383937
      var nodetext = nodetext.replace(/[^a-zA-Z0-9]/g,"-");
      var nodetext = nodetext.toLowerCase();
      var nodetext = nodetext.replace(/(----)+/g,"-");
      var nodetext = nodetext.replace(/(---)+/g,"-");
      var nodetext = nodetext.replace(/(--)+/g,"-");
      var nodetext = nodetext.replace(/^\-/,"");;
      var nodetext = nodetext.replace(/\-$/,"");;
      // Use string to add ID
      selectednode.setAttribute("id",nodetext);
    }
    function aFRemoveID() {
      // Make sure editor has focus.
      editor.focus();
      // Get current node
      var selectednode = editor.selection.getNode();
      // Remove ID
      selectednode.removeAttribute("id");
    }
    editor.addButton( 'aFIDsAddID', {
      title: 'Add ID',
      icon: 'hash aFIcons',
      classes: 'widget btn',
      stateSelector: '*[id]',
      onclick: function() {
        aFUseTextForID();
      }
    });
    editor.addButton( 'aFIDsRemoveID', {
      title: 'Remove ID',
      icon: 'hash-remove aFIcons',
      classes: 'widget btn',
      onclick: function() {
        aFRemoveID();
      }
    });
  });
})();

//    More addButton() options
//    type: 'menubutton',
//    menu: [
//              {
//                  text: 'Menu item I',
//                  value: 'Text from menu item I',
//                  onclick: function() {
//                      editor.insertContent(this.value());
//                  }
//              },
//              {
//                  text: 'Menu item II',
//                  value: 'Text from menu item II',
//                  onclick: function() {
//                      editor.insertContent(this.value());
//                  },
//                  menu: [
//                      {
//                          text: 'First submenu item',
//                          value: 'Text from sub sub menu',
//                          onclick: function(e) {
//                              e.stopPropagation();
//                              editor.insertContent(this.value());
//                          }
//                      },
//                      {
//                          text: 'Second submenu item',
//                          value: 'Text from sub sub menu',
//                          onclick: function(e) {
//                              e.stopPropagation();
//                              editor.insertContent(this.value());
//                          }
//                      }
//                  ]
//              },
//              {
//                  text: 'Menu item III',
//                  value: 'Text from menu item III',
//                  onclick: function() {
//                      editor.insertContent(this.value());
//                  }
//              }
//         ]
