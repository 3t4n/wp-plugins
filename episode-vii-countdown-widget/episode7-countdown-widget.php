<?php
/**
 * Plugin Name: Episode VII Countdown Widget
 * Plugin URI: http://www.leiaslibrary.se/episode-vii-countdown-widget
 * Description: Countdown widget with multiple options counting down days, hours and minutes to the upcoming Star Wars: Episode VII - The Force Awakens movie.
 * Version: 1.2
 * Author: Tomas Lundholm
 * Author URI: http://www.leiaslibrary.se
 * License: GPL2
 */
/*
Copyright 2014  Tomas Lundholm  (email : hello@leiaslibrary.se)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 /**
 * Adds Countdown widget.
 */
class WB_Countdown_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wb_countdown_widget', // Base ID
			__('Episode VII Countdown', 'text_domain'), // Name
			array( 'description' => __( 'Counting down days, hours and minutes to the premiere of Star Wars: Episode VII', 'text_domain' ), ) // Args
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
        require('layout.php');
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		}

		//Choose background style
		if ( isset( $instance[ 'background' ] ) ) {
			$background = $instance[ 'background' ];
		}
		else {
			$background = __( 'bg01-death-star.jpg', 'text_domain' );
		}
		//Filename to name conversion
		$names = array(
			'bg01-death-star.jpg' => 'Death Star',
			'bg02-vintage-poster.jpg' => 'Vintage Poster',
			'bg03-stormtroopers.jpg' => 'Stormtroopers',
			'bg04-r2d2.jpg' => 'R2-D2',
			'bg05-corusant.jpg' => 'Corusant',
			'bg06-battle.jpg' => 'Battle',
			'bg07-planet.jpg' => 'Planet',
			'bg08-stromtroopers02.jpg' => 'Stormtroopers 2',
			'bg09-single-stromtrooper.jpg' => 'Single Stormtrooper',
			'bg10-boba-fett.jpg' => 'Boba Fett',
			'bg11-hoth-tauntaun.jpg' => 'Hoth Tauntaun',
			'bg12-stardestroyers.jpg' => 'Star Destroyers',
            'bg13-vintage-poster-tfa.jpg' => 'Vintage Poster - TFA',
            'bg14-stardestroyers-tfa.jpg' => 'Star Destroyers - TFA',
            'bg15-planet-tfa.jpg' => 'Planet - TFA',
            'bg16-r2d2-tfa.jpg' => 'R2-D2 - TFA',
            'bg17-stromtroopers-tfa.jpg' => 'Stormtroopers - TFA',
            'bg18-death-star-tfa.jpg' => 'Death Star - TFA',
            'bg19-tfa-logo-xsmall.jpg' => 'TFA Logo - XSmall',
            'bg20-vintage-poster-tfa-xsmall.jpg' => 'Vintage Poster - TFA - XSmall',
            'bg21-tfa-troopers-xsmall.jpg' => 'New Stormtroopers - TFA - XSmall',
            'bg22-tfa-daisy.jpg' => 'Speeder - TFA',
            'bg23-tfa-xwings.jpg' => 'X-wings - TFA',
            'bg24-tfa-falcon.jpg' => 'Falcon - TFA',
            'bg25-tfa-falcon2.jpg' => 'Falcon and TIE Fighters - TFA',
            'bg26-tfa-droid.jpg' => 'Droid - TFA',
            'bg27-tfa-troopers.jpg' => 'New Stormtroopers - TFA'
		);
		$dir = plugin_dir_path( __FILE__ )."bg-images/";
		ob_start();
		if ($handle = opendir($dir)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					$selected = $background == $entry ? 'selected' : '';
					$name = isset($names[$entry]) ? $names[$entry] : $entry;
					echo "<option value='$entry' $selected>$name</option>";
				}
			}
			closedir($handle);
		}
		$backgroundOptions = ob_get_contents();
		ob_end_clean();



		if ( isset( $instance[ 'style' ] ) ) {
			$style = $instance[ 'style' ];
		}
		else {
			$style = __( 'light', 'text_domain' );
		}
		$styleOptions = array('light' => 'Light', 'dark' => 'Dark');

		if ( isset( $instance[ 'date' ] ) ) {
			$date = $instance[ 'date' ];
		}
		else {
			$targetDate   = '2015-12-18';
			$date = __( $targetDate, 'text_domain' );
		}

		if ( isset( $instance[ 'hour' ] ) ) {
			$hour = $instance[ 'hour' ];
		}
		else {
			$hour = __( '00', 'text_domain' );
		}

		if ( isset( $instance[ 'min' ] ) ) {
			$min = $instance[ 'min' ];
		}
		else {
			$min = __( '00', 'text_domain' );
		}

		if ( isset( $instance[ 'sec' ] ) ) {
			$sec = $instance[ 'sec' ];
		}
		else {
			$sec = __( '00', 'text_domain' );
		}

		if ( isset( $instance[ 'title_days' ] ) ) {
			$title_days = $instance[ 'title_days' ];
		}
		else {
			$title_days = __( 'Days', 'text_domain' );
		}

		if ( isset( $instance[ 'title_hours' ] ) ) {
			$title_hours = $instance[ 'title_hours' ];
		}
		else {
			$title_hours = __( 'Hours', 'text_domain' );
		}

		if ( isset( $instance[ 'title_minutes' ] ) ) {
			$title_minutes = $instance[ 'title_minutes' ];
		}
		else {
			$title_minutes = __( 'Mins', 'text_domain' );
		}

		if ( isset( $instance[ 'timezone' ] ) ) {
			$timezone = $instance[ 'timezone' ];
		}
		else {
			$timezone = __( '+0000', 'text_domain' );
		}

		if ( isset( $instance[ 'author' ] ) ) {
			$author = $instance[ 'author' ];
		}
		else {
			$author = false;
		}


		?>

		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php _e( 'Choose Background Style:' ); ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('background'); ?>" name="<?php echo $this->get_field_name('background'); ?>" type="text">
				<?php echo $backgroundOptions; ?>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Choose Countdown Style:' ); ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" type="text">
				<?php foreach($styleOptions as $so => $val): ?>
					<option value='<?php echo $so;?>' <?php echo ($style == $so) ? 'selected':''; ?> >
						<?php echo $val;?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>


        <p>
            <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Target Date:'); ?></label><br/>
            <input style="width: 90px;" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $date; ?>" class="wb-datepicker"/>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('hour'); ?>"><?php _e('Target Time (HH:MM:SS):'); ?></label><br/>
            <input style="width: 30px;" id="<?php echo $this->get_field_id('hour'); ?>" name="<?php echo $this->get_field_name('hour'); ?>" type="text" value="<?php echo $hour; ?>" />:
			<input style="width: 30px;" id="<?php echo $this->get_field_id('min'); ?>" name="<?php echo $this->get_field_name('min'); ?>" type="text" value="<?php echo $min; ?>" />:
			<input style="width: 30px;" id="<?php echo $this->get_field_id('sec'); ?>" name="<?php echo $this->get_field_name('sec'); ?>" type="text" value="<?php echo $sec; ?>" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_days' ); ?>"><?php _e( '"Days" title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_days' ); ?>" name="<?php echo $this->get_field_name( 'title_days' ); ?>" type="text" value="<?php echo esc_attr( $title_days ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_hours' ); ?>"><?php _e( '"Hours" title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_hours' ); ?>" name="<?php echo $this->get_field_name( 'title_hours' ); ?>" type="text" value="<?php echo esc_attr( $title_hours ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_minutes' ); ?>"><?php _e( '"Minutes" title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_minutes' ); ?>" name="<?php echo $this->get_field_name( 'title_minutes' ); ?>" type="text" value="<?php echo esc_attr( $title_minutes ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'timezone' ); ?>"><?php _e( 'Timezone:' ); ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('timezone'); ?>" name="<?php echo $this->get_field_name('timezone'); ?>" >
				<option value="-1200" <?php echo ($timezone == "-1200") ? 'selected':''; ?> >(GMT -12:00) Eniwetok, Kwajalein</option>
				<option value="-1100" <?php echo ($timezone == "-1100") ? 'selected':''; ?> >(GMT -11:00) Midway Island, Samoa</option>
				<option value="-1000" <?php echo ($timezone == "-1000") ? 'selected':''; ?> >(GMT -10:00) Hawaii</option>
				<option value="-0900" <?php echo ($timezone == "-0900") ? 'selected':''; ?> >(GMT -9:00) Alaska</option>
				<option value="-0800" <?php echo ($timezone == "-0800") ? 'selected':''; ?> >(GMT -8:00) Pacific Time (US &amp; Canada)</option>
				<option value="-0700" <?php echo ($timezone == "-0700") ? 'selected':''; ?> >(GMT -7:00) Mountain Time (US &amp; Canada)</option>
				<option value="-0600" <?php echo ($timezone == "-0600") ? 'selected':''; ?> >(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
				<option value="-0500" <?php echo ($timezone == "-0500") ? 'selected':''; ?> >(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
				<option value="-0400" <?php echo ($timezone == "-0400") ? 'selected':''; ?> >(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
				<option value="-0350" <?php echo ($timezone == "-0350") ? 'selected':''; ?> >(GMT -3:30) Newfoundland</option>
				<option value="-0300" <?php echo ($timezone == "-0300") ? 'selected':''; ?> >(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
				<option value="-0200" <?php echo ($timezone == "-0200") ? 'selected':''; ?> >(GMT -2:00) Mid-Atlantic</option>
				<option value="-0100" <?php echo ($timezone == "-0100") ? 'selected':''; ?> >(GMT -1:00 hour) Azores, Cape Verde Islands</option>
				<option value="+0000" <?php echo ($timezone == "+0000") ? 'selected':''; ?> >(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
				<option value="+0100" <?php echo ($timezone == "+0100") ? 'selected':''; ?> >(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
				<option value="+0200" <?php echo ($timezone == "+0200") ? 'selected':''; ?> >(GMT +2:00) Kaliningrad, South Africa</option>
				<option value="+0300" <?php echo ($timezone == "+0300") ? 'selected':''; ?> >(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
				<option value="+0350" <?php echo ($timezone == "+0350") ? 'selected':''; ?> >(GMT +3:30) Tehran</option>
				<option value="+0400" <?php echo ($timezone == "+0400") ? 'selected':''; ?> >(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
				<option value="+0450" <?php echo ($timezone == "+0450") ? 'selected':''; ?> >(GMT +4:30) Kabul</option>
				<option value="+0500" <?php echo ($timezone == "+0500") ? 'selected':''; ?> >(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
				<option value="+0550" <?php echo ($timezone == "+0550") ? 'selected':''; ?> >(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
				<option value="+0575" <?php echo ($timezone == "+0575") ? 'selected':''; ?> >(GMT +5:45) Kathmandu</option>
				<option value="+0600" <?php echo ($timezone == "+0600") ? 'selected':''; ?> >(GMT +6:00) Almaty, Dhaka, Colombo</option>
				<option value="+0700" <?php echo ($timezone == "+0700") ? 'selected':''; ?> >(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
				<option value="+0800" <?php echo ($timezone == "+0800") ? 'selected':''; ?> >(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
				<option value="+0900" <?php echo ($timezone == "+0900") ? 'selected':''; ?> >(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
				<option value="+0950" <?php echo ($timezone == "+0950") ? 'selected':''; ?> >(GMT +9:30) Adelaide, Darwin</option>
				<option value="+1000" <?php echo ($timezone == "+1000") ? 'selected':''; ?> >(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
				<option value="+1100" <?php echo ($timezone == "+1100") ? 'selected':''; ?> >(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
				<option value="+1200" <?php echo ($timezone == "+1200") ? 'selected':''; ?> >(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
			</select>
		</p>

		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id( 'author' ); ?>" name="<?php echo $this->get_field_name('author'); ?>" type="checkbox" <?php echo $author ? 'checked' : '' ?> >
			<label for="<?php echo $this->get_field_id( 'author' ); ?>">Display link to author website?</label>
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
		$instance['background'] = ( ! empty( $new_instance['background'] ) ) ? strip_tags( $new_instance['background'] ) : '';
		$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
		$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
		$instance['hour'] = ( ! empty( $new_instance['hour'] ) ) ? strip_tags( $new_instance['hour'] ) : '';
		$instance['min'] = ( ! empty( $new_instance['min'] ) ) ? strip_tags( $new_instance['min'] ) : '';
		$instance['sec'] = ( ! empty( $new_instance['sec'] ) ) ? strip_tags( $new_instance['sec'] ) : '';
		$instance['title_days'] = ( ! empty( $new_instance['title_days'] ) ) ? strip_tags( $new_instance['title_days'] ) : '';
		$instance['title_hours'] = ( ! empty( $new_instance['title_hours'] ) ) ? strip_tags( $new_instance['title_hours'] ) : '';
		$instance['title_minutes'] = ( ! empty( $new_instance['title_minutes'] ) ) ? strip_tags( $new_instance['title_minutes'] ) : '';
		$instance['timezone'] = ( ! empty( $new_instance['timezone'] ) ) ? strip_tags( $new_instance['timezone'] ) : '';
		$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
		return $instance;
	}

} // class WB_Countdown_Widget

// register WB_Countdown_Widget widget
function register_wb_countdown_widget() {
    register_widget( 'WB_Countdown_Widget' );
}
add_action( 'widgets_init', 'register_wb_countdown_widget' );

//Register JS files
function wb_countdown_scripts() {
    //Scripts
	wp_enqueue_script(
		'Kemar',
		trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/jquery.countdown.js',
		array( 'jquery' )
	);
    //Styles
    wp_register_style( 'Kemar',  trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/stanimira.css', array(), null );
    wp_enqueue_style( 'Kemar' );
}

add_action( 'wp_enqueue_scripts', 'wb_countdown_scripts' );
//JS for backend
add_action( 'admin_enqueue_scripts', 'admin_scripts');
function admin_scripts($hook){
	if( $hook == 'widgets.php' ){
			//jquery datepicker
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_register_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css', array (), '1.10.4' );
			wp_enqueue_style('jquery-ui-css');
			//Uploader css
			wp_enqueue_style('thickbox');


			$plugin_url = plugins_url() .'/'. dirname( plugin_basename(__FILE__) );
			//Widget scripts
			wp_register_script('wb_countdown_admin', trailingslashit( plugin_dir_url( __FILE__ ) ).'js/wb_countdown.js', array ('jquery', 'media-upload', 'thickbox'), '1.2.1' );
			wp_enqueue_script('wb_countdown_admin');
			//Uploader js
			wp_enqueue_script('media-upload');
	        wp_enqueue_script('thickbox');
	}
}
