(function () {
    tinymce.PluginManager.add('bits_codepen_list', function (editor, url) {
        editor.addButton('bits_codepen_list', {
            icon: 'code',
            title: BitsCodePenList.insertList,
            type: 'button',
            onclick: function () {
                editor.windowManager.open({
                    title: BitsCodePenList.insertList,
                    body: [
                        {
                            type: 'textbox',
                            name: 'username',
                            label: BitsCodePenList.username,
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'posts',
                            label: BitsCodePenList.count,
                            value: 5
                        },
                        {
                            type: 'listbox',
                            name: 'type',
                            label: BitsCodePenList.type,
                            values: [
                                {text: BitsCodePenList.public, value: 'public'},
                                {text: BitsCodePenList.popular, value: 'popular'},
                                {text: BitsCodePenList.posts, value: 'posts'},
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'cachetime',
                            label: BitsCodePenList.cacheTime,
                            values: [
                                {text: '6 ' + BitsCodePenList.hours, value: '21600'},
                                {text: '12 ' + BitsCodePenList.hours, value: '43200'},
                                {text: '24 ' + BitsCodePenList.hours, value: '86400'},
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'target',
                            label: BitsCodePenList.target,
                            values: [
                                {text: BitsCodePenList.sameWindow, value: '_self'},
                                {text: BitsCodePenList.newWindow, value: '_new'},
                            ]
                        },
                    ],
                    onsubmit: function (e) {
                        var props = '';
                        for (var i in e.data) {
                            props += ' ' + i + '="' + e.data[i] + '"';
                        }
                        editor.insertContent('[codepen-list'+props+']');
                    }
                });
            }
        });
    });
})();