<?php
/**
 * Plugin Name: DP RDFa Breadcrumb Generator
 * Plugin URI: http://www.danilopetrozzi.it/progetti/dp-rdfa-breadcrumb-generator
 * Description: A RDFa breadcrumbs generator, specifically made for SEO purposes, that works in every scenario and displays the correct rich snippets in Google.
 * Version: 1.0.5
 * Author: Danilo Petrozzi
 * Author URI: http://www.danilopetrozzi.it
 * License: GPLv3
 */
 
// Security
if (!defined('ABSPATH')) {die();}
if (defined('WP_INSTALLING') && WP_INSTALLING) {return;}

// Include options page
include 'dp-rdfa-breadcrumb-generator-opt.php';

// Main function
function dp_breadcrumb() {

	// Retrieve options
	$showhome = get_option('dp_breadcrumb_showhome'); 
	$showpost = get_option('dp_breadcrumb_showpost');
	$showpage = get_option('dp_breadcrumb_showpage');
	$showarchive = get_option('dp_breadcrumb_showarchive');
	$showtag = get_option('dp_breadcrumb_showtag');
	$dpsep = ' ' . get_option('dp_breadcrumb_optseparator') . ' ';
	$dptext = get_option('dp_breadcrumb_opttext') . ' ';
    $dptexthome = get_option('dp_breadcrumb_opttexthome');
	$dptitle = get_option('dp_breadcrumb_opttitle');
	$dplastchild = get_option('dp_breadcrumb_optlastchild');;
	$dpmulti = get_option('dp_breadcrumb_optmultiple');
	$dpremove = get_option('dp_breadcrumb_optremove');

	$dp_output = '';

	////////// Main loop divided by taxonomy

	////// Home
	if ((is_home() || is_front_page()) && $showhome == 'Yes') {
	$dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;
	$dp_output .= '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a></span>';
	$dp_output .= '</div>';
	return $dp_output;
	}
	
	////// Posts
	elseif (is_single() && $showpost == 'Yes') {
	
    $idpost = get_the_id();
    $conta = get_the_category($idpost);
    $conta2 = count($conta);
    $posta = array();
    
    $catsa = array();
    $idsa = array();
    
    $catsa[0] = get_category( $conta[0]->term_id );
    $idsa[0] = $catsa[0]->category_parent;
    $tot = 1;
    if ($conta2 == '1' || ($conta2 > 1 && $dpmulti == 'No')) { // post with a single category - no need for v:child tags
    // Need to understand how many levels are there. In the meantime we collect the data inside $cats array
    if($idsa[0] != '0') {
    $catsa[1] = get_category($idsa[0]);
    $idsa[1] = $catsa[1]->category_parent;
    $tot++;

    if($idsa[1] != '0') {
    $catsa[2] = get_category($idsa[1]);
    $idsa[2] = $catsa[2]->category_parent;
    $tot++;

    if($idsa[2] != '0') {
    $catsa[3] = get_category($idsa[2]);
    $idsa[3] = $catsa[3]->category_parent;
    $tot++;    
    }
    }
    }

    $dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;
    $dp_output .= '<span class="dp_breadcrumb_span_home" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_home" rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a></span>';

    $x = $tot;   

    while ($x > 0) {
    $x--;
    if($tot == '1') { // if single category
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_1 dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_1 dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_category_link($catsa[0]->term_id) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $catsa[0]->name . '" ';} else {}
    $dp_output .= '>' . $catsa[0]->name . '</a></span>';
    }
   
    elseif($x != '0') { // "middle" categories among many
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . ($tot-$x) . '" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . ($tot-$x) . '" rel="v:url" property="v:title" href="'. get_category_link($catsa[$x]->cat_ID) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $catsa[$x]->name . '" ';} else {}
    $dp_output .= '>' . $catsa[$x]->name . '</a></span>';
    }
    elseif($x == '0') { //last of many categories
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . $tot .'" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $tot . '" rel="v:url" property="v:title" href="'. get_category_link($catsa[$x]->cat_ID) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $catsa[$x]->name . '" ';} else {}
    $dp_output .= '>' . $catsa[$x]->name . '</a></span>';
    }
    
    }
    $r = $tot+1;
    if ($dplastchild == "Yes") { // link to the post itself
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . $r .' dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $r . ' dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_permalink($idpost) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . get_the_title($idpost) . '" ';} else {}
    $dp_output .= '>' . get_the_title($idpost) . '</a></span>';
    }
    
    $dp_output .= '</div>'; //closure
    
    }
    
    
    elseif ($conta2 > 1 && $dpmulti == 'Yes') { // post with multiple categories - need comples v:child tags

    $p = 0;
    $catso = array();
    
    foreach ($conta as $co) {

    $catso[$p][0] = $co;
    if($catso[$p][0]->category_parent != '0') {
    $catso[$p][1] = get_category($catso[$p][0]->category_parent);

    if($catso[$p][1]->category_parent != '0') {
    $catso[$p][2] = get_category($catso[$p][1]->category_parent);

    if($catso[$p][2]->category_parent != '0') {
    $catso[$p][3] = get_category($catso[$p][2]->category_parent);
    
    }
    }
    }
    
    $p++;
    }
    
 
    foreach($catso as $ci) {
    $ci = array_reverse($ci);

    if ($dpremove == "Yes") {$dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">';}
    else {$dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;}
    $dp_output .= '<span class="dp_breadcrumb_span_home" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_home" rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a>';
    
    $conto = count($ci);
    $backc = 1;
    foreach ($ci as $c) {
    
    
    
    $dp_output .= $dpsep;
    $dp_output .= '<span rel="v:child"><span class="dp_breadcrumb_span_' . $backc;
    if($conto == $backc && $dplastchild == "No") {$dp_output .= ' dp_breadcrumb_span_last';}
    $dp_output .= '" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $backc;
    if($conto == $backc && $dplastchild == "No") {$dp_output .= ' dp_breadcrumb_a_last';}
    $dp_output .= '" rel="v:url" property="v:title" href="'. get_category_link($c->cat_ID) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $c->name . '" ';} else {}
    $dp_output .= '>' . $c->name . '</a>';
    
    $backc++;
    }
    if ($dplastchild == "Yes") { // last child of every breadcrumb (link to the post itself)
    $dp_output .= $dpsep;
    $e = $conto+1;
    $dp_output .= '<span rel="v:child"><span class="dp_breadcrumb_span_' . $e .' dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $e . ' dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_permalink($idpost) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . get_the_title($idpost) . '" ';} else {}
    $dp_output .= '>' . get_the_title($idpost) . '</a>';
    }
    
    // manage multiple closure tags
    $contof = $conto * 2;
    if ($dplastchild == "Yes") {$contof = $contof + 2;}
    $u = 0;
    while ($u < $contof) {
    $dp_output .= '</span>';
    $u++;}
    
    
    $dp_output .= '</span></div>'; //home chiusura
    }
    
    }
    
    
	return $dp_output;
	}
	
	////// Pages
	elseif (is_page() && $showpage == 'Yes' && !is_front_page()) {
    $paz[0] = get_the_id();
    $ance = get_post_ancestors( get_the_id() );
    $ance = array_reverse($ance);
    $tot = count($ance) + 1;
    $x = 1;
    
    $dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;
    $dp_output .= '<span class="dp_breadcrumb_span_home" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_home" rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a></span>';
    
    while ($x <= $tot) {
	
        
    if($tot == '1') { // if page with no parent
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_1 dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_1 dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_the_permalink( $paz[0]) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . get_the_title($paz[0]) . '" ';} else {}
    $dp_output .= '>' . get_the_title($paz[0]) . '</a></span>';
    }
    
    elseif($x != $tot) { // middle page among many
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . $x . '" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $x . ' " rel="v:url" property="v:title" href="'. get_the_permalink( $ance[$x-1]) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . get_the_title($ance[$x-1]) . '" ';} else {}
    $dp_output .= '>' . get_the_title($ance[$x-1]) . '</a></span>';
    }
    
    elseif($x == $tot) { // last page
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_'.$x.' dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_'.$x.' dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_the_permalink( $paz[0]) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . get_the_title($paz[0]) . '" ';} else {}
    $dp_output .= '>' . get_the_title($paz[0]) . '</a></span>';
    }
    
    $x++;
    
    }
        
    $dp_output .= '</div>';
	return $dp_output;
	}
	
	////// Category archives
	elseif (is_category() && $showarchive == 'Yes') {
    $cats = array();
    $ids = array();
    $cats[0] = get_category( get_query_var( 'cat' ) );
    $ids[0] = $cats[0]->category_parent;
    $tot = 1;
    // Need to understand how many levels are there. In the meantime we collect the data inside $cats array
    if($ids[0] != '0') {
    $cats[1] = get_category($ids[0]);
    $ids[1] = $cats[1]->category_parent;
    $tot++;

    if($ids[1] != '0') {
    $cats[2] = get_category($ids[1]);
    $ids[2] = $cats[2]->category_parent;
    $tot++;

    if($ids[2] != '0') {
    $cats[3] = get_category($ids[2]);
    $ids[3] = $cats[3]->category_parent;
    $tot++;    
    }
    }
    } 
    
    $x = $tot;
   
	$dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;
    $dp_output .= '<span class="dp_breadcrumb_span_home" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_home" rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a></span>';
    
    while ($x > 0) {
    $x--;
    if($tot == '1') { // if single category
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_1 dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_1 dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_category_link($ids[0]) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $cats[0]->name . '" ';} else {}
    $dp_output .= '>' . $cats[0]->name . '</a></span>';
    }
   
    elseif($x != '0') { // "middle" categories among many
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . ($tot-$x) . '" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . ($tot-$x) . '" rel="v:url" property="v:title" href="'. get_category_link($cats[$x]->cat_ID) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $cats[$x]->name . '" ';} else {}
    $dp_output .= '>' . $cats[$x]->name . '</a></span>';
    }
    elseif($x == '0') { //last of many categories
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_' . $tot .' dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_' . $tot . ' dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_category_link($cats[$x]->cat_ID) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $cats[$x]->name . '" ';} else {}
    $dp_output .= '>' . $cats[$x]->name . '</a></span>';
    }
    
    }
    
    $dp_output .= '</div>';
	return $dp_output;
	}
	
	////// Tag archives
	elseif (is_tag() && $showtag == 'Yes') {
    $tagz = get_query_var( 'tag' ) ;
    $tagx = get_term_by('slug', $tagz, 'post_tag');

	$dp_output .= '<div class="dp_breadcrumb_main" xmlns:v="http://rdf.data-vocabulary.org/#">'.$dptext;
    $dp_output .= '<span class="dp_breadcrumb_span_home" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_home" rel="v:url" property="v:title" href="'. get_home_url() . '"';
    $dp_output .= '>' . $dptexthome . '</a></span>';
    
    $dp_output .= $dpsep;
    $dp_output .= '<span class="dp_breadcrumb_span_1 dp_breadcrumb_span_last" typeof="v:Breadcrumb"><a class="dp_breadcrumb_a_1 dp_breadcrumb_a_last" rel="v:url" property="v:title" href="'. get_tag_link($tagx->term_id) . '"'; 
    if($dptitle == 'Yes') {$dp_output .= ' title="' . $tagx->name . '" ';} else {}
    $dp_output .= '>' . $tagx->name . '</a></span>';
    
    $dp_output .= '</div>';
	return $dp_output;
	}
}

// Add settings link on plugin page
function dp_breadcrumb_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=dp-rdfa-breadcrumb-generator.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
  
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'dp_breadcrumb_settings_link' );

//// Extra function to enable the shortcode
function dp_breadcrumb_extra() {
	echo dp_breadcrumb();
}

//// Create the shortcode
add_shortcode('dp_breadcrumb_generator', 'dp_breadcrumb_extra');
?>