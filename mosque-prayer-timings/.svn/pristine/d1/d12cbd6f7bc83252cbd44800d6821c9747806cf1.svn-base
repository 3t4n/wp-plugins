<?php 

/*
Plugin Name: Mosque Prayer Timings
Plugin URI: http://www.wordpress.org/plugins/mosque-prayer-timings
Description: A plugin for Mosques' websites. It helps publish Adhan+Iqamah timings for daily prayers, and Khutba+Iqamah timings of Friday prayers at Masjid.
Version: 1.0
Author: Azkaar Developers
Author URI: http://www.azkaar.com/feedback
License: GPL2
*/


// ACTIVATE PLUGIN
function mpt_plugin_activate() {
	add_option( 'mpt_email_status', 'on', '', 'yes' );
}
register_activation_hook(__FILE__,'mpt_plugin_activate');


// WIDGET CSS
function mpt_scripts() {
	wp_enqueue_style( 'mpt-style', plugins_url( '/mpt-styles.css', __FILE__ ), false, '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'mpt_scripts' );


// REGISTER WIDGET
function mpt_register_widget() {
	register_widget( 'MosquePrayerTimingsWidgetPlugin' );
}
add_action( 'widgets_init', 'mpt_register_widget' );

// WIDGET CLASS
class MosquePrayerTimingsWidgetPlugin extends WP_Widget {

    // constructor
    function MosquePrayerTimingsWidgetPlugin() {
        parent::__construct( false, 'Mosque Prayer Timings' );
    }
	

	// widget form creation
	function form($instance) {

		// Check values
		if( $instance) {

			 $title = esc_attr($instance['title']);
			 $language = esc_attr($instance['language']);
			 $textarea = esc_textarea($instance['textarea']);
			 
			 $fajr_adhan = esc_attr($instance['fajr_adhan']);
			 $fajr_iqamah = esc_attr($instance['fajr_iqamah']);
			 
			 $zuhr_adhan = esc_attr($instance['zuhr_adhan']);
			 $zuhr_iqamah = esc_attr($instance['zuhr_iqamah']);
			 
			 $asr_adhan = esc_attr($instance['asr_adhan']);
			 $asr_iqamah = esc_attr($instance['asr_iqamah']);
			 
			 $maghrib_adhan = esc_attr($instance['maghrib_adhan']);
			 $maghrib_iqamah = esc_attr($instance['maghrib_iqamah']);
			 
			 $isha_adhan = esc_attr($instance['isha_adhan']);
			 $isha_iqamah = esc_attr($instance['isha_iqamah']);
			 
			 $jumua_khutba1 = esc_attr($instance['jumua_khutba1']);
			 $jumua_iqamah1 = esc_attr($instance['jumua_iqamah1']);
			 
			 $jumua_khutba2 = esc_attr($instance['jumua_khutba2']);
			 $jumua_iqamah2 = esc_attr($instance['jumua_iqamah2']);
			 
			 $jumua_khutba3 = esc_attr($instance['jumua_khutba3']);
			 $jumua_iqamah3 = esc_attr($instance['jumua_iqamah3']);
			 
			 $admin_email = esc_attr($instance['admin_email']);
			 
		} else {

			$title = '';
			 $language = '';
			 $textarea = '';
			 $fajr_adhan = '';
			 $fajr_iqamah = '';
			 $zuhr_adhan = '';
			 $zuhr_iqamah = '';
			 $asr_adhan = '';
			 $asr_iqamah = '';
			 $maghrib_adhan = '';
			 $maghrib_iqamah = '';
			 $isha_adhan = '';
			 $isha_iqamah = '';
			 $jumua_khutba1 = '';
			 $jumua_iqamah1 = '';
			 $jumua_khutba2 = '';
			 $jumua_iqamah2 = '';
			 $jumua_khutba3 = '';
			 $jumua_iqamah3 = '';
			 $admin_email = '';

		}
		?>

		<p>
		<b><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
		<b><label for="<?php echo $this->get_field_id('language'); ?>"><?php _e('Language', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b>
		<select class="widefat" id="<?php echo $this->get_field_id('language'); ?>" name="<?php echo $this->get_field_name('language'); ?>" >
			<option <?php if ($language == "Arabic") echo "selected"; ?>>Arabic</option>
			<option <?php if ($language == "English") echo "selected"; ?>>English</option>
			<option <?php if ($language == "Urdu") echo "selected"; ?>>Urdu</option>
			
			<?php
				/*
				$options = array('Arabic', 'English', 'Urdu');
				foreach ($options as $option) {
					echo '<option value="' . $option . '" id="' . $option . '"', $select == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				*/
			?>
		</select>
		</p>

		<p>
		<b><label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Note', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
		</p>

		<table>
			<tr>
				<td>&nbsp;</td>
				<td>Adhan</td>
				<td>Iqamah</td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('fajr_adhan'); ?>"><?php _e('Fajr ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('fajr_adhan'); ?>" name="<?php echo $this->get_field_name('fajr_adhan'); ?>" type="text" value="<?php echo $fajr_adhan; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('fajr_iqamah'); ?>" name="<?php echo $this->get_field_name('fajr_iqamah'); ?>" type="text" value="<?php echo $fajr_iqamah; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('zuhr_adhan'); ?>"><?php _e('Zuhr ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('zuhr_adhan'); ?>" name="<?php echo $this->get_field_name('zuhr_adhan'); ?>" type="text" value="<?php echo $zuhr_adhan; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('zuhr_iqamah'); ?>" name="<?php echo $this->get_field_name('zuhr_iqamah'); ?>" type="text" value="<?php echo $zuhr_iqamah; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('asr_adhan'); ?>"><?php _e('Asr ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('asr_adhan'); ?>" name="<?php echo $this->get_field_name('asr_adhan'); ?>" type="text" value="<?php echo $asr_adhan; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('asr_iqamah'); ?>" name="<?php echo $this->get_field_name('asr_iqamah'); ?>" type="text" value="<?php echo $asr_iqamah; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('maghrib_adhan'); ?>"><?php _e('Maghrib ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('maghrib_adhan'); ?>" name="<?php echo $this->get_field_name('maghrib_adhan'); ?>" type="text" value="<?php echo $maghrib_adhan; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('maghrib_iqamah'); ?>" name="<?php echo $this->get_field_name('maghrib_iqamah'); ?>" type="text" value="<?php echo $maghrib_iqamah; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('isha_adhan'); ?>"><?php _e('Isha ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('isha_adhan'); ?>" name="<?php echo $this->get_field_name('isha_adhan'); ?>" type="text" value="<?php echo $isha_adhan; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('isha_iqamah'); ?>" name="<?php echo $this->get_field_name('isha_iqamah'); ?>" type="text" value="<?php echo $isha_iqamah; ?>" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>Khutba</td>
				<td>Iqamah</td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('jumua_khutba1'); ?>"><?php _e('Jumua&nbsp;1 ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_khutba1'); ?>" name="<?php echo $this->get_field_name('jumua_khutba1'); ?>" type="text" value="<?php echo $jumua_khutba1; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_iqamah1'); ?>" name="<?php echo $this->get_field_name('jumua_iqamah1'); ?>" type="text" value="<?php echo $jumua_iqamah1; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('jumua_khutba2'); ?>"><?php _e('Jumua&nbsp;2 ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_khutba2'); ?>" name="<?php echo $this->get_field_name('jumua_khutba2'); ?>" type="text" value="<?php echo $jumua_khutba2; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_iqamah2'); ?>" name="<?php echo $this->get_field_name('jumua_iqamah2'); ?>" type="text" value="<?php echo $jumua_iqamah2; ?>" /></td>
			</tr>
			<tr>
				<td><b><label for="<?php echo $this->get_field_id('jumua_khutba3'); ?>"><?php _e('Jumua&nbsp;3 ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_khutba3'); ?>" name="<?php echo $this->get_field_name('jumua_khutba3'); ?>" type="text" value="<?php echo $jumua_khutba3; ?>" /></td>
				<td><input class="widefat" id="<?php echo $this->get_field_id('jumua_iqamah3'); ?>" name="<?php echo $this->get_field_name('jumua_iqamah3'); ?>" type="text" value="<?php echo $jumua_iqamah3; ?>" /></td>
			</tr>
		</table>
		<input class="widefat" id="<?php echo $this->get_field_id('last_updated'); ?>" name="<?php echo $this->get_field_name('last_updated'); ?>" type="hidden" value="<?php echo date("Y M d", time()) ?>" />
		<hr>
		<b><label for="<?php echo $this->get_field_id('admin_email'); ?>"><?php _e('Admin Email Address ', 'MosquePrayerTimingsWidgetPlugin'); ?></label></b><br>
		<small>(For a reminder on 1st and 15th of the month for time updates)</small><br>
		<input class="widefat" id="<?php echo $this->get_field_id('admin_email'); ?>" name="<?php echo $this->get_field_name('admin_email'); ?>" type="text" value="<?php echo $admin_email; ?>" />

		<?php
		
	} // form
 
	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['language'] = strip_tags($new_instance['language']);
		$instance['fajr_adhan'] = strip_tags($new_instance['fajr_adhan']);
		$instance['fajr_iqamah'] = strip_tags($new_instance['fajr_iqamah']);
		$instance['zuhr_adhan'] = strip_tags($new_instance['zuhr_adhan']);
		$instance['zuhr_iqamah'] = strip_tags($new_instance['zuhr_iqamah']);
		$instance['asr_adhan'] = strip_tags($new_instance['asr_adhan']);
		$instance['asr_iqamah'] = strip_tags($new_instance['asr_iqamah']);
		$instance['maghrib_adhan'] = strip_tags($new_instance['maghrib_adhan']);
		$instance['maghrib_iqamah'] = strip_tags($new_instance['maghrib_iqamah']);
		$instance['isha_adhan'] = strip_tags($new_instance['isha_adhan']);
		$instance['isha_iqamah'] = strip_tags($new_instance['isha_iqamah']);
		$instance['jumua_khutba1'] = strip_tags($new_instance['jumua_khutba1']);
		$instance['jumua_iqamah1'] = strip_tags($new_instance['jumua_iqamah1']);
		$instance['jumua_khutba2'] = strip_tags($new_instance['jumua_khutba2']);
		$instance['jumua_iqamah2'] = strip_tags($new_instance['jumua_iqamah2']);
		$instance['jumua_khutba3'] = strip_tags($new_instance['jumua_khutba3']);
		$instance['jumua_iqamah3'] = strip_tags($new_instance['jumua_iqamah3']);
		$instance['textarea'] = strip_tags($new_instance['textarea']);
		$instance['last_updated'] = strip_tags($new_instance['last_updated']);
		$instance['admin_email'] = strip_tags($new_instance['admin_email']);
		return $instance;
	} 

		
	// display widget
	function widget($args, $instance) {
		
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$language = $instance['language'];
		$fajr_adhan = $instance['fajr_adhan'];
		$fajr_iqamah = $instance['fajr_iqamah'];
		$zuhr_adhan = $instance['zuhr_adhan'];
		$zuhr_iqamah = $instance['zuhr_iqamah'];
		$asr_adhan = $instance['asr_adhan'];
		$asr_iqamah = $instance['asr_iqamah'];
		$maghrib_adhan = $instance['maghrib_adhan'];
		$maghrib_iqamah = $instance['maghrib_iqamah'];
		$isha_adhan = $instance['isha_adhan'];
		$isha_iqamah = $instance['isha_iqamah'];
		$jumua_khutba1 = $instance['jumua_khutba1'];
		$jumua_iqamah1 = $instance['jumua_iqamah1'];
		$jumua_khutba2 = $instance['jumua_khutba2'];
		$jumua_iqamah2 = $instance['jumua_iqamah2'];
		$jumua_khutba3 = $instance['jumua_khutba3'];
		$jumua_iqamah3 = $instance['jumua_iqamah3'];
		$textarea = $instance['textarea'];
		$last_updated = $instance['last_updated'];
		$admin_email = $instance['admin_email'];
		$admin_email = trim($admin_email);
		



		// Language labels
		$adhan_label = "Adhan";
		$iqamah_label = "Iqamah";
		$fajr_label = "Fajr";
		$zuhr_label = "Zuhr";
		$asr_label = "Asr";
		$maghrib_label = "Maghrib";
		$isha_label = "Isha";
		$khutba_label = "Speech";
		$jumua_label = "Jumua";
		$class_label = "ltr";
		$language_xml = '<?xml version="1.0" encoding="UTF-8"?>
			<languages>
				<language>
					<title>Arabic</title>
					<adhan>الاذان</adhan>
					<iqamah>الاقامہ</iqamah>
					<fajr>الفجر</fajr>
					<zuhr>الظہر</zuhr>
					<asr>العصر</asr>
					<maghrib>المغرب</maghrib>
					<isha>العشاء</isha>
					<khutba>الخطبہ</khutba>
					<jumua>الجمعہ</jumua>
					<cssclass>right-to-left</cssclass>
				</language>
				<language>
					<title>English</title>
					<adhan>Adhan</adhan>
					<iqamah>Prayer</iqamah>
					<fajr>Fajr</fajr>
					<zuhr>Zuhr</zuhr>
					<asr>Asr</asr>
					<maghrib>Maghrib</maghrib>
					<isha>Isha</isha>
					<khutba>Speech</khutba>
					<jumua>Jumua</jumua>
					<cssclass>left-to-right</cssclass>
				</language>
				<language>
					<title>Urdu</title>
					<adhan>اذان</adhan>
					<iqamah>نماز</iqamah>
					<fajr>فجر</fajr>
					<zuhr>ظہر</zuhr>
					<asr>عصر</asr>
					<maghrib>مغرب</maghrib>
					<isha>عشاء</isha>
					<khutba>بیان</khutba>
					<jumua>جمعہ</jumua>
					<cssclass>right-to-left</cssclass>
				</language>
			</languages>		
		';

		$languages = simplexml_load_string($language_xml);

		foreach ($languages as $lang) {
			if ($lang->title == $language) {
				$adhan_label = $lang->adhan;
				$iqamah_label = $lang->iqamah;
				$fajr_label = $lang->fajr;
				$zuhr_label = $lang->zuhr;
				$asr_label = $lang->asr;
				$maghrib_label = $lang->maghrib;
				$isha_label = $lang->isha;
				$khutba_label = $lang->khutba;
				$jumua_label = $lang->jumua;
				$class_label = $lang->cssclass;
			}
		}


		// Widget data
		$widget_data .= '';
		
		$widget_data .= $before_widget;

		$widget_data .= $before_title . $title . $after_title;
		$widget_data .= '<p class="mpt_note">'.$textarea.'</p>';

		$widget_data .= '<table class="'.$class_label.'"><tr><th>&nbsp;</th><th>'.$adhan_label.'</th><th>'.$iqamah_label.'</th></tr>';
		$widget_data .= '<tr class="mpt_daily"><td class="mpt_label">'.$fajr_label.'</td><td class="mpt_time">'.$fajr_adhan.'</td><td class="mpt_time">'.$fajr_iqamah.'</td></tr>';
		$widget_data .= '<tr class="mpt_daily"><td class="mpt_label">'.$zuhr_label.'</td><td class="mpt_time">'.$zuhr_adhan.'</td><td class="mpt_time">'.$zuhr_iqamah.'</td></tr>';
		$widget_data .= '<tr class="mpt_daily"><td class="mpt_label">'.$asr_label.'</td><td class="mpt_time">'.$asr_adhan.'</td><td class="mpt_time">'.$asr_iqamah.'</td></tr>';
		$widget_data .= '<tr class="mpt_daily"><td class="mpt_label">'.$maghrib_label.'</td><td class="mpt_time">'.$maghrib_adhan.'</td><td class="mpt_time">'.$maghrib_iqamah.'</td></tr>';
		$widget_data .= '<tr class="mpt_daily"><td class="mpt_label">'.$isha_label.'</td><td class="mpt_time">'.$isha_adhan.'</td><td class="mpt_time">'.$isha_iqamah.'</td></tr>';
		if ($jumua_khutba1 || $jumua_iqamah1) $widget_data .= '<tr><th>&nbsp;</th><th>'.$khutba_label.'</th><th>'.$iqamah_label.'</th></tr>';
		if ($jumua_khutba1 || $jumua_iqamah1) $widget_data .= '<tr class="mpt_jumua"><td class="mpt_label">'.$jumua_label.'</td><td class="mpt_time">'.$jumua_khutba1.'</td><td class="mpt_time">'.$jumua_iqamah1.'</td></tr>';
		if ($jumua_khutba2 || $jumua_iqamah2) $widget_data .= '<tr class="mpt_jumua"><td class="mpt_label">'.$jumua_label.'</td><td class="mpt_time">'.$jumua_khutba2.'</td><td class="mpt_time">'.$jumua_iqamah2.'</td></tr>';
		if ($jumua_khutba3 || $jumua_iqamah3) $widget_data .= '<tr class="mpt_jumua"><td class="mpt_label">'.$jumua_label.'</td><td class="mpt_time">'.$jumua_khutba3.'</td><td class="mpt_time">'.$jumua_iqamah3.'</td></tr>';
		$widget_data .= '<tr><td colspan="3" class="mpt_saved">Last saved: '.$last_updated.'</td></tr>';
		$widget_data .= '<tr><td colspan="3" class="mpt_mobile"><img src="'.plugins_url( '/icon_smartphone.png', __FILE__ ).'"> &nbsp; '.$_SERVER['SERVER_NAME'].'/#masjid'.'</td></tr>';
		$widget_data .= '</table>';
		
		$widget_data .= $after_widget;

		if ($language == "Urdu") {
			echo "<a name='masjid'></a><div id='mosque-prayer-timings-widget' class='$class_label urdu'>$widget_data</div>";
		} else {
			echo "<a name='masjid'></a><div id='mosque-prayer-timings-widget' class='$class_label'>$widget_data</div>";
		}
		
		
		// send reminder email to admin
		
		if (empty($admin_email)) return;
		
		$email_status = get_option('mpt_email_status');
		$email_status = trim($email_status);
		$today_date = (int)date("d");
		
		if (($today_date == 1 || 
			$today_date == 2 || 
			$today_date == 15 || 
			$today_date == 16) 
			&& $email_status == "on") {
			
			update_option('mpt_email_status', 'off');
			
			$senderName = $_SERVER['SERVER_NAME'];
			$senderEmail = $admin_email;
			$recipientEmail = $admin_email;
			$subject = "A Reminder from " . $_SERVER['SERVER_NAME'];
			$message = "Assalamu Alykum Wa Rahmatullah!<br>
						<br>
						Dear Admin,<br>
						<br>
						If there is any change in daily or Friday prayer timings at Masjid, 
						please update these timings in 'Mosque Prayer Timings' widget of your wordpress website.<br>
						<br>
						";
			
			$header  = 'MIME-Version: 1.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$header .= "From: ". $senderName . " <" . $senderEmail . ">\r\n"; 

			mail($recipientEmail, $subject, $message, $header);

			

		} else if ($today_date != 1 && $today_date != 2 && $today_date != 15 && $today_date != 16) {
			if ($email_status == "off") update_option('mpt_email_status', 'on');
		}


	} // widget function
		
	
} // MosquePrayerTimingsWidgetPlugin class




?>