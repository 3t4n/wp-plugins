(function() {


     /* Register the buttons */


     tinymce.create('tinymce.plugins.MyButtons', {


          init : function(ed, url) {


               /**


               * Inserts shortcode content


               */


			     ed.addButton( 'code', {


                    title : 'Create Match Details Content',
// 					mce-i-code

//                     image : 'wp-content/plugins/cricketscoreboard/includes/images/wp-samurai-logo-tinymce-image.gif',


                    cmd: 'code'


               });


               ed.addCommand( 'code', function() {


                   


                    var shortcode = '[match-detail]';


                    ed.execCommand('mceInsertContent', false, shortcode);


               });


            




			   




			   


          },


          createControl : function(n, cm) {


               return  0;


          },


     });


     /* Start the buttons */


     tinymce.PluginManager.add( 'wp_samurai_register_tinymce_buttons', tinymce.plugins.MyButtons );


})();