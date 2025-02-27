<?php
/**
 * Template part for displaying custom agent post content in single-agent.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

// Meta Data
$agent_mobile   = get_post_meta( get_the_ID(), 'cre_mobile_number', true );
$agent_skype    = get_post_meta( get_the_ID(), 'cre_skype', true );
$agent_address  = get_post_meta( get_the_ID(), 'cre_address', true );

$content_elements = get_theme_mod(
    cre_get_active_theme_prefix().'_agent_post_elements',
    ['contact-info','content','social','properties']
);

if ( $content_elements ) : ?>

<div class="agent-detail-section">

    <?php foreach ( $content_elements as $element ) : ?>
    <?php switch ( $element) :
                case 'contact-info' :
                    ?>
    <div class="contact-agent-info-wrap">
        <div class="contact-agent-info">
            <figure class="author-image" data-ratio="auto">
                <?php if ( ! has_post_thumbnail() ) : ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                    alt="<?php esc_attr_e( 'Placeholder Image', 'crucial-real-estate' ); ?>" />
                <?php else: ?>
                <?php the_post_thumbnail( 'full' ); ?>
                <?php endif; ?>
            </figure><!-- .author-image -->
            <div class="contact-agent-info-content">
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

                    <?php if ( $agent_address ) : ?>
                    <li>
                        <span
                            class="contact-agent-heading"><?php esc_html_e( 'Address:', 'crucial-real-estate' ); ?></span>
                        <span class="contact-agent-text">
                            <?php echo esc_html( $agent_address ); ?>
                        </span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="contact-agent-form">
            <?php cre_contact_form(); ?>
        </div>
    </div>
    <?php
                    break;

                case 'content' :
                    ?>
    <div class="entry-content">

        <?php the_title( '<h3 class="author-name">', '</h3>' ); ?>

        <?php the_content(); ?>

    </div>
    <?php
                    break;

                case 'social' :
                        $agent_fc = get_post_meta( get_the_ID(), 'cre_facebook_url', true );
                        $agent_tw = get_post_meta( get_the_ID(), 'cre_twitter_url', true );

                    if ( $agent_fc || $agent_tw ) :
                    ?>
    <div class="inline-social-icons social-links">

        <h3><?php esc_html_e( 'My Social Profiles', 'crucial-real-estate' ); ?></h3>
        <ul>
            <?php if ( $agent_fc ) : ?>
            <li>
                <a href="<?php echo esc_url( $agent_fc );?>"
                    title="<?php esc_attr_e( 'facebook', 'crucial-real-estate' ); ?>" target="_blank"></a>
            </li>
            <?php endif; ?>
            <?php if ( $agent_tw ) : ?>
            <li>
                <a href="<?php echo esc_url( $agent_tw );?>"
                    title="<?php esc_attr_e( 'twitter', 'crucial-real-estate' ); ?>" target="_blank"></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php
                    endif;
                    break;

                case 'properties' :
                    $number   	        = 3;
                    $paged              = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $offset		        = ( $paged > 0 ) ?  $number * ( $paged - 1 ) : 1;

                    $args   = [
                        'post_type'         => 'property',
                        'offset'       	    => absint($offset),
                        'posts_per_page'    => absint($number),
                        'meta_query'     => array(
                            array(
                                'key'     => 'cre_agents',
                                'value'   => absint(get_the_ID()),
                                'compare' => '=',
                            ),
                        ),
                    ];
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                        $max = $the_query->found_posts;
                        $totalpages = ceil( $max / $number );

                    ?>
    <div class="post-wrapper">
        <h3>
            <?php printf( esc_html__('My Properties ( %1$s )', 'crucial-real-estate'), esc_html( $max) ); ?>
        </h3>
        <div class="row columns" data-columns="1" data-columns-md="2" data-columns-lg="3">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php
                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    cre_get_template_part('property/content.php');
                                    ?>

            <?php endwhile; ?>
        </div>
        <?php
                            // Show custom page navigation
                            cre_page_navigation( $totalpages, $paged, 3, 0 );
                            ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php endif;
                    break;
            endswitch;
        endforeach; ?>
</div>

<?php endif;