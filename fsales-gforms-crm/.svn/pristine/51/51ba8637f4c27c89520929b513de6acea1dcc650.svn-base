<?php

// don't load directly
defined( 'ABSPATH' ) or die();

// Include Gravity Forms Addon Framework
GFForms::include_feed_addon_framework();

class PMFreshsalesCRM extends GFFeedAddOn{

    /**
     * Defines the addon version
     *
     * @access protected
     * @var double $_version
     */
    protected $_version = PM_FRESHSALES_ADDON_VERSION;

    /**
     * Defines the required gravity form version
     *
     * @access protected
     * @var double $_min_gravityforms_version
     */
    protected $_min_gravityforms_version = '1.9';

    /**
     * Defines the addon slug
     *
     * @access protected
     * @var string $_slug 
     */
    protected $_slug = 'pmgffreshsales';

    /**
     * Defines the addon file path
     *
     * @access protected
     * @var string $_path
     */
    protected $_path = 'pmfreshsales/pmfreshsales.php';

    /**
     * Defines the full path of addon
     *
     * @access protected
     * @var string $_full_path 
     */
    protected $_full_path = __FILE__;

    /**
     * Defines title of the addon
     *
     * @access protected
     * @var string $_title
     */
    protected $_title = 'Freshsales CRM Addon';

    /**
     * Defines short title of the addon
     *
     * @var string
     */
    protected $_short_title = 'Freshsales CRM';

    /**
     * Contains an instance of this class, if available.
     *
     * @access private
     * @var object $_instance If available, contains an instance of this class.
     */
    private static $_instance = null;
 
    public static function get_instance() {
        if ( self::$_instance == null ) {
            self::$_instance = new self;
        }
 
        return self::$_instance;
    }



    /**
     * Plugins starting point
     *
     * @access public
     * @return void
     */
    public function init() {

        parent::init();
        
    }


    public function initialize_api()
    {
        // if( ! class_exists( 'PM_Freshsales_API' ) )
        // {
            require_once( 'includes/class-gf-freshsales-api.php' );
            $api = new PM_Freshsales_API();

            return $api;
        // }
    }

    /**
     * Setup plugin setting fields
     * 
     * @return array
     */

    public function plugin_settings_fields() {
        
        $description = '<p>';
		$description .= sprintf(
			esc_html__( 'Freshsales CRM is a contact management tool that gives you a 360-degree view of your complete sales cycle and pipeline. Use Gravity Forms to collect customer information and automatically add it to your Freshsales CRM account. If you don\'t have a Freshsales CRM account, you can %1$ssign up for one here.%2$s', 'pm-freshsales' ),
			'<a href="https://www.freshworks.com/freshsales-crm/" target="_blank">', '</a>'
		);
		$description .= '</p>';

        $fields = array(
            array(
                'name' => 'enabled',
                'tooltip' => esc_html__( 'You can enable or disable the Freshsales CRM addon by simply checking below checkbox.', 'pm-freshsales' ),
                'label' => esc_html__( 'Enable or Disable CRM', 'pm-freshsales' ),
                'type' => 'checkbox',
                'choices' => array(
                    array(
                        'label' => esc_html__('Enabled', 'pm-freshsales'),
                        'name' => 'enabled'
                    ),
                ),
            )

        );

        /**
         * Defines Production mode setting fields
         */
        $production_fields = array(
            array(
                'name' => 'production_domain',
                'type' => 'text',
                'class' => 'medium',
                'label' => esc_html__( 'CRM Domain', 'pm-freshsales' ),
                'tooltip' => esc_html__( 'Enter your domain name of your production or live freshsales account. e.g. demo' ),
            ),
            array(
                'name' => 'production_token',
                'type' => 'text',
                'class' => 'medium',
                'label' => esc_html__( 'CRM Token', 'pm-freshsales' ),
                'tooltip' => esc_html__( 'Get your API Token: Click your Profile picture > Settings > API Settings', 'pm-freshsales' ),
            )
        );

        



        return array(
            array(
                'title'  => esc_html__( 'Freshsales Add-On Settings', 'pm-freshsales' ),
                'description' => $description,
                'fields' => $fields
            ),
            array(
                'title'  => esc_html__( 'Freshsales CRM Credentials', 'pm-freshsales' ),
                'fields' => $production_fields
            )
        );
    }

