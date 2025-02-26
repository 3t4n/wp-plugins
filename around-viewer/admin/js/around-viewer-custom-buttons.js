/**
 * Created by Thijs on 22/12/2015.
 */
(function() {
    tinymce.create('tinymce.plugins.aroundViewer', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} editor Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(editor, url) {
            editor.addButton('aroundviewer', {
                title : 'Around Viewer',
                cmd : 'aroundviewer' ,
                image : '../wp-content/plugins/around-viewer/images/around.png'
            });

            editor.addCommand('aroundviewer', function() {
                editor.windowManager.open( {
                    title: 'Around Viewer Settings',
                    body: [{
                        type: 'textbox',
                        name: 'tourcode',
                        label: 'Tour Code',
                        onclick: function(e) {
                            jQuery(e.target).css('border-color', '');
                        }
                    },
                    {
                        type: 'textbox',
                        name: 'width',
                        label: 'CSS Width'
                    },
                    {
                        type: 'textbox',
                        name: 'height',
                        label: 'CSS Height'
                    }],
                    onsubmit: function( e ) {
                        var window_id = this._id;
                        var inputs = jQuery('#' + window_id + '-body').find('.mce-formitem input');
                        console.log(inputs);

                        var shortCode = "";
                        if(e.data.tourcode === ''){
                            jQuery(function($){
                                $(inputs.get(0)).css('border-color', 'red');
                            });
                            return false;
                        }

                        shortCode = "[aroundViewer tourcode=\"" + e.data.tourcode + "\"";

                        if(e.data.width){
                            shortCode = shortCode.concat(" width=\"" + e.data.width + "\"");
                        }

                        if(e.data.height){
                            shortCode = shortCode.concat(" height=\"" + e.data.height + "\"");
                        }

                        editor.insertContent(shortCode.concat("]"));
                    }
                });
            });
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Around Viewer Buttons',
                author : 'Thijs Morlion',
                authorurl : 'http://www.around.media',
                infourl : 'http://http://gitlab.around.media/AroundAdmin/around-media-wp-plugin',
                version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'aroundviewer', tinymce.plugins.aroundViewer );
})();