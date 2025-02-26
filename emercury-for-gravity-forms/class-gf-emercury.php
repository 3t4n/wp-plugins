<?php

GFForms::include_feed_addon_framework();

/**
 * Gravity Forms Emercury Add-On.
 *
 * @since     1.0
 * @package   GravityForms
 * @author    Emercury
 * @copyright Copyright (c) 2019, Emercury
 */
class GFEmercury extends GFFeedAddOn {

	/**
	 * Contains an instance of this class, if available.
	 *
	 * @access private
	 * @var    object $_instance If available, contains an instance of this class.
	 */
	private static $_instance = null;

	/**
	 * Defines the version of the Emercury Add-On.
	 *
	 * @access protected
	 * @var    string $_version Contains the version, defined from emercury.php
	 */
	protected $_version = GF_EMERCURY_VERSION;

	/**
	 * Defines the minimum Gravity Forms version required.
	 *
	 * @access protected
	 * @var    string $_min_gravityforms_version The minimum version required.
	 */
	protected $_min_gravityforms_version = '1.9.12';

	/**
	 * Defines the plugin slug.
	 *
	 * @access protected
	 * @var    string $_slug The slug used for this plugin.
	 */
	protected $_slug = 'gravityforms-emercury';

	/**
	 * Defines the main plugin file.
	 *
	 * @access protected
	 * @var    string $_path The path to the main plugin file, relative to the plugins folder.
	 */
	protected $_path = 'gravityforms-emercury/emercury.php';

	/**
	 * Defines the full path to this class file.
	 *
	 * @access protected
	 * @var    string $_full_path The full path.
	 */
	protected $_full_path = __FILE__;

	/**
	 * Defines the URL where this Add-On can be found.
	 *
	 * @access protected
	 * @var    string The URL of the Add-On.
	 */
	protected $_url = 'http://www.gravityforms.com';

	/**
	 * Defines the title of this Add-On.
	 *
	 * @access protected
	 * @var    string $_title The title of the Add-On.
	 */
	protected $_title = 'Gravity Forms Emercury Add-On';

	/**
	 * Defines the short title of the Add-On.
	 *
	 * @access protected
	 * @var    string $_short_title The short title.
	 */
	protected $_short_title = 'Emercury';

	/**
	 * Defines if Add-On should use Gravity Forms servers for update data.
	 *
	 * @access protected
	 * @var    bool
	 */
	protected $_enable_rg_autoupgrade = true;

	/**
	 * Defines the capabilities needed for the Emercury Add-On
	 *
	 * @access protected
	 * @var    array $_capabilities The capabilities needed for the Add-On
	 */
	protected $_capabilities = array( 'gravityforms_emercury', 'gravityforms_emercury_uninstall' );

	/**
	 * Defines the capability needed to access the Add-On settings page.
	 *
	 * @access protected
	 * @var    string $_capabilities_settings_page The capability needed to access the Add-On settings page.
	 */
	protected $_capabilities_settings_page = 'gravityforms_emercury';

	/**
	 * Defines the capability needed to access the Add-On form settings page.
	 *
	 * @access protected
	 * @var    string $_capabilities_form_settings The capability needed to access the Add-On form settings page.
	 */
	protected $_capabilities_form_settings = 'gravityforms_emercury';

	/**
	 * Defines the capability needed to uninstall the Add-On.
	 *
	 * @access protected
	 * @var    string $_capabilities_uninstall The capability needed to uninstall the Add-On.
	 */
	protected $_capabilities_uninstall = 'gravityforms_emercury_uninstall';

	/**
	 * Defines the Emercury list field tag name.
	 *
	 * @access protected
	 * @var    string $merge_var_name The Emercury list field tag name; used by gform_emercury_field_value.
	 */
	protected $merge_var_name = '';

	/**
	 * Contains an instance of the Emercury API library, if available.
	 *
	 * @access protected
	 * @var    object $api If available, contains an instance of the Emercury API library.
	 */
	private $api = null;

	/**
	 * Get an instance of this class.
	 *
	 * @access public
	 *
	 * @return GFEmercury
	 */
	public static function get_instance() {

		if ( null === self::$_instance ) {
			self::$_instance = new self;
		}

		return self::$_instance;

	}

