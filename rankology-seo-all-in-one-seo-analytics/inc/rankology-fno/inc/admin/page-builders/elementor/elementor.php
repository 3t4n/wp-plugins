<?php
if ( ! defined('ABSPATH')) {
    exit;
}

/**
 * Add AI JS
 */
add_action('elementor/editor/before_enqueue_scripts', 'rankology_fno_elementor_register_elements_assets', 10000);

function rankology_fno_elementor_register_elements_assets() {
    $active = rankology_get_service('ToggleOption')->getToggleAi();
    if($active === "1"){
        $rankology_ai_generate_seo_meta = [
            'rankology_nonce'            => wp_create_nonce('rankology_ai_generate_seo_meta_nonce'),
            'rankology_ai_generate_seo_meta'      => admin_url('admin-ajax.php'),
        ];

        wp_enqueue_script('rankology-fno-ai-js', RANKOLOGY_FNO_PLUGIN_DIR_URL . 'inc/admin/page-builders/elementor/assets/js/base-pro.js', ['jquery'], RANKOLOGY_VERSION, true);

        wp_localize_script('rankology-fno-ai-js', 'rankologyAjaxAIMetaSEO', $rankology_ai_generate_seo_meta);
    }
}

/**
 * Add AI button to Elementor, SEO, Titles settings
 */
add_action('rankology_elementor_seo_titles_before', 'rankology_fno_elementor_seo_titles_before');
function rankology_fno_elementor_seo_titles_before() {
    ?>
        <# if ( data.field_type === 'text' ) { #>
            <?php if ('1' === rankology_get_toggle_option('ai')) { ?>
                <div class="elementor-control-input-wrapper" style="margin-bottom: 20px">
                    <button id="rankology_ai_generate_seo_meta" class="btn btnSecondary elementor-button elementor-button-default" data-lang="<?php if (function_exists('rankology_get_current_lang')) { echo rankology_get_current_lang(); }; ?>" type="button">
                        <?php esc_html_e('Generate meta with AI','wp-rankology'); ?>
                    </button>
                    <div id="rankology_ai_generate_seo_meta_log" style="display:none"></div>
                </div>
            <?php } ?>
        <# } #>
    <?php
}
