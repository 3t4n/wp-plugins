<?php
/*
Plugin Name: All in One Gallery
Plugin URI: http://www.fuck-dance-lets-art.com/all-in-one-gallery-wordpress-plugin
Description: Display and browse all the images on your wordpress website in one place using the new [ gallery ] shortcode. A massive thanks to <a href="http://www.karlrixon.co.uk/" target="_blanK">Karl Rixon</a> aka the <a href="http://www.karlrixon.co.uk/" target="_blanK">php Oracle</a> for the pagination function, the tricks and teaching me php. Gallery options in the Pages menu.
Version: 2.2
Author: Thomas Michalak aka TM
Author URI: http://www.fuck-dance-lets-art.com
*/

/*
   Copyright 2008/2010  Thomas Michalak  (email : http://www.fuck-dance-lets-art.com/contact-me )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once('all_in_one_gallery_functions.php');

/*************************************************************/
/*   THE OPTION PANNEL THE OPTION PANNEL THE OPTION PANNEL   */
/*************************************************************/
add_option(allInOneGallery_select_page, '');
add_option(allInOneGallery_css_theme, 'Blue');
add_option(allInOneGallery_how_many_columms, '4');
add_option(allInOneGallery_thumb_size, 'default');
add_option(allInOneGallery_ecluded_cat, '');
add_option(allInOneGallery_exclude_empty_cat_switch, "Off");
add_option(allInOneGallery_img_exclude, '');
add_option(allInOneGallery_message_switch, 'On');
add_option(allInOneGallery_welcome_message, 'All images that have been posted on '.get_bloginfo('name').' website are accessible here. Browse through the categories and view all images that are related to each category. Click on a thumbnail to see the full size. You can also read the related post by clicking on view this post');
add_option(allInOneGallery_welcome_category, '');
add_option(allInOneGallery_thumb_link_switch, 'Off');
add_option(allInOneGallery_pagination_switch, 'Off');
add_option(allInOneGallery_post_per_page, '2');


function all_in_one_gallery_menu() {
        add_pages_page('All in One Gallery Options', 'All in One Gallery', 2, __FILE__, 'all_in_one_gallery_options');
}

function all_in_one_gallery_style_and_magic(){
	//A bit of style
	echo '<link rel="stylesheet" type="text/css" href="'.allInOneGalleryURLDirect().'/all_in_one_gallery_option_css.css" />';
	//A Bit of magic
	echo '<script type="text/javascript" src="'.allInOneGalleryURLDirect().'/all_in_one_gallery_option_js.js" /></script>';
}
add_thickbox();
add_action('admin_head', 'all_in_one_gallery_style_and_magic');

/*
function my_action_callback() {
	$test = '';
	$catID = $_POST['catID'];
	$allMyPosts = get_posts('numberposts=-1&post_type=any&category='.$catID);
	//Get all images
	$onlyPostsImages = array();
	foreach($allMyPosts as $key => $post){
		$postID = $post->ID;
		$post_attch = get_children('post_type=attachment&post_mime_type=image&post_parent='.$postID);
		if($post_attch !== FALSE){
			$thumbs = '';
			foreach($post_attch as $attachment => $attachment_object){
				$OriginalID = $attachment_object->ID;
				$imagearray = wp_get_attachment_image_src($OriginalID, 'thumbnail', false);
				$imageURI = $imagearray[0];
				$imageID = get_post($OriginalID);
				$imageTitle = $imageID->post_title;
				$imageCaption = $imageID->post_excerpt;
				$imageDescription = $imageID->post_content;
				//Output list of thumbs
				$thumbs .= '<li><img src="'.$imageURI.'"></li>';
			}
			$onlyPostsImages[$post->post_title] = $thumbs;
		}
	}
	
	//Construct String to send back
	$myResponse = '';
	foreach($onlyPostsImages as $title => $Allthumbs){
		$myResponse .= '<h3>'.$title.'</h3>';
		$myResponse .= '<ul>';
		$myResponse .= $Allthumbs;
		$myResponse .= '</ul>';
	}
	echo $myResponse;
	die();
}
add_action('wp_ajax_my_special_action', 'my_action_callback');
*/


