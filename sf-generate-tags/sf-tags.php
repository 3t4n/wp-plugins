<?php 
/**
 * Plugin Name: SF Generate Tags
 * Plugin URI: http://studiofreya.com
 * Description: This plugin autogenerates tags for your posts from attached images names and post text
 * Version: 1.4.1
 * Author: Studiofreya AS
 * Author URI: http://studiofreya.com
 * License: GPL3
 */

function init_tags() {
	
	if ( is_admin() ) {
		require( 'sf-tags-admin.php' );
		require( 'sf-tags-filter-english.php' );
		new SFTags_Admin();
	}
	
	load_textdomain( 'sf-tags', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'plugins_loaded', 'init_tags' );


function sf_tags_load_jquery() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_script', 'sf_tags_load_jquery' );


function sf_ajax_tags_scripts() { 
?>
	<script type="text/javascript">
    jQuery(document).ready(function()
	{
		jQuery('#btnSubmit').click(function ()
		{
			var sf_post_id = jQuery('#sf_post_id').val();
			var sf_remove_words = jQuery('#sf_remove_words').val();
			var sf_limit_tags_to = jQuery('#sf_limit_tags').val();
			var sf_from_images = jQuery('#sf_from_images').is(':checked')? 1:0;
			var sf_from_text = jQuery('#sf_from_text').is(':checked')? 1:0;
			
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				
				data: {
					action : 'sf_generate_tags', 
					post_id: sf_post_id,
					remove_words: sf_remove_words,
					limit_tags: sf_limit_tags_to,
					from_images : sf_from_images,
					from_text : sf_from_text
				}
				}).done(function( msg ) {
					jQuery("#new-tag-post_tag").val(msg);
					jQuery(".ajaxtag input.button").trigger('click');   
				 });
		});
	});
</script>
<?php }
add_action('admin_footer','sf_ajax_tags_scripts');

function sf_generate_tags() {
	$postId = (int)$_POST['post_id'];
	
	//get existing tags
	$tags = wp_set_post_tags($postId);

	$s = "";
	
	$tagsFromImages = (int)$_POST['from_images'];
	if($tagsFromImages == 1)
	{
		$media = get_attached_media( 'image', $postId );
		foreach($media as $attachment_meta)
		{
			$s .= $attachment_meta->post_name;
			$s .= "-";
		}
	}
	
	$tagsFromText = (int)$_POST['from_text'];
	if($tagsFromText == 1)
	{
		$content_post = get_post($postId);
		$content = $content_post->post_content;
		$s .= $content;
	}
	
	//remove links
	$textNoLinks = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $s);

	//split string and make an array of words
	$wordsArray = preg_split("/[\s,-.]+/", $textNoLinks);
	$tagsArray = array_unique(array_map('strtolower', $wordsArray));
	sort($tagsArray);
		
	//exclude user defined words
	$removeWords_string = $_POST['remove_words'];
	$removables = preg_split("/[\s,-.]+/", $removeWords_string);
	$tagsArrayExcludedUser = array_diff($tagsArray, $removables);
	
	//exclude words with some literals
	$tagsArrayExcludedLiterals = removeWordsWithLiterals($tagsArrayExcludedUser);
	$tagsArrayFilteredEnglish = filterEnglish($tagsArrayExcludedLiterals);
	
	//limit number of tags
	$limitNumber = $_POST['limit_tags'];
	if(isset($limitNumber) && $limitNumber > 0 && count($tagsArrayFilteredEnglish) > $limitNumber) {
		$tagsArrayFilteredEnglish = limitTagsTo($tagsArrayFilteredEnglish, $limitNumber);
	}
	
	//make tags a comma separated array
	$commaSeparatedTags = implode(",", $tagsArrayFilteredEnglish);
	array_push($tags, $commaSeparatedTags);
	
	//send response
	$response = implode(",", $tags);
	echo "$response";
	
	wp_die();
}
add_action("wp_ajax_sf_generate_tags", "sf_generate_tags");

function removeWordsWithLiterals($input_array)
{
	$output_array = array();
	
	$letters_only="/^\pL+$/u";
	foreach ( $input_array as $word ) 
	{
		$toOutput = true;
		if(preg_match( $letters_only, $word ))
		{
			//letters only -> ok
		} else {
			$toOutput = false;
		}
		
		if(strlen($word) <= 2)
		{ 	
			$toOutput = false;
		} 

		if($toOutput == TRUE){
			array_push($output_array, $word);
		}
	}
	
	return $output_array;
}

function wordEndsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

?>
