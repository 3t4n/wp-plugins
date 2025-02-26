<?php
/**
 * Plugin Name: All In One Must Have
 * Description: Plugins synthesize the functions useful needed on a website to help you optimize your website and support you manager, security defence, seo website better.
 * Author: minhlinh100
 * Author URI: https://profiles.wordpress.org/minhlinh100
 * Version: 1.3
 * Plugin URI: https://wordpress.org/plugins/all-in-one-must-have/
 *
 */
// Define the current version
define( 'AIOMH_VERSION', '1.3' );
define( 'AIOMH_FWPCF', ABSPATH.'wp-config.php' );


//Add link setting 
function aiomh_plugin_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=all-in-one-must-have%2Findex.php">Settings</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter( "plugin_action_links_$plugin", 'aiomh_plugin_settings_link' );


//Include
include('inc/translate.php');

//add style admin
if(isset($_GET['page']) && strpos('1'.$_GET['page'],'all-in-one-must-have')) add_action( 'admin_enqueue_scripts', 'aiomh_load_admin_style' );

function aiomh_load_admin_style() {
    wp_register_style( 'all-in-one-must-have_admin',plugins_url( 'css/admin.css',__FILE__ ), false,AIOMH_VERSION );
    wp_enqueue_style( 'all-in-one-must-have_admin' );
    wp_enqueue_script('custom_admin_script', plugins_url( 'js/admin.js',__FILE__ ), array('jquery') ,AIOMH_VERSION);
}

// Function
function aiomh_check_exits_txt_file($str,$file=AIOMH_FWPCF){
    $content = file_get_contents($file);
    return strpos('1'.$content,$str)?true:false;  
}
function aiomh_FileCheckPermissions($file=AIOMH_FWPCF)
{
    if (!is_writable($file)) {
        return false;
    }
    if (!function_exists('file') || !function_exists('file_get_contents') || !function_exists('file_put_contents'))
    {
        return false;
    }
    return true;
}
function aiomh_check_exits_textarea($textarea,$string){
    $textarea = explode("\n", $textarea);
    $return = 0;
    foreach ($textarea as $value)
    {
        if(strpos('1'.$string,trim($value))) $return = 1;
    }
    return ($return==0)?false:true;
}

function aiomh_return_array_texrarea($text){
    if(strpos('1'.$text,',')) $array = str_replace(',', "\n", $text);
    $array = explode("\n", $text."\n");
    array_pop($array);

    foreach ($array as $key => $val) {
        $array[$key] = trim($val);
    }
     
    return $array;
}


//Check if wp-admin
$admins = array(
    home_url( 'wp-admin', 'relative' ),
    home_url( 'dashboard', 'relative' ),
    home_url( 'admin', 'relative' ),
    site_url( 'dashboard', 'relative' ),
    site_url( 'admin', 'relative' ),
    home_url( 'wp-login.php', 'relative' ),
    home_url( 'login', 'relative' ),
    site_url( 'login', 'relative' ),
);
if ( is_admin() || $GLOBALS['pagenow'] === 'wp-login.php' || in_array( untrailingslashit( $_SERVER['REQUEST_URI'] ), $admins ) )
define( 'AIOMH_IFADMIN', 1 );
else
define( 'AIOMH_IFADMIN', 0 );

function aiomh_register_settings() {
        register_setting( 'aiomh-setting', 'aiomh_translate' );
            if(get_option('aiomh_translate')=='') {if(get_locale()!='vi') update_option( 'aiomh_translate', 'en' ); else update_option( 'aiomh_translate', 'vi' );}
        register_setting( 'aiomh-setting', 'aiomh_ascii_file_name' );
            if(get_option('aiomh_ascii_file_name')=='') update_option( 'aiomh_ascii_file_name', 1 );
        register_setting( 'aiomh-setting', 'aiomh_jpeg_quality' );
            if(get_option('aiomh_jpeg_quality')=='') update_option( 'aiomh_jpeg_quality', 1 );
        register_setting( 'aiomh-setting', 'aiomh_jpeg_quality_value' );
            if(get_option('aiomh_jpeg_quality_value')=='') update_option( 'aiomh_jpeg_quality_value', 75 );
        register_setting( 'aiomh-setting', 'aiomh_auto_upload_and_set_thumb' );
            if(get_option('aiomh_auto_upload_and_set_thumb')=='') update_option( 'aiomh_auto_upload_and_set_thumb', 1 );
        register_setting( 'aiomh-setting', 'aiomh_post_views' );
            if(get_option('aiomh_post_views')=='') update_option( 'aiomh_post_views', 1 );
        register_setting( 'aiomh-setting', 'aiomh_check_duplicate_title' );
            if(get_option('aiomh_check_duplicate_title')=='') update_option( 'aiomh_check_duplicate_title', 1 );
        register_setting( 'aiomh-setting', 'aiomh_remove_emoji' );
            if(get_option('aiomh_remove_emoji')=='') update_option( 'aiomh_remove_emoji', 1 );
        register_setting( 'aiomh-setting', 'aiomh_remove_menu_class' );
            if(get_option('aiomh_remove_menu_class')=='') update_option( 'aiomh_remove_menu_class', 1 );
        register_setting( 'aiomh-setting', 'aiomh_remove_menu_class_value' );
            if(get_option('aiomh_remove_menu_class_value')=='') update_option( 'aiomh_remove_menu_class_value', "menu-item\ncurrent-menu-item\nmenu-item-has-children\ncurrent-menu-parent" );
        register_setting( 'aiomh-setting', 'aiomh_disable_comments' );
        register_setting( 'aiomh-setting', 'aiomh_remove_jquery' );
        register_setting( 'aiomh-setting', 'aiomh_remove_plugin_jscss' );
        register_setting( 'aiomh-setting', 'aiomh_remove_plugin_jscss_all' );
        register_setting( 'aiomh-setting', 'aiomh_remove_plugin_jscss_home' );
        register_setting( 'aiomh-setting', 'aiomh_remove_plugin_jscss_single' );
        register_setting( 'aiomh-setting', 'aiomh_remove_plugin_jscss_category' );

        register_setting( 'aiomh-setting', 'aiomh_move_js_to_footer' );
        register_setting( 'aiomh-setting', 'aiomh_move_css_to_footer' );
        register_setting( 'aiomh-setting', 'aiomh_add_js_defer' );
        register_setting( 'aiomh-setting', 'aiomh_add_js_defer_value' );
        register_setting( 'aiomh-setting', 'aiomh_add_js_async' );
        register_setting( 'aiomh-setting', 'aiomh_add_js_async_value' );

        register_setting( 'aiomh-setting', 'aiomh_html_minify' );
        register_setting( 'aiomh-setting', 'aiomh_html_minify_home_url' );
        register_setting( 'aiomh-setting', 'aiomh_html_minify_slash_end' );

//Defence
        register_setting( 'aiomh-setting', 'aiomh_change_dir_admin' );
        register_setting( 'aiomh-setting', 'aiomh_change_dir_admin_value' );
            if(get_option('aiomh_change_dir_admin_value')=='') update_option( 'aiomh_change_dir_admin_value', 'aiomh-login' );
        register_setting( 'aiomh-setting', 'aiomh_lock_wpadmin' );
        register_setting( 'aiomh-setting', 'aiomh_lock_wpadmin_user' );
        register_setting( 'aiomh-setting', 'aiomh_lock_wpadmin_pass' );
        register_setting( 'aiomh-setting', 'aiomh_disable_xmlrpc' );
        register_setting( 'aiomh-setting', 'aiomh_hidden_verwp' );
        register_setting( 'aiomh-setting', 'aiomh_change_key_salt' );
        register_setting( 'aiomh-setting', 'aiomh_change_key_salt_n' );
        register_setting( 'aiomh-setting', 'aiomh_change_key_salt_value' );
        register_setting( 'aiomh-setting', 'aiomh_change_key_salt_value_time' );
            if(get_option('aiomh_change_key_salt_value_time')=='') update_option( 'aiomh_change_key_salt_value_time', 1 );
        register_setting( 'aiomh-setting', 'aiomh_disallow_file_edit' );
            if(aiomh_check_exits_txt_file('DISALLOW_FILE_EDIT')==true) update_option( 'aiomh_disallow_file_edit', 1 );
            else update_option( 'aiomh_disallow_file_edit', 0 );
        register_setting( 'aiomh-setting', 'aiomh_disallow_file_mods' );
            if(aiomh_check_exits_txt_file('DISALLOW_FILE_MODS')==true) update_option( 'aiomh_disallow_file_mods', 1 );
            else update_option( 'aiomh_disallow_file_mods', 0 );
//wp cache
        register_setting( 'aiomh-setting', 'aiomh_cache' );
        register_setting( 'aiomh-setting', 'aiomh_cache_time' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not' );
            if(get_option('aiomh_cache_not')=='') update_option( 'aiomh_cache_not', "wp-login.php\n/my-account/\n/cart/\n/checkout/\n/tai-khoan/\n/gio-hang/\n/thanh-toan/" );
        register_setting( 'aiomh-setting', 'aiomh_cache_accepted' );            
        register_setting( 'aiomh-setting', 'aiomh_cache_bot' );
            if(get_option('aiomh_cache_bot')=='') update_option( 'aiomh_cache_bot', "bot\nia_archive\nslurp\ncrawl\nspider\nYandex" );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_home' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_single' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_page' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_archive' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_tag' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_category' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_feed' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_search' );
        register_setting( 'aiomh-setting', 'aiomh_cache_not_author' );

        register_setting( 'aiomh-setting', 'aiomh_cache_mobile' );        
        register_setting( 'aiomh-setting', 'aiomh_cache_views' );
            if(get_option('aiomh_cache_views')=='') update_option( 'aiomh_cache_views', 1 );
        register_setting( 'aiomh-setting', 'aiomh_cache_login_not' );        
}

