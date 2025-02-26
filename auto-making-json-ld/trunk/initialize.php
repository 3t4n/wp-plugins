<?php

//=====[ set path ]=====//

// zip file
if(!defined('amJL_structure_zip_file')) define('amJL_structure_zip_file', autoMakingJSONLD.'structure.zip');

// directory : `structure`
if(!defined('amJL_structure_sid'))  define('amJL_structure_dir', autoMakingJSONLD.'structure/');
if(!defined('amJL_BL_dir'))         define('amJL_BL_dir', amJL_structure_dir.'breadcrumb/');
if(!defined('amJL_article_dir'))    define('amJL_article_dir', amJL_structure_dir.'article/');
if(!defined('amJL_Video_dir'))      define('amJL_Video_dir', amJL_structure_dir.'video/');
if(!defined('amJL_sitelink_dir'))   define('amJL_sitelink_dir', amJL_structure_dir.'sitelink/');
if(!defined('amJL_Recipe_dir'))     define('amJL_Recipe_dir', amJL_structure_dir.'recipe/');
if(!defined('amJL_FAQ_dir'))        define('amJL_FAQ_dir', amJL_structure_dir.'FAQ/');
if(!defined('amJL_Howto_dir'))      define('amJL_Howto_dir', amJL_structure_dir.'howto/');
if(!defined('amJL_review_dir'))     define('amJL_review_dir', amJL_structure_dir.'review/');
if(!defined('amJL_event_dir'))      define('amJL_event_dir', amJL_structure_dir.'event/');

// directory : `settings` <- for admin page
if(!defined('amJL_settings_dir'))   define('amJL_settings_dir', autoMakingJSONLD.'settings/');
if(!defined('amJL_Details'))        define('amJL_Details', amJL_settings_dir.'plugin_details.php');

// directory : `include`
if(!defined('amJL_include_dir'))    define('amJL_include_dir', autoMakingJSONLD.'include/');

// directory : `img`  ## this constant is URL
if(!defined('amJL_img'))    define('amJL_img', autoMakingJSONLD_url.'img/');

// directory : `src`
if(!defined('amJL_js'))     define('amJL_js', autoMakingJSONLD.'src/js/');


//=====[ include files ]=====//

// include functions
$functions = glob(amJL_include_dir.'*');
foreach ($functions as $function){
    require_once($function);
}

// admin page
$settings = glob(amJL_settings_dir.'*');
foreach ($settings as $setting){
    $position = strpos($setting, 'plugin_details.php');
    if($position !== false) continue;
    require_once($setting);
}

// structure data
if(file_exists(amJL_BL_dir.'breadcrumb.php')){
    add_action('wp_head', 'amJL_description_start', 1);

    // breadcrumb
    require_once(amJL_BL_dir.'breadcrumb.php');

    // Article
    require_once(amJL_article_dir.'article.php');
    require_once(amJL_article_dir.'image_lisence.php');
    require_once(amJL_article_dir.'profile.php');

    // Sitelinks sarch box
    require_once(amJL_sitelink_dir.'sitelink.php');

    // Recipe
    require_once(amJL_Recipe_dir.'recipe.php');
    require_once(amJL_Recipe_dir.'setting.php');

    // Video
    require_once(amJL_Video_dir.'video.php');
    require_once(amJL_Video_dir.'setting.php');

    // FAQ
    require_once(amJL_FAQ_dir.'FAQ.php');
    require_once(amJL_FAQ_dir.'setting.php');

    // Howto
    require_once(amJL_Howto_dir.'howto.php');
    require_once(amJL_Howto_dir.'setting.php');

    // Review
    require_once(amJL_review_dir.'review.php');
    require_once(amJL_review_dir.'setting.php');

    // Event
    require_once(amJL_event_dir.'event.php');
    require_once(amJL_event_dir.'setting.php');

    add_action('wp_head', 'amJL_description_end', 1);
}