	/**
	 * Autoload the required libraries.
	 *
	 * @access public
	 *
	 * @uses GFAddOn::is_gravityforms_supported()
	 */
	public function pre_init() {

		parent::pre_init();

		if ( $this->is_gravityforms_supported() ) {

			// Load the Mailgun API library.
			if ( ! class_exists( 'GF_Emercury_API' ) ) {
				require_once( 'includes/class-gf-emercury-api.php' );
			}

		}

	}

	/**
	 * Plugin starting point. Handles hooks, loading of language files.
	 *
	 * @access public
	 */
	public function init() {

		parent::init();

    	add_filter( 'gform_entry_detail_meta_boxes', array( $this, 'register_emercury_meta_box' ), 10, 3 );
	}

	/**
	 * Remove unneeded settings.
	 *
	 * @access public
	 */
	public function uninstall() {

		parent::uninstall();

		GFCache::delete( 'emercury_plugin_settings' );
		delete_option( 'gf_emercury_settings' );
		delete_option( 'gf_emercury_version' );
	}

	/**
	 * Add the meta box to the entry detail page.
	 *
	 * @param array $meta_boxes The properties for the meta boxes.
	 * @param array $entry The entry currently being viewed/edited.
	 * @param array $form The form object used to process the current entry.
	 *
	 * @return array
	 */
	public function register_emercury_meta_box( $meta_boxes, $entry, $form ) {
	    // If the form has an active feed belonging to this add-on and the API can be initialized, add the meta box.
	    if ( $this->get_active_feeds( $form['id'] ) && $this->initialize_api() ) {
	        $meta_boxes[ 'gf_emercury_lists' ] = array(
	            'title'    => 'Emercury List',
	            'callback' => array( $this, 'add_emercury_lists_meta_box' ),
	            'context'  => 'side',
	        );
	    }
	 
	    return $meta_boxes;
	}

	/**
	 * The callback used to echo the content to the meta box.
	 *
	 * @param array $args An array containing the form and entry objects.
	 */
	public function add_emercury_lists_meta_box( $args ) {
	 	
	 	$html  = '';
	    $entry = $args['entry'];
	    $lists_name = gform_get_meta( $entry['id'], 'key_emercury_lists_name' );

	    $html .= '<p><strong>Lists name:</strong> '. $lists_name .'</p>';
	 
	    echo $html;
	}

