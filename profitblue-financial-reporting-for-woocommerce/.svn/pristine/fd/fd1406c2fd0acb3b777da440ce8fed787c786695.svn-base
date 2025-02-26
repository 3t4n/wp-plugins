<?php

namespace ProfitBlue\Emails;

class ProfitblueReportEmail extends \WC_Email{
	
	/**
	 * wpdb
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var object
	 */
	private $wpdb;
    
    /**
     * period
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @var string
     */
    public $period;
    
    /**
     * date
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @var string
     */
    public $date;
	
	/**
	 * plugin_slug
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public $plugin_slug = 'profitblue-financial-reporting-for-woocommerce';
	
	/**
	 * __construct
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->email_content = '';

		$this->id          = 'wc_profitblue_report';
    	$this->customer_email = true;
		$this->title       = esc_html__('Profitblue report', 'profitblue-financial-reporting-for-woocommerce');
		$this->description = esc_html__('Profitblue report', 'profitblue-financial-reporting-for-woocommerce');
		$this->heading     = esc_html__('Profitblue report', 'profitblue-financial-reporting-for-woocommerce');
		$this->subject     = esc_html__('Profitblue report from {site_title}', 'profitblue-financial-reporting-for-woocommerce');


    	// these define the locations of the templates that this email should use, we'll just use the new order template since this email is similar
		$this->template_html  = 'profitblue-report-email.php';
		$this->template_plain = 'profitblue-report-email-plain.php';
		$this->templates = array( 'profitblue-report-email.php', 'profitblue-report-email-plain.php' );

		// Call parent constructor to load any other defaults not explicity defined here
		parent::__construct();

	}
    
    /**
     * set_content
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @param  string $email_content
     * @return void
     */
    public function set_content( $email_content ) {

        $this->email_content = $email_content;

    }

    /**
	 * Determine if the email should actually be sent and setup email merge variables
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @param string $email
	 * @return bool
	 */
	public function trigger( $email ) {

		if ( ! $this->is_enabled() ) {
			return;
		}

		if( !empty( $email ) ){

    		$recipient = sanitize_text_field( $email );

			return $this->send( $recipient, $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );			

		}

	}


  	/**
	 * get_content_html function.
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function get_content_html() {
		
		return wc_get_template_html( $this->template_html, array(
			'email_heading' 	 => $this->get_heading(),
			'sent_to_admin'      => false,
			'plain_text'         => false,
			'email'              => $this,
		) );

	}


  	/**
	 * get_content_plain function.
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function get_content_plain() {
		
		return wc_get_template_html( $this->template_plain, array(
			'email_heading' 	 => $this->get_heading(),
			'sent_to_admin'      => false,
			'plain_text'         => true,
			'email'              => $this,
		) );

	}

	/**
	 * Initialise settings form fields.
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'         => esc_html__( 'Enable/Disable', 'profitblue-financial-reporting-for-woocommerce' ),
				'type'          => 'checkbox',
				'label'         => esc_html__( 'Enable this email notification', 'profitblue-financial-reporting-for-woocommerce' ),
				'default'       => 'yes',
			),
			'subject' => array(
				'title'         => esc_html__( 'Subject', 'profitblue-financial-reporting-for-woocommerce' ),
				'type'          => 'text',
				'desc_tip'      => true,
				/* translators: %s: list of placeholders */
				'description'   => sprintf( esc_html__( 'Available placeholders: %s', 'profitblue-financial-reporting-for-woocommerce' ), '<code>{site_title}, {order_date}, {order_number}</code>' ),
				'placeholder'   => $this->get_default_subject(),
				'default'       => '',
			),
			'heading' => array(
				'title'         => esc_html__( 'Email heading', 'profitblue-financial-reporting-for-woocommerce' ),
				'type'          => 'text',
				'desc_tip'      => true,
				/* translators: %s: list of placeholders */
				'description'   => sprintf( esc_html__( 'Available placeholders: %s', 'profitblue-financial-reporting-for-woocommerce' ), '<code>{site_title}, {order_date}, {order_number}</code>' ),
				'placeholder'   => $this->get_default_heading(),
				'default'       => '',
			),
			'email_type' => array(
				'title'         => esc_html__( 'Email type', 'profitblue-financial-reporting-for-woocommerce' ),
				'type'          => 'select',
				'description'   => esc_html__( 'Choose which format of email to send.', 'profitblue-financial-reporting-for-woocommerce' ),
				'default'       => 'html',
				'class'         => 'email_type wc-enhanced-select',
				'options'       => $this->get_email_type_options(),
				'desc_tip'      => true,
			),
		);
	}

}
