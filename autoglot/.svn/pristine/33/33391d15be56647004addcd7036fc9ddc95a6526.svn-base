<?php
/**
 * Autoglot
 * https://autoglot.com/
 *
 * Copyright 2025, Autoglot
 * Description: Autoglot utils - different useful functions
 */
 
if ( !defined('ABSPATH') ) exit; // Exit if accessed directly

class autoglot_utils {

	/**
	 * Get language name
	 */
    public static function get_language_name($lang) {
        return autoglot_consts::LANGUAGES[$lang]['name'];
    }

	/**
	 * Get language name in local language
	 */
    public static function get_language_original_name($lang) {
        $oname = autoglot_consts::LANGUAGES[$lang]['oname'];
        return strlen($oname)?$oname:$lang;
    }

	/**
	 * Get full original + English language name
	 */
    public static function get_full_name($lang, $type="") {
        $name = autoglot_consts::LANGUAGES[$lang]['name'];
        $oname = autoglot_consts::LANGUAGES[$lang]['oname'];
        $return = "";
        switch($type) {
            case "native":
                $return = strlen($oname)?$oname:$name;
            break;
            case "english":
                $return = $name;
            break;
            case "englishnative":
                $return = (strlen($oname) && strcmp($name, $oname) !== 0) ? $name . " (".$oname.")" : $name;
            break;
            case "iso":
                $return = strtoupper($lang);
            break;
            case "nativeiso":
                $return = ((strlen($oname) && strcmp($name, $oname) !== 0) ? $oname : $name ) . " (".strtoupper($lang).")";
            break;
            case "nativeenglish":
            default:
                $return = (strlen($oname) && strcmp($name, $oname) !== 0) ? $oname . " (".$name.")" : $name;
            break;
        }
        return $return;
    }

	/**
	 * Get language flag
	 */
    public static function get_language_flag($lang) {
        $flag = autoglot_consts::LANGUAGES[$lang]['flag'];
        if(is_array($flag)) $flag = $flag[0];
        return strlen($flag)?$flag:$lang;
    }
	/**
	 * Get language flags
	 */
    public static function get_language_flags($lang) {
        $flag = autoglot_consts::LANGUAGES[$lang]['flag'];
        return (strlen($flag) || is_array($flag))?$flag:$lang;
    }

	/**
	 * Get language locale name
	 */
    public static function get_language_locale($lang) {
        $locale = autoglot_consts::LANGUAGES[$lang]['locale'];
        return strlen($locale)?$locale:$lang;
    }

	/**
	 * Get list of all language names
	 */
    public static function get_all_language_names($default = false) {
        $return_languages = array();
        foreach(autoglot_consts::LANGUAGES as $code => $langarr) if(!$default || $code != $default){
            $return_languages[$code] = ($langarr['oname']==$langarr['name']) ? $langarr['oname'] : $langarr['oname']." (".$langarr['name'].")";
        }
        return $return_languages;
    }

	/**
	 * Get list of all languages with multiple flags options
	 */
    public static function get_all_language_flags() {
        $return_languages = array();
        foreach(autoglot_consts::LANGUAGES as $code => $langarr) if(is_array($langarr["flag"]) && count($langarr["flag"])>1){
            $return_languages[$code] = array("name" => $langarr['oname']." (".$langarr['name'].")", "flags" => $langarr['flag']);
        }
        return $return_languages;
    }

	/**
	 * Get locale with language code only
	 */
    public static function get_locale_code() {
        $locale = get_locale();
        if(strpos($locale,"_")!==false){
            $aloc = explode("_", $locale);
            $locale = $aloc[0];
        }
        return $locale;
    }

