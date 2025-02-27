<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

// Meta Data
$city_terms   = wp_get_post_terms( get_the_ID(), 'property-location', array( 'orderby' => 'term_order' ) );
$status_terms = wp_get_post_terms( get_the_ID(), 'property-status', array( 'orderby' => 'term_order' ) );
$type_terms   = wp_get_post_terms( get_the_ID(), 'property-type', array( 'orderby' => 'term_order' ) );
$sort_section = get_theme_mod(
	cre_get_active_theme_prefix().'_property_post_elements',
	array( 'address', 'main', 'other', 'gallery', 'features', 'floor', 'video', 'author' )
);
/* Property Price */
$property_price = null;
$property_price = cre_get_property_price( get_the_ID(), true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

    <div class="featured-image-wrapper">
        <?php cre_singular_post_thumbnail(); // post thumbnail ?>
        <?php cre_display_property_label(); ?>
    </div>

    <header class="entry-header">
        <?php if ( $status_terms || $type_terms ) : ?>
        <div class="entry-meta">
            <div class="post-cat-list">
                <span class="cat-links">
                    <?php if ( $type_terms ) : ?>
                    <?php foreach ( $type_terms as $type_term ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $type_term->slug, 'property-type' ) ); ?>"
                        class="property-type-<?php echo esc_attr( $type_term->term_id ); ?>"><?php echo esc_html( $type_term->name ); ?></a>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ( $status_terms ) : ?>
                    <?php foreach ( $status_terms as $status_term ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $status_term->slug, 'property-status' ) ); ?>"
                        class="property-status-<?php echo esc_attr( $status_term->term_id ); ?>"><?php echo esc_html( $status_term->name ); ?></a>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </span>
            </div>
            <div class="share-section">
                <a href="javascript:void(0);" target="_self">
                    <i class="fa fa-share-alt"></i>
                </a>
                <div class="block-social-icons social-links">
                    <?php cre_social_share(); ?>
                </div>
            </div>
        </div><!-- .entry-meta -->
        <?php endif; ?>

        <!-- .entry-price -->
        <?php if ( $property_price ) : ?>
        <div class="entry-price">
            <?php
						echo wp_kses( $property_price, array(
							'span' => array( 'class' => array() ),
							'ins'  => array( 'class' => array() ),
							'del'  => array( 'class' => array() ),
						) );
					?>
        </div>
        <?php endif; ?>

        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

        <?php if ( $property_location = get_post_meta( get_the_ID(), 'cre_property_map_address', true ) ) : ?>
        <div class="property-location">
            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
            <?php echo esc_html( $property_location ); ?>
        </div><!-- .property-location -->
        <?php endif; ?>

        <?php
			if ( has_post_thumbnail() ) {
				cre_posted_on(); }
			?>

    </header><!-- .entry-header -->

    <?php
		$the_content = apply_filters( 'the_content', get_the_content() );
		if ( ! empty( $the_content ) ) :
			?>
    <div class="entry-content">

        <h4><?php esc_html_e( 'Description', 'crucial-real-estate' ); ?></h4>

        <?php
				the_content(
					sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'crucial-real-estate' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'crucial-real-estate' ),
						'after'  => '</div>',
					)
				);

				?>

    </div><!-- .entry-content -->
    <?php endif; ?>

    <?php
		if ( $sort_section ) {

			foreach ( $sort_section as $section ) {

				switch ( $section ) {

					case 'address':
						cre_get_template_part( 'property/sections/address.php' );
						break;

					case 'main':
						cre_get_template_part( 'property/sections/main-detail.php' );
						break;

					case 'other':
						cre_get_template_part( 'property/sections/other-detail.php' );
						break;

					case 'gallery':
						cre_get_template_part( 'property/sections/gallery.php' );
						break;

					case 'features':
						cre_get_template_part( 'property/sections/features.php' );
						break;

					case 'floor':
						cre_get_template_part( 'property/sections/floor-plan.php' );
						break;

					case 'video':
						cre_get_template_part( 'property/sections/video.php' );
						break;

					case 'author':
						cre_get_template_part( 'property/sections/agent.php' );
						break;
				}
			}
		}
		?>
</article><!-- #post-<?php the_ID(); ?> -->

<!---  Related Posts Section --->
<?php cre_get_template_part( 'property/sections/related.php' ); ?>