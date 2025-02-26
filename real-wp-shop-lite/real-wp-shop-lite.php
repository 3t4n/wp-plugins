<?php
session_start();
/*
Plugin Name: Real WP Shop Lite
Plugin URI: http://jultranet.com/wp/realwpshop
Description: Lite ecommerce solution for WordPress
Author: Vojislav Kovacevic
Version: 2.0.8
Author URI: http://jultranet.com/wp/realwpshop
*/

global $wpdb;

register_activation_hook( __FILE__, 'vkrwps_ct' );
register_activation_hook( __FILE__, 'vkrwps_pt' );
register_activation_hook( __FILE__, 'vkrwps_oidt' );
register_activation_hook( __FILE__, 'vkrwps_oidt_i_d' );
register_activation_hook( __FILE__, 'vkrwps_oit' );
register_activation_hook( __FILE__, 'vkrwps_pot' );
register_activation_hook( __FILE__, 'vkrwps_pot_i_d' );
register_activation_hook( __FILE__, 'vkrwps_pet' );
register_activation_hook( __FILE__, 'vkrwps_pet_i_d');
require 'inc/tables.php';

require 'inc/get_pc.php';

require 'inc/options.php';

function vkrwpslite_myplugin_activate() {
	if (!file_exists(WP_CONTENT_DIR.'/rwpsliteuploads')) {
    	mkdir( WP_CONTENT_DIR.'/rwpsliteuploads', 0777, true);
	}
}
register_activation_hook( __FILE__, 'vkrwpslite_myplugin_activate' );

$pcss = get_option( 'vkrwps_pcss' );
if ( $pcss == 'yes' ) { 
	add_action('wp_enqueue_scripts', 'vkrwps_load_main_css');
	function vkrwps_load_main_css() {
		wp_enqueue_style(
		    'vkrwpscss',
	    	 plugins_url('css/vkrwpscss.css', __FILE__)
		);
	} 
} 

add_action( 'admin_enqueue_scripts', 'vkrwps_load_main_css2' );
function vkrwps_load_main_css2() {
	wp_enqueue_style(
	    'vkrwpsadmincss',
    	 plugins_url('css/vkrwpsadmincss.css', __FILE__)
	);
} 

