<?php
/**
 * Class to register a Custom Post Type (CPT) for Email Automation Workflows
 *
 * This CPT is not publicly visible and is used only for storing automation data.
 */
class Momo_ACGWC_Automation_CPT {
	/**
	 * Constructor to initialize actions
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_cpt' ) );
		add_action( 'init', array( $this, 'register_meta_fields' ) );
	}

	/**
	 * Register the Email Automation CPT
	 */
	public function register_cpt() {
		$args = [
			'label'               => esc_html__( 'WooAI Automation', 'momoacgwc' ),
			'public'              => false,
			'show_ui'             => false,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'capability_type'     => 'post',
			'supports'            => array( 'title', 'post_contents' ),
			'has_archive'         => true,
			'exclude_from_search' => true,
			'show_in_rest'        => true,
		];
		register_post_type( 'momoacgwc_automation', $args );
	}

	/**
	 * Register meta fields for the Email Automation CPT
	 */
	public function register_meta_fields() {
		$fields = array(
			'email_event',
			'email_action',
			'email_to',
			'email_reply_name',
			'email_reply_email',
			'email_subject',
			'email_heading',
			'email_preheader',
			'email_content',
			'enable_email_action',
		);

		foreach ( $fields as $field ) {
			register_post_meta(
				'momoacgwc_automation',
				$field,
				array(
					'type'              => 'string',
					'single'            => true,
					'show_in_rest'      => false,
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
		}
	}
}
new Momo_ACGWC_Automation_CPT();