function all_in_one_gallery_options() {
	
	//allInOneGalleryDebug(get_option('allInOneGallery_img_exclude'));
	
	//The form
	echo '<div class="wrap">';

        echo '<h2>All in one Gallery</h2>';
        echo '<h3>Display all you galleries in one place</h3>';
	
        echo '<form method="post" action="options.php" id="all_in_one_option_form">';
        wp_nonce_field('update-options');
        echo '<table class="allInOneGallery_table form-table">';
        
	// Select Page
        echo '<tr valign="top">';
        echo '<th scope="row">Place and Style your Online Gallery</th>';
        echo '<td>';
	echo '<ul id="all_in_one_aspect_style"><li><span>Select in wich page you want to display the gallery</span> <select name="allInOneGallery_select_page">';
	$all_pages = get_posts('numberposts=-1&post_type=page&post_status= ');
	foreach($all_pages as $post){
		$aPost = get_post($post);
		if($aPost->post_title == get_option('allInOneGallery_select_page')){
		        $sel = 'selected = "selected"';	
		}else{
		        $sel = '';	
		}
		echo '<option value="'.$aPost->post_title.'"'.$sel.'>'.$aPost->post_title.' ('.$aPost->post_status.')</option>';
	}
	echo '</select></li>';
        
	//Select a Style
        $dir = dirname(__FILE__)."/all_in_one_gallery_themes";
        $blackList = array('.', '..');
	echo '<li><span>Select your gallery\'s menu color style</span> <select name="allInOneGallery_css_theme">';
	if($handle = opendir($dir)){
		while (false !== ($file = readdir($handle))) {
			if(!in_array($file, $blackList)){
			        if($file == get_option('allInOneGallery_css_theme')){
		                        $sel = 'selected = "selected"';	
				}else{
				        $sel = '';	
				}
				echo '<option value="'.$file.'"'.$sel.'>'.$file.'</option>';	
			} 
		}
	}       
	echo '</select></li>';
	
	// Number of Columns
        echo '<li><span>Select how many columns in the gallery</span> <select name="allInOneGallery_how_many_columms">';
	for($i=1; $i<11; $i++){
		if($i == get_option('allInOneGallery_how_many_columms')){
		        $sel = 'selected = "selected"';	
		}else{
		        $sel = '';	
		}
		echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
	}
	echo '</select></li>';
	// Thumbs Size
	$imagesSizes = array('default', 'thumbnails', 'medium', 'large', 'full');
    echo '<li><span>Select images size</span> <select name="allInOneGallery_thumb_size">';
	foreach($imagesSizes as $imgSize){
		if($imgSize == get_option('allInOneGallery_thumb_size')){
		        $sel = 'selected = "selected"';	
		}else{
		        $sel = '';	
		}
		echo '<option value="'.$imgSize.'"'.$sel.'>'.$imgSize.'</option>';
	}
	echo '</select></li></ul>';
	echo '</td></tr>';
	
	//Categories and Page selections
    echo '<tr valign="top">';
    echo '<th scope="row">Exclude categories from showing</th>';
    echo '<td>';
    //Exclude Empty Categories On/Off
	echo '<ul class="switch_OnOff" id="categoriesSwitch">';
	echo '<p>Exclude Empty Categories: </p>';
	$excludeEmpty_status = get_option('allInOneGallery_exclude_empty_cat_switch');
	$switch_name = array('On', 'Off', 'Clear All');
	foreach($switch_name as $value){
		if($value == $excludeEmpty_status){
		        $sel = ' checked = true';
		        $sel_style = ' class = selected';
	        }else{
		        $sel = '';
		        $sel_style = '';
	        }
		//update_option(allInOneGallery_message_switch, false);
	    echo '<li><input type="radio"'.$sel.$sel_style.' value="'.$value.'" name="allInOneGallery_exclude_empty_cat_switch"><label>'.$value.'</label></li>';
	}
	echo '</ul>';
	// Exclude Categories
	echo '<ul id="exlu_cat_style">';
	//Hidden Field For Excluded Images
	$excludedImages = get_option('allInOneGallery_img_exclude');
	if(!empty($excludedImages)){
		foreach($excludedImages as $excludedImagesCatID => $excludedImagesPostArray ){
			$myCat = get_category($excludedImagesCatID);
			echo '<div id="'.$myCat->slug.'" class="hidden">';
			foreach($excludedImagesPostArray as $excludedImagesPostID => $excludedImagesImageArray){
				foreach($excludedImagesImageArray as $excludedImagesImageID => $excludedImagesImageOn){
					echo '<input type="checkbox" checked="true" name="allInOneGallery_img_exclude['.$excludedImagesCatID.']['.$excludedImagesPostID.']['.$excludedImagesImageID.']"';
				}
			}
			echo '</div>';
		}
	}
	$category = get_categories();
	$exlcu_cat = get_option('allInOneGallery_ecluded_cat');
	foreach($category as $cat){
		if($exlcu_cat[$cat->cat_name] == TRUE){
			$sel = ' checked = true';
			if(allInOneGalleryEmptyCat($cat->cat_ID) == TRUE) $sel_style = ' class = "selected IAmEmpty"';
			else $sel_style = ' class = "selected"';
		}else{
			$sel = '';
			if(allInOneGalleryEmptyCat($cat->cat_ID) == TRUE) $sel_style= ' class = "IAmEmpty"';
			else $sel_style = '';
		}
		if(allInOneGalleryEmptyCat($cat->cat_ID) == TRUE) {
			$hasImages = 'no images';
			$thickBox =' class="noImages"';
		}
		else {
			$hasImages = 'select images';
			$thickBox = ' class="thickbox"';
		}
		echo '<li'.$sel_style.'><input type="checkbox"'.$sel.' name="'."allInOneGallery_ecluded_cat[{$cat->cat_name}]".'"/><label>'.$cat->cat_name.'</label><a title="Exclude images from: <strong>'.$cat->cat_name.'</strong>" href="'.allInOneGalleryURLDirect().'/all_in_one_gallery_select.php?catID='.$cat->cat_ID.'"'.$thickBox.'>'.$hasImages.'</a></li>';
		//echo '<li'.$sel_style.'><input type="checkbox"'.$sel.' name="'."allInOneGallery_ecluded_cat[{$cat->cat_name}]".'"/><label>'.$cat->cat_name.'</label></li>';
	
	}
	//Pages
	if($exlcu_cat[Pages] == TRUE){
		$sel = ' checked = true';
		if(allInOneGalleryEmptyCat('Pages') == TRUE) $sel_style = ' class = "selected IAmEmpty"';
		else $sel_style = ' class = "selected"';
	}else{
		$sel = '';
		if(allInOneGalleryEmptyCat('Pages') == TRUE) $sel_style= ' class = "IAmEmpty"';
		else $sel_style = '';
	}
	echo '<li'.$sel_style.'><input type="checkbox"'.$sel.' name="'."allInOneGallery_ecluded_cat[Pages]".'"/><label>Pages</label><a title="Exclude images from the <strong>Pages</strong>" href="'.allInOneGalleryURLDirect().'/all_in_one_gallery_select.php?catID=Pages"'.$thickBox.'>'.$hasImages.'</a></li>';
	//echo '<li'.$sel_style.'><input type="checkbox"'.$sel.' name="'."allInOneGallery_ecluded_cat[Pages]".'"/><label>Pages</label></li>';
	echo '</td></ul>';
	echo '</tr>';

	
	// Welcome Message Options
	echo '<tr valign="top">';
	echo '<th scope="row">Welcome Message</th>';
	//Message On/Off
	echo '<td><ul class="switch_OnOff">';
	$message_status = get_option('allInOneGallery_message_switch');
	$switch_name = array('On', 'Off');
	foreach($switch_name as $value){
		if($value == $message_status){
		        $sel = ' checked = true';
		        $sel_style = ' class = selected';
	        }else{
		        $sel = '';
		        $sel_style = '';
	        }
		//update_option(allInOneGallery_message_switch, false);
	        echo '<li><input type="radio"'.$sel.$sel_style.' value="'.$value.'" name="allInOneGallery_message_switch"><label>'.$value.'</label></li>';
	}
	echo '</ul>';
	
	//Message content ( if switch is On )
	$textarea_content = get_option('allInOneGallery_welcome_message');
	echo '<p> If the Welcome message is ON, display the message below</p>';
	echo '<textarea class="textarea_style" name="allInOneGallery_welcome_message">';
	echo $textarea_content;
	echo '</textarea>';
	
	//Category to show First ( if switch if Off )
	echo '<p style="width:100%"> If the Welcome message is Off, Select a category\'s gallery to display <small>(exluded categories won\'t appear in this option)</small></p>';
	echo '<select name="allInOneGallery_welcome_category"';
	$category = get_categories();
	$welcome_cat = get_option('allInOneGallery_welcome_category');
	foreach($category as $cat){
		if($exlcu_cat[$cat->cat_name] == FALSE){
			if($welcome_cat == $cat->cat_ID){
				$sel = 'selected = "selected"';
			}else{
				$sel = '';
			}
			echo '<option value="'.$cat->cat_ID.'"'.$sel.'>'.$cat->cat_name.'</option>';
		}
	}
	//Pages
	if($exlcu_cat[Pages] == FALSE){
		if($welcome_cat == 'Pages'){
		        $sel = 'selected = "selected"';
		}else{
			$sel = '';
		}
                echo '<option value="Pages" '.$sel.' name="'."allInOneGallery_ecluded_cat[Pages]".'"/><label>Pages</label></li>';
	}
	
	echo '</select>';
    echo '</td></tr>';
	
	/*
	// Extra Options
    echo '<tr valign="top">';
    echo '<th scope="row">Extras</th>';
	// Thumbs link to Post
	echo '<td><ul class="switch_OnOff">';
	echo '<p>Thumbs will link to it\'s post: </p>';
	$thumbLink_status = get_option('allInOneGallery_thumb_link_switch');
	$switch_name = array('On', 'Off');
	foreach($switch_name as $value){
		if($value == $thumbLink_status){
		        $sel = ' checked = true';
		        $sel_style = ' class = selected';
	        }else{
		        $sel = '';
		        $sel_style = '';
	        }
		//update_option(allInOneGallery_message_switch, false);
	    echo '<li><input type="radio"'.$sel.$sel_style.' value="'.$value.'" name="allInOneGallery_thumb_link_switch"><label>'.$value.'</label></li>';
	}
	echo '</ul>';
	echo '</td></tr>';
	*/
	
	//Extras
	echo '<tr valign="top">';
	echo '<th scope="row">Extras</th>';
	echo '<td>';
	//Pagination On/Off
	echo '<ul class="switch_OnOff">';
	echo '<p>Enable pagination: </p>';
	$nbrPosts_status = get_option('allInOneGallery_pagination_switch');
	$switch_name = array('On', 'Off');
	foreach($switch_name as $value){
		if($value == $nbrPosts_status){
		        $sel = ' checked = true';
		        $sel_style = ' class = selected';
	        }else{
		        $sel = '';
		        $sel_style = '';
	        }
	    echo '<li><input type="radio"'.$sel.$sel_style.' value="'.$value.'" name="allInOneGallery_pagination_switch"><label>'.$value.'</label></li>';
	}
	echo '</ul>';
	//Number of post per page
	$postPerPage = get_option('allInOneGallery_post_per_page');
	echo '<ul>';
	echo '<label>Number of Posts per Page: </label><input name="allInOneGallery_post_per_page" value="'.$postPerPage.'" />';
	echo '</ul>';
	echo '</td></tr>';
	
	
	//End of Options
        echo '</table>';

        echo '<input type="hidden" name="action" value="update" />';
        echo '<input type="hidden" name="page_options" value="allInOneGallery_select_page, allInOneGallery_css_theme, allInOneGallery_how_many_columms, allInOneGallery_thumb_size, allInOneGallery_ecluded_cat, allInOneGallery_exclude_empty_cat_switch, allInOneGallery_img_exclude, allInOneGallery_message_switch, allInOneGallery_welcome_message, allInOneGallery_welcome_category, allInOneGallery_pagination_switch, allInOneGallery_post_per_page" />';

        echo '<p class="submit">';
        echo '<input type="submit" name="Submit" value="Save Changes" />';
        echo '</p>';

        echo '</form>';

  
        echo '</div>';
}
add_action('admin_menu', 'all_in_one_gallery_menu');








