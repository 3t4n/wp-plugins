<?php
/**
 * Implemented class that builds the Add-On for GF
 */

GFForms::include_feed_addon_framework();

/**
 * Our main class, used as a singleton.
 */
class GFEngage extends GFFeedAddOn {

	protected $_version = GF_ENGAGE_VERSION;
	protected $_min_gravityforms_version = '2.2';
	protected $_slug = 'gravityforms-engage';
	protected $_path = 'gravityforms-engage/gravityforms-engage.php';
	protected $_full_path = __FILE__;
	protected $_url = 'https://cornershopcreative.com';
	protected $_title = 'Gravity Forms Engage Add-On';
	protected $_short_title = 'Engage API';

	/**
	 * Process feeds asyncronously, new as of GF 2.2 and totally worth doing.
	 * See https://www.gravityhelp.com/documentation/article/gffeedaddon/#asynchronous-feed-processing
	 */
	public $_async_feed_processing = true;

	/**
	 * Members plugin integration
	 */
	protected $_capabilities = array( 'gravityforms_engage', 'gravityforms_engage_uninstall' );

	/**
	 * Permissions
	 */
	protected $_capabilities_settings_page = 'gravityforms_engage';
	protected $_capabilities_form_settings = 'gravityforms_engage';
	protected $_capabilities_uninstall     = 'gravityforms_engage_uninstall';

	/**
	 * Other stuff
	 */
	private static $settings;
	private static $api;
	private static $_instance = null;
	private $tags = null;

	/**
	 * Get an instance of this class.
	 *
	 * @return GFEngage
	 */
	public static function get_instance() {
		if ( null === self::$_instance ) {
			self::$_instance = new GFEngage();
		}

		return self::$_instance;
	}

	/**
	 * In addition to evaluating user-specified conditional logic, check whether the current feed is
	 * configured to create offline donations, and avoid creating them until an entry's payment status
	 * is Paid.
	 *
	 * @param array $feed  The Feed Object currently being processed.
	 * @param array $form  The Form Object currently being processed.
	 * @param array $entry The Entry Object currently being processed.
	 */
	public function is_feed_condition_met( $feed, $form, $entry ) {

		// If there's actual conditional logic associated with this feed and it didn't pass, bail.
		if ( ! parent::is_feed_condition_met( $feed, $form, $entry ) ) {
			return false;
		}

		// If this feed doesn't create offline donations, then we don't need to worry about payment
		// status; go ahead and process it.
		if ( ! rgars( $feed, 'meta/createOfflineDonation' ) ) {
			return true;
		}

		// If the entry is Paid, process the feed.
		if ( 'Paid' === rgar( $entry, 'payment_status' ) ) {
			return true;
		}

		// Otherwise, don't process the feed -- wait until the next time the payment status is updated
		// (at which point `$this->maybe_reprocess_feed()` will run).
		$this->log_debug( "GFEngage::is_feed_condition_met(): Feed #{$feed['id']} creates offline donations, but entry #{$entry['id']} payment status is not Paid; not processing feed." );
		return false;
	}

