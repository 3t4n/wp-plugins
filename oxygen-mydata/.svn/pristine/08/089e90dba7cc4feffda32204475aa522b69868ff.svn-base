<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WC_Email_Invoice_Email', false ) ) :


	class WC_Email_Invoice_Email extends WC_Email {

		public function __construct() {
			$this->id             = 'invoice_email';
			$this->title          = __( 'Invoice Email', 'oxygen' );
			$this->description    = __( 'You can use this type of email in order to send the document receipt/invoice of the order.', 'oxygen' );

			$this->heading = __('Document invoice/receipt/notice for this order.', 'oxygen' );
			$this->subject = __('Document invoice/receipt/notice for this order.', 'oxygen' );

			// Point to the template within the plugin
			$this->template_html  = 'templates/invoice-email-template.php';
			$this->template_plain = 'templates/plain-invoice-email-template.php';

			$this->customer_email = true;

			// Specify the plugin directory where templates are located
			$this->template_base = plugin_dir_path( __FILE__ );

			parent::__construct();
		}

		/**
		 * Trigger the sending of this email.
		 *
		 * @param int            $order_id The order ID.
		 * @param WC_Order|false $order Order object.
		 */

		public function trigger( $order_id ,$order = false) {
			$this->setup_locale();

			if ( $order_id && ! is_a( $order, 'WC_Order' ) ) {
				$order = wc_get_order( $order_id );
			}

			if ( is_a( $order, 'WC_Order' ) ) {
				$this->object                         = $order;
				$this->recipient                      = $this->object->get_billing_email();
				$this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
				$this->placeholders['{order_number}'] = $this->object->get_order_number();
			}

			$this->heading = __('Document invoice/receipt/notice for this order.', 'oxygen');
			$this->subject = __('Document invoice/receipt/notice for this order.', 'oxygen');

			if ( $this->is_enabled() && $this->get_recipient() ) {
				$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
			}

			$this->restore_locale();
		}

		public function get_content_html() {
			return wc_get_template_html(
				$this->template_html,
				array(
					'order'         => $this->object,
					'email_heading' => $this->get_heading(),
					'sent_to_admin' => false,
					'plain_text'    => false,
					'email'         => $this,
					'recipient'    => $this->recipient,
				),
				'', // No override by theme
				$this->template_base
			);
		}

		public function get_content_plain() {
			return wc_get_template_html(
				$this->template_plain,
				array(
					'order'         => $this->object,
					'email_heading' => $this->get_heading(),
					'sent_to_admin' => false,
					'plain_text'    => true,
					'email'         => $this,
					'recipient'    => $this->recipient,
				),
				'', // No override by theme
				$this->template_base
			);
		}
	}


endif;

return new WC_Email_Invoice_Email();
