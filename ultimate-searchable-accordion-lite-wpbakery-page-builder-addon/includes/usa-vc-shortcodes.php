<?php


//Main Accordion Block

function cb_usa_vc_container($atts, $content)
{

    wp_enqueue_script('usa-vc-bwlaccordion-script');

    $atts = shortcode_atts([
        'id' => wp_rand(),
        'status' => 1,
        'search' => false,
        'placeholder' => 'Search .....',
        'theme' => 'default',
        'title_bg' => '#2C2C2C', // accordion heading background
        'title_text_color' => '#FFFFFF', // accordion heading text color
        'nav_box_bg' => '#B8B831',  // accordion heading nagivation background
        'title_active_bg' => '#414141', // Active accordion bar heading background
        'title_active_text_color' => '#F0F0F0', // Active accordion heading tex color
        'nav_active_box_bg' => '#D0D051', // Active accordion heading nagivation background
        'title_tag' => 'h2',
        'title_icon' => '',
        'tt_font_size' => "15", // title_tag_font_size
        'animate' => 'slide', // flash/shake/tada/swing/wobble/pulse/flipx/faderight/fadeleft/slide/slideup/bounce/lightspeed/roll/rotate/fade/none,
        'rtl' => false,
        'msg_item_found' => 'Item(s) Found !',
        'msg_no_result' => 'Nothing Found !',
        'ctrl_btn' => false, //Display expand all/ collapse all button.
        'toggle' => false, //Turn it on, If you want to open only one section and keep other section collapsed.
        'closeall' => true, // Closed all the section on initialization( Added in version 1.0.3),
        'item_opened' => 0, // Default: 0. You can set all, odd, even and custom rows opened. (Added in version 1.0.4)
        'custom_item_opened_rows' => '0', // Default value : 0. You can set mutliple items opend in a accordion. Example: Set 0,3 & it will opened first and fourth row of accordion.
        'nav_box' => '', // cross/square/arrow/circle (default' => cross)
        'nav_icon' => '', // plus/angle/angle_double/angle_caret/angle_chevron (default: plus)
        'highlight_bg' => '#FFFF80',
        'highlight_color' => '#000000',
        'content_bg' => '',
        'content_text_color' => '',
        'content_link_color' => '',
        'content_link_hover_color' => '',
        'limit' => 5,
        'suggestion_box' => FALSE,
        'sbox_title' => esc_html__('Your KeyWords: ', 'usa_vc'),
        'sbox_keywords' => 'faq, offer, exclusive, free, get',
        'custom_acc_class' => '',
        'nav_right' => 0,
        'query_string' => 0
    ], $atts);

    extract($atts);

    // Added In Version 1.1.1
    $nav_right = (isset($nav_right) && $nav_right == 1) ? 'nav_pos_right' : '';


    // Added In Version 1.0.4

    if (isset($closeall) && $closeall == 0 && $item_opened == "custom_item_opened") {
        $item_opened = '[' . $custom_item_opened_rows . ']';
    }

    $bsa_accordion_random_id = $id;

    // One more checking about parameters.

    $highlight_bg = (isset($highlight_bg) && $highlight_bg != "") ? $highlight_bg : '#FFFF80';
    $highlight_color = (isset($highlight_color) && $highlight_color != "") ? $highlight_color : '#000000';

    $content_bg = (isset($content_bg) && $content_bg != "") ? $content_bg : "";
    $content_text_color = (isset($content_text_color) && $content_text_color != "") ? $content_text_color :  "";

    $content_link_color = (isset($content_link_color) && $content_link_color != "") ? $content_link_color : "";
    $content_link_hover_color = (isset($content_link_hover_color) && $content_link_hover_color != "") ? $content_link_hover_color :  "";

    // Extra Class.
    // Added in version 1.0.5

    $bwl_acc_container_class = (isset($custom_acc_class) && trim($custom_acc_class) != "") ? 'bwl_acc_container ' . $custom_acc_class : 'bwl_acc_container';


    $bsa_vc_content = '<div class="' . $bwl_acc_container_class . '" id="accordion_' . $bsa_accordion_random_id . '" data-search="' . $search . '" data-placeholder="' . $placeholder . '" data-theme="' . $theme . '" data-title_bg="' . $title_bg . '" data-title_text_color="' . $title_text_color . '" data-nav_box_bg="' . $nav_box_bg . '" data-title_active_bg="' . $title_active_bg . '" data-title_active_text_color="' . $title_active_text_color . '" data-nav_active_box_bg="' . $nav_active_box_bg . '" data-animate="' . $animate . '" data-rtl="' . $rtl . '" data-msg_item_found=" ' . $msg_item_found . '" data-msg_no_result="' . $msg_no_result . '" data-ctrl_btn="' . $ctrl_btn . '" data-toggle="' . $toggle . '" data-closeall="' . $closeall . '" data-item_opened="' . $item_opened . '" data-nav_box="' . $nav_box . '" data-nav_icon="' . $nav_icon . '" data-highlight_bg="' . $highlight_bg . '" data-highlight_color="' . $highlight_color . '" data-content_bg="' . $content_bg . '" data-content_text_color="' . $content_text_color . '" data-content_link_color="' . $content_link_color . '" data-content_link_hover_color="' . $content_link_hover_color . '"  data-limit="' . $limit . '" data-nav_right="' . $nav_right . '" data-suggestion_box="' . $suggestion_box . '" data-sbox_title="' . $sbox_title . '" data-sbox_keywords="' . $sbox_keywords . '" data-query_string="' . $query_string . '">';

    $bsa_search_string = "";

    if ($search == TRUE) {

        $bsa_search_string .= '<div class="accordion_search_container">
                                            <input type="text" aria-label="Search" class="accordion_search_input_box search_icon" value="" placeholder="' . $placeholder . '"/>
                                        </div>
                                    <div class="search_result_container"></div>';
    }

    $bsa_vc_content .= $bsa_search_string;

    $content = str_replace('[usa_item', '[usa_item content_bg="' . $content_bg . '"  content_text_color="' . $content_text_color . '" title_tag="' . $title_tag . '"  tt_font_size="' . $tt_font_size . '"', $content);

    // Extra Filters for the shortcode.

    $content = str_replace("usa_item", "usa_vc_item", $content);

    $bsa_vc_content .= do_shortcode($content);

    $bsa_vc_content .= '</div>';

    return $bsa_vc_content;
}

