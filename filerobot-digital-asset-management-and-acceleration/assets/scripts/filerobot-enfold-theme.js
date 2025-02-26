function insert_enfold_block(to_insert, post_id, block_type_name) {
    (function ($) {
        console.log(block_type_name);
        to_insert.forEach(function(item, key) {
            let data = {
                post_id     : post_id,
                fr_data     : item,
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
                    if (block_type_name === 'Team Member') {
                        filerobot_enfold_team_member_block(res);
                    } else if (block_type_name === 'Testimonials') {
                        filerobot_enfold_testimonials_block(res);
                    } else if (block_type_name === 'Image') {
                        filerobot_enfold_image_block(res);
                    } else if (block_type_name === 'Image with Hotspots') {
                        filerobot_enfold_image_with_hotspots_block(res);
                    } else if (block_type_name === 'Video') {
                        filerobot_enfold_video_block(res);
                    } else if (block_type_name === 'Horizontal Gallery'
                        || block_type_name === 'Gallery'
                        || block_type_name === 'Masonry Gallery'
                    ) {
                        filerobot_enfold_galleries_block(res);
                    }

                    if (key === to_insert.length - 1) {
                        if ($('.filerobot-common-BackCloseButton-button').length === 0) {
                            $('button.filerobot-common-BaseButton').prop('disabled', false);
                            $('.media-modal-close').click();
                        } else {
                            $('button.SfxButton-root').prop('disabled', false);
                            $('.filerobot-common-BackCloseButton-button').click();
                            $('.media-modal-close').click();
                        }
                    }
                }
            });
        });

    })(jQuery);
}

function filerobot_enfold_team_member_block(res) {
    (function ($) {
        $('#aviaTBsrc').val(res.url);
        $('#aviaTBimg_fakeArg').val('<img src="' + res.url + '" alt="">');
        $('#aviaTBattachment').val(res.attachment_id);
        $('#aviaTBattachment_size').val('full');
        $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');

        let img_admin_preview = $('.avia-modal-preview-content iframe').contents().find('#av-admin-preview section.avia-team-member img.avia_image_team');
        if (img_admin_preview.length) {
            img_admin_preview.attr('src', res.url);
            img_admin_preview.attr('height', res.metadata.height);
            img_admin_preview.attr('width', res.metadata.width);
        } else {
            let prependImg = '<div class="team-img-container"><img decoding="async" class="wp-image-' + res.attachment_id + ' avia-img-lazy-loading-not-' + res.attachment_id + ' avia_image avia_image_team" src="' + res.url + '" alt="" itemprop="image" height="300" width="226"></div>';
            $('.avia-modal-preview-content iframe').contents().find('#av-admin-preview section.avia-team-member').prepend(prependImg);
        }
    })(jQuery);
}

function filerobot_enfold_testimonials_block(res) {
    (function ($) {
        $('#aviaTBaviaTBsrc').val(res.attachment_id);
        $('#aviaTBaviaTBimg_fakeArg').val('<img src="' + res.url + '" alt="">');
        $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');
    })(jQuery);
}

function filerobot_enfold_image_block(res) {
    (function ($) {
        $('#aviaTBsrc').val(res.url);
        $('#aviaTBimg_fakeArg').val('<img src="' + res.url + '" alt="">');
        $('#aviaTBattachment').val(res.attachment_id);
        $('#aviaTBattachment_size').val('full');
        $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');

        let appendImg = '<div class="avia-image-overlay-wrap"><img decoding="async" class="wp-image-' + res.attachment_id + ' avia-img-lazy-loading-not-' + res.attachment_id + ' avia_image" src="' + res.url + '" alt="" title="" itemprop="thumbnailUrl"></div>';
        $('.avia-modal-preview-content iframe').contents().find('#av-admin-preview').html(appendImg);
    })(jQuery);

}

function filerobot_enfold_image_with_hotspots_block(res) {
    (function ($) {
        $('#aviaTBsrc').val(res.url);
        $('#aviaTBimg_fakeArg').val('<img src="' + res.url + '" alt="">');
        $('#aviaTBattachment').val(res.attachment_id);
        $('#aviaTBattachment_size').val('full');
        $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');
    })(jQuery);
}

function filerobot_enfold_galleries_block(res) {
    (function ($) {
        console.log('filerobot_enfold_galleries_block');
        let ids = $('#aviaTBids').val();
        if (ids !== '') {
            ids += ',' + res.attachment_id;
        } else {
            ids = res.attachment_id;
        }

        $('#aviaTBids').val(ids);
        let imgGallery = `<span class="avia-builder-prev-img"><img src="${res.url}"></span>`;
        $('.avia-builder-prev-img-container-wrap .avia-builder-prev-img-container').append(imgGallery);
    })(jQuery);
}

