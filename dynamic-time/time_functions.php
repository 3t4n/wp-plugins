<?php
/*
Plugin Name: Dynamic Time
Plugin URI: https://richardlerma.com/plugins/
Description: A simple, dynamic calendar-based time solution.
Author: RLDD
Author URI: http://richardlerma.com/contact/
Version: 5.4.5
Text Domain: dynamic-time
Copyright: (c) 2017-2024 - rldd.net - All Rights Reserved
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
global $dyt_version; $dyt_version='5.4.5';
if(!defined('ABSPATH')) exit;
global $dyt_trns,$dyt_loc; $dyt_loc=get_locale();
if(!empty($dyt_loc) && strpos($dyt_loc,'en')===false && in_array(substr($dyt_loc,0,2),['es','ro','it','fr','de','pt','nl'])) include_once 'time_translations.php';


define('DYT_DIR_PATH',plugin_dir_path( __FILE__ ));

function dyt_error() {file_put_contents(dirname(__file__).'/install_log.txt', ob_get_contents());}
if(defined('WP_DEBUG') && true===WP_DEBUG) add_action('activated_plugin','dyt_error');

function dyt_adminMenu() {
  if(current_user_can('list_users')) add_menu_page('Dynamic Time','Dynamic Time','list_users','dynamic-time','dyt_admin','dashicons-clock','3'); // Admin
  else { // Supervisor
    global $wpdb;
    $dyt_user=dyt_userid();
    $get_sup=dyt_sql("SELECT 1 FROM {$wpdb->prefix}time_user WHERE Supervisor=%d;",array($dyt_user));
    if($get_sup) add_menu_page('Dynamic Time','Dynamic Time','moderate_comments','dynamic-time','dyt_admin','dashicons-clock','3');
    else add_menu_page('Dynamic Time','Dynamic Time','read','dynamic-time','dynamicTime','dashicons-clock','3');
  }
  function dyt_adminMenuCSS() { echo "<style>#adminmenu .toplevel_page_dynamic-time:not(.current):hover div.wp-menu-image:before{color:#EEE;transform:rotateY(180deg);-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s}</style>";}
  add_action('admin_head','dyt_adminMenuCSS');
}
add_action('admin_menu','dyt_adminMenu');

function dyt_admin() {
  global $wpdb,$dyt_version;
  include_once(DYT_DIR_PATH.'time_admin.php');
  wp_enqueue_style('dyt_style',plugins_url('assets/time_min.css?v=0'.$dyt_version,__FILE__));
}
add_shortcode('dyt_admin','dyt_admin');

function dynamicTime($atts=array()) {
  if(dyt_is_path(basename(get_admin_url()).',/wp-json') && !dyt_is_path('page=dynamic-time')) return;
  global $dyt_version,$time_cal,$max_width;
  $css_url='assets/time_min.css';
  $css_fmt=filemtime(plugin_dir_path(__FILE__).$css_url);
  $css_url=plugins_url($css_url."?v={$dyt_version}_{$css_fmt}",__FILE__);
  wp_enqueue_style('dyt_style',$css_url);

  $js_url='assets/time_min.js';
  $js_fmt=filemtime(plugin_dir_path(__FILE__).$js_url);
  $js_url=plugins_url($js_url."?v={$dyt_version}_{$js_fmt}",__FILE__);
  wp_enqueue_script('dyt_script',$js_url);

  $max_width=isset($atts['max_width']) && $atts['max_width']==='true' ? 1 : 0;
  require_once(DYT_DIR_PATH.'time_cal.php');
  if(dyt_is_path('admin.php') && !dyt_is_path('dyt_view_user') && !current_user_can('list_users')) echo $time_cal;
  else return $time_cal;
}
add_shortcode('dynamicTime','dynamicTime');

function dyt_activate($update) {
  global $wpdb,$dyt_version;
  require_once(ABSPATH.basename(get_admin_url()).'/includes/upgrade.php');
  update_option('dyt_db_version',$dyt_version,'yes');

  $sql="
    CREATE TABLE {$wpdb->prefix}time_user
    (UserID INT NOT NULL AUTO_INCREMENT,
    WP_UserID INT,
    Period TINYINT DEFAULT 30,
    Rate DECIMAL(6,2),
    PTO VARCHAR(250) NOT NULL DEFAULT 0,
    Exempt TINYINT DEFAULT 0,
    Supervisor INT,
    Prompt TINYINT DEFAULT 1,
    PRIMARY KEY  (UserID));";
  dbDelta($sql);

  $sql="
    CREATE TABLE {$wpdb->prefix}time_entry
    (EntryID INT NOT NULL AUTO_INCREMENT,
    WP_UserID INT,
    Date INT,
    HmnDate DATE DEFAULT NULL,
    Hours DECIMAL(4,2),
    HourType VARCHAR(3),
    TimeIn VARCHAR(8),
    TimeOut VARCHAR(8),
    Note VARCHAR(250),
    Category VARCHAR(50),
    PRIMARY KEY  (EntryID));";
  dbDelta($sql);
  
  $sql="
    CREATE TABLE {$wpdb->prefix}time_period
    (PeriodID INT NOT NULL AUTO_INCREMENT,
    WP_UserID INT,
    Date INT,
    HmnDate DATE DEFAULT NULL,
    Rate DECIMAL(4,2),
    Reg DECIMAL(5,2),
    PTO VARCHAR(250),
    OT DECIMAL(5,2),
    Bonus DECIMAL(5,2),
    Note VARCHAR(250),
    Submitted DATETIME,
    Submitter INT,
    Approved DATETIME,
    Approver INT,
    Processed DATETIME,
    PRIMARY KEY  (PeriodID));";
  dbDelta($sql);

  $sql="
    CREATE TABLE {$wpdb->prefix}time_geo
    (GeoID INT NOT NULL AUTO_INCREMENT,
    WP_UserID INT,
    HmnDate DATE DEFAULT NULL,
    SaveTime VARCHAR(8),
    Lt VARCHAR(12),
    Lg VARCHAR(12),
    PRIMARY KEY  (GeoID));";
  dbDelta($sql);

  if(function_exists('dyt_pro_ping'))dyt_pro_ping();
  ?><script type'text/javascript'>window.location.href='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>&updated=1';</script><?php 
}
register_activation_hook(__FILE__,'dyt_activate');


function dyt_sql($sql,$vars=array()) {
  global $wpdb;
  if(count($vars)>0) $sql=$wpdb->prepare($sql,$vars);
  $result=$wpdb->get_results($sql,OBJECT);
  return $result;
}

function dyt_is_path($pages) {
  $page_array=explode(',',$pages);
  $current_page=strtolower($_SERVER['REQUEST_URI']);
  foreach($page_array as $page) {
    if(strpos($current_page,strtolower($page))!==false) return true;
  }
  return false;
}

function dyt_admin_notice() {
  if(!dyt_is_path('page=dynamic-time')){
    require_once(ABSPATH."wp-includes/pluggable.php");
    if(current_user_can('manage_options')) {
      $settings_url=get_admin_url(null,'admin.php?page=dynamic-time'); ?>
      <div class="notice notice-success is-dismissible" style='margin:0;'>
        <p><?php 
          $ina1=dyt_t('The <em>Dynamic Time</em> plugin is active, but is not yet configured',1);
          $ina2=dyt_t('Complete setup',1);
          _e("$ina1. <a href='$settings_url'>$ina2</a>.",'Dynamic Time');?>
      </div><?php
    }
  }
}

function dyt_checkConfig() {
  global $dyt_version;
  $dyt_db_version=get_option('dyt_db_version');
  $prompt=get_option('dyt_config_prompt');
  if($dyt_version!==$dyt_db_version || version_compare($dyt_db_version,'5.2','<')) dyt_activate(1);
  else if(strlen($prompt)<1) add_action('admin_notices','dyt_admin_notice');
}
add_action('admin_init','dyt_checkConfig');

function dyt_add_action_links($links) {
  $settings_url=get_admin_url(null,'admin.php?page=dynamic-time');
  $support_url='http://richardlerma.com/plugins/';
  $links[]='<a href="'.$support_url.'">Support</a>';
  array_push($links,'<a href="'.$settings_url.'">Settings</a>');
  return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__),'dyt_add_action_links');

function dyt_uninstall() {
  global $wpdb;
  $pfx='dyt_config_';
  wp_cache_flush();
  $dropdata=get_option('dyt_config_dropdata');
  if($dropdata>0) {
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}time_config;");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}time_user;");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}time_entry;");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}time_period;");
    $option_name=explode(',',"dyt_hide_survey,dyt_pro,dyt_pro_version,dyt_db_version,dyt_time_format,prompt,notes,period,weekbegin,payroll,currency,dropdata,timeout,categoryon,categorylist,custom_ot,ot_min_dy,ot_min_wk,ot_multip,df_date");
    foreach($option_name as $o) {$pfx='';if(!stripos($o,'dyt_'))$pfx='dyt_config_';delete_option($pfx.$o);}
    $del_transients=dyt_sql("DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE '_transient_%' AND option_name LIKE '%dyt_%';");
    $del_options=dyt_sql("DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE 'dyt_%';");
  }
}
register_uninstall_hook(__FILE__,'dyt_uninstall');

function dyt_userid() {
  $userid=0;
  if(is_user_logged_in()) {
    $current_user=wp_get_current_user();
    $userid=$current_user->ID;
  }
  return $userid;
}

function dyt_username($name) {
  return ucwords(preg_replace("/[^\p{L}0-9- ]/u",'',$name));
}

function dyt_user_dropdown($type,$userid) {
  global $wpdb;
  $cid=dyt_userid();
  $blog=get_current_blog_id();
  if($blog<2) $blog_user=''; else $blog_user=$blog.'_';
  $users=get_transient("{$type}_{$cid}_user_dropdown");
  if(empty($users)) {
    $role_criteria='';
    $from="SELECT ID,0 Supervisor FROM {$wpdb->base_prefix}users";
    if($type=='payroll') $role_criteria="AND l.meta_value>=6";
    if($type=='user') {
      $from="SELECT WP_UserID ID,Supervisor FROM {$wpdb->prefix}time_user WHERE WP_UserID>0";
      if(!current_user_can('list_users')) if($cid>0) $role_criteria.=" AND (u.ID=$cid OR u.Supervisor=$cid)";
    }
    $user_query="
      SELECT DISTINCT u.ID userid
      ,COALESCE(
         CONCAT((SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.ID AND meta_key='first_name' AND LENGTH(meta_value)>0),IFNULL((SELECT CONCAT(' ',meta_value) FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.ID AND meta_key='last_name' AND LENGTH(meta_value)>0),''))
        ,(SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.ID AND meta_key='nickname' AND LENGTH(meta_value)>0)
        ,(SELECT display_name FROM {$wpdb->base_prefix}users WHERE ID=u.ID AND LENGTH(display_name)>0)
        ,(SELECT option_value FROM {$wpdb->prefix}options WHERE option_name=CONCAT('dyt_nm_',u.ID))
        ,CONCAT('User ',u.ID)
      )name
      FROM (
        SELECT u.ID
        FROM ($from)u
        LEFT JOIN {$wpdb->base_prefix}usermeta l ON l.user_id=u.ID AND l.meta_key='wp_{$blog_user}user_level'
        LEFT JOIN {$wpdb->base_prefix}usermeta b ON b.user_id=u.ID AND b.meta_key='primary_blog'
        LEFT JOIN {$wpdb->base_prefix}usermeta t ON t.user_id=u.ID AND t.meta_key='session_tokens'
        WHERE (IFNULL(b.meta_value,'$blog')='$blog' OR l.meta_value>9)
        $role_criteria
        ORDER BY CASE WHEN u.ID='$userid' THEN 9 else SUBSTRING(t.meta_value,NULLIF(LOCATE('expiration',t.meta_value),0)+14,10) END DESC
        LIMIT 1000
      )u
      ORDER BY name;
    ";
    //echo $user_query;
    $users=dyt_sql($user_query);
    set_transient("{$type}_{$cid}_user_dropdown",$users,60);
  }
  $options='';
  if($users) foreach($users as $u) {
    if($u->userid==$userid) $selected='selected'; else $selected='';
    $options.="<option value='{$u->userid}' $selected>".dyt_username($u->name);
  } else $options="<option value='0' disabled>".dyt_t('No Eligible Users',1)."</option>";
  return $options;
}

function dyt_page_url() {
  global $wpdb;
  $id=$wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_status='publish' AND post_type IN ('page','post') AND post_content LIKE %s LIMIT 1",'%[dynamicTime%'));
  return $id ? get_permalink($id):false;
}


/* User Defined Email Subject & Content
function dyt_custom_mail_subject($user_name) {return "test subject";}
function dyt_custom_mail_content($recipient_name,$user_name,$url) {return "test content";}
function dyt_custom_mail_footer($target_type,$type) {return "test footer";}
*/

