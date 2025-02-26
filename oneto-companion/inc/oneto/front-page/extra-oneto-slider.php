<?php
$oneto_main_slider_options = get_theme_mod('oneto_main_slider_content');
$oneto_main_slider_disabled = get_theme_mod('oneto_main_slider_disabled', true);
$oneto_main_slider_overlay_disable = get_theme_mod('oneto_main_slider_overlay_disable', true);
if( $oneto_main_slider_disabled == true ): ?>
<section id="theme-slider" class="theme-main-slider position-relative text-center overflow-hidden bg-primary2">
    <div id="theme-main-slider" class="owl-carousel owl-theme">
		<?php 
			$oneto_main_slider_options = json_decode($oneto_main_slider_options);
			if( $oneto_main_slider_options!='' )
				{
					foreach($oneto_main_slider_options as $slide_iteam){	
						$title = ! empty( $slide_iteam->title ) ? $slide_iteam->title : '';
						$img_description = ! empty( $slide_iteam->text ) ? $slide_iteam->text : '';
						$readmorelink = ! empty( $slide_iteam->link ) ? $slide_iteam->link : '';	
						$readmore_button = ! empty( $slide_iteam->button_text ) ? $slide_iteam->button_text : '';
						$open_new_tab = $slide_iteam->open_new_tab;
						$readmorelink2 = ! empty( $slide_iteam->link2 ) ? $slide_iteam->link2 : '';	
						$readmore_button2 = ! empty( $slide_iteam->button_text2 ) ? $slide_iteam->button_text2 : '';
		?>
		<?php if($slide_iteam->image_url!=''){ ?>
		<div class="item pt-5" style="background-image:url(<?php echo esc_url( $slide_iteam->image_url); ?>) ;">
		<?php } else { ?>
		<div class="item pt-5">
		<?php }
		if($title != '' || $img_description!= '' || $readmore_button !='' || $readmore_button2 !='' ){ ?>
			<div class="container">
				<div class="row align-items-center wow fadeInUp">
		            <div class="col-lg-8 col-12 mx-auto py-5">
						<?php if ( $title != '' ) { ?>
							<h2 class="title mb-0 display-5"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></h2>
					    <?php } ?>
						<?php if ( $img_description != '' ) { ?>
							<p class="description mt-4 lead"><?php echo wp_kses_post( html_entity_decode( $img_description ) ); ?></p>
						<?php } ?>
						<?php if ( $readmore_button !='' || $readmore_button2 !='' ) { ?>
							<div class="buttons mt-5">
								<?php if ( $readmore_button != '' ) { ?>
								<a href="<?php echo esc_url( $readmorelink );?>" <?php if($open_new_tab == 'yes' || $open_new_tab == '1') { echo "target='_blank'"; } ?> class="btn btn-secondary"><?php echo esc_html($readmore_button) ?></a>
								<?php }
								if ( $readmore_button2 != '' ) {
								?>
								<a href="<?php echo esc_url( $readmorelink2 );?>" <?php if($open_new_tab == 'yes' || $open_new_tab == '1') { echo "target='_blank'"; } ?> class="btn btn-outline-secondary"><?php echo esc_html($readmore_button2) ?></a>
								<?php } ?>
							</div>
		                <?php } ?>
		            </div>
				</div>
				<?php if ( $slide_iteam->image_url2 != '' ) { ?>
				<div class="row align-items-center wow fadeInUp">
		            <div class="col-12">
		                <div class="image w-100 position-relative z-index-0">
		                    <div class="wave-on-image"></div>
		                    <img src="<?php echo esc_url($slide_iteam->image_url2); ?>" alt="">
		                </div>
		            </div>
		        </div>
		        <?php } ?>
			</div>
		<?php } ?>
		<?php if( $oneto_main_slider_overlay_disable == true ): ?>
		<div class="overlay"></div>
		<?php endif; ?>
		</div>

			<?php } } else { 
			
			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;
			
				if('Oneto' == $activate_theme){
					// write here for print conditionally data
				}
			
			?>
			
			<div class="item pt-5">
			    <div class="container">
			        <div class="row align-items-center wow fadeInUp">
			            <div class="col-lg-8 col-12 mx-auto py-5">
			                <h2 class="mb-0 display-5"><?php esc_html_e('A WordPress Theme for Your SAAS Application/Project','oneto-companion'); ?></h2>
			                <p class="mt-4 lead"><?php esc_html_e('Make the most out of your email blast with our advanced email marketing tool. Get rid of all complications and grow your business with our easy to use features.','oneto-companion'); ?></p>
			                <div class="buttons mt-5">
			                    <a href="#" class="btn btn-secondary"><?php esc_html_e('Getting started','oneto-companion'); ?></a>
			                    <a href="#" class="btn btn-outline-secondary"><?php esc_html_e('See Pricing','oneto-companion'); ?></a>
			                </div>
			            </div>
			        </div>
			        <div class="row align-items-center wow fadeInUp">
			            <div class="col-12">
			                <div class="image w-100 position-relative z-index-0">
			                    <div class="wave-on-image"></div>
			                    <img src="<?php echo oneto_companion_plugin_url; ?>/inc/oneto/assets/img/laptop.png" alt="">
			                </div>
			            </div>
			        </div>
			    </div>
		        <?php if( $oneto_main_slider_overlay_disable == true ): ?>
			    <div class="overlay"></div>
			    <?php endif; ?>		    
			</div>
			
	        <?php } ?>	
		</div>		
</section>
<?php endif; ?>