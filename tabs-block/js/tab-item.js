( function( blocks, element, editor, components, i18n ) {
    var el = element.createElement;

    var __                = i18n.__;
    var createElement     = element.createElement;
    var InspectorControls = editor.InspectorControls;
    var RichText          = editor.RichText;
 
    blocks.registerBlockType( 'tishonator/tab-item-block', {
        title: 'Tab Item',
        icon: 'welcome-widgets-menus',
        category: 'widgets',

        attributes: {
            title: {
                type: 'string',
            },
            content: {
                type: 'string',
            },
        },

        edit: function( props ) {
            return createElement('div', {},
            [
                createElement( wp.blockEditor.RichText, {
                    tagName: 'h3',
                    value: props.attributes.title,
                    class: 'tish-tab-item',
                    onChange: function( content ) {
                        props.setAttributes( { title: content } );
                    },
                    placeholder: __( 'Tab Item Header', 'tishonator' ),
                } ),
                createElement( wp.blockEditor.RichText, {
                    tagName: 'div',
                    value: props.attributes.content,
                    class: 'tish-tab-content',
                    onChange: function( content ) {
                        props.setAttributes( { content: content } );
                    },
                    placeholder: __( 'Tab Item Content', 'tishonator' ),
                        } ),
            ]);
    },
 
    save: function( props ) {
        return createElement('div', {},
            [
                createElement( wp.blockEditor.RichText.Content, {
                    tagName: 'h3',
                    class: 'tish-tab-item',
                    value: props.attributes.title
                } ),
                createElement( wp.blockEditor.RichText.Content, {
                    tagName: 'div',
                    class: 'tish-tab-content',
                    value: props.attributes.content
                } )
            ]);
    }

    } );
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n
) );

