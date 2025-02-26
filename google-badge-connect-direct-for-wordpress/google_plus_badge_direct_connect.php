<?php
/*
 * Plugin Name: Google Plus Badge Direct Connect
 * Version: 1.1
 * Plugin URI: http://wordpress.org/extend/plugins/google-badge-connect-direct-for-wordpress/
 * Description: Google+ badge allows visitors to directly connect with and promote your brand on Google+ from your website. Now you can add a Google+ badge to help your visitors find and engage with you on Google+.  
 * Author: zzasha2007
 * Author URI: http://www.eshiok.com/component/option,com_docman/task,doc_details/gid,185/Itemid,29/
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
class GooglePlusBadgeDirectConnectWidget extends WP_Widget
{
	/**
	* Declares the GooglePlusBadgeDirectConnectWidget class.
	*
	*/
	function GooglePlusBadgeDirectConnectWidget(){
		$widget_ops = array('classname' => 'widget_GooglePlusBadgeDirectConnectWidget', 'description' => __( "Google+ badge allows visitors to directly connect with and promote your brand on Google+ from your website. Now you can add a Google+ badge to help your visitors find and engage with you on Google+.  .") );
		$control_ops = array('width' => 240, 'height' => 342);
		$this->WP_Widget('GooglePlusBadgeDirectConnectWidget', __('Google Plus Badge Direct Connect Widget'), $widget_ops, $control_ops);
	}
	
	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		
		$badgeType = empty($instance['badgeType']) ? 'standardbadge' : $instance['badgeType'];
		$pageURL = empty($instance['pageURL']) ? '116088493819062821609' : $instance['pageURL'];
		$badgeHeader = empty($instance['badgeHeader']) ? '' : $instance['badgeHeader'];
		$langid = empty($instance['langid']) ? 'en-US' : $instance['langid'];
		
		$authorCreditIs = empty($instance['authorCreditIs']) ? 'yes' : $instance['authorCreditIs'];
		$html = ""; 
		$html = "<a href=\"http://www.eshiok.com/component/option,com_docman/Itemid,29/\" title=\"Free Google+1 Badge for Wordpress\" target=\"_blank\"><span style=\"font-size:xx-small\">+</span></a>"; 
		
		$headerStr = "<link href=\"https://plus.google.com/" . $pageURL . "/\" rel=\"publisher\" />";
		//add_action('wp_head', function() { echo $headerStr;});
		
		# Before the widget
		echo $before_widget;
		
		# The title
		if ( $title )
			echo $before_title . $title . $after_title;
		if ($authorCreditIs == "yes") {
            echo $html;
        }
		switch ($badgeType) {
			case 'standardbadge' :
				$renderedHTML   = "<script type=\"text/javascript\">\n";
				$renderedHTML  .= "window.___gcfg = {lang: '$langid'}; \n";
				$renderedHTML  .= "(function()  \n";
				$renderedHTML  .=  "{var po = document.createElement(\"script\"); \n";
				$renderedHTML  .=  "po.type = \"text/javascript\"; po.async = true;po.src = \"https://apis.google.com/js/plusone.js\"; \n";
				$renderedHTML  .=  "var s = document.getElementsByTagName(\"script\")[0]; \n";
				$renderedHTML  .=  "s.parentNode.insertBefore(po, s); \n";
				$renderedHTML  .=  "})();</script> \n";
				$renderedHTML  .=  "<g:plus href=\"https://plus.google.com/$pageURL\" size=\"badge\"></g:plus>";
				break;
			case 'smallbadge' :
				$renderedHTML   = "<script type=\"text/javascript\">\n";
				$renderedHTML  .= "window.___gcfg = {lang: '$langid'}; \n";
				$renderedHTML  .= "(function()  \n";
				$renderedHTML  .=  "{var po = document.createElement(\"script\"); \n";
				$renderedHTML  .=  "po.type = \"text/javascript\"; po.async = true;po.src = \"https://apis.google.com/js/plusone.js\"; \n";
				$renderedHTML  .=  "var s = document.getElementsByTagName(\"script\")[0]; \n";
				$renderedHTML  .=  "s.parentNode.insertBefore(po, s); \n";
				$renderedHTML  .=  "})();</script> \n";
				$renderedHTML  .=  "<g:plus href=\"https://plus.google.com/$pageURL\" size=\"smallbadge\"></g:plus>";
				break;
			case 'smallicon' :
				$renderedHTML  = "<!-- Place this tag where you want the badge to render-->\n";
				$renderedHTML  .= "<a href=\"https://plus.google.com/" . $pageURL . "/?prsrc=3\" style=\"text-decoration: none; color: #333;\"><div style=\"display: inline-block;\"><span style=\"float: left; font: bold 13px/16px arial,sans-serif; margin-right: 4px;\">" . $badgeHeader . "</span><span style=\"float: left; font: 13px/16px arial,sans-serif; margin-right: 11px;\">on</span><div style=\"float: left;\"><img src=\"https://ssl.gstatic.com/images/icons/gplus-16.png\" width=\"16\" height=\"16\" style=\"border: 0;\"/></div><div style=\"clear: both\"></div></div></a>";
				break;
			case 'mediumicon' :
				$renderedHTML  = "<!-- Place this tag where you want the badge to render-->\n";
				$renderedHTML  .= "<a href=\"https://plus.google.com/" . $pageURL . "/?prsrc=3\" style=\"text-decoration: none; color: #333;\"><div style=\"display: inline-block;\"><span style=\"float: left; font: bold 13px/16px arial,sans-serif; margin-right: 4px; margin-top: 7px;\">" . $badgeHeader . "</span><span style=\"float: left; font: 13px/16px arial,sans-serif; margin-right: 11px; margin-top: 7px;\">on</span><div style=\"float: left;\"><img src=\"https://ssl.gstatic.com/images/icons/gplus-32.png\" width=\"32\" height=\"32\" style=\"border: 0;\"/></div><div style=\"clear: both\"></div></div></a>";
				break;
			case 'largeicon' :
				$renderedHTML  = "<!-- Place this tag where you want the badge to render-->\n";
				$renderedHTML  .= "<a href=\"https://plus.google.com/" . $pageURL . "/?prsrc=3\" style=\"text-decoration: none; color: #333;\"><div style=\"display: inline-block; *display: inline;\"><div style=\"text-align: center;\"><img src=\"https://ssl.gstatic.com/images/icons/gplus-64.png\" width=\"64\" height=\"64\" style=\"border: 0;\"></img></div><div style=\"font: bold 13px/16px arial,sans-serif; text-align: center;\">" . $badgeHeader . "</div><div style=\"font: 13px/16px arial,sans-serif;\"> on Google+ </div></div></a>";
				break;
			case 'nobadge' :
				$renderedHTML  = "<!-- Place this tag where you want the badge to render-->\n";
				break;
		}
		echo $renderedHTML;
		
	
	
	//end of authorCreditIs is yes

		# After the widget
		echo $after_widget;
	}
	
	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['badgeHeader'] = strip_tags(stripslashes($new_instance['badgeHeader']));
		$instance['authorCreditIs'] = strip_tags(stripslashes($new_instance['authorCreditIs']));
		$instance['badgeType'] = strip_tags(stripslashes($new_instance['badgeType']));
		$instance['pageURL'] = strip_tags(stripslashes($new_instance['pageURL']));
		$instance['langid'] = strip_tags(stripslashes($new_instance['langid']));
				
		return $instance;
	}
	
	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'badgeHeader'=>'Join My Circle', 'authorCreditIs'=>'yes', 'badgeType'=>'standardbadge', 'pageURL'=>'116088493819062821609') );
		
		
		$title = htmlspecialchars($instance['title']);		
		$badgeType = empty($instance['badgeType']) ? 'standardbadge' : $instance['badgeType'];
		$pageURL = empty($instance['pageURL']) ? '116088493819062821609' : $instance['pageURL'];
		$badgeHeader = empty($instance['badgeHeader']) ? '' : $instance['badgeHeader'];
		$authorCreditIs = empty($instance['authorCreditIs']) ? 'yes' : $instance['authorCreditIs'];
		$langid = empty($instance['langid']) ? 'en-US' : $instance['langid'];
				
		# Output the options
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		# Fill Badge Type Selection
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('badgeType') . '">' . __('Badge Type:') . ' <select name="' . $this->get_field_name('badgeType')  . '" id="' . $this->get_field_id('badgeType')  . '">"';
?>
		<option value="standardbadge" <?php if ($badgeType == 'standardbadge') echo 'selected="yes"'; ?> >Standard Badge</option>
		<option value="smallbadge" <?php if ($badgeType == 'smallbadge') echo 'selected="yes"'; ?> >Small Badge</option>			 
		<option value="smallicon" <?php if ($badgeType == 'smallicon') echo 'selected="yes"'; ?> >Small Icon</option>			 
		<option value="mediumicon" <?php if ($badgeType == 'mediumicon') echo 'selected="yes"'; ?> >Medium Icon</option>			 
		<option value="largeicon" <?php if ($badgeType == 'largeicon') echo 'selected="yes"'; ?> >Large Icon</option>			 
		<option value="nobadge" <?php if ($badgeType == 'nobadge') echo 'selected="yes"'; ?> >No Badge</option>			 
