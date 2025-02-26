<?php
// Exit if accessed directly 
if (!defined('ABSPATH'))
    exit;

?>

<?php while ($post_query->have_posts()):
    $post_query->the_post(); ?>
    <div class="blog_one-item swiper-slide">
        <?php if ('yes' === $settings['blog_comment_image'] && (has_post_thumbnail())): ?>
            <div class="blog_one-item-img">
                <div class="blog_one-item-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url('large'); ?>"
                            alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
                    </a>
                    <?php if ('yes' === $settings['blog_date_meta']): ?>
                        <div
                            class="blog_one-item-image-date <?php echo esc_attr($settings['vertical_icon_align']); ?> <?php echo esc_attr($settings['horizontal_icon_align']); ?> <?php echo esc_attr($settings['blog_date_view']); ?>">
                            <?php if ('yes' === $settings['show_calendar_icon']): ?>
                                <i class="far fa-calendar-alt"></i>
                            <?php endif; ?>
                            <h6><?php echo get_the_date('d') ?></h6>
                            <span><?php echo get_the_date('M') ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="blog_one-item-content">
            <div>
                <?php if ('yes' === $settings['blog_username_meta'] || 'yes' === $settings['blog_comment_meta']): ?>
                    <div class="blog_one-item-content-meta">
                        <ul>
                            <?php if ('yes' === $settings['blog_username_meta']): ?>
                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <i class="eicon-user-circle-o"></i>
                                        <?php the_author(); ?>
                                    </a></li>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['blog_comment_meta']): ?>
                                <li><a href="<?php the_permalink(); ?>"><i class="eicon-comments"></i>
                                        <?php
                                        if (function_exists('flexitype_lite_comments_count')) {
                                            flexitype_lite_comments_count();
                                        }
                                        ?>
                                    </a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php if (!empty($settings['blog_btn_text'])): ?>
                    <a class="flexitype-button <?php echo esc_attr($settings['icon_align']); ?>"
                        href="<?php the_permalink(); ?>">
                        <?php echo esc_html($settings['blog_btn_text']); ?>
                        <?php if (!empty($settings['btn_icon']['value'])): ?><i
                                class="<?php echo esc_attr($settings['btn_icon']['value']); ?>"></i><?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile;
wp_reset_query(); ?>