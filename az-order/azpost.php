<?php
$settings=get_option('az_setting', 'post');

$AZorder=null;
 if ((!$settings['az_post_type']==0)&&(!$settings['az_post_category']==0)){
 		echo 'Please choose only one option!';
 	}

 elseif (!$settings['az_post_category']==0){
 	$AZorder = new WP_Query (array(
 			'category_name'	=>	$settings['az_post_category'],
 			'orderby'	=>	'title',
 			'order'		=>	'ASC',
 			'posts_per_page' => -1
 		));
 	}
 	elseif (!$settings['az_post_type']==0) {
		$AZorder = new WP_Query (array(
			'post_type'	=>	$settings['az_post_type'],
			'orderby'	=>	'title',
			'order'		=>	'ASC',
			'posts_per_page' => -1
		));
}
 	else {
 		$AZorder=new WP_Query(array(
			'post_type'	=>	'post',
			'orderby'	=>	'title',
			'order'		=>	'ASC',
			'posts_per_page' => -1
		));
 	}

 	if(!is_null($AZorder)) {

	while ($AZorder->have_posts()) : $AZorder->the_post();
		$first_letter=get_the_title();
		$first_letter = mb_substr($first_letter, 0, 1 );
		$first_letter =  mb_strtoupper( $first_letter );
		if($first_letter !=$current){
				$azlist	.="<div class='fisrt-letter'><a name='$first_letter'>$first_letter</a></div>\n";
				$aznav	.="<a href='#$first_letter'>$first_letter</a>";
				$current = $first_letter;

			}?>

		<?php $url = get_permalink();
			$azlist .="<a class='az-title' href='$url'>";
			$azlist	.=get_the_title()."</a><br>\n";
		endwhile;
 	}

	echo '<div class="az-menu">'. $aznav . "</div>". $azlist; ?>
