<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Creative_progress_bar
 * @subpackage Creative_progress_bar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Creative_progress_bar
 * @subpackage Creative_progress_bar/admin
 * @author     Rigal Patel <#>
 */
class Creative_progress_bar_Admin {

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
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_progress_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_progress_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/creative_progress_bar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_progress_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_progress_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script ('jquery');
		wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/creative_progress_bar-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rangeslider.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Create progresbar Custom Post Type.
	 *
	 * @since    1.0.0
	 */

	public  static function cpb_register_progressbar() {

		$labels = array( 
			'name' => _x( 'All ProgressBars', 'progressbar' ),
			'singular_name' => _x( 'All ProgressBar', 'progressbar' ),
			'add_new' => _x( 'Add New ProgressBar', 'progressbar' ),
			'add_new_item' => _x( 'Add New ProgressBar', 'progressbar' ),
			'edit_item' => _x( 'Edit ProgressBar', 'progressbar' ),
			'new_item' => _x( 'New ProgressBar', 'progressbar' ),
			'view_item' => _x( 'View ProgressBar', 'progressbar' ),
			'search_items' => _x( 'Search ProgressBar', 'progressbar' ),
			'not_found' => _x( 'No ProgressBar Found', 'progressbar' ),
			'not_found_in_trash' => _x( 'No ProgressBar Found In Trash', 'progressbar' ),
			'parent_item_colon' => _x( 'ProgressBar:', 'progressbar' ),
			'menu_name' => _x( 'ProgressBar', 'progressbar' ),
		);
	
		$args = array( 
			'labels' => $labels,
			'hierarchical' => true,
			'description' => '',
			'supports' => array( 'title' ),
			'taxonomies' => array( '', ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,			
			'menu_position' => '5',
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			//'register_meta_box_cb' => 'cpb_add_template_select_metaboxes',
		);

		register_post_type( 'cpb_progressbar', $args );
	}

	/**
	 * Adds a metabox to the for Progresbar template  selection
	 * 
	 * @since    1.0.0
    */
	public function cpb_add_template_select_metaboxes() {
		add_meta_box(
			'cpb_template_select',
			'Select Template',
			array( __CLASS__, 'cpb_template_select' ),
			'cpb_progressbar',
			'normal',
			'high'
		);
	}

	/**
	 * Output the HTML for the metabox.
	 *  
	 * @since    1.0.0
	 */
	public static function cpb_template_select() {
			
			global $post;
			wp_nonce_field( 'cpb_template_select_meta_box', 'cpb_template_select_nonce' );
			$value = get_post_meta( $post->ID, 'cpb_progressbar_template_id', true ); //my_key is a meta_key. Change it to whatever you want

	   ?>
        <label><input type="radio" name="cpb_progressbar_template_select" value="template1" <?php checked( $value, 'template1' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template1.png', dirname(__FILE__) ) ); ?>"> </label>
        <label><input type="radio" name="cpb_progressbar_template_select" value="template2" <?php checked( $value, 'template2' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template2.png', dirname(__FILE__) ) ); ?>"></label>
		<label><input type="radio" name="cpb_progressbar_template_select" value="template3" <?php checked( $value, 'template3' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template3.png', dirname(__FILE__) ) ); ?>"></label>
		<label><input type="radio" name="cpb_progressbar_template_select" value="template4" <?php checked( $value, 'template4' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template4.png', dirname(__FILE__) ) ); ?>"></label>
		<label><input type="radio" name="cpb_progressbar_template_select" value="template5" <?php checked( $value, 'template5' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template5.png', dirname(__FILE__) ) ); ?>"></label>
		<label><input type="radio" name="cpb_progressbar_template_select" value="template6" <?php checked( $value, 'template6' ); ?> ><img src="<?php echo  esc_url( plugins_url( 'admin/images/progressbar_template6.png', dirname(__FILE__) ) ); ?>"></label>
       
		<?php 
	}

	/**
	 * When the post is saved, saves our custom data.
	 * 
	 * @since    1.0.0
	 * @param int $post_id The ID of the post being saved.
	 */
	   
	 public  function cpb_save_template_select_meta_box_data( $post_id ) {

		/*
		* We need to verify this came from our screen and with proper authorization,
		* because the save_post action can be triggered at other times.
		*/

		// Check if our nonce is set.
		if ( !isset( $_POST['cpb_template_select_nonce'] ) ) {
				return;
		}

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $_POST['cpb_template_select_nonce'], 'cpb_template_select_meta_box' ) ) {
				return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
		}

		// Check the user's permissions.
		if ( !current_user_can( 'edit_post', $post_id ) ) {
				return;
		}
		// Sanitize user input.
		$new_meta_value = ( isset( $_POST['cpb_progressbar_template_select'] ) ? sanitize_html_class( $_POST['cpb_progressbar_template_select'] ) : '' );

		// Update the meta field in the database.
		update_post_meta( $post_id, 'cpb_progressbar_template_id', $new_meta_value );
	}


	/**
	 * Adds a ProgressBar metabox 
	 * 
	 * @since    1.0.0
    */
	public function cpb_add_progressbar_metaboxes() {
		add_meta_box(
			'cpb_add_progressbar',
			'ProgressBar',
			array( __CLASS__, 'cpb_add_progressbar' ),
			'cpb_progressbar',
			'normal',
			'high'
		);
	}

	/**
	 * Output the HTML for the metabox.
	 *  
	 * @since    1.0.0
	 */
	public static function cpb_add_progressbar() {
			 
		    global $post;
			$repeatable_fields = get_post_meta($post->ID, 'progressbar_repeatable_fields', true);
			wp_nonce_field( 'cpb_progressbar_metabox', 'cpb_progressbar_metabox_nonce' );
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.color_field').each(function(){
                	$(this).wpColorPicker();
                });
				$('.metabox_submit').click(function(e) {
					e.preventDefault();
					$('#publish').click();
				});

				jQuery(".remove-row").on("click", function() {
					jQuery(this)
						.parents("tr")
						.remove();
					return false;
					});

				jQuery("#add-row").on("click", function() {

					jQuery("#repeatable-fieldset-one tbody").append(
					'<tr><td><a class = "remove-row button" href="javascript: void(0);"> <span class="dashicons dashicons-trash"></span> </a></td><td> <input type = "text" class= "widefat" name = "name[]" /> </td><td><input class="color_field" type="hidden" name="progress_bgcolor[]" /></td><td> <input type = "range" min = "10" max = "100" name = "progress_value[]" data-rangeSlider><output></output></td><td><a class="sort"><span class="dashicons dashicons-sort"></span></a></td></tr>'
					);
					$('.color_field').each(function(){
                	   $(this).wpColorPicker();
                     });
					jQuery('input[type="range"]').rangeslider({
					polyfill: false,
					onInit: function() {
						this.output = $("<output />")
						.insertAfter(this.$range)
						.html(this.$element.val());
					},
					onSlide: function(position, value) {
						this.output.html(value);
					}
					});
					jQuery(".remove-row").on("click", function() {
					jQuery(this)
						.parents("tr")
						.remove();
					return false;
					});
				});

				jQuery("#repeatable-fieldset-one tbody").sortable({
					opacity: 0.6,
					revert: true,
					cursor: "move",
					handle: ".sort"
				});
			
			 });
				</script>
				<table id="repeatable-fieldset-one" width="100%">
				<thead>
					<tr>
						<th width="2%"></th>
						<th width="30%">Name</th>
						<th width="18%">Background color</th>
						<th width="48%">Percentage</th>
						<th width="2%">Sort</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if ( $repeatable_fields ) :
					foreach ( $repeatable_fields as $field ) {
			     ?>
				<tr>
					<td><a class="remove-row button" href="javascript: void(0);"><span class="dashicons dashicons-trash"></span></a></td>
					<td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
					<td><input class="color_field" type="hidden" name="progress_bgcolor[]" value="<?php if($field['progress_bgcolor'] != '') echo esc_attr( $field['progress_bgcolor'] ); ?>"/></td>
					<td><input type="range" min="10" max="100" value="<?php if($field['progress_value'] != '') echo esc_attr( $field['progress_value'] ); ?>" name="progress_value[]"  data-rangeslider>  <output></output></td>
					<td><a class="button sort"><span class="dashicons dashicons-sort"></span></a></td>
				</tr>
				<?php
					}
				else :
					// show a blank one
			?>
				<tr>
					<td><a class="remove-row button" href="javascript: void(0);"><span class="dashicons dashicons-trash"></span></a></td>
					<td><input type="text" class="widefat" name="name[]" /></td>
					<td><input class="color_field" type="hidden" name="progress_bgcolor[]"/></td>
					<td><input type="range" min="10" max="100" value="20" name="progress_value[]" data-rangeSlider>  <output></output></td>
			        <td><a class="button sort"><span class="dashicons dashicons-sort"></span></a></td>
				</tr>
				<?php endif; ?>
				</tbody>
				</table>
				<p><a id="add-row" class="button" href="javascript: void(0);">Add another</a>
				<input type="submit" class="button button-primary button-large" value="Save" />
				</p>
				<?php
	}

