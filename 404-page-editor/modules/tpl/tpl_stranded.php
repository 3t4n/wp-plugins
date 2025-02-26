<main id="site-content" role="main" style="padding: 0; margin: 0; background-color:#ccffcc; height: 100vh">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( '{{404-title}}', 'twentytwenty' ); ?></h1>

		<h2 class="intro-text"><?php _e( '{{404-text-description}}', 'twentytwenty' ); ?></h2>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'twentytwenty' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->