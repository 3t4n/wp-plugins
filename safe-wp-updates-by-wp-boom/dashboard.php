<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 //$options['spawned'] = [];
//$options['spawned']['dev_site']['progress'][] = "Finished";
//$options['api']['valid'] = 0;
//update_option('safeupdates_options',$options);

$wp_cli_problem = false;
$root_files = [];
$wpcli_response = [];
$wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
if($exec_enabled){
    // checking for wp-cli
    if(!$wp_cli_command){
        $wp_cli_problem = true;
    } else {
        $cmd = "{$wp_cli_command} cli info --format=json";
    
        @exec( $cmd,$wpcli_response);
        if($cmd && !$wpcli_response){
            @exec($cmd,$wpcli_response);
        }
        $test_wpcli =  implode('',(array)$wpcli_response);
        
        $wp_cli_json = json_decode($test_wpcli,true);
        $wp_cli_version = "";
        if(array_key_exists("wp_cli_version",(array)$wp_cli_json)){
            $wp_cli_version = $wp_cli_json['wp_cli_version'];
        } else {
            $wp_cli_problem = true;
        }
    }
    
}


    
$wpboom_error = false;
$cron_enabled = true; // dont think cron is needed for this

$has_sites = false;
$has_pages = 0;

$user = wp_get_current_user();

$database_size = $wpdb->get_var($wpdb->prepare("SELECT SUM(data_length + index_length) / 1024 / 1024 AS size_in_mb FROM information_schema.TABLES WHERE table_schema = %s GROUP BY table_schema",DB_NAME)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

$home_url = rtrim(get_home_url(),"/");

$dev_prefix = "";
if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){
    $dev_prefix  = array_key_first($options['spawned']);
    $data = $options['spawned'][$dev_prefix];
} else {
    $data = [];
}
$dev_url = $home_url."/".$dev_prefix;
$excluded_files = ["readme.html","xmlrpc.php","index.php","license.txt","cookie.txt","error_log",$dev_prefix];

$ls_root_files = glob(ABSPATH."*");

if($ls_root_files){
    
    foreach($ls_root_files as $file_or_folder){
        if(substr(basename($file_or_folder),0,3) == "wp-" || in_array(basename($file_or_folder),$excluded_files)){ continue; } //skip core
        if(is_dir($file_or_folder)){
            delete_transient('dirsize_cache');
            $fsize = SafeWPUpdates_Lib::format_filesize(get_dirsize($file_or_folder));
            $root_files[] = array("path" => $file_or_folder, "size" => $fsize);
        } else {
            $fsize =  SafeWPUpdates_Lib::format_filesize(filesize($file_or_folder));
            $root_files[] = array("path" =>  $file_or_folder, "size" => $fsize);
        }
        
    }
   
    
}
if(array_key_exists("api",$options)){
    $api = $options['api'];
    if($api && array_key_exists('data',$api)){
        if(array_key_exists('sites',$api['data'])){
            if($api['data']['sites']){
                $has_sites = true;
                $wpboom_dev_url = $api['data']['sites'][0]['dev_url'];
                $wpboom_url = rtrim($api['data']['sites'][0]['url'],"/");
                $wpboom_prefix = end(explode("/",rtrim($wpboom_dev_url,"/")));
            }
        }
        if(array_key_exists('snapshots',$api['data'])){
            if($api['data']['snapshots']){
                $has_pages = count((array)$api['data']['snapshots'][0]);
              
            }
        }  
    }
} else {
    $api = [];
}
if(!array_key_exists('login',$options)){
    $options['login'] = "-";
}


$spawn_in_progress = false;

$scheduled = null;
if($data && $data['progress'] && array_reverse($data['progress'])[0] != "Finished"){
    $spawn_in_progress = true;
} else {
    if($options && is_array($options['pending_actions']) && array_key_exists('pending_actions',$options)){
        $args = $options['pending_actions'];
        //$args = ['spawn',$_POST['site_name'],($include_uploads)?1:0,($update_plugins)?1:0,($skip_database)?1:0,true];
        $scheduled = wp_next_scheduled( 'safeupdates_cron_ajax', $args);
        
        
        
        
    }
}

if($wp_cli_version){ ?><span class="badge text-muted">WP-CLI version: <?php echo wp_kses_post($wp_cli_json['wp_cli_version']); ?></span><?php } ?>



<?php include(WPBOOM_PLUGIN_DIR . 'templates/modals.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php if($options['account_type'] == 'dev'){ ?>
        <div class="col-sm-12">
            <p class="text-danger bg-dark text-center h2 mt-2">DEV MODE</p>
        </div>
        <?php } ?>
        <div class="col-lg-12">
           
            <div class=" wp-hero text-light p-5 text-center  rounded-0">
                
                <h1 class="text-light h1">Are you afraid to update WordPress because it might break your site?</h1>
                <!-- <h4 class="text-center fw-bold fs-4 my-4">WP BOOM will alert you if updates cause visual changes to your sites.</h4> -->
                <h4 class="text-center fw-bold fs-4 my-4">WP Boom ensures your site updates are seamless and stress-free.</h4>
            </div>
            
        </div>
        
        <?php include(WPBOOM_PLUGIN_DIR . 'templates/alerts.php'); ?>
        <?php if(!$spawn_in_progress){ ?>
        <?php include(WPBOOM_PLUGIN_DIR . 'templates/top.php'); ?>
        <?php } ?>
        <?php if(1){ ?>
        
      
        
        
        <div class="col-lg-12">
            <?php if($wp_cli_installed && $exec_enabled && $cron_enabled){ ?>   
            <?php include(WPBOOM_PLUGIN_DIR . 'templates/site.php'); ?>
            <?php } ?>
            <?php if(!$spawn_in_progress){ ?>
            <?php include(WPBOOM_PLUGIN_DIR . 'templates/pages.php'); ?>
            <?php } ?>
            
        </div>
        <?php } ?>
        
        
      
      
        
       
        
        
       

       
        
    </div>
</div>

