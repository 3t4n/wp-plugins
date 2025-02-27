<?php
/*
 * Plugin Name: month name translation benaceur
 * Plugin URI: https://benaceur-php.com/
 * Description: This plugin allows you to edit and translate the names of the months ...
 * Version: 2.3.12
 * Author: benaceur
 * Text Domain: month-name-translation-benaceur
 * Domain Path: /lang
 * Author URI: https://benaceur-php.com/
 * License: GPL2
*/

define("MNTB_BEN", "month-name-translation-benaceur");
define("MNTB_BEN_PLUGIN", __FILE__);
define('MNTB_BEN_PLUGIN_DIR', WP_PLUGIN_DIR . '/'.MNTB_BEN.'/');

class class______month_name_translation_benaceur_glob {
	
	protected $mntb_ver = '1.1.1';
	protected $ver_b = 'month_name_translation_benaceur__ver_base';
	
    function __construct(){
		
	register_activation_hook( __FILE__, array($this, 'MNTB_activated'));
	register_deactivation_hook( __FILE__, array($this, 'MNTB_deactivated'));
	add_action('admin_menu', array($this, 'menu'));
	add_action('init', array($this, 'text_domain'));
	add_action('init', array($this, 'options_default_up'));
	add_action('admin_init', array($this, 'activ_redir'));
	add_action('admin_init', array($this, 'register_options'));
	add_filter('plugin_action_links_'.plugin_basename(__FILE__), array($this, 'add_action_links'));
	
    if ($this->option('enable_plug')) {

    if (is_admin() && $this->get_options_page()) {
    $this->__date();
    } else if (is_admin() && $this->option('disable_in_admin') == '') {
    $this->__date();
    } else if (!is_admin() && $this->option('disable_in_front') == '') {
    $this->__date();
    add_filter('get_archives_link', array($this, 'mntb_translation'));
    add_filter('wp_title', array($this, 'mntb_translation'), 99);
	add_filter('get_calendar', array($this, 'mntb_translation'));
    }
	
    if ($this->_reset() === false && is_admin() && $this->option('disable_in_admin') == '') {
	add_filter( 'gettext', array($this, 'mntb_a_translation'), 20, 3 );
    add_filter( 'gettext_with_context', array($this, 'mntb_a_translation'), 20, 3 );
    add_filter( 'ngettext', array($this, 'mntb_a_translation'), 20, 3 );
    add_filter( 'ngettext_with_context', array($this, 'mntb_a_translation'), 20, 3 );
    }
  
    }
	
	add_action('admin_init', array($this, 'isset_wplang'));
	add_action('wp_loaded', array($this, 'all_reset_AllOptions'));
	
    }
	
	function __date() {
		if ( function_exists( 'wp_date' ) ) {
		add_filter('wp_date', array($this, 'mntb_translation')); // wordpress >= 5.3
		} else if ( function_exists( 'date_i18n' ) ) {
        add_filter('date_i18n', array($this, 'mntb_translation')); // wordpress < 5.3 
		}			
	}
	
	function ver_base() {
		$data = get_option($this->ver_b);
		return $data;
	}
	
    function get_options_page(){
	  if ($GLOBALS['pagenow'] == 'options-general.php' && isset($_GET['page']) && $_GET['page'] == MNTB_BEN)
	  return true;
      return false;
    }

    function add_action_links($links){
	  $links[] = '<a href="'.get_admin_url(null, 'options-general.php?page='.MNTB_BEN.'').'">'.__("Settings", MNTB_BEN).'</a>';
	  return $links;
    }

    function text_domain() {
    load_plugin_textdomain( MNTB_BEN, false, basename( dirname( __FILE__ ) ) . '/lang/' );
	}

    function menu() {
    $menu = add_options_page( MNTB_BEN, 'Month-Translation-Benaceur', apply_filters( 'mntb_manage_options_cap', 'manage_options' ), MNTB_BEN, array($this,'page_options'));
    add_action("admin_print_styles-$menu", array($this, 'enqueue'));
	add_action( 'admin_head-$menu', array($this, 'DroidKufiRegular') );
	}
  
