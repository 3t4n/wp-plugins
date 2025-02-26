<?php
/*
Plugin Name: Affiliate Products List by ConicPlex
Plugin URI: https://conicplex.com/affiliate-products-list-by-conicplex-plugin/
Description: An amazing tool that creates a responsive yet creative beautiful table for Affiliate Products. Useful for listing similar items under a single affiliate post. Try and do share us feedback so that we can improve.
Version: 1.0.1
Author: Conicplex
Author URI: https://conicplex.com/
Text Domain: ConicPlex
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/* Plugin Activation & Deactivation */


    if(!defined('ABSPATH'))
    {
        die("Can't Access");
    }

	register_activation_hook( __FILE__, 'aplbcp_activate');
	register_uninstall_hook( __FILE__, 'aplbcp_deactivate');

	function aplbcp_activate(){

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate = $wpdb->get_charset_collate();

		$table= $wpdb->prefix.'aplbcp_setting';
		$create_tb_sql="CREATE TABLE IF NOT EXISTS $table(
            aplbcp_setting_id INT NOT NULL AUTO_INCREMENT,
            aplbcp_header_bg VARCHAR(7) NOT NULL,
            aplbcp_header_color VARCHAR(7) NOT NULL,
            aplbcp_header_font_size INT(3) NOT NULL,
            aplbcp_product_img_hieght INT(3) NOT NULL,
            aplbcp_product_title_color VARCHAR(7) NOT NULL,
            aplbcp_product_title_font_size INT(3) NOT NULL,
            aplbcp_product_desc_font_size INT(3) NOT NULL,
            aplbcp_button_bg VARCHAR(7) NOT NULL,
            aplbcp_button_color VARCHAR(7) NOT NULL,
            aplbcp_button_border_width INT(3) NOT NULL,
            aplbcp_button_border_color VARCHAR(7) NOT NULL,
            aplbcp_button_radius INT(3) NOT NULL,
            aplbcp_button_hover_bg VARCHAR(7) NOT NULL,
            aplbcp_button_hover_color VARCHAR(7) NOT NULL,
            aplbcp_button_hover_border_width INT(3) NOT NULL,
            aplbcp_button_hover_border_color VARCHAR(7) NOT NULL,
            aplbcp_button_hover_shadow VARCHAR(30) NOT NULL,
            aplbcp_button_text VARCHAR(50) NOT NULL,
            aplbcp_price_show ENUM('Y','N') NOT NULL,
            aplbcp_price_symbol VARCHAR(4) NOT NULL, PRIMARY KEY (`aplbcp_setting_id`)) $charset_collate;";

		dbDelta( $create_tb_sql );
        

        $aplbcpSettingSql="SELECT aplbcp_setting_id FROM $table";
        $aplbcpSettingRow=$wpdb->get_var($aplbcpSettingSql);

        if($wpdb->num_rows==0)
        {
            $wpdb->query("INSERT INTO $table(`aplbcp_header_bg`, `aplbcp_header_color`,`aplbcp_header_font_size`,`aplbcp_product_img_hieght`, `aplbcp_product_title_color`,`aplbcp_product_title_font_size`, `aplbcp_product_desc_font_size`,`aplbcp_button_bg`,`aplbcp_button_color`, `aplbcp_button_border_width`, `aplbcp_button_border_color`, `aplbcp_button_radius`, `aplbcp_button_hover_bg`,`aplbcp_button_hover_color`, `aplbcp_button_hover_border_width`, `aplbcp_button_hover_border_color`,`aplbcp_button_hover_shadow`,`aplbcp_button_text`,`aplbcp_price_show`,`aplbcp_price_symbol`) VALUES
		('#ff5900', '#FFFFFF','25','200','#ff5900','20','14','#ff5900','#FFFFFF','2','#ff5900','5','#FFFFFF','#ff5900','5','#ff5900','5px 10px #ff5900','Buy Now','Y','₹')");
        }

        $table= $wpdb->prefix.'aplbcp_products_list';
        $create_tb_sql="CREATE TABLE IF NOT EXISTS $table(
        product_id INT NOT NULL AUTO_INCREMENT,
        product_list_name VARCHAR(100) NOT NULL,
        PRIMARY KEY (`product_id`)) $charset_collate;";

        dbDelta( $create_tb_sql );

        $table= $wpdb->prefix.'aplbcp_products';

        $create_tb_sql="CREATE TABLE IF NOT EXISTS $table(
        id INT NOT NULL AUTO_INCREMENT,
        product_list_id INT(5) NOT NULL,
        product_name VARCHAR(100) NOT NULL,
        product_image VARCHAR(300) NOT NULL,
        product_desc TEXT NOT NULL,
        buy_now_link TEXT NOT NULL,
        product_price INT(7) NOT NULL,
        PRIMARY KEY (`id`)) $charset_collate;";

        dbDelta( $create_tb_sql );

    }

	function aplbcp_deactivate(){

		global $wpdb;

		// $table= $wpdb->prefix.'aplbcp_setting';
		// $drop_tb_sql="DROP TABLE $table";
		// $wpdb->query($drop_tb_sql);

		// $table= $wpdb->prefix.'aplbcp_products_list';
		// $drop_tb_sql="DROP TABLE $table";
		// $wpdb->query($drop_tb_sql);
		
        // $table= $wpdb->prefix.'aplbcp_products';
		// $drop_tb_sql="DROP TABLE $table";
		// $wpdb->query($drop_tb_sql);
    }

