<?php
/*
Plugin Name: Last Wordpress Seo Plugin
Plugin URI: http://www.wpxue.com/?p=105
Description:Last Wordpress Seo Plugin:Auto add keywords and description in the head meta of home,single,page,category and tag,also can custom title keywords and  description. 
Author: wpxue
Version: 1.0.1
Author URI: http://www.wpxue.com

*/
###############WPxue_PayPal_Donate###############
if(!function_exists('WPxue_PayPal_Donate')){
function WPxue_PayPal_Donate($number,$image="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif",$name='Donate WPxue.com,Thank you very much!'){
$name=urlencode($name);
$number=urlencode($number);
$image1="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif";
$image2="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif";
$image3="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif";
$image4="https://www.paypal.com/en_GB/i/btn/btn_donateCC_LG.gif";

echo <<< html
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=hnbwww%40qq%2ecom&lc=US&item_name=$name&item_number=$number&button_subtype=services&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted" >
<img src="$image" border="0"   alt="If you like this Plugin , please Donate WPxue.com,Thank you very much!" title="If you like this Plugin , please Donate WPxue.com,Thank you very much! 
Make payments with PayPal - it's fast, free and secure!"/>
 </a>
html;
}
}
###############WPxue_PayPal_Donate###############
add_action('init', 'init_lwsp');
function init_lwsp(){
  load_plugin_textdomain('lwsp',PLUGINDIR. '/' . dirname(plugin_basename(__FILE__)) . '/lang');
}
class lwspOptions {

	function getOptions() {
		$options = get_option('lwsp_options');
		if (!is_array($options)) {
           $options['bname'] = false;
			$options['lwsp_home_title'] =get_bloginfo('blogname');
			$options['lwsp_keywords_content'] = '';
			$options['lwsp_description_content'] = '';
			update_option('lwsp_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['lwsp_save'])) {//if lwsp_save POST
			$options = lwspOptions::getOptions();
			 if ($_POST['bname']) {//blog name
				$options['bname'] = (bool)true;//insert blog name
			} else {
				$options['bname'] = (bool)false;
			}
			$options['lwsp_home_title'] =	stripslashes($_POST['lwsp_home_title']);// home title
			
			$options['lwsp_keywords_content'] = stripslashes($_POST['lwsp_keywords_content']);// home keywords
    
			$options['lwsp_description_content'] = stripslashes($_POST['lwsp_description_content']);// home description

			 
			update_option('lwsp_options', $options);

		} else {
			lwspOptions::getOptions();
		}

		add_options_page(__('Last SEO option','lwsp'), __('Last SEO option','lwsp'),5, basename(__FILE__), array('lwspOptions', 'display'));
	}

	function display() {
		$options = lwspOptions::getOptions();
?>

<form action="" method="post" enctype="multipart/form-data" name="lwsp_form">

		<div class="wrap">
<?php if(isset($_POST['lwsp_save'])) { ?>
<div class="updated fade"><p><strong>Save OK !</strong></p> </div>
<?php } ?>		
<div id="icon-page" class="icon32"><br></div>

<h2>Last WordPress Seo</h2>

	<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<strong><?php _e('option 1:','lwsp');?></strong>
					</th>
					<td>
											
					<label>
	<input name="bname" type="checkbox" value="checkbox" <?php if($options['bname']) {echo "checked='checked'"; }?> />
		<?php  _e('Insert blog name into keywords in category head, tag head, page head and single head(if no tags for single)','lwsp') ; ?>
		</label>
										
					</td>
				</tr>
			</tbody>
		</table>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
					<strong><?php _e('option 2:','lwsp');?></strong>
						<?php _e('Home_keywords','lwsp'); ?>
						
						<small style="font-weight:normal;"><?php _e('(Separate keywords with comma)','lwsp'); ?></small>
					</th>
					<td>
					 
						<label>
							<textarea name="lwsp_keywords_content" cols="50" rows="3" style="width:98%;font-size:12px;" ><?php echo($options['lwsp_keywords_content']); ?></textarea>
						</label>
					
					</td>
				</tr>
			</tbody>
		</table>
<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
					<strong><?php _e('option 3:','lwsp');?></strong>
						<?php _e('Home_description','lwsp'); ?>
					</th>
					<td>
 
						<label>
							<textarea name="lwsp_description_content" cols="50" rows="3" style="width:98%;font-size:12px;"><?php echo($options['lwsp_description_content']); ?></textarea>
						</label>
					
					</td>
				</tr>
			</tbody>
		</table>
 <table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
					<strong><?php _e('option 4:','lwsp');?></strong>
						<?php _e('Home_title','lwsp'); ?>
					</th>
					<td>
 
						<label>
							<input name="lwsp_home_title" style="width:96.6%;font-size:12px;" value="<?php echo($options['lwsp_home_title']); ?>"> 
						</label>
					
					</td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input class="button-primary" type="submit" name="lwsp_save" style="margin-right:30px;" value="<?php _e('Save Changes','lwsp'); ?>" />
			 <?php WPxue_PayPal_Donate('Last Wordpress Seo Plugin')?>
		</p>
		
				<h3><?php _e('NOTE:','lwsp');?></h3><p><?php _e('<strong>Tips:</strong><br/>1)You can add  custom fields key:<code>title</code>  for the page title <br/> 2)You can add  custom fields key:<code>keywords</code>   for the meta keywords <br/> 3)You can add  custom fields key:<code>description</code>   for the meta description <br/><br/><strong>Home</strong>:<br/>1)If you set keywords and description in option2 and option3,the content will be displayed in Home head meta;<br/>2)You can set Home title  in option4;<br/><br/><strong>Single</strong>:<br/>1)In default, the tags for the single will be keywords, and some of single post content will be description;<br/>2)If add two custom fields for the single post, one key is keywords, another key is description, their content will be keywords and description in single head meta instead;<br/>3)If the post excerpt of the single is not blank, the content will be description in single head meta;<br/>4)If no tags for the single, the post title will be keywords instead;<br/><br/><strong>Page</strong>:<br/>1)If add two custom fields for the page, one key is keywords, another key is description, their content will be keywords and description in page head meta;<br/>2)otherwise, the page title will be keywords, and some of the page content will be description instead;<br/><br/><strong>Category</strong>:<br/>1)In default, the cat name and cat_description will be keywords and description in category head meta;<br/>2)If cat_description is blank, the cat name  will be description and keywords instead;<br/><br/><strong>Tag</strong>:<br/>1)In default, the tag name and tag_description will be keywords and description in tag head meta;<br/>2)If tag_description is blank, the tag name  will be description and keywords instead;','lwsp'); ?></p>
		
</div>	
</form>
 <?php
	

}}
add_action('admin_menu', array('lwspOptions','add'));

?><?php

