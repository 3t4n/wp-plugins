<?php

if ( ! function_exists( 'dwkb_entry_tags' ) ) :
	function dwkb_article_tags() {
		echo get_the_term_list( '', 'dwkb_tag', '<ul class="dwkb-post-tags"><li class="title"><?php _e("Tags"); ?></li><li>', ',</li><li>', '</li></ul>' );
	}
endif;

if ( ! function_exists( 'dwkb_article_meta' ) ) :
	function dwkb_article_meta() {
		printf( '<p class="dwkb-article-meta">%1$s <a href="%2$s">%3$s</a> %4$s %5$s',
			_x( 'Posted by', '', 'dwkb' ),
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			get_the_author(),
			_x( 'on', '', 'dwkb' ),
			get_the_date()
		);
	}
endif;

if ( ! function_exists( 'dwkb_article_footer' ) ) :
	function dwkb_article_footer() {
		?>
			<div class="dwkb-view"><?php echo dwkb_get_article_views( get_the_id() ); ?> <?php _e("views"); ?></div>
		<?php
	}
endif;
if ( ! function_exists( 'dwkb_article_related' ) ) :
	function dwkb_article_related() {
		global $post;
		$tax_args = array( 'orderby' => 'none' );
		$tags = wp_get_post_terms( $post->ID , 'dwkb_tag', $tax_args );
		if ( ! empty( $tags ) ) :
			$tag_ids = array();
			foreach( $tags as $individual_tag ) {
				$tag_ids[] = $individual_tag->term_id;
			}

			$args = array(
				'dwkb_tag__in' => $tag_ids,
				'post_type' => 'dwkb',
				'post__not_in' => array( $post->ID ),
				'posts_per_page' => 5, // Number of related posts to display.
				'ignore_sticky_posts'=>1
			);
			$related_query = new  WP_Query( $args );
			if ( $related_query->have_posts() ) :
		?>
		<div class="dwkb-related-articles">
			<div class="dwkb-subheader"><?php _e('Related Articles'); ?></div>
			<ul class="dwkb-list">
			<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
	<?php
			endif;
		endif;
	}

endif;

if ( ! function_exists( 'dwkb_breadcrumbs' ) ) :
function dwkb_breadcrumbs(){
	global $post;

	if ( '' != DWKB_INDEX ) {
		$index_name = get_the_title( DWKB_INDEX );
		$index_link = get_permalink( DWKB_INDEX );
	} else {
		$index_name = ucwords( strtolower( DWKB_SLUG ) );
		$index_link = home_url().'/'.DWKB_SLUG;
	}


	$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	echo '<div class="dwkb-breadcrumbs">';
	if( strpos( $url, DWKB_SLUG.'-category' ) || strpos( $url, DWKB_SLUG.'_category' ) ){
		$dwkb_bc_name = get_queried_object()->name;
		?>

		<span><a href="<?php echo home_url(); ?>"><?php _e( 'Home','dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><a href="<?php echo $index_link; ?>"><?php _e( $index_name ,'dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><?php echo $dwkb_bc_name; ?></span>
		<?php
	} else if( strpos( $url, DWKB_SLUG.'-tag' ) || strpos( $url, DWKB_SLUG.'_tag' ) ){
		$dwkb_bc_tag_name = get_queried_object()->name;
		?>
		<span><a href="<?php echo home_url(); ?>"><?php _e( 'Home','dwkb'); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><a href="<?php echo $index_link; ?>"><?php _e( $index_name ,'dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><?php echo $dwkb_bc_tag_name; ?></span>
		<?php
	} else if( strpos ($url, '?s' ) ) {
		$dwkb_search_word = $_GET['s'];
		?>
		<span><a href="<?php echo home_url(); ?>"><?php _e( 'Home','dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><a href="<?php echo $index_link; ?>"><?php _e( $index_name ,'dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><?php echo $dwkb_search_word; ?></span>
		<?php
	} else if( is_single() ){
		$dwkb_bc_term = get_the_terms( $post->ID , 'dwkb_category' );
		?>
		<span><a href="<?php echo home_url(); ?>"><?php _e( 'Home','dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><a href="<?php echo $index_link; ?>"><?php _e( $index_name ,'dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<?php
		if ( ! empty( $dwkb_bc_term ) ) {
			foreach ( $dwkb_bc_term as $dwkb_tax_term ) {
			?>
			<span>
				<a href="<?php echo get_term_link( $dwkb_tax_term->slug, 'dwkb_category') ?>">
					<?php echo $dwkb_tax_term->name ?>
				</a> <span class="dwkb-sep"> › </span>
			</span>
			<?php
			}
		}
		?>

		<span>
			<?php
			if ( strlen( the_title( '', '', FALSE) >= 50 ) ) {
				echo substr( the_title( '', '', FALSE), 0, 50 )."....";
			} else {
				the_title();
			}
			?>
		</span>
		<?php
	} else {
		?>
		<span><a href="<?php echo home_url(); ?>"><?php _e( 'Home','dwkb' ); ?></a> <span class="dwkb-sep"> › </span> </span>
		<span><?php _e( $index_name ,'dwkb' ); ?></span>
		<?php
	}
	echo '</div>';
}
endif;

if ( ! function_exists( 'dwkb_search_form' ) ) :
function dwkb_search_form() {
	?>
	<div class="dwkb-search-form">
	<form role="search" method="get" id="searchform" class="searchform dwkb-search" action="<?php echo site_url('/'); ?>">
			<input class="dwkb-search-input" data-nonce="<?php echo wp_create_nonce( '_dwkb_filter_nonce' ) ?>" type="text" placeholder="<?php _e('Search article...'); ?>" value="" name="s" id="s">
			<input type="hidden" name="post_type" value="dwkb" />
	</form>
</div>
	<?php
}
endif;
