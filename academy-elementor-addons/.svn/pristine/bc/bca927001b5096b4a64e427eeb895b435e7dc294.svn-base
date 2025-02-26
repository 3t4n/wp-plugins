<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	get_header( 'course' );

?>

<?php
	/**
	 * @hook - academy/templates/before_main_content
	 */
	do_action( 'academy/templates/before_main_content', 'archive-course.php' );
?>

<div class="academyea-archive-course-template-builder">
	<?php
		do_action( 'academyea_course_archive_content', $post );
	?>
</div>

<?php
	/**
	 * @hook - academy/templates/after_main_content
	 */
	do_action( 'academy/templates/after_main_content', 'archive-course.php' );
?>

<?php
get_footer( 'course' );
