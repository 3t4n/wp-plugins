<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$post_id = get_the_ID();
$widget_position = get_option('ai_summarizer_widget_position', 'left');
?>

<div class="
    hide-widget
    acf-summarizer-widget
    <?php echo esc_attr($widget_position === 'left' ? 'position-left' : 'position-right'); ?>
">
    <div class="summarize-container">
        <div class="acf-summarizer-result-front">
            <!-- Summary will be displayed here -->
        </div>
        <div class="summarize-button-container">
            <button
                class="acf-summarizer-button-front button button-primary"
                data-post-id="<?php echo esc_attr($post_id); ?>"
                style="background-color: <?php echo esc_html(get_option('ai_summarizer_widget_colour', '')); ?>;
            ">
                <?php echo esc_html(get_option('ai_summarizer_widget_text_two', 'Summarize')); ?>
            </button>
            <button
                class="acf-summarizer-close button button-secondary"
                style="background-color: <?php echo esc_html(get_option('ai_summarizer_widget_colour', '')); ?>;
            ">
                <span class="close-icon">&#x2715;</span>
            </button>
        </div>
    </div>
</div>

<div class="acf-summarizer-toggle"
    style="background-color: <?php echo esc_attr(get_option('ai_summarizer_widget_colour', '')); ?>;
        <?php echo esc_attr($widget_position === 'left' ? 'left: 20px; right:auto;' : 'right: 20px;'); ?>">
    <?php echo esc_html(get_option('ai_summarizer_widget_text', 'AI summarizer')); ?>
</div>