function filerobot_enfold_video_block(res) {
    (function ($) {
        let type = res.type;
        let result = type.includes("video");
        if (result) {
            let videoUrl = res.url;
            let url = new URL(videoUrl);
            videoUrl = url.origin + url.pathname;
            $('#aviaTBsrc').val(videoUrl);
        } else {
            $('#aviaTBmobile_image').val(res.url);
            $('#aviaTBattachment').val(res.attachment_id);
            $('#aviaTBattachment_size').val('full');
            $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');
        }
    })(jQuery);
}

function insert_enfold_audio_player_block(to_insert, post_id) {
    (function ($) {
        let hostname = location.protocol + '//' + location.hostname
        to_insert.forEach(function(item, key) {
            let data = {
                post_id     : post_id,
                fr_data     : item,
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
                    let textAreaVal = `[av_playlist_element id='${res.attachment_id}' title='${res.name}' artist='' album='' description='' filelength='' url='${res.url}' filename='${res.name}' icon='${hostname}/wp-includes/images/media/audio.svg' title_info=''][/av_playlist_element]`;;

                    let elm = `<div class="avia-modal-group-element" data-modal_title="Edit Form Element" data-modal_open="no" 
                        data-trigger_button="avia-builder-audio-edit" data-shortcodehandler="av_playlist_element" 
                        data-closing_tag="yes" data-base_shortcode="av_player" data-item_shortcode="av_playlist_element" 
                        data-element_title="Item: Audio Player" data-element_tooltip="Item: Add an audio player element" 
                        data-modal_ajax_hook="av_playlist_element" 
                        data-modal_on_load="modal_load_tabs, modal_load_toggles, modal_start_sorting, modal_tab_functions, modal_hotspot_helper, modal_load_colorpicker">
                            <a class="avia-attach-modal-element-move avia-move-handle">Move</a><a class="avia-attach-modal-element-delete avia-delete">Delete</a>
                            <div class="avia-modal-group-element-inner"><div class="avia_title_container" data-update_element_template="yes">
                                <div class="" data-update_class_with="audio_type">
                                    <span class="avia_audiolist_image" data-update_with="img_fakeArg">
                                        <img src="${hostname}/wp-includes/images/media/audio.svg" title="" alt="">
                                    </span>
                                    <div class="avia_audiolist_content">
                                        <h4 class="avia_title_container_inner">
                                            <span class="avia-audiolist-title" data-update_with="title_info">
                                                <span class="avia-known-title"></span>
                                            </span>
                                        </h4>
                                        <p class="avia_content_album" data-update_with="album"></p>
                                        <p class="avia_content_description" data-update_with="description"></p>
                                        <small class="avia_audio_url" data-update_with="filename">${res.name}</small>
                                    </div>
                                    <div class="hidden-attachment-id" style="display: none;" data-update_with="id">${res.attachment_id}</div>
                                </div>
                            </div>
                        </div>
                        <textarea data-name="text-shortcode" cols="20" rows="4" name="aviaTBcontent">${textAreaVal}</textarea>
                    </div>`;
                    $('#aviaTBcontent-form-container #aviaTBcontent').append(elm);

                    if (key === to_insert.length - 1) {
                        if ($('.filerobot-common-BackCloseButton-button').length === 0) {
                            $('button.filerobot-common-BaseButton').prop('disabled', false);
                            $('.media-modal-close').click();
                        } else {
                            $('button.SfxButton-root').prop('disabled', false);
                            $('.filerobot-common-BackCloseButton-button').click();
                            $('.media-modal-close').click();
                        }
                    }
                }
            });
        });
    })(jQuery);
}