	/**
	 * Configures the settings which should be rendered on the add-on settings tab.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function plugin_settings_fields() {

		return array(
			array(
				'description' => '<p>' .
					sprintf(
						esc_html__( 'Emercury makes it easy to send email newsletters to your customers, manage your subscriber lists, and track campaign performance. Use Gravity Forms to collect customer information and automatically add it to your Emercury subscriber list. If you don\'t have a Emercury account, you can %1$ssign up for one here.%2$s', 'gravityforms-emercury' ),
						'<a href="http://www.emercury.net/" target="_blank">', '</a>'
					)
					. '</p>',
				'fields'      => array(
					array(
						'name'              => 'apiEmail',
						'label'             => esc_html__( 'Email Address', 'gravityforms-emercury' ),
						'type'              => 'text',
						'class'             => 'medium',
						'feedback_callback' => array( $this, 'initialize_api' ),
					),
					array(
						'name'              => 'apiKey',
						'label'             => esc_html__( 'API Key', 'gravityforms-emercury' ),
						'type'              => 'text',
						'class'             => 'medium',
						'feedback_callback' => array( $this, 'initialize_api' ),
					),
				),
			),
		);

	}

	/**
	 * Configures the settings which should be rendered on the feed edit page.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function feed_settings_fields() {

		return array(
			array(
				'title'  => esc_html__( 'Emercury Feed Settings', 'gravityforms-emercury' ),
				'fields' => array(
					array(
						'name'     => 'feedName',
						'label'    => esc_html__( 'Name', 'gravityforms-emercury' ),
						'type'     => 'text',
						'required' => true,
						'class'    => 'medium',
						'tooltip'  => sprintf(
							'<h6>%s</h6>%s',
							esc_html__( 'Name', 'gravityforms-emercury' ),
							esc_html__( 'Enter a feed name to uniquely identify this setup.', 'gravityforms-emercury' )
						),
					),
					array(
						'name'     => 'emercuryList',
						'label'    => esc_html__( 'Emercury List', 'gravityforms-emercury' ),
						'type'     => 'emercury_list',
						'required' => true,
						'tooltip'  => sprintf(
							'<h6>%s</h6>%s',
							esc_html__( 'Emercury List', 'gravityforms-emercury' ),
							esc_html__( 'Select the Emercury list you would like to add your contacts to.', 'gravityforms-emercury' )
						),
					),
				),
			),
			array(
				'dependency' => 'emercuryList',
				'fields'     => array(
					array(
						'name'      => 'mappedFields',
						'label'     => esc_html__( 'Map Fields', 'gravityforms-emercury' ),
						'type'      => 'field_map',
						'field_map' => $this->merge_vars_field_map(),
						'tooltip'   => sprintf(
							'<h6>%s</h6>%s',
							esc_html__( 'Map Fields', 'gravityforms-emercury' ),
							esc_html__( 'Associate your Emercury merge tags to the appropriate Gravity Form fields by selecting the appropriate form field from the list.', 'gravityforms-emercury' )
						),
					),
					array(
						'name'    => 'optinCondition',
						'label'   => esc_html__( 'Conditional Logic', 'gravityforms-emercury' ),
						'type'    => 'feed_condition',
						'tooltip' => sprintf(
							'<h6>%s</h6>%s',
							esc_html__( 'Conditional Logic', 'gravityforms-emercury' ),
							esc_html__( 'When conditional logic is enabled, form submissions will only be exported to Emercury when the conditions are met. When disabled all form submissions will be exported.', 'gravityforms-emercury' )
						),
					),
					array( 'type' => 'save' ),
				),
			),
		);

	}

	/**
	 * Define the markup for the emercury_list type field.
	 *
	 * @access public
	 *
	 * @param array $field The field properties.
	 * @param bool  $echo  Should the setting markup be echoed. Defaults to true.
	 *
	 * @return string
	 */
	public function settings_emercury_list( $field, $echo = true ) {

		// Initialize HTML string.
		$html = '';

		// If API is not initialized, return.
		if ( ! $this->initialize_api() ) {
			return $html;
		}

		try {

			// Log contact lists request parameters.
			$this->log_debug( __METHOD__ . '(): Retrieving contact lists.');

			// Get lists.
			$lists = $this->api->getAudience();

		} catch ( Exception $e ) {

			// Log that contact lists could not be obtained.
			$this->log_error( __METHOD__ . '(): Could not retrieve Emercury contact lists; ' . $e->getMessage() );

			// Display error message.
			printf( esc_html__( 'Could not load Emercury contact lists. %sError: %s', 'gravityforms-emercury' ), '<br/>', $e->getMessage() );

			return;

		}

		// If no lists were found, display error message.
		if ( $lists['code'] == 'error' ) {

			// Log that no lists were found.
			$this->log_error( __METHOD__ . '(): Could not load Emercury contact lists; no lists found.' );

			// Display error message.
			echo '<p>'. $lists['message'] .'</p>';

			return;
		}

		// Log number of lists retrieved.
		$this->log_debug( __METHOD__ . '(): Number of lists: ' . count( $lists['message']->audiences->audience ) );

		// Initialize select options.
		$options = array(
			array(
				'label' => esc_html__( 'Select a Emercury List', 'gravityforms-emercury' ),
				'value' => '',
			),
		);

		// Loop through Emercury lists.
		foreach ( $lists['message']->audiences->audience as $list ) {

			// Add list to select options.
			$options[] = array(
				'label' => esc_html( $list->name ),
				'value' => esc_attr( $list->id ),
			);

		}

		// Add select field properties.
		$field['type']     = 'select';
		$field['choices']  = $options;
		$field['onchange'] = 'jQuery(this).parents("form").submit();';

		// Generate select field.
		$html = $this->settings_select( $field, false );

		if ( $echo ) {
			echo $html;
		}

		return $html;

	}