    function get_array_options() {
	
    $all = array(
       $this->get_option_settings(),
       'month_name_translation_benaceur_jan',
       'month_name_translation_benaceur_t_jan',
       'month_name_translation_benaceur_Fev',
       'month_name_translation_benaceur_t_Fev',
       'month_name_translation_benaceur_Mar',
       'month_name_translation_benaceur_t_Mar',
       'month_name_translation_benaceur_Avr',
       'month_name_translation_benaceur_t_Avr',
       'month_name_translation_benaceur_Mai',
       'month_name_translation_benaceur_t_Mai',
       'monthnametranslationbenaceurjuin',
       'monthnametranslationbenaceurtjuin',
       'monthnametranslationbenaceurjuil',
       'monthnametranslationbenaceurtjuil',
       'month_name_translation_benaceur_Aou',
       'month_name_translation_benaceur_t_Aou',
       'month_name_translation_benaceur_Sep',
       'month_name_translation_benaceur_t_Sep',
       'month_name_translation_benaceur_Oct',
       'month_name_translation_benaceur_t_Oct',
       'month_name_translation_benaceur_Nov',
       'month_name_translation_benaceur_t_Nov',
       'month_name_translation_benaceur_Dec',
       'month_name_translation_benaceur_t_Dec',
	   'month_name_translation_benaceur_abbrev_month'
    );
	
    $from_all = array($this->get_option_settings());
	
	if ($this->option('wplang'))
	return array_diff($all, $from_all);
	
	return $all;
	
    }

    function get_option_settings() {
    return 'month_name_translation_benaceur_option_settings';	
	}
  
    function register_options() {
		
    register_setting('month_name_translation_benaceur_all_reset', 'mntb_all_reset');
    
    foreach($this->get_array_options() as $key => $name) {
      register_setting('month_name_translation_benaceur_group', $name, array($this, 'option_validate'));
    }	
	
    }
	
	function option_validate ($posted_options) {
		
		//Create our array for storing the validated options 
	    $output = array();
	
        foreach((array) $posted_options as $key => $value) {
		if (isset( $posted_options[$key] ))	
        $output[$key] = (trim($posted_options[$key]) == '') ? trim($posted_options[$key]) : wp_kses_post( trim($posted_options[$key]) );
        }
		
		if (is_array($posted_options))
        return $output;
	
		if (isset( $posted_options ))
        $posted_options = (trim($posted_options) == '') ? trim($posted_options) : wp_kses_post( trim($posted_options) );
        
        return $posted_options;
    }
  
    function enqueue(){
	   wp_enqueue_style('mntb-css',plugins_url('admin/style.css',__FILE__), false, $this->MNTB_version() );
	   wp_enqueue_style('mntb-css');
       wp_enqueue_script ('mntb-js', plugins_url('admin/js.js',__FILE__), array(), $this->MNTB_version(), true);	   
    }
	
    function get__month_name($inp) {
      return date_i18n("F", strtotime(date_i18n("d-$inp-y")));
    }
	
    function get__month_abbrev_name($inp) {
      return date_i18n("M", strtotime(date_i18n("d-$inp-y")));
    }

    function get_month_name($inp) {
	global $wp_locale;
	if ( ! ( $wp_locale instanceof WP_Locale ) ) {
		return false;
	}
      return $wp_locale->get_month($inp);
    }
	
    function get_month_abbrev_name($inp) {
	global $wp_locale;
	if ( ! ( $wp_locale instanceof WP_Locale ) ) {
		return false;
	}
      return $wp_locale->get_month_abbrev($wp_locale->get_month($inp));
    }
	
