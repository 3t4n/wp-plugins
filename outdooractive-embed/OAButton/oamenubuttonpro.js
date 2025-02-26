(function() {
    tinymce.create('tinymce.plugins.outdooractiveEmbed', {
        init: function(ed, url) {
            ed.addButton('button_outdooractive', {
                title: ed.getLang('outdooractiveEmbed.insertContent'),
                image: url + '/O20.gif',
                onclick: function() {
                    ed.windowManager.open({
                        title: ed.getLang('outdooractiveEmbed.embedWindowTitle'),
                        body: [{
                                type: 'checkbox',
                                name: 'usepro',
                                text: ed.getLang('outdooractiveEmbed.usePro'),
                                checked: true,
                            },
                            {
                                type: 'textbox',
                                name: 'contentid',
                                label: ed.getLang('outdooractiveEmbed.embedLinkLabel'),
                                value: ''
                            },
                            {
                                type: 'textbox',
                                name: 'maxwidth',
                                label: ed.getLang('outdooractiveEmbed.maxWidth'),
                                value: ''
                            }
                        ],
                        onsubmit: function(e) {
                            ed.insertContent('[oaembed url="' + e.data.contentid + '" maxwidth="' + e.data.maxwidth + '" usepro=' + e.data.usepro + ']');
                        }
                    });
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('outdooractive_script', tinymce.plugins.outdooractiveEmbed);
})();