function aiomh_create_menu(){
        add_menu_page('All In One Must Have Settings', 'AIOMH Settings', 'administrator', __FILE__, 'aiomh_settings_page',plugins_url('/images/favicon.gif', __FILE__), 1);

   add_submenu_page(__FILE__, aiomh_translate('Rút gọn html'), aiomh_translate('Rút gọn html'), 'administrator', __FILE__.'#cleanhtml', 'aiomh_settings_cleanhtml');
   add_submenu_page(__FILE__, aiomh_translate('Bảo mật website'), aiomh_translate('Bảo mật website'), 'administrator', __FILE__.'#security', 'aiomh_settings_security');
   add_submenu_page(__FILE__, aiomh_translate('Cài đặt cache'), aiomh_translate('Cài đặt cache'), 'administrator', __FILE__.'#cache', 'aiomh_settings_cache');
   if(get_option('aiomh_cache')==1) add_submenu_page(__FILE__, aiomh_translate('Xóa toàn bộ cache'), aiomh_translate('Xóa toàn bộ cache'), 'administrator', __FILE__.'&removecached=1', 'aiomh_settings_cache_remove');

    add_action( 'admin_init', 'aiomh_register_settings' );
}
add_action('admin_menu', 'aiomh_create_menu');
$aiomh_ascii_file_name = get_option('aiomh_ascii_file_name');

function create_aiomh_menu() {
    global $wp_admin_bar;
    $menu_id = 'aiomh';
    $wp_admin_bar->add_menu(array('id' => $menu_id, 'title' => '<img style="vertical-align:middle;margin-bottom:5px" src="'.plugins_url('/images/favicon.gif', __FILE__).'" alt=""> '.aiomh_translate('AIOMH Settings'), 'href' => 'admin.php?page=all-in-one-must-have%2Findex.php'));
    $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => aiomh_translate('Rút gọn html'), 'id' => 'aiomh-clean', 'href' => 'admin.php?page=all-in-one-must-have%2Findex.php#cleanhtml'));
    $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => aiomh_translate('Bảo mật website'), 'id' => 'aiomh-security', 'href' => 'admin.php?page=all-in-one-must-have%2Findex.php#security'));
    $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => aiomh_translate('Cài đặt cache'), 'id' => 'aiomh-cache', 'href' => 'admin.php?page=all-in-one-must-have%2Findex.php#cache'));
    if(get_option('aiomh_cache')==1) $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => aiomh_translate('Xóa toàn bộ cache'), 'id' => 'aiomh-cache-remove', 'href' => 'admin.php?page=all-in-one-must-have%2Findex.php&removecached=1'));

}
add_action('admin_bar_menu', 'create_aiomh_menu', 2000);


