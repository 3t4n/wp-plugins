<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$checkboxValue = get_option('ghlcf7_checkbox_' . $post->id, 0);
$inputValue = get_option('ghlcf7_tag_' . $post->id, '');

?>
<div class="ghlcf7-tab-content">
    <!-- Your form fields go here -->
    <div class="ghlcf7_setting_checkbox">
        <label for="ghlcf7_checkbox">Do you want to send leads to GHL from this form:</label>
        <input type="checkbox" id="ghlcf7_checkbox" name="ghlcf7_checkbox" <?php checked(1, $checkboxValue); ?>>
    </div>
    <br>
    <div class="ghlcf7_setting_tag">
        <label for="ghlcf7_tag">Enter Tags to Send:</label>
        <input type="text" id="ghlcf7_tag" name="ghlcf7_tag" value="<?php echo esc_attr($inputValue); ?>">
    </div>
</div>