add_shortcode( 'vkrwps_products', 'vkrwps_show_products' );
function vkrwps_show_products ( $atts ) {
	extract( shortcode_atts( array(
		'category' => ''
	), $atts ) );

	$s = '';

	global $wpdb;

	$atct = get_option('vkrwps_addtocart_s');

	$pdt = get_option('vkrwps_pdetails_s');

	$sym = get_option('vkrwps_currency');

	$sps = get_option( 'vkrwps_sps' );

	$pricetext = get_option( 'vkrwps_pricetext' );

	$ppk = get_option( 'vkrwps_sppk' );

	$paging = get_option( 'vkrwps_paging' );

	$ooss = get_option( 'vkrwps_ooss' );

	$pdo = get_option( 'vkrwps_pdo' );

	global $pre_img;

	$s .= '<div class=rwps-container style="position:relative;">';
	$s .= '<div class="abg"></div>';
	$s .= '<div class=rwps-c-inner>';

	$cid = $wpdb->get_results( 
	"
	SELECT id
	FROM wp_vkrwps_categories
	WHERE cat_name='$category'
	"
	);

	foreach ($cid as $key => $value) {
		$cid = $value->id;
	}

	$s .= '<div class="cat '.$category.'" style="position:absolute;left:-3000px"></div>';

	$get_products = $wpdb->get_results( 
	"
	SELECT id, name, description, price, shipping, weight, in_stock
	FROM wp_vkrwps_products
	WHERE cat_id=$cid
	ORDER BY id $pdo
	LIMIT 0,$paging
	"
	);

	foreach ($get_products as $key => $value) {

		$sp = $ppk * $value->weight;

		$in_stock = $value->in_stock;

		$post_name = str_replace(' ', '-', $value->name);
		$post_name = str_replace("'", "", $post_name);

		global $pre_img;

		$pat = get_option( 'vkrwps_pat' );

		$sd = $value->description;
		$sd = apply_filters('the_content', $sd);
		$sd = stripslashes($sd);

		$s .= '
			   <div class=rwpsprod>
			   
				   <div class=img>
					   <a href='.get_site_url().'/'.strtolower($post_name).'/>
					   	<img src='.content_url().'/rwpsliteuploads/'.$value->id.'.jpg />
					   </a>
				   </div>

			   	   <div class=right>
					   <p class=prod-name><a href='.get_site_url().'/'.strtolower($post_name).'/><span>'.$value->name.'</span></a></p>
					   <div class=prod-desc>'.$sd.'</div>
					   <p class=price><span class=sprice>'.$pricetext.'</span> <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($value->price, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>
					   <p class="shipping">'.$sps.' <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($sp, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>
					   <div class=atc>';
					   if ( $in_stock == 'yes') {
					   	    $s .= '<p class=addtocart><a class="add id'.$value->id.'" href=#>'.$atct.'</a></p>';
					   } else {
					   		$s .= '<p class=outofstock>'.$ooss.'</p>'; 
					   }
				$s .=  '<p class=details><a href='.get_site_url().'/'.strtolower($post_name).'/>'.$pdt.'</a></p>
					   </div>
				   </div>
				   <div class="prel prel'.$value->id.'">'.$pre_img.'</div>
				   <div class="apmsg apmsg'.$value->id.'">'.$pat.'</div>
			   </div>'; 
	}

	$s .= '</div>';

	$s .= '<div class=rwps-paging>';
	$s .= ' <a href=# class="first disabled">First</a>';
	$s .= '<a href=# class="prev disabled">Previous</a>';

	$tpn = $wpdb->get_var( "SELECT COUNT(*) FROM wp_vkrwps_products WHERE cat_id='$cid'" );

	if ($tpn > 0 && $tpn > $paging ) {
		if ( $paging > $tpn) {
			$max = ceil($paging / $tpn);
		} else {
			$max = ceil($tpn / $paging);
		}
	}

	for ($i=1; $i <= $max; $i++) { 
		$ip = ceil( ($i - 1) * $paging);
		$s .= '<a href=# data-offset="'.$ip.'" class="page '.$ip.'">'.$i.'</a>';
	}

	$s .= ' <a href=# class=next>Next</a>';
	$s .= ' <a href=# class=last>Last</a>';
	$s .= '</div>'; 

	$s .= '</div>';

	return $s;

} 

add_action('wp_ajax_nopriv_PROD_PAGING', 'vkrwps_show_products_paging');
add_action('wp_ajax_PROD_PAGING', 'vkrwps_show_products_paging');
function vkrwps_show_products_paging () {

	$start = $_POST['start'];

	$cat = $_POST['cat'];

	$preload_img = get_site_url() . '/wp-content/plugins/real-wp-shop-lite/js/ajaximg.GIF';
	$pre_img = '<img src='.$preload_img.' />';

	$pat = get_option('vkrwps_pat');
	$s = '';

	$paging = get_option( 'vkrwps_paging' );

	$pdo = get_option( 'vkrwps_pdo' );

	global $wpdb;

	$cid = $wpdb->get_results( 
	"
	SELECT id
	FROM wp_vkrwps_categories
	WHERE cat_name='$cat'
	"
	);

	foreach ($cid as $key => $value) {
		$cid = $value->id;
	}

	$get_products = $wpdb->get_results( 
	"
	SELECT id, name, description, price, shipping, in_stock
	FROM wp_vkrwps_products
	WHERE cat_id='$cid'
	ORDER BY id $pdo
	LIMIT $start,$paging
	"
	);

	$atct = get_option('vkrwps_addtocart_s');

	$pdt = get_option('vkrwps_pdetails_s');

	$sym = get_option('vkrwps_currency');

	$ooss = get_option( 'vkrwps_ooss' );

	$sps = get_option( 'vkrwps_sps' );

	$pricetext = get_option('vkrwps_pricetext');

	foreach ($get_products as $key => $value) {

		$in_stock = $value->in_stock;

		$post_name = str_replace(' ', '-', $value->name);
		$post_name = str_replace("'", "", $post_name);

		$sd = $value->description;
		$sd = apply_filters('the_content', $sd);
		$sd = stripslashes($sd);

		$s .= '
			   <div class=rwpsprod>
			   		
			   	   <div class=img>
					   <a href='.get_site_url().'/'.strtolower($post_name).'/>
					   	<img src='.content_url().'/rwpsliteuploads/'.$value->id.'.jpg />
					   </a>
				   </div>

			   	   <div class=right>
					   <p class=prod-name><a href='.get_site_url().'/'.strtolower($post_name).'/><span>'.$value->name.'</span></a></p>
					   <div class=prod-desc>'.$sd.'</div>
					   <p class=price><span class=sprice>'.$pricetext.'</span> <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($value->price, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>
					   <p class="shipping">'.$sps.' <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($sp, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>
					   <div class=atc>';
					   if ( $in_stock == 'yes') {
					   	    $s .= '<p class=addtocart><a class="add id'.$value->id.'" href=#>'.$atct.'</a></p>';
					   } else {
					   		$s .= '<p class=outofstock>'.$ooss.'</p>'; 
					   }
						$s .= '
						   <p class=details><a href='.get_site_url().'/'.strtolower($post_name).'/><span>'.$pdt.'</span></a></p>
					   </div>
				   </div>
				   <div class="prel prel'.$value->id.'">'.$pre_img.'</div>
				   <div class="apmsg apmsg'.$value->id.'">'.$pat.'</div>
			   </div>'; 
	}

	echo $s;

	die();
} 

add_shortcode( 'sstest', 'vkrwps_test' );
function vkrwps_test ( $atts ) {
	remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );
	extract( shortcode_atts( array(
		'foo' => ''
	), $atts ) );

	return 'eeeeeeeeeeeee';
} 

add_shortcode( 'rwps_full_product', 'vkrwps_full_prod_info' );
function vkrwps_full_prod_info ( $atts ) {
	extract( shortcode_atts( array(
		'pid' => ''
	), $atts ) );

	global $wpdb;

	$get_prod_info = $wpdb->get_results( 
	"
	SELECT id, cat_id, name, description, long_description, price, in_stock
	FROM wp_vkrwps_products
	WHERE id = '$pid'
	"
	);

	$s = '';

	foreach ($get_prod_info as $prod_info) {

		global $pre_img;

		$atct = get_option('vkrwps_addtocart_s');

		$ooss = get_option( 'vkrwps_ooss' );

		$pricetext = get_option( 'vkrwps_pricetext' );

		$sym = get_option( 'vkrwps_currency' );

		$sps = get_option( 'vkrwps_sps' );

		$pn = stripslashes($prod_info->name);

		$s .= '<h2>'.$pn.'</h2>';

		$pat = get_option('vkrwps_pat' );

		$ld = $prod_info->long_description;
		$ld = apply_filters('the_content', $ld);
		$s .= stripslashes($ld);

		$s .= '
			   <div class="rwpsprod fp">

					   <p class=price><span class=sprice>'.$pricetext.'</span> <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($prod_info->price, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>

					   <p class="shipping">'.$sps.' <span class="sym one">'.$sym.'</span><span class=amount>'.number_format($sp, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>';

					   if ( $prod_info->in_stock == 'yes') {
					   	    $s .= '<p class=addtocart><a class="add id'.$prod_info->id.'" href=#>'.$atct.'</a></p>';
					   } else {
					   		$s .= '<p class=outofstock>'.$ooss.'</p>'; 
					   }

				$s .=  '				   
					   <div class="prel prel'.$prod_info->id.'">'.$pre_img.'</div>
					   <div class="apmsg apmsg'.$prod_info->id.'">'.$pat.'</div>
				</div'; 

	}

	return $s;
} 

add_shortcode( 'vkrwps_cart', 'vkrwps_cart' );
function vkrwps_cart ( $atts ) {
	extract( shortcode_atts( array(
		'foo' => ''
	), $atts ) );

	global $pre_img;

	$sym = get_option( 'vkrwps_currency' );

	$s = '<div class=vkrwps-cart>';

	$s .= '<div class=ajaximgwrap><div class=ajaximg>'.$pre_img.'</div></div>';

	$apa = get_option('vkrwps_add_again_p_text');
	$spt = get_option('vkrwps_remove_one_p_text');
	$dpt = get_option('vkrwps_clear_p_s');

	$sess = '';
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, strlen($name) - 5);

				$count += $value;

				global $wpdb;

				$get_prods = $wpdb->get_results( 
				"
				SELECT id, name, price, shipping, weight
				FROM wp_vkrwps_products
				WHERE id='$id'
				"
				);


				foreach ($get_prods as $product) {
					$sub = $product->price * $value;
					$weight += $product->weight * $value;
					$s .= '<div class=cartpn>
							   <span class=ppic><img src='.content_url().'/rwpsliteuploads/'.$product->id.'.jpg /></span>
							   <span class=prodname>'.$product->name . '</span> 
							   <span class=break></span>
							   <span class=x>x</span> 
							   <span class=value>' . $value . '</span> 
							   <span class=equal>=</span> 
							   <span class="sym one">'.$sym.'</span><span class=amount>' .number_format($sub, 2, '.', '') . '</span><span class="sym two">'.$sym.'</span>
							   <span class=rac>
								   <a class="remove id'.$product->id.'" href=#>'.$spt.'</a>
								   <a class="add id'.$product->id.'" href=#>'.$apa.'</a>
								   <a class="clear id'.$product->id.'" href=#>'.$dpt.'</a>
							   </span>
							   <span class="cartmsg cartmsg'.$product->id.'"></span>
						   </div>
					';
					$imgsrc = '<img style="width:100px;" src='.content_url().'/rwpsliteuploads/'.$product->id.'.jpg >';
					$ppfe = $value * $product->price;
					$ppfe = number_format($ppfe, 2, '.', '');
					$ppfe = $sym.$ppfe;
					$sess .= "$imgsrc&nbsp;&nbsp; $product->name x $value &nbsp;&nbsp; $ppfe<br><br>";	
				}
			$total += $sub;

			}


		} 
	} 
	$cpn = get_option('vkrwps_checkout_page');

	$ct = get_option('vkrwps_checkout_text');

	$ecs = get_option( 'vkrwps_empty_cart_s' );

	$ctat = get_option( 'vkrwps_cart_total_s' );
	$ctatwt = get_option( 'vkrwps_cart_total_wt_s' );

	$weighttext = get_option( 'vkrwps_weighttext' );

	$weightmtext = get_option( 'vkrwps_weightmtext' );

	$sps = get_option( 'vkrwps_sps' );

	$wp = get_option( 'vkrwps_sppk' );
	$shipprice = $wp * $weight;
	$_SESSION['des_shipping_cost'] = $shipprice;
	$tax = get_option( 'vkrwps_tax' );
	$totalTax = $tax / 100 * $total;
	$_SESSION['des_tax_cost'] = $totalTax;
	$total2 = $total + $totalTax + $shipprice;
	$_SESSION['tws'] = number_format($total2, 2, '.', '');
	$_SESSION['sess'] = $sess;

	$tax = get_option( 'vkrwps_tax' );
	$totalx = $total;
	$totalTax = $tax / 100 * $totalx;
	$totalTax = $totalx+=$totalTax;

	$taxtext = get_option( 'vkrwps_taxtext' );

	$twtas = get_option('vkrwps_twtas');

	$cpn = stripslashes($cpn);

	$cpn2 = $cpn;

	$cpn = str_replace(' ', '-', $cpn);
	$cpn = str_replace("'", "", $cpn);

	if ($total > 0) {

		

		$s .= '<p class=totalp><span class=total>'.$ctat.'</span> <span class="sym one">' . $sym .'</span><span class=amount>'.number_format($total, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>';

		$tax = get_option( 'vkrwps_tax' );
		$s .= '<p class=taxp><span class=taxtext>'. $taxtext . '</span> <span class=amount>' . $tax . '%</span></p>';

		$s .= '<p class=totalwtp><span class=totalwt>' . $ctatwt . '</span> <span class="sym one">' . $sym .'</span><span class=amount>'. number_format($totalTax, 2, '.', '') . '</span><span class="sym two">'.$sym.'</span></p>';

		$ppk = get_option( 'vkrwps_sppk' );
		$twppk = $ppk * $weight;
		$twppk = number_format($twppk, 2, '.', '');

		$totaltotal = $totalTax + $twppk;
		$_SESSION['totalWE'] = $totaltotal;

		$cct = get_option('vkrwps_clear_cart_s');

		$s .= '<p class=clearcartp><a class=clearcart href=#>'.$cct.'</a> <span class=ccspan></span></p>';


		$s .= '<p class=checkout><a href='.get_site_url().'/'.$cpn.'>'.$cpn2.'</a></p>';
		$s .= '</div>';
		
	} else {
		$st = '<p>'.$ecs.'</p>';
	}

	$cart_display = get_option( 'vkrwps_cart_display');

	if ($cart_display == 'full') {

		if ( ! $st ) { 
			return $s;
		} else {
			return $st;
		}

	} elseif ($cart_display == 'simple') {


		$s = '';

		$t = get_option('vkrwps_cart_total_s');
		$it = get_option('vkrwps_sci_s' );
		$sym2 = get_option('vkrwps_currency');
		$cct2 = get_option( 'vkrwps_clear_cart_s' );

		$s .= '<div class=simple_cart>';
		if ( $total > 0 ) {
			$s .= '<p><span class="sct">'.$t.'</span>
					    <span class=scc>'.$count.'</span> 
					    <span class=scit>'.$it.'</span>
					    <span class=scs>'.$sym2.'</span><span class=sctp>'.number_format($total, 2, '.', '').'</span>
					    <span class=asci></span>
				    </p>
					<p><a href="#" class="clearcart">'.$cct2.'</a></p>
					<p><a href='.get_site_url().'/'.$cpn.'>'.$cpn2.'</a></p>
					<div class=ajaximgwrap><span class=ajaximg>'.$pre_img.'</span></div>
				</div>';

				echo $s;
		} else {
			echo '<p>'.$ecs.'</p>';
		} 

	} else {
		echo 'problem 1122'.$cart_display;
	}

} 

$url = get_site_url();
$cpn = get_option( 'vkrwps_checkout_page' );
$furl = $url . '/' .$cpn . '/';

add_action('wp_ajax_nopriv_ADD_PROD', 'vkrwps_add_prod');
add_action('wp_ajax_ADD_PROD', 'vkrwps_add_prod');
function vkrwps_add_prod(){

	if (isset($_POST['add'])) {

		$_SESSION['cart_'.$_POST['id']]++;
		$_SESSION['vkcart'] .= ',' . $_POST['id'];
		echo do_shortcode('[vkrwps_cart]');

	} elseif (isset($_POST['remove'])) {

		$_SESSION['cart_'.$_POST['id']]--;
		echo do_shortcode('[vkrwps_cart]');

	} elseif (isset($_POST['clear'])) {

		$_SESSION['cart_'.$_POST['id']] = 0;
		echo do_shortcode('[vkrwps_cart]');

	} elseif (isset($_POST['clearcart'])) {
		
		$pids = ltrim($_SESSION['vkcart'], ',');
		$pids = explode(',', $pids);
		$pids = array_unique($pids);

		foreach ($pids as $key => $value) {
			$_SESSION['cart_'.$value] = 0;
		}
		
		foreach($_SESSION as $key => $value){
		    if( "des_" == substr($key, 0, 4)){
		         unset($_SESSION[$key]);
		    }
		}		

		unset($_SESSION['tws']);
		unset($_SESSION['sess']);
		unset($_SESSION['vkcart']);
		unset($_SESSION['totalWE']);
		unset($_SESSION['des_steps_total']);
		
		echo do_shortcode('[vkrwps_cart]');

   } else {
	   	echo do_shortcode('[vkrwps_cart]');
   }

	die();

} 

add_action('wp_ajax_nopriv_ADD_PROD_CO', 'vkrwps_checkout_cart');
add_action('wp_ajax_ADD_PROD_CO', 'vkrwps_checkout_cart');
function vkrwps_checkout_cart() {

	if (isset($_POST['addco'])) {

		$_SESSION['cart_'.$_POST['id']]++;
		$_SESSION['vkcartco'] .= ',' . $_POST['id'];
		echo do_shortcode('[vkrwps_checkout]');
		die();

	} elseif (isset($_POST['removeco'])) {

		$_SESSION['cart_'.$_POST['id']]--;
		echo do_shortcode('[vkrwps_checkout]');
		die();

	} elseif (isset($_POST['clearco'])) {

		$_SESSION['cart_'.$_POST['id']] = 0;
		echo do_shortcode('[vkrwps_checkout]');
		die();

	} elseif (isset($_POST['clearcartco'])) {

		$filtered = array();
		foreach ($_SESSION as $key => $value) {
		    if (strpos($key, 'cart_') !== 0) {
		        $filtered[$key] = $value;
		    }
		}
			
		$pids = ltrim($filtered['vkcart'], ',');
		$pids = explode(',', $pids);
		
		foreach ($pids as $key => $value) {
			$_SESSION['cart_'.$value] = 0;
		}

		foreach($_SESSION as $key => $value){
		    if( "des_" == substr($key, 0, 4)){
		         unset($_SESSION[$key]);
		    }
		}		

		unset($_SESSION['tws']);
		unset($_SESSION['sess']);
		unset($_SESSION['vkcart']);
		unset($_SESSION['vkcartco']);
		unset($_SESSION['totalWE']);
		unset($_SESSION['des_steps_total']);
		
		echo do_shortcode('[vkrwps_checkout]');

		die();

   } else {
	   	echo do_shortcode('[vkrwps_checkout]');
   }

} 

add_shortcode( 'vkrwps_checkout', 'vkrwps_checkout' );
function vkrwps_checkout ( $atts ) {
	extract( shortcode_atts( array(
		'foo' => ''
	), $atts ) );

	global $pre_img;

	if ($foo != 'b2') {

		$s =  '<div class=vkrwps-co-wrapper>';	
		$s .= '<div class=state style="position:absolute;left:-2000px;opacity:0;"></div>';
		$s .= '<div class=ajaximgwrap></div>';

		$s .= '<div class=vkrwps-co>';	

	}	
	
	$s .= '<div class=step1>';

	$s .= '<div class=step1stop></div>';

	$s1tt = get_option( 'vkrwpspro_s1tt' );

	$s .= '<div class=toptext>'.nl2br($s1tt).'</div>';

	$apa = get_option('vkrwps_add_again_p_text');
	$spt = get_option('vkrwps_remove_one_p_text');
	$dpt = get_option('vkrwps_clear_p_s');
	$sps = get_option( 'vkrwps_sps' );
	$sppk = get_option( 'vkrwps_sppk' );

	$weighttext = get_option( 'vkrwps_weighttext' );

	$weightmtext = get_option( 'vkrwps_weightmtext' );

	global $pre_img;

	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {

			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, strlen($name) - 5);

				global $wpdb;

				$get_prods = $wpdb->get_results( 
				"
				SELECT id, name, price, weight, shipping
				FROM wp_vkrwps_products
				WHERE id='$id'
				"
				);

				foreach ($get_prods as $product) {
					$sub = ($product->price + $product->shipping) * $value;
					$weight += $product->weight * $value;
					$i_weight = $product->weight;
					$sym = get_option( 'vkrwps_currency' );
					$shipprice = $sppk * $i_weight * $value;
					$shipprice = number_format($shipprice, 2, '.', '');

					$s .= '<div class=copn>


							   <img style="" src='.content_url().'/rwpsliteuploads/'.$product->id.'.jpg>

							   <div class=right>

							   	   <div class=coprodinfo>	
									   <span class=prodname>'.$product->name . '</span> 
									   <span class=break></span>
									   <span class=x>x</span> 
									   <span class=value>' . $value . '</span> 
									   <span class=equal>=</span> 
									   <span class="sym one">'.$sym.'</span><span class=amount>' . number_format($sub, 2, '.', '') . '</span><span class="sym two">'.$sym.'</span>
								   </div>

								   <p class=coweight><span class=weight>' . $weighttext .' </span> <span>' . $i_weight . '</span> <span class=weightm>' . $weightmtext . ' </span></p>

								   <p class=coshipprice><span class=cosp>'.$sps.'</span> <span class="sym one">'.$sym.'</span><span class=amount>' . number_format($shipprice, 2, '.', '') . '</span><span class="sym two">'.$sym.'</p>

								   <span class=rac>
									   <a class="removeco id'.$product->id.'" href=#>'.$spt.'</a>
									   <a class="addco id'.$product->id.'" href=#>'.$apa.'</a>
									   <a class="clearco id'.$product->id.'" href=#>'.$dpt.'</a>
								   </span>

							   </div>
							   <div class=clear></div>
							   <div class="coprel coprel'.$product->id.'">'.$pre_img.'</div>
						   </div>
					';
				}
				$total += $sub;

			}

		} 
	} 

	$_SESSION['des_steps_total'] = $total;

	$sym = get_option( 'vkrwps_currency' );

	$ctat = get_option( 'vkrwps_cart_total_s' );

	$s .= '<div class=clear></div>';

	$s .= '<div class=ftotal>';

	$s .= '<p class=totalp><span class=cototal>'.$ctat.'</span> <span class="sym one">' . $sym .'</span><span class=amount>'.number_format($total, 2, '.', '').'</span><span class="sym two">'.$sym.'</span></p>';

	$taxtext = get_option( 'vkrwps_taxtext' );

	$weighttext = get_option( 'vkrwps_weighttext' );

	$weightmtext = get_option( 'vkrwps_weightmtext' );

	$tax = get_option( 'vkrwps_tax' );
	$s .= '<p class=taxp><span class=taxtext>'. $taxtext . '</span><span class=amount> ' . $tax . '%</span></p>';

	$tax = get_option( 'vkrwps_tax' );
	$totalx = $total;
	$totalTax = $tax / 100 * $totalx;
	$totalTax = $totalx+=$totalTax;

	$ctatwt = get_option( 'vkrwps_cart_total_wt_s' );

	$sps = get_option( 'vkrwps_sps' );

	$twtas = get_option( 'vkrwps_twtas' );

	$s .= '<p class=totalwtp><span class=totalwt>' . $ctatwt . '</span> <span class="sym one">' . $sym .'</span><span class=amount>'. number_format($totalTax, 2, '.', '') . '</span><span class="sym two">'.$sym.'</span></p>';

	$s .= '<p class=weightp><span class=weight>'.$weighttext.'</span> <span class=amount>'.$weight.'</span> <span class=weightm>' . $weightmtext . '</span></p>';

	$ppk = get_option( 'vkrwps_sppk' );

	$twppk = $ppk * $weight;
	$twppk = number_format($twppk, 2, '.', '');

	$s .= '<p class=shippingp><span class=shipprice>' . $sps . '</span> <span class="sym one">'.$sym.'</span><span class=shipamount>'.$twppk.'</span><span class="sym two">'.$sym.'</span></p>';

	$totaltotal = $totalTax + $twppk;
	$totaltotal = number_format($totaltotal, 2, '.', '');
	$s .= '<p class=totalallp><span class=totalalls>'.$twtas.'</span> <span class="sym one">'.$sym.'</span><span class=amounts>'.$totaltotal.'</span><span class="sym two">'.$sym.'</span></p>';

	$s .= '</div>'; 

	$ecs = get_option( 'vkrwps_empty_cart_s' );

	$ccs = get_option('vkrwps_clear_cart_s');
	$s .= '<p class=clearcartp><a href=# class=clearcartco>'.$ccs.'</a></p>';

	$step2t = get_option('vkrwps_step2_s');
	$s .= '<p class=checkout><a href=# class=s2>'.$step2t.'</a></p>';

	$s .= '</div>'; 

	if ($foo != 'b2') {
		$s .= '</div>';
		$s .= '</div>';
	}

	if ($total == 0) {
		$s = '<p>'.$ecs.'<p>';
	}

	if ($foo == 'b2') {
		echo $s;
		die();
	} else {
		return $s;
	}

} 

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); 
}


