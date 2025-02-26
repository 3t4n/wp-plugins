<?php get_header(); ?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main">
		
		<?php
		
		if (have_posts()) {
			
			while(have_posts()) {
				
				the_post();
				
				global $echelon_template;
				
				echo siteorigin_panels_render( absint($echelon_template) );
			}
			
		}
		
		?>
		
	</main>
	
</div>

<?php
get_footer();