    /**
     * Get language ID from URL
     * @param string $href
     * @param string $home_url
     * @return string
     */
    public static function get_language_from_url($url, $home_url) {

        $parsedurl = @parse_url($url);
        $parsedhomeurl = @parse_url($home_url, PHP_URL_PATH);

        if($parsedurl === false)
            return false;

        if($parsedhomeurl != null && strlen($parsedhomeurl)){
            // remove the language from the url permalink (if in start of path, and is a defined language)
            $home_path = rtrim($parsedhomeurl, "/");
            if ($home_path && strpos($parsedurl['path'], $home_path) === 0) {
                $parsedurl['path'] = substr($parsedurl['path'], strlen($home_path));
            }
        }

        if (isset($parsedurl['path']) && strlen($parsedurl['path']) > 2) {
            $secondslashpos = strpos($parsedurl['path'], "/", 1);
            if (!$secondslashpos)
                $secondslashpos = strlen($parsedurl['path']);
            $prevlang = substr($parsedurl['path'], 1, $secondslashpos - 1);
            if (isset(autoglot_consts::LANGUAGES[$prevlang])) {
                return $prevlang;
            }
        }
        return false;
    }
    
    /**
     * Add language ID to links in text
     * @param string $href
     * @param string $home_url
     * @return string
     * Canceled in 2.4
     */
/*    public static function add_language_to_links($content, $lang, $home) {

        $preg_home = str_replace("/","\/",$home);
        $preg_admin = str_replace("/","\/",str_replace($home,"",get_admin_url()))."|".str_replace("/","\/",str_replace($home,"",wp_login_url()));//do not replace admin links

        $preg_pattern = array(  //"/(<a.*?href=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i", 
                                //"/(<a.*?href=['\"]\/(?!".$preg_admin."|".$lang."['\"\/]))([0-9a-zA-Z_=\-]+)/i",
                                //"/(rel=['\"]canonical['\"].*?href=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i",
                                "/(rel=['\"]shortlink['\"].*?href=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i");
                                //"/(rel=['\"]next['\"].*?href=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i",
                                //"/(rel=['\"]prev['\"].*?href=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i");
                                //"/(property=['\"]og:url['\"].*?content=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i");
                                //"/(<form.*?action=['\"]".$preg_home."(?!".$preg_admin."|\/".$lang."['\"\/]))/i", 
                                //"/(<form.*?action=['\"]\/(?!".$preg_admin."|".$lang."['\"\/]))([0-9a-zA-Z_=\-]+)/i");
        $preg_replace = array(  //"$1"."/".$lang, 
                                //"$1".$lang."/"."$2",
                                //"$1"."/".$lang,
                                "$1"."/".$lang);
                                //"$1"."/".$lang,
                                //"$1"."/".$lang);
                                //"$1"."/".$lang);
                                //"$1"."/".$lang, 
                                //"$1".$lang."/"."$2");
        return preg_replace($preg_pattern, $preg_replace, $content);
    }*/

    /**
     * Add language ID to URL
     * @param string $href
     * @param string $home_url
     * @param string $lang
     * @return string
     */
    public static function add_language_to_url($url, $home_url, $lang) {
        
        $newurl = "";
        
        if($lang == autoglot_utils::get_language_from_url($url, $home_url)) return $url;
        
        if(strpos($url, $home_url)!==false) {
            $newurl = str_replace($home_url, trailingslashit($home_url).$lang."/", $url);
        }
        elseif(strpos($url, "http")===false){
            $newurl = $lang."/".$url;
        }
        else {
            $newurl = $url;
        }

        return preg_replace('/([^:])(\/{2,})/', '$1/', $newurl);
    }

    /**
     * Transliterate URL
     * @param string $href
     * @return string
     */

    public static function transliterate_url($url) {
        
        $url = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\uffff] remove', $url);

