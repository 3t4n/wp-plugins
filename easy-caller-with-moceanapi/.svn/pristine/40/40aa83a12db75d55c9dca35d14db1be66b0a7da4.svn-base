<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!class_exists('emc_Short_Codes')) {
    class emc_Short_Codes {
        public function __construct() {
            add_shortcode('easycall', array($this, 'emc_shortcode_call'));
        }
        public function emc_shortcode_call($attr) {
            ob_start();
            if (isset($attr['number']) && get_option('emc_setting_number') && get_option('emc_setting_auth_token') && get_option('emc_setting_account_sid')):
                $agent_phone = esc_attr($attr['number']);
                $button_label = 'Click To Call';
                if (isset($attr['label']))
                    $button_label = esc_attr($attr['label']);
                ?>
                <div class="emc-content emc-call">
                    <input type="text" class="emc_call_number"/>
                    <input type="hidden" class="emc_welcome_message" value="<?php echo esc_attr(get_option('emc_setting_welcome'));?>"/>
                    <?php wp_nonce_field( 'emc_nonce_action', 'emc_nonce_field' ); ?>
                    <button data-agent="<?php echo $agent_phone; ?>" type="button" class="emc_call_button"><?php echo $button_label; ?></button>
                </div>
                <?php
            endif;
            return ob_get_clean();
        }
    }
    $emc_shortcode = new emc_Short_Codes();
}