// Email Functions
function dyt_html_mail() {return 'text/html';}
function dyt_mail_from($email='') {return get_bloginfo('admin_email');}
function dyt_mail_name($name='') {return get_bloginfo('name');}
function dyt_email($target_id,$target_name,$target_type,$user_id,$username,$type='notify') {
  $url=get_site_url();
  $username=ucwords($username);
  $target_name=ucwords($target_name);
  $page=dyt_page_url();
  if($target_type!=='payroll' && !empty($page)) $url=$page;
  else $url=get_admin_url(null,'admin.php?page=dynamic-time');
  if($target_type=='supervisor') {
    if(strpos($url,'?')===false) $url.='?t='.substr($type,0,1).substr($target_type,0,1);
    $url.="&sup=$target_id&dyt_user=$user_id";
    $sessions=get_user_meta($user_id,'session_tokens',true);
    if(!empty($sessions)) {
      $session=array_column($sessions,'expiration');
      $url.='&dyt_key='.$session[0];
    }
  }
  $target=get_userdata($target_id);
  if($target && isset($target->user_email)) {
    $email=$target->user_email;
    if(strpos($email,'@')!==false) {
      if($type=='notify') { 
        $subj=$username." - ".dyt_t('Pay Period Submitted',1);
        $msg=dyt_t('A pay period has been submitted for',1)." $username. ".dyt_t('It can be approved',1);
        if(function_exists('dyt_custom_mail_subject')) $subj=dyt_custom_mail_subject($username);
        if(function_exists('dyt_custom_mail_content')) $cmsg=dyt_custom_mail_content($target_name,$username,$url);
      }
      elseif($type=='remind') {
        if($target_type=='supervisor') {$subj=$username." - ".dyt_t('Pay Period - Action Required',1); $msg=dyt_t('Please approve a pay period for',1)." $username";}
        else {$subj=dyt_t('Pay Period - Action Required',1); $msg=dyt_t('Please submit your pay period for timely processing',1);}
      }
      require_once(ABSPATH.WPINC.'/pluggable.php');
      if(function_exists('dyt_custom_mail_footer')) $footer=dyt_custom_mail_footer($target_type,$type);
      if(isset($cmsg)) $msg=$cmsg; else $msg="$target_name,<br><br>&nbsp;$msg ".dyt_t('at',1)." <a href='$url' target='_blank'>$url</a><br><br>- ".dyt_mail_name();
      if(isset($footer)) $msg.=$footer;
      add_filter('wp_mail_content_type','dyt_html_mail');
      add_filter('wp_mail_from','dyt_mail_from');
      add_filter('wp_mail_from_name','dyt_mail_name');
      $sent=wp_mail($email,$subj,$msg);
      remove_filter('wp_mail_content_type','dyt_html_mail');
    }
  }
}

