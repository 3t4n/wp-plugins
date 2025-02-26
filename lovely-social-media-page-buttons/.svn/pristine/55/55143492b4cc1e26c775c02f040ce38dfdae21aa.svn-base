<?php
/**
* Plugin Name: Lovely Social Media Page Buttons
* Plugin URI: http://techsini.com/our-wordpress-plugins/lovely-social-media-page-buttons/
* Description: This plugin let you add cool animated social media page icons to the sidebar using the widget or add icons inside the page/post using shortcode.
* Version: 1.0.0
* Author: Shrinivas Naik
* Author URI: http://www.techsini.com
* License: GPL2
*/

if(!class_exists('lovely_social_page_buttons')){

	class lovely_social_page_buttons{


		public function __construct(){

			//Activate the plugin for first time
			register_activation_hook(__FILE__, array($this, "activate"));

			//Load scipts and styles
			add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'register_styles'));

			//Initialize settings page
            require_once(plugin_dir_path(__FILE__) . "plugin-options.php");
            $lovely_social_page_buttons_options = new lovely_social_page_buttons_options;

			//Run the plugin in footer
			add_shortcode( 'lovelysocialpagebuttons', array($this,'run_plugin') );

			//Store options in a variable
            $this->options = get_option( 'lovely_social_page_buttons_settings' );
		}


		public function activate(){

		}

		public function deactivate(){

		}

		public function register_scripts(){

		}

		public function register_styles(){

			wp_enqueue_style( 'mainplugincss', plugins_url('css/style.css', __FILE__) );
			wp_enqueue_style( 'fontawesome', plugins_url('css/fontawesome/css/font-awesome.min.css', __FILE__) );


		}

		public function run_plugin() {

			//Social Media Settings
			$facebook_link = isset($this->options["facebook_link"]) ? $this->options["facebook_link"] : '';
            $googleplus_link = isset($this->options["googleplus_link"]) ? $this->options["googleplus_link"] : '';
            $twitter_link = isset($this->options["twitter_link"]) ? $this->options["twitter_link"] : '';
			$youtube_link = isset($this->options["youtube_link"]) ? $this->options["youtube_link"] : '';
			$linkedin_link = isset($this->options["linkedin_link"]) ? $this->options["linkedin_link"] : '';
            $pinterest_link = isset($this->options["pinterest_link"]) ? $this->options["pinterest_link"] : '';

			if(isset($this->options["credittoauthor"])){
				$credit = $this->options['credittoauthor'];
			} else {
				$credit = 0;
			}

			//Check if social links are added
			$checkifempty = array();
			array_push($checkifempty, $facebook_link, $googleplus_link, $twitter_link, $youtube_link, $linkedin_link, $pinterest_link);

			if(!array_filter($checkifempty)){
				 $nosociallinks_msg = 'Please add your social media page links in the <a href="'. esc_url( get_admin_url(null, 'options-general.php?page=lovely-social-page-buttons-settings') ) .'">Plugin Settings</a> page';
				 echo $nosociallinks_msg;
			}

			ob_start();
			?>

			<ul class="lovely-social-page-buttons">

				<?php if(!empty($facebook_link)){ ?>
				<li>
					<a href="<?php echo $facebook_link; ?>" target="_blank" class="social-fb-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-facebook fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-facebook fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

				<?php if(!empty($googleplus_link)){ ?>
				<li>
					<a href="<?php echo $googleplus_link; ?>" target="_blank" class="social-google-plus-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-google-plus fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-google-plus fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

				<?php if(!empty($twitter_link)){ ?>
				<li>
					<a href="<?php echo $twitter_link; ?>" target="_blank" class="social-twitter-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-twitter fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-twitter fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

				<?php if(!empty($youtube_link)){ ?>
				<li>
					<a href="<?php echo $youtube_link; ?>" target="_blank" class="social-youtube-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-youtube fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-youtube fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

				<?php if(!empty($linkedin_link)){ ?>
				<li>
					<a href="<?php echo $linkedin_link; ?>" target="_blank" class="social-linkedin-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-linkedin-square fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-linkedin-square fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

				<?php if(!empty($pinterest_link)){ ?>
				<li>
					<a href="<?php echo $pinterest_link; ?>" target="_blank" class="social-pinterest-icon">
						<div class="lovely-social-page-buttons-inner-wrapper">
							<i class="fa fa-pinterest-square fa-2x social-icon-1" aria-hidden="true"></i>
							<i class="fa fa-pinterest-square fa-2x social-icon-2" aria-hidden="true"></i>
						</div>
					</a>
				</li>
				<?php } ?>

			</ul>

			<?php
				if($credit != "0"){
					?>
					<span class="lsp_buttons_credit">Plugin by <a href="http://techsini.com">TechSini</a></span>
					<?php
				}

			?>

			<?php
			return ob_get_clean();



		}

	}

}



$lovely_social_page_buttons = new lovely_social_page_buttons();





/**
 * Add Lovely Social Page Buttons
 */
class lovely_social_page_buttons_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'lovely_social_page_buttons', // Base ID
			'Lovely Social Page Buttons', // Name
			'Lovely Social Page Buttons' // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		$obj = new lovely_social_page_buttons;
		$myvar = $obj->run_plugin();
		echo $myvar;

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = $instance['title'] ;
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php 'Title:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class


// register widget
function register_lovely_social_page_buttons_widget() {
    register_widget( 'lovely_social_page_buttons_widget' );
}
add_action( 'widgets_init', 'register_lovely_social_page_buttons_widget' );
?>