	/**
	 * Return an array of Emercury list fields which can be mapped to the Form fields/entry meta.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function merge_vars_field_map() {

		// Initialize field map array.
		$field_map = array(
			'email' => array(
				'name'       => 'email',
				'label'      => esc_html__( 'Email Address', 'gravityforms-emercury' ),
				'required'   => true,
				'field_type' => array( 'email', 'hidden' ),
			),
		);

		// If unable to initialize API, return field map.
		if ( ! $this->initialize_api() ) {
			return $field_map;
		}

		try {

			// Get merge fields.
			$merge_fields = $this->api->getCustomFields();

		} catch ( Exception $e ) {

			// Log error.
			$this->log_error( __METHOD__ . '(): Unable to getCustomFields for Emercury; ' . $e->getMessage() );

			return $field_map;

		}

		// If merge fields exist, add to field map.
		if ( count( $merge_fields['message']->Fields->Field ) > 0 ) {

			// Loop through merge fields.
			foreach ( $merge_fields['message']->Fields->Field as $merge_field ) {

				$pos = strripos($merge_field->name, 'Field ');

                if ($pos !== false) {
                    continue;
                }

				// Define required field type.
				$field_type = null;

				// If this is an email merge field, set field types to "email" or "hidden".
				if ( 'E-mail' === (string) $merge_field->name ) {
					$field_type = array( 'email', 'hidden' );
				}

				// If this is an address merge field, set field type to "address".
				if ( 'City' === (string) $merge_field->name ||
					 'Zip' === (string) $merge_field->name  ||
					 'Street Address' === (string) $merge_field->name  ||
					 'Country' === (string) $merge_field->name ) {
						$field_type = array( 'address' );
				}

				// Add to field map.
				$field_map[ (string)$merge_field->real_name ] = array(
					'name'       => (string) $merge_field->real_name,
					'label'      => (string) $merge_field->name,
					'field_type' => $field_type,
				);

			}

		} else {
			echo '<p>'. $merge_fields['message'] .'</p>';
			return;
		}

		return $field_map;
	}

	/**
	 * Prevent feeds being listed or created if the API key isn't valid.
	 *
	 * @access public
	 *
	 * @return bool
	 */
	public function can_create_feed() {

		return $this->initialize_api();
	}

	/**
	 * Configures which columns should be displayed on the feed list page.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function feed_list_columns() {

		return array(
			'feedName'            => esc_html__( 'Name', 'gravityforms-emercury' ),
			'emercury_list_name' => esc_html__( 'Emercury List', 'gravityforms-emercury' ),
		);

	}

	/**
	 * Returns the value to be displayed in the Emercury List column.
	 *
	 * @access public
	 *
	 * @param array $feed The feed being included in the feed list.
	 *
	 * @return string
	 */
	public function get_column_value_emercury_list_name( $feed ) {

		// If unable to initialize API, return the list ID.
		if ( ! $this->initialize_api() ) {
			return rgars( $feed, 'meta/emercuryList' );
		}

		try {

			// Get list.
			$listID = rgars( $feed, 'meta/emercuryList' );
			$list = $this->api->getAudienceID( $listID );

			// Return list name.
			return $list;

		} catch ( Exception $e ) {

			// Log error.
			$this->log_error( __METHOD__ . '(): Unable to get Emercury list for feed list; ' . $e->getMessage() );

			// Return list ID.
			return rgars( $feed, 'meta/emercuryList' );

		}

	}

