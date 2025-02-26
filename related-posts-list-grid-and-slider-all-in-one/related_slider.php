<?php ob_start();
//define all variables the needed alot
include 'the_globals.php';
$postimage = '';
$dont_show_image = '';
?>
<?php
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	$searches = get_searches($taglist);
	$counter = 1;
	if($searches){ ?>
	<div id="tips-closer">
	<div id="tips">
	<div onclick="document.getElementById('tips-closer').style.display='none';" class="aio-close" id="aio-close">X</div>
	<h3 id="h3-top-style" class="widget-title h3-top-style"><?php echo $aio_related_posts_settings['slider_title']; ?></h3>
	<?php
	echo '<div id="related_posts_rpw"><ul id="slider">';
		foreach($searches as $search) {
		$categorys = get_the_category($search->ID);	//Fetch categories of the plugin
		$p_in_c = false;	// Variable to check if post exists in a particular category
		$title = get_the_title($search->ID);
		$title = aio_title_shorter($title,10);
		//---------------------------------
		echo '<li class="slider_li" style="background-image: none">';
	if($aio_related_posts_settings['slider_show_images'] == 'Yes'){
    	$out_post_thumbnail = '<div class="related_posts_list_main_image"><a href="'.get_permalink($search->ID).'" rel="related" title="'.$title.'">';
    if ((function_exists('get_the_post_thumbnail')) && (has_post_thumbnail($search->ID))) {
				$out_post_thumbnail .= get_the_post_thumbnail( $search->ID, array($aio_related_posts_settings['slider_imagew'],$aio_related_posts_settings['slider_imageh']), array('title' => $title,'alt' => $title,'class' => 'list_image'));
		} else {
			$postimage = get_post_meta($search->ID, 'image' , true);
			$dont_show_image = 'No';
			if (!$postimage)
				{
				preg_match_all( $reg_exp, get_post($search->ID)->post_content, $matches );
				// any image there?
				if( isset( $matches ) && $matches[1][0] ) {
					$postimage = $matches[1][0]; // this give the first image only
					preg_match_all( $new_reg_exp, get_post($search->ID)->post_content, $matches2 );
					$new_img_src = $matches2[1][0];
					//echo $new_img_src;
					//will resize the image here
				}}
		$site_url = site_url();
		$postimage = str_replace("../",$site_url."/",$postimage);
			$out_post_thumbnail .= '<img src="'.$postimage.'" title="'.$title.'" class="list_image" />';
		if (!$postimage) {$dont_show_image = 'Yes';}
		}//of line 27
		//$out_post_thumbnail .= '<span id="entry-meta-span" class="entry-meta-span">'. get_the_time('M j, Y',$search->ID) .'</span>';
		$out_post_thumbnail .= '</a></div>';
		if ($dont_show_image == 'Yes') $out_post_thumbnail = '';
    }else{//for line 19 if
		$out_post_thumbnail = '';
	}
	echo $out_post_thumbnail;
	$list_Style = $aio_related_posts_settings['list_Style'];
	if($list_Style != "Just_Thumbs" && $list_Style != "CSS-Just_Thumbs"){
	    echo '<div class="related_posts_list_main_content">';
	    echo '<p><a href="'; echo get_permalink($search->ID); echo '" rel="related" title="'; the_title(); echo '">'; echo $title; echo '</a></p>';
	    $list_show_excerpt_temp = $aio_related_posts_settings['list_show_excerpt'];
	    if ($list_show_excerpt_temp == 'Yes'){echo "<p>". aio_excerpt($search->ID,$aio_related_posts_settings['list_excerpt_length']) . "</p>";}
	    echo "</div>";
    }
    $timediv = '<div class="related_posts_ttc_time">'.get_the_time('M j, Y',$search->ID). '</div>';
    echo $timediv;
    echo "</li>";

	if ($search_counter == $limit) break;	// End loop when related posts limit is reached
		} //end of foreach loop
	echo '</ul></div></div></div>';
	}//end of searches if statement
	else{
		echo '<p>No related posts!</p>';
	}
?><?php
$out = ob_get_clean();
return $out;
?>