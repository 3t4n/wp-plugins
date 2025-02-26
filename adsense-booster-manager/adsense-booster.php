<?php
/*
Plugin Name: AdSense Booster & Manager
Plugin Uri: http://infotheme.in/
Version:2.0.1
Author: InfoTheme 
Author uri: http://infotheme.in/
Description: Adsense Booster & Manager Plugin offering facility of Ads Management with ad blocking of specific author's post and specific posts.
Tags: adsense, WordPress Plugin, adsense booster, quick ads, quick adsense, google adsense, advertising, adsense optimization, adsense optimizer, ad manager, ad, yahoo, google, ads, admin, posts, pages, category, plugin.
Text Domain: infotheme
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
?>
<?php

	// create plugin settings menu
	add_action('admin_menu', 'adBooster_create_menu');

	function adBooster_create_menu() {

		//create new top-level menu
		add_menu_page('Adsense Booster & Manager Plugin Settings', 'Adsense Booster', 'administrator', 'adsense_booster', 'adsense_booster_settings_page',plugins_url('/images/icon.png', __FILE__));

		//call register settings function
		add_action( 'admin_init', 'register_abmsettings' );
	}

	function abm_admin_styles() {
		wp_register_style( 'abm_admin_stylesheet', plugins_url( '/css/abm_admin.css', __FILE__ ) );
		wp_register_script( 'abm_admin_script', plugins_url( '/js/abm_admin.js', __FILE__ ) );
		wp_enqueue_script( 'abm_admin_script' );
		wp_enqueue_style( 'abm_admin_stylesheet' );
	}
		add_action( 'admin_enqueue_scripts', 'abm_admin_styles' ); 


	
	
	function register_abmsettings() {
	//register our settings
		register_setting( 'adm-global-settings-group', 'adm_gs_ad1' );
		register_setting( 'adm-global-settings-group', 'adm_gs_ad2' );
		register_setting( 'adm-global-settings-group', 'adm_gs_ad3' );
		
		register_setting( 'adm-global-settings-group', 'adm_gs_top' );
		register_setting( 'adm-global-settings-group', 'adm_gs_mop' );
		register_setting( 'adm-global-settings-group', 'adm_gs_eop' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afp' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afi' );
		register_setting( 'adm-global-settings-group', 'adm_gs_bfi' );
		register_setting( 'adm-global-settings-group', 'adm_gs_blp' );
		
		register_setting( 'adm-global-settings-group', 'adm_gs_top_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_mop_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_eop_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afp_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afi_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_bfi_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_blp_ad' );
		register_setting( 'adm-global-settings-group', 'adm_gs_alp_ad' );
		
		
		register_setting( 'adm-global-settings-group', 'adm_gs_top_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_mop_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_eop_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afp_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_afi_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_bfi_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_blp_style' );
		register_setting( 'adm-global-settings-group', 'adm_gs_alp_style' );
		
		register_setting( 'adm-global-settings-group', 'adm_gs_p_exclue' );
		register_setting( 'adm-global-settings-group', 'adm_gs_a_exclue' );
		register_setting( 'adm-global-settings-group', 'abm_appearance_check_page' );
		register_setting( 'adm-global-settings-group', 'abm_appearance_check_post' );
		register_setting( 'adm-global-settings-group', 'abm_appearance_check_cat' );
		register_setting( 'adm-global-settings-group', 'abm_appearance_check_archive' );
		register_setting( 'adm-global-settings-group', 'abm_appearance_check_home' );
	}

	function adsense_booster_settings_page() {
	@include_once('abm-options.php');
	} 
	
	
	function abm_add_to_content($content)
	{
	global $post;
	global $author_permission;
	global $post_permission;
	
	$post_permission=1;
	$author_permission = 1;

	//ADS EXCLUDE FROM BLOCKED POSTS
	if(get_option('adm_gs_p_exclue')){
	$blocked_posts =  intval(get_option('adm_gs_p_exclue'));
	$blokedPostsArray = array($blocked_posts);
	if (in_array($post->ID,$blokedPostsArray,true)) $post_permission=0;	
	}
	
	//ADS EXCLUDE FROM USERS POSTS
	if(get_option('adm_gs_a_exclue')){
	$blocked_author =  intval(get_option('adm_gs_a_exclue'));
	if ($post->post_author == $blocked_author) $author_permission=0;	
	}
	
	//ADS HIDE FROM PAGES
	if(!get_option('abm_appearance_check_page')) {
	if(is_page()) return $content;
	}
	
	//ADS HIDE FROM POSTS
	if(!get_option('abm_appearance_check_post')){
	if(is_single()) return $content;
	}
	
	//ADS HIDE FROM CATEGORIES
	if(get_option('abm_appearance_check_cat')){
	if(is_category()) return $content;
	}
	
	//ADS HIDE FROM ARCHIVES
	if(get_option('abm_appearance_check_archive')){
	if(is_archive()) return $content;
	}
	
	//ADS HIDE FROM HOMEPAGE
	if(get_option('abm_appearance_check_home')){
	if(is_front_page() or is_home()) return $content;
	}
	
	if($post_permission == 1):
	if($author_permission == 1):
	/*Add Ad top of the post*/
	if(get_option('adm_gs_top')):
	$selectedAd = "adm_gs_".get_option('adm_gs_top_ad');
	$selectedAdCode = get_option($selectedAd);
	
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_top_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";
    $content = $abmAd . $content;
	
	endif;
	
	/*Add Ad Middle of the post*/
	if(get_option('adm_gs_mop')):
	$selectedAd = "adm_gs_".get_option('adm_gs_mop_ad');
	$selectedAdCode = get_option($selectedAd);
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme(www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_mop_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";
    $after_character = count($content)/2;
	$tagscount = substr_count($content, '<p>');
	$tagsMidway = intval($tagscount/2);
    $before_content = substr($content, 0, $after_character);
    $after_content = substr($content, $after_character);
    $after_content = explode('</p>', $after_content);
    array_splice($after_content, $tagsMidway, 0, $abmAd);
    $after_content = implode('</p>', $after_content);
    $content = $before_content . $after_content;
	endif;
	
	
	/*Add Ad End of the post*/
	if(get_option('adm_gs_eop')):
	$selectedAd = "adm_gs_".get_option('adm_gs_eop_ad');
	$selectedAdCode = get_option($selectedAd);
	
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_eop_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";
    $content = $content.$abmAd;
	
	endif;
	
	
	/*Add Ad After First Paragraph of the post*/
	
	if(get_option('adm_gs_afp')):
	$selectedAd = "adm_gs_".get_option('adm_gs_afp_ad');
	$selectedAdCode = get_option($selectedAd);
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_afp_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";
    $after_character = count($content)/2;
    $before_content = substr($content, 0, $after_character);
    $after_content = substr($content, $after_character);
    $after_content = explode('</p>', $after_content);
    array_splice($after_content, 1, 0, $abmAd);
    $after_content = implode('</p>', $after_content);
    $content = $before_content . $after_content;
	endif;
	
	/*Add Ad After First Image of the post*/
	
	if(get_option('adm_gs_afi')):
	$selectedAd = "adm_gs_".get_option('adm_gs_afi_ad');
	$selectedAdCode = get_option($selectedAd);
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infothem.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_afi_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";

	
	if(preg_match('/(<a.*?><img[^>]+><\/a>)/i', $content, $a_tagmatch)){ //CONDITION TO CHECK IS A TAG AVAIL BEFORE IMG TAG
	 $img = $a_tagmatch[0];
	 $newContents = explode("$img", $content);
	array_splice($newContents, 1, 0, $img.$abmAd);
	
	}elseif(preg_match('/(<img[^>]+>)/i', $content, $img_tagmatch)){ //CONDITION TO CHECK IS A TAG NOT AVAIL BEFORE IMG TAG
	 $img = $a_tagmatch[0];
	 $newContents = explode("$img", $content);
	array_splice($newContents, 1, 0, $img.$abmAd);
	
	}else{ //NO IMG TAG FOUND
	$newcontents = array($content); 
	}
	
	$newContents = implode("", $newContents);
	$content = $newContents;
	endif;
	
	/*Add Ad Before First Image of the post*/
	if(get_option('adm_gs_bfi')):
	$selectedAd = "adm_gs_".get_option('adm_gs_bfi_ad');
	$selectedAdCode = get_option($selectedAd);
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_bfi_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";

	
	if(preg_match('/(<a.*?><img[^>]+><\/a>)/i', $content, $a_tagmatch)){ //CONDITION TO CHECK IS A TAG AVAIL BEFORE IMG TAG
	 $img = $a_tagmatch[0];
	 $newContents = explode("$img", $content);
	array_splice($newContents, 1, 0, $abmAd.$img);
	
	}elseif(preg_match('/(<img[^>]+>)/i', $content, $img_tagmatch)){ //CONDITION TO CHECK IS A TAG NOT AVAIL BEFORE IMG TAG
	 $img = $a_tagmatch[0];
	 $newContents = explode("$img", $content);
	array_splice($newContents, 1, 0, $abmAd.$img);
	
	}else{ //NO IMG TAG FOUND
	$newcontents = array($content); 
	}
	
	$newContents = implode("", $newContents);
	$content = $newContents;
	endif;
	
	
	/*Add Ad Before Last Paragraph of the post*/
	if(get_option('adm_gs_blp')):
	$selectedAd = "adm_gs_".get_option('adm_gs_blp_ad');
	$selectedAdCode = get_option($selectedAd);
	$abmAd = "<!--ADSENSE BOOSTER & MNANAGMENT PLUGIN BY InfoTheme (www.infotheme.in)-->";
	$abmAd = $abmAd."<div id='advertisment_abm' style='text-align:".get_option('adm_gs_blp_style').";'><div id='Inner_ads'>$selectedAdCode</div>";
	$abmAd = $abmAd."</div>";
	$tagscount = substr_count($content, '<p>');
    
        $insert_after = $tagscount - 1;

        $paragraphs = explode( '</p>', $content);

        // if array elements are less than $insert_after set the insert point at the end
		
        $len = count( $paragraphs );
        if (  $len < $insert_after ) $insert_after = $len;

        // insert $abmAd into the array at the specified point
        array_splice( $paragraphs, $insert_after, 0, $abmAd );

        // loop through array and build string for output
        foreach( $paragraphs as $paragraph ) {
            $newContents .= $paragraph; 
        }
		
        $content =  $newContents;
	
	endif;
	endif;
	endif;
	
	return $content;
	}
	
	
	
	 add_filter('the_content', 'abm_add_to_content');
	
	?>