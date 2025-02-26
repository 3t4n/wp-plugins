<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

?>

<div class="wrap-rich-snippets-faq">
    <div class="rankology-notice">
        <p>
            <?php
                /* translators: %s: link documentation */
                printf(__('Learn more about the <strong>FAQ schema</strong> from the <a href="%s" target="_blank">Google official documentation website</a><span class="dashicons dashicons-redo"></span>', 'wp-rankology'), 'https://developers.google.com/search/docs/data-types/faqpage'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_faq_q_meta">
            <?php esc_html_e('Question', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_faq_q', 'default'); ?>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_faq_a_meta">
            <?php esc_html_e('Answer', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_faq_a', 'default'); ?>
    </p>
</div>
