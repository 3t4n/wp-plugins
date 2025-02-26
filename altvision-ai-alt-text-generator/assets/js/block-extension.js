(function(wp) {
    var addFilter = wp.hooks.addFilter;
    var createHigherOrderComponent = wp.compose.createHigherOrderComponent;
    var Fragment = wp.element.Fragment;
    var createElement = wp.element.createElement;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var Button = wp.components.Button;
    var TextareaControl = wp.components.TextareaControl;
    var { useState, useEffect } = wp.element;

    // Add custom attribute
    function addImageAttribute(settings, name) {
        if (name !== 'core/image') return settings;
    
        return Object.assign({}, settings, {
            attributes: Object.assign({}, settings.attributes, {
                processedContent: {
                    type: 'string',
                    default: ''
                },
                showUpgradeNotice: {
                    type: 'boolean',
                    default: false
                }
            })
        });
    }


    function getAdjacentContent(props) {
        const { getBlocksByClientId, getBlockOrder } = wp.data.select('core/block-editor');
        const parentBlockId = props.clientId;
        const siblingBlocks = getBlockOrder(props.parentClientId);
        const currentIndex = siblingBlocks.indexOf(parentBlockId);
        
        let content = '';
        
        // Get content from previous block
        if (currentIndex > 0) {
            const prevBlock = getBlocksByClientId(siblingBlocks[currentIndex - 1])[0];
            content += prevBlock?.attributes?.content || '';
        }
        
        // Get content from next block
        if (currentIndex < siblingBlocks.length - 1) {
            const nextBlock = getBlocksByClientId(siblingBlocks[currentIndex + 1])[0];
            content += ' ' + (nextBlock?.attributes?.content || '');
        }
        
        return content.trim();
    }



    // Create inspector controls
    var withImageProcessing = createHigherOrderComponent(function(BlockEdit) {
        return function(props) {
            const [copySuccess, setCopySuccess] = useState(false);
            const [isLoading, setIsLoading] = useState(false);
    

            useEffect(() => {
                // Load existing alt text when block is mounted
                if (props.name === 'core/image' && props.attributes.id) {
                    loadExistingAltText(props.attributes.id);
                }
            }, [props.attributes.id]);

            async function loadExistingAltText(imageId) {
                console.log('🔍 Loading alt text for image:', imageId);
                try {
                    // Try to get from WP Media library first
                    const mediaItem = wp.media.attachment(imageId);
                    console.log('🔍 Media Item:', mediaItem);
                    let altText = mediaItem.get('alt');
                    console.log('🔍 Alt text from media item:', altText);
                    
                    // If not found, try REST API
                    if (!altText) {
                        console.log('🔄 No alt text in media item, trying REST API');
                        const response = await wp.apiRequest({
                            path: `/wp/v2/media/${imageId}`,
                            method: 'GET'
                        });
                        console.log('✅ REST API response:', response);
                        altText = response.alt_text;
                        console.log('🔍 Alt text from REST:', altText);
                    }
                    
                    // Only set processedContent if there is no existing alt text
                    if (!props.attributes.alt) {
                        if (altText) {
                            console.log('✅ Setting alt text:', altText);
                            props.setAttributes({ 
                                processedContent: altText,
                                showUpgradeNotice: false 
                            });
                        } else {
                            console.log('❌ No alt text found in any source');
                        }
                    } else {
                        console.log('⏭️ Skipping alt text update - existing alt text found');
                        props.setAttributes({
                            processedContent: '',
                            showUpgradeNotice: false
                        });
                    }
                } catch (error) {
                    console.error('❌ Error loading alt text:', error);
                }
            }

            if (props.name !== 'core/image') {
                return createElement(BlockEdit, props);
            }

            async function copyToClipboard() {
                try {
                    await navigator.clipboard.writeText(props.attributes.processedContent);
                    setCopySuccess(true);
                    setTimeout(() => setCopySuccess(false), 2000);
                } catch (err) {
                    console.error('Failed to copy text:', err);
                }
            }

            function processImage() {
                if (!props.attributes.url) {
                    console.error('No image URL found');
                    return;
                }
            
                setIsLoading(true); // Start loading
                const restUrl = window.wpApiSettings ? window.wpApiSettings.root : '/wp-json/';
                const requestData = {
                    image_url: props.attributes.url,
                    adjacent_content: getAdjacentContent(props)
                };
                
                fetch(restUrl + 'image-processor/v1/process', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': wpApiSettings.nonce
                    },
                    body: JSON.stringify(requestData)
                })
                .then(async response => {
                    const text = await response.text();
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
                    }
                    return JSON.parse(text);
                })
                .then(data => {
                    setIsLoading(false); // Stop loading on success
                    if (data.message) {
                        if (data.message.includes('Daily limit reached')) {
                            props.setAttributes({ 
                                processedContent: '',
                                showUpgradeNotice: true 
                            });
                        } else {
                            props.setAttributes({ 
                                processedContent: data.message,
                                showUpgradeNotice: false,
                                alt: data.message
                            });
                            
                            if (props.attributes.id) {
                                wp.media.attachment(props.attributes.id).saveAltText(data.message);
                            }
                        }
                    }
                })
                .catch(error => {
                    setIsLoading(false); // Stop loading on error
                    console.error('Error details:', error);
                });
            }
    
            return createElement(
                Fragment,
                null,
                createElement(BlockEdit, props),
                createElement(
                    InspectorControls,
                    null,
                    createElement(
                        PanelBody,
                        {
                            title: 'Alt Text Generator',
                            initialOpen: true
                        },
                        createElement(
                            Button,
                            {
                                isPrimary: true,
                                onClick: processImage,
                                style: {
                                    width: '100%',
                                    margin: '10px 0'
                                },
                                isBusy: isLoading,
                                disabled: isLoading
                            },
                            isLoading ? 'Processing...' : 'Process Image with API'
                        ),
                        props.attributes.showUpgradeNotice && createElement(
                            'div',
                            {
                                style: {
                                    marginTop: '10px',
                                    color: '#395773'
                                }
                            },
                            createElement(
                                'span',
                                null,
                                'Daily limit reached. '
                            ),
                            createElement(
                                'a',
                                {
                                    href: window.altVisionMedia?.adminUrl || '#',
                                    style: {
                                        textDecoration: 'underline'
                                    }
                                },
                                'Upgrade to Premium →'
                            )
                        ),
                        !props.attributes.showUpgradeNotice && props.attributes.processedContent && createElement(
                            'div',
                            {
                                style: {
                                    position: 'relative',
                                    marginTop: '10px'
                                }
                            },
                            createElement(
                                TextareaControl,
                                {
                                    label: 'API Response',
                                    value: props.attributes.processedContent,
                                    readOnly: true,
                                    __nextHasNoMarginBottom: true
                                }
                            ),
                            createElement(
                                Button,
                                {
                                    isSecondary: true,
                                    onClick: copyToClipboard,
                                    style: {
                                        position: 'absolute',
                                        right: '0',
                                        top: '24px'
                                    }
                                },
                                copySuccess ? '✓ Copied!' : 'Copy'
                            )
                        )
                    )
                )
            );
        };
    }, 'withImageProcessing');

    // Register filters
    addFilter(
        'blocks.registerBlockType',
        'image-processor/add-attribute',
        addImageAttribute
    );

    addFilter(
        'editor.BlockEdit',
        'image-processor/with-inspector-controls',
        withImageProcessing
    );

})(window.wp);