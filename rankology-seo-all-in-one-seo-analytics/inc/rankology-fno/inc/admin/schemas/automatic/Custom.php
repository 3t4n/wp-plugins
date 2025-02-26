<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

?>

<div class="wrap-rich-snippets-custom">
    <p>
        <label for="rankology_fno_rich_snippets_custom_meta">
            <?php esc_html_e('Custom schema', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_custom', 'custom'); ?>
    </p>

</div>
