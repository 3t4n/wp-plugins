<?php
add_action('the_content', 'aldoOne_workout_view');
function aldoOne_workout_view($content){
	$plantext = '';
	if (get_post_type() == 'aldo_one_workout'){
		$plantext .= '<div class="container-fluid">';    
		// Header Section
		$plantext .= 	'<div class="page-header text-center">';
		$plantext .= 		'<h1>' . get_the_title(get_the_ID()) . '</h1>';
		$plantext .= 		'<small><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <time>' . get_the_date('l, j. F, Y') . '</time> | <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <time>' . get_the_author() . '</time></small>';
		$plantext .= 	'</div>';
		// Basic Informations
		$plantext .=	'<div class="row">';
		$plantext .=		'<div class="' . get_post_meta(get_the_ID(),'ao_workout_banner_size',true) . '">';
		if (get_post_meta(get_the_ID(),'ao_workout_banner',true)['url'] != ''){
		$plantext .=        	'<img class="img-responsive img-thumbnail" src="' . get_post_meta(get_the_ID(),'ao_workout_banner',true)['url'] . '">';
		}else{
		$plantext .=			'<img class="img-responsive img-thumbnail" src="' . plugins_url('aldoOne_workout/assets/image/placeholder.png') . '">';
		}
		$plantext .= 		'</div>';
		$plantext .=		'<div class="col-lg-6">';
		$plantext .=          	'<ul class="list-group">';
		$plantext .=            	'<li class="list-group-item"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> ' . get_post_meta(get_the_ID(), 'ao_workout_type', true) . '</li>';
		$plantext .=            	'<li class="list-group-item"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> ' . get_post_meta(get_the_ID(), 'ao_workout_intensity', true) . '</li>';
		$plantext .=            	'<li class="list-group-item"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> ' . get_post_meta(get_the_ID(), 'ao_workout_main_goal', true) . '</li>';
		$plantext .=            	'<li class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ' . get_post_meta(get_the_ID(), 'ao_workout_duration', true) . '</li>';
		$plantext .=          	'</ul>';
		$plantext .= 		'</div>';
		$plantext .= 	'</div>';
		if (get_post_meta(get_the_ID(), 'ao_workout_description', true) != ''){
			// Description
			$plantext .=	'<div class="row">';
			$plantext .=		'<div class="col-lg-12">';
			$plantext .=			'<div class="panel panel-default">';
			$plantext .=				'<div class="panel-body">';
			$plantext .=					get_post_meta(get_the_ID(), 'ao_workout_description', true);
			$plantext .=				'</div>';
			$plantext .=			'</div>';
			$plantext .= 		'</div>';
			$plantext .= 	'</div>';
		}
		// Weekdays
		$weekdays = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
		foreach($weekdays as $key){
			if(get_post_meta(get_the_ID(), 'ao_workout_' . $key . '_enabled', true) == 'ao_workout_' . $key . '_enabled_1'){
				$plantext .=	'<div class="row">';
				$plantext .=		'<div class="col-lg-12">';
				$plantext .=			'<div class="panel panel-success">';
				$plantext .=				'<div class="panel-heading">';
				$plantext .=					'<h3 class="panel-title">' . ucfirst($key) . ' | ' . get_post_meta(get_the_ID(), 'ao_workout_' . $key . '_description', true) . ' | <span class="glyphicon glyphicon-time" aria-hidden="true"></span> ' . get_post_meta(get_the_ID(), 'ao_workout_' . $key . '_duration', true) . '</h3>';
				$plantext .=				'</div>';
				$plantext .=				'<div class="panel-body">';
				// Exercise
				$count_ex = count(get_post_meta(get_the_ID(), 'ao_workout_' . $key . '_re', true));
				foreach(get_post_meta(get_the_ID(), 'ao_workout_' . $key . '_re', true) as $arr){
					$plantext .=			'<div class="row">';
					if ($arr['ao_workout_' . $key . '_video'] != ''){
					$plantext .=				'<div class="col-lg-4">';
					$plantext .=					'<div class="embed-responsive embed-responsive-16by9">';
					$plantext .=						'<iframe class="embed-responsive-item" src="' . $arr['ao_workout_' . $key . '_video'] . '"></iframe>';	
					$plantext .=					'</div>';
					$plantext .=				'</div>';
					$plantext .=				'<div class="col-lg-8">';
					}else{
					$plantext .=				'<div class="col-lg-12">';
					}
					$plantext .=          			'<ul class="list-group">';
					if($arr['ao_workout_' . $key . '_exercise'] != ''){
						$plantext .=            			'<li class="list-group-item">' . $arr['ao_workout_' . $key . '_exercise'] . '</li>';
					}
					if($arr['ao_workout_' . $key . '_exercise_description'] != ''){
						$plantext .=            			'<li class="list-group-item">' . $arr['ao_workout_' . $key . '_exercise_description'] . '</li>';
					}
					if($arr['ao_workout_' . $key . '_sets'] != ''){
						$plantext .=            			'<li class="list-group-item">Sets: ' . $arr['ao_workout_' . $key . '_sets'] . '</li>';
					}
					if($arr['ao_workout_' . $key . '_reps'] != ''){
						$plantext .=            			'<li class="list-group-item">Reps: ' . $arr['ao_workout_' . $key . '_reps'] . '</li>';				
					}
					$plantext .=          			'</ul>';
					$plantext .= 				'</div>';			
					$plantext .=			'</div>';
					if ($count_ex > 1){
						$plantext .=			'<hr>';
						$count_ex--;
					}
				}
				$plantext .=				'</div>';
				$plantext .=			'</div>';
				$plantext .= 		'</div>';
				$plantext .= 	'</div>';
			}
		}
		$plantext .= '</div>';	
	}
	return $content . $plantext;
}
?>