add_action('wp_ajax_nopriv_B2_CHECKOUT', 'vkrwps_call_co');
add_action('wp_ajax_B2_CHECKOUT', 'vkrwps_call_co');
function vkrwps_call_co() 
{
	$_SESSION['des_n'] = trim($_POST['n']);
	$_SESSION['des_mn'] = $_POST['mn'];
	$_SESSION['des_ln'] = trim($_POST['ln']);
	$_SESSION['des_email'] = $_POST['email'];
	$_SESSION['des_a1'] = trim($_POST['a1']);
	$_SESSION['des_a2'] = $_POST['a2'];
	$_SESSION['des_city'] = $_POST['city'];
	$_SESSION['des_zip'] = $_POST['zip'];
	$_SESSION['des_countryval'] = $_POST['countryval'];
	$_SESSION['des_country'] = $_POST['country'];
	$_SESSION['des_state'] = $_POST['state'];
	$_SESSION['des_phone'] = $_POST['phone'];
	$_SESSION['des_mobile'] = $_POST['mobile'];
	$_SESSION['des_fax'] = $_POST['fax'];
	$_SESSION['des_rpt'] = $_POST['rpt'];
	$_SESSION['des_notes'] = $_POST['notes'];
	echo do_shortcode('[vkrwps_checkout foo=b2]');
}

