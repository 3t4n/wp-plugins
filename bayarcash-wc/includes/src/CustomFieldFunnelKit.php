<?php

namespace Bayarcash\WooCommerce;

class CustomFieldFunnelKit {
	private $hook_run = false;
	private $identification_number_field;
	private $identification_type_field;

	public function __construct() {
		add_action('wfacp_after_template_found', [$this, 'init_fields']);
		add_action('wp_footer', [$this, 'add_custom_scripts']);
		add_action('wp_ajax_update_custom_fields', [$this, 'handle_ajax_update']);
		add_action('wp_ajax_nopriv_update_custom_fields', [$this, 'handle_ajax_update']);
	}

	public function add_custom_scripts() {
		if (!is_checkout()) return;
		?>
		<script type="text/javascript">
            jQuery(function($) {
                function toggleCustomFields(show) {
                    const fields = $('#bayarcash_identification_type, #bayarcash_identification_id').closest('.wfacp-form-control-wrapper');
                    if (show) {
                        fields.show();
                        fields.find('input, select').prop('required', true);
                    } else {
                        fields.hide();
                        fields.find('input, select').prop('required', false);
                    }
                }

                // Initial state check
                const initialPaymentMethod = $('input[name="payment_method"]:checked').val();
                toggleCustomFields(initialPaymentMethod === 'directdebit-wc');

                // Listen for payment method changes
                $('form.checkout').on('change', 'input[name="payment_method"]', function(e) {
                    const selectedMethod = $(this).val();
                    console.log('Payment method changed to:', selectedMethod);

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: {
                            action: 'update_custom_fields',
                            nonce: '<?php echo wp_create_nonce('bayarcash-custom-fields'); ?>',
                            payment_method: selectedMethod
                        },
                        success: function(response) {
                            console.log('AJAX response:', response);
                            if (response.success) {
                                toggleCustomFields(response.data.show_fields);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating fields:', error);
                        }
                    });
                });

                // Handle updated_checkout event
                $(document.body).on('updated_checkout', function() {
                    const currentMethod = $('input[name="payment_method"]:checked').val();
                    console.log('Checkout updated, current method:', currentMethod);
                    toggleCustomFields(currentMethod === 'directdebit-wc');
                });
            });
		</script>
		<?php
	}

	public function handle_ajax_update() {
		check_ajax_referer('bayarcash-custom-fields', 'nonce');

		$payment_method = isset($_POST['payment_method']) ? sanitize_text_field($_POST['payment_method']) : '';
		WC()->session->set('chosen_payment_method', $payment_method);

		wp_send_json_success(array(
			'show_fields' => ($payment_method === 'directdebit-wc')
		));
	}

	public function init_fields(): void {
		$this->identification_number_field = array(
			'label'       => __('Identification Number', 'bayarcash-wc'),
			'type'        => 'text',
			'field_type'  => 'shipping',
			'placeholder' => __('Identification Number', 'bayarcash-wc'),
			'required'    => true,
			'class'       => ['wfacp-col-full'],
			'clear'       => true,
			'id'          => 'bayarcash_identification_id',
		);

		$this->identification_type_field = array(
			'label'       => __('Identification Type', 'bayarcash-wc'),
			'type'        => 'select',
			'field_type'  => 'shipping',
			'required'    => true,
			'class'       => ['wfacp-col-full'],
			'clear'       => true,
			'id'          => 'bayarcash_identification_type',
			'options'     => [
				'1' => 'New IC Number',
				'2' => 'Old IC Number',
				'3' => 'Passport Number',
				'4' => 'Business Registration',
			],
			'custom_attributes' => ['style' => 'padding: 14px 17px; font-size: 16px;'],
		);

		add_filter('wfacp_get_checkout_fields', array($this, 'wfacp_get_checkout_fields'), 8);
		add_filter('wfacp_get_fieldsets', array($this, 'wfacp_get_fieldsets'), 7);
	}

	public function wfacp_get_checkout_fields($fields) {
		if (!$this->is_direct_debit_selected()) {
			return $fields;
		}

		if (is_array($fields) && count($fields) > 0) {
			$temp = wfacp_template();
			$status = $temp->get_shipping_billing_index();

			if (!isset($fields['shipping']['bayarcash_identification_id']) || !isset($fields['shipping']['bayarcash_identification_type'])) {
				if ($status === 'shipping') {
					$this->identification_number_field['class'] = ['wfacp-col-full', 'wfacp_shipping_field_hide', 'wfacp_shipping_fields'];
					$this->identification_type_field['class'] = ['wfacp-col-full', 'wfacp_shipping_field_hide', 'wfacp_shipping_fields'];
				} else {
					$this->identification_number_field['class'] = ['wfacp-col-full'];
					$this->identification_type_field['class'] = ['wfacp-col-full'];
				}

				$fields['shipping']['bayarcash_identification_type'] = $this->identification_type_field;
				$fields['shipping']['bayarcash_identification_id'] = $this->identification_number_field;
			}
		}

		return $fields;
	}

	public function wfacp_get_fieldsets($section): array {
		if (!$this->is_direct_debit_selected()) {
			return $section;
		}

		if (false === $this->hook_run) {
			$section['single_step'][0]['fields'][] = $this->identification_type_field;
			$section['single_step'][0]['fields'][] = $this->identification_number_field;
		}

		return $section;
	}

	private function is_direct_debit_selected(): bool {
		if (!WC()->session) {
			return false;
		}

		$chosen_payment_method = WC()->session->get('chosen_payment_method');
		return $chosen_payment_method === 'directdebit-wc';
	}
}

// Initialize only on checkout
add_action('template_redirect', function() {
	if (is_checkout()) {
		new CustomFieldFunnelKit();
	}
});