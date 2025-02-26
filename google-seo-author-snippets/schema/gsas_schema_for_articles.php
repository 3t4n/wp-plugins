<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function smack_google_seo_schema_article($text) {
		global $post;
		$prefix = 'google_snippets';
		// Get the product values for schema
		$google_seo_article_headline = get_post_meta( $post->ID, $prefix.'article_headline', true );
		$google_seo_article_name = get_post_meta( $post->ID, $prefix.'article_name', true );
		$google_seo_article_description = get_post_meta( $post->ID, $prefix.'article_description', true );
		$google_seo_article_imageurl = get_post_meta( $post->ID, $prefix.'article_imageurl', true );
		$google_seo_article_contenturl = get_post_meta( $post->ID, $prefix.'article_contenturl', true );
		$google_seo_article_orgname = get_post_meta( $post->ID, $prefix.'article_orgname', true );
		$google_seo_article_logourl = get_post_meta( $post->ID, $prefix.'article_logourl', true );
		$google_seo_article_datepublished = get_post_meta( $post->ID, $prefix.'article_datepublished', true );
		$google_seo_article_datemodified = get_post_meta( $post->ID, $prefix.'article_datemodified', true );
		$user_firstname = get_the_author_meta('user_firstname'); // retrieve firstname
		$user_lastname = get_the_author_meta('user_lastname'); // retrieve lastname
		$authdate = get_the_date( 'D M j' );
		$google_seo_article_author = $user_firstname . $user_lastname;
		$google_seo_article_date = $authdate;
		$author = get_option('gsas_checked1');
		$date = get_option('gsas_checked2');
		$displ = get_option('gsas_checked4');

		if ($displ == 'checked') {
			$disp = 'block' ;
		} else {
			$disp = 'none' ;
		}
		$smack_google_seo_schema_article = '';
		$smack_google_seo_schema_article .= ' <div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 63%;height:60%;border-radius: 5px;"><div style="display: block; " itemscope itemtype="https://schema.org/NewsArticle">
			<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/><div  itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<img style="height: 30% !important;
			max-width: 30%; !important" src="'.esc_url($google_seo_article_imageurl).'" />
			
			<meta itemprop="width" content="800">
			<meta itemprop="height" content="800">
			</div>
			<img style="float:right;width:20%;" itemprop="logo" src="'.$google_seo_article_logourl.'" />
			<h2 itemprop="headline">'.$google_seo_article_headline.'</h2>

			<p itemprop="author" itemscope itemtype="https://schema.org/Person">
			By <span itemprop="name">'.$google_seo_article_name.'</span>
			</p>
			<span itemprop="description">'.$google_seo_article_description.'</span><br>
			<a href="'.$google_seo_article_contenturl.'" itemprop="url">Contenturl</a><br>
			<span itemprop="organisationname">'.$google_seo_article_orgname.'</span>
		

			<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<meta itemprop="name" content="Google">
			</div>
			Published:<span itemprop="datepublished">'.$google_seo_article_datepublished.'</span><br>
			Modified:<span itemprop="dateModified">'.$google_seo_article_datemodified.'</span><br>
			<meta itemprop="datePublished" content="'.$google_seo_article_datepublished.'"/>
			<meta itemprop="dateModified" content="'.$google_seo_article_datemodified.'"/>';


		if($author == 'checked' && $date == 'checked') {
			$smack_google_seo_schema_article .= '<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
				Published on <span itemprop="published Date">'.$google_seo_article_date.'</span>
				by <span itemprop="auhtor Name">'.$google_seo_article_author.'</span></div>';
		} elseif($author == 'checked' ) {
			$smack_google_seo_schema_article .= '<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
				Published 
				by <span itemprop="auhtor Name">'.$google_seo_article_author.'</span></div>';
		}elseif($date == 'checked' ) {
			$smack_google_seo_schema_article .= '<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
				Published on <span itemprop="published Date">'.$google_seo_article_date.'</span></div>';
		}

		$smack_google_seo_schema_article .= '</div></div>';
		return $text.$smack_google_seo_schema_article;
	}

	function smack_google_seo_schema_add_article() {
		global $post;
		$prefix = 'google_snippets';
		$google_seo_article_name = get_post_meta( $post->ID, $prefix.'article_name', true );
		if( $google_seo_article_name != '' && !is_home() ) {
			add_filter( "the_content", "smack_google_seo_schema_article" );
		}
	}
add_action('wp', 'smack_google_seo_schema_add_article');
