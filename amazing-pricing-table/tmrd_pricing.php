<?php
/**
 * Plugin Name: Amazing Pricing Table
 * Plugin URI: http://nakshighor.com/
 * Description: Amazing Pricing Table is one of the best custom plugin to publish your pricing table in your website.You do not need any kind of knowledge of Web Development Code.You can use this Plugin by clicking pricing button and fill up your tables information as you wisth. Anybody can able to use this plugin easily. You can add this plugin in your websites like Pages,Posts etc. with its lots of amazing features.When you fill up column forms you must use there 4 or 6 for good looking.So, Do not forget to give us five star feedback.
 * Version:  1.0.0
 * Author: Theme Road
 * Author URI: http://nakshighor.com/price-table/
 * License:  GPL2
 *Text Domain: tmrd
 *  Copyright 2015 GIN_AUTHOR_NAME  (email : BestThemeRoad@gmail.com
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License, version 2, as
 *	published by the Free Software Foundation.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

if(!defined('ABSPATH')) exit;      // Prevent Direct Browsing


/*
*************************************************************************
* Css and Js include
***************************************************************************
**/
/*
 * 
 */


function trmd_price_incl_script_style() {
	wp_enqueue_script('jquery' );
	wp_enqueue_style( 'trmd-price-bootstrap-style', plugins_url('/assets/css/bootstrap.min.css', __FILE__) );

	wp_enqueue_style( 'trmd-price-owl-style', plugins_url('/assets/css/style.css', __FILE__));
	wp_enqueue_script( 'trmd-price-bootstrap-js', plugins_url('/assets/js/bootstrap.min.js', __FILE__) ,array('jquery'));
	wp_enqueue_script( 'trmd-price-main-js', plugins_url('/assets/js/main.js', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'trmd_price_incl_script_style' );




/*
 * *****************************************************************
 * Pricing table Query  Short code   
 * *****************************************************************
 * */

add_shortcode('pricing', 'tmrd_pricelist_shortcode');
function tmrd_pricelist_shortcode($atts){
	extract( shortcode_atts( array(
		'price_plan'=>'FREE PLAN',
		'price_rate'=>'0 / month',
		'info_one'=>'Personal use',
		'info_two'=>'Unlimited projects',
		'info_three'=>'30GB',
		'info_four'=>'10GB',
		'support'=>' 27/7 support'	,
		'buy_link'=>'#',
		'quantity'=> 1,
		'column'=> '6'
	), $atts) );

	$query = new WP_Query(
		array('posts_per_page' => $quantity,
			'post_type' => 'post',
			'orderby' => 'menu_order',
			'order' => 'ASC'
			)
		);

	$html = '<div class="fhhf-container">
				';
	while($query->have_posts()) : $query->the_post();

		$html .= '
      				<div class="col-xs-6 col-sm-6 col-md-'.$column.' col-lg-'.$column.'">

					<!-- PRICE ITEM -->
					<div class="panel price panel-white">
						<div class="panel-heading arrow_box text-center">
						<h3> '.$price_plan.' </h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>$'.$price_plan.'</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-success"></i> '.$info_one.'</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> '.$info_two.'</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> '.$info_three.'</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> '.$info_four.'</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> '.$support.'</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-default" href="'.$buy_link.'">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->


				</div>

        ';
	endwhile;
	$html.= '
				</div>';
	wp_reset_query();
	return $html;
}


/*
 * *****************************************************************
 * Pricing table Tyne Mce Button
 * *****************************************************************
 * */




// Hooks your functions into the correct filters
function tmrd_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'tmrd_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'tmrd_register_mce_button' );
	}
}
add_action('admin_head', 'tmrd_add_mce_button');

// Declare script for new button
function tmrd_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['tmrd_mce_button'] =  plugins_url('/assets/js/main.js', __FILE__);
	return $plugin_array;
}

// Register new button in the editor
function tmrd_register_mce_button( $buttons ) {
	array_push( $buttons, 'tmrd_mce_button' );
	return $buttons;
}





function tmrd_shortcodes_mce_css() {
	wp_enqueue_style('symple_shortcodes-tc', plugins_url('assets/css/my-mce-style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'tmrd_shortcodes_mce_css' );








