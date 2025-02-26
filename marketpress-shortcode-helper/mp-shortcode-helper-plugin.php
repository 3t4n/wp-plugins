<?php
/*
Plugin Name: MarketPress Shortcode Helper
Plugin URI: http://www.watersedgeweb.com
Description: This plugin adds a button above your editor on posts/pages that helps you generate MarketPress shortcodes.
Version: 1.3
Author: NetherWorks, LLC. / DBA: Water's Edge Web Design
Author URI: http://www.watersedgeweb.com

------------------------------------------------------------------------
Copyright 2002-2012 NetherWorks, LLC.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if(!defined("MP_CURRENT_PAGE"))
    define("MP_CURRENT_PAGE", basename($_SERVER['PHP_SELF']));

	$is_post_edit_page = in_array(MP_CURRENT_PAGE, array('post.php', 'page.php', 'page-new.php', 'post-new.php'));
	
	add_action('media_buttons_context','mp_shortcode');
	add_action('admin_footer', 'add_mce_popup');

    //Action target that adds the "Insert Products" button to the post/page edit screen			
	function mp_shortcode($context) {
        if(!$is_post_edit_page)
			return $context.="<a href='#TB_inline?width=480&inlineId=mp_shortcodes' class='thickbox button' id='add_mp_shortcode' title='" . __("Add MarketPress Shortcode", 'mp_shortcode') . "'><span class='fa fa-shopping-cart fa-lg'></span>  MarketPress</a>";
    }
	
	//Add support for 3rd party MarketPress Grid Shortcode Plugin 	
	function add_mp_grid_shortcode_support() {
		$plugin = "marketpress-grid/marketpress-grid-shortcode.php";
		$is_active = is_plugin_active($plugin);
		$mp_grid_option = '<option value="mp_product_grid">Product Grid</option>';
		if ($is_active == '1')
		   echo $mp_grid_option;
	}

    //Action target that displays the popup to insert a marketpress shortcode to a post/page
    function add_mce_popup(){
	    if(!$is_post_edit_page)			
		wp_register_script( 'mp-shortcode-script', plugins_url('/js/mp-shortcode-helper.js', __FILE__) );			
		wp_enqueue_script( 'mp-shortcode-script' );
		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );


?>
		
		<div id="mp_shortcodes" style="display: none;">
			<div id="choose_mp_shortcode">
				<select id="mp_shortcode_selector">
					<option value="" selected="selected">-- Please Choose An Option --</option>
					<option value="mp_tag_cloud">Product Tag Cloud</option>
					<option value="mp_list_categories">Product Categories List</option>
					<option value="mp_dropdown_categories">Product Categories Dropdown</option>
					<option value="mp_popular_products">Popular Products List</option>
					<option value="mp_list_products">Products List</option>
					<?php add_mp_grid_shortcode_support(); ?>
					<option value="mp_product">Single Product</option>
					<option value="mp_product_image">Product Image</option>
					<option value="mp_buy_button">Product Buy Button</option>
					<option value="mp_product_price">Product Price</option>
					<option value="mp_product_meta">Product Meta</option>
					<option value="mp_cart_link">Link to Cart</option>
					<option value="mp_store_link">Link to Store</option>
					<option value="mp_products_link">Link to Products</option>
					<option value="mp_orderstatus_link">Link to Order Status</option>
					<option value="mp_store_navigation">Store Navigation List</option>
				</select>
			</div>						
			<div style="padding:15px;">				
				<input type="button" class="button-primary" value="Insert Shortcode" onclick="generateShortcode();"/>&nbsp;&nbsp;&nbsp;				
				<a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e("Cancel", "mp_shortcode"); ?></a>			
			</div>			
			<div id="mp_shortcode_helper_fields" style="width: 100%; height: 100%;">
			 
			</div>
		</div>
        <?php
    }
?>