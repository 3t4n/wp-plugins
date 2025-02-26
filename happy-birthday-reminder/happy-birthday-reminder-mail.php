<?php
function quibos_birthdatechecker_mail(){
    $summary='';
    $summary1='';
    $reg='';
	$user_query=new WP_User_Query(array('search' => $reg, 'search_columns'=>array('dateofbirth')));
	$options= get_option('qb_plugin_options');
	$qb_email_setting_yes_no = $options['qb_email_setting_yes_no'];
	$qb_user_email_yes_no = $options['qb_user_email_yes_no'];
	$qb_celebrant_message = $options['qb_celebrant_message'];
	$qb_email_subject = $options['qb_email_subject'];
	$qb_max_days_diff = $options['qb_max_days_diff'];
	if(!$qb_max_days_diff or $qb_max_days_diff==0){
		$qb_max_days_diff=7;
	}
	if(!$qb_email_subject){
		$qb_email_subject='Happy Birthday';
	}
	$subject = 'Happy Birthday Reminder';
	$to= $options['qb_admin_email'];
	if(!empty($user_query->results)){
		if(!$to){
			$to = get_bloginfo('admin_email');
		}
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
						if($qb_email_setting_yes_no=='Yes'){
							if($diff->m<=1){
								if ($diff->days > 0 && $diff->days <=$qb_max_days_diff) {
									$userDisplay[]=$user->display_name;
									$message = $user->display_name. "'s birthday is coming up in ". $diff->d. " days: ". date("jS F", strtotime($user->dateofbirth))."\r\n";
									$summary .=$message;
									} 
								elseif($diff->days == 0) {
								   	$message1 = "Happy Birthday to ". $user->display_name. " today " . date("jS F", strtotime($user->dateofbirth))."\r\n";
								   	$summary1 .=$message1;
									if($qb_user_email_yes_no=='Yes'){
									$message = $user->display_name ." ". $qb_celebrant_message;
									mail($user->user_email,$qb_email_subject,$message);									
									}
						    
								}
							}
						}
			}
		}
		if($summary){
		mail($to,$subject,$summary);
		}
		if($summary1){
		mail($to,$subject,$summary1);
		}
	}
}
add_action('quibos_birthdatechecker_cron','quibos_birthdatechecker_mail');

add_action('init', function(){
if(!wp_next_scheduled('quibos_birthdatechecker_cron')){
	wp_schedule_event(time(),'daily','quibos_birthdatechecker_cron');
}
}
);

?>