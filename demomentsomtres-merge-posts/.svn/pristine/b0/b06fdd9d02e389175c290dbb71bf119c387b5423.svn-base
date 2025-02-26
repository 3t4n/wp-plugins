<?php
    /*
     Plugin Name: DeMomentSomTres Merge Posts
     Plugin URI: http://demomentsomtres.com/en/wordpress-plugins/demomentsomtres-merge-posts/
     Description: Displays service status information.
     Version: 1.0
     Author: marcqueralt
     Author URI: http://demomentsomtres.com
     License: GPLv2 or later
     */

    require_once (dirname(__FILE__) . '/lib/class-tgm-plugin-activation.php');

    define('DMS3_MERGEPOST_TEXT_DOMAIN', 'DeMomentSomTres-MergePosts');

    // Make sure we don't expose any info if called directly
    if (!function_exists('add_action')) {
        echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
        exit ;
    }

    $dms3MergePosts = new DeMomentSomTresMergePosts();

    class DeMomentSomTresMergePosts {

        const TEXT_DOMAIN = DMS3_MERGEPOST_TEXT_DOMAIN;
        const VERSION = 0.1;
        const OPTIONS = 'dms3MergePosts';
        const OPTION_TARGET = 'dms3MPTarget';
        const OPTION_ORIGIN1 = 'dms3MPOrigin1';
        const OPTION_ORIGIN2 = 'dms3MPOrigin2';
        const AJAXACTION = 'dms3PostMerge';

        private $pluginURL;
        private $pluginPath;
        private $langDir;

        /**
         * @since 1.0
         */
        function __construct() {
            $this -> pluginURL = plugin_dir_url(__FILE__);
            $this -> pluginPath = plugin_dir_path(__FILE__);
            $this -> langDir = dirname(plugin_basename(__FILE__)) . '/languages';

            add_action('plugins_loaded', array(
                $this,
                'plugin_init'
            ));
            add_action('tgmpa_register', array(
                $this,
                'required_plugins'
            ));
            add_action('tf_create_options', array(
                $this,
                'admin'
            ));
            add_action('admin_footer', array(
                $this,
                'admin_scripts'
            ));
            add_action('wp_ajax_' . self::AJAXACTION, array(
                $this,
                'ajax_admin'
            ));
        }

        /**
         * @since 1.0
         */
        function plugin_init() {
            load_plugin_textdomain(DMS3_MERGEPOST_TEXT_DOMAIN, false, $this -> langDir);
        }

        /**
         * @since 1.0
         */
        function required_plugins() {
            $plugins = array( array(
                    'name' => 'Titan Framework',
                    'slug' => 'titan-framework',
                    'required' => true
                ), );
            $config = array();
            tgmpa($plugins, $config);
        }

        function ajax_admin() {
            if (isset($_REQUEST['target'])) :
                $target = $_REQUEST['target'];
            else :
                wp_send_json_error(__("Target not defined", self::TEXT_DOMAIN));
                wp_die();
            endif;
            if (isset($_REQUEST['contents'])) :
                $contents = $_REQUEST['contents'];
            else :
                wp_send_json_error(__("Contents not defined", self::TEXT_DOMAIN));
                wp_die();
            endif;
            $post_target = get_post($target);
            $text = $post_target -> post_content;
            foreach ($contents as $id) :
                if ($id != 0) :
                    $thispost = get_post($id);
                    $text = $text . "<br/>" . $thispost -> post_content;
                    wp_trash_post($id);
                endif;
            endforeach;
            $data = wp_update_post(array(
                "ID" => $target,
                "post_content" => $text,
            ), true);
            wp_send_json_success($data);
            wp_die();
        }

        function admin() {
            $titan = TitanFramework::getInstance(self::OPTIONS);
            $panel = $titan -> createAdminPanel(array(
                'name' => __('Merge Posts', self::TEXT_DOMAIN),
                'title' => __('DeMomentSomTres Merge Posts', self::TEXT_DOMAIN),
                'desc' => __("Merges many posts into one", self::TEXT_DOMAIN),
                'parent' => 'tools.php',
                'use_form' => false,
            ));
            $posttypes = get_post_types(array('public' => true, ));
            $tab = array();
            foreach ($posttypes as $pt) :
                if ($pt == "attachment") :
                    break;
                endif;
                $thePostType = get_post_type_object($pt);
                $tab[$pt] = $panel -> createTab(array(
                    'name' => $thePostType -> labels -> name,
                    'id' => $pt,
                ));
                $tab[$pt] -> createOption(array(
                    'id' => self::OPTION_TARGET . '-' . $pt,
                    'name' => __('Target', self::OPTION_TARGET),
                    'desc' => __('The contents will get merged into it', self::TEXT_DOMAIN),
                    'type' => "select-posts",
                    'post_type' => $pt,
                    'num' => -1,
                    'post_status' => 'publish,draft',
                    'orderby' => 'post_title',
                    'order' => 'asc',
                    'class' => "dms3PMtarget",
                ));
                $tab[$pt] -> createOption(array(
                    'id' => self::OPTION_ORIGIN1 . '-' . $pt,
                    'name' => __('1st content', self::TEXT_DOMAIN),
                    'desc' => __('The contents will get merged into the target and they will be deleted', self::TEXT_DOMAIN),
                    'type' => "select-posts",
                    'post_type' => $pt,
                    'num' => -1,
                    'post_status' => 'publish,draft',
                    'orderby' => 'post_title',
                    'order' => 'asc',
                ));
                $tab[$pt] -> createOption(array(
                    'id' => self::OPTION_ORIGIN2 . '-' . $pt,
                    'name' => __('2nd content', self::TEXT_DOMAIN),
                    'desc' => __('The contents will get merged into the target and they will be deleted', self::TEXT_DOMAIN),
                    'type' => "select-posts",
                    'post_type' => $pt,
                    'num' => -1,
                    'post_status' => 'publish,draft',
                    'orderby' => 'post_title',
                    'order' => 'asc',
                ));
                $tab[$pt] -> createOption(array(
                    'save' => __("Merge", self::TEXT_DOMAIN),
                    'type' => 'save',
                    'use_reset' => false,
                ));
            endforeach;
        }

        function admin_scripts() {
            wp_enqueue_script('dms3MergePosts', $this -> pluginURL . "js/dms3MergePosts.js", array("jquery"), self::VERSION, true);
            $args = array(
                'ajaxurl' => add_query_arg(Array('action' => self::AJAXACTION), admin_url('admin-ajax.php')),
                'error_target' => __("You must select a target", self::TEXT_DOMAIN),
                'error_target_in_contents' => __("Target cannot be in contents list", self::TEXT_DOMAIN),
                'error_contents_required' => __("At least one content is required", self::TEXT_DOMAIN),
                'failure' => __("Something bad happened", self::TEXT_DOMAIN),
                'success' => __("Merge done", self::TEXT_DOMAIN),
            );
            wp_localize_script('dms3MergePosts', 'dms3MergePosts', $args);
        }

    }
?>