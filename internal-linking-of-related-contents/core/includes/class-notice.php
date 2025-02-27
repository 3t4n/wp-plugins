<?php
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'ilrc_admin_notice' ) ) {

	class ilrc_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'ilrc_notice_userid_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['ilrc-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'ilrc_notice_userid_' . get_current_user_id() , intval($_GET['ilrc-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
			global $pagenow;
			$redirect = ( 'admin.php' == $pagenow ) ? '?page=ilrc_panel&ilrc-dismiss=1' : '?ilrc-dismiss=1';
			
		?>
			
            <div class="update-nag notice ilrc-notice">
            
            	<div class="ilrc-noticedescription">

					<strong><?php esc_html_e( 'Upgrade to Internal Linking of Related Contents Pro to unlock premium features like...', 'internal-linking-of-related-contents' );?></strong>

					<p class="notice-coupon-message">

						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '9 additional premium templates', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Grouped related posts', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Related content based of category and post tags', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Related content based of post titles or custom keywords', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Device selection', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Custom post type support', 'internal-linking-of-related-contents' ); ?><br/>
						<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'AMP support', 'internal-linking-of-related-contents' ); ?><br/>

					</p>

					<a class="button" href="<?php echo esc_url(admin_url( 'admin.php?page=ilrc_panel&tab=free_vs_pro#free_vs_pro' )); ?>" ><?php esc_html_e( 'Free vs Pro', 'internal-linking-of-related-contents' ); ?></a>

					<a class="button" target="_blank" href="<?php echo esc_url( ILRC_UPGRADE_LINK . '/?ref=2&campaign=ilrc-notice' ); ?>"><?php _e( 'Upgrade Now', 'internal-linking-of-related-contents' ); ?></a>
					
					<div class="clear"></div>

					<?php printf( '<a href="%1$s" class="dismiss-notice">'. __( 'Dismiss this notice', 'internal-linking-of-related-contents' ) .'</a>', esc_url($redirect) ); ?>

				</div>

				<div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new ilrc_admin_notice();

?>