	/**
	 * Process the feed, subscribe the user to the list.
	 *
	 * @access public
	 *
	 * @param array $feed  The feed object to be processed.
	 * @param array $entry The entry object currently being processed.
	 * @param array $form  The form object currently being processed.
	 *
	 * @return array
	 */
	public function process_feed( $feed, $entry, $form ) {

		// Log that we are processing feed.
		$this->log_debug( __METHOD__ . '(): Processing feed.' );

		// If unable to initialize API, log error and return.
		if ( ! $this->initialize_api() ) {
			$this->add_feed_error( esc_html__( 'Unable to process feed because API could not be initialized.', 'gravityforms-emercury' ), $feed, $entry, $form );
			return $entry;
		}

		// Set current merge variable name.
		$this->merge_var_name = 'email';

		// Get field map values.
		$field_map = $this->get_field_map_fields( $feed, 'mappedFields' );

		// Get mapped email address.
		$email = $this->get_field_value( $form, $entry, $field_map['email'] );

		// If email address is invalid, log error and return.
		if ( GFCommon::is_invalid_or_empty_email( $email ) ) {
			$this->add_feed_error( esc_html__( 'A valid Email address must be provided.', 'gravityforms-emercury' ), $feed, $entry, $form );
			return $entry;
		}

		// Initialize array to store merge fields.
		$merge_fields = array();

		// Loop through field map.
		foreach ( $field_map as $name => $field_id ) {

			// If no field is mapped, skip it.
			if ( rgblank( $field_id ) ) {
				continue;
			}

			// If this is the email field, skip it.
			if ( strtoupper( $name ) === 'email' ) {
				continue;
			}

			// Set merge var name to current field map name.
			$this->merge_var_name = $name;

			// Get field object.
			$field = GFFormsModel::get_field( $form, $field_id );

			// Get field value.
			$field_value = $this->get_field_value( $form, $entry, $field_id );

			// If field value is empty and we are not overriding empty fields, skip it.
			if ( empty( $field_value ) && ( ( is_object( $field ) && 'address' === $field->get_input_type() ) ) ) {
				continue;
			}

			$merge_fields[ $name ] = $field_value;

		}

		// Define initial member, member found and member status variables.
		$member_found  = false;

		// Prepare subscription arguments.
		$subscription = array(
			'list_id'      => $feed['meta']['emercuryList'],
			'email'        => $email,
			'merge_fields' => $merge_fields,
			'ip_signup'    => rgar( $entry, 'ip' ),
			'note'         => rgars( $feed, 'meta/note' ),
			'optin_date'   => date('m/d/Y'),
			'optin_website'=> get_site_url()
		);

		// Remove note from the subscription object and process any merge tags.
		// $note = GFCommon::replace_variables( $subscription['note'], $form, $entry, false, true, false, 'text' );
		// unset( $subscription['note'] );

		$action = $member_found ? 'updated' : 'added';

		try {

			$data_subscriber = array();
			$data_subscriber['email'] = $subscription['email'];
		    $data_subscriber['optin_date'] = $subscription['optin_date'];
		    $data_subscriber['optin_ip'] = $subscription['ip_signup'];
		    $data_subscriber['optin_website'] = $subscription['optin_website'];

		    foreach ($subscription['merge_fields'] as $key => $value_field) {
		    	if($key !== 'email') {
		    		$data_subscriber[$key] = $value_field;
		    	}
		    }

		    // List ID
		    $list_id = $subscription['list_id'];

			// Log the subscriber to be added or updated.
			$this->log_debug( __METHOD__ . "(): Subscriber to be {$action}: " . print_r( $subscription, true ) );

			// Add or update subscriber.
			$result = $this->api->updateSubscribers($data_subscriber, $list_id);
		
			// List Name.
			$listName = $result;

			$lists_name = gform_get_meta( $entry['id'], 'key_emercury_lists_name' );
			if(empty($lists_name) ) {
				$lists_name = $listName;
			} else {
				$lists_name .= ', '. $listName;
			}

			gform_update_meta( $entry['id'], 'key_emercury_lists_name', $lists_name );

			// Log that the subscription was added or updated.
			$this->log_debug( __METHOD__ . "(): Subscriber successfully {$action}." );

		} catch ( Exception $e ) {

			// Log that subscription could not be added or updated.
			$this->add_feed_error( sprintf( esc_html__( 'Unable to add/update subscriber: %s', 'gravityforms-emercury' ), $e->getMessage() ), $feed, $entry, $form );

			// Log field errors.
			if ( $e->hasErrors() ) {
				$this->log_error( __METHOD__ . '(): Field errors when attempting subscription: ' . print_r( $e->getErrors(), true ) );
			}

			return;

		}

		// if ( ! $note ) {
		// 	// Abort as there is no note to process.
		// 	return;
		// }

		// try {

		// 	// Add the note to the member.
		// 	$this->api->add_member_note( $list_id, $subscription['email_address'], $note );
		// 	$this->log_debug( __METHOD__ . '(): Note successfully added to subscriber.' );

		// } catch ( Exception $e ) {

		// 	// Log that the note could not be added.
		// 	$this->add_feed_error( sprintf( 'Unable to add note to subscriber: %s', $e->getMessage() ), $feed, $entry, $form );

		// 	return;
		// }

	}

