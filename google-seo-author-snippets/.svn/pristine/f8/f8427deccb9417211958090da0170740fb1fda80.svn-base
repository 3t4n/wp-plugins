<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_receipes($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the receipes values for schema
	$google_seo_receipes_name         = get_post_meta( $post->ID, $prefix.'receipes_name', true );
	$google_seo_receipes_photo        =  get_post_meta( $post->ID, $prefix.'receipes_photo', true );
	$google_seo_receipes_author       = get_post_meta( $post->ID, $prefix.'receipes_author', true );
	$user_firstname = get_the_author_meta('user_firstname'); // retrieve firstname
	$user_lastname = get_the_author_meta('user_lastname'); // retrieve lastname
	$authdate = get_the_date( 'D M j' );
	$author = get_option('gsas_checked1');
	$date = get_option('gsas_checked2');
	$displ = get_option('gsas_checked4');
	if ($displ == 'checked') {
		$disp = 'block' ;
	} else {
		$disp = 'none' ;
	}
	$google_seo_publish_author = $user_firstname . $user_lastname;
	$google_seo_publish_date = $authdate;
	$google_seo_receipes_published    = get_post_meta( $post->ID, $prefix.'receipes_published', true );
	$google_seo_receipes_ingredient   = get_post_meta( $post->ID, $prefix.'receipes_ingredient', true );
	$google_seo_receipes_calories     = get_post_meta( $post->ID, $prefix.'receipes_calories', true );
	$google_seo_receipes_fat          = get_post_meta( $post->ID, $prefix.'receipes_fat', true );
	$google_seo_receipes_instructions = get_post_meta( $post->ID, $prefix.'receipes_instructions', true );
	$google_seo_receipes_ingredient_amount = get_post_meta( $post->ID, $prefix.'receipes_ingredient_amount', true );
	$google_seo_receipes_summary=get_post_meta( $post->ID, $prefix.'receipes_summary', true );
	$google_seo_receipes_nutrition=get_post_meta( $post->ID, $prefix.'receipes_nutrition', true );
	$google_seo_receipes_totaltime=get_post_meta( $post->ID, $prefix.'receipes_totaltime', true );
	$smack_google_seo_schema_receipes       = '';
	$smack_google_seo_schema_receipes      .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="padding:2%;display:block;" itemscope itemtype="https://data-vocabulary.org/Recipe" >';
	$smack_google_seo_schema_receipes      .= '<span >';
	if(isset($google_seo_receipes_name))
		$smack_google_seo_schema_receipes      .= '<h1 itemprop="name">'.$google_seo_receipes_name.'</h1>';
	if(isset($google_seo_receipes_photo))
		$smack_google_seo_schema_receipes      .= '<img style="width:75px;height:75px;" itemprop="photo" src="'.$google_seo_receipes_photo.'" /><br>';
	if(isset($google_seo_receipes_author))
		$smack_google_seo_schema_receipes      .= 'By <span itemprop="author">'.$google_seo_receipes_author.'</span><br>';
	if(isset($google_seo_receipes_published))
		$smack_google_seo_schema_receipes      .= 'Published: <time datetime="'.$google_seo_receipes_published.'" itemprop="published">'.
		$google_seo_receipes_published .'</time><br>';
	if(isset($google_seo_receipes_summary))
		$smack_google_seo_schema_receipes .='Receipes summary:<span itemprop="summary">'.$google_seo_receipes_summary.'</span><br>';
	if(isset($google_seo_receipes_totaltime))
		$smack_google_seo_schema_receipes .='Receipes Totaltime:<span itemprop="totaltime">'.$google_seo_receipes_totaltime.'</span><br>';
		//$smack_google_seo_schema_receipes      .= '<span itemprop="nutrition" itemscope itemtype="https://data-vocabulary.org/Nutrition">';
	if(isset($google_seo_receipes_nutrition))
		$smack_google_seo_schema_receipes .='Nutrition:<span itemprop="nutrition">'.$google_seo_receipes_nutrition.'</span><br>';
//	if(isset($google_seo_receipes_calories))
		//$smack_google_seo_schema_receipes      .= 'Calories per serving: <span itemprop="calories">'.$google_seo_receipes_calories.'</span><br>';
	//if(isset($google_seo_receipes_fat))
	//	$smack_google_seo_schema_receipes      .= ' Fat per serving: <span itemprop="fat">'.$google_seo_receipes_fat.'</span></span><br>';
	if(isset($google_seo_receipes_ingredient) || isset($google_seo_receipes_ingredient_amount))
		$smack_google_seo_schema_receipes      .= ' Ingredients:
		<span itemprop="ingredient" itemscope itemtype="https://data-vocabulary.org/RecipeIngredient">';
	$smack_google_seo_schema_receipes      .= 'Thinly-sliced <span itemprop="name">'.$google_seo_receipes_ingredient.'</span><br>Price:
		<span itemprop="amount">'.$google_seo_receipes_ingredient_amount.'</span>
		</span><br>';
	$smack_google_seo_schema_receipes      .= '';
	if(isset($google_seo_receipes_instructions))
		$smack_google_seo_schema_receipes      .= 'Directions: <div itemprop="instructions">
		'.$google_seo_receipes_instructions.'
		...
		</div><br>';
	$smack_google_seo_schema_receipes      .= '</span>';
	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_receipes      .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
		$smack_google_seo_schema_receipes      .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($date == 'checked'){
		$smack_google_seo_schema_receipes      .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			</div>';
	}

	$smack_google_seo_schema_receipes      .='</div></div>';
	return $text.$smack_google_seo_schema_receipes;
}

function smack_google_seo_schema_add_receipes() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_receipes_name = get_post_meta( $post->ID, $prefix.'receipes_name', true );
	if( $google_seo_receipes_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_receipes" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_receipes' );
