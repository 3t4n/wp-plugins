/*jslint browser: true*/
/*global $, jQuery, alert*/

var $container = jQuery('.ms-modal-container');

/**
 * Remove the modal box, called with set timeout
 */
function removeModalContainer() {
    $container = jQuery('.ms-modal-container');
    $container.remove();
}

/**
 * Close the modal box, used when the close button is clicked
 */
function removeModalBox() {
    jQuery('.mstoic-shortcodes-modal').removeClass('active');
    setTimeout(removeModalContainer, 200);
}

function createModalBox(data) {
    if (data === 'undefined') {
        data = 'No data to display';
    }
    jQuery('body').append('' +
        '<div class="ms-modal-container">' +
            '<div class="mstoic-shortcodes-modal mstoicPopUp">' +
                '<span class="dashicons dashicons-no close"></span>' +
                '<h2 class="background-wp"><i class="fa fa-home ms-home"></i> MSTOIC SHORTCODES</h2>' +
                data +
            '</div>' +
        '</div>'
    );

    jQuery('.mstoic-shortcodes-modal').addClass('active');
}

/**
 * This function is called from the javascript inside PHP files
 *
 * @param data      Data to be added to the ModalBox
 */
function replaceInModalBox(data) {

    if (jQuery('.mstoic-shortcodes-modal').length==0) {

        NewModalBox(data);

    } else {

        jQuery('.mstoic-shortcodes-modal .section').slideUp(200, function () {
            // Do nothing
        });

        jQuery('.mstoic-shortcodes-modal').append(data);

        jQuery('.mstoic-color-field').wpColorPicker();
    }

    jQuery('.mstoic-shortcodes-modal').css( { 'max-height': (jQuery(window).height()-100) + 'px' } );

}

function addInModalBox(data) {

    if (jQuery('.mstoic-shortcodes-modal').length==0) {
        createModalBox(data);
    } else {
        jQuery('.mstoic-shortcodes-modal').append(data);
    }

    jQuery('.mstoic-color-field').wpColorPicker();

    jQuery('.mstoic-shortcodes-modal').css( { 'max-height': (jQuery(window).height()-100) + 'px' } );

}

/**
 * Removes the previous modal box
 * Creates a new one with new data
 */
function NewModalBox(data) {
    $container = jQuery('.ms-modal-container');
    $container.remove();
    createModalBox(data);
}

function livepreview($this, response) {
    jQuery('.live-preview').remove();
    $this.before('<div class="live-preview">' + response + '</div>');

    jQuery.getScript(localisation_array.plugin_url + 'js/script.js')
        .done(function (script, textStatus) {
            //console.log(textStatus);
        })
        .fail(function (jqxhr, settings, exception) {
            //jQuery("div.log").text("Triggered ajaxError handler.");
        });
}