	// # FEED PROCESSING -----------------------------------------------------------------------------------------------
	/**
	 * Process the feed, add the submission to Engage.
	 *
	 * @param array $feed  The feed object to be processed.
	 * @param array $entry The entry object currently being processed.
	 * @param array $form  The form object currently being processed.
	 *
	 * @return void
	 */
	public function process_feed( $feed, $entry, $form ) {
		$this->log_debug( __METHOD__ . '(): Processing feed.' );

		// login to Salsa Engage
		$api = $this->get_api();
		if ( ! is_object( $api ) ) {
			$this->log_error( __METHOD__ . '(): Failed to set up the API.' );
			return;
		}

		$feed_meta = $feed['meta'];

		// retrieve name => value pairs for all fields mapped in the 'mappedFields' field map
		$field_map            = $this->get_field_map_fields( $feed, 'mappedFields' );
		$email                = $this->get_field_value( $form, $entry, $field_map['contacts|EMAIL'] );

		// Abort if email is invalid
		if ( GFCommon::is_invalid_or_empty_email( $email ) ) {
			$this->log_error( __METHOD__ . '(): A valid email address must be provided.' );
			return;
		}

		$override_empty_fields = gf_apply_filters( 'gform_engage_override_empty_fields', $form['id'], true, $form, $entry, $feed );
		if ( ! $override_empty_fields ) {
			$this->log_debug( __METHOD__ . '(): Empty fields will not be overridden.' );
		}

		// Loop through the fields, populating $supporter_data as necessary.
		foreach ( $field_map as $name => $field_id ) {

			// We can skip unassigned stuff.
			if ( '' === $field_id ) {
				continue;
			}

			$field_value = $this->get_field_value( $form, $entry, $field_id );

			// Segments are special
			if ( 'Segments' === $name ) {
				$tags = $this->normalize_segments( $field_value );
				continue;
			}

			// Abbreviate things
			if ( 'Country' === $name || 'State' === $name ) {
				$field_value = $api->abbreviate( $field_value, $name );
			}

			if ( empty( $field_value ) && ! $override_empty_fields ) {
				continue;
			} else {
				$supporter_data[ $name ] = $field_value;
			}
		}//end foreach

		try {

			if ( 'Paid' === rgar( $entry, 'payment_status' )
					&& 'USD' === rgar( $entry, 'currency' )
					&& rgar( $entry, 'payment_amount' )
					&& rgar( $feed_meta, 'createOfflineDonation' ) ) {

				// If US dollar payment information is associated with this entry, and the 'create offline
				// donation' feed setting is enabled, create an offline donation.
				$this->log_debug( __METHOD__ . '(): Saving supporter and offline donation records.' );

				$params = array(
					'donations' => array(
						array(
							'type'                 => 'CHARGE',
							'date'                 => date( 'Y-m-d\TH:i:s.v\Z', strtotime( rgar( $entry, 'payment_date' ) ) ),
							'amount'               => (float) rgar( $entry, 'payment_amount' ),
							'gatewayTransactionId' => rgar( $entry, 'transaction_id' ),
							'supporter'            => $supporter_data,
						),
					),
				);

				$params = gf_apply_filters( 'gform_engage_donation_args_pre_post', $form['id'], $params, $form, $entry, $feed );
				$this->log_debug( __METHOD__ . '(): Calling - offlineDonations, Parameters ' . print_r( $params, true ) );	// phpcs:ignore
				$call = $api->call( '/offlineDonations', 'POST', $params );

				$result = $call->donations[0]->result;
				$supporter_id = ( in_array( $result, array( 'ADDED', 'UPDATED' ), true ) ?
					$call->donations[0]->supporter->supporterId :
					false
				);
			} else {

				// If no payment information is associated with this entry, or the 'create offline donation'
				// feed setting is disabled, simply save the supporter data.
				$this->log_debug( __METHOD__ . '(): Saving supporter record.' );

				$params = array(
					'supporters' => array(
						$supporter_data,
					),
				);

				$params = gf_apply_filters( 'gform_engage_args_pre_post', $form['id'], $params, $form, $entry, $feed );
				$this->log_debug( __METHOD__ . '(): Calling - subscribe, Parameters ' . print_r( $params, true ) );	// phpcs:ignore
				$call = $api->call( '/supporters', 'PUT', $params );

				$result = $call->supporters[0]->result;
				$supporter_id = ( in_array( $result, array( 'ADDED', 'UPDATED' ), true ) ?
					$call->supporters[0]->supporterId :
					false
				);
			}

			// if we successfully added/updated the supporter, try to add segments
			if ( in_array( $result, array( 'ADDED', 'UPDATED' ), true ) ) {

				$this->log_debug( __METHOD__ . "(): API call for $email successful." );

				do_action( 'gfengage_after_process', $entry, $call );

				// inspect the feed to get the segments
				$segment_ids = array();

				foreach ( $feed_meta as $key => $value ) {
					if ( '1' === $value && strpos( $key, 'segment_' ) === 0 ) {
						$segment_ids[] = str_replace( 'segment_', '', $key );
					}
				}

				// pass the segment IDs if present in the feed
				if ( count( $segment_ids ) ) {

					$segment_params = array(
						'supporterIds' => array( $supporter_id ),
					);
					foreach ( $segment_ids as $segment_id ) {
						$segment_params['segmentId'] = $segment_id;
						$this->log_debug( __METHOD__ . '(): Calling - /segments/members, Parameters ' . print_r( $segment_params, true ) );
						$segment = $api->call( '/segments/members', 'PUT', $segment_params );
					}
				} else {
					$this->log_debug( __METHOD__ . "(): No segments to add for $email" );
				}
			} else {

				$this->log_error( __METHOD__ . "(): API call for $email failed. Errors: " . print_r( $api->getErrors(), true ) );
			}//end if

		} catch ( Exception $e ) {

			$this->log_error( __METHOD__ . '(): ' . $e->getCode() . ' - ' . $e->getMessage() );
		}
	}

