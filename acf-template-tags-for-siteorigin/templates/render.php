<?php

get_header();

?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main">
		
		<?php
		
		global $echelon_template;
		
		echo siteorigin_panels_render( absint($echelon_template) );
		
		?>
		
	</main>
	
</div>

<?php
get_footer();
