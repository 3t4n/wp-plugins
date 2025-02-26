<?php
/**
    Plugin Name: A Simple Backend
    Description: A Simple Backend allows designers to create a minimalist WordPress CMS admin experience!
    Version: 1.0.5.2
    Author: Johnathan.PRO
    Author URI: http://Johnathan.PRO
    Network: false
    License: GPL
*/

defined('ABSPATH') or die( 'Access Forbidden!' );

require_once(dirname(__FILE__) . '/helpers/Plugin.php');
require_once(dirname(__FILE__) . '/helpers/ASB_Dashboard_Fix.php');
//require_once(dirname(__FILE__) . '/helpers/Simplified.php');

class asimplebackend extends asimplebackend\helpers\Plugin {
    public function __construct($args = false) {
        $this->name = plugin_basename(__FILE__);
        $this->pre = strtolower(__CLASS__);
        $this->version = '1.0.4.8';

        add_action( 'admin_init', array( $this, 'gf_settings_restrict'));
        add_action( 'init', array( $this, 'flush_cache_dir'));
        add_action( 'admin_head', array($this, 'hide_update_notice') );
        add_filter( 'ninja_table_skip_no_confict', '__return_true' );


        $this->scripts = array(
            'admin' =>  array(
                $this->pre . '-interact'           =>  array(
                    'src'           =>  plugins_url('/js/interact.js', __FILE__),
                    'dependency'    =>  'jquery',
                ),
                $this->pre . '-popper'           =>  array(
                    'src'           =>  plugins_url('/js/popper.min.js', __FILE__),
                    'dependency'    =>  'jquery',
                ),
                $this->pre . '-admin-bar'          =>  array(
                    'src'           =>  plugins_url('/js/admin-bar.js', __FILE__),
                    'dependency'    =>  array('jquery', $this->pre . '-interact', 'jquery-ui-tooltip'),
                ),
                $this->pre . '-admin'              =>  array(
                    'src'           =>  plugins_url('/js/admin.js', __FILE__),
                    'dependency'    =>  array('jquery', $this->pre . '-interact', 'accordion', 'postbox', 'jquery-ui-draggable', 'jquery-ui-sortable', 'jquery-ui-slider', 'jquery-ui-tooltip'),
                ),
                $this->pre . '-menu'               =>  array(
                    'src'           =>  plugins_url('/js/menu.js', __FILE__),
                    'dependency'    =>  $this->pre . '-interact',
                ),
            ),
            $this->pre . '-interact'           =>  array(
                'src'           =>  plugins_url('/js/interact.js', __FILE__),
                'dependency'    =>  'jquery',
            ),
            $this->pre . '-admin-bar'          =>  array(
                'src'           =>  plugins_url('/js/admin-bar.js', __FILE__),
                'dependency'    =>  array('jquery', $this->pre . '-interact', 'jquery-ui-tooltip'),
            ),
        );

        $jquery_ui = "http" . (is_ssl() ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css";
        $font = "http" . (is_ssl() ? "s" : "") . "://fonts.googleapis.com/css?family=Yanone+Kaffeesatz";

        $this->styles = array(
            'admin' =>  array(
                'jquery-style-css'        =>  $jquery_ui,
                $this->pre . '-admin-css' =>  array(
                    'src'           =>  plugins_url('/css/admin.css', __FILE__),
                    'dependency'    =>  'jquery-style-css'
                ),
                'Yanone-Kaffeesatz'   =>  $font
            ),
            'jquery-style-css'        =>  $jquery_ui,
            $this->pre . '-admin-css' =>  array(
                'src'           =>  plugins_url('/css/admin.css', __FILE__),
                'dependency'    =>  'jquery-style-css'
            ),
            'Yanone-Kaffeesatz'   =>  $font
        );

        //on - disabled
        $this->options = array(
            'debugging' =>  true,
            'settings_options'  =>  array(
                //welcome message
                'welcome_message'   =>  "<h1 style='text-align: center;'>Welcome to your simple backend! You can get to editing via the menu in the lower right corner.</h1>",//dashboard admin menu
                //dashboard admin menu
                'menu'              =>  array(
                    '0' =>  array(
                        'name'      =>  'Dashboard',
                        'orig'      =>  'Dashboard',
                        'index'     =>  '0',
                        'link'      =>  'index.php',
                        'type'      =>  'menu',
                        'submenu'   =>  array(
                            array(
                                'show'  =>  '0',
                                'name'  =>  'Home',
                                'link'  =>  'index.php',
                            ),
                            array(
                                'show'  =>  '0',
                                'name'  =>  'Updates',
                                'link'  =>  'update-core.php',
                            )
                        ),
                        'allow' =>  'on',
                        'instructions'  =>  ''
                    ),
                    '1' =>  array(
                        'name'      =>  'Edit All Pages',
                        'orig'      =>  'Pages',
                        'index'     =>  '1',
                        'link'      =>  'edit.php?post_type=page',
                        'type'      =>  'menu',
                        'submenu'   =>  array(
                            array(
                                'show'  =>  '0',
                                'name'  =>  'All Pages',
                                'link'  =>  'edit.php?post_type=page',
                            ),
                            array(
                                'show'  =>  '0',
                                'name'  =>  'Add New',
                                'link'  =>  'post-new.php?post_type=page'
                            ),
                        ),
                        'allow' =>  '',
                        'instructions'  =>  'Select to edit any page on the frontend. Note some pages will be present that are placeholders for other site functions and pages may also contain [shortcodes] in brackets for special functions.'
                    )
                ),
                //dashboard widgets
                'rss_title'         =>  'Johnathan.PRO',
                'rss_url'           =>  'http://fetchrss.com/rss/5f4e5bc38a93f850648b45675f4e5b868a93f8f8648b4567.xml',
                //toggles
                'admin_hidden'      =>  array(
                    'role'          =>  'editor',
                    'password'      =>  'on'
                ),
                'cache_option'      =>  array(
                    'cache'      =>  'on'
                ),
                'editor_hidden'     =>  array(
                    'gallery'       =>  'on',
                    'featured_image'=>  'on'
                ),
                /*
                 * media gallery options
                 * will sync after saving settings
                */
                'image_default_link_type'   =>  'none',
                'image_default_size'        =>  'medium',
                'image_default_align'       =>  'center',
                'sanitized_links'           =>  array(),
                'plugins'                   =>  array(),
                'email'                     =>  array(
                    'from'  =>  array()
                )
            ),
        );

        $this->menu_pages = array(
            'A Simple Backend'   =>  array(
                'capability'    =>  'edit_dashboard',
                'position'      =>  '1',
                'func'          =>  'settings',
            ),
        );

        $this->actions = array(
            'admin_notices'                     =>  false,
            'admin_init'                        =>  false,
            'init'                              =>  array(
                'init'                          =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'welcome_panel'                     =>  false,
            'admin_head'                        =>  'head',
            'wp_head'                           =>  'head',
            'admin_bar_menu'                    =>  array(
                'admin_bar_menu'    =>  array(
                    'priority'  =>  99999999999
                ),
            ),
            'add_meta_boxes'                    =>  array(
                'add_meta_boxes'    =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'do_meta_boxes'                     =>  array(
                'disable_collapse'  =>  array(
                    'priority'  =>  1,
                    'params'    =>  3
                ),
                'remove_widgets'    =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'wp_dashboard_setup'                =>  'setup_widgets',
            'login_head'                        =>  false,
            'login_form'                        =>  false,
            'login_footer'                      =>  false,
            'admin_footer'                      =>  false,
            'edit_form_top'                     =>  false,
            'publish_product'                   =>  array(
                'publish_product'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'edit_form_before_permalink'        =>  false,
            'manage_product_posts_custom_column'=>  false,
            'load-index.php'                    =>  'show_welcome_panel',
            'wp_after_admin_bar_render'         =>  'admin_bar',
            'wp_logout'                         =>  false,
            'wp_login'                          =>  false,
            'wp_footer'                         =>  false,
            'wp_ajax_login_logo_upload'         =>  'login_logo_upload',
            'wp_ajax_nopriv_login_logo_upload'  =>  'login_logo_upload',
            'wp_ajax_add_menu'                  =>  'add_menu',
            'wp_ajax_nopriv_add_menu'           =>  'add_menu',
            'wp_ajax_add_link'                  =>  'add_link',
            'wp_ajax_nopriv_add_link'           =>  'add_link',
            'wp_ajax_add_page'                  =>  'add_page',
            'wp_ajax_nopriv_add_page'           =>  'add_page',
            'wp_ajax_add_media'                 =>  'add_media',
            'wp_ajax_nopriv_add_media'          =>  'add_media',
            'wp_ajax_basic'                     =>  'wp_logout',
            'wp_ajax_nopriv_basic'              =>  'wp_logout',
        );

        $this->filters = array(
            'login_redirect'    =>  array(
                'login_redirect'        =>  array(
                    'priority'  =>  1,
                    'params'    =>  3
                )
            ),
            'screen_options_show_screen'    =>  array(
                'remove_screen_options' =>  array(
                    'params'    =>  2
                )
            ),
            'contextual_help'   =>  array(
                'remove_help'   =>  array(
                    'params'    =>  3
                )
            ),
            'page_row_actions'  =>  array(
                'remove_row_actions'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'post_row_actions'  =>  array(
                'remove_row_actions'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'tag_row_actions'   =>  array(
                'remove_row_actions'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'manage_posts_columns'  =>  array(
                'remove_columns'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'manage_pages_columns'  =>  array(
                'remove_columns'    =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'plugin_action_links_' . $this->name => 'plugin_action_links',
            'user_can_richedit'     =>  false,
            'wp_default_editor'     =>  false,
            'gettext'               =>  array(
                'rename_media_button'  =>  array(
                    'params'    =>  2,
                    'priority'  =>  99999999999
                )
            ),
            'media_view_strings'    =>  array(
                'remove_media_strings'  =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'wp_insert_post_data'   =>  array(
                'wp_insert_post_data'   =>  array(
                    'priority'  =>  99999999999,
                    'params'    =>  2
                )
            ),
            'wp_mail_from'                  =>  array(
                'wp_mail_from'          =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'wp_mail_from_name'             =>  array(
                'wp_mail_from_name'     =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'woocommerce_product_data_tabs' =>  array(
                'woocommerce_product_data_tabs' =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'manage_product_posts_columns'  =>  array(
                'manage_product_posts_columns'  =>  array(
                    'priority'  =>  99999999999
                )
            ),
            'the_seo_framework_show_seo_column' =>  array(
                'the_seo_framework_show_seo_column' =>  array(
                    'priority'  =>  99999999999
                )
            )
        );

        // list of pages (current_screen ids) affected by metabox toggle
        $this->widget_exempt = array('blogging', 'dashboard', 'page', 'post', 'product', 'slideshow', 'wysiwyg-widget', 'hrf_faq', 'bne_testimonials');

        //register the plugin and init assets
		$this->register_plugin($this->name, __FILE__, true);

        if(! is_array($this->options['settings_options']['plugins'])) {
            $this->options['settings_options']['plugins'] = array();
        }

        //get mode status
        $this->the_advance();

        if($this->options['settings_options']['rss_url'] == 'https://bitly.com/u/johnathanevans.rss' // v1.0.2.3 rss hotfix
        || $this->options['settings_options']['rss_url'] == 'https://queryfeed.net/tw?q=%40evanspress') {   // v1.0.3.1 rss hotfix
            $this->options['settings_options']['rss_url'] = 'https://twitrss.me/twitter_user_to_rss/?user=johnathandotpro';
            $this->update_option('rss_url', 'https://twitrss.me/twitter_user_to_rss/?user=johnathandotpro');
        }

        // v1.0.2.5 rss title hotfix temp
        if($this->options['settings_options']['rss_title'] == 'Tips from Johnathan Evans and Evans Press…') {
            $this->options['settings_options']['rss_title'] = 'Web Design, Marketing and WordPress…';
            $this->update_option('rss_title', 'Web Design, Marketing and WordPress…');
        }

        //get Simplified Product
        if(empty($this->advance) && class_exists('Simplified')) {
            $simplified_product = new Simplified(array());
        }

        ksort($this->options['settings_options']['menu']);

        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        //export
        if(! empty($_GET['action']) && $_GET['action'] == 'export' && $this->pre == str_replace('-', '', $_GET['page'])) {
            $output = json_encode($this->options['settings_options'], JSON_PRETTY_PRINT);
            $filename = "asimplebackend-settings-" . date("m-d-Y") . ".json";

            if($output !== false) {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Length: " . strlen($output) . ";");
                header("Content-Disposition: attachment; filename=" . $filename);
                header("Content-Type: text/plain; ");
                header("Content-Transfer-Encoding: binary");

                echo $output;
                exit;
            }
        }
    }

    function hide_update_notice()
    {
        if(! $this->advance) {
            remove_all_actions( 'admin_notices' );    
        }
    }

    public function the_seo_framework_show_seo_column($bool) { //remove The SEO Framework Page/Post column
        if(empty($this->advance) && empty($this->options['settings_options']['plugins']['theseoframework'])) {
            return false;
        }

        return $bool;
    }

    public function deactivate() {
        if(! empty($_GET['purge'])) {
            $this->deactivation_hook();
            $this->wp_logout();
        }
    }

    public function admin_bar_menu($wp_admin_bar) {
        if(! empty($this->advance)) {
            $href = $_SERVER['REQUEST_URI'];
            if(empty($_GET)) {
                $href .= "?";
            } else {
                $href .= "&";
            }
            $href .= "a-simple-backend-mode=basic";
            $wp_admin_bar->add_node(array(
                'id' => 'backend-basic',
                'title' => 'A Simple Backend',
                'href' => $href,
            ));
        }
    }

    public function admin_notices() {
        global $current_user, $current_screen;

        $dismiss = '';
        if(! empty($_GET)) {
            $dismiss = http_build_query($_GET);
        }

        if(! empty($dismiss)) {
            $dismiss .= '&simple_backend_notice=0';
        } else {
            $dismiss = 'simple_backend_notice=0';
        }

        $data = array(
            'link'      =>  admin_url("admin.php?page=a-simple-backend"),
            'dismiss'   =>  '?' . $dismiss,
        );

        if(! get_user_meta($current_user->ID, $this->pre . '-notice') && current_user_can('administrator')) {
            $this->render('notice', $data, true, 'admin');
        }
    }

    public function admin_init() {
        global $current_user;

        //import
        if(! empty($_FILES['file']) && $this->pre == str_replace('-', '', $_GET['page'])) {
            $success = false;
            $upload = wp_handle_upload($_FILES['file'], array('test_form' => false, 'test_type' => false, 'action' => $this->url));

            if($upload && ! isset($upload['error'])) {
                $content = file_get_contents($upload['file']);
                if(! empty($content) && $opts = json_decode($content, true)) {
                    $this->options['settings_options'] = $opts;
                    foreach($opts as $name => $value) {
                        if($name == 'menu' && is_array($value)) {
                            $value = $this->sanitize_menu($value);
                        }

                        $this->update_option($name, $value);
                    }
                    $success = true;
                }
            }

            if(! $success) {
                $this->render_err('Import failed');
            }

            //remove file to reduce clutter
            unlink($upload['file']);
        }

        //set notice
        if(isset($_GET['simple_backend_notice']) && '0' == $_GET['simple_backend_notice']) {
            add_user_meta($current_user->ID, $this->pre . '-notice', 'true', true);
        }
    }

    public function init() {
        if(empty($this->advance)) {
            if(! empty($_GET['post_type'])) {
                if($_GET['post_type'] != 'page' && $_GET['post_type'] != 'post') {
                    return;
                }
            } elseif(! empty($_GET['post']) && ! empty($_GET['action']) && $_GET['action'] == 'edit') {
                $post = get_post($_GET['post']);
                if($post->post_type != 'post' && $post->post_type != 'page') {
                    return;
                }
            }

            //remove WP QUADS init
            //Quads_Meta_Box->save causes nonce failure on quads_config_nonce by quads_config
            remove_action('load-post.php', 'quads_load_meta_box');
            remove_action('load-post-new.php', 'quads_load_meta_box');

            show_admin_bar(false);
        }
    }

    public function the_advance() {
        global $current_user;

        $this->advance = 0;

        if(! empty($_GET['a-simple-backend-mode'])) {
            $request = explode("?", $_SERVER['REQUEST_URI'])[0];
            $gets = $_GET;

            unset($gets['a-simple-backend-mode']);
            $gets = array_filter($gets);

            switch($_GET['a-simple-backend-mode']) {
                case 'basic':
                    $this->wp_logout();
                    break;
                case 'advance':
                    setcookie($this->pre . '-mode', 1, 0, '/');
                    break;
            }

            if(! empty($gets)) {
                $request .= '?' . http_build_query($gets);
            }

            header('Location:' . $request);  //wp_redirect & wp_safe_redirect does not work :(
            exit();
        }

        if(! empty($_COOKIE[$this->pre . '-mode'])) {
            $this->advance = 1;
        }
    }

    public function head() {
        if(is_user_logged_in()) {
            if (empty($this->advance) && is_admin()) {
                global $current_screen;

                //remove on WooCommerce Product Editor
                if(is_object($current_screen) && $current_screen->id == 'product' && empty($this->options['settings_options']['plugins']['woocommerce'])) {
                    remove_action('media_buttons', 'media_buttons');
                }
                //remove Gravity Forms Add Form button on Add Post & Page
                if(empty($this->options['settings_options']['plugins']['gravity_forms'])) {
                    //Gravity Forms 1.9.8.5 or earlier
                    remove_action('media_buttons', array('RGForms', 'add_form_button'), 20);
                    //Gravity Forms 1.9.19 [May 5 2016]
                    remove_action('media_buttons', array('GFForms', 'add_form_button'), 20);
                }

                //remove Insert Slideshow from Add Post & Page
                if(empty($this->options['settings_options']['plugins']['slideshow'])) {
                    remove_action('media_buttons', array('SlideshowPluginShortcode', 'shortcodeInserter'), 11);
                }
            }

            $data = array(
                'exempt'    => $this->widget_exempt,
                'mode'      => empty($this->advance) ? 0 : 1,
                'flushed'   => isset($_GET['cache_flushed']) ? 1 : 0
            );

            $this->render('head', $data, true, 'admin');
        }
    }

    public function gf_settings_restrict() {
        if (!$this->advance && (!wp_doing_ajax() )) {
                if(isset($_GET['page']) && $_GET['page'] == 'gf_edit_forms') {
                    $redirect_url = get_site_url( get_current_blog_id()) .  '/wp-admin/admin.php?page=gf_entries&id=' . $_GET['id'];
                    wp_redirect($redirect_url);
            }
        }
    }

    public function flush_cache_dir() {
        if( isset($_GET['flush_cache_dir'])) {
            if( wp_verify_nonce( $_GET['_wpnonce'], 'flush_cache_dir' )) {
                $this->delete_cache_dir_content();
            }
        }
    }

    public function remove_media_strings($strings) {
        if(empty($this->advance)) {
            $editor = $this->options['settings_options']['editor_hidden'];

            if (!empty($editor['featured_image']) && $editor['featured_image'] == "on") {
                $strings['setFeaturedImageTitle'] = false;
            }

            if (!empty($editor['gallery']) && $editor['gallery'] == "on") {
                $strings['createGalleryTitle'] = false;
            }
        }

        return $strings;
    }

    public function login_redirect($redirect_to, $requested_redirect_to, $user) {
        if(! is_wp_error($user)) {
            //remove Buddpress Login Redirect Hooks
            if (empty($this->options['settings_options']['plugins']['buddypress_login_redirect']) && in_array('administrator', $user->roles)) {
                remove_filter("login_redirect", "bp_login_redirection", 100);
                remove_action('wp_logout', 'blr_logout_redirect');
                $redirect_to = admin_url();
            }
        }

        return $redirect_to;
    }

    public function wp_logout() {
        setcookie($this->pre . '-mode', 0, time() - 3600, '/');
    }

    public function wp_login() {
        $this->wp_logout();
    }

    public function wp_footer() {
        global $show_admin_bar;

        if(! $show_admin_bar && empty($this->advance)) {
            $this->admin_bar();
        }
    }

    public function woocommerce_product_data_tabs($product_data_tabs) {
        if(empty($this->advance) && empty($this->options['settings_options']['plugins']['woocommerce'])) {
            /*$new_tabs = array();

            foreach ($product_data_tabs as $id => $attr) {
                if ($id == 'general' || $id == 'attribute') {
                    $new_tabs[] = $product_data_tabs[$id];
                }
            }

            return $new_tabs; */
            if(class_exists('Simplified')) {
                $product_data_tabs['variations']['class'][] = 'show_if_simplified_product';
            }
        }

        return $product_data_tabs;
    }

    public function manage_product_posts_columns($columns) {
        //remove woocommerce tag, featured, and type columns on product list
        unset($columns['product_tag']);
        unset($columns['featured']);
        unset($columns['product_type']);

        if(empty($this->advance)) {
            $columns['actions'] = 'Actions';
        }

        return $columns;
    }

    public function edit_form_before_permalink($post) {
        global $wp_meta_boxes;

        $submitdiv = false;

        foreach($wp_meta_boxes[$post->post_type] as $context => $priorities) {
            foreach($priorities as $priority => $metaboxes) {
                if(isset($metaboxes['submitdiv']) && $metaboxes['submitdiv'] !== false) {
                    $submitdiv = true;
                    break 2;
                }
            }
        }
        // only render when submitdiv isn't around
        if(empty($this->advance) && ! $submitdiv) {
            $this->render('titlewrap', array(
                'post' => $post
            ));
        }
    }

    public function manage_product_posts_custom_column($column) {
        global $post, $the_product;

        if(empty($this->advance) && $column == 'actions') :
?>
<a class="<?php echo $this->pre; ?>-woocommerce-duplicate" href="<?php echo wp_nonce_url(admin_url('edit.php?post_type=product&action=duplicate_product&amp;post=' . $post->ID), 'woocommerce-duplicate-product_' . $post->ID); ?>" title="<?php echo esc_attr__('Make a duplicate from this product', 'woocommerce'); ?>" rel="permalink"><?php echo __('Duplicate', 'woocommerce'); ?></a>
<?php
        endif;
    }

    public function remove_media_settings($settings) {
        if(empty($this->advance)) {
            $settings['defaultProps'] = array(
                'link' => $this->options['settings_options']['image_default_link_type'],
                'align' => $this->options['settings_options']['image_default_align'],
                'size' => $this->options['settings_options']['image_default_size'],
            );
        }

        return $settings;
    }

    public function rename_media_button($translation, $text) {
        global $current_screen;
        if (empty($this->advance)
        && is_admin()) {
            $editor = $this->options['settings_options']['editor_hidden'];;
            if($text == 'Add Media' && empty($editor['media_name'])) {
                return 'Add Photos';
            }
        }

        return $translation;
    }

    public function user_can_richedit() {
        if(empty($this->advance)) {
            if (empty($this->options['settings_options']['richeditor'])) {
                return true;
            }
            return false;
        }
        return true;
    }

    public function wp_default_editor($editor) {
        if(empty($this->advance)) {
            if (!empty($this->options['settings_options']['richeditor']) && $this->options['settings_options']['richeditor'] == "on") {
                return $editor;
            }
            return 'tinymce';
        }
        return $editor;
    }

    public function plugin_action_links($links) {
        $links['settings'] = '<a href="'. admin_url('options-general.php?page=a-simple-backend') .'">Settings</a>';
        $links['purge'] = str_replace('>Deactivate<', '>Uninstall<', str_replace('action', 'purge=1&action', $links['deactivate']));

        return $links;
    }

    public function admin_bar() {
        global $_parent_pages;

        if(is_user_logged_in()) {
            global $wp_admin_bar, $menu, $submenu, $current_screen, $wp_the_query;

            $all_caps = array();
            foreach(wp_get_current_user()->allcaps as $cap => $val) {
                $all_caps[] = $cap;
            }

            $capabilities = get_role($this->options['settings_options']['admin_hidden']['role']);
            $allow = true;
            foreach($capabilities->capabilities as $cap => $val) {
                if(! in_array($cap, $all_caps)) {
                    $allow = false;
                    break;
                }
            }

            $mode = '';
            $hmenu = $this->sanitize_menu($this->options['settings_options']['menu']);
            if (!empty($hmenu)) {
                global $_sanitized_links;
                $_sanitized_links = $this->options['settings_options']['sanitized_links'];
                if (empty($_sanitized_links)) {
                    $_sanitized_links = array();
                }

                //remove inaccessible items
                foreach ($hmenu as $key => $item) {
                    if (!$allow && empty($item['allow'])) {
                        unset($hmenu[$key]);
                        continue;
                    }

                    if ($item['type'] == 'menu') {
                        foreach ($menu as $i) {
                            if ($i[2] == $item['link']) {
                                if (current_user_can($i[1])) {
                                    if (!empty($item['submenu'])) {
                                        foreach ($submenu as $parent => $s) {
                                            if ($parent == $item['link']) {
                                                foreach ($item['submenu'] as $index => $sub) {
                                                    if (empty($sub['show'])) {
                                                        unset($item['submenu'][$index]);
                                                        continue;
                                                    }

                                                    foreach ($s as $subitem) {
                                                        if ($subitem[2] == $sub['link'] && !current_user_can($subitem[1])) {
                                                            unset($item['submenu'][$index]);
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        $hmenu[$key]['submenu'] = array_filter($item['submenu']);
                                    }
                                } else {
                                    unset($hmenu[$key]);
                                }
                                break;
                            }
                        }
                    }

                    if ($item['type'] == 'toplink') {
                        foreach ($submenu as $parent => $s) {
                            $break = false;

                            foreach ($s as $subitem) {
                                if ($subitem[2] == $item['link'] && !current_user_can($subitem[1])) {
                                    unset($hmenu[$key]);
                                    $break = true;
                                    break;
                                }
                            }

                            if ($break) {
                                break;
                            }
                        }
                    }

                    if (($item['type'] == 'page' && !current_user_can('edit_pages')) || ($item['type'] == 'media' && !current_user_can('edit_posts'))) {
                        unset($hmenu[$key]);
                    }
                }

                //remove empty elements
                $hmenu = array_filter($hmenu);

                //resolve links
                foreach ($hmenu as $key => $item) {
                    switch ($item['type']) {
                        case 'menu':
                            if (!empty($item['submenu'])) {
                                foreach ($item['submenu'] as $index => $sub) {
                                    if (empty($sub['show'])) {
                                        unset($item['submenu'][$index]);
                                    } else {
                                        $item['submenu'][$index]['link'] = $this->sanitize_link($sub['link'], 'toplink');
                                    }
                                }
                                $hmenu[$key]['submenu'] = array_filter($item['submenu']);
                            }
                        case 'toplink':
                            $hmenu[$key]['link'] = $this->sanitize_link($item['link'], $item['type']);
                            break;
                        default:
                            $hmenu[$key]['link'] = $this->sanitize_link($item['link'], $item['type']);
                            break;
                    }

                    //cannot sanitize link
                    if ($hmenu[$key]['link'] === false) {
                        unset($hmenu[$key]);
                    }
                }

                if (is_admin()) {
                    //save sanitized links
                    $this->update_option('sanitized_links', $_sanitized_links);
                }

                //remove empty elements
                $hmenu = array_filter($hmenu);
            } else {
                $hmenu = array();
            }

            $link = "";
            $label = "";
            $post = false;

            if ($allow && (current_user_can('edit_pages') || current_user_can('edit_products'))) {  //ensure user is allowed to edit pages

                if (is_admin()) {
                    $post = get_post();
                } else {
                    $post = $wp_the_query->get_queried_object();
                }

                if (!empty($post->ID)) {
                    $post_type_object = get_post_type_object($post->post_type);

                    //check if in admin and editing
                    if ((!empty($current_screen)
                            && $current_screen->base == "post"
                            && $current_screen->action != "add")
                        || !is_admin()
                    ) {
                        if (is_admin()) {
                            $link = set_url_scheme(get_permalink($post->ID));
                            $label = "View";
                        } else {
                            $link = admin_url("post.php?post=" . $post->ID . "&action=edit");
                            $label = "Edit";
                        }

                        $label .= " " . ucwords($post->post_type);
                    } else {
                        $post = false;
                    }
                } else {
                    $post = false;
                }
            }

            $mode = $_SERVER['REQUEST_URI'];
            $query = explode("?", $mode);
            $get = false;

            if (!empty($query) && count($query) > 1) {
                $query = $query[1];
                $get = array_filter(explode("&", $query));
            }

            if (empty($get)) {
                if (substr($mode, -1) != "?") {
                    $mode .= "?";
                }
            } else {
                $mode .= "&";
            }

            if (empty($this->advance)) {
                $mode .= "a-simple-backend-mode=advance";
            } else {
                $mode .= "a-simple-backend-mode=basic";
            }

            $permalink = '';
            if(! is_admin()) {
                $permalink = get_permalink();
            }

            $cache_dir = $gd = $wpaas = $kinsta = $wpcycle = '';

            $cache_dir = home_url() . '?cache_flushed=&flush_cache_dir&_wpnonce=' . wp_create_nonce('flush_cache_dir');
            if(class_exists('GD_System_Plugin_Command_Controller') && ! isset($this->options['settings_options']['plugins']['godaddy'])) {
                $gd = home_url() . '?cache_flushed=&GD_COMMAND=FLUSH_CACHE&GD_NONCE=' . wp_create_nonce('GD_FLUSH_CACHE');
            }
            
            if(class_exists('WPaaS\\Cache') && ! isset($this->options['settings_options']['plugins']['godaddy'])) {
                $wpaas = home_url() . '?cache_flushed=&wpaas_action=flush_cache&wpaas_nonce=' . wp_create_nonce('wpaas_flush_cache');
            }

            if(class_exists('Kinsta\KinstaCache') && ! isset($this->options['settings_options']['plugins']['kinsta'])) {
                $kinsta = wp_nonce_url(admin_url('admin-ajax.php?action=kinsta_clear_cache_all&source=adminbar'), 'kinsta-clear-cache-all', 'kinsta_nonce');
            }

            if(class_exists('wpcyclengxc_Admin') && ! isset($this->options['settings_options']['plugins']['wpcycle'])) {
                $wpcycle = admin_url(sprintf("/admin-ajax.php?action=flushcache&redirect_to=%s&nonce=%s", home_url() . '?cache_flushed', wp_create_nonce("flushcache")));
            }

            $this->render('admin-bar', array(
                'allow'     =>  $allow,
                'menu'      =>  $hmenu,
                'gd'        =>  $gd,
                'wpaas'     =>  $wpaas,
                'kinsta'    =>  $kinsta,
                'wpcycle'   =>  $wpcycle,
                'wpcycle'   =>  $wpcycle,
                'cache_dir'   =>  $cache_dir,
                'logout'    =>  wp_logout_url($permalink),
                'post'      =>  $post,
                'link'      =>  $link,
                'label'     =>  $label,
                'mode'      =>  $mode
            ), true, 'admin');

            if (empty($this->advance)) {
                $this->admin_aesthetics();
            }
        }
    }

    public function remove_help($old_help, $screen_id, $screen) {
        if (empty($this->advance)) {
            $screen->remove_help_tabs();
        }

        return $old_help;
    }

    public function remove_row_actions($actions, $post) {
        global $current_screen;

        if (empty($this->advance) && $current_screen->base != 'edit-tags') {
            return array();
        }

        return $actions;
    }

    public function remove_columns($columns) {
        global $current_screen;

        if(empty($this->advance)) {
            if($current_screen->id == 'edit-post') {
                return array('cb' => '', 'title' => 'Title');
            } else {
                return array('title' => 'Title');
            }
        }

        return $columns;
    }

    public function remove_screen_options() {
        if (empty($this->advance)) {
            return false;
        }

        return true;
    }

    public function show_welcome_panel() {
        $id = get_current_user_id();

        if (!get_user_meta($id, 'show_welcome_panel', true)) {
            update_user_meta($id, 'show_welcome_panel', 1);
        }
    }

    public function settings_options($options) {
        return $options;
    }

    public function settings() {
        global $wp_roles, $menu, $submenu;

        $menu_items = array();
        foreach($menu as $key => $item) {
            $menu_items[$key] = $item;
            $menu_items[$key][0] = preg_replace('/\s*(\<span).*(\<\/span>)/i', '', $item[0]);   //remove notification html tags
            $menu_items[$key]['submenu'] = array();
            foreach($submenu as $parent => $sub) {
                if($item[2] == $parent) {
                    foreach($sub as $index => $values) {
                        $sub[$index][0] = preg_replace('/\s*(\<span).*(\<\/span>)/i', '', $values[0]);
                    }
                    $menu_items[$key]['submenu'] = $sub;
                    break;
                }
            }
        }

        //end
        //rss
        $rss = $this->options['settings_options']['rss_url'];
        $default_rss = 'http://fetchrss.com/rss/5f4e5bc38a93f850648b45675f4e5b868a93f8f8648b4567.xml';
        if(empty($rss)) {
            $rss = $default_rss;
        }
        //end

        $query_images = new WP_Query(array(
            'post_type' => 'attachment',
            'post_mime_type' =>'image',
            'post_status' => 'inherit',
            'posts_per_page' => 5,
            'orderby' => 'rand'
        ));
        $media = $query_images->posts;
        foreach($media as $key => $item) {
            if(empty($item->post_title)) {
                $media[$key]->post_title = basename($item->guid);
            }
        }

        $sitename = strtolower($_SERVER['SERVER_NAME']);
        if(substr( $sitename, 0, 4 ) == 'www.') {
            $sitename = substr($sitename, 4);
        }

        $from_email = 'wordpress@' . $sitename;

        $this->render('settings', array(
            'welcome_message'   =>  $this->options['settings_options']['welcome_message'],
            'menu'              =>  $menu_items,
            'page'              =>  get_pages(array(
                'sort_order'    =>  'asc',
                'sort_column'   =>  'post_title',
                'post_type'     =>  'page',
                'post_status'   =>  'publish'
            )),
            'media'             =>  $media,
            'default_rss'       =>  $default_rss,
            'rss'               =>  $rss,
            'rss_title'         =>  $this->options['settings_options']['rss_title'],
            'admin_hidden'      =>  $this->options['settings_options']['admin_hidden'],
            'cache_option'      =>  $this->options['settings_options']['cache_option'],
            'editor_hidden'     =>  $this->options['settings_options']['editor_hidden'],
            'alignment'         =>  $this->options['settings_options']['image_default_align'],
            'link'              =>  $this->options['settings_options']['image_default_link_type'],
            'size'              =>  $this->options['settings_options']['image_default_size'],
            'roles'             =>  $wp_roles->roles,
            'show'              =>  $this->options['settings_options']['menu'],
            'plugins'           =>  $this->options['settings_options']['plugins'],
            'email'             =>  $this->options['settings_options']['email'],
            'email_placeholder' =>  array(
                'from'  =>  array(
                    'address'   =>  apply_filters('wp_mail_from', $from_email),
                    'name'      =>  apply_filters('wp_mail_from_name', 'Wordpress')
                )
            ),
            'active_plugins'    =>  get_option('active_plugins')
            ), true, 'admin');
    }

    public function welcome_panel() {
        if(empty($this->advance)) {
            $this->render('welcome', array(
                'pre' => $this->pre,
                'welcome_message' => $this->options['settings_options']['welcome_message'],
            ), true, 'admin');
        }
    }

    public function setup_widgets() {
        if(empty($this->options['settings_options']['admin_hidden']['rss'])) {
            $this->wp_add_dashboard_widget($this->pre . 'posts-feed', $this->options['settings_options']['rss_title'], 'posts_feed');
        }
    }

    public function add_meta_boxes() {
        global $current_screen, $post_type, $post;

        if(empty($this->advance)) {
            if($current_screen->id == 'product' && empty($this->options['settings_options']['plugins']['product'])) {
                //reset metabox positions
                delete_user_meta(get_current_user_id(), 'meta-box-order_product');

                /** WooCommerce Metaboxes */
                remove_meta_box( 'product_catdiv', 'product', 'side' );
                $cats = get_categories(array('taxonomy' => 'product_cat', 'hide_empty' => false));
                if(! empty($cats)) {
                    add_meta_box( 'product_catdiv', 'Categories...', 'post_categories_meta_box', 'product', 'side', 'high', array('taxonomy' => 'product_cat') );
                }

                add_meta_box('woocommerce-instruction-box', __ ('Basic Instructions…'), array($this, 'woocommerce_instruction_box'), 'product', 'normal', 'high');
                if(class_exists('WC_Meta_Box_Product_Data')) {
                    remove_meta_box('woocommerce-product-data', 'product', 'normal');
                    add_meta_box( 'woocommerce-product-data', __( 'Options...', 'woocommerce' ), 'WC_Meta_Box_Product_Data::output', 'product', 'normal', 'default' );
                }

                remove_meta_box( 'postimagediv', 'product', 'normal' );
                add_meta_box('postimagediv', 'Main Photo...', 'post_thumbnail_meta_box', 'product', 'normal', 'low');
                if (class_exists('WC_Meta_Box_Product_Images')) {
                    remove_meta_box('woocommerce-product-images', 'product', 'normal');
                    add_meta_box('woocommerce-product-images', __('More Photos...', 'woocommerce'), 'WC_Meta_Box_Product_Images::output', 'product', 'normal', 'low');
                }
            }

            if($current_screen->id == 'slideshow' && empty($this->options['settings_options']['plugins']['slideshow'])) {
                //reset metabox positions
                delete_user_meta(get_current_user_id(), 'meta-box-order_slideshow');
                //vital nonce
                add_meta_box('slideshow-hidden-nonce', 'Nonce', array($this, 'add_slideshow_nonce'), 'slideshow', 'normal', 'low');
            }

            if($current_screen->id == 'post' && empty($this->options['settings_options']['plugins']['blogging'])) {
                $post_type_object = get_post_type_object($post_type);

                $thumbnail_support = current_theme_supports('post-thumbnails', $post_type) && post_type_supports($post_type, 'thumbnail');
                if($thumbnail_support && current_user_can('upload_files')) {
                    remove_meta_box('postimagediv', 'blogging', 'side');
                    add_meta_box('postimagediv', esc_html($post_type_object->labels->featured_image), 'post_thumbnail_meta_box', null, 'side', 'low');
                }

                foreach(get_object_taxonomies($post) as $tax_name) {
                    $taxonomy = get_taxonomy($tax_name);
                    if(! $taxonomy->show_ui || false === $taxonomy->meta_box_cb) {
                        continue;
                    }

                    $label = $taxonomy->labels->name;

                    if(! is_taxonomy_hierarchical($tax_name)) {
                        $tax_meta_box_id = 'tagsdiv-' . $tax_name;
                    } else {
                        $tax_meta_box_id = $tax_name . 'div';
                    }

                    remove_meta_box($tax_meta_box_id, 'blogging', 'side');
                    add_meta_box($tax_meta_box_id, $label, $taxonomy->meta_box_cb, null, 'side', 'low', array('taxonomy' => $tax_name));
                }

                //replace submitdiv ID with another
                $publish_callback_args = null;
                if(post_type_supports($post_type, 'revisions') && 'auto-draft' != $post->post_status ) {
                    $revisions = wp_get_post_revisions($post->ID);

                    // We should aim to show the revisions meta box only when there are revisions.
                    if(count($revisions) > 1) {
                        reset($revisions); // Reset pointer for key()
                        $publish_callback_args = array('revisions_count' => count($revisions), 'revision_id' => key($revisions));
                    }

                    // only appear on published posts
                    //add_meta_box('submitdiv_blogging', _('Publish'), 'post_submit_meta_box', null, 'side', 'low', $publish_callback_args);
                }
            }
        }
    }

    public function add_slideshow_nonce() {
        wp_nonce_field(SlideshowPluginSlideshowSettingsHandler::$nonceAction, SlideshowPluginSlideshowSettingsHandler::$nonceName);
    }

    public function disable_collapse($post_type, $context, $post) {
        global $wp_meta_boxes;

        $screen = get_current_screen();
        $page = $screen->id;

        if(isset($wp_meta_boxes[ $page ][ $context ])) {
            foreach(array('high', 'sorted', 'core', 'default', 'low') as $priority) {
                if(isset($wp_meta_boxes[ $page ][ $context ][ $priority ])) {
                    foreach ((array) $wp_meta_boxes[ $page ][ $context ][ $priority ] as $box) {
                        if(false == $box || ! $box['title']) {
                            continue;
                        }
                        $this->add_filter("postbox_classes_{$page}_{$box['id']}", "__return_empty_array");
                    }
                }
            }
        }
    }

    public function remove_widgets() {
        if (empty($this->advance)) {
            global $wp_meta_boxes, $current_screen;

            // save to local variable to avoid interference with other usage(s)
            $screen_id = $current_screen->id;

            if($current_screen->id == 'post' && empty($this->options['settings_options']['plugins']['blogging'])) {
                $screen_id = 'blogging';
            }

            if(! in_array($screen_id, $this->widget_exempt) || array_key_exists($screen_id, $this->options['settings_options']['plugins'])) {
                return;
            }

            foreach ($wp_meta_boxes as $page => $widgets) {

                foreach ($widgets as $context => $group) {
                    foreach ($group as $priority => $meta_boxes) {
                        foreach ($meta_boxes as $id => $meta_box) {
                            //don't remove category meta box on page/post when not empty
                            if($id == 'categorydiv') {
                                $cats = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
                                if ((! empty($cats) && count($cats) > 1) || $screen_id == 'blogging') {
                                    continue;
                                }
                            }

                            //don't remove testimonial category meta box on BNE Testimonials when not empty
                            if($id == 'bne-testimonials-taxonomydiv') {
                                $cats = get_categories(array('taxonomy' => 'bne-testimonials-taxonomy', 'hide_empty' => false));
                                if (! empty($cats) && count($cats) > 1) {
                                    continue;
                                }
                            }



                            $is_on = get_option($this->pre . 'plugins');
                            if(isset($is_on['acf']) && $is_on['acf'] == 'on' && ($page == 'page' || $page == 'post') && strpos($id, 'acf-group_') !== false) {
                                continue;
                            }

                            if ($id == $this->pre . 'posts-feed'
                                || $id == 'wpAutosinventory'    //wp-autos plugin (unpublished)
                                || $id == 'product_catdiv'  //WooCommerce Product Categories Post Box
                                || ($id == 'postimagediv' && $current_screen->id == 'product')  //WooCommerce Product Image | Featured Image for others
                                || ($id == 'postimagediv' && $current_screen->id == 'bne_testimonials') // BNE Testimonials Thumbnail | Featured Image for others
                                || $id == 'woocommerce-product-images'  //WooCommerce Product Gallery
                                || $id == 'woocommerce-product-data'    //WooCommerce Product Data
                                || $id == 'woocommerce-instruction-box' //WooCommerce custom instruction box
                                || $id == 'woocommerce-featured-box'    //ASB WC featured checkbox
                                || ($id == 'theseoframework-inpost-box' && ! empty($this->options['settings_options']['plugins']['theseoframework']))    //The SEO Framework Post Box
                                || $id == 'slides-list' //slideshow slides list
                                || $id == 'slideshow-hidden-nonce'  //custom slideshow metabox containing nonce
                                // Blogging
                                || ($id == 'submitdiv_blogging' && $screen_id == 'blogging')
                                || ($id == 'postimagediv' && $screen_id == 'blogging')
                                || ($id == 'tagsdiv-post_tag' && $screen_id == 'blogging')
                                // Blogging END
                            ) {
                                continue;
                            } else {
                                remove_meta_box($id, $page, $context);
                            }
                        }
                    }
                }
            }
        }
    }

    public function posts_feed() {
        $rss = $this->options['settings_options']['rss_url'];

        $count = 0;
        $items = array();

        if(empty($rss)) {
            $rss = get_bloginfo('rss2_url');
        }

        $feed = fetch_feed($rss);

        if(! is_wp_error($feed)) {
            $count = $feed->get_item_quantity(10);
            $items = $feed->get_items(0, $count);
        }

        $this->render('feed', array(
            'pre'   =>  $this->pre,
            'count' =>  $count,
            'items' =>  $items,
        ), true, 'admin');
    }

    //Change login image
    public function login_head() {
        ?>
        <style type="text/css">
            body.login #login h1 a { background: transparent; height: 0; margin: 0; width: 0; }
        </style>
        <?php
    }

    public function login_form() {
        if(empty($this->options['settings_options']['admin_hidden']['password'])) {
            $this->render('password');
        }
    }

    public function login_footer() {
        ?>
        <script type="text/javascript">
            var nav = document.getElementById('nav');
            nav.parentNode.removeChild(nav);

            var backtoblog = document.getElementById('backtoblog');
            backtoblog.parentNode.removeChild(backtoblog);
        </script>
        <?php
    }

    //Change Admin Bar
    public function admin_aesthetics() {
        global $current_screen, $plugin_page;

        /*
         * Metaboxes
         *
         * Layout metaboxes for dashboard, page, & post pages
         */
        if(is_object($current_screen) && in_array($current_screen->id, $this->widget_exempt) && ! array_key_exists($current_screen->id, $this->options['settings_options']['plugins'])):
        ?>
        <style type="text/css">
            #poststuff #post-body.columns-2 { margin-right: 0; }
            #post-body-content,
            #post-body.columns-2 #postbox-container-1 { float: none; margin-right: 0; width: auto; }
            #poststuff #post-body.columns-2 #side-sortables { width: auto; }
            #dashboard-widgets .postbox-container,
            #post-body .postbox-container { float: left !important; margin-bottom: 20px; }
            #post-body .postbox { float: left; margin: 0 10px 10px 0; width: 280px; }
            #post-body #postbox-container-2 .postbox { width: 49%; }
            /* hide meta box display toggle */
            .js .postbox .handlediv { display: none; }

            @media (max-width: 1260px) {
                #postbox-container-1 .postbox,
                #postbox-container-2 .postbox { margin-bottom: 10px; width: 100%; }
            }
        </style>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    //disable meta boxes collapse feature
                    var a = setInterval(function() {
                        var m = $('.ui-sortable-handle').unbind('click');

                        if(m != null) {
                            a = clearInterval(a);
                        }
                    }, 100);
                });

                $(window).load(function() {
                    //WooCommerce Product Data meta box feels special
                    $( '#woocommerce-product-data').off('click', '.hndle');
                });
            })(jQuery);
        </script>
        <?php
        endif;

        //Post
        if(is_object($current_screen) && $current_screen->id == 'post'):
        ?>
        <style type="text/css">
            #poststuff { position: relative; }
            #post-body-content { float: right; width: 100%; }

            <?php if(empty($this->options['settings_options']['plugins']['post']) && ! empty($this->options['settings_options']['plugins']['blogging'])): ?>
            <?php
                $cats = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
                if(count($cats) > 1): ?>
            #post-body-content #postdivrich { margin-right: 300px; }

            #post-body.columns-2 #postbox-container-1 { float: none !important; position: absolute; right: 0; top: 76px; width: 280px; }
            #poststuff #post-body.columns-2 #side-sortables .postbox { margin: 0 0 10px 0; }
            #post-body #postbox-container-2 { padding-left: 300px; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; }
            #post-body #postbox-container-2 #postimagediv { margin-left: -300px; width: 280px; }

            @media (max-width: 1142px) {
                #post-body #postbox-container-2 { padding-left: 0; }
                #post-body #postbox-container-2 #postimagediv  { clear: both; margin: 0 0 10px 0; position: static; width: 100%; }
            }

            @media (max-width: 850px) {
                #post-body-content #postdivrich { margin-right: 0; }
                #post-body.columns-2 #postbox-container-1 { position: static; }
                #post-body.columns-2 #postbox-container-1 #categorydiv { width: 100%; }
            }
                <?php endif; ?>
            <?php endif; ?>

            <?php if(empty($this->options['settings_options']['plugins']['blogging'])): ?>
            #post-body { margin-right: 0 !important; }
            #post-body.columns-2 #postbox-container-1 { clear: both; float: none; margin-right: 0; width: 100%; }
            #poststuff #post-body.columns-2 #side-sortables { width: 100%; }
            #poststuff #post-body.columns-2 #side-sortables { white-space: nowrap; }
            #poststuff #post-body.columns-2 #side-sortables .postbox { float: left; margin: 0 1% 10px 0; width: 32.64%; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; }
            #poststuff #post-body.columns-2 #side-sortables .postbox#tagsdiv-post_tag,
            #poststuff #post-body.columns-2 #side-sortables .postbox#submitdiv_blogging { margin-right: 0; }
            #poststuff #post-body.columns-2 #side-sortables .postbox#submitdiv_blogging .inside { padding: 0; }

            /*@media (max-width: 1116px) {
                #poststuff #post-body.columns-2 #side-sortables .postbox { float: none; width: 100%; }
            }*/
            @media (max-width: 900px) {
                #poststuff #post-body.columns-2 #side-sortables .postbox { float: none; width: 100%; }
            }
            <?php endif; ?>
        </style>
            <?php if(empty($this->options['settings_options']['plugins']['blogging'])): ?>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    //disable drag and drop of meta boxes
                    var s = setInterval(function() {
                        var r = $('.ui-sortable').sortable('destroy');

                        if(r != null) {
                            s = clearInterval(s);
                        }
                    }, 100);
                });
            })(jQuery);
        </script>
            <?php endif;
        endif;

        // ACF Better Search
        if(empty($this->options['settings_options']['plugins']['acf_better_search'])):
        ?>
        <style type="text/css">
            .notice[data-notice="acf-better-search"] { display: none; }
        </style>
        <?php
        endif;

        // HTML Responsive FAQ
        if(is_object($current_screen) && $current_screen->id == 'hrf_faq' && empty($this->options['settings_options']['plugins']['hrf_faq'])):
        ?>
        <style type="text/css">
            #post-body.columns-2 #postbox-container-1 { clear: both; float: none; margin-right: 0; width: 100%; }
        </style>
        <?php
        endif;

        //WooCommerce
        if(is_object($current_screen) && $current_screen->id == 'product' && empty($this->options['settings_options']['plugins']['product'])):
        ?>
        <style type="text/css">
            #poststuff { position: relative; }
            #post-body-content { float: right; width: 100%; }
            <?php
            //fill when no product categories
            $cats = get_categories(array('taxonomy' => 'product_cat', 'hide_empty' => false));
            if(! empty($cats)): ?>
            #post-body-content #postdivrich { margin-right: 300px; }
            <?php else: ?>
            #post-body.columns-2 #postbox-container-1 { display: none; }
            <?php endif; ?>
            #post-body.columns-2 #postbox-container-1 { float: none !important; position: absolute; right: 0; top: 76px; width: 280px; }
            #poststuff #post-body.columns-2 #side-sortables .postbox { margin: 0 0 10px 0; }
            #post-body #postbox-container-2 { padding-left: 300px; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; }
            #post-body #postbox-container-2 #postimagediv,
            #post-body #postbox-container-2 #woocommerce-product-images { margin-left: -300px; width: 280px; }
            #post-body #postbox-container-2 #woocommerce-product-images { clear: left; }
            #post-body #postbox-container-2 #woocommerce-product-data { float: right; width: 64%; }
            #post-body #postbox-container-2 #woocommerce-featured-box,
            #post-body #postbox-container-2 #woocommerce-instruction-box{ float: right; text-align: justify; margin-right: 0; width: 34%; }
            #post-body #postbox-container-2 #woocommerce-featured-box { clear: right; }

            @media (max-width: 1142px) {
                #post-body #postbox-container-2 { padding-left: 0; }
                #post-body #postbox-container-2 #postimagediv,
                #post-body #postbox-container-2 #woocommerce-product-images,
                #post-body #postbox-container-2 #woocommerce-instruction-box,
                #post-body #postbox-container-2 #woocommerce-featured-box,
                #post-body #postbox-container-2 #woocommerce-product-data { clear: both; margin: 0 0 10px 0; position: static; width: 100%; }
            }
            @media (max-width: 850px) {
                #post-body-content #postdivrich { margin-right: 0; }
                #post-body.columns-2 #postbox-container-1 { position: static; }
                #post-body.columns-2 #postbox-container-1 #product_catdiv { width: 100%; }
            }

            /* Product Data */
            /*#woocommerce-product-data .type_box,
            #woocommerce-product-data ._sale_price_field{ display: none; }*/
        </style>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    //disable drag and drop of meta boxes
                    var s = setInterval(function() {
                        var r = $('.ui-sortable').sortable('destroy');

                        if(r != null) {
                            s = clearInterval(s);
                        }
                    }, 100);
                });
            })(jQuery);
        </script>
        <?php
        endif;

        //Slideshow
        if(is_object($current_screen) && $current_screen->id == 'slideshow' && empty($this->options['settings_options']['plugins']['slideshow'])):
        ?>
        <style type="text/css">
            #post-body.columns-2 #postbox-container-1,
            #post-body #side-sortables > .postbox { width: 100%; }
            /* same as #post-body .postbox  */
            #post-body #side-sortables .sortable-slides-list .sortable-placeholder { float: left; margin: 0 10px 10px 0; width: 280px; }
            .sortable-slides-list-item.postbox { clear: none; }
            #slideshow-hidden-nonce { display: none; }

            @media (max-width: 1260px) {
                #post-body #side-sortables .sortable-slides-list .sortable-placeholder,
                #post-body #side-sortables .sortable-slides-list .postbox { width: 280px; }
            }
        </style>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    //disable drag and drop of Slides List
                    var s = setInterval(function() {
                        var r = $('#side-sortables').sortable('destroy');

                        if(r != null) {
                            s = clearInterval(s);
                        }
                    }, 100);
                });
            })(jQuery);
        </script>
        <?php
        endif;
        ?>
        <style type="text/css">
            #titlewrap{
                display: flex;
            }
        </style>
    <?php  $is_on = get_option($this->pre . 'plugins');
      if(!isset($is_on['gravity_forms'])): ?>
            <style type="text/css">
                .gf_form_toolbar_editor, .gf_form_toolbar_settings { display: none !important; }
            </style>
    <?php endif;?>

     <?php  $is_on = get_option($this->pre . 'plugins');
      if(!isset($is_on['album_gallery'])): ?>
            <style type="text/css">
                .post-type-album_gallery #side-sortables > :nth-child(2), .post-type-album_gallery .bhoechie-tab-menu, #tsf-inpost-box, .post-type-album_gallery .postbox h1.text-center { display: none !important; }
            </style>
    <?php endif;?>
        <?php
        //Exclude Category pages
        if($current_screen && $current_screen->base != 'edit-tags' && $current_screen->id != 'edit-product' && $current_screen->id != 'edit-post' && $plugin_page != 'bsk-pdf-manager-pdfs'):
        ?>
        <style type="text/css">
            .bulkactions { display: none; }
        </style>
        <?php
        endif;

        ?>
        <style type="text/css">
            li#wp-admin-bar-new-content,
            li#wp-admin-bar-view,
            li#wp-admin-bar-edit,
            div#adminmenuback,
            div#adminmenuwrap { display: none; }
            div#wpcontent,
            div#wpfooter { margin-left: 0; }
            li#wp-admin-bar-menu-toggle { display: none !important; }
            #wpadminbar li#wp-admin-bar-wp-logo { display: none; }
            #wpadminbar li#wp-admin-bar-my-account { display: none !important; }
            .welcome-panel-content { display: none; }
            #dashboard-widgets .postbox-container { width: 100%; }
            #wpadminbar { height: 0; overflow: hidden; }

            #wpbody-content .wrap > h1,
            #wpbody-content .wrap > h2 { font-size: 0; line-height: normal; padding: 0; }

            /* BSK PDF Manager */
            <?php if(is_object($current_screen) && empty($this->options['settings_options']['plugins']['bsk-pdf']) && isset($_GET['page']) && strpos($_GET['page'], 'bsk-pdf-manager') !== false): ?>
            .bsk-pdf-manager_page_bsk-pdf-manager-pdfs .column-shortcode,
            .toplevel_page_bsk-pdf-manager .column-shortcode { display: none; }
            <?php else: ?>
            #wpbody-content .wrap > h1 > a,
            #wpbody-content .wrap > h2 > a,
            #wpbody-content .wrap a.page-title-action { display: none; }
            <?php endif; ?>
            #edit-slug-box { display: none; }
            .welcome-panel .welcome-panel-close { display: none; }
            .wp-switch-editor.switch-html { display: none; }
            #wpfooter > p { display: none; }

            /* BPS Pro Notifications */
            <?php if(empty($this->options['settings_options']['plugins']['bulletproof_security'])): ?>
            .update-nag,
            .updated:not(#asimplebackend-notice),
            .wp-pointer { display: none !important; }
            <?php endif; ?>

            html { margin: 0 !important; }
            html.wp-toolbar { padding: 0; }

            @media only screen and (max-width: 1800px) and (min-width: 1500px) {
                #wpbody-content #dashboard-widgets #postbox-container-1,
                #wpbody-content #dashboard-widgets .postbox-container{ width: 100%; }
            }
            @media only screen and (max-width: 1499px) and (min-width: 800px) {
                #wpbody-content #dashboard-widgets .postbox-container,
                #wpbody-content #dashboard-widgets #postbox-container-2,
                #wpbody-content #dashboard-widgets #postbox-container-3,
                #wpbody-content #dashboard-widgets #postbox-container-4 { width: 100%; }
            }
            @media screen and (max-width: 782px) {
                html #wpadminbar { height: 0; min-height: 0; }
            }

            @media screen and (max-width: 500px) {
                .mce-stack-layout-item.mce-toolbar-grp { display: none; }
            }

            .mce-resizehandle { display: none; }
        </style>
        <?php
    }

    //Login Logo Upload Handler
    public function login_logo_upload() {
        $upload_dir = wp_upload_dir();

        $upload_handler = new UploadHandler(array(
            "script_url"	=>	plugins_url('/helpers/', __FILE__),
            "upload_dir"	=>	$upload_dir['path'] . '/',
            "upload_url"	=>	$upload_dir['url'] . '/',
            "mkdir_mode"	=>	0777,
            "delete_type" => 'POST',
            "image_versions"    =>  array(
                '' => array(
                    // Automatically rotate images based on EXIF meta data:
                    'auto_orient' => true
                ),
                'wp-login'  =>  array(
                    'max_width' => 320,
                    'max_height' => 260
                ),
                'wp-logo' => array(
                    'max_width' => 20,
                    'max_height' => 20
                )
            ),
            )
        );

        die();
    }

    public function sanitize_link($link, $type) {
        // ** temporary **
        // save sanitized links in global var
        // assume links sanitized on admin side
        global $menu, $submenu, $_sanitized_links;

        $submenu_items = array();

        switch($type) {
            case 'menu':
                if(is_admin()) {
                    $submenu_items = $submenu[$link];
                    if(! empty($submenu_items)) {
                        $submenu_items = array_values($submenu_items);  // Re-index.
                        $menu_hook = get_plugin_page_hook($submenu_items[0][2], $link);
                        $menu_file = $submenu_items[0][2];

                        if (($pos = strpos( $menu_file, '?' )) !== false) {
                            $menu_file = substr($menu_file, 0, $pos);
                        }

                        if (! empty($menu_hook) || (('index.php' != $submenu_items[0][2]) && file_exists(WP_PLUGIN_DIR . "/" . $menu_file) && ! file_exists(ABSPATH . "/wp-admin/" . $menu_file))) {
                            $_sanitized_links[$link] = 'admin.php?page=' . $submenu_items[0][2];
                        } else {
                            $_sanitized_links[$link] = $submenu_items[0][2];
                        }
                    } else {
                        $menu_hook = get_plugin_page_hook($link, 'admin.php');
                        $menu_file = $link;

                        if (($pos = strpos($menu_file, '?')) !== false) {
                            $menu_file = substr($menu_file, 0, $pos);
                        }

                        if (! empty($menu_hook) || (('index.php' != $link) && file_exists(WP_PLUGIN_DIR . "/" . $menu_file) && ! file_exists(ABSPATH . "/wp-admin/" . $menu_file))) {
                            $_sanitized_links[$link] = 'admin.php?page=' . $link;
                        } else {
                            $_sanitized_links[$link] = $link;
                        }
                    }

                    $link = admin_url($_sanitized_links[$link]);
                } else {
                    if(empty($_sanitized_links[$link])) {
                        return false;
                    } else {
                        $link = admin_url($_sanitized_links[$link]);
                    }
                }
                break;
            case 'toplink':
                if(is_admin()) {
                    $admin_is_parent = false;
                    $menu_hook = null;
                    $parent = null;
                    foreach ($submenu as $p => $group) {
                        foreach ($group as $sub) {
                            if ($sub[2] == $link) {
                                $parent = $p;
                                break;
                            }
                        }
                    }

                    $menu_hook = get_plugin_page_hook($link, $parent);
                    $menu_file = $link;

                    if (($pos = strpos($menu_file, '?')) !== false) {
                        $menu_file = substr($menu_file, 0, $pos);
                    }

                    $parent_menu_hook = get_plugin_page_hook($parent, 'admin.php');
                    $parent_menu_file = $parent;

                    if (!empty($parent_menu_hook) || (('index.php' != $parent) && file_exists(WP_PLUGIN_DIR . "/" . $parent_menu_file) && !file_exists(ABSPATH . "/wp-admin/" . $parent_menu_file))) {
                        $admin_is_parent = true;
                    }

                    if (!empty($menu_hook) || (('index.php' != $link) && file_exists(WP_PLUGIN_DIR . "/" . $menu_file) && !file_exists(ABSPATH . "/wp-admin/" . $menu_file))) {
                        if ((!$admin_is_parent && file_exists(WP_PLUGIN_DIR . "/" . $menu_file) && !is_dir(WP_PLUGIN_DIR . "/" . $parent)) || file_exists($menu_file)) {
                            $sub_item_url = add_query_arg(array('page' => $link), $parent);
                        } else {
                            $sub_item_url = add_query_arg(array('page' => $link), 'admin.php');
                        }

                        $_sanitized_links[$link] = esc_url($sub_item_url);
                    } else {
                        $_sanitized_links[$link] = $link;
                    }

                    $link = admin_url($_sanitized_links[$link]);
                } else {
                    if(empty($_sanitized_links[$link])) {
                        return false;
                    } else {
                        $link = admin_url($_sanitized_links[$link]);
                    }
                }
                break;
            case 'media':
            case 'page':
                $link = admin_url('post.php?post=' . $link . '&action=edit');
                break;
        }

        return $link;
    }

    public function sanitize_menu($old_menu) {
        global $menu, $submenu;

        $upload_dir = wp_upload_dir();

        if(! is_admin()) {
            if(empty($menu) && file_exists($upload_dir['basedir'] . '/menu.json')) {
                $menu = json_decode(file_get_contents($upload_dir['basedir'] . '/menu.json'));
            }

            if(empty($submenu) && file_exists($upload_dir['basedir'] . '/submenu.json')) {
                $submenu = json_decode(file_get_contents($upload_dir['basedir'] . '/submenu.json'));
            }

        } else {
            file_put_contents($upload_dir['basedir'] . '/menu.json', json_encode($menu));
            file_put_contents($upload_dir['basedir'] . '/submenu.json', json_encode($submenu));
        }

        foreach($old_menu as $m => $i) {
            $match = false;
            switch($i['type']) {
                case 'menu':
                    foreach ($menu as $item) {
                        if ($item[2] == $i['link']) {
                            $match = true;
                            break;
                        }
                    }
                    break;
                case 'toplink':
                    foreach($submenu as $parent => $sub) {
                        if($match) {
                            break;
                        }
                        foreach($sub as $item) {
                            if($item[2] == $i['link']) {
                                $match = true;
                                break;
                            }
                        }
                    }
                    break;
                case 'page':
                case 'media':
                    if(get_post_status($i['link']) !== false) {
                        $match = true;
                        break;
                    }
                    break;
                default:
                    $match = true;
                    break;
            }

            //does not exist
            //remove from menu
            if (!$match) {
                unset($old_menu[$m]);
            }
        }

        $new_menu = array_filter($old_menu);
        $this->options['settings_options']['menu'] = $new_menu;

        return $new_menu;
    }

    public function add_menu() {
        if(! empty($_POST['menu'])) {
            foreach($_POST['menu'] as $m) {
                if(! empty($m['toplink'])) {//redirect to toplink
                    $this->toplink(array('name' => $m['name'], 'orig' => $m['orig'], 'index' => $m['index'], 'link' => $m['link']));
                } else {
                    $s = unserialize(urldecode($m['submenu']));
                    $submenu = array();
                    foreach ($s as $index => $sub) {
                        if (!$index && strpos($m['link'], '.php') === false) {
                            continue;
                        }
                        $submenu[] = array(
                            'name' => stripslashes($sub[0]),
                            'link' => $sub[2],
                            'show' => 0,
                        );
                    }

                    $this->menu(array('name' => $m['name'], 'orig' => $m['orig'], 'index' => $m['index'], 'link' => $m['link'], 'submenu' => $submenu));
                }
            }
        }
        exit;
    }

    public function menu($data) {
        $this->render('menu', $data, true, 'admin');
    }

    public function toplink($data) {
        $this->render('toplink', $data, true, 'admin');
    }

    public function add_link() {
        $this->link(array('name' => stripslashes($_POST['name']), 'link' => $_POST['link'], 'target' => $_POST['target'], 'index' => $_POST['index']));
        exit;
    }

    public function link($data) {
        $this->render('link', $data, true, 'admin');
    }

    public function add_page() {
        if(! empty($_POST['page'])) {
            foreach($_POST['page'] as $p) {
                $this->page(array('name' => stripslashes($p['name']), 'orig' => $p['orig'], 'index' => $p['index'], 'link' => $p['link']));
            }
        }
        exit;
    }

    public function page($data) {
        $this->render('page', $data, true, 'admin');
    }

    public function add_media() {
        if(! empty($_POST['media'])) {
            foreach($_POST['media'] as $m) {
                $this->media(array('name' => stripslashes($m['name']), 'orig' => $m['orig'], 'index' => $m['index'], 'link' => $m['link']));
            }
        }
        exit;
    }

    public function media($data) {
        $this->render('media', $data, true, 'admin');
    }

    public function admin_footer() {
        if(empty($this->advance)) {
            $this->render('footer', false, true, 'admin');
        }
    }

    public function publish_product($ID, $post) {
        if(empty($this->advance)) {
            //add missing post meta to display at woocommerce shop
            add_post_meta($ID, '_visibility', 'visible', true);
        }
    }

    public function edit_form_top($post) {
        if(empty($this->advance)) {
            $plugins = get_option('active_plugins');
?>
<input id="<?php echo $this->pre; ?>-post-status" type="hidden" value="<?php echo $post->post_status; ?>" />
<?php
        }
    }

    public function wp_insert_post_data($data, $postarr) {
        if(empty($this->advance)) {
            $data['comment_status'] = 'open';
            $data['ping_status'] = 'open';

            if(! empty($_POST['asimplebackend-post-draft'])) {
                $data['post_status'] = 'draft';
            }
        }

        return $data;
    }

    public function wp_mail_from($address) {
        if(isset($this->options['settings_options']['email']['from']['address'])) {
            $trimmed = trim($this->options['settings_options']['email']['from']['address']);

            if(! empty($trimmed)) {
                return $trimmed;
            }
        }

        return $address;
    }

    public function wp_mail_from_name($name) {
        if(isset($this->options['settings_options']['email']['from']['name'])) {
            $trimmed = trim($this->options['settings_options']['email']['from']['name']);

            if(! empty($trimmed)) {
                return $trimmed;
            }
        }

        return $name;
    }

    public function woocommerce_instruction_box($post) {
?>
<p>Choose <strong>“Simple Product”</strong> to add items with just a price and leave other options blank.<br />Use <strong>“Variable Product”</strong> for products with options: input a regular price, select “Attributes”, select “Add” next to “Custom Product Attribute”, input options per instructions, check “Visible on the Product Page”, check “Used for Variations”, select “Save Attributes”, select “Variations”, select “Go” next to “Add Variation”, expand the variation that is created, input a price into the regular price field, leave rest blank and select Save Changes for the variation.</p>
<p><strong>NOTE: You must select “Save Changes” once more at the top to save a product!</strong></p>
<?php
    }
}

$GLOBALS['asimplebackend'] = new asimplebackend();