function insert_enfold_sliders_block(to_insert, post_id, block_type_name) {
    (function ($) {
        to_insert.forEach(function(item, key) {
            let data = {
                post_id     : post_id,
                fr_data     : item,
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
                    let modalInstance2 = jQuery('.avia-modal.modal-instance-2 .avia-modal-inner-header h3.avia-modal-title');
                    if (modalInstance2.length
                        && modalInstance2.text() === 'Edit Form Element'
                    ) {
                        $('#aviaTBaviaTBid').val(res.attachment_id);
                        $('#aviaTBaviaTBimg_fakeArg').val('<img src="' + res.url + '" alt="">');
                        $('.avia-builder-prev-img-container').html('<span class="avia-builder-prev-img"><img src="' + res.url + '" alt=""></span>');
                    } else {
                        let textAreaVal = '';
                        if (block_type_name === 'Easy Slider') {
                            textAreaVal = `[av_slide id='${res.attachment_id}'][/av_slide]`;
                        } else if (block_type_name === 'Fullwidth Easy Slider') {
                            textAreaVal = `[av_slide_full id='${res.attachment_id}'][/av_slide_full]`;
                        } else if (block_type_name === 'Fullscreen Slider') {
                            textAreaVal = `[av_fullscreen_slide id='${res.attachment_id}'][/av_fullscreen_slide]`;
                        } else if (block_type_name === 'Accordion Slider') {
                            textAreaVal = `[av_slide_accordion id='${res.attachment_id}'][/av_slide_accordion]`;
                        } else if (block_type_name === 'Partner/Logo Element') {
                            textAreaVal = `[av_partner_logo id='${res.attachment_id}']`;
                        }

                        let imgTag = '<img src="' + res.url + '" alt="">';
                        let elm = `<div class="avia-modal-group-element" data-modal_title="Edit Form Element" data-modal_open="yes" data-trigger_button=""
                             data-shortcodehandler="av_slide_full" data-closing_tag="yes" data-base_shortcode="av_slideshow_full"
                             data-item_shortcode="av_slide_full" data-element_title="Fullwidth Easy Slider Item"
                             data-element_tooltip="A Fullwidth Easy Slider image or video item" data-modal_ajax_hook="av_slide_full"
                             data-modal_on_load="modal_load_tabs, modal_start_sorting, modal_tab_functions, modal_hotspot_helper, modal_load_toggles, modal_load_iconswitcher, modal_load_colorpicker">
                            <a class="avia-attach-modal-element-move avia-move-handle ui-sortable-handle">Move</a>
                            <a class="avia-attach-modal-element-delete avia-delete">Delete</a>
                            <div class="avia-modal-group-element-inner">
                                <div class="avia_title_container" data-update_element_template="yes">
                                    <div class="avia-slide_type-" data-update_class_with="slide_type">
                                        <span class="avia_slideshow_image" data-update_with="img_fakeArg">${imgTag}</span>
                                        <div class="avia_slideshow_content">
                                            <h4 class="avia_title_container_inner" data-update_with="title"></h4>
                                            <p class="avia_content_container" data-update_with="content"></p>
                                            <small class="avia_video_url" data-update_with="video">https://</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea data-name="text-shortcode" cols="20" rows="4" name="aviaTBcontent">${textAreaVal}</textarea>
                        </div>`;
                        $('#aviaTBcontent-form-container #aviaTBcontent').append(elm);
                    }

                    if (key === to_insert.length - 1) {
                        if ($('.filerobot-common-BackCloseButton-button').length === 0) {
                            $('button.filerobot-common-BaseButton').prop('disabled', false);
                            $('.media-modal-close').click();
                        } else {
                            $('button.SfxButton-root').prop('disabled', false);
                            $('.filerobot-common-BackCloseButton-button').click();
                            $('.media-modal-close').click();
                        }
                    }
                }
            });
        });
    })(jQuery);
}

function insert_enfold_logo(to_insert, post_id) {
    (function ($) {
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
                $('.avia_upload_input#logo').val(res.url);
                $('.avia_preview_pic#div_logo').html('<a href="#" class="avia_remove_image">×</a><img src="' + res.url + '" alt="">');

                if ($('.filerobot-common-BackCloseButton-button').length === 0) {
                    $('button.filerobot-common-BaseButton').prop('disabled', false);
                    $('.media-modal-close').click();
                } else {
                    $('button.SfxButton-root').prop('disabled', false);
                    $('.filerobot-common-BackCloseButton-button').click();
                    $('.media-modal-close').click();
                }

                if ($('.avia_footer .avia_submit').hasClass('avia_button_inactive')) {
                    $('.avia_footer .avia_submit').removeClass('avia_button_inactive');
                    $('.avia_footer .avia_submit').addClass('avia_button_active');
                }
            }
        });
    })(jQuery);
}

function insert_enfold_favicon(to_insert, post_id) {
    (function ($) {
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
                $('.avia_upload_input#favicon').val(res.url);
                $('.avia_preview_pic#div_favicon').html('<a href="#" class="avia_remove_image">×</a><img src="' + res.url + '" alt="">');

                if ($('.filerobot-common-BackCloseButton-button').length === 0) {
                    $('button.filerobot-common-BaseButton').prop('disabled', false);
                    $('.media-modal-close').click();
                } else {
                    $('button.SfxButton-root').prop('disabled', false);
                    $('.filerobot-common-BackCloseButton-button').click();
                    $('.media-modal-close').click();
                }

                if ($('.avia_footer .avia_submit').hasClass('avia_button_inactive')) {
                    $('.avia_footer .avia_submit').removeClass('avia_button_inactive');
                    $('.avia_footer .avia_submit').addClass('avia_button_active');
                }
            }
        });
    })(jQuery);
}