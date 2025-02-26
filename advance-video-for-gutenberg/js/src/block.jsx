"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var BlockComponents_1 = require("./BlockComponents");
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
        icon: 'lock',
        category: 'common',
        // Defines the block within the editor.
        edit: BlockComponents_1.AdvanceVideo,
        // Defines the saved block.
        save: function (props) {
            return createElement('p', // Tag type.
            {
                className: props.className,
            }, 'Static block example562;.' // Block content
            );
        },
    });
})();