add_action('wp_ajax_nopriv_STEP2', 'vkrwps_step2');
add_action('wp_ajax_STEP2', 'vkrwps_step2');
function vkrwps_step2() 
{
	$s = '';
	$s .= '<div class=step2>';

	$s .= '<a href=# class=mrs>Mrs</a>';

	$s .= '<div class=step2stop></div>';

	$s2tt = get_option( 'vkrwpspro_s2tt' );
	
	$s .= '<div class=toptext>'.nl2br($s2tt).'</div>';

	
	$s .= '<p><label for=n>Name: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=n id=n class=mand value="'.$_SESSION['des_n'].'">';
	$s .= '<span class="nameerror error">This field is required.</span></p>';

	$s .= '<p><label for=mn>Middle Name:</label>';
	$s .= '<input type=text name=mn id=mn value="'.$_SESSION['des_mn'].'"></p>';

	$s .= '<p><label for=ln>Last Name: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=ln id=ln class=mand value="'.$_SESSION['des_ln'].'">';
	$s .= '<span class="lastnameerror error">This field is required.</span></p>';

	$s .= '<p><label for=email>E-mail: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=email id=email class=mand value="'.$_SESSION['des_email'].'">';
	$s .= '<span class="emailerror error">This field is required.</span></p>';

	$s .= '<p><label for=a1>Address 1: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=a1 id=a1 class=mand value="'.$_SESSION['des_a1'].'">';
	$s .= '<span class="addresserror error">This field is required.</span></p>';

	$s .= '<p><label for=a2>Address 2:</label>';
	$s .= '<input type=text name=a2 id=a2 value="'.$_SESSION['des_a2'].'"></p>';

	$s .= '<p><label for=city>City: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=city id=city class=mand value="'.$_SESSION['des_city'].'">';
	$s .= '<span class="cityerror error">This field is required.</span></p>';

	$s .= '<p><label for=zip>Zip/Postal code: <span class=spanmand>*</span></label>';
	$s .= '<input type=text name=zip id=zip class=mand value="'.$_SESSION['des_zip'].'">';
	$s .= '<span class="ziperror error">This field is required.</span></p>';

	$s .= '<p><label for=country>Country: <span class=spanmand>*</span></label>';
	require 'inc/countries.php';
	$s .= $c;
	$s .= '<span class="countryerror error">This field is required.</span>';
	$s .= '</p>';

	$s .= '<p><label for=state>State/Province/Region: <span class=bool>*</span></label>';
	$s .= '<select name=state id=state class=mand>';
	$s .= '<option value=none>none</option>';
	$s .= '</select>';
	$s .= '<span class="stateerror error">This field is required.</span></p>';

	$s .= '<p><label for=phone>Phone:</label>';
	$s .= '<input type=text name=phone id=phone value="'.$_SESSION['des_phone'].'"></p>';

	$s .= '<p><label for=mobile>Mobile:</label>';
	$s .= '<input type=text name=mobile id=mobile value="'.$_SESSION['des_mobile'].'"></p>';

	$s .= '<p><label for=fax>Fax:</label>';
	$s .= '<input type=text name=fax id=fax value="'.$_SESSION['des_fax'].'"></p>';

	$s .= '<p><label for=notes>Notes:</label>';
	$s .= '<textarea name=notes id=notes>'.$_SESSION['des_notes'].'</textarea></p>';

	$rp = randomPassword();
	$time = time();
	$rp2 = randomPassword();
	$rpt = $rp . $time .$rp2;
	$s .= '<p style="position:absolute;left:-2000px;opacity:0;"><input type=text name=ppflag id=ppflag value="'.$rpt.'" ></p>';

	$btstep1t = get_option('vkrwps_backts1_s');
	$s .= '<p><a href=# class=s1>'.$btstep1t.'</a></p>';

	$step3t = get_option('vkrwps_step3_s');
	$s .= '<p><a href=# class=s3>'.$step3t.'</a></p>';

	$s .= '</div>'; 

	echo $s;
	die();
}