	/**
	 * Re-trigger maybe_process_feed() when an entry's payment status is updated, so that feeds that
	 * were previously skipped due to payment status can be processed this time around.
	 *
	 * @param int|array $entry The ID of the entry being updated, or the entry data itself.
	 */
	public function maybe_reprocess_feed( $entry ) {

		if ( is_numeric( $entry ) ) {
			$entry = GFAPI::get_entry( $entry );
		}
		$form = GFAPI::get_form( rgar( $entry, 'form_id' ) );

		// (Maybe) add this feed to the async queue.
		$this->maybe_process_feed( $entry, $form );

		// `maybe_process_feed()` adds feed data to the async queue, but some methods of updating entry
		// properties (e.g. `GFAPI::update_entry_property()`) won't ever save or dispatch the queue, so
		// we need to do that ourselves.
		$feed_processor = gf_feed_processor();
		$feed_processor->save()->dispatch();

		// Then we should clear out the queue, just in case it DOES get saved and dispatched later --
		// otherwise our feed, and any others that may have been added prior, will be processed twice.
		// Most of the time that won't be an issue, because most feeds can only be processed once) but
		// I'd rather play it safe.
		$feed_processor->data( array() );
	}
	
	/**
	 * Returns the value of the selected field.
	 *
	 * @param array  $form      The form object currently being processed.
	 * @param array  $entry     The entry object currently being processed.
	 * @param string $field_id The ID of the field being processed.
	 *
	 * @return array
	 */
	public function get_field_value( $form, $entry, $field_id ) {
		$field_value = '';

		switch ( strtolower( $field_id ) ) {

			case 'form_title':
				$field_value = rgar( $form, 'title' );
				break;

			case 'date_created':
				$date_created = rgar( $entry, strtolower( $field_id ) );
				if ( empty( $date_created ) ) {
					// the date created may not yet be populated if this function is called during the validation phase and the entry is not yet created
					$field_value = gmdate( 'Y-m-d H:i:s' );
				} else {
					$field_value = $date_created;
				}
				break;

			case 'ip':
			case 'source_url':
				$field_value = rgar( $entry, strtolower( $field_id ) );
				break;

			default:
				$field = GFFormsModel::get_field( $form, $field_id );

				if ( is_object( $field ) ) {

					$is_integer = intval( $field_id ) === $field_id;
					$input_type = RGFormsModel::get_input_type( $field );

					if ( $is_integer && 'address' === $input_type ) {

						$field_value = $this->get_full_address( $entry, $field_id );

					} elseif ( $is_integer && 'name' === $input_type ) {

						$field_value = $this->get_full_name( $entry, $field_id );

					} elseif ( $is_integer && 'checkbox' === $input_type ) {

						$selected = array();
						foreach ( $field->inputs as $input ) {
							$index = (string) $input['id'];
							if ( ! rgempty( $index, $entry ) ) {
								$selected[] = rgar( $entry, $index );
							}
						}
						$field_value = implode( '|', $selected );

					} elseif ( 'phone' === $input_type && 'standard' === $field->phoneFormat ) {

						// normalize standard phone format
						// format: NPA-NXX-LINE (404-555-1212) when US/CAN
						$field_value = rgar( $entry, $field_id );
						if ( ! empty( $field_value ) && preg_match( '/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/', $field_value, $matches ) ) {
							$field_value = sprintf( '%s-%s-%s', $matches[1], $matches[2], $matches[3] );
						}
					} else {

						if ( is_callable( array( 'GF_Field', 'get_value_export' ) ) ) {
							$field_value = $field->get_value_export( $entry, $field_id );
						} else {
							$field_value = rgar( $entry, $field_id );
						}
					}//end if
				} else {

					$field_value = rgar( $entry, $field_id );

				}//end if
		}//end switch

		return $field_value;
	}



