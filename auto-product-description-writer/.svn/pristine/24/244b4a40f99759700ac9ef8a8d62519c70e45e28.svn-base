<?php
/**
 * Workflow Hooks
 */
class MoMo_ACGWC_Workflow_Hooks {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'woocommerce_created_customer', array( $this, 'momo_acgwc_workflow_event_user_register' ) );
	}
	/**
	 * User Register
	 *
	 * @param int $user_id User ID.
	 */
	public function momo_acgwc_workflow_event_user_register( $user_id ) {
		global $momoacgwc;
		$momoacgwc->autofn->momo_acgwc_workflow_event_user_register_process( $user_id );
	}
}
new MoMo_ACGWC_Workflow_Hooks();
