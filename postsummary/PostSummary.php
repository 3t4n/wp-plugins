<?php
/*
Plugin Name: Post Summary
Plugin URI: http://www.ognigiorno.com/
Description: Displays a summary of posts
Author: luciano Colombo
Version: 1.2.1
Author URI: http://www.ognigiorno.com/
*/
	
	
/*
Release note:
1.2.0   Added thumbnail management

1.1.0 	Added show_home, show_post, show_archive parameters
	Added %post% management in category list filter

*/	
class PSummary {
    var $plugin_folder = '';

    var $default_options = array(
            'title' => '', 
            'pages' => '',
            'record' => '1',
            'categories' => '',
            'skiprecord' => 0,
            'textlength' => 70,
            'listtype' => 1,
            'stylename' => '',
            'targetlink' => '',
            'show_home' => "true",
            'show_post' => 'true',
            'show_archive' => 'true',
            'show_thumb' => 'false',
            'img_size' => '100',
            'img_pos' => '1'
    );

    function PSummary() {
        $this->plugin_folder = get_option('home').'/'.PLUGINDIR.'/PostSummary/';
        add_action('wp_head', array(&$this, 'admin_head'));
    }

    function admin_head() {
        echo('<link rel="stylesheet" href="'.$this->plugin_folder.'PostSummary.css" type="text/css" media="screen" />');
//        echo('<script type="text/javascript" src="'.$this->plugin_folder.'gd-multi.js"></script>');
    }

    function init() {
        if (!$options = get_option('widget_post_summary'))
            $options = array();
            
        $widget_ops = array('classname' => 'widget_post_summary', 'description' => 'Post Summary');
        $control_ops = array('width' => 250, 'height' => 100, 'id_base' => 'psummary');
        $name = 'Post Summary';
        
        $registered = false;
        foreach (array_keys($options) as $o) {
            if (!isset($options[$o]['title']))
                continue;
                
            $id = "psummary-$o";
            $registered = true;
            wp_register_sidebar_widget($id, $name, array(&$this, 'widget'), $widget_ops, array( 'number' => $o ) );
            wp_register_widget_control($id, $name, array(&$this, 'control'), $control_ops, array( 'number' => $o ) );
        }
        if (!$registered) {
            wp_register_sidebar_widget('psummary-1', $name, array(&$this, 'widget'), $widget_ops, array( 'number' => -1 ) );
            wp_register_widget_control('psummary-1', $name, array(&$this, 'control'), $control_ops, array( 'number' => -1 ) );
        }
    }