	// # ADMIN FUNCTIONS -----------------------------------------------------------------------------------------------
	/**
	 * Plugin starting point. Handles hooks, loading of language files and PayPal delayed payment support.
	 */
	public function init() {

		parent::init();

		add_action( 'gform_post_payment_completed', array( $this, 'maybe_reprocess_feed' ) );
		add_action( 'gform_update_payment_status', array( $this, 'maybe_reprocess_feed' ) );
	}

	/**
	 * Clear the cached settings on uninstall.
	 *
	 * @return bool
	 */
	public function uninstall() {

		parent::uninstall();

		GFCache::delete( 'engage_plugin_settings' );

		return true;
	}

	// ------- Plugin settings -------
	/**
	 * Configures the settings which should be rendered on the add-on settings tab.
	 *
	 * @return array
	 */
	public function plugin_settings_fields() {
		return array(
			array(
				'title'       => '',
				'description' => '<p>' . esc_html__( 'Use Gravity Forms to collect user information and add it to your Engage supporter list, provided your Engage account is configured for API calls.', 'gfengage' ) . '</p>',
				'fields'      => array(
					array(
						'name'              => 'engage_api_key',
						'label'             => esc_html__( 'Engage API Key', 'gfengage' ),
						'type'              => 'text',
						'input_type'        => 'text',
						'class'             => 'large',
						'tooltip'           => esc_html__( 'Enter the API key for your Engage account.', 'gfengage' ),
					),
					array(
						'label'             => 'Engage API Cache',
						'type'              => 'engage_api_clear_cache_button',
						'name'              => 'engage_api_clear_cache',
						'tooltip'           => esc_html__( 'If you need to refresh the list of supporter segments provided by Engage, use this. Otherwise, the cache automatically clears hourly.', 'gfengage' ),
					),
				),
			),
		);
	}

	/**
	 * Custom Setting Field to display clear cache button.
	 */
	public function settings_engage_api_clear_cache_button() {
		?>
		<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=gf_settings&subview=gravityforms-engage' ), 'engage_api_clearing_cache', 'engage_api_clear_cache' ) ); ?>"
		class="button button-primary"><?php esc_html_e( 'Clear Cache', 'gfengage' ); ?></a>
		<?php
	}

	/**
	 * Fetch the settings the user submitted.
	 *
	 * @return array The post data containing the updated settings.
	 */
	public function get_posted_settings() {
		$post_data = parent::get_posted_settings();

		if ( $this->is_plugin_settings( $this->_slug ) && $this->is_save_postback() && ! empty( $post_data ) ) {

			$feed_count = $this->count_feeds();

			if ( $feed_count > 0 ) {
				$settings               = $this->get_previous_settings();
				$settings['engage_api_key'] = rgar( $post_data, 'engage_api_key' );
				return $settings;
			} else {
				GFCache::delete( 'engage_plugin_settings' );
			}
		}

		return $post_data;
	}

	/**
	 * Count how many Engage feeds exist. Presumably this'll be just one, but the Feeds framework allows for more
	 *
	 * @return int
	 */
	public function count_feeds() {
		global $wpdb;

		return $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM {$wpdb->prefix}gf_addon_feed WHERE addon_slug=%s", $this->_slug ) );
	}

	// ------- Feed list page -------
	/**
	 * Prevent feeds being listed or created if the api key isn't valid.
	 *
	 * @return bool
	 */
	public function can_create_feed() {

		$settings = $this->get_plugin_settings();

		return $this->is_valid_engage_auth( $settings['engage_api_key'] );
	}

