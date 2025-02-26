<?php
$oneto_testimonial_options = get_theme_mod('oneto_testimonial_content');
$oneto_testimonial_disabled = get_theme_mod('oneto_testimonial_disabled', true);
$oneto_testimonial_area_subtitle = get_theme_mod('oneto_testimonial_area_subtitle', __('JOIN US','oneto-companion'));
$oneto_testimonial_area_title = get_theme_mod('oneto_testimonial_area_title', __('Are You Ready To Get Started With Influence Agents?','oneto-companion'));
$oneto_testimonial_button_text = get_theme_mod('oneto_testimonial_button_text', __('Book Cunsultation','oneto-companion'));
$oneto_testimonial_button_link = get_theme_mod('oneto_testimonial_button_link', '#');
$oneto_testimonial_open_new_tab_disabled = get_theme_mod('oneto_testimonial_open_new_tab_disabled', true);

if($oneto_testimonial_disabled == true): 
?>
<section id="theme-testimonial" class="theme-testimonial theme-testimonial-one position-relative overflow-hidden bg-secondary z-index-0">	
	<div class="row align-items-center">
		<div class="col-lg-6 col-12 h-100 theme-row">
			<div class="testimonial-carousel owl-carousel owl-theme">
				<?php
				$oneto_testimonial_options = json_decode($oneto_testimonial_options);
				if( $oneto_testimonial_options!='' ) {
					$allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						'h1'      => array(),
						'h2'      => array(),
						'h3'      => array(),
						'h4'      => array(),
						'h5'      => array(),
						'h6'      => array(),
						'p'      => array(),
					);
					foreach($oneto_testimonial_options as $testimonial_iteam) {					
						$title = ! empty( $testimonial_iteam->title ) ? $testimonial_iteam->title : '';
						$text = ! empty( $testimonial_iteam->text ) ? $testimonial_iteam->text : '';
						$number = ! empty( $testimonial_iteam->number ) ? $testimonial_iteam->number : '';
						$link     = ! empty( $testimonial_iteam->link ) ? $testimonial_iteam->link : '';
						if( !empty($testimonial_iteam->open_new_tab)){ 
							$open_new_tab = $testimonial_iteam->open_new_tab;
						} else{ $open_new_tab = 'no'; }
						$designation = ! empty( $testimonial_iteam->designation ) ? $testimonial_iteam->designation : '';
				?>
			    <div class="item">
				    <div class="testimonial bg-white text-center">
						<div class="blockquote position-relative bg-primary text-white m-0">
							<?php if($text != null):
							echo wp_kses( html_entity_decode( $text ), $allowed_html );
							endif; ?>	
						</div>
						<div class="testimonial-author">
							<?php if($testimonial_iteam->image_url != null): ?>
							<img src="<?php echo esc_url( $testimonial_iteam->image_url ); ?>" class="w-auto mx-auto mb-4" alt="<?php echo esc_attr( $title ); ?>" >
							<?php endif; ?>
	                        <?php if(!empty($number)): ?>
							<div class="rating fa-lg mb-3">
								<?php for($i=1;$i<=$number;$i++){ ?>
								<span class="fa fa-star text-primary"></span>
								<?php } ?>	
							</div>
							<?php endif; ?>

							<?php if($title != null): ?>
							<h4>
								<?php if($link != null): ?>
								<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>><?php echo esc_html( $title ); ?> </a>
								<?php else: ?>
								<?php echo esc_html( $title ); ?>
								<?php endif; ?>
							</h4>
							<?php endif; ?>
							<?php if($designation != null): ?>	
							<h5 class="font-weight-600 text-primary"><i><?php echo esc_html( $designation ); ?></i></h5>
							<?php endif; ?>	
						</div>
					</div>
			    </div>
				<?php } } else { ?>
				<div class="item">
					<div class="testimonial bg-white text-center">
	                    <div class="blockquote position-relative bg-primary text-white m-0">
	                    	<?php echo wp_kses_post('<h3 class="font-weight-700">Get Started With Influence Agents !</h3><p class="mt-3">Lorem ipsum dolor sit amet, consect adising elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor.</p>', 'oneto-companion'); ?>
	                    </div>
	                    <div class="testimonial-author">
	                        <img class="w-auto mx-auto mb-4" src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/businessman.png" alt="<?php echo esc_attr('David Miller', 'oneto-companion'); ?>">
	                        <div class="rating fa-lg mb-3">
	                            <span class="fa fa-star text-primary"></span>
	                            <span class="fa fa-star text-primary"></span>
	                            <span class="fa fa-star text-primary"></span>
	                            <span class="fa fa-star text-primary"></span>
	                            <span class="fa fa-star text-primary"></span>
	                        </div>
	                        <h4><a href="#"><?php echo esc_html_e('David Miller', 'oneto-companion'); ?></a></h4>
	                        <h5 class="font-weight-600 text-primary"><i><?php echo esc_html_e('Founder', 'oneto-companion'); ?></i></h5>
	                    </div>
	                </div>
				</div>
				<?php } ?>
		    </div>
	    </div>
	    <?php if($oneto_testimonial_area_title != null || $oneto_testimonial_area_subtitle != null): ?>
		<div class="col-lg-6 col-12 h-100 bg-secondary p-5 text-white text-lg-start text-center position-relative z-index-0">
			<?php if($oneto_testimonial_area_subtitle != null): ?>
			<div class="mb-sm-4 mb-3">
				<hr class="d-inline-block vertical-align-middle me-2" style="width: 129px;"> <span class="theme-section-subtitle"><?php echo wp_kses_post( $oneto_testimonial_area_subtitle ); ?></span>
			</div>
			<?php endif; ?>
			<?php if($oneto_testimonial_area_title != null): ?>
			<h2 class="theme-section-title py-3"><?php echo wp_kses_post( $oneto_testimonial_area_title ); ?></h2>
			<?php endif; ?>
			<?php if($oneto_testimonial_button_text != null): ?>
			<a href="<?php echo esc_url( $oneto_testimonial_button_link ); ?>" <?php if($oneto_testimonial_open_new_tab_disabled == true){?>target="_blank" <?php }?> class="btn btn-primary mt-sm-5 mt-4"><?php echo esc_html( $oneto_testimonial_button_text ); ?></a>
			<?php endif; ?>
		</div>
    	<?php endif; ?>
	</div>
</section>
<?php endif; ?>