// Generate Each Accordion Block.

function cb_usa_vc_item($atts, $content)
{

    $atts = shortcode_atts([
        'acc_title' => '',
        'content_bg' => '',
        'content_text_color' => '',
        'title_tag' => 'h2',
        'title_icon' => '',
        'title_icon_class' => '',
        'tt_font_size' => "15", // title_tag_font_size
    ], $atts);

    extract($atts);

    //Custom Title Tag
    $title_tag = (isset($title_tag) && $title_tag != "") ? $title_tag : 'h2';

    // Custom Title Font Size
    $custom_title_style = "";

    if (isset($tt_font_size) && $tt_font_size != "") {
        $custom_title_style .= ' style="font-size: ' . $tt_font_size . 'px; !important"';
    }

    // Custom Title Font Size
    $custom_content_bg = ' style="';

    if (isset($content_bg) && $content_bg != "" && $content_bg != "#FBFBFB") {
        $custom_content_bg .= ' background: ' . $content_bg . ';';
    }

    if (isset($content_text_color) && $content_text_color != "" && $content_text_color != "#666666") {
        $custom_content_bg .= ' color: ' . $content_text_color . ';';
    }

    $custom_content_bg .= '"';


    /*-- Icon Pack --*/

    $icon_class = "";

    $title_icon = (isset($title_icon_class) && $title_icon_class != "") ? $title_icon_class : $title_icon;

    if (isset($title_icon) && $title_icon != "") {
        $icon_class .= 'class="title_icon"';
        $acc_title = '<i class="' . $title_icon . '"></i> <span>' . $acc_title . '</span>';
    }

    $bsa_vc_content = '<section>
                                        <' . $title_tag . ' class="acc_title_bar"><a href="#" ' . $icon_class . '' . $custom_title_style . '>' . $acc_title . '</a></' . $title_tag . '>
                                        <div class="acc_container"' . $custom_content_bg . '>
                                            <div class="block">
                                                ' . do_shortcode(wpautop($content)) . '
                                            </div>
                                        </div>
                                    </section>';

    return $bsa_vc_content;
}

function usa_vc_clean_shortcodes($content)
{

    $array = [
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    ];
    $content = strtr($content, $array);

    $content = str_replace("usa_container", "usa_vc_container", $content);

    return $content;
}

add_filter('the_content', 'usa_vc_clean_shortcodes', 1);