	/**
	 * If the api key is invalid or empty return the appropriate message.
	 *
	 * @return string
	 */
	public function configure_addon_message() {

		// translators: Placeholder is the plugin's name.
		$settings_label = sprintf( esc_html__( '%s Settings', 'gravityforms' ), $this->get_short_title() );
		// translators: First placeholder is plugin settings url, second is the settings label.
		$settings_link  = sprintf( '<a href="%s">%s</a>', esc_url( $this->get_plugin_settings_url() ), $settings_label );

		$settings = $this->get_plugin_settings();

		if ( rgempty( 'engage_api_key', $settings ) ) {

			// translators: Placeholder is a link to adjust this plugin's settings.
			return sprintf( esc_html__( 'To get started, please configure your %s.', 'gravityforms' ), $settings_link );
		}

		// translators: Placeholder is a link to adjust this plugin's settings.
		return sprintf( esc_html__( 'Unable to connect to Engage with the provided credentials. Please make sure you have entered valid information on the %s page.', 'gfengage' ), $settings_link );

	}

	/**
	 * Display a warning message instead of the feeds if the API key isn't valid.
	 *
	 * @param array   $form The form currently being edited.
	 * @param integer $feed_id The current feed ID.
	 */
	public function feed_edit_page( $form, $feed_id ) {

		if ( ! $this->can_create_feed() ) {

			echo '<h3><span>' . esc_html( $this->feed_settings_title() ) . '</span></h3>';
			echo '<div>' . wp_kses( $this->configure_addon_message() ) . '</div>';

			return;
		}

		parent::feed_edit_page( $form, $feed_id );
	}

	/**
	 * Configures which columns should be displayed on the feed list page.
	 *
	 * @return array
	 */
	public function feed_list_columns() {
		return array(
			'feedName'        => esc_html__( 'Name', 'gfengage' ),
			'engage_segments' => esc_html__( 'Engage Segment(s)', 'gfengage' ),
		);
	}

	/**
	 * Output a list of the segments this feed pushes into
	 */
	public function get_column_value_engage_segments( $item ) {

		$segment_ids = array();

		foreach ( $item['meta'] as $meta => $value ) {
			if ( strpos( $meta, 'segment_' ) === 0 && $value ) {
				$segment_ids[] = str_ireplace( 'segment_', '', $meta );
			}
		}

		if ( ! count( $segment_ids ) ) {
			$segment_ids = array( '<em>none</em>' );
		}

		// try to convert segment ids to segment names using names stored in transient
		$segment_data = self::get_engage_segments();
		foreach ( $segment_ids as $key => $sid ) {
			foreach ( $segment_data as $seg ) {
				if ( $seg['segmentId'] === $sid ) {
					$segment_ids[ $key ] = $seg['name'];
				}
			}
		}

		return implode( ', ', $segment_ids );
	}

	/**
	 * Override GFFeedAddOn::get_feed_settings_fields() so we can change fields on a per-feed basis.
	 */
	public function get_feed_settings_fields() {

		// Get standard feed fields.
		$fields = parent::get_feed_settings_fields();

		// If we're editing an existing feed, make the offline donation field default to OFF, so the
		// behavior of existing feeds (from earlier versions of the plugin) isn't changed.
		if ( $this->get_current_feed_id() > 0 ) {
			$donation_field = $this->get_field( 'createOfflineDonation', $fields );
			$donation_field['choices'][0]['default_value'] = false;
			$fields = $this->replace_field( 'createOfflineDonation', $donation_field, $fields );
		}
		return $fields;
	}

