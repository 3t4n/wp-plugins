<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_faq($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_faq  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_faq']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_faq'] : [];

    // Rankology < 3.9
    // Double dimension required as a result of migration 3.9
    $rankology_fno_rich_snippets_faq = ['0' => $rankology_fno_rich_snippets_faq];
    ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-faq">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up your Frequently Asked Questions page with JSON-LD to try to get the position 0 in search results. ', 'wp-rankology'); ?>
        </p>
    </div>
    <?php //Init $rankology_faq array if empty
        if (empty($rankology_fno_rich_snippets_faq)) {
            $rankology_fno_rich_snippets_faq = ['0' => ['']];
        }
    $total = count($rankology_fno_rich_snippets_faq[0]);

    if ($total > 0) {
        ?>
    <div id="wrap-faq" data-count="<?php echo $total; ?>">
        <?php foreach ($rankology_fno_rich_snippets_faq[0] as $key => $value) {
            $num            = $key + 1;
            $check_question = isset($rankology_fno_rich_snippets_faq[0][$key]['question']) ? esc_attr($rankology_fno_rich_snippets_faq[0][$key]['question']) : null;
            $check_answer   = isset($rankology_fno_rich_snippets_faq[0][$key]['answer']) ? esc_textarea($rankology_fno_rich_snippets_faq[0][$key]['answer']) : null; ?>
        <div class="faq">
            <h3 class="accordion-section-title" tabindex="0">
                <?php if (empty($check_question)) { ?>
                    <span style="color:red">
                    <?php esc_html_e('Empty Question', 'wp-rankology'); ?>
                    </span>
                <?php } else {
                    echo $check_question;
                }

                if (empty($check_answer)) {
                    echo ' - '; ?>
                    <span style="color:red">
                        <?php esc_html_e('Empty Answer', 'wp-rankology'); ?>
                    </span>
                    <?php
                } ?>
            </h3>
            <div class="accordion-section-content">
                <div class="inside">
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][question]">
                            <?php esc_html_e('Question (required)', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][question]"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][question]"
                            placeholder="<?php echo esc_html__('Enter your question', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Question', 'wp-rankology'); ?>"
                            value="<?php echo $check_question; ?>" />
                    </p>
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][answer]">
                            <?php esc_html_e('Answer (required)', 'wp-rankology'); ?>
                        </label>
                        <textarea
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][answer]"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][<?php echo $key; ?>][answer]"
                            placeholder="<?php echo esc_html__('Enter your answer', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Answer', 'wp-rankology'); ?>"
                            rows="8"><?php echo $check_answer; ?></textarea>
                    </p>

                    <p>
                        <a href="#" class="remove-faq button">
                            <?php esc_html_e('Remove question', 'wp-rankology'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php
        } ?>
    </div>
    <?php
    } else { ?>
    <div id="wrap-faq" data-count="1">
        <div class="faq">
            <h3 class="accordion-section-title" tabindex="0">
                <?php esc_html_e('Question', 'wp-rankology'); ?>
            </h3>
            <div class="accordion-section-content">
                <div class="inside">
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][question]">
                            <?php esc_html_e('Question (required)', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][question]"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][question]"
                            placeholder="<?php echo esc_html__('Enter your question', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Question', 'wp-rankology'); ?>"
                            value="" />
                    </p>
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][answer]">
                            <?php esc_html_e('Answer (required)', 'wp-rankology'); ?>
                        </label>
                        <textarea
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][answer]"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_faq][0][answer]"
                            placeholder="<?php echo esc_html__('Enter your answer', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Answer', 'wp-rankology'); ?>"
                            rows="8"></textarea>
                    </p>

                    <p>
                        <a href="#" class="remove-faq button">
                            <?php esc_html_e('Remove question', 'wp-rankology'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <p><a href="#" id="add-faq" class="add-faq <?php echo rankology_btn_secondary_classes(); ?>"><?php esc_html_e('Add question', 'wp-rankology'); ?></a>
    </p>
</div>
<?php
}
