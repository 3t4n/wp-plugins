<?php
class Class_Sortsearchresults
{
	public function __construct() {
		
		// Register activation hook
		register_activation_hook ( __FILE__, array (
				&$this,
				'sortresult_install' 
		) );
		
		// Add menu hook
		add_action ( 'admin_menu', array (
				&$this,
				'sort_searchresults_menu' 
		) );
		
		// Update function hook
		add_action ( 'plugins_loaded', array (
				&$this,
				'sortsearchtitle_update_db_check' 
		) );
		
		// Run the search function
		add_action ( 'pre_get_posts', array (
				&$this,
				'sort_searchresult_by_title' 
		) );
		
		
	}
	
	// Install function,OK
	public function sortresult_install() {
		
		// install sort_search_result options to the database
		global $wpdb;
		
		$sortsearchtitle_db_version = '1.0';
		$table = $wpdb->prefix . "sortsearchresult";
		
		$structure = "CREATE TABLE $table (id INT(9) NOT NULL AUTO_INCREMENT,order_valuex VARCHAR(5) NOT NULL,UNIQUE KEY id (id));";
		
		require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta ( $structure );
		
		// Save database version
		update_option ( "sortsearchtitle_db_version", $sortsearchtitle_db_version );
		
		// Insert default sorting setting that is ascending
		$wpdb->query ( "INSERT IGNORE INTO $table(order_valuex) VALUES('ASC')" );
	}
	public function sortresult_uninstall() {
		global $wpdb;
		$sortsearchtitle_db_version = '1.0';
		$table = $wpdb->prefix . "sortsearchresult";
		$wpdb->query ( "DROP TABLE IF EXISTS $table" );
		delete_option ( 'sortsearchtitle_db_version' );
	}
	
	// Create menu function,OK
	public function sort_searchresults_menu() {
		add_options_page ( 'Sort Search Results by Title Plugin Options', 'Sort Search Results by Title', 'manage_options', 'sort-search-results-by-title', array (
				&$this,
				'settings_page' 
		) );
	}
	
	// Update function
	public function sortsearchtitle_update_db_check() {
		global $wpdb;
		
		if (get_option ( 'sortsearchtitle_db_version' ) == FALSE) {
			
			// this is either version1 to 4 of the plugin
			
			$this->sortresult_install ();
		}
	}
	public function settings_page() {
		global $wpdb;
		$sortsearchtitle_db_version = '1.0';
		$table = $wpdb->prefix . "sortsearchresult";
		// Check if user is authorized to make some changes
		if (! current_user_can ( 'manage_options' )) {
			wp_die ( __ ( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		// Default values
		$hidden_field_name = 'submit_hidden';
		$data_field_name = 'order_valuex';
		
		// Read the sorting settings from database
		$anotherdummyid = '1';
		$opt_val = $wpdb->get_var ( $wpdb->prepare ( "SELECT order_valuex FROM $table where id=%d", $anotherdummyid ) );
		
		// Check if user submitted the form.
		if (isset ( $_POST [$hidden_field_name] ) && $_POST [$hidden_field_name] == 'Y' && isset($_POST['sort_search_result_submit_form_nonce']) && 
		    wp_verify_nonce( $_POST['sort_search_result_submit_form_nonce'], 'sort_search_result_submit_form' )) {
			
			// Read the user inputs
			$opt_val = trim ( $_POST [$data_field_name] );
			
			// validate before updating the value to the database
			if (($opt_val == 'ASC') || ($opt_val == 'DESC')) {
				
				// Only two possible values allowed, if condition is true..
				// Save the updated settings to the database
				$wpdb->query ( $wpdb->prepare ( "UPDATE $table SET order_valuex=%s WHERE id=1", $opt_val ) );
			} else {
				// possible misuse detected
				
				wp_die ( __ ( 'You do not have sufficient permissions.' ) );
			}
			
			echo '<div class="updated"><p><strong>';
			_e ( $this->sortingguide ( $opt_val ) . '- Settings saved.', 'menu' );
			echo '</strong></p></div>';
		}
		// Display the settings menu
		?>
<div class="wrap">
	<h2>Sort Search Result by Title Plugin Settings</h2>
	<form name="form1" method="post" action="">
	    <?php wp_nonce_field( 'sort_search_result_submit_form', 'sort_search_result_submit_form_nonce' ); ?>
		<input type="hidden" name="<?php echo $hidden_field_name;?>" value="Y">
		<p>Select the desired search result sorting sequence below:</p>
		<?php
		if ($opt_val == 'ASC') {
			$marker1 = 'CHECKED';
			$marker2 = '';
		}
		if ($opt_val == 'DESC') {
			$marker1 = '';
			$marker2 = 'CHECKED';
		}
		?>
		<br />
		<input type="radio" name="<?php echo $data_field_name;?>" value="ASC"
			<?php echo $marker1;?> /> Ascending Sort Search Results<br /> <input
			type="radio" name="<?php echo $data_field_name;?>" value="DESC"
			<?php echo $marker2;?> /> Descending Sort Search Results<br />
		</p>
		<hr />
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary"
				value="Save Changes" />
		</p>
	</form>
</div>
<?php
	}
	
	// Put updated settings message to settings menu
	public function sortingguide($opt_val) {
		if ($opt_val == 'ASC') {
			echo 'Ascending setting selected';
		}
		
		if ($opt_val == 'DESC') {
			echo 'Descending setting selected';
		}
	}
	public function sort_searchresult_by_title($k) {
		global $wpdb;
		$sortsearchtitle_db_version = '1.0';
		$table = $wpdb->prefix . "sortsearchresult";
		$sortingsequence = $wpdb->get_var ( "SELECT order_valuex FROM $table where id=1" );
		
		if ($k->is_main_query () && is_search ()) {
			$k->set ( 'orderby', 'title' );
			$k->set ( 'order', $sortingsequence );
	    }
		
		
	}
	
}