function aiomh_settings_page() {
?>
<div class="wrap">
<h2><?php echo aiomh_translate('Cài đặt All In One Must Have')?></h2>

<?php
// Add form and function change prefix
include('inc/change-prefix.php');
?>

<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<?php if( isset($_GET['removecached']) ) { 
    aiomh_cache_delete_folder();
    ?>
    <div id="message" class="updated">
        <p><strong><?php echo aiomh_translate('Đã xóa toàn bộ cache được lưu') ?>.</strong></p>
    </div>
<?php } ?>


<form id="aiomh_form_setting" method="post" action="options.php">
    <?php settings_fields( 'aiomh-setting' ); ?>

 
<div class="aiomh-box">
    <h2 style="display: inline-block;"><?php echo aiomh_translate('Lựa chọn ngôn ngữ')?>:</h2>
        <select id="aiomh_change_lang" name="aiomh_translate">
            <option <?php if(get_option('aiomh_translate')=='vi') echo 'selected ';?>value="vi">Tiếng Việt</option>
            <option <?php if(get_option('aiomh_translate')=='en') echo 'selected ';?>value="en">English</option>
        </select>
</div>


<div class="aiomh-box">
    <h2><?php echo aiomh_translate('Ảnh và upload file')?></h2>
    <div class="aiomh-ccb">
        <input type="text" name="aiomh_ascii_file_name" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_ascii_file_name')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_ascii_file_name')==''?1:get_option('aiomh_auto_upload_and_set_thumb'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Xóa dấu utf-8 và ký tự đặc biệt tên file upload lên website')?></span>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_jpeg_quality" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_jpeg_quality')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_jpeg_quality'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Nén giảm chất lượng ảnh khi upload lên host')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_jpeg_quality')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Chất lượng ảnh')?>:
            <?php $aiomh_jpeg_quality_value = get_option('aiomh_jpeg_quality_value')==''?75:get_option('aiomh_jpeg_quality_value');
            ?>
            <input type="range" id="aiomh_jpeg_quality_svalue" min="10" max="100" value="<?php echo $aiomh_jpeg_quality_value?>">
            <input type="number" id="aiomh_jpeg_quality_value" name="aiomh_jpeg_quality_value" min="10" max="100" value="<?php echo $aiomh_jpeg_quality_value?>"> (<?php echo aiomh_translate('Giá trị tốt nhất 75 ~ 85, 100 là giữ nguyên như ảnh gốc')?>)
        </div>
    </div>  
    
    <div class="aiomh-ccb">
        <input type="text" name="aiomh_post_views" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_auto_upload_and_set_thumb')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_post_views')==''?0:get_option('aiomh_auto_upload_and_set_thumb'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tự động chọn thumbnail cho bài viết và upload các link ảnh có liên kết ngoài lên website của bạn')?></span>
    </div>

</div>
 
<div class="aiomh-box">
    <h2><?php echo aiomh_translate('Tiện ích khác')?></h2>
    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_auto_upload_and_set_thumb" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_post_views')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_post_views')==''?0:get_option('aiomh_post_views'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Đếm và hiển thị lượt xem bài viết')?></span>
        </div>

        <div class="aiomh-hcb <?php if(get_option('aiomh_post_views')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Để hiển thị số lượt xem vui lòng sử dụng: &lt;?php echo getPostViews(get_the_ID())?&gt;. Có thể thay get_the_ID() bằng ID bài viết bạn muốn hiển thị')?>
        </div>

    </div>
    <div class="aiomh-ccb">
        <input type="text" name="aiomh_check_duplicate_title" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_check_duplicate_title')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_check_duplicate_title')==''?0:get_option('aiomh_check_duplicate_title'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tự động kiểm tra và cảnh báo bài viết trùng tiêu đề')?></span>
    </div>

    <div class="aiomh-ccb">
        <input type="text" name="aiomh_disable_comments" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_disable_comments')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_disable_comments')==''?0:get_option('aiomh_disable_comments'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tắt bình luận wordpress')?></span>
    </div>

</div>

<div id="cleanhtml" class="aiomh-box">
    <h2><?php echo aiomh_translate('Tối ưu nén giảm html')?></h2>
    <p><?php echo aiomh_translate('Loại bỏ code html thừa, rút gọn html, tối ưu tốc độ tải trang')?></p>
    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_html_minify" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_html_minify')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_html_minify')==''?0:get_option('aiomh_html_minify'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Nén giảm html, loại bỏ khoảng trắng, xóa comment html')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_html_minify')!=1) echo 'dnone';?>">
              <input type="checkbox" name="aiomh_html_minify_home_url" value="<?php echo get_option('aiomh_html_minify_home_url')==''?0:get_option('aiomh_html_minify_home_url'); ?>" <?php if (get_option('aiomh_html_minify_home_url')==1) echo 'checked'?>><?php echo aiomh_translate('Thay thế').' <code>'.home_url('/').'</code> '.aiomh_translate('thành').' <code>/</code>'?><br>
              <input type="checkbox" name="aiomh_html_minify_slash_end" value="<?php echo get_option('aiomh_html_minify_slash_end')==''?0:get_option('aiomh_html_minify_slash_end'); ?>" <?php if (get_option('aiomh_html_minify_slash_end')==1) echo 'checked'?>><?php echo aiomh_translate('Thay thế').' <code>/></code> '.aiomh_translate('thành').' <code>></code>'?>
        </div>
    </div> 

    <div class="aiomh-ccb">
        <input type="text" name="aiomh_remove_emoji" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_remove_emoji')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_remove_emoji')==''?0:get_option('aiomh_remove_emoji'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Xóa script EMOJI trong thẻ &lt;head&gt;')?> </span>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_remove_menu_class" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_remove_menu_class')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_remove_menu_class'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Xóa id và class trong html menu')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_remove_menu_class')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Giữ lại các class')?>:<br>
            <textarea name="aiomh_remove_menu_class_value" cols="40" rows="4" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_remove_menu_class_value')?></textarea><br>
            (<?php echo aiomh_translate('Các class cách nhau bằng dấu "," hoặc xuống dòng, để trống là xóa tất cả. Mặc định')?>: menu-item,current-menu-item,menu-item-has-children,current-menu-parent)
        </div>
    </div>

    <div class="aiomh-ccb">
        <input type="text" name="aiomh_remove_jquery" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_remove_jquery')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_remove_jquery')==''?0:get_option('aiomh_remove_jquery'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Xóa jquery mặc định của wordpress')?> </span>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_remove_plugin_jscss" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_remove_plugin_jscss')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_remove_plugin_jscss')==''?0:get_option('aiomh_remove_plugin_jscss'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Xóa js và css của các plugins thêm vào website')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_remove_plugin_jscss')!=1) echo 'dnone';?>">
            (<?php echo aiomh_translate('Các id cách nhau bằng dấu "," hoặc xuống dòng. Ví dụ bạn muốn xóa css và js plugins kk Star Ratings nhập vào')?>: bhittani_plugin_kksr,bhittani_plugin_kksr_js)<br><br>
            <span class="ttl02"><?php echo aiomh_translate('Xóa ở toàn trang')?></span>
            <textarea name="aiomh_remove_plugin_jscss_all" cols="40" rows="2" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_remove_plugin_jscss_all')?></textarea><br>
            <span class="ttl02"><?php echo aiomh_translate('Xóa ở trang chủ')?></span>
            <textarea name="aiomh_remove_plugin_jscss_home" cols="40" rows="2" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_remove_plugin_jscss_home')?></textarea><br>
            <span class="ttl02"><?php echo aiomh_translate('Xóa ở trang bài viết')?></span>
            <textarea name="aiomh_remove_plugin_jscss_single" cols="40" rows="2" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_remove_plugin_jscss_single')?></textarea><br>
            <span class="ttl02"><?php echo aiomh_translate('Xóa ở trang danh mục')?></span>
            <textarea name="aiomh_remove_plugin_jscss_category" cols="40" rows="2" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_remove_plugin_jscss_category')?></textarea><br>

        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_move_js_to_footer" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_move_js_to_footer')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_move_js_to_footer')==''?0:get_option('aiomh_move_js_to_footer'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Di chuyển toàn bộ js trong head xuống chân trang')?> (wp_footer())</span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_move_js_to_footer')!=1) echo 'dnone';?>">
              <input type="checkbox" name="aiomh_move_css_to_footer" value="<?php echo get_option('aiomh_move_css_to_footer')==''?0:get_option('aiomh_move_css_to_footer'); ?>" <?php if (get_option('aiomh_move_css_to_footer')==1) echo 'checked'?>><?php echo aiomh_translate('Di chuyển cả css xuống chân trang')?>
        </div>
    </div>  
    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_add_js_async" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_add_js_async')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_add_js_async')==''?0:get_option('aiomh_add_js_async'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Thêm async vào script')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_add_js_async')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Nhập vào id handles')?>:<br>
            
            <textarea name="aiomh_add_js_async_value" cols="40" rows="4" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_add_js_async_value')?></textarea><br>
            <?php echo aiomh_translate('Thêm id handles cách nhau bằng dấu "," hoặc xuống dòng. Ví dụ cần thêm vào js của plugins kk Star Plugins nhập vào')?>: bhittani_plugin_kksr_js
        </div>
    </div>  

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_add_js_defer" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_add_js_defer')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_add_js_defer')==''?0:get_option('aiomh_add_js_defer'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Thêm defer vào script')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_add_js_defer')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Nhập vào id handles')?>:<br>
            <textarea name="aiomh_add_js_defer_value" cols="40" rows="4" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_add_js_defer_value')?></textarea><br>
            <?php echo aiomh_translate('Thêm id handles cách nhau bằng dấu "," hoặc xuống dòng. Ví dụ cần thêm vào js của plugins kk Star Plugins nhập vào')?>: bhittani_plugin_kksr_js
        </div>
    </div>    
    

</div>

<div id="security" class="aiomh-box">
    <h2><?php echo aiomh_translate('Bảo mật website')?></h2>
    
    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_change_dir_admin" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_change_dir_admin')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_change_dir_admin')==''?0:get_option('aiomh_change_dir_admin'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Đổi đường đẫn đăng nhập wp-admin')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_change_dir_admin')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Đổi wp-admin thành')?> :
            <input type="text" name="aiomh_change_dir_admin_value" value="<?php echo get_option('aiomh_change_dir_admin_value');?>"  minlength="4" maxlength="20" required="required" <?php if(get_option('aiomh_change_dir_admin')!=1) echo 'disabled';?>> (<?php echo aiomh_translate('Tối đa 20 ký tự, không sử dụng ký tự đặc biệt ngoài dấu "-"')?>.)
            <p><b><?php echo aiomh_translate('Bước')?> 1:</b> <?php echo aiomh_translate('Nhập đường dẫn vào ô trên sau đó lưu cài đặt')?></p>

