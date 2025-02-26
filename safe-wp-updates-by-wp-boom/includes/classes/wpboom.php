<?php
/*
 * Main class of Safe Updates by WPBoom
 */

class SafeWPUpdates {
    
    protected static $instance = null; // object exemplar reference  
    
    // plugin specific library object: common code stuff, including options data processor
    protected $lib = null;
    
    
    protected $SafeWPUpdates_scan_targets = null;
    
    public static function get_instance( $options_id = '') {
        if ( self::$instance===null ) {        
            self::$instance = new SafeWPUpdates( $options_id );
        }
        
        return self::$instance;
    }
    
    
    //$folders = SafeWPUpdates_Lib::dir_tree(ABSPATH . 'wp-content/plugins');
   
    function __construct() {
       
       
    }
    
    public static function init() {

        global $pagenow, $SafeWPUpdates_scan_targets, $wp_contents_folders,$SafeWPUpdates_colors;
      
        $SafeWPUpdates_scan_targets = [
            'wp-content',
            'wp-content/uploads',
            'wp-content/plugins',
            'wp-content/mu-plugins',
            'wp-content/themes',
            'wp-content/cache',
            'wp-admin',
            'wp-includes',
    
        ];
        $SafeWPUpdates_colors = ["red","purple","orange","indigo","blue","yellow","green","teal","cyan","gray","black"];
        
        
       
    }

    public static function settings() {
        //do settings stuff here
                
    }

   
    
   
   
    public static function admin_load_js() {
       $screen = get_current_screen();
      
        wp_enqueue_script( 'password-strength-meter' );
        wp_enqueue_script( 'heartbeat' );
        wp_localize_script( 'password-strength-meter', 'pwsL10n', array(
            'empty' => 'Password Strength',
            'tooshort' => 'Too Short',
            'short' => 'Very Weak',
            'bad' => 'Weak' ,
            'good' => 'Medium',
            'strong' => 'Strong',
            'mismatch' => 'Mismatch' 
        ));
        
       
        $user = json_decode(wp_json_encode(wp_get_current_user()->data),true);
        unset($user['user_pass']);
        $options = get_option('safeupdates_options');
        if($options){
            $user['safeupdates_account_type'] = $options['account_type'];
            if(array_key_exists('api',$options)){
                $user['api'] = $options['api'];
            }
           
            $spawned = [];
            if(array_key_exists('spawned',$options)){
                foreach($options['spawned'] as $prefix=>$spawn){
                    $spawned[] = $prefix;
                
                }
            }
        }
        
        
        wp_enqueue_style('wpboom-fa-fontawesome', WPBOOM_PLUGIN_URL . 'css/fontawesome/css/fontawesome.css', [], "6.6.0",false, 'screen');
        wp_enqueue_style('wpboom-fa-all', WPBOOM_PLUGIN_URL . 'css/fontawesome/css/all.css', [], "6.6.0",false, 'screen');
        wp_enqueue_style('wpboom-fa-solid', WPBOOM_PLUGIN_URL . 'css/fontawesome/css/solid.css', [], "6.6.0",false, 'screen');
        wp_enqueue_style('wpboom-fa-brands', WPBOOM_PLUGIN_URL . 'css/fontawesome/css/brands.css', [], "6.6.0", false, 'screen');
       
        if("toplevel_page_safeupdates_dashboard" == $screen->id){
            wp_enqueue_style('wpboom-animate-css',  WPBOOM_PLUGIN_URL . 'css/animate.min.css',[],'4.1.1',false,'screen');
            wp_enqueue_script('wpboom-bootstrap-js', WPBOOM_PLUGIN_URL . 'js/bootstrap.bundle.min.js', [], "5.3.2", true);
            wp_enqueue_script('wpboom-swal2-js', WPBOOM_PLUGIN_URL . 'js/swal2.min.js', [], "11.14.1", true);
            wp_enqueue_script('wpboom-main-js', WPBOOM_PLUGIN_URL . 'js/wpboom.js?version='.time(), ["jquery"], "1.3.1", true);
            wp_enqueue_style('wpboom-bootstrap-css',  WPBOOM_PLUGIN_URL . 'css/bootstrap.min.css',[],'5.3.3',false,'screen');
            wp_enqueue_style('wpboom-bootstrap-docs-css', WPBOOM_PLUGIN_URL . 'css/bootstrap.docs.css', [], "5.3.3", false, 'screen');
            wp_enqueue_style('wpboom-admin-css', WPBOOM_PLUGIN_URL . 'css/wpboom-admin.css', [], "1.3.1",false, 'screen');
            wp_localize_script( 'wpboom-main-js', 'boomvars', array(
                'boom_url' =>  WPBOOM_URL,
                'spawns' => ($spawned)?$spawned:[],
                'user' => $user,
                '_wpnonce' => wp_create_nonce('safeupdates-ajax')
            ) );
        }
        
        if(defined('WPBOOM_COPY')){
            $upload_paths = wp_upload_dir();
            $include_uploads = 0;

            if(!defined('UPLOADS')){ //file_exists($upload_paths['basedir']) && 
                $include_uploads = 1;
            }
            wp_localize_script( 'wpboom-main-js', 'wpboom', ['WPBOOM_COPY' => WPBOOM_COPY, 'include_uploads' => $include_uploads] );
        }
       
    }



