<?php 

if(!defined('ABSPATH')) exit;
if(!current_user_can('edit_posts') && !current_user_can('moderate_comments')) exit;
if(!$wpdb) $wpdb=new wpdb(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST); else global $wpdb;
$input_saved=0;

// Get Versions
  global $wp_version,$dyt_version,$dyt_pro_version,$dyt_version_type,$dyt_loc;
  $dyt_db_version=get_option('dyt_db_version');
  $dyt_pro_version=0;
  $dyt_version_type='GPL';
  $pfx='dyt_config_';
  dyt_pro_path('dynamic-time','PRO'); dyt_pro_path('dynamic-time','pro');
  $get_version=dyt_sql("SELECT @@version as version;");
  if($get_version) foreach($get_version as $row):$mysql_version=$row->version;endforeach;
  $db_config_mode=dyt_sql("SELECT @@sql_safe_updates as mode;");
  if($db_config_mode) foreach($db_config_mode as $row):$config_mode=$row->mode;endforeach;

  if(isset($_POST['user_filter'])) {
    $user_filter=intval($_POST['user_filter']);
    $user_ct=intval($_POST['user_ct']);
    if($user_filter>=0 || ($user_filter<0 && $user_ct<20)) set_transient($pfx.'user_filter_'.dyt_userid(),$user_filter,604800);
  }
  else $user_filter=get_transient($pfx.'user_filter_'.dyt_userid());

  function dyt_pro_path($slug,$type) {
    global $dyt_pro_version;
    global $dyt_version_type;
    $pro_path=str_replace($slug,"$slug-$type",plugin_dir_path( __FILE__ )).'pro_content.php';
    if(is_plugin_active("$slug-$type/pro_functions.php")) 
      if(file_exists($pro_path)) {include_once $pro_path; $dyt_pro_version=get_option('dyt_pro_version'); if(function_exists('dyt_pro_ping')) {$dyt_version_type='PRO'; if(empty($dyt_pro_version))$dyt_pro_version=1;}}
  }

