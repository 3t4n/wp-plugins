(function () {
    tinymce.PluginManager.add('aptmce_btn', function (editor, url) {
        editor.addButton('aptmce_btn', {
            text: 'Add popup',
            icon: false,
            onclick: function () {
                editor.windowManager.open({
                    title: 'Enter Your PopUp Contents',
                    body: [
                        {
                            type: 'textbox',
                            name: 'textboxName',
                            label: 'Title',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'multilineName',
                            label: 'Content',
                            value: '',
                            multiline: true,
                            minWidth: 300,
                            minHeight: 100
                        },


                    ],
                    onsubmit: function (e) {
                        editor.insertContent('[show_popup title="' + e.data.textboxName + '"]' + e.data.multilineName + '[/show_popup]');
                    }
                });
            }
        });
    });
})();

