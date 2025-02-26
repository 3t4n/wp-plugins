<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$ai_summarizer_configuration = get_option('ai_summarizer_configuration', '');
$ai_summarise_spelling = \AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizeSpelling();
?>
<input
    type="checkbox"
    id="ai_summarizer_configuration"
    name="ai_summarizer_configuration"
    <?php echo $ai_summarizer_configuration ? 'checked' : ''; ?>>
<label for="keepData"> Keep all <?php echo esc_html($ai_summarise_spelling); ?>
    data on deactivation or remove plugin
</label><br>