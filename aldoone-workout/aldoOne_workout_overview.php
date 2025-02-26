<?php

class add_aldoOne_workout{
	function aldoOne_workout_rewrite_post($content){
		$content = stripslashes($content);		
		
		if(preg_match("/\[aldoOne-workout\]/", $content)){
			$args = array('post_type'=>'aldo_one_workout');
			
			$plantext = '';
			
			foreach(get_posts($args) as $item){
				//$content .= print_r($item);
				$aldo_one_workout_title = $item -> post_title;
				$aldo_one_workout_url = $item -> guid;
				$plantext .= '<div class="container-fluid">';    
				$plantext .=	'<div class="panel panel-success">';
				$plantext .=		'<div class="panel-heading">';
				$plantext .=			'<h3 class="panel-title">' . $aldo_one_workout_title . '</h3>';
				$plantext .=		'</div>';
				$plantext .=		'<div class="panel-body">';
				$plantext .=			'<div class="row">';
				$plantext .=				'<div class="col-lg-3">';
				$plantext .=        			'<img class="img-responsive img-thumbnail" src="' . get_post_meta($item->ID,'ao_workout_banner',true)['url'] . '">';
				$plantext .= 				'</div>';
				$plantext .=				'<div class="col-lg-3">';
				$plantext .=          			'<ul class="list-group">';
				$plantext .=            			'<li class="list-group-item"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> ' . get_post_meta($item->ID, 'ao_workout_type', true) . '</li>';
				$plantext .=            			'<li class="list-group-item"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> ' . get_post_meta($item->ID, 'ao_workout_intensity', true) . '</li>';
				$plantext .=            			'<li class="list-group-item"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> ' . get_post_meta($item->ID, 'ao_workout_main_goal', true) . '</li>';
				$plantext .=            			'<li class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ' . get_post_meta($item->ID, 'ao_workout_duration', true) . '</li>';
				$plantext .=          			'</ul>';
				$plantext .=					'<a href="' . $item -> guid . '"><button type="button" class="btn-block btn btn-success btn-lg">Read</button></a>';
				$plantext .= 				'</div>';
				$plantext .=				'<div class="col-lg-6">';
				$plantext .=        			'<p>' . get_post_meta($item->ID,'ao_workout_description',true) . '</p>';
				$plantext .= 				'</div>';
				$plantext .= 			'</div>';
				$plantext .= 		'</div>';
				$plantext .= 	'</div>';
				$plantext .= '</div>';
			}
			
			$content = preg_replace("/\[aldoOne-workout\]/", $plantext, $content);
		}
		return $content;
	}
}

add_action('the_content', array(new add_aldoOne_workout(), 'aldoOne_workout_rewrite_post'));
?>