<?php
/**
 * Testimonial Section
 */
if ( ! function_exists( 'avata_avadanta_testimonial' ) ) :

	function avata_avadanta_testimonial() {

		$home_testimonial_section_enabled = get_theme_mod('testimonial_section_enable','on');
		$testimonial_options = get_theme_mod('avadanta_testimonial_content',avata_avadanta_get_testimonial_default());
		if($home_testimonial_section_enabled !='off')

     {
		?>
		<!-- code -->
		    <div class="tec-testimonial style1 gray-bg pt-100 pb-100 md-pt-72 pb-70">
                <div class="container">
 
					<?php
						$home_testimonial_section_title = get_theme_mod('home_testimonial_section_title',__('Our Testimonial','avadanta'));
						$home_testimonial_section_subtitle = get_theme_mod('home_testimonial_section_subtitle',__('What Clients Says About Us','avadanta'));

						$home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscip it arcu. Quisque aliquam posuere tortor aliquam posuere tortor develop database.','avadanta'));

					$theme = wp_get_theme();
				  		if ( 'Teczilla Freelancer' == $theme->name ){ ?>

				  			<div class="sec-title style2 mb-60 md-mb-50 sm-mb-42">
				                <div class="first-half text-left">
				                    <div class="sub-title primary"><?php echo esc_html($home_testimonial_section_title); ?></div>
				                    <h2 class="title mb-0"><?php echo esc_html($home_testimonial_section_subtitle); ?></h2>
				                </div>
				            </div>
				            <?php

				  		}else{
				  			?>
						<div class="sec-title style2 mb-60 md-mb-50 sm-mb-42">
                        <div class="first-half text-left">
                            <div class="sub-title primary"><?php echo esc_html($home_testimonial_section_title); ?></div>
                            <h2 class="title mb-0"><?php echo esc_html($home_testimonial_section_subtitle); ?></h2>
                        </div>
                        <div class="last-half">
                            <p class="desc mb-0 pr-50"><?php echo esc_html($home_testimonial_section_discription); ?></p>
                        </div>
                    </div>
                   <?php } ?>
			
			<div class="white-bg">
               <div class="row">  
                <div class="col-lg-12 slider-part">
				 <div class="tec-carousel owl-carousel dot-style1" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-lg-device="1" data-md-device-nav="false" data-md-device-dots="true">

					<?php $testimonial_options = json_decode($testimonial_options);
								if( $testimonial_options!='' )
								{
								foreach($testimonial_options as $testimonial_item){
							
								$title    = ! empty( $testimonial_item->title ) ? apply_filters( 'avadanta_translate_single_string', $testimonial_item->title, 'Team section' ) : '';
								 $subtitle    = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'avadanta_translate_single_string', $testimonial_item->subtitle, 'Team section' ) : '';
								  $text    = ! empty( $testimonial_item->text ) ? apply_filters( 'avadanta_translate_single_string', $testimonial_item->text, 'Team section' ) : '';
								 $image    = ! empty( $testimonial_item->image_url ) ? apply_filters( 'avadanta_translate_single_string', $testimonial_item->image_url, 'Team section' ) : '';
								 ?>

								 <?php $theme = wp_get_theme();  if('Teczilla SEO' == $theme->name) {?>
	                                    <div class="col-md-12 col-sm-6">
								            <div class="our-testi">
								                <div class="testi-image">
								                    <img src="<?php echo esc_url($image); ?>" alt="">
								                    <ul class="social">
								                    </ul>
								                </div>
								                <div class="testi-content">
								                    <h3 class="title"><?php echo esc_html($title); ?></h3>
								                    <span class="designation"><?php echo esc_html($subtitle); ?></span>
								                    <p class="description"><?php echo esc_html($text); ?></p>
								                </div>
								            </div>
								        </div>
							    <?php }elseif('Teczilla Marketing' == $theme->name){ ?>
							    		<div class="col-md-12 col-sm-6 testi-col">
								            <div class="our-testi">
								                <div class="testi-image">
								                    <img src="<?php echo esc_url($image); ?>" alt="">
								                </div>
								                <div class="testi-content">
								                    <h3 class="title"><?php echo esc_html($title); ?></h3>
								                    <span class="post"><?php echo esc_html($subtitle); ?></span>
								                    <p class="description"><?php echo esc_html($text); ?></p>
								                </div>
								            </div>
								        </div>

	                                <?php }elseif('Teczilla Lite' == $theme->name){ ?>
							    		<div class="col-md-12 col-sm-6 testimo-col">
								            <div class="our-testimo">
								                <div class="pic">
								                    <img src="<?php echo esc_url($image); ?>" alt="">
								                    <div class="social_media_testimo">
								                        <p class="description">
								                            <?php echo esc_html($text); ?>
								                        </p>
								                    </div>
								                </div>
								                <div class="testimo-prof">
								                    <h3 class="post-title"><?php echo esc_html($title); ?></h3>
								                    <span class="post"><?php echo esc_html($subtitle); ?></span>
								                </div>
								            </div>
								        </div>

								    <?php }elseif('Teczilla Software' == $theme->name || 'Teczilla Marketing Company' == $theme->name){ ?>
							    		<div class="testimonial-bg">
							                <div id="testimonial-slider">
							                    <div class="testimonial">
							                        <p class="description">
							                            <?php echo esc_html($text); ?>
							                        </p>
							                        <div class="pic">
							                            <img src="<?php echo esc_url($image); ?>" alt="">
							                        </div>
							                        <h3 class="title"><?php echo esc_html($title); ?>,</h3>&nbsp;
							                        <span class="post"><?php echo esc_html($subtitle); ?></span>
							                    </div>
							                </div>
							            </div>

								    <?php }elseif('Teczilla Technology' == $theme->name){ ?>
							    		<div class="col-md-12 col-sm-6 testimo-col">
								            <div class="post-slide">
							                    <h3 class="post-category"><?php echo esc_html($subtitle); ?></h3>
							                    <div class="post-review">
							                        <h3 class="post-title"><?php echo esc_html($title); ?></h3>
							                    </div>
							                    <div class="post-img">
							                        <img src="<?php echo esc_url($image); ?>" alt="">
							                    </div>
							                    <p class="post-description">
							                        <?php echo esc_html($text); ?>
							                    </p>
							                </div>
								        </div>

								    <?php }elseif('Teczilla SAAS' == $theme->name || 'Teczilla It Solutions' == $theme->name){ ?>
							    		<div class="col-md-12 testimo-col">
								            <div class="testi">
								                <div class="pic">
								                    <img src="<?php echo esc_url($image); ?>" alt="">
								                </div>
								                <div class="team-prof">
								                    <h3 class="post-title">
								                        <a href="#"><?php echo esc_html($title); ?></a>
								                        <small><?php echo esc_html($subtitle); ?></small>
								                    </h3>
								                    <p class="description">
								                        <?php echo esc_html($text); ?>
								                    </p>
								                </div>
								            </div>
								        </div>

								    <?php }elseif('Teczilla Freelancer' == $theme->name || 'Teczilla Multipurpose' == $theme->name || 'Teczilla Workspace' == $theme->name || 'Teczilla App' == $theme->name){ ?>
							    		<div class="col-md-12 testimo-col">
									        <div class="testi">
							    				<div class="row">
							    					<div class="col-md-2">
										                <div class="pic">
										                    <img src="<?php echo esc_url($image); ?>" alt="">
										                </div>
										            </div>
										           	<div class="col-md-10">
										                <div class="team-prof">
										                    <p class="description">
										                        <?php echo esc_html($text); ?>
										                    </p>
										                    <h3 class="post-title">
										                        <a href="#"><?php echo esc_html($title); ?></a>
										                    </h3>
										                    <p class="sub-t">
										                        <small><?php echo esc_html($subtitle); ?></small>
										                    </p>
										                </div>
										            </div>
									            </div>
									        </div>
								        </div>

								    <?php }elseif('Teczilla Black' == $theme->name || 'Teczilla Responsive' == $theme->name || 'Teczilla Software Company' == $theme->name || 'Teczilla Digital Agency' == $theme->name){ ?>
							    		<div class="col-md-12 testimo-col">
									        <div class="testi">
							    				<div class="row align-items-center">
										           	<div class="col-md-7">
										                <div class="team-prof">
										                    <p class="description">
										                        <?php echo esc_html($text); ?>
										                    </p>
										                    <h3 class="post-title">
										                        <a href="#"><?php echo esc_html($title); ?></a>
										                    </h3>
										                    <p class="sub-t">
										                        <small><?php echo esc_html($subtitle); ?></small>
										                    </p>
										                </div>
										            </div>
							    					<div class="col-md-5">
										                <div class="pic">
										                    <img src="<?php echo esc_url($image); ?>" alt="">
										                </div>
										            </div>
									            </div>
									        </div>
								        </div>

								    <?php }else{ ?>

								 	<div class="testi-item">
                                        <div class="content-part posted-by text-center">
                                            <div class="avatar">
                                                <img src="<?php echo esc_url($image); ?>" alt="">
                                            </div>
                                            <div class="desc"><?php echo esc_html($text); ?></div>
                                        </div>
                                        <div class="posted-by content-part text-center">
                                            <div class="icon-part">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            
                                            <h5 class="name"><?php echo esc_html($title); ?></h5>
                                            <span class="designation"><?php echo esc_html($subtitle); ?></span>
                                        </div>
                                    </div>
                 			<?php } ?>
				  
				  <?php } } ?>
				 
				</div>
			</div><!-- .container -->
			<!-- bg -->
			
			<!-- .bg -->
		</div>
		<!-- end code -->
	</div>
</div>
</div>
</div>
	<?php	
} }
endif;
if ( function_exists( 'avata_avadanta_testimonial' ) ) {
	$section_priority = apply_filters( 'avadanta_section_priority', 'avata_avadanta_testimonial' );
	add_action( 'avata_avadanta_sections', 'avata_avadanta_testimonial', absint( $section_priority ) );
}