add_action('wp_ajax_nopriv_STEP3', 'vkrwps_step3');
add_action('wp_ajax_STEP3', 'vkrwps_step3');
function vkrwps_step3() 
{

	$_SESSION['des_n'] = trim($_POST['n']);
	$_SESSION['des_mn'] = $_POST['mn'];
	$_SESSION['des_ln'] = trim($_POST['ln']);
	$_SESSION['des_email'] = $_POST['email'];
	$_SESSION['des_a1'] = trim($_POST['a1']);
	$_SESSION['des_a2'] = $_POST['a2'];
	$_SESSION['des_city'] = $_POST['city'];
	$_SESSION['des_zip'] = $_POST['zip'];
	$_SESSION['des_countryval'] = $_POST['countryval'];
	$_SESSION['des_country'] = $_POST['country'];
	$_SESSION['des_state'] = $_POST['state'];
	$_SESSION['des_phone'] = $_POST['phone'];
	$_SESSION['des_mobile'] = $_POST['mobile'];
	$_SESSION['des_fax'] = $_POST['fax'];
	$_SESSION['des_rpt'] = $_POST['rpt'];
	$_SESSION['des_notes'] = $_POST['notes'];

	$custom = $_SESSION['des_rpt'];

	$s = '';

	$s .= '<div class=step3>';

	$s .= '<div class=cpm style="position:absolute;left:-2000px;opacity:0;"></div>';

	$s .= '<div class=step3stop></div>';

	$s3tt = get_option( 'vkrwpspro_s3tt' );
	
	$s .= '<div class=toptext>'.nl2br($s3tt).'</div>';
	
	global $pre_img;
	$s .= '<div class=step3inner>';
	$s .= '<div class=abg>
				<p>Processing, please wait...</p>	
			</div>';

	global $wpdb;

	$get_pos = $wpdb->get_results( 
    "
    SELECT id, title, description, id_name, active
    FROM wp_vkrwps_payment_options
    WHERE active=1
    "
    );

    foreach ($get_pos as $po) {
        $s .= '<p class="pos"><input id="id'.$po->id.'" type=radio name=poc value="'.$po->title.'">';
        $s .= '<label for="id'.$po->id.'">'.$po->title.'</label> <span>'.$po->description.'</span></p>';
    }

	$s .= '</div>';
	

        $get_pe = $wpdb->get_results( 
          "
          SELECT email
          FROM wp_vkrwps_paypal
          "
        );
        
        foreach ($get_pe as $key => $value) {
            $pe = $value->email;
        }

        $ppe = get_option('vkrwps_ppemail');
		?>
		<p>
		<?php if ($ppe == 'tester'): ?>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="ppform">
		<?php else: ?>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="ppform">			
		<?php endif ?>
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="business" value="<?php echo $pe; ?>">
			<?php paypal_items(); ?>
			<input type="hidden" name="item_name" value="Item Name">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="custom" value="<?php echo $custom; ?>">
			<input type="hidden" name="amount" value="<?php echo $total; ?>">
			<input type="hidden" name="notify_url" value="<?php echo site_url().'/ipn/'; ?>">			
			<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" class="pp" alt="Make payments with PayPal - it's fast, free and secure!">
		</form>
		</p>
		<?php


		$btstep2t = get_option('vkrwps_backts2_s');
		$s .= '<p><a href=# class=sb>'.$btstep2t.'</a></p>';

		$fco = get_option('vkrwps_finish_co_s');
		$s .= '<p><a href="#" class="finish-co">'.$fco.'</a></p>';

		$s .= '<p class=ar></p>';

		$s .= '</div>'; 

	echo $s;
	die();
}

