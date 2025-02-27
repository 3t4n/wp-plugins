<?php
/**
 * Template part for displaying property post of agent detail box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$agent_display_option   = get_post_meta( get_the_ID(), 'cre_agent_display_option', true );
$heading                = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_author', esc_html__( 'Contact Agent', 'crucial-real-estate' ) );

if ( $agent_display_option && $agent_display_option == 'my_profile_info' ) :

    // Get author data
    $author             = get_the_author();
    $author_description = get_the_author_meta( 'description' );
    $author_website     = get_the_author_meta( 'url' );
    $author_url         = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
    $author_avatar      = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'cre_avatar_size', 200 ) );
    $heading            = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_author', esc_html__( 'Contact Agent', 'crucial-real-estate' ) );
    
    ?>
<div class="contact-agent-section single-property-section">

    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>

    <div class="contact-agent-info-wrap">
        <div class="contact-agent-info">

            <figure class="author-image" data-ratio="auto">
                <?php echo wp_kses_post( $author_avatar ); ?>
            </figure>

            <div class="contact-agent-info-content">
                <h3 class="author-name"><?php echo esc_html( $author ); ?></h3>

                <?php if ( $author_description ) : ?>
                <p><?php echo wp_kses_post(wp_trim_words( $author_description, 20, '...' )); ?></p>
                <?php endif; ?>

                <?php if ( $author_website ) : ?>
                <ul>
                    <li>
                        <span
                            class="contact-agent-heading"><?php esc_html_e( 'Website:', 'crucial-real-estate' ); ?></span>
                        <span class="contact-agent-text">
                            <a href="<?php echo esc_url( $author_website ); ?>"
                                target="_blank"><?php echo esc_url( $author_website ); ?></a>
                        </span>
                    </li>
                </ul>
                <?php endif; ?>

                <p><a class="box-button"
                        href="<?php echo esc_url( $author_url ); ?>"><?php esc_html_e( 'View full Profile', 'crucial-real-estate' ); ?></a>
                </p>
            </div>
        </div>

        <div class="contact-agent-form">
            <?php cre_contact_form(); ?>
        </div>

    </div>
</div>
<?php elseif ( $agent_display_option && $agent_display_option == 'agent_info' ) :
    $agent_id = get_post_meta( get_the_ID(), 'cre_agents', true );
    if ( $agent_id && $agent_id !== '-1') :
        // Arguments
        $args = [
            'post_type'             => 'agent',
            'p'                     => absint( $agent_id ),
            'no_found_rows'         => true,
            'ignore_sticky_posts'   => true
        ];
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
            ?>
<div class="contact-agent-section single-property-section">
    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>
    <div class="contact-agent-info-wrap">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();

                        $agent_mobile   = get_post_meta( get_the_ID(), 'cre_mobile_number', true );
                        $agent_skype    = get_post_meta( get_the_ID(), 'cre_skype', true );
                        ?>
        <div class="contact-agent-info">

            <figure class="author-image" data-ratio="auto">
                <?php if ( ! has_post_thumbnail() ) : ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                    alt="<?php esc_attr_e( 'Placeholder Image', 'crucial-real-estate' ); ?>" />
                <?php else: ?>
                <?php the_post_thumbnail( 'medium' ); ?>
                <?php endif; ?>
            </figure><!-- .author-image -->

            <div class="contact-agent-info-content">

                <?php the_title( '<h3 class="author-name">', '</h3>' ); ?>

                <p><?php echo wp_kses_post(wp_trim_words( get_the_excerpt( get_the_ID() ), 20, '...' )); ?></p>

                <ul>

                    <?php if ( $agent_mobile ) : ?>
                    <li>
                        <span
                            class="contact-agent-heading"><?php esc_html_e( 'mobile:', 'crucial-real-estate' ); ?></span>
                        <span class="contact-agent-text">
                            <a
                                href="tel:<?php echo esc_attr( $agent_mobile ); ?>"><?php echo esc_html( $agent_mobile ); ?></a>
                        </span>
                    </li>
                    <?php endif; ?>

                    <?php if ( $agent_skype ) : ?>
                    <li>
                        <span
                            class="contact-agent-heading"><?php esc_html_e( 'skype:', 'crucial-real-estate' ); ?></span>
                        <span class="contact-agent-text">
                            <a href="<?php echo esc_url( $agent_skype ); ?>"><?php echo esc_html( $agent_skype ); ?></a>
                        </span>
                    </li>
                    <?php endif; ?>
                </ul>

                <p><a class="box-button"
                        href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'View full Profile', 'crucial-real-estate' ); ?></a>
                </p>
            </div>
        </div>

        <div class="contact-agent-form">
            <?php cre_contact_form(); ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php endif; ?>

<?php endif;