	/**
	 * When the post is saved, saves our custom data.
	 *  
	 * @since    1.0.0
	 * @param int $post_id The ID of the post being saved.
	 */
	   
	 public  function cpb_save_progressbar_meta_box_data( $post_id ) {

		/*
		* We need to verify this came from our screen and with proper authorization,
		* because the save_post action can be triggered at other times.
		*/

		// Check if our nonce is set.
		if ( !isset( $_POST['cpb_progressbar_metabox_nonce'] ) ) {
				return;
		}

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $_POST['cpb_progressbar_metabox_nonce'], 'cpb_progressbar_metabox' ) ) {
				return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
		}

		// Check the user's permissions.
		if ( !current_user_can( 'edit_post', $post_id ) ) {
				return;
		}
		$new = array();

		$names = array_map( 'sanitize_text_field', wp_unslash( $_POST['name'] ) );
		$progress_value = array_map( 'sanitize_text_field', wp_unslash( $_POST['progress_value'] ) );
		$progress_bgcolor_value = array_map( 'sanitize_text_field', wp_unslash( $_POST['progress_bgcolor'] ) );
		
		$count = count( $names );
		
		for ( $i = 0; $i < $count; $i++ ) {
			if ( $names[$i] != '' ) :
				$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
				$new[$i]['progress_value'] = stripslashes( $progress_value[$i] ); // and however you want to sanitize
				$new[$i]['progress_bgcolor'] = stripslashes( $progress_bgcolor_value[$i] );
				
			endif;
		}
		update_post_meta( $post_id, 'progressbar_repeatable_fields', $new );

	}

	/**
	 * Adds a ProgressBar metabox 
	 *
	 * @since    1.0.0
    */
	public static function cpb_progressbar_shortcode_metaboxes() {
		add_meta_box(
			'cpb_progressbar_shortcode',
			'Shortcode',
			array( __CLASS__, 'cpb_progressbar_shortcode' ),
			'cpb_progressbar',
			'normal',
			'high'
		);
	}

	/**
	 * Output the HTML for the metabox.
	 *  
	 * @since    1.0.0
	 */
	
	public static function cpb_progressbar_shortcode() {
		global $post;?>
		<p>Use below shortcode in any Page/Post to publish your Progressbar</p>
		<input style="width:250px; height:50px; margin-bottom:10px;" readonly="readonly" type="text" value="<?php echo "[Creative_Progressbar id=".get_the_ID()."]"; ?>">
		
<?php	}	


    /**
	 * Add Shortcode column in progressbar listing
	 *  
	 * @since    1.0.0
	 */
	

	function cpb_progressbar_edit_columns( $columns ) {

		$columns = array(
			'cb' => '&lt;input type="checkbox" />',
			'title' => __( 'Title' ),
			'shortcode' => __( 'Shortcode' ),
			'date' => __( 'Date' )
		);

		return $columns;
	}

	/**
	 * Display Shortcode in shortcode column 
	 *  
	 * @since    1.0.0
	 */
	function cpb_progressbar_manage_columns( $column, $post_id ) {
		global $post;
	
		switch( $column ) {

			case 'shortcode' :
			    $shortcode = "[Creative_Progressbar id=".get_the_ID()."]";
				printf( __( '%s' ), $shortcode );
				break;
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}

}	