<?php
if(strpos('1'.$_SERVER["SERVER_SOFTWARE"],'nginx'))
{
?>
            <p><b><?php echo aiomh_translate('Bước')?> 2:</b> <?php echo aiomh_translate('Thêm đoạn code sau vào nginx config của bạn:')?></p>
            <code>
                location / {
                rewrite ^/<?php echo get_option('aiomh_change_dir_admin_value')?>? /wp-login.php?ok=<?php echo get_option('aiomh_change_dir_admin_value')?> last;
                }
            </code>
            <p><b><?php echo aiomh_translate('Bước')?> 3:</b> <?php echo aiomh_translate('Hoàn thành, truy cập wp-admin của bạn thông qua lựa chọn của bạn. Ví dụ')?>: <a href="<?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?>" target="_blank"><?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?></a></p>
            <p style="color:red"><?php echo aiomh_translate('Lưu ý nếu bạn không thể chỉnh sửa ngix config có thể truy cập wp-admin bằng đường dẫn:')?><a href="<?php echo home_url( '/' ).'wp-login.php?ok='.get_option('aiomh_change_dir_admin_value').'/'?>" target="_blank"><?php echo home_url( '/' ).'wp-login.php?ok='.get_option('aiomh_change_dir_admin_value')?></a></p>
<?php
}
else    
{?>
<?php
    if (is_writable(ABSPATH.'.htaccess')) {
?>
            <p><b><?php echo aiomh_translate('Bước')?> 2:</b> <?php echo aiomh_translate('Truy cập')?> <a href="<?php echo site_url( '/wp-admin/options-permalink.php');?>" target="_blank"><?php echo site_url( '/wp-admin/options-permalink.php');?></a>, <?php echo aiomh_translate('nhấp lại lưu cài đạt Permalink')?></p>
            <p><b><?php echo aiomh_translate('Bước')?> 3:</b> <?php echo aiomh_translate('Hoàn thành, truy cập wp-admin của bạn thông qua lựa chọn của bạn. Ví dụ')?> : <a href="<?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?>" target="_blank"><?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?></a></p>
<?php
    }
    else
    {
?>
    <p style="color:red"><b><?php echo aiomh_translate('Bước')?> 2:</b><?php echo aiomh_translate('File .htaccess của bạn không có quyền chỉnh sửa. Bạn có hai lựa chọn')?></p>
    <p>- Thêm thủ công trong file .htaccess của bạn:<p>
    <code>RewriteEngine On<br>RewriteRule ^<?php echo get_option('aiomh_change_dir_admin_value')?>? /nhahosinh.net/wp-login.php?ok=<?php echo get_option('aiomh_change_dir_admin_value')?> [QSA,L]
    </code>
    <p><?php echo aiomh_translate('Hoàn thành, truy cập wp-admin của bạn thông qua lựa chọn của bạn. Ví dụ')?> : <a href="<?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?>" target="_blank"><?php echo home_url( '/' ).get_option('aiomh_change_dir_admin_value').'/'?></a></p>
    <p>- Hoặc truy cập bằng đường dẫn: <a href="<?php echo home_url( '/' ).'wp-login.php?ok='.get_option('aiomh_change_dir_admin_value').'/'?>" target="_blank"><?php echo home_url( '/' ).'wp-login.php?ok='.get_option('aiomh_change_dir_admin_value')?></a></p>
<?php        
    }
}
?>
        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_lock_wpadmin" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_lock_wpadmin')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_lock_wpadmin')==''?0:get_option('aiomh_lock_wpadmin'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tạo mật khẩu bảo vệ wp-admin')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_lock_wpadmin')!=1) echo 'dnone';?>">

            <?php echo aiomh_translate('Tài khoản')?>:
            <input type="text" name="aiomh_lock_wpadmin_user" value="<?php echo get_option('aiomh_lock_wpadmin_user');?>" maxlength="20" required="required" <?php if(get_option('aiomh_lock_wpadmin')!=1) echo 'disabled';?>>

            <br><?php echo aiomh_translate('Mật khẩu')?>:
            <input type="text" name="aiomh_lock_wpadmin_pass" value="<?php echo get_option('aiomh_lock_wpadmin_pass');?>" maxlength="20" required="required" <?php if(get_option('aiomh_lock_wpadmin')!=1) echo 'disabled';?>>

        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_disallow_file_edit" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_disallow_file_edit')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_disallow_file_edit')==''?0:get_option('aiomh_disallow_file_edit'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Không cho phép chỉnh sửa file trong themes,plugins trên wp-admin')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_disallow_file_edit')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Nhằm nâng cao tính bảo mật nếu bạn muốn tắt tính năng này mở file wp-config.php và loại bỏ dòng')?>: define('DISALLOW_FILE_EDIT',true);
        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_disallow_file_mods" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_disallow_file_mods')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_disallow_file_mods')==''?0:get_option('aiomh_disallow_file_mods'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Không cho phép thêm mới plugins,themes trên wp-admin')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_disallow_file_mods')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Nhằm nâng cao tính bảo mật nếu bạn muốn tắt tính năng này mở file wp-config.php và loại bỏ dòng')?>: define('DISALLOW_FILE_MODS',true);
        </div>
    </div>


    <div class="aiomh-ccb">
        <input type="text" name="aiomh_disable_xmlrpc" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_disable_xmlrpc')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_disable_xmlrpc')==''?0:get_option('aiomh_disable_xmlrpc'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tắt XML-RPC')?></span>
    </div>


    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_hidden_verwp" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_hidden_verwp')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_hidden_verwp')==''?0:get_option('aiomh_hidden_verwp'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Giấu thông tin phiên bản wordpress đang sử dụng')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_hidden_verwp')!=1) echo 'dnone';?>">
            <?php echo aiomh_translate('Xóa thông tin trong head, xóa file readme mặc định của wordpress').' '.home_url( '/' ).'readme.html'?>
        </div>
    </div>

    <div>
        <?php
        global $wpdb;
        $current_prefix=$wpdb->prefix;
        $aiomh_change_prefix = ($current_prefix=='wp_')?1:0;
        ?>
        <div class="aiomh-ccb">
            <input type="text" class="aiomh-cb aiomh-cb-<?php echo $aiomh_change_prefix!=0?'off':'on';?>" value="<?php echo $aiomh_change_prefix==1?0:1; ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Không sử dụng tiền tố cơ sở dữ liệu mặc định của wordpress')?></span>
        </div>
        <div class="aiomh-hcb <?php if($aiomh_change_prefix!=0) echo 'dnone';?>">
            <?php 
                if($aiomh_change_prefix==1)
                    echo aiomh_translate('Bạn không nên để tiền tố là giá trị mặc định ').'. <a href="javascript:void(0)" class="show-change-prefix">'.aiomh_translate('Click vào đây để đổi tiền tố').'</a>';
                else
                    echo aiomh_translate('Bạn đã đổi tiền tố mặc định, tiền tố hiện tại của bạn là').' '.$current_prefix.'. <a href="javascript:void(0)" class="show-change-prefix">'.aiomh_translate('Click vào đây để đổi tiền tố').'</a>';
            ?>
        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_change_key_salt" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_change_key_salt')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_change_key_salt')==''?0:get_option('aiomh_change_key_salt'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tự động thay đổi KEY SALT, khóa bảo mật của wordpress')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_change_key_salt')!=1) echo 'dnone';?>">
            <?php if(aiomh_FileCheckPermissions()!=true)
                    echo '<strong style="color:red">'.aiomh_translate('Cảnh báo: file wp-config không có quyền chỉnh sửa. Do đó bạn không sử dụng được chức năng này, nếu muốn thay đổi khóa bảo mật bạn phải sửa file wp-config một cách thủ công, lấy khóa mới tại').'</strong> : <a href="https://api.wordpress.org/secret-key/1.1/salt/" target=_blank>https://api.wordpress.org/secret-key/1.1/salt/</a>';
            ?>        
            <?php echo aiomh_translate('Tự động thay đổi sau')?>:
            <input type="number" name="aiomh_change_key_salt_value" value="<?php echo get_option('aiomh_change_key_salt_value');?>" min="1" max="365" required="required" <?php if(get_option('aiomh_change_key_salt')!=1) echo 'disabled';?>> <?php echo aiomh_translate('ngày')?>.<br>
           <br>
            <input type="checkbox" name="aiomh_change_key_salt_now" value="0"><?php echo aiomh_translate('Thay đổi ngay lập tức, lựa chọn sau đó nhấp lưu cài đặt')?>.<br>
            <?php echo aiomh_translate('Khóa bảo mật rất quan trọng, bạn nên thay đổi thường xuyên hoặc ngay lập tức khi website bị tấn công. Công cụ cũng thay đổi ngay lập tức khi bạn nhấp lưu thay đổi ở chân trang')?>
        </div>
    </div>

</div>



<div id="cache" class="aiomh-box">
    <h2><?php echo aiomh_translate('Cache tăng tốc website')?></h2>
    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_cache" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_cache')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_cache')==''?0:get_option('aiomh_cache'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Bật cache')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_cache')!=1) echo 'dnone';?>">
            <h3><?php echo aiomh_translate('Thời gian cache')?></h3>
            <div class="counttime">
                <?php echo aiomh_translate('Xóa cache cũ sau')?>:
                <?php
                    $aiomh_cache_time = get_option('aiomh_cache_time');
                    $ctdate = floor(($aiomh_cache_time%2592000)/86400);
                    $cthours = floor(($aiomh_cache_time%86400)/3600);
                    $ctminutes = floor(($aiomh_cache_time%3600)/60);
                ?>
                <input class="ctdate" type="number" value="<?php echo $ctdate?>" min="0" max="365" required="required" <?php if(get_option('aiomh_cache')!=1) echo 'disabled';?>><?php echo aiomh_translate('ngày')?>
                <input class="cthours" type="number" value="<?php echo $cthours?>" min="0" max="8760" required="required" <?php if(get_option('aiomh_cache')!=1) echo 'disabled';?>><?php echo aiomh_translate('giờ')?>
                <input class="ctminutes" type="number" value="<?php echo $ctminutes?>" min="0" max="525600" required="required" <?php if(get_option('aiomh_cache')!=1) echo 'disabled';?>><?php echo aiomh_translate('phút')?>

                <input class="ctvalue" type="hidden" name="aiomh_cache_time" value="<?php echo get_option('aiomh_cache_time');?>">
            </div>  
            <h3><?php echo aiomh_translate('Cài đặt các trang được phép cache')?></h3>
            <h4><?php echo aiomh_translate('Không cache các loại trang sau')?>:</h4>
            <input type="checkbox" name="aiomh_cache_not_home" value="<?php echo get_option('aiomh_cache_not_home')==''?0:get_option('aiomh_cache_not_home'); ?>" <?php if (get_option('aiomh_cache_not_home')==1) echo 'checked'?>><?php echo aiomh_translate('Trang chủ')?> (is_home || is_front_page)<br>
            <input type="checkbox" name="aiomh_cache_not_category" value="<?php echo get_option('aiomh_cache_not_category')==''?0:get_option('aiomh_cache_not_category'); ?>" <?php if (get_option('aiomh_cache_not_category')==1) echo 'checked'?>><?php echo aiomh_translate('Danh mục')?> (is_category)<br>            
            <input type="checkbox" name="aiomh_cache_not_single" value="<?php echo get_option('aiomh_cache_not_single')==''?0:get_option('aiomh_cache_not_single'); ?>" <?php if (get_option('aiomh_cache_not_single')==1) echo 'checked'?>><?php echo aiomh_translate('Bài viết')?> (is_single)<br>
            <input type="checkbox" name="aiomh_cache_not_page" value="<?php echo get_option('aiomh_cache_not_page')==''?0:get_option('aiomh_cache_not_page'); ?>" <?php if (get_option('aiomh_cache_not_page')==1) echo 'checked'?>><?php echo aiomh_translate('Trang')?> (is_page)<br>
            <input type="checkbox" name="aiomh_cache_not_archive" value="<?php echo get_option('aiomh_cache_not_archive')==''?0:get_option('aiomh_cache_not_archive'); ?>" <?php if (get_option('aiomh_cache_not_archive')==1) echo 'checked'?>><?php echo aiomh_translate('Lưu trữ')?> (is_archive)<br>
            <input type="checkbox" name="aiomh_cache_not_tag" value="<?php echo get_option('aiomh_cache_not_tag')==''?0:get_option('aiomh_cache_not_tag'); ?>" <?php if (get_option('aiomh_cache_not_tag')==1) echo 'checked'?>><?php echo aiomh_translate('Tags')?> (is_tag)<br>
            <input type="checkbox" name="aiomh_cache_not_feed" value="<?php echo get_option('aiomh_cache_not_feed')==''?0:get_option('aiomh_cache_not_feed'); ?>" <?php if (get_option('aiomh_cache_not_feed')==1) echo 'checked'?>><?php echo aiomh_translate('Feeds')?> (is_feed)<br>
            <input type="checkbox" name="aiomh_cache_not_search" value="<?php echo get_option('aiomh_cache_not_search')==''?0:get_option('aiomh_cache_not_search'); ?>" <?php if (get_option('aiomh_cache_not_search')==1) echo 'checked'?>><?php echo aiomh_translate('Tìm kiếm')?> (is_search)<br>
            <input type="checkbox" name="aiomh_cache_not_author" value="<?php echo get_option('aiomh_cache_not_author')==''?0:get_option('aiomh_cache_not_author'); ?>" <?php if (get_option('aiomh_cache_not_author')==1) echo 'checked'?>><?php echo aiomh_translate('Tác giả')?> (is_author)<br>
            
            <h4><?php echo aiomh_translate('Không cache khi có các chuỗi sau ở đường dẫn')?>:</h4>
            <textarea name="aiomh_cache_not" cols="40" rows="7" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_cache_not')?></textarea>

            <h4><?php echo aiomh_translate('Vẫn cache khi trong url có các chuỗi sau')?>:</h4>
            <textarea name="aiomh_cache_accepted" cols="40" rows="7" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_cache_accepted')?></textarea>
            <h3><?php echo aiomh_translate('Ngăn chặn bot tạo ra file cache')?></h3>
            <p><?php echo aiomh_translate('Chặn không tạo ra file cache mới khi trong "User Agent" thuộc các chuỗi sau')?>:</p>
            <textarea name="aiomh_cache_bot" cols="40" rows="7" style="min-width: 50%; font-size: 12px;" class="code"><?php echo get_option('aiomh_cache_bot')?></textarea>
            <p><?php echo aiomh_translate('Lưu ý nếu đã có nội dung cache sẽ vẫn hiển thị đối với bot khi truy cập')?>.</p>            
        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_cache_mobile" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_cache_mobile')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_cache_mobile')==''?0:get_option('aiomh_cache_mobile'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Cache riêng cho phiên bản mobile')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_cache_mobile')!=1) echo 'dnone';?>">
            <p><?php echo aiomh_translate('Bắt buộc phải dùng chức năng này khi website của bạn sử dụng hai giao diện riêng biệt cho bản desktop và mobile. Nếu bạn sử dụng reponsive thì không nên bật chức năng này')?>.</p>      
        </div>
    </div>

    <div>
        <div class="aiomh-ccb">
            <input type="text" name="aiomh_cache_mobile" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_cache_views')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_cache_views')==''?0:get_option('aiomh_cache_views'); ?>">
            <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tính lượt xem bài viết khi bật cache')?></span>
        </div>
        <div class="aiomh-hcb <?php if(get_option('aiomh_cache_views')!=1) echo 'dnone';?>">
            <p><?php echo aiomh_translate('Chỉ hoạt động nếu bạn sử dụng chức năng đếm lượt xem bài viết trên plugin này. Lượt xem bài viết sẽ được hiển thị đúng khi cập nhật bản cache mới')?>.</p>      
        </div>
    </div>

    <div class="aiomh-ccb">
        <input type="text" name="aiomh_cache_login_not" class="aiomh-cb aiomh-cb-<?php echo get_option('aiomh_cache_login_not')!=1?'off':'on';?>" value="<?php echo get_option('aiomh_cache_login_not')==''?0:get_option('aiomh_cache_login_not'); ?>">
        <span class="aiomh-cb-lb"><?php echo aiomh_translate('Tắt cache khi thành viên đăng nhập')?></span>
    </div>

