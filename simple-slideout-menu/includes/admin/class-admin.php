<?php 
namespace simsm\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('simsm\admin\Admin')){

	class Admin {


		function __construct(){

			add_action('admin_init', array( $this, 'add_custom_menu_item' ) );

			add_filter( 'walker_nav_menu_start_el', array( $this, 'filter_menu_item'), 20, 2 );

			add_action( 'after_setup_theme', array( $this, 'register_slideout_nav_menu' ), 0 );

		}


		function add_custom_menu_item(){

			add_meta_box(
				'simsa_slideout_me', __('Slideout Menu', 'simple-slideout-menu' ), array( $this, 'custom_menu_html' ), 'nav-menus', 'side', 'low' );
		}


		function custom_menu_html(){
		?>
		<div id="posttype-simsm" class="posttypediv">
		        		<div id="tabs-panel-simsm" class="tabs-panel tabs-panel-active">
		        			<ul id ="simsm-checklist" class="categorychecklist form-no-clear">
		        				<li>
		        					<label class="menu-item-title">
		        						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"> <?php _e( 'Slideout', 'simple-slideout-menu' ); ?>
		        					</label>
		        					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom">
		        					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="{slideout_menu}">
		        					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#">
		        					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="simple-slideout-menu-item">
		        				</li>
		        			</ul>
		        		</div>
		        		<p class="button-controls">
		        			<span class="add-to-menu">
		        				<input type="submit" class="button-secondary submit-add-to-menu right" value="<?php _e( 'Add to Menu', 'simple-slideout-menu' ); ?>" name="add-post-type-menu-item" id="submit-posttype-simsm">
		        				<span class="spinner"></span>
		        			</span>
		        		</p>
		        	</div>
		<?php
		}





		function filter_menu_item( $item_output, $item ){

			// Rare case when $item is not an object, usually with custom themes.
			if ( ! is_object( $item ) || ! isset( $item->object ) ) {
				return $item_output;
			}
			$menu_item_classes = $item->classes;
            if( in_array( 'simple-slideout-menu-item', $menu_item_classes )){
                $item_output = str_replace($item->title,'<span class="dashicons dashicons-menu"></span>',$item_output);
                $item_output = str_replace('<a href','<a data-trigger="simple-slideout" href',$item_output);
            }

			return $item_output;

		}




		function register_slideout_nav_menu(){

			register_nav_menus( array( 'slideout_menu' => __( 'Slideout Menu', 'simple-slideout-menu' ) ) );

		}


	}

}