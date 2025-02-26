<?php 
/*

Plugin Name: Quick Search WP & Woo-Admin

Description: This plugin removes the need to visit All Posts, All Pages, All Users, All Products & All Orders to do a search. Fewer clicks to get things done.

Author: Rami Abramov
Author URI: https://www.tasteaholics.com

Version: 1.0.2

*/


//add css file for admin
add_action( 'admin_enqueue_scripts', 'qswpa_search_items_admin_scripts' );

function qswpa_search_items_admin_scripts(){
	wp_enqueue_style( 'search-items-css', plugins_url('/search-items-styles.css',__FILE__) , '', '1.0', false);
}


//add menu in the menu bar
add_action('admin_menu', 'qswpa_my_menu_pages');
function qswpa_my_menu_pages(){
    add_menu_page('Quick Search', 'Quick Search', 'read', 'search-items', 'search_items' ,'dashicons-search',2);


	//add sub menu to search posts
	add_submenu_page('search-items', 'Search Posts', "<form method='get' action='edit.php'>
																			 <input type='text' placeholder='Search posts' name='s' autocomplete='off'>
																			 <input type='hidden' name='post_type' value='post'>
																			 <button><span class='dashicons dashicons-search'></span></button>
																		</form>", 
																		'edit_posts', 'javascript:void(0)' 
	);
	
	//add sub menu to search pages
	add_submenu_page('search-items', 'Search Pages', "<form method='get' action='edit.php'>
																					<input type='text' placeholder='Search pages' name='s' autocomplete='off'>
																					<input type='hidden' name='post_type' value='page'>
																					<button><span class='dashicons dashicons-search'></span></button>
																				</form>",
																				'edit_pages', 'javascript:void(0)' 
	);

	//add sub menu to search users
	add_submenu_page('search-items', 'Search Users', "<form method='get' action='users.php'>
																					<input type='text' placeholder='Search users' name='s' autocomplete='off'>
																					<button><span class='dashicons dashicons-search'></span></button>
																				</form>",
																				'edit_users', 'javascript:void(0)' 
	);

	//if woocommerce is install and active
	if(in_array('woocommerce/woocommerce.php',get_option( 'active_plugins' )))
	{
		
		//add sub menu to search woo orders 
		add_submenu_page('search-items', 'Search Orders', "<form method='get' action='edit.php'>
																					<input type='text' placeholder='Search orders' name='s' autocomplete='off'>
																					<input type='hidden' name='post_type' value='shop_order'>
																					<button><span class='dashicons dashicons-search'></span></button>
																				</form>",
																				'edit_shop_orders', 'javascript:void(0)' 
		);
		//add sub menu to search woo products 
		add_submenu_page('search-items', 'Search Products', "<form method='get' action='edit.php'>
																						<input type='text' placeholder='Search products' name='s' autocomplete='off'>
																						<input type='hidden' name='post_type' value='product'>
																						<button><span class='dashicons dashicons-search'></span></button>
																					</form>",
																					'edit_products', 'javascript:void(0)' 
		);

	}//if ultimate recipe plugin

	if(in_array('wp-ultimate-recipe-premium/wp-ultimate-recipe-premium.php',get_option( 'active_plugins' )))
	{
		//add sub menu to search recipes
		add_submenu_page('search-items', 'Search Recipes', "<form method='get' action='edit.php'>
																					<input type='text' placeholder='Search recipes' name='s' autocomplete='off'>
																					<input type='hidden' name='post_type' value='recipe'>
																					<button><span class='dashicons dashicons-search'></span></button>
																				</form>",
																				'edit_posts', 'javascript:void(0)' 
		);

	}

	

}


function qswpa_search_items()
{}

