<?php

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



class Gyrojob_SEO_Meta_Home_Description {

    function __construct() {

        add_action('admin_menu',  [$this,'gyrojob_seo_add_admin_menu']);
        add_action('admin_init', [$this,'gyrojob_seo_register_settings']);
        add_action('wp_head', [$this,'gyrojob_seo_run_om_tags'],'');
        add_action( 'admin_menu', [ $this, 'gyrojob_seo_hook_admin_head'] );
    }


function gyrojob_seo_add_admin_menu() {
    add_menu_page(
        'Gyrojob SEO',
        'Gyrojob SEO',
        'manage_options',
        'gyrojob_seo_meta_tags',
        [$this,'gyrojob_seo_options_page'], GYROJOB_PLUGIN_URL.'/inc/img/gyrojob-seo.png',
        '5' ,''
    );
}




function gyrojob_seo_options_page() {
    ?>
        <div class="wrap">
        <h1><?php esc_html_e('Access - Gyrojob SEO - Home page meta tags', '007-gyrojob-seo'); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('gyrojob_seo_options_group');
            do_settings_sections('gyrojob_seo_meta_tags');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Meta Title', '007-gyrojob-seo'); ?></th>
                    <td><input type="text" name="gyrojob_seo_meta_title" value="<?php echo esc_attr(get_option('gyrojob_seo_meta_title')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Meta Description', '007-gyrojob-seo'); ?></th>
                    <td><textarea name="gyrojob_seo_meta_description" rows="5" class="large-text"><?php echo esc_textarea(get_option('gyrojob_seo_meta_description')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Noindex', '007-gyrojob-seo'); ?></th>
                    <td>
                        <label><input type="radio" name="gyrojob_seo_meta_noindex" value="1" <?php checked(1, get_option('gyrojob_seo_meta_noindex')); ?> /> Yes</label>
                        <label><input type="radio" name="gyrojob_seo_meta_noindex" value="0" <?php checked(0, get_option('gyrojob_seo_meta_noindex')); ?> /> No</label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Nofollow', '007-gyrojob-seo'); ?></th>
                    <td>
                        <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="1" <?php checked(1, get_option('gyrojob_seo_meta_nofollow')); ?> /> Yes</label>
                        <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="0" <?php checked(0, get_option('gyrojob_seo_meta_nofollow')); ?> /> No</label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Canonical URL', '007-gyrojob-seo'); ?></th>
                    <td><input type="text" name="gyrojob_seo_meta_canonical" value="<?php echo esc_attr(get_option('gyrojob_seo_meta_canonical')); ?>" class="regular-text" /></td>
                </tr>
                
                
                
                <tr valign="top">
                     <td colspan=2><center>
<div class="px-5 py-5">
  <div id="box">
      <h1><b>Hello, <span id="title" data-messages='["To active more seo featchers like - Woocommerce SEO, page title, description, keywords, facebook, twitter meta data use AI tools.", "Unlock AI tools.", "24/7 support."]'></span></b></h1>
  </div>
</div><?php ///* ?>
                         <a href="https://plugin.gyrojob.com/ai.php" target="_blank" class="aii"><h1 id="hhai"><font class="imgai">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><b>Unlock - AI</b></h1></a></center><?php //*/ ?>
                </tr>
                
                
                
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}





function gyrojob_seo_hook_admin_head(){
    wp_enqueue_style( 'gyrojob-seo', ( plugin_dir_url( __FILE__ ) . '../css/ai.css' ), array(), filemtime( plugin_dir_path( __FILE__ ) . '../css/ai.css' ) );
    wp_enqueue_script( 'gyrojob-seo', ( plugin_dir_url( __FILE__ ) . '../js/ai.js' ), array( 'jquery', 'postbox' ), filemtime( plugin_dir_path( __FILE__ ) . '../js/ai.js' ), true );
}






    function gyrojob_seo_register_settings() {
      $args = array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    );

    register_setting('gyrojob_seo_options_group', 'gyrojob_seo_meta_title', $args);
    register_setting('gyrojob_seo_options_group', 'gyrojob_seo_meta_description', $args);

    // For noindex and nofollow, using 'intval' to sanitize as these are expected to be integers (1 or 0)
    $args_noindex = array(
        'type' => 'integer',
        'sanitize_callback' => 'intval',
        'default' => 0,
    );
    register_setting('gyrojob_seo_options_group', 'gyrojob_seo_meta_noindex', $args_noindex);
    register_setting('gyrojob_seo_options_group', 'gyrojob_seo_meta_nofollow', $args_noindex);

    // Canonical URL should be sanitized using 'esc_url_raw'
    $args_canonical = array(
        'type' => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '',
    );
    register_setting('gyrojob_seo_options_group', 'gyrojob_seo_meta_canonical', $args_canonical);

    }

    public function gyrojob_seo_run_om_tags() {

        if (is_front_page() && is_home()) { ?>
    <!-- Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
        <meta name="siteVerification" content=""/>
        <?php if (!empty(get_option('gyrojob_seo_meta_title'))) { ?>
<title><?php echo esc_attr(get_option('gyrojob_seo_meta_title')); ?></title><?php } ?>
        <?php if (!empty(get_option('gyrojob_seo_meta_description'))) { ?>
        
        <meta name="description" content="<?php echo esc_attr(get_option('gyrojob_seo_meta_description')); ?>" /><?php } ?>
        
        <meta property="og:type" content=""/>
        <meta property="og:title" content=""/>
        <meta property="og:description" content=""/>
        <meta property="og:url" content=""/>
<?php if (!empty(get_option('gyrojob_seo_meta_canonical'))) { ?>
        <link rel="canonical" href="<?php echo esc_url(get_option('gyrojob_seo_meta_canonical')); ?>" /><?php } ?>

        <?php    if (get_option('gyrojob_seo_meta_noindex') === '1') {
        echo '<meta name="robots" content="noindex' . (get_option('gyrojob_seo_meta_nofollow') === '1' ? ', nofollow' : '') . '">' . "\n";
} elseif (get_option('gyrojob_seo_meta_nofollow') === '1') {
        echo '<meta name="robots" content="nofollow">' . "\n"; } ?>
        <meta property="og:site_name" content=""/>
        <meta name="twitter:title" content=""/>
        <meta name="twitter:description" content=""/>
        <meta name="twitter:image" content=""/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="robots" content="" class="Gyrojob-seo-meta-tag" />    
        <!-- END Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
<?php
        }

    }

 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
           
 
 
 


    
    
    
    
    
    


   
}

define( 'GYROJOBP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


require_once GYROJOBP_PLUGIN_DIR . 'gyrojob-class-post-pages-shop.php';
if ( ! function_exists( 'Gyrojob_SEO_Page_Shop_Description' ) ) {
new Gyrojob_SEO_Page_Shop_Description();
}



require_once GYROJOBP_PLUGIN_DIR . 'gyrojob-class-texonomi.php';
if ( ! function_exists( 'Gyrojob_SEO_Texo_Nomy' ) ) {
new Gyrojob_SEO_Texo_Nomy();
}




    
    
    
    
    
    
    
    
    
    
    
    
    