	/**
	 * Configures the settings which should be rendered on the feed edit page.
	 *
	 * @return array The feed settings.
	 */
	public function feed_settings_fields() {
		return array(
			array(
				'title'       => esc_html__( 'Engage Feed Settings', 'gfengage' ),
				'description' => '',
				'fields'      => array(
					array(
						'name'     => 'feedName',
						'label'    => esc_html__( 'Name', 'gfengage' ),
						'type'     => 'text',
						'required' => true,
						'class'    => 'medium',
						'tooltip'  => '<h6>' . esc_html__( 'Name', 'gfengage' ) . '</h6>' . esc_html__( 'Enter a feed name to uniquely identify this setup.', 'gfengage' ),
					),
					array(
						'name'      => 'mappedFields',
						'label'     => esc_html__( 'Map Fields', 'gfengage' ),
						'type'      => 'field_map',
						'field_map' => $this->supporter_field_map(),
						'tooltip'   => '<h6>' . esc_html__( 'Map Fields', 'gfengage' ) . '</h6>' . esc_html__( 'Associate your Engage supporter fields with the appropriate Gravity Form fields.', 'gfengage' ),
					),
					array(
						'name'       => 'segments',
						'label'      => esc_html__( 'Segments', 'gfengage' ),
						'dependency' => array( $this, 'has_engage_segments' ),
						'type'       => 'checkbox',
						'tooltip'    => '<h6>' . esc_html__( 'Segments', 'gfengage' ) . '</h6>' . esc_html__( 'Select one or more segments users will be assigned to in addition to being subscribed to Engage. Optional.', 'gfengage' ),
						'choices'    => $this->engage_segment_choices(),
					),
					array(
						'name' => 'createOfflineDonation',
						'label' => esc_html__( 'Donation', 'gfengage' ),
						'type'  => 'checkbox',
						'tooltip' => implode( '<br /><br />', array(
							esc_html__( 'When this setting is disabled, no donation data will be recorded in Engage.', 'gfengage' ),
							esc_html__( 'When this setting is enabled, and a user makes a payment in U.S. dollars using this form, the date, amount, and transaction ID will be sent to Engage as an offline donation (sometimes referred to as an imported donation).', 'gfengage' ),
							esc_html__( 'Note that currencies other than U.S. dollars will be ignored, because Engage does not support other currencies.', 'gfengage' ),
							esc_html__( 'Note that Gravity Forms Engage Add-On does not process payments; this setting, when enabled, only saves a record of payment having been made. You will need to use another add-on, such as PayPal, Authorize.net, or Stripe, to charge a user’s credit or debit card.', 'gfengage' ),
						) ),
						'choices' => array(
							array(
								'label'         => esc_html__( 'When a payment is made using this form, record it as an offline donation. (When this box is checked and no payment is made, this feed will not be processed.)', 'gfengage' ),
								'name'          => 'createOfflineDonation',
								'default_value' => true,
							),
						),
					),
					array(
						'name'    => 'optinCondition',
						'label'   => esc_html__( 'Conditional Logic', 'gfengage' ),
						'type'    => 'feed_condition',
						'tooltip' => '<h6>' . esc_html__( 'Conditional Logic', 'gfengage' ) . '</h6>' . esc_html__( 'When conditional logic is enabled, form submissions will only be passed to Engage when the conditions are met. When disabled all form submissions will be exported.', 'gfengage' ),
					),
					array(
						'type' => 'save',
					),
					array(
						'type'    => 'marketing_plea',
						'name'    => 'sharing',
						'label'   => esc_html__( 'Like This Add-On?', 'gfengage' ),
					),
				),
			),
		);
	}

	/**
	 * Return an array of Engage supporter fields which can be mapped to the Form fields/entry meta.
	 *
	 * @return array
	 */
	public function supporter_field_map() {

		$field_map = array();

		$supporter_fields = array(
			'supporterId'           => 'Supporter ID',
			'title'                 => 'Title',
			'firstName'             => 'First Name',
			'middleName'            => 'Middle Name',
			'lastName'              => 'Last Name',
			'suffix'                => 'Suffix',
			'dateOfBirth'           => 'Birthdate (YYYY-MM-DD)',
			'gender'                => 'Gender',
			'externalSystemId'      => 'External ID',
			'address|addressLine1'  => 'Address Line 1',
			'address|addressLine2'  => 'Address Line 2',
			'address|city'          => 'City',
			'address|state'         => 'State',
			'address|postalCode'    => 'Postal Code',
			'address|county'        => 'County',
			'address|country'       => 'Country (e.g. US,MX)',
			'contacts|CELL_PHONE'   => 'Cell Phone',
			'contacts|WORK_PHONE'   => 'Work Phone',
			'contacts|HOME_PHONE'   => 'Home Phone',
			'contacts|EMAIL'        => 'Email',
			'contacts|EMAIL_status' => 'Email Status',
			'contacts|FACEBOOK_ID'  => 'Facebook ID',
			'contacts|TWITTER_ID'   => 'Twitter ID',
			'contacts|LINKEDIN_ID'  => 'LinkedIn ID',
		);

		foreach ( $supporter_fields as $field => $friendly ) {
			$field_map[] = array(
				'name'       => $field,
				'label'      => $friendly,
				'required'   => 'Email' === $friendly ? true : false,
				'field_type' => 'Email' === $friendly ? array( 'email', 'hidden' ) : '',
			);
		}

		return $field_map;
	}