	/**
	 * Returns the value of the selected field.
	 *
	 * @access public
	 *
	 * @param array  $form     The form object currently being processed.
	 * @param array  $entry    The entry object currently being processed.
	 * @param string $field_id The ID of the field being processed.
	 *
	 * @uses GFAddOn::get_full_name()
	 * @uses GF_Field::get_value_export()
	 * @uses GFFormsModel::get_field()
	 * @uses GFFormsModel::get_input_type()
	 * @uses GFEmercury::get_full_address()
	 * @uses GFEmercury::maybe_override_field_value()
	 *
	 * @return array
	 */
	public function get_field_value( $form, $entry, $field_id ) {

		// Set initial field value.
		$field_value = '';

		// Set field value based on field ID.
		switch ( strtolower( $field_id ) ) {

			// Form title.
			case 'form_title':
				$field_value = rgar( $form, 'title' );
				break;

			// Entry creation date.
			case 'date_created':

				// Get entry creation date from entry.
				$date_created = rgar( $entry, strtolower( $field_id ) );

				// If date is not populated, get current date.
				$field_value = empty( $date_created ) ? gmdate( 'Y-m-d H:i:s' ) : $date_created;
				break;

			// Entry IP and source URL.
			case 'ip':
			case 'source_url':
				$field_value = rgar( $entry, strtolower( $field_id ) );
				break;

			default:

				// Get field object.
				$field = GFFormsModel::get_field( $form, $field_id );

				if ( is_object( $field ) ) {

					// Check if field ID is integer to ensure field does not have child inputs.
					$is_integer = $field_id == intval( $field_id );

					// Get field input type.
					$input_type = GFFormsModel::get_input_type( $field );

					if ( $is_integer && 'address' === $input_type ) {

						// Get full address for field value.
						$field_value = $this->get_full_address( $entry, $field_id );

					} else if ( $is_integer && 'name' === $input_type ) {

						// Get full name for field value.
						$field_value = $this->get_full_name( $entry, $field_id );

					} else if ( $is_integer && 'checkbox' === $input_type ) {

						// Initialize selected options array.
						$selected = array();

						// Loop through checkbox inputs.
						foreach ( $field->inputs as $input ) {
							$index = (string) $input['id'];
							if ( ! rgempty( $index, $entry ) ) {
								$selected[] = $this->maybe_override_field_value( rgar( $entry, $index ), $form, $entry, $index );
							}
						}

						// Convert selected options array to comma separated string.
						$field_value = implode( ', ', $selected );

					} else if ( 'phone' === $input_type && $field->phoneFormat == 'standard' ) {

						// Get field value.
						$field_value = rgar( $entry, $field_id );

						// Reformat standard format phone to match Emercury format.
						// Format: NPA-NXX-LINE (404-555-1212) when US/CAN.
						if ( ! empty( $field_value ) && preg_match( '/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/', $field_value, $matches ) ) {
							$field_value = sprintf( '%s-%s-%s', $matches[1], $matches[2], $matches[3] );
						}

					} else {

						// Use export value if method exists for field.
						if ( is_callable( array( 'GF_Field', 'get_value_export' ) ) ) {
							$field_value = $field->get_value_export( $entry, $field_id );
						} else {
							$field_value = rgar( $entry, $field_id );
						}

					}

				} else {

					// Get field value from entry.
					$field_value = rgar( $entry, $field_id );

				}

		}

		return $this->maybe_override_field_value( $field_value, $form, $entry, $field_id );

	}

	/**
	 * Use the legacy gform_emercury_field_value filter instead of the framework gform_SLUG_field_value filter.
	 *
	 * @access public
	 *
	 * @param string $field_value The field value.
	 * @param array  $form        The form object currently being processed.
	 * @param array  $entry       The entry object currently being processed.
	 * @param string $field_id    The ID of the field being processed.
	 *
	 * @return string
	 */
	public function maybe_override_field_value( $field_value, $form, $entry, $field_id ) {

		return gf_apply_filters( 'gform_emercury_field_value', array( $form['id'], $field_id ), $field_value, $form['id'], $field_id, $entry, $this->merge_var_name );

	}

