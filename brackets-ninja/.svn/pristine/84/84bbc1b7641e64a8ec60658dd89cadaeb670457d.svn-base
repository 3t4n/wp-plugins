(function() {
   tinymce.create('tinymce.plugins.bracketsninja', {
      init : function(ed, url) {
         ed.addButton('bracketsninja', {
            title : 'Bracket',
            image : url + '/bracketsninja.png',
            onclick : function() {
               var bracketID = prompt("Bracket ID (from https://brackets.commoninja.com)", "");
               if (bracketID != null && bracketID != '') {
                  // ed.execCommand('mceInsertContent', false, '[bracketsninja tableid="' + tableID + '"]');
                  var height = prompt("Height (in pixels)", "500");
                  if(height != null && height != '') {
                     ed.execCommand('mceInsertContent', false, '[bracketsninja bracketid="' + bracketID + '" height="' + height + '"]');
                  }
                  else {
                     ed.execCommand('mceInsertContent', false, '[bracketsninja bracketid="' + bracketID + '"]');
                  }
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : 'Brackets',
            author : 'Common Ninja',
            authorurl : 'https://www.commoninja.com',
            infourl : 'https://brackets.commoninja.com',
            version : '1.0'
         };
      }
   });
   tinymce.PluginManager.add('bracketsninja', tinymce.plugins.bracketsninja);
})();