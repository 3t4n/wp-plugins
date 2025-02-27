<?php 
// check user capabilities
if ( ! is_admin() ) {
    return;
}

if ( ! class_exists( 'WPFDM_Forms_List' ) ) {

/** 
*
* @since 1.0.0
* 
*
* WPFDM_Forms_List handles the form listing page, with all its actions.
*
*/
class WPFDM_Forms_List {

	/**
	*
    * @var Singleton
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* @var Singleton
	* Constructor
	*
	* @param void
	* @return void
	*/
	private function __construct() {  
	}
 
	/**
	* @var Singleton
	* Singleton pattern
	* 
	*
	* @param void
	* @return WPFDM_Forms_List
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Forms_List();
		}

		return self::$_instance;
	}


	public $forms;				// Handles all forms

	public $state_to_print;		// Handles the state of the forms to print: enabled, disabled or All

	public $disable_count;		// Handles the number of disabled forms
    public $enable_count;		// Handles the number of enabled forms
    public $all_count;			// Handles the number of all forms

    public $infos_message;		// Handles infos message to print
    public $alerts_message;		// Handles alerts message to print

    public $active_theme_num;	// This plugin provides two theme for data view:1 and 2. This attribute handles the number of the active theme

	/** 
	*
    * @since 1.0.0
    * 
    * Main function that:
    * - Prints the page
    * - Executes actions
    * - etc.
	*
    */
    public function run() {

    	require_once (plugin_dir_path( __FILE__ ) . '/utils/class-wpfdm-utilities.php');

    	// Reads the REQUEST parameters
		$this->read_parameters();

		// Gets the data
		$this->get_data();

		// Calculates the numbers to be printed in the page
		$this->calculate_active_inactive_forms();
	    
	    // Displays the content
		$this->display_content() ;

        // Add JS to the the footer of the page
		add_action('admin_footer' , array( $this, 'add_js_script_to_footer') );
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that reads the REQUEST parameters
    *
    */
    public function read_parameters() {

		if( ! empty ( $_GET['state'] ) ) {
			$this->state_to_print = sanitize_text_field( $_GET['state'] );
		}

		if( ! empty ( $_GET['t'] ) ) {
			$this->active_theme_num = (int) sanitize_key( $_GET['t'] );
		}else {
			$this->active_theme_num = 2;
		}
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that enables/disables a specific form
    *
    */
    public function enable_fdm_form() {

		try {

			if ( ! isset( $_POST['state'] ) || ! isset( $_POST['form_id'] ) ) {
				return;
			}

			$new_state 	= (int) sanitize_key( $_POST['state']);
			$form_id 	= (int) sanitize_key( $_POST['form_id'] );

			require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );

			$response = array();

			$form_has_or_forms_have = $form_id == -1 	? 'forms have' 	: 'form has';
			$enabled_or_disabled 	= $new_state == 1 	? 'enabled' 	: 'disabled';
			
			if ( $form_id == -1 ) {

				WPFDM_Form_Dao::getInstance()->activateAll ( $new_state );
			
			} 
			// if we have to enable/desable only one form
			else {

				$fields_to_update = array( 'form_state' => $new_state );

	        	WPFDM_Form_Dao::getInstance()->update ( $form_id , $fields_to_update );
			}

			$response['message'] = __( "The " . $form_has_or_forms_have . " successfully been " . $enabled_or_disabled , 'form-data-manager' );

			$result = $this->calculate_active_inactive_forms();

			$all_text = sprintf ( 
    			__('All (%d)', 'form-data-manager') , 
		    	$result ['all'] 
			);
			$enable_text = sprintf ( 
	    		__('Active (%d)', 'form-data-manager') , 
	    		$result ['enable'] 
    		);
    		$disable_text = sprintf ( 
	    		__('Inactive (%d)', 'form-data-manager') , 
	    		$result ['disable'] 
	    	);

			$response['data'] = array(
				'all_text' 		=>  $all_text,
				'enable_text' 	=> 	$enable_text,
				'disable_text' 	=> 	$disable_text,
			);
	    	
	    	echo json_encode( $response );

	    	// terminate immediately and return a proper response*/
	    	wp_die();

	    }catch (Throwable $e) {
	    	wp_send_json_error( $e );
	    }
	}

	/** 
	*
    * @since 1.0.0
    *
    *
    * Function that displays the content, it prints:
    * - The header
    * - The info and error messages
    * - The gobal actions: activate all, deactivate all, theme 1, theme 2
    *
    */
    public function display_content() {

		?>

		<div>
		    <header>
		        <div class="container h-100">

		        	<!-- The logo and the page title -->

					<div class="row align-items-center h-100">
						<div class="col-md-9 col-9 mt-3">
							<a href="admin.php?page=fdm_form"><img class="logo-fdm" src="<?php echo esc_url( plugins_url( '../admin/images/logo.png', __FILE__) ); ?>" alt="Logo Contact Form 7 Database Manager Addon" /></a>
						</div>
						<div class="col-md-3 col-3 text-right">
							<a href="https://wordpress.org/support/plugin/form-data-manager/"><img class="support-icon" src="<?php echo esc_url( plugins_url( '../admin/images/support-icon.png', __FILE__) ); ?>" alt="support" /></a>
						</div>
					</div>

					<!-- The error messages -->
					<?php 
					WPFDM_Utilities::display_errors();
		          	?>
		          	
		          	<!-- The infos messages -->
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="toast toast_infos" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="3000" data-animation="true">
								<div class="toast-body">
									<p>
										<span id="toast_infos_id"></span>
										<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</p>
								</div>
							</div>
						</div>
					</div>

		      	</div>
	    	</header>

		    <main>
		        <div class="container mt-5">

		        	<!-- The page title -->
		            <div class="row">
		                <div class="col-md-12">
		                    <img class="h2-icon" src="<?php echo esc_url( plugins_url( '../admin/images/h2-icon.png', __FILE__) ); ?>" />
		                    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
		                </div>
		            </div>

		        	<!-- the links: All, activated and inactivated -->
		            <div id="actions-tp" class="row align-items-center h-100">
		                <div class="col-md-6 col-9">
		                    <nav class="my-2 my-md-0 mr-md-3">
		                    	<?php 

		                			$theme_param = $this->active_theme_num == 1 ? "t=1" : "t=2";

		                    		$link_all 				= "?page=fdm_form&l=f&" . $theme_param;
		                    		$link_active 			= "?page=fdm_form&l=f&state=a&" . $theme_param;
		                    		$link_inactive 			= "?page=fdm_form&l=f&state=i&" . $theme_param;

		                    		$all_extra_class 		= $this->state_to_print == '' ? "active" : "";
		                    		$active_extra_class 	= $this->state_to_print == 'a' ? "active" : "";
		                    		$inactive_extra_class 	= $this->state_to_print == 'i' ? "active" : "";
		                    	?>

		                        <a class="pr-2 <?php echo esc_attr( $all_extra_class );?>" href="<?php echo esc_url( $link_all ); ?>" id="link_all_id">
		                        	<?php 
		                        	printf ( 
		                        		__('All (%d)', 'form-data-manager') , 
		                        		$this->all_count 
		                        	); 
		                        	?>
		                        </a>
		                        <a class="p-2 <?php echo esc_attr( $active_extra_class );?>" href="<?php echo esc_url( $link_active ); ?>"  id="link_active_id" >
		                        	<?php 
		                        	printf ( 
		                        		__('Active (%d)', 'form-data-manager') , 
		                        		$this->enable_count 
		                        	); 
		                        	?>
		                        </a>
		                        <a class="p-2 <?php echo esc_attr( $inactive_extra_class );?>" href="<?php echo esc_url( $link_inactive ); ?>" id="link_inactive_id" >
		                        	<?php 
		                        	printf ( 
		                        		__('Inactive (%d)', 'form-data-manager') , 
		                        		$this->disable_count 
		                        	); 
		                        	?>
		                        </a>
		                  </nav>
		                </div>
		                <div class="col-md-6 col-3 affichage text-right">
		                	
		                </div>
		            </div>

		        	<!-- 
		        	The switch : activate all/deactivate all 
					The links to switch between the two themes
		        	-->
		            <div class="row mt-2 mb-2 align-items-center h-100">
		                <div class="col-md-6 col-6">
		                    <div class="toggle-activer">
		                        <label class="switch">
		                          <input 
		                          	type="checkbox" data-form-id="-1" 
		                          	<?php 
		                          		if ($this->enable_count == $this->all_count) {
		                          			echo "checked" ;
		                          		} else {
		                          			echo "";
		                          		}
		                          	?>
		                          />
		                          <span class="slider round"></span>
		                        </label>
		                        <span class="text-act-ts">
		                        	<?php 
		                        	if ($this->enable_count == $this->all_count) {
	                          			_e('Disable all', 'form-data-manager');
		                        	} else { 
	                          			_e('Enable all', 'form-data-manager');
	                          		}
	                          	?>
		                        </span>
		                    </div>
		                </div>
		                
		                <div class="col-md-6 col-3 affichage text-right">
		                    <?php 

		                    if( $this->state_to_print == 'a' ) {
		                    	$state_param = "&state=a";
		                    }elseif( $this->state_to_print == 'i' ) {
		                    	$state_param = "&state=i";
		                    }else {
		                    	$state_param = "";
		                    }

		                	$link_1	= "?page=fdm_form&l=f&t=1" . $state_param;
		                	$link_2	= "?page=fdm_form&l=f&t=2" . $state_param;

		                	$icon_theme_1 = '';
		                	$icon_theme_2 = '';

		                	if( $this->active_theme_num == 1 ) {
			                	$icon_theme_1 = 'theme_1_gray';
			                	$icon_theme_2 = 'theme_2_blue';
			                }elseif( $this->active_theme_num == 2 ) {
			                	$icon_theme_1 = 'theme_1_blue';
			                	$icon_theme_2 = 'theme_2_gray';
			                }
		                	?>

		                    <a class="p-1" href="<?php echo esc_url( $link_1 ); ?>">
		                    	<img src="<?php echo esc_url( plugins_url( '../admin/images/' . $icon_theme_1 . '.png', __FILE__) ); ?>" alt="" />
		                    </a>
		                    <a class="" href="<?php echo esc_url( $link_2 ); ?>">
		                    	<img src="<?php echo esc_url( plugins_url( '../admin/images/' . $icon_theme_2 . '.png', __FILE__) ); ?>" alt="" />
		                    </a>
		                </div>
		            </div>
		            <div class="row">
		                <?php 
		                if( $this->active_theme_num == 1 ) {
		                	$this->display_table_in_theme_1();
		                }elseif( $this->active_theme_num == 2 ) {
		                	$this->display_table_in_theme_2();
		                }
		                ?>
		            </div>
		        </div>
		    </main>
		</div>
		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Displays the list of forms following the logic of the theme 1
    *
    */
    function display_table_in_theme_1 () {
		
		if( empty( $this->forms ) ) { 
    	?>
    		<tr><td colspan="4"><?php _e('No form found.', 'form-data-manager'); ?></td></tr>
    	<?php 
    	} else { 

    		foreach ( $this->forms as $form ) {

    			$form_id 				= $form['form_id'];
    			$form_title 			= stripslashes( $form['form_title'] );
    			$form_count 			= $form['count'] ;
    			$contact_or_contacts 	= $form['count'] > 1 ? __('contacts', 'form-data-manager') : __('contact', 'form-data-manager') ;

    			$form_state 			= $form['form_state'];
    			$checked				= $form_state == 1 ? "checked" : "";
    			
    			$last_contact_date		= $form['last_contact'];
    			if( ! empty ( $last_contact_date ) ) {
    				// Format the date to suit the WP preferences
					$last_contact_date 	= WPFDM_Utilities::mysql2WPdate($last_contact_date, false);
    			}

    			$view_link 				= $form_count == 0 ? "#" : ("?page=fdm_form&l=c&form_id=" . $form_id);
    			$download_link			= $form_count == 0 ? "#" : ("?page=fdm_form&l=c&form_id=" . $form_id . '&export=true&format=csv');

    			$empty_class	= $form_count == 0 ? "fdm-no-contact" : "";

			?>
	        <div class="col-md-4">
	            <table class="table table-form style_1">
	                <thead class="thead-table-form">
	                    <tr>
	                        <th class="horz-ligne" scope="row" colspan="2"></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td scope="row" class="nom-form border-r align-middle">
	                            <a href="<?php echo esc_url( $view_link ); ?>" class="<?php echo $empty_class; ?>"><?php echo esc_html( $form_title ); ?></a>
	                        </td>

	                        <td class="text-center align-middle">
	                        	<a href="<?php echo esc_url( $view_link ); ?>" class="<?php echo $empty_class; ?>">
	                        		<span class="nombre-leads"><?php echo esc_html( $form_count ); ?></span><br/>
	                        		<?php echo esc_html( $contact_or_contacts ); ?>
	                        	</a>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td class="border-r align-middle date-insc" title="<?php _e('Last submission', 'form-data-manager');?>"><?php echo esc_html( $last_contact_date );?></td>
	                        <td class="icons-actions icons-actions-width align-middle text-center">
	                            <a href="<?php echo esc_url( $view_link ); ?>" title="<?php _e('View', 'form-data-manager'); ?>" class="<?php echo $empty_class; ?>">
	                            	<img class="pr-2" src="<?php echo esc_url( plugins_url( '../admin/images/view-icon.png', __FILE__) ); ?>" alt="<?php _e('View', 'form-data-manager'); ?>" /></a>
	                            <a href="<?php echo esc_url( $download_link ); ?>" title="<?php _e('Download', 'form-data-manager'); ?>" class="<?php echo $empty_class; ?>"><img class="pr-2" src="<?php echo esc_url( plugins_url( '../admin/images/export-icon.png', __FILE__) ); ?>" alt="<?php _e('Download', 'form-data-manager'); ?>" /></a>
	                            <label class="switch">
									<input class="form_checkbox_class" type="checkbox" <?php echo esc_attr( $checked ); ?> data-form-id="<?php echo esc_attr( $form_id ); ?>" >
	                              	<span class="slider round"></span>
	                            </label>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>


		<?php

			}
		}
	}
	
	/** 
	*
    * @since 1.0.0
    *
    * Displays the list of forms following the logic of the theme 2
    *
    */
    function display_table_in_theme_2 () {
		?>
		<div class="col-md-12">
            <table class="table table-form">
                <thead class="thead-table-form">
                    <tr>
                        <th scope="col"><?php _e('Form name', 'form-data-manager'); ?></th>
                        <th scope="col" class="text-center"><?php _e('Count', 'form-data-manager'); ?></th>
                        <th scope="col" class="text-center d-date"><?php _e('Last submission', 'form-data-manager'); ?></th>
                        <th scope="col" class="text-center"><?php _e('Actions', 'form-data-manager'); ?></th>
                    </tr>
                </thead>
                <tbody>

                	<?php 
                	if( empty( $this->forms ) ) { 
                	?>
                		<tr><td colspan="4"><?php _e('No form found.', 'form-data-manager'); ?></td></tr>
                	<?php 
                	} else { 

                		foreach ( $this->forms as $form ) {

                			$form_id 				= $form['form_id'];
                			$form_title 			= stripslashes( $form['form_title'] );
                			$form_count 			= $form['count'] ;
                			$contact_or_contacts 	= $form['count'] > 1 ? __('contacts', 'form-data-manager') : __('contact', 'form-data-manager') ;

                			$form_state 			= $form['form_state'];
                			$checked				= $form_state == 1 ? "checked" : "";
                			
                			$last_contact_date		= $form['last_contact'];
                			if( ! empty ( $last_contact_date ) ) {
                				// Format the date to suit the WP preferences
								$last_contact_date 	= WPFDM_Utilities::mysql2WPdate($last_contact_date, false);
                			}

                			$view_link 				= $form_count == 0 ? "#" : ("?page=fdm_form&l=c&form_id=" . $form_id);
                			$download_link			= $form_count == 0 ? "#" : ("?page=fdm_form&l=c&form_id=" . $form_id . '&export=true&format=csv');
										
    						$empty_class	= $form_count == 0 ? "fdm-no-contact" : "";

                		?>
                        <tr>
							<th scope="row" class="nom-form align-middle">
                            	<div class="toggle-activer">
                                    <label class="switch">
	                                    <input 
	                                    	class="form_checkbox_class" 
	                                    	type="checkbox" <?php echo esc_attr( $checked ); ?> 
	                                    	data-form-id="<?php echo esc_attr( $form_id ); ?>" >
	                                    <span class="slider round"></span>
                                    </label>
                                    <a href="<?php echo esc_url( $view_link ); ?>" class="<?php echo $empty_class; ?>"><?php echo esc_html( $form_title ); ?></a>
                                </div>
                            </th>
                            <td class="text-center align-middle">
                            	<a href="<?php echo esc_url( $view_link ); ?>" class="<?php echo $empty_class; ?>">
                            		<span class="nombre-leads"><?php echo esc_html( $form_count ); ?></span>
                            		<br/><?php echo esc_html( $contact_or_contacts ); ?>
                            	</a>
                            </td>
                            <td class="text-center align-middle d-date"><?php echo esc_html( $last_contact_date );?></td>
                            <td class="icons-actions align-middle text-center">
                                <a 
                                	href="<?php echo esc_url( $view_link ); ?>" 
                                	title="<?php _e('View', 'form-data-manager'); ?>" 
                                	class="<?php echo $empty_class; ?>">

                                	<img 
                                		class="pr-2" 
                                		src="<?php echo esc_url( plugins_url( '../admin/images/view-icon.png', __FILE__) ); ?>" 
                                		alt="<?php _e('View', 'form-data-manager'); ?>" 
                                	/>
                               	</a>
                                
                                <a 
                                	href="<?php echo esc_url( $download_link ); ?>"
                                	title="<?php _e('Download', 'form-data-manager'); ?>" 
                                	class="<?php echo $empty_class; ?>">
                                	
                                	<img 
                                		class="pr-2" 
                                		src="<?php echo esc_url( plugins_url( '../admin/images/export-icon.png', __FILE__) ); ?>" 
                                		alt="<?php _e('Download', 'form-data-manager'); ?>" 
                                	/>
                                </a>
                            </td>
                        </tr>
                	<?php 	
                		} 
            		} 
            		?>
                </tbody>
            </table>
        </div>

		<?php
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
			
			// We add a css class to the body

			jQuery(document.body).addClass('fdm');


	        jQuery(document).ready(function(){
	        	
	        	// Once the switch state changed, we change the state of the form via Ajax call

	        	jQuery('input[type="checkbox"]').change(function() {
	        			
	        		var form_id = jQuery(this).data ('form-id');
	        		var state 	= this.checked ? 1 : 0;

	        		var data = {
						'action' 	: 'enable_fdm_form',
						'form_id'	: form_id,
						'state'		: state
					};

					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data) 
						.done(

							function (json_response) {
						
								// If success, we get the message and update some fields
								response = jQuery.parseJSON( json_response );
								
								jQuery('#link_all_id')		.text (response.data.all_text);
								jQuery('#link_active_id')	.text (response.data.enable_text);
								jQuery('#link_inactive_id')	.text (response.data.disable_text);

								// We print an infos message in the toast component
								jQuery('#toast_infos_id')	.html (response.message);
								jQuery('.toast_infos').toast('show');

								// If the changed switch is the one for activate all/deactivate all, then we apply changes on all other switches

								if ( form_id == -1 ) {							
						            jQuery(".form_checkbox_class").each( function() {
						            	if ( state == 0 ) {
						                	jQuery(this).removeAttr('checked');
						            	} else {
							                jQuery(this).attr('checked', 'checked');
						            	}
						            });
								}
							}
						)
						.fail (
							function(xhr, status, error) {}
						);
			    });
	        });


	    </script>

	<?php 
	} 

	/**
	*
    * @since 1.0.0
    * 
    * 
	* Function that loads the forms and the contacts count from the DB
	* 
	*/
	public function get_data() {

		$state_condition = '';

		if( ! empty ( $this->state_to_print ) ) {
			if ( $this->state_to_print == 'a' ){
				$state_condition = ' AND form_state = 1 ';
			} else {
				$state_condition = ' AND form_state = 0 ';
			}
		}

		global $wpdb;
		
		// Import the required classes
    	require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );
    	require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );

    	$contacts_table = $wpdb->prefix . WPFDM_Contact_Dao::$TABLE_NAME;
    	$forms_table 	= $wpdb->prefix . WPFDM_Form_Dao::$TABLE_NAME;
    	
		$sql = "SELECT f.form_id as form_id, f.form_title as form_title, count(c.contact_id) as count, f.form_state as form_state, MAX(c.contact_date) as last_contact 
				FROM " . $forms_table . " f LEFT OUTER JOIN " . $contacts_table . " c ON f.form_id = c.form_id 
				WHERE 1 " . $state_condition . " 
				GROUP BY form_id ";

		$this->forms = $wpdb->get_results( $sql , 'ARRAY_A' );

	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that calculates the active/deactive forms from the DB
    *
    */
    public function calculate_active_inactive_forms() {

		$this->disable_count 	= 0;
        $this->enable_count 	= 0;
        $this->all_count 		= 0;

        global $wpdb;
		
		// Import the required classes
    	require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );

    	$forms_table 	= $wpdb->prefix . WPFDM_Form_Dao::$TABLE_NAME;
    	
		$sql = "SELECT * FROM " . $forms_table;

		$results = $wpdb->get_results( $sql , 'ARRAY_A' );

        if( empty ( $results ) ) {
        	return 
        		array(
		        	'all' 		=> 0,
		        	'enable' 	=> 0,
		        	'disable' 	=> 0,
		        );
        }

        foreach ( $results as $result ) {
			
			$this->all_count++;

			if( $result ['form_state'] == 1 ) {
				$this->enable_count ++;
			} else {
				$this->disable_count++;
			}

        }

        // useful if we wat the function to return the values
        // espacially useful for the function : enable_fdm_form (used with ajax)
        return array(
        	'all' 		=> $this->all_count,
        	'enable' 	=> $this->enable_count,
        	'disable' 	=> $this->disable_count,
        );

	}

}

}