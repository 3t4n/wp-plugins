<?php

/*Plugin: All-in-One-Gallery*/
/*Content: Exclude images from a category */
/*Author: Thomas Michalak aka TM*/
/*Author URI: http://www.fuck-dance-lets-art.com*/


//Store the current working directory
$myPluginCWD = getcwd();
//Set the current working directory to the wp-admin
chdir("../../../wp-admin/");
/** WordPress Administration Bootstrap */
require_once('admin.php');
wp_reset_vars(array('action'));
//Reset current working directory to the plugin directory
chdir($myPluginCWD);
require_once('all_in_one_gallery_functions.php');
//Get on your knees and pray the php oracle, aka Karl Rixon, for this solution trick


if(isset($_GET['catID'])) $catID = ($_GET['catID']);

//A bit of style
?>

<link rel="stylesheet" type="text/css" href="<?php echo allInOneGalleryURLDirect() ?>/all_in_one_gallery_select_css.css"/>
<script type="text/javascript" src="<?php echo allInOneGalleryURLDirect() ?>/all_in_one_gallery_select_js.js"/></script>

<?php

$excludedImages = get_option('allInOneGallery_img_exclude');

						
	$allMyPosts = get_posts('numberposts=-1&post_type=any&category='.$catID);
	$myCat = get_category($catID);
	$catSlug = $myCat->slug;
	
	//Get all images
	$onlyPostsImages = array();
	foreach($allMyPosts as $key => $post){
		$postID = $post->ID;
		$postTitle = $post->post_title;
		$post_attch = get_children('post_type=attachment&post_mime_type=image&post_parent='.$postID);
		if(!empty($post_attch)){
			$thumbs = '';
			foreach($post_attch as $attachment => $attachment_object){
				$OriginalID = $attachment_object->ID;
				$imagearray = wp_get_attachment_image_src($OriginalID, "thumbnails");
				$imageURI = $imagearray[0];
				$imageObj = get_post($OriginalID);
				$imageID =  $imageObj->ID;
				$imageTitle = $imageObj->post_title;
				$imageCaption = $imageObj->post_excerpt;
				$imageDescription = $imageObj->post_content;
				if(!empty($excludedImages)){
					if(array_key_exists($catID, $excludedImages)) {
						if(array_key_exists($postID, $excludedImages[$catID])){
							if(array_key_exists($imageID, $excludedImages[$catID][$postID])) $checkMe = ' checked="true"';
							else $checkMe = '';	
						}
						else $checkMe = '';	
					}
					else $checkMe = '';	
				}
				else $checkMe = '';
				//Output list of thumbs
				$thumbs .= '<li><img src="'.$imageURI.'"><p><input type="checkbox" name="'."allInOneGallery_img_exclude[{$catID}][{$postID}][{$imageID}]".'"'.$checkMe.'/><label>exclude</label></p></li>';
			}
			$onlyPostsImages[$postTitle] = $thumbs;
		}
	}
	
	//Construct String to send back
	$myResponse .= '<div class="wrapper" id="'.$catSlug.'">';
	foreach($onlyPostsImages as $title => $Allthumbs){
		$myResponse .= '<h3>Post: '.$title.'</h3>';
		$myResponse .= '<ul>';
		$myResponse .= $Allthumbs;
		$myResponse .= '</ul>';
	}
	$myResponse .= '</div>';
	
	$myResponse .= '<p class="submit" id="saveExclude">';
    $myResponse .= '<input id="saveExcludeInput" type="submit" value="Save Changes" />';
    $myResponse .= '</p>';
        
	echo $myResponse;
	die();


?>