<?php      
// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 

?>


<?php if ('design-2' === $settings['select_design']): ?>
        <div class="flexitype_testimonial <?php echo esc_attr($grid_columns); ?>">
            <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                <div class="flexitype_testimonial_one-item">
                    <div class="flexitype_testimonial_one-item-client">
                        <?php if (!empty($settings['testimonial_quote_icon']['value'])):?>
                            <div class="flexitype_testimonial_one-item-icon">				
                                <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_quote_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                        <?php endif;?>
                        <?php if (!empty($slide['avatar_image']['url'])): ?>
                            <div class="flexitype_testimonial_one-item-client-image">
                                <img src="<?php echo esc_url($slide['avatar_image']['url']) ?>" alt="avatar">
                            </div>
                        <?php endif; ?>
                        <div class="flexitype_testimonial_one-item-client-title">
                            <h6><?php echo esc_html($slide['test_title']); ?></h6>
                            <span><?php echo esc_html($slide['test_subtitle']); ?></span>
                        </div>
                    </div>
                    <p><?php echo esc_html($slide['test_description']); ?></p>
                    <?php if (!empty($settings['testimonial_rating_icon']['value'])):?>
                        <div class="flexitype_testimonial_one-item-reviews">
                            <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif;?>
                </div>
            <?php endforeach; ?>
        </div>
<?php endif; ?>