<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$widget_display = get_option('ai_summarizer_widget_visibility', 'true');
?>


<div class="ai-summarizer-card">
    <div class="ai-summarizer-card-body">
        <label class="ai-summarizer-toggle">
            <input
                type="checkbox"
                id="ai_summarizer_widget_visibility"
                name="ai_summarizer_widget_visibility"
                <?php echo ($widget_display === 'on') ? 'checked' : ''; ?> />
            <span class="ai-summarizer-slider"></span>
        </label>
        <label for="ai_summarizer_checkbox">Display Widget on website</label>
    </div>
</div>