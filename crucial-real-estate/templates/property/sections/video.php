<?php
/**
 * Template part for displaying property post of video section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$video_group = get_post_meta( get_the_ID(), 'cre_video_group', true );

if ( $video_group && !empty($video_group[0]['cre_video_group_url']) ) : 
    $heading = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_video', esc_html__( 'Video', 'crucial-real-estate' ) );
    ?>
<div class="video-section entry-content">
    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>

    <?php foreach ( $video_group as $video ) : ?>
    <div class="video-container">
        <?php if ( isset( $video['cre_video_group_title'] ) ) : ?>
        <span class="video-heading"><?php echo esc_html( $video['cre_video_group_title'] ); ?></span>
        <?php endif; ?>
        <?php if ( isset( $video['cre_video_group_url'] ) ) :
                    CRE_Video::get_video( $video['cre_video_group_url'] );
                endif; ?>
    </div>
    <?php endforeach; ?>
</div><!-- .video-section -->
<?php endif;