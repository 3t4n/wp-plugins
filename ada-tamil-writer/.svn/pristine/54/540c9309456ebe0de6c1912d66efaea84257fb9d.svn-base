<?php
/*
Plugin Name: Ada Tamil Writer
Plugin URI: http://1uthavi.adadaa.com/adadaa-tamil-typing/
Description: Ada Tamil Writer enhances your WordPress experience by providing easy Tamil typing options directly from the admin bar. Choose from various keyboard layouts like Thaminglish, Tamil99, and Typewriter.
Author: Adadaa
Version: 2024.2110
Author URI: http://adadaa.com/
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (!class_exists('Adadaa_tamil_writer')) {
class Adadaa_tamil_writer
{
private $adadaa_options
	,$adadaa_site_options
	,$adadaa_plugin_name
	,$adadaa_defaults
	,$basedirname
	,$plugin_url;


    function __construct()
    {
		
		if(get_option('WPLANG') == 'Tamil')
			$this->adadaa_defaults = array(
				'adadaa_ukeybrd'  => 'roman',
			);
		else
			$this->adadaa_defaults = array(
				'adadaa_ukeybrd'  => 'english',
			);
		
		add_action( 'admin_init', array(&$this, 'adadaa_register_settings') );
		add_action('init', array(&$this, 'adadaa_init'));	//to add js scripts to all pages.  'template_redirect' works on all public pages, except 'wp-signup.php'.  
		add_action('admin_menu', array(&$this, 'adadaa_tamil_writer_menu'));
		add_action('wp_head',array(&$this, 'adadaa_inc_files'));
        add_action('wp_footer', array(&$this, 'adadaa_tamil_jar_js'));
	    add_action('admin_head', array(&$this, 'adadaa_inc_files'));	        
        add_action('comment_form', array(&$this, 'adadaa_tamil_jar_js'));
		add_action('admin_footer', array(&$this, 'lang_admin_footer'));
		add_action('dbx_post_sidebar', array(&$this, 'adadaa_tamil_jar_js'));	//for Category & Tag forms on the Post's sidebar
		add_action('post_tag_pre_add_form', array(&$this, 'adadaa_tamil_jar_js'));	//for search input field
		add_action('post_tag_add_form', array(&$this, 'adadaa_tamil_jar_js'));
		add_action('post_tag_edit_form', array(&$this, 'adadaa_tamil_jar_js'));
		add_action('category_pre_add_form', array(&$this, 'adadaa_tamil_jar_js'));
		add_action('category_add_form', array(&$this, 'adadaa_tamil_jar_js'));	//add and edit are same hook in WPMU
		add_action('show_user_profile', array(&$this, 'lang_edit_user_profile'));		 
		add_action('activity_box_end', array(&$this, 'adadaa_tamil_jar_js'));	//for Dashboard
		add_action('add_link_category_form_pre', array(&$this, 'adadaa_tamil_jar_js'));
        add_action('edit_link_category_form', array(&$this, 'adadaa_tamil_jar_js'));	//add and edit are same hook in WPMU
		add_action('post-upload-ui', array(&$this, 'adadaa_tamil_jar_js'));
	    add_action('signup_blogform', array(&$this, 'adadaa_tamil_jar_js'));
		add_action('signup_extra_fields', array(&$this, 'adadaa_tamil_jar_js'));	 
    }
	
	function adadaa_register_settings() { // whitelist options
		register_setting( $this->adadaa_plugin_name, 'adadaa_keybrd' );
		register_setting( $this->adadaa_plugin_name, 'adadaa_ukeybrd' );
	}


	function adadaa_init() {
        global $adadaa_core;
        $this->adadaa_plugin_name = __CLASS__;
        $this->basedirname = 'plugins';
        $this->plugin_url = plugin_dir_url(__FILE__);

        
        wp_enqueue_script('ada_script_tamils_min', $this->plugin_url . 'assets/js/tamils.min.js', array(), '1.0.0', true );
        wp_enqueue_script('ada_script_tamil99', $this->plugin_url . 'assets/js/tamil99.js', array(), '1.0.0', true );
        wp_enqueue_script('ada_script_tamil99', $this->plugin_url . 'assets/js/adadaa_tamiljar.js', array(),'1.0.0',true );
        wp_enqueue_style('ada-admin-style', $this->plugin_url . 'assets/css/admin-style.css',array(),'1.0.0','all');
        wp_enqueue_script('jquery');
    }

	function ada_wp_script_inc(){
		wp_enqueue_script('jquery');
	}
    
    function adadaa_inc_files() {
    global $user_login;

    // Get site and user-specific options
    $this->adadaa_site_options = unserialize(get_site_option($this->adadaa_plugin_name . "_plugin"));
    if ( !empty($this->adadaa_site_options[$user_login]) ) {
        // User-specific keyboard setting
        $curkeybrd = $this->adadaa_site_options[$user_login]['adadaa_ukeybrd'];  
    } else {
        // Blog-wide or default keyboard setting
        $this->adadaa_options = unserialize(get_option($this->adadaa_plugin_name . "_plugin"));
        if( !empty($this->adadaa_options['adadaa_keybrd']) ) {
            $curkeybrd =  $this->adadaa_options['adadaa_keybrd'];
        } else {
            $curkeybrd =  $this->adadaa_defaults['adadaa_ukeybrd'];  // Use default if none is retrieved
        }
    }

    // Enqueue or ensure your main JavaScript file is enqueued
    wp_enqueue_script( 'adadaa-main-script', plugin_dir_url(__FILE__) . 'assets/js/adadaa-main.js', array(), '1.0.0', true );

    // Generate inline script with the dynamic keyboard mode
    $inline_script = "var kbmode = '" . esc_js($curkeybrd) . "';";

    // Add the inline script after the 'adadaa-main-script'
    wp_add_inline_script( 'adadaa-main-script', $inline_script );
}

	
    function ada_tamil_writer_control($menu_tmp){	
    
	
		$menu_tmp[] = array('<input type="radio" name="adadaa_keybrd" value="roman" onclick="toggleKBMode(event,this)" checked> <a href="' . get_option('siteurl') . '/assets/images/tamil.jpg" target="blank_">' . __('Phonetic', 'ada-tamil-writer') . '</a>', 'read', '', '' );
		$menu_tmp[] = array('<input type="radio" name="adadaa_keybrd" value="typewriter" onclick="toggleKBMode(event,this);"> <a href="' . get_option('siteurl') . '/assets/imagesRR/tamiltw.jpg" target="blank_">' . __('Tamil Typewriter', 'ada-tamil-writer') . '</a>', 'read', '', '');

		return $menu_tmp;
	}
     

    function adadaa_tamil_jar_js(){
    wp_enqueue_script('adadaa-tamiljar-js', plugin_dir_url(__FILE__) . 'assets/js/adadaa_tamiljar.js', array('jquery'), '1.0.0', true);
}



	function lang_simple_advanced_edit_form (){
		
		
		$blockPath = 'assets/js/clicker.js';
	   
		 
		 wp_enqueue_script( 'clicker.js', plugins_url( $blockPath, __FILE__ ), [  'wp-editor','wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ],filemtime( plugin_dir_path( __FILE__ ) . $blockPath ), true );
		 
?>
				
<?php }
	
	function lang_admin_footer(){
		
		 wp_enqueue_script('case-plugin-js', plugin_dir_url(__FILE__) . 'assets/js/case-plugin.js', array('jquery'), '1.0.0' , true);
	}	

	function adadaa_tamil_writer_menu() {
        $logo_url = esc_url(plugin_dir_url(__FILE__) . 'assets/images/logotamil.png');
        


        // Create a new top-level menu with a custom icon
        add_menu_page(
            __('Tamil Language Keyboard', 'ada-tamil-writer'), // Page title
            __('Ada Tamil Writer', 'ada-tamil-writer'), // Menu title
            'manage_options', // Capability required to view the menu
            $this->adadaa_plugin_name, // Menu slug
            array($this, 'adadaa_tamil_writer_conf'), // Function to call to output the content
            '', // Custom icon URL
            2 // Position in the menu
        );
    }	

	function adadaa_tamil_writer_conf() {
               global $user_login;

               $isAdmin = current_user_can('level_8');
    
              if ($isAdmin) {
                 $this->adadaa_options = unserialize(get_option($this->adadaa_plugin_name . "_plugin"));
              if (!is_array($this->adadaa_options)) {
                 $this->adadaa_options = [];
             }
            }
    
              $this->adadaa_site_options = unserialize(get_site_option($this->adadaa_plugin_name . "_plugin"));
            if (!is_array($this->adadaa_site_options)) {
              $this->adadaa_site_options = [];
              }
    
            if ($isAdmin && empty($this->adadaa_options['adadaa_keybrd'])) {
              $this->adadaa_options['adadaa_keybrd'] = $this->adadaa_defaults['adadaa_ukeybrd'];
              }
    
            if (empty($this->adadaa_site_options[$user_login])) {
              $this->adadaa_site_options[$user_login] = $this->adadaa_defaults;
              }
    
            if (isset($_POST['adadaa_keybrd']) || isset($_POST['adadaa_ukeybrd'])) {
              // Verify the nonce before processing
            if (!isset($_POST['ada_nonce_field']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['ada_nonce_field'])), 'save_adadaa_options')) {
               die('Security check failed');
              }

           if ($isAdmin) {
           if (isset($_POST['adadaa_keybrd'])) {
              $this->adadaa_options['adadaa_keybrd'] = sanitize_text_field(wp_unslash($_POST['adadaa_keybrd']));
           } else {
              $this->adadaa_options['adadaa_keybrd'] = ''; // or set a default value
           }
           }
              $this->adadaa_site_options[$user_login] = array(
             'adadaa_ukeybrd' => sanitize_text_field(wp_unslash($_POST['adadaa_ukeybrd'])),
           );
           if ($isAdmin) {
            update_option($this->adadaa_plugin_name . "_plugin", serialize($this->adadaa_options));
            }
            update_site_option($this->adadaa_plugin_name . "_plugin", serialize($this->adadaa_site_options));
            print '<div id="message" class="updated fade"><p><strong>' . esc_html__('Options saved.', 'ada-tamil-writer') . '</strong></p></div>';
            }
		 ?>
		
        <div class="wrap">
               <h1><?php echo esc_html__('Ada Default Keyboard Settings', 'ada-tamil-writer'); ?></h1>
              <form method="post" action="">
    	<?php wp_nonce_field('save_adadaa_options', 'ada_nonce_field'); ?>
        <?php
        settings_fields($this->adadaa_plugin_name);
        do_settings_sections($this->adadaa_plugin_name); // Add this line to include settings sections
        ?>

        <p><?php echo esc_html__('The default keyboard for you throughout the site, regardless of which blog you are on, when you are logged in.', 'ada-tamil-writer'); ?></p>

        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?php echo esc_html__('Your Keyboard', 'ada-tamil-writer'); ?></th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="radio" name="adadaa_ukeybrd" value="roman" <?php checked('roman', $this->adadaa_site_options[$user_login]['adadaa_ukeybrd']); ?> id="ukeybrd_roman" />
                        <label for="ukeybrd_roman"><?php echo esc_html__('Thaminglish', 'ada-tamil-writer'); ?></label>
                    </th>
                    <td>
                        <a href="<?php echo esc_url($this->plugin_url . 'assets/images/tamil.jpg'); ?>" target="_blank" title="<?php echo esc_attr__('Thaminglish', 'ada-tamil-writer'); ?>">
                            <img src="<?php echo esc_url($this->plugin_url . 'assets/images/tamil.jpg'); ?>" alt="<?php echo esc_attr__('Thaminglish', 'ada-tamil-writer'); ?>" style="max-width: 200px;" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="radio" name="adadaa_ukeybrd" value="typewriter" <?php checked('typewriter', $this->adadaa_site_options[$user_login]['adadaa_ukeybrd']); ?> id="ukeybrd_typewriter" />
                        <label for="ukeybrd_typewriter"><?php echo esc_html__('Tamil Typewriter', 'ada-tamil-writer'); ?></label>
                    </th>
                    <td>
                        <a href="<?php echo esc_url($this->plugin_url . 'assets/images/tamiltw.jpg'); ?>" target="_blank" title="<?php echo esc_attr__('Baamini', 'ada-tamil-writer'); ?>">
                            <img src="<?php echo esc_url($this->plugin_url . 'assets/images/tamiltw.jpg'); ?>" alt="<?php echo esc_attr__('Baamini', 'ada-tamil-writer'); ?>" style="max-width: 200px;" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="radio" name="adadaa_ukeybrd" value="tamil99" <?php checked('tamil99', $this->adadaa_site_options[$user_login]['adadaa_ukeybrd']); ?> id="ukeybrd_tamil99" />
                        <label for="ukeybrd_tamil99"><?php echo esc_html__('Tamil99', 'ada-tamil-writer'); ?></label>
                    </th>
                    <td>
                        <a href="<?php echo esc_url($this->plugin_url . 'assets/images/tamil99.png'); ?>" target="_blank" title="<?php echo esc_attr__('Tamil99', 'ada-tamil-writer'); ?>">
                            <img src="<?php echo esc_url($this->plugin_url . 'assets/images/tamil99.png'); ?>" alt="<?php echo esc_attr__('Tamil99', 'ada-tamil-writer'); ?>" style="max-width: 200px;" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="radio" name="adadaa_ukeybrd" value="english" <?php checked('english', $this->adadaa_site_options[$user_login]['adadaa_ukeybrd']); ?> id="ukeybrd_english" />
                        <label for="ukeybrd_english"><?php echo esc_html__('English', 'ada-tamil-writer'); ?></label>
                    </th>
                    <td><?php echo esc_html__('English', 'ada-tamil-writer'); ?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <p><?php echo esc_html__('Read more about Ada Tamil Writer at', 'ada-tamil-writer'); ?>
            <a href="http://1uthavi.adadaa.com/adadaa-tamil-typing/" target="_blank" title="<?php echo esc_attr__('Ada Tamil Writer', 'ada-tamil-writer'); ?>"><?php echo esc_html__('Choose your keyboard', 'ada-tamil-writer'); ?></a>
        </p>
        
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php echo esc_attr__('Update Settings', 'ada-tamil-writer'); ?>">
        </p>
    </form>
</div>
		<?php		
			
	}	//end of adadaa_tamil_writer_conf()
	
}	//end class
}   //end if
$adatk = new Adadaa_tamil_writer();



if (!class_exists('adadaa_core')) {
    include_once("adadaa_core_class.php");
    
}

if (!class_exists('Adadaa_wordpress_admin_bar_improved')) {
class Adadaa_wordpress_admin_bar_improved {
    private $plugin_url, $plugin_dir, $adadaa_plugin_name, $adadaa_defaults, $lang_key_position, $adadaa_core;

    function __construct() {
        
        global $adadaa_core;
        global $current_site;

        

        $this->adadaa_core = $adadaa_core;
        if (!$this->adadaa_core) {
            $this->adadaa_core = new adadaa_core();
           
        }

        $this->plugin_url = $this->adadaa_core->ada_url(__FILE__);
        $this->plugin_dir = $this->adadaa_core->ada_dir(__FILE__);
        $this->adadaa_plugin_name = 'ada_tamil_writer';
        add_action('init', array(&$this, 'adadaa_init'));
        add_filter('wpabar_defaults', array(&$this, 'wpabar_defaults'));

        $this->lang_key_position = 'rightleft';

        if ($this->lang_key_position == 'leftright') {
            add_action('admin_bar_menu', array(&$this, 'ada_tamil_typing'), 99);
        } else {
            add_action('admin_bar_menu', array(&$this, 'ada_tamil_typing'), 0);
        }
    }

    function wp_admin_bar_style() {
    // Only enqueue the style if the admin bar is showing
    if (is_admin_bar_showing()) {
        $plugin_dir = plugin_dir_url(__FILE__);
        wp_enqueue_style('ada-admin-style', $this->plugin_url . 'assets/css/admin-style.css',array(),'1.0.0','all');
    }
}

    public function before_admin_bar_render() {
        ob_start();
    }

    function adadaa_init() {
        $plugin_dir = plugin_dir_url(__FILE__);
        wp_enqueue_script('ada_script_wpabar', $this->plugin_url . '/assets/js/ada_wpabar.js', array(), '1.0.0', true );
        
    }

    function wpabar_defaults($res) {
            $res['hide'] = unserialize('a:14:{s:9:"index.php";a:5:{i:0;b:1;s:9:"index.php";b:1;s:22:"popularity-contest.php";b:1;s:21:"akismet-stats-display";b:1;s:7:"myblogs";b:1;}s:3:"seo";a:14:{i:0;b:1;s:3:"seo";b:1;s:7:"su-404s";b:1;s:12:"su-canonical";b:1;s:22:"su-competition-queries";b:1;s:8:"su-files";b:1;s:23:"su-site-keyword-queries";b:1;s:10:"su-linkbox";b:1;s:7:"su-meta";b:1;s:13:"su-more-links";b:1;s:10:"su-noindex";b:1;s:8:"su-slugs";b:1;s:9:"su-titles";b:1;s:11:"su-sds-blog";b:1;}s:14:"wpmu-admin.php";a:15:{i:0;b:1;s:14:"wpmu-admin.php";b:1;s:14:"wpmu-blogs.php";b:1;s:14:"wpmu-users.php";b:1;s:15:"wpmu-themes.php";b:1;s:16:"wpmu-options.php";b:1;s:21:"wpmu-upgrade-site.php";b:1;s:34:"cets_blog_defaults_management_page";b:1;s:21:"ah-theme-stats-mu.php";b:1;s:16:"gb_templates.php";b:1;s:20:"signup_question_main";b:1;s:21:"wp_ozh_whoseesads.php";b:1;s:23:"cets_bc_management_page";b:1;s:12:"wpsupercache";b:1;s:18:"wpmu_sitewide_feed";b:1;}s:8:"edit.php";a:2:{s:31:"edit-tags.php?taxonomy=post_tag";b:1;s:14:"categories.php";b:1;}s:10:"upload.php";a:3:{i:0;b:1;s:10:"upload.php";b:1;s:13:"media-new.php";b:1;}s:16:"link-manager.php";a:4:{i:0;b:1;s:16:"link-manager.php";b:1;s:12:"link-add.php";b:1;s:24:"edit-link-categories.php";b:1;}s:14:"edit-pages.php";a:3:{i:0;b:1;s:14:"edit-pages.php";b:1;s:12:"page-new.php";b:1;}s:10:"themes.php";a:5:{i:0;b:1;s:10:"themes.php";b:1;s:11:"widgets.php";b:1;s:17:"theme-install.php";b:1;s:13:"functions.php";b:1;}s:11:"plugins.php";a:4:{i:0;b:1;s:11:"plugins.php";b:1;s:18:"plugin-install.php";b:1;s:18:"akismet-key-config";b:1;}s:9:"users.php";a:4:{i:0;b:1;s:9:"users.php";b:1;s:12:"user-new.php";b:1;s:11:"profile.php";b:1;}s:9:"tools.php";a:6:{i:0;b:1;s:9:"tools.php";b:1;s:10:"import.php";b:1;s:10:"export.php";b:1;s:20:"custom_anti_spam.php";b:1;s:28:"wordpress-admin-bar-improved";b:1;}s:19:"options-general.php";a:18:{s:19:"options-general.php";b:1;s:19:"options-writing.php";b:1;s:19:"options-reading.php";b:1;s:22:"options-discussion.php";b:1;s:17:"options-media.php";b:1;s:19:"options-privacy.php";b:1;s:21:"options-permalink.php";b:1;s:33:"mm-email2image/mm-email2image.php";b:1;s:16:"nofollowfree.php";b:1;s:12:"seo-ultimate";b:1;s:25:"bbpress-integration-admin";b:1;s:10:"publishing";b:1;s:27:"nofollow-links-in-posts.php";b:1;s:12:"wpsupercache";b:1;s:21:"auto-tag/auto-tag.php";b:1;s:22:"popularity-contest.php";b:1;s:34:"wp-postviews/postviews-options.php";b:1;s:26:"wp-print/print-options.php";b:1;}s:29:"feedwordpress/syndication.php";a:7:{i:0;b:1;s:29:"feedwordpress/syndication.php";b:1;s:28:"feedwordpress/feeds-page.php";b:1;s:28:"feedwordpress/posts-page.php";b:1;s:30:"feedwordpress/authors-page.php";b:1;s:33:"feedwordpress/categories-page.php";b:1;s:30:"feedwordpress/backend-page.php";b:1;}s:38:"wp-postratings/postratings-manager.php";a:5:{i:0;b:1;s:38:"wp-postratings/postratings-manager.php";b:1;s:38:"wp-postratings/postratings-options.php";b:1;s:40:"wp-postratings/postratings-templates.php";b:1;s:40:"wp-postratings/postratings-uninstall.php";b:1;}}');
            return $res;
        }


     function ada_tamil_typing($wp_admin_bar) {
            global $current_site;
            global $user_login;

            $roman_keybrd = '';
            $typewriter_keybrd = '';
            $tamil99_keybrd = '';
            $english_keybrd = '';
            $typewriter_class = '';
            $tamil99_class = '';
            $english_class = '';
            $roman_class = '';

            if (get_option('WPLANG') == 'Tamil')
                $this->adadaa_defaults = array(
                    'adadaa_ukeybrd' => 'roman',
                );
            else
                $this->adadaa_defaults = array(
                    'adadaa_ukeybrd' => 'english',
                );

            $username = $user_login;
            if (!$username)
                //$username = (function_exists('mb_strtolower')) ? mb_strtolower($_REQUEST['log']) : strtolower($_REQUEST['log']);

            $adadaa_site_options = unserialize(get_site_option($this->adadaa_plugin_name . "_plugin"));

            if (!empty($adadaa_site_options[$username])) {
                $curkeybrd = $adadaa_site_options[$username]['adadaa_ukeybrd'];
            } else {
                $curkeybrd = $this->adadaa_defaults['adadaa_ukeybrd'];
            }

            if ('typewriter' == $curkeybrd) {
                $typewriter_keybrd = "checked";
                $typewriter_class = " class=\"wpabar-menuhover\"";
            } else if ('tamil99' == $curkeybrd) {
                $tamil99_keybrd = "checked";
                $tamil99_class = " class=\"wpabar-menuhover\"";
            } else if ('roman' == $curkeybrd) {
                $roman_keybrd = "checked";
                $roman_class = " class=\"wpabar-menuhover\"";
            } else if ('english' == $curkeybrd) {
                $english_keybrd = "checked";
                $english_class = " class=\"wpabar-menuhover\"";
            }

            $this->wp_admin_bar_style();
            $this->adadaa_core = new adadaa_core();
            $this->adadaa_core->ada_plugin_dir = $this->plugin_dir;
            $this->adadaa_core->adadaa_plugin_name = $this->adadaa_plugin_name;

            $target = "_blank";

            $logo_url1 = esc_url(plugin_dir_url(__FILE__) . 'assets/images/logotamil.png');
            

            $wp_admin_bar->add_menu(array(
            'id' => 'tamil_typing',
           'title' => sprintf(
           '<img src="%s" style="height: 20px; vertical-align: middle; margin-right: 5px;" alt="%s" />%s',
           esc_url($logo_url1),
           esc_attr__('Ada Tamil Writer Logo', 'ada-tamil-writer'),
           esc_html__('Ada Tamil Writer', 'ada-tamil-writer')
           ),
          'href' => get_option('siteurl') . '/wp-admin/admin.php?page=Adadaa_tamil_writer',
          'meta' => array(
          'title' => esc_html__('Tamil Typing', 'ada-tamil-writer')
           )
          ));

          if ($this->lang_key_position == 'leftright') {
         $wp_admin_bar->add_menu(array(
         'id' => 'typewriter',
         'title' => esc_html__('Typewriter', 'ada-tamil-writer'),
         'href' => "#typewriter",
         'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Typewriter' in this case */
            'title' => sprintf(
                /* translators: %s is the keyboard name, e.g., Typewriter */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Typewriter', 'ada-tamil-writer')
            )
          )
          ));


         $wp_admin_bar->add_menu(array(
        'id' => 'tamil99',
        'title' => esc_html__('Tamil99', 'ada-tamil-writer'),
        'href' => "#tamil99",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Tamil99' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., Tamil99 */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Tamil99', 'ada-tamil-writer')
            )
          )
         ));

        $wp_admin_bar->add_menu(array(
        'id' => 'roman',
        'title' => esc_html__('Thaminglish', 'ada-tamil-writer'),
        'href' => "#roman",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Thaminglish' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., Thaminglish */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Thaminglish', 'ada-tamil-writer')
            )
          )
         ));

        $wp_admin_bar->add_menu(array(
        'id' => 'english',
        'title' => esc_html__('English', 'ada-tamil-writer'),
        'href' => "#english",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'English' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., English */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('English', 'ada-tamil-writer')
            )
          )
        ));
        } else {
       // Repeat same logic for the other layout
         $wp_admin_bar->add_menu(array(
        'id' => 'english',
        'title' => esc_html__('English', 'ada-tamil-writer'),
        'href' => "#english",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'English' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., English */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('English', 'ada-tamil-writer')
            )
          )
        ));

        $wp_admin_bar->add_menu(array(
        'id' => 'roman',
        'title' => esc_html__('Thaminglish', 'ada-tamil-writer'),
        'href' => "#roman",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Thaminglish' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., Thaminglish */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Thaminglish', 'ada-tamil-writer')
            )
          )
        ));

        $wp_admin_bar->add_menu(array(
        'id' => 'tamil99',
        'title' => esc_html__('Tamil99', 'ada-tamil-writer'),
        'href' => "#tamil99",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Tamil99' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., Tamil99 */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Tamil99', 'ada-tamil-writer')
            )
           )
        ));

        $wp_admin_bar->add_menu(array(
        'id' => 'typewriter',
        'title' => esc_html__('Typewriter', 'ada-tamil-writer'),
        'href' => "#typewriter",
        'meta' => array(
            'onclick' => "itemSelected(this); toggleKBMode(event,this); return false;",
            /* translators: %s refers to the keyboard type, which is 'Typewriter' in this case */
            'title' => sprintf(
            	/* translators: %s is the keyboard name, e.g., Typewriter */
                esc_html__('Click to select %s keyboard', 'ada-tamil-writer'),
                esc_html__('Typewriter', 'ada-tamil-writer')
            )
          )
        ));
        }

        }
    }

new Adadaa_wordpress_admin_bar_improved();
}

function adadaa_recommend_classic_editor_notice() {
    // Check if the notice has already been shown
    $notice_shown = get_option('adadaa_classic_editor_notice_shown');

    // If the notice hasn't been shown yet, display it
    if (!$notice_shown) {
        $message = wp_kses(
            'For optimal performance, we recommend using the <a href="https://wordpress.org/plugins/classic-editor/" target="_blank">Classic Editor</a> plugin with <strong>Ada Tamil Writer</strong>.',
            array(
                'a' => array(
                    'href' => array(),
                    'target' => array(),
                ),
                'strong' => array(),
            )
        );
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>' . esc_html($message) . '</p>';
        echo '</div>';

        // Set the option to indicate that the notice has been shown
        update_option('adadaa_classic_editor_notice_shown', true);
    }
}

// Hook to display the admin notice
add_action('admin_notices', 'adadaa_recommend_classic_editor_notice');

?>
