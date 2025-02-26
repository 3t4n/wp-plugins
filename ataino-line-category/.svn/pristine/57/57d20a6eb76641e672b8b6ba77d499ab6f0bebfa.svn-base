<?php
/*
Plugin Name: Ataino Line Category
Plugin URI: https://twitter.com/kyanetamaru
Description: line category layout for your theme.
Version: 1.1
Author: kanetamaru@ishii
Author URI: https://twitter.com/kyanetamaru
License: GPLv2
*/

class ataino_line_category {

	private $count_main = true;		/* hide count is [ false ] */
	private $count_sub = true;		/* hide count is [ false ] */
	private $count_bread = true;	/* hide count is [ false ] */
	private $arrow = '&nbsp;&gt;&nbsp;'; 	/* arrow mark */
	private $str =	'&nbsp;(';				/* angle bracket start */
	private $end =	')';					/* angle bracket end */
	private $valiable;

	function __construct( $args ) {
		$this->valiable = $args;
			if ( $this->valiable == 'main' ) {
				$this->main_category();
			} else if ( $this->valiable == 'sub' ) {
				$this->sub_category();
			}
	}
	/**
	 * main category
	 */
	private function main_category() {
		$args = array(
		  'orderby' => 'name',
		  'parent' => 0,
		  'pad_counts' => 1
		  );

		echo '<div class="line_category_main">';
		$categories = get_categories( $args );
			foreach ( $categories as $category ) {
				if ( $this->count_main ) $this->count_main = $this->str . $category->count . $this->end;
				echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . $this->count_main . '</a>';
			}
		echo '</div>';
	}
	/**
	 * sub category
	 */
	private function sub_category() {
		$args = array(
				  'parent' => get_query_var('cat'),
				  'pad_counts' => 1
				  );
		$categories = get_categories( $args );
		$is_category = get_queried_object();

		if (is_object($is_category)) {
			$is_flg = $is_category->taxonomy;
				/**
				 * breadcrumbs
				 */
				if ($is_flg === 'category') {
					echo '<div class="line_category_subbox">';
					echo '<span class="line_category_breadcrumbs">';
						$cat_array = get_category_parents($is_category->term_id, false, "/", true);
						$cat_array = explode( "/", $cat_array);
						  	foreach ( $cat_array as $key => $value ) {
						  		if( $value ){
									$cat_by_slug = get_category_by_slug( $value );
						  				if( $this->count_bread ) $this->count_bread = $this->str . $cat_by_slug->count . $this->end;
										if( $cat_by_slug->cat_ID === $is_category->term_id ) {
											echo $cat_by_slug->name . $this->count_bread;
										} else {
											echo '<a href="' .  get_category_link($cat_by_slug->cat_ID) . '">' . $cat_by_slug->name . $this->count_bread . $this->arrow . '</a>';
										}
								}
							}
					echo '</span>';
				}
				/**
				 * category
				 */
				if ($categories && $is_flg === 'category') {
					echo '<span class="line_category_sub">';
						foreach ($categories as $category) {
							if ( $this->count_sub ) $this->count_sub = $this->str . $category->count . $this->end;
					    	echo '<a href="' .  get_category_link($category->term_id) . '">' . $category->name . $this->count_sub . '</a>';
					    }
					echo '</span>';
				}
					echo '</div>';
		}
	}

}

/**
 * line category css
 */
function category_css() {
	$cssPath = plugin_dir_url( __FILE__ ) . 'ataino-line-category.css';
	wp_enqueue_style( 'line_category_css', $cssPath, array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'category_css' );

?>