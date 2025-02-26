<?php
/** 
 * OPBW Process
 * 
 * @uses history_id
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

?>
<div id="opbw-finish" class="opbw-box">
    <div class="opbw_header_settings opbw-flex opbw_flex_justify_space_between">
        <h2 class="opbw_title_page"><?php esc_html_e('Finish', 'opal-bulkedit-for-woocommerce') ?></h2>
    </div>
    <div class="opbw-inner-box">
        <input type="hidden" name="opbw_history" value="<?php echo esc_attr($history_id) ?>">
        <div class="opbw-content">
            <div class="notice notice-warning notice-alt" style="margin: 0 0 15px 0;"><p><?php echo esc_html__("Please do not reload the page during processing!", 'opal-bulkedit-for-woocommerce') ?></p></div>
            <div class="notice notice-warning notice-alt" style="margin: 0 0 15px 0;"><p><?php echo esc_html__("You can still undo edited products in the History Tab!", 'opal-bulkedit-for-woocommerce') ?></p></div>
            <div class="loading-progress">
                <div class="progress-box">
                    <div class="progress-bar active progress-bar-striped progress-bar-success" role="progressbar" style="width: 0%;"><span>0%</span></div>
                </div>
            </div>
        </div>
        <div class="opbw_action mt">
            <div class="opbw-flex opbw_flex_justify_space_between">
                <div class="opbw-flex opbw_flex_align_items_center">
                    <a id="opbw_history_link" class="button button-hero button-primary opbw_disable" href="<?php echo esc_url(admin_url('edit.php?post_type=opbw-history')); ?>"><?php esc_html_e('Done', 'opal-bulkedit-for-woocommerce') ?></a>
                    <span class="number_edited"></span>
                </div>
                <a id="opbw_toggle_logs" class="button button-hero" href="#"><?php esc_html_e('Toggle logs', 'opal-bulkedit-for-woocommerce') ?></a>
            </div>
        </div>
        <pre id="opbw_logs"><code><ul class="ul-disc"><li class="nothing"><?php esc_html_e('Nothing to show!', 'opal-bulkedit-for-woocommerce') ?></li></ul></code></pre>
    </div>
</div>