(function ($) {

    "use strict";

    /* jshint strict: true, browser: true, jquery: true, devel: true */
    /*global tinymce, ajaxurl*/

    tinymce.create('tinymce.plugins.MstoicShortcodes', {

        init: function (ed, url) {

            var shortcode,
                tempVal;

            // Function to show live preview or add shortcode to the editor.
            function shortcodeComplete($this) {
                if ($this.hasClass('ms-get-shortcode')) {

                    insertIntoPost(shortcode, 'TRUE');

                } else if ($this.hasClass('ms-live-preview')) {

                    $.ajax({

                        url: ajaxurl,
                        data: {
                            shortcodeData: shortcode,
                            action: 'ajax_live_preview',
                            beforeSend: function() {
                               $this.before('<div class="loader">Loading...</div>');
                            },
                        },
                        type: 'post'

                    }).success(function (response) {
                        $('.ms-live-preview-container .loader').remove();
                        livepreview($this, response);
                    });

                }
            }

            $(document).off('click', '.mstoic-shortcodes-modal .close').on('click', '.mstoic-shortcodes-modal .close', function () {
                removeModalBox();
            });

            $(document).off('click', '.shortcodes-list .shortcode').on('click', '.shortcodes-list .shortcode', function () {
                shortcodeFunction($(this).data('value'));
            });

            var shortcodeValue,
                $this,
                temp = '',
                tempCounter = 0,
                fbShare,
                fbFaces,
                i;

            function getShortcodeInEditor(shortcodeName, inputClass) {

                shortcode = '[' + shortcodeName;

                $('.' + inputClass).each(function () {
                    shortcode +=  ' ' + $(this).attr('id') + '=' + '"' + $(this).val() + '"';
                });

                shortcode += ']';

                shortcodeComplete($this);

            }

            $(document).off('click', '.ms-get-shortcode, .ms-live-preview').on('click', '.ms-get-shortcode, .ms-live-preview', function () {

                $this = $(this);
                shortcodeValue = $this.data('shortcode');

                switch (shortcodeValue) {

                    // Slider Images

                    case 'ms_slider_images_next':

                        $(function () {
                            $.post(ajaxurl, {
                                action: 'ajax_ms_slider_images_next',
                            }, function (response) {
                                NewModalBox(response);
                            });
                        });

                        break;

                    case 'ms_buttons_get_button': // Buttons
                        getShortcodeInEditor('ms_buttons', 'ms_buttons');
                        break;

                    case 'ms_expendable_box': // Expendable Box
                        getShortcodeInEditor(shortcodeValue, 'expendable-box-inputs');
                        break;

                    case 'ms_box_heading_icon': // Box With Icon and Heading
                        getShortcodeInEditor(shortcodeValue, 'box-heading-icon-inputs');
                        break;

                    case 'ms_tooltip': // Tooltip
                        getShortcodeInEditor(shortcodeValue, 'ms-tooltip');
                        break;

                    // Counters
                    case 'ms_get_counters':

                        shortcode = '[ms_counters count="'+$(this).data('one')+'"';

                        $('.counter_number, .counter_text, #counter_color, #counter_color_background, #counter_color_heading_text, #counter_color_value_text').each(function () {
                            shortcode +=  ' ' + $(this).attr('id') + '=' + '"' + $(this).val() + '"';
                        });

                        shortcode += ']';

                        shortcodeComplete($this);

                        break;

                    // Facebook Like Button
                    case 'ms_fb_like_button_get_button':

                        temp = $('#fb-page-url').val();

                        fbFaces = $('#ms-fb-show-faces').is(":checked");
                        fbShare = $('#ms-fb-show-share').is(":checked");

                        if (temp !== '') {
                            shortcode = '[ms_fb_like_button url="' + encodeURI(temp) + '"';
                            if (fbFaces) {
                                shortcode += ' faces="true"';
                            }
                            if (fbShare) {
                                shortcode += ' share="true"';
                            }
                            shortcode += ']';

                            shortcodeComplete($this);

                        } else {
                            alert('Please input a valid URL');
                        }

                        break;

                    // YouTube Embeds
                    case 'ms_youtube_embeds':

                        shortcode = '['+shortcodeValue;

                        $('.youtube-embeds').each(function () {
                            shortcode +=  ' ' + $(this).attr('id') + '=' + '"' + $(this).val() + '"';
                        });

                        $('.youtube-embeds-checkbox').each(function () {
                            if ($(this).is(":checked")) {
                                shortcode +=  ' ' + $(this).attr('id') + '=' + '"TRUE"';
                            }
                        });

                        shortcode += ']';

                        shortcodeComplete($this);

                        break;

                    // Related Posts With Pics
                    case 'ms_related_posts':

                        shortcode = '[ms_related_posts]';

                        $('.related-pics-url').each(function () {
                            if ($(this).val() != '') {
                                shortcode += '<br />' + '[ms_related_posts_url]' + $(this).val() + '[/ms_related_posts_url]';
                            }
                        });

                        shortcode += '<br />[/ms_related_posts]';

                        shortcodeComplete($this);

                        break;

                    // Slider Images
                    case 'ms_slider_images':

                        temp = '';
                        tempCounter = 0;

                        shortcode = '[ms_slider_images interval="'+$(this).data('one')[0]+'" duration="'+ $(this).data('one')[1]+'"';

                        $('.slider_images_input').each(function () {
                            if ($(this).val() != '') {
                                temp += '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + '[ms_slider_image]' + $(this).val() + '[/ms_slider_image]';
                                tempCounter++;
                            }
                        });

                        shortcode += ' count="'+tempCounter+'"]' + temp + '<br />' + '[/ms_slider_images]';

                        shortcodeComplete($this);

                        break;

                    // Twitter Follow Button

                    case 'ms_twitter_follow_button_get_button':

                        var twitterShowCount,
                            twitterShowUsername,
                            twitterHandle,
                            twitterLarge;

                        twitterHandle = $('#twitter-handle').val();
                        twitterShowCount = $('#ms_twitter_show_count').is(":checked");
                        twitterShowUsername = $('#ms_twitter_show_username').is(":checked");
                        twitterLarge = $('#ms_twitter_show_large').is(":checked");

                        if (twitterHandle === '') {
                            alert('Please input a Twitter Handle');
                            return;
                        }

                        shortcode = '[ms_twitter_follow_button handle="' +twitterHandle+ '"';
                        if (twitterShowCount) { shortcode += ' count="true"'; }
                        if (twitterShowUsername) { shortcode += ' name="true"'; }
                        if (twitterLarge) { shortcode += ' large="true"'; }
                        shortcode += ']';

                        shortcodeComplete($this);

                        break;

                    case 'get_images':

                        shortcode = '[ms_images';

                        $('.ms-img-upload-field').each(function() {
                            tempVal = $(this).val();
                            if (tempVal!=='') {
                                tempCounter++;
                                shortcode += ' image_' + tempCounter + '="' + tempVal + '"';
                            }
                            tempVal = $(this).closest('.ms-image-upload').find('.ms-img-heading').val();
                            if (tempVal!=='') {
                                shortcode += ' image_heading_' + tempCounter + '="' + tempVal + '"';
                            }
                            tempVal = $(this).closest('.ms-image-upload').find('.ms-img-sub-heading').val();
                            if (tempVal!=='') {
                                shortcode += ' image_sub_heading_' + tempCounter + '="' + tempVal + '"';
                            }
                        });

                        if ($('#ms-round-images').attr('checked') === 'checked') {
                            shortcode += ' round="TRUE"';
                        } else {
                            shortcode += ' round="FALSE"';
                        }

                        shortcode += ' count="' +tempCounter+ '" ]';

                        //insertIntoPost(shortcode, 'TRUE');

                        shortcodeComplete($this);

                        break;

                    case 'ms_get_google_map':

                        shortcode = '[ms_google_map search_term="' +$('#google-maps-search-term').val()+ '"]';

                        shortcodeComplete($this);

                        break;

                    case 'ms_testimonials':

                        shortcode = '[ms_testimonials interval="'+$(this).data('one')[0]+'" duration="'+ $(this).data('one')[1]+'" count="'+ $(this).data('one')[2]+'"]';

                        var count = $(this).data('one')[2];

                        for (i = 1; i <= count; i++) {
                            shortcode += '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + '[ms_testimonial';
                            $('.testimonials').each(function () {
                                if ($(this).data('one') == i) {
                                    shortcode +=  ' ' + $(this).attr('id') + '=' + '"' + $(this).val() + '"';
                                }
                            });
                            shortcode += '][/ms_testimonial]';
                        }

                        shortcode += '<br />' + '[/ms_testimonials]';

                        shortcodeComplete($this);

                        //WP Editor Not Working
                        //removeModalBox();
                        //
                        //var eid = 'content';
                        //
                        ////init quicktags
                        ////switchEditors.go(eid, 'tmce');
                        ////quicktags({id : eid});
                        //
                        ////init tinymce
                        //tinyMCEPreInit.mceInit[eid]['elements'] = eid;
                        //tinyMCEPreInit.mceInit[eid]['body_class'] = eid;
                        //tinyMCEPreInit.mceInit[eid]['succesful'] =  false;
                        //tinymce.init(tinyMCEPreInit.mceInit[eid]);

                        break;
                }

            });

            function insertIntoPost(content, removeModal) {
                ed.execCommand('mceInsertContent', false, content);

                if (removeModal === 'TRUE' && removeModal !== 'undefined') {
                    removeModalBox();
                }
            }

            function ajaxRequestShortcodeClick(value) {
                $(function () {
                    $.post(ajaxurl, {
                        action: 'ajax_' + value,
                        beforeSend: function() {
                            $('.'+value).html('<div class="loader">Loading...</div>');
                        },
                    }, function (response) {
                        NewModalBox(response);
                    });
                });
            }

            function shortcodeFunction(value) {

                switch (value) {

                    case 'box_heading_icon':
                    case 'buttons':
                    case 'counters':
                    case 'expendable_box':
                    case 'fb_like_button':
                    case 'google_maps':
                    case 'images':
                    case 'related_posts':
                    case 'slider_images':
                    case 'testimonials':
                    case 'tooltip':
                    case 'twitter_follow_button':
                    case 'youtube_embeds':

                        ajaxRequestShortcodeClick(value);

                        break;

                    case 'clear':
                    case 'space':

                        insertIntoPost('[mstoic_shortcode_'+ value +']', 'TRUE');

                        break;

                    default:

                        break;

                }
            }

            var list = [],
                optionsArray = '';
            function mstoicShortcodeFunction() {

                list = [
                    ['counters',                'Counters',                     'Add counters, which animate when they come in view.'],
                    ['fb_like_button',          'Facebook Like Button',         'Add a Facebook like button to your content.'],
                    ['twitter_follow_button',   'Twitter Follow Button',        'Add a Twitter Follow button ito your content.'],
                    ['images',                  'Images',                       'Add images in your content.'],
                    ['clear',                   'Clear',                        'Clears Floating Elements.'],
                    ['space',                   'Spacing',                      'Clears Floating Elements And Gives Some Spacing.'],
                    ['buttons',                 'Buttons',                      'Add custom buttons with optional icons.'],
                    ['slider_images',           'Slider Images',                'Add a slider with images.'],
                    ['testimonials',            'Testimonials',                 'Display testimonials beautifully.'],
                    ['google_maps',             'Google Maps',                  'Show a Google Map.'],
                    ['youtube_embeds',          'YouTube Embeds',               'Embed YouTube videos with many options to choose from.'],
                    ['expendable_box',          'Expandable Box',               'Completely customizable box that exands and collapses.'],
                    ['box_heading_icon',        'Box with Heading and Icon',    'Add a box to your content with a heading and an icon.'],
                    ['tooltip',                 'Tooltip',                      'Add a tooltip to you content.'],
                    ['related_posts',            'Related Posts With Pics',      'Display Related Posts With Featured Images.'],
                ];

                optionsArray = '';

                $(list).each(function (index, element) {
                    optionsArray +=
                        '<div class="shortcode '+element[0]+'" data-value="' + element[0] + '">'+
                            '<div class="outer">' +
                                '<span class="title">' + element[1] + '</span>' +
                                '<span class="info">' + element[2] + '</span>' +
                            '</div>' +
                        '</div>';
                });

                optionsArray = '<div class="shortcodes-list">' + optionsArray + '</div>';

                NewModalBox(optionsArray);

            }

            ed.addButton('mstoicShortcodes', {
                title: 'Mstoic Shortcodes',
                cmd: 'mstoicShortcodes',
                image: url + '/mstoic.png'
            });

            ed.addCommand('mstoicShortcodes', function() {
                mstoicShortcodeFunction();
            });

            jQuery(document).off('click', '.ms-home').on('click', '.ms-home', function () {
                mstoicShortcodeFunction();
            });

        },

        getInfo: function () {
            return {
                longname: 'Mstoic Shortcodes',
                author: 'Hemant Aggarwal',
                authorurl: 'http://www.hemantaggarwal.com',
                infourl: 'http://www.mstoicthemes.com',
                version: "1.0"
            };
        }
    });

    tinymce.PluginManager.add('mstoicShortcodes', tinymce.plugins.MstoicShortcodes);

})(jQuery);