/********** CHECK IS CATEGORY IS EMPTY *****************/
function allInOneGalleryEmptyCat($catID){
	if(ctype_digit($catID)) $myPs = get_posts('numberposts=-1&post_type=any&category='.$catID);
	else if ($catID == 'Pages') $myPs = get_posts('numberposts=-1&post_type=page');
	
	foreach($myPs as $p){
		//Info about the post
	 	$pID = $p->ID;
		$p_attachments = get_children('post_type=attachment&post_mime_type=image&post_parent='.$pID);
		if(empty($p_attachments)){
			$all_ps_attachements[] = FALSE;
		}else{
			$all_ps_attachements[] = TRUE;
		}
	}
	//If there is no posts with attachements, say it
	if(!in_array(TRUE, $all_ps_attachements)){
		$isEmpty = TRUE;	
	}else{
		$isEmpty = FALSE;
	}
	
	return $isEmpty;
}












/*************************************************************************************************************************/
/*************************************************************************************************************************/
/*                                                                                                                       */
/*    THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN THE PLUGIN      */
/*                                                                                                                       */
/*************************************************************************************************************************/
/*************************************************************************************************************************/


/*check if the plugin should take effect*/
function allInOneGalleryTakeEffect(){
        //Look at user's page choice
	$userPageChoice = get_option(allInOneGallery_select_page);
	//look at the current page name
	$my_page_name = get_the_title();
        //Check if it's a page and compare it with the user's page choice
	if (is_page() && $my_page_name === $userPageChoice){         
                $doIt = TRUE;
        }else{
                $doIt = FALSE;
        }
        return $doIt;
}

