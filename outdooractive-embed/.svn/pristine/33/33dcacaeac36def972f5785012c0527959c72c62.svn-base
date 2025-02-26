(function() {
    tinymce.create('tinymce.plugins.outdooractiveEmbed', {
        init: function(ed, url) {
            ed.addButton('button_outdooractive', {
                title: ed.getLang('outdooractiveEmbed.insertContent'),
                image: url + '/O20.gif',
                onclick: function() {
                    ed.windowManager.open({
                        title: ed.getLang('outdooractiveEmbed.embedWindowTitle'),
                        classes: 'oaembedTinyMCE',
                        body: [{
                                type: 'label',
                                name: 'pro',
                                text: '',
                                classes: 'oaembedLabel',
                                style: 'font-style: italic; line-height: 16px; top: 0px; height: 16px; padding: 5px 0;',
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
                        onopen: function(e) {
                            jQuery("span.mce-oaembedLabel").html(ed.getLang('outdooractiveEmbed.setPro'));
                            jQuery("span.mce-oaembedLabel a").css("vertical-align", "baseline");
                        },
                        onsubmit: function(e) {
                            ed.insertContent('[oaembed url="' + e.data.contentid + '" maxwidth="' + e.data.maxwidth + '"]');
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