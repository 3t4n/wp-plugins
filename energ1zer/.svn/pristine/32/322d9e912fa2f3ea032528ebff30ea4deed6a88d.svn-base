<?php
/**
 * Plugin Name.
 *
 * @package   Energ1zer
 * @author    Francois Oligny-Lemieux <frank.quebec@gmail.com>
 * @license   GPL-2.0+
 * @link      http://oligny.com
 * @copyright 2014-2015 Francois Oligny-Lemieux
 */

/**
 * Plugin class. This class deals with the
 * public-facing side of the WordPress site.
 *
 * Administrative or dashboard functionality go into `class-energ1zer-admin.php`
 *
 *
 * @package Energ1zer
 * @author  Francois Oligny-Lemieux <frank.quebec@gmail.com>
 */
class Energ1zer
{
	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 * @since   1.0.0
	 * @var     string
	 */
	const VERSION = '1.1.3';

	/**
	 * @TODO - Rename "energ1zer" to the name your your plugin
	 * Unique identifier for your plugin.
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 * @since    1.0.0
	 * @var      string
	 */
	protected $plugin_slug = 'energ1zer';

	/**
	 * Instance of this class.
	 * @since    1.0.0
	 * @var      object
	 */
	protected static $instance = null;

   /**
    * Written 27.Nov.2016 by Francois Oligny-Lemieux
    */ 
   public static function GetTagsWithClass($content, $classname)
   {
      $DEBUG = false;
      $retArray = [];
   	$currentPosition = 0;
   	while(1)
   	{
   	   $strPos = strpos($content, $classname, $currentPosition);
   	   if ($strPos === false) break;
   	   $currentPosition = $strPos+1; // move on so we dont find this one again
   	   if ($DEBUG) echo "currentPosition:$currentPosition\n";
   	   // Validate it is a class and inside tag
   	   $stateSeenClass = false;
   	   $found = false;
   	   while($strPos > 0)
   	   {
   	      $strPos--;
   	      if ($DEBUG) echo "strPos:$strPos\n";
   	      $char = $content[$strPos];
   	      if ($DEBUG) echo "char:$char\n";
   	      if ($char == '<' && $stateSeenClass == false)
   	      {
   	         // it was not in a class, skip it
   	         if ($DEBUG) echo ("it was not in a class, skip it\n");
   	         break;
   	      }
   	      else if ($char == '<')
   	      {
   	         // we got it!
   	         if ($DEBUG) echo ("we got it!\n");
   	         $found = true;
   	         break;
   	      }
   
   	      if ($stateSeenClass == false)
   	      {
   		      $prv6 = substr($content, $strPos-6, 6);
   		      if ($DEBUG) echo("char:$char\n");
   		      if ($DEBUG) if ($prv6 && strlen($prv6)>0) echo("prv6:$prv6\n\n");
   		      if ($DEBUG) echo "going cmp\n";
   		      if ($char === '"' && $prv6 === 'class=')
   		      {
   		         // got one
   		         $stateSeenClass = true;
   		         if ($DEBUG) echo("got class\n");
   		      }
   		      //error_log("abc");
   		   }
   	      if ($DEBUG) echo "endloop\n";
   	   }
   	   // process one
   	   if ($found)
   	   {
   	      if ($DEBUG) echo "got one glisp: $strPos\n";
   	      $tagSearch = substr($content, $strPos);
   	      if ($DEBUG) echo "tagSearch:$tagSearch\n";
   	      $amount = preg_match("/^<([a-zA-Z][a-zA-Z0-9]*) /", $tagSearch, $matches);
            if ($DEBUG) echo "1amount:$amount\n";
   	      if ($amount > 0)
   	      {
   	         if ($DEBUG) print_r($matches);
   	         $tagName = $matches[1];
   	         if ($DEBUG) echo "tagName:$tagName\n";
   	         $endPos = $strPos;
   	         $re = "/(<\/$tagName>|<$tagName )/";
   	         if ($DEBUG) echo $re . "\n";
   		      if ($DEBUG) echo "2amount:$amount\n";
   		      $openingLookup1 = "<$tagName>";
   		      $openingLookup2 = "<$tagName ";
   		      $closingLookup = "</$tagName>";
   		      $seekerPos = $strPos+1;
   		      $strPosOpening1 = strpos($content, $openingLookup1, $seekerPos);
   		      $strPosOpening2 = strpos($content, $openingLookup2, $seekerPos);
   		      $strPosClosing = strpos($content, $closingLookup, $seekerPos);
   	         $count = 1;
   		      while ($count > 0 && ($strPosOpening1 !== false || $strPosOpening2 !== false || $strPosClosing !== false))
   	         {
   		         if ($DEBUG) echo "\nstrPosOpening1:$strPosOpening1\n";
   		         if ($DEBUG) echo "\nstrPosOpening2:$strPosOpening2\n";
   		         if ($DEBUG) echo "strPosClosing:$strPosClosing\n";
   		         // get the first one
   		         if ($strPosOpening1 !== false && $strPosOpening2 !== false && $strPosClosing !== false)
   		         {
   		            if ($strPosOpening1 < $strPosOpening2
   		             && $strPosOpening1 < $strPosClosing)
   		            {    			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one opening of same tag\n";
   		                $count++;
   		                $seekerPos = $strPosOpening1;
   		            }
   		            else if ($strPosOpening2 < $strPosOpening1
   		             && $strPosOpening2 < $strPosClosing)
   		            {    			               
   		                // found one opening of same tag
   		                $count++;
   		                if ($DEBUG) echo "found one opening of same tag, count:$count\n";
   		                $seekerPos = $strPosOpening2;
   		            }
   		            else
   		            {    			               
   		                // found one opening of same tag
   		                $count--;
   		                if ($DEBUG) echo "found one closing of same tag, count:$count\n";
   		                $seekerPos = $strPosClosing;
   		            }
   		         }
   		         else if ($strPosOpening1 !== false && $strPosOpening2 !== false && $strPosClosing === false)
   		         {
   		            if ($strPosOpening1 < $strPosOpening2)
   		            {    			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one opening of same tag\n";
   		                $count++;
   		                $seekerPos = $strPosOpening1;
   		            }
   		            else if ($strPosOpening2 < $strPosOpening1)
   		            {    			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one opening of same tag\n";
   		                $count++;
   		                $seekerPos = $strPosOpening2;
   		            }
   		         }
   		         else if ($strPosOpening1 !== false && $strPosOpening2 === false && $strPosClosing !== false)
   		         {
   		            if ($strPosOpening1 < $strPosClosing)
   		            {    			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one opening of same tag\n";
   		                $count++;
   		                $seekerPos = $strPosOpening1;
   		            }
   		            else
   		            {
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one closing of same tag\n";
   		                $count--;
   		                $seekerPos = $strPosClosing;
   		            }
   		         }
   		         else if ($strPosOpening1 === false && $strPosOpening2 !== false && $strPosClosing !== false)
   		         {
   		            if ($strPosOpening2 < $strPosClosing)
   		            { 			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one opening of same tag\n";
   		                $count++;
   		                $seekerPos = $strPosOpening2;
   		            }
   		            else
   		            {    			               
   		                // found one opening of same tag
   		                if ($DEBUG) echo "found one closing of same tag\n";
   		                $count--;
   		                $seekerPos = $strPosClosing;
   		            }
   		         }
   		         else if ($strPosOpening1 !== false)
   		         { 
   		            // found one opening of same tag
   		            if ($DEBUG) echo "found one opening of same tag\n";
   		            $count++;
   		            $seekerPos = $strPosOpening1;
   		         }
   		         else if ($strPosOpening2 !== false)
   		         { 
   		            // found one opening of same tag
   		            if ($DEBUG) echo "found one opening of same tag\n";
   		            $count++;
   		            $seekerPos = $strPosOpening2;
   		         }
   		         else if ($strPosClosing !== false)
   		         {
   		            // found one opening of same tag
   		            if ($DEBUG) echo "found one closing of same tag\n";
   		            $count--;
   		            $seekerPos = $strPosClosing;
   		         }
   		         else
   		         {
   		            if ($DEBUG) echo "Unexpected\n";
   		         }
   		         
   	            if ($DEBUG) echo "new count:$count\n";
   	            $seekerPos++;
   	            $haystack = substr($content, $strPos+$seekerPos);
   	            if ($DEBUG) echo "new haystack:$haystack";
                  $strPosOpening1 = strpos($content, $openingLookup1, $seekerPos);
    			      $strPosOpening2 = strpos($content, $openingLookup2, $seekerPos);
    			      $strPosClosing = strpos($content, $closingLookup, $seekerPos);
   	         } // while(...)
   	         
   	         if ($DEBUG) echo "out of matches";
   	         if ($count === 0)
   	         {
   	           // success found full chunk
   	           if ($DEBUG) echo "success found full chunk\n";
   	           $chunk = substr($content, $strPos, $seekerPos-$strPos+strlen($closingLookup));
   	           if ($DEBUG) echo "chunk:$chunk\n";
   	           $retArray[] = array("position"=>$strPos, "html"=>$chunk);
   	         }
   	      }
   	   }
   	   if ($DEBUG) echo "end going back loop";
   	}
   	return $retArray;
   }

 
	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 * @since     1.0.0
	 */
	private function __construct()
	{
		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		
		// TODO write post about this	
		// This function will remove automatic addition of <br/> and <p> </p> by wordpress on pages
		function the_content_handler($content)
		{
			global $post;
			
			$energ1zer_wpautop = get_post_meta($post->ID, '_energ1zer_meta_wpautop', true);
			if ($energ1zer_wpautop === "show")
			{
			}
			else if ($energ1zer_wpautop === "hide")
			{
				// prevent wordpress from inserting <p> </p>
				remove_filter ('the_content',  'wpautop');
				remove_filter ('comment_text', 'wpautop');
			}
			
			// dupplicate banners styles div
			$classname="energ1zerFullWidth";
			$chunks = Energ1zer::GetTagsWithClass($content, $classname);
	//		error_log("count of chunks:".count($chunks)-1);
			#print_r($chunks);		
			for ($i=count($chunks)-1; $i>=0; $i--)
			{
//			   error_log("loopinh");
			   $chunk = $chunks[$i];
			   $strPos = $chunk["position"];
			   $replacement = $chunk["html"];
			   $replacement = str_replace("energ1zerFullWidth", "energ1zerFullWidth spacer", $replacement);
			   $replacement = $chunk["html"] . $replacement; // double up !
			   $content = substr_replace($content, $replacement, $strPos, strlen($chunk["html"]));
			}
			
			// Fill up fullwidth img bg styles div
			$classname="energ1zerBgFullwidth";
			$chunks = Energ1zer::GetTagsWithClass($content, $classname);
			#error_log("count of chunks:".count($chunks)-1);
			#print_r($chunks);
		
			for ($i=count($chunks)-1; $i>=0; $i--)
			{
			   #error_log("loopinh");
			   $chunk = $chunks[$i];
			   $strPos = $chunk["position"];
			   $replacement = $chunk["html"];
			   $replacement = str_replace("energ1zerFullWidth", "energ1zerFullWidth spacer", $replacement);
			   $replacement = $chunk["html"] . $replacement; // double up !
			   $content = substr_replace($content, $replacement, $strPos, strlen($chunk["html"]));
			}
			
			return $content;
		}
		add_filter('the_content', 'the_content_handler', 1); // 1 for high priority
		
		// Apply filter
		add_filter('body_class', 'energ1zer_body_classes');
		function energ1zer_body_classes($classes) 
		{
			global $post;
			if ($post === null) 
			{
				error_log("energ1zer_body_classes \$post is null");
				return $classes;
			}
			
			$pageclass = get_post_meta($post->ID, '_energ1zer_meta_widget_pageclass', true);
			// error_log("energ1zer_body_classes post id:" . $post->ID);
			// error_log("energ1zer_body_classes pageclass:$pageclass");
			$additions = explode(" ", $pageclass);
			if ($additions === FALSE) return $classes;
			
			foreach ($additions as $class)
			{
				$classes[] = $class;
			}
			return $classes;
		}
		
		function namespace_add_custom_types( $query )
		{
			if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) 
			{	$query->set( 'post_type', array( 'post', 'nav_menu_item', 'page' ));
				return $query;
			}
		}
		add_filter( 'pre_get_posts', 'namespace_add_custom_types' );// - See more at: http://dineshkarki.com.np/forums/topic/causes-main-menu-to-disappear#sthash.maCYBMXv.dpuf
		