/*get users choice of category*/
function allInOneGalleryUserChoice(){
	$myRequests = array();
	if(empty($_GET)){
		$myRequests['cat_id'] = '';
		$myRequests['from'] = 0;
	}else{
		if(isset($_GET['catRequest'])) $myRequests['cat_id'] = ($_GET['catRequest']);
		if(isset($_GET['from'])) $myRequests['from'] = ($_GET['from']);
	}
	$myRequests['page'] = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
	$myRequests['to'] = get_option('allInOneGallery_post_per_page');
	return $myRequests;
}

/*Display the Categories*/
function allInOneGalleryCategories($pageID, $user_cat_choice_id){
	$category = get_categories();
        $exlcu_cat = get_option('allInOneGallery_ecluded_cat');
	echo '<div id="all_in_one">';
	echo '<div id="all_in_one_menu">';
	echo '<ul>';
	//Each categories seperated
	foreach($category as $cat){
		$cat_name = $cat->cat_name;
		//Only display not-exlcuded categories
		if(empty($exlcu_cat[$cat_name])) {
	                $cat_id = $cat->cat_ID;
	                $catRequest = $cat_id;
	                $my_Request = allInOneGalleryWebsiteURL().'?page_id='.$pageID.'&catRequest='.$catRequest;
	                //highligh current category
		        if($cat_id === $user_cat_choice_id){
		                $sel = 'class="selected"';	
		        }
		        //Not selected
		        else{
		        	$sel = '';
		        }
		        echo '<li><a href="'.$my_Request.'" '.$sel.'>'.$cat_name.'</a></li>';
		}
	}
	//Pages link
	//Only display if not exlcuded
	if(empty($exlcu_cat['Pages'])) {
		$catRequest = 'Pages';
		$my_Request = allInOneGalleryWebsiteURL().'?page_id='.$pageID.'&catRequest='.$catRequest;
	        //highligh current category
		        if($user_cat_choice_id === 'Pages'){
		                $sel = 'class="selected"';	
		        }
		        //Not selected
		        else{
		        	$sel = '';
		        }
		echo '<li><a href="'.$my_Request.'" '.$sel.'>Pages</a></li>';
	}
	echo '</ul>';
	echo '</div>';
}