</div>

    <?php submit_button(); ?>
</form>




<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHfwYJKoZIhvcNAQcEoIIHcDCCB2wCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAkSUuUF6Y38jDkUpTTDOweRIfvjBO6D/c5cbRBE4mGUdKsEIm1aVNZEKelFP0+be9b+NT62QC78XcuQirHrlmehVOyDDe8uInoAB8GrZYGVjwvxf8GUE2LnccsbPs8eO8K24dnD5CMq3w9V5Nz7mNaLKjZ2aDkB3/g3AanY5VBCDELMAkGBSsOAwIaBQAwgfwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIv6zXMtYoUymAgditxdTWBrGW8vkBdnivE2nW3XlAnqYlv/EabFzKcuN0C0U25UqEY0VbTRi7wy6/2fcvAAyox3uBbob34sbsZNUC+HAn88UMYyS44duPjz6GO+fsUHF2XGJMVdtdzoRDesb+ozlVBfAo7uaqWQUnioL3RaOLx0GgQOXXAD6MuWjl6Sljd+xQOf/LhhkmabWsMATQdcsk4IQszNF1XmsrDZfDzKO3DwauSS6PTy11GjAFtIMZgcziGH8vMEZyf6dymS644SXF7WW8qeLmEHklGunGSHFGN0NCG+OgggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNzA3MTMwMjUxMDJaMCMGCSqGSIb3DQEJBDEWBBRntI7fbdRFQT+99K1aHioH63WTWTANBgkqhkiG9w0BAQEFAASBgB4WoubuIU1UGOIyh8Q/MFTdzn4l+zQi7/Rl7sWiKdwGfx1miT/hDnSm1kDfrnCMrg9CVdjqwbudQOKzUq6xDtOoHkxqAllQO5zNTeXDMUgkZf0JK+l4YZlyhBZZhUN1qxN39QgyTde9dQz3Qvmu4jElUPjceI3fxClcCTQDtPTe-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>
<?php
}//END function aiomh_settings_page

