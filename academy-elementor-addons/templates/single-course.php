<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div id="courses-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="academyea-course-template-builder">
		<?php
			do_action( 'academyea_single_course_content', $post );
		?>
	</div>
</div>