    function options_default() {
	  
      for($i=1; $i<=12; $i++){
      $month[] = $this->get_month_name($i);
      }
   
      update_option('month_name_translation_benaceur_jan', $month[0]);
      update_option('month_name_translation_benaceur_t_jan', $month[0]);
      update_option('month_name_translation_benaceur_Fev', $month[1]);
      update_option('month_name_translation_benaceur_t_Fev', $month[1]);
      update_option('month_name_translation_benaceur_Mar', $month[2]);
      update_option('month_name_translation_benaceur_t_Mar', $month[2]);
      update_option('month_name_translation_benaceur_Avr', $month[3]);
      update_option('month_name_translation_benaceur_t_Avr', $month[3]);
      update_option('month_name_translation_benaceur_Mai', $month[4]);
      update_option('month_name_translation_benaceur_t_Mai', $month[4]);
      update_option('monthnametranslationbenaceurjuin', $month[5]);
      update_option('monthnametranslationbenaceurtjuin', $month[5]);
      update_option('monthnametranslationbenaceurjuil', $month[6]);
      update_option('monthnametranslationbenaceurtjuil', $month[6]);
      update_option('month_name_translation_benaceur_Aou', $month[7]);
      update_option('month_name_translation_benaceur_t_Aou', $month[7]);
      update_option('month_name_translation_benaceur_Sep', $month[8]);
      update_option('month_name_translation_benaceur_t_Sep', $month[8]);
      update_option('month_name_translation_benaceur_Oct', $month[9]);
      update_option('month_name_translation_benaceur_t_Oct', $month[9]);
      update_option('month_name_translation_benaceur_Nov', $month[10]);
      update_option('month_name_translation_benaceur_t_Nov', $month[10]);
      update_option('month_name_translation_benaceur_Dec', $month[11]);
      update_option('month_name_translation_benaceur_t_Dec', $month[11]);
    }
	
    function options_default_abb() {
	  
      for($i=1; $i<=12; $i++){
      $month[] = $this->get_month_abbrev_name($i);
      }
	  
	  $months = array(
	  'jan' => $month[0],
	  'jan_t' => $month[0],
	  'feb' => $month[1],
	  'feb_t' => $month[1],
	  'mar' => $month[2],
	  'mar_t' => $month[2],
	  'apr' => $month[3],
	  'apr_t' => $month[3],
	  'may' => $month[4],
	  'may_t' => $month[4],
	  'jun' => $month[5],
	  'jun_t' => $month[5],
	  'jul' => $month[6],
	  'jul_t' => $month[6],
	  'aug' => $month[7],
	  'aug_t' => $month[7],
	  'sep' => $month[8],
	  'sep_t' => $month[8],
	  'oct' => $month[9],
	  'oct_t' => $month[9],
	  'nov' => $month[10],
	  'nov_t' => $month[10],
	  'dec' => $month[11],
	  'dec_t' => $month[11]
	  );
   
      update_option( 'month_name_translation_benaceur_abbrev_month', $months);
    }
	
    function settings_default() {
	return array(
	'enable' => '1',
	'reset_wplang' => '',
	'in_front' => '',
	'in__admin' => '',
	'delete_all_options' => 'no_delete_opt_mntb',
	'icon_evol_plug' => ''
	);
	}
	
	function ben_parse_args($option, $old, $new) {
			
		$ops_merged = wp_parse_args($old, $new);
		return update_option($option, $ops_merged);
	}
	
// add_option
    function options_default_up() {

    if ( $this->ver_base() === false ) {
		
	add_option( $this->get_option_settings(), $this->settings_default() );
    $this->options_default();
	$this->options_default_abb();
	add_option( $this->ver_b, $this->mntb_ver);
	
    } else if ( $this->ver_base() != $this->mntb_ver ) {
		
	$this->ben_parse_args($this->get_option_settings(), get_option($this->get_option_settings()), $this->settings_default());	
	update_option( $this->ver_b, $this->mntb_ver);
	
	}
	
	}
// add_option

    function MNTB_activated(){
		
     if ( $this->wp_equal_more_than('3.0') )  {
	    add_option('mntb_do_activation_redi', true);	 
	 } else {
        deactivate_plugins( basename( __FILE__ ) ); 
			die(__('<strong>Core Control:</strong> Sorry, This plugin requires WordPress 3.0+', 'core-control'));
	 }
	}

