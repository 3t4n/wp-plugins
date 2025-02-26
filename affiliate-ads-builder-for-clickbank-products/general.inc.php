<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}




function mycbgenie_ads_validation_check($mycbgenie_field,$single_word,$int_value,$default_int_val){
	
	if (is_null($mycbgenie_field)) return $mycbgenie_field;
	
	if ($int_value=="yes") {

		if (is_numeric($mycbgenie_field)) { 	return $mycbgenie_field; } else { 	return $default_int_val; }

	} else { 

			if ($single_word=="yes") {
		
				$mycbgenie_field = sanitize_title($mycbgenie_field);
			}else{
			
				$mycbgenie_field = sanitize_text_field(strip_tags($mycbgenie_field)); 
			}

	}




	return htmlentities($mycbgenie_field);
}


function mycbgenie_queryloop_is_active( $plugin ) {
	$network_active = false;
	if ( is_multisite() ) {
		$plugins = get_site_option( 'active_sitewide_plugins' );
		if ( isset( $plugins[$plugin] ) ) {
			$network_active = true;
		}
	}
	return in_array( $plugin, get_option( 'active_plugins' ) ) || $network_active;
}
	
function mycbgenie_check_woo_active(){
	// Check if WooCommerce is active
	if ( mycbgenie_queryloop_is_active( 'woocommerce/woocommerce.php' ) || class_exists( 'WooCommerce' ) ) {

		return true;
	} else {
		return false;
	}
	

}

function mycbgenie_ads_version_update() {


		if (get_option('mycbgenie_ads_version') !== MYCBGENIE_ADS_ACTIVE_VERSION ) {
			update_option('mycbgenie_ads_version', MYCBGENIE_ADS_ACTIVE_VERSION);
		}

	
}


function mycbgenie_ads_sidebar_menu()
{
add_menu_page( 'MyCBGenie_Ads', 'ClickBank Ads', 'manage_options', 'mycbgenie_ads_main_menu', 'mycbgenie_ads_settings',
		plugin_dir_url( __FILE__ ) .'images/fav_small.ico',26);
		
		add_submenu_page( 'mycbgenie_ads_main_menu',    'Settings',    'Ad Settings', 'manage_options', 'mycbgenie_ads_settings','mycbgenie_ads_settings');
		add_submenu_page( 'mycbgenie_ads_main_menu',    'widget',    'Ad Widget', 	'manage_options', 'mycbgenie_ads_widget','mycbgenie_ads_widget');


      
}


function mycbgenie_ads_settings_link($links)


{
	//$settings_link =  '<a href="options-general.php?page=mycbgenie_ads_main_menu">
		//			Settings</a>';
   // array_unshift($links, $settings_link);
	
	
	    $settings_link =  '<img src="'. plugin_dir_url( __FILE__ ).'/images/fav.jpg" style="height:40px; width:auto;"><a href="admin.php?page=mycbgenie_ads_settings">
					Settings</a>';
    array_unshift($links, $settings_link);
	
	
    
    return $links;
}


function mycbgenie_fetch_keywords_for_automatic(){
		
			$kws = mycbgenie_get_woo_keywords();
			//if no woo keywords then fetch blog categories

			if (strlen($kws)<3 ){ 
				$kws = mycbgenie_get_blog_keywords();			
			}

		return $kws;
}
		


