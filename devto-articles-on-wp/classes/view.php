<?php
namespace DevToWP;

defined( 'ABSPATH' ) || die();
/**
 * Data visualization
 *
 * @package DevToWP
 */

class View {

    public static function markup($data, $atts) {
        ?>
        <div class="devto-posts devto-<?php echo esc_attr( $atts['layout'] ); ?>">
            <?php foreach ( $data as $item ) : ?>
                <div class="devto-item">

                    <div class="devto-badge">
                        <img src="<?php echo esc_url( 'https://d2fltix0v2e0sb.cloudfront.net/dev-badge.svg' ); ?>" alt="<?php echo esc_attr__( 'DevCommunity', 'devtowp' ); ?>">
                    </div>

                    <div class="devto-post">
                        <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank">
                            <?php echo esc_html( $item['title'] ); ?>
                        </a>
                        <div class="devto-post-meta">
                            <div class="devto-date"><?php echo esc_html( $item['readable_publish_date'] ); ?></div>
                            <div class="devto-tag"><?php echo esc_html( $item['tags'] ); ?></div>
                        </div>
                    </div>

                    <div class="devto-author">
                        <a href="<?php echo esc_url( 'https://dev.to/'.$item['user']['username'] ); ?>" class="devto-author-img" target="_blank">
                            <img src="<?php echo esc_url( $item['user']['profile_image_90'] ); ?>" alt="<?php echo esc_attr( $item['user']['name'] ); ?>">
                        </a>
                        <div class="devto-user-meta">
                            <a href="<?php echo esc_url( 'https://dev.to/'.$item['user']['username'] ); ?>" class="devto-name" target="_blank">
                                <?php echo esc_html( $item['user']['name'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( 'https://dev.to/'.$item['user']['username'] ); ?>" class="devto-username" target="_blank">
                                <?php echo esc_html( $item['user']['username'] ); ?>
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

}