<?php ob_start();
//define all variables the needed alot
include 'the_globals.php';
$postimage = '';
$dont_show_image = '';
?>
<?php
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	$rstyle = $aio_related_posts_settings['related_posts_type'];
	$rstyle = 'related_list';
	$searches = get_searches($taglist);
	$counter = 1;
	if($searches)////1st if////
	{
	echo '<div id="related_posts_rpw"><ul>';
	echo '<h3 class="h3_top_style">'. $aio_related_posts_settings['list_title'] .'</h3>';
	foreach($searches as $search)
	{
		$categorys = get_the_category($search->ID);	//Fetch categories of the plugin
		$p_in_c = false;	// Variable to check if post exists in a particular category
		$title = get_the_title($search->ID);
		$title = aio_title_shorter($title,10);
		//---------------------------------
		echo '<li style="background-image: none">';
		if($aio_related_posts_settings['list_show_thumbs'] == 'Yes')////2nd if////
		{
	    if ((function_exists('get_the_post_thumbnail')) && (has_post_thumbnail($search->ID))) ////3rd if////
	    	{
				$out_post_thumbnail = get_the_post_thumbnail( $search->ID, 'thumbnail', array('title' => $title,'alt' => $title,'class' => 'list_image'));
			  //$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($search->ID), 'thumbnail');
			}
			else
			{
				$postimage = get_post_meta($search->ID, 'image' , true);
				$dont_show_image = 'No';
				if (!$postimage)
					{
						preg_match_all( $reg_exp, get_post($search->ID)->post_content, $matches );
						// any image there?
						if( isset( $matches ) && $matches[1][0] ) 
						{
							$postimage = $matches[1][0]; // this give the first image only
						}
					}////3rd if////
				$site_url = site_url();
				$postimage = str_replace("../",$site_url."/",$postimage);
				$out_post_thumbnail = '<img src="'.$postimage.'" title="'.$title.'" class="list_image" />';
				if (!$postimage) {$dont_show_image = 'Yes';}
			}////3rd if////
			$out_post_thumbnail_div = '<div class="related_posts_list_main_image"><a href="'.get_permalink($search->ID).'" rel="related" title="'.$title.'">';
			$out_post_thumbnail_image_tag = $out_post_thumbnail;
			$out_post_thumbnail_end = '</a></div>';
			$out_post_thumbnail_result = $out_post_thumbnail_div.$out_post_thumbnail_image_tag.$out_post_thumbnail_end;
			if ($dont_show_image == 'Yes') $$out_post_thumbnail_result = '';
	    }////2nd if////
	    else{
			$$out_post_thumbnail_result = '';
		}
		echo $out_post_thumbnail_result;
		$list_Style = $aio_related_posts_settings['list_Style'];
		if($list_Style != "Just_Thumbs" && $list_Style != "CSS-Just_Thumbs")
		{
		    echo '<div class="related_posts_list_main_content">';
		    echo '<p><a href="'; echo get_permalink($search->ID); echo '" rel="related" title="'; the_title(); echo '">'; echo $title; echo '</a></p>';
		    $list_show_excerpt_temp = $aio_related_posts_settings['list_show_excerpt'];
		    if ($list_show_excerpt_temp == 'Yes' && $rstyle != 'related_grid'){echo '<p class="related_posts_list_excerpt_p">'. aio_excerpt($search->ID,$aio_related_posts_settings['list_excerpt_length']) . '</p>';}
		    echo "</div>";
	    }
	    echo "</li>";
		if ($search_counter == $limit) break;	// End loop when related posts limit is reached
	} ////foreach loop////
	echo '</ul></div>';
	}///end of searches if statement///
	else{
		echo '<p>No related posts!</p>';
	}
?><?php
$out = ob_get_clean();
return $out;
?>