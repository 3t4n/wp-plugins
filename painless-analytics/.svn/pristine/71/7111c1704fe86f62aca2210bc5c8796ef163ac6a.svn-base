<?php
/*
 * admin/views/setup.php
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$painlessanalyticsSettings = get_option('painlessanalytics');
$linkCode = !empty($painlessanalyticsSettings['link_code']) ? $painlessanalyticsSettings['link_code'] : '';
$hostname = !empty($painlessanalyticsSettings['hostname']) ? $painlessanalyticsSettings['hostname'] : '';
$enabled = painlessAnalytics::getInstance()->getApiUrl();
?>
<div class="painlessanalytics-form-setup">
  <?php if( empty($enabled) ) { // If not enabled, lets give them a better experience ?>
    <a class="painlessanalytics-setup-link" href="#" onclick="return painlessanalyticsSetupLink(this)"><?php echo esc_html(__('Have a Painless Analytics Link Code?', 'painless-analytics')); ?></a>
  <?php } else { ?>
    <h3 id="painlessanalytics-status"><?php echo esc_html(__( 'Analytics Status', 'painless-analytics' )); ?></h3>
    <p class="painlessanalytics-p-success">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
    </svg>
    <?php echo esc_html(__('Painless Analytics is enabled on your site', 'painless-analytics')); ?></p>
    <div><a href="#" onClick="document.getElementById('painlessanalytics-details').classList.remove('painlessanalytics-none'); this.classList.add('painlessanalytics-none'); return false;"><?php echo esc_html(__('Learn more', 'painless-analytics')); ?></a></div>
    <div id="painlessanalytics-details" class="painlessanalytics-none">
        <p>Your site <i><?php echo esc_html($hostname); ?></i> is registered with the following unique script tag. This plugin automatically places this script tag in the appropriate section of your pages. <strong>NO FURTHER ACTION IS REQUIRED</strong>.</p>
        <pre class="painlessanalytics-embed"><?php
        ob_start();
        painlessAnalytics::getInstance()->wp_head(); 
        $html = ob_get_contents();
        ob_end_clean();
        echo esc_html( $html );
        ?></pre>
    </div>
    <p><a class="painlessanalytics-setup-link" href="#" onclick="return painlessanalyticsSetupLink(this)"><?php echo esc_html(__('Change Painless Analytics Link Code?', 'painless-analytics')); ?></a></p>
  <?php } ?>

  <div id="powerpress-form-wrapper-setup" class="painlessanalytics-form-wrapper painlessanalytics-none">
  <form action="options.php" method="post">
    <?php settings_fields('painlessanalytics_settings_group'); ?>
    <h3 id="painlessanalytics-enter-link-code"><?php echo esc_html( __( 'Painless Analytics Link Code', 'painless-analytics' )); ?></h3>
    <div class="painlessanalytics-input-row">
        <input type="text" id="link_code" name="painlessanalytics[link_code]" placeholder="<?php echo esc_html(__('Enter Link Code', 'painless-analytics'));  ?>" class="regular-text code" aria-labelledby="painlessanalytics-enter-link-code"
        value="<?php echo esc_attr($linkCode); ?>" />
    </div>
    <div class="painlessanalytics-button-row">
        <?php submit_button(); ?>
    </div>
  </form>
  </div>
</div>
<script>
function painlessanalyticsSetupLink(elem) {
    elem.classList.add('painlessanalytics-none');
    document.getElementById('powerpress-form-wrapper-setup').classList.remove('painlessanalytics-none');
    return false;
}
</script>