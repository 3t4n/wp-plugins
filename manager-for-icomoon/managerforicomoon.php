<?php
/*
Plugin Name: Manager for Icomoon
Plugin URI: http://wordpress.org/plugins/manager-for-icomoon/
Description: Manage your icomoon font easily
Version: 2.3.7
Author: Julien Crego
Author URI: http://dev.juliencrego.com/manager-for-icomoon/
Text Domain: managerforicomoon
*/

namespace managerForIcomoon ;

use Exception;

new Core();

class Core {
    private $plugin_options = array();
    private $shortcode_atts = false ;
    
    static private $plugin_name = 'Manager for Icomoon' ;
    static private $plugin_name_short = 'Icomoon' ;
    static private $plugin_slug = 'managerforicomoon' ;
    static private $url_plugin_donate = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MURUC7JZG94RA&source=url';
    static private $icomoon_website = 'https://icomoon.io/';
    static private $icomoon_website_doc_save_load = 'https://icomoon.io/#docs/save-load';
    static private $icons_list = array();
    static private $icomoon_url ;
    static private $icomoon_path ;
    static private $icomoon_upload_path ;
    static private $icomoon_custom ;
    
    public function __construct(){
        if (is_admin()) {
            add_action('init', array($this, 'localization'));
        }
        
        require 'class/options.class.php';
        Options::init();
        
        add_action('init', array($this, 'init'));
    }

    public function init(){
        self::setIcomoonUrlAndPath();

        require 'class/plugin.class.php';
        new Plugin();

        if(!is_admin()){
            add_shortcode(Options::get('shortcode'), array($this,'shortcodeLauncher') ); 
            add_filter('widget_text', 'do_shortcode');
        } else {
            require 'class/notice.class.php';

            /* Get Plugin info for version number */
            if( !function_exists('get_plugin_data') ){
                require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
                        
            require 'class/settings.class.php';
            new Settings ;


            // Icomoon archive management
            if(isset($_POST['managerforicomoon-upload']) 
               or isset($_POST['managerforicomoon-minify'])
               or isset($_POST['managerforicomoon-restore'])){
                require 'class/zipPack.class.php';
                new ZipPack();
            }
            
            /* Gutenberg button */
            require 'class/gutenberg.class.php';
            new Gutenberg();
        }

        require 'class/scripts.class.php';
        new Scripts ;
    }

	public function localization() {
        load_plugin_textdomain('managerforicomoon', false, plugin_basename(self::getPath('languages')) ); 
    }

    static public function debug($var){
        echo "<pre style='margin: 10px 10px 10px 170px; padding: 10px; border: 1px solid red;'>";
        var_dump($var);
        echo "</pre>";
    }

    static public function getPluginName($short=false){
        if($short){
            return self::$plugin_name_short;
        }
        return self::$plugin_name ;
    }
    
    static public function getPluginSlug(){
        return self::$plugin_slug; 
    }

    static public function getPath($path=""){
        $fullpath = plugin_dir_path(__FILE__);
        if (strlen($path)>0) {
            // Concatène le chemin fourni en normalisant les séparateurs
            $fullpath .= ltrim($path, DIRECTORY_SEPARATOR);
        }
        // Normalise tous les séparateurs de chemin
        return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $fullpath);
    }
    
    static public function getUrl($url=""){
        $fullurl = plugin_dir_url( __FILE__ );
        $fullurl = set_url_scheme($fullurl);
        if(strlen($url)>0) {
            $fullurl .= ltrim($url, '/');
        }
        return $fullurl;
    }

    static public function getInfo($info){
        if(isset(self::${$info})){
            return self::${$info} ;
        }
    }

    static public function setIcomoonUrlAndPath(){
        $uploads_path_info = wp_upload_dir() ;
        $uploads_path = $uploads_path_info['basedir'].'/';
        $uploads_url = $uploads_path_info['baseurl'].'/';

        $upload_folder_name = "manager-for-icomoon";    // Nom du dossier dans wp-content/uploads
        $default_folder_name = "icomoon";               // Nom du dossier pour la version par défaut

        self::$icomoon_upload_path = $uploads_path.$upload_folder_name.'/' ;

        if(file_exists(self::$icomoon_upload_path.'/selection.json')){
            self::$icomoon_path = self::$icomoon_upload_path ;
            self::$icomoon_url = $uploads_url.$upload_folder_name.'/' ;
            self::$icomoon_custom = true ;
        } else {
            self::$icomoon_path = self::getPath($default_folder_name).'/' ;
            self::$icomoon_url = self::getUrl($default_folder_name).'/' ;
            self::$icomoon_custom = false ;
        }
    }
    static public function getIcomoonUrl(){
        self::$icomoon_url = set_url_scheme(self::$icomoon_url);
        return self::$icomoon_url ;
    }
    static public function getIcomoonPath(){
        return self::$icomoon_path ;
    }
    static public function getIcomoonUploadPath(){
        return self::$icomoon_upload_path ;
    }
    static public function isIcomoonCustom(){
        return self::$icomoon_custom ;
    }    

    /***************************************************************************
     * MISC METHODS
     **************************************************************************/
   