function paypal_items() {

	$totalWE = $_SESSION['totalWE'];

	foreach ($_SESSION as $name => $value) {
		if ($value != 0) {

			if (substr($name, 0, 5) == 'cart_') {
				$id = substr($name, 5, strlen($name) - 5);

				global $wpdb;

				$get_prods = $wpdb->get_results( 
				"
				SELECT id, name, price, weight
				FROM wp_vkrwps_products
				WHERE id='$id'
				"
				);

				foreach ($get_prods as $prod) {

					$price = $prod->price;
					$weight = $prod->weight;
					$ppk = get_option( 'vkrwps_sppk' );
					$tax = get_option( 'vkrwps_tax' );
					$taxtax = $price * $tax / 100;
					$shipping = $ppk * $weight;

					$num++;
					print '<input type=hidden name=item_name_'.$num.' value="'.$prod->name.'">';
					print '<input type=hidden name=item_number_'.$num.' value='.$id.'>';
					
					print '<input type=hidden name=amount_'.$num.' value='.$prod->price.'>';

					print '<input type=hidden name=shipping_'.$num.' value='.$shipping.'>';

					print '<input type=hidden name=tax_'.$num.' value='.$taxtax.'>';

					print '<input type=hidden name=quantity_'.$num.' value='.$value.'>';
				}

			}
		}
	}
} 