        return $url;    
    }


    /**
     * Return hash ID of content extra spaces in order to prevent re-translation in case of minor changes
     */

    public static function gettexthash($string) {
//        $testcontent = trim(preg_replace('/[\t\n\r\s]+/', ' ', strip_tags($string)));
//        return strlen($testcontent)?hash("md5", $testcontent):"html_".md5(mt_rand());
        $content = trim(preg_replace('/[\t\n\r\s]+/', ' ', $string));
        return strlen($content)?hash("md5", $content):"html_".hash("md5", $string);
    }

    /**
     * Check if a link links to admin
     */
    public static function check_not_admin_link($href) {
        return stripos($href, get_admin_url()) === FALSE && stripos($href, content_url()) === FALSE && stripos($href, wp_login_url()) === FALSE;
    }

    /**
     * Check if a link links to downloadable file
     */
    public static function check_not_downloadable_file($url) {
        
        // Parse the URL and extract the path
        $parsedUrl = parse_url($url);
        if (!isset($parsedUrl['path'])) {
            return 1; // If there's no path in the URL, assume it's not a downloadable file
        }
        
        // Get the file extension from the path
        $pathInfo = pathinfo($parsedUrl['path']);
        
        // If there's no file extension or it's a directory, assume it's a folder (like for rewritten URLs)
        if (!isset($pathInfo['extension']) || $pathInfo['extension'] === '') {
            return 1; // This could be a folder or a URL with no file extension
        }
        
        // Check if the extension is a PHP-related file extension
        $extension = strtolower($pathInfo['extension']);
        if (in_array($extension, autoglot_consts::PHP_EXTENSIONS)) {
            return 1; // It's a PHP or similar web file
        }
        
        // Otherwise, assume it's a downloadable file (e.g., .jpg, .pdf, .zip, etc.)
        return 0;
    }

    /**
     * 
     */
    public static function make_link_absolute($href, $home_url) {
        if(stripos($href, "http") === 0 || stripos($href, "//") === 0 || substr($href,0,1) != "/") return $href;
        //now, link should be relative, starting with "/"
        $parsedUrl = parse_url($home_url);
        // Build the base URL using the scheme (protocol) and host (domain)
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
        
        return $baseUrl.$href;
    }

    /**
     * Prepare HTML before translation (prevent re-translation in case of changes in HTML; reduce size)
     */

    public static function prepare_HTML_translation($string) {
//        $content = trim(preg_replace("/(?<=<\/li>)[\r|\n]+(?=<li)/", "", $string));//remove line breaks between list items

        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s'
        );

        $replace = array(
            '>',
            '<',
            '\\1'
        );

        $content = preg_replace($search, $replace, $string);
        
        $content = trim($content);

        return $content;
    }

    /**
     * Format HTML after translation (remove extra spaces around tags)
     */

    public static function format_HTML_translation($string, $allowspace = false) {

        $string = preg_replace('/>\s+([.,])/', '>$1', $string);
        $string = preg_replace('/([\'’])\s+</', '$1<', $string);
        if(!$allowspace) {
            $string = preg_replace('/>\s+([»"“!?;:])/', '>$1', $string);
            $string = preg_replace('/(["«„])\s+</', '$1<', $string);
        }
        $string = preg_replace('/(<\/[\sa-zA-Z0-9]+>)(<[^\/])/', '$1 $2', $string);
        
        return $string;
    }

    /**
     * Encode only " to &quote; for descriptions etc..
     */

    public static function encode_singl_quotes($string) {
        return htmlspecialchars(htmlspecialchars_decode( (string) $string ), ENT_COMPAT, null, false);
    }

    public static function encode_all_quotes($string) {
        return htmlspecialchars(htmlspecialchars_decode( (string) $string ), ENT_QUOTES, null, false);
    }

    public static function decode_only_quotes($string) {
        return str_replace(array("&quot;", "&amp;", "&#039;", "&apos;"), array("\"", "&", "'", "'"), $string);
    }

    /**
     * Removes empty tags (tags without meaningful content) around string
     */
    public static function remove_surround_empty_tags($string) {
        
        //first, remove empty tags and comments that appear before content 
        $string = trim(preg_replace('/^(<[^>]*>([\s\n\r(<br\s?\/?>)]?)*<\/[^>]*>([\s]?)*|<![^>]*-->|\s)+/iu', '', $string));

        //next, remove empty tags and comments that appear before content 
        $string = trim(preg_replace('/(<[^>]*>([\s\n\r(<br\s?\/?>)]?)*<\/[^>]*>([\s]?)*|<![^>]*-->|\s)+$/iu', '', $string));
        return $string;
    }

    /**
     * Output bytes human-readable format
     */
    public static function format_bytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1);
        
        $bytes /= (1 << (10 * $pow)); 
        
        return round($bytes, $precision) . ' ' . $units[$pow];  
    }

    /**
     * Count number of tags
     */
    public static function get_tags_count($html){
        $dom = new DOMDocument;
        $dom->loadHTML($html);
        $allElements = $dom->getElementsByTagName('*');
        return $allElements->length;
    } 
    
    /**
     * UTF8-safe word counter
     */
    public static function str_word_count_utf8($str) {
        return count(preg_split('~[^\p{L}\p{N}\']+~u',preg_replace('/^[^\p{L}0-9]+|[^\p{L}0-9]+\z/u', '', $str)));
    }
    
    /**
     * Return array of hash=>string from strings
     */
    public static function get_hash_strings(array $strings){
        $return = array();
        foreach($strings as $string){
            $return[hash("md5", $string)] = $string;
        }
        return $return;
    }

    /**
     * Stop caching of translated pages
     */
    public static function stop_cache(){
        nocache_headers();
        if ( ! defined( 'DONOTCACHEPAGE' ) ) {
        	define( 'DONOTCACHEPAGE', true );
        }
        if ( ! defined( 'WPSC_SERVE_DISABLED' ) ) {
        	define( 'WPSC_SERVE_DISABLED', true );
        }
    }
    

    /**
     * Is it custom json request that should be translated?
     */
    public static function is_custom_json(){
        if ((isset($_GET['wc-ajax']) && $_GET['wc-ajax'] == 'update_order_review') ||
            (isset($_POST['action']) && $_POST['action'] == 'woocommerce_update_order_review') ||
            (isset($_POST['action']) && $_POST['action'] == 'woocommerce_get_refreshed_fragments') ||
            (isset($_POST['action']) && $_POST['action'] == 'woocommerce_add_to_cart')
            ) {
            return true;
        }
        return false;
    }

    /**
     * Is it html response?
     */
    public static function get_response_content_type(){

        foreach (headers_list() as $header) {
            if (stripos($header, 'Content-Type:') !== false) {
                if (stripos($header, 'html') !== false) {
                    return "html";
                } elseif (stripos($header, 'json') !== false) {
                    return "json";
                }
            }
        }
    	return false;
    }

    public static function prepare_url(){
    }
    
    public static function get_json_values($array, $keysToCheck) {
        $foundValues = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {

                // Recursively search nested arrays
                $foundValues = array_merge($foundValues, autoglot_utils::get_json_values($value, $keysToCheck));

            } elseif (substr($value, 0, 1) == "{") {
                
                //WTF some values can be json-encoded strings, OK let's decode them
                $arrvalue = json_decode($value, true);
                if(json_last_error() === JSON_ERROR_NONE && is_array($arrvalue)) {
                    $foundValues = array_merge($foundValues, autoglot_utils::get_json_values($arrvalue, $keysToCheck));
                }

            }elseif (strlen($key) && in_array($key, $keysToCheck, true)) {

                // Save the value of the matched key
                $foundValues[autoglot_utils::gettexthash($value)] = $value;

            }
        }
        return $foundValues;
    }
    
    public static function set_json_values($array, $keysToCheck, $translated_strings) {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {

                // Recursively search nested arrays
                $value = autoglot_utils::set_json_values($value, $keysToCheck, $translated_strings);

            } elseif (substr($value, 0, 1) == "{") {

                //WTF some values can be json-encoded strings, OK let's decode them
                $arrvalue = json_decode($value, true);
                if(json_last_error() === JSON_ERROR_NONE && is_array($arrvalue)) {
                    $value = autoglot_utils::set_json_values($arrvalue, $keysToCheck, $translated_strings);
                    $value = json_encode($value);
                }

            }elseif (strlen($key) && in_array($key, $keysToCheck, true)) {
                // Check and update the value of the matched key
                if(array_key_exists(autoglot_utils::gettexthash($value), $translated_strings)){
                    $value = $translated_strings[autoglot_utils::gettexthash($value)];
                }
            }
        }
        return $array;
    }

}

