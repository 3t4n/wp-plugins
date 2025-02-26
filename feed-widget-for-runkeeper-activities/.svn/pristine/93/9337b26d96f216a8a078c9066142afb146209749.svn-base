<?php
// Block direct requests
if (!defined('ABSPATH')) {
	die('-1');
}

/**
 * Description of Output
 *
 * @author Ginchen
 */
if (!class_exists('GRKW_Output')) {

	class GRKW_Output {

		/**
		 * Outputs the beginning of the widget, the title, and the logo.
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function outputWidgetHeader($args, $instance) {
			echo $args['before_widget'];
			// display widget title
			if (!empty($instance['title'])) {
				echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
			}
			$cssClass = ($instance['showlogo'] ? '' : ' nologo');
			echo '<div class="grkw-widget' . $cssClass . '">';
			// display Runkeeper logo
			if ($instance['showlogo']) {
				echo '<div class="grwk-header"><img class="grkw-logo" src="' .
				plugin_dir_url(__FILE__) . 'img/runkeeper-logo.png"></div>';
			}
		}

		/**
		 * Outputs the end of the widget.
		 * @param array $args     Widget arguments.
		 */
		public function outputWidgetFooter($args) {
			echo "</div>";
			echo $args['after_widget'];
		}

		/**
		 * Displays the list of Runkeeper activities.
		 * @param object $activities The activities object returned by Runkeeper.
		 * @param object $instance The Widget instance.
		 */
		public function outputActivities($activities, $instance) {
			echo '<div class="grkw-activities">';

			// for each activity:
			foreach ($activities->items as $item) {

				echo '<div class="grkw-activity">';

				// display the type (e.g. Cycling, Walking, ...)
				echo '<span class="grkw-type">' . __($item->type, 'grkw')
				. '</span>';

				// display date, if desired
				if ($instance['showdate'] == "true") {
					echo '<span class="grkw-date">' . gmdate($instance['dateformat'], strtotime($item->start_time));

					// also display time, if desired
					if ($instance['showtime'] == "true") {
						echo ", " . gmdate($instance['timeformat'], strtotime($item->start_time));
					}

					echo '</span>';
				}

				echo '<div class="grkw-workout-values">';

				// display distance, if desired
				if ($instance['showdistance'] == "true") {
					echo '<span class="grkw-distance"><span class="grkw-title">' .
					__('Distance', 'grkw') . '</span> <span class="grkw-value">' .
					self::getLocalizedDistance($item->total_distance, $instance['unit']) . #
					' <span class="grkw-unit">' . __($instance['unit'], 'grkw') .
					'</span></span></span>';
				}

				// display duration, if desired
				if ($instance['showduration']) {
					echo '<span class="grkw-duration"><span class="grkw-title">' .
					__('Duration', 'grkw') . '</span> <span class="grkw-value">' .
					gmdate("H:i:s", $item->duration) .
					' <span class="grkw-unit">' . __('h:m:s', 'grkw') . '</span></span></span>';
				}

				// display speed, if desired
				if ($instance['showspeed'] == "true") {
					$speedUnit = array(
						'km' => __('km/h', 'grkw'),
						'miles' => __('mph', 'grkw')
					);
					echo '<span class="grkw-speed"><span class="grkw-title">' .
					__('Speed', 'grkw') . '</span> <span class="grkw-value">' .
					self::getAverageSpeed($item->total_distance, $item->duration, $instance['unit'])
					. ' <span class="grkw-unit">' . $speedUnit[$instance['unit']] .
					'</span></span></span>';
				}

				// display calories, if desired
				if ($instance['showcalories'] == "true") {
					echo '<span class="grkw-calories"><span class="grkw-title">' .
					__('Burned', 'grkw') . '</span> <span class="grkw-value">' . $item->total_calories . ' <span class="grkw-unit">' . __('kcal', 'grkw') . '</span></span></span>';
				}

				echo '</div></div>';
			}
			echo '</div>';
		}

		/**
		 * Converts a distance given in meters into kilometers or miles.
		 * @param int $distance The distance in meters.
		 * @param int $unit The target unit ("km" or "miles").
		 * @return string The converted distance, formatted for output.
		 */
		public function getLocalizedDistance($distance, $unit) {
			$newDistance = $distance / 1000;
			if ($unit === "miles") {
				$newDistance = $distance / 1609.344;
			}
			$newDistance = round($newDistance, 2);
			return $newDistance;
		}

		/**
		 * Calculates the average speed from a distance and time.
		 * @param int $distance The distance in meters.
		 * @param int $duration The duration in seconds.
		 * @param string $unit The target unit ("km" or "miles").
		 * @return string The average speed, formatted for output.
		 */
		public function getAverageSpeed($distance, $duration, $unit) {
			$speed = $distance / $duration * 60 * 60;
			switch ($unit) {
				case "miles":
					$speed /= 1609.344;
					break;
				default:
					$speed /= 1000;
			}
			$speed = round($speed, 1);
			return $speed;
		}

		/**
		 * Displays the "Connect to Runkeeper" button.
		 * @param type $clientId The Client ID of the user's Runkeeper app.
		 */
		public function displayConnectButton($clientId) {
			echo '<p>' .
			__('Click the button below and authorize your own app on Runkeeper.', 'grkw') .
			'</p>
			<a class="connect-button" href="https://runkeeper.com/apps/authorize?client_id=' .
			$clientId . '&redirect_uri=' . urlencode(get_permalink()) . '&response_type=code">
					<img src="' . plugin_dir_url(__FILE__) . 'img/connect-healthgraph.png">' .
			'</a>';
		}

		/**
		 * Displays an error message, if activities could not be loaded.
		 * @param object $activities The activities object returned by Runkeeper.
		 */
		public function displayAuthorizationError($reason) {
			echo '<p>';
			if ($reason === "Revoked") {
				printf(__('Authorization has been revoked. You need to re-authorize your Runkeeper app. %sClick here%s.', 'grkw'), '<a href="' . get_permalink() . '">', '</a>');
				// wipe out the token - a new one needs to be fetched
				update_option('grkw_access_token', '');
			} else {
				_e("Activities could not be loaded, or you don't have any yet.", 'grkw');
			}
			echo '</p>';
		}

		/**
		 * A form to ask the user for the Client ID and Client Secret of his Runkeeper app.
		 */
		public function clientIdForm() {
			?>
			<p><?php _e('You need to create a Runkeeper app in order to use the API.', 'grkw'); ?></p>

			<p><?php printf(__('Please visit %sthis link%s, and fill out "Application Name", "Description", and "Organization". (It does not matter what exactly you enter.) Then click "Register Application".', 'grkw'), '<a href="https://runkeeper.com/partner/applications/register">', '</a>'); ?></p>			

			<p><?php _e('After that, click "Keys and URLs" to obtain the keys for the next step.', 'grkw'); ?></p>

			<hr>

			<form class="grkw-form" action="<?php the_permalink(); ?>" method="post">
				<?php _e('Please enter the Client ID and Client Secret of the Runkeeper app that you created', 'grkw'); ?>:<br>
				<small>(<?php printf(__('Visit %sthis link%s and click "Keys and URLs" to find it.', 'grkw'), '<a href="https://runkeeper.com/partner/applications/">', '</a>'); ?>)</small><br>
				<label for="client_id">Client ID:</label>
				<input type="text" name="client_id" /><br>
				<label for="client_id">Client Secret:</label>
				<input type="text" name="client_secret" /><br>
				<input type="submit" />
			</form>
			<?php
		}

		/**
		 * Back-end widget form.
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function displayForm($instance) {
			// $instance['title'] ---> $title
			extract($instance);
			?>

			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php printf(__('Title %s(leave empty, if no title is desired)%s', 'grkw'), '<small>', '</small>'); ?>:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('numposts'); ?>"><?php _e('Number of posts', 'grkw'); ?>:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('numposts'); ?>" name="<?php echo $this->get_field_name('numposts'); ?>" type="number" value="<?php echo esc_attr($numposts); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('unit'); ?>"><?php _e('Distance unit', 'grkw'); ?>:</label>
				<select class="widefat" id="<?php echo $this->get_field_id('unit'); ?>" name="<?php echo $this->get_field_name('unit'); ?>">
					<option value="km"<?php echo $unit === "km" ? ' selected' : ''; ?>><?php _e('km', 'grkw'); ?></option>
					<option value="miles"<?php echo $unit === "miles" ? ' selected' : ''; ?>><?php _e('miles', 'grkw'); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showlogo'); ?>"><?php _e('Display Runkeeper logo?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showlogo'); ?>" name="<?php echo $this->get_field_name('showlogo'); ?>" type="checkbox"<?php echo $showlogo ? ' checked' : ''; ?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showdate'); ?>"><?php _e('Display workout date?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showdate'); ?>" name="<?php echo $this->get_field_name('showdate'); ?>" type="checkbox"<?php echo $showdate ? ' checked' : ''; ?> onchange="document.getElementById('<?php echo $this->get_field_id('showtime'); ?>').disabled = (!this.checked);">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showtime'); ?>"><?php _e('Display workout time?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showtime'); ?>" name="<?php echo $this->get_field_name('showtime'); ?>" type="checkbox"<?php
			echo $showtime ? ' checked' : '';
			echo $showdate ? '' : 'disabled';
			?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showdistance'); ?>"><?php _e('Display distance?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showdistance'); ?>" name="<?php echo $this->get_field_name('showdistance'); ?>" type="checkbox"<?php echo $showdistance ? ' checked' : ''; ?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showduration'); ?>"><?php _e('Display duration?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showduration'); ?>" name="<?php echo $this->get_field_name('showduration'); ?>" type="checkbox"<?php echo $showduration == true ? ' checked' : ''; ?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showspeed'); ?>"><?php _e('Display average speed?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showspeed'); ?>" name="<?php echo $this->get_field_name('showspeed'); ?>" type="checkbox"<?php echo $showspeed == true ? ' checked' : ''; ?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('showcalories'); ?>"><?php _e('Display burned calories?', 'grkw'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('showcalories'); ?>" name="<?php echo $this->get_field_name('showcalories'); ?>" type="checkbox"<?php echo $showcalories == true ? ' checked' : ''; ?>>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('dateformat'); ?>"><?php printf(__('Date format %s(use %sPHP date formats%s)%s', 'grkw'), '<small>', '<a href="http://php.net/manual/en/function.date.php">', '</a>', '</small>'); ?>:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('dateformat'); ?>" name="<?php echo $this->get_field_name('dateformat'); ?>" type="text" value="<?php echo esc_attr($dateformat); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('timeformat'); ?>"><?php printf(__('Time format %s(use %sPHP date formats%s)%s', 'grkw'), '<small>', '<a href="http://php.net/manual/en/function.date.php">', '</a>', '</small>'); ?>:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('timeformat'); ?>" name="<?php echo $this->get_field_name('timeformat'); ?>" type="text" value="<?php echo esc_attr($timeformat); ?>">
			</p>
			<?php
		}

	}

}