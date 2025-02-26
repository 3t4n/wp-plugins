(function ($) {
    'use strict';

    $(function () {
        tinymce.PluginManager.add('widget_shortcode', function (editor, url) {
            editor.addButton('widget_shortcode', {
                text: 'Leadnow.pl',
                icon: 'fastpay__icon',
                type: 'menubutton',
                menu: [
                    {
                        text: 'Widget Fastpay.pl',
                        onclick: function () {
                            editor.windowManager.open({
                                title: 'Osadź widget',
                                width: 600,
                                height: 600,
                                body: [
                                    {
                                        type: 'textbox',
                                        name: 'id',
                                        label: 'ID widgetu'
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'title',
                                        label: 'Tytuł'
                                    },
                                    {
                                        type: 'colorpicker',
                                        name: 'bg_color',
                                        label: 'Kolor tła',
                                        value: '#ffffff',
                                    },
                                    {
                                        type: 'colorpicker',
                                        name: 'fastpay_color',
                                        label: 'Kolor przycisków',
                                        value: '#ff9900',
                                    },

                                    {
                                        type: 'textbox',
                                        name: 'modal_delay',
                                        label: 'Czas pojawienia się widgetu'
                                    },
                                ],
                                onsubmit: function (e) {

                                    var params = '';

                                    for (var param in e.data) {
                                        params += param + '=' + e.data[param].replace('#', '') + ' ';
                                    }

                                    editor.insertContent('[widget ' + params + ']');
                                }
                            });
                        }
                    },
                    {
                        text: 'Skracacz',
                        onclick: function () {
                            editor.windowManager.open({
                                title: 'Osadź Link',
                                width: 600,
                                height: 100,
                                body: [{
                                    type: 'textbox',
                                    name: 'href',
                                    label: 'ID linka'
                                }],
                                onsubmit: function (e) {

                                    var params = '';

                                    for (var param in e.data) {
                                        params += param + '=' + e.data[param].replace('#', '') + ' ';
                                    }

                                    editor.insertContent('[leadnow_url ' + params + ']');
                                }
                            });
                        }
                    },
                    {
                        text: 'Player pobierz123',
                        onclick: function () {
                            editor.windowManager.open({
                                title: 'Osadź player',
                                width: 600,
                                height: 120,
                                body: [
                                    {
                                        type: 'textbox',
                                        name: 'id',
                                        label: 'ID linka'
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'title',
                                        label: 'Tytuł'
                                    },
                                ],
                                onsubmit: function (e) {

                                    var params = '';

                                    for (var param in e.data) {
                                        params += param + '=' + e.data[param].replace('#', '') + ' ';
                                    }

                                    editor.insertContent('[leadnow_video ' + params + ']');
                                }
                            });
                        }
                    }
                ],

            });
        });
    });
})(jQuery);

