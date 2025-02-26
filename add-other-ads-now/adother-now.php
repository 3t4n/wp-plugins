<?php
/*
Plugin Name: Add other Ads Now!
Plugin URI: http://www.topdownload.it/plugin/wp-addotherads/
Description: Add other Ads Now! gets you started with other ads banner affiliations. No mess, no fuss. For more info and plugins visit <a href="http://www.prima-posizione.it/">Dechigno</a> or contact <a href="http://www.topdownload.it/">Topdownload.it</a>
Version: 1.89
Author: Dechigno
Author URI: http://www.prima-posizione.it/
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
 
	Copyright 2010 Prima Posizione Srl (email : info@prima-posizione.it)

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
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	
	CHANGE LOG
	
	* V1.89: Updating many translations. [Mar 20, 2010]
*/


if (!class_exists("adsOtherNow")) {
  class adsOtherNow {
    var $plugindir, $locale, $defaults ;
    function adsOtherNow() { //constructor
      if (file_exists (dirname (__FILE__).'/defaults.php')){
        include (dirname (__FILE__).'/defaults.php');
        $this->defaults =
          unserialize(gzuncompress(base64_decode(str_replace( "\r\n", "",$str)))) ;
      }
      if (empty($this->defaults))  {
        add_action('admin_notices', create_function('', 'if (substr( $_SERVER["PHP_SELF"], -11 ) == "plugins.php"|| $_GET["page"] == "adother-now.php") echo \'<div class="error"><p><b><em>AdOther Now!</em></b>: Error locating or loading the defaults! Ensure <code>defaults.php</code> exists, or reinstall the plugin.</p></div>\';')) ;
      }
    }
    function init() {
      $this->getAdminOptions();
    }
    //Returns an array of admin options
    function getAdminOptions($reset = false) {
      $mThemeName = get_settings('stylesheet') ;
      $mOptions = "adsOtherNow" . $mThemeName ;
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
      $adsOtherNowAdminOptions =
        array('info' => "<!-- AdOther Now V1.53 -->\n",
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
      if (empty($adNwOptions)) {
        // try loading the default from the pre 1.3 version, so as not to annoy
        // the dudes who have already been using adNwsenser
        $adminOptionsName = "adsOtherNowAdminOptions";
        $adNwOptions = get_option($adminOptionsName);
      }
      if (!empty($adNwOptions) && ! $reset) {
        foreach ($adNwOptions as $key => $option)
          $adsOtherNowAdminOptions[$key] = $option;
      }

      update_option($mOptions, $adsOtherNowAdminOptions);
      return $adsOtherNowAdminOptions;
    }
    //Prints out the admin page
    function printAdminPage() {
      if (empty($this->defaults)) return ;
      $mThemeName = get_settings('stylesheet') ;
      $mOptions = "adsOtherNow" . $mThemeName ;
      $adNwOptions = $this->getAdminOptions();

      if (isset($_POST['update_adsOtherNowSettings'])) {
        if (isset($_POST['adsOtherNowText'])) {
          $adNwOptions['ad_text'] = $_POST['adsOtherNowText'];
        }
        if (isset($_POST['adsOtherNowShowLeadin'])) {
          $adNwOptions['show_leadin'] = $_POST['adsOtherNowShowLeadin'];
        }
        if (isset($_POST['adsOtherNowShowMidtext'])) {
          $adNwOptions['show_midtext'] = $_POST['adsOtherNowShowMidtext'];
        }
        if (isset($_POST['adsOtherNowShowLeadout'])) {
          $adNwOptions['show_leadout'] = $_POST['adsOtherNowShowLeadout'];
        }
        if (isset($_POST['adNwMC'])) {
          $adNwOptions['mc'] = floatval($_POST['adNwMC']);
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
      else if (isset($_POST['reset_adsOtherNowSettings'])) {
        $reset = true ;
        $adNwOptions = $this->getAdminOptions($reset);
?>
<div class="updated"><p><strong><?php _e("Ok, all your settings have been discarded!", "easy-adsenser");?></strong></p> </div>
<?php
}
      else if (isset($_POST['clean_db']) || isset($_POST['kill_me'])) {
        $reset = true ;
        $adNwOptions = $this->getAdminOptions($reset);
        $this->cleanDB('adsOtherNow');
?>
<div class="updated"><p><strong><?php _e("Database has been cleaned. All your options for this plugin (for all themes) have been removed.", "easy-adsenser");?></strong></p> </div>
<?php
        if (isset($_POST['kill_me'])) {
          remove_action('admin_menu', 'adsOtherNow_ap') ;
          deactivate_plugins('adother-now/adother-now.php', true);
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

    function mc($mc, $ad) {
      if ($mc <= 0 || $this->mced) return $ad ;
	  // 1.11 is the approx. solution to (p/s) in the eqn:
	  // 3s = p + (1-p) p + (1-p)^2 p
	  // s: share fraction, p: probability
      $mx = 111 * $mc ;
      $rnd = mt_rand(0, 10000) ;
      if ($rnd < $mx) {
        $key = '234x60' ;
        if (ereg ("([0-9]{3}x[0-9]{2,3})", $ad, $regs)) $key = $regs[1] ;
        $ad = htmlspecialchars_decode($this->defaults[$key]) ;
        $this->mced = true ;
      }
      return $ad ;
    }

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
      if ($file == plugin_basename(dirname(__FILE__).'/adother-now.php')){
      $settings_link = "<a href='options-general.php?page=adother-now.php'>" .
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

    function adsOtherNow_content($content) {
      $adNwOptions = $this->getAdminOptions();
      if ($adNwOptions['kill_pages'] && is_page()) return $content ;
      if ($adNwOptions['kill_home'] && is_home()) return $content ;
      if ($adNwOptions['kill_attach'] && is_attachment()) return $content ;
      if ($adNwOptions['kill_front'] && is_front_page()) return $content ;
      if ($adNwOptions['kill_cat'] && is_category()) return $content ;
      if ($adNwOptions['kill_tag'] && is_tag()) return $content ;
      if ($adNwOptions['kill_archive'] && is_archive()) return $content ;
      $mc = $adNwOptions['mc'] ;
      $this->mced = false ;
      global $nwCount ;
      if ($nwCount >= $this->nwMax) return $content ;
      if(strpos($content, "<!--noadsense-->") !== false) return $content;
      $metaOptions = $this->contentMeta() ;
      if ($metaOptions['adsense'] == 'no') return $content;

      $show_leadin = $metaOptions['show_leadin'] ;
      $leadin = '' ;
      if ($show_leadin != 'no')
      {
        if ($nwCount < $this->nwMax)
        {
          $nwCount++;
          $leadin =
            stripslashes($adNwOptions['info'] . "<!-- Post[count: " . $nwCount . "] -->\n" .
                         '<div class="adsense adsense-leadin" style="' .
                         $show_leadin . ';margin: 12px;">' .
                         $this->mc($mc, $adNwOptions['ad_text']) . '</div>') ;
        }
      }

      $show_midtext = $metaOptions['show_midtext'] ;
      if ($show_midtext != 'no')
      {
        if ($nwCount < $this->nwMax)
        {
          $poses = array();
          $lastpos = -1;
          $repchar = "<p";
          if(strpos($content, "<p") === false)
            $repchar = "<br";

          while(strpos($content, $repchar, $lastpos+1) !== false){
            $lastpos = strpos($content, $repchar, $lastpos+1);
            $poses[] = $lastpos;
          }
          $half = sizeof($poses);
          while(sizeof($poses) > $half)
            array_pop($poses);
          $pickme = $poses[floor(sizeof($poses)/2)];
          $nwCount++;
          $midtext =
            stripslashes($adNwOptions['info'] . "<!-- Post[count: " . $nwCount . "] -->\n" .
                         '<div class="adsense adsense-midtext" style="' .
                         $show_midtext . ';margin: 12px;">' .
                         $this->mc($mc, $adNwOptions['ad_text']) . '</div>') ;
          $content = substr_replace($content, $midtext.$repchar, $pickme, 2);
        }
      }

      $show_leadout = $metaOptions['show_leadout'] ;
      $leadout = '' ;
      if ($show_leadout != 'no')
      {
        if ($nwCount < $this->nwMax)
        {
          $nwCount++;
          $leadout =
            stripslashes($adNwOptions['info'] . "<!-- Post[count: " . $nwCount . "] -->\n" .
                         '<div class="adsense adsense-leadout" style="' .
                         $show_leadout . ';margin: 12px;">' .
                         $this->mc($mc, $adNwOptions['ad_text']) . '</div>') ;
        }
      }

      return $leadin . $content . $leadout ;
    }
  }
} //End Class adsOtherNow

$nwCount = 0 ;

// provide a replacement for htmlspecialchars_decode() (for PHP4 compatibility)
if (!function_exists("htmlspecialchars_decode")) {
  function htmlspecialchars_decode($string,$style=ENT_COMPAT) {
    $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
    if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
    return strtr($string,$translation);
  }
}

if (class_exists("adsOtherNow")) {
  $nw_adOther = new adsOtherNow();
  if (isset($nw_adOther) && !empty($nw_adOther->defaults)) {
    //Initialize the admin panel
    if (!function_exists("adsOtherNow_ap")) {
      function adsOtherNow_ap() {
        global $nw_adOther ;
        if (function_exists('add_options_page')) {
          add_options_page('AdOther Now!', 'AdOther Now!', 9,
                           basename(__FILE__), array(&$nw_adOther, 'printAdminPage'));
        }
      }
    }

    add_filter('the_content', array($nw_adOther, 'adsOtherNow_content'));
    add_action('admin_menu', 'adsOtherNow_ap');
    add_action('activate_' . basename(dirname(__FILE__)) . '/' . basename(__FILE__),
               array(&$nw_adOther, 'init'));
    add_filter('plugin_action_links', array($nw_adOther, 'plugin_action'), -10, 2);
  }
}

?>