add_action('wp_ajax_nopriv_ADD_CUST_INFO', 'vkrwps_customer_info');
add_action('wp_ajax_ADD_CUST_INFO', 'vkrwps_customer_info');
function vkrwps_customer_info() {

	global $wpdb;

	$wpdb->insert( 
        'wp_vkrwps_orderid', 
        array( 
            'flag' => 1, 
        ), 
        array( 
            '%d'
        ) 
    ); 

	$oid = get_option( 'vkrwps_oid' );

	$get_oid = $wpdb->get_results( 
            "
            SELECT id
            FROM wp_vkrwps_orderid
            ORDER BY id DESC
            LIMIT 1
            "
            );

	foreach ($get_oid as $oidd) {
		$rid = $oidd->id;
	}
	
	$roid = $oid + $rid; 

	$n = $_SESSION['des_n'];
	$n = sanitize_text_field( $n );
	$n = ucfirst($n);

	$mn = $_SESSION['des_mn'];
	$mn = sanitize_text_field( $mn );
	$mn = ucfirst($mn);

	$ln = $_SESSION['des_ln'];
	$ln = sanitize_text_field( $ln );
	$ln = ucfirst($ln);

	$em = $_SESSION['des_email'];
	$em = sanitize_email( $em );

	$a1 = $_SESSION['des_a1'];
	$a1 = sanitize_text_field( $a1 );
	$a1 = ucfirst($a1);
	$a1 = stripslashes($a1);

	$a2 = $_SESSION['des_a2'];
	$a2 = sanitize_text_field( $a2 );
	$a2 = stripslashes($a2);

	$city = $_SESSION['des_city'];
	$city = sanitize_text_field( $city );
	$city = ucfirst($city);

	$zip = $_SESSION['des_zip'];
	$zip = sanitize_text_field( $zip );

	$country = $_SESSION['des_country'];
	$country = ucfirst($country);

	$state = $_SESSION['des_state'];
	$state = ucfirst($state);

	$phone = $_SESSION['des_phone'];
	$phone = sanitize_text_field( $phone );

	$mobile = $_SESSION['des_mobile'];
	$mobile = sanitize_text_field( $mobile );

	$fax = $_SESSION['des_fax'];
	$fax = sanitize_text_field( $fax );

	$rpt = $_SESSION['des_rpt'];

	$notes = $_SESSION['des_notes'];
	$notes = esc_html( $notes );

	$tws = $_SESSION['tws'];

	$oc = $_SESSION['sess'];

	$ppotext = get_option( 'vkrwps_ppotext' );

	$cpm = $_POST['cpm'];

	$dnow = $_POST['dnow'];

	$insert_order = $wpdb->insert( 
        'wp_vkrwps_order_info', 
        array( 
            'orderid' => $roid,
            'order_status' => 'pending', 
            'name' => $n, 
            'middle_name' => $mn, 
            'lastname' => $ln, 
            'email' => $em, 
            'address1' => $a1, 
            'address2' => $a2, 
            'city' => $city, 
            'zip' => $zip, 
            'country' => $country,
            'state' => $state,
            'phone' => $phone,
            'mobile' => $mobile,
            'fax' => $fax,
            'ordernotes' => $notes,
            'total' => $tws,
            'ordercontent' => $oc,
            'orderdate' => $dnow,
            'rpt' => $rpt,
            'payment_option' => $cpm
        ), 
        array( 
            '%d',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        ) 
    ); 

	if ( ! $insert_order ) {
		$wpdb->show_errors();
		$wpdb->print_error(); 
		die();
	}
	
	$last_id = $wpdb->insert_id;

	$q = $wpdb->get_results( 
            "
            SELECT orderdate
            FROM wp_vkrwps_order_info
            WHERE id=$last_id
            "
            );
	foreach ($q as $key => $value) {
		$d = $value->orderdate;	
	}

	$tet = get_option( 'vkrwps_orderconftext' );

	$emsym = get_option( 'vkrwps_symba' );
	$emcur = get_option( 'vkrwps_currency' );
	if ($emsym == 'before') {
		$twsws = $emcur . $tws;
	} else if ($emsym == 'after') {
		$twsws = $tws . $emcur;
	} else {
		$twsws = $emcur . $tws;
	}

	$st = $_SESSION['des_shipping_cost'];
	$st = number_format($st, 2, '.', '');
	if ($emsym == 'before') {
		$shipcost = $emcur . $st;
	} else if ($emsym == 'after') {
		$shipcost = $st . $emcur;
	} else {
		$shipcost = $emcur . $st;
	}

	$tt = $_SESSION['des_tax_cost'];
	$tt = number_format($tt, 2, '.', '');
	if ($emsym == 'before') {
		$taxcost = $emcur . $tt;
	} else if ($emsym == 'after') {
		$taxcost = $tt . $emcur;
	} else {
		$taxcost = $emcur . $tt;
	}

	$emailbanner = plugins_url( 'emailbanner.jpg', __FILE__ );

	echo nl2br($ppotext);

	$sn = get_option( 'vkrwps_shopname' );
	
	if ($state == 'None') $state='';

	$textc = get_option('vkrwps_nltextc');
	$tc = get_option('vkrwps_nltc');
	$bc = get_option('vkrwps_nlbc');

	$emailbody = '
	<table align="center" style="font-family:Verdana,Geneva,sans-serif;font-size:14px;color:'.$textc.';" bgcolor="#F3F3F4">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="width: 600px;" align="center">

					<tr>
						<td bgcolor="white" align="center" style="padding: 0px 0px;border:0px solid #333;">
							<h1 style="color:'.$tc.';">'.$sn.'</h1>
						</td>
					</tr>

					<tr>
						<td bgcolor="white" style="padding: 10px;padding-top: 20px;padding-bottom:15px;">
							<strong>'.nl2br($tet).'</strong>
						</td>
					</tr>

					<tr>
						<td width=600>
							<table width=600>
								<tr>
									<td style="padding-left:10px;">
										<strong style="color:'.$tc.';">Order number:</strong>
										'.$roid.'
									</td>
									<td>
										<strong style="color:'.$tc.';">Order date:</strong>
										'.$d.'
									</td>
									<td>
										<strong style="color:'.$tc.';">Order status:</strong>
										Pending
									</td>
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding:20px 0 20px 0;">
							<table width=600>
								<tr>
									<td width=10></td>

									<td width=270>
										<strong style="color:'.$tc.';padding:0 0 5px 0;display:inline-block;">Billing address:</strong>
										<br>'.$n.' '.$ln.'
										<br>'.$a1.'
										<br>'.$city.'
										<br>'.$zip.'
										<br>'.$country.'
										<br>'.$state.'
									</td>

									<td width=30></td>

									<td width=270>
										<strong style="color:'.$tc.';padding:0 0 5px 0;display:inline-block;">Shipping address:</strong>
										<br>'.$n.' '.$ln.'
										<br>'.$a1.'
										<br>'.$city.'
										<br>'.$zip.'
										<br>'.$country.'
										<br>'.$state.'
									</td>

								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600>
							<table width=600>
								<tr>
									<td width=10></td>
									<td width=580 style="color:#fff;padding:10px;font-weight:bold;background:'.$bc.';">Order Content:</td>
									<td width=10></td>									
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding-top:5px;">
							<table width=600>
								<tr>
									<td width=10></td>
									<td width=580>'.$oc.'</td>
									<td width=10></td>									
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding-top:5px;padding-bottom:7px;">
							<table width=600>
								<tr>
									<td style="padding-left:15px;">
										<strong style="color:'.$tc.';">Shipping cost:</strong>
										'.$shipcost.'
									</td>
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding-top:5px;padding-bottom:7px;">
							<table width=600>
								<tr>
									<td style="padding-left:15px;">
										<strong style="color:'.$tc.';">Order total:</strong>
										'.$twsws.'
									</td>
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding-top:5px;padding-bottom:20px;">
							<table width=600>
								<tr>
									<td style="padding-left:15px;">
										<strong style="color:'.$tc.';">Payment Method:</strong>
										'.$cpm.'
									</td>
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600>
							<table width=600>
								<tr>
									<td width=10></td>
									<td width=580 style="color:#fff;padding:10px;font-weight:bold;background:'.$bc.';">Notes:</td>
									<td width=10></td>									
								</tr>
							</table>
						<td>
					</tr>

					<tr>
						<td width=600 style="padding-top:5px;">
							<table width=600>
								<tr>
									<td width=10></td>
									<td width=580>'.nl2br($notes).'</td>
									<td width=10></td>									
								</tr>
							</table>
						<td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	</table>
	';

	$sn = get_option( 'vkrwps_shopname' );
	$mem = get_option( 'vkrwps_mem' );
	$aes = get_option( 'vkrwps_ae_subj' );
	$aes = $aes . ' ' .$roid; 
	$ces = get_option( 'vkrwps_ce_subj' );
	$ces = $ces . ' '.$roid;

	$headers[] = "Content-type: text/html";
	$headers[] = "From: $sn <$mem> \r\n";
	wp_mail( 
		$em, 
		$ces,
		$emailbody,
		$headers
	);

	$aoef = get_option( 'vkrwps_aoef' );
	if ($aoef == 'yes') 
	{
		$headers2[] = "Content-type: text/html";
		$headers2[] = "From: $sn <$mem> \r\n";
		wp_mail( 
			$mem, 
			$aes,
			$emailbody,
			$headers2
		);
	}

	foreach($_SESSION as $key => $value){
	    if( "cart_" == substr($key, 0, 5)){
	         unset($_SESSION[$key]);
	    }
	    if( "des_" == substr($key, 0, 4)){
	         unset($_SESSION[$key]);
	    }
	}
	unset($_SESSION['tws']);
	unset($_SESSION['sess']);
	unset($_SESSION['vkcart']);
	unset($_SESSION['totalWE']);
	unset($_SESSION['des_steps_total']);

	die();

} 

add_shortcode( 'rwps_search', 'vkrwps_search_form' );
function vkrwps_search_form() {
	
	$s = '';

	$s .= '<input type="text" value="" name="rwpssearch" id="rwpssearch" autocomplete="off">';

	$s .= '<h4 id="results-text">Showing results for: <b id="search-string">Array</b></h4>
		   <ul id="rwpsresults"></ul>';

	return $s;

} 

add_action('wp_ajax_nopriv_DO_SEARCH', 'vkrwps_do_search');
add_action('wp_ajax_DO_SEARCH', 'vkrwps_do_search');
function vkrwps_do_search() {
	
	$query = $_POST['query'];

	$s = '';
	
	global $wpdb;

	$search_prods = $wpdb->get_results($wpdb->prepare( "SELECT * from wp_vkrwps_products WHERE name LIKE %s", '%' . like_escape($query) . '%'));

	$preload_img = get_site_url() . '/wp-content/plugins/real-wp-shop-lite/js/ajaximg.GIF';
	$pre_img = '<img src='.$preload_img.' />';

	$count = count($search_prods);

	$sym = get_option('vkrwps_currency');

	$ooss = get_option( 'vkrwps_ooss' );

	if ($count > 0) {

		foreach ($search_prods as $prod) {
			$hl = $prod->name;
			$h2 = $hl;
			$hl = preg_replace("/".$query."/i", "<b>".$query."</b>", $hl);

			$h2 = str_replace(' ', '-', $h2);
			$h2 = strtolower($h2);
			$h2 = str_replace("'", "", $h2);
			$h2 = get_site_url().'/'.$h2;

			$hl = stripslashes($hl);

			if ( $prod->in_stock == 'yes') {
				$pp = '<span class="sym one">'.$sym.'</span><span class=amount>'.number_format($prod->price, 2, '.', '').'</span><span class="sym two">'.$sym.'</span>';
			} else {
				$pp = '<span class=oosls>'.$ooss.'</span>';
			}

			$s .= '
					<li class="c'.$prod->id.'"> 
						<a href="'.$h2.'" id="id'.$prod->id.'" class="livesearch img"><img style="width:50px;" src="'.content_url().'/rwpsliteuploads/'.$prod->id.'.jpg"></a>
						<a href="'.$h2.'" id="id'.$prod->id.'" class="livesearch link">'.$hl.'</a><div class=lsaimg>'.$pre_img.'</div>
						<p class=liveprice>'.$pp.'</p>
					</li>';
		}

		$s .= '<div class=close>close</div>';

	} else {
		$s = '<span class=nrf>No results found</span>';
		$s .= '<div class=close>close</div>';
	}

	echo $s;

	die();
} 

