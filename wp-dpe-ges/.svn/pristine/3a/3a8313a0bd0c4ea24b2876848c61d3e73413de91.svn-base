(function() {
    tinymce.create('tinymce.plugins.wpdpeges', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.addButton('DPE', {
                title : ed.getLang('wpdpeges_tinymce_plugin.titleDPE'),
                cmd : 'dpe',
                image : url + '/../images/tinymce-dpe.png'
            });
            ed.addCommand('dpe', function() {
                ed.windowManager.open({
                    title: ed.getLang('wpdpeges_tinymce_plugin.titleDPE'),
                    body: [{
                                label: ed.getLang('wpdpeges_tinymce_plugin.value'),
                                name: 'value',
                                type: 'textbox',
                                value: '1'
                            },
                            {
                                label: ed.getLang('wpdpeges_tinymce_plugin.metaDPEvalue'),
                                name: 'metaDPEvalue',
                                type: 'textbox',
                                value: ''
                            },
	                    {
	                        label: ed.getLang('wpdpeges_tinymce_plugin.displayInline'),
	                        name: 'inline',
	                        type: 'listbox',
	                        values: [
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.yes'), value: 'true'},
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.no'), value: 'false'}
	                        ]
	                    }
                    ],
                    onsubmit: function (e) {
                        var inline = e.data['inline'];
                        var number = e.data['value'];
                        number = parseFloat(number);
                        var metaDPEvalue = e.data['metaDPEvalue'];
                        if (metaDPEvalue != "") {
                            shortcode = '[dpe meta_key="' + metaDPEvalue + '" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }else if (number > 0) {
                            shortcode = '[dpe value="' + number + '" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }else {
                            shortcode = '[dpe value="" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }
                    }
                });
            });
            ed.addButton('GES', {
                title : ed.getLang('wpdpeges_tinymce_plugin.titleGES'),
                cmd : 'ges',
                image : url + '/../images/tinymce-ges.png'
            });
            ed.addCommand('ges', function() {
                ed.windowManager.open({
                    title: ed.getLang('wpdpeges_tinymce_plugin.titleGES'),
                    body: [{
                                label: ed.getLang('wpdpeges_tinymce_plugin.value'),
                                name: 'value',
                                type: 'textbox',
                                value: '1'
                            },
                            {
                                label: ed.getLang('wpdpeges_tinymce_plugin.metaGESvalue'),
                                name: 'metaGESvalue',
                                type: 'textbox',
                                value: ''
                            },
	                    {
	                        label: ed.getLang('wpdpeges_tinymce_plugin.displayInline'),
	                        name: 'inline',
	                        type: 'listbox',
	                        values: [
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.yes'), value: 'true'},
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.no'), value: 'false'}
	                        ]
	                    }
                    ],
                    onsubmit: function (e) {
                        var inline = e.data['inline'];
                        var number = e.data['value'];
                        number = parseFloat(number);
                        var metaGESvalue = e.data['metaGESvalue'];
                        if (metaGESvalue != "") {
                            shortcode = '[ges meta_key="' + metaGESvalue + '" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }else if (number > 0) {
                            shortcode = '[ges value="' + number + '" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }else {
                            shortcode = '[ges value="" inline="' + inline + '"/]';
                            ed.execCommand('mceInsertContent', 0, shortcode);
                        }
                    }
                });
            });
            ed.addButton('DPEGES', {
                title : ed.getLang('wpdpeges_tinymce_plugin.titleDPEGES'),
                cmd : 'dpeges',
                image : url + '/../images/tinymce-dpeges.png'
            });
            ed.addCommand('dpeges', function() {
                ed.windowManager.open({
                    title: ed.getLang('wpdpeges_tinymce_plugin.titleDPEGES'),
                    body: [{
                                label: ed.getLang('wpdpeges_tinymce_plugin.DPEvalue'),
                                name: 'dpevalue',
                                type: 'textbox',
                                value: '1'
                            },
                            {
                                label: ed.getLang('wpdpeges_tinymce_plugin.GESvalue'),
                                name: 'gesvalue',
                                type: 'textbox',
                                value: '1'
                            },
                            {
                                label: ed.getLang('wpdpeges_tinymce_plugin.metaDPEvalue'),
                                name: 'metaDPEvalue',
                                type: 'textbox',
                                value: ''
                            },
                            {
                                label: ed.getLang('wpdpeges_tinymce_plugin.metaGESvalue'),
                                name: 'metaGESvalue',
                                type: 'textbox',
                                value: ''
                            },
	                    {
	                        label: ed.getLang('wpdpeges_tinymce_plugin.displayInline'),
	                        name: 'inline',
	                        type: 'listbox',
	                        values: [
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.yes'), value: 'true'},
	                            {text: ed.getLang('wpdpeges_tinymce_plugin.no'), value: 'false'}
	                        ]
	                    }
                    ],
                    onsubmit: function (e) {
                        var inline = e.data['inline'];
                        var dpe = e.data['dpevalue'];
                        var ges = e.data['gesvalue'];
                        var metaDPEvalue = e.data['metaDPEvalue'];
                        var metaGESvalue = e.data['metaGESvalue'];
                        if( metaDPEvalue != null || metaGESvalue != null){
                            shortcode = '[dpeges dpe_meta_key="' + metaDPEvalue + '" ges_meta_key="' + metaGESvalue + '" inline="' + inline + '"/]';
                        }else{
                            shortcode = '[dpeges dpe_value="' + dpe + '" ges_value="' + ges + '" inline="' + inline + '"/]';
                        }
                        ed.execCommand('mceInsertContent', 0, shortcode);
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
                longname : 'DPE/GES Buttons',
                author : 'Sébastien Renaudeau',
                authorurl : 'http://www.renaudeau.fr',
                version : "1.0"
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( 'wpdpeges', tinymce.plugins.wpdpeges );
})();