<?php
		echo '</select></label>';
		# Description 
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('badgeHeader') . '">' . __('Description:') . ' <input style="width: 150px;" id="' . $this->get_field_id('badgeHeader') . '" name="' . $this->get_field_name('badgeHeader') . '" type="text" value="' . $badgeHeader . '" /></label></p>';
		# Fill Page URL
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('pageURL') . '">' . __('https://plus.google.com/') . ' <input style="width: 150px;" id="' . $this->get_field_id('pageURL') . '" name="' . $this->get_field_name('pageURL') . '" type="text" value="' . $pageURL . '" /></label></p>';
		
		# Fill Language Selection
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('langid') . '">' . __('Language:') . ' <select name="' . $this->get_field_name('langid')  . '" id="' . $this->get_field_id('langid')  . '">"';
?>
		
	 <option value="en-US" selected="selected" <?php if ($langid == "en-US"){ echo "selected";}?> >English (US)
	  </option>
	  <option value="en-GB" <?php if ($langid == "en-GB"){ echo "selected";}?> >English (UK)
	  </option>
	  <option value="ar" <?php if ($langid == "ar"){ echo "selected";}?> >Arabic
	  </option>
	  <option value="bg" <?php if ($langid == "bg"){ echo "selected";}?> >Bulgarian
	  </option>
	  <option value="ca" <?php if ($langid == "ca"){ echo "selected";}?> >Catalan
	  </option>
	  <option value="zh-CN" <?php if ($langid == "zh-CN"){ echo "selected";}?> >Chinese (Simplified)
	  </option>
	  <option value="zh-TW" <?php if ($langid == "zh-TW"){ echo "selected";}?> >Chinese (Traditional)
	  </option>
	  <option value="hr" <?php if ($langid == "hr"){ echo "selected";}?> >Croatian
	  </option>
	  <option value="cs" <?php if ($langid == "cs"){ echo "selected";}?> >Czech
	  </option>
	  <option value="da" <?php if ($langid == "da"){ echo "selected";}?> >Danish
	  </option>
	  <option value="nl" <?php if ($langid == "nl"){ echo "selected";}?> >Dutch
	  </option>
	  <option value="et" <?php if ($langid == "et"){ echo "selected";}?> >Estonian
	  </option>
	  <option value="fil" <?php if ($langid == "fil"){ echo "selected";}?> >Filipino
	  </option>
	  <option value="fi" <?php if ($langid == "fi"){ echo "selected";}?> >Finnish
	  </option>
	  <option value="fr" <?php if ($langid == "fr"){ echo "selected";}?> >French
	  </option>
	  <option value="de" <?php if ($langid == "de"){ echo "selected";}?> >German
	  </option>
	  <option value="el" <?php if ($langid == "el"){ echo "selected";}?> >Greek
	  </option>
	  <option value="iw" <?php if ($langid == "iw"){ echo "selected";}?> >Hebrew
	  </option>
	  <option value="hi" <?php if ($langid == "hi"){ echo "selected";}?> >Hindi
	  </option>
	  <option value="hu" <?php if ($langid == "hu"){ echo "selected";}?> >Hungarian
	  </option>
	  <option value="id" <?php if ($langid == "id"){ echo "selected";}?> >Indonesian
	  </option>
	  <option value="it" <?php if ($langid == "it"){ echo "selected";}?> >Italian
	  </option>
	  <option value="ja" <?php if ($langid == "ja"){ echo "selected";}?> >Japanese
	  </option>
	  <option value="ko" <?php if ($langid == "ko"){ echo "selected";}?> >Korean
	  </option>
	  <option value="lv" <?php if ($langid == "lv"){ echo "selected";}?> >Latvian
	  </option>
	  <option value="lt" <?php if ($langid == "lt"){ echo "selected";}?> >Lithuanian
	  </option>
	  <option value="ms" <?php if ($langid == "ms"){ echo "selected";}?> >Malay
	  </option>
	  <option value="no" <?php if ($langid == "no"){ echo "selected";}?> >Norwegian
	  </option>
	  <option value="fa" <?php if ($langid == "fa"){ echo "selected";}?> >Persian
	  </option>
	  <option value="pl" <?php if ($langid == "pl"){ echo "selected";}?> >Polish
	  </option>
	  <option value="pt-BR" <?php if ($langid == "pt-BR"){ echo "selected";}?> >Portuguese (Brazil)
	  </option>
	  <option value="pt-PT" <?php if ($langid == "pt-PT"){ echo "selected";}?> >Portuguese (Portugal)
	  </option>
	  <option value="ro" <?php if ($langid == "ro"){ echo "selected";}?> >Romanian
	  </option>
	  <option value="ru" <?php if ($langid == "ru"){ echo "selected";}?> >Russian
	  </option>
	  <option value="sr" <?php if ($langid == "sr"){ echo "selected";}?> >Serbian
	  </option>
	  <option value="sv" <?php if ($langid == "sv"){ echo "selected";}?> >Swedish
	  </option>
	  <option value="sk" <?php if ($langid == "sk"){ echo "selected";}?> >Slovak
	  </option>
	  <option value="sl" <?php if ($langid == "sl"){ echo "selected";}?> >Slovenian
	  </option>
	  <option value="es" <?php if ($langid == "es"){ echo "selected";}?> >Spanish
	  </option>
	  <option value="es-419" <?php if ($langid == "es-419"){ echo "selected";}?> >Spanish (Latin America)
	  </option>
	  <option value="th" <?php if ($langid == "th"){ echo "selected";}?> >Thai
	  </option>
	  <option value="tr" <?php if ($langid == "tr"){ echo "selected";}?> >Turkish
	  </option>
	  <option value="uk" <?php if ($langid == "uk"){ echo "selected";}?> >Ukrainian
	  </option>
	  <option value="vi" <?php if ($langid == "vi"){ echo "selected";}?> >Vietnamese
	  </option>
