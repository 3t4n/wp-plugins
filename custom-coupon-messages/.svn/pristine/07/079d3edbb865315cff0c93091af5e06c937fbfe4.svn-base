<?php   
/* 
Plugin Name: WooCommerce Custom Coupon Messages - WP Fix It
Version: 2.2
Description: Change the WooCommerce coupon messages that display when coupons are used on your site. Take full control of all coupon messages and display what you want.
Author: WP Fix It
Author URI: https://www.wpfixit.com
License: GPLv2 or later
*/
// Check if WooCommerce is active
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	function wpfi_wc_coupon_message_needed_notice() {
				$message = sprintf(
		/* translators: Placeholders: %1$s and %2$s are <strong> tags. %3$s and %4$s are <a> tags */
			esc_html__( '%1$sWooCommerce Custom Coupon Messages %2$s requires WooCommerce to function. Please %3$sinstall WooCommerce%4$s.', 'woocommerce_seal' ),
			'<strong>',
			'</strong>',
			'<a href="' . admin_url( 'plugins.php' ) . '">',
			'&nbsp;&raquo;</a>'
		);
		echo sprintf( '<div class="error"><p>%s</p></div>', $message );
	}
	add_action( 'admin_notices', 'wpfi_wc_coupon_message_needed_notice' );
	return;
}
//Load up styling for plugin needs
function wpfi_coupon_message_css() {
    wp_enqueue_style( 'myCSS', plugins_url( 'cm.css', __FILE__ ) );
}
add_action('admin_print_styles', 'wpfi_coupon_message_css');
//Add coupon messages tab in WooCommerce settings area
class WC_Coupon_Message_Tab {
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_coupon-messages', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_coupon-messages', __CLASS__ . '::update_settings' );
    }
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['coupon-messages'] = __( 'Coupon Messages', 'wc_settings_coupon_message_tab' );
        return $settings_tabs;
    }
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }
    public static function get_settings() {
       //$settings_couponmessages = $settings;
		
		// Add title to the settings page
		$settings_couponmessages[] = array( 
		'name' => __( 'Custom Coupon Messages', 'text-domain' ), 
		'type' => 'title', 
		'desc' => __( 'The following options are used to change the default WooCommerce coupon messages in your online shop.<br><br>This feature is brought to you by <a title="WP Fix It Reviews" href="https://www.wpfixit.com" target="_blank" ><b>WP Fix It</b></a> proving 24/7 instant WordPress support since 2009.<br><br>If the field is left blank, the default WooCommerce coupon message will be displayed.', 'text-domain' ), 
		'id' => 'wccouponmessages' );
		
		// Add fields to change messages
		$settings_couponmessages[] = array(
			'name'     => __( 'Please Enter' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'PLEASE_ENTER',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Please enter a coupon code.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Success' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'SUCCESS',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon code applied successfully.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Removed' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'REMOVED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon code removed successfully.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Does Not Exist' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'NOT_EXIST',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon "%s" does not exist!', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Expired' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'EXPIRED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>This coupon has expired.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Already Applied' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'ALREADY_APPLIED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon code already applied!', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Not Applicable' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'NOT_APPLICABLE',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, this coupon is not applicable to your cart contents.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Not Valid On Sale Items' ),
			'desc_tip' => __( 'Sorry, this coupon is not valid for sale items.', 'text-domain' ),
			'id'       => 'NOT_VALID_SALE_ITEMS',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, this coupon is not applicable to your cart contents.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Invalid Filtered' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'INVALID_FILTERED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon is not valid.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Invalid Removed' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'INVALID_REMOVED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, it seems the coupon "%s" is invalid - it has now been removed from your order.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Not Yours' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'NOT_YOURS_REMOVED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, it seems the coupon "%s" is not yours - it has now been removed from your order.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Individual Use Only' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'ALREADY_APPLIED_INDIV_USE_ONLY',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, coupon "%s" has already been applied and cannot be used in conjunction with other coupons.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Usage Limit Reached' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'USAGE_LIMIT_REACHED',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>You have already used this coupon and that is the maximum usage.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Minimum Spend Not Met' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'MIN_SPEND_LIMIT_NOT_MET',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>The minimum spend for this coupon is %s.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Maximum Spend Limit Met' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'MAX_SPEND_LIMIT_MET',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>The maximum spend for this coupon is %s.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Excluded Products' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'EXCLUDED_PRODUCTS',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, this coupon is not applicable to the products: %s.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Excluded Categories' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'EXCLUDED_CATEGORIES',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Sorry, this coupon is not applicable to the categories: %s.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Usage Limit Reached Guest' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'USAGE_LIMIT_COUPON_STUCK_GUEST',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon usage limit has been reached. Please try again after some time, or contact us for help.', 'text-domain' ),
		);
		$settings_couponmessages[] = array(
			'name'     => __( 'Usage Limit Reached Stuck' ),
			'desc_tip' => __( 'Enter new text for this coupon message.', 'text-domain' ),
			'id'       => 'USAGE_LIMIT_COUPON_STUCK',
			'type'     => 'text',
			'css'      => 'width:100%;max-width:669px;',
			'desc'     => __( '<span style="color: #f99568;font-weight: 500">Default Message:</span><br>Coupon usage limit has been reached. If you were using this coupon just now but order was not complete, you can retry or cancel the order by going to the my account page.', 'text-domain' ),
		);
		
		$settings_couponmessages[] = array( 'type' => 'sectionend', 'id' => 'wccouponmessage' );
		
		return $settings_couponmessages;
		
        return apply_filters( 'wpfi_wc_coupon_message_tab_settings', $settings );
    }
}
WC_Coupon_Message_Tab::init();
//Grab user created coupon messages for front end
function coupon_error_message_change($err, $err_code, $WC_Coupon) {
    if(!empty(get_option('NOT_EXIST'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_NOT_EXIST:
            $err = get_option( "NOT_EXIST" );
    }
    }
    if(!empty(get_option('ALREADY_APPLIED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "ALREADY_APPLIED" );
    }
    }
    if(!empty(get_option('USAGE_LIMIT_COUPON_STUCK'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "USAGE_LIMIT_COUPON_STUCK" );
    }
    }
    if(!empty(get_option('USAGE_LIMIT_COUPON_STUCK_GUEST'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "USAGE_LIMIT_COUPON_STUCK_GUEST" );
    }
    }
    if(!empty(get_option('EXCLUDED_CATEGORIES'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "EXCLUDED_CATEGORIES" );
    }
    }
    if(!empty(get_option('PLEASE_ENTER'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "PLEASE_ENTER" );
    }
    }
    if(!empty(get_option('SUCCESS'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "SUCCESS" );
    }
    }
    if(!empty(get_option('REMOVED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "REMOVED" );
    }
    }
    if(!empty(get_option('EXPIRED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "EXPIRED" );
    }
    }
    if(!empty(get_option('NOT_APPLICABLE'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "NOT_APPLICABLE" );
    }
    }
    if(!empty(get_option('NOT_VALID_SALE_ITEMS'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "NOT_VALID_SALE_ITEMS" );
    }
    }
    if(!empty(get_option('INVALID_FILTERED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "INVALID_FILTERED" );
    }
    }
    if(!empty(get_option('INVALID_REMOVED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "INVALID_REMOVED" );
    }
    }
    if(!empty(get_option('NOT_YOURS_REMOVED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "NOT_YOURS_REMOVED" );
    }
    }
    if(!empty(get_option('ALREADY_APPLIED_INDIV_USE_ONLY'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "ALREADY_APPLIED_INDIV_USE_ONLY" );
    }
    }
    if(!empty(get_option('USAGE_LIMIT_REACHED'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "USAGE_LIMIT_REACHED" );
    }
    }
    if(!empty(get_option('MIN_SPEND_LIMIT_NOT_MET'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "MIN_SPEND_LIMIT_NOT_MET" );
    }
    }
    if(!empty(get_option('MAX_SPEND_LIMIT_MET'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "MAX_SPEND_LIMIT_MET" );
    }
    }
    if(!empty(get_option('EXCLUDED_PRODUCTS'))) {
    switch ( $err_code ) {
        case $WC_Coupon::E_WC_COUPON_ALREADY_APPLIED:
            $err = get_option( "EXCLUDED_PRODUCTS" );
    }
    }
    return $err;
}
add_filter( 'woocommerce_coupon_error','coupon_error_message_change',10,3 );
// Add admin message when activated
register_activation_hook( __FILE__, 'wpfi_wc_coupon_message_welcome_message' );
function wpfi_wc_coupon_message_welcome_message() {
set_transient( 'wpfi_wc_coupon_message_welcome_message_notice', true, 5 );
}
add_action( 'admin_notices', 'wpfi_wc_coupon_message_welcome_message_notice' );
function wpfi_wc_coupon_message_welcome_message_notice(){
/* Check transient, if available display notice */
if( get_transient( 'wpfi_wc_coupon_message_welcome_message_notice' ) ){
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
?>
<div class="updated notice is-dismissible">	
<p>&#127881; <strong>WP Fix It - Custom Coupon Messages</strong> has been activated and you now can create custom coupon messages.
<br>
<br><a href="<?php echo get_admin_url(null, 'admin.php?page=wc-settings&tab=coupon-messages') ?>"><b>CLICK HERE</b></a> to start creating custom WooCommerce coupon messages.
</p>
</div>
<?php
}
/* Delete transient, only display this notice once. */
delete_transient( 'wpfi_wc_coupon_message_welcome_message_notice' );
}
}
// Add settings link to plugin details
function wpfi_wc_coupon_message_plugin_action_links( $links ) {
$links = array_merge( array(
'<a href="' . esc_url( admin_url( '/admin.php?page=wc-settings&tab=coupon-messages' ) ) . '">' . __( '<b>Settings</b>', 'textdomain' ) . '</a>'
), $links );
$links = array_merge( array(
'<a href="https://www.wpfixit.com/" target="_blank">' . __( '<span id="p-icon" class="dashicons dashicons-tickets-alt"></span> <span class="ticket-link" >GET HELP</span>', 'textdomain' ) . '</a>'
), $links );
return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpfi_wc_coupon_message_plugin_action_links' );