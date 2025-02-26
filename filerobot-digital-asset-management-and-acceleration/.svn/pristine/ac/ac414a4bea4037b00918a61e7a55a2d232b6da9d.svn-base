<?php
require dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'wp-config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://scaleflex.cloudimg.io/v7/plugins/filerobot-widget/v3/latest/filerobot-widget.min.css?vh=2995b1&func=proxy" />
</head>
<body>
<style>
    .filerobot-u-reset {
        top: 0 !important;
    }

    #SfxPopper {
        z-index: 99999999;
        position: relative;
    }

    .SfxModal-Wrapper {
        z-index: 9999999 !important;
    }

    .filerobot-transition-slideDownUp-enter .SfxButton-root {
        max-width: inherit !important;
    }

    .SfxModal-root .SfxModalActions-root {
        width: inherit;
    }

    #foldersScrollableElement > div {
        height: auto;
    }
</style>
<div id="filerobot-widget"></div>

<!-- Already included in wp_register_script, so no need to include the script here again -->
<!-- <script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-widget/v3/latest/filerobot-widget.min.js?vh=4be6b8&func=proxy"></script> -->

<!-- https://www.npmjs.com/package/@filerobot/explorer#filerobotexplorer -->
<!-- https://www.npmjs.com/package/@filerobot/core#events -->
<script>
    jQuery(document).ready(function ($){
        (async() => {
            var mediaFrameTitle = $('.media-modal-content:visible #media-frame-title h1').text(); //@Todo: Need to rid later. This isnt a good way of doing things
            var mediaFrameType = '';
            var exportButtonText = filerobot_admin_meta.insert_btn;
            var isGutenberg = document.body.classList.contains('block-editor-page');
            var isElementor = ($('#elementor-preview-iframe').length) ? true : false;
            let isClassicEditor = ($('#wp-content-wrap').length > 0 && $('#wp-content-wrap').hasClass('tmce-active')) ? true : false; //@Todo: Not a great way to detect classic. This will also be true for Woo product. Improve if needed

            let isACF = false;
            if ($('.acf-postbox').length) {
                isACF = true;
            }

            let triggerType = $('.media-modal:visible').attr('data-triggertype');
            if (isGutenberg) {
                if (mediaFrameTitle === 'Featured image') { //@Todo: Do in a better way, dont rely on title
                    mediaFrameType = 'featured_image';
                } else if (isACF && triggerType !== undefined) {
                    mediaFrameType = triggerType;
                } else {
                    const currentlySelectedBlockId = wp.data.select('core/block-editor').getBlockSelectionStart();
                    if (currentlySelectedBlockId !== undefined) {
                        const currentBlock = wp.data.select('core/block-editor').getBlocksByClientId(currentlySelectedBlockId)[0];
                        mediaFrameType = currentBlock.name;
                    }
                }
            } else if (isElementor) {
                if (isACF && triggerType !== undefined) {
                    mediaFrameType = $('.media-modal:visible').attr('data-triggertype');
                }
            } else if (isClassicEditor) {
                if (mediaFrameTitle === 'Product image') { // WooCommerce //@Todo: Do in a better way, dont rely on title
                    mediaFrameType = 'product_image';
                } else if (mediaFrameTitle === 'Featured image') { //@Todo: Do in a better way, dont rely on title
                    mediaFrameType = 'featured_image';
                } else if (triggerType === 'woocommerce_gallery_image') { // WooCommerce
                    mediaFrameType = 'product_gallery';
                    exportButtonText = filerobot_admin_meta.insert_product_gallery_btn;
                } else if (isACF && triggerType !== undefined) {
                    mediaFrameType = triggerType;
                } else {
                    mediaFrameType = 'generic';
                }
            } else if (triggerType === 'theme_background_image') {
                mediaFrameType = 'theme_background_image';
            } else {
                if (triggerType !== undefined) {
                    mediaFrameType = triggerType;
                } else {
                    mediaFrameType = 'generic';
                }
            }

            //Yoast SEO & Yoast SEO Setting
            if (jQuery(frLastClickedElement).is("#social-select-button-metabox")
                || jQuery(frLastClickedElement).is("#social-replace-button-metabox")
                || jQuery(frLastClickedElement).is("#social-select-button-modal")
                || jQuery(frLastClickedElement).is("#social-replace-button-modal")
                || jQuery(frLastClickedElement).parent().parent().is("#facebookPreview")
                || (
                    jQuery(frLastClickedElement).parent().parent().parent().is("#facebookPreview")
                    && (jQuery('#social-select-button-modal').length || jQuery('#social-replace-button-modal').length)
                )
                || (
                    jQuery(frLastClickedElement).parent().parent().parent().is("#facebookPreview")
                    && (jQuery('#social-select-button-metabox').length || jQuery('#social-replace-button-metabox').length)
                )
                || (
                    jQuery(frLastClickedElement).parent().parent().is(".yoast-image-select")
                    && (jQuery(frLastClickedElement).parent().parent().find('#social-select-button-metabox').length
                        || jQuery(frLastClickedElement).parent().parent().find('#social-replace-button-metabox').length)
                    )
                || (
                    jQuery(frLastClickedElement).parent().parent().parent().is(".yoast-image-select")
                    && (jQuery(frLastClickedElement).parent().parent().find('#social-select-button-modal').length
                        || jQuery(frLastClickedElement).parent().parent().find('#social-replace-button-modal').length)
                    )
            ) {
                mediaFrameType = 'yoast_facebook_og_image';
            } else if (jQuery(frLastClickedElement).is("#x-select-button-metabox")
                || jQuery(frLastClickedElement).is("#x-replace-button-metabox")
                || jQuery(frLastClickedElement).is("#x-select-button-modal")
                || jQuery(frLastClickedElement).is("#x-replace-button-modal")
                || jQuery(frLastClickedElement).parent().parent().parent().is("#twitterPreview")
                || (jQuery(frLastClickedElement).parent().parent().parent().is("#twitterPreview")
                    && (jQuery('#x-select-button-modal').length || jQuery('#x-replace-button-modal').length))
                || (
                    jQuery(frLastClickedElement).parent().parent().is(".yoast-image-select")
                    && (jQuery(frLastClickedElement).parent().parent().find('#x-select-button-metabox').length
                        || jQuery(frLastClickedElement).parent().parent().find('#x-replace-button-metabox').length)
                )
                || (
                    jQuery(frLastClickedElement).parent().parent().parent().is(".yoast-image-select")
                    && (jQuery(frLastClickedElement).parent().parent().find('#x-select-button-modal').length
                        || jQuery(frLastClickedElement).parent().parent().find('#x-replace-button-modal').length)
                )
            ) {
                mediaFrameType = 'yoast_twitter_og_image';
            } else if (jQuery(frLastClickedElement).is("#button-wpseo_titles-company_logo-replace")
                || jQuery(frLastClickedElement).is("#button-wpseo_titles-company_logo-select")
                || jQuery(frLastClickedElement).parent().parent().is("#wpseo_titles-company_logo")
                || jQuery(frLastClickedElement).parent().parent().parent().is("#wpseo_titles-company_logo")
            ) {
                mediaFrameType = 'yoast_organization_image_setting';
            } else if (jQuery(frLastClickedElement).is("#button-wpseo_social-og_default_image-select")
                || jQuery(frLastClickedElement).is("#button-wpseo_social-og_default_image-replace")
                || jQuery(frLastClickedElement).parent().parent().is("#wpseo_social-og_default_image")
                || jQuery(frLastClickedElement).parent().parent().parent().is("#wpseo_social-og_default_image")
            ) {
                mediaFrameType = 'yoast_social_post_image_setting';
            } else if (jQuery(frLastClickedElement).is("#button-wpseo_titles-person_logo-select")
                || jQuery(frLastClickedElement).is("#button-wpseo_titles-person_logo-replace")
                || jQuery(frLastClickedElement).parent().parent().is("#wpseo_titles-person_logo")
                || jQuery(frLastClickedElement).parent().parent().parent().is("#wpseo_titles-person_logo")
            ) {
                mediaFrameType = 'yoast_personal_image_setting';
            }

            let enfoldThemeType = '';
            let enfoldBlockTypeName = '';
            if (jQuery(frLastClickedElement).is('#avia_uploadlogo')) {
                enfoldThemeType = 'upload_logo';
            } else if (jQuery(frLastClickedElement).is('#avia_uploadfavicon')) {
                enfoldThemeType = 'upload_favicon';
            } else if (jQuery('.avia-modal.modal-instance-1 .avia-modal-inner-header h3.avia-modal-title').length) {
                if (jQuery(frLastClickedElement).is('.avia-builder-image-insert.avia-builder-audio-edit')) {
                    enfoldThemeType = 'audio_player_block';
                } else if (jQuery(frLastClickedElement).parent().is('.avia-builder-prev-img') || jQuery(frLastClickedElement).is('.avia-builder-image-insert')) {
                    enfoldBlockTypeName = jQuery('.avia-modal.modal-instance-1 .avia-modal-inner-header h3.avia-modal-title').text();
                    if (enfoldBlockTypeName === 'Easy Slider'
                        || enfoldBlockTypeName === 'Fullwidth Easy Slider'
                        || enfoldBlockTypeName === 'Fullscreen Slider'
                        || enfoldBlockTypeName === 'Accordion Slider'
                        || enfoldBlockTypeName === 'Partner/Logo Element'
                    ) {
                        enfoldThemeType = 'sliders_block';
                    } else {
                        enfoldThemeType = 'media_block';
                    }
                } else if (jQuery(frLastClickedElement).is('#menu-item-gallery-library') || jQuery(frLastClickedElement).is('#menu-item-fmaw_tab')) {
                    enfoldBlockTypeName = jQuery('.avia-modal.modal-instance-1 .avia-modal-inner-header h3.avia-modal-title').text();
                    enfoldThemeType = 'media_block';
                }
            }

            if (jQuery('body').hasClass('seo_page_wpseo_page_settings')) {
                let modalMediaTitle = jQuery('.media-modal:visible .media-frame-title').text();
                if (modalMediaTitle === 'Organization logo') {
                    mediaFrameType = 'yoast_organization_image_setting';
                } else if (modalMediaTitle === 'Site image') {
                    mediaFrameType = 'yoast_social_post_image_setting';
                } else if (modalMediaTitle === 'Personal logo or avatar') {
                    mediaFrameType = 'yoast_personal_image_setting';
                }
            }
            // console.log(mediaFrameType);

            if (Filerobot === undefined) {
                let Filerobot = window.Filerobot;
            }

            let demoContainer = "<?php echo isset($_POST['token']) ? $_POST['token'] : $token; ?>";
            let demoSecurityTemplateID = "<?php echo isset($_POST['sec_tmp']) ? $_POST['sec_tmp'] : $sec_tmp; ?>";

            let filerobot = null;

            filerobot = Filerobot.Core({
                securityTemplateID : demoSecurityTemplateID,
                container          : demoContainer,
            });

            // Plugins
            let Explorer  = Filerobot.Explorer;
            let XHRUpload = Filerobot.XHRUpload;

            // Optional plugins:
            let ImageEditor = Filerobot.ImageEditor;
            let Webcam      = Filerobot.Webcam;

            let queryString = window.location.search;
            let parameters  = new URLSearchParams(queryString);
            let post_id     = parameters.get('post');

            let page_name = parameters.get('page');

            let settings = wp.media.view.settings;
            let nonce = jQuery('#_wpnonce').val();

            // If WP URL isn't in query param format, or if it's a auto-draft new post.
            if (!post_id && settings.post) {
                post_id = settings.post.id;
            }

            let disableExport = false;
            if (page_name && page_name === 'scaleflex-dam-widget') {
                disableExport = true;
            }

            filerobot
                .use(Explorer, {
                    config: {
                        rootFolderPath: "<?php echo isset($_POST['directory']) ? $_POST['directory'] : $directory; ?>"
                    },
                    target: '#filerobot-widget',
                    inline: true,
                    width: "100%",
                    height: 1000,
                    disableExportButton: disableExport,
                    hideExportButtonIcon: true,
                    preventExportDefaultBehavior: true,
                    dismissUrlPathQueryUpdate: true,
                    disableDownloadButton: false,
                    hideDownloadButtonIcon: true,
                    preventDownloadDefaultBehavior: true,
                    locale: {
                        strings: {
                            mutualizedExportButtonLabel: exportButtonText,
                            mutualizedDownloadButton: exportButtonText
                        }
                    },
                })
                .use(XHRUpload)
                .on('export', (files, popupExportSucessMsgFn, downloadFilesPackagedFn, downloadFileFn) => {
                    if (page_name && page_name === 'filerobot-fmaw') {
                        return;
                    }
                    // console.dir(files);
                    jQuery('button[color="primary"].SfxButton-root .SfxButton-Label').text('Processing...');

                    let to_insert = [];

                    files.forEach((selected, key) => {
                        to_insert.push(selected);
                    });

                    if (to_insert.length === 0) {
                        return;
                    }

                    //Process for theme Enfold if the user using it
                    if (enfoldThemeType === 'upload_logo') {
                        insert_enfold_logo(to_insert, post_id);
                    } else if (enfoldThemeType === 'upload_favicon') {
                        insert_enfold_favicon(to_insert, post_id);
                    } else if (enfoldThemeType === 'audio_player_block') {
                        insert_enfold_audio_player_block(to_insert, post_id);
                    } else if (enfoldThemeType === 'sliders_block') {
                        insert_enfold_sliders_block(to_insert, post_id, enfoldBlockTypeName);
                    } else if (enfoldThemeType === 'media_block') {
                        insert_enfold_block(to_insert, post_id, enfoldBlockTypeName);
                    } else if (mediaFrameType === 'acf_image') {
                        insert_acf_image(to_insert, post_id);
                    } else if(mediaFrameType === 'yoast_facebook_og_image') {
                        insert_yoast_seo_image(to_insert, post_id, 'facebook');
                    } else if(mediaFrameType === 'yoast_twitter_og_image') {
                        insert_yoast_seo_image(to_insert, post_id, 'twitter');
                    } else if(mediaFrameType === 'yoast_organization_image_setting') {
                        insert_yoast_seo_image(to_insert, post_id, 'organization_image');
                    } else if(mediaFrameType === 'yoast_social_post_image_setting') {
                        insert_yoast_seo_image(to_insert, post_id, 'social_post_image');
                    } else if(mediaFrameType === 'yoast_personal_image_setting') {
                        insert_yoast_seo_image(to_insert, post_id, 'personal_image');
                    } else if (mediaFrameType === 'acf_file') {
                        insert_acf_file(to_insert, post_id);
                    } else if(mediaFrameType === 'acf_wysiwyg') {
                        insert_acf_media(to_insert, post_id);
                    } else if (mediaFrameType === 'featured_image' || mediaFrameType === 'product_image') {
                        setFeaturedImage(to_insert, post_id, nonce, isGutenberg);
                    } else if (isGutenberg || mediaFrameType === 'generic') {
                        fmaw_insert_to_content(to_insert, post_id, mediaFrameType, isGutenberg);
                    } else if (mediaFrameType === 'product_gallery') {
                        addToProductImageGallery(to_insert, post_id);
                    } else if (isElementor) {
                        fmaw_insert_images_to_elementor(to_insert, post_id);
                    } else if (mediaFrameType === 'theme_background_image') {
                        fmaw_set_theme_background(to_insert, post_id);
                    }
                })
                .on('complete', ({failed, uploadID, successful}) => {
                    if (failed) {
                        // console.dir(failed);
                    }

                    if (successful) {
                        let to_insert = [];

                        console.log(successful);

                        successful.forEach((item, key) => {
                            to_insert.push(item);
                        });

                        if (to_insert.length === 0) {
                            return;
                        }

                        if (disableExport) {
                            fmaw_insert_attachment_to_db(to_insert);
                        }

                        if (isGutenberg || mediaFrameType === 'generic') {
                            fmaw_insert_to_content(to_insert, post_id, mediaFrameType, isGutenberg);
                        }

                        if (mediaFrameType === 'featured_image' || mediaFrameType === 'product_image') {
                            setFeaturedImage(to_insert, post_id, nonce, isGutenberg);
                        }

                        if (mediaFrameType === 'product_gallery') {
                            addToProductImageGallery(to_insert, post_id);
                        }

                        if (isElementor) {
                            fmaw_insert_images_to_elementor(to_insert, post_id);
                        }

                        if (mediaFrameType === 'acf_image') {
                            insert_acf_image(to_insert, post_id);
                        }

                        if (mediaFrameType === 'acf_file') {
                            insert_acf_file(to_insert, post_id);
                        }

                        if (mediaFrameType === 'theme_background_image') {
                            fmaw_set_theme_background(to_insert, post_id);
                        }
                    }
                });
        })();
    });

    function setFeaturedImage(to_insert, post_id, nonce, isGutenberg)
    {
        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 0
        };

        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        } else {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);

            if (res.success) {
                if (isGutenberg) {
                    // Note: Below is the official method, but I can't make it work properly
                    wp.data.dispatch('core/editor').editPost(
                        {
                            featured_media: res.attachment_id
                        }
                    );

                    if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                        jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                        jQuery('.media-modal-close').click();
                    } else {
                        jQuery('button.SfxButton-root').prop('disabled', false);
                        jQuery('.filerobot-common-BackCloseButton-button').click();
                        jQuery('.media-modal-close').click();
                    }

                    filerobot_get_post_info.thumbnail = res.url;
                    checkBlockRenderWhenChangeFeatureImage(res.url);
                } else {
                    // Imitated from `wp-includes/js/media-editor.js` `wp.media.featuredImage.set`
                    // - `wp-admin/includes/ajax-actions.php` `function wp_ajax_get_post_thumbnail_html()`
                    // -- `wp-admin/includes/post.php function` `_wp_post_thumbnail_html($thumbnail_id = null, $post = null)`
                    wp.media.post( 'get-post-thumbnail-html', {
                        post_id:      post_id,
                        thumbnail_id: res.attachment_id,
                        _wpnonce:     nonce
                    }).done( function( html ) {
                        if ('0' === html) {
                            window.alert( wp.i18n.__( 'Could not set that as the thumbnail image. Try a different attachment.' ) );
                            return;
                        }

                        jQuery('.inside', '#postimagediv').html(html);

                        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                            jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                            jQuery('.media-modal-close').click();
                        } else {
                            jQuery('button.SfxButton-root').prop('disabled', false);
                            jQuery('.filerobot-common-BackCloseButton-button').click();
                            jQuery('.media-modal-close').click();
                        }
                    });
                }
            }
        });
    }

    function checkBlockRenderWhenChangeFeatureImage(imgURL) {
        if (imgURL !== null && !jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('render-done')) {
            let featureImageTimeout = setTimeout(function(){
                if (jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').length > 0
                    && jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('components-responsive-wrapper__content')
                ) {
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').attr('src', imgURL);
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').addClass('render-done');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').removeClass('components-responsive-wrapper__content');
                    jQuery('.editor-post-featured-image button.editor-post-featured-image__preview .components-responsive-wrapper span').remove();
                    clearTimeout(featureImageTimeout);
                } else if(!jQuery('.editor-post-featured-image button.editor-post-featured-image__preview img').hasClass('render-done')) {
                    checkBlockRenderWhenChangeFeatureImage(imgURL);
                }
            }, 1500);
        }
    }

    function addToProductImageGallery(to_insert, post_id) {
        // Imitated from `wp-content/plugins/woocommerce/assets/js/admin/meta-boxes-product.js` "// When an image is selected, run a callback." `product_gallery_frame.on( 'select', function() {`
        // - wp-content/plugins/woocommerce/includes/admin/meta-boxes/class-wc-meta-box-product-images.php `<p class="add_product_images hide-if-no-js">` "Add images to product gallery"
        let image_gallery_ids  = jQuery('#product_image_gallery');
        let attachment_ids     = image_gallery_ids.val();
        let product_images     = jQuery('#product_images_container').find('ul.product_images');
        let add_product_images = jQuery('.add_product_images');

        to_insert.forEach(function(item, key) {
            let data = {
                post_id     : post_id,
                fr_data     : item,
                action      : 'filerobot_fmaw_insert_to_content',
                return_html : 0
            };

            if (key === 0) {
                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
                } else {
                    jQuery('button.SfxButton-root').prop('disabled', true);
                }
            }

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                dataType: 'html'
            }).done(function (res) {
                res = JSON.parse(res);

                if (res.success) {
                    attachment_ids = attachment_ids ? attachment_ids + ',' + res.attachment_id : res.attachment_id;

                    product_images.append(
                        `<li class="image" data-attachment_id="${res.attachment_id}">
                          <img src="${res.url}" />
                          <ul class="actions">
                            <li>
                              <a href="#" class="delete" title="${add_product_images.data('delete')}">${add_product_images.data('text')}</a>
                            </li>
                          </ul>
                        </li>`
                    );

                    image_gallery_ids.val(attachment_ids);

                    if (key === to_insert.length-1) {
                        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                            jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                            jQuery('.media-modal-close').click();
                        } else {
                            jQuery('button.SfxButton-root').prop('disabled', false);
                            jQuery('.filerobot-common-BackCloseButton-button').click();
                            jQuery('.media-modal-close').click();
                        }
                    }
                }
            });
        });
    }

    function insert_acf_media(to_insert, post_id) {
        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        } else {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 1
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);
            if (res.success) {
                let inputName = jQuery('.media-modal:visible').attr('data-input-name');
                let tinyID = jQuery(`textarea[name="${inputName}"]`).attr("id");
                let tinyInstance = tinyMCE.editors[tinyID];
                tinyInstance.execCommand('mceInsertContent', false, res.data);

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                    jQuery('.media-modal-close').click();
                } else {
                    jQuery('button.SfxButton-root').prop('disabled', false);
                    jQuery('.filerobot-common-BackCloseButton-button').click();
                    jQuery('.media-modal-close').click();
                }
            }
        });
    }

    function insert_acf_image(to_insert, post_id)
    {
        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
        {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        }
        else
        {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 0
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);
            // console.log(res);
            if (res.success)
            {
                let inputName = jQuery('.acf-media-modal').attr('data-input-name');

                // Imitated from wp-content\plugins\advanced-custom-fields\assets\build\js\acf-input.js
                // "./src/advanced-custom-fields-pro/assets/src/js/_acf-field-image.js":
                // render: function (attachment)

                // https://www.advancedcustomfields.com/resources/javascript-api/#functions-getfield
                jQuery(`.acf-input input[name="${inputName}"]`).val(res.attachment_id);
                jQuery(`.acf-input input[name="${inputName}"]`).parent().find('.show-if-value img').attr({
                    src: res.url,
                    alt: ''
                });
                jQuery(`.acf-input input[name="${inputName}"]`).parent().addClass('has-value');

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
                {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                    jQuery('.media-modal-close').click();
                }
                else
                {
                    jQuery('button.SfxButton-root').prop('disabled', false);
                    jQuery('.filerobot-common-BackCloseButton-button').click();
                    jQuery('.media-modal-close').click();
                }
            }
        });
    }

    function insert_acf_file(to_insert, post_id)
    {
        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
        {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        }
        else
        {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 0
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);

            if (res.success)
            {
                let inputName = jQuery('.acf-media-modal').attr('data-input-name');

                // Imitated from wp-content\plugins\advanced-custom-fields\assets\build\js\acf-input.js
                // "./src/advanced-custom-fields-pro/assets/src/js/_acf-field-file.js":
                // render: function (attachment)

                // https://www.advancedcustomfields.com/resources/javascript-api/#functions-getfield
                jQuery(`.acf-input input[name="${inputName}"]`).val(res.attachment_id);
                jQuery(`.acf-input input[name="${inputName}"]`).parent().find('.show-if-value img').attr({
                    src: "<?php echo includes_url('/images/media/default.png'); ?>"
                });

                jQuery(`.acf-input input[name="${inputName}"]`).parent().find('.show-if-value [data-name="filename"]').text(res.name).attr('href', res.url);
                jQuery(`.acf-input input[name="${inputName}"]`).parent().addClass('has-value');

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
                {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                    jQuery('.media-modal-close').click();
                }
                else
                {
                    jQuery('button.SfxButton-root').prop('disabled', false);
                    jQuery('.filerobot-common-BackCloseButton-button').click();
                    jQuery('.media-modal-close').click();
                }
            }
        });
    }

    function fmaw_insert_images_to_elementor(to_insert, post_id) {
        const WidgetType = [
            'image.default',//DONE
            'image-carousel.default',//DONE
            'image-box.default', //DONE
            'slides.default', //PRO DONE
            'media-carousel.default', //PRO DONE
            'image-gallery.default',//DONE
            'theme-post-featured-image.default', //@Todo: Do after done issue with fmaw
            'gallery.default', //PRO DONE
            'reviews.default', //PRO DONE
            'hotspot.default', //PRO DONE
            'flip-box.default', //PRO DONE
            'video-playlist.default',
            'testimonial-carousel.default', //PRO DONE
            'testimonial.default', //DONE
            'video.default'
        ];
        let galleries = [];

        let iframe = document.getElementById("elementor-preview-iframe");
        let elementSelected = iframe.contentWindow.document.getElementsByClassName("elementor-element-editable")[0];

        if (elementSelected) {
            let element_type = jQuery(elementSelected).attr('data-widget_type');
            let elementId = jQuery(elementSelected).attr('data-id');
            let document = elementor.documents.getCurrent();
            let container = document.container;
            let elements = [];
            let ImageSize = '';
            let ImageURL = '';
            let itemThumbnails = '';
            let sizes = filerobot_admin_meta.sizes;
            let width, height;

            if (elementor.config.document.panel.has_elements) {
                let modelElements = container.model.get('elements');
                elements = modelElements.models;
            }

            to_insert.forEach(function(item, key) {
                let data = {
                    post_id     : post_id,
                    fr_data     : item,
                    action      : 'filerobot_fmaw_insert_to_content',
                    return_html : 0
                };

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
                } else {
                    jQuery('button.SfxButton-root').prop('disabled', true);
                }

                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: data,
                    dataType: 'html'
                }).done(function (res) {
                    res = JSON.parse(res);
                    if (res.success) {
                        function checkAndReplaceElement(element) {
                            if (element.attributes.elements.length && elementId !== element.attributes.id) {
                                let elementItem = element.attributes.elements.models;
                                elementItem.forEach(elementChild => {
                                    checkAndReplaceElement(elementChild);
                                });
                            } else if (elementId === element.attributes.id) {
                                let selected_id, settingSlides, elTarget;
                                switch (element.attributes.widgetType) {
                                    case 'image-carousel':
                                        element.attributes.settings.attributes.carousel = galleries;

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-thumbnail_size select[data-setting="thumbnail_size"]');
                                        rerenderElement(elementSelected, elTarget, true);
                                        break;
                                    case 'image-gallery':
                                        element.attributes.settings.attributes.wp_gallery = galleries;

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-thumbnail_size select[data-setting="thumbnail_size"]');
                                        rerenderElement(elementSelected, elTarget, true);
                                        break;
                                    case 'gallery':
                                        if (jQuery('.elementor-control-gallery_type select[data-setting="gallery_type"]').val() === 'single') {
                                            element.attributes.settings.attributes.gallery = galleries;
                                        } else {
                                            let selected_id = jQuery('.elementor-control-galleries .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                            let settingGalleries = element.attributes.settings.attributes.galleries.models;

                                            Object.keys(settingGalleries).forEach(key => {
                                                if (selected_id === settingGalleries[key]['attributes']['_id']) {
                                                    element['attributes']['settings']['attributes']['galleries']['models'][key]['attributes']['multiple_gallery'] = galleries;
                                                }
                                            });
                                        }
                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-thumbnail_image_size select[data-setting="thumbnail_image_size"]');
                                        rerenderElement(elementSelected, elTarget, true);
                                        break;
                                    case "media-carousel":
                                        selected_id = jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                        settingSlides = element.attributes.settings.attributes.slides.models;
                                        Object.keys(settingSlides).forEach(key => {
                                            if (selected_id === settingSlides[key]['attributes']['_id']) {
                                                element['attributes']['settings']['attributes']['slides']['models'][key]['attributes']['image'] = {
                                                    id: res.attachment_id,
                                                    url: res.url,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }
                                        });

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-skin select[data-setting="skin"]');
                                        rerenderElement(elementSelected, elTarget, true);
                                        break;
                                    case 'slides':
                                        selected_id = jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                        settingSlides = element.attributes.settings.attributes.slides.models;
                                        Object.keys(settingSlides).forEach(key => {
                                            if (selected_id === settingSlides[key]['attributes']['_id']) {
                                                element['attributes']['settings']['attributes']['slides']['models'][key]['attributes']['background_image'] = {
                                                    id: res.attachment_id,
                                                    url: res.url,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }
                                        });

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable .elementor-control-background_size select[data-setting="background_size"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'image-box':
                                        ImageURL = res.url;
                                        ImageSize = jQuery('.elementor-control-thumbnail_size select[data-setting="thumbnail_size"]').val();
                                        if (ImageSize !== 'full') {
                                            width = sizes[ImageSize]['width'];
                                            height = sizes[ImageSize]['height'];
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        }

                                        element.attributes.settings.attributes.image = {
                                            id: res.attachment_id,
                                            url: ImageURL,
                                            alt: "",
                                            source: "library"
                                        };
                                        break;
                                    case 'testimonial':
                                        ImageURL = res.url;
                                        ImageSize = jQuery('.elementor-control-testimonial_image_size select[data-setting="testimonial_image_size"]').val();
                                        if (ImageSize === 'custom') {
                                            width = jQuery('.elementor-control-testimonial_image_custom_dimension input[data-setting="width"]').val();
                                            height = jQuery('.elementor-control-testimonial_image_custom_dimension input[data-setting="height"]').val();
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        } else if (ImageSize !== 'full') {
                                            width = sizes[ImageSize]['width'];
                                            height = sizes[ImageSize]['height'];
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        }

                                        element.attributes.settings.attributes.testimonial_image = {
                                            id: res.attachment_id,
                                            url: ImageURL,
                                            alt: "",
                                            source: "library"
                                        };

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-testimonial_image_size select[data-setting="testimonial_image_size"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'testimonial-carousel':
                                        selected_id = jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                        settingSlides = element.attributes.settings.attributes.slides.models;
                                        Object.keys(settingSlides).forEach(key => {
                                            if (selected_id === settingSlides[key]['attributes']['_id']) {
                                                element['attributes']['settings']['attributes']['slides']['models'][key]['attributes']['image'] = {
                                                    id: res.attachment_id,
                                                    url: res.url,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }
                                        });

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-skin select[data-setting="skin"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'reviews':
                                        selected_id = jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                        settingSlides = element.attributes.settings.attributes.slides.models;
                                        Object.keys(settingSlides).forEach(key => {
                                            if (selected_id === settingSlides[key]['attributes']['_id']) {
                                                element['attributes']['settings']['attributes']['slides']['models'][key]['attributes']['image'] = {
                                                    id: res.attachment_id,
                                                    url: res.url,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }
                                        });

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-slides_per_view select[data-setting="slides_per_view"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'hotspot':
                                        ImageSize = jQuery('.elementor-control-image_size select[data-setting="image_size"]').val();
                                        ImageURL = res.url;
                                        if (ImageSize === 'custom') {
                                            width = jQuery('.elementor-control-image_custom_dimension input[data-setting="width"]').val();
                                            height = jQuery('.elementor-control-image_custom_dimension input[data-setting="height"]').val();
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        } else if (ImageSize !== 'full') {
                                            width = sizes[ImageSize]['width'];
                                            height = sizes[ImageSize]['height'];
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        }

                                        element.attributes.settings.attributes.image = {
                                            id: res.attachment_id,
                                            url: ImageURL,
                                            alt: "",
                                            source: "library"
                                        };

                                        elTarget = jQuery('.elementor-control-image_size select[data-setting="image_size"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'flip-box':
                                        let front = false;
                                        if (jQuery('.elementor-control-section_side_a_content.elementor-open').length) {
                                            front = true;
                                            if (jQuery('.elementor-control-side_a_content_tab.elementor-tab-active').length) {
                                                jQuery('.elementor-control-image .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                                                ImageSize = jQuery('.elementor-control-image_size select[data-setting="image_size"]').val();
                                                ImageURL = res.url;
                                                if (ImageSize === 'custom') {
                                                    width = jQuery('.elementor-control-image_custom_dimension input[data-setting="width"]').val();
                                                    height = jQuery('.elementor-control-image_custom_dimension input[data-setting="height"]').val();
                                                    ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                                } else if (ImageSize !== 'full') {
                                                    width = sizes[ImageSize]['width'];
                                                    height = sizes[ImageSize]['height'];
                                                    ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                                }

                                                element.attributes.settings.attributes.image = {
                                                    id: res.attachment_id,
                                                    url: ImageURL,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            } else {
                                                ImageURL = res.url;
                                                jQuery('.elementor-control-background_a_image .elementor-control-media__preview').attr('style', 'background-image: url("' + ImageURL + '");');
                                                element.attributes.settings.attributes.background_a_image = {
                                                    id: res.attachment_id,
                                                    url: ImageURL,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }

                                            elTarget = jQuery('.elementor-control-image_size select[data-setting="image_size"]');
                                            rerenderElement(elementSelected, elTarget, false);
                                        } else {
                                            ImageURL = res.url;
                                            jQuery('.elementor-control-background_b_image .elementor-control-media__preview').attr('style', 'background-image: url("' + ImageURL + '");');
                                            element.attributes.settings.attributes.background_b_image = {
                                                id: res.attachment_id,
                                                url: ImageURL,
                                                alt: "",
                                                source: "library"
                                            };

                                            elTarget = jQuery('.elementor-control-background_b_background input[value="classic"]');
                                            rerenderElement(elementSelected, elTarget, false);
                                        }
                                        break;
                                    case 'video-playlist':
                                        selected_id = jQuery('.elementor-control-tabs .elementor-repeater-row-controls.editable input[data-setting="_id"]').val();
                                        settingSlides = element.attributes.settings.attributes.tabs.models;
                                        Object.keys(settingSlides).forEach(key => {
                                            if (selected_id === settingSlides[key]['attributes']['_id']) {
                                                element['attributes']['settings']['attributes']['tabs']['models'][key]['attributes']['thumbnail'] = {
                                                    id: res.attachment_id,
                                                    url: res.url,
                                                    alt: "",
                                                    source: "library"
                                                };
                                            }
                                        });

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-tabs .elementor-repeater-row-controls.editable .elementor-control-type select[data-setting="type"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    case 'video':
                                        if (res.media_type.type === 'video') {
                                            element.attributes.settings.attributes.hosted_url = {
                                                id: res.attachment_id,
                                                url: res.url,
                                                alt: "",
                                                source: "library"
                                            };
                                        } else {
                                            element.attributes.settings.attributes.poster = {
                                                id: res.attachment_id,
                                                url: res.url,
                                                alt: "",
                                                source: "library"
                                            };
                                        }

                                        // Rerender widget
                                        elTarget = jQuery('.elementor-control-video_type select[data-setting="video_type"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                    default:
                                        ImageSize = jQuery('.elementor-control-image_size select[data-setting="image_size"]').val();
                                        ImageURL = res.url;
                                        if (ImageSize === 'custom') {
                                            width = jQuery('.elementor-control-image_custom_dimension input[data-setting="width"]').val();
                                            height = jQuery('.elementor-control-image_custom_dimension input[data-setting="height"]').val();
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        } else if (ImageSize !== 'full') {
                                            width = sizes[ImageSize]['width'];
                                            height = sizes[ImageSize]['height'];
                                            ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                                        }

                                        element.attributes.settings.attributes.image = {
                                            id: res.attachment_id,
                                            url: ImageURL,
                                            alt: "",
                                            source: "library"
                                        };

                                        elTarget = jQuery('.elementor-control-image_size select[data-setting="image_size"]');
                                        rerenderElement(elementSelected, elTarget, false);
                                        break;
                                }
                            }
                        }

                        let ImageSizeParam = '';
                        let func = 'fit';

                        <?php
                        /*
                        // Update attachment metadata
                        Object.keys(sizes).forEach(key => {
                            width = sizes[key]['width'];
                            height = sizes[key]['height'];
                            if (key !== 'full' && key !== 'custom') {
                                updateAttachmentMetadata(res.attachment_id, key, width, height, func);
                            }
                        });
                        */
                        ?>

                        if (element_type === 'image-carousel.default' || element_type === 'image-gallery.default') {
                            ImageURL = res.url;
                            itemThumbnails += '<div class="elementor-control-gallery-thumbnail" style="background-image: url(' + ImageURL + ');"></div>';
                            jQuery('.elementor-control-type-gallery .elementor-control-gallery-thumbnails').html(itemThumbnails);

                            ImageSize = jQuery('.elementor-control-thumbnail_size select[data-setting="thumbnail_size"]').val();
                            width = sizes[ImageSize]['width'];
                            height = sizes[ImageSize]['height'];
                            ImageSizeParam = '?w=' + width + '&h=' + height + '&func=fit';

                            if (ImageSize === 'full') {
                                ImageSizeParam = '';
                            } else if (ImageSize === 'custom') {
                                let widthCustom = jQuery('.elementor-control-thumbnail_custom_dimension input[data-setting="width"]').val();
                                let heightCustom = jQuery('.elementor-control-thumbnail_custom_dimension input[data-setting="height"]').val();
                                ImageSizeParam = '?width=' + widthCustom + '&height=' + heightCustom + '&func=fit';
                                width = widthCustom;
                                height = heightCustom;
                            }

                            ImageURL = ImageURL + ImageSizeParam;
                            galleries[key] = { id: res.attachment_id, url: ImageURL };

                            if (key === to_insert.length - 1) {
                                // add images to setting column
                                jQuery('.elementor-control-type-gallery').removeClass('elementor-gallery-empty');
                                jQuery('.elementor-control-type-gallery').addClass('elementor-gallery-has-images');

                                elements.forEach(element => {
                                    checkAndReplaceElement(element);
                                });
                            }
                        } else if (element_type === 'image.default' || element_type === 'hotspot.default') {
                            ImageSize = jQuery('.elementor-control-image_size select[data-setting="image_size"]').val();
                            if (ImageSize !== 'full') {
                                if (ImageSize === 'custom') {
                                    width = jQuery('.elementor-control-image_custom_dimension input[data-setting="width"]').val();
                                    height = jQuery('.elementor-control-image_custom_dimension input[data-setting="height"]').val();
                                } else {
                                    width = sizes[ImageSize]['width'];
                                    height = sizes[ImageSize]['height'];
                                }

                                ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                            }

                            jQuery('.elementor-control-media__preview').attr('style', 'background-image: url("' + ImageURL + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'image-box.default') {
                            ImageSize = jQuery('.elementor-control-thumbnail_size select[data-setting="thumbnail_size"]').val();
                            ImageURL = res.url;
                            if (ImageSize !== 'full') {
                                if (ImageSize === 'custom') {
                                    width = jQuery('.elementor-control-thumbnail_custom_dimension input[data-setting="width"]').val();
                                    height = jQuery('.elementor-control-thumbnail_custom_dimension input[data-setting="height"]').val();
                                } else {
                                    width = sizes[ImageSize]['width'];
                                    height = sizes[ImageSize]['height'];
                                }
                                ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                            }

                            let imgTag = elementSelected.getElementsByTagName("img")[0];
                            imgTag.setAttribute('src', ImageURL);
                            jQuery('.elementor-control-media__preview').attr('style', 'background-image: url("' + ImageURL + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'gallery.default') {
                            ImageURL = res.url;
                            let galleryType = jQuery('.elementor-control-gallery_type select[data-setting="gallery_type"]').val();
                            if (galleryType === 'single') {
                                itemThumbnails += '<div class="elementor-control-gallery-thumbnail" style="background-image: url(\'' + ImageURL + '\');"></div>';
                                jQuery('.elementor-control-gallery .elementor-control-gallery-thumbnails').html(itemThumbnails);
                            } else {
                                itemThumbnails += '<div class="elementor-control-gallery-thumbnail" style="background-image: url(' + ImageURL + ');"></div>';
                                jQuery('.elementor-control-galleries .elementor-repeater-row-controls.editable .elementor-control-gallery-thumbnails').html(itemThumbnails);
                            }

                            ImageSize = jQuery('.elementor-control-thumbnail_image_size select[data-setting="thumbnail_image_size"]').val();
                            width = sizes[ImageSize]['width'];
                            height = sizes[ImageSize]['height'];
                            ImageSizeParam = '?w=' + width + '&h=' + height + '&func=fit';

                            if (ImageSize === 'full') {
                                ImageSizeParam = '';
                            } else if (ImageSize === 'custom') {
                                let widthCustom = jQuery('.elementor-control-thumbnail_image_custom_dimension input[data-setting="width"]').val();
                                let heightCustom = jQuery('.elementor-control-thumbnail_image_custom_dimension input[data-setting="height"]').val();
                                ImageSizeParam = '?width=' + widthCustom + '&height=' + heightCustom + '&func=fit';
                                width = widthCustom;
                                height = heightCustom;
                            }

                            ImageURL = ImageURL + ImageSizeParam;
                            galleries[key] = { id: res.attachment_id, url: ImageURL };

                            if (key === to_insert.length - 1) {
                                // add images to setting column
                                if (galleryType === 'single') {
                                    jQuery('.elementor-control-gallery').removeClass('elementor-gallery-empty');
                                    jQuery('.elementor-control-gallery').addClass('elementor-gallery-has-images');
                                } else {
                                    jQuery('.elementor-control-galleries .elementor-control-multiple_gallery').removeClass('elementor-gallery-empty');
                                    jQuery('.elementor-control-galleries .elementor-control-multiple_gallery').addClass('elementor-gallery-has-images');
                                }

                                elements.forEach(element => {
                                    checkAndReplaceElement(element);
                                });
                            }
                        } else if (element_type === 'media-carousel.default') {
                            jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'slides.default') {
                            jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'testimonial.default') {
                            ImageSize = jQuery('.elementor-control-testimonial_image_size select[data-setting="testimonial_image_size"]').val();
                            ImageURL = res.url;
                            if (ImageSize !== 'full') {
                                width = sizes[ImageSize]['width'];
                                height = sizes[ImageSize]['height'];
                                ImageURL = res.url + '?w=' + width + '&h=' + height + '&func=fit';
                            }

                            jQuery('.elementor-control-media__preview').attr('style', 'background-image: url("' + ImageURL + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'testimonial-carousel.default') {
                            jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'reviews.default') {
                            jQuery('.elementor-control-slides .elementor-repeater-row-controls.editable .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'flip-box.default') {
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'video-playlist.default') {
                            jQuery('.elementor-control-tabs .elementor-repeater-row-controls.editable .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                            elements.forEach(element => {
                                checkAndReplaceElement(element);
                            });
                        } else if (element_type === 'video.default') {
                            if (res.media_type.type === 'video') {
                                jQuery('.elementor-control-hosted_url .elementor-control-media-video').attr('src', res.url + '?func=proxy');
                                elements.forEach(element => {
                                    checkAndReplaceElement(element);
                                });
                            } else {
                                jQuery('.elementor-control-poster .elementor-control-media__preview').attr('style', 'background-image: url("' + res.url + '");');
                                elements.forEach(element => {
                                    checkAndReplaceElement(element);
                                });
                            }
                        }

                        // active button "Update"
                        jQuery('#elementor-panel-saver-button-publish').removeClass('elementor-disabled');
                        jQuery('#elementor-panel-saver-button-save-options').removeClass('elementor-disabled');

                        if (key === to_insert.length - 1) {
                            if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                                jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                                jQuery('.media-modal-close').click();
                            } else {
                                jQuery('button.SfxButton-root').prop('disabled', false);
                                jQuery('.filerobot-common-BackCloseButton-button').click();
                                jQuery('.media-modal-close').click();
                            }
                        }
                    }
                });
            });
        } else {
            console.log('Element not found.');
        }
    }

    function fmaw_insert_attachment_to_db(to_insert) {
        to_insert.forEach(function(item, key) {
            let data = {
                fr_data     : item,
                action      : 'filerobot_widget_insert_attachment_to_db',
            };

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                dataType: 'html'
            }).done(function (res) {
                res = JSON.parse(res);
                if (res.success) {
                    console.log('Asset upload success!');
                }
            });
        });
    }

    function fmaw_insert_to_content(to_insert, post_id, mediaFrameType, isGutenberg)
    {
        let currentlySelectedBlockId, currentBlock;
        let gallerySubBlocks = [];

        if (isGutenberg) {
            currentlySelectedBlockId = wp.data.select('core/block-editor').getBlockSelectionStart();
            currentBlock = wp.data.select('core/block-editor').getBlocksByClientId(currentlySelectedBlockId)[0];
            if (mediaFrameType === 'core/gallery') {
                gallerySubBlocks = currentBlock.innerBlocks;
            }
            // console.log(currentBlock);
        }
        let isGalleryUpdate = false;
        if (gallerySubBlocks.length > 0) {
            isGalleryUpdate = true;
        }

        if (isGutenberg) {
            to_insert.forEach(function(item, key) {
                let url = item.file.url.cdn;
                let title = item.file.meta.title?.en;
                if (currentBlock.name === 'core/image') {
                    let alt = item.file.meta.description?.en;

                    if (key === 0) {
                        wp.data.dispatch('core/block-editor').updateBlockAttributes(
                            currentlySelectedBlockId,
                            {
                                url: url,
                                alt: alt,
                                title: title,
                                caption: title
                            }
                        );
                    } else {
                        let additionalImage = wp.blocks.createBlock('core/image',{
                            url: url,
                            alt: alt,
                            title: title,
                            caption: title
                        });
                        wp.data.dispatch('core/block-editor').insertBlock(additionalImage);
                    }
                } else if (currentBlock.name === 'core/gallery') {
                    if (isGalleryUpdate) {
                        let galleryNewItemBlock = wp.blocks.createBlock('core/image', {url: url});
                        gallerySubBlocks.push(galleryNewItemBlock);
                    } else {
                        gallerySubBlocks[key] = wp.blocks.createBlock('core/image', {url: url});
                    }

                    if (key === to_insert.length - 1) {
                        wp.data.dispatch('core/block-editor').updateBlock(
                            currentlySelectedBlockId,
                            {
                                innerBlocks: gallerySubBlocks
                            }
                        );
                    }
                } else if (currentBlock.name === 'core/video') {
                    if (key === 0) {
                        let src = url;
                        let position = src.search("func=proxy");
                        if (position === -1) {
                            src = src + "?func=proxy"
                        }
                        wp.data.dispatch('core/block-editor').updateBlockAttributes(
                            currentlySelectedBlockId,
                            {
                                src: src,
                                controls: true,
                                caption: title
                            }
                        );
                    }
                } else if (currentBlock.name === 'core/file') {
                    if (key === 0) {
                        let fileURL = url;
                        let searchParam = fileURL.includes("?");
                        if (searchParam) {
                            fileURL = fileURL + "&download=1";
                        } else {
                            fileURL = fileURL + "?download=1";
                        }
                        let dataUpdate = {
                            fileId: 'wp-block-file--media-' + currentlySelectedBlockId,
                            fileName: item.file.name,
                            href: fileURL,
                            textLinkHref: fileURL,
                            downloadButtonText: 'Download'
                        }
                        <?php
                        /*
                        if (res.media_type.ext === 'pdf') {
                            dataUpdate = {
                                fileId: 'wp-block-file--media-' + currentlySelectedBlockId,
                                fileName: res.name,
                                href: fileURL,
                                textLinkHref: fileURL,
                                downloadButtonText: 'Download',
                                previewHeight: 600,
                                displayPreview: true
                            }
                        }
                        */
                        ?>
                        wp.data.dispatch('core/block-editor').updateBlockAttributes(
                            currentlySelectedBlockId,
                            dataUpdate
                        );
                    }
                } else if (currentBlock.name === 'core/paragraph') {
                    if (key === 0) {
                        let el = document.getElementById("block-" + currentlySelectedBlockId);
                        let cursorPosition = getCaretCharacterOffsetWithin(el);
                        let content = currentBlock.attributes.content;
                        let img = '<img class="wp-image-12" style="width: 150px" src="' + url + '" alt="">';
                        let newContent = content.slice(0, cursorPosition)  + img + content.slice(cursorPosition);
                        wp.data.dispatch('core/block-editor').updateBlockAttributes(
                            currentlySelectedBlockId,
                            {
                                content: newContent
                            }
                        );
                    }
                }

                if (key === to_insert.length-1) {
                    // reset all blocks
                    setTimeout(function () {
                        const getBlockList = () => wp.data.select('core/block-editor').getBlocks();
                        let blockList = getBlockList();
                        wp.data.dispatch('core/block-editor').resetBlocks(blockList);

                        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                            jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                            jQuery('.media-modal-close').click();
                        } else {
                            jQuery('button.SfxButton-root').prop('disabled', false);
                            jQuery('.filerobot-common-BackCloseButton-button').click();
                            jQuery('.media-modal-close').click();
                        }
                    }, 1000);
                }
            });
        }

        to_insert.forEach(function(item, key) {
            let data = {
                post_id     : post_id,
                fr_data     : item,
                action      : 'filerobot_fmaw_insert_to_content',
                return_html : isGutenberg ? 0 : 1
            };

            if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
            } else {
                jQuery('button.SfxButton-root').prop('disabled', true);
            }

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                dataType: 'html'
            }).done(function (res) {
                res = JSON.parse(res);
                if (res.success) {
                    if (isGutenberg) {
                        if (currentBlock.name === 'core/post-featured-image') {
                            wp.data.dispatch('core/editor').editPost(
                                {
                                    featured_media: res.attachment_id
                                }
                            );
                            filerobot_get_post_info.thumbnail = res.url;
                            checkBlockRenderWhenChangeFeatureImage(res.url);
                            jQuery('figure[data-block="' + currentlySelectedBlockId + '"] img').attr('src', res.url);
                        } else if (currentBlock.name === 'core/audio') {
                            if (key === 0) {
                                let src = res.url;
                                let position = src.search("func=proxy");
                                if (position === -1) {
                                    src = src + "?func=proxy"
                                }
                                wp.data.dispatch('core/block-editor').updateBlockAttributes(
                                    currentlySelectedBlockId,
                                    {
                                        autoplay: false,
                                        caption: "",
                                        src: src,
                                        loop: false,
                                        id: res.attachment_id
                                    }
                                );
                            }
                        } else if (currentBlock.name === 'core/cover') {
                            if (key === 0) {
                                wp.data.dispatch('core/block-editor').updateBlockAttributes(
                                    currentlySelectedBlockId,
                                    {
                                        dimRatio: 50,
                                        id: res.attachment_id,
                                        url: res.url
                                    }
                                );
                            }
                        } else if (currentBlock.name === 'core/media-text') {
                            if (key === 0) {
                                wp.data.dispatch('core/block-editor').updateBlockAttributes(
                                    currentlySelectedBlockId,
                                    {
                                        mediaLink: res.url,
                                        mediaId: res.attachment_id,
                                        mediaUrl: res.url,
                                        mediaType: "image",
                                    }
                                );
                            }
                        }
                    } else if (wp.media.editor) {
                        if (jQuery('#media-frame-title h1').text() === 'Replace image') {
                            let newImgElement = jQuery(res.data);
                            let newImgUrl = newImgElement.attr('src');
                            let imgElement = jQuery(tinymce.activeEditor.selection.getContent());
                            imgElement.attr('src', newImgUrl);
                        } else {
                            wp.media.editor.insert(res.data);
                        }
                    }

                    if (key === to_insert.length-1) {
                        // reset all blocks
                        setTimeout(function () {
                            const getBlockList = () => wp.data.select('core/block-editor').getBlocks();
                            let blockList = getBlockList();
                            wp.data.dispatch('core/block-editor').resetBlocks(blockList);
                        }, 1000);

                        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                            jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                            jQuery('.media-modal-close').click();
                        } else {
                            jQuery('button.SfxButton-root').prop('disabled', false);
                            jQuery('.filerobot-common-BackCloseButton-button').click();
                            jQuery('.media-modal-close').click();
                        }
                    }
                }
            });
        });
    }

    function fmaw_set_theme_background(to_insert, post_id)
    {
        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
        {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        }
        else
        {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 0
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);

            if (res.success)
            {
                //@Todo: it wont be wp.media.editor.insert(res.data); here

                /*
                Somewhere down the line, gotta do:
                jQuery('.custom-background').css('background-image', IMAGE_URL)

                And change thumbnail to:
                <li id="customize-control-background_image" class="customize-control customize-control-background">
                   <span class="customize-control-title">Background Image</span>
                   <div class="customize-control-notifications-container" style="display: none;">
                      <ul></ul>
                   </div>
                   <div class="attachment-media-view attachment-media-view-image ">
                      <div class="thumbnail thumbnail-image">
                         <img class="attachment-thumb" src="https://fkklnkdm.filerobot.com/v7/wp_demo/frog.png?width=300&amp;height=300" draggable="false" alt="">
                      </div>
                      <div class="actions">
                         <button type="button" class="button remove-button">Remove</button>
                         <button type="button" class="button upload-button control-focus">Change image</button>
                      </div>
                   </div>
                </li>

                Answer is one of these 3:
                Either imitate this: 
                wp-includes\js\customize-preview.js
                background: function() {

                Or imitate this: 
                wp-admin\js\customize-controls.js
                wp.ajax.post( 'custom-background-add', {

                Or imitate this: 
                wp-admin\js\custom-background.js
                $.post( ajaxurl, {
                    action: 'set-background-image',
                    attachment_id: attachment.id,
                    _ajax_nonce: nonceValue,
                    size: 'full'
                })

                */

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0)
                {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                    jQuery('.media-modal-close').click();
                }
                else
                {
                    jQuery('button.SfxButton-root').prop('disabled', false);
                    jQuery('.filerobot-common-BackCloseButton-button').click();
                    jQuery('.media-modal-close').click();
                }
            }
        });
    }

    /**
     *
     * https://developer.mozilla.org/en-US/docs/Web/API/URLSearchParams/delete#examples
     * Usage: removeParam('{DOMAIN}?width=90&height=32&vh=1aacvh', 'vh');
     *
     */
    function removeParam(link, param)
    {
        let url = new URL(link);
        let params = new URLSearchParams(url.search);
        params.delete(param);

        return params.toString() ? `${url.origin}?${params.toString()}` : url.origin;
    }

    function getCaretCharacterOffsetWithin(element) {
        let caretOffset = 0;
        let doc = element.ownerDocument || element.document;
        let win = doc.defaultView || doc.parentWindow;
        let sel;
        if (typeof win.getSelection != "undefined") {
            sel = win.getSelection();
            if (sel.rangeCount > 0) {
                let range = win.getSelection().getRangeAt(0);
                let preCaretRange = range.cloneRange();
                preCaretRange.selectNodeContents(element);
                preCaretRange.setEnd(range.endContainer, range.endOffset);
                caretOffset = preCaretRange.toString().length;
            }
        } else if ( (sel = doc.selection) && sel.type != "Control") {
            let textRange = sel.createRange();
            let preCaretTextRange = doc.body.createTextRange();
            preCaretTextRange.moveToElementText(element);
            preCaretTextRange.setEndPoint("EndToEnd", textRange);
            caretOffset = preCaretTextRange.text.length;
        }
        return caretOffset;
    }

    function insert_yoast_seo_image(to_insert, post_id, type) {
        if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
            jQuery('button.filerobot-common-BaseButton').prop('disabled', true);
        } else {
            jQuery('button.SfxButton-root').prop('disabled', true);
        }

        let data = {
            post_id     : post_id,
            fr_data     : to_insert[0],
            action      : 'filerobot_fmaw_insert_to_content',
            return_html : 0
        };

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: 'html'
        }).done(function (res) {
            res = JSON.parse(res);
            if (res.success) {
                if (type === 'facebook') {
                    jQuery('#yoast_wpseo_opengraph-image').val(res.url);
                    jQuery('#yoast_wpseo_opengraph-image-id').val(res.attachment_id);
                    if (jQuery('#facebookPreview').length && !jQuery('#facebookPreview').parent().parent().parent().is('.yst-feature-upsell.yst-feature-upsell--card')) {
                        jQuery('#facebookPreview img').attr('src', res.url);
                    } else {
                        let buttonElement = (jQuery('#social-select-button-metabox').length)
                            ? jQuery('#social-select-button-metabox').parent().parent().find('button.yoast-image-select__preview')
                            : jQuery('#social-replace-button-metabox').parent().parent().find('button.yoast-image-select__preview');
                        if(jQuery('#social-select-button-modal').length || jQuery('#social-replace-button-modal').length) {
                            buttonElement = (jQuery('#social-select-button-modal').length)
                                ? jQuery('#social-select-button-modal').parent().parent().find('button.yoast-image-select__preview')
                                : jQuery('#social-replace-button-modal').parent().parent().find('button.yoast-image-select__preview');
                        }

                        if (buttonElement.hasClass('yoast-image-select__preview--no-preview')) {
                            let imgTag = '<img src="' + res.url + '" alt="" class="yoast-image-select__preview--image">';
                            buttonElement.prepend(imgTag);
                            buttonElement.removeClass('yoast-image-select__preview--no-preview');
                        } else {
                            buttonElement.find('img').attr('src', res.url);
                            buttonElement.find('img').attr('srcset', '');
                        }
                    }
                } else if (type === 'twitter') {
                    jQuery('#yoast_wpseo_twitter-image').val(res.url);
                    jQuery('#yoast_wpseo_twitter-image-id').val(res.attachment_id);
                    if (jQuery('#twitterPreview').length && !jQuery('#twitterPreview').parent().parent().parent().is('.yst-feature-upsell.yst-feature-upsell--card')) {
                        jQuery('#twitterPreview img').attr('src', res.url);
                    } else {
                        let buttonElement = (jQuery('#x-select-button-metabox').length)
                            ? jQuery('#x-select-button-metabox').parent().parent().find('button.yoast-image-select__preview')
                            : jQuery('#x-replace-button-metabox').parent().parent().find('button.yoast-image-select__preview');
                        if(jQuery('#x-select-button-modal').length || jQuery('#x-replace-button-modal').length) {
                            buttonElement = (jQuery('#x-select-button-modal').length)
                                ? jQuery('#x-select-button-modal').parent().parent().find('button.yoast-image-select__preview')
                                : jQuery('#x-replace-button-modal').parent().parent().find('button.yoast-image-select__preview');
                        }

                        if (buttonElement.hasClass('yoast-image-select__preview--no-preview')) {
                            let imgTag = '<img src="' + res.url + '" alt="" class="yoast-image-select__preview--image">';
                            buttonElement.prepend(imgTag);
                            buttonElement.removeClass('yoast-image-select__preview--no-preview');
                        } else {
                            buttonElement.find('img').attr('src', res.url);
                            buttonElement.find('img').attr('srcset', '');
                        }
                    }


                } else if (type === 'organization_image') {
                    jQuery('#input-wpseo_titles-company_logo-url').val(res.url);
                    jQuery('#input-wpseo_titles-company_logo-id').val(res.attachment_id);
                    wpseoScriptData.settings.wpseo_titles.company_logo = res.url;
                    wpseoScriptData.settings.wpseo_titles.company_logo_id = res.attachment_id;

                    let buttonElement = jQuery('#button-wpseo_titles-company_logo-preview');
                    if (buttonElement.hasClass('yst-border-dashed')) {
                        let imgTag = '<img src="' + res.url + '" alt="" class="yst-object-cover yst-object-center yst-min-h-full yst-min-w-full">';
                        buttonElement.html('');
                        buttonElement.prepend(imgTag);
                        buttonElement.removeClass('yst-border-2');
                        buttonElement.removeClass('yst-border-dashed');
                    } else {
                        jQuery('#button-wpseo_titles-company_logo-preview img').attr('src', res.url);
                        jQuery('#button-wpseo_titles-company_logo-preview img').attr('srcset', '');
                    }
                } else if (type === 'social_post_image') {
                    jQuery('#input-wpseo_social-og_default_image-url').val(res.url);
                    jQuery('#input-wpseo_social-og_default_image-id').val(res.attachment_id);
                    wpseoScriptData.settings.wpseo_social.og_default_image = res.url;
                    wpseoScriptData.settings.wpseo_social.og_default_image_id = res.attachment_id;
                    let buttonElement = jQuery('#button-wpseo_social-og_default_image-preview');
                    if (buttonElement.hasClass('yst-border-dashed')) {
                        let imgTag = '<img src="' + res.url + '" alt="" class="yst-object-cover yst-object-center yst-min-h-full yst-min-w-full">';
                        buttonElement.html('');
                        buttonElement.prepend(imgTag);
                        buttonElement.removeClass('yst-border-2');
                        buttonElement.removeClass('yst-border-dashed');
                    } else {
                        jQuery('#button-wpseo_social-og_default_image-preview img').attr('src', res.url);
                        jQuery('#button-wpseo_social-og_default_image-preview img').attr('srcset', '');
                    }
                } else if (type === 'personal_image') {
                    jQuery('#input-wpseo_titles-person_logo-url').val(res.url);
                    jQuery('#input-wpseo_titles-person_logo-id').val(res.attachment_id);
                    wpseoScriptData.settings.wpseo_titles.person_logo = res.url;
                    wpseoScriptData.settings.wpseo_titles.person_logo_id = res.attachment_id;

                    let buttonElement = jQuery('#button-wpseo_titles-person_logo-preview');
                    if (buttonElement.hasClass('yst-border-dashed')) {
                        let imgTag = '<img src="' + res.url + '" alt="" class="yst-object-cover yst-object-center yst-min-h-full yst-min-w-full">';
                        buttonElement.html('');
                        buttonElement.prepend(imgTag);
                        buttonElement.removeClass('yst-border-2');
                        buttonElement.removeClass('yst-border-dashed');
                    } else {
                        jQuery('#button-wpseo_titles-person_logo-preview img').attr('src', res.url);
                        jQuery('#button-wpseo_titles-person_logo-preview img').attr('srcset', '');
                    }
                }

                if (type === 'organization_image' || type === 'social_post_image' || type === 'personal_image') {
                    jQuery('footer.yst-sticky div.rah-static').addClass('rah-static--height-auto');
                    jQuery('footer.yst-sticky div.rah-static').removeClass('rah-static--height-zero');
                    jQuery('footer.yst-sticky div.rah-static').css('height', 'auto');
                    jQuery('footer.yst-sticky div.rah-static > div').show();
                    jQuery('footer.yst-sticky div.rah-static > div').css('opacity', 1);
                }

                if (jQuery('.filerobot-common-BackCloseButton-button').length === 0) {
                    jQuery('button.filerobot-common-BaseButton').prop('disabled', false);
                    jQuery('.media-modal-close').click();
                } else {
                    jQuery('button.SfxButton-root').prop('disabled', false);
                    jQuery('.filerobot-common-BackCloseButton-button').click();
                    jQuery('.media-modal-close').click();
                }
            }
        });
    }

    <?php
    /*
    function updateAttachmentMetadata(attachment_id, image_size, width, height, func) {
        let dataAttachmentUpdate = {
            attachment_id: attachment_id,
            image_size: image_size,
            width: width,
            func: func,
            height: height,
            action: 'filerobot_fmaw_update_attachment_metadata'
        };
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: dataAttachmentUpdate,
            dataType: 'html'
        }).done(function (res) {
            // console.log(res);
        });
    }
    */
    ?>

    function rerenderElement(elementSelected, elTarget, loading) {
        if (loading) {
            jQuery(elementSelected).addClass('elementor-loading');
        }
        setTimeout(function () {
            jQuery(elTarget).trigger("change");
            jQuery(elementSelected).remove('elementor-loading');
        }, 500);
    }

</script>
</body>
</html>