<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_rich_snippets() {
    rankology_print_pre_section('rich-snippets'); ?>

    <a class="btn btnSecondary" href="<?php echo admin_url('edit.php?post_type=rankology_schemas'); ?>">
        <?php esc_html_e('View my automatic schemas', 'wp-rankology'); ?>
    </a>

    <?php
}
