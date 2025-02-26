<?php
// Display the widget title   
if ( $title )  {
    echo $before_title . $title . $after_title;  
}

$args = array(
	'role' => $role,
	'orderyby' => 'post_count',
	'order' => 'DESC'
);

$user_ids = get_users($args);

	foreach ($user_ids as $user_id) {
		if ($postcount) {
			if(count_user_posts($user_id->ID)>0) {
				echo '<a class="cuda-gravatar" href="'.get_author_posts_url($user_id->ID).'" title="'.$user_id->display_name.'">';
					echo get_avatar($user_id->ID, $size);
				echo '</a>';
			} else {
			
			}
		} else {
			echo '<a class="cuda-gravatar" href="'.get_author_posts_url($user_id->ID).'" title="'.$user_id->display_name.'">';
				echo get_avatar($user_id->ID, $size);
			echo '</a>';
		}
	}