// Update Configuration
  if(!empty($_POST['dyt_config_time']) && check_admin_referer('config_time','dyt_config_time')) {
    $currency=sanitize_text_field($_POST['currency']);
    $prompt=intval($_POST['prompt']);
    $notes=intval($_POST['notes']);
    $period=intval($_POST['period']);
    $weekbegin=intval($_POST['weekbegin']);
    $dropdata=intval($_POST['dropdata']);
    
    if(isset($_POST['geoloc'])) $geo_loc=intval($_POST['geoloc']); else $geo_loc=0;
    if(isset($_POST['sigreq'])) $sig_req=intval($_POST['sigreq']); else $sig_req=0;
    if(isset($_POST['categoryon'])) $cat_on=intval($_POST['categoryon']); else $cat_on=0;
    $cat_list=preg_replace('/\\\\/','',sanitize_text_field(preg_replace("/\n/",",",$_POST['categorylist'])));
    $cat_list_pto=preg_replace('/\\\\/','',sanitize_text_field(preg_replace("/\n/",",",$_POST['categorylist_pto'])));
    
    if(isset($_POST['custom_ot'])) $custom_ot=intval($_POST['custom_ot']); else $custom_ot=0;
    $ot_min_dy=filter_var($_POST['ot_min_dy'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $ot_min_wk=filter_var($_POST['ot_min_wk'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $ot_multip=filter_var($_POST['ot_multip'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);

    $df_in=sanitize_text_field($_POST['df_in']);
    $df_out=sanitize_text_field($_POST['df_out']);
    $df_hr=sanitize_text_field($_POST['df_hr']);
    $predict=intval($_POST['predict']);
    
    $pto_default=sanitize_text_field($_POST['pto_default']);
    if(isset($_POST['pto_bank'])) $pto_bank=array_map('sanitize_text_field',$_POST['pto_bank']); else $pto_bank='';
    $pto_split=intval($_POST['pto_split']);
    $pto_accrue=intval($_POST['pto_accrue']);
    if(isset($_POST['timeout'])) $timeout=intval($_POST['timeout']); else $timeout=-1;
    if(!empty($_POST['hide_survey'])) $hide_survey=intval($_POST['hide_survey']); else $hide_survey=0;
    $payroll_id=intval($_POST['payroll_id']);
    update_option($pfx.'prompt',$prompt);
    update_option($pfx.'notes',$notes);
    update_option($pfx.'period',$period);
    update_option($pfx.'weekbegin',$weekbegin);
    update_option($pfx.'payroll',$payroll_id);
    update_option($pfx.'currency',$currency);
    update_option($pfx.'dropdata',$dropdata);
    update_option($pfx.'timeout',$timeout);
    
    update_option($pfx.'geoloc',$geo_loc);
    update_option($pfx.'sigreq',$sig_req);
    update_option($pfx.'categoryon',$cat_on);
    update_option($pfx.'categorylist',$cat_list);
    update_option($pfx.'categorylist_pto',$cat_list_pto);
    
    update_option($pfx.'custom_ot',$custom_ot);
    update_option($pfx.'ot_min_dy',$ot_min_dy);
    update_option($pfx.'ot_min_wk',$ot_min_wk);
    update_option($pfx.'ot_multip',$ot_multip);

    update_option($pfx.'df_in',$df_in);
    update_option($pfx.'df_out',$df_out);
    update_option($pfx.'df_hr',$df_hr);
    update_option($pfx.'predict',$predict);
    
    update_option($pfx.'pto_default',$pto_default);
    update_option($pfx.'pto_bank',$pto_bank);
    update_option($pfx.'pto_split',$pto_split);
    update_option($pfx.'pto_accrue',$pto_accrue);


    if(isset($_POST['pto_update']) && function_exists('dyt_pro')) {
      if($pto_split>=0 && !empty($pto_bank)) {
        $update_users_table=dyt_sql("ALTER TABLE {$wpdb->prefix}time_user MODIFY COLUMN PTO VARCHAR(250);");
        $update_users_pto=dyt_sql("UPDATE {$wpdb->prefix}time_user u JOIN {$wpdb->prefix}options o ON o.option_name='dyt_config_pto_bank' SET PTO=o.option_value WHERE (IFNULL(NULLIF(PTO,''),0)='0' OR PTO NOT LIKE 'a:%');");
      }
      elseif($pto_default>0) $update_users_pto=dyt_sql("UPDATE {$wpdb->prefix}time_user u JOIN {$wpdb->prefix}options o ON o.option_name='dyt_config_pto_default' SET PTO=o.option_value WHERE (IFNULL(NULLIF(PTO,''),0)='0' OR PTO LIKE 'a:%');");
    }

    if(isset($hide_survey)) update_option('dyt_hide_survey',$hide_survey,'no');
    $input_saved++;
  }

// Update User
  if(!empty($_POST['dyt_config_user']) && check_admin_referer('config_user','dyt_config_user')) {
    $archive_user=$pto=$remind_u=$remind_s=0;
    $wp_userid=intval($_POST['wp_userid']);
    if(isset($_POST['remind_u'])) $remind_u=intval($_POST['remind_u']);
    if(isset($_POST['remind_s'])) $remind_s=intval($_POST['remind_s']);
    if($remind_u>0 || $remind_s>0) {
      $uname=sanitize_text_field($_POST['uname']);
      $sname=sanitize_text_field($_POST['sname']);
      $sid=intval($_POST['supervisor_id']);
      if($remind_u>0) dyt_email($wp_userid,$uname,'user',$wp_userid,$uname,'remind');
      elseif($remind_s>0) {dyt_email($sid,$sname,'supervisor',$wp_userid,$uname,'remind'); $uname=$sname;}
      echo "<script>alert(\"Reminder sent to $uname.\");</script>";
    }
    if(isset($_POST['archive_user'])) $archive_user=intval($_POST['archive_user']); 
    if($archive_user>0) $update_user=dyt_sql("UPDATE {$wpdb->prefix}time_user SET WP_UserID=-WP_UserID WHERE WP_UserID=%d;",array($wp_userid));
    else {
      if(isset($_POST['user_period'])) $user_period=intval($_POST['user_period']); else $user_period=15;
      if(isset($_POST['user_prompt'])) $user_prompt=intval($_POST['user_prompt']); else $user_prompt=2;
      $rate=filter_var($_POST['rate'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
      if(isset($_POST['pto'])) {$pto=filter_var($_POST['pto'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); if($pto<0) $pto=0;}
      if(isset($_POST['pto_array'])) $pto=serialize(array_map('sanitize_text_field',$_POST['pto_array']));
      $exempt=intval($_POST['exempt']);
      $supervisor_id=intval($_POST['supervisor_id']);
      $wpdb->query("SET SQL_SAFE_UPDATES=0;");
      $get_user=dyt_sql("SELECT UserID FROM {$wpdb->prefix}time_user WHERE WP_UserID=%d;",array($wp_userid));
      if($get_user) $user_row=$get_user[0]->UserID; else $user_row=0;
      if($user_row>0) $update_user=dyt_sql("UPDATE {$wpdb->prefix}time_user SET Period=%s,Rate=%s,Exempt=%s,Supervisor=%s,Prompt=%s WHERE WP_UserID=%d AND UserID=%d;",array($user_period,$rate,$exempt,$supervisor_id,$user_prompt,$wp_userid,$user_row));
      else $insert_user=dyt_sql("INSERT INTO {$wpdb->prefix}time_user (WP_UserID,Period,Rate,Exempt,Supervisor,Prompt)VALUES(%d,%s,%s,%s,%s,%s);",array($wp_userid,$user_period,$rate,$exempt,$supervisor_id,$user_prompt));
      if($pto!==0) $update_user=dyt_sql("UPDATE {$wpdb->prefix}time_user SET PTO=%s WHERE WP_UserID=%d;",array($pto,$wp_userid));
    }
   if($remind_u<1 && $remind_s<1) $input_saved++;
  }

// Get Configuration
  $hide_survey=get_option('dyt_hide_survey');
  $dyt_user=0;
  $not_set='&#9888; '.dyt_t('Not Set',1);;
  if(strpos($_SERVER['REQUEST_URI'],'dyt_user=')!==false) $dyt_user=intval($_GET['dyt_user']);
  if($dyt_user>0) $time_cal=dynamicTime();

  $prompt=get_option($pfx.'prompt');
  if(strlen($prompt)>0): 
    $notes=get_option($pfx.'notes');
    $period=get_option($pfx.'period');
    $weekbegin=get_option($pfx.'weekbegin');
    $payroll_id=get_option($pfx.'payroll');
    $currency=get_option($pfx.'currency');
    $dropdata=get_option($pfx.'dropdata');
    $timeout=get_option($pfx.'timeout');
    
    $geo_loc=get_option($pfx.'geoloc');
    $sig_req=get_option($pfx.'sigreq');
    $cat_on=get_option($pfx.'categoryon');
    $cat_list=get_option($pfx.'categorylist');
    $cat_list_pto=get_option($pfx.'categorylist_pto');
    
    $custom_ot=get_option($pfx.'custom_ot');
    $ot_min_dy=get_option($pfx.'ot_min_dy');
    $ot_min_wk=get_option($pfx.'ot_min_wk');
    $ot_multip=get_option($pfx.'ot_multip');
    
    $df_in=get_option($pfx.'df_in');
    $df_out=get_option($pfx.'df_out');
    $df_hr=get_option($pfx.'df_hr');
    $predict=get_option($pfx.'predict');
    
    $pto_default=get_option($pfx.'pto_default');
    $pto_bank=get_option($pfx.'pto_bank');
    $pto_split=get_option($pfx.'pto_split');
    $pto_accrue=get_option($pfx.'pto_accrue');
    $dyt_setup_mode=0;
  else:
    $prompt='';
    $weekbegin=$payroll_id=$timeout=-1;
    $period=$pto_default=0;
    $currency='$';
    $cat_list=$cat_list_pto='';
    $dyt_setup_mode=1;
  endif;
  
  if(empty($period)) {
    $prompt=$dropdata=$geo_loc=$sig_req=$cat_on=$custom_ot=0;
    $notes=1;
  }
  
  if(empty($ot_min_dy)) $ot_min_dy=8;
  if(empty($ot_min_wk)) $ot_min_wk=40;
  if(empty($ot_multip)) $ot_multip=1.5;

  if(empty($df_in)) $df_in='09:00';
  if(empty($df_out)) $df_out='17:00';
  if(empty($df_hr)) $df_hr='8';
  if(empty($predict)) $predict=1;
  if(empty($pto_accrue)) $pto_accrue=1;
  if(empty($pto_split)) $pto_split=-1;

// Get Users
  $condition=$recent='';
  if(empty($user_filter)) {$condition="AND HmnDate>NOW()-INTERVAL 2 MONTH"; $recent="ORDER BY PeriodID DESC LIMIT 20";}
  elseif($user_filter>0) $condition="AND WP_UserID=$user_filter";
  $get_users=$wpdb->get_results("
    SELECT u.*
    ,COALESCE((SELECT Period FROM {$wpdb->prefix}time_user WHERE Period IS NOT NULL ORDER BY UserID DESC LIMIT 1),30)df_period
    ,(SELECT user_email FROM {$wpdb->base_prefix}users WHERE ID=u.WP_UserID)email
    ,COALESCE(
       CONCAT((SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.WP_UserID AND meta_key='first_name' AND LENGTH(meta_value)>0),IFNULL((SELECT CONCAT(' ',meta_value) FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.WP_UserID AND meta_key='last_name' AND LENGTH(meta_value)>0),''))
      ,(SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.WP_UserID AND meta_key='nickname' AND LENGTH(meta_value)>0)
      ,(SELECT display_name FROM {$wpdb->base_prefix}users WHERE ID=u.WP_UserID AND LENGTH(display_name)>0)
      ,(SELECT option_value FROM {$wpdb->prefix}options WHERE option_name=CONCAT('dyt_nm_',u.WP_UserID))
      ,CONCAT('User ',u.WP_UserID)
    )name
    ,COALESCE(
       CONCAT((SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.Supervisor AND meta_key='first_name' AND LENGTH(meta_value)>0),IFNULL((SELECT CONCAT(' ',meta_value) FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.Supervisor AND meta_key='last_name' AND LENGTH(meta_value)>0),''))
      ,(SELECT meta_value FROM {$wpdb->base_prefix}usermeta WHERE user_id=u.Supervisor AND meta_key='nickname' AND LENGTH(meta_value)>0)
      ,(SELECT display_name FROM {$wpdb->base_prefix}users WHERE ID=u.Supervisor AND LENGTH(display_name)>0)
      ,(SELECT option_value FROM {$wpdb->prefix}options WHERE option_name=CONCAT('dyt_nm_',u.Supervisor))
      ,CONCAT('User ',u.Supervisor)
    )supervisor_name
    ,(SELECT user_email FROM {$wpdb->base_prefix}users WHERE ID=u.Supervisor)supervisor_email
    ,Supervisor supervisor_id
    ,(SELECT DATE_FORMAT(Submitted,'%Y-%m-%d') FROM {$wpdb->prefix}time_period WHERE WP_UserID=t.WP_UserID AND Submitted IS NOT NULL ORDER BY HmnDate DESC LIMIT 1)Submitted
    ,(SELECT DATE_FORMAT(Approved, '%Y-%m-%d') FROM {$wpdb->prefix}time_period WHERE WP_UserID=t.WP_UserID AND Submitted IS NOT NULL ORDER BY HmnDate DESC LIMIT 1)Approved
    ,(SELECT DATE_FORMAT(Processed,'%Y-%m-%d') FROM {$wpdb->prefix}time_period WHERE WP_UserID=t.WP_UserID AND Submitted IS NOT NULL ORDER BY HmnDate DESC LIMIT 1)Processed
    FROM {$wpdb->prefix}time_user u
    JOIN (
      SELECT WP_UserID
      FROM {$wpdb->prefix}time_period
      WHERE 1=1 
      $condition 
      GROUP BY WP_UserID
      $recent
    )t ON t.WP_UserID=u.WP_UserID
    WHERE u.WP_UserID>0
    GROUP BY u.WP_UserID
    ORDER BY Submitted DESC, Approved DESC, Processed DESC;
  ",OBJECT);

  $sup_ct=$user_ct=0;
  if($user_filter<=0) {
    foreach($get_users as $row) {$user_ct++; if($row->supervisor_id>0) $sup_ct++;}
    update_option('dyt_user_ct',$user_ct);
    update_option('dyt_sup_ct',$sup_ct);
  } else {
    $user_ct=get_option('dyt_user_ct',0);
    $sup_ct=get_option('dyt_sup_ct',0);
  } ?>

<div id='input_saved'>Saved</div>
<table id='dyt_head' class='dyt_control' style='width:99%;border:none;'>
  <tbody style='display:block'>
    <tr style='display:block'>
      <td align='left' style='display:block'>
        <img style='height:15px;' src='<?php echo plugins_url('/assets/DynamicTime.png',__FILE__);?>'>
        <div class='dyt_links'>
          <a href="#!" onclick="dyt_expand('dyt_setup');"><?php dyt_t('Setup');?> <span class="dashicons dashicons-admin-plugins"></span></a><br>
          <a href="#!" onclick="dyt_expand('dyt_diag');"><?php dyt_t('Support');?> <span class="dashicons dashicons-admin-tools"></span></a><br>
          <a href="#!" onclick="dyt_expand('dyt_pro');" <?php if(!current_user_can('manage_options')) echo "style='display:none'"; ?>><span class='caps'>Dynamic Time <span class='pro'>Pro</span><span class="dashicons dashicons-chart-line" style='color:#b71b8a'></span><span style='color:#1177aa;font-weight:bold'></a>
        </div>
        <br><hr style='width:50%;float:left'><br>
        <?php if(isset($dyt_user)) if($dyt_user>0) { ?>
          <a id='dyt_return' href='#!' onclick="dyt_switchScreen('dyt_admin');"><div id='dyt_return_icon'></div> <?php dyt_t('Return to Admin');?></a>
        <?php } ?>
      </td>
    </tr>
  </tbody>
</table>

<?php 
  if(isset($_GET['updated'])) { ?>
  <div id='dyt_new' onclick="dyt_expand('dyt_pro');">
    <span style='font-size:1.2em'><?php dyt_t('Now available in');?> <span class='caps' style='color:#FFF'>PRO</span></span><br><br>
    <div style='padding:1em;background:#931e71;border-radius:3px'>
      <span class="dashicons dashicons-controls-play"></span> <?php dyt_t('PTO Bank');?>
      <br><span class="dashicons dashicons-controls-play"></span> <?php dyt_t('Geolocation Tracking');?>
      <br><span class="dashicons dashicons-controls-play"></span> <?php dyt_t('Custom Categories');?>
      <br><span class="dashicons dashicons-controls-play"></span> <?php dyt_t('Signature Pad');?>
      <br><span class="dashicons dashicons-controls-play"></span> <?php dyt_t('CSV Export');?>
      <br><span class="dashicons dashicons-controls-play"></span> <?php dyt_t('Filter and Total by Category');?>
    </div>
    <?php if($dyt_pro_version<1) echo '<button>'.dyt_t('Get PRO',1).'</button>'; ?>
  </div>
<?php 
  if(!empty(get_option('dyt_idx'))) dyt_sql("OPTIMIZE TABLE {$wpdb->prefix}time_entry;");
  else {
    dyt_sql("CREATE INDEX {$wpdb->prefix}time_entry_user_date_hmn ON {$wpdb->prefix}time_entry (WP_UserID,Date,HmnDate);");
    update_option('dyt_idx',1);
  }
  if(!empty(get_option('dyt_idx5'))) dyt_sql("OPTIMIZE TABLE {$wpdb->prefix}time_period;");
  else {
    dyt_sql("CREATE INDEX {$wpdb->prefix}time_period_user_hmn ON {$wpdb->prefix}time_period (WP_UserID,PeriodID,HmnDate);");
    update_option('dyt_idx5',1);
  }
}

if($dyt_user>0) {
  if(empty($_GET['sup']) && !current_user_can('list_users')) check_admin_referer('view_user','dyt_view_user');?>
  <style>#dyt_setup td{padding-left:3em}#dyt_admin{display:none}#dyt_admin,#dyt_cal_admin{-webkit-transition:all .2s;-moz-transition:all .2s;transition:all .2s}#dyt_survey,#dyt_survey_button{display:none}#dyt_cal_admin #dyt_form{margin:0;width:99%}</style>
  <div id='dyt_cal_admin'>
    <?php echo $time_cal;?>
  </div>
<?php } ?>

<style>
#dyt_pro ul>li:before{padding:0;margin:0;content:'\276D';font-weight:700;color:#b71b8a;padding-right:6px}
a:focus{box-shadow:none}
#dyt_new{display:inline-block;float:right;margin:-1.1em 0 0;padding:2em;background:#b71b8a;color:#fff;border-radius:3px;z-index:99;min-width:33%;cursor:pointer}
#dyt_new:before{border-width:0px 7px 14px;border-color:#b71b8a transparent;content:'';position:absolute;border-style:solid;display:block;width:0;margin:-3em 3.5em 0 0;right:0}
#dyt_new button{-webkit-appearance:none;border:none;background:#fff;border-radius:3px;margin-top:1em;padding:1em;width:100%;color:gray;font-weight:bold}
#dyt_new button:hover{background:#065780;color:#fff;cursor:pointer}
#dyt_admin .button{width:100%;font-size:.9em;font-weight:normal}
#dyt_admin .dashicons{vertical-align:sub}
#dyt_admin .dashicons-dismiss{cursor:pointer}
#dyt_head .dyt_links{float:right;text-align:right}
#dyt_head .dyt_links a{line-height:1.8em}
#dyt_admin .dyt_control .dyt_link{display:block;background:#0073aa;color:#FFF;border-radius:3px;padding:1em 3em;text-align:center;font-weight:normal}
#dyt_admin .dyt_control .dyt_link:hover{background:#b71b8a;color:#FFF;text-decoration:none}
#dyt_admin .spin:hover,#dyt_admin .budge,#dyt_admin .dyt_expand{-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s;text-decoration:none}
#dyt_admin .dyt_expand{display:none;opacity:0;max-height:0;padding:2em}
#dyt_admin #dyt_setup{font-size:1.2em}
#dyt_admin #dyt_setup li{margin:1em 0}
#dyt_admin .sel_status{color:#ce299e;}
#dyt_admin .setup_order{font-size: 2em;vertical-align:text-bottom;font-weight:bold;color:#ce299e}
#dyt_admin table th{color:#17a;padding:1em}
#dyt_admin table td{overflow:hidden;white-space:nowrap;padding:1em}
#dyt_admin #timesettings td{padding:.5em}
#dyt_admin table .even{background:#fff;color:#666}
#dyt_admin table .odd{background:#eef1f5;color:#000}
#dyt_admin table tr.even:hover,#dyt_admin table tr.odd:hover{background:#f7fbff;color:#0073AA;outline:.5px solid #ddd}
#dyt_admin table .col_name{color:#fff;background:#2271b1;font-weight:normal}
#dyt_admin table .dyt_disable{color:gray;opacity:.7;pointer-events:none}
.caps{color:#17a;font-weight:700;font-variant-caps:petite-caps}
#dyt_admin .attn{color:#FFF;border-radius:3px;background:#b71b8a;color:#fff;padding:1em;margin:1em 0}
#dyt_admin .spin:hover{transform:rotate(180deg)}
#dyt_admin .view{cursor:pointer;text-decoration:none;user-select:none}
#dyt_admin tr:hover>td>.budge{margin-right:-.1em}
#dyt_admin .goog-te-gadget-simple{border:1px solid #888}
#dyt_admin .dyt_archive,#dyt_admin .dyt_remind{text-decoration:none;opacity:.3}
#dyt_admin .dyt_archive:hover{color:red;opacity:1}
#dyt_admin .dyt_remind:hover{opacity:1}
#usersettings .rate,#usersettings select{opacity:.7;max-width:6em;-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s}
#usersettings .rate{opacity:.1;padding:.5em}
#usersettings .pto.rate{padding:0 3px}
#usersettings select:hover,#usersettings select:focus,#usersettings .rate:hover,#usersettings .rate:focus{opacity:1}
#set_div{float:right;max-width:49em;-webkit-transition:all 1s;-moz-transition:all 1s;transition:all 1s}
#set_div.condense{max-width:14em;max-height:4.3em;overflow:hidden;margin-right:1em;border-right:1px solid #d7e5eb;border-radius:5px;cursor:pointer}
#set_div.condense:hover{max-width:49em;border-right:unset;max-height:80vh;overflow-y:auto}
#set_div.condense th{float:left;letter-spacing:.1em;margin:-1.3em 0 0 -.8em;-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s}
#set_div.condense td{display:inline-block;opacity:.1;-webkit-transition:all .5s;-moz-transition:all .5s;transition:all .5s}
#set_div.condense:hover th{transform:unset;margin-top:unset;margin-left:unset;max-height}
#set_div.condense:hover td{opacity:1}
#set_div .dyt_control{border-left:5px solid #fff}
</style>

<div id='dyt_admin'>
  <form class='dyt_form' name='timeconfig' id='timeconfig' method='post' accept-charset='UTF-8 ISO-8859-1' action='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>&wp=0'>
    <?php echo wp_nonce_field('config_time','dyt_config_time');
    if(current_user_can('manage_options')) { ?>
    <div id='set_div' <?php if(!isset($_POST['dyt_config_time']) && $dyt_setup_mode<1 && ($user_ct>1 || $user_filter>0)) echo "class='condense'";?>>
    <table id='timesettings' class='dyt_control noprint'>
      <tr style='background:transparent;color:#1177aa'><th align='left' style='padding:.5em'><span class="dashicons dashicons-admin-generic" style='vertical-align:text-top;font-size:1.2em'></span> <?php dyt_t('Settings');?></tr>
      <tr><td style='pointer-events:none'><span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Hover for more information');?>.</td></tr>
      <tr>
        <td nowrap>
          <input type='text' name='currency' id='currency' placeholder='$' title='<?php dyt_t('Currency Symbol');?>' pattern=".{1,5}" required title="<?php dyt_t('1 to 5 characters');?>" style='max-width:5em' value='<?php if(empty($currency) || $dyt_setup_mode>0) echo '$'; else echo esc_html($currency);?>' onchange="if(this.value.length>0) dyt_config('timeconfig',this.id,this.selectedIndex);"> <?php dyt_t('Currency Symbol');?>
        </td>
      </tr>
      <tr>
        <td nowrap>
          <select name='period' id='period' onchange="<?php if($dyt_setup_mode<1 && $user_ct>1) { ?>if(!confirm('<?php dyt_t('Are you sure you want to '); dyt_t('change pay period length? Previous pay periods may require reprocessing to appear correctly. Find the reprocess button under each timecard.');?>')) {this.value='$period'; return false;}<?php } else ?>dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Select Pay Period');?>.'>
            <option value='' disabled <?php if($period==0) echo 'selected';?>><?php dyt_t('Select Pay Period');?>
            <option value='7'  <?php if($period==7 ) echo 'selected';?> title='<?php dyt_t('Pay periods are weekly (52 per year)');?>.'><?php dyt_t('Weekly Pay Period');?> &#8505;</span>
            <option value='14' <?php if($period==14) echo 'selected';?> title='<?php dyt_t('Pay periods are in two week groups (26 per year)');?>.'><?php dyt_t('BiWeekly Pay Period');?> &#8505;</span>
            <option value='15' <?php if($period==15) echo 'selected';?> title='<?php dyt_t('Pay periods are twice per calendar month (24 per year)');?>.'><?php dyt_t('Semi-Monthly Pay Period');?> &#8505;</span>
            <option value='30' <?php if($period==30) echo 'selected';?> title='<?php dyt_t('Pay periods are every calendar month (12 per year)');?>.'><?php dyt_t('Monthly Pay Period');?> &#8505;</span>
            <option value='-1' <?php if($period==-1) echo 'selected';?> title='<?php dyt_t('Pay period varies between users');?>.'><?php dyt_t('Manage Period on User Level');?> &#8505;</span>
          </select>
          <span id='period_sel' class='sel_status'><?php if($period==0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap>
          <select name='weekbegin' id='weekbegin' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Select the day a week begins');?>.'>
            <option value='' disabled <?php if($weekbegin<0) echo 'selected';?>><?php dyt_t('Select Week Begin');?> &#8505;</span>
            <option value='0' <?php if($weekbegin==0 && $dyt_setup_mode==0) echo 'selected';?>><?php dyt_t('Week Begins Sunday');?>
            <option value='1' <?php if($weekbegin==1) echo 'selected';?>><?php dyt_t('Week Begins Monday');?>
            <option value='2' <?php if($weekbegin==2) echo 'selected';?>><?php dyt_t('Week Begins Tuesday');?>
            <option value='3' <?php if($weekbegin==3) echo 'selected';?>><?php dyt_t('Week Begins Wednesday');?>
            <option value='4' <?php if($weekbegin==4) echo 'selected';?>><?php dyt_t('Week Begins Thursday');?>
            <option value='5' <?php if($weekbegin==5) echo 'selected';?>><?php dyt_t('Week Begins Friday');?>
            <option value='6' <?php if($weekbegin==6) echo 'selected';?>><?php dyt_t('Week Begins Saturday');?>
          </select>
          <span id='weekbegin_sel' class='sel_status'><?php if($weekbegin<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap>
          <select name='payroll_id' id='payroll_id' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('A supervisor receives notification when a pay period is submitted. Payroll Admin receives notification when a pay period is approved. If a supervisor is not assigned, Payroll Admin will receive both types of notifications.');?>'>
            <option value='0' disabled <?php if($payroll_id<0) echo 'selected';?> title='<?php dyt_t('A supervisor receives notification when a pay period is submitted. Payroll Admin receives notification when a pay period is approved. If a supervisor is not assigned, Payroll Admin will receive both types of notifications.');?>'><?php dyt_t('Payroll Admin');?> &#8505;</span>
            <option value='0' <?php if($payroll_id==0) echo 'selected';?>><?php dyt_t('No Notification');?>
            <?php echo dyt_user_dropdown('payroll',$payroll_id);?>
          </select>
          <span id='payroll_id_sel' class='sel_status'><?php if($payroll_id<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap>
          <select name='prompt' id='prompt' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Select a method of time entry');?>.'>
            <option value='' disabled  <?php if(strlen($prompt)==0) echo 'selected';?>><?php dyt_t('Select Entry Type');?>
            <option value='0' <?php if(strlen($prompt)>0 && $prompt==0) echo 'selected';?> title="<?php dyt_t('Multiple hour fields per day');?>."><?php dyt_t('Simple Total (recommended)');?> &#8505;</span>
            <option value='1' <?php if($prompt==1) echo 'selected';?> title="<?php dyt_t('Multiple In/Out fields per day with predictive entry');?>."><?php dyt_t('Itemized Time');?> &#8505;</span>
            <option value='3' <?php if($prompt==3) echo 'selected';?> title="<?php dyt_t('Punch In/Out Only (Only admins can manually adjust time');?>)."><?php dyt_t('Punch Only');?> &#8505;</span>
            <option value='2' <?php if($prompt==2) echo 'selected'; if($dyt_pro_version<=0) echo 'disabled'; ?> title="<?php dyt_t('Auto Entry - records time automatically (This is practical when a user is active in WordPress throughout the workday)');?>."><?php dyt_t('Auto Entry');?> (PRO) &#8505;</span>
            <option value='-1' <?php if($prompt==-1) echo 'selected';?> title='<?php dyt_t('Entry type differs between users');?>.'><?php dyt_t('Manage Entry Type on User Level');?> &#8505;</span>
          </select>
          <span id='prompt_sel' class='sel_status'><?php if(strlen($prompt)==0) echo $not_set;?></span>

          <select name='timeout' id='timeout' onchange="dyt_config('timeconfig',0,0);" style='<?php if($dyt_pro_version>0 && $prompt>1) echo "display:block;margin:.5em 0 0"; else echo "display:none"; ?>' title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">
            <option value='' disabled <?php if($timeout<0) echo 'selected';?>><?php dyt_t('Session Timeout');?> &#8505;</span>
            <option value='10' <?php if($timeout==10) echo 'selected';?>>10 minutes
            <option value='20' <?php if($timeout==20) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">20 minutes
            <option value='30' <?php if($timeout==30) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">30 minutes (recommended)
            <option value='40' <?php if($timeout==40) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">40 minutes
            <option value='60' <?php if($timeout==60) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">1 hour
            <option value='90' <?php if($timeout==90) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">1.5 hours
            <option value='120' <?php if($timeout==120) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">2 hours
            <option value='240' <?php if($timeout==240) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">4 hours
            <option value='360' <?php if($timeout==360) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">6 hours
            <option value='480' <?php if($timeout==480) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">8 hours
            <option value='600' <?php if($timeout==600) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">10 hours
            <option value='720' <?php if($timeout==720) echo 'selected';?> title="<?php dyt_t('If user inactivity in exceeds this time, Auto Entry will create an additional in/out period when activity resumes');?>.">12 hours
          </select>
        </td>
      </tr>
      <tr>
        <td nowrap>
          <select name='notes' id='notes' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Enable the option to enter notes on each time entry');?>.'>
            <option value='' disabled  <?php if($notes<0) echo 'selected';?> title='<?php dyt_t('Enable the option to enter notes on each time entry');?>.'><?php dyt_t('Select Note Display');?> &#8505;</span>
            <option value='1' <?php if($notes==1) echo 'selected';?> title="<?php dyt_t('Display optional note field');?>."><?php dyt_t('Display Notes');?> &#8505;</span>
            <option value='0' <?php if($notes==0) echo 'selected';?> title="<?php dyt_t('Hide note field');?>."><?php dyt_t('No Notes');?> &#8505;</span>
          </select>
          <span id='notes_sel' class='sel_status'><?php if($notes<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap style='border-color:transparent;border-left:5px solid gray;border-style:dotted;'>
          <select name='dropdata' id='dropdata' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Keep Data Safe will retain time entries and configuration data even if the plugin is uninstalled');?>.'>
            <option value='' disabled <?php if($dropdata<0) echo 'selected';?> title='<?php dyt_t('Keep Data Safe will retain time entries and configuration data even if the plugin is uninstalled');?>.'><?php dyt_t('Uninstall Option');?> &#8505;</span>
            <option value='0' <?php if($dropdata===0) echo 'selected';?> title='<?php dyt_t('No plugin data will be deleted');?>.'><?php dyt_t('Keep Data Safe');?> &#8505;</span>
            <option value='1' <?php if($dropdata==1) echo 'selected';?> title='<?php dyt_t('All data will be deleted on uninstall');?>.'><?php dyt_t('Delete All Plugin Data');?> &#8505;</span>
          </select>
          <span id='dropdata_sel' class='sel_status'><?php if($dropdata<0) echo $not_set;?></span>
        </td>
      </tr>
      <?php if($dyt_pro_version>0) $pro_td_style="style='border-color:transparent;border-left:5px solid #ce299e;'"; else $pro_td_style="style='border-color:transparent;border-left:5px solid #ce299e4d;'"; ?>
      <tr>
        <td nowrap <?php echo $pro_td_style;?>>
          <select name='geoloc' id='geoloc' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Geolocate Users. PRO Feature.');?>'>
            <option value='0' disabled  <?php if($geo_loc<=0 || $dyt_pro_version<=0) echo 'selected';?>><?php dyt_t('Geolocate');?> (PRO) &#8505;</span>
            <option value='1' <?php if($geo_loc==1 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?> title="<?php dyt_t('Prompt every 24 hours if location not shared');?>."><?php dyt_t('Request Geolocation');?> &#8505;</span>
            <option value='2' <?php if($geo_loc==2 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?> title="<?php dyt_t('Require location to enter time');?>."><?php dyt_t('Force Geolocation');?> &#8505;</span>
            <option value='0' <?php if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Disable Geolocation');?></span>
          </select>
          <span id='geoloc_sel' class='sel_status'><?php if($geo_loc<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap <?php echo $pro_td_style;?>>
          <select name='sigreq' id='sigreq' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Signature Pad for Employee and Supervisors. PRO Feature.');?>'>
            <option value='0' disabled  <?php if($sig_req<=0 || $dyt_pro_version<=0) echo 'selected';?>><?php dyt_t('Signature Pad');?> (PRO) &#8505;</span>
            <option value='1' <?php if($sig_req==1 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Signature Optional');?> (PRO)</span>
            <option value='2' <?php if($sig_req==2 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Require Employee Signature');?> (PRO)</span>
            <option value='3' <?php if($sig_req==3 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Require Supervisor Signature');?> (PRO)</span>
            <option value='5' <?php if($sig_req==5 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Require all Signatures');?> (PRO)</span>
            <option value='0' <?php if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Disable Signature Pad');?></span>
          </select>
          <span id='sigreq_sel' class='sel_status'><?php if($sig_req<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr>
        <td nowrap <?php echo $pro_td_style;?>>
          <select name='categoryon' id='categoryon' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Additional dropdown for categorizing time. PRO Feature.');?>'>
            <option value='0' disabled  <?php if($cat_on<=0 || $dyt_pro_version<=0) echo 'selected';?>><?php dyt_t('Categories');?> (PRO) &#8505;</span>
            <option value='1' <?php if($cat_on==1 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Enable Categories');?> (PRO)</span>
            <option value='0' <?php if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Disable Categories');?></span>
          </select>
          <span id='categoryon_sel' class='sel_status'><?php if($cat_on<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr <?php if(!$cat_on>0 || $dyt_setup_mode>0 || $dyt_pro_version<=0) echo "style='display:none'"; ?>>
        <td nowrap <?php echo $pro_td_style;?>>
          <span title="<?php dyt_t('List categories available for Reg time separated by comma or line');?>."><span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Reg Categories');?></span><textarea name='categorylist' id='categorylist' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" style='display:block;overflow:hidden scroll;width:100%;height:7em;padding:.5em' placeholder='<?php dyt_t('List Reg Categories');?>&#10;<?php dyt_t('Separate by comma or line');?>.'><?php echo esc_html(str_replace(',',"\n",$cat_list)); ?></textarea><br>
          <span title="<?php dyt_t('List categories available for PTO (Paid Time Off) separated by comma or line. PTO is not eligible for overtime');?>."><span class="dashicons dashicons-info-outline"></span> <?php dyt_t('PTO Categories');?></span><textarea name='categorylist_pto' id='categorylist_pto' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" style='display:block;overflow:hidden scroll;width:100%;height:7em;padding:.5em;<?php if($pto_split>=0) echo "pointer-events:none;opacity:.5;"; ?>' placeholder='<?php dyt_t('List PTO Categories');?>&#10;<?php dyt_t('Separate by comma or line');?>.&#10;<?php dyt_t('PTO is not eligible for overtime');?>.'><?php echo esc_html(str_replace(',',"\n",$cat_list_pto)); ?></textarea><?php if($pto_split>=0) dyt_t('Disable PTO Multiple Banks to edit'); echo '<br>';?>
        </td>
      </tr>
      <tr>
        <td nowrap <?php echo $pro_td_style;?>>
          <select name='custom_ot' id='custom_ot' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);" title='<?php dyt_t('Trigger overtime by setting a custom day or week limit. PRO Feature.');?>'>
            <option value='0' disabled  <?php if($custom_ot<=0) echo 'selected';?>><?php dyt_t('Custom Overtime');?> (PRO) &#8505;</span>
            <option value='1' <?php if($custom_ot==1 && $dyt_pro_version>0) echo 'selected'; if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Enable Custom Overtime');?> (PRO)</span>
            <option value='0' <?php if($dyt_pro_version<=0) echo ' disabled';?>><?php dyt_t('Disable Custom Overtime');?></span>
          </select>
          <span id='custom_ot_sel' class='sel_status'><?php if($custom_ot<0) echo $not_set;?></span>
        </td>
      </tr>
      <tr <?php if($custom_ot<=0 || $dyt_setup_mode>0 || $dyt_pro_version<=0) echo "style='display:none'"; ?>>
        <td nowrap <?php echo $pro_td_style;?>>
          <div><b><?php dyt_t('Custom Overtime');?></b></div>
          <div style='background:#f5f8fd;border:1px solid #aaa;border-radius:3px;padding:1em'>
            <input type='number' name='ot_min_dy' id='ot_min_dy' title='<?php dyt_t('Min Day OT');?>' step='.25' min='1' max='24' required style='max-width:5em;margin:.25em 0' value='<?php echo esc_html($ot_min_dy);?>' onchange="if(this.value>0) dyt_config('timeconfig',this.id,this.selectedIndex);"> 
            <span title='<?php dyt_t('Hours worked over this threshold qualify as overtime');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Min Hours per Day');?></span><br>
            <input type='number' name='ot_min_wk' id='ot_min_wk' title='<?php dyt_t('Min Week OT');?>' step='.25' min='1' max='99' required style='max-width:5em;margin:.25em 0' value='<?php echo esc_html($ot_min_wk);?>' onchange="if(this.value>0) dyt_config('timeconfig',this.id,this.selectedIndex);"> 
            <span title='<?php dyt_t('Hours worked over this threshold qualify as overtime');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Min Hours per Week');?></span><br>
            <input type='number' name='ot_multip' id='ot_multip' title='<?php dyt_t('OT Multiplier');?>' step='.25' min='1' max='3' required style='max-width:5em;margin:.25em 0' value='<?php echo esc_html($ot_multip);?>' onchange="if(this.value>0) dyt_config('timeconfig',this.id,this.selectedIndex);"> 
            <span title='<?php dyt_t('Hourly rate multiplier for hours worked overtime');?>.'> <span class="dashicons dashicons-info-outline"></span><?php dyt_t('Overtime Wage Multiplier');?></span>
          </div>
        </td>
        <span id='ot_min_dy_sel' class='sel_status'><?php if($ot_min_dy<0) echo $not_set;?></span>
      </tr>
      <tr <?php if($dyt_pro_version<=0) echo "style='display:none'"; ?>>
        <td nowrap <?php echo $pro_td_style;?>>
          <div><b><?php dyt_t('PTO Behavior');?></b></div>
          <div style='background:#f5f8fd;border:1px solid #aaa;border-radius:3px;padding:1em'>
            <div <?php if($pto_split>=0) echo "style='display:none;'"; ?>>
              <input type='number' name='pto_default' id='pto_default' title='<?php dyt_t('PTO Default Hours per Year for new employees');?>' step='.25' min='1' max='999' required style='max-width:5em;margin:.25em 0' value='<?php echo esc_html($pto_default);?>' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);"> 
              <span title='<?php dyt_t('PTO Default Hours per Calendar Year for new employees');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('PTO per Year');?></span>
            </div>

            <?php $pto_cat=''; $i=0;
              echo '<div>';
              if($pto_split>=0 && !empty($cat_list_pto)) {
              $pto_array=explode(',',$cat_list_pto); 
              foreach($pto_array as $pto_cat) { ?>
                <input type='number' name='pto_bank[]' step='.25' min='1' max='999' style='max-width:5em;margin:.25em 0' value='<?php if(isset($pto_bank[$i])) echo $pto_bank[$i];?>'> <?php echo $pto_cat;?>
                <span title='<?php dyt_t('PTO Default Hours per Calendar Year for new employees');?>.'> <span class="dashicons dashicons-info-outline"></span>
                <br><?php
                $i++;
              }
              echo '</div>';
            } ?>

            <div style='margin:1em 0 .5em;<?php if(!$pto_default>0 && empty($pto_cat)) echo "display:none";?>' >
              <input type='checkbox' name='pto_update' id='pto_update' title='<?php dyt_t('Update PTO');?>' onchange="if(this.checked && confirm('<?php dyt_t('Are you sure you want to '); dyt_t('update PTO for all employees that have no current PTO allowance?');?>')) dyt_config('timeconfig','',''); else this.checked=false;"> 
              <span title='<?php dyt_t('Update PTO for all employees that have no current PTO allowance');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Update PTO Now');?></span>
            </div>

            <div style='margin:1em 0 .5em'>
              <input type='checkbox' name='pto_split_ck' id='pto_split_ck' title='<?php dyt_t('PTO Multiple Banks');?>' <?php if($pto_split>=0) echo 'checked';?> onchange="if(this.checked) pto_split.value=1; else pto_split.value=-1; dyt_config('timeconfig','','');"> 
              <span title='<?php dyt_t('Separate banks for each PTO category');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('PTO Multiple Banks');?></span>
              <input type='hidden' name='pto_split' id='pto_split' value='<?php echo esc_html($pto_split);?>';>
            </div>

            <div style='margin:1em 0 .5em'>
              <input type='checkbox' name='pto_accrue_ck' id='pto_accrue_ck' title='<?php dyt_t('Automatic PTO Accrual');?>' <?php if($pto_accrue>=0) echo 'checked';?> onchange="if(this.checked) pto_accrue.value=1; else pto_accrue.value=-1; dyt_config('timeconfig','','');"> 
              <span title='<?php dyt_t('Accrues PTO based on first and last time entry per calendar year. Unchecking this makes all PTO available up front');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('PTO Automatic Accrual');?></span>
              <input type='hidden' name='pto_accrue' id='pto_accrue' value='<?php echo esc_html($pto_accrue);?>';>
            </div>
          </div>
        </td>
        <span id='ot_min_dy_sel' class='sel_status'><?php if($ot_min_dy<0) echo $not_set;?></span>
      </tr>
      <tr>
        <td nowrap>
          <div><b><?php dyt_t('Entry Defaults');?></b></div>
          <div style='background:#fff;border:1px solid #aaa;border-radius:3px;padding:1em'>
            <div style='display:<?php if($prompt<=0 || $prompt==3) echo 'block'; else echo 'none';?>'>
              <input type='number' name='df_hr' id='df_hr' title='<?php dyt_t('Default Hours per Day');?>' step='1' min='1' max='23' required style='max-width:5em;margin:.25em 0' value='<?php echo esc_html($df_hr);?>' onchange="if(this.value>0) dyt_config('timeconfig',this.id,this.selectedIndex);"> 
              <span title='<?php dyt_t('Default hours per day for simple total entry setting');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Default Hours');?></span><br>
            </div>
            <div style='display:<?php if($prompt!=0 && $prompt!=3) echo 'block'; else echo 'none';?>'>
              <input type='time' name='df_in' id='df_in' title='<?php dyt_t('Default Time In');?>.' step='60' required style='margin:.25em 0' value='<?php echo esc_html($df_in);?>' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);"> 
              <span title='<?php dyt_t('Default time-in for itemized entry setting');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Default Time In');?></span><br>
              <input type='time' name='df_out' id='df_out' title='<?php dyt_t('Default Time Out');?>.' step='60' required style='margin:.25em 0' value='<?php echo esc_html($df_out);?>' onchange="dyt_config('timeconfig',this.id,this.selectedIndex);"> 
              <span title='<?php dyt_t('Default time-out for itemized entry setting');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Default Time Out');?></span>
            </div>
            <div style='margin:1em 0 .5em'>
              <input type='checkbox' name='predict_ck' id='predict_ck' title='<?php dyt_t('Predictive Entry');?>' <?php if($predict>0) echo 'checked';?> onchange="if(this.checked) predict.value=1; else predict.value=-1; dyt_config('timeconfig','','');"> 
              <span title='<?php dyt_t('Predictive entry takes precedence over entry defaults, and is based on historical entries per user');?>.'> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Predictive Entry');?></span>
              <input type='hidden' name='predict' id='predict' value='<?php echo esc_html($predict);?>';>
            </div>
          </div>
          <input type='button' value='<?php dyt_t('Save');?>' onclick="dyt_config('timeconfig','','');" class='button' style='background:#fff;margin-top:1em'>
        </td>
        <span id='df_in_sel' class='sel_status'><?php if($df_in<0) echo $not_set;?></span>
      </tr>
    </table>
    </div>
    <?php }

    if($dyt_setup_mode==0) { ?>
    <input type='hidden' name='hide_survey' id='hide_survey' value=<?php if($hide_survey==1) echo 1; else echo 0; ?>>
    <?php } ?>
  </form>

  <div id='dyt_diag' class='dyt_control dyt_expand noprint' style='float:right'>
    <span style='color:#1177aa;font-weight:bold'><span class="dashicons dashicons-admin-tools"></span> <?php dyt_t('Support');?></span>
    <a onclick="dyt_expand('dyt_diag');" style='text-decoration:none;float:right'><span class="dashicons dashicons-dismiss"></span></a><hr>
    <br>
    <div id='dyt_diag_data'>
      <b><?php dyt_t('Configuration');?></b><br>
      Host <?php echo esc_html($_SERVER['HTTP_HOST'].'@'.$_SERVER['SERVER_ADDR']); ?><br>
      Path <?php echo esc_html(substr(plugin_dir_path( __FILE__ ),-33));?><br>
      WP <?php echo esc_html($wp_version); if(is_multisite()) echo 'multi'; echo ', '.$dyt_loc; ?><br>
      PHP <?php echo phpversion();?><br>
      MYSQL <?php echo esc_html($mysql_version); if(!empty($config_mode)) echo esc_html($config_mode); ?><br>
      Theme <?php $pt=wp_get_theme(get_template()); echo esc_html($pt->Name.' '.$pt->Version); $ct=wp_get_theme(); if($pt->Name!==$ct->Name) echo esc_html(', '.$ct->Name.' '.$ct->Version);?><br>
      Dynamic Time <?php echo esc_html($dyt_version.' '.$dyt_version_type.' '.$dyt_pro_version); ?><br>
      Dynamic Time db <?php echo esc_html($dyt_db_version);?><br>
      <br>
      <b><?php dyt_t('Settings');?></b><br>
      Setup Mode <?php echo esc_html($dyt_setup_mode);?><br>
      Currency <?php echo esc_html($currency);?><br>
      Period <?php echo esc_html($period);?><br>
      Week Begin <?php echo esc_html($weekbegin);?><br>
      Payroll <?php echo esc_html($payroll_id);?><br>
      Prompt <?php echo esc_html($prompt);?><br>
      Notes <?php echo esc_html($notes);?><br>
      Lock <?php echo esc_html(get_option('dyt_cal_lk'));?><br>
      Drop Data <?php echo esc_html($dropdata);?><br>
      Geo Loc <?php echo esc_html($geo_loc);?><br>
      Sig Pad <?php echo esc_html($sig_req);?><br>
      Reg Cats <?php echo esc_html($cat_on); echo esc_html('('.count(explode(',',$cat_list)).')'); ?><br>
      PTO Cats <?php echo esc_html($cat_on); echo esc_html('('.count(explode(',',$cat_list_pto)).')'); ?><br>
      PTO Bank <?php print_r($pto_default); echo 'Split:'.esc_html($pto_split); echo ': '; if(isset($pto_bank)) print_r($pto_bank); ?><br>
      PTO Accrue <?php echo esc_html($pto_accrue); ?><br>
      Custom OT <?php echo esc_html($custom_ot); echo esc_html("($ot_min_dy / $ot_min_wk / $ot_multip)"); ?><br>
      Defaults <?php echo esc_html($custom_ot); echo esc_html("($df_hr / $df_in / $df_out / $predict)"); ?><br>
      Users <?php echo esc_html($user_ct);?><br>
      Sups <?php echo esc_html($sup_ct);?><br>
    </div>
    <br>
    <a class='dyt_link caps' href="https://richardlerma.com/contact/?imsg=" target='_blank' onclick="this.href+=append_diag('dyt_diag_data');"><?php dyt_t('Contact Support');?></a>
  </div>

  <div id='dyt_pro' class='dyt_control dyt_expand noprint' style='float:right'>
    Get <span class='caps'>Dynamic Time <span class='pro'>Pro</span></span><span class="dashicons dashicons-chart-line" style='color:#b71b8a;vertical-align:text-bottom'></span>
    <a onclick="dyt_expand('dyt_pro');" style='text-decoration:none;float:right'><span class="dashicons dashicons-dismiss"></span></a><hr>
    <br>
      <strong><?php dyt_t('Subscription Features');?></strong>
      <ul style='padding:unset;color:#888'>
        <li><b><?php dyt_t('PTO Bank');?></b> <?php dyt_t('with accruals');?>
        <li><b><?php dyt_t('Custom Categories');?></b> <?php dyt_t('with dropdown');?>
        <li><b><?php dyt_t('Signature Pad');?></b> <?php dyt_t('for approvals');?>
        <li><b><?php dyt_t('CSV Export');?></b> <?php dyt_t('compatible with Excel');?>
        <li><b><?php dyt_t('Filter and Total');?></b> <?php dyt_t('time entries');?>
        <li><b><?php dyt_t('Dedicated Support');?></b> <?php dyt_t('by email');?>
      </ul><br>

    <?php if(function_exists('dyt_pro_activate')) {
      if(function_exists('dyt_pro')) { ?>
        <div class='attn caps' style='font-weight:normal;cursor:pointer;text-align:center;padding-right:2.5em' onclick="dyt_expand('dyt_pro');"><span class='dashicons dashicons-yes' style='vertical-align:top'></span> <?php dyt_t('Active');?></div>
        <input type='button' class='button' value='<?php dyt_t('Manage Subscription');?>' onclick="window.open('https://www.paypal.com/myaccount/autopay/','_blank');">
      <?php } ?>
      <input type='button' class='button' value='<?php dyt_t('Check for Updates');?>' style='margin-top:1em' onclick="window.location.href='<?php echo get_admin_url(null,'admin.php?page=dynamic-time&pro_update=1');?>';">
    <?php 
    }
    if($dyt_pro_version<=0) { ?><a class='dyt_link caps' style='margin-top:1em' href="https://dynamictime.net" target='_blank'><?php dyt_t('Learn More');?></a><br><?php } ?>
  </div>

  <div id='dyt_setup' class='dyt_control dyt_expand noprint' style='float:left'>
    <span style='color:#0073AA;font-weight:bold'><span class="dashicons dashicons-admin-plugins"></span> <?php dyt_t('Get Started');?></span>
    <a onclick="alert('<?php dyt_t("Setup instructions will persistently display until more than one user has a recent time entry.");?>'); dyt_expand('dyt_setup');" style='text-decoration:none;float:right'><span class="dashicons dashicons-dismiss"></span></a><hr>
    <ul style='margin-left:1em'>
      <li><span class='setup_order'>&#10112;</span> <?php dyt_t("Customize your organization's setup in");?> <b><?php dyt_t('Settings');?></b>.
      <li><span class='setup_order'>&#10113;</span> <select style='border:1px solid #c7daec;color:gray' onchange="window.location.href='<?php echo str_replace('&amp;','&',wp_nonce_url(get_admin_url(null,'admin.php?page=dynamic-time'),'view_user','dyt_view_user'));?>&dyt_user='+this.options[this.selectedIndex].value;"><option selected disabled><?php dyt_t('Open a timesheet');?><?php echo dyt_user_dropdown('setup',0);?></select> <?php dyt_t('Press save. Users must save a time period to appear in');?> <b><?php dyt_t('Entries');?></b>.
      <li><span class='setup_order'>&#10114;</span> <?php dyt_t('Refresh');?> <a href='#!' onclick="if(window.location.href.indexOf('dyt_view_user')>0) window.location='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>'; else location.reload(true);" title='<?php dyt_t('Refresh');?>'><span style='opacity:.5' class="spin dashicons dashicons-update"></span></a> <?php dyt_t('to see your new entry');?>.
      <li title='<?php dyt_t('Employees will only see their timesheet on this page. Only Administrators and assigned Supervisors can see other employee timesheets.');?>'><span class='setup_order'>&#10115;</span> <?php dyt_t('Privileges are automatic');?> <span class="dashicons dashicons-info-outline"></span> <?php dyt_t('Only WordPress admins see all employees');?>.
      <li><span class='setup_order'>&#10116;</span> <?php dyt_t('Employee-access shortcode');?> <span class="dashicons dashicons-info-outline"></span> <a id='dyt_shortcode' style='display:inline-block;font-weight:bold;color:#999' title='<?php dyt_t('Click to copy');?>.&#013;<?php dyt_t('When published, the shortcode will automatically redirect to the login form if a user is not logged in. Leave max_width=true for the best page fit. Change max_width=false for native page width.');?>' href='#!' onclick="dyt_copy(this.id,this.id);"> [dynamicTime max_width=true]</a>
      <li><span class='setup_order'>&#10117;</span> <?php dyt_t('On mobile, employees can click the browser Share icon and select \'Add to Home Screen\' so it appears just like an app on the device');?>.
    </ul>
    <div style='font-size:.8em;padding:1em'><span class="dashicons dashicons-format-status"></span> <?php dyt_t('Need help?');?> <?php dyt_t('View');?> <a href='#dyt_admin' onclick="dyt_expand('dyt_diag');"><?php dyt_t('Support');?></a></div>
  </div>

  <?php if($dyt_pro_version>0 && (current_user_can('edit_posts')||current_user_can('moderate_comments')) && function_exists('dyt_pro')) @dyt_pro($prompt,$notes,$cat_on); 
    if($user_ct>0 || $dyt_setup_mode<1) { ?>
    <table id='usersettings' cellspacing='0' cellpadding='0' class='dyt_control noprint'>
      <tr style='background:transparent'>
        <th colspan='<?php $cols=7; if($period<0) $cols++; if($prompt<0) $cols++; if($dyt_pro_version>0) $cols++; echo $cols; ?>' align='left' style=''>
          <span class="dashicons dashicons-clock" style='vertical-align:middle;font-size:1.3em'></span> <?php dyt_t('Entries');?> &nbsp;
          <form style='display:inline' method='post' accept-charset='UTF-8 ISO-8859-1' action='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>'>
            <?php if($user_filter<1) {?><input type='search' id='userSearch' placeholder='Filter Users' style='height:2em;min-width:20em;font-size:.9em;border:none;font-weight:normal'><?php } ?>
            <select style='height:2em;min-width:20em;font-size:.9em;border:none;font-weight:normal' id='userSelect' name='user_filter' onchange="<?php if($user_ct>=20) echo "if(this.value<0) if(!confirm('".dyt_t('All users may take a while to load. Continue?',1)."')) {this.value=0;return false;}";?>this.form.submit();">
              <option value='0' selected><?php dyt_t('Recently Active');?>
              <option value='-1' <?php if($user_ct<20 && $user_filter<0) echo 'selected'; ?>><?php dyt_t('Display All');?>
              <?php echo dyt_user_dropdown('user',$user_filter);?>
            </select>
         <input type='hidden' name='user_ct' value='<?php echo $user_ct;?>'>
          </form><hr>
        </th>
        <th><a href='#!' onclick="if(window.location.href.indexOf('dyt_view_user')>0) window.location='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>'; else location.reload(true);" title='<?php dyt_t('Refresh');?>'><span style='float:right;opacity:.5;margin:-1.5em -1em 0 0' class="spin dashicons dashicons-update"></span></a></th>
      </tr>
      
      <tr>
        <th class='col_name' style='border-radius:3px 0 0;'><?php dyt_t('Name');?></th>
        <th class='col_name dyt_rate'><?php dyt_t('Rate');?></th>
        <?php if((!empty($pto_default) || !empty($pto_accrue)) && function_exists('dyt_pro')) {?><th class='col_name dyt_pto' title='<?php dyt_t('Enter annual PTO in hours. Accruals are prorated from the first time entry this year to the last time entry this year');?>.'><?php dyt_t('PTO');?><span class='dashicons dashicons-info-outline' style='font-size:1.3em;vertical-align:top;'></span></th><?php } ?>
        <th class='col_name'><?php dyt_t('Status');?></th><?php 
        if($prompt<0) { ?><th class='col_name'><?php dyt_t('Entry Type');?></th><?php } 
        if($period<0) { ?><th class='col_name'><?php dyt_t('Period');?></th><?php } ?>
        <th class='col_name'><?php dyt_t('Supervisor');?></th>
        <th class='col_name'><?php dyt_t('Submitted');?></th>
        <th class='col_name'><?php dyt_t('Approved');?></th>
        <th class='col_name'><?php dyt_t('Processed');?></th>
        <th class='col_name' align='right' style='min-width:70px;border-radius:0 3px 0 0;'><?php dyt_t('View');?></th>
      </tr><?php 

    $row_id=1; 
    foreach($get_users as $row) {
      if(strpos($row->name,'[wp ')!==false) $disabled="class='dyt_disable'"; else $disabled='';
      $uname=$row->name;
      $sname=$row->supervisor_name;
      $uid=$row->WP_UserID;
      $sid=$row->supervisor_id;
      $cid=dyt_userid();
      if($cid!=$sid && $cid!=$uid && !current_user_can('list_users')) continue;
      if(strpos($uname,'@')!==false) $uname=substr($uname,0,strpos($uname,'@'));
      if(strpos($sname,'@')!==false) $sname=substr($sname,0,strpos($sname,'@'));
      $uname=dyt_username($uname); if($uid>0 && !empty($row->email)) update_option("dyt_nm_$uid",$uname,'no');
      $sname=dyt_username($sname); if($sid>0 && !empty($row->supervisor_email)) update_option("dyt_nm_$sid",$sname,'no');
      $u_exempt=$row->Exempt;
      $u_prompt=$row->Prompt;
      $df_period=$row->df_period;
      $u_period=$row->Period; ?>

      <form class='form' name='userconfig' id='userconfig<?php echo esc_attr($uid);?>' method='post' accept-charset='UTF-8 ISO-8859-1' action='<?php echo get_admin_url(null,'admin.php?page=dynamic-time');?>&wp=0'>
        <?php echo wp_nonce_field('config_user','dyt_config_user');?>
        <input type='hidden' name='wp_userid' value='<?php echo esc_attr($uid);?>'>
        <tr class='<?php if($row_id % 2===0) echo 'odd'; else echo 'even';?>'>

          <td nowrap>
            <?php if(empty($row->email)) { ?>
              <input type='hidden' name='archive_user' value=0>
              <a href='#!' class='dyt_archive' title='<?php dyt_t('Archive');?>' onclick="if(confirm('<?php dyt_t('Are you sure you want to '); dyt_t('archive this user?');?>\n\n<?php dyt_t('Archived user data is only accessible by direct database access, or CSV Export in PRO');?>.')) {this.previousElementSibling.value=1; this.parentElement.parentElement.style.background='indianred'; dyt_config('userconfig<?php echo esc_attr($uid);?>');} else return false;">
                <span class="dashicons dashicons-remove"></span> &nbsp; 
              </a>
            <?php } else { 
              if(current_user_can('edit_users')) {?><a title="<?php dyt_t('Edit Account');?>" style='opacity:.3' target='_blank' href='../wp-admin/user-edit.php?user_id=<?php echo esc_attr($uid);?>' <?php echo esc_html($disabled);?>> &#128100;</a> &nbsp;<?php } ?>
              <input type='hidden' name='uname' value="<?php echo $uname;?>">
              <input type='hidden' name='sname' value="<?php echo $sname;?>">
              <input type='hidden' name='remind_u' value=0>
              <a href='#!' class='dyt_remind' title='Remind User' <?php echo esc_html($disabled);?> onclick="if(confirm('<?php dyt_t('Are you sure you want to '); dyt_t('remind this user?');?>')) {this.previousElementSibling.value=1; this.parentElement.parentElement.style.background='lightgreen'; dyt_config('userconfig<?php echo esc_attr($uid);?>');} else return false;">
                <span class='dashicons dashicons-bell'></span>
              </a>
            <?php } ?>
            <a title="<?php dyt_t('View Timecard');?>" style='font-size:1.2em' class='view' <?php echo esc_html($disabled);?> onclick="dyt_switchScreen('<?php echo esc_attr($uid);?>');"><?php echo esc_attr($uname);?></a>
          </td>

          <td nowrap class='dyt_rate'>
            <?php if(!$row->Rate>0) echo "<span title='".dyt_t('Hourly Rate')."'>&#9888;</span>"; else  echo esc_html($currency); if($currency=='$') $mxr='999'; else $mxr='9999'; ?>
            <input type='number' <?php if($cid==$uid && !current_user_can('list_users')) echo "style='pointer-events:none'"; ?> required step='0.01' min='0' max='<?php echo esc_attr($mxr);?>' value='<?php echo esc_attr($row->Rate);?>' name='rate' class='rate' placeholder='<?php dyt_t('Hourly Rate');?>' onchange="dyt_config('userconfig<?php echo esc_attr($uid);?>');">
          </td>

          <?php if(isset($row->PTO) && function_exists('dyt_pro')) {
            $pto_val=unserialize($row->PTO);
            echo "<td nowrap class='dyt_pto'>";

            if($pto_split>=0 && is_array($pto_val)) { 
              $i=0;
              $pto_array=explode(',',$cat_list_pto); 
              foreach($pto_val as $u_pto) { ?>
                <input type='number' title='<?php dyt_t('Annual PTO Hours');?>' <?php if($cid==$uid && !current_user_can('list_users')) echo "style='pointer-events:none'"; ?> required step='0.5' min='0' max='999' value='<?php echo $u_pto;?>' name='pto_array[]' class='pto rate' placeholder='<?php dyt_t('PTO');?>' onchange="dyt_config('userconfig<?php echo esc_attr($uid);?>');"> <?php echo $pto_array[$i];?>
                <br><?php
                $i++;
              }
            } else {
              if(is_array($pto_val)) $row->PTO=''; ?>
              <input type='number' title='<?php dyt_t('Annual PTO Hours');?>' <?php if($cid==$uid && !current_user_can('list_users')) echo "style='pointer-events:none'"; ?> required step='0.5' min='0' max='999' value='<?php echo esc_attr($row->PTO);?>' name='pto' class='rate' placeholder='<?php dyt_t('PTO');?>' onchange="dyt_config('userconfig<?php echo esc_attr($uid);?>');"><?php 
            }
            echo '</td>';
          } ?>
            
          <td nowrap>
            <?php if(!isset($u_exempt)) echo "<span title='".dyt_t('Select Status')."'>&#9888;</span>";?>
            <select required name='exempt' onchange="dyt_config('userconfig<?php echo esc_attr($uid);?>');">
              <option disabled  <?php if(!isset($u_exempt)) echo 'selected';?>><?php dyt_t('Select Status');?>
              <option value='0' <?php if($u_exempt===0) echo 'selected';?> title='<?php dyt_t('Time and a half for hours worked in excess of 40/week');?>.'><?php dyt_t('Overtime Eligible');?> (USA)
              <option value='-1' <?php if($u_exempt==-1) echo 'selected';?> title='<?php dyt_t('Time and a half for hours worked in excess of 8/day OR 40/week');?>.'><?php dyt_t('Overtime Eligible');?> (California)
              <option value='-2' <?php if($u_exempt==-2) echo "selected title='Time * $ot_multip ".dyt_t('for hours worked in excess of')." $ot_min_dy/day OR $ot_min_wk/week.'"; elseif($custom_ot<1 || $dyt_pro_version<=0) echo 'disabled'; ?> ><?php dyt_t('Custom Overtime');?> (PRO)
              <option value='1' <?php if($u_exempt==1) echo 'selected';?> title='<?php dyt_t('Not overtime eligible');?>'><?php dyt_t('Exempt');?>
            </select>
          </td><?php 

          if($prompt<0) { ?>
            <td nowrap>
              <?php if(!isset($u_prompt)) {?><span title='<?php dyt_t('Select Entry Type');?>'>&#9888;</span><?php } ?>
              <select name='user_prompt' id='user_prompt' onchange="<?php if($dyt_setup_mode<1 && $user_ct>1) echo "if(!confirm('".dyt_t('Are you sure you want to ',1).dyt_t('change entry type for this user?',1)."')) {this.value='".esc_attr($u_prompt)."'; return false;} else";?> dyt_config('userconfig<?php echo esc_attr($uid);?>');">
                <option value='' disabled  <?php if($u_prompt<0) echo 'selected';?>><?php dyt_t('Select Entry Type');?>
                <option value='0' <?php if($u_prompt==0) echo 'selected';?> title="<?php dyt_t('One total field per day');?>."><?php dyt_t('Simple');?>
                <option value='1' <?php if($u_prompt==1) echo 'selected';?> title="<?php dyt_t('Multiple In/Out fields per day with predictive entry');?>."><?php dyt_t('Itemized');?>
                <option value='3' <?php if($u_prompt==3) echo 'selected';?> title="<?php dyt_t('Punch In/Out Only (Only admins can manually adjust time)');?>."><?php dyt_t('Punch Only');?>
                <option value='2' <?php if($u_prompt==2) echo 'selected'; if($dyt_pro_version<=0) echo 'disabled'; ?> title="<?php dyt_t('Auto Entry - records time automatically (This is practical when a user is active in WordPress throughout the workday)');?>."><?php dyt_t('Auto Entry');?> (PRO)
              </select>
            </td><?php 
          }

          if($period<0) { ?>
            <td nowrap>
              <?php if(!isset($u_period)) {echo "<span title='".dyt_t('Select Pay Period')."'>&#9888;</span>"; $u_period=$df_period;}?>
              <select name='user_period' id='user_period' onchange="<?php if($dyt_setup_mode<1 && $user_ct>1) echo "if(!confirm('".dyt_t('Are you sure you want to ',1).dyt_t('change pay period length? Previous pay periods may require reprocessing to appear correctly. Find the reprocess button under each timecard.',1)."')) {this.value='".$u_period."'; return false;} else";?> dyt_config('userconfig<?php echo esc_attr($uid);?>');">
                <option value='' disabled><?php dyt_t('Select Pay Period');?>
                <option value='7'  <?php if($u_period==7 ) echo 'selected';?> title='<?php dyt_t('Pay periods are every week (52 per year)');?>.'><?php dyt_t('Weekly Pay Period');?>
                <option value='14' <?php if($u_period==14) echo 'selected';?> title='<?php dyt_t('Pay periods are in two week groups (26 per year)');?>.'><?php dyt_t('BiWeekly Pay Period');?>
                <option value='15' <?php if($u_period==15) echo 'selected';?> title='<?php dyt_t('Pay periods are twice per calendar month (24 per year)');?>.'><?php dyt_t('Semi-Monthly Pay Period');?>
                <option value='30' <?php if($u_period==30) echo 'selected';?> title='<?php dyt_t('Pay periods are every calendar month (12 per year)');?>.'><?php dyt_t('Monthly Pay Period');?>
              </select>
            </td><?php 
          } ?>

          <td nowrap>
            <select value='<?php echo esc_attr($sid);?>' <?php if(!current_user_can('list_users')) echo "style='pointer-events:none'"; else echo "onchange=\"dyt_config('userconfig$uid');\"";?> name='supervisor_id' title="<?php echo esc_attr($sname);?>">
              <option value='0' disabled title='<?php dyt_t('A supervisor will receive notification when a pay period is submitted');?>.'><?php dyt_t('Supervisor');?>
              <option value='0' <?php if(!$sid>0) echo 'selected';?>><?php dyt_t('None');?>
              <?php echo dyt_user_dropdown('supervisor',$sid);?>
            </select>
          </td>

          <td nowrap align='right'><a class='view' onclick="dyt_switchScreen('<?php echo esc_attr($uid);?>');"><?php echo $row->Submitted;?></a></td>
          <td nowrap align='center'><?php if(!empty($row->Submitted) && empty($row->Approved) && !empty($sname)) { ?>
            <input type='hidden' name='remind_s' value=0>
            <a href='#!' class='dyt_remind' title='Remind Supervisor' onclick="if(confirm('<?php dyt_t('Are you sure you want to '); dyt_t('remind this supervisor?');?>')) {this.previousElementSibling.value=1; this.parentElement.parentElement.style.background='lightgreen'; dyt_config('userconfig<?php echo esc_attr($uid);?>');} else return false;">
              <span class='dashicons dashicons-bell'></span>
            </a>
           <?php } else echo "<a class='view' onclick=\"dyt_switchScreen('".esc_attr($uid)."');\">".$row->Approved;?></a></td>
          <td nowrap align='right'><a class='view' onclick="dyt_switchScreen('<?php echo esc_attr($uid);?>');"><?php echo $row->Processed;?></a></td>
          <td align='right'><a title='<?php dyt_t('View Timecard');?>' class='view budge' style='font-size:2em;' onclick="dyt_switchScreen('<?php echo esc_attr($uid);?>');">&#10162;</a></td>
        </tr>
      </form><?php 
      $row_id++;
    }} else echo "<style>#usersettings{display:none}</style>"; ?>
  </table>

  <?php if($dyt_setup_mode==0 && $user_ct>2 && $hide_survey!=1) { ?>
    <div class='clear'></div>
    <div id='dyt_survey' class='dyt_control noprint'>
      <a onclick="
        if(!confirm('Permanently hide the Review prompt?')) return;
        if(dyt_getE('hide_survey')) {
          if(dyt_getE('hide_survey').value==1) dyt_getE('hide_survey').value=0;
          else dyt_getE('hide_survey').value=1;
        }
        if(dyt_getE('timeconfig')) dyt_getE('timeconfig').submit();">
      <span style='text-decoration:none;float:right' class="dashicons dashicons-dismiss"></span>
      </a>
      <div class='caps'><?php dyt_t('Liking Dynamic Time?');?></div>
      <a href='https://wordpress.org/support/plugin/dynamic-time/reviews/#new-post' style='color:#ffb900;text-decoration:none' target='_blank'>
        <div style='margin:.5em 0 1.5em 0;color:#ffb900'>
          <span style='color:#ccc;font-size:.8em'><?php dyt_t('Leave a Quick Review');?></span><br>
          <span class="dashicons dashicons-star-filled"></span>
          <span class="dashicons dashicons-star-filled"></span>
          <span class="dashicons dashicons-star-filled"></span>
          <span class="dashicons dashicons-star-filled"></span>
          <span class="dashicons dashicons-star-filled"></span>
        </div>
      </a>
      <?php dyt_t('Have a question or concern?');?><br><br>
      <a href='#!' class='dyt_link caps' onclick="dyt_expand('dyt_diag');dyt_survey.style.display='none';"><?php dyt_t('open support menu');?></a>
    <?php } ?>
  </div>

<script type='text/javascript'>
  var terms_clicked=cal_expired=0;
  var dyt_user='<?php echo esc_attr($dyt_user);?>';<?php 
  if($dyt_pro_version>0) {$pro=get_option('dyt_pro'); if($pro=='new') update_option('dyt_pro','yes','no');} else $pro='no';
  if($pro=='new' || ($dyt_pro_version<=0 && isset($_GET['updated']) && function_exists('gzcompress'))) { ?>
    var dyt_version_Interval=setInterval(function() {
      if(document.readyState==='complete') {clearInterval(dyt_version_Interval);dyt_expand('dyt_pro');window.location.hash='#dyt_pro';}
    },200);<?php 
  }

  if(!$dyt_user>0 && ($dyt_setup_mode>0 || ($user_ct<2 && $user_filter<=0))) { ?>
    var dyt_setup_Interval=setInterval(function() {
      if(document.readyState==='complete') {clearInterval(dyt_setup_Interval);dyt_expand('dyt_setup');}
    },200);
  <?php } ?>

  if('<?php echo $input_saved;?>'>0) {
    save_msg=dyt_getE('input_saved');
    save_msg.style.opacity=1;
    save_msg.style.display='block';
    save_msg.innerHTML='<?php dyt_t('Saved');?>';
    setTimeout(function(){save_msg.style.opacity=0;},2000);
    setTimeout(function(){save_msg.style.display='none';},3000);
  }
  function dyt_getE(e) {return document.getElementById(e);}

  function dyt_switchScreen(screen) {
    var setup_mode='<?php if($user_ct<2 || $dyt_setup_mode>0) echo 1; else echo 0;?>';
    var user;
    if(screen!='dyt_admin') {user=screen; screen='dyt_cal_admin';}
    if((cal_expired>0 || dyt_user!=user) && screen=='dyt_cal_admin') {
      dyt_config('userconfig');
      var url="<?php echo str_replace('&amp;','&',wp_nonce_url(get_admin_url(null,'admin.php?page=dynamic-time'),'view_user','dyt_view_user')); ?>";
      window.location=url+"&dyt_user="+user;
      return;
    }
    if(sum_updated>0 && screen=='dyt_admin') if(!confirm('<?php dyt_t('Exit without saving changes?');?>')) return false;
    dyt_getE('dyt_cal_admin').style.opacity='0';
    dyt_getE('dyt_admin').style.opacity='0';
    setTimeout(function(){
      dyt_getE('dyt_return').style.display='none';
      dyt_getE('dyt_cal_admin').style.display='none';
      dyt_getE('dyt_admin').style.display='none';
    },100);
    
    setTimeout(function(){
      dyt_getE(screen).style.display='block';
      if(screen=='dyt_cal_admin')dyt_getE('dyt_return').style.display='block';
      else if(setup_mode>0) dyt_expand('dyt_setup');
      setTimeout(function(){dyt_getE(screen).style.opacity='1';},100);
    },101);
  }

  function dyt_config(fid,sid,sel_index) {
    var setup_mode='<?php echo esc_attr($dyt_setup_mode);?>';
    if(fid=='timeconfig') {
      if(sel_index>0 && sid.length>0) dyt_getE(sid+'_sel').innerHTML='&#10004';
      if(dyt_getE('timeconfig').innerHTML.indexOf('Not Set')!=-1) return false;
    }
    dyt_getE('dyt_admin').style.opacity='.3';
    
    if(dyt_getE('dyt_head')) var dyt_head=dyt_getE('dyt_head');
    if(dyt_head) dyt_head.innerHTML=dyt_head.innerHTML+"<progress id='loading' style='float:left;width:100%;' max='100'></progress>";
    if(setup_mode>0) { setTimeout(function(){ if(dyt_getE(fid)) dyt_getE(fid).submit(); },2000);}
    else if(dyt_getE(fid)) dyt_getE(fid).submit();
  }

  function dyt_copy(content_id,button_id) {
    dyt_getE(button_id).disabled=true;
    var contents=dyt_getE(content_id).innerHTML;
    
    if(contents.indexOf('&#9986;')>0) return false;
    var tmpEl;
    var copy_temp='copy_temp'+Math.floor((Math.random()*1000)+1);
    
    tmpEl=document.createElement(copy_temp);
    tmpEl.style.opacity=0;
    tmpEl.style.position="absolute";
    tmpEl.style.pointerEvents="none";
    tmpEl.style.zIndex=-1;
    tmpEl.innerHTML=contents;
    document.body.appendChild(tmpEl);

    var range=document.createRange();
    range.selectNode(tmpEl);
    
    var w=window.getSelection();
    if(w.rangeCount>0) w.removeAllRanges();
    w.addRange(range);

    if(!document.execCommand("copy")) {
      alert('<?php dyt_t('Unable to auto-copy this content.\nPlease copy this content manually.');?>');
      return false;
    }
    document.body.removeChild(tmpEl);
    
    var confirm="<div class='caps' style='position:absolute;background:#17A;color:#DDD;padding:2em;border-radius:3px;box-shadow:0px 3px 5px #888;z-index:99'>&#9986; <?php dyt_t('Copied to clipboard!');?></div>";
    var opaque="<div style='opacity:.3;height:100%;width:100%;'>"+contents+"</div>";
    
    dyt_getE(content_id).innerHTML=confirm+opaque;
    
    setTimeout(function(){
      dyt_getE(content_id).innerHTML=contents;
      dyt_getE(button_id).disabled=false;
    },2000);
  }

  function dyt_expand(id) {
    if(!dyt_getE(id)) return false;
    var is_admin=1; if(dyt_getE('dyt_return')) {if(dyt_getE('dyt_return').style.display!='none') is_admin=0;}
    var target=dyt_getE(id);
    if(is_admin==0) dyt_switchScreen('dyt_admin');
    if(target.style.opacity==1 && is_admin==0) {target.style.opacity='0'; dyt_expand(id); return;}
    if(target.style.opacity!=1) {
      target.style.display='block';
      setTimeout(function(){
        target.style.opacity='1';
        target.style.maxHeight='99em';
        target.style.padding=target.style.overflow='';
      },10);
    } else {
      target.style.maxHeight=target.style.opacity=target.style.padding='0';
      target.style.overflow='none';
      setTimeout(function(){target.style.display='none';},500);
    }
  }

  function append_diag(diag) {
    var d=dyt_getE(diag).innerHTML;
    d=d.replace(/  /g,'');
    d=d.replace(/(\r\n|\r|\n)/g,'%0A');
    d=d.replace(/<\/?[^>]+(>|$)/g,'');
    return '<?php dyt_t('Type your inquiry here');?>%0A%0A%0ADiagnostics follow:%0A-------------%0A'+d;
  }
  
  function filterUserRows(){
    var s=userSearch.value.toLowerCase();
    document.querySelectorAll('#usersettings tr:not(:has(th))')
    .forEach(r=>{var n=r.querySelector('td:first-child .view')?.textContent.toLowerCase()||'';Object.assign(r.style,n.includes(s)?{opacity:'1',position:'',height:'',visibility:'visible'}:{opacity:'0',position:'absolute',height:'0',visibility:'hidden'});});
  }
  if(dyt_getE('userSearch')) {
    userSearch.oninput=filterUserRows;
    userSearch.onkeypress=e=>{if(e.key==='Enter')e.preventDefault()};
  }
</script>