<?php
/**
 * Social Media widget
 *
 * @package Meteorite
 */

 class Meteorite_Social_Media extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_social_media_widget', 'description' => __( 'Display social media icons.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Social Media Icons', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_social_media_widget';
	}

	function form( $instance ) {
		$title 		= isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu 	= isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$type 		= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Large';
		$border 	= isset( $instance['border'] ) ? esc_attr( $instance['border'] ) : 'None';
		$animation 	= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';

		// Get menu
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		// If no menu exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menu have been created yet. <a href="%s">Create one</a>.', 'meteorite_extensions'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Information', 'meteorite_extensions' ); ?></h4>
				<p><?php _e('In order to display your social media icons in a widget, all you need to do is go to <strong>Appearance > Menus</strong> and create a menu containing links to your social profiles, then assign that menu here.<br/>Supported networks: Facebook, Twitter, Google Plus, Dribble, Pinterest, Youtube, Flickr, Vimeo, Instagram, Linkedin, Foursquare, Tumblr, Behance, Deviantart, Soundcloud, Spotify, Weibo, Xing, Trello, Github, Twitch, Vine.', 'meteorite_extensions'); ?></p>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Title', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter a widget title.', 'meteorite_extensions' ) ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Menu', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Select your social menu.', 'meteorite_extensions' ) ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>" class="form-control tt-form-element">
							<option value="0"><?php _e( '&mdash; Select &mdash;', 'meteorite_extensions' ) ?></option>
							<?php
							foreach ( $menus as $menu ) {
							echo '<option value="' . $menu->term_id . '"' . selected( $nav_menu, $menu->term_id, false ) . '>'.  $menu->name . '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ) ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Large', 'Small');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Border', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a border style.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('border'); ?>" id="<?php echo $this->get_field_id('border'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Square', 'Rounded', 'Round');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $border == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Animation', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose an animation type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('animation'); ?>" id="<?php echo $this->get_field_id('animation'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Fade In', 'Fade In Up', 'Fade In Left', 'Fade In Right');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $animation == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= sanitize_text_field($new_instance['title']);
		$instance['nav_menu'] 	= (int) $new_instance['nav_menu'];
		$instance['type']		= sanitize_text_field($new_instance['type']);
		$instance['border']		= sanitize_text_field($new_instance['border']);
		$instance['animation'] 	= sanitize_text_field($new_instance['animation']);
		
		return $instance;
	}

	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 		= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 		= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$nav_menu 	= ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
		$type 		= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Large';
		$border 	= isset( $instance['border'] ) ? esc_attr( $instance['border'] ) : 'None';
		$animation 	= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		if ( $instance['type'] == 'Large' ) {
			$type_class = ' type-large';
		} elseif ( $instance['type'] == 'Small' ) {
			$type_class = ' type-small';
		}

		if ( $instance['border'] == 'Square' ) {
			$border_class = ' border-square';
		} elseif ( $instance['border'] == 'Rounded' ) {
			$border_class = ' border-rounded';
		} elseif ( $instance['border'] == 'Round' ) {
			$border_class = ' border-round';
		} else {
			$border_class = ' border-none';
		}

		$animation_class = '';
		if ( $animation == 'Fade In' ) {
			$animation_class = 'fade-in';
		} elseif ( $animation == 'Fade In Up' ) {
			$animation_class = 'fade-in-up';
		} elseif ( $animation == 'Fade In Left' ) {
			$animation_class = 'fade-in-left';
		} elseif ( $animation == 'Fade In Right' ) {
			$animation_class = 'fade-in-right';
		}

		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; }

		if ( $nav_menu ) :
		?>

			<div class="meteorite-social-media <?php echo $animation_class . $border_class . $type_class; ?>">
				<?php wp_nav_menu(
					array( 
						'fallback_cb' => false,
						'menu' => $nav_menu,
						'link_before' => '<div class="meteorite-item"><span class="screen-reader-text">',
						'link_after' => '</span></div>',
						'menu_class' => 'menu social-menu-widget social-icons'
						) 
				); ?>
			</div>
		
		<?php
		else :
			if ( current_user_can('edit_theme_options') ) :
				echo '<div class="no-posts-notice">' . _x('Choose a menu you want to display in the widget settings.', 'no menu info', 'meteorite_extensions') . '</div>';
			endif;
		endif;
		echo $args['after_widget'];

	}
}