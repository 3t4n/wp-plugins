<?php
function apg_general_options()
{
    $default = array(
        'post_type' => 'post',
        'posts_num' => 12,
    );

    return wp_parse_args(get_option('apg_post_general'), $default);
}

function apg_wrap_options()
{
    $post_wrap_default = array(
        'bgt' => true,
        'bg' => '#ffffff',
        'pt' => '0',
        'pr' => '0',
        'pb' => '0',
        'pl' => '0',
    );

    return wp_parse_args(get_option('apg_post_wrap'), $post_wrap_default);
}

function apg_posts_gap_options()
{
    return get_option('apg_posts_gap', '20');
}

function apg_post_columns_options()
{
    $default = array(
        'sm' => '6',
        'md' => '4',
        'lg' => '3',
        'xl' => '3'
    );

    return wp_parse_args(get_option('apg_posts_column'), $default);
}

function apg_post_card_options()
{
    $default = array(
        'bgt' => false,
        'bg' => '#ffffff',
        'height' => '100%',
        'pt' => '0',
        'pr' => '0',
        'pb' => '0',
        'pl' => '0',
        'border_top' => '0',
        'border_right' => '0',
        'border_bottom' => '0',
        'border_left' => '0',
        'bc' => '#eaeaea',
        'br' => '10',
        'x' => '0',
        'y' => '0',
        'blur' => '20',
        'spread' => '0',
        'color' => '#cccccc',
    );

    return wp_parse_args(get_option('apg_post_card'), $default);
}

function apg_post_image_options()
{
    $post_image_default = array(
        'display' => true,
        'size' => 'medium',
        'height' => 'equal',
        'equal_size' => '250',
        'br' => '0'
    );

    return wp_parse_args(get_option('apg_post_image'), $post_image_default);
}

function apg_post_header_options()
{
    $post_header_default = array(
        'bgt' => true,
        'bg' => '#ffffff',
        'pt' => '15',
        'pr' => '20',
        'pb' => '0',
        'pl' => '20'
    );

    return wp_parse_args(get_option('apg_post_header'), $post_header_default);
}

function apg_avatar_options()
{
    $post_avatar_default = array(
        'display' => true,
        'size' => '40',
        'mt' => '0',
        'mr' => '0',
        'mb' => '0',
        'ml' => '0',
        'br' => '40',
        'align' => 'left'
    );

    return wp_parse_args(get_option('apg_post_avatar'), $post_avatar_default);
}

function apg_post_content_options()
{
    $post_content_default = array(
        'bgt' => true,
        'bg' => '#ffffff',
        'pt' => '20',
        'pr' => '20',
        'pb' => '20',
        'pl' => '20',
        'cat_order' => '1',
        'title_order' => '2',
        'exc_order' => '3',
        'more_order' => '4',
    );

    return wp_parse_args(get_option('apg_post_content'), $post_content_default);
}

function apg_category_options()
{
    $cat_default = array(
        'display' => true,
        'bgt' => true,
        'bg' => '#ffffff',
        'mt' => '0',
        'mta' => false,
        'mb' => '0',
        'mba' => false,
        'py' => '0',
        'px' => '0',
        'align' => 'left',
        'color' => '#ef6628',
        'font_size' => '14',
        'br' => '0',
        'sep' => '|',
        'sep_color' => '#606060'
    );

    return wp_parse_args(get_option('apg_post_cat'), $cat_default);
}

function apg_title_options()
{
    $post_title_default = array(
        'display' => true,
        'mt' => '10',
        'mta' => false,
        'mb' => '0',
        'mba' => false,
        'color' => '#606060',
        'align' => 'left',
        'font_size' => '20',
        'font_weight' => 'bold',
    );

    return wp_parse_args(get_option('apg_post_title'), $post_title_default);
}

function apg_excerpt_options()
{
    $post_excerpt_default = array(
        'display' => true,
        'words_limit' => 12,
        'mt' => '10',
        'mta' => false,
        'mb' => '20',
        'mba' => false,
        'color' => '#606060',
        'align' => 'left',
        'font_size' => '16',
    );

    return wp_parse_args(get_option('apg_post_excerpt'), $post_excerpt_default);
}

function apg_read_more_options()
{
    $more_default = array(
        'display' => true,
        'text' => __('read more', 'arvand-posts'),
        'bgt' => false,
        'bg' => '#ef6628',
        'full' => false,
        'mt' => '0',
        'mta' => true,
        'mb' => '0',
        'mba' => false,
        'py' => '5',
        'px' => '10',
        'color' => '#ffffff',
        'align' => 'left',
        'font_size' => '14',
        'bw' => '0',
        'bc' => '#000000',
        'br' => '5',
    );

    return wp_parse_args(get_option('apg_post_more'), $more_default);
}

function apg_footer_options()
{
    $post_footer_default = array(
        'footer_display' => true,
        'author_display' => true,
        'date_display' => true,
        'bgt' => true,
        'bg' => '#ffffff',
        'pt' => '15',
        'pr' => '20',
        'pb' => '15',
        'pl' => '20',
        'text_color' => '#606060',
        'text_align' => 'left',
        'font_size' => '14',
        'bw' => '1',
        'bc' => '#eaeaea'
    );

    return wp_parse_args(get_option('apg_post_footer'), $post_footer_default);
}

function apg_pagination_options($options)
{
    $options_array = array();

    $pw_default = array(
        'display' => true,
        'bgt' => true,
        'bg' => '#ffffff',
        'mt' => '20',
        'mb' => '20',
        'pt' => '0',
        'pr' => '0',
        'pb' => '0',
        'pl' => '0',
        'align' => 'center',
        'br' => '0'
    );

    $options_array['pw'] = wp_parse_args(get_option('apg_posts_p_wrap'), $pw_default);

    $ppn_default = array(
        'display' => true,
        'prev_text' => __('previous', 'arvand-posts'),
        'next_text' => __('next', 'arvand-posts'),
        'bgt' => false,
        'bg' => '#ffffff',
        'py' => '5',
        'px' => '10',
        'color' => '#606060',
        'font_size' => '16',
        'br' => '5'
    );

    $options_array['ppn'] = wp_parse_args(get_option('apg_posts_ppn'), $ppn_default);

    $pn_default = array(
        'display' => true,
        'bgt' => false,
        'bg' => '#ffffff',
        'py' => '5',
        'px' => '10',
        'color' => '#606060',
        'font_size' => '16',
        'br' => '5'
    );

    $options_array['pn'] = wp_parse_args(get_option('apg_posts_p_numbers'), $pn_default);

    $pd_default = array(
        'display' => true,
        'bgt' => true,
        'bg' => '#ffffff',
        'py' => '0',
        'px' => '0',
        'color' => '#606060',
        'br' => '5'
    );

    $options_array['pd'] = wp_parse_args(get_option('apg_posts_p_dots'), $pd_default);

    $pc_default = array(
        'bgt' => false,
        'bg' => '#ef6628',
        'color' => '#ffffff',
    );

    $options_array['pc'] = wp_parse_args(get_option('apg_posts_p_current'), $pc_default);

    return $options_array[$options];
}