function mycbgenie_get_woo_keywords(){
		
		$cnt=0;
        $kws="";

		if (!mycbgenie_check_woo_active()) return;
		
			if (is_woocommerce()) {

				
				//product cateogry
				if (is_product_category()){

					$term = get_term_by( 'slug', get_query_var( 'product_cat' ),  'product_cat'  ); // get current term
					if ($term){
		
						$kws= $term->name;
						$parent = get_term($term->parent, ('product_cat') ); // get parent term
						if( !is_wp_error( $parent ) ) {
						//if(		(isset($parent->term_id)) ||	($parent->term_id!="")		) {
							$parent=$parent->name;
							$kws= $kws . " ". $parent;					}
					} //if term
				}// if product category
				
				
				//product single
				if (is_product()){
				
					$product_terms = wp_get_object_terms( get_the_ID(),  'product_cat' );
					$kws=($product_terms[0]->slug);
				//	$kws=get_the_Title()." ".$kws;
					$kws=get_the_Title().' '.( substr( str_replace("-"," ",$kws) ,0,30  )        );
				//echo $kws;
				}// if product single
				
				


				//product shop
				if (is_shop()){

						
				
					$args = array(
						 'taxonomy'     => 'product_cat',
						 'parent'   => 0,
					);
					  
					$all_categories = get_categories( $args );
					shuffle( $all_categories );
					
					foreach ($all_categories as $cat) {
						$cnt=$cnt+1;
						if ($cnt<=5) {
							//var_dump($cat->slug);
							$kws= $kws. " ".$cat->slug;
							
						}
					}

				}// if product shop
				
				
				//product tag
				if (is_product_tag()){

					$kws=get_queried_object()->name;
					
				}// if product tag
								


				
				//product searcg
				if (is_search()){

					$kws=get_search_query();
				}// if product search
								
								
				
			}//if woo commerce
			
			return $kws;
		}

	

	function mycbgenie_get_blog_keywords(){
		
			
	        $kws="";	
			$kws_cnt=0;
			$kw_arr="";
			$new_kws="";

		if ( is_single() ) {	
			
		
		    $str=(get_the_content());
            // str_word_count($str,1) - returns an array containing all the words found inside the string
            $words = str_word_count(strtolower($str),1);
            $numWords = count($words);
            
            // array_count_values() returns an array using the values of the input array as keys and their frequency in input as values.
            $word_count = (array_count_values($words));
            arsort($word_count);
            
            foreach ($word_count as $key=>$val) {
                if ((strlen($key)>4) && ($kws_cnt<10) ) {
                   // echo "$key = $val. Density: ".number_format(($val/$numWords)*100)."%<br/>\n";
                    $kws=$kws.' '.$key;
                    $kws_cnt=$kws_cnt+1;
                }
            }
            
           // $new_kws="";
            // getting similar words from TITLE
            $kw_arr=explode(' ',get_the_title());
            foreach ($kw_arr as $key=>$val) {
                if (strpos(strtolower(trim($kws)),strtolower(trim($val))) !== false){
                    $new_kws=$new_kws. ' '. strtolower(trim($val));
                }
            }   
                   
           // echo 'kws from content:'.$kws.'<br>';
            //echo ' found in title:'.$new_kws.'<br>';
          
             $new_kws=substr($new_kws. ' '. $kws,1,35);
             //echo ' Final:'.$new_kws.'<br>';
        
		}
		else {
		    //if (is_home() || is_front_page()
		   $new_kws=get_bloginfo( 'description' );
		   
		}
             //	echo $new_kws;
			return $new_kws;
	}
		
		function mycbgenie_fetch_url($base_url){
		
			if (	(get_option('mycbgenie_account_no')==NULL) 	){
			
						echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
						//return;
						
			}
			
			if ( (get_option('mycbgenie_account_no')) ){
		
				  if (abs(get_option('mycbgenie_account_no')) == 33333 ) {
							echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
						//return;
					}
			}else{
				echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
				//return;
			}
			
			$ref_url = urlencode("http".(!empty($_SERVER['HTTPS'])?"s":"").
			"://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			//add_action('wp_enqueue_scripts', 'mycbgenie_carousel_ads_load_scripts');
			
			if (abs(date("s")) % 5!=0) {
			
				$full_url = $base_url.'&account='.get_option('mycbgenie_account_no');
			}else{
			
				 $full_url = $base_url.'&ref='.$ref_url.'&account='.get_option('mycbgenie_account_no');
			}

		
			return $full_url;
		}
		
function mycbgenie_carousel_ad_shortcode($mcg_atts){



	$mcg_atts = shortcode_atts(array(
        'title' => 'RELATED PRODUCTS',
        'no_of_products' => '5',
        'im_width' => '180',
        'vertical_no_of_products' => '3',		
        'kws' => 'make money online',
        'show_product_descr' => '1',
        'orientation' => 'vertical',
        'auto_show' => 'true',
        'speed' => '300',
        'delay' => '3000',
        'moveSildes' => '1',								
        'default_font_family' => '1',
        'fill_color' => 'FFFFFF',
        'link_color' => '0000FF',
        'border_color' => 'DDDDDD',
		'hide_footer'	=>	'0',
		'tracking_id'	=> ''
            ), $mcg_atts, 'mycbgenie_carousel_ad');

	
									//arguments (field, single words or not, integer vale or not, default integer value)
		$title 						= 	mycbgenie_ads_validation_check ( $mcg_atts['title'], "no", "no","0");
		$im_width 					= 	mycbgenie_ads_validation_check ( $mcg_atts['im_width'], "yes", "yes","1");
		$no_of_products_at_a_time 	= 	mycbgenie_ads_validation_check($mcg_atts['vertical_no_of_products'], "yes", "yes","1");
		$auto_show 					= 	mycbgenie_ads_validation_check($mcg_atts['auto_show'], "yes", "no","");
		$speed 						= 	mycbgenie_ads_validation_check($mcg_atts['speed'], "yes", "yes","300");
		$delay 						= 	mycbgenie_ads_validation_check($mcg_atts['delay'], "yes", "yes","4000");									
		$moveSildes 				= 	mycbgenie_ads_validation_check($mcg_atts['moveSildes'], "yes", "yes","1");
		$orientation 				= 	mycbgenie_ads_validation_check($mcg_atts['orientation'], "yes", "no","");
		$kws 						= 	mycbgenie_ads_validation_check($mcg_atts['kws'], "no", "no","");
		$show_product_descr 		= 	mycbgenie_ads_validation_check($mcg_atts['show_product_descr'], "yes", "yes","1");
		$no_of_products 			= 	mycbgenie_ads_validation_check($mcg_atts['no_of_products'], "yes", "yes","1");
		$default_font_family 		= 	mycbgenie_ads_validation_check($mcg_atts['default_font_family'], "yes", "yes","1");
		$fill_color	 				= 	mycbgenie_ads_validation_check($mcg_atts['fill_color'], "yes", "no","");
		$link_color 				= 	mycbgenie_ads_validation_check($mcg_atts['link_color'], "yes", "no","");
		$border_color 				= 	mycbgenie_ads_validation_check($mcg_atts['border_color'], "yes", "no","");
		$hide_footer				= 	mycbgenie_ads_validation_check($mcg_atts['hide_footer'], "yes", "yes","1");
		$tracking_id				= 	mycbgenie_ads_validation_check($mcg_atts['tracking_id'], "yes", "no","");

			
		return mycbgenie_carousel_ads_script($title, $no_of_products, $im_width, $no_of_products_at_a_time, $auto_show, $speed, $delay, $moveSildes,  $orientation,  $kws,  $show_product_descr,  $default_font_family, $fill_color, $border_color, $link_color,$hide_footer,$tracking_id);


		}



function mycbgenie_banner_ad_shortcode($mcg_atts){



	$mcg_atts = shortcode_atts(array(
        'banner_size' => '250x250',
       'kws' => 'make money online',
	   'hide_footer'	=>	'0',
	   'tracking_id'	=> ''
            ), $mcg_atts, 'mycbgenie_banner_ad');

	
	
	
									//arguments (field, single words or not, integer vale or not, default integer value)
		$banner_size 	= mycbgenie_ads_validation_check($mcg_atts['banner_size'], "yes", "no","");
		$kws 			= mycbgenie_ads_validation_check($mcg_atts['kws'], "no", "no","");
		$hide_footer	= mycbgenie_ads_validation_check($mcg_atts['hide_footer'], "yes", "yes","1");
		$tracking_id	= 	mycbgenie_ads_validation_check($mcg_atts['tracking_id'], "yes", "no","");

			
			return mycbgenie_banner_ads_script(  $banner_size, $kws,$hide_footer,$tracking_id);
			

		}
		
		
		
	
	function mycbgenie_text_ad_shortcode($mcg_atts){



	$mcg_atts = shortcode_atts(array(
        'no_of_products' => '5',
        'rows' => '1',
        'cols' => '3',		
        'kws' => 'make money online',
        'show_product_descr' => '1',
        'show_read_more_btn' => '1',
        'default_font_family' => '1',
        'fill_color' => 'FFFFFF',
        'link_color' => '0000FF',
        'border_color' => 'DDDDDD',
		'descr_color' => 'e5e5e5',
		'height_adjustment' => '0',
		'hide_footer' => '0',
		'tracking_id'	=> '' 
            ), $mcg_atts, 'mycbgenie_text_ad');

	
	
	
									//arguments (field, single words or not, integer vale or not, default integer value)
		$no_of_products 		= 	mycbgenie_ads_validation_check($mcg_atts['no_of_products'], "yes", "yes","1");
		$rows 					= 	mycbgenie_ads_validation_check($mcg_atts['rows'], "yes", "yes","1");		
		$cols 					= 	mycbgenie_ads_validation_check($mcg_atts['cols'], "yes", "yes","1");
		$kws					= 	mycbgenie_ads_validation_check($mcg_atts['kws'], "no", "no","");
		$show_product_descr		= 	mycbgenie_ads_validation_check($mcg_atts['show_product_descr'], "yes", "yes","1");
		$show_read_more_btn 	= 	mycbgenie_ads_validation_check($mcg_atts['show_read_more_btn'], "yes", "yes","1");
		$default_font_family 	= 	mycbgenie_ads_validation_check($mcg_atts['default_font_family'], "yes", "yes","1");
		$fill_color 			= 	mycbgenie_ads_validation_check($mcg_atts['fill_color'], "yes", "no","");
		$link_color 			= 	mycbgenie_ads_validation_check($mcg_atts['link_color'], "yes", "no","");;
		$border_color 			= 	mycbgenie_ads_validation_check($mcg_atts['border_color'], "yes", "no","");
		$descr_color 			= 	mycbgenie_ads_validation_check($mcg_atts['descr_color'], "yes", "no","");		
		$height_adjustment 		= 	mycbgenie_ads_validation_check($mcg_atts['height_adjustment'], "yes", "yes","1");		
		$hide_footer 			= 	mycbgenie_ads_validation_check($mcg_atts['hide_footer'], "yes", "yes","1");			
		$tracking_id			= 	mycbgenie_ads_validation_check($mcg_atts['tracking_id'], "yes", "no","");
			
		return	mycbgenie_text_ads_script(          $rows, $cols,  $kws,  $show_product_descr, $show_read_more_btn,  $default_font_family, $fill_color,$border_color, $link_color, $descr_color, $height_adjustment,$hide_footer,$tracking_id);
			

		}
		
		
		
		
		
function mycbgenie_image_ad_shortcode($mcg_atts){



	$mcg_atts = shortcode_atts(array(
        'title' => 'RELATED PRODUCTS',
        'title_tag' => 'H4',
        'rows' => '3',
        'cols' => '1',				
        'kws' => 'make money online',
        'im_width' => '180',		
        'show_product_descr' => '0',
        'show_read_more_btn' => '1',
        'default_font_family' => '1',
        'fill_color' => 'FFFFFF',
        'link_color' => '0000FF',
        'border_color' => 'DDDDDD',
        'height_adjustment' => '0',
        'hide_footer' => '0',
		'tracking_id'	=> '' 		
            ), $mcg_atts, 'mycbgenie_image_ad');


	
									//arguments (field, single words or not, integer vale or not, default integer value)
		$title 					= 	mycbgenie_ads_validation_check($mcg_atts['title'], "no", "no","");
		$title_tag 				= 	mycbgenie_ads_validation_check($mcg_atts['title_tag'], "yes", "no","");
		$rows 					= 	mycbgenie_ads_validation_check($mcg_atts['rows'], "yes", "yes","1");
		$cols 					= 	mycbgenie_ads_validation_check($mcg_atts['cols'], "yes", "yes","1");				
		$kws 					= 	mycbgenie_ads_validation_check($mcg_atts['kws'], "no", "no","");
		$im_width 				= 	mycbgenie_ads_validation_check($mcg_atts['im_width'], "yes", "yes","180");
		$show_product_descr 	= 	mycbgenie_ads_validation_check($mcg_atts['show_product_descr'], "yes", "yes","1");
		$show_read_more_btn 	= 	mycbgenie_ads_validation_check($mcg_atts['show_read_more_btn'], "yes", "yes","1");
		$default_font_family 	= 	mycbgenie_ads_validation_check($mcg_atts['default_font_family'], "yes", "yes","1");
		$fill_color 			= 	mycbgenie_ads_validation_check($mcg_atts['fill_color'], "yes", "no","");
		$link_color 			= 	mycbgenie_ads_validation_check($mcg_atts['link_color'], "yes", "no","");
		$border_color 			= 	mycbgenie_ads_validation_check($mcg_atts['border_color'], "yes", "no","");
		$height_adjustment 		= 	mycbgenie_ads_validation_check($mcg_atts['height_adjustment'], "yes", "yes","1");
		$hide_footer 			= 	mycbgenie_ads_validation_check($mcg_atts['hide_footer'], "yes", "yes","1");
		$tracking_id			= 	mycbgenie_ads_validation_check($mcg_atts['tracking_id'], "yes", "no","");

			
		return mycbgenie_image_ads_script($title, $title_tag, $rows, $cols, $kws, $im_width,  $show_product_descr, $show_read_more_btn, $default_font_family, $fill_color,$border_color, $link_color,$height_adjustment,$hide_footer,$tracking_id);
			

		}
		
	
	

function mycbgenie_ads_single_post_content_filter( $content ) {    

	//$prev_content= $content;
	
	if (	mycbgenie_check_woo_active()	)  
	{
											
		if 	(   is_product()	|| 	is_product_category()	)  
		{
		
		
		return  $content;
		}
	}


	if ( is_front_page() && is_home() ) {
	  // Default homepage
	} elseif ( is_front_page() ) {
	  // static homepage
	} elseif ( is_home() ) {
	  // blog page
	} else {
		
	    if( 	(	is_single() || is_singular() ) 
				&& ! is_admin()
				&& is_main_query()
		   )
		   {
	
							
				$content=(mycbgenie_ad_content_filter_get_top_shortcode()).$content."&nbsp;<br><br>".(mycbgenie_ad_content_filter_get_bottom_shortcode());
                //$content=str_replace($content,"get_the_post_thumbnail",'yasar'.".get_the_post_thumbnail");
              
		} //is single
	}
	//echo  do_shortcode(mycbgenie_ad_content_filter_get_top_shortcode());
	//echo  "<br><br>";
	//echo do_shortcode(mycbgenie_ad_content_filter_get_bottom_shortcode());
	return $content;
	
}	

	
function mycbgenie_ads_woo_single_product_content_top_filter($content){


		//if (is_product() || is_product_category() )    {
			$content=do_shortcode(mycbgenie_ad_content_filter_get_top_shortcode()). $content ;
		//}
	echo $content;

}


function mycbgenie_ads_woo_single_product_content_bottom_filter($content){

	//	if (is_product() || is_product_category())    {
		
			$content=$content ."<br><br>".do_shortcode(mycbgenie_ad_content_filter_get_bottom_shortcode());
		//}
		echo $content;
}

function mycbgenie_ad_content_filter_get_bottom_shortcode() {
			$post_content="";

			if (get_option('mycbgenie_show_ads_on_bottom_single_posts')=="Yes"){ 
			
				if (get_option('mycbgenie_ad_format_bottom_single_post')=="BANNER"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_bottom_banner_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$post_content=($mycbgenie_sc);
					
				}else if (get_option('mycbgenie_ad_format_bottom_single_post')=="TEXT"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_bottom_text_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$post_content=($mycbgenie_sc);
				
				}else if (get_option('mycbgenie_ad_format_bottom_single_post')=="IMAGE"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_bottom_image_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$post_content=($mycbgenie_sc);
				}else if (get_option('mycbgenie_ad_format_bottom_single_post')=="CAROUSEL"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_bottom_carousel_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$post_content=($mycbgenie_sc);
				}					
			
			}	//if Yes of bottom
			return $post_content;
}

function mycbgenie_ad_content_filter_get_top_shortcode() {
		
		$pre_content="";
		if (get_option('mycbgenie_show_ads_on_top_single_posts')=="Yes"){ 
			
				if (get_option('mycbgenie_ad_format_top_single_post')=="BANNER"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_top_banner_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$pre_content=($mycbgenie_sc);
					
				}elseif (get_option('mycbgenie_ad_format_top_single_post')=="TEXT"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_top_text_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$pre_content=($mycbgenie_sc);
				
				}elseif (get_option('mycbgenie_ad_format_top_single_post')=="IMAGE"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_top_image_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$pre_content=($mycbgenie_sc);
				}elseif (get_option('mycbgenie_ad_format_top_single_post')=="CAROUSEL"){
					
					$mycbgenie_sc	=	get_option('mycbgenie_ad_top_carousel_short_code');
					$mycbgenie_sc = str_replace('\"','"',$mycbgenie_sc);
					//echo $mycbgenie_sc;
					$pre_content=($mycbgenie_sc);
				}					
			
			}	//if Yes oif top
			
			return $pre_content;

			
			
}
?>