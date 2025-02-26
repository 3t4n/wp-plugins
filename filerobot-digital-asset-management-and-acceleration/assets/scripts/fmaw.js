var l10n = wp.media.view.l10n;
var tabs = {
    upload: {
        text:     l10n.uploadFilesTitle,
        priority: 20
    },
    browse: {
        text:     l10n.mediaLibraryTitle,
        priority: 40
    },
    fmaw_tab: {
        text:     filerobot_admin_meta.name,
        priority: 60
    }
};

if (filerobot_admin_meta.fmaw_only == 1) {
    var css = '#menu-item-upload {display: none} #menu-item-browse {display:none}',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');
    head.appendChild(style);
    style.type = 'text/css';
    if (style.styleSheet){
        // This is required for IE8 and below.
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
}


wp.media.view.MediaFrame.Select.prototype.browseRouter = function(routerView)
{
    routerView.set(tabs);
};

var isElementor = (filerobot_admin_meta.isElementor) ? filerobot_admin_meta.isElementor : false;
var isGutenberg = document.body.classList.contains('block-editor-page');
var isWooCommerce = (jQuery('#woocommerce-product-data').length > 0) ? true : false;
var mediaManagerTriggerType = '';
var mediaManagerTriggerSource = null;
let frLastClickedElement = null;

// Function to handle the click event
function handleElementDriveClick(event) {
    // Update the last clicked element
    frLastClickedElement = event.target;
}
document.addEventListener('click', handleElementDriveClick);

jQuery(document).ready(function($) {
    // event resize image in classic editor
    let isClassicEditor = ($('#wp-content-wrap').length > 0 && $('#wp-content-wrap').hasClass('tmce-active')) ? true : false;
    if (isClassicEditor) {
        setTimeout(function () {
            $('.wp-editor-wrap textarea.wp-editor-area').each(function (el) {
                var tinyID = $(this).attr("id");
                var tinyInstance = tinyMCE.get(tinyID);
                if (tinyInstance !== null) {
                    tinyInstance.on('ObjectResized', function(e) {
                        var url = new URL($(e.target).attr('src'));
                        // console.log(url);
                        var params = new URLSearchParams(url.search);
                        if (params.has('w')) {
                            params.set('w', e.width);
                        } else {
                            params.append('w', e.width);
                        }

                        if (params.has('h')) {
                            params.set('h', e.width);
                        } else {
                            params.append('h', e.width);
                        }

                        url.search = `?${params.toString()}`;
                        // console.log(url.toString());
                        $(e.target).attr('src', url.toString());
                    });
                }
            });
        }, 1000);
    }

    // catch request send from browser
    // TODO: catch event change filename
    // var openDescriptor = Object.getOwnPropertyDescriptor(XMLHttpRequest.prototype, 'open'),
    //     sendDescriptor = Object.getOwnPropertyDescriptor(XMLHttpRequest.prototype, 'send');

    var open = window.XMLHttpRequest.prototype.open,
        send = window.XMLHttpRequest.prototype.send;
    function openReplacement(method, url, async, user, password) {
        this._url = url;
        return open.apply(this, arguments);
    }

    function sendReplacement(data) {
        if (this.onreadystatechange) {
            this._onreadystatechange = this.onreadystatechange;
        }
        let actionChangeName = false;
        let url = this._url.split("/");
        let uuid = '';
        if(url[url.length - 1] === 'name' && url[2] === 'api.filerobot.com') {
            actionChangeName = true;
            uuid = url[url.length - 2];
        }

        if (actionChangeName) {
            let jsonData = JSON.parse(data);
            var dataSend = {
                filename: jsonData.name,
                uuid: uuid,
                action: 'filerobot_fmaw_action_change_filename'
            };
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: dataSend,
                dataType: 'JSON'
            }).done(function (res) {
                console.log(res);
            });
        }
        this.onreadystatechange = onReadyStateChangeReplacement;
        return send.apply(this, arguments);
    }

    function onReadyStateChangeReplacement() {
        /**
         * PLACE HERE YOUR CODE FOR READYSTATECHANGE
         */
        if(this._onreadystatechange) {
            return this._onreadystatechange.apply(this, arguments);
        }
    }

    window.XMLHttpRequest.prototype.open = openReplacement;
    window.XMLHttpRequest.prototype.send = sendReplacement;
    // end catch request send from browser

    checkFeatureImageBlockRender();

    if (jQuery('.acf-editor-wrap .wp-editor-tools .wp-media-buttons .add_media').length) {
        jQuery('.acf-editor-wrap .wp-editor-tools .wp-media-buttons .add_media').attr('onclick', 'addTypeToMediaModal(this, "acf_wysiwyg")');
    }

    if (jQuery('.acf-image-uploader .hide-if-value .acf-button').length) {
        jQuery('.acf-image-uploader .hide-if-value .acf-button').attr('onclick', 'addTypeToMediaModal(this, "acf_image")');
    }

    if (jQuery('.acf-file-uploader .hide-if-value .acf-button').length) {
        jQuery('.acf-file-uploader .hide-if-value .acf-button').attr('onclick', 'addTypeToMediaModal(this, "acf_file")');
    }

    if (wp.media)
    {
        if (isWooCommerce)
        {
            jQuery('#wp-content-wrap .add_media').on('click', async function(e) { // WooCommerce Content Image
                mediaManagerTriggerType = 'woocommerce_content_image';
                mediaManagerTriggerSource = e.target;
            });
            jQuery('#postexcerpt .add_media').on('click', async function(e) { // WooCommerce Short Description Image
                mediaManagerTriggerType = 'woocommerce_short_desc_image';
                mediaManagerTriggerSource = e.target;
            });
            jQuery('#woocommerce-product-images a').on('click', async function(e) { // WooCommerce Gallery Image
                mediaManagerTriggerType = 'woocommerce_gallery_image';
                mediaManagerTriggerSource = e.target;
            });
        }

        jQuery('#customize-control-background_image .button-add-media').on('click', async function(e) { // Theme Background Image
                mediaManagerTriggerType = 'theme_background_image';
                mediaManagerTriggerSource = e.target;
        });

        jQuery(wp.media).on('click', '.edit-post-sidebar__panel-tabs ul li button', function(e) {
            if (filerobot_get_post_info.thumbnail !== '') {
                if (jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('components-responsive-wrapper__content')) {
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').attr('src', filerobot_get_post_info.thumbnail);
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').removeClass('components-responsive-wrapper__content');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').addClass('render-done');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview .components-responsive-wrapper span').remove();
                }
            }
        });

        // Ensure that the Modal is ready.
        wp.media.view.Modal.prototype.on( "ready", function() {
            let open_time = 0;
            if (jQuery('body').find('.media-modal:visible .media-modal-content .media-frame .media-frame-title h1').text() === 'Filerobot Image Editor') {
                return;
            }

            fmawOnlyWithOutClick();
            restoreDefaultButtons('.button.media-button-insert');
            restoreDefaultButtons('.button.media-button-select');

            // hide popover-slot if action is replace media when modal open
            jQuery('#editor .popover-slot .block-editor-media-replace-flow__options .components-popover__content').css('opacity', 0);

            // Execute this code when a Modal is opened.
            wp.media.view.Modal.prototype.on( "open", function() {
                // console.log( "media modal open" );
                window.setTimeout(async function() {
                    await sleep(500);
                    if ($('.media-modal:visible .media-frame-content #filerobot-widget').length === 0) {
                        if (open_time > 0) {
                            if (!$('.media-modal:visible .media-router button.media-menu-item').hasClass('clicked')) {
                                $('.media-modal:visible .media-router button.media-menu-item').trigger('click');
                                $('.media-modal:visible .media-router button.media-menu-item').addClass('clicked');
                            }
                        }
                    }
                }, 500);

                if (open_time === 0) {
                    if (parseInt(filerobot_admin_meta.use_fmaw_only)) {
                        $('.media-modal:visible .media-router button.media-menu-item').trigger('click');
                    } else {
                        if ($('.media-modal:visible .media-frame-content').html() === '' && !$('.media-modal:visible .media-frame-content').hasClass('wait-for-render')) {
                            if (jQuery('body').find('.media-router:visible button.media-menu-item.active').text() === filerobot_admin_meta.name) {
                                $('.media-modal:visible .media-frame-content').addClass('wait-for-render');
                                loadFmawContent('body');
                            }
                        }
                    }

                    let mediaFrameTitle = jQuery('#media-frame-title h1');
                    jQuery('.acf-expand-details').remove();
                    jQuery('.media-frame-menu-heading').hide();
                    if (jQuery('.avia-modal.modal-instance-1 .avia-modal-inner-header h3.avia-modal-title').length === 0
                        && (mediaFrameTitle.text() !== 'Edit gallery' || mediaFrameTitle.text() !== 'Add to gallery')
                    ) {
                        jQuery('.media-frame-router, .media-frame-title, .media-frame-content, .media-frame-toolbar').css({'left': 0});
                        jQuery('.media-frame-menu').remove();
                    }

                    if (filerobot_admin_meta.fmaw_only == 1) {
                        jQuery('#menu-item-upload').remove();
                        jQuery('#menu-item-browse').remove();
                    }


                    // Mark the Media Manager with the source identifier. (ie: the Media Manager modal was opened by clicking which button)
                    if (mediaManagerTriggerType !== '')
                    {
                        var mediaManager = jQuery('.media-modal:visible');
                        mediaManager.attr('data-triggertype', mediaManagerTriggerType);

                        if (mediaManagerTriggerType.includes('acf_'))
                        {
                            let acfType = mediaManagerTriggerType.replace('acf_', '');
                            let inputIdentifier;
                            if (mediaManagerTriggerType === 'acf_wysiwyg') {
                                inputIdentifier = jQuery(mediaManagerTriggerSource).closest(`.acf-field-${acfType}`).find('textarea').attr('name');
                            } else {
                                inputIdentifier = jQuery(mediaManagerTriggerSource).closest(`.acf-field-${acfType}`).find('input[type="hidden"]').attr('name');
                            }
                            mediaManager.attr('data-input-name', inputIdentifier);
                        }
                    }
                }
                open_time++;
            });

            // Execute this code when a Modal is closed.
            wp.media.view.Modal.prototype.on( "close", function() {
                if ($('.media-modal .media-router button.media-menu-item').hasClass('clicked')) {
                    $('.media-modal .media-router button.media-menu-item').removeClass('clicked');
                }
                if (jQuery('button[color="primary"].SfxButton-root .SfxButton-Label').length) {
                    let exportButtonText = filerobot_admin_meta.insert_btn;
                    jQuery('button[color="primary"].SfxButton-root .SfxButton-Label').text(exportButtonText);
                }
                mediaManagerTriggerType = '';
                mediaManagerTriggerSource = null;
                jQuery('.media-modal').removeAttr('data-triggertype');
                jQuery('.media-modal').removeAttr('data-input-name');
            });
        });

        // If FMAW tab is clicked
        jQuery(wp.media).on('click', '.media-router button.media-menu-item', function(e) {
            if (e.target.innerText === filerobot_admin_meta.name) {
                loadFmawContent( (jQuery(e.target).parents('.image-details').length > 0) ? '.image-details' : 'body' );
            } else {
                restoreDefaultButtons( (jQuery(e.target).parents('.image-details').length > 0) ? '.button.media-button-replace' : '.button.media-button-insert' );
                restoreDefaultButtons( (jQuery(e.target).parents('.image-details').length > 0) ? '.button.media-button-replace' : '.button.media-button-select' );
            }
        });

        //Replace attachment
        jQuery(wp.media).on('click', '.replace-attachment', function(e) {
            loadFmawContent('body');
        });
    }

    let currentWidthImage = '';
    let currentHeightImage = '';
    let updateTimeout = null;
    if (isGutenberg) {
        wp.data.subscribe(() => {
            const selectedBlockClientId = wp.data.select('core/block-editor').getSelectedBlockClientId();
            if (selectedBlockClientId !== null) {
                const currentBlock = wp.data.select('core/block-editor').getSelectedBlock();
                if (currentBlock !== null) {
                    if (currentBlock.name === 'core/image') {
                        /* start - listen event resize image */
                        let widthResize = currentBlock.attributes.width;
                        let heightResize = currentBlock.attributes.height;

                        if (currentWidthImage === '') {
                            currentWidthImage = widthResize;
                        }
                        if (currentHeightImage === '') {
                            currentHeightImage = heightResize;
                        }

                        let currentURLString = currentBlock.attributes.url;
                        if (currentURLString) {
                            let currentURL = new URL(currentURLString);
                            if (widthResize !== undefined && heightResize !== undefined) {
                                if (currentHeightImage !== heightResize || currentWidthImage !== widthResize) {
                                    currentURL.searchParams.set('width', widthResize);
                                    currentURL.searchParams.set('height', heightResize);
                                    jQuery('figure[data-block="' + selectedBlockClientId + '"] img').attr('src', currentURL.href);
                                    updateTimeout = setTimeout(function () {
                                        currentWidthImage = widthResize;
                                        currentHeightImage = heightResize;
                                        wp.data.dispatch('core/block-editor').updateBlockAttributes(selectedBlockClientId, {url: currentURL.href, href: currentURL.href});
                                        clearTimeout(updateTimeout);
                                    }, 500);
                                } else {
                                    clearTimeout(updateTimeout);
                                }
                            }
                        }
                        /* end - listen event resize image */
                    } else if (currentBlock.name === 'core/post-featured-image') {
                        if (filerobot_get_post_info.thumbnail !== '') {
                            jQuery('figure[data-block="' + selectedBlockClientId + '"] img').attr('src', filerobot_get_post_info.thumbnail);
                        }
                    }
                }
            }
        });
    } else if (isElementor) {
        // replace feature image
        var iframe = document.getElementById("elementor-preview-iframe");
        let countChecked = 0; // Prevent loop infinity
        let checkDOMRenderedTimeout;
        function checkDOMRendered() {
            countChecked++;
            var element = iframe.contentWindow.document.getElementsByClassName("wp-block-post-featured-image")[0];
            if (element) {
                let imgTag = element.getElementsByTagName("img")[0];
                imgTag.setAttribute('src', filerobot_get_post_info.thumbnail);
                clearTimeout(checkDOMRenderedTimeout);
            } else {
                if (countChecked < 5000) { // Prevent loop infinity
                    checkDOMRenderedTimeout = setTimeout(checkDOMRendered, 100);
                }
            }
        }
        checkDOMRendered();
    }
});

