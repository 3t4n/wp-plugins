"use strict";
var __assign = (this && this.__assign) || Object.assign || function(t) {
    for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
        for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
            t[p] = s[p];
    }
    return t;
};
Object.defineProperty(exports, "__esModule", { value: true });
var AdvancedVideoDesign_1 = require("./AdvancedVideoDesign");
var React = require("react");
var VideoControl_1 = require("./VideoControl");
(function () {
    var __ = wp.i18n.__; // The __() function for internationalization.
    var createElement = wp.element.createElement; // The wp.element.createElement() function to create elements.
    var registerBlockType = wp.blocks.registerBlockType; // The registerBlockType() function to register blocks.
    /**
     * Register block
     *
     * @param  {string}   name     Block name.
     * @param  {Object}   settings Block settings.
     * @return {?WPBlock}          Block itself, if registered successfully,
     *                             otherwise "undefined".
     */
    registerBlockType('rednao/advance-video', // Block name. Must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
    {
        title: __('Advance Video'),
        icon: 'format-video',
        category: 'common',
        attributes: {
            id: {
                type: 'number',
            },
            src: {
                type: 'string',
            },
            fileUrl: {
                type: 'string'
            },
            fileName: {
                type: 'string'
            },
            autoPlay: {
                type: 'boolean'
            },
            showControls: {
                type: 'boolean',
                default: true
            },
            loop: {
                type: 'boolean'
            },
            width: {
                type: 'number',
                default: -1
            },
            height: {
                type: 'number',
                default: -1
            },
            align: {
                type: 'string',
                default: ''
            }
        },
        // Defines the block within the editor.
        edit: AdvancedVideoDesign_1.AdvanceVideoDesign,
        // Defines the saved block.
        save: function (attributes) {
            return (React.createElement(VideoControl_1.VideoControl, __assign({}, attributes)));
        },
        transforms: {
            from: [
                {
                    type: 'files',
                    isMatch: function (files) {
                        return files.length === 1 && files[0].type.indexOf('video/') === 0;
                    },
                    transform: function (files) {
                        var createBlock = wp.blocks.createBlock;
                        var file = files[0];
                        return createBlock('rednao/advance-video', {
                            fileUrl: window.URL.createObjectURL(file),
                            fileName: file.name
                        });
                        // We don't need to upload the media directly here
                        // It's already done as part of the `componentDidMount`
                        // int the image block
                        /* const block = */
                    },
                }
            ],
        }
    });
})();
//# sourceMappingURL=block.js.map