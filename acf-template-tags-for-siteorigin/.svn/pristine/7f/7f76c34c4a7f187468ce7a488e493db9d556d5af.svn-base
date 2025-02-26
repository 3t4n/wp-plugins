<?php get_header(); ?>

<div id="primary" class="content-area">
	
	<div id="main" class="site-main">
		
		<?php
		
		if (have_posts()) {
			
			while(have_posts()) {
				
				global $echelon_template;
				
				echo siteorigin_panels_render( absint($echelon_template) );
			}
			
		}
		
		?>
		
	</div>
	
</div>

<?php
get_footer();