	/**
	 * Initializes Emercury API if credentials are valid.
	 *
	 * @access public
	 *
	 * @param string $api_key Emercury API key.
	 *
	 * @uses GFAddOn::get_plugin_setting()
	 * @uses GFAddOn::log_debug()
	 * @uses GFAddOn::log_error()
	 *
	 * @return bool|null
	 */
	public function initialize_api( $api_key = null, $api_email = null ) {

		// If API is alredy initialized, return true.
		if ( ! is_null( $this->api ) ) {
			return true;
		}

		// Get the API key.
		if ( rgblank( $api_key ) ) {
			$api_key = $this->get_plugin_setting( 'apiKey' );
		}

		// Get the API email.
		if ( rgblank( $api_email ) ) {
			$api_email = $this->get_plugin_setting( 'apiEmail' );
		}

		// If the API key or API email is blank, do not run a validation check.
		if ( rgblank( $api_key ) || rgblank( $api_email ) ) {
			return null;
		}

		// Log validation step.
		$this->log_debug( __METHOD__ . '(): Validating API Info.' );

		// Setup a new Emercury object with the API credentials.
		$em = new GF_Emercury_API( $api_key, $api_email  );

		try {

			// Assign API library to class.
			$this->api = $em;

			// Log that authentication test passed.
			$this->log_debug( __METHOD__ . '(): Emercury successfully authenticated.' );

			return true;

		} catch ( Exception $e ) {

			// Log that authentication test failed.
			$this->log_error( __METHOD__ . '(): Unable to authenticate with Emercury; '. $e->getMessage() );

			return false;

		}

	}

	/**
	 * Returns the combined value of the specified Address field.
	 * Street 2 and Country are the only inputs not required by Emercury.
	 * If other inputs are missing Emercury will not store the field value, we will pass a hyphen when an input is empty.
	 * Emercury requires the inputs be delimited by 2 spaces.
	 *
	 * @access public
	 *
	 * @param array  $entry    The entry currently being processed.
	 * @param string $field_id The ID of the field to retrieve the value for.
	 *
	 * @return array|null
	 */
	public function get_full_address( $entry, $field_id ) {

		// Initialize address array.
		$address = array(
			'addr1'   => str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.1' ) ) ),
			'addr2'   => str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.2' ) ) ),
			'city'    => str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.3' ) ) ),
			'state'   => str_replace( '  ', ' ', trim( rgar( $entry, $field_id . '.4' ) ) ),
			'zip'     => trim( rgar( $entry, $field_id . '.5' ) ),
			'country' => trim( rgar( $entry, $field_id . '.6' ) ),
		);

		// Get address parts.
		$address_parts = array_values( $address );

		// Remove empty address parts.
		$address_parts = array_filter( $address_parts );

		// If no address parts exist, return null.
		if ( empty( $address_parts ) ) {
			return null;
		}

		// Replace country with country code.
		if ( ! empty( $address['country'] ) ) {
			$address['country'] = GF_Fields::get( 'address' )->get_country_code( $address['country'] );
		}

		return $address;

	}

	/**
	 * Checks if a previous version was installed and if the feeds need migrating to the framework structure.
	 *
	 * @access public
	 *
	 * @param string $previous_version The version number of the previously installed version.
	 */
	public function upgrade( $previous_version ) {

		// If previous version is not defined, set it to the version stored in the options table.
		if ( empty( $previous_version ) ) {
			$previous_version = get_option( 'gf_emercury_version' );
		}

		// Run upgrade routine checks.
		$previous_is_pre_addon_framework = ! empty( $previous_version ) && version_compare( $previous_version, '3.0.dev1', '<' );

		if ( $previous_is_pre_addon_framework ) {
			$this->upgrade_to_addon_framework();
		}

	}

	/**
	 * Upgrade versions of Emercury Add-On before 3.0 to the Add-On Framework.
	 *
	 * @access public
	 */
	public function upgrade_to_addon_framework() {

		//get old plugin settings
		$old_settings = get_option( 'gf_emercury_settings' );
		//remove username and password from the old settings; these were very old legacy api settings that we do not support anymore

		if ( is_array( $old_settings ) ) {

			foreach ( $old_settings as $id => $setting ) {
				if ( $id != 'username' && $id != 'password' ) {
					if ( $id == 'apikey' ) {
						$id = 'apiKey';
						$new_settings[ $id ] = $setting;
					} else if ( $id == 'apiEmail' ) {
						$id = 'apiEmail';
						$new_settings[ $id ] = $setting;
					}
				}
			}
			$this->update_plugin_settings( $new_settings );

		}

		// Delete old options.
		delete_option( 'gf_emercury_settings' );
		delete_option( 'gf_emercury_version' );
	}
}
