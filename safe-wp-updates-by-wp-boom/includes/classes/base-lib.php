<?php



/*
 * General stuff for usage at WordPress plugins 
 * This class contains general stuff for usage at WordPress plugins and must be extended by child class
 */
class SafeWPUpdates_Lib {

    protected static $instance = null; // object exemplar reference  
    protected $options_id = 'safeupdates_options'; // identify save/retrieve plugin options to/from wp_option DB table
    protected $options = array(); // plugin options data
    protected $multisite = false;
    protected $active_for_network = false;
    protected $main_blog_id = 0;

    /**
     * Get an instance of the SafeWPUpdates_Lib class.
     *
     * @param string $options_id Identifier to save/retrieve plugin options to/from wp_option DB table.
     * @return SafeWPUpdates_Lib Instance of the SafeWPUpdates_Lib class.
     */
    public static function get_instance( $options_id = '') {
        if ( self::$instance===null ) {        
            self::$instance = new SafeWPUpdates_Lib( $options_id );
        }
        
        return self::$instance;
    }
    // end of get_instance()
        

    /**
     * class constructor
     * @param string $options_id  to save/retrieve plugin options to/from wp_option DB table
     */
    protected function __construct( $options_id ) {

       

    }
    // end of __construct()

    
    

    /**
     * Return HTML formatted message
     * 
     * @param string $message   message text
     * @param string $error_style message div CSS style
     */
    public static function show_message( $message, $error_style = false ) {

        if ( $message ) {
            echo '<div id="message" class="my-3 notice notice-'.sanitize_html_class($error_style).' is-dismissible"><p>'. wp_kses_post($message) . '</p></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
    // end of show_message()
    

    /*
     * Replacer for FILTER_SANITIZE_STRING deprecated with PHP 8.1
     */
    public static function filter_string_polyfill( $string ) {
        
        $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
        return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
        
    }
    // end of filter_string_polyfill()
    
    public static function filter_string_var( $raw_str ) {
        
        $value1 = filter_var( $raw_str, FILTER_UNSAFE_RAW );
        $value2 = self::filter_string_polyfill( $value1 );
        
        return $value2;
    }
    // end of filter_string_var()
   

    
    /**
     * Retrieve an option value.
     *
     * @param string $option_name The name of the option to retrieve.
     * @param mixed $default The default value to return if the option does not exist. Default is false.
     * @return mixed The value of the option or the default value if the option does not exist.
     */
    public static function get_option( $option_name, $default = false ) {

        if ( isset( $this->options[$option_name] ) ) {
            $value = $this->options[$option_name];
        } else {
            $value = $default;
        }
        $value = apply_filters('safeupdates_get_option_'. $option_name, $value );
        
        return $value;
    }
    // end of get_option()

    
    /**
     * Set an option value.
     *
     * @param string $option_name The name of the option to set.
     * @param mixed $option_value The value to set for the option.
     * @param bool $flush_options Whether to flush the options after setting the value. Default is false.
     * @return void
     */
    public static function put_option( $option_name, $option_value, $flush_options = false ) {

        if ( !is_array( $this->options ) ) {
            $this->options = array();
        }        
        $this->options[$option_name] = $option_value;
        if ( $flush_options ) {
            $this->flush_options();
        }
    }
    // end of put_option()
    

    /**
     * Delete an option value.
     *
     * @param string $option_name The name of the option to delete.
     * @param bool $flush_options Whether to flush the options after deleting the value. Default is false.
     * @return void
     */
    public static function delete_option( $option_name, $flush_options = false ) {
        if ( array_key_exists( $option_name, $this->options ) ) {
            unset( $this->options[$option_name] );
            if ( $flush_options ) {
                $this->flush_options();
            }
        }
    }
    // end of delete_option()

    
    /**
     * Update the options to the database.
     *
     * @return void
     */
    public static function flush_options() {

        update_option( $this->options_id, $this->options );
    }
    // end of flush_options()

   
    
    
    /**
     * Create a development site by copying the current site to a new path.
     *
     * @param string $path The path to the new development site.
     * @param string $prefix The prefix for the development site.
     * @param bool $include_uploads Whether to include the uploads directory. Default is false.
     * @param bool $is_cron Whether the function is being run as a cron job. Default is false.
     * @global wpdb $wpdb WordPress database object.
     * @return int The number of lines processed by the rsync command.
     */
    public static function make_dev_site($path,$prefix,$include_uploads,$is_cron = false){ 
        global $wpdb;
        $upload_paths = wp_upload_dir();
        if(! class_exists('WP_Filesystem_Direct')){
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
        }
        $WP_Filesystem_Direct = new WP_Filesystem_Direct(false);
        $WP_Filesystem_Direct->mkdir($path,0755);
        //$WP_Filesystem_Direct->chmod($path,0755);
        
        // find all spawned dev sites first
        
        
        copy(ABSPATH."wp-config.php",$path."/"."wp-config.php");
       
        // plugin paths to exclude
        $path = ABSPATH . $prefix;
        $spawn_folders = glob(ABSPATH."*".WPBOOM_SITE_SUFFIX);
        $ithemes_security_path =  str_replace(ABSPATH,'',WP_PLUGIN_DIR ) . '/ithemes-security-pro';
        $wp_rocket_path =  str_replace(ABSPATH,'',WP_PLUGIN_DIR ) . '/wp-rocket';
        $ls_cache_path =  str_replace(ABSPATH,'',WP_PLUGIN_DIR ) . '/litespeed-cache';
       
        
        $exclusions = ['--exclude wp-content/cache','--exclude wp-content/advanced-cache.php' , '--exclude ' . $ithemes_security_path,'--exclude ' . $wp_rocket_path,'--exclude ' . $ls_cache_path,'--exclude error_log','--exclude '.$prefix]; 
        if($excludes = get_transient("wpboom_exclude_from_copy",$excluded)){
            foreach($excludes as $exclude){
                $exclusions[] = '--exclude ' . $exclude;
             }
             delete_transient("wpboom_exclude_from_copy");
        }
        
       
        if(!$include_uploads){
            $base_uploads = $upload_paths['basedir'];
            $uploads = glob($base_uploads."/*");
            // there are important folders and files often in uploads
            // our intent is to 
            $allowed_mime_types = [];
            foreach(get_allowed_mime_types() as $extensions=>$mime_type){
                $allowed_mime_types[] = $extensions;
            }
            $extensions = implode('|',$allowed_mime_types);
            foreach($uploads as $folder){
                $folder_name = basename($folder);
                $mime = wp_check_filetype($folder);
                if(preg_match('/\d{4,}+/m',$folder_name) && strlen($folder_name) == 4){
                    $exclusions[] = "--exclude ".str_replace(ABSPATH,'',$folder);
                } elseif($mime['ext'] && preg_match("/".$extensions."/",$mime['ext'])){
                    $exclusions[] = "--exclude ".str_replace(ABSPATH,'',$folder);
                }
            
            
                
            }
           
           
        }
        foreach( $spawn_folders as $exclude_folder){
            $exclusions[] = "--exclude ".basename($exclude_folder);
        }
        $copy_line_count_cmd = "/usr/bin/rsync -av  --dry-run  ".ABSPATH." {$path} ".implode(' ',$exclusions) . " | wc -l";
        $line_count = @exec($copy_line_count_cmd);
        $cmd = "/usr/bin/rsync -av   ".ABSPATH." {$path} ".implode(' ',$exclusions) ;
        if(!$is_cron){
            $cmd .= " > {$path}.progress 2>&1 &";
        }
        //copy files routine
        @exec($cmd);
        SafeWPUpdates::update_spawn_options($prefix,'commands',$cmd,true);
        return $line_count;
       

    }

   
    /**
     * Get the path to the WP-CLI executable.
     *
     * @param bool $check Whether to check if the WP-CLI path exists. Default is false.
     * @return string|bool The path to the WP-CLI executable or a boolean indicating existence.
     */
    public static function get_wp_cli_path($check = false){
        $options = get_option('safeupdates_options');
        if(array_key_exists('path_to_wpcli',$options) && $options['path_to_wpcli']){
            $path = @exec("which " .$options['path_to_wpcli']);
        } else {
            $path = @exec("which wp");
        }
        
        if(!$path && $check){
            return false;
        } else if($check){
            return true;
        } else {
            return $path;
        }
    }

    /**
     * Check if the exec function is enabled.
     *
     * @return bool True if the exec function is enabled, false otherwise.
     */
    public static function is_exec_enabled(){
        if(function_exists('exec')){
            return true;
        }
        return false;
    }

    /**
     * Check if the WP_CRON function is enabled.
     *
     * @return bool True if the exec function is enabled, false otherwise.
     */
    public static function is_cron_enabled(){
        if(defined('DISABLE_WP_CRON') && DISABLE_WP_CRON){
            return false;
        }
        return true;
    }

    /**
     * Get the path to the imagemMagick executable
     *
     * @return bool True if the imagemagick function is enabled, false otherwise.
     */
    public static function is_imagemagick_enabled(){
        $path = @exec("which convert");
        if(!$path){
            return false;
        } else {
            return true;
        }
    }

    /**
     * Update all plugins for a given site prefix using WP-CLI.
     *
     * @param string $prefix The prefix for the site to update.
     * @param bool $is_cron Whether the function is being run as a cron job. Default is false.
     * @global wpdb $wpdb WordPress database object.
     * @return string The status of the update process.
     */
    public static function update_plugins($prefix,$is_cron = false){
        global $wpdb;
        // run routine here
        // will attempt to update using wp_cli
        // and test
        //"wp search-replace 'wp_' 'abcdefghijklmnop_' wp_options wp_usermeta --dry-run";
        $wp_cli_command = self::get_wp_cli_path();
        $cmd = "{$wp_cli_command} --path=".ABSPATH."{$prefix} plugin update --all";
        if(!$is_cron){
            $cmd .= " > ".ABSPATH."{$prefix}/update.progress  2>&1 &";
        }
        @exec($cmd,$result);
        SafeWPUpdates::update_spawn_options($prefix,'commands',$cmd,true);
        return "success"; 
      
    }

    /**
     * Update all themes for a given site prefix using WP-CLI.
     *
     * @param string $prefix The prefix for the site to update.
     * @param bool $is_cron Whether the function is being run as a cron job. Default is false.
     * @return string The status of the update process.
     */
    public static function update_themes($prefix,$is_cron = false){
        // run routine here
        // will attempt to update using wp_cli
        // and test
        $wp_cli_command = self::get_wp_cli_path();
        $cmd = "{$wp_cli_command} --path=".ABSPATH."{$prefix} theme update --all";
        if(!$is_cron){
            $cmd .= " > ".ABSPATH."{$prefix}/update.progress  2>&1 &";
        }
        @exec($cmd,$result);
        SafeWPUpdates::update_spawn_options($prefix,'commands',$cmd,true);
        return "success"; 
      
    }

    /**
     * Prepare the development site database and update configuration files.
     *
     * @param string $prefix The prefix for the development site.
     * @param bool $include_uploads Whether to include the uploads directory.
     * @param bool $skip_database Whether to skip database operations.
     * @global wpdb $wpdb WordPress database object.
     * @return array List of SQL queries to be executed for the development site.
     */
    public static function get_dev_tables($prefix,$include_uploads,$skip_database){
        global $wpdb;
        $upload_paths = wp_upload_dir();
        if(! class_exists('WP_Filesystem_Direct')){
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
        }
        $WP_Filesystem_Direct = new WP_Filesystem_Direct(false);
        $dev_upload_path = ABSPATH . $prefix . "/" . str_replace(ABSPATH,'',$upload_paths['basedir']);
        
        $wp_prefix = $wpdb->prefix;
        $new_prefix = $prefix."_";
        
        $tables = $wpdb->get_results("SHOW TABLES",ARRAY_A); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
        $queries = [];
        $identifiers = [];
        foreach($tables as $table){
            $source_table = $table[array_key_first($table)];
            //looking to only match tables that have the WP prefix
            if(substr($source_table,0,strlen($wp_prefix)) == $wp_prefix){
                // sometimes tables are a bit wonky - best to optimize them before we copy them;
                $sql = "OPTIMIZE TABLE `{$source_table}`;";
                //$queries[] = $sql;
                $target_table = substr_replace($source_table,$new_prefix,0,strlen($wp_prefix));
                $sql = "CREATE TABLE `{$target_table}` LIKE `{$source_table}`;";
                //$queries[] = $sql;
                $sql = "INSERT INTO `{$target_table}` SELECT * from `{$source_table}`;";
                //$queries[] = $sql;
                $identifiers[] = $source_table;
            }
           
        }
       
        SafeWPUpdates::update_spawn_options($prefix,'identifiers',$identifiers);
        $config = explode("\n",file_get_contents(ABSPATH.$prefix."/wp-config.php"));
        foreach($config as $idx => $line){
            if(preg_match("/table_prefix/",$line)){
                $line =  "\$table_prefix  = '{$new_prefix}';";
                $line .= "\ndefine('WPBOOM_COPY', true);";
                $config[$idx] = $line;
            }
            if(preg_match("/define\('WP_CACHE/",$line)){
                $line = "// DISABLE CACHE FOR DEV SITE";
                $line .= "\ndefine('WP_CACHE', false);";
                $config[$idx] = $line;
            }
            if(!$include_uploads ){
                if(preg_match("/stop editing!/",$line)){
                    if(!$skip_database){
                        $line = "\ndefine('UPLOADS', '../wp-content/uploads');\n".$line;
                    }
                    
                    $line = "\ndefine('WPBOOM_LIVE_PREFIX', '{$wp_prefix}');\n".$line;
                    $config[$idx] = $line;
                }
            }
            
        }
        $new_config = implode("\n",$config);
        
        $WP_Filesystem_Direct->put_contents(ABSPATH.$prefix."/wp-config.php",$new_config);
        // update rewritebase in htaccess
        
        if(!$include_uploads ){
            $cmd = "sed -E 's/(RewriteBase \\/)/RewriteBase \/{$prefix}\/ ## IMAGE REWRITE/gm;t' ".ABSPATH.$prefix."/.htaccess > ".ABSPATH.$prefix."/.htaccess_1";
            //$cmd = "sed -E 's/(RewriteBase \\/)/RewriteBase \/{$prefix}\/\\nRewriteCond %{REQUEST_URI} !/".basename(get_home_url())."/wp-content/uploads/.*\\nRewriteRule ^wp-content/uploads/(.*\.(gif|jpg|png|jpeg))$ https://".basename(get_home_url())."/wp-content/uploads/$1 [L,R=301,NC]\\n/gm;t' ".ABSPATH.$prefix."/.htaccess > ".ABSPATH.$prefix."/.htaccess_1";
            
        } else {
            $cmd = "sed -E 's/(RewriteBase \\/)/RewriteBase \/{$prefix}\//gm;t' ".ABSPATH.$prefix."/.htaccess > ".ABSPATH.$prefix."/.htaccess_1";
        }
        @exec($cmd);
        SafeWPUpdates::update_spawn_options($prefix,'commands',$cmd,true);
        $cmd = "sed -E 's/RewriteRule . \\//RewriteRule . \/{$prefix}\//gm;t' ".ABSPATH.$prefix."/.htaccess_1 >  ".ABSPATH.$prefix."/.htaccess_2";
        @exec($cmd);
        SafeWPUpdates::update_spawn_options($prefix,'commands',$cmd,true);

        if(file_exists(ABSPATH.$prefix."/.htaccess_2")){
            if(!$include_uploads ){
                $htaccess = file_get_contents(ABSPATH.$prefix."/.htaccess_2");
                $htaccess = str_replace("## IMAGE REWRITE","\nRewriteCond %{REQUEST_URI} !/".basename(get_home_url())."/wp-content/uploads/.*\nRewriteRule ^wp-content/uploads/(.*\.(gif|jpg|png|jpeg))$ https://".basename(get_home_url())."/wp-content/uploads/$1 [L,R=301,NC]",$htaccess);
                $WP_Filesystem_Direct->put_contents(ABSPATH.$prefix."/.htaccess_2",$htaccess);
            }
            copy(ABSPATH.$prefix."/.htaccess_2",ABSPATH.$prefix."/.htaccess");
            wp_delete_file(ABSPATH.$prefix."/.htaccess_1");
            wp_delete_file(ABSPATH.$prefix."/.htaccess_2");
            
            $WP_Filesystem_Direct->chmod($prefix."/.htaccess",0644);
        }
        //RewriteCond %{REQUEST_URI} !/sync1.ndic.com/wp-content/uploads/.*
        //RewriteRule ^wp-content/uploads/(.*\.(gif|jpg|png|jpeg))$ https://sync1.ndic.com/wp-content/uploads/$1 [L,R=301,NC]
        return $identifiers; // $queries
        
       

    }

    
 

    /**
     * Clean a SQL query by removing unnecessary characters and formatting.
     *
     * @param string $query The SQL query to clean.
     * @return string The cleaned SQL query.
     */
    public static function clean_query($query){
        $query = preg_replace('/\n|\r/m'," ",$query); // remove carriage returns
        $query = preg_replace('/{([^}]*)}/m',"%",$query); // fix % operators
        $query = preg_replace('/\s\s+/m'," ",$query); // replace consecutive whitespaces
        return  $query;
    }

    /**
     * Delete development tables with the specified prefix.
     *
     * @param string $prefix The prefix for the development tables to delete.
     * @global wpdb $wpdb WordPress database object.
     * @return void
     */
    public static function delete_dev_tables($prefix){
        global $wpdb;
       
        $new_prefix = $prefix."_";
        $tables = $wpdb->get_results("SHOW TABLES",ARRAY_A);  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
        foreach($tables as $table){
            $table_to_delete = $table[array_key_first($table)];
            if(substr($table_to_delete,0,strlen($new_prefix)) == $new_prefix){
                $sql = "DROP TABLE `{$table_to_delete}`;";
                $wpdb->query($sql); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
            }
           
        }

    }

    /**
     * Recursively remove a directory and its contents.
     *
     * @param string $dir The directory to remove.
     * @return bool True on success, false on failure.
     */
    public static function __rmdir($dir) {
        if(! class_exists('WP_Filesystem_Direct')){
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
        }
        $WP_Filesystem_Direct = new WP_Filesystem_Direct(false);
        $files = array_diff((array)scandir($dir), array('.','..'));
        foreach ($files as $file) {
          (is_dir("$dir/$file") && !is_link("$dir/$file")) ? self::__rmdir("$dir/$file") : wp_delete_file("$dir/$file");
        }
        return $WP_Filesystem_Direct->rmdir($dir);
    }

    /**
     * Build a nested array from a flat array.
     *
     * @param array $array The flat array to convert.
     * @param string $file An optional file name to add to the end of the nested array.
     * @return array The nested array.
     */
    public static function buildArray($array,$file = '') {
        $new = array();
        $current = &$new;
        foreach($array as $key => $value)
        {
            $current[$value] = array();
            $current = &$current[$value];
            if($key == count($array) - 1){
                if($file){
                    $current[$value][] = $file;
                }
               
            }
        }
       
       
        return $new;
    }

    


    /**
     * Generate a directory tree array.
     *
     * @param string $dir The directory to scan.
     * @param array $ignore List of files and directories to ignore. Default is array('.', '..').
     * @return array The directory tree array.
     */
    public static function dir_tree($dir,$ignore =  array('.','..')) {    
        //$files = array_map('basename', glob("$dir/*"));
        $files = array_diff(scandir($dir), $ignore);
        foreach($files as $file) {
            if(is_dir("$dir/$file")) {
                $return[$file] = self::dir_tree("$dir/$file");
            } else {
                $return[] = $file;
            }
        }
        return $return;
    }

    /**
     * Generate a directory tree array with only child directories.
     *
     * @param string $dir The directory to scan.
     * @param array $ignore List of files and directories to ignore. Default is array('.', '..').
     * @return array The directory tree array with only child directories.
     */
    public static function dir_tree_child($dir,$ignore =  array('.','..')) {    
        //$files = array_map('basename', glob("$dir/*"));
        $files = array_diff(scandir($dir), $ignore);
        foreach($files as $file) {
            if(is_dir("$dir/$file")) {
                $return[$file] = $file;
            } 
        }
        return $return;
    }

    

    /**
     * Get the free disk space of a given path.
     *
     * @param string $path The path to check disk space.
     * @param bool $formatted Whether to format the size or not.
     * @return string|int Free disk space in bytes or formatted string.
     */
    public static function get_free_disk_space($path = '',$formatted = true){
        if(!$path){
            $path = ABSPATH;
        }
        $size = disk_free_space($path);
        if($formatted){
            $size = self::format_filesize($size);
        }
        return $size;
    }

    /**
     * Get the used disk space of a given path.
     *
     * @param string $path The path to check disk space.
     * @param bool $formatted Whether to format the size or not.
     * @return string|int Used disk space in bytes or formatted string.
     */
    public static function get_used_disk_space($path = '',$formatted = true){
        $exclude = "";
        if(!$path){
            $path = ABSPATH;
        }
        if($path == ABSPATH){
            $exclude = "--exclude=*".WPBOOM_SITE_SUFFIX;
        }
        $cmd = "du -Hb {$exclude} {$path}";
        $result = [];
        $size = 0;
        @exec($cmd,$result);
        if(array_key_exists(0,$result)){
            $size = explode("\t",array_reverse($result)[0])[0];
        }
        
        if($formatted){
            $size = self::format_filesize($size);
        }
        return $size;
    }

    /**
     * Get the total size of the database.
     *
     * @param bool $formatted Whether to format the size or not.
     * @global wpdb $wpdb WordPress database abstraction object.
     * @return string|int Database size in bytes or formatted string.
     */
    public static function get_database_size($formatted = true){
        global $wpdb;
       
        $rows = $wpdb->get_results("SHOW TABLE STATUS"); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
        $size = 0;
        foreach($rows as $row) {
            $size += $row->Data_length + $row->Index_length;
        }
        if($formatted){
           $size = self::format_filesize($size);
        }
        return $size;
    }
    /**
     * Format a filesize from bytes to a human-readable string.
     *
     * @param int $size Size in bytes.
     * @return string Formatted size string.
     */
    public static function format_filesize($size){
        $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
        $base = 1024;
        $class = min((int)log($size , $base) , count($si_prefix) - 1);
        $size = sprintf('%1.2f' , $size / pow($base,$class)) . ' ' . $si_prefix[$class];
        return $size;
    }

    

}
// end of SafeWPUpdates_Lib class