 if (!function_exists('cut_str')){
function cut_str($str, $len) {
    if (!isset($str[$len])) {

    } else {
		if (seems_utf8($str[$len-1])) //  
			$str = substr($str, 0, $len); //  
		else { //  
            if(seems_utf8($str[$len-3].$str[$len-2].$str[$len-1]))
                $str = substr($str, 0, $len-3) . $str[$len-3] . $str[$len-2] . $str[$len-1];

            elseif(seems_utf8($str[$len-2].$str[$len-1].$str[$len]))
                $str = substr($str, 0, $len-2) . $str[$len-2].$str[$len-1].$str[$len];

            elseif(seems_utf8($str[$len-1].$str[$len].$str[$len+1]))
                $str = substr($str, 0, $len-1) . $str[$len-1].$str[$len].$str[$len+1];

			else //  
                $str = substr($str, 0, $len);
        }
    }
    return $str;
}

}
//key and  des
function lwsp_key_des() {
    $options = get_option('lwsp_options');
    $desc_length  =228; 
    $custom_desc_key= 'description';
	$custom_keyw_key= 'keywords'; 

    global $post,$cat, $cache_categories, $wp_query, $key,$sitename;
	$sitename=get_option('blogname');
	foreach((get_the_category()) as $category) { 
    $key = $category->cat_name;}
	
    if(is_singular()){ 
        $custom_desc_value = get_post_meta($post->ID,$custom_desc_key,true);
		$custom_keyw_value = get_post_meta($post->ID,$custom_keyw_key,true);

        if($custom_desc_value) {
			$descr = trim(strip_tags($custom_desc_value));//custom field
        } elseif(!empty($post->post_excerpt)) {//excerpt
            $descr = $post->post_excerpt;
        } else {
			$descr = $post->post_content;//auto 
        }
		$descr = str_replace(array("\r","\n"), " ", $descr);
        $descr = trim(strip_tags($descr));

		$description	=	cut_str($descr,$desc_length) ;
		//description OK
		
		
		//single keywords=tags 
		$keywords='';
		if($custom_keyw_value) {	            $keywords = trim(strip_tags($custom_keyw_value));        }
		
		if(!$custom_keyw_value) {
		$tags = wp_get_post_tags($post->ID);
	    foreach ($tags as $tag ) {		$keywor[]=$tag->name;}
		if ($keywor=='')
		{
		$keywords=$post->post_title;
		if ($options['bname']){	$keywords=$post->post_title.','.strip_tags($sitename);	}
		}else{		$keywords=implode(",",$keywor);}
		
												}


    } 
	
	elseif(is_category()) {
	    if ($options['bname']){		$keywords= $key.','.strip_tags($sitename);}	else{$keywords= $key;}
 
        $description = trim(strip_tags(category_description()));if($description==""){$description=single_cat_title('',false);}
    } elseif(is_tag()) {
	    $tag= $wp_query->get_queried_object();
		if ($options['bname']){		$keywords= $tag->name.','.strip_tags($sitename);}	else{$keywords= $tag->name;}
 
        $description = trim(strip_tags(category_description()));if($description==""){$description=single_cat_title('',false);}
    } 
	elseif(is_home() || is_front_page()) {
	
 			$keywords	=	$options['lwsp_keywords_content'];
 			$description	=	$options['lwsp_description_content']; 
       
    }
	
   if($keywords)
   {
   echo"<meta name=\"keywords\" content=\"$keywords\" />\n";
   }
   if($description)
   {
   echo "<meta name=\"description\" content=\"$description\" />\n";
    }
}

//title
function lwsp_wp_title($title, $separator ) {	
//separator
	$separator="_";

	global $paged, $page,$post;
//read 	lwsp_options
	$lwsp_options =  get_option('lwsp_options');
	$custom_title = get_post_meta($post->ID,'title',true);
 //home title
 	if ( is_home() || is_front_page() )		{$title = $lwsp_options['lwsp_home_title']; 	}
 //single or page title 
	elseif(is_singular()&&$custom_title) {	$title = $custom_title; 	}

	$title.=$separator.get_bloginfo('blogname');
	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'lwsp_wp_title', 10, 2);
add_action('wp_head', 'lwsp_key_des');
?>