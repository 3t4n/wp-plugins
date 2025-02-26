<?php

/**
* Plugin Name: Happy Birthday Reminder
* Plugin URI: http://quibos.net
* Description: Reminder For User's Upcoming Birthday
* Version: 1.0
* Author: Quibos Development
* Requires at least: 4.9
* Tested Up to: 4.2.4
* Stable Tag: 2.0
* License: GPL v2
* Shortname: WPBirthday
*/
function quibos_birthdatechecker(){
//	return "I check Birthdates";

	$user_query=new WP_User_Query(array('search' => $student_reg, 'search_columns'=>array('dateofbirth')));
	if(!empty($user_query->results)){
		$options = get_option('qb_plugin_options');
		$qb_max_days_diff = $options['qb_max_days_diff'];
		//echo $qb_admin_email, ' ', $qb_email_subject,' ',$qb_max_days_diff,' ',$qb_email_setting_yes_no;

	foreach ($user_query->results as $user){
		if($user->dateofbirth){
			$parts= explode('-', $user->dateofbirth,2);
			$birth_date = new DateTime(date('Y') . '-' . $parts[1] .' 00:00:00');
			$today = new DateTime('midnight today');
			if ($birth_date < $today) {
				    // next birthday is in one year
				    $birth_date->modify("+1 Year"); 
				}

				$diff = $birth_date->diff($today);
									
					if($diff->m<=1){
						if ($diff->days > 0 && $diff->days <=$qb_max_days_diff) {
							$userDisplay[]=$user->display_name;
							$userBirthday[]=date("jS F", strtotime($user->dateofbirth));
							echo '<pre>', get_avatar($user->ID, 90) ,' ', $user->display_name,"'s birthday comes up in ",$diff->d, ' days ',date("jS F", strtotime($user->dateofbirth)),'</pre>';
						} 
						elseif($diff->days == 0) {
						    echo '<pre>', get_avatar($user->ID, 90) ,' ', $user->display_name,"'s birthday is today.</pre>";
						}
						else{
							echo "No birthdays To Report";
						}
				}	
}
	}
	}
}
add_shortcode('WPBirthday','quibos_birthdatechecker');
include_once('happy-birthday-reminder-mail.php');
include_once('happy-birthday-reminder-options.php');
include_once('happy-birthday-extra-profile-fields.php');
//quibos_birthdatechecker_mail();
?>