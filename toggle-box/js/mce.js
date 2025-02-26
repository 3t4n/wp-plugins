    (function() {  
        tinymce.create('tinymce.plugins.toggle', {  
            init : function(ed, url) {  
                ed.addButton('toggle', {  
                    title : 'Add a toggle box',  
                    image : url + '/../../images/mce-toggle.png',  
                    onclick : function() {  
                         ed.selection.setContent('[toggle Title="#"]' + ed.selection.getContent() + '[/toggle]');  
      
                    }  
                });  
            },  
            createControl : function(n, cm) {  
                return null;  
            },  
        });  
        tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);  
    })();  