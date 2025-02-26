const APOC_URL = 'https://www.apoc.day/#/';
const { registerBlockType } = wp.blocks;
const {useBlockProps, RichText, AlignmentToolbar, BlockControls, } = wp.blockEditor;
const el = React;

/**
 * Logo
 */
const iconEl = el.createElement('img', {className: 'apoc-logo', alt:'apoc-logo', src: ''});

/**
 * Register Block Type
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 * @function registerBlockType($string, $agg)
 */
registerBlockType('apoc/custom-block', {
    title: 'APOC',
    icon: iconEl,
    category: 'embed',
    attributes: {
        cover: iconEl,
        author: 'Famppy INC',
        apocUrl: { type: 'string' },
        inputKey: { type: 'string' },
    },
    edit: function(props){

        if (!props.attributes.inputKey) props.attributes.inputKey = 'apoc-block-' + Math.floor( Math.random() * 100000000000) + 1;

        function buttonClick(e){

        }

        function updateChange(e){
            if (props.setAttribute)
                props.setAttribute({ apocUrl: e.target.value });

            props.attributes.apocUrl = e.target.value;
        }

        function updateFocus(e){
            // if (props.attributes.apocUrl){
            //     e.target.value = props.attributes.apocUrl;
            // }
        }

        const wrapper = el.createElement('div', { className:'components-placeholder wp-block-embed is-large apoc-custom-block' },
            el.createElement('div', {className: 'components-placeholder__label'},
                el.createElement('span', { className:'block-editor-block-icon has-colors'},
                    iconEl
                ),
                'APOC URL'),
            el.createElement('fieldset', {className:'components-placeholder__fieldset'},
                el.createElement('legend', {className:'components-placeholder__instructions'}, 'Enter the URL copied by the Share button'),
                el.createElement('form', null,
                    el.createElement('input', {type: 'url', id: props.attributes.inputKey, className: 'components-placeholder__input', ariaLabel:'APOC URL', value: props.attributes.apocUrl, placeHolder: 'Paste a APOC Contents Key', onFocus: updateFocus, onChange: updateChange }),
                    // el.createElement('button', { type: 'button', className: 'components-button is-primary', onClick: buttonClick }, 'Embed')
                ),
                el.createElement('div', {className: 'components-placeholder__learn-more'},
                    el.createElement('a', {className: 'components-external-link', target: '_blank', rel:'external noreferrer noopener', href:'https://www.apoc.day/#/wordpress/howtouse'}, 'Learn more about embeds',
                        el.createElement('i', {className:'fa fa-share-square-o icon'}),
                    ),
                ),
            ),
        );
        return wrapper;
    },
    save: function(props){
        console.log(`apoc url : `,props.attributes.apocUrl)
        if (!props.attributes.apocUrl) return '';
        if(props.attributes.apocUrl.indexOf(APOC_URL + 'd/') !== 0 && props.attributes.apocUrl.indexOf(APOC_URL + 'direct/') !== 0) return ''

        return el.createElement('div', { className:'apoc-contents-viewer contents-viewer', style:'width:100%; height:450px; background: black;' },
            el.createElement('iframe', { src:  props.attributes.apocUrl, className:'crack-player', frameBorder: '0', style: 'width:inherit; height:inherit', })
        );
    }
})
