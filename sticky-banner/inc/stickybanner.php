<?php
$bgColour        = esc_attr(get_option('hdsb_stickybanner_colour', '#ffffff')); // Default white background
$textColour      = esc_attr(get_option('hdsb_stickybanner_text_colour', '#000000')); // Default black text
$text            = esc_html(get_option('hdsb_stickybanner_text'));
$sb_position     = esc_attr(get_option('hdsb_stickybanner_position', 'bottom')); // Default position
$btnText         = esc_attr(get_option('hdsb_stickybanner_btn_text', 'Learn more'));
$btnLink         = esc_url(get_option('hdsb_stickybanner_btn_link'));
$sb_cookieExpiry = esc_attr(get_option('hdsb_stickybanner_cookie_expiry', '7')); // Default 7 days

$currentPage = get_the_ID();
$hidePages    = esc_attr(get_option('hdsb_stickybanner_hide_on_pages', ''));
$hidePagesArray = array_map('trim', explode(',', $hidePages));

// Check if the current page is not in the list of pages where the banner should be hidden
if (!in_array($currentPage, $hidePagesArray) && !empty($text)) {
?>
    <div id="hdsb-stickybanner" class="hdsb-stickybanner hdsb-stickybanner-<?php echo esc_attr($sb_position); ?>" style="background-color: <?php echo esc_attr($bgColour); ?>; color: <?php echo esc_attr($textColour); ?>;">
        <span class="hdsb-stickybanner-text"><?php echo esc_html($text); ?></span>
        <?php if (!empty($btnLink)) : ?>
            <a class="hdsb-stickybanner-btn" href="<?php echo esc_url($btnLink); ?>" style="color: <?php echo esc_attr($textColour); ?>">
                <?php echo !empty($btnText) ? esc_html($btnText) : 'Learn more'; ?>
            </a>
        <?php endif; ?>
        <div class="hdsb-stickybanner-close"></div>
    </div>
<?php
}