    function widget($args, $widget_args = 1) {
	extract($args);
	global $wpdb;
	


        $options_all = get_option('widget_post_summary');
        $options = $options_all[$widget_args['number']];
        
        $show_home = $options['show_home'];
        if ($show_home === "")
           $show_home = $default_options['show_home'];      
        if ($show_home !== "true" AND is_home())
           return;

        $show_post = $options['show_post'];
        if ($show_post === '')
           $show_post = $default_options['show_post'];
        if ($show_post !== "true" AND is_single())
           return;
           
        $show_archive = $options['show_archive'];
        if ($show_archive === '')
           $show_archive = $default_options['show_archive'];
        if ($show_archive !== "true" AND is_archive())
           return;

           
        
                
	$record = $options['record'];
	if (!is_numeric($record))
	   $record = $default_options['record'];

        $skiprecord = $options['skiprecord'];
        if (!is_numeric($skiprecord))
           $skiprecord = $default_options['skiprecord'];
        
        $textlength = $options['textlength'];
        if (!is_numeric($textlength))
           $textlength = $default_options['textlength'];
        
        $listtype = $options['listtype'];
        if (!is_numeric($listtype))
           $listtype = $default_options['listtype'];
        
        
        $targetlink = $options['targetlink'];
        $stylename = $options['stylename'];
	$title = $options['title'];
	$categList = $options['categories'];

	if ($categList === "%post%" and is_single()) {
	      global $post; 
	      $post_ID = $post->ID;
              $category = get_the_category(); 
              $qryIn = "AND ID = ".$category[0]->cat_ID;
              $qryIn = "AND ID in (select wpr.object_id FROM $wpdb->terms inner join $wpdb->term_taxonomy on $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id inner join $wpdb->term_relationships wpr on wpr.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id where taxonomy = 'category' and $wpdb->terms.term_id =".$category[0]->cat_ID .")";           
              $qryIn.= " AND ID != ".$post->ID;
           }
        else {
	   $categList = str_replace("%post%", "", $categList);
           if ($categList != '' and $categList !='*') {
     	      $categList = "'".str_replace(",", "','", $categList)."'";
//TODO usare lo split array eccetera: così fa schifo	
              $qryIn = "AND ID in (select wpr.object_id FROM $wpdb->terms inner join $wpdb->term_taxonomy on $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id inner join $wpdb->term_relationships wpr on wpr.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id where taxonomy = 'category' and $wpdb->terms.name IN (".$categList."))";           
        }
      	   else
	      $qryIn = '';
        }
	
//echo $qryIn;
	switch ($listtype) {
	   case 1:
		$qry = "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_status = 'publish' AND post_password ='' AND post_type='post' ".$qryIn;
		$qry .= " ORDER BY ID DESC LIMIT ".$record;
		break;
	   case 2:
	        $table_name = $wpdb->prefix . "statpress";
		$qry = "SELECT posts.ID, posts.post_title, posts.post_content, stats.urlrequested, stats.pvalue, count(*) as totale ";
		$qry.= "FROM $wpdb->posts posts inner join $table_name stats on posts.ID = stats.pvalue ";
		$qry.= $qryIn;
		$qry.= "WHERE stats.spider='' AND stats.feed='' and stats.pvalue <>'' GROUP BY stats.pvalue ORDER BY totale DESC LIMIT $record";



	   	break;
	}	
	
	
	
	$ElencoPosts = $wpdb->get_results($qry);
	
	if ($ElencoPosts) {
	   $counter = 0;
	  if ($stylename != '')
	     $stylename = "class = \"".$stylename."\"";
	   
	   echo $before_widget;
	   echo $before_title.$title.$after_title;  
	  
	   foreach ($ElencoPosts as $current_post) {
	   	if ($counter++ < $skiprecord)
	   	   continue;
		$post_title = stripslashes($current_post->post_title);
		
		$TargetArray = split("-", $targetlink);
		switch ($TargetArray[0]) {
		   case 1:
		      $post_permalink = get_permalink($current_post->ID);
		      break;
		   case 2:
		      $post_permalink = get_permalink($TargetArray[1]);
		      break;
		   case 3:
		      $post_permalink = get_category_link($TargetArray[1]);
		      break;
		}
		
		
		
		
		
		$post_content = $current_post->post_content;
		$widget_title_display = '<h2><a href="' . $post_permalink . '" title="' . $post_title.'">' . $post_title . '</a></h2>';
		
		$widget_text_display = strip_tags($post_content);
		if ($options['finishword'] == 'true') {
		   $Posizione = strpos($widget_text_display, " ", $textlength);
		   if ($Posizione !== false) 
		      $textlength = $Posizione;
		}
		$widget_text_display = substr($widget_text_display, 0, $textlength);
		   
		$widget_text_display .= " ...";
		
		
		
	        $show_thumb = $options['show_thumb'];
        	if ($show_thumb === '')
           		$show_thumb = $default_options['show_thumb'];

		if ($show_thumb === "true") {
		        $img_size = $options['img_size'];
	        	if ($img_size === '')
	           		$img_size = $default_options['img_size'];
	
		        $img_pos = $options['img_pos'];
	        	if ($img_pos === '')
	           		$img_pos = $default_options['img_pos'];
	
						
			$img_text = get_thumb_images($current_post->ID,$img_size, 0, 0, "small");
			$img_tbl = "<table border='0'><tr><td>";
			if ($img_pos === "1")
				$img_tbl .= $img_text."</td><td>".$widget_text_display;
			else
				$img_tbl .= $widget_text_display."</td><td>".$img_text;
			$img_tbl .= "</td></tr></table>";	
			$widget_text_display = $img_tbl;
	}
		
		
		  echo "<div ".$stylename.">";
		  echo $widget_title_display; 
		  echo $widget_text_display;
		  
		  echo '</div>';
		}
		
	   echo $after_widget;
		
	   }  
    }

    function control($widget_args = 1) {
        global $wp_registered_widgets;
        static $updated = false;

        if ( is_numeric($widget_args) )
            $widget_args = array('number' => $widget_args);
        $widget_args = wp_parse_args($widget_args, array('number' => -1));
        extract($widget_args, EXTR_SKIP);
        $options_all = get_option('widget_post_summary');
        if (!is_array($options_all))
            $options_all = array();  
            
        if (!$updated && !empty($_POST['sidebar'])) {
            $sidebar = (string)$_POST['sidebar'];

            $sidebars_widgets = wp_get_sidebars_widgets();
            if (isset($sidebars_widgets[$sidebar]))
                $this_sidebar =& $sidebars_widgets[$sidebar];
            else
                $this_sidebar = array();

            foreach ($this_sidebar as $_widget_id) {
                if ('widget_post_summary' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number'])) {
                    $widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
                    if (!in_array("psummary-$widget_number", $_POST['widget-id']))
                        unset($options_all[$widget_number]);
                }
            }
            foreach ((array)$_POST['widget_post_summary'] as $widget_number => $posted) {
                if (!isset($posted['title']) && isset($options_all[$widget_number]))
                    continue;
                
                $options = array();
                
                $options['title'] = $posted['title'];
                $options['pages'] = isset($posted['pages']) ? implode(',', $posted['pages']) : ''; 
                $options['record'] = $posted['record'];
                $options['categories'] = $posted['categories'];
                $options['skiprecord'] = $posted['skiprecord'];
                $options['textlength'] = $posted['textlength'];
                $options['listtype'] = $posted['listtype'];
                $options['stylename'] = $posted['stylename'];
                $options['finishword'] = $posted['finishword'];
                $options['targetlink'] = $posted['targetlink'];
                $options['show_home'] = $posted['show_home'];
                $options['show_post'] = $posted['show_post'];
                $options['show_archive'] = $posted['show_archive'];
                $options['show_thumb'] = $posted['show_thumb'];
                $options['img_size'] = $posted['img_size'];
                $options['img_pos'] = $posted['img_pos'];
                
                $options_all[$widget_number] = $options;
            }
            update_option('widget_post_summary', $options_all);
            $updated = true;
        }

        if (-1 == $number) {
            $number = '%i%';
            $values = $this->default_options;
        }
        else {
            $values = $options_all[$number];
        }
        
        include("PostSummary-form.php");
    }


    function render_options_pages($CurrentPar = '') {
        global $wpdb;
        echo "<!-- $current -->";
        
        $sql = "SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' ";
        $items = $wpdb->get_results($sql);

        if ($items) {
            foreach ($items as $item) {
                if ($CurrentPar == "2-$item->ID")
                    $current = ' selected="selected"';
                else
                    $current = '';
    
                echo "\n\t<option value='2-$item->ID'$current>Page: $item->post_title</option>";
            }
        } 
        $sql = "SELECT TER.term_id ID, name FROM $wpdb->terms TER inner join $wpdb->term_taxonomy TAX on TER.term_id = TAX.term_id WHERE TAX.taxonomy='category'";
        
        $items = $wpdb->get_results($sql);

        if ($items) {
            foreach ($items as $item) {
                if ($CurrentPar == "3-$item->ID")
                    $current = ' selected="selected"';
                else
                    $current = '';
    
                echo "\n\t<option value='3-$item->ID'$current>Category: $item->name</option>";
            }
        } 
        
    }
    
}

function c12pulltheimgurl($thepostid)
{
	$theimgstring=get_the_content($thepostid);
	$c12tcmts = '/<img (?:.*?)src=(?:"|\'){1}(.*?)(?:"|\'){1}/is';
	$theimgmtchesarr = array();
	$procmatchs = preg_match_all($c12tcmts,$theimgstring,$theimgmtchesarr);
	if( $procmatchs!==false && isset($theimgmtchesarr[1]) )
	{
		return $theimgmtchesarr[1];
	}
	else
	{
		return false;
	}
}




function get_thumb_images($postID,$imgwidth,$imgheight,$thumborno,$imgstyle) {

    // Get the post ID
    $iPostID = $postID;

	$files = get_children("post_parent=$iPostID&post_type=attachment&post_mime_type=image");
	if($files) {
	        $keys = array_keys($files);
	        $iNum=$keys[0];
	}

        // Get the thumbnail url for the attachment
       // $sThumbUrl = wp_get_attachment_thumb_url($iNum);

          if( (isset($thumborno)) && ($thumborno == 1) )
          {
         	 	$sThumbUrl = wp_get_attachment_thumb_url($iNum);
         	}
         	elseif( (isset($thumborno)) && ($thumborno == 2) )
          {
         		$sThumbUrl =wp_get_attachment_medium_url($iNum);
         	}
         	else
         	{
          		$sThumbUrl = wp_get_attachment_url($iNum);
       	 }
        if(!isset($sThumbUrl) || empty($sThumbUrl))  {
/*
				$thepostimages = c12pulltheimgurl($iPostID);
				foreach($thepostimages as $thepostimage)
				{
					$sThumbUrl=$thepostimages[0];
				}
*/
		}
        // UNCOMMENT THIS IF YOU WANT THE FULL SIZE IMAGE INSTEAD OF THE THUMBNAIL
        //$sImageUrl = wp_get_attachment_url($iNum);

        // Build the <img> string
        if(isset($sThumbUrl) && !empty($sThumbUrl))
        {

        	$sImgString = '<a href="' . get_permalink($iPostID) . '">' .
                            '<img class="' . $imgstyle . '" src="' . $sThumbUrl . '"';
                            if(isset($imgheight) && !empty($imgheight)){ $sImgString.='height="' . $imgheight . '"'; }
                            if(isset($imgwidth) && !empty($imgwidth)){ $sImgString.='width="' . $imgwidth . '"'; }
                            $sImgString.='alt="' . get_the_title($iPostID) . '" title="' . get_the_title($iPostID) . '" border="0"/>' .
                        '</a>';
		}
		else
		{
		$sImgString='';
		}

        // Print the image
        return $sImgString;

}

$gdm = new PSummary();
add_action('widgets_init', array($gdm, 'init'));

?>
