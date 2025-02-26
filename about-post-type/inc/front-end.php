<?php function about_post_type_plugin () { ?>
			
	<div class="seos-about-post-type-boxes">

		<h2 class="title-about-post-type"><?php echo get_option( 'about_post_type_title' ); ?></h2>
		
			<?php $ts_number = get_option( 'about_post_type_number' );
			$args = array( 'post_type' => 'about_post_type', 'posts_per_page' =>  $ts_number );
			$loop = new WP_Query( $args );
			
			while ( $loop->have_posts() ) : $loop->the_post();
			if ( has_post_thumbnail()){ echo '<div class="seos-about-post-type">';
				echo '<a href="' . esc_url( get_permalink() ) . '">
				<h4>'; the_title(); echo '</h4>';
				
			if ( has_post_thumbnail() ) { the_post_thumbnail( 'custom-size' ); echo '</a>';} else { echo " "; } 
				echo '</div>' . the_excerpt(); } else {echo '<div class="seos-about-post-type"><a href="' . esc_url( get_permalink() ) . '">
				<h5>Set featured image</h5></a></div>';}
			endwhile; ?>
	</div>
	
<?php } 

// About US Shortcode //

function about_post_type_plugin_shortcode() {
	ob_start();
?>
	<div class="seos-about-post-type-boxes about-post-type-shortcode">

		<h2 class="title-about-post-type"><?php echo get_option( 'about_post_type_title' ); ?></h2>
		
			<?php $ts_number = get_option( 'about_post_type_number' );
			$args = array( 'post_type' => 'about_post_type', 'posts_per_page' =>  $ts_number );
			$loop = new WP_Query( $args );
			
			while ( $loop->have_posts() ) : $loop->the_post();
			if ( has_post_thumbnail()){ echo '<div class="seos-about-post-type">';
				echo '<a href="' . esc_url( get_permalink() ) . '">
				<h4>'; the_title(); echo '</h4>';
				
			if ( has_post_thumbnail() ) { the_post_thumbnail( 'custom-size' ); echo '</a>';} else { echo " "; } 
				echo '</div>' . the_excerpt(); } else {echo '<div class="seos-about-post-type"><a href="' . esc_url( get_permalink() ) . '">
				<h5>Set featured image</h5></a></div>';}
			endwhile; ?>
	</div>	

<?php
	return ob_get_clean();
}

add_shortcode( 'about-post-type', 'about_post_type_plugin_shortcode' );

?>