function pto_acr($pto_tot,$wrk_tot,$wrk_end) {
  if($wrk_tot<$wrk_end) $pto_acr=number_format($pto_tot*($wrk_tot/$wrk_end),2); // emp start after 1/1
  else $pto_acr=number_format($pto_tot*($wrk_end/365),2); // emp start before 1/1
  return $pto_acr;
}

function dyt_pto($pto_tot,$pto_tkn,$wrk_tot,$wrk_end,$pto_cat='') {
  if(($pto_tkn>0 || $pto_tot>0) && $wrk_end>0 && function_exists('dyt_pro_ping')) {
    $acr=$rem=$acr_itm=$tkn_itm=$rem_pto=$rem_itm=$rem_itm_tmp='';
    $pto_accrue=get_option('dyt_config_pto_accrue');

    // PTO Cat Itemize
    $pto_tots=@unserialize($pto_tot);
    if(is_array($pto_tots)) {
      $pto_tot=0;
      $pto_cats=get_option('dyt_config_categorylist_pto');
      $pto_cats=explode(',',$pto_cats);
      array_push($pto_cats,'Uncategorized');
      $pto_cats_tkn=explode(',',$pto_cat);
      $i=$tot=0;
      foreach($pto_cats as $c) { // Cat List
        $c=trim($c);
        if(isset($pto_tots[$i])) $tot=$pto_tots[$i];
        if($tot>0) {
          if($c!='Uncategorized') {
            $pto_tot+=$tot;
            $acr_itm.="$c $tot<br>";
            $rem_itm_tmp="$c $tot<br>";
          }
        }
        $remx=0;
        foreach($pto_cats_tkn as $t) {
          $cats=explode(':',$t);
          $cat=trim($cats[0]);
          if($c==$cat) {
            $tkn=number_format(trim($cats[1]),1);
            if($pto_accrue>=0 || empty($pto_accrue)) $tot=pto_acr($tot,$wrk_tot,$wrk_end);
            if($tot>0) $rem_pto=$tot-$tkn;
            $tkn_itm.="$c $tkn<br>";
            if($c!='Uncategorized')$rem_itm.="$c $rem_pto<br>";
            $remx=1;
          }
        }
        $i++;
        if($remx<1) $rem_itm.=$rem_itm_tmp;
        $rem_itm_tmp='';
      }
    }
    
    if($pto_accrue>=0 || empty($pto_accrue)) $pto_acr=pto_acr($pto_tot,$wrk_tot,$wrk_end);
    else $pto_acr=$pto_tot;

    $pto_rem=$pto_acr-$pto_tkn;
    $pto_acr_dy=number_format($pto_acr/8,1);
    $pto_tkn_dy=number_format($pto_tkn/8,1);
    $pto_rem_dy=number_format($pto_rem/8,1);

    $itm="<div style='font-size:.95em;color:#bbb;margin-bottom:5px'>xxx</div>Total ";
    if(!empty($tkn_itm)) $tkn_itm=str_replace('xxx',$tkn_itm,$itm);
    if($pto_acr>0) {
      if(!empty($acr_itm)) $acr_itm=str_replace('xxx',$acr_itm,$itm);
      $acr="<tr class='pto_rate'><td>Accrued</td><td>{$acr_itm}$pto_acr</td><td>$pto_acr_dy</td></tr>";
      if($pto_tkn>0) {
        if(!empty($rem_itm)) $rem_itm=str_replace('xxx',$rem_itm,$itm);
        $rem="<tr><td>Remaining</td><td>{$rem_itm}$pto_rem</td><td>$pto_rem_dy</td></tr>";
      }
    }
    return "
    <table id='pto_rate' style='display:inline-block;width:fit-content;text-transform:none;margin:.5em .5em 0 0;padding:1em;color:#888;background:#fff;border:1px solid #fff;border-radius:2px'>
      <tr><td style='color:var(--dyt_clr);text-align:center' colspan='3'><b>".date('Y')." PTO</b></td></tr>
      <tr><td></td><th style='vertical-align:sub'>Hours</th><th title='PTO days are considered 8 hours.'>Days<span class='dashicons dashicons-info-outline' style='font-size:1.2em;vertical-align:sub'></span></th></tr>
      $acr
      <tr class='pto_rate'><td>Consumed</td><td>{$tkn_itm}$pto_tkn</td><td>$pto_tkn_dy</td></tr>
      $rem
      <tr class='pto_desc'><td colspan='3' style='color:#aaa;padding:1em'>*PTO days are considered 8 hours. Accruals are prorated from date of first time entry this year thru date of last time entry this year.</td></tr>
    </table>
    <style>
      #pto_rate tr th{color:#bbb;padding:0;text-align:center}
      #pto_rate tr td,#dyt_sum #pto_rate tr td{text-align:right;padding:.5em 1em}
      #dyt_sum #pto_rate tr td{font-size:1.2em}
      #pto_rate tr.pto_rate td{border-bottom:1px solid #eee}
      @media(min-width:568px){.pto_desc{display:none}}
    </style>";
  }
}

