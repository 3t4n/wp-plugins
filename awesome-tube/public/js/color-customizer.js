/*
 *
 *	Live Customiser Script
 *	------------------------------------------------
 *	Themes Awesome Framework
 * 	Copyright Awetube 2021 - http://www.themesawesome.com
 *
 */
(function($) {

    'use strict';

    /* ======================== CUSTOMIZER OPTIONS ======================== */

    // Single Video
    wp.customize('single_video_title', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .video-meta .title a').css('color', to ? to : '');
        });
    });

    wp.customize('single_border_color', function(value) {
        value.bind(function(to) {
            $('.video-content-bottom, .single-video-wrap .video-author-info, .related-video-wrapper').css('border-top-color', to ? to : '');
        });
    });

    wp.customize('single_video_share_text', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .video-content-bottom .share-video span, .single-video-wrap .cat-wrapper').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_share_icon_bg_color', function(value) {
        value.bind(function(to) {
            $('.share-video ul li a').css('background', to ? to : '');
        });
    });

    wp.customize('single_video_share_icon_color', function(value) {
        value.bind(function(to) {
            $('.share-video ul li a').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_share_icon_bg_color_hover', function(value) {
        value.bind(function(to) {
            $('.share-video ul li a:hover').css('background', to ? to : '');
        });
    });

    wp.customize('single_video_share_icon_color_hover', function(value) {
        value.bind(function(to) {
            $('.share-video ul li a:hover').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_name_author', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .video-author-info .vcard a').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_date_time', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .video-meta .time').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_content_color', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .inner-content-video p').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_tag_color', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .cat-wrapper a').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_tag_color_hover', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .cat-wrapper a:hover').css('color', to ? to : '');
        });
    });

    wp.customize('single_video_content_show', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .show-more-btn').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_title', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item .item-wrap h4 a').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_title_hover', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item:hover h4 a').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_author', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item span.vcard a').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_date', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap .views-video span').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_icon_hover', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .vidio-style2 .button-hover i').css('color', to ? to : '');
        });
    });

    wp.customize('single_related_icon_bg_hover', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .vidio-style2 .button-hover i').css('background', to ? to : '');
        });
    });

    wp.customize('single_related_overlay_bg_hover', function(value) {
        value.bind(function(to) {
            $('.single-video-wrap.blog-single .overlay-vidio-style2').css('background-color', to ? to : '');
        });
    });



})(jQuery);