const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
const { useBlockProps } = wp.blockEditor;
const { Button, Toolbar, ToolbarButton } = wp.components;
const { BlockControls } = wp.blockEditor;

registerBlockType('awesome-emoji-reactions/reactions', {
    title: 'Emoji Reactions',
    icon: 'smiley',
    category: 'widgets',
    
    supports: {
        html: false,
        multiple: false,
        reusable: false
    },
    
    edit: function({ clientId }) {
        const blockProps = useBlockProps();
        
        return [
            wp.element.createElement(
                BlockControls,
                { key: 'controls' },
                wp.element.createElement(
                    Toolbar,
                    null,
                    wp.element.createElement(
                        ToolbarButton,
                        {
                            icon: 'trash',
                            label: __('Delete reactions block', 'awesome-emoji-reactions'),
                            onClick: () => {
                                const { removeBlock } = wp.data.dispatch('core/block-editor');
                                removeBlock(clientId);
                            }
                        }
                    )
                )
            ),
            wp.element.createElement(
                'div',
                {
                    ...blockProps,
                    key: 'preview',
                    className: 'aerppk-block-preview'
                },
                wp.element.createElement(
                    'div',
                    { className: 'components-placeholder' },
                    wp.element.createElement(
                        'div',
                        { className: 'components-placeholder__label' },
                        __('Emoji Reactions', 'awesome-emoji-reactions')
                    ),
                    wp.element.createElement(
                        'div',
                        { className: 'components-placeholder__instructions' },
                        __('Reactions block will be displayed here', 'awesome-emoji-reactions')
                    )
                )
            )
        ];
    },
    
    save: function() {
        return null;
    }
});