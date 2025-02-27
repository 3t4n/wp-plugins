<?php
/**
 * Template part for displaying custom post property archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

// Meta Data
$image_size = get_theme_mod(
	cre_get_active_theme_prefix().'_property_archive_posts_image_size',
	array( 'desktop' => 'large' )
);
$size       = esc_html( $image_size['desktop'] );
?>

<div class="column">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

        <div class="featured-image-wrapper">
            <?php cre_post_thumbnail( $size ); ?>
            <?php cre_display_property_label(); ?>
        </div><!-- .featured-image-wrapper -->

        <div class="post-detail-wrap">

            <?php
			$status_terms = wp_get_post_terms( get_the_ID(), 'property-status', array( 'orderby' => 'term_order' ) );
			$type_terms   = wp_get_post_terms( get_the_ID(), 'property-type', array( 'orderby' => 'term_order' ) );
			if ( $status_terms || $type_terms ) :
				?>
            <div class="post-tags-wrap">

                <?php if ( $type_terms ) : ?>
                <?php foreach ( $type_terms as $type_term ) : ?>
                <a href="<?php echo esc_url( get_term_link( $type_term->slug, 'property-type' ) ); ?>"
                    class="post-tags property-type-<?php echo esc_attr( $type_term->term_id ); ?>"><?php echo esc_html( $type_term->name ); ?></a>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if ( $status_terms ) : ?>
                <?php foreach ( $status_terms as $status_term ) : ?>
                <a href="<?php echo esc_url( get_term_link( $status_term->slug, 'property-status' ) ); ?>"
                    class="post-tags property-status-<?php echo esc_attr( $status_term->term_id ); ?>"><?php echo esc_html( $status_term->name ); ?></a>
                <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- .post-tags-wrap -->
            <?php endif; ?>

            <header class="entry-header">
                <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php cre_post_excerpt(); ?>
            </div><!-- .entry-content -->

            <div class="property-meta entry-meta">
                <?php
				$options = map_deep( wp_unslash( get_option( 'cre_property_basic_builder' ) ), 'sanitize_text_field' );
				$options = ( $options ) ? $options : cre_property_basic_default_fields();
				unset( $options[ count( $options ) - 1 ] );
				foreach ( $options as $key => $value ) {
					$field_id     = 'cre_property_basic_builder_' . intval( $key );
					$basic_fields = get_post_meta( get_the_ID(), $field_id );
					if ( $basic_fields && ! empty( $basic_fields ) ) {
						?>
                <div class="meta-wrapper">
                    <span class="meta-icon">
                        <?php if ( isset( $value['image'] ) && $value['image'] != '' ) { 
									$image_src = absint( $value['image'] ) ? wp_get_attachment_url( $value['image'] ) : $value['image'];
									?>
                        <img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>"
                            width="20" height="20">
                        <?php } else { ?>
                        <i class="fas <?php echo esc_attr( $value['icon'] ); ?>"></i>
                        <?php } ?>
                    </span>
                    <?php if ( isset( $basic_fields[0]) ) : ?>
                    <span class="meta-value"><?php echo esc_html( $basic_fields[0] ); ?></span>
                    <?php endif; ?>
                    <?php if ( isset( $basic_fields[1]) ) : ?>
                    <span class="meta-unit"><?php echo esc_html( $basic_fields[1] ); ?></span>
                    <?php endif; ?>
                </div>

                <?php
					}
				}
				?>

            </div><!-- .entry-meta -->

            <div class="property-meta-info">
                <div class="properties-price">
                    <?php cre_property_price(); ?>
                </div>
                <div class="share-section">
                    <a href="javascript:void(0);" target="_self">
                        <i class="fa fa-share-alt"></i>
                    </a>
                    <div class="block-social-icons social-links">
                        <?php cre_social_share(); ?>
                    </div>
                </div>
            </div><!-- .property-meta-info -->

        </div><!-- .post-detail-wrap -->

    </article><!-- #post-<?php the_ID(); ?> -->
</div>