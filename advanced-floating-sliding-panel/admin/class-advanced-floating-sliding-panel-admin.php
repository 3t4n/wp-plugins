<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://codetides.com
 * @since      1.0.0
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/admin
 * @author     CodeTides <contact@codetides.com>
 */
class Advanced_Floating_Sliding_Panel_Admin {

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
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function afsp_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Sliding_Panel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Sliding_Panel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-floating-sliding-panel-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-fontawesome', plugin_dir_url( __FILE__ ) .'css/font-awesome.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-simpleicon', plugin_dir_url( __FILE__ ) .'css/simple-iconpicker.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-bootstrap-select', plugin_dir_url( __FILE__ ) . 'css/select2.css', array(), $this->version, 'all' );
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function afsp_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Sliding_Panel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Sliding_Panel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_script( $this->plugin_name.'-bootstrap-select', plugin_dir_url( __FILE__ ) . 'js/select2.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name.'simple-icon', plugin_dir_url( __FILE__ ) . 'js/simple-iconpicker.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-floating-sliding-panel-admin.js', array( 'wp-color-picker' ), $this->version, true );
		
		
		
	
	}
	
	
	public function afsp_register_cpt()
	{
		$labels = array(
            'name'                => _x( 'Advanced Floating Sliding Panel', 'Post Type General Name', 'advanced-floating-sliding-panel' ),
            'singular_name'       => _x( 'Advanced Floating Sliding Panel', 'Post Type Singular Name', 'advanced-floating-sliding-panel' ),
            'menu_name'           => __( 'Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'name_admin_bar'      => __( 'Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'parent_item_colon'   => __( 'Parent Advanced Floating Sliding Panel:', 'advanced-floating-sliding-panel' ),
            'all_items'           => __( 'All Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'add_new_item'        => __( 'Add New Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'add_new'             => __( 'Add New', 'advanced-floating-sliding-panel' ),
            'new_item'            => __( 'New Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'edit_item'           => __( 'Edit Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'update_item'         => __( 'Update Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'view_item'           => __( 'View Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'search_items'        => __( 'Search Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'not_found'           => __( 'Not found', 'advanced-floating-sliding-panel' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'advanced-floating-sliding-panel' ),
        );
        $args = array(
            'label'               => __( 'Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),
            'description'         => __( 'Another Flexible Advanced Floating Sliding Panel', 'advanced-floating-sliding-panel' ),      
			'labels'              => $labels,     
            'supports'            => array('title'),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-admin-afsp',
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'ct_afsp', apply_filters( 'ct_afsp_register_arguments', $args) );
        
	}
	public function afsp_add_meta_box() {
		add_meta_box(
			'advanced_floating_sliding_panel_basic_options',
			__( 'Basic Options For Sliding Panel', 'advanced-floating-sliding-panel' ),
			array($this,'afsp_meta_box_basic_options'),
			'ct_afsp'
		);		
		add_meta_box(
			'advanced_floating_sliding_panel_tabs',
			__( 'Build Your Tabs For Sliding Panel - 3 Tabs Supported', 'advanced-floating-sliding-panel' ),
			array($this,'afsp_meta_box_tabs'),
			'ct_afsp'
		);
		add_meta_box(
			'advanced_floating_sliding_panel_tabs_design',
			__( 'Theme Builder For Tabs', 'advanced-floating-sliding-panel' ),
			array($this,'afsp_meta_box_tabs_design'),
			'ct_afsp'
		);	
		add_meta_box(
			'advanced_floating_sliding_panel_premium_features',
			__( 'Advanced Options For Sliding Panel', 'advanced-floating-sliding-panel' ),
			array($this,'afsp_meta_box_premium_features'),
			'ct_afsp'
		);	
	}
	
	public function afsp_meta_box_basic_options( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-sliding-panel-basic-options.php';
	}
	public function afsp_meta_box_license_options( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-sliding-panel-license-options.php';
	}
		
	public function afsp_meta_box_tabs( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-sliding-panel-tabs-options.php';
	}
	public function afsp_meta_box_tabs_design( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-sliding-panel-tabs-design-options.php';
	}
	public function afsp_meta_box_premium_features( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-sliding-panel-advanced-options.php';
	}
	
	
	public function afsp_save_meta_box( $post_id ) {
 
    /* If we're not working with a 'post' post type or the user doesn't have permission to save,
     * then we exit the function.
     */
	 	
		if ( ! $this->afsp_is_valid_post_type() || ! $this->afsp_user_can_save( $post_id, 'advanced_floating_sliding_panel_nonce', 'advanced_floating_sliding_panel_save' ) ) {
			return;
		}	
		
		$this->afsp_remove_old_meta_keys($post_id);
		$this->afsp_create_js_file($post_id,$_POST);
		foreach($_POST as $key => $value)
		{
						
			if (0 === strpos($key, 'ct_afsp_')) {								
				update_post_meta( $post_id, $key, $value );
			}
		}
		
		
 
	}
	private function afsp_create_js_file($post_id,$POST){
		$filename = plugin_dir_path( __FILE__ ).'../public/js/sliding-panel-'.$post_id.'.js';
		
		if(file_exists($filename)){
			unlink($filename);		
		}		
		$file_content = "jQuery(function() {"."\n";
		$file_content .="var backup_params;"."\n";
		$file_content .="var options = {onMouseDown: function(){var \$this = jQuery(this);backup_params = {'transition-duration': \$this.css('transition-duration')};"."\n";
		$file_content .="var params = {'transition-duration': '0'};\$this.css(params);},onMouseUp: function(){var \$this = jQuery(this);\$this.css(backup_params);}};"."\n";
		if($POST['ct_afsp_position']=="left"){
			$file_content .="jQuery('.sliding-left').slidingpanel(jQuery.extend({position: 'left',width: ".$POST['ct_afsp_width'].",mode: 'position'}, options));";
		}
		
		$file_content .= "\n"."});";
		$FileHandle = fopen($filename, 'w') or die("can't open file");
		fwrite($FileHandle, $file_content);
		fclose($FileHandle);
		
	}
	private function afsp_remove_old_meta_keys($post_id){
		$all_post_data = get_post_meta( $post_id );
		foreach($all_post_data as $key=>$val){
			//delete_post_meta($post_id, $key);
			
			
			if (strpos($key, 'ct_afsp_tab_label_') !== false) {
				$number = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
				delete_post_meta($post_id, 'ct_afsp_tab_label_'.$number);
				delete_post_meta($post_id, 'ct_afsp_tab_icon_'.$number);
				delete_post_meta($post_id, 'ct_afsp_tab_alignment_'.$number);
				delete_post_meta($post_id, 'ct_afsp_tab_content_'.$number);
			}
		}
	}
	
	private function afsp_is_valid_post_type() {
		
		return ! empty( $_POST['post_type'] ) && 'ct_afsp' == $_POST['post_type'];
	}
	
	private function afsp_user_can_save( $post_id, $nonce_action, $nonce_id ) {
 
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ $nonce_action ] ) && wp_verify_nonce( $_POST[ $nonce_action ], $nonce_id ) );
	 
		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	 
	}
	
	public function afsp_replace_submit_meta_box() 
    {

          remove_meta_box('submitdiv', 'ct_afsp', 'core'); // $item represents post_type
          add_meta_box('submitdiv', 'Advanced Floating Sliding Panel' , array($this,'afsp_submit_meta_box'), 'ct_afsp', 'side', 'low');
		  add_meta_box('ct_information', 'Code Tides' , array($this,'afsp_ct_meta_box'), 'ct_afsp', 'side', 'low');
    }	  
	public function afsp_ct_meta_box()
	{
		echo '<div class="ct_info" style="margin-left:-20px;"><iframe frameborder="0" width="300" height="1270" src="http://www.codetides.com/paid_plugin_right_side.php"></iframe></div>'; 
	}
	public function afsp_submit_meta_box() {
        global $action, $post;
       
        $post_type = $post->post_type; // get current post_type
        $post_type_object = get_post_type_object($post_type);
        $can_publish = current_user_can($post_type_object->cap->publish_posts);
       
        ?>
        <div class="submitbox" id="submitpost">
         <div id="major-publishing-actions">
         <?php
         do_action( 'post_submitbox_start' );
         ?>
         <div id="delete-action">
         <?php
         if ( current_user_can( "delete_post", $post->ID ) ) {
           if ( !EMPTY_TRASH_DAYS )
                $delete_text = __('Delete Permanently');
           else
                $delete_text = __('Move to Trash');
         ?>
         <a class="submitdelete deletion" href="<?php echo get_delete_post_link($post->ID); ?>"><?php echo $delete_text; ?></a><?php
         } //if ?>
        </div>
         <div id="publishing-action">
         <span class="spinner"></span>
         <?php
         if ( !in_array( $post->post_status, array('publish', 'future', 'private') ) || 0 == $post->ID ) {
              if ( $can_publish ) : ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Add Tab') ?>" />
                <?php submit_button( sprintf( __( 'Add %' ), 'advanced-floating-sliding-panel' ), 'primary button-large', 'publish', false, array( 'accesskey' => 'p' ) ); ?>
         <?php   
              endif; 
         } else { ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Update ') . $item; ?>" />
                <input name="save" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="<?php esc_attr_e('Update ') . 'advanced-floating-sliding-panel'; ?>" />
         <?php
         } //if ?>
         </div>
         <div class="clear"></div>
         </div>
         </div>
        <?php
      }  	
	public function afsp_custom_messages( $messages ) {
	  global $post, $post_ID;
	
	  $messages['ct_afsp'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __('Flotaing Sliding Panel successfully updated.','advanced-floating-sliding-panel'),
		2 => __('Custom field updated.','advanced-floating-sliding-panel'),
		3 => __('Flotaing Sliding Panel successfully deleted.','advanced-floating-sliding-panel'),
		4 => __('Flotaing Sliding Panel successfully updated.','advanced-floating-sliding-panel'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Flotaing Sliding Panel restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => __('Flotaing Sliding Panel successfully added.','advanced-floating-sliding-panel'),
		7 => __('Flotaing Sliding Panel has been saved.','advanced-floating-sliding-panel'),
		8 => __('Flotaing Sliding Panel has been submitted.','advanced-floating-sliding-panel'),	
	  );
	
	  return $messages;
	}
	public function afsp_customized_quick_edit() 
	{    
			
		global $current_screen;		
		if( 'edit-ct_afsp' != $current_screen->id )
			return;
		?>
		<script type="text/javascript">         
			jQuery(document).ready( function($) {
				$('span:contains("Slug")').each(function (i) {
					$(this).parent().remove();
				});
				$('span:contains("Password")').each(function (i) {
					$(this).parent().parent().remove();
				});
				/*$('span:contains("Date")').each(function (i) {
					$(this).parent().remove();
				});*/
				$('.inline-edit-date').each(function (i) {
					$(this).remove();
				});
			});    
		</script>
		<?php
	}
	
	public function afsp_columns($columns) {		
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title','advanced-floating-sliding-panel' ),
			'impressions' => __( 'Impressions','advanced-floating-sliding-panel' ),			
			'date' => __( 'Date','advanced-floating-sliding-panel' )
		);	
		return $columns;
	}
	
	
	public function afsp_columns_data( $column, $post_id ) {
		global $post;
	
		switch( $column ) {
	
			/* If displaying the 'impressions' column. */
			case 'impressions' :
	
				/* Get the post meta. */
				$impressions = get_post_meta( $post_id, 'ct_afsp_impressions', true );
	
				/* If no impressions is found, output a default message. */
				if ( empty( $impressions ) )
					echo __( '0 impressions','advanced-floating-sliding-panel' );
	
				/* If there is a impressions, append 'impressions' to the text string. */
				else
					printf( __( '%s impressions' ), $impressions );
	
				break;
				
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}
	

	public function afsp_allow_published_posts(){
		if (isset($_GET['post_type']) && $_GET['post_type'] == 'ct_afsp') {
			$q = new WP_Query(array('post_type'=>'ct_afsp'));
			if($q->found_posts>10){
				wp_enqueue_style( $this->plugin_name.'-afsp-custom-css', plugin_dir_url( __FILE__ ) . 'css/custom.css', array(), $this->version, 'all' );				
			}			
		}		
	}
	public function afsp_disable_published_posts(){
		
		if (isset($_GET['post_type']) && $_GET['post_type'] == 'ct_afsp') {
			$q = new WP_Query(array('post_type'=>'ct_afsp'));
			
			if($q->found_posts>10){
				wp_die( __( 'Free Version is limited to 10 posts. Please <a href="https://goo.gl/jV1MsS">purchase premium</a> version here to unlock.', 'wp-hide-login' ), 403 );
			}			
		}
	}
	public function afsp_add_go_pro_link($links_array, $plugin_file_name) {
		
		if ($plugin_file_name === 'advanced-floating-sliding-panel/advanced-floating-sliding-panel.php') {
			// we can add one more array element at the beginning with array_unshift()
			array_unshift( $links_array, '<a href="https://1.envato.market/bg1N9" target="_blank" style="color: #28a745; font-weight: bold;">GoPro</a>' );
		}

		return $links_array;

	}
}
