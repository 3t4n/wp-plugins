<?php
/**
 * Output of games archive titles.
 *
 * @package cyberpress/templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( have_posts() ) : ?>
    <header class="page-header">
        <?php
        echo '<h1 class="page-title">' . post_type_archive_title( '', false ) . '</h1>';
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
    </header>
<?php endif; ?>