    /**
     * Defines feed_settings_fields()
     * 
     * Form Setting > Freshsales CRM Tab
     * @since 1.0.0
     */

    public function feed_settings_fields() {

        $settings_fields = array();

        $actions = array(
            array(
                'label' => esc_html__( 'Select Action', 'pm-freshsales' ),
                'value' => null
            ),
            array(
                'label' => esc_html__( 'Create a new Lead', 'pm-freshsales' ),
                'value' => 'lead'
            ),
            array(
                'label' => esc_html__( 'Create a new Contact', 'pm-freshsales' ),
                'value' => 'contact'
            )
        );

        $settings_fields[] = array(
            'fields' => array(
                array(
                    'name'      => 'feedName',
                    'label'     => esc_html__( 'Feed Name' , 'pm-freshsales' ),
                    'type'      => 'text',
                    'class'     => 'medium',
                    'required'  => true,
                    'default_value' => $this->get_default_feed_name(),
                    'tooltip' => '<h6>' . esc_html__( 'Name', 'pm-freshsales' ) . '</h6>' . esc_html__( 'Enter a feed name to uniquely identify this setup.', 'pm-freshsales' ),
                ),
                array(
                    'name'  => 'feedAction',
                    'label' => esc_html__( 'Action', 'pm-freshsales' ),
                    'type'  => 'select',
                    'class' => 'medium',
                    'required'  =>  true,
                    'onchange' => "jQuery(this).parents('form').submit();",
                    'tooltip'  => '<h6>' . esc_html__( 'Action', 'pm-freshsales' ) . '</h6>' . esc_html__( 'Choose what will happen when this feed is processed.', 'pm-freshsales' ),
                    'choices'   => $actions
                )
            )
        );


        $settings_fields[] = $this->lead_feed_settings_fields();
        $settings_fields[] = $this->contact_feed_settings_fields();

        // Prepare conditional logic settings section.
		$settings_fields[] = array(
			'title'      => esc_html__( 'Feed Conditional Logic', 'pm-freshsales' ),
			'fields'     => array(
				array(
					'name'           => 'feedCondition',
					'type'           => 'feed_condition',
					'label'          => esc_html__( 'Conditional Logic', 'pm-freshsales' ),
					'checkbox_label' => esc_html__( 'Enable', 'pm-freshsales' ),
					'instructions'   => esc_html__( 'Export to Freshsales CRM if', 'pm-freshsales' ),
					'tooltip'        => '<h6>' . esc_html__( 'Conditional Logic', 'pm-freshsales' ) . '</h6>' . esc_html__( 'When conditional logic is enabled, form submissions will only be exported to Freshsales CRM when the condition is met. When disabled, all form submissions will be posted.', 'pm-freshsales' ),
				),
			),
		);



        return $settings_fields;
    }

    /**
     * Defines lead fields for Lead Feed
     * 
     * @return array $fields
     */