    public static function update_spawn_options($prefix,$key,$value,$push = false,$response = []){
        $options = get_option('safeupdates_options');
        if(empty($value)){
            unset($options['spawned'][$prefix][$key]);
        } else {
            if($push){
                $options['spawned'][$prefix][$key][] = ($response)?$response:$value;
            } else {
                $options['spawned'][$prefix][$key] = $value;
            }
            
        }
        update_option( 'safeupdates_options', $options); 
    }


    public static function dev_site_exists($prefix){
        $prefix = preg_replace('/[^a-zA-Z0-9 ]/m','',$prefix);
        $prefix =  preg_replace('/[\W_]+/m',' ',$prefix);
        $prefix = preg_replace('/\s/m','_',$prefix);
        $prefix = strtolower($prefix);
        $path = ABSPATH . $prefix;
        if(file_exists($path)){
           return $prefix;
        }
        return false;
    }
    
    // spawn => wp cron event schedule wpboom_cron_ajax  '+30 second' --0=spawn --1= --2=1 --3=1 --4=0  --5=true // WORKS!
    // gettables => apply_filters('safeupdates_cron_ajax','gettables',$prefix,$include_uploads,$update_plugins,$skip_database,true);
    // finishsetup => wp cron event schedule wpboom_cron_ajax  '+30 second' --0=finishsetup --1= --2=1 --3=1 --4=0  --5=true // WORKS!


    
    public static function safeupdates_ajax($method='',$prefix='',$include_uploads=0,$update_plugins=0,$skip_database=0,$is_cron = false) {
        global $wpdb;
        if(! class_exists('WP_Filesystem_Direct')){
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
        }
        $WP_Filesystem_Direct = new WP_Filesystem_Direct(false);
        if(!$is_cron){
            check_ajax_referer( 'safeupdates-ajax' );
            //https://developer.wordpress.org/apis/security/sanitizing/
            
           
            //list($site_name,$method,$include_uploads,$update_plugins,$skip_database) = ["","",0,0,0];
            if(isset($_POST['site_name']) && $_POST['site_name'] !== ''){
                $site_name = sanitize_text_field(wp_unslash($_POST['site_name']));
            }
            if(isset($_POST['method']) && $_POST['method'] !== ''){
                $method = sanitize_text_field(wp_unslash($_POST['method']));
            }
            if(isset($_POST['include_uploads']) && $_POST['include_uploads'] !== ''){
                $include_uploads = (int)$_POST['include_uploads'];
            }
            if(isset($_POST['update_plugins']) && $_POST['update_plugins'] !== ''){
                $update_plugins = (int)$_POST['update_plugins'];
            }
            if(isset($_POST['skip_database']) && $_POST['skip_database'] !== ''){
                $skip_database = (int)$_POST['skip_database'];
            }
            if(isset($_POST['prefix']) && $_POST['prefix'] !== ''){
                $prefix = sanitize_text_field(wp_unslash($_POST['prefix']));
            }
            if(isset($_POST['api_token']) && $_POST['api_token'] !== ''){
                $api_token = sanitize_text_field(wp_unslash($_POST['api_token']));
            }
            if(isset($_POST['plugin_name']) && $_POST['plugin_name'] !== ''){
                $plugin_name = sanitize_text_field(wp_unslash($_POST['plugin_name']));
            }
            if(isset($_POST['login']) && $_POST['login'] !== ''){
                $login = sanitize_text_field(wp_unslash($_POST['login']));
            }
           
            
           
        } 
        $options = get_option('safeupdates_options',[]);
        if(!$method) {
            exit;
        }
        $response_data = "";
        switch($method){
            case 'snapshot_requested':
                $options['pending_actions'] = 'snapshot_requested';
                if($api_token){
                    $options['api']['token'] = $api_token;
                    $options['api']['valid'] = true;
                   
                }
                $response = "success";
                update_option( 'safeupdates_options', $options);
                break;
            case 'snapshot_error':
                $options['pending_actions'] = 'ready';
                
                $response = "success";
                update_option( 'safeupdates_options', $options);
                break;
            case 'update_api':
                $options['pending_actions'] = $pending_actions;
                update_option('safeupdates_options',$options);
                $options['account_type'] = "registered";
               
                $options = safeupdates_update_token($api_token,true);
                
                if($login){
                    $options['login'] = $login;
                }
                $response = "success";
                update_option('safeupdates_options',$options);
               
                break;
            case 'list_plugins':
                $path = ABSPATH . $prefix;
                if(file_exists($path)){
                    $wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
                
                    @exec("cd {$path};{$wp_cli_command} plugin list --fields=name,status,update,version,update_version,update_package,update_id,title,description,file --format=json",$message);
                    $message = wp_json_encode(json_decode($message[0],true));
                    $response = "success";
                } else {
                    $response = "error";
                    $message = "The dev site '{$prefix}' cannot be found.";
                }
                break;
            case 'update_plugin':
                $path = ABSPATH . $prefix;
                $wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
                
                
                @exec("cd {$path};{$wp_cli_command} plugin update {$plugin_name} --format=json",$message);
                
                if(count($message) > 1){
                    $message = wp_json_encode(json_decode($message[1],true)[0]);
                } else {
                    $message = wp_json_encode(json_decode($message[0],true)[0]); 
                }
                
                $response = "success";
                $response_data = gmdate("Y-m-d H:i:s");
                $options['spawned'][$prefix]['updated'] = $response_data;
                update_option( 'safeupdates_options', $options);
                break;
            case "repair":
                $queries = $options['spawned'][$prefix]['queries'];
                $identifiers = $options['spawned'][$prefix]['identifiers'];
                $wp_prefix = $wpdb->prefix;
                $new_prefix = $prefix."_";
               
                foreach($identifiers as $source_table){
                    $target_table = substr_replace($source_table,$new_prefix,0,strlen($wp_prefix));
                    // Direct database call required to check for table existence.
                    $table_exists  =  $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s;",$target_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
                    
                    if(!$table_exists){
                        $wpdb->query($wpdb->prepare("OPTIMIZE TABLE %i",$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
                        $wpdb->query($wpdb->prepare("CREATE TABLE %i LIKE %i",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange
                        $wpdb->query($wpdb->prepare("INSERT INTO %i SELECT * from  %i",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
                    }
                  
                }
                $cmd1 = $options['spawned'][$prefix]['commands'][3];
                $cmd2 = $options['spawned'][$prefix]['commands'][4];
                @exec($cmd1);
                @exec($cmd2);
                $response = "success";
                break;
            case "cron":
               
                if($message = self::dev_site_exists($site_name)){
                    $response = "error";
                    $message = "The site name '{$message}' already exists. Please enter a different name.";
                    break;
                }
                set_transient("wpboom_exclude_from_copy",$excluded);
                self::update_spawn_options($prefix,'excluded',$excluded,true);
                //https://developer.wordpress.org/plugins/cron/scheduling-wp-cron-events/
                $args = ['spawn',$site_name,($include_uploads)?1:0,($update_plugins)?1:0,($skip_database)?1:0,true];
                
                // just in case, we can store the args for the scheduler just so that we know we did schedule it
                // because on some sites that instance is missed on a reload
                $options['pending_actions'] = $args;
                update_option( 'safeupdates_options', $options);
                if ( ! wp_next_scheduled( 'safeupdates_cron_ajax', $args ) ) {
                    $event = wp_schedule_single_event( time() + 5, 'safeupdates_cron_ajax', $args);
                }
                $wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
                sleep(1);
                // this command doesnt have to be run
                // but it will help sync the spawn on the next reload as it should be in progress
                // cron can be triggered manually with wget -q -O - https://domain.com/wp-cron.php?doing_wp_cron >/dev/null 2>&1
                //@exec("{$wp_cli_command} wp cron event run wpboom_cron_ajax");
                $response = "success";
               
                
                $message = $event;
                break;
            case "save_pages":
                $options['spawned'][$prefix]['pages'] = [];
                $options['spawned'][$prefix]['snapshots'] = [];
                foreach($pages as $page){
                    $options['spawned'][$prefix]['pages'][] = $page;
                    $options['spawned'][$prefix]['snapshots'][$page] = [
                        "ref"=>["src"=>null,"date"=>null],
                        "img"=>["src"=>null,"date"=>null],
                        "diff"=>["src"=>null,"date"=>null,"percent"=>-1]
                    ];
                }
                update_option( 'safeupdates_options', $options); 
                $response = "success";
                $message = count((array)$options['spawned'][$prefix]['pages']);
                break;
            case "get_pages":
                
                $response = "success";
                if($single_page){
                    foreach($options['spawned'][$prefix]['pages'] as $page){
                        if($page == $single_page){
                            $message = [$page];
                            break;
                        }
                    }
                } else {
                    $message = $options['spawned'][$prefix]['pages'];
                }
                
                break;

                
                
            case "status":
                $date = new DateTime();
                $timeZone = $date->getTimezone();
                $url = get_home_url()."/{$prefix}/wp-json?no-cache=".time();
                $json = wp_remote_post($url,
                    array(
                        'method'      => 'GET',
                        'timeout'     => 60,
                        'body'        => array()
                    )
                );
                $path = ABSPATH . $prefix;
                $cmd = 'find '. $path .' -type f  \( -iname "*.*" ! -iname "*.log" ! -iname ".*" \) -printf \'%TY-%Tm-%Td %TH:%TM %Tz\t%p\n\'| sort -n';
                                      
                @exec($cmd,$result);
                $result = array_reverse($result);
                $result = explode("\t",$result[0]);
                $modified = gmdate ("M d Y H:i", strtotime($result[0])) .' ' . $timeZone->getName() . '<br>' . str_replace($path,'',$result[1]);
                $size = SafeWPUpdates_Lib::get_used_disk_space($path );

                $response_object = $json['http_response']->get_response_object();
                if(basename($response_object->url) == "install.php"){
                    $json['response']['code'] = "tables";
                    $json['response']['message'] = "Tables did not install correctly. <button class='btn btn-primary btn-repair d-none' data-queries='".wp_json_encode($options['spawned'][$prefix]['queries'])."'>Repair Tables</button>";
                }
                
                $status_message =  $json['response']['message'];
                if($json['response']['code'] == 500) {
                    $error_log = @exec("tail -n 50 " . ABSPATH . $prefix . "/error_log",$result);
                    $error_log =  implode("\n",$result);
                    $status_message = "The server responded with 500 Internal Server Error. This is indication that something is broken. If you recently updated the plugins, this is the likely cause.";
                    if($error_log){
                        $status_message .= ' This is a portion of the error_log:<pre style="color: black;background: white;padding: 5px;width: 500px;height: 250px;white-space: break-spaces;">'.$error_log.'</pre>';
                    }
                }
               
                $response = ["code" => $json['response']['code'], "message" =>  $status_message, 'modified' => $modified, "size" => $size];
                break;
            case "progress":
                $message = array_reverse($options['spawned'][$prefix]['progress'])[0];
                if($message == "Finished"){
                    // since we received a finished message we can ready the system for snapshots
                    $options['pending_actions'] = "ready";
                    update_option( 'safeupdates_options', $options);
                }
                 
                break;
            case "spawn":
                $site_name = $prefix;
                //$prefix = self::uniqidReal(8).WPBOOM_SITE_SUFFIX;
                $prefix = preg_replace('/[^a-zA-Z0-9 ]/m','',$prefix);
                $prefix =  preg_replace('/[\W_]+/m',' ',$prefix);
                $prefix = preg_replace('/\s/m','_',$prefix);
                $prefix = strtolower($prefix);
                $path = ABSPATH . $prefix;
                if(!file_exists($path)){
                    $spawned = [];
                    if(array_key_exists('spawned',$options)){
                        $spawned =  $options['spawned'];
                    }
                    
                    $spawned[$prefix] = ['update_plugins' => $update_plugins, 'include_uploads' => $include_uploads , 'skip_database' => $skip_database ];
                    $spawned[$prefix]['site_name'] = $site_name;
                    $options['spawned'] = $spawned;
                    update_option( 'safeupdates_options', $options);   
                    if ($is_cron) {
                        // we can chain all methods that would trigger during a cron
                        self::update_spawn_options($prefix,'progress','Copying Files',true);
                    }
                    $line_count = SafeWPUpdates_Lib::make_dev_site($path,$prefix,$include_uploads,$is_cron);
                    $parameters = "";
                    if($include_uploads){
                        $parameters = "<div class='badge bd-red-700 text-white rounded-1 p-1'>Include Uploads</div><br>";
                    }
                    if($update_plugins){
                        $parameters .= "<div class='badge bd-red-800 text-white rounded-1 p-1'>Update Plugins/Themes</div>";
                    }
                    if($skip_database){
                        $parameters .= "<div class='badge bd-red-900 text-white rounded-1 p-1'>Skip Database</div>";
                    }
                   
                    $response =  '<tr id="'.$prefix.'" class="animate__animated animate__faster animate__backInDown">
                    <td class="text-center"><button class="btn btn-sm btn-outline-danger rounded-5 px-1 " onclick="deleteSite(\''.$prefix.'\')" ><span class="dashicons dashicons-trash"></span></button></td><td valign="middle" align="center" class="site_thumb"><div class="d-none  spinner-border" role="status">
                    </div></td><th><a class="d-block" href="/'.$prefix.'" target="_blank">'.$prefix.'</a>'.$parameters.'</th>
                        <td class="site_size"><span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <em>Pending...</em></td>
                        <td data-modified="'.$prefix.'">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Pending...</span>
                        </td>
                       
                        <td data-site_status="'.$prefix.'">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Pending...</span>
                        </td>
                    </tr>';
                    $message =  $line_count;
                } else {
                    $response = "error";
                    $message = "The site name '{$site_name}' already exists. Please enter a different name.";
                }
                if ($is_cron) {
                    // we can chain all methods that would trigger during a cron
                    if(!$skip_database){
                        $identifiers =  SafeWPUpdates_Lib::get_dev_tables($prefix,$include_uploads,$skip_database);
                        $queries = [];
                        self::update_spawn_options($prefix,'progress','Creating Tables',true);
                        /*
                        foreach($table_queries as $query){
                            self::update_spawn_options($prefix,'progress',$query,true);
                            $safe_query = $wpdb->prepare($query);
                            $wpdb->query($safe_query); 
                            sleep(1);
                        }
                        */
                        $wp_prefix = $wpdb->prefix;
                        $new_prefix = $prefix."_";
                        foreach($identifiers as $source_table){
                           
                            $target_table = substr_replace($source_table,$new_prefix,0,strlen($wp_prefix));
                           
                            $query = "OPTIMIZE TABLE {$source_table}; -- using IDENTIFIERS";
                            $queries[] = $query;
                            self::update_spawn_options($prefix,'progress',$query,true);
                            $wpdb->query($wpdb->prepare("OPTIMIZE TABLE %i;",$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange

                            $query = "CREATE TABLE {$target_table} LIKE {$source_table}; -- using IDENTIFIERS";
                            $queries[] = $query;
                            self::update_spawn_options($prefix,'progress',$query,true);
                            $wpdb->query($wpdb->prepare("CREATE TABLE %i LIKE %i;",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange

                            $query = "INSERT INTO  {$target_table} SELECT * FROM {$source_table}; -- using IDENTIFIERS";
                            $queries[] = $query;
                            self::update_spawn_options($prefix,'progress',$query,true);
                            $wpdb->query($wpdb->prepare("INSERT INTO %i SELECT * FROM  %i;",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
                            sleep(1);
                        }
                        SafeWPUpdates::update_spawn_options($prefix,'queries',$queries);
                        sleep(10); // give it some time to sink in
                        self::update_spawn_options($prefix,'progress','Modifying Config',true);
                        $response =  apply_filters('safeupdates_cron_ajax','deletecopyprogress',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                        
                        if($update_plugins){
                            self::update_spawn_options($prefix,'progress','Updating Plugins',true);
                            $response =  apply_filters('safeupdates_cron_ajax','updateplugins',$prefix,$include_uploads,$update_plugins,$skip_database.[],true);
                            
                            self::update_spawn_options($prefix,'progress','Updating Themes',true);
                            $response =  apply_filters('safeupdates_cron_ajax','updatethemes',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                            
                            $response =  apply_filters('safeupdates_cron_ajax','deleteupdateprogress',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                            
                            
                        }
                       
                    } else {
                        self::update_spawn_options($prefix,'progress','Modifying Config',true);
                        $table_queries =  SafeWPUpdates_Lib::get_dev_tables($prefix,$include_uploads,$skip_database);
                        $response =  apply_filters('safeupdates_cron_ajax','deletecopyprogress',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                        self::update_spawn_options($prefix,'progress','Performing Install',true);
                        $response =  apply_filters('safeupdates_cron_ajax','finishsetup',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                        
                    }
                    //self::update_spawn_options($prefix,'progress','Taking Screenshot',true);
                    //$response =  apply_filters('safeupdates_cron_ajax','screenshot',$prefix,$include_uploads,$update_plugins,$skip_database,true);
                    self::update_spawn_options($prefix,'progress','Finished',true);
                    return;
                    
                }
                break;
            case "despawn":
                $spawned =  $options['spawned'];
                if(array_key_exists($prefix,(array)$spawned) && !empty($prefix)){
                    
                    $path = ABSPATH . $prefix;
                   
                    if(file_exists($path)){
                        SafeWPUpdates_Lib::__rmdir($path);
                        SafeWPUpdates_Lib::delete_dev_tables($prefix);
                        unset($spawned[$prefix]);
                        $options['spawned'] = $spawned;
                        update_option( 'safeupdates_options', $options); 
                        $folder = wp_upload_dir()['basedir']."/".$prefix;
                        SafeWPUpdates_Lib::__rmdir($folder);
                        $response = "success";
                        
                    } else {
                        unset($spawned[$prefix]);
                        $options['spawned'] = $spawned;
                        update_option( 'safeupdates_options', $options);
                        $response = "error";
                        $message = "Folder not found: ". $prefix;
                    }
                } else {
                    $response = "error";
                    $message = "Data not found: ". $prefix;
                }
              
                if($include_uploads === "uninstall"){
                    return true;
                }
                
                break;
            case "copyprogress":
                $cmd = "cat ".ABSPATH.$prefix.".progress";
                @exec($cmd,$result);
                $message =  @exec($cmd . ' | wc -l');
                $response = implode("\n",$result);
                if ($is_cron) {
                    return $message;
                }
                break;
             case "deletecopyprogress":
                $WP_Filesystem_Direct->chmod(ABSPATH.$prefix,0755);
                wp_delete_file(ABSPATH."{$prefix}.progress");
                wp_delete_file(ABSPATH."{$prefix}/{$prefix}.progress");
                if(!$skip_database){
                    $wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
                    $cmd = "{$wp_cli_command} --path=".ABSPATH."{$prefix} search-replace '{$wpdb->prefix}' '{$prefix}_' {$prefix}_options {$prefix}_usermeta";
                    @exec($cmd);
                    
                    self::update_spawn_options($prefix,'commands',$cmd,true);
                    $domain = basename(get_home_url());
                    $cmd = "{$wp_cli_command} --path=".ABSPATH."{$prefix} search-replace '{$domain}' '{$domain}/{$prefix}'";
                    self::update_spawn_options($prefix,'commands',$cmd,true);
                    @exec($cmd);
                }
                
                $response = "success";
                if ($is_cron) {
                    return $response;
                }
                break;
            case "updateprogress":
                $cmd = "cat ".ABSPATH.$prefix."/update.progress";
                $message = $cmd;
                @exec($cmd,$result);
                $response = implode("\n",$result);
                break;
            case "deleteupdateprogress":
                wp_delete_file(ABSPATH."{$prefix}/update.progress");   
                $response = "success";
                if ($is_cron) {
                    return $response;
                }
                break;
            case "gettables":
                $path = ABSPATH . $prefix;
                wp_delete_file(ABSPATH."{$prefix}.progress");
                wp_delete_file($path . "/update.progress");   
                $WP_Filesystem_Direct->chmod($path,0755);
                $response = SafeWPUpdates_Lib::get_dev_tables($prefix,$include_uploads,$skip_database);
                
                break;
            case "createtables":
                $queries = $options['spawned'][$prefix]['queries'];
                $identifiers = $options['spawned'][$prefix]['identifiers'];
                $wp_prefix = $wpdb->prefix;
                $new_prefix = $prefix."_";
               
                foreach($identifiers as $source_table){
                    $target_table = substr_replace($source_table,$new_prefix,0,strlen($wp_prefix));
                    $existing =  $wpdb->get_results($wpdb->prepare("SHOW TABLES LIKE %s;",$target_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange
                    
                    if(!$existing){
                        $wpdb->query($wpdb->prepare("OPTIMIZE TABLE %i",$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange
                        $wpdb->query($wpdb->prepare("CREATE TABLE %i LIKE %i",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange
                        $wpdb->query($wpdb->prepare("INSERT INTO %i SELECT * from  %i",$target_table,$source_table)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange, 	WordPress.DB.DirectDatabaseQuery.SchemaChange
                    }
                  
                }
                $cmd1 = $options['spawned'][$prefix]['commands'][3];
                $cmd2 = $options['spawned'][$prefix]['commands'][4];
                @exec($cmd1);
                @exec($cmd2);
                $response = "success";
                break;
            case "updateplugins":
                $response = SafeWPUpdates_Lib::update_plugins($prefix,$is_cron);
                if ($is_cron) {
                    return $response;
                }
                break;
            case "updatethemes":
                $response = SafeWPUpdates_Lib::update_themes($prefix,$is_cron);
                if ($is_cron) {
                    return $response;
                }
                break;
            case "finishsetup":
                break;
                if(!$admin_username = get_users('role=Administrator')[0]->user_login){
                    $admin_username = "admin";
                }
                if(!$admin_email = get_users('role=Administrator')[0]->user_email){
                    $admin_email = get_option( 'admin_email' );
                }
                
                $admin_password = wp_generate_password(12);
                $args = array(
                    "weblog_title" => get_bloginfo(),
                    "user_name" => $admin_username,
                    "admin_password" => $admin_password,
                    "admin_password2" => $admin_password,
                    "admin_email" => $admin_email,
                    "language" => "en",
                    "Submit" => "Install WordPress"
                
                );
                
                $url = get_home_url()."/{$prefix}/wp-admin/install.php?step=2";
                $response = wp_remote_post($url,
                    array(
                    'method'      => 'POST',
                    'timeout'     => 60,
                    'body'        => $args
                ));
                
                
                $args['response'] = $response;
                $args['url'] = $url;
                $response = $args;
                $wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
                $cmd = "{$wp_cli_command} --path=".ABSPATH."{$prefix} plugin activate wpboom";
                self::update_spawn_options($prefix,'commands',$cmd,true);
                @exec($cmd);
              
                $options['spawned'][$prefix]['username'] = $admin_username;
                $options['spawned'][$prefix]['password'] = $admin_password;
              
                
                update_option( 'safeupdates_options', $options);
                if ($is_cron) {
                    return $response;
                }
                break;
           

        }
        $response = [
            "response" => $response,
            "message" => $message,
            "data" => $response_data
        ];
       
        if($is_cron){
            return $response;
        } 
        wp_send_json($response);
       
        
       
        
    }

   

    public static function show_disk_usage($size_info,$title){
        
        $p = floor(($size_info['free'] / $size_info['total']) * 100);
        ?>
        <h5 class="fs-6"><?php echo wp_kses_post($title); ?> (<?php echo wp_kses_post(SafeWPUpdates_Lib::format_filesize($size_info['used'])); ?> / <?php echo wp_kses_post(SafeWPUpdates_Lib::format_filesize($size_info['free'])); ?>)</h5>
        <div class="progress rounded-0 my-2" style="height:35px;" role="progressbar" aria-label="Disk Usage" aria-valuenow="<?php echo esc_attr($p); ?>" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-primary" style="height:35px; width: <?php echo wp_kses_post($p); ?>%"><?php echo wp_kses_post($p); ?>%</div>
        </div>
        <?php
    }

    public static function show_bars($content_sizes,$title){
        global $SafeWPUpdates_colors;
        $total = $content_sizes['total'];
        unset($content_sizes['total']);
        ?>
        
        <div class="progress-stacked rounded-0 my-2" style="height:35px;">
                <?php

                $bar_colors = $SafeWPUpdates_colors;
                $combined = 0;
                $other = 0;
                ?>
                <?php foreach($content_sizes as $name => $bytes){ 
                    $combined += $bytes;
                    
                    $percent = ceil(($bytes / $total) * 100); 
                    if($percent <= 2 || $name == "files"){
                        $other += $percent;
                        continue;
                    }
                ?>
                <div class="progress" role="progressbar " aria-label="<?php echo esc_attr($name); ?>" aria-valuenow="<?php echo esc_attr($percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo wp_kses_post($percent); ?>%">
                    <div style="height:35px;" class="progress-bar  bd-<?php echo esc_attr($bar_colors[0]); ?>-400"><?php echo esc_attr($name); ?></div>
                </div>
                <?php
                array_shift($bar_colors);
                ?>
                <?php } ?>
                <?php if( $other > 5){ ?>
                    <div class="progress" role="progressbar " aria-label="<?php echo esc_attr($name); ?>" aria-valuenow="<?php echo esc_attr($other); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo wp_kses_post($other); ?>%">
                    <div style="height:35px;" class="progress-bar progress-bar-striped bd-<?php echo esc_attr($bar_colors[0]); ?>-400">other</div>
                </div>
                <?php } ?>
            </div>
            <?php
    }

    public static function get_scan_folder_info($refresh = false){
        global $SafeWPUpdates_scan_targets;
        if($refresh){
            delete_transient("wpboom_folder_info");
        }
        if(!$folder_info = get_transient("wpboom_folder_info")){
            $folder_info = [];
            foreach($SafeWPUpdates_scan_targets as $path){
                $folder_info[$path] = SafeWPUpdates_Lib::get_used_disk_space(ABSPATH . $path);
            }
            set_transient("wpboom_folder_info",$folder_info,60 * 60);
        }
        return get_transient("wpboom_folder_info");
    }

    public static function get_wp_contents_sizes($root, $refresh = false){
        global $wpdb,$SafeWPUpdates_colors;
        if($refresh){
            delete_transient("wpboom_{$root}_folder_sizes");
        }
        if(!$content_sizes = get_transient("wpboom_{$root}_folder_sizes")){
            $folders = SafeWPUpdates_Lib::dir_tree_child(ABSPATH . $root . '/', array('.well-known','.','..'));
           
            $folder_info = [];
            $total = 0;
            $content_sizes = [];
            $other = 0;
            $total_size = SafeWPUpdates_Lib::get_used_disk_space(ABSPATH .$root . '/',false);
            $total_percent = 0;
            $combined_size = 0;
            foreach($folders as $folder){
                $content_path = ABSPATH . $root . '/'.$folder."/";
                $size = SafeWPUpdates_Lib::get_used_disk_space($content_path,false);
               
               
                $percent  = ceil(($size / $total_size) * 100);
               
                $content_sizes[$folder] = $size;
                $total_percent += $percent;
                $combined_size += $size;
               
            }
           
            if($combined_size < $total_size){
                $content_sizes['files'] = $total_size - $combined_size;
            }
            //$content_sizes['other'] = $other;
            uasort($content_sizes, function ($a, $b) {
                if ($a == $b) {
                    return 0;
                }
                return ($a > $b) ? -1 : 1;
            });    
            $content_sizes['total'] = $total_size;
           
            set_transient("wpboom_{$root}_folder_sizes",$content_sizes,60 * 60);
        }
        
       
        return $content_sizes;
    }
   
    public static function uniqidReal($length = 13, $prefix = '') {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $length).$prefix;
    }
    


   


    // execute on plugin activation
    public static function setup() {
        // do activation stuff here
    }
   // end of setup()
    
    
    // execute on plugin deactivation
    public static function cleanup() {
		 // do uninstall stuff here
    }
    // end of cleanup()
   
    
    // excute on plugin uninstall via WordPress->Plugins->Delete
    public static function uninstall() {

        $options = get_option('safeupdates_options',[]);

        foreach($options['spawned'] as $prefix=>$array){
            apply_filters('safeupdates_cron_ajax','despawn',$prefix,"uninstall");
            unset($options[$prefix]);
            
        }
        //update_option('safeupdates_options',$options);
        delete_option('safeupdates_options');
        return true;
        
    }
    // end of uninstall()
 
}

if(!function_exists("SafeWPUpdates_print_r")){
    function SafeWPUpdates_print_r($array){
        ?><pre><?php 
        print_r($array); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
        ?></pre><?php
    }
}

