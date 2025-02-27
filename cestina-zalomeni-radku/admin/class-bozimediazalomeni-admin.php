<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.bozimedia.cz
 * @since      1.0.0
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/admin
 * @author     Marek Vratil <marek.vratil@gmail.com>
 */
class Bozimediazalomeni_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add settings for plugin Use build-in settings API.
	 *
	 * @since      1.0.0
     * @access     private
	 */
	public function bozimediazalomeni_plugin_settings()  {
	   
	    register_setting('cestinazalomeni', 'bozimediazalomeni_prepositions');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_prepositions_list');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_conjunctions');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_conjunctions_list');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_abbreviations');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_abbreviations_list');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_between_number_and_unit');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_between_number_and_unit_list');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_space_between_numbers');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_space_after_ordered_number');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_spaces_in_scales');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_matches');
	    register_setting('cestinazalomeni', 'bozimediazalomeni_replacements');
	    
	    // ADD 3rd plugins
	    //ACF
	    register_setting('cestinazalomeni', 'bozimediazalomeni_acf');
	    
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bozimediazalomeni-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bozimediazalomeni-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Add submenu to WP settings
	 *
	 * @since    1.0.0
	 */
	public function add_option_page() {
	    
	    // Add a new submenu under Settings:
	    add_options_page(__('Čeština: zalomení řádků','bozimediazalomeni'), __('Čeština: zalomení řádků','bozimediazalomeni'), 'manage_options', 'bozimediazalomeni', [$this, 'option_page_content']);
	    
	}
	
	
	/**
	 * Add go to settings on plugin page.
	 *
	 * @since 1.0.0 
	 *
	 * @param  array $links    Array of plugin action links.
	 * @return array           Modified array of plugin action links.
	 */
	
	public function plugin_settings_link ( $links ) {
	    $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=bozimediazalomeni') ) .'">'. __( 'Nastavení', 'bozimediazalomeni' ) .'</a>';
	    return $links;
	}
	
	
	/**
	 * Display content for admin menu
	 *
	 * @since    1.0.0
	 */
	public function option_page_content() {
	    
	    // load html with settings
	    require plugin_dir_path( __FILE__ ) . 'partials/bozimediazalomeni-admin-display.php';

	    // update replacemend array, after save, this option is always empty
	    if (get_option('bozimediazalomeni_matches_empty') == '') {
	        Bozimediazalomeni_Admin::update_matches_and_replacements();
	    }
	   
	        
    }
	      
    /**
     * Update main options for replace spaces to hard spaces
     *
     * @since    1.0.0
     */
    public function update_matches_and_replacements() {
        
        update_option('bozimediazalomeni_matches', Bozimediazalomeni_Admin::prepare_matches());
        update_option('bozimediazalomeni_replacements', Bozimediazalomeni_Admin::prepare_replacements());
        
    }

    /**
     * Take all option and prepare matches to one array
     *
     * @since    1.0.0
     */
    private function prepare_matches() {
       
        $return_array = array();
        
        $word_matches = '';
        foreach (array('prepositions', 'conjunctions', 'abbreviations') as $i) {
            if (get_option('bozimediazalomeni_'.$i) == 'on') {
                $temp_array = explode(',', get_option('bozimediazalomeni_'.$i.'_list'));
                foreach ($temp_array as $j) {
                    $j = mb_strtolower(trim($j));
                    $word_matches .= ($word_matches == '' ? '' : '|') . $j;
                }
            }
        }
        if ($word_matches != '') {
            $return_array['words'] = '@($|;| |&nbsp;|\(|\n)('.$word_matches.') @i';
        }
        
        $word_matches = '';
        if (get_option('bozimediazalomeni_between_number_and_unit') == 'on') {
            $temp_array = explode(',', get_option('bozimediazalomeni_between_number_and_unit_list'));
            foreach ($temp_array as $j) {
                $j = mb_strtolower(trim($j));
                $word_matches .= ($word_matches == '' ? '' : '|') . $j;
            }
        }
        if ($word_matches != '') {
            $return_array['units'] = '@(\d) ('.$word_matches.')(^|[;\.!:]| |&nbsp;|\?|\n|\)|<|\010|\013|$)@i';
        }
        
        if (get_option('bozimediazalomeni_space_between_numbers') == 'on') {
            $return_array['numbers'] = '@(\d) (\d)@i';
        }
        
        if (get_option('bozimediazalomeni_spaces_in_scales') == 'on') {
            $return_array['scales'] = '@(\d) : (\d)@i';
        }
        
        if (get_option('bozimediazalomeni_space_after_ordered_number') == 'on') {
            $return_array['orders'] = '@(\d\.) ([0-9a-záčďéěíňóřšťúýž])@';
        }
        
        return $return_array;
        
    }
    
    /**
     * Take all option and prepare replacement to one array
     *
     * @since    1.0.0
     */
    private function prepare_replacements() {
       
        $return_array = array();
        
        foreach (array('prepositions', 'conjunctions', 'abbreviations') as $i) {
            if (get_option('bozimediazalomeni_'.$i) == 'on') {
                $return_array['words'] = '$1$2&nbsp;';
                break;
            }
        }
        
        if (get_option('bozimediazalomeni_between_number_and_unit') == 'on') {
            $return_array['units'] = '$1&nbsp;$2$3';
        }
        
        if (get_option('bozimediazalomeni_space_between_numbers') == 'on') {
            $return_array['numbers'] = '$1&nbsp;$2';
        }
        
        if (get_option('bozimediazalomeni_spaces_in_scales') == 'on') {
            $return_array['scales'] = '$1&nbsp;:&nbsp;$2';
        }
        
        if (get_option('bozimediazalomeni_space_after_ordered_number') == 'on') {
            $return_array['orders'] = '$1&nbsp;$2';
        }
               
        return $return_array;
    }
    
}
	
	


	
	
	
	
	
	
	
	
	
	