// Xóa dấu tên file
function aiomh_sanitize_file_name( $filename ) {
    $sanitized_filename = remove_accents( $filename ); // Convert to ASCII
    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );
    $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase 
    return $sanitized_filename;
}
if(get_option('aiomh_ascii_file_name')==1) add_filter( 'sanitize_file_name', 'aiomh_sanitize_file_name', 10, 1 );

// Nén ảnh
if(get_option('aiomh_jpeg_quality')==1) add_filter('jpeg_quality', function($arg){
    $aiomh_jpeg_quality_value = get_option('aiomh_jpeg_quality_value')==''?75:get_option('aiomh_jpeg_quality_value');
    return $aiomh_jpeg_quality_value;
});

// Tự thêm thumbnail
if(get_option('aiomh_auto_upload_and_set_thumb')==1)
{
    function aiomh_sb_get_first_image_url_from_text($content) {
        $doc = new DOMDocument();
        @$doc->loadHTML($content);
        $xpath = new DOMXPath($doc);
        $src = $xpath->evaluate('string(//img/@src)');
        return $src;
    }
     
    function aiomh_sb_get_image_attachments($post_id) {
        return get_children(array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image'));
    }
     
    function aiomh_sb_get_first_image_attachment($post_id) {
        $attach_images = aiomh_sb_get_image_attachments($post_id);
        $result = null;
        if(count($attach_images) > 0) {
            $result = array_shift($attach_images);
        }
        return $result;
    }
     
    function aiomh_sb_create_folder($file_path) {
        if(!file_exists($file_path)) {
            mkdir($file_path);
        }
    }
     
    function aiomh_sb_copy($source, $destination) {
        if(@fclose(@fopen($source, 'r'))) {
            copy($source, $destination);
            return true;
        }
        return false;
    }
     
    function aiomh_sb_set_post_thumbnail($post_id) {
        if(current_theme_supports('post-thumbnails') && !has_post_thumbnail($post_id)) {
            $first_image = aiomh_sb_get_first_image_attachment($post_id);
            if($first_image) {
                set_post_thumbnail($post_id, $first_image->ID);
                return true;
            } else {
                $post = get_post($post_id);
                if($post) {
                    $first_image = aiomh_sb_get_first_image_url_from_text($post->post_content);
                    $attach_id = aiomh_sb_fetch_media($first_image);
                    if($attach_id > 0) {
                        set_post_thumbnail($post_id, $attach_id);
                        return true;
                    }
                }
            }
        }
        return false;
    }
     
    function aiomh_sb_auto_set_thumbnail($post_id) {
        if (wp_is_post_revision($post_id)) {
            return;
        }
        aiomh_sb_set_post_thumbnail($post_id);
    }
    add_action('save_post', 'aiomh_sb_auto_set_thumbnail');

    function aiomh_sb_fetch_media($image_url) {
        $attach_id = 0;
        $wp_upload_dir = wp_upload_dir();
        $base_dir = trailingslashit($wp_upload_dir['basedir']) . 'aiomh-img';
        $base_url = trailingslashit($wp_upload_dir['url']) . 'aiomh-img';
        aiomh_sb_create_folder($base_dir);
        $parts = pathinfo($image_url);
        $random = rand();
        $random = md5($random);
        $file_name = 'aiomh-img-' . $parts['filename'] . '-' . $random . '.' . $parts['extension'];
        $file_path = trailingslashit($base_dir) . $file_name;
        $file_url = trailingslashit($base_url) . $file_name;
        if(aiomh_sb_copy($image_url, $file_path)) {
            $attachment = array(
                'guid' => $file_url
            );
            $attach_id = aiomh_sb_insert_attachment($attachment, $file_path);
        }
        return $attach_id;
    }

    function aiomh_sb_insert_attachment($attachment, $file_path) {
        if(!file_exists($file_path)) {
            return 0;
        }
        $file_type = wp_check_filetype(basename($file_path), null);
        $attachment['post_mime_type'] = $file_type['type'];
        if(!isset($attachment['guid'])) {
            return 0;
        }
        $attachment['post_status'] = isset($attachment['post_status']) ? $attachment['post_status'] : 'inherit';
        if(!isset($attachment['post_title'])) {
            $attachment['post_title'] = preg_replace('/\.[^.]+$/', '', basename($file_path));
        }
        $attach_id = wp_insert_attachment($attachment, $file_path);
        if($attach_id > 0) {
            aiomh_sb_update_attachment_meta($attach_id, $file_path);
        }
        return $attach_id;
    }


    function aiomh_sb_update_attachment_meta($attach_id, $file_path) {
        if(!function_exists('wp_generate_attachment_metadata')) {
            require_once(ABSPATH . 'wp-admin/includes/image.php');
        }
        $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
        wp_update_attachment_metadata($attach_id, $attach_data);
    }
}


// Đếm lượt xem
if(get_option('aiomh_post_views')==1)
{
    add_action('wp_loaded', 'aiomh_auto_set_post_view2'); 
    function aiomh_auto_set_post_view2() {
        if (!function_exists('getPostViews'))
        {
            function getPostViews($postID){ // hàm này dùng để lấy số người đã xem qua bài viết
                $count_key = 'post_views_count';
                $count = get_post_meta($postID, $count_key, true);
                if($count==''){ // Nếu như lượt xem không có
                    delete_post_meta($postID, $count_key);
                    add_post_meta($postID, $count_key, '0');
                    return "0"; // giá trị trả về bằng 0
                }
                return $count; // Trả về giá trị lượt xem
            }        
        }

        if(!function_exists('setPostViews'))
        {
            function setPostViews($postID) {// hàm này dùng để set và update số lượt người xem bài viết.
                $count_key = 'post_views_count';
                $count = get_post_meta($postID, $count_key, true);
                if($count==''){
                    $count = 0;
                    delete_post_meta($postID, $count_key);
                    add_post_meta($postID, $count_key, '0');
                }else{
                    $count++; // cộng đồn view
                    update_post_meta($postID, $count_key, $count); // update count
                }
            }
        }

        add_action('wp_enqueue_scripts', 'aiomh_auto_set_post_view'); 
        function aiomh_auto_set_post_view() {
            if(is_single())
            {
                    global $post;
                    setPostViews($post->ID);
            }
        }
    }
}

// Kiểm tra tiêu đề trùng
if(get_option('aiomh_check_duplicate_title')==1)
{
    function aiomh_add_my_admin_script(){
        wp_enqueue_script('admin_script', plugins_url( 'all-in-one-must-have/js/check_duplicate_title.js' ), array('jquery'),AIOMH_VERSION);
        wp_localize_script( 'admin_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
    }
    add_action('admin_enqueue_scripts', 'aiomh_add_my_admin_script');   

    add_action( 'wp_ajax_my_action', 'aiomh_my_action_callback' );
    function aiomh_my_action_callback() {
        global $wpdb;
        $title_exists = $wpdb->get_results( 
            "
            SELECT ID
            FROM $wpdb->posts
            WHERE  
                post_title LIKE '" . $_POST['this_convidado_title'] . "'
            AND
                post_type = '" . $_POST['post_type'] .  "'    
            "
        );
        if($_POST['post_ID'] != ""){
            foreach ($title_exists as $key => $this_id) {
                if($_POST['post_ID'] == $this_id->ID){
                    $this_is_the_post = $this_id->ID;
                }
            }
        }
        if($this_is_the_post){
            echo (count($title_exists)-1);
        } else {
            echo count($title_exists);
        }
        die();
    }    
}

// REMOVE WP EMOJI
if(get_option('aiomh_remove_emoji')==1)
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
}

// Remove nav id + class menu
if(get_option('aiomh_remove_menu_class')==1)
{
    add_filter('nav_menu_css_class', 'aiomh_css_attributes_filter', 100, 1);
    add_filter('nav_menu_item_id', 'aiomh_css_attributes_filter', 100, 1);
    add_filter('page_css_class', 'aiomh_css_attributes_filter', 100, 1);
    function aiomh_css_attributes_filter($var) {
        $keep_menu_class = aiomh_return_array_texrarea(get_option('aiomh_remove_menu_class_value'));
        return is_array($var) ? array_intersect($var, $keep_menu_class) : '';
    }
}

// Disable comments
if(get_option('aiomh_disable_comments')==1)
{
    // Disable support for comments and trackbacks in post types
    function aiomh_disable_comments_post_types_support() {
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            if(post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }
    add_action('admin_init', 'aiomh_disable_comments_post_types_support');
    // Close comments on the front-end
    function aiomh_disable_comments_status() {
        return false;
    }
    add_filter('comments_open', 'aiomh_disable_comments_status', 20, 2);
    add_filter('pings_open', 'aiomh_disable_comments_status', 20, 2);
    // Hide existing comments
    function aiomh_disable_comments_hide_existing_comments($comments) {
        $comments = array();
        return $comments;
    }
    add_filter('comments_array', 'aiomh_disable_comments_hide_existing_comments', 10, 2);
    // Remove comments page in menu
    function aiomh_disable_comments_admin_menu() {
        remove_menu_page('edit-comments.php');
    }
    add_action('admin_menu', 'aiomh_disable_comments_admin_menu');
    // Redirect any user trying to access comments page
    function aiomh_disable_comments_admin_menu_redirect() {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url()); exit;
        }
    }
    add_action('admin_init', 'aiomh_disable_comments_admin_menu_redirect');
    // Remove comments metabox from dashboard
    function aiomh_disable_comments_dashboard() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }
    add_action('admin_init', 'aiomh_disable_comments_dashboard');
    // Remove comments links from admin bar
    function aiomh_disable_comments_admin_bar() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }
    add_action('init', 'aiomh_disable_comments_admin_bar');
}

