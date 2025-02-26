<?php
anc_6310_check_field_exists();
anc_6310_version_status();
global $wpdb;
$style_table = $wpdb->prefix . 'anc_6310_style';
$icon_table = $wpdb->prefix . 'anc_6310_icons';
$counter_table = $wpdb->prefix . 'anc_6310_counter';

$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
if(!$styledata || $styledata == '') return;
$template_name = $styledata['style_name'];
$allowed_templates = [];
for ($i = 1; $i <= 30; $i++) {
    $allowed_templates[] = sprintf('counter-%02d', $i);
}
if (!in_array($template_name, $allowed_templates)) {
    die('Invalid template selected.');
}

$template_path = realpath(anc_6310_plugin_url . 'output/' . $template_name . '.php');
$allowed_path = realpath(anc_6310_plugin_url . 'output/');

// Ensure the resolved path is within the allowed directory
if (strpos($template_path, $allowed_path) !== 0 || !file_exists($template_path)) {
    echo "<p>This template is only available on the pro version.</p>";
    return;
} else{
    $css = explode("!!##!!", $styledata['css']);
    $key = explode(",", $css[0]);
    $value = explode("||##||", $css[1]);

    $cssData = array_combine($key, $value);
    $counter_order  = explode(",", $styledata['counterids']);

    $allCounters = array();
    if ($counter_order) {
        foreach ($counter_order as $cid) {
            if ($cid != '') {
                $results = $wpdb->get_row("SELECT * FROM $counter_table WHERE id={$cid}", ARRAY_A);
                if ($results) {
                    $allCounters[] = $results;
                }
            }
        }
    }

    $fonts = "";
    if (isset($cssData['title_font_family']) && $cssData['title_font_family']) {
        $fonts = esc_attr($cssData['title_font_family']);
    }
    if (isset($cssData['description_font_family']) && $cssData['description_font_family']) {
        $fonts .= "|" . esc_attr($cssData['description_font_family']);
    }
    if (isset($cssData['number_font_family']) && $cssData['number_font_family']) {
        $fonts .= "|" . esc_attr($cssData['number_font_family']);
    }
    if (isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family']) {
        $fonts .= "|" . esc_attr($cssData['number_prefix_font_family']);
    }
    if (isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family']) {
        $fonts .= "|" . esc_attr($cssData['number_suffix_font_family']);
    }
    if (isset($cssData['button_font_family']) && $cssData['button_font_family']) {
        $fonts .= "|" . esc_attr($cssData['button_font_family']);
    }

    wp_enqueue_style('anc-6310-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
    wp_enqueue_style('anc-6310-common-output-css', plugins_url('output/css/common-output.css', __FILE__));
    wp_enqueue_style('anc-6310-font-awesome-4-07', plugins_url('assets/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style("anc-6310-googlesss-font-" . esc_attr($ids), "https://fonts.googleapis.com/css?family=" . esc_attr($fonts));

    echo "<div class='anc_6310_main_counter'>";
    include anc_6310_plugin_url . "output/".esc_attr($template_name) . ".php";
    echo "</div>";

    if ($cssData['custom_css']) {
        $safe_css = wp_strip_all_tags($cssData['custom_css']);
        echo "<style type='text/css'>" . esc_attr($safe_css) . "</style>";
    }
}