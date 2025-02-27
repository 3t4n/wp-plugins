<?php 
// check user capabilities
if ( ! is_admin() ) {
    return;
}

if ( ! class_exists( 'WPFDM_Import_Data' ) ) {


/** 
*
* @since 1.0.0
* 
*/
class WPFDM_Import_Data {

	/**
	* @since 1.0.0
    * @var Singleton
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* @since 1.0.0
    * Constructor
	*
	* @param void
	* @return void
	*/
	private function __construct() {  
	}

	/**
	* @since 1.0.0
    * Singleton pattern
	* 
	*
	* @param void
	* @return WPFDM_Import_Data
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Import_Data();
		}

		return self::$_instance;
	}
	
	/** 
	*
    * @since 1.0.0
    * 
    * Main function that runs the main functionnality
    * 
    */
	function run() {

		require_once (plugin_dir_path( __FILE__ ) . '/utils/class-wpfdm-utilities.php');

		$this->display_content();

		add_action('admin_footer' , array( $this, 'add_js_script_to_footer') );
		
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that displays the content of the page:
    * - The content,
    * - The form,
    * - The conformation message
    *
    */
	function display_content() {
		?>

		<header>
			<div class="container h-100">
				<div class="row align-items-center h-100">
					<div class="col-md-9 col-9 mt-3">
						<a href="admin.php?page=fdm_form"><img class="logo-fdm" src="<?php echo esc_url( plugins_url( '../admin/images/logo.png', __FILE__) ); ?>" alt="Logo Contact Form 7 Database Manager Addon" /></a>
					</div>
					<div class="col-md-3 col-3 text-right">
						<a href="https://wordpress.org/support/plugin/form-data-manager/"><img class="support-icon" src="<?php echo esc_url( plugins_url( '../admin/images/support-icon.png', __FILE__) ); ?>" alt="support" /></a>
					</div>
				</div>

      		</div>
    	</header>

    	
		    <main>
		    
				<div class="container mt-5 section-importation">
					<div class="row">
						<div class="col-md-12">
							<img class="h2-icon" src="<?php echo esc_url( plugins_url( '../admin/images/h2-icon-import.png', __FILE__) ); ?>" />
							<h2><?php _e('Import records', 'form-data-manager'); ?></h2>
							
							The import feature scans your database for data saved by other plugins. If any relevant data is detected, it can be seamlessly imported. IF YOU NOTICE any submissions not captured during this process, please get in touch with our <a target="_blank" href="https://wordpress.org/support/plugin/form-data-manager/">support</a> team.

							<br /><br />

							<hr />

							<?php 


							    if( !empty ($_GET['import']) ) {
							    	$this->import_data();
									
									_e('Your records have been imported.', 'form-data-manager');

								} else {
									require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-cf7-dao.php' );

							    	if( WPFDM_CF7_Dao::getInstance()->get_cf7_forms_count() == 0) {
										_e('You have no data to import.', 'form-data-manager');
									} else {
										printf( __('We found %s record(s) already saved by other plugins, would you like us to import them for you?', 'form-data-manager'),  WPFDM_CF7_Dao::getInstance()->get_cf7_forms_count() );
										
										echo '<form action="">
											<input type="hidden" name="page" value="fdm_imports" />
										';

										submit_button( __('Import', 'form-data-manager'), 'primary', 'import');

										echo '<form action="">';
									}
								}
						        
						    ?>
						</div>
					</div>
				</div>
			</main>
		
		<?php 
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that imports the data, after the button is triggered
    * 
    */
    function import_data () {

		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-cf7-dao.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );

		// Gets the contacts rows
    	$contact_results = WPFDM_CF7_Dao::getInstance()->get_contacts_from_cfdb7();
		
		// Inserts the contacts rows
		WPFDM_Contact_Dao::getInstance()->add_rows( $contact_results );
		
		// Gets the forms rows
    	$form_results = WPFDM_CF7_Dao::getInstance()->get_forms_from_cfdb7();
		
		// Inserts the forms rows
		WPFDM_Form_Dao::getInstance()->add_rows( $form_results );
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that inserts JS codes in the footer of the page
    *
    */
    public function add_js_script_to_footer(){ 
		?>

		<script>
			jQuery(document.body).addClass('fdm');
		</script>

		<?php 
	}
}

}