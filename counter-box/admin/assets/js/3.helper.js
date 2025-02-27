'use strict'

jQuery(document).ready(function ($) {

    $.fn.wowFullEditor = function () {
        this.each(function (index, element) {
            const newId = 'wpie-fulleditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border': 'none', 'width': '100%'});
            if(index === 0) {
                wp.editor.initialize(
                    newId,
                    {
                        tinymce: {
                            wpautop: false,
                            plugins: 'lists wplink hr charmap textcolor colorpicker paste tabfocus wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern table',
                            toolbar1: 'bold italic underline subscript superscript blockquote | bullist numlist | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
                            toolbar2: 'strikethrough hr | forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo wp_help ',
                            toolbar3: 'formatselect fontselect fontsizeselect | table',
                            toolbar4: 'counterYear counterDay counterHour counterMin counterSec | counterCount',
                            height: 150,

                            setup: function (editor) {
                                editor.addButton('counterYear', {
                                    text: '{year}',
                                    tooltip: 'display of year count',
                                    onclick: function () {
                                        editor.insertContent('{year}');
                                    }
                                });
                                editor.addButton('counterDay', {
                                    text: '{day}',
                                    tooltip: 'display of days count',
                                    onclick: function () {
                                        editor.insertContent('{day}');
                                    }
                                });
                                editor.addButton('counterHour', {
                                    text: '{hour}',
                                    tooltip: 'display of hours count',
                                    onclick: function () {
                                        editor.insertContent('{hour}');
                                    }
                                });
                                editor.addButton('counterMin', {
                                    text: '{min}',
                                    tooltip: 'display of minutes count',
                                    onclick: function () {
                                        editor.insertContent('{min}');
                                    }
                                });
                                editor.addButton('counterSec', {
                                    text: '{sec}',
                                    tooltip: 'display of seconds count',
                                    onclick: function () {
                                        editor.insertContent('{sec}');
                                    }
                                });
                                editor.addButton('counterCount', {
                                    text: '{counter}',
                                    tooltip: 'display of counter',
                                    onclick: function () {
                                        editor.insertContent('{counter}');
                                    }
                                });
                            }
                        },
                        quicktags: {
                            buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close",
                        },
                        mediaButtons: false,
                    }
                );
            } else {
                wp.editor.initialize(
                    newId,
                    {
                        tinymce: {
                            wpautop: false,
                            plugins: 'lists wplink hr charmap textcolor colorpicker paste tabfocus wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern table',
                            toolbar1: 'bold italic underline subscript superscript blockquote | bullist numlist | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
                            toolbar2: 'strikethrough hr | forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo wp_help ',
                            toolbar3: 'formatselect fontselect fontsizeselect | table',
                            height: 150,
                        },
                        quicktags: {
                            buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close",
                        },
                        mediaButtons: false,
                    }
                );
            }
        });
    };



    $.fn.wowTextEditor = function () {
        this.each(function (index, element) {
            const newId = 'wpie-shorteditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border-top': 'none', 'min-height': '2'});

            wp.editor.initialize(newId, {
                tinymce: false, // This disables Visual mode
                quicktags: {
                    buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,fullscreen"
                },
                mediaButtons: false,
            });
        });
    };

    $.fn.wowIconPicker = function () {
        this.fontIconPicker({
            theme: 'fip-darkgrey',
            emptyIcon: false,
            allCategoryText: 'Show all',
        });
    };


});