const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;

registerBlockType('story321/ai-story-generator-block', {
    title: 'AI Story Generator',
    description: 'AI Story Generator iframe',
    category: 'common',
    icon: 'edit',
    keywords: ['story', 'ai', 'book'],
    
    edit: function() {
        return createElement('div', { className: 'story321-ai-block editor-view' },
            createElement('iframe', {
                src: 'https://story321.com/story/new-story/',
                width: '100%',
                height: '600px',
                frameBorder: '0',
                allowFullScreen: true
            })
        );
    },

    save: function() {
        // 保存时返回null,因为我们使用了PHP端的render_callback
        return null;
    }
});
