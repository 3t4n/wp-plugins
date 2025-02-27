<?php
/**
 * Output of the single game post.
 *
 * @package cyberpress/templates
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

$game = cyberpress()->get_the_game();

?>

<?php do_action( 'cyberpress_before_single_game' ); ?>

<article id="post-<?php echo esc_attr( $game->get_id() ); ?>" <?php $game->game_classes(); ?>>

    <?php do_action( 'cyberpress_single_game_thumbnail' ); ?>

    <?php do_action( 'cyberpress_single_game_title' ); ?>

    <?php do_action( 'cyberpress_single_game_content' ); ?>

    <?php edit_post_link( esc_html__( 'Edit', 'cyberpress' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
</article><!-- #post-## -->

<?php do_action( 'cyberpress_after_single_game' ); ?>
