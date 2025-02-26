<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Page_Infomations {
	function __construct(){
		if( isset($_GET['booknow_done']) && $_GET['booknow_done'] == 1){
			add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		}
	}
	function add_plugin_page(){
		add_submenu_page('booknow',esc_html__("Informations","booknow") , esc_html__("Informations","booknow"), 'manage_options','booknow-settings-informations', array($this,'settings_page_render_load')  );
		
	}
	function settings_page_render_load(){
		?>
		<div class="wrap">
<h1><?php esc_html_e("Congratulations","booknow") ?></h1>
<p><?php esc_html_e("Hurray!! Everything is ready to accept your first online booking now","booknow") ?></p>
      <?php 
        		$booking = get_option("booknow_booking");
        		$page_id = get_option("booknow_my_order");
        	?>
    <table class="form-table">
        <tr valign="top">
	        <th scope="row"><?php esc_html_e("Appointment Booking") ?></th>
	        <td><input type="text" readonly="readonly" class="regular-text" value="<?php echo esc_url(get_page_link($booking)) ?>" /> <?php esc_html_e("Or","booknow") ?> <input type="text" readonly="readonly" value="[booknow]" /> </td>
        </tr>
        <tr valign="top">
        	
	        <th scope="row"><?php esc_html_e("My Bookings","booknow") ?></th>
	        <td><input type="text" readonly="readonly" class="regular-text" value="<?php echo esc_url(get_page_link($page_id)) ?>" /> <?php esc_html_e("Or","booknow") ?> <input type="text" readonly="readonly" value="[booknow_orders]" /> </td>
        </tr>
    </table>
		<?php
	}
}
new Booknow_Page_Infomations;