    public function lead_feed_settings_fields() {

        // Fetch all lead fields
        $all_fields = $this->initialize_api()->get_fields( 'Leads' );
        // Get Standard fields
        $standard_fields = $all_fields['standard_fields'];
        // Get Other Fields
        $other_fields = $all_fields['other_fields'];

        $fields = array(
            'title'         => esc_html__( 'Lead details', 'pm-freshsales' ),
            'dependency'    => array( 'field' => 'feedAction', 'values' => ( 'lead' ) ),
            'fields'        => array(
                array(
                    'name'      =>  'leadStandardField',
                    'label'     =>  esc_attr__( 'Map Field', 'pm-freshsales' ),
                    'type'      =>  'field_map',
                    'field_map' =>  $standard_fields
                ),
                array(
					'name'      => 'leadDynamicFields',
					'label'     => esc_html__( 'Map Fields', 'pm-freshsales' ),
                    'type'      => 'dynamic_field_map',
                    'field_map' => $other_fields,
					'tooltip'   => '<h6>' . esc_html__( 'Map Fields', 'pm-freshsales' ) . '</h6>' . esc_html__( 'Select which Gravity Form fields pair with their respective Freshsales CRM fields.', 'pm-freshsales' ),
                ),
                array(
                    'name'      =>  'leadCondition',
                    'label'     =>  esc_html__( 'Lead Condition', 'pm-freshsales' ),
                    'type'      =>  'select',
                    'required'  =>  true,
                    'choices'   =>  array(
                        array(
                            'label' => 'Select Lead Condition',
                            'value' => ''
                        ),
                        array(
                            'label' => 'Create Lead ( Allow Duplicate Records )',
                            'value' =>  'leadCreate'
                        ),
                        array(
                            'label' =>  'Create or Update if Email exists',
                            'value' => 'leadEmailUpdate'
                        ),
                        array(
                            'label' =>  'Create or Update if Mobile number exists',
                            'value' =>  'leadMobileUpdate'
                        ),
                        array(
                            'label' =>  'Create or Update if Email or Mobile number exists',
                            'value' =>  'leadEmailMobileUpdate'
                        )
                    )
                )
            )
        );

        return $fields;

    }

    
    /**
     * Defines Contact fields for Contact Feed
     *
     * @return array $fields
     */
    public function contact_feed_settings_fields() {

        // Fetch all contact fields
        $all_fields = $this->initialize_api()->get_fields( 'Contacts' );
        // Get Standard fields
        $standard_fields = $all_fields['standard_fields'];
        // Get Other Fields
        $other_fields = $all_fields['other_fields'];

        $fields = array(
            'title'         => esc_html__( 'Contact details', 'pm-freshsales' ),
            'dependency'    => array( 'field' => 'feedAction', 'values' => ( 'contact' ) ),
            'fields'        => array(
                array(
                    'name'      =>  'contactStandardField',
                    'label'     =>  esc_attr__( 'Map Field', 'pm-freshsales' ),
                    'type'      =>  'field_map',
                    'field_map' =>  $standard_fields
                ),
                array(
					'name'      => 'contactDynamicFields',
					'label'     => esc_html__( 'Map Fields', 'pm-freshsales' ),
                    'type'      => 'dynamic_field_map',
                    'field_map' => $other_fields,
					'tooltip'   => '<h6>' . esc_html__( 'Map Fields', 'pm-freshsales' ) . '</h6>' . esc_html__( 'Select which Gravity Form fields pair with their respective Freshsales CRM fields.', 'pm-freshsales' ),
                ),
                array(
                    'name'      =>  'contactCondition',
                    'label'     =>  esc_html__( 'Contact Condition', 'pm-freshsales' ),
                    'type'      =>  'select',
                    'required'  =>  true,
                    'choices'   =>  array(
                        array(
                            'label' => 'Select Contact Condition',
                            'value' => ''
                        ),
                        // array(
                        //     'label' => 'Create Contact ( Allow Duplicate Records )',
                        //     'value' =>  'contactCreate'
                        // ),
                        array(
                            'label' =>  'Create or Update if Email exists',
                            'value' => 'contactEmailUpdate'
                        ),
                        array(
                            'label' =>  'Create or Update if Mobile number exists',
                            'value' =>  'contactMobileUpdate'
                        ),
                        array(
                            'label' =>  'Create or Update if Email or Mobile number exists',
                            'value' =>  'contactEmailMobileUpdate'
                        )
                    )
                )
            )
        );

        return $fields;

    }




    /**
     * Setup columns for feed list table.
     * @access public
     * @return array
     */
    public function feed_list_columns() {
        return array(
            'feedName' => __( 'Name', 'pm-freshsales' ),
            'feedAction' => __( 'Action', 'pm-freshsales' )
        );
    }

    /**
	 * Get value for action feed list column.
	 *
	 * @access public
	 *
	 * @param  array $feed Feed for current table row.
	 *
	 * @return string
	 */
	public function get_column_value_feedAction( $feed ) {

		// Display contact action string.
		if ( rgars( $feed, 'meta/feedAction' ) == 'contact' ) {
			return esc_html__( 'Create a New Contact', 'pm-freshsales' );
		}

		// Display lead action string.
		if ( rgars( $feed, 'meta/feedAction' ) == 'lead' ) {
			return esc_html__( 'Create a New Lead', 'pm-freshsales' );
		}

		return esc_html__( 'No Action', 'pm-freshsales' );

    }

