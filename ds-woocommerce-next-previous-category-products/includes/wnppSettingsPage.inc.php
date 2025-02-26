<?php
class wnpp_SettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    public $options;

    /**
     * Start up
     */
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page(){
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Next Previous products settings', 
            'manage_options', 
            'ds-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page(){
        // Set class property
        $this->options = get_option( 'ds_product_option' );
        ?>
        <div class="wrap">
            <h1>DS Woocommerce Next Previous Category Product Plugin Settings</h1>
            <form method="post" action="options.php">
            <?php
				// This prints out all hidden setting fields
                settings_fields( 'ds_option_group' );
                do_settings_sections( 'ds-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init(){        
	     register_setting(
            'ds_option_group', // Option group
            'ds_product_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'ds-setting-admin' // Page
        );  

        add_settings_field(
            'id_number', // ID
            'Enable', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'ds-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'location', 
            "Navigation Button's Position", 
            array( $this, 'location_select_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'hideProductDetails', 
            'Show/Hide Product Title & Price', 
            array( $this, 'hideProductDetails_field_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );      
        add_settings_field(
            'hideProductImage', 
            'Show/Hide Product Image', 
            array( $this, 'hideProductImage_field_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );      
        add_settings_field(
            'arrowColor', 
            'Select Arrow Color', 
            array( $this, 'arrow_color_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );     
        add_settings_field(
            'arrowbgColor', 
            'Select Arrow Background Color', 
            array( $this, 'arrow_bg_color_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );    
        add_settings_field(
            'arrowTextColor', 
            'Select Product Text Color', 
            array( $this, 'arrow_text_color_callback' ), 
            'ds-setting-admin', 
            'setting_section_id'
        );   
		add_settings_section(
            'setting_section_id_bottom', // ID
            '', // Title
            array( $this, 'print_note_info' ), // Callback
            'ds-setting-admin' // Page
        );		
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ){
        $new_input = array();
        if( isset( $input['enable'] )&& $input['enable']=='on' ){
			$new_input['enable'] = trim( $input['enable'] );
		} else { 
			$new_input['enable']='off';
		}

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );
		
        if( isset( $input['arrowColor'] ) )
            $new_input['arrowColor'] = sanitize_text_field( $input['arrowColor'] );
		
        if( isset( $input['arrowbgColor'] ) )
            $new_input['arrowbgColor'] = sanitize_text_field( $input['arrowbgColor'] );
		
        if( isset( $input['arrowTextColor'] ) )
            $new_input['arrowTextColor'] = sanitize_text_field( $input['arrowTextColor'] );        
        
        if( isset( $input['location'] ) )
            $new_input['location'] = $input['location'];
        
        if( isset( $input['hideProductDetails'] )&& $input['hideProductDetails']=='on' ){
			$new_input['hideProductDetails'] = trim( $input['hideProductDetails'] ); 
		} else { 
			$new_input['hideProductDetails']='off';
		}

		if( isset( $input['hideProductImage'] )&& $input['hideProductImage']=='on' ){
			$new_input['hideProductImage'] = trim( $input['hideProductImage'] );
		} else {
			$new_input['hideProductImage']='off';
		}  

        return $new_input;
    }

	public function check_color( $value ) { 
		if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #     
			return true;
		}
	}
		
	
    /** 
     * Print the Section text
     */
    public function print_section_info(){
        print 'Change Next/Previous Navigation settings:';
    }

	/** 
     * Print the Bottom Notes text
     */
    public function print_note_info(){
        print '<br><br><b>NOTE:</b><i>The Next/Previous navigation will appear if there are products assigned under certain category.</i>';
    }
	
    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback(){
		printf(
            '<input type="checkbox" id="enable" name="ds_product_option[enable]" %s />',
            (isset( $this->options['enable'] )&&$this->options['enable']=='on') ? 'checked' : '' );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function hideProductDetails_field_callback(){       
		 printf(
            '<input type="checkbox" id="hideProductDetails" name="ds_product_option[hideProductDetails]" %s />',
            (isset( $this->options['hideProductDetails'] )&&$this->options['hideProductDetails']=='on') ? 'checked' : '' );
     
    }
	
    public function hideProductImage_field_callback(){  
		printf(
            '<input type="checkbox" id="hideProductImage" name="ds_product_option[hideProductImage]" %s />',
            (isset( $this->options['hideProductImage'] )&&$this->options['hideProductImage']=='on') ? 'checked' : '' ); 
    }
	
	public function arrow_color_callback(){
         printf(
            '<input type="text" id="arrowColor" class="color-field" name="ds_product_option[arrowColor]" value="%s" />',
            ((isset( $this->options['arrowColor'] ) && $this->options['arrowColor'] !='') ? esc_attr( $this->options['arrowColor']) : '#444' )) ; 
     
    }
	
	public function arrow_bg_color_callback(){
         printf(
            '<input type="text" id="arrowbgColor" class="color-field" name="ds_product_option[arrowbgColor]" value="%s" />',
            ((isset( $this->options['arrowbgColor'] )&& $this->options['arrowbgColor'] !='') ? esc_attr( $this->options['arrowbgColor']) : '#f3f3f3' ) 
         ); 
     
    } 
	
	public function arrow_text_color_callback(){
         printf(
            '<input type="text" id="arrowTextColor" class="color-field" name="ds_product_option[arrowTextColor]" value="%s" />',
           ( (isset( $this->options['arrowTextColor'] )&& $this->options['arrowTextColor'] !='' ) ? esc_attr( $this->options['arrowTextColor']) : '#666'
         )); 
     
    }
    /** 
     * Get the settings option array and print one of its values
     */
    public function location_select_callback(){
     ?>                   
		<select id="location" name="ds_product_option[location]" >
			<option value="beforetitle" <?php echo ((isset( $this->options["location"] )&& $this->options["location"]=="beforetitle" ) ? "selected" : ""); ?>>Before Title</option>
			<option value="floating" <?php echo ((isset($this->options["location"] )&& $this->options["location"]=="floating" ) ? "selected" : ""); ?>>Floating over product page</option>
		</select>
	<?php
    }
}

if( is_admin() ){
	$wnpp_settings_page = new wnpp_SettingsPage();  
	wp_enqueue_style( 'wp-color-picker' ); 
    // Include our custom jQuery file with WordPress Color Picker dependency
	wp_enqueue_script( 'Ds-ProductNav-Settings', plugins_url( 'assets/js/wnpp_settings.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
}