/*Pagination*/
function pagination($data, $currentPage, $perPage, $pID, $cat){
	
	//Total items
	$totalItems = count($data);
	
	// The items on the current page.
	$offset = ($currentPage - 1) * $perPage;
	$firstItem = $offset + 1;
	$lastItem = $offset + $perPage < $totalItems ? $offset + $perPage : $totalItems;
	
	// Some useful variables for making links.
	$firstPage = 1;
	$lastPage = ceil($totalItems / $perPage);
	$prevPage = $currentPage - 1 > 0 ? $currentPage - 1 : 1;
	$nextPage = $currentPage + 1 > $lastPage ? $lastPage : $currentPage + 1;
	
	// Get the items for the current page
	$items = array_slice($data, $offset, $perPage);

	//Output
	$myURL = '?page_id='.$pID.'&catRequest='.$cat;
        $outPut .= '<ul class="nav">';
        $outPut .= '<li><a href="'.$myURL.'&page='.$firstPage.'">First Page</a></li>';
        $outPut .= '<li><a href="'.$myURL.'&page='.$prevPage.'">Previous Page</a></li>';
        $outPut .= '<li>';
        $outPut .= 'Page '.$currentPage.' of '.$lastPage;
        $outPut .= '</li>';
        $outPut .= '<li><a href="'.$myURL.'&page='.$nextPage.'">Next Page</a></li>';
        $outPut .= '<li><a href="'.$myURL.'&page='.$lastPage.'">Last Page</a></li>';
        $outPut .= '</ul>';
    
	$pagination = array();
	$pagination['output'] = $outPut;
	$pagination['array'] = $items;
	return $pagination;
}


