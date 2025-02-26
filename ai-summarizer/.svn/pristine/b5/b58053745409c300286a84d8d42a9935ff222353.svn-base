<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$widget_position = get_option('ai_summarizer_widget_position', 'left');
?>

<div class="dial-container">
    <!-- Left-Right Toggle Switch -->
    <div class="switch2">
        <input type="hidden" name="ai_summarizer_widget_position" value="left">
        <input
            id="widget-toggle"
            class="check-toggle check-toggle-round-flat"
            type="checkbox"
            name="ai_summarizer_widget_position"
            value="right"
            <?php echo ($widget_position === 'right') ? 'checked' : ''; ?>>
        <label for="widget-toggle"></label>

        <!-- Updated Toggle Labels -->
        <span class="left">Left</span>
        <span class="right">Right</span>
    </div>

    <!-- Laptop Screen with Widget Preview -->
    <div class="laptop-screen">
        <svg width="122" height="70" viewBox="0 0 122 70" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M108 63.5H109.5V62V5C109.5 3.067 107.933 1.5 106 1.5H16C14.067 1.5 12.5 3.067 12.5 5V62V63.5H14H108Z"
                fill="white">
            </path>
            <path
                d="M108 63.5H109.5V62V5C109.5 3.067 107.933 1.5 106 1.5H16C14.067 1.5 12.5 3.067 12.5 5V62V63.5H14H108Z"
                stroke="#0D1726"
                stroke-width="3">
            </path>
            <path d="M0 65H122V68C122 69.1046 121.105 70 120 70H2C0.895428 70 0 69.1046 0 68V65Z" fill="#ACB8CB"></path>
            <path d="M54 65H72V65C72 66.1046 71.1046 67 70 67H56C54.8954 67 54 66.1046 54 65V65Z" fill="#8796AF"></path>
            <!-- Widget Preview -->
            <rect
                class="widget-preview"
                width="25"
                height="20"
                x="<?php echo ($widget_position === 'right') ? 75 : 20; ?>"
                y="35"
                fill="#007bff">
            </rect>
        </svg>
    </div>
</div>