    /**
     * Process of Freshsales Feed
     * 
     * 
     */

    public function process_feed( $feed, $entry, $form )
    {

		// If API instance is not initialized, exit.
		if ( ! $this->initialize_api() ) {

			// Log that we cannot process the feed.
			$this->add_feed_error( esc_html__( 'Feed was not processed because API was not initialized.', 'pm-freshsales' ), $feed, $entry, $form );

			return;
        }
        
        // Create Lead
        if( rgars( $feed, 'meta/feedAction' ) === 'lead' ){

            $lead = $this->create_lead( $feed, $entry, $form );

        }
        else if( rgars( $feed, 'meta/feedAction' ) === 'contact' ){
            $contact = $this->create_contact( $feed, $entry, $form );
        }

    }

    /**
     * Define create lead 
     *
     * @param array $feed
     * @param array $entry
     * @param array $form
     */
    public function create_lead( $feed, $entry, $form )
    {
        // Field name => field id
        $custom_fields = $this->get_dynamic_field_map_fields( $feed, 'leadDynamicFields' );

        // Standard Fields
        $standard_fields = $this->get_field_map_fields( $feed, 'leadStandardField' );

        // Email Field 
        $email = '';

        // Mobile Field
        $mobile = '';

        // Loop through map fields
        foreach( $custom_fields as $field_name => $field_id ){
            // Get field value.
            $field_value = $this->get_field_value(  $form, $entry, $field_id );

            $field_base_model = explode('-', $field_name)[0];
            $field_base_name = explode('-', $field_name)[1];

            if( $field_base_model === 'Lead' )
            {
                if( $field_base_name == 'email' )
                {
                    $email = $field_value;
                }
                else if( $field_base_name == 'mobile_number' )
                {
                    $mobile = $field_value;
                }
                $lead['lead'][$field_base_name] = $field_value;
            }
            else if( $field_base_model === 'LeadCompany' )
            {
                $lead['company'][$field_base_name] = $field_value;
            }
            else if( $field_base_model === 'LeadDeal' )
            {
                $lead['deal'][$field_base_name] = $field_value;
            }

        }

        // Standard Fields
        foreach( $standard_fields as $field_name => $field_id ){
            // Get field value.
            $field_value = $this->get_field_value(  $form, $entry, $field_id );

            $field_base_model = explode('-', $field_name)[0];
            $field_base_name = explode('-', $field_name)[1];

            if( $field_base_model === 'Lead' )
            {
                if( $field_base_name == 'email' )
                {
                    $email = $field_value;
                }
                else if( $field_base_name == 'mobile_number' )
                {
                    $mobile = $field_value;
                }
                $lead['lead'][$field_base_name] = $field_value;
            }
            else if( $field_base_model === 'LeadCompany' )
            {
                $lead['company'][$field_base_name] = $field_value;
            }
            else if( $field_base_model === 'LeadDeal' )
            {
                $lead['deal'][$field_base_name] = $field_value;
            }

        }

        /**
         * Check our Lead Conditions
         * 1. Create Lead ( Allow Duplicate Records )
         * 2. Create or Update lead if email exists
         * 3. Create or Update lead if mobile number exists
         * 4. Create or Update lead if email or mobile number exists
         */ 

        //  Get lead condition form select dropdown
        $leadCondition = $feed['meta']['leadCondition'];

        // Defines note message
        $note_message = '';

        // If 1. Create Lead
        if( $leadCondition === 'leadCreate' )
        {
            $note_message = 'Lead created with ID ';
            $response = $this->initialize_api()->make_request( 'leads', $lead, 'POST' );
        }
        // If 2. Create or Update Lead if email exists
        else if( $leadCondition === 'leadEmailUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Lead', $email, '' );

            if( empty($is_exists) )
            {
                $note_message = 'Lead created with ID ';
                $response = $this->initialize_api()->make_request( 'leads', $lead, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Lead updated with ID ';
                $lead_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'leads/'.$lead_id, $lead, 'PUT' );
            }
        }
        // If 3. Create or Update if Mobile Number is exists
        else if( $leadCondition === 'leadMobileUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Lead', '', $mobile );

