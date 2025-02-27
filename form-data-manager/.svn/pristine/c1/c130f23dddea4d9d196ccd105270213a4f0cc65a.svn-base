<?php 
// check user capabilities
if ( ! is_admin() ) {
    return;
}

/** 
*
* @since 1.0.0
* 
*/
class WPFDM_Contacts_List {

	private $form_id;				// Handles the current form_id
	private $search_text;			// Handles the search text, if any
	private $contact_read;			// 1, 0 or NaN, it handles the GET parameter, used to print read, new or all the contacts 
	private $forms_read_count;		// Handles the number of the read contacts
	private $forms_unread_count;	// Handles the number of the new contacts
	private $forms_count; 			// Handles the number allcontacts

	private $table_page_num;		// Handles the page num, used for pagination
	private $elements_per_page;		// Handles the nomber of elements to be printed per page

    public $active_theme_num;		// This plugin provides two theme for data view:1 and 2. This attribute handles the number of the active theme 

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
	* @return WPFDM_Contacts_List
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Contacts_List();
		}

		return self::$_instance;
	}

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

    	// We init the page
    	$this->init();
		
		// We get the action to perform
		$action = empty( $_REQUEST['action'] ) 	? '' : sanitize_text_field( $_REQUEST['action'] );

		// We perform actions if any
		if( !empty ( $action ) ) {
			$this->perform_actions( $action );
		}
		
		// We load the data
		$this->items = $this->get_data();

        // We print the data
        $this->display_content();

        // We add JS to the footer of the page
        add_action('admin_footer' , array( $this, 'add_js_script_to_footer') );

	}

	/**
	* @since 1.0.0
    * 
    * Function that:
    * - Initializes variables, 
    * - Gets parameters
	*
	*/
	function init() {

		$this->elements_per_page = 10;

		$this->form_id 			= empty($_REQUEST['form_id']) 		? 0 	: (int) sanitize_key( $_REQUEST['form_id'] );
		
		$this->contact_read  	= empty($_REQUEST['contact_read']) 	? '' 	: (int) sanitize_key( $_REQUEST['contact_read'] );

		$this->table_page_num 	= empty($_REQUEST['page_num']) 		? 1 	: (int) sanitize_key( $_REQUEST['page_num'] );

		$this->search_text 		= empty( $_REQUEST['s'] ) 			? '' 	: sanitize_text_field( $_REQUEST['s'] );

		$this->sort_by 			= empty( $_REQUEST['sort_by'] ) 	? '' 	: sanitize_text_field( $_REQUEST['sort_by'] );

		$this->active_theme_num = empty ( $_REQUEST['t'] ) 			? 2 	: (int) sanitize_key( $_REQUEST['t'] );

	}

	/**
	*
	* @since 1.0.0
    * 
    * Function that retrieves forms’ data from the database
	*
	*/
	public function get_data() {

		global $wpdb;

		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );
    	$contacts_table = $wpdb->prefix . WPFDM_Contact_Dao::$TABLE_NAME;
		
		// Load form_title
		
		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );
		$forms_table = $wpdb->prefix . WPFDM_Form_Dao::$TABLE_NAME;
		$result = $wpdb->get_results("SELECT form_title FROM $forms_table WHERE form_id = " . $this->form_id,  
			'ARRAY_A');

		if( ! empty($result) ) {
			$this->form_title = $result[0]['form_title'];
		}

		// Load contacts

		$search_cond = ( ! empty( $this->search_text ) ) ? ( " AND UPPER(contact_value) like UPPER('%" .  $this->search_text . "%') " ) : '';

		$read_cond = ( ! empty( $this->contact_read ) ) ? ( " AND contact_read = " .  $this->contact_read ) : '';

		// Calculate the number of reads and unreads contacts
		$result = $wpdb->get_results( 
			"SELECT contact_read, count(*) as nbre  
			FROM $contacts_table 
			WHERE form_id = " . $this->form_id . 
			$search_cond . ' 
			GROUP BY contact_read' 
			, 
			'ARRAY_A' );

		foreach ( $result as $row ) {
			if ( $row['contact_read'] == 1 ) {
				$this->forms_read_count = $row['nbre'];
			} else if ( $row['contact_read'] == 0 ) {
				$this->forms_unread_count = $row['nbre'];
			}
		}
		$this->forms_count = $this->forms_unread_count + $this->forms_read_count;

		// Get the list of contacts
		$data = array();

		$result = $wpdb->get_results( 
			"SELECT * 
			FROM $contacts_table 
			WHERE form_id = " . $this->form_id . 
			$search_cond .  
			$read_cond
			, 
			'ARRAY_A' );

		// Sorting 
		usort( $result, array( $this, 'usort_reorder' ) );

		return array_slice ( $result , ($this->table_page_num -1) * $this->elements_per_page , $this->elements_per_page);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that sorts the data, used in the function "get_data"
    */
    function usort_reorder( $a, $b ) {

		// If no sort, default to form-id
		$orderby = ( ! empty( $this->sort_by ) ) ? $this->sort_by : 'contact_id-asc';

		$separator_position = strrpos($orderby, "-");

		$order = substr($orderby, $separator_position + 1);
		$orderby = substr($orderby, 0, $separator_position);
		
		// Determine sort order
		$result = strcmp( $a[ $orderby ], $b[ $orderby ] );

		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
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
	function display_content() {
		?>

		<div>
		    
		    <?php $this->display_header(); ?>

		    <main>
		        <div class="container mt-5">
		            
		            <div class="row">
		                <?php $this->display_page_title(); ?>
		            </div>

		            <div id="actions-tp" class="row align-items-center h-100">
		                <?php $this->display_links(); ?>
		            </div>
		            
		            <?php 

		            // There will be two forms: one for the checkboxes, and another for all other actions. We call this latter the "fictive_form" and the former the "main_form".

		            $this->create_fictive_form();

		            $this->start_main_form(); 

		            ?>

		            <div class="row mt-2 mb-2 align-items-center h-100">
		            	<?php $this->display_bulk_actions(); ?>
		            </div>
		            
		            <div class="row m-0 row-head-info align-items-center h-100">
		            	<?php $this->display_table_header(); ?>
		            </div>

		            <?php $this->display_elements(); ?>
		            
		            <?php $this->close_main_form(); ?>

                    <div class="container pagination-cont">
						<?php $this->display_navigation(); ?>
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
    */
    function create_fictive_form() {

		?>
		<form action="" method="GET" id="fictive_form_id">
			
			<input type="hidden" name="" value="" id="field_1_to_fill_id" />
			<input type="hidden" name="" value="" id="field_2_to_fill_id" />

            <input type="hidden" name="page" 	value="fdm_form" />
            <input type="hidden" name="l" 		value="c" />
            <input type="hidden" name="t" 		value="<?php echo esc_attr($this->active_theme_num); ?>" />
            <input type="hidden" name="form_id" value="<?php echo esc_attr($this->form_id); ?>" />

		</form>
		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    *
    */
    function start_main_form() {

		?>
		<form action="" method="POST" id="sort_form_id">
        	<?php 
        	if( !empty( $this->search_text )) {
        	?>
        	<input type="hidden" name="s" 	value="<?php echo esc_attr( stripslashes_deep( $this->search_text ) ); ?>" />
        	<?php 
        	}
        	?>
            <input type="hidden" name="page" 	value="fdm_form" />
            <input type="hidden" name="l" 		value="c" />
            <input type="hidden" name="form_id" value="<?php echo esc_attr($this->form_id); ?>" />
            <input type="hidden" name="page_num" value="<?php echo esc_attr($this->table_page_num); ?>" />

        <?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    */
    function close_main_form() {

		?>
		</form>
		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that displays the page title
    * 
    */
    function display_page_title() {
		?>
		<div class="col-md-12">
            <img class="h2-icon" src="<?php echo esc_url( plugins_url( '../admin/images/h2-icon.png', __FILE__) ); ?>" />
            <h2><?php echo __('Form', 'form-data-manager') . ' : ' . stripslashes( $this->form_title ); ?></h2>
        </div>
		<?php
	}
	
	/** 
	*
    * @since 1.0.0
    * 
    * Function that displays the header and the error messages if any
    *
    */
    function display_header() {
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

		        <?php 
					WPFDM_Utilities::display_errors();
		        ?>
			 </div>
		    </header>
		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    *
    * Function that displays:
    * - The links: All, Read and New
    * - The links for the two themes
    *
    */
    function display_links() {
		?>
		<div class="col-md-6 col-8">
            <nav class="my-2 my-md-0 mr-md-3">
                <a id="all_a_id" class="p-2 active" href="?page=fdm_form&l=c&form_id=<?php echo esc_attr ( $this->form_id ); ?>">
	        		<?php _e('All', 'form-data-manager'); ?> (<?php echo esc_html( $this->forms_count ); ?>)
	        	</a>
	        	<a id="read_a_id" class="p-2" href="?page=fdm_form&l=c&form_id=<?php echo esc_attr ( $this->form_id ); ?>&contact_read=1">
	        		<?php 
	        			printf( __('Read (%d)', 'form-data-manager'), $this->forms_read_count );
	        		?>
	        	</a>					        	
	        	<a  id="unread_a_id" class="p-2" href="?page=fdm_form&l=c&form_id=<?php echo esc_attr ( $this->form_id ); ?>&contact_read=0">
	        		<?php 
	        			printf( __('New (%d)', 'form-data-manager'), $this->forms_unread_count );
	        		?>
	        	</a>
          </nav>
        </div>
        <div class="col-md-6 col-4 affichage text-right">

        	<?php 

        	$link_1	= "?page=fdm_form&l=c&t=1&form_id=" . $this->form_id;
        	$link_2	= "?page=fdm_form&l=c&t=2&form_id=" . $this->form_id;

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

		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    *
    * Function that displays the bulk actions: 
    * - Delete, 
    * - Mark as Read, and 
    * - Mark as New
    *
    */
    function display_bulk_actions() {
		?>
		<div class="col-md-5 col-8 actions-div">
            <div class="form-group">
                <select name="action" class="form-control">
                    <option selected><?php _e("Bulk actions", 'form-data-manager'); ?></option>
                    <option value="delete"><?php _e("Delete", 'form-data-manager'); ?></option>
                    <option value="unread"><?php _e("Mark as new", 'form-data-manager'); ?></option>
                    <option value="read"><?php _e("Mark as read", 'form-data-manager'); ?></option>
                </select>
            </div>
            <button type="submit" class="btn-action"><?php _e("Apply", 'form-data-manager'); ?></button>
        </div>
        
        <div class="col-md-4 rech-div">
            <input class="form-control mr-sm-2" id="search_input_id" type="search" name="s" value="<?php echo esc_attr( stripslashes_deep( $this->search_text ) ); ?>" placeholder="<?php _e("Search", 'form-data-manager'); ?>" aria-label="<?php _e("Search", 'form-data-manager'); ?>" />
            
            <button class="btn-rech" id="search_button_id">
            	<img src="<?php echo esc_url( plugins_url( '../admin/images/loupe-icon.png', __FILE__) ); ?>" alt="<?php _e("Search", 'form-data-manager'); ?>" />
            </button>
        </div>

        <div class="col-md-3 col-4 text-right">
            <a href="?page=fdm_form&l=c&export=1&format=csv&form_id=<?php echo esc_attr( $this->form_id ); ?>" class="btn-telecharger"><?php _e("Download All", 'form-data-manager'); ?></a>
        </div>

		<?php
	}
	
	/** 
	*
    * @since 1.0.0
    * 
    *
    * Function that displays the table header:
    * - The select all checkbox
    * - The sort select
    *
    */
    function display_table_header() {
		?>
		<div class="col-md-6 col-6 selection-div">
            <div class="input-group-text">
                <input type="checkbox" id="check_all_id" name="contact[]" value="-1">
            </div>
            <label for="check_all_id"><?php _e('Select all', 'form-data-manager'); ?></label>
        </div>
        <div class="col-md-6 col-6 trier-div text-right">
            <label><?php _e('Sort by', 'form-data-manager'); ?> :</label>
            <div class="form-group">
        	     <select name="sort_by" id="sort_by_id" class="form-control">
                    <option <?php if($this->sort_by == "contact_id-asc") echo esc_attr ( "selected" ); ?> value="contact_id-asc"><?php _e('Default order', 'form-data-manager'); ?></option>
                    <option <?php if($this->sort_by == "contact_date-asc") echo esc_attr ( "selected" ); ?>  value="contact_date-asc"><?php _e('Date asc', 'form-data-manager'); ?></option>
                    <option <?php if($this->sort_by == "contact_date-desc") echo esc_attr ( "selected" ); ?>  value="contact_date-desc"><?php _e('Date desc', 'form-data-manager'); ?></option>
                </select>
	        </div>
        </div>
		<?php
	}

	/** 
	*
    * @since 1.0.0
    * 
    *
    * Function that displays all the elements in the table, it:
    * - prints the requirements for the selected theme
    * - call the display_element function in a loop
    *
    */
    function display_elements() {

    	if( empty($this->items) ) {

    	}else {

    		if( $this->active_theme_num == 1 ) {
    			?>
	        	<div class="row les-leads align-items-start no-gutters">
	        	<?php 
	        }elseif( $this->active_theme_num == 2 ) {
	        	?>
				<div class="row les-leads">
	        	<?php 
	        }

    		foreach( $this->items as $contact_data ) {
    			$this->display_element( $contact_data );
    		}

    		?>
    			</div>
    		<?php 
    	}
	}
	
	/** 
	*
    * @since 1.0.0
    * 
    *
    * Function that displays one element
    *
    */
    function display_element( $contact_data ) {

    	if( $this->active_theme_num == 1 ) {
        	$this->display_element_in_theme_1( $contact_data );
        }elseif( $this->active_theme_num == 2 ) {
        	$this->display_element_in_theme_2( $contact_data );
        }
	}

	/** 
	*
    * @since 1.0.0
    *
    * Displays the given element following the logic of the theme 1
    *
    */
    function display_element_in_theme_1( $contact_data ) {

		$form_date 		= $contact_data['contact_date'];
		$contact_id 	= $contact_data['contact_id'];
		$contact_read 	= $contact_data['contact_read'];

		$read_css_class = $contact_read == 1 ? "read" : "unread";
		
		$values = unserialize($contact_data['contact_value']); 

		$shown_values 	= array_slice($values, 0, 3); 	// extract the first three elements
		$hidden_values 	= array_slice($values, 3);		// extract the elements starting at the 4th position

		// Format the date to suit the WP preferences
		$form_date = WPFDM_Utilities::mysql2WPdate($form_date);
		
		?>

		<div class="col-md-6 <?php echo esc_attr( $read_css_class ); ?>" id="read_unread_<?php echo esc_attr( $contact_id ); ?>" >
			
			<a class="toggle-info-btn class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>" data-toggle="collapse" href="#restInfo<?php echo esc_attr( $contact_id ); ?>" role="button" aria-expanded="false" aria-controls="restInfo<?php echo esc_attr( $contact_id ); ?>" data-bloc-id="<?php echo esc_attr( $contact_id ); ?>" >
				<img src="<?php echo esc_url( plugins_url( '../admin/images/toggle-info-btn.png', __FILE__) ); ?>">
			</a>
            <div class="container lead-cont class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
                <div class="row">
                    <div class="col-md-1 col-2">
                        <div class="input-group-text">
                        	<input class="check-selection checkbox_class_for_js" type="checkbox" name="contact[]" value="<?php echo esc_attr( $contact_id ); ?>" />
                        </div>
                    </div>
                    <div class="col-md-7 col-10 infos-lead">

                    	<?php
                    	foreach( $shown_values as $key=>$value ) { 
                    		$key = Ucfirst ($key);

							?>
                    		<div class="champ-info champ-info-aff2">
                                <span class="champ-nom"><?php echo esc_html( $key );?> : </span>
                                <div class="champ-valeur class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
                                	<?php 
                                	echo $this->convert_value_to( $value , 'html');
                                	?>
                                </div>
                            </div>
                    		<?php
                    	}
                    	?>

                        <div class="collapse class_to_uncollapse" id="restInfo<?php echo esc_attr( $contact_id ); ?>">

                        	<?php
                            	if ( !empty($hidden_values) ) {
	                            	foreach( $hidden_values as $key=>$value ) {
                    					$key = Ucfirst ($key);
	                            		?>
	                            		<div class="champ-info champ-info-aff2">
		                                    <span class="champ-nom"><?php echo esc_html( $key );?> : </span>
		                                    <div class="champ-valeur class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
		                                    	<?php 
			                                	echo $this->convert_value_to( $value , 'html');
			                                	?>
		                                    </div>
		                                </div>
	                            		<?php
	                            	}
	                            }
                           	?>
                        </div>
                    </div>
                    <div class="col-md-4 date-lead text-right">
                        <img src="<?php echo esc_url( plugins_url( '../admin/images/date-icon.png', __FILE__) ); ?>" alt="<?php _e('Date', 'form-data-manager'); ?>" />
                        <span><?php echo esc_html( $form_date );?></span>                 
                    </div>
                </div>
            </div>
        </div>

		<?php 
	}

	/**
	*
    * @since 1.0.0
    *
    * Function that displays the given element following the logic of the theme 2
    *
    */
	function display_element_in_theme_2( $contact_data ) {

		$form_date 		= $contact_data['contact_date'];
		$contact_id 	= $contact_data['contact_id'];
		$contact_read 	= $contact_data['contact_read'];

		$read_css_class = $contact_read == 1 ? "read" : "unread";
		
		$values = unserialize($contact_data['contact_value']); 

		$shown_values 	= array_slice($values, 0, 3); 	// extract the first three elements
		$hidden_values 	= array_slice($values, 3);		// extract the elements starting at the 4th position

		// Format the date to suit the WP preferences
		$form_date = WPFDM_Utilities::mysql2WPdate($form_date);

		?>
		          
		<div class="col-md-12 <?php echo esc_attr( $read_css_class ); ?>" id="read_unread_<?php echo esc_attr( $contact_id ); ?>" >
			<a class="toggle-info-btn class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>" data-toggle="collapse" href="#restInfo<?php echo esc_attr( $contact_id ); ?>" role="button" aria-expanded="false" aria-controls="restInfo<?php echo esc_attr( $contact_id ); ?>" data-bloc-id="<?php echo esc_attr( $contact_id ); ?>" >
				<img src="<?php echo esc_url( plugins_url( '../admin/images/toggle-info-btn.png', __FILE__) ); ?>">
			</a>
            <div class="container lead-cont class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
                <div class="row">
                    <div class="col-md-1 col-2">
                        <div class="input-group-text">
                        <input class="check-selection checkbox_class_for_js" type="checkbox" name="contact[]" value="<?php echo esc_attr( $contact_id ); ?>" />
                        </div>
                    </div>
                    <div class="col-md-8 col-10 infos-lead">

                    	<?php
                    	foreach( $shown_values as $key=>$value ) { 
                    		$key = Ucfirst ($key);
                    		?>
                    		<div class="champ-info">
                                <span class="champ-nom"><?php echo esc_html( $key );?> : </span>
                                <div class="champ-valeur class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
                                	<?php 
                                	echo $this->convert_value_to( $value , 'html');
                                	?>
                                </div>
                            </div>
                    		<?php
                    	}
                    	?>

                        <div class="collapse class_to_uncollapse" id="restInfo<?php echo esc_attr( $contact_id ); ?>">
                            <div class="champ-info">

                            	<?php
                            	if ( !empty($hidden_values) ) {
	                            	foreach( $hidden_values as $key=>$value ) { 
                    					$key = Ucfirst ($key);
	                            		?>
	                            		<div class="champ-info">
		                                    <span class="champ-nom"><?php echo esc_html( $key );?> : </span>
		                                    <div class="champ-valeur class_to_expand class_to_expand_for_<?php echo esc_attr( $contact_id ); ?>">
		                                    	<?php 
		                                    	echo $this->convert_value_to( $value , 'html');
			                                	?>
		                                    </div>
		                                </div>
	                            		<?php
	                            	}
	                            }
                            	?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 date-lead text-right">
                        <img src="<?php echo esc_url( plugins_url( '../admin/images/date-icon.png', __FILE__) ); ?>" alt="<?php _e('Date', 'form-data-manager'); ?>" />
                        <span><?php echo esc_html( $form_date );?></span>                 
                    </div>
                </div>
            </div>
        </div>

		<?php
	}

	/**
	*
	* @since 1.0.0
    *
	* Function that converts a row value (a value of an input in CF7), this value can be:
	* - A string (input field),
	* - An array (select with multiple selection, checkboxes, etc), or
	* - A file path
	*
	* This value is convert to be print in html format or csv format
	* 
	* This function is also used in the export-to-csv functionnality
	*
	*/
	function convert_value_to( $value , $format = 'html') {

		$value_string = "";

		if( is_array( $value ) ) {
			$value_type 	= $value['t'];
			$value_value 	= $value['v'];

			// If the value type is d (data)
			if( $value_type == 'd') {

				// If the value is made up of many values, case of checkboxex or multiple select
				if( is_array( $value_value ) ) { 

					$value_value = array_values( $value_value );
    				
    				if($format == 'html') {
						$value_string = esc_html( implode( ', ', $value_value) );
					}elseif ($format == 'csv'){
						$value_string = implode( ', ', $value_value);
					}

				}
				// If it is a simple value
				else {
					if($format == 'html') {
						$value_string = esc_html( $value_value );
						$value_string = str_replace("\n", "<br />", $value_string);
					}elseif ($format == 'csv'){
						$value_string = $value_value;
					}
				}
			}

			// If the value type is f (file)
			elseif( $value_type == 'f' ) {

				$wp_uploads_dir 	= wp_upload_dir();
				$fdm_uploads_dir 	= $wp_uploads_dir['basedir'] . '/fdm_uploads';
				$file_path			= $fdm_uploads_dir . '/' . $value_value;
			
	        	if ( file_exists( $file_path ) ) { 
					$fdm_uploads_url 	= $wp_uploads_dir['baseurl'] . '/fdm_uploads';
	        		$file_url			= $fdm_uploads_url . '/' . $value_value;
					
	        		if( $format == 'csv' ) {
	        			$value_string = esc_url( $file_url );
	        		}elseif( $format == 'html' ) {
	        			$value_string = '
	        				<a class="attachment-link" href="' . $file_url . '" target="_blank">
			        			<img class="attachment-icon" src="' . esc_attr( plugins_url( "../admin/images/attachment.png", __FILE__) ) . '" alt="attachment" />
			        			' . $value_value . '
			        		</a>
	        			';
	        		}
	        	}else {
	        		$value_string = __('(No file found)', 'form-data-manager');
	        	}
			}
		}else {
			$value_string = esc_html( $value );
		}

		return stripslashes( $value_string );
    	
	}

	/** 
	*
    * @since 1.0.0
    *
    *
    * Function that prints the navigation elements:
    * - The links to other pages, and
    * - The number of items.
    * 
    */
    function display_navigation() {
		?>

			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						<span>
							<?php 
								echo esc_html( $this->forms_count . ' ' . __('Elements', 'form-data-manager') );
							 ?>
						</span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<nav>
						<ul class="pagination justify-content-center">
							
							<?php 

							$pages_count = $this->forms_count / $this->elements_per_page;

							// Get the next highest integer value by rounding up value if necessary : 2.3 => 3, 7.1 => 8, etc. 
							$pages_count = ceil( $pages_count );

							// If the current page num is 1, then the previous link must be on the same page (1), otherwise, to the current page num minus 1.
							$previous_page_num 	= $this->table_page_num > 1  			? $this->table_page_num - 1 : 1;
							
							// If the current page num is the last (pages_count), then the next link must be on the same page (pages_count), otherwise, to the current page num plus 1.
							$next_page_num 		= $this->table_page_num < $pages_count  ? $this->table_page_num + 1 : $pages_count;
							
							$previous_url 	= $this->build_new_current_url();
							$previous_url 	= $previous_url . "&page_num=" . $previous_page_num;

							$next_url 		= $this->build_new_current_url();
							$next_url 		= $next_url . "&page_num=" . $next_page_num;

							?>
							<li class="page-item">
								<a class="page-link btn-prev" href="<?php echo esc_url( $previous_url );?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only"><?php _e('Previous', 'form-data-manager'); ?></span>
								</a>
							</li>
							
							<?php 

							$left_page_links_to_display 	= 4;
							$right_page_links_to_display 	= 4;

							$start_index 	= 1;
							$end_index 		= $pages_count;

							if( $this->table_page_num > $left_page_links_to_display )
								$start_index = $this->table_page_num - $left_page_links_to_display ;

							if( $this->table_page_num + $right_page_links_to_display < $pages_count )
								$end_index = $this->table_page_num + $right_page_links_to_display ;

							for( $page_index = $start_index ; $page_index <= $end_index ; $page_index++ ) {
								$active_class = $page_index == $this->table_page_num ? "page-active" : "";

								$url = $this->build_new_current_url();
								$url = $url . "&page_num=" . $page_index;
								
							?>
								<li class="page-item">
									<a class="page-link <?php echo esc_attr( $active_class ); ?>" href="<?php echo esc_url( $url ); ?>">
										<span class="page_index_number"><?php echo esc_html( $page_index ); ?></span>
										<span class="page_index">
											<?php
											printf(
											    __('Page %d', 'form-data-manager' ),
											    $page_index
											);
											?>
										</span>
									</a>
								</li>
							<?php 
							}
							?>

							<li class="page-item">
								<a class="page-link btn-next" href="<?php echo esc_url( $next_url );?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only"><?php _e('Next', 'form-data-manager'); ?></span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

		<?php
	}

	/**
	*
	* @since 1.0.0
    * 
	* This function builds a url for the current page, with the following parameters:
	* - page 	= fdm_form
	* - l 		= c      // Param for the page level "c" stands for contact, "f" for forms.
	* - form_id = the current form id
	* - s 		= the searched text if any
	* - sort_by = the sort option if any
	*
	* 
	*/
	function build_new_current_url() {

		$page_parameter 	= "&page=fdm_form";
		$level_parameter 	= "&l=c";
		$theme_parameter 	= "&t=" . $this->active_theme_num;
		$form_id_parameter 	= "&form_id=" . $this->form_id;

		$url = "?" . $page_parameter . $level_parameter . $theme_parameter . $form_id_parameter;

		if( !empty( $this->search_text )) {
			$url 	= $url . "&s=" . $this->search_text;
		}
		if( !empty( $this->sort_by )) {
			$url 	= $url . "&sort_by=" . $this->sort_by;
    	}
    	return $url;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that perform a specific action:
    * - Delete
    * - Mark as Read
    * - Mark as New or unread
    * 
    */
    function perform_actions( $action ) {
		
		if( !isset( $_REQUEST['contact'] ) ) return;
		
		// We sanitize the array of contacts ids, sent by the checkboxes
		$selected_contact_ids =  (array) $_REQUEST['contact'];
		$selected_contact_ids = array_map( 'sanitize_key', $selected_contact_ids );
		
		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );
		
		switch ( $action ) {

			case 'delete': 
				foreach ( $selected_contact_ids as $id ) {
					WPFDM_Contact_Dao::getInstance()->delete( (int) $id );
				}

				;break;
			case 'read': 
				foreach ( $selected_contact_ids as $id ) {
					WPFDM_Contact_Dao::getInstance()->update( (int) $id,  array( 'contact_read' => 1 ) );
				}
				break;
			case 'unread': 
				foreach ( $selected_contact_ids as $id ) {
					WPFDM_Contact_Dao::getInstance()->update( (int) $id,  array( 'contact_read' => 0) );
				}
				;break;
		}
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function called with Ajax and mark a contact as read/new
    * 
    */
    public function mark_contact_as_read_fdm_form() {

		try {

			if ( ! isset( $_POST['contact_id'] ) ) {
				return;
			}

			$contact_id = (int) sanitize_key( $_POST['contact_id']) ;

			require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );

			WPFDM_Contact_Dao::getInstance()->update( $contact_id,  array( 'contact_read' => 1 ) );

			$response = array();
			
			/* We aim to return a response in JSON format, this is an example : 
			*  {
			*	"message":1
			* }
			*/

			$response['message'] 	= 1;
			
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
    * Function that inserts JS codes in the footer of the page
    *
    */
    public function add_js_script_to_footer(){ 
		?>

		<script>

			// We add a css class to the body

			jQuery(document.body).addClass('fdm');

	        jQuery(document).ready(function(){

				jQuery('#check_all_id').change(function() {
					var checked = jQuery(this).prop('checked');
					jQuery(".checkbox_class_for_js").attr("checked",checked);
				});	        	

				jQuery('.toggle-info-btn').click(function() {

					// jQuery(this) refers to the triggered link 

					var action = jQuery(this).hasClass( 'expanded' ) ? 'off' : 'on';

					// 1 - Remove expanded class from the divs of all elements.
					jQuery(".class_to_expand").removeClass( "expanded" );

					// 1 - Hide all the collapsible elements.
					jQuery(".class_to_uncollapse").collapse("hide");

					if (action == 'on' ) {

						// Get the bloc id and the divs to expand/unexpand
						var bloc_id 		= jQuery(this).data('bloc-id');
						var divs_to_expand 	= 'class_to_expand_for_' + bloc_id;

						jQuery('.' + divs_to_expand).addClass( "expanded" );

						var data = {
							'action' 		: 'mark_contact_as_read_fdm_form',
							'contact_id'	: bloc_id,
						};

						jQuery.post(ajaxurl, data) 
						.done(

							function (json_response) {
						
								response = jQuery.parseJSON( json_response );
								
								if ( response.message == 1 ) {	
								    jQuery("#read_unread_" + bloc_id).removeClass('unread');
						            jQuery("#read_unread_" + bloc_id).addClass('read');
								}
							}
						)
						.fail (
							function(xhr, status, error) {
						        return false;
						    }
						);

					}
				});

				jQuery('#sort_by_id').change(function() {

					// We fill the field_1_to_fill_id field with the sort_by selected value
					var selected_value = jQuery(this).val();

					jQuery('#field_1_to_fill_id').attr('name', 'sort_by');
					jQuery('#field_1_to_fill_id').attr('value', selected_value);

					// We fill the field_2_to_fill_id field with the search input value
					var search_input_value = jQuery('#search_input_id').val();

					jQuery('#field_2_to_fill_id').attr('name', 's');
					jQuery('#field_2_to_fill_id').attr('value', search_input_value);

					// We submit the other form whose id is: fictive_form_id
					jQuery('#fictive_form_id').submit();
				});

				jQuery('#search_input_id').keydown(function (e) {
			        
			        if (e.keyCode == 13) {

			        	// We don't submit the parent form, otherwise we may execute bulk actions is some checkboxes are checked
			            e.preventDefault(); 

						// We fill the field_1_to_fill_id field with the search input value
			            var search_input_value = jQuery(this).val();

						jQuery('#field_1_to_fill_id').attr('name', 's');
						jQuery('#field_1_to_fill_id').attr('value', search_input_value);

						
						// We submit the other form whose id is: fictive_form_id
						jQuery('#fictive_form_id').submit();

			            return false;
			        }
			    });

				jQuery('#search_button_id').click(function (e) {
			        
			        // We don't submit the parent form, otherwise we may execute bulk actions is some checkboxes are checked
			        e.preventDefault();

		            // We fill the field_1_to_fill_id field with the search input value
			        var search_input_value = jQuery('#search_input_id').val();

		            jQuery('#field_1_to_fill_id').attr('name', 's');
					jQuery('#field_1_to_fill_id').attr('value', search_input_value);

					jQuery('#fictive_form_id').submit();

		            return false;
			    });
	        });

	    </script>

	<?php 
	} 
}