    function activ_redir() {
     if (get_option('mntb_do_activation_redi', false)) {
        delete_option('mntb_do_activation_redi');
		if(!isset($_GET['activate-multi'])) {
        wp_redirect( admin_url( 'options-general.php?page='.MNTB_BEN.'' ) ); exit;
		}
     }
    }

    function mntb_translation($list) {
    include ('includes/panel-var.php');	
	
	for($i=1; $i<=12; $i++){
    $months[] = $this->get_month_name($i);
    }
	
	for($i=1; $i<=12; $i++){
    $months_abbrev[] = $this->get_month_abbrev_name($i);
    }
	
    $rep = array(
    $mntb_t_jan, $mntb_t_Fev, $mntb_t_Mar, $mntb_t_Avr, $mntb_t_Mai, $mntb_t_Juin, 
    $mntb_t_Juil, $mntb_t_Aou, $mntb_t_Sep, $mntb_t_Oct, $mntb_t_Nov, $mntb_t_Dec
    );
	
    $rep_abbrev = array(
    $this->optionAbb('jan_t'), $this->optionAbb('feb_t'), $this->optionAbb('mar_t'), $this->optionAbb('apr_t'),
	$this->optionAbb('may_t'), $this->optionAbb('jun_t'), $this->optionAbb('jul_t'), $this->optionAbb('aug_t'),
	$this->optionAbb('sep_t'), $this->optionAbb('oct_t'), $this->optionAbb('nov_t'), $this->optionAbb('dec_t')
    );
	
    $list = str_replace($months, $rep, $list);
	$list = str_replace($months_abbrev, $rep_abbrev, $list);
    return $list; 
    }

    function MNTB_deactivated() {
	if ($this->option('delete_all_options') != 'delete_opt_mntb') return;
		
      foreach($this->get_array_options() as $name) {
        delete_option($name);
      }
	    delete_option('month_name_translation_benaceur__ver_base');
        delete_option('mntb_all_reset');
    }

    function page_options() {
    require_once ('panel-page.php');
	}
	
    function isset_wplang() {
		if ( ! isset($_POST['WPLANG'])) return;
		
		$locale = $_POST['WPLANG'];
		if ( empty( $locale ) ) {
			$locale = 'en_US';
		}
		
	    if ( get_locale() != $locale && ! $this->option('disable_reset_wplang') ) {
			add_option( 'month_name_translation_benaceur_WPLANG', true);
		}
	}
		
    function all_reset_AllOptions() {
		
      if ($this->option('all_reset'))
		  update_option( $this->get_option_settings(), $this->settings_default() );
	
      if ($this->_reset()) {
          $this->options_default();
		  $this->options_default_abb();
          delete_option('mntb_all_reset');
	      delete_option( 'month_name_translation_benaceur_WPLANG');
	  }
	  
    }
	
	function DroidKufiRegular() {
          ?>
          <style>
		  @font-face {
          font-family: DroidKufiRegular;
          src: url(<?php echo plugins_url( 'admin/font/DroidKufi-Regular.eot' , __FILE__ ); ?>);
          src: url(<?php echo plugins_url( 'admin/font/DroidKufi-Regular.eot' , __FILE__ ); ?>?#iefix) format("embedded-opentype"),
          url(<?php echo plugins_url( 'admin/font/droidkufi-regular.ttf' , __FILE__ ); ?>) format("truetype"),
		  url(<?php echo plugins_url( 'admin/font/droidkufi-regular.woff2' , __FILE__ ); ?>) format("woff2"),
	      url(<?php echo plugins_url( 'admin/font/droidkufi-regular.woff' , __FILE__ ); ?>) format("woff");
          }
          </style>
          <?php
    }

}

    require_once ('includes/inc.php');

	new get_class______month_name_translation_benaceur_inc;
