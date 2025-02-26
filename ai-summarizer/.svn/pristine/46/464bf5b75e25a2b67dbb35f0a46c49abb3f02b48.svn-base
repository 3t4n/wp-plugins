<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$post_id = get_the_ID();
$summary = get_post_meta($post_id, 'ai_summary', true);
$summary_status = get_post_meta($post_id, 'summary_status', true); // Use true to get the single value
?>
<div>
    <label for="acf-summarizer-box">Summary:</label>
    <div
        id="acf_summarizer_box"
        class="acf-summarizer-result"
        style="border: 1px solid #ccc; padding: 10px; margin-top: 5px;">
        <p><?php echo esc_html($summary); ?></p>
    </div>
    <p class="delete-change-msg"></p>
    <div style="display: flex;">
        <button
            class="acf-summarizer-button button button-primary"
            style="margin-top: 5px; margin-right: 5px; "
            data-post-id="<?php echo esc_attr($post_id); ?>">
            <?php echo esc_html($summary) ?
                'Re-' . esc_html(\AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizeSpelling()) . ''
                :
                '' . esc_html(\AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizeSpelling()) . ''; ?>
        </button>

        <button
            class="acf-summarizer-delete-button button button-primary"
            style="margin-top: 5px;
        <?php echo empty($summary) ? 'display : none;' : ''; // Disable if no summary_status value
        ?>
        "
            data-post-id="<?php echo esc_attr($post_id); ?>"
            data-post-status="<?php echo esc_attr($summary_status); ?>">
            <?php
            echo 'Clear/delete Summary';
            ?>
        </button>
    </div>

</div>