/*Add the content*/
function allInOneGalleryContent($content) {
        //allInOneGalleryDebug();
	if (allInOneGalleryTakeEffect() === TRUE){
		$my_page_ID = get_the_ID();
		$userRequests = allInOneGalleryUserChoice();
		$user_cat_choice_id = $userRequests['cat_id'];
		$galleryCurrentPage = $userRequests['page'];
		$to = $userRequests['to'];
		$excludedImages = get_option('allInOneGallery_img_exclude');
		//Check Thumb size
		if(get_option(allInOneGallery_thumb_size) === 'default') $myImgSize = '';
		else $myImgSize = ' size="'.get_option(allInOneGallery_thumb_size).'"';
		//Check what type of welcome message the user wants
		$welcome_user_choice = get_option('allInOneGallery_message_switch');
		if($welcome_user_choice == 'On'){
			//Select the welcome message
			if(empty($user_cat_choice_id)){
				$user_cat_choice_id = '';
			} 
			}else{
			//Select the welcome category
			if(empty($user_cat_choice_id)){
				$user_cat_choice_id = get_option('allInOneGallery_welcome_category');
			} 
		}
		//Display Categories menu
		$content .= allInOneGalleryCategories($my_page_ID, $user_cat_choice_id);
		//Display Posts and Gallery for the selected category
		$content .= '<div id="all_in_one_gallery">';
		//Display Posts
		if($user_cat_choice_id != "Pages"){
			//No choice means just arrived on the gallery
	                if(empty($user_cat_choice_id)){
				//display welcome message
				$content .= '<div id="all_in_one_welcome">';
				$content .= '<p>'.get_option('allInOneGallery_welcome_message').'</p>';
			        $content .= '</div>';	
			}else{//Give what the user asked for
	        	        //get Posts
			        $allMyPosts = get_posts('numberposts=-1&post_type=any&category='.$user_cat_choice_id);
				//Pagination is ON
				if(get_option(allInOneGallery_pagination_switch) === 'On'){
					//Rebuild a array with only the post with Images
					$onlyPostsImages = array();
					foreach($allMyPosts as $key => $val){
						$postID = $val->ID;
						$post_attch = get_children('post_type=attachment&post_mime_type=image&post_parent='.$postID);
						if(!empty($post_attch)){
							$onlyPostsImages[$key] = $val;
						}
					}
				
					$pagination = pagination($onlyPostsImages, $galleryCurrentPage, $to, $my_page_ID, $user_cat_choice_id);
					$myposts = $pagination['array'];
					$content .= $pagination['output'];
				}
				//No Pagination
				else{
					$myposts = $allMyPosts;
				}
				foreach($myposts as $post){
	        	                //Info about the post
				        $postID = $post->ID;
					$post_attachments = get_children('post_type=attachment&post_mime_type=image&post_parent='.$postID);
	        	        	if(empty($post_attachments)){
				                $all_posts_attachements[] = FALSE;
				        }else{
				                $all_posts_attachements[] = TRUE;
						//The post
						//$content .= $postID.' ';
						$aPost = get_post($post);
						$content .= '<h3>'.$aPost->post_title.' <small>/ <a href="'.get_permalink($postID).'">view this post</a></small></h3>';
						
						//If you need to display infos about the attachements
						//foreach($post_attachments as $attach) {
						// Now the single attachment array or object is in $attach
							//allInOneGalleryDebug($attach);
							//allInOneGalleryDebug($attach->ID.':'.$attach->post_mime_type.'<br/>');
						//}
						
						//the Gallery
						$userColumnsChoice = ' columns="'.get_option(allInOneGallery_how_many_columms).'"';
						//Check for excluded images, and if there's some add it to [gallery]
						if(!empty($excludedImages)){
							
							if(array_key_exists($user_cat_choice_id, $excludedImages) && array_key_exists($postID, $excludedImages[$user_cat_choice_id])) {
							$excludedImagesID = array_keys($excludedImages[$user_cat_choice_id ][$postID]);
							$excludedList = ' exclude="'.implode(",", $excludedImagesID).'"';
							}
							else $excludedList = ' ';	
						}
						else $excludedList = ' ';
						
						//allInOneGalleryDebug('[gallery id="'.$postID.'"'.$excludedList.$userColumnsChoice.$myImgSize.']');
						
						//Build gallery
						$content .= '<div class="a_gallerie">';
						$content .= '[gallery id="'.$postID.'"'.$excludedList.$userColumnsChoice.$myImgSize.']';
						$content .= '</div>';
					}
				}
	                	//If there is no posts with attachements, say it
	                	if(!in_array(TRUE, $all_posts_attachements)){
		        	        $content .= '<p>there is no images in this category</p>';
	                	}else{
		        	        //don't say anything
	                	}
	        	}
		}
		//Display Pages
		else{
		        $mypages = get_posts('numberposts=-1&post_type=page');
	        	foreach($mypages as $page){
	        	        //Info about the post
			        $pageID = $page->ID;
				$page_attachments = get_children('post_type=attachment&post_mime_type=image&post_parent='.$pageID);
	        		        if(empty($page_attachments)){
				                $all_page_attachements[] = FALSE;
				        }else{
				                $all_page_attachements[] = TRUE;
				        //The post
				        //$content .= $postID.' ';
		        	        $aPage = get_post($page);
		        	        $content .= '<h3>'.$aPage->post_title.' <small>/ <a href="'.get_permalink($pageID).'">view this page</a></small></h3>';
				        /*
				        //If you need to display infos about the attachements
				        foreach($attachments as $attach) {
		        	        // Now the single attachment array or object is in $attach
				        $content .= $attach->post_type.':'.$attach->post_mime_type.'<br/>';
	                 	       }*/
			 	       //the Gallery
					$userColumnsChoice = get_option(allInOneGallery_how_many_columms);
				        $content .= '<div class="a_gallerie">';
					$content .= '[gallery id="'.$pageID.'" columns="'.$userColumnsChoice.'"'.$myImgSize.']';
	                	        $content .= '</div>';
				}
	        	}	
		}
		if(get_option(allInOneGallery_pagination_switch) === 'On') $content .= $pagination['output'];
		$content .= '</div>';
		$content .= '</div>';
        }

 return $content;

}

add_action('the_content', 'allInOneGalleryContent');

/*****************************************************************************/
/*  CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS  CSS */
/*****************************************************************************/
function allInOneGalleryCss(){
	if(allInOneGalleryTakeEffect() === true){
    	echo '<link media="screen" type="text/css" href="'.allInOneGalleryURL().'/all_in_one_gallery_themes/'.get_option(allInOneGallery_css_theme).'/'.get_option(allInOneGallery_css_theme).'.css" rel="stylesheet"/>';
	}
}


add_action('wp_head', 'allInOneGalleryCss');


?>