function dyt_save_sig($wp_userid,$dateval,$sigimg,$type) {
  $path=$_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads/time_sig/';
  if(!is_dir($path)) mkdir($path,0755,true);
  if($sigimg=='delete') {@unlink("$path{$wp_userid}_{$dateval}_{$type}.png"); return;}
  $sigimg=str_replace('data:image/png;base64,','',$sigimg);
  file_put_contents("$path{$wp_userid}_{$dateval}_{$type}.png",base64_decode($sigimg));
}

function dyt_trn_cal() {
  global $dyt_loc;
  $date_name=function($i,$type) {
    if(class_exists('IntlDateFormatter')) {
      $formatter=new IntlDateFormatter($GLOBALS['dyt_loc']?:'en_US',IntlDateFormatter::FULL,IntlDateFormatter::NONE);
      $formatter->setPattern($type=='day'?'EEE':'MMM');
      return addslashes(str_replace('.','',$formatter->format($type=='day'?strtotime("Sunday +$i days"):mktime(0,0,0,$i+1,1))));
    } else return $type=='day'?substr(date('l',strtotime("Sunday +$i days")),0,3):date('M',mktime(0,0,0,$i+1,1));
  };

  echo 'var weekday=new Array(7); var month=new Array(12);';
  for($i=0;$i<7;$i++)echo "weekday[$i]='".$date_name($i,'day')."';";
  for($i=0;$i<12;$i++)echo "month[$i]='".$date_name($i,'month')."';";
}

function dyt_trn_dy($date,$type) {
  global $dyt_loc;
  $timestamp=strtotime($date);
  if($timestamp===false) return;
  if(!class_exists('IntlDateFormatter') || strpos($dyt_loc,'en')===0 || empty($dyt_loc)) {
    echo $type=='day'?substr(date('l',$timestamp),0,3):substr(date('F',$timestamp),0,3);
    return;
  }
  $formatter=new IntlDateFormatter($dyt_loc,IntlDateFormatter::FULL,IntlDateFormatter::NONE);
  $formatter->setPattern($type=='day'?'EEE':'MMM');
  echo str_replace('.','',$formatter->format($timestamp));
}

function dyt_t($v,$r=0){
  global $dyt_trns,$dyt_loc;
  if(strpos($dyt_loc,'en')===0 || empty($v) || empty($dyt_trns) || empty($dyt_loc)) {if($r>0) return $v; else echo $v;return;}
  $lang=substr($dyt_loc,0,2);
  $id=array_search($v,$dyt_trns['en']);
  if($id===false) {if($r>0) return $v; else echo $v;return;}
  $result=$dyt_trns[$lang][$id]??$dyt_trns['en'][$id]??$v;
  if($r>0) return $result; else echo $result;
}
