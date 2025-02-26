
const { RawHTML } = wp.element;
const { registerBlockType, createBlock } = wp.blocks;

import brace from 'brace';
import AceEditor from 'react-ace';

import 'brace/mode/html';
import 'brace/theme/tomorrow';


registerBlockType( 'aceblock/aceblock', {
    title: 'ACE HTML Block',
    icon: 'heart',
    category: 'formatting',
    supports: {
        className: false,
        html: false,
    },
    attributes: {
        content: {
            type: 'string',
            source: "html"
        }
    },
    transforms: {
        to: [
            {
                type: 'block',
                blocks: [ 'core/html' ],
                transform: function( attributes ) {
                    return createBlock( 'core/html', {
                        content: attributes.content,
                    } );
                },
            },
            {
                type: 'block',
                blocks: [ 'core/shortcode' ],
                transform: function( attributes ) {
                    return createBlock( 'core/shortcode', {
                        content: attributes.content,
                    } );
                },
            },
        ],
        from: [
            {
                type: 'block',
                blocks: [ 'core/html', 'core/shortcode' ],
                transform: function ( attributes ) {
                    return createBlock( 'aceblock/aceblock', {
                        content: attributes.content,
                    } );
                },
            },
        ]
    },
    edit: function( props ) {

        var key = props.clientId;

        function onChangeHandler(e) {
            props.setAttributes( { content: e } )
        }

        function onLoadHandler(editor) {
            // solution found at https://stackoverflow.com/questions/33232632/how-can-i-remove-the-first-doctype-tooltip-of-the-ace-editor-in-my-html-editor
            var session = editor.getSession();
            session.on("changeAnnotation", function () {
                let annotations = session.getAnnotations() || []
                let i = annotations.length;
                let len = annotations.length;
                while (i--) {
                    if (/doctype first\. Expected/.test(annotations[i].text)) {
                        annotations.splice(i, 1);
                    }
                    else if (/Unexpected End of file\. Expected/.test(annotations[i].text)) {
                        annotations.splice(i, 1);
                    }
                }
                if (len > annotations.length) {
                    session.setAnnotations(annotations);
                }
            });
        }
       
        return ( <AceEditor
                    name= {"ace_" + key}
                    mode="html"
                    theme="tomorrow"
                    value={props.attributes.content}

                    onChange={onChangeHandler}
                    onLoad={onLoadHandler}

                    height="auto"
                    width="100%"
                    wrapEnabled={true}
                    minLines={3}
                    maxLines={Infinity}
                /> );
    },

    save: function( props ) {
        return  <RawHTML>{props.attributes.content}</RawHTML>;
    }
 } 
);