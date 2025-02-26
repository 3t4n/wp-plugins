<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://#
 * @since      1.0.0
 *
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/public
 * @author     Alpha Rages <alpha@hotmail.com>
 */
class ALPRT_testimonials_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function alprt_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALPRT_testimonials_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALPRT_testimonials_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	    wp_enqueue_style( 'alprt-testifonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800', array(), $this->version, 'all' );

	    wp_enqueue_style( 'alprt-testiawsome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'alprt-public-css', plugin_dir_url( __FILE__ ) . 'css/alpharage-testimonials-public.css', array(), $this->version, 'all' );


	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function alprt_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALPRT_testimonials_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALPRT_testimonials_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('jquery');

		wp_enqueue_script('alprt-testiplugin', plugin_dir_url( __FILE__ ) . 'js/plugins.js', array( 'jquery' ), null, true );

		wp_enqueue_script( 'alprt-public-js', plugin_dir_url( __FILE__ ) . 'js/alpharage-testimonials-public.js', array( 'jquery' ), null, true );

	}

	 public function alprt_image_size(){
	 	add_image_size('wp_testi_thumb_1',90,90, true);
		add_image_size('wp_testi_thumb_2',100,100, true);
		add_image_size('wp_testi_thumb_3',31,31, true);
		add_image_size('wp_testi_thumb_4',140,140, true);
	    add_image_size('wp_testi_thumb_5',44,44, true);
		add_image_size('wp_testi_thumb_6',35,35, true);

	     }
		public function alprt_testimonial_css($backgroundcolor , $color , $bordercolor,$backgroundimage){
			/**
			 * This function is provided for Testimonials Dynamic Css.
			 */
		  ?>
		  	<style type="text/css">
		  		#ht-testimonail-slider .slide,
				#ht-testimonail-slider .slide .title{
					color: <?php echo $color; ?>;
				}
				#ht-testimonail-slider .slide{ background: <?php echo $backgroundcolor; ?>; }
				#ht-testimonail-slider .slick-dots li{
					border-color: <?php echo $bordercolor; ?>;
				}
				#ht-testimonail-sec
				{
					background: url('<?php echo $backgroundimage; ?>');
				}
		  	</style>
	<?php	}
		public function alprt_testimonial_style1($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 1.
			 */
			$alprt_html='<div id="ht-testimonail-sec">
							<div class="ht-container">
									<div class="col-xs-12">
										<div id="ht-testimonail-slider" class="ht-slider1">';
								foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );
			$alprt_html .=	'				   <blockquote class="slide text-center">
		                        				<div class="img-holder">'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_1').'</div>
												<cite class="title">'.esc_attr($post->post_title).'</cite>
												<span class="sub-title">'.esc_attr($desig).'</span>
												<q>'.esc_attr($post->post_content).'</q>
											</blockquote>';
								}			
			$alprt_html .=	'				</div>
									</div>
							</div>
						</div>';
					return $alprt_html;	
		}
		public function alprt_testimonial_style2($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 2.
			 */
			$url= plugin_dir_url(dirname(__FILE__));
			$alprt_html ='<div id="ht-testimonail-sec" class="ht-style6" >
							<div class="ht-container">
									<div class="col-xs-12">
										<div id="ht-testimonail-slider" class="ht-slider2">';
							foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );			

			$alprt_html .='					<blockquote class="slide text-center">
												<div class="img-holder">'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_2').'</div>
												<q>'.esc_attr($post->post_content).'</q>
												<cite class="title">'.esc_attr($post->post_title).'</cite>
											</blockquote>';
								}		
		$alprt_html	.='				    </div>
									</div>
							</div>
						</div>';
						return $alprt_html;
		}
		public function alprt_testimonial_style3($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 3.
			 */
			$alprt_html ='<div id="ht-testimonail-sec">
							<div class="ht-container">
									<div class="col-xs-12">
										<div id="ht-testimonail-slider" class="ht-slider3">';
							foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );	
			$alprt_html .='    				<div class="slide">
			    					           <p>'.esc_attr(substr($post->post_content,0,200)).'...</p>
												<footer class="footer">
													<div class="img-holder">
														'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_3').'
													</div>
													<div class="txt-holder">
														<strong class="name">'.esc_attr($post->post_title).'</strong>
														<span class="desnation">'.esc_attr($desig).'</span>
													</div>
												</footer>
											</div>';

									}		
											
			$alprt_html .='	        	</div>
									</div>
							</div>
						</div>';
			return $alprt_html;
		}
		public function alprt_testimonial_style4($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 4.
			 */
			$alprt_html ='<div id="ht-testimonail-sec">
							<div class="ht-container">
										<div id="ht-testimonail-slider" class="ht-slider4">';
							foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );	
			$alprt_html .='					<blockquote class="slide text-center">
												<div class="img-holder">'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_4').'</div>
												<cite class="title">'.esc_attr($post->post_title).'</cite>
												<span class="sub-title">'.esc_attr($desig).'</span>
												<q>'.esc_attr($post->post_content).'</q>
											</blockquote>';
								}			
			$alprt_html .='    			</div>
							</div>
						</div>';
			return $alprt_html;
		}
		public function alprt_testimonial_style5($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 5.
			 */
			$alprt_html ='<div id="ht-testimonail-sec">
							<div class="ht-container">
										<div id="ht-testimonail-slider" class="ht-slider5">';
                                foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );
			$alprt_html .='					<blockquote class="slide">
												<q class="text-center">'.esc_attr(substr($post->post_content,0,100)).'</q>
												<cite class="footer">
													<div class="img-holder">
														'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_5').'
													</div>
													<div class="txt-holder">
														<strong class="name">'.esc_attr($post->post_title).'</strong>
														<span class="desnation">'.esc_attr($desig).'</span>
													</div>
												</cite>
											</blockquote>';
								}			
			$alprt_html .='    			</div>
							</div>
						</div>';
			return $alprt_html;
		}
		public function alprt_testimonial_style6($wp_posts) {
			/**
			 * This function is provided for Testimonials Style 6.
			 */
			$alprt_html ='<div id="ht-testimonail-sec">
							<div class="ht-container">
										<div id="ht-testimonail-slider" class="ht-slider6">';
								foreach ($wp_posts as $post) {
									$desig=get_post_meta( $post->ID, '_wp_testi_desig', true );
			$alprt_html .='				<div class="slide">
												<footer class="footer">
													<div class="img-holder">
														'.wp_get_attachment_image( get_post_thumbnail_id($post->ID), 'wp_testi_thumb_6').'
													</div>
													<div class="txt-holder">
														<strong class="name">'.esc_attr($post->post_title).'</strong>
														<span class="desnation">'.esc_attr($desig).'</span>
													</div>
												</footer>
												<p>'.esc_attr(substr($post->post_content,0,200)).'...</p>
											</div>';
											
									}		
											
			$alprt_html .='				</div>
							</div>
						</div>';
			return $alprt_html;
		}

}
