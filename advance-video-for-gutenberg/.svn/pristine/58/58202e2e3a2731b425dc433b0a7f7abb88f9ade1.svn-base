import {AdvanceVideoDesign} from './AdvancedVideoDesign';


import * as React from "react";
import {VideoControl} from "./VideoControl";
( function() {


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

    registerBlockType(
        'rednao/advance-video', // Block name. Must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
        {

            title: __( 'Advance Video' ), // Block title. __() function allows for internationalization.
            icon: 'format-video', // Block icon from Dashicons. https://developer.wordpress.org/resource/dashicons/.
            category: 'common', // Block category. Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
            attributes: {
                id: {
                    type: 'number',
                },
                src: {
                    type: 'string',
                },
                fileUrl:{
                    type:'string'
                },
                fileName:{
                    type:'string'
                },
                autoPlay:{
                    type:'boolean'
                },
                showControls:{
                    type:'boolean',
                    default:true
                },
                loop:{
                    type:'boolean'
                },
                width:{
                    type:'number',
                    default:-1
                },
                height:{
                    type:'number',
                    default:-1
                },
                align:{
                    type:'string',
                    default:''
                }

            },

            // Defines the block within the editor.
            edit:AdvanceVideoDesign,


            // Defines the saved block.
            save: function( attributes ) {
                return (

                        <VideoControl {...attributes}></VideoControl>

                )
            },
            transforms: {
                from: [
                    {
                        type: 'files',
                        isMatch( files ) {
                            return files.length === 1 && files[ 0 ].type.indexOf( 'video/' ) === 0;
                        },
                        transform( files ) {

                            let createBlock:any=wp.blocks.createBlock;
                            const file = files[ 0 ];
                            return createBlock( 'rednao/advance-video', {
                                fileUrl: window.URL.createObjectURL( file ),
                                fileName:file.name
                            } );
                            // We don't need to upload the media directly here
                            // It's already done as part of the `componentDidMount`
                            // int the image block
                           /* const block = */

                        },
                    }
                ],
            }
        }
    );
})();

declare let wp;