	/**
	 * Does the Engage account have any segments configured?
	 *
	 * @return bool
	 */
	public function has_engage_segments() {
		$segments = $this->get_engage_segments();
		return ! empty( $segments );
	}

	/**
	 * Define the markup for the engage_segments type field.
	 *
	 * @return string|void
	 */
	public function engage_segment_choices() {

		$segments = $this->get_engage_segments();
		$choices  = array();

		foreach ( $segments as $segment ) {
			$choices[] = array(
				'label' => $segment['name'],
				'name'  => 'segment_' . $segment['segmentId'],
			);
		}

		return $choices;

	}

	/**
	 * Define which field types can be used for the group conditional logic.
	 * Probably NO LONGER NECESSARY
	 *
	 * @return array
	 */
	public function get_conditional_logic_fields() {
		$form   = $this->get_current_form();
		$fields = array();
		foreach ( $form['fields'] as $field ) {
			if ( $field->is_conditional_logic_supported() ) {
				$fields[] = array(
					'value' => $field->id,
					'label' => GFCommon::get_label( $field ),
				);
			}
		}

		return $fields;
	}


	// # HELPERS -------------------------------------------------------------------------------------------------------
	/**
	 * Checks to make sure the Engage credentials stored in settings actually work!
	 */
	public function is_valid_engage_auth( $api_key ) {
		if ( ! class_exists( 'EngageConnector' ) ) {
			require_once( 'class-engage-api.php' );
		}
		$api = EngageConnector::initialize( $api_key );
		if ( count( $api->getErrors() ) ) {
			return false;
		}
		return $api;
	}

	/**
	 * Validate the API Key and return an instance of EngageConnector class.
	 *
	 * @return EngageConnector|null
	 */
	private function get_api() {

		if ( self::$api ) {
			return self::$api;
		}

		if ( self::$settings ) {
			$settings = self::$settings;
		} else {
			$settings = $this->get_plugin_settings();
			self::$settings = $settings;
		}

		$api = null;

		require_once( 'class-engage-api.php' );

		try {
			$api = EngageConnector::initialize( $settings['engage_api_key'] );

		} catch ( Exception $e ) {
			$this->log_error( __METHOD__ . '(): Failed to set up the API.' );
			$this->log_error( __METHOD__ . '(): ' . $e->getCode() . ' - ' . $e->getMessage() );
			return null;
		}

		self::$api = $api;
		return self::$api;
	}

	/**
	 * Retrieve the segments.
	 *
	 * @return array|bool
	 */
	private function get_engage_segments() {

		$this->log_debug( __METHOD__ . '(): Retrieving segments.' );

		// Use the cached segments list if we have it.
		if ( get_transient( 'gfengage-segments' ) ) {
			return get_transient( 'gfengage-segments' );
		}

		$api = $this->get_api();

		try {

			$segments = $api->getSegments();

			// save the array for an hour for later recall
			set_transient( 'gfengage-segments', $segments, HOUR_IN_SECONDS );

		} catch ( Exception $e ) {

			$this->log_error( __METHOD__ . '(): ' . $e->getCode() . ' - ' . $e->getMessage() );
			$$segments = array();

		}

		if ( rgar( $segments, 'status' ) === 'error' ) {

			$this->log_error( __METHOD__ . '(): ' . print_r( $segments, 1 ) );	// phpcs:ignore
			$segments = array();

		}

		return $segments;
	}