async function addTypeToMediaModal(e, type) {
    mediaManagerTriggerSource = e;
    mediaManagerTriggerType = type;
}

function checkFeatureImageBlockRender() {
    let thumbnail = (typeof filerobot_get_post_info !== 'undefined') ? filerobot_get_post_info.thumbnail : '';
    // Detect if is Gutenberg.
    if (filerobot_admin_meta.is_gutenberg_page === '1' && !jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('render-done')) {
        // add setTimeout to wait js render block Feature Image
        if (thumbnail !== '') {
            let featureImageTimeout = setTimeout(function(){
                if (jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').length > 0
                    && jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('components-responsive-wrapper__content')
                ) {
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').attr('src', thumbnail);
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').addClass('render-done');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').removeClass('components-responsive-wrapper__content');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview .components-responsive-wrapper span').remove();

                    // replace feature image if have core/post-featured-image
                    jQuery('figure[data-type="core/post-featured-image"] img').attr('src', thumbnail);
                    clearTimeout(featureImageTimeout);
                } else if(!jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('render-done')) {
                    checkFeatureImageBlockRender();
                }
            }, 1000);
        }
    }
}

function sleep(ms)
{
    return new Promise(resolve => setTimeout(resolve, ms));
}

function loadFmawContent(specific_parent)
{
    jQuery('.button.media-button-insert').hide();
    jQuery('.button.media-button-replace').hide();
    jQuery('.button.media-button-select').hide();

    jQuery('.media-modal-content .media-frame-content').empty();

    jQuery.each(jQuery(specific_parent + ' .media-modal-content .media-frame-content'), function(i, media_frame) {
        if (jQuery(media_frame).is(":visible"))
        {
            let data = {
                token     : filerobot_admin_meta.token,
                sec_tmp     : filerobot_admin_meta.sec_tmp,
                directory     : filerobot_admin_meta.directory,
                action      : 'filerobot_load_fmaw_page'
            };
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                dataType: 'html'
            }).done(function (res) {
                jQuery(media_frame).html('<div class="attachments-browser has-load-more">' + res + '</div>');

                jQuery('.media-modal:visible .media-frame-content').removeClass('wait-for-render');
                setTimeout(function () {
                    jQuery('#editor .popover-slot .block-editor-media-replace-flow__options .components-popover__content').empty();
                }, 8000);

            }).fail(function (jqXHR, textStatus) {
                console.log("Error: " + jqXHR + ": " + textStatus);
            });
        }
    });
}
function restoreDefaultButtons(button)
{
    jQuery(button).show();
}

function fmawOnlyWithOutClick() {
    if (filerobot_admin_meta.fmaw_only == 1) {
        jQuery(".media-modal-content").ready(function() {

            let mediaFrameTitle = jQuery('#media-frame-title h1');
            if (jQuery('.avia-modal.modal-instance-1 .avia-modal-inner-header h3.avia-modal-title').length === 0
                && (mediaFrameTitle.text() !== 'Edit gallery' || mediaFrameTitle.text() !== 'Add to gallery')
            ) {
                jQuery('.media-frame-router, .media-frame-title, .media-frame-content, .media-frame-toolbar').css({'left': 0});
                jQuery('.media-frame-menu').remove();
            }

            jQuery('#menu-item-upload').remove();
            jQuery('#menu-item-browse').remove();
            jQuery('.media-frame-menu-heading').hide();
        });
    }
}