/* End of Plugin Activation & Deactivation */

/* Add Menu at Admin Sidebar*/

add_action('admin_menu','aplbcp_menu');

function aplbcp_menu(){

     add_menu_page('Affiliate Products List by ConicPlex', //page title
        'Affiliate Products List by ConicPlex', //menu title
        '', //capabilities
        'aplbcp_list', //menu slug
        'aplbcp_list', //function
        'dashicons-editor-ul' //Icon
    );
     
     //adding submenu to a menu
    add_submenu_page('aplbcp_list',//parent page slug
        'All Product List | Affiliate Products List by ConicPlex',//page title
        'All Product List',//menu title
        'manage_options',//manage optios
        'aplbcp_list_all',//slug
        'aplbcp_list'//function
    );

    add_submenu_page('aplbcp_list',//parent page slug
        'Add New | Affiliate Products List by ConicPlex',//page title
        'Add New',//menu title
        'manage_options',//manage optios
        'aplbcp_addnew',//slug
        'aplbcp_addnew'//function
    );

    add_submenu_page(null,//parent page slug
        'Add New Submit | Affiliate Products List by ConicPlex',//page title
        'Add New',//menu title
        'manage_options',//manage optios
        'aplbcp-addnew-submit',//slug
        'aplbcp_addnew_submit'//function
    );

    add_submenu_page('aplbcp_list',//parent page slug
        'Settings | Affiliate Products List by ConicPlex',//page title
        'Settings',//menu title
        'manage_options',//manage optios
        'aplbcp_settings',//slug
        'aplbcp_settings'//function
    );

    add_submenu_page( null,//parent page slug
        'Products Preview | Affiliate Products List by ConicPlex',//$page_title
        'Products Preview',// $menu_title
        'manage_options',// $capability
        'aplbcp-products-preview',// $menu_slug,
        'aplbcp_products_preview'// $function
    );

    add_submenu_page( null,//parent page slug
        'Edit | Affiliate Products List by ConicPlex',//$page_title
        'Products List Edit',// $menu_title
        'manage_options',// $capability
        'aplbcp-products-edit',// $menu_slug,
        'aplbcp_products_edit'// $function
    );

    add_submenu_page( null,//parent page slug
        'Edit Submit | Affiliate Products List by ConicPlex',//$page_title
        'Products List Edit Submit',// $menu_title
        'manage_options',// $capability
        'aplbcp-products-edit-submit',// $menu_slug,
        'aplbcp_products_edit_submit'// $function
    );

    add_submenu_page( null,//parent page slug
        'Delete | Affiliate Products List by ConicPlex',//$page_title
        'Products List Delete',// $menu_title
        'manage_options',// $capability
        'aplbcp-products-delete',// $menu_slug,
        'aplbcp_products_delete'// $function
    );

    add_submenu_page( null,//parent page slug
        'Settings Submit | Affiliate Products List by ConicPlex',//$page_title
        'Products List Settings',// $menu_title
        'manage_options',// $capability
        'aplbcp-products-settings',// $menu_slug,
        'aplbcp_products_settings'// $function
    );

}

