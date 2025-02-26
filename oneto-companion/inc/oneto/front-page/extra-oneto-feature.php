<?php 
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;
if('Oneto' == $activate_theme){				
	$title = 'Discover More <span class="line-shape2 pb-1 end-auto position-relative font-weight-800">Features</span>';
    $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.';	
}
$oneto_theme_feature_content  = get_theme_mod( 'oneto_theme_feature_content');
$oneto_theme_feature_disabled = get_theme_mod('oneto_theme_feature_disabled', true);
$oneto_feature_area_title = get_theme_mod('oneto_feature_area_title', __(''.$title.'','oneto-companion'));
$oneto_feature_area_des = get_theme_mod('oneto_feature_area_des', __(''.$description.'','oneto-companion'));

if($oneto_theme_feature_disabled == true): ?>
<section id="theme-feature" class="theme-feature position-relative overflow-hidden bg-gray py-default">
	<div class="container">
		<?php if( ( $oneto_feature_area_title ) || ( $oneto_feature_area_des ) != '' ) : ?>
		<div class="row align-items-center wow fadeInUp">
            <div class="col-sm-8 mx-auto text-center mb-sm-5 mb-4">
            	<?php if($oneto_feature_area_title != null): ?>
					<h2 class="theme-section-title font-weight-400 mb-2"><?php echo wp_kses_post( $oneto_feature_area_title ); ?></h2>
				<?php endif; ?>
				<?php if($oneto_feature_area_des != null): ?>
					<p class="theme-section-des mt-3"><?php echo wp_kses_post( $oneto_feature_area_des ); ?></p>
				<?php endif; ?>
            </div>
        </div>
    	<?php endif; ?>
		<div class="row theme-row pt-4 align-items-center position-relative wow fadeInUp">
        	<div class="read-label position-absolute w-auto p-0 d-sm-inline-block d-none"><img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/read-more.svg" alt="readmore"></div>
        	<div class="col-12">
				<div class="row g-4 position-relative featured featured-one loadmore">
					<?php 
					if ( ! empty( $oneto_theme_feature_content ) ) {
					$allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$oneto_theme_feature_content = json_decode( $oneto_theme_feature_content );
					foreach ( $oneto_theme_feature_content as $feature_item ) {
					$icon = ! empty( $feature_item->icon_value ) ? $feature_item->icon_value : '';
					$title = ! empty( $feature_item->title ) ? $feature_item->title : '';
					$button_text = ! empty( $feature_item->button_text ) ? $feature_item->button_text : '';
					$text = ! empty( $feature_item->text ) ? $feature_item->text : '';
					$link = ! empty( $feature_item->link ) ? $feature_item->link : '';
					$image = ! empty( $feature_item->image_url ) ? $feature_item->image_url : '';
					$open_new_tab = $feature_item->open_new_tab;
					?>
					<div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <div class="feature-card">
                        	<?php if($feature_item->choice == 'customizer_repeater_image'){ ?>
								<?php if ( ! empty( $image ) ) : ?>
								<div class="mb-4 pb-1">
									<img class="img-fluid" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
	                            </div>								
								<?php endif; ?>
							<?php } else if($feature_item->choice =='customizer_repeater_icon'){ ?>
								<?php if ( ! empty( $icon ) ) :?>
								<div class="mb-4 pb-1">
									<i class="fa <?php echo esc_html( $icon ); ?> fa-3x"></i>
								</div>
								<?php endif; ?>
							<?php } ?>
                            <div class="feature-body">
                            	<?php if ( ! empty( $title ) ) : 
									if( empty( $link ) ) { ?>
										<h4 class="mb-3"><?php echo esc_html( $title ); ?></h4><?php
									} else {
										?>
										<h4 class="mb-3"><a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab =='yes'){?>target="_blank" <?php }?> ><?php echo esc_html( $title ); ?></a></h4><?php
									} ?>
								<?php endif; ?>
								<?php if ( ! empty( $text ) ) : ?>		
									<span class="d-block mb-3"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></span>
								<?php endif; ?>
                            </div>
                            <?php if(!empty($button_text)):?>
								<?php if(!empty($link)):?>
								<a class="btn-link" href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab =='yes'){echo "target='_blank'";} ?> ><?php echo esc_html($button_text); ?> <i class="fa fa-chevron-right ms-0 small"></i></a>
								<?php else: ?>
								<a class="btn-link" href="#"><?php echo esc_html($button_text); ?> <i class="fa fa-chevron-right ms-0 small"></i></a>
								<?php endif; ?>
							<?php endif; ?>
                        </div>
                        <!-- End Card -->
                    </div>
					<?php } } else { ?>
					<div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <div class="feature-card">
                            <div class="mb-4 pb-1">
                                <img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/feature01.png" alt="<?php esc_attr_e('Chat tools','oneto-companion'); ?>">
                            </div>
                            <div class="feature-body">
                                <h4 class="mb-3"><a href="#"><?php esc_html_e('Chat tools','oneto-companion'); ?></a></h4>
                                <span class="d-block mb-3"><?php esc_html_e('Get all the tools you need to provide excellent customer support','oneto-companion'); ?></span>
                            </div>
                            <a class="btn-link" href="#"><?php esc_html_e('Learn more','oneto-companion'); ?> <i class="fa fa-chevron-right ms-0 small"></i></a>
                        </div>
                        <!-- End Card -->
                    </div>
					<div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <div class="feature-card">
                            <div class="mb-4 pb-1">
                                <img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/feature02.png" alt="<?php esc_attr_e('LiveChat APIs','oneto-companion'); ?>">
                            </div>
                            <div class="feature-body">
                                <h4 class="mb-3"><a href="#"><?php esc_html_e('LiveChat APIs','oneto-companion'); ?></a></h4>
                                <span class="d-block mb-3"><?php esc_html_e('Use our APIs to automate your work and create custom integrations','oneto-companion'); ?></span>
                            </div>
                            <a class="btn-link" href="#"><?php esc_html_e('Learn more','oneto-companion'); ?> <i class="fa fa-chevron-right ms-0 small"></i></a>
                        </div>
                        <!-- End Card -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <div class="feature-card">
                            <div class="mb-4 pb-1">
                                <img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/feature03.png" alt="<?php esc_attr_e('Message channels','oneto-companion'); ?>">
                            </div>
                            <div class="feature-body">
                                <h4 class="mb-3"><a href="#"><?php esc_html_e('Message channels','oneto-companion'); ?></a></h4>
                                <span class="d-block mb-3"><?php esc_html_e('Reach your customers wherever they are and discover how we helps them.'); ?></span>
                            </div>
                            <a class="btn-link" href="#"><?php esc_html_e('Learn more','oneto-companion'); ?> <i class="fa fa-chevron-right ms-0 small"></i></a>
                        </div>
                        <!-- End Card -->
                    </div>
					<?php } ?>
				</div>
			</div>
		</div>
</section>
<?php endif; ?>