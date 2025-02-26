<style type="text/css">
    <?php $wrap = apg_wrap_options(); ?>

    #apg-wrap {
        background-color: <?php echo ($wrap['bgt'] == 1) ? 'transparent' : esc_html($wrap['bg']); ?>;
        padding-top: <?php esc_html_e($wrap['pt'] . 'px'); ?>;
        padding-right: <?php esc_html_e($wrap['pr'] . 'px'); ?>;
        padding-left: <?php esc_html_e($wrap['pl'] . 'px'); ?>;
        padding-bottom: <?php esc_html_e($wrap['pb'] . 'px'); ?>;
    }

    #apg-wrap > div:first-child {
        width: 100%;
        float: left;
    }

    <?php $gap = apg_posts_gap_options(); ?>

    #apg-wrap > div > div {
        margin-top: <?php echo ($gap == 'none') ? '0' : - esc_html($gap) . 'px'; ?>;
        margin-left: <?php echo ($gap == 'none') ? '0' : - esc_html($gap) . 'px'; ?>;
    }

    #apg-wrap [class*=col-] {
        padding-top: <?php echo ($gap == 'none') ? '0' : esc_html($gap) . 'px'; ?>;
        padding-left: <?php echo ($gap == 'none') ? '0' : esc_html($gap) . 'px'; ?>;
    }

    <?php
    $card = apg_post_card_options();
    $x = $card['x'] . 'px ';
    $y = $card['y'] . 'px ';
    $blur = $card['blur'] . 'px ';
    $spread = $card['spread'] . 'px ';
    $color = $card['color'];
    ?>

    #apg-wrap .apg-card {
        background-color: <?php echo ($card['bgt']) ? 'transparent' : esc_html($card['bg']); ?>;
        height: <?php esc_html_e($card['height']); ?>;
        padding-top: <?php esc_html_e($card['pt'] . 'px'); ?>;
        padding-right: <?php esc_html_e($card['pr'] . 'px'); ?>;
        padding-left: <?php esc_html_e($card['pl'] . 'px'); ?>;
        padding-bottom: <?php esc_html_e($card['pb'] . 'px'); ?>;
        border-top: <?php esc_html_e($card['border_top'] . 'px'); ?> solid;
        border-right: <?php esc_html_e($card['border_right'] . 'px'); ?> solid;
        border-left: <?php esc_html_e($card['border_left'] . 'px'); ?> solid;
        border-bottom: <?php esc_html_e($card['border_bottom'] . 'px'); ?> solid;
        border-color: <?php esc_html_e($card['bc']); ?>;
        border-radius: <?php esc_html_e($card['br'] . 'px'); ?>;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        box-shadow: <?php esc_html_e($x . $y . $blur . $spread . $color); ?>;
    }

    #apg-wrap .apg-card a {
        text-decoration: none;
    }

    <?php $image = apg_post_image_options(); ?>

    <?php if ($image['display']): ?>
        <?php if ($image['height'] == 'equal'): ?>
            .apg-image {
                height: <?php esc_html_e($image['equal_size'] . 'px'); ?>;
                background-size: cover;
                background-position: center;
                border-radius: <?php esc_html_e($image['br'] . 'px'); ?>;
            }
        <?php else: ?>
            .apg-image {
                width: 100%;
                display: block;
                border-radius: <?php esc_html_e($image['br'] . 'px'); ?>;
            }
        <?php endif; ?>
    <?php endif; ?>

    <?php $avatar = apg_avatar_options(); ?>

    <?php if ($avatar['display']): ?>
        <?php $header = apg_post_header_options(); ?>

        #apg-wrap .apg-header {
            background-color: <?php echo ($header['bgt']) ? 'transparent' : esc_html($header['bg']); ?>;
            padding-top: <?php esc_html_e($header['pt'] . 'px'); ?>;
            padding-right: <?php esc_html_e($header['pr'] . 'px'); ?>;
            padding-left: <?php esc_html_e($header['pl'] . 'px'); ?>;
            padding-bottom: <?php esc_html_e($header['pb'] . 'px'); ?>;
            text-align: <?php esc_html_e($avatar['align']); ?>;
        }

        #apg-wrap .apg-avatar {
            width: <?php esc_html_e($avatar['size'] . 'px'); ?>;
            height: <?php esc_html_e($avatar['size'] . 'px'); ?>;
            margin-top: <?php esc_html_e($avatar['mt'] . 'px'); ?>;
            margin-right: <?php esc_html_e($avatar['mr'] . 'px'); ?>;
            margin-left: <?php esc_html_e($avatar['ml'] . 'px'); ?>;
            margin-bottom: <?php esc_html_e($avatar['mb'] . 'px'); ?>;
            vertical-align: middle;
            border-radius: <?php esc_html_e($avatar['br'] . 'px'); ?>;
        }
    <?php endif; ?>

    <?php $content = apg_post_content_options(); ?>

    #apg-wrap .apg-content {
        background-color: <?php echo ($content['bgt']) ? 'transparent' : esc_html($content['bg']); ?>;
        height: 100%;
        padding-top: <?php esc_html_e($content['pt'] . 'px'); ?>;
        padding-right: <?php esc_html_e($content['pr'] . 'px'); ?>;
        padding-left: <?php esc_html_e($content['pl'] . 'px'); ?>;
        padding-bottom: <?php esc_html_e($content['pb'] . 'px'); ?>;
        display: flex;
        flex-direction: column;
    }

    <?php $cat = apg_category_options(); ?>

    <?php if ($cat['display']): ?>
        #apg-wrap .apg-category {
            margin-top: <?php echo $cat['mta'] ? 'auto' : esc_html($cat['mt'] . 'px'); ?>;
            margin-bottom: <?php echo $cat['mba'] ? 'auto' : esc_html($cat['mb'] . 'px'); ?>;
            text-align: <?php esc_html_e($cat['align']); ?>;
            order: <?php esc_html_e($content['cat_order']); ?>;
        }

        <?php if (empty($cat['sep'])): ?>
            #apg-wrap .apg-category ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            #apg-wrap .apg-category li {
                margin-right: 2px;
                display: inline-block;
            }
        <?php endif; ?>

        #apg-wrap .apg-category a {
            background-color: <?php echo $cat['bgt'] ? 'transparent' : esc_html($cat['bg']); ?>;
            padding: <?php esc_html_e($cat['py'] . 'px ' . $cat['px'] . 'px'); ?>;
            display: inline-block;
            color: <?php esc_html_e($cat['color']); ?>;
            font-size: <?php esc_html_e($cat['font_size'] . 'px'); ?>;
            border-radius: <?php esc_html_e($cat['br'] . 'px'); ?>;
        }

        <?php if (!empty($cat['sep'])): ?>
            #apg-wrap .apg-category span {
                margin: 0 5px;
                color: <?php esc_html_e($cat['sep_color']); ?>;
            }
        <?php endif; ?>
    <?php endif; ?>

    <?php $title = apg_title_options(); ?>

    #apg-wrap .apg-title {
        margin-top: <?php echo $title['mta'] ? 'auto' : esc_html($title['mt']) . 'px'; ?>;
        margin-bottom: <?php echo $title['mba'] ? 'auto' : esc_html($title['mb']) . 'px'; ?>;
        text-align: <?php esc_html_e($title['align']); ?>;
        order: <?php esc_html_e($content['title_order']); ?>;
    }

    #apg-wrap .apg-title h2 {
        margin: 0;
        color: <?php esc_html_e($title['color']); ?>;
        font-size: <?php esc_html_e($title['font_size'] . 'px'); ?>;
        font-weight: <?php esc_html_e($title['font_weight']); ?>;
    }

    <?php $excerpt = apg_excerpt_options(); ?>

    <?php if ($excerpt['display']): ?>
        #apg-wrap .apg-excerpt {
            margin-top: <?php  echo $excerpt['mta'] ? 'auto' : esc_html($excerpt['mt']) . 'px'; ?>;
            margin-bottom: <?php  echo $excerpt['mba'] ? 'auto' : esc_html($excerpt['mb']) . 'px'; ?>;
            color: <?php esc_html_e($excerpt['color']); ?>;
            text-align: <?php esc_html_e($excerpt['align']); ?>;
            font-size: <?php esc_html_e($excerpt['font_size'] . 'px'); ?>;
            order: <?php esc_html_e($content['exc_order']); ?>;
        }

        #apg-wrap .apg-excerpt p {
            margin: 0;
        }
    <?php endif; ?>

    <?php $more = apg_read_more_options(); ?>

    <?php if ($more['display']): ?>
        #apg-wrap .apg-more-wrap {
            margin-top: <?php echo $more['mta'] ? 'auto' : esc_html($more['mt']) . 'px'; ?>;
            margin-bottom: <?php echo $more['mba'] ? 'auto' : esc_html($more['mb']) . 'px'; ?>;
            text-align: <?php esc_html_e($more['align']); ?>;
            order: <?php esc_html_e($content['more_order']); ?>;
        }

        #apg-wrap .apg-more {
            width: <?php echo $more['full'] ?  '100%' : 'auto'; ?>;
            background-color: <?php echo $more['bgt'] ? 'transparent' : esc_html($more['bg']); ?>;
            padding: <?php echo $more['py'] . 'px ' . esc_html($more['px']) . 'px'?>;
            color: <?php esc_html_e($more['color']); ?>;
            font-size: <?php esc_html_e($more['font_size'] . 'px'); ?>;
            border: <?php esc_html_e($more['bw'] . 'px solid ' . $more['bc']); ?>;
            border-radius: <?php esc_html_e($more['br'] . 'px'); ?>;
            cursor: pointer;
        }
    <?php endif; ?>

    <?php $footer = apg_footer_options(); ?>

    <?php if ($footer['footer_display']): ?>
        #apg-wrap .apg-footer {
            background-color: <?php echo ($footer['bgt']) ? 'transparent' : esc_html($footer['bg']); ?>;
            margin-top: auto;
            padding-top:  <?php esc_html_e($footer['pt'] . 'px'); ?>;
            padding-right: <?php esc_html_e($footer['pr'] . 'px'); ?>;
            padding-left: <?php esc_html_e($footer['pl'] . 'px'); ?>;
            padding-bottom: <?php esc_html_e($footer['pb'] . 'px'); ?>;
            color: <?php esc_html_e($footer['text_color']); ?>;
            text-align: <?php esc_html_e($footer['text_align']); ?>;
            font-size: <?php esc_html_e($footer['font_size'] . 'px'); ?>;
            border-top: <?php esc_html_e($footer['bw'] . 'px' . ' solid ' . $footer['bc']); ?>;
        }

        #apg-wrap .apg-footer span {
            <?php
            if ($footer['text_align'] == 'right') {
                $margin = 'margin-left: 10px;';
            } elseif ($footer['text_align'] == 'center') {
                $margin = 'margin: 0 5px;';
            } else {
                $margin = 'margin-right: 10px;';
            }

            esc_html_e($margin);
            ?>
        }
    <?php endif; ?>

    <?php $pw = apg_pagination_options('pw'); ?>

    <?php if ($pw['display']): ?>
        #apg-wrap #apg-pagination {
            background-color: <?php echo ($pw['bgt']) ? 'transparent' : esc_html($pw['bg']); ?>;
            margin-top: <?php esc_html_e($pw['mt'] . 'px'); ?>;
            margin-bottom: <?php esc_html_e($pw['mb'] . 'px'); ?>;
            padding-top: <?php esc_html_e($pw['pt'] . 'px'); ?>;
            padding-right: <?php esc_html_e($pw['pr'] . 'px'); ?>;
            padding-left: <?php esc_html_e($pw['pl'] . 'px'); ?>;
            padding-bottom: <?php esc_html_e($pw['pb'] . 'px'); ?>;
            text-align: <?php esc_html_e($pw['align']); ?>;
            border-radius: <?php esc_html_e($pw['br'] . 'px'); ?>;
        }

        #apg-wrap #apg-pagination a {
            text-decoration: none;
        }

        <?php $ppn = apg_pagination_options('ppn'); ?>

        <?php if ($ppn['display']): ?>
            #apg-wrap #apg-pagination .prev,
            #apg-wrap #apg-pagination .next {
                background-color: <?php echo ($ppn['bgt']) ? 'transparent' : esc_html($ppn['bg']); ?>;
                padding: <?php esc_html_e($ppn['py'] . 'px ' . $ppn['px'] . 'px'); ?>;
                color: <?php esc_html_e($ppn['color']); ?>;
                font-size: <?php esc_html_e($ppn['font_size'] . 'px'); ?>;
                display: inline-block;
                border-radius: <?php esc_html_e($ppn['br'] . 'px'); ?>;
            }
        <?php endif; ?>

        <?php $pd = apg_pagination_options('pd'); ?>

        #apg-wrap #apg-pagination .dots {
            background-color: <?php echo ($pd['bgt']) ? 'transparent' : esc_html($pd['bg']); ?>;
            padding: <?php esc_html_e($pd['py'] . 'px ' . $pd['px'] . 'px'); ?>;
            color: <?php esc_html_e($pd['color']); ?>;
            display: <?php echo ($pd['display']) ? 'inline-block' : 'none'; ?>;
            border-radius: <?php esc_html_e($pd['br'] . 'px'); ?>;
        }

        <?php $pn = apg_pagination_options('pn'); ?>

        #apg-wrap #apg-pagination .page-numbers:not(.dots):not(.prev):not(.next) {
            background-color: <?php echo ($pn['bgt']) ? 'transparent' : esc_html($pn['bg']); ?>;
            padding: <?php esc_html_e($pn['py'] . 'px ' . $pn['px'] . 'px'); ?>;
            color: <?php esc_html_e($pn['color']); ?>;
            font-size: <?php esc_html_e($ppn['font_size'] . 'px'); ?>;
            display: inline-block;
            border-radius: <?php esc_html_e($pn['br'] . 'px'); ?>;
        }

        <?php $pc = apg_pagination_options('pc'); ?>

        #apg-wrap #apg-pagination .current {
            background-color: <?php echo ($pc['bgt']) ? 'transparent' : esc_html($pc['bg']); ?> !important;
            color: <?php esc_html_e($pc['color']); ?> !important;
        }
    <?php endif; ?>

    #apg-no-result {
        background-color: #ffffff;
        padding: 20px 40px;
    }

    #apg-wrap .apg-clear {
        clear: both;
    }
</style>