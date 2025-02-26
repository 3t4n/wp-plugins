<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'text-uppercase font-weight-normal fz-22 font-color awe-flipbox-title' );

$this->add_inline_editing_attributes( 'content', 'none' );
$this->add_render_attribute( 'content', 'class', 'fz-14 font-color pt-3 awe-flipbox-content' );

$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
?>
    <?php if($settings['style'] === 'style1'):?>
                <div class="advanced_blocks_flip_box aae-flip-top type-2 mt-3 mb-3 bordered">
                    <a href="<?php echo esc_url($settings['link']['url'])?>" <?php echo esc_attr($target);?> <?php echo esc_attr($nofollow);?>>
						<div class="advanced_blocks_flip_box_front">
							<img src="<?php echo esc_url($settings['image']['url'])?>" class="img-fluid full-height" alt="">
						</div>
						<div class="advanced_blocks_flip_box_back">
							<p <?php echo $this->get_render_attribute_string( 'content' ); ?>>
                                <?php echo esc_html($settings['content']);?> 
							</p>
							
                        </div>
                    </a>
                </div>
                    
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
 
<?php endif;?>