/* Include admin style.CSS */

add_action( 'admin_enqueue_scripts', 'aplbcp_load_admin_styles' );
function aplbcp_load_admin_styles() {
    wp_register_style('aplbcp_admin_css', plugins_url('assets/css/admin-style.css',__FILE__ ));
    wp_enqueue_style('aplbcp_admin_css');
}

/* End include admin style.CSS */

// Function to shows menu pages
function aplbcp_list(){
    include(plugin_dir_path( __FILE__ ) . 'aplbcp-products-list.php');
}

function aplbcp_settings(){
    include(plugin_dir_path( __FILE__ ) . 'aplbcp-settings.php');
}

function aplbcp_addnew(){
    include(plugin_dir_path( __FILE__ ) . 'aplbcp-products-add-new.php');
}

function aplbcp_addnew_submit(){
    include(plugin_dir_path( __FILE__ ) . 'include/aplbcp-add-new-submit.php');
}

function aplbcp_products_edit(){
     include(plugin_dir_path( __FILE__ ) . 'aplbcp-products-edit.php');
}

function aplbcp_products_edit_submit(){
    include(plugin_dir_path( __FILE__ ) . 'include/aplbcp-products-edit-submit.php');
}

function aplbcp_products_preview(){
    include(plugin_dir_path( __FILE__ ) . 'aplbcp-products.php');
}

function aplbcp_products_delete(){
    include(plugin_dir_path( __FILE__ ) . 'include/aplbcp-products-delete.php');
}

function aplbcp_products_settings(){
    include(plugin_dir_path( __FILE__ ) . 'include/aplbcp-settings-submit.php');
}

/* Add Shortcode to Editor Menu */
	
function aplbcp_wdm_add_mce_button() {
    // check user permissions
	    if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) 
	    {
	        return;
	    }
	    // check if WYSIWYG is enabled
	    if ( 'true' == get_user_option( 'rich_editing' ) ) 
	    {
	        add_filter( 'mce_external_plugins', 'aplbcp_wdm_add_tinymce_plugin' );
	        add_filter( 'mce_buttons', 'aplbcp_wdm_register_mce_button' );
	    }
	}

	add_action('admin_head', 'aplbcp_wdm_add_mce_button');

	// register new button in the editor
	function aplbcp_wdm_register_mce_button( $buttons )
	{
        array_push( $buttons, 'wdm_mce_button' );
        return $buttons;
	}

	// the script will insert the shortcode on the click event
	function aplbcp_wdm_add_tinymce_plugin( $plugin_array ) {
    	$plugin_array['wdm_mce_button'] =  plugins_url('assets/js/aplbcp-wdm-mce-button.js', __FILE__);
    	return $plugin_array;
	}

/* End of Add Shortcode to Editor Menu*/

/* Modal For Select Chekclist ID */

	function aplbcp_admin_footer_function(){
	?>
	    <div id="myModal" class="modal">
	      <div class="modal-content">
            <h3>
                Select Products List
            </h3>
	        <input id="selectproductlist" type="text" list="aplbcpproductlist">
			  <datalist id="aplbcpproductlist">
			  <?php
				global $wpdb;
				$table= $wpdb->prefix.'aplbcp_products_list';

				$aplbcp_modal_sql="SELECT product_id,product_list_name FROM $table ORDER BY product_id DESC";

				$results=$wpdb->get_results($aplbcp_modal_sql);
	            foreach  ($results as $aplbcplist) 
	            {
                ?>
	              <option value="<?php echo esc_attr($aplbcplist->product_id); ?>"><?php echo esc_attr($aplbcplist->product_list_name); ?></option>');
	            <?php
                }
	          ?>
			  </datalist>
	        <button type="button" class="btn btn-primary" id="btnsubmit">Inside Shortcode</button>
	      </div>
	    </div>
	<?php
	}
	add_action('admin_footer', 'aplbcp_admin_footer_function');

/* End of Modal For Select Chekclist ID */


// Add Shortcode
add_shortcode('aplbcp','aplbcp_shortcode');
 
// HTML Layout
function aplbcp_shortcode($attr)
{
    ob_start();
    include(plugin_dir_path( __FILE__ ) . 'aplbcp-products.php');
    return ob_get_clean();
}