(function () {

    function ifpIsGutenbergActive() {
        return typeof wp !== 'undefined' && typeof wp.blocks !== 'undefined';
    }

    tinymce.create('tinymce.plugins.ifpicons', {

        init: function (ed, url) {

            var t = this;
            t.url = url;

            if (ifpIsGutenbergActive()) {

                ed.addButton('ifpicons', {
                    id: 'ifpicons_gut_shorcode',
                    classes: 'ifpicons_gut_shorcode_btn',
                    text: 'Instagram Lite',
                    title: 'Instagram Lite',
                    cmd: 'mceifpicons_mce',
                    image: url + '/wp-dashboard-icon.png'
                });

            }

        },

    });

    tinymce.PluginManager.add('ifpicons', tinymce.plugins.ifpicons);
})();