	/**
	 * Returns the combined value of the specified Address field.
	 *
	 * @param array  $entry The entry currently being processed.
	 * @param string $field_id The ID of the field to retrieve the value for.
	 *
	 * @return string
	 */
	public function get_full_address( $entry, $field_id ) {
		$street_value  = str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.1' ) ) );
		$street2_value = str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.2' ) ) );
		$city_value    = str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.3' ) ) );
		$state_value   = str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.4' ) ) );
		$zip_value     = trim( rgar( $entry, $field_id . '.5' ) );
		$country_value = trim( rgar( $entry, $field_id . '.6' ) );

		if ( ! empty( $country_value ) ) {
			$country_value = GF_Fields::get( 'address' )->get_country_code( $country_value );
		}

		$address = array(
			! empty( $street_value ) ? $street_value : '-',
			$street2_value,
			! empty( $city_value ) ? $city_value : '-',
			! empty( $state_value ) ? $state_value : '-',
			! empty( $zip_value ) ? $zip_value : '-',
			$country_value,
		);

		return implode( '  ', $address );
	}

	/**
	 * Check if a provided email is, in fact, an email address.
	 */
	static function is_valid_email( $email ) {
		return (bool) filter_var( $email, FILTER_VALIDATE_EMAIL );
	}


	/**
	 * Sharing tout
	 */
	public function settings_marketing_plea() {
		?>
		<ul class="gf-engage-marketing">
			<li class="share"><a href="#" data-service="facebook">Share it on Facebook »</a></li>
			<li class="share"><a href="#" data-service="twitter">Tweet it »</a></li>
			<li><a href="https://wordpress.org/plugins/gf-engage-add-on/reviews/#new-post" target="_blank">Review it on WordPress.org »</a></li>
		</ul>
		<script>
			/**
			 * Sharing tools
			 */
			function GFS_Sharing( $ ) {

				var sharer = {
					// Initialize the singleton
					init: function() {
						this.buttons = $( '.gf-engage-marketing > .share a' );
						if ( this.buttons.length == 0 ) {
							return;
						}
						this.buttons.on( 'click', $.proxy( this, 'onClick' ) );
					},

					// Get the url, title, and description of the page
					// Cache the data after the first get
					getPageData: function( e ) {
						if ( !this._data ) {
							this._data = {};
							this._data.title       = "I've got the flexibility of #WordPress Gravity Forms married with my Salsa Engage thanks to @Cornershop, it's awesome!";
							this._data.url         = "https://wordpress.org/plugins/gf-engage-add-on/";
							this._data.description = "Check out this Gravity Forms Add-On to feed submission data into the Salsa \"Engage\" CRM/fundraising/advocacy platform.";
							this._data.target = e;
						}
						return this._data;
					},

					// Event handler for the share buttons
					onClick: function( event ) {
						var service = $(event.target).data('service');
						if ( this[ 'do_' + service ] ) {
							this[ 'do_' + service ]( this.getPageData( event.target ) );
						}
						return false;
					},

					// Handle Twitter
					do_twitter: function( data ) {
						var url = 'https://twitter.com/intent/tweet?' + $.param({
							original_referer: document.title,
							text: $(data.target).data('tweet') || data.title,
							url: data.url
						});
						if ( $('.en_social_buttons .en_twitter a').length ) {
							url = $.trim( $('.en_social_buttons .en_twitter a').attr('href') );
						}
						this.popup({
							url: url,
							name: 'twitter_share'
						});
					},

					// Handle Facebook
					do_facebook: function( data ) {
						var url = 'https://www.facebook.com/sharer/sharer.php?' + $.param({
							u: data.url
						});
						if ( $('.en_social_buttons .en_facebook a').length ) {
							url = $.trim( $('.en_social_buttons .en_facebook a').attr('href') );
						}
						this.popup({
							url: url,
							name: 'facebook_share'
						});
					},

					// Create and open a popup
					popup: function( data ) {
						if ( !data.url ) {
							return;
						}

						$.extend( data, {
							name: '_blank',
							height: 600,
							width: 845,
							menubar: 'no',
							status: 'no',
							toolbar: 'no',
							resizable: 'yes',
							left: Math.floor(screen.width/2 - 845/2),
							top: Math.floor(screen.height/2 - 600/2)
						});

						var specNames = 'height width menubar status toolbar resizable left top'.split( ' ' );
						var specs = [];
						for( var i=0; i<specNames.length; ++i ) {
							specs.push( specNames[i] + '=' + data[specNames[i]] );
						}
						return window.open( data.url, data.name, specs.join(',') );
					}
				};

				sharer.init();
			}

			GFS_Sharing( jQuery );
		</script>

		<?php
	}
}
