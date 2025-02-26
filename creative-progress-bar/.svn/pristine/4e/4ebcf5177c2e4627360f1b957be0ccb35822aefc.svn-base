<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Creative_progress_bar
 * @subpackage Creative_progress_bar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Creative_progress_bar
 * @subpackage Creative_progress_bar/public
 * @author     Rigal Patel <#>
 */
class Creative_progress_bar_Public {

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
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_progress_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_progress_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/creative_progress_bar-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrapcss', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_progress_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_progress_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/creative_progress_bar-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootstrapjs', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Progressbar Template 1 
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template1($post_id,$progressbar_data){
		
		$progressbar_content = '';
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				
				$progressbar_content .= '
				<div class="col-md-3 col-sm-6">
					<div  id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.'">
						<span class="progress-left">
							<span class="progress-bar"></span>
						</span>
						<span class="progress-right">
							<span class="progress-bar"></span>
						</span>
						<div class="progress-value">'.esc_attr( $field['progress_value'] ).'%</div>
					</div>
				</div>
				<style> #bg-'.$post_id.$cls_name.' .progress-bar, #bg-'.$post_id.$cls_name.' .progress-value { border-color: '.$bgcolor.'; color:'.$bgcolor.'; } #bg-'.$post_id.$cls_name.' .progress-left .progress-bar { animation: loading-2 1.5s linear forwards 1.8s; }</style>
				';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}	

		return	'<style>
	     .progress-'.$post_id.'{width: 150px;height: 150px;line-height: 150px;background: none;margin: 0 auto;box-shadow: none;position: relative;}
		 .progress-'.$post_id.':after{content: "";width: 100%;height: 100%;border-radius: 50%;border: 2px solid #fff;position: absolute;top: 0;left: 0;}
		 .progress-'.$post_id.' > span{width: 50%;height: 100%;overflow: hidden;position: absolute;top: 0;z-index: 1;}
		 .progress-'.$post_id.' .progress-left{left: 0;}
		 .progress-'.$post_id.' .progress-bar{width: 100%;height: 100%;background: none;border-width: 2px;border-style: solid;position: absolute;top: 0;}
		 .progress-'.$post_id.' .progress-left .progress-bar{left: 100%;border-top-right-radius: 80px;border-bottom-right-radius: 80px;border-left: 0;-webkit-transform-origin: center left;transform-origin: center left;}
		 .progress-'.$post_id.' .progress-right{right: 0;}
		 .progress-'.$post_id.' .progress-right .progress-bar{left: -100%;border-top-left-radius: 80px;border-bottom-left-radius: 80px;border-right: 0;-webkit-transform-origin: center right;transform-origin: center right;animation: loading-1 1.8s linear forwards;}
		 .progress-'.$post_id.' .progress-value{width: 85%;height: 85%;border-radius: 50%;border: 2px solid #ebebeb;font-size: 32px;line-height: 125px;text-align: center;position: absolute;top: 7.5%;left: 7.5%;}
		@keyframes loading-1{
			0%{
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100%{
				-webkit-transform: rotate(180deg);
				transform: rotate(180deg);
			}
		}
		@keyframes loading-2{
			0%{
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100%{
				-webkit-transform: rotate(144deg);
				transform: rotate(144deg);
			}
		}
		@keyframes loading-3{
			0%{
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100%{
				-webkit-transform: rotate(90deg);
				transform: rotate(90deg);
			}
		}
		@keyframes loading-4{
			0%{
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100%{
				-webkit-transform: rotate(36deg);
				transform: rotate(36deg);
			}
		}
		@keyframes loading-5{
			0%{-webkit-transform: rotate(0deg);transform: rotate(0deg);}
			100%{-webkit-transform: rotate(126deg);transform: rotate(126deg);}
		}
		@media only screen and (max-width: 990px){.progress{ margin-bottom: 20px; }}
			</style>
			<div class="container">
			<div class="row">
			'. $progressbar_content.'
			</div>
		</div>';

	}


	/**
	 * Progressbar Template 2 
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template2($post_id,$progressbar_data){

		$progressbar_content = '';
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				$progressbar_content .= '
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<h3 class="progress-title">'.esc_attr( $field['name'] ).'</h3>
					<div id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.' progress">
						<div class="progress-bar" style="width:'.esc_attr( $field['progress_value'] ).'%; background:'.$bgcolor.';">
							<span class="progress-icon fa fa-globe"></span>
							<div class="progress-value"><span>'.esc_attr( $field['progress_value'] ).'</span>%</div>
						</div>
					</div>
			    </div>	
				<style> #bg-'.$post_id.$cls_name.' .progress-icon, #bg-'.$post_id.$cls_name.' .progress-value { border: 7px solid '.$bgcolor.' ;color: '.$bgcolor.';  } </style>
				';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}	

		return '<style>.progress-title{font-size: 18px;font-weight: 700;color: #000;margin: 0 0 30px;}
		.progress-'.$post_id.'{height: 17px;background: rgba(0,0,0,0.1);border-radius: 15px;margin-bottom: 30px;overflow: visible;position: relative;}
		.progress-'.$post_id.' .progress-bar{border-radius: 15px;box-shadow: none;position: relative;animation: animate-positive 2s;}
		.progress-'.$post_id.' .progress-icon,.progress-'.$post_id.' .progress-value{width: 50px;height: 50px;border-radius: 50%;line-height: 40px;background: #fff;border: 7px solid #1f75c4;font-size:15px;font-weight: 600;color: #1f75c4;position: absolute;top: -17px;right: -5px;}
		.progress-'.$post_id.' .progress-icon{right: auto;left: -5px;}
		.progress.orange .progress-icon,.progress.orange .progress-value{border: 7px solid #f7810e;color: #f7810e;}
		.progress.pink .progress-icon,.progress.pink .progress-value{border: 7px solid #f2438f;color: #f2438f;}
		.progress.green .progress-icon,.progress.green .progress-value{border: 7px solid #08a061;color: #08a061;}
		@-webkit-keyframes animate-positive{0%{ width: 0; }}
		@keyframes animate-positive{0%{ width: 0; }}
		</style>
		<div class="container">
		   <div class="row">
			'.$progressbar_content.'
		   </div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".progress-value > span").each(function(){
			jQuery(this).prop("Counter",0).animate({
				Counter: jQuery(this).text()
			},{
				duration: 1500,
				easing: "swing",
				step: function (now){
					jQuery(this).text(Math.ceil(now));
				}
			});
		});
	});</script>
	';
	}


	/**
	 * Progressbar Template 3 
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template3($post_id,$progressbar_data){

		$progressbar_content = '';
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				$progressbar_content .= '
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<div id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.' progress">
						<h3 class="progress-title">'.esc_attr( $field['name'] ).'</h3>
						<div class="progress-value">'.esc_attr( $field['progress_value'] ).'%</div>
						<div class="progress-bar" style="width:'.esc_attr( $field['progress_value'] ).'%; background:'.$bgcolor.';"></div>
					 </div>
				</div>	 
				<style> #bg-'.$post_id.$cls_name.' .progress-bar:before{ border-left: 20px solid '.$bgcolor.'; } </style>
				';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}	

		return '<style>.progress-'.$post_id.'{ height: 20px;background: #fff;border-radius: 15px 0 0 15px;box-shadow: none;margin: 20px 50px 40px 100px;overflow: visible;position: relative;}
		.progress-'.$post_id.' .progress-title{ display: block;font-size: 18px;font-weight: 700;color: #205580;position: absolute;bottom: -3px;left: -90px;}
		.progress-'.$post_id.' .progress-bar{ background: #fff;box-shadow: none;border-radius: 15px 0 0 15px;position: relative;-webkit-animation: animate-positive 2s;animation: animate-positive 2s;}
		.progress-'.$post_id.' .progress-bar:before{ content: "";border-top: 20px solid transparent;border-bottom: 20px solid transparent;position: absolute;top: -10px;right: -20px;}
	 	.progress-'.$post_id.' .progress-value{ display: block;font-size: 18px;font-weight: 700;color: #205580;position: absolute;bottom: -5px;right: -50px;}
		@-webkit-keyframes animate-positive{0% { width: 0; }}
		@keyframes animate-positive{0% { width: 0; }}
		</style>
		<div class="container">
			<div class="row">
				'.$progressbar_content.'
			</div>
	</div>';
	}


	/**
	 * Progressbar Template 4 
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template4($post_id,$progressbar_data){

		$progressbar_content = '';
		
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				$progressbar_content .= '
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				 	<h3 class="progress-title">'.esc_attr( $field['name'] ).'</h3>
					<div id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.' yellow">
						<div class="progress-bar" style="width:'.esc_attr( $field['progress_value'] ).'%">
							<div class="progress-value">'.esc_attr( $field['progress_value'] ).'%</div>
						</div>
					</div>
			    </div>
				<style> #bg-'.$post_id.$cls_name.' .progress-bar{ border-bottom: 4px dotted '.$bgcolor.' !important; } #bg-'.$post_id.$cls_name.' .progress-bar:before{ border-bottom-color: '.$bgcolor.' !important; } </style>
				';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}	

		return '<div class="container">
		<div class="row">
			'.$progressbar_content.'
		</div>
	  </div><style>.progress-title{font-size: 18px;font-weight: 700;color: #000;text-transform: uppercase;margin: 0 0 30px;}
		.progress-'.$post_id.'{height: 7px;background: #fff;border-radius: 0;margin-bottom: 30px;overflow: visible;box-shadow: none;}
		.progress-'.$post_id.' .progress-bar{background: #fff;box-shadow: none;border-bottom: 4px dotted #ff1140;border-radius: 0;position: relative;-webkit-animation: animate-positive 2s;animation: animate-positive 2s;}
		.progress-'.$post_id.' .progress-bar:before{content: "";border-bottom: 20px solid #ff1140;border-left: 20px solid transparent;border-right: 20px solid transparent;position: absolute;bottom: -4px;right: -4px;}
		.progress-'.$post_id.' .progress-bar .progress-value{font-size: 17px;font-weight: 700;color: #000;position: absolute;top: -33px;right: 0;}
		@-webkit-keyframes animate-positive{0%{ width: 0; }}
		@keyframes animate-positive{0%{ width: 0; }}</style>';
	}

	/**
	 * Progressbar Template 5
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template5($post_id,$progressbar_data){

		$progressbar_content = '';
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				$progressbar_content .= '
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<h3 class="progress-title">'.esc_attr( $field['name'] ).' '. esc_attr( $field['progress_value'] ).'%</h3>
					<div id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.' progress ">
						<div class="progress-bar progress-bar-striped active" style="width:'.esc_attr( $field['progress_value'] ).'%;"></div>
					</div>
			    </div>
				<style> #bg-'.$post_id.$cls_name.' .progress-bar{ background-color:'.$bgcolor.' }</style>';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}

		return '<div class="container">
		<div class="row">
		'.$progressbar_content.'
		</div>
	  </div><style>.progress-title{font-size: 18px;font-weight: 700;color: #1c2647;margin: 0 0 10px;}
		.progress-'.$post_id.' { height: 30px;background: #fff;border-top: 5px solid #1c2647;border-bottom: 5px solid #1c2647;border-radius: 0;margin-bottom: 25px;overflow: visible;position: relative;}
		.progress-'.$post_id.':before,.progress-'.$post_id.':after{content: "";width: 5px;background: #1c2647;position: absolute;top: 0;left: -5px;bottom: 0;}
		.progress-'.$post_id.':after{left: auto;right: -5px;}
		.progress-'.$post_id.' .progress-bar{border: none;box-shadow: none;-webkit-animation: 2s linear 0s normal none infinite running progress-bar-stripes,animate-positive 1s;animation: 2s linear 0s normal none infinite running progress-bar-stripes,animate-positive 1s;}
		@-webkit-keyframes animate-positive{0%{ width: 0; }}
		@keyframes animate-positive{0%{ width: 0; }}</style>';
	}

	/**
	 * Progressbar Template 6
	 *
	 * @since    1.0.0
	 */

	public	function cpb_template6($post_id,$progressbar_data){

		$progressbar_content = '';
		if ( $progressbar_data ) {
			foreach ( $progressbar_data as $field ) {
				$bgcolor = esc_attr($field['progress_bgcolor']);	
				$cls_name = str_replace('#','',$bgcolor);
				$progressbar_content .= '
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<h3 class="progress-title">'.esc_attr( $field['name'] ).' '. esc_attr( $field['progress_value'] ).'%</h3>
				<div id="bg-'.$post_id.$cls_name.'" class="progress-'.$post_id.' progress ">
					<div class="progress-bar" style="width:'.esc_attr( $field['progress_value'] ).'%;background:'.$bgcolor.';"></div>
				</div>
			  </div>
			  <style> #bg-'.$post_id.$cls_name.' .progress-bar:after{ background:'.$bgcolor.';outline: 2px solid '.$bgcolor.';}</style>';
			}
		} else {
			$progressbar_content .= '<div class="alert alert-danger" role="alert">Records Not available.</div>';
		}

		return '<div class="container">
		<div class="row">
		'.$progressbar_content.'
		</div>
	  </div><style>
	.progress-title{font-size: 18px;font-weight: 700;color: #000;margin: 0 0 30px;}
	.progress-'.$post_id.'{ height: 7px;background: #f8f8f8;border-radius: 0;box-shadow: none;margin-bottom: 30px;overflow: visible;position: relative;}
	.progress-'.$post_id.' .progress-bar{border: 1px solid #000;border-radius: 0;box-shadow: none;position: relative;animation: animate-positive 2s;}
	.progress-'.$post_id.' .progress-bar:after{content: "";width: 20px;height: 20px;background: #23e454;border: 6px double #fff;outline: 2px solid #23e454;position: absolute;top: -6px;right: 0;}
    .progress.red .progress-bar:after{background: #f80a0a;outline: 2px solid #f80a0a;}
    .progress.yellow .progress-bar:after{background: #f9d700;outline: 2px solid #f9d700;}
    .progress.blue .progress-bar:after{background: #0698ff;outline: 2px solid #0698ff;}
	@-webkit-keyframes animate-positive{0% { width: 0; }}
	@keyframes animate-positive{0% { width: 0; }} </style>';
	}
	
   /**
	 * Shortcode Generator  
	 *
	 * @since    1.0.0
	 */

	 public	function cpb_shortcode_generator ($atts){

			ob_start();
			global $post;
			$post_id =  $atts['id'];
			$template_id = get_post_meta( $post_id, 'cpb_progressbar_template_id', false );
			$progressbar_data = get_post_meta( $post_id, 'progressbar_repeatable_fields', true );
			$template_id = empty($template_id) ? 0 : $template_id;
			
			switch ($template_id[0]) {
				case "template1":
					echo Creative_progress_bar_Public::cpb_template1($post_id,$progressbar_data);
					break;
				case "template2":
				    echo Creative_progress_bar_Public::cpb_template2($post_id,$progressbar_data);
					break;
				case "template3":
				    echo Creative_progress_bar_Public::cpb_template3($post_id,$progressbar_data);
					break;
				case "template4":
				    echo Creative_progress_bar_Public::cpb_template4($post_id,$progressbar_data);
					break;
				case "template5":
				    echo Creative_progress_bar_Public::cpb_template5($post_id,$progressbar_data);
					break;
				case "template6":
				    echo Creative_progress_bar_Public::cpb_template6($post_id,$progressbar_data);
					break;
				default:
					echo Creative_progress_bar_Public::cpb_template1($post_id,$progressbar_data);
			} ?>
			
		<?php 
		return ob_get_clean();
		}
}