    public function shortcodeLauncher($atts){
        $this->shortcode_atts = shortcode_atts(array('name' => '','class'=>'','color'=>'','size'=>'','rotate'=>'','customcss'=>''), $atts);

        // Allow unprefixed name
        $icon_name = esc_attr($this->shortcode_atts['name']);
        if(substr($icon_name, 0, strlen(Options::get('class_prefix'))) != Options::get('class_prefix')){
            $icon_name = Options::get('class_prefix').$icon_name ;
        }
        if(!$this->endsWith($icon_name, Options::get('class_postfix'))){
            $icon_name = $icon_name.Options::get('class_postfix') ;
        }
        
        switch(Options::get('css_selector')){
            case 'i':
                $markup = 'i';
                $class = '' ;
                break;
            case 'span':
                $markup = 'span';
                $class = '' ;
                break;
            case 'class':
                $markup = 'span';
                $class = Options::get('css_class').' ' ;
                break;
        }
 
        $style = "" ;
        if($this->shortcode_atts['color']){
            $style .= 'color:'.esc_attr($this->shortcode_atts['color']).';';
        }
        if($this->shortcode_atts['size']){
            $style .= 'font-size:'.esc_attr($this->shortcode_atts['size']).';';
        }
        if($this->shortcode_atts['rotate']){
            $rotate = intval(esc_attr($this->shortcode_atts['rotate']));
            $style .= 'display:inline-block;'
                    . '-webkit-transform: rotate('.$rotate.'deg); '
                    . '-ms-transform: rotate('.$rotate.'deg);'
                    . 'transform:rotate('.$rotate.'deg);';
        }
        if($this->shortcode_atts['customcss']){
            $style .= esc_attr($this->shortcode_atts['customcss']) ;
        }
        ob_start();
        
        ?>
        <<?= $markup; ?> class="<?= $class.$icon_name ;?> <?php echo esc_attr($this->shortcode_atts['class']); ?>"
        <?php if($style != "") { echo ' style="'.$style.'" ';} ?>
        ></<?= $markup; ?>>
        <?php
        return ob_get_clean();
    }

    function endsWith($haystack, $needle) {
        $length = strlen($needle);
        return $length > 0 ? substr($haystack, -$length) === $needle : true;
    }


    public static function checkIcomoonFiles(){
        try {
            if(!file_exists(self::getPath("icomoon/selection.json"))) {
                throw new \Exception(__("The selection.json file is missing!", 'managerforicomoon'));
            }
            if(!is_readable(self::getPath("icomoon/selection.json"))) {
                throw new \Exception(__("The selection.json file is missing or is unreadable!", 'managerforicomoon'));
            } 
            if(!file_exists(self::getPath("icomoon/style.css"))) {
                throw new \Exception(__("The style.css file is missing!", 'managerforicomoon'));
            }
        } catch (\Exception $ex) {
            throw new \Exception('<b>'.$ex->getMessage().'</b><br>'. __("Thank you for reuploading the icomoon archive or restore the default archive.", 'managerforicomoon'));
        }
    }


    public static function getIcons($full = false){
        try {
            if(empty(self::$icons_list)) {  
                self::checkIcomoonFiles();
    
                switch(Options::get('css_selector')){
                    case 'i':
                        $markup = 'i';
                        $class = '' ;
                        break;
                    case 'class':
                        $markup = 'span';
                        $class = Options::get('css_class').' ' ;
                        break;
                    default:
                    case 'span':
                        $markup = 'span';
                        $class = '' ;
                        break;
                }
    
                $json_file = file_get_contents(self::getIcomoonPath()."selection.json");
                $json_content = json_decode($json_file, true);
    
                self::$icons_list = array();
                foreach($json_content['icons'] as $icon){
                    $names = explode(',',$icon['properties']['name']);
                    $name = trim($names[0]);
                    self::$icons_list[$name]['name'] = $name;
                    self::$icons_list[$name]['name-full'] = Options::get('class_prefix').$name;
                    self::$icons_list[$name]['icon'] = '<'.$markup.' class="'.$class.Options::get('class_prefix').$name.Options::get('class_postfix').'"></'.$markup.'>'; 
                    self::$icons_list[$name]['shortcode'] = '['.Options::get('shortcode').' name="'.$name.'"]';
                    self::$icons_list[$name]['shortcode_txt'] = Options::get('shortcode');   
                    self::$icons_list[$name]['tag'] = $markup;  
                    self::$icons_list[$name]['class'] = $class.Options::get('class_prefix').$name.Options::get('class_postfix');             
                }

                if($full) {
                    $css_file = file_get_contents(self::getIcomoonPath()."style.css");
                    preg_match_all('/\.('.Options::get('class_prefix').'[^:]+):before\s*{\s*content:\s*"([^"]+)";.*?}/s', $css_file, $matches);
                    $icons_with_codes = array_combine($matches[1], $matches[2]);
                
                    foreach(self::$icons_list as $name => &$icon_data){
                        if(isset($icons_with_codes[$icon_data['name-full']])){
                            $icon_data['code'] = $icons_with_codes[$icon_data['name-full']];
                        }
                    }
                }

                if(count(self::$icons_list)<1){
                    throw new \Exception('<b>'.__( "The Icomoon package does not contain any icons.", 'managerforicomoon').'</b><br>'. __("Thank you for reuploading the icomoon archive or restore the default archive.", 'managerforicomoon'));
                }
            }
            ksort(self::$icons_list);
            return self::$icons_list ;
        } catch (\Exception $ex) {
            Notice::setError($ex->getMessage());
        }
    }
    
}