//Change dir wp-admin
if(get_option('aiomh_change_dir_admin')==1)
{
    function aiomh_add_rule_change_dir_admin() {
        $dir_admin = get_option('aiomh_change_dir_admin_value');
        add_rewrite_rule($dir_admin.'?', 'wp-login.php?ok='.$dir_admin, 'top');
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
    add_action('init', 'aiomh_add_rule_change_dir_admin');

    if ( AIOMH_IFADMIN == 1) {
        $dir_admin = get_option('aiomh_change_dir_admin_value');
        session_start();
        $pass_level1 = $dir_admin;
        if(isset($_GET["ok"])){$ok = $_GET["ok"];$_SESSION["ok"] = $ok;}
        $ok = isset($_SESSION["ok"])?$_SESSION["ok"]:0;
        if($ok!==$pass_level1){exit();} 
    }
}

if(get_option('aiomh_lock_wpadmin')==1)
{
    if (AIOMH_IFADMIN == 1) {
        $config['user_aiomh'] = get_option('aiomh_lock_wpadmin_user');
        $config['pass_aiomh'] = get_option('aiomh_lock_wpadmin_pass');
        if ($_SERVER['PHP_AUTH_USER'] !== $config['user_aiomh'] || $_SERVER['PHP_AUTH_PW'] !== $config['pass_aiomh']){
        header('WWW-Authenticate: Basic realm="Login?"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<center>Wrong !</center>';
        exit();
        }
    }    
}

// Disable xmlrpc 
if(get_option('aiomh_disable_xmlrpc')==1)
{
    add_filter('xmlrpc_enabled', '__return_false');
}

// Hidden verwp
if(get_option('aiomh_hidden_verwp')==1)
{
    remove_action('wp_head', 'wp_generator');   
}



// Remove jquery
if(get_option('aiomh_remove_jquery')==1)
{
    function aiomh_remove_jquery() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
        wp_deregister_script( 'wp-embed' );
    }
    if (!is_admin()) {
        add_action('init', 'aiomh_remove_jquery');
    }

    // add_filter( 'wp_default_scripts', 'aiomh_remove_jquery_migrate' );
    // function aiomh_remove_jquery_migrate( &$scripts){
    //     if(!is_admin()){
    //         $scripts->remove( 'jquery');
    //     }
    // }

}

// Remove js,css plugins
if(get_option('aiomh_remove_plugin_jscss')==1)
{
    function aiomh_dequeue_my_css_fun($id) {
        if($id!='')
        {
            // $id = str_replace(array(', ',', ',', '),',',$id);
            // $remove_js_css = explode(',', $id.',');
            // $count_remove_js_css = count($remove_js_css);
            // for($i=0;$i<$count_remove_js_css-1;$i++)
            // {                         
            $array = aiomh_return_array_texrarea($id);
            foreach($array as $value) { 
                wp_dequeue_style($value);
                wp_deregister_style($value);
                wp_dequeue_script($value);
                wp_deregister_script($value); 

                add_action('wp_footer', 'wp_print_scripts', 5);
            }
        }
    }
    function aiomh_dequeue_my_css() {
        aiomh_dequeue_my_css_fun(get_option('aiomh_remove_plugin_jscss_all'));
        if(is_home() || is_front_page()) aiomh_dequeue_my_css_fun(get_option('aiomh_remove_plugin_jscss_home'));
        if(is_category() || is_archive()) aiomh_dequeue_my_css_fun(get_option('aiomh_remove_plugin_jscss_category'));
        if(is_single()) aiomh_dequeue_my_css_fun(get_option('aiomh_remove_plugin_jscss_single'));
    }
    add_action( 'wp_enqueue_scripts', 'aiomh_dequeue_my_css', 9999 );
}

// Change salt in wp-config
function aiomh_change_key_salt_func(){
        if(aiomh_FileCheckPermissions()==true)
        {
            include_once(ABSPATH.'wp-includes/pluggable.php');
            $wpconfig_content = file_get_contents(AIOMH_FWPCF);
            if (!empty($wpconfig_content)){
                $wpconfig_content = str_replace(AUTH_KEY,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(SECURE_AUTH_KEY,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(LOGGED_IN_KEY,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(NONCE_KEY,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(AUTH_SALT,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(SECURE_AUTH_SALT,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(LOGGED_IN_SALT,wp_generate_password( 64, true, true ),$wpconfig_content);
                $wpconfig_content = str_replace(NONCE_SALT,wp_generate_password( 64, true, true ),$wpconfig_content);
                $result = file_put_contents(AIOMH_FWPCF, $wpconfig_content);  
            }
            update_option( 'aiomh_change_key_salt_value_time', time() );
        }
}
if($GLOBALS['pagenow'] === 'wp-login.php' && get_option('aiomh_change_key_salt')==1){
    $salt_value = get_option('aiomh_change_key_salt_value');
    $salt_value_time = get_option('aiomh_change_key_salt_value_time');
    if(time()-($salt_value*86400)>$salt_value_time) aiomh_change_key_salt_func();
}

// Move script to wp_footer()
if(get_option('aiomh_move_js_to_footer')==1)
{
    function aiomh_footer_enqueue_scripts() {
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);
        add_action('wp_footer', 'wp_print_scripts', 5);
        add_action('wp_footer', 'wp_enqueue_scripts', 5);
        add_action('wp_footer', 'wp_print_head_scripts', 5);
    }

    if(get_option('aiomh_move_css_to_footer')==1)
        add_action('after_setup_theme', 'aiomh_footer_enqueue_scripts');
    else
        add_action('wp_enqueue_scripts', 'aiomh_footer_enqueue_scripts'); 
}

// Add async script
if(get_option('aiomh_add_js_async')==1)
{
    function aiomh_add_async_attribute($tag, $handle) {
       $scripts_to_async = aiomh_return_array_texrarea(get_option('aiomh_add_js_async_value'));
       foreach($scripts_to_async as $async_script) {
          if ($async_script === $handle) {
            $tag = str_replace('defer="defer" ', '', $tag);
            $tag = str_replace(' src', ' async="async" src', $tag);
            return $tag;
          }
       }
       return $tag;
    }
    add_filter('script_loader_tag', 'aiomh_add_async_attribute', 10, 2);
}

// Add defer script
if(get_option('aiomh_add_js_defer')==1)
{
    function aiomh_add_defer_attribute($tag, $handle) {
       $scripts_to_defer = aiomh_return_array_texrarea(get_option('aiomh_add_js_defer_value'));
       foreach($scripts_to_defer as $defer_script) {
          if ($defer_script === $handle) {
            $tag = str_replace('async="async" ', '', $tag);
            $tag = str_replace(' src', ' defer="defer" src', $tag);
            return $tag;
          }
       }
       return $tag;
    }
    add_filter('script_loader_tag', 'aiomh_add_defer_attribute', 10, 2);
}


// Minify html
if(get_option('aiomh_html_minify')==1 && !is_admin() && AIOMH_IFADMIN != 1)
{
    add_action( 'wp_loaded','my_minify_html', 10 );
    function my_minify_html() {
        ob_start('aiomh_html_compress');
    }
}
function aiomh_html_compress( $html ) {
    // $html = preg_replace(array("/[\n\r\t]/","<!--(.*?)-->","/<>/"),"",$html);
    // $html = preg_replace("/  /"," ",$html);
    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/ \/>/',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/'
    );
    $replace = array(
        '>',
        '<',
        '/>',
        '\\1',
        ''
    );
    $html = preg_replace($search, $replace, $html);
    if(get_option('aiomh_html_minify_home_url')==1) $html = str_replace(home_url('/'),'/',$html);
    if(get_option('aiomh_html_minify_slash_end')==1) $html = str_replace('/>','>',$html);
    return $html;
}



//cache
add_action('wp_login', function(){
    update_option('aiomh_logged', 1);
});
add_action('wp_logout', function(){
    update_option('aiomh_logged', 0);
});

//detele file cache
function aiomh_cache_delete_file($post_id){
    $post_url = get_permalink( $post_id );
    $post_url = str_replace(home_url('/'),'',$post_url);
    $post_url = (substr($post_url, -1)=='/')?$post_url.'index.c':$post_url.'.c';

    $file_del = CFOLDER.$post_url;
    if(file_exists($file_del)) unlink($file_del);
    if(get_option('aiomh_cache_mobile')==1){
        $file_del = CFOLDER.'/m/'.$post_url;
        if(file_exists($file_del)) unlink($file_del);
    }
}

function aiomh_cache_delete_folder($dir='') {
    if($dir=='') $dir = CFOLDER;

    if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           aiomh_cache_delete_folder($dir."/".$object); 
        else unlink($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
    }
}

// function aiomh_cache_delete_folder($dir=''){

//     if($dir=='') $dir = ABSPATH.'wp-content/aiomh-cache/';
//         echo '@@@@@@@@@@@@@@@@';
//         $files = array_diff(scandir($dir), array('.','..')); 
//         foreach ($files as $file) { 
//           (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
//         } 
//         return rmdir($dir);
//   } 
// rrmdir();


// Delete cache if update post
function aiomh_action_edit_post( $post_id, $post ) {
    aiomh_cache_delete_file($post_id);
}; 
add_action( 'edit_post', 'aiomh_action_edit_post', 10, 2 ); 


if ( get_option('aiomh_cache')==1 )
{
    add_filter('show_admin_bar', '__return_false');
    add_action('after_setup_theme', 'aiomh_remove_admin_bar');
    function aiomh_remove_admin_bar() {
        show_admin_bar(false);
    }
}
if ( get_option('aiomh_cache')==1 && AIOMH_IFADMIN==0) {
    $aiomh_cache = 1;
    if(get_option('aiomh_cache_login_not')==1 && get_option('aiomh_logged')==1) $aiomh_cache = 0;

    if(get_option('aiomh_cache_not_home')==1 && (is_home() || is_front_page())) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_single')==1 && is_single()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_page')==1 && is_page()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_archive')==1 && is_archive()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_tag')==1 && is_tag()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_category')==1 && is_category()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_feed')==1 && is_feed()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_search')==1 && is_search()) $aiomh_cache = 0;
    if(get_option('aiomh_cache_not_author')==1 && is_author()) $aiomh_cache = 0;

    if(aiomh_check_exits_textarea(get_option('aiomh_cache_not'),$_SERVER['REQUEST_URI'])==true) $aiomh_cache = 0;

    if(get_option('aiomh_cache_accepted') != '')
    {
        if(aiomh_check_exits_textarea(get_option('aiomh_cache_accepted'),$_SERVER['REQUEST_URI'])==true) $aiomh_cache = 1;
    }

    if($aiomh_cache==1) add_action('init', 'aiomh_cache_head');
    function aiomh_cache_head(){
        // Tính toán name cho file cache
        $script_name = $_SERVER["REQUEST_URI"];

        $a = explode('/', $script_name);

        if(substr($script_name, -1)=='/')
        {
            $tenfile = 'index';
            $catfolder = $script_name;
        }
        else
        {
            $tenfile = end($a);
            $catfolder = str_replace($tenfile,'',$script_name);
        }

        if(get_option('aiomh_cache_mobile')==1 && wp_is_mobile()) $catfolder = '/m/'.$catfolder;

        $cachetime = (get_option('aiomh_cache_mobile')==0)?99999999999999:get_option('aiomh_cache_mobile');

        define('CFOLDER',ABSPATH.'wp-content/aiomh-cache/');
        define('CATFOLDER',CFOLDER.$catfolder);
        define('CATFILE',CATFOLDER.$tenfile.'.c');

        // Xuất file cache ra, với 2 điều kiện: có cache và chưa vượt quá cachetime
        if (file_exists(CATFILE) && (time() - $cachetime > filemtime(CATFILE))){
            if(get_option('aiomh_cache_views')==1)
            {
                $postid = url_to_postid( $_SERVER["REQUEST_URI"] );
                if($postid > 0) setPostViews($postid); 
            }
            include(CATFILE);
            echo "\n<!--Cache By All in one must have plugins ".date('Y/m/d H:i', filemtime(CATFILE))."-->";
            exit;
        }
        ob_start(aiomh_cache_foot2); // Bật buffer cho output
    }

    // add_action( 'wp_loaded','aiomh_cache_foot',20 );
    // function aiomh_cache_foot() {
    //     ob_start('aiomh_cache_foot2');
    // }
    function aiomh_cache_foot2( $html ) {
        //if (!preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT']))
        if(aiomh_check_exits_textarea(get_option('aiomh_cache_bot'),$_SERVER['HTTP_USER_AGENT'])!=true)    
        {
            // Lưu nội dung sau khi file php chạy xong vào file cache
            if (!file_exists(CATFOLDER)) {
                mkdir(CATFOLDER, 0777, true);
            }        
            $cache = fopen(CATFILE, 'w');
            fwrite($cache, $html);
            fclose($cache);
            //ob_end_flush();
        }
        return $html;
    }
}











//Submit
if(isset($_GET['settings-updated']) && $_GET['settings-updated']=='true')
{
    // Hidden verwp
    if(get_option('aiomh_hidden_verwp')==1)
    {
        //Remove file readme.html
        $file_readme =  ABSPATH.'readme.html';
        if(file_exists($file_readme)) unlink($file_readme);    
    }


    // Change salt in wp-config
    if(get_option('aiomh_change_key_salt_now')==1)
    {
        aiomh_change_key_salt_func();
        update_option( 'aiomh_change_key_salt_now', 0 );
    }

    // Disallow edit files on themes,plugins in wp-admin
    if(get_option('aiomh_disallow_file_edit')==1 && aiomh_FileCheckPermissions()==true && aiomh_check_exits_txt_file('DISALLOW_FILE_EDIT')!=true)
    {
        $wpconfig_content = file_get_contents(AIOMH_FWPCF);
        $wpconfig_content = preg_replace( '/(<\?(?:php)?)/', "<?php\n//Add by All In One Must Have Plugins\ndefine('DISALLOW_FILE_EDIT',true); //Disallow edit files on themes,plugins in wp-admin\n", $wpconfig_content );
        $result = file_put_contents(AIOMH_FWPCF, $wpconfig_content);  
    }
    // Disallow add new plugins, themes on wp-admin
    if(get_option('aiomh_disallow_file_mods')==1 && aiomh_FileCheckPermissions()==true && aiomh_check_exits_txt_file('DISALLOW_FILE_MODS')!=true)
    {
        $wpconfig_content = file_get_contents(AIOMH_FWPCF);
        $wpconfig_content = preg_replace( '/(<\?(?:php)?)/', "<?php\n//Add by All In One Must Have Plugins\ndefine('DISALLOW_FILE_MODS',true); //Disallow add new plugins, themes on wp-admin\n", $wpconfig_content );
        $result = file_put_contents(AIOMH_FWPCF, $wpconfig_content);  
    }

    //Cache
    if(get_option('aiomh_cache')==1)
    {
        if (!file_exists(ABSPATH.'wp-content/aiomh-cache/'))   
        {
            if(!mkdir(ABSPATH.'wp-content/aiomh-cache/', 0777, true))
                update_option( 'aiomh_cache', 0 );
        }
    }

}
?>