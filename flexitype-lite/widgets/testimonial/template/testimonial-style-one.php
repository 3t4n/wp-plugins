
<?php      
// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 

?>


<?php if ('design-1' === $settings['select_design']): ?>
        <div class="flexitype_testimonial <?php echo esc_attr($grid_columns); ?>">
            <?php foreach ($settings['testimonial_items'] as $slide) : ?>
				<div class="flexitype_testimonial_two-item">
                    <div class="flexitype_testimonial_two-item-content">
                        <?php if (!empty($settings['testimonial_rating_icon']['value'])):?>
							<div class="rating">
                                <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_rating_icon'], ['aria-hidden' => 'true']); ?>
						    </div>
                        <?php endif;?>
                        <p><?php echo esc_html($slide['test_description']); ?></p>
						<div class="flexitype_testimonial_two-item-content-bottom">
							<div class="flexitype_testimonial_two-item-content-bottom-author">
                                <?php if (!empty($slide['avatar_image']['url'])): ?>
                                    <img src="<?php echo esc_url($slide['avatar_image']['url']) ?>" alt="avatar">
                                <?php endif; ?>
								<div class="flexitype_testimonial_two-item-content-bottom-author-info">
                                    <h6><?php echo esc_html($slide['test_title']); ?></h6>
                                    <span><?php echo esc_html($slide['test_subtitle']); ?></span>
								</div>
							</div>
                            <?php if (!empty($settings['testimonial_quote_icon']['value'])):?>
                                <?php \Elementor\Icons_Manager::render_icon($settings['testimonial_quote_icon'], ['aria-hidden' => 'true']); ?>
                            <?php endif;?>
						</div>
					</div>							
				</div>
            <?php endforeach; ?>
        </div>
<?php endif; ?>