		if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) 
		{
		    // this is to prevent users from downloading the crazy large 18-megapixel uploaded file when clicking on image attachement link	
			function energ1zer_modify_gallery_filter($content, $post_id, $size, $permalink)
			{
	 			if (! $permalink) 
				{
					$image = wp_get_attachment_image_src($post_id, 'large');
					$new_content = preg_replace('/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $content );
					return $new_content;
				}
				else
				{	return $content;
				}
			}
			add_filter('wp_get_attachment_link', 'energ1zer_modify_gallery_filter', 10, 4);
			
			/**
			 * Get one image from a specified post in the following order:
			 * Featured Image, first attached image, first image from the_content HTML
			 * @param int $id, The post ID to check
			 * @param string $size, The image size to return
			 */
			function get_article_image($id, $size = 'home-post', $add_styles = '') 
			{
				$thumb = '';
	
				if ( '' != get_the_post_thumbnail( $id ) ) 
				{	$thumb = get_the_post_thumbnail( $id, $size, array('class' => 'grid-item ' . $add_styles, 'title' => esc_attr( strip_tags( get_the_title() ) ) ) );
				}
				else
				{
					$args = array(
								'post_type'		 => 'attachment',
								'fields'    	 => 'ids',
								'numberposts'	 => 1,
								'post_status'	 => null,
								'post_mime_type' => 'image',
								'post_parent'	 => $id,
							);
			
					$first_attachment = get_posts( $args );	
					if ( $first_attachment )
					{	
						/* Get the first image attachment */
						foreach ( $first_attachment as $attachment ) 
						{	$thumb = wp_get_attachment_image( $attachment, $size, false, array( 'class' => 'grid-item' . $add_styles, 'title' => esc_attr( strip_tags( get_the_title() ) ) ) );
						}
					}
					else if ( class_exists( 'Jetpack_PostImages' ) )
					{	
						/* Get the first image directly from HTML content */
						$getimage = new Jetpack_PostImages();
						$image = $getimage->from_html( $id );	
						if ( $image )
						{	$thumb = '<img src="' . $image[0]['src'] . '" title="' . esc_attr( strip_tags( get_the_title() ) ) . '" class="attachment-' . $size . ' wp-post-image" />';
						}
					}
				}
	
				return $thumb;
			}
			
			function get_all_article_images($id, $size = 'home-post', $add_styles = "") 
			{
				$thumbs = array();
	
				{
					$args = array(
								'post_type'		 => 'attachment',
								'fields'    	 => 'ids',
								'post_status'	 => null,
								'numberposts'	 => 999999999,
								'post_mime_type' => 'image',
								'post_parent'	 => $id,
								'orderby' => 'menu_order ID',
								'order' => 'ASC'
							);
			
					$all_items = get_posts( $args );
					if ( $all_items )
					{	
						/* Get the first image attachment */
						foreach ( $all_items as $attachment )
						{
							error_log("looping img attachment: $attachment");
							$thumbTemp = wp_get_attachment_image_src($attachment, $size, false);
							//$varStyle = 'width:'.$thumbTemp[1].'px; height:'.$thumbTemp[2].'px;';
							//error_log("varStyle:$varStyle");
							$thumbTag = wp_get_attachment_image($attachment, $size, false, 
								array( 'class' => 'grid-item '. $add_styles, 
									   'title' => esc_attr( strip_tags( get_the_title() ) )
									   //,'style' => 'width:'.$thumbTemp[1].'px; height:'.$thumbTemp[2].'px;'
								     ));
							$fullSizeTag = wp_get_attachment_image_src($attachment, "large");
							$fullSizeUrl = "";
							if ($fullSizeTag && count($fullSizeTag) > 0)
							{	$fullSizeUrl = $fullSizeTag[0];
							}
							$media = get_post($attachment);
							$thumbs[$attachment] = array($thumbTag, $fullSizeUrl, $media->post_content);
						}
					}
					else if ( class_exists( 'Jetpack_PostImages' ) )
					{	
						/* NOT IMPLEMENTED */
					}
				}
	
				return $thumbs;
			}
			
			function get_article_image_for_gallery($id, $size = 'home-post', $add_style = '')
			{
				$imgTag = get_article_image($id, $size, $add_style);
				$permalink = get_permalink($id);
				
				return <<<EOL
<a href="$permalink" class="jsEnerg1zerGalleryItem">$imgTag</a>
EOL;
			}
			
			function get_all_article_images_for_gallery($id, $size = 'home-post', $add_style = '')
			{
				$imgTagArray = get_all_article_images($id, $size, $add_style);
				$html = "";
				
				foreach ($imgTagArray as $imgTag)
				{
					// error_log("getting one permalink:".$permalink);
					$html .= <<<EOL
<a href="{$imgTag[1]}" class="jsEnerg1zerGalleryItem" data-rel="lightbox">{$imgTag[0]}<span class="jsText displayNone">{$imgTag[2]}</span></a>
EOL;
				}
				
				return $html;
			}

			function get_article_image_for_slider($id, $size = 'large')
			{
				$imgSrc = wp_get_attachment_image_src($id, $size);
				$permalink = get_permalink($id);
				
				return <<<EOL
<a href="{$imgSrc[0]}" class="jsEnerg1zerSliderItem" data-rel="energ1zer-slider-item" style="display:none"><img src="{$imgSrc[0]}" width="{$imgSrc[1]}" height="{$imgSrc[2]}" style="visibility:hidden;"></a>
EOL;
			}
						
			//[shortcode] generic
			function energ1zer_generic_shortcode_func($atts)
			{
				$string = "";
				$additionalStyles = "";
				
				if (isset($atts["marginbottom"])) 
				{	$additionalStyles .= "margin-bottom:".$atts["marginbottom"];
					if (substr($additionalStyles,-2)!=="px") 
					{	$additionalStyles .= "px";
					}
				}
				if (isset($atts["margin"])) 
				{	$additionalStyles .= " margin:".$atts["margin"].";"; // FRANK FIXME SANITIZE INPUT
				}
				if (isset($atts["break"])) 
				{
					$additionalStyles .= "clear:both;";
				}
				
				if (isset($atts["spacer"]))
				{
					$height = $atts["spacer"] . "px";
					if (strstr($height,"px")===FALSE) 
					{	$height .= "px";
					}
					$string .= "<div style=\"line-height:$height; height:$height; $additionalStyles\"></div>";
				}
				
				if (isset($atts["liner"]))
				{					
					if (isset($atts["liner"]) && strlen($atts["liner"])>0 ) 
					{	$height = $atts["liner"];
						if (strstr($height,"px")===FALSE) 
						{	$height .= "px";
						}
						$additionalStyles .= "line-height:$height; height:$height; ";
					}
										
					if (isset($atts["color"])) 
					{	
						$color = $atts["color"];
						$additionalStyles .= "background-color:$color; ";
					}
					
					if (isset($atts["width"])) 
					{	$width = $atts["width"];
						if (strstr($width,"px")===FALSE) 
						{	$width .= "px";
						}
						$additionalStyles .= "width:$width; ";
					}
					
					// liner only
					$string .= "<div class=\"energ1zer liner\" style=\"clear:both; $additionalStyles\"></div>";
				}				
				
				if (isset($atts["post"]))
				{
					// This section contains some code Paul Ryan's very useful "Insert" plugin, Author URI: http://www.linkedin.com/in/paulrryan
					$display = "content";
					if (isset($atts["display"]) && strlen($atts["display"]) > 0)
					{	$display = $atts["display"];
					}
					
					$should_apply_the_content_filter = true;
					if (isset($atts["filter"]) && $atts["filter"] == "false") 
					{	$should_apply_the_content_filter = false;
					}
					
					$page = $atts["post"];
					
					// Don't allow inserted pages to be added to the_content more than once (prevent infinite loops).
					$done = false;
					foreach ( $wp_current_filter as $filter ) {
						if ( 'the_content' == $filter ) {
							if ( $done ) {
								error_log("Preventing infinite loop");
								return $content;
							} else {
								$done = true;
							}
						}
					}
					
					if ( is_numeric( $page ) ) {
						$args = array(
							'p' => intval( $page ),
							'post_type' => get_post_types(),
						);
					} else {
						$args = array(
							'name' => esc_attr( $page ),
							'post_type' => get_post_types(),
						);
						//error_log("using name");
					}
		
					query_posts( $args );
		
					// Start our new Loop (only iterate once).
					if ( have_posts() ) {
						ob_start(); // Start output buffering so we can save the output to string
		
						// If Beaver Builder plugin is enabled, load any cached styles associated with the inserted page.
						// Note: Temporarily set the global $post->ID to the inserted page ID,
						// since Beaver Builder relies on it to load the appropraite styles.
						if ( class_exists( 'FLBuilder' ) ) {
							$old_post_id = $post->ID;
							$post->ID = $page;
							FLBuilder::enqueue_layout_styles_scripts( $page );
							$post->ID = $old_post_id;
						}
		
						// Show either the title, link, content, everything, or everything via a custom template
						// Note: if the sharing_display filter exists, it means Jetpack is installed and Sharing is enabled;
						// This plugin conflicts with Sharing, because Sharing assumes the_content and the_excerpt filters
						// are only getting called once. The fix here is to disable processing of filters on the_content in
						// the inserted page. @see https://codex.wordpress.org/Function_Reference/the_content#Alternative_Usage
						switch ( $display ) {
						case "title":
							the_post();
							$title_tag = $should_use_inline_wrapper ? 'span' : 'h1';
							echo "<$title_tag class='insert-page-title'>";
							the_title();
							echo "</$title_tag>";
							break;
						case "link":
							the_post();
							?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php
							break;
						case "excerpt":
							the_post();
							?><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php
							if ( $should_apply_the_content_filter ) the_excerpt(); else echo get_the_excerpt();
							break;
						case "excerpt-only":
							the_post();
							if ( $should_apply_the_content_filter ) the_excerpt(); else echo get_the_excerpt();
							break;
						case "content":
							the_post();
							if ( $should_apply_the_content_filter ) the_content(); else echo get_the_content();
							break;
						case "all":
							the_post();
							$title_tag = $should_use_inline_wrapper ? 'span' : 'h1';
							echo "<$title_tag class='insert-page-title'>";
							the_title();
							echo "</$title_tag>";
							if ( $should_apply_the_content_filter ) the_content(); else echo get_the_content();
							the_meta();
							break;
						default: // display is either invalid, or contains a template file to use
							$template = locate_template( $display );
							if ( strlen( $template ) > 0 ) {
								include $template; // execute the template code
							} else { // Couldn't find template, so fall back to printing a link to the page.
								the_post();
								?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php
							}
							break;
						}
		
						$content = ob_get_contents(); // Save off output buffer
						ob_end_clean(); // End output buffering
					} else {
						/**
						 * Filter the html that should be displayed if an inserted page was not found.
						 *
						 * @param string $content html to be displayed. Defaults to an empty string.
						 */
						$content = apply_filters( 'insert_pages_not_found_message', $content );
					}
		
					wp_reset_query();
		
					//$string .= do_shortcode($content); // careful: watch for infinite loops with nested inserts
					$string .= $content;
				}
				
				return $string;
			}
			
			//[shortcode] gallery
			function energ1zer_gallery_shortcode_func($atts, $content = null)
			{
				$string = "";
				$categoryId = "";
				$imageSize = "medium";
				$itemWidth = "150";
				$galleryStyle = "masonry";
				$postIds = array();
				
				wp_reset_postdata();
				if (isset($atts["category"]))
				{
					$category = $atts["category"];
					$categoryId = get_cat_ID($category);
					$category_query_args = array(
					    'cat' => $categoryId
					);
					$query = new WP_Query($category_query_args);

					if ( ! $query->have_posts() ) 
					{
						// log
						return "";
					}
					
					while ($query->have_posts())
					{
						$query->the_post();
						$postIds[] = $query->post->ID;						
						$string .= $query->post->ID . ")<br>";//$img_tag;
					}
					
				}
				else if (isset($atts["postid"]))
				{
					$postid = $atts["postid"];
					$postIds[] = $postid;
				}
				else
				{
					return "<!-- energ1zer gallery missing parameters -->";
				}
				
				
				if (isset($atts["style"]))
				{
					$galleryStyle = $atts["style"];
				}
				
				if (isset($atts["size"]))
				{
					$imageSize = $atts["size"];
				}
				
				$dataMasonry = "data-masonry-width=\"$itemWidth\"";
				$string = "<div class=\"grid gallery $galleryStyle\" $dataMasonry>";
				$amount = count($postIds);
				$count = 0;
				
				foreach($postIds as $id)
				{				  
					$count++;
					$add_styles = "";
					//if ($count === $amount && $count % 2 == 1)
					{
						$add_styles = " grid-item--width2";
					}
					
					if (isset($atts["postid"]))
					{// all images in post
						$img_tag = get_all_article_images_for_gallery($id, $imageSize, $add_styles);
					}
					else 
					{// just first image from post
						$img_tag = get_article_image_for_gallery($id, $imageSize, $add_styles);
					}
					$string .= $img_tag;
				}
				
				$string .= '</div>';
				
				wp_reset_postdata();
								
				return $string;
			}
			
			//[shortcode] slider
			function energ1zer_slider_shortcode_func($atts, $content = null)
			{
				$string = "";
				$categoryId = "";
				$imageSize = "large";
				$itemWidth = "900";
				$delay = "3000";
				$speed = "1000";
				$maxHeight = "100%"; // of page height
				$transitionStyle = "fade";
				$medias = array();
				
				wp_reset_postdata();
				if (isset($atts["medias"]))
				{
					$scalar = $atts["medias"];
					$medias = explode(",", $scalar);					
				}
				else if (isset($atts["media"]))
				{
					$scalar = $atts["media"];
					$medias = explode(",", $scalar);					
				}
				else
				{
					return "(energ1zer slider missing medias parameter)";
				}
				
				$debug = print_r($atts, true);
				error_log($debug);
				
				if (isset($atts["style"]))
				{
					$transitionStyle = $atts["style"];
				}
				
				if (isset($atts["size"]))
				{
					$imageSize = $atts["size"];
				}
				
				if (isset($atts["maxheight"]))
				{	
					$maxHeight = $atts["maxheight"];
				}
				
				if (isset($atts["delay"]))
				{	
					$delay = $atts["delay"];
				}
				
				if (isset($atts["speed"]))
				{	
					$speed = $atts["speed"];
				}
				
				$dataSlider = "data-transition=\"$transitionStyle\" data-max-height=\"$maxHeight\" data-delay=\"$delay\" data-speed=\"$speed\"";
				$string = "<div class=\"energ1zer-slider\" $dataSlider>";
				
				foreach($medias as $id)
				{
					$img_tag = get_article_image_for_slider($id, $imageSize);
					$string .= $img_tag;
				}
				
				$string .= '</div>';
				
				wp_reset_postdata();
								
				return $string;
			}
			
			//[shortcode] imgcover
			function energ1zer_imgcover_shortcode_func($atts, $content = null)
			{
				$string = "";
				$img = "";
				$position = null;
				$height = "200px"; // of page height;
				
				if (isset($atts["img"]))
				{
					$img = $atts["img"];
				}
				else
				{
					return "(energ1zer imgcover missing img parameters)";
				}
				
				$debug = print_r($atts, true);
				error_log($debug);
				
				if (isset($atts["height"]))
				{	
					$height = $atts["height"];
					if (preg_match("/^\d+$/", $height))
					{
					   $height = $height . "px";
					}
				}
				
				if (isset($atts["position"]))
				{	
					$position = $atts["position"];
				}
								
				$dataStyle = "style=\"background-image:url($img); height:$height; ";
				if ($position)
				{
   				$dataStyle .= "background-position:$position;";
				}
				if (isset($atts["blur"]))
				{	
					$dataStyle .= "-webkit-filter: blur(".$atts["blur"]."); filter: blur(".$atts["blur"].");";
				}
				if (isset($atts["behind"]) && $atts["behind"] === "true")
				{	
					$dataStyle .= "position:absolute; z-index:-1; top:0;";
				}
				$dataStyle .= "\"";
				$string = "<div class=\"energ1zerImgcover\" $dataStyle>";
				
				if ($content)
				{
				   $string .= $content;
				}				
				
				$string .= '</div>';
				
				return $string;
			}
			
			//[shortcode] bubble
			function energ1zer_bubble_shortcode_func($atts)
			{
				$string = "";
				$additionalStyles = "";
				
				add_action('wp_enqueue_scripts', 'energ1zer_add_stylesheet');
				if (isset($atts["postid"]))
				{
					$post_id = sanitize_text_field($atts["postid"]);
					$post_image = get_article_image($post_id, "thumbnail");
					$position_x = get_post_meta($post_id, '_energ1zer_meta_widget_position_x', true);
					$position_y = get_post_meta($post_id, '_energ1zer_meta_widget_position_y', true);
					$showtext = get_post_meta($post_id, '_energ1zer_meta_widget_showtext', true);
					$grayscale = get_post_meta($post_id, '_energ1zer_meta_widget_grayscale', true);
					
					$width = "100";
					$height = "100";
					$success = preg_match("/width=\"(\d+)\"/", $post_image, $matches);
					if ($success) 
					{	$width = $matches[1];
					}
					$success = preg_match("/height=\"(\d+)\"/", $post_image, $matches);
					if ($success) 
					{	$height = $matches[1];
					}
					
					$bubble_classes = "";
					$showtext_html = "";
					if (strlen($showtext) >= 1)
					{	$bubble_classes .= "showtext ";
						$showtext_html = <<<EOF
<div class="showtext" style="width:{$width}px; height:{$height}px; line-height:{$height}px;">$showtext</div>
EOF;
					}
					
					if ($grayscale === "yes") 
					{	$bubble_classes .= "grayscale ";
					}
					
					if (isset($atts["float"]))
					{
						if ($atts["float"] === "left") 
						{	$bubble_classes .= "floatLeft ";
						}
						else if ($atts["float"] === "right") 
						{	$bubble_classes .= "floatRight ";
						}
						else
						{	$bubble_classes .= "positionAbsolute ";
						}
					}	
					else
					{	$bubble_classes .= "positionAbsolute ";
					}
					
					
					if (isset($atts["margin"])) 
					{	$additionalStyles .= " margin:".$atts["margin"].";"; // FRANK FIXME SANITIZE INPUT
					}
					
					$permalink = get_permalink($post_id);
					$title = esc_attr(get_the_title($post_id));
					$string .= <<<EOF
					<div class="energ1zer bubble $bubble_classes" style="left:{$position_x}px; top:{$position_y}px; width:{$width}px; height:{$height}px; $additionalStyles"><a href="$permalink" title="$title"><div class="image">{$post_image}</div>{$showtext_html}</a></div>
EOF;
				}
				else
				{
					$string .= "NO POST ID";
				}
				return $string;
			}

			function energ1zer_accordion_content_begins_func($atts)
			{
				return "<span class=\"accordion-content\">"; // needed as a shortcode to prevent wordnress visual editor to move it around
			}
			
			function energ1zer_accordion_content_end_func($atts)
			{
				return "</span>"; // needed as a shortcode to prevent wordnress visual editor to move it around
			}
			
			function energ1zer_br_shortcode_func($atts)
			{	//error_log("running shortcode br");
				return "<br/>\n";
			}
			
			//[shortcode] gallery
			function energ1zer_age_shortcode_func($atts, $content = null)
			{
				$string = "";
				$postIds = array();
				$now = new DateTime("now");
				$result = "";
				$diff = "";
				$since = new DateTime("now");
				
				if (isset($atts["since"]))
				{
					try {
						$sinceTry = new DateTime($atts["since"]);
						$since = $sinceTry;
					}
					catch (Exception $e)
					{
						error_log($e->getMessage());
						return $e->getMessage();
					}
				}
				else
				{
					return "<!-- energ1zer age missing parameters -->";
				}
				try {
					$diff = date_diff($now, $since);
					$result = $diff->format("%y");
				}
				catch (Exception $e)
				{
					error_log($e->getMessage());
					return $e->getMessage();
				}
				
				return $result;
			}
			
			function energ1zer_site_title() 
			{
				return get_option('blogname');
			}
			add_shortcode('site-title', 'energ1zer_site_title');
			
			add_shortcode('br', 'energ1zer_br_shortcode_func');
			add_shortcode('age', 'energ1zer_age_shortcode_func');
			add_shortcode('energ1zer_bubble', 'energ1zer_bubble_shortcode_func');
			add_shortcode('energ1zer-bubble', 'energ1zer_bubble_shortcode_func');
			add_shortcode('energ1zer_gallery', 'energ1zer_gallery_shortcode_func');
			add_shortcode('energ1zer-gallery', 'energ1zer_gallery_shortcode_func');
			add_shortcode('energ1zer_slider', 'energ1zer_slider_shortcode_func');
			add_shortcode('energ1zer-slider', 'energ1zer_slider_shortcode_func');
			add_shortcode('energ1zer_imgcover', 'energ1zer_imgcover_shortcode_func');
			add_shortcode('energ1zer-imgcover', 'energ1zer_imgcover_shortcode_func');
			add_shortcode('energ1zer-accordion-content-begin', 'energ1zer_accordion_content_begins_func');
			add_shortcode('energ1zer-accordion-content-begins', 'energ1zer_accordion_content_begins_func');
			add_shortcode('energ1zer-accordion-content-end', 'energ1zer_accordion_content_end_func');
			add_shortcode('energ1zer-accordion-content-ends', 'energ1zer_accordion_content_end_func');
			add_shortcode('energ1zer', 'energ1zer_generic_shortcode_func');
		}

	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() 
	{
		return $this->plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() 
	{
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance )
		{
			self::$instance = new self;
		}
				
		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Activate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       activated on an individual blog.
	 */
	public static function activate( $network_wide )
	{
		if ( function_exists( 'is_multisite' ) && is_multisite() ) 
		{
			if ( $network_wide  )
			{
				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id )
				{
					switch_to_blog( $blog_id );
					self::single_activate();
				}

				restore_current_blog();

			}
			else
			{
				self::single_activate();
			}
		} 
		else
		{
			self::single_activate();
		}
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Deactivate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide )
	{
		if ( function_exists( 'is_multisite' ) && is_multisite() )
		{
			if ( $network_wide ) 
			{
				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) 
				{
					switch_to_blog( $blog_id );
					self::single_deactivate();
				}

				restore_current_blog();
			}
			else
			{
				self::single_deactivate();
			}
		} 
		else
		{
			self::single_deactivate();
		}
	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0.0
	 *
	 * @param    int    $blog_id    ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) 
	{
		if ( 1 !== did_action( 'wpmu_new_blog' ) ) 
		{	return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();
	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @since    1.0.0
	 *
	 * @return   array|false    The blog ids, false if no matches.
	 */
	private static function get_blog_ids()
	{
		global $wpdb;

		// get an array of blog ids
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );
	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since    1.0.0
	 */
	private static function single_activate() 
	{
		// @TODO: Define activation functionality here
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 */
	private static function single_deactivate() 
	{
		// @TODO: Define deactivation functionality here
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() 
	{
		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() 
	{
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/public.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() 
	{
		wp_enqueue_script( 'energ1zer_masonry', plugins_url('assets/js/masonry.min.js', __FILE__), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'energ1zer-plugin-script', plugins_url('assets/js/public.js', __FILE__ ), array( 'jquery', 'energ1zer_masonry' ), self::VERSION );
		
	}

	/**
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        Actions:    http://codex.wordpress.org/Plugin_API#Actions
	 *        Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function action_method_name() 
	{
		// @TODO: Define your action hook callback here
	}

	/**
	 * NOTE:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *        Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *        Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 * @since    1.0.0
	 */
	public function filter_method_name() 
	{
		// @TODO: Define your filter hook callback here
		
		
	}

}