add_action('wp_ajax_nopriv_GET_SEARCH_PROD', 'vkrwps_get_search_prod');
add_action('wp_ajax_GET_SEARCH_PROD', 'vkrwps_get_search_prod');
function vkrwps_get_search_prod() {

	$pid = $_POST['pid'];

	echo do_shortcode('[rwps_full_product pid='.$pid.']');

	die();
} 

$preload_img = get_site_url() . '/wp-content/plugins/real-wp-shop-lite/js/ajaximg.GIF';
$pre_img = '<img src='.$preload_img.' />';

global $wpdb;

$get_pos = $wpdb->get_results( 
"
SELECT id, title, description, id_name, active
FROM wp_vkrwps_payment_options
WHERE active=1
"
);

add_action( 'wp_enqueue_scripts', 'add_script' );
function add_script() {

	global $pre_img;

	global $wpdb;

	$cartdc = get_option('vkrwps_cart_div');
	$codc = get_option('vkrwps_co_div');
	$symba = get_option( 'vkrwps_symba' );
	$pat = get_option('vkrwps_pat' );
	$prt = get_option( 'vkrwps_prt' );
	$paging = get_option( 'vkrwps_paging' );
	$ootext = get_option( 'vkrwps_ootext' );
	$ootext = nl2br($ootext);

	$getpayos = $wpdb->get_results( 
	"
	SELECT id_name
	FROM wp_vkrwps_payment_options
	WHERE active='1'
	"
	);

	$pos_arr = array();
	foreach ($getpayos as $key => $po) {
		$pos_arr[] = $po->id_name;
	}
	wp_enqueue_script(
        'moment',
        plugins_url( '/js/moment.js', __FILE__ ),
        array('jquery')
    );
    wp_enqueue_script(
        'vkrwpsjs',
        plugins_url( '/js/vkrwpsjs.js', __FILE__ ), 
        array( 'jquery' )
    );
    wp_localize_script('vkrwpsjs', 
    				   'ajax_object', 
    				   array( 
    				   	'ajax_url' => admin_url( 'admin-ajax.php' ), 
    				   	'preloader' => $pre_img, 
    				   	'pos' => $pos_arr, 
    				   	'cartclass' => $cartdc, 
    				   	'coclass' => $codc,
    				   	'symba' => $symba,
    				   	'pat' => $pat,
    				   	'prt' => $prt,
    				   	'paging' => $paging,
    				   	'ootext' => $ootext
    				   	) 
    				  );

    

} 

add_action('wp_ajax_nopriv_SHOW_CART', 'vkrwps_show_cart');
add_action('wp_ajax_SHOW_CART', 'vkrwps_show_cart');
function vkrwps_show_cart() {
	echo do_shortcode('[vkrwps_cart]');
	die();
}

add_action( 'admin_enqueue_scripts', 'vkrwps_enqueue' );
function vkrwps_enqueue() {
    wp_enqueue_script( 'chosen', plugin_dir_url( __FILE__ ) . 'js/chosen.jquery.min.js', array('jquery') );
    wp_enqueue_style( 'my_chosen', plugin_dir_url( __FILE__ ) . 'css/my_chosen.css' );
}

add_action( 'admin_enqueue_scripts', 'vkrwps_add_admin_ajax' );
function vkrwps_add_admin_ajax() {
	global $pre_img;
    $dir = content_url().'/rwpsliteuploads/';

    $op = get_option( 'vkrwps_orders_paging' );

    wp_enqueue_script(
        'vkrwpsadminajax',
        plugins_url( '/js/vkrwpsadmin.js', __FILE__ ), 
        array( 'jquery' )
    );
    wp_localize_script('vkrwpsadminajax', 
    					'vkrwps_admin', 
    					array( 
    						'ajax_url' => admin_url( 'admin-ajax.php' ), 
    						'preloader' => $pre_img, 
    						'updir' => $dir,
    						'op' => $op
    					) 
    );
}

add_action('wp_ajax_nopriv_ADD_CUST_INFO_PAYPAL_IPN', 'vkrwps_ipn');
add_action('wp_ajax_ADD_CUST_INFO_PAYPAL_IPN', 'vkrwps_ipn');
add_shortcode( 'rwpsipn' ,'vkrwps_ipn' );
function vkrwps_ipn ( $atts ) {

	$raw_post_data = file_get_contents('php://input');
	$raw_post_array = explode('&', $raw_post_data);
	$myPost = array();
	foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
	$myPost[$keyval[0]] = urldecode($keyval[1]);
	}
	$req = 'cmd=_notify-validate';
	if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
	}
	foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
	$value = urlencode(stripslashes($value));
	} else {
	$value = urlencode($value);
	}
	$req .= "&$key=$value";
	}
	 
	 
	$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2, '.', '');
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
	 
	if( !($res = curl_exec($ch)) ) {
	curl_close($ch);
	exit;
	}
	curl_close($ch);
	 
	 
	if (strcmp ($res, "VERIFIED") == 0) {
		global $wpdb;
		$rpt = $_POST['custom'];

		$q = $wpdb->query("UPDATE wp_vkrwps_order_info SET order_status='paid' WHERE rpt='$rpt' ORDER BY id DESC LIMIT 1");

		$get_orderid = $wpdb->get_results( 
		"
		SELECT orderid, email
		FROM wp_vkrwps_order_info
		WHERE rpt='$rpt'
		ORDER BY id DESC
		LIMIT 1
		"
		);

		foreach ($get_orderid as $key => $value) {
			$orderid = $value->orderid;
			$em 	 = $value->email;
		}

		$cps = get_option( 'vkrwps_cps' );
		$cps = $cps . ' ' . $orderid;

		$sn = get_option( 'vkrwps_shopname' );
		$mem = get_option( 'vkrwps_mem' );

		$emailbody = '<p>Order status change - Order No.'.$orderid.'</p><p>New status: <b>paid</b></p>';

		$headers[] = "Content-type: text/html";
		$headers[] = "From: $sn <$mem> \r\n";
		wp_mail( 
			$em, 
			$cps,
			$emailbody,
			$headers
		);

		$aoef = get_option( 'vkrwps_aoef' );
		if ($aoef == 'yes') 
		{
			$headers2[] = "Content-type: text/html";
			$headers2[] = "From: $sn <$mem> \r\n";
			wp_mail( 
				$mem, 
				$cps,
				$emailbody,
				$headers2
			);
		}


	} else if (strcmp ($res, "INVALID") == 0) {
		echo "The response from IPN was: <b>" .$res ."</b>";
	}
}

require 'inc/pc/a_edit_products.php';

require 'inc/pc/a_delete_order_row.php';

require 'inc/pc/a_update_order_status.php';

require 'inc/pc/a_orders_paging.php';



add_filter('widget_text', 'do_shortcode');