            if( empty($is_exists) )
            {
                $note_message = 'Lead created with ID ';
                $response = $this->initialize_api()->make_request( 'leads', $lead, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Lead updated with ID ';
                $lead_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'leads/'.$lead_id, $lead, 'PUT' );
            }
        }
        // If 4. Create or Update lead Email OR Mobile Number exists
        else if( $leadCondition === 'leadEmailMobileUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Lead', $email, $mobile );

            if( empty($is_exists) )
            {
                $note_message = 'Lead created with ID ';
                $response = $this->initialize_api()->make_request( 'leads', $lead, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Lead updated with ID ';
                $lead_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'leads/'.$lead_id, $lead, 'PUT' );
            }
        }


        // Check lead is created or not
        if( rgar( $response, 'lead' ) && !rgar( $response, 'errors' ))
        {
            $lead_id = $response["lead"]["id"];
            $this->add_note($entry['id'], $note_message.$lead_id, 'success');
        }
        else if( rgar( $response, 'errors' ) && !rgar( $response, 'lead' ) )
        {
            $message = "Lead creation failed. 
            Error Code: ".$response['errors']['code']." 
            Error Message: ".$response['errors']['message'][0];
            $this->add_note($entry['id'], $message, 'error');
        }
    }

    /**
     * Define create Contact
     *
     * @param array $feed
     * @param array $entry
     * @param array $form
     */
    public function create_contact( $feed, $entry, $form )
    {
        // Field name => field id
        $custom_fields = $this->get_dynamic_field_map_fields( $feed, 'contactDynamicFields' );

        // Standard Fields
        $standard_fields = $this->get_field_map_fields( $feed, 'contactStandardField' );

        // Email Field 
        $email = '';

        // Mobile Field
        $mobile = '';

        // Loop through map fields
        foreach( $custom_fields as $field_name => $field_id ){
            // Get field value.
            $field_value = $this->get_field_value(  $form, $entry, $field_id );

            $field_base_model = explode('-', $field_name)[0];
            $field_base_name = explode('-', $field_name)[1];

            if( $field_base_model === 'Contact' )
            {
                if( $field_base_name == 'email' )
                {
                    $email = $field_value;
                }
                else if( $field_base_name == 'mobile_number' )
                {
                    $mobile = $field_value;
                }
                $contact['contact'][$field_base_name] = $field_value;
            }

        }

        // Standard Fields
        foreach( $standard_fields as $field_name => $field_id ){
            // Get field value.
            $field_value = $this->get_field_value(  $form, $entry, $field_id );

            $field_base_model = explode('-', $field_name)[0];
            $field_base_name = explode('-', $field_name)[1];

            if( $field_base_model === 'Contact' )
            {
                if( $field_base_name == 'email' )
                {
                    $email = $field_value;
                }
                else if( $field_base_name == 'mobile_number' )
                {
                    $mobile = $field_value;
                }
                $contact['contact'][$field_base_name] = $field_value;
            }

        }

        /**
         * Check our Contact Conditions
         * 1. Create or Update lead if email exists
         * 2. Create or Update lead if mobile number exists
         * 3. Create or Update lead if email or mobile number exists
         */ 

        //  Get lead condition form select dropdown
        $contactCondition = $feed['meta']['contactCondition'];

        // Defines note message
        $note_message = '';

        // If 1. Create or Update Contact if email exists
        if( $contactCondition === 'contactEmailUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Contact', $email, '' );

            if( empty($is_exists) )
            {
                $note_message = 'Contact created with ID ';
                $response = $this->initialize_api()->make_request( 'contacts', $contact, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Contact updated with ID ';
                $contact_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'contacts/'.$contact_id, $contact, 'PUT' );
            }
        }
        // If 2. Create or Update if Mobile Number is exists
        else if( $contactCondition === 'contactMobileUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Contact', '', $mobile );

            if( empty($is_exists) )
            {
                $note_message = 'Contact created with ID ';
                $response = $this->initialize_api()->make_request( 'contacts', $contact, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Contact updated with ID ';
                $contact_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'contacts/'.$contact_id, $contact, 'PUT' );
            }
        }
        // If 3. Create or Update contact Email OR Mobile Number exists
        else if( $contactCondition === 'contactEmailMobileUpdate' )
        {
            $is_exists = $this->initialize_api()->check_is_exists( 'Contact', $email, $mobile );

            if( empty($is_exists) )
            {
                $note_message = 'Contact created with ID ';
                $response = $this->initialize_api()->make_request( 'contacts', $contact, 'POST' );
            }
            else if( !empty( $is_exists ) )
            {
                $note_message = 'Contact updated with ID ';
                $contact_id = $is_exists[0]['id'];
                $response = $this->initialize_api()->make_request( 'contacts/'.$contact_id, $contact, 'PUT' );
            }
        }


        // Check contact is created or not
        if( rgar( $response, 'contact' ) && !rgar( $response, 'errors' ))
        {
            $contact_id = $response["contact"]["id"];
            $this->add_note($entry['id'], $note_message.$contact_id, 'success');
        }
        else if( rgar( $response, 'errors' ) && !rgar( $response, 'contact' ) )
        {
            $message = "Contact creation failed. 
            Error Code: ".$response['errors']['code']." 
            Error Message: ".$response['errors']['message'][0];
            $this->add_note($entry['id'], $message, 'error');
        }
    }
    
    /**
	 * Prevent feeds being listed or created if an api key isn't valid.
	 *
	 * @return bool
	 */
	public function can_create_feed() {
        $is_addon_enabled = $this->get_plugin_setting( 'enabled' );
        
        if( isset($is_addon_enabled) && $is_addon_enabled === '1' )
        {
            // Get Lead Fields
            $lead_fields = $this->initialize_api()->get_fields( 'Leads' );
            // Get Contact Fields
            $contact_fields = $this->initialize_api()->get_fields( 'Contacts' );

            if( !empty( $lead_fields ) && !empty( $contact_fields ) )
            {
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
		
	}


    /**
     * Helper Functions
     */

    public function get_api_domain_token(){
        $is_addon_enabled = $this->get_plugin_setting( 'enabled' );
        

        if( isset($is_addon_enabled) && $is_addon_enabled === '1' )
        {
            $crm_domain = $this->get_plugin_setting( 'production_domain' );
            $crm_token  = $this->get_plugin_setting( 'production_token' );


            return array(
                'domain' => $crm_domain,
                'token'  => $crm_token
            );
        }

        return;
    }

    /**
     * Plugin Setting validation helper functions
     */

    public function validate_settings( $fields, $settings ){

        if( '1' === rgar( $settings, 'enabled' ) )
        {

            $production_domain = '';
            $production_token = '';

            foreach( $fields as $section ) {

                foreach( $section['fields'] as $field ) {

                    $field_name = $field['name'];

                    // Check production_domain is empty or not
                    if( $field_name === 'production_domain'  ) {

                        if( empty( rgar( $settings, 'production_domain' ) ) ) {

                            $this->set_field_error( $field, rgar( $field, 'Fields not should be blank.' ) );

                        }
                        else {
                            $production_domain = rgar( $settings, 'production_domain' );
                        }

                    }
                    // Check production_token is empty or not
                    else if( $field_name == 'production_token' ) {

                        if( empty( rgar( $settings, 'production_token' ) ) ) {

                            $this->set_field_error( $field, rgar( $field, 'Fields not should be blank.' ) );

                        }
                        else {
                            $production_token = rgar( $settings, 'production_token' );
                        }

                    }
                    

                }

            }

            $field_errors = $this->get_field_errors();
            $is_valid     = empty( $field_errors );

            if( $is_valid ) {
                $response = $this->initialize_api()->test_connection( $production_domain, $production_token );

                if( rgar( $response, 'errors' ) ) {
                    $error_message = $response['errors']['message'][0];
                    
                    GFCommon::add_error_message( $error_message );
                    return false;
                }
                else if( rgar( $response, 'fields' ) ) {
                    
                    return true;
                }
                else {
                    
                    GFCommon::add_error_message( 'There has been some error. Check your limit of requests or ensure API domain and key is correct.' );
                    return false;
                }

            }
            else {
                return false;
            }


        }
        else{
            return true;
        }

    }


}