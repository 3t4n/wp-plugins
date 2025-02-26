(function(  ) {

    'use strict';
    //
    // tinymce.init({
    //     setup: function (ed) {alert('dfdf');
    //         // make sure the instance of the TinyMCE editor has been fully loaded
    //         ed.on('init', function (args) {
    //             // find the iframe which relates to this instance of the editor
    //             var iframe = $("#" + args.target.id + "_ifr");
    //
    //             // get the head element of the iframe's document and inject the javascript
    //             $(iframe[0].contentWindow.document)
    //                 .children('html')
    //                 .children('head')
    //                 .append('<script type="text/javascript">alert("Executing inside iFrame!");</script>');
    //         });
    //
    //     }
    //
    // });

    tinymce.create('tinymce.plugins.AIBuyPlayer', {

        url:'',
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            //ed.popupTest = new Popup(ed, url);
            if (!window.aibuyPopup) {
                window.aibuyPopup = new Popup(url);
            }
            this.url = url;
            ed.addButton('aibuy_player', {
                title : 'Player',
                cmd : 'aibuy_player',
                image : url + '/video.png',

            });

            ed.on('init', function (args) {
                // find the iframe which relates to this instance of the editor
                var iframe = $("#" + args.target.id + "_ifr");

                // get the head element of the iframe's document and inject the javascript
                $(iframe[0].contentWindow.document)
                    .children('html')
                    .children('head')
                    .append(
                        '<script type="text/javascript" src="' + url + '/aibuy_editor_player.js' + '"></script>'
                    );
            });

            ed.addCommand('aibuy_player', function() {
                window.aibuyPopup.setEditor();
                window.aibuyPopup.show();
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
                longname : 'AIBuy Player',
                author : 'Hmylko Vladimir',
                authorurl : '',
                infourl : '',
                version : "1.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'aibuy_player', tinymce.plugins.AIBuyPlayer );

    function Popup (url) {

        let that = this;
        let hasError = false;

        this.setEditor = function() {
            that.formFields.currentVideo = null;
            that.ed = window.tinyMCE.activeEditor;
            setDefaultValues();

        }

        let init = function(url) {
            //that.ed = ed;
            //that.ed = window.tinyMCE.activeEditor;
            that.url = url;

            getHtmlPopup();
            that.formFields = getFormFields();
            setDefaultValues();
            addEvents();
        };

        let addEvents = function() {
            document.querySelector('.aibuy_popup_close').addEventListener('click', function() {
                that.hide();
            })

            document.querySelector('.aibuy_popup_save').addEventListener('click', function() {
                removeError();
                validateForm();
                if (!hasError) {
                    if (that.formFields.currentVideo) {
                        that.formFields.currentVideo[0].dataset.u = that.formFields.urlField.value
                        that.formFields.currentVideo[0].dataset.w = that.formFields.widthField.value
                        that.formFields.currentVideo[0].dataset.h = that.formFields.heightField.value
                        that.setCurrentVideo(null);
                        that.hide();
                    } else {
                        let returnedText = '<img class="aibuy_video_player" onclick="test" data-u="' + that.formFields.urlField.value + '"' +
                            ' data-w="' + that.formFields.widthField.value + '"' +
                            ' data-h="' + that.formFields.heightField.value + '" ' +
                            ' data-key="' + getUniqKey() + '" ' +
                            ' src="' + that.url + '/video-icon.png" style="width: 20px" >';
                        that.ed.execCommand('mceInsertContent', 0, returnedText);
                        that.hide();
                    }
                }
            })
        };

        let setDefaultValues = function() {
            that.formFields.urlField.value = '';
            that.formFields.widthField.value = '100%';
            that.formFields.heightField.value = '460px';
        }

        let getHtmlPopup = function() {
            var container = document.createElement("div");
            var popup = document.createElement("div");
            container.setAttribute('id', 'aibuy_popup_container');
            popup.className = "aibuy_popup";
            popup.innerHTML = getHtmlForm();
            container.appendChild(popup);
            document.body.appendChild(container);
            return container;
        }

        let getHtmlForm = function() {
            return '<div class="aibuy_popup_form">\n' +
                '            <div class="aibuy_popup_close" title="Close">x</div>\n' +
                '            <h3>AIBuy Player</h3>\n' +
                '            <div class="field_container">\n' +
                '                <label for="aibuy_popup_url">Video URL:</label>\n' +
                '                <input type="text" class="input_url" id="aibuy_popup_url" name="aibuy_popup_url" value="" placeholder="http://example.com">\n' +
                '            </div>\n' +
                '            <div class="field_container">\n' +
                '                <label for="aibuy_popup_width">Width:</label>\n' +
                '                <input type="text" class="input_number" id="aibuy_popup_width" name="aibuy_popup_width" value="" placeholder="100%">\n' +
                '            </div>\n' +
                '            <div class="field_container">\n' +
                '                <label for="aibuy_popup_height">Height:</label>\n' +
                '                <input type="text" class="input_number" id="aibuy_popup_height" name="aibuy_popup_height" value="" placeholder="460px">\n' +
                '            </div>\n' +
                '            <div class="button_container">\n' +
                '                <button class="button aibuy_popup_save">Save</button>\n' +
                '            </div>\n' +
                '            <div class="form_error">\n' +
                '            </div>\n' +
                '        </div>'
        }

        this.show = function() {
            document.querySelector('#aibuy_popup_container').style.display = "table";
        }

        this.hide = function() {
            document.querySelector('#aibuy_popup_container').style.display = "none";
            //document.querySelector('#aibuy_popup_container').remove();
        }

        this.setUrl = function(url) {
            that.formFields.urlField.value = url;
        }

        this.setWidth = function(width) {
            that.formFields.widthField.value = width;
        }

        this.setHeight = function(height) {
            that.formFields.heightField.value = height;
        }

        this.setCurrentVideo = function(video) {
            that.formFields.currentVideo = video;
        }

        let validateForm = function() {
            let urlVal = that.formFields.urlField.value;
            let widthVal = that.formFields.widthField.value;
            let heightVal = that.formFields.heightField.value;

            if (!urlVal || !widthVal || !heightVal) {
                addError();
            }
        }

        let getFormFields = function () {
            return ({
                urlField: document.querySelector('#aibuy_popup_url'),
                widthField: document.querySelector('#aibuy_popup_width'),
                heightField: document.querySelector('#aibuy_popup_height'),
            })
        }

        let addError = function() {
            hasError = true;
            document.querySelector('.form_error').innerHTML = 'All fields are required';
        }

        let removeError = function() {
            hasError = false;
            document.querySelector('.form_error').innerHTML = '';
        }

        let getUniqKey = function() {
            return (new Date()).getTime();
        }

        init(url);
    }
})(  );
