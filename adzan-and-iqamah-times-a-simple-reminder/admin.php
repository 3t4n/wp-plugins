<?php 

	/*
	Plugin Name: Adzan and Iqamah Times - A Simple Reminder
	Plugin URI: http://wordpress.org/extend/plugins/adzan-and-qamah-times-a-simple-reminder
	Description: Iqamah Times is the first fully-featured application to bring you the iqamah timings of your local masjids with a unique and user-friendly experience. This plugin provides a widget  for displaying daily athan and iqamah timings from iqamah.org
	Version: 1.0
	Author: Imam Herlambang
	Author URI: http://imamherlambang.me
	Author Email: hello@imamherlambang.me
	License: GPLv2
	*/

	require_once 'ajax.php';
	require_once 'settings.php';

	class ait_widget extends WP_Widget {

		/**
 		* Widget Details
 		*
 		* @since 1.0
 		*/

		function ait_widget() {
			$this->WP_Widget( 
				'ait', 'Adzan and Iqamah Times', 
				array( 'description' => 'A widget to Display Adzan and Iqamah Times' ),
				array( 'id_base' => 'ait', 'width' => 300 )
			);
		}



		/**
 		* Form Elements
 		*
 		* @since 1.0
 		*/

		function form( $instance ) {

			//Set up some default widget settings.  
			$defaults		= array( 'ait-title' => __( '', 'ait' ) );  
			$instance		= wp_parse_args( (array) $instance, $defaults ); 
			$ait_settings	= get_option( 'ait_settings' ); ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'ait-title' ); ?>"><?php _e( 'Title:', 'ait' ); ?></label>
    			<input id="<?php echo $this->get_field_id( 'ait-title' ); ?>" class="widefat" type="text" value="<?php echo $instance['ait-title']; ?>" name="<?php echo $this->get_field_name( 'ait-title' ); ?>"></input>
    		</p>
			<p>
				<label for="mt-location"><?php _e( 'Location:', 'ait' ); ?></label>
				<input id="mt-location" size="24" type="text">
				<button class="button alignright" onclick="fetch_masjid(this);" type="button"><?php _e( 'Fetch Masjids', 'ait' ); ?></button>
			</p>
			<p></p>
			<p></p>
			<p>
				<label><?php _e( 'Current Masjid:', 'ait' ); ?></label> <strong><?php echo @($instance['masjid_info']->masjidName)?$instance['masjid_info']->masjidName:'Not Selected' ?></strong>
			</p>

			<script>
				var id_base = 'ait';
				var id_instance = '<?php echo $this->number ?>';

				/**
 				* Fetch Masjid
 				*
 				* @since 1.0
 				*/

				function fetch_masjid( btn ) {

					var button = jQuery( btn );
					var location = button.prev().val();
					var msg = button.parent().next();
					var masjid_list = msg.next();
					if( false == location ) { 
						return alert( 'Location is required.' );
					}
					else {
						button.html( 'Loading...' );
					}

					jQuery.post( 'admin-ajax.php', { 'location': location, 'action': 'get_masjid' }, function( data ) {

						console.dir( data ); // debug only, disable for production purpose. Only applies on JavaScript tag
						if( !data || !data.match( /^\{.+\:.+\}$/ ) ) { 
							return msg.html( '<div class="error">Error. Try Again.</div>' ); 
						}
						data = jQuery.parseJSON( data );
						var code = '', masjid, masjid_id;	// HTML property to show list of found out masjid
						var masjid_iterator = 0 // used for limiting list of masjid found out
						var no_iqamah 		= 0;	// used for iteration var masjid know by iqamah.org
						var no_masjidNA 	= 0;	// used for iteration var masjid didn't recognized by iqamah.org, just show masjid name, can't be selected
						
						for( i in data.masjids ) {
							masjid = data.masjids[i].id; 
							masjid_iterator++;

							if( masjid.substr( 0, 10 ) != 'Iqamah.org' ) { 
								// continue; 
								masjid = masjid.substring( 0 ); 
								code += '<p><input type="radio" disabled> &nbsp; <label>' + masjid + ' <strong>(N/A)</strong> </label></p>';
								no_masjidNA++;
							} else {
								masjid = masjid.substring( 11 );
								masjid_id = Number( masjid.split( ',' )[0] );
								masjid = masjid.substr( masjid.indexOf( ',' ) + 1 );
								code += '<p><input type="radio" id="' + get_field_id(masjid_id) + '" name="' + get_field_name('masjid_id') + '" value="' + masjid_id + '"> &nbsp; <label for="' + get_field_id(masjid_id) + '">' + masjid + '</label></p>';
								no_iqamah++; 
							}
						
							// limit start from 0. Example: limit 3, should use 0..2.
							if (masjid_iterator > <?php echo $ait_settings['searchresult']; ?>) {
								break; 
							}
						}

						if ( no_masjidNA > 0 ) {
							msg.html( '<div class="updated"> ' + data.masjids.length + ' found out of ' + data.masjids.length + ', and ' + no_iqamah + ' \'Iqamah\' masjids found.</div>' );
							msg.html( '<div class="updated"> ' + ' If the Masjid you\'re searching cannot be selected, it is because we don\'t have an Iqamah data. Try registering your Masjid <a href="http://iqamah.org/registration.php" target="_blank">here</a> to get listed on Iqamah.org. ' + '</div>');
						} else {
							msg.html( '<div class="updated"> ' + no_iqamah + ' \'Iqamah\' masjids found out of ' + data.masjids.length + '.</div>' );
						}

						masjid_list.html( code );
						button.html( 'Fetch Masjids' );
					
					});

				}

				/**
 				* Get Field Name
 				*
 				* @since 1.0
 				*/

				function get_field_name( field_name ) {
					return 'widget-' + id_base + '[' + id_instance + '][' + field_name + ']';
				}

				/**
 				* Get Field ID
 				*
 				* @since 1.0
 				*/

				function get_field_id( field_name ) {
					return 'widget-' + id_base + '-' + id_instance + '-' + field_name;
				}
			</script>
			<?php
		}

		/**
		* Public: Output
		*
		* @since 1.0
		*/

		public function widget( $args, $instance ) {

			$title = apply_filters('widget_title', $instance['ait-title'] ); 
			$ait_settings	= get_option( 'ait_settings' );
			extract( $args );
			echo $before_widget;

			$masjid = $instance['masjid_info'];
			//var_dump($masjid);

			if ( $title )  {
    			echo $before_title . $title . $after_title;
    		}
  
			echo "

			<style type=\"text/css\">
				
					table#iqamah-timings { width: 100%; border: 1px solid ".$ait_settings['bordercolor']."; border-collapse: collapse; }
					table#iqamah-timings .masjid-title { padding: 15px; }
					table#iqamah-timings td, th { margin: 3px 5px; padding: 5px 10px;  border: solid 1px ".$ait_settings['bordercolor']."; }
					table#iqamah-timings th { font-weight: bold;  background-color: ".$ait_settings['headingcolor']."; border: solid 1px ".$ait_settings['bordercolor']."; }
					table#iqamah-timings td { background-color: ".$ait_settings['backgroundcolor']."; font-size: 90%; border: solid 1px ".$ait_settings['bordercolor']."; }
					table#iqamah-timings td.prayer-name { text-align: left; }
					table#iqamah-timings td.sunrise, table#iqamah-timings td.prayer-azan, table#iqamah-timings td.prayer-iqamah { text-align: center; }
					
			</style>
			"; ?>
			<table id="iqamah-timings">
				<thead>
					<tr>
						<td class="masjid-title" colspan="3" style="text-align: center;"><strong><?php _e( 'Masjid Timing For ', 'ait' ); ?><?php echo @$masjid->{'masjidName'}; ?></strong></td>
					</tr>
					<tr>
						<th>Prayer</th>
						<th>Adhan</th>
						<th>Iqamah</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( array( 'Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha' ) as $prayer ): ?>
						<tr>
							<td class="prayer-name"><strong><?php echo $prayer ?></strong></td>
							<?php $prayer = strtolower($prayer); $prayerAzan = $prayer . 'Azan'; ?>
							<?php if ( $prayer == "sunrise" ) : ?>
								<td class="sunrise" colspan='2'><?php echo @$masjid->{$prayer}; ?></td>
							<?php else : ?>
								<td class="prayer-azan"><?php echo @$masjid->{$prayerAzan}; ?></td>
							<?php endif; ?>
							<?php if ( $prayer != "sunrise" ) : ?>
								<td class="prayer-iqamah"><?php echo @$masjid->{$prayer}; ?></td>
							<?php else : endif; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php
				echo $after_widget;
		}

		/**
		* Public: Update
		*
		* @since 1.0
		*/
		public function update( $new_instance, $instance ) {
			$instance = $old_instance;
			$instance['ait-title'] = strip_tags( $new_instance['ait-title'] );  

			$api_url = 'http://iqamah.org/api/?id=';
			$masjid_id = $new_instance['masjid_id'];
			$masjid_info = file_get_contents( $api_url . $masjid_id );
			if( !$masjid_info ) $masjid_info = '{ "status": "error" }';
			@$instance['masjid_info'] = json_decode( $masjid_info );
			$instance['masjid_id'] = $masjid_id;
			return $instance;

		}
	}	

	/**
 	* Register widget
 	*
 	* @since 1.0
 	*/

	function ait_register_widget() {

		register_widget( 'ait_widget' );

	}

	add_action( 'widgets_init', 'ait_register_widget' );

?>