<?php
		echo '</select></label>';
		
		echo '<p style="text-align:left;"><a title="Join Our Google+ Circle" href="https://plus.google.com/116088493819062821609" target="_blank"><img src="http://eshiok.com/images/gplus-16.png" border="0"></a>&nbsp;<a title="Join Us @Facebook" href="http://www.facebook.com/pages/eShiokcom-you-own-your-online-social-network/118028014903959" target="_blank"><img src="http://eshiok.com/images/facebook_16x16.png" border="0"></a>&nbsp;<a title="Follow Us @Twitter" href="http://twitter.com/eshiok" target="_blank"><img src="http://eshiok.com/images/twitter_16x16.png" border="0"></a></p>';
		echo '<p/>';
		echo '<hr/>';
		# Fill Author Credit : option to select YEs or No 
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('authorCreditIs') . '">' . __('Promote This Free Wordpress Plugin For Others to Use with small + displayed on the footer') . ' <select name="' . $this->get_field_name('authorCreditIs')  . '" id="' . $this->get_field_id('authorCreditIs')  . '">"';
?>
		<option value="yes" <?php if ($authorCreditIs == 'yes') echo 'selected="yes"'; ?> >Yes</option>
		<option value="no" <?php if ($authorCreditIs == 'no') echo 'selected="yes"'; ?> >No</option>			 
<?php
		echo '</select></label>';
	
	} //end of form

}// END class
	
	/**
	* Register  widget.
	*
	* Calls 'widgets_init' action after widget has been registered.
	*/
	function GooglePlusBadgeDirectConnectWidgetInit() {
	register_widget('GooglePlusBadgeDirectConnectWidget');
	}	
	add_action('widgets_init', 'GooglePlusBadgeDirectConnectWidgetInit');
?>