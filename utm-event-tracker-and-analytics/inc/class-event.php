<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Event class
 * 
 * @since 1.0.0
 */
class Event {

	/**
	 * ID of event
	 * 
	 * @since 1.0.0
	 * @var integer
	 */
	public $id = 0;

	/**
	 * Session ID of event
	 * 
	 * @since 1.0.0
	 * @var integer
	 */
	public $session_id  = 0;

	/**
	 * Event type
	 * 
	 * @since 1.0.0
	 * @var null|string
	 */
	public $type = null;

	/**
	 * Event title
	 * 
	 * @since 1.1.2
	 * @var null|string
	 */
	public $title = null;

	/**
	 * Currency of amount
	 * 
	 * @since 1.0.0
	 * @var null|string
	 */
	public $currency = null;

	/**
	 * Hold amount of event
	 * 
	 * @since 1.0.0
	 * @var float
	 */
	public $amount = 0.00;

	/**
	 * Hold extra data of event
	 * 
	 * @since 1.0.0
	 * @var array
	 */
	public $meta_data = [];

	/**
	 * Hold created datetime of event
	 * 
	 * @since 1.0.0
	 * @var string
	 */
	public $created_on = '';

	/**
	 * Hold description of this event
	 * 
	 * @since 1.0.0
	 * @var string
	 */
	public $description = '';

	/**
	 * Constructor of event
	 * 
	 * @since 1.0.0
	 */
	public function __construct($event_data = null) {
		$this->created_on = gmdate('Y-m-d H:i:s');
		if (is_object($event_data)) {
			$event_data = (array) $event_data;
		}

		if (!is_array($event_data)) {
			return;
		}

		$meta_data = null;
		if (isset($event_data['meta_data']) && !is_array($event_data['meta_data'])) {
			$meta_data = json_decode($event_data['meta_data'], true);
			unset($event_data['meta_data']);
		}

		$this->meta_data = (array) $meta_data;

		foreach ($event_data as $key => $value) {
			$key = sanitize_key($key);
			if (empty($key)) {
				continue;
			}

			$this->$key = $value;
		}

		$this->id = absint($this->id);
		$this->set_description();

		$this->title = apply_filters('utm_event_tracker/event_item_title', $this->get_title(), $this);
	}

	/**
	 * Add data into meta data
	 * 
	 * @since 1.0.0
	 */
	public function __set($key, $value) {
		$this->meta_data[$key] = $value;
	}

	/**
	 * Get value from meta_data
	 * 
	 * @since 1.0.0
	 * @return mixed
	 */
	public function __get($key) {
		return isset($this->meta_data[$key]) ? $this->meta_data[$key] : null;
	}

	/**
	 * Check the key exists within meta data
	 * 
	 * @since 1.0.0
	 * @return boolean
	 */
	public function __isset($key) {
		return isset($this->meta_data[$key]);
	}

	/**
	 * Save event
	 * 
	 * @since 1.1.2
	 * @return void
	 */
	public function save() {
		$event_data = get_object_vars($this);
		unset($event_data['description']);

		$meta_data = isset($event_data['meta_data']) && is_array($event_data['meta_data']) ? $event_data['meta_data'] : null;
		if (is_array($meta_data)) {
			$event_data['meta_data'] = wp_json_encode($meta_data);
		}

		global $wpdb;
		$wpdb->replace($wpdb->utm_event_tracker_events_table, $event_data);
	}

	/**
	 * Get title of event
	 * 
	 * @since 1.1.2
	 * @return string
	 */
	public function get_title() {
		if (!empty($this->title)) {
			return $this->title;
		}

		$event_type_titles = array(
			'woocommerce_checkout' => esc_html__('Purchased', 'utm-event-tracker'),
			'woocommerce_purchased' => esc_html__('Purchased', 'utm-event-tracker'),
			'woocommerce_add_to_cart' => esc_html__('Added to Cart', 'utm-event-tracker'),
			'contact_form_7_submit' => esc_html__('Form Submit - Contact Form 7', 'utm-event-tracker'),
			'edd_purcahse' => esc_html__('EDD Purchase', 'utm-event-tracker'),
			'edd_add_to_cart' => esc_html__('EDD added to cart', 'utm-event-tracker'),
			'formidable_form_submit' => esc_html__('Form Submit - Formidable', 'utm-event-tracker'),
			'gravity_form_submission' => esc_html__('Form Submit - Gravity', 'utm-event-tracker'),
			'ninja_form_submit' => esc_html__('Form Submit - Ninja', 'utm-event-tracker'),
			'wpforms_submission' => esc_html__('Form Submit - WPForms', 'utm-event-tracker'),
		);

		if (isset($event_type_titles[$this->type])) {
			return $event_type_titles[$this->type];
		}

		return $this->type;
	}

	/**
	 * Set description of this event
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public function set_description() {
		$descriptions = array();

		if (!empty($this->title)) {
			$descriptions['title'] = sprintf(
				/* translators: %s for product cost */
				esc_html__('Title: %s', 'utm-event-tracker'),
				esc_html($this->title)
			);
		}

		$meta_data = $this->meta_data;
		if (!empty($meta_data['form_id'])) {
			$form_events = apply_filters('utm_event_tracker/form_submit_plugins_name', array(
				'ninja_form_submit' => 'Ninja Form',
				'elementor_form_submit' => 'Elementor Form',
				'gravity_form_submission' => 'Gravity Form',
				'contact_form_7_submit' => 'Contact Form 7',
			));

			$plugin_name = 'Unknown';
			if (in_array($this->type, array_keys($form_events))) {
				$plugin_name = $form_events[$this->type];
			}

			$descriptions[] = sprintf(
				/* translators: %1$d for form id, %2$s plugin name of form */
				esc_html__('Form #%1$d (%2$s) has been submitted.', 'utm-event-tracker'),
				absint($meta_data['form_id']),
				$plugin_name
			);
		}

		if ('woocommerce_add_to_cart' === $this->type) {
			$product_id = $this->product_id;
			$variation_id = 0;

			if (!empty($this->variation_id) && absint($this->variation_id) > 0) {
				$variation_id = $this->variation_id;
			}

			$descriptions[] = __('Added to cart:', 'utm-event-tracker');

			if (class_exists('WooCommerce', false)) {
				$product = wc_get_product($product_id);

				$descriptions[] = sprintf(
					/* translators: %s for product name with link */
					__('Product: %s', 'utm-event-tracker'),
					'<a target="_blank" href="' . $product->get_permalink() . '">' . $product->get_name() . '</a>'
				);

				if ($variation_id > 0) {
					$descriptions[] = sprintf(
						/* translators: %d variation id of product */
						__('Variation ID: %d', 'utm-event-tracker'),
						$variation_id
					);
				}

				$descriptions[] = sprintf(
					/* translators: %s for product cost */
					__('Amount: %s', 'utm-event-tracker'),
					number_format($this->amount, 2)
				);
			} else {
				$descriptions[] = sprintf(
					/* translators: %d for product ID */
					__('Product ID: %d', 'utm-event-tracker'),
					$product_id
				);

				if ($variation_id > 0) {
					$descriptions[] = sprintf(
						/* translators: %d for product variation ID */
						__('Variation ID: %d', 'utm-event-tracker'),
						$variation_id
					);
				}

				$descriptions[] = sprintf(
					/* translators: %s for product cost */
					__('Amount: %s', 'utm-event-tracker'),
					number_format($this->amount, 2)
				);
			}
		}

		if ('woocommerce_purchased' === $this->type) {
			$descriptions[] = __('Order Placed:', 'utm-event-tracker');
			$descriptions[] = sprintf(
				/* translators: %s for product cost */
				__('Amount: %s', 'utm-event-tracker'),
				number_format($this->amount, 2)
			);

			$order_id = $this->order_id;

			if (absint($order_id) > 0) {
				if (class_exists('WooCommerce', false)) {
					$order = wc_get_order($order_id);

					if ($order) {
						$order_permalink = add_query_arg(array(
							'page' => 'wc-orders',
							'action' => 'edit',
							'id' => $order_id,
						), admin_url('admin.php'));

						$descriptions[] = sprintf(
							/* translators: %s order ID */
							__('Order ID: %s', 'utm-event-tracker'),
							'<a target="_blank" href="' . esc_url($order_permalink) . '">' . $order_id . '</a>'
						);
					}
				} else {
					$descriptions[] = sprintf(
						/* translators: %s order ID */
						__('Order ID: %d', 'utm-event-tracker'),
						$order_id
					);
				}
			}
		}

		$descriptions = apply_filters('utm_event_tracker/event_descriptions', $descriptions, $this);
		$descriptions = apply_filters('utm_event_tracker/' . $this->type . '/event_descriptions', $descriptions, $this);

		$descriptions[] = sprintf(
			/* translators: %s for date of event */
			__('Date: %s', 'utm-event-tracker'),
			gmdate(get_option('date_format') . ' ' . get_option('time_format'), Utils::get_date($this->created_on, true))
		);

		$description = apply_filters('utm_event_tracker/' . $this->type . '/event_description', implode('<br>', $descriptions), $this);
		$this->description = apply_filters('utm_event_tracker/event_description', $description, $this->type, $this);
	}

	/**
	 * Get description of this event
	 * 
	 * @since 1.0.0
	 * @return string
	 */
	public function get_description() {
		return $this->description;
	}
}
