<?php

if ( ! defined('ABSPATH') ) { die( 'Cheating? Direct access is not allowed. ' ); }

if(!class_exists('ADL_team_custom_post')):

    /**
     * Class ADL_team_custom_post
     */
    class ADL_team_custom_post {
        public function __construct() {
            // Add the team post type and taxonomies
            add_action( 'init', array( $this, 'register_new_post_types' ) );
            add_filter('single_template', array( $this, 'load_custom_template') );


            // add new columns for ADL_TEAM_SHORT_CODE_POST_TYPE
            add_filter('manage_'.ADL_TEAM_SHORT_CODE_POST_TYPE.'_posts_columns', array($this, 'add_new_shortcode_columns'));
            add_action('manage_'.ADL_TEAM_SHORT_CODE_POST_TYPE.'_posts_custom_column', array($this, 'manage_shortcode_columns'), 10, 2);
            add_filter('manage_'.ADL_TEAM_POST_TYPE.'_posts_columns', array($this, 'add_new_team_columns'));
            add_action('manage_'.ADL_TEAM_POST_TYPE.'_posts_custom_column', array($this, 'manage_team_columns'), 10, 2);
            add_filter( 'enter_title_here', array($this, 'change_title_text') );
        }
        /**
         * Initiate registrations of post type and taxonomies.
         *
         */
        public function register_new_post_types() {
            $this->register_post_type();
        }

        /**
         * Register the custom post type.
         *
         * @link http://codex.wordpress.org/Function_Reference/register_post_type
         */
        protected function register_post_type() {
            global $ADL_team;
            // Args for ADL_TEAM_POST_TYPE
            $labels = array(
                'name'                => _x( 'Teams', 'Plural Name of Team', ADL_TEAM_TEXTDOMAIN ),
                'singular_name'       => _x( 'Member', 'Singular Name of Member', ADL_TEAM_TEXTDOMAIN ),
                'menu_name'           => __( 'Teams', ADL_TEAM_TEXTDOMAIN ),
                'name_admin_bar'      => __( 'Member', ADL_TEAM_TEXTDOMAIN ),
                'parent_item_colon'   => __( 'Parent Member:', ADL_TEAM_TEXTDOMAIN ),
                'all_items'           => __( 'All Members', ADL_TEAM_TEXTDOMAIN ),
                'add_new_item'        => __( 'Add New Member', ADL_TEAM_TEXTDOMAIN ),
                'add_new'             => __( 'Add New Member', ADL_TEAM_TEXTDOMAIN ),
                'new_item'            => __( 'New Member', ADL_TEAM_TEXTDOMAIN ),
                'edit_item'           => __( 'Edit Member', ADL_TEAM_TEXTDOMAIN ),
                'update_item'         => __( 'Update Member', ADL_TEAM_TEXTDOMAIN ),
                'view_item'           => __( 'View Member', ADL_TEAM_TEXTDOMAIN ),
                'search_items'        => __( 'Search Member', ADL_TEAM_TEXTDOMAIN ),
                'not_found'           => __( 'Not found', ADL_TEAM_TEXTDOMAIN ),
                'not_found_in_trash'  => __( 'Not found in Trash', ADL_TEAM_TEXTDOMAIN ),
            );
            $args = array(
                'label'               => __( 'Team', ADL_TEAM_TEXTDOMAIN ),
                'description'         => __( 'Member', ADL_TEAM_TEXTDOMAIN ),
                'labels'              => $labels,
                'supports'            => array( 'title'),
                'taxonomies'          => array(),
                'hierarchical'        => false,
                'public'              => true,
                'rewrite'			  => array('slug' => ADL_TEAM_POST_TYPE),
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 20,
                'menu_icon'			=> 'dashicons-groups',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',
            );

            // get the rewrite slug from the user settings, if exist use it.
            $slug = get_option('adl_team_slug');
            if (!empty($slug)) {
                $args['rewrite'] = array(
                    'slug'=> $slug,
                );
            }

            //Args for ADL_TEAM_SHORT_CODE_POST_TYPE
            $shortcode_label = array(
                'name'                => _x( 'Shortcodes', 'Plural Name of Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'singular_name'       => _x( 'Shortcode', 'Singular Name of Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'menu_name'           => __( 'Shortcode Generator', ADL_TEAM_TEXTDOMAIN ),
                'name_admin_bar'      => __( 'Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'parent_item_colon'   => __( 'Parent Shortcode:', ADL_TEAM_TEXTDOMAIN ),
                'all_items'           => __( 'Shortcode Generator', ADL_TEAM_TEXTDOMAIN ),
                'add_new_item'        => __( 'Add New Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'add_new'             => __( 'Generate New Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'new_item'            => __( 'Generate New Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'edit_item'           => __( 'Edit Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'update_item'         => __( 'Update Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'view_item'           => __( 'View Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'search_items'        => __( 'Search Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'not_found'           => __( 'No shortcodes found', ADL_TEAM_TEXTDOMAIN ),
                'not_found_in_trash'  => __( 'No shortcodes found in Trash', ADL_TEAM_TEXTDOMAIN ),
            );
            $shortcode_args = array(
                'label'               => __( 'Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'description'         => __( 'Shortcode', ADL_TEAM_TEXTDOMAIN ),
                'labels'              => $shortcode_label,
                'supports'            => array( 'title'),
                'taxonomies'          => array(),
                'hierarchical'        => false,
                'public'              => false,
                'rewrite'			  => array('slug' => ADL_TEAM_SHORT_CODE_POST_TYPE),
                'show_ui'             => true,
                'show_in_menu'        => 'edit.php?post_type='.ADL_TEAM_POST_TYPE,
                'menu_position'       => 65,
                'menu_icon'			=> 'dashicons-groups',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => false,
                'exclude_from_search' => false,
                'publicly_queryable'  => false,
                'capability_type'     => 'page',
            );
            register_post_type( ADL_TEAM_POST_TYPE, $args );
            register_post_type( ADL_TEAM_SHORT_CODE_POST_TYPE, $shortcode_args );
            flush_rewrite_rules();
        }

        public function add_new_shortcode_columns($columns){
            $columns = array();
            $columns['cb']   = '<input type="checkbox" />';
            $columns['title']   = esc_html__('Team Name', ADL_TEAM_TEXTDOMAIN);
            $columns['adl_team_sc_1']   = esc_html__('Team Shortcode', ADL_TEAM_TEXTDOMAIN);
            $columns['adl_team_sc_2']   = esc_html__('Shortcode for Template File', ADL_TEAM_TEXTDOMAIN);
            $columns['date']   = esc_html__('Created at', ADL_TEAM_TEXTDOMAIN);
            return $columns;
        }

        public function manage_shortcode_columns( $column_name, $post_id ) {
            switch($column_name){
                case 'adl_team_sc_1': ?>
                    <textarea style="resize: none;" cols="22" rows="1" onClick="this.select();" >[adl-team id=<?php echo $post_id;?>]</textarea>
                    <?php
                    break;
                case 'adl_team_sc_2': ?>
                    <textarea style="resize: none; text-align: center;" cols="30" rows="1" onClick="this.select();" ><?php echo "<?php adl_team({$post_id}); ?>"; ?></textarea>
                    <?php
                    break;

                default:
                    break;

            }
        }

        public function add_new_team_columns($columns){
            $columns = array();
            $columns['cb']   = '<input type="checkbox" />';
            $columns['title']   = esc_html__('Member Name', ADL_TEAM_TEXTDOMAIN);
            $columns['adl_team_cc_1']   = esc_html__('Member Image', ADL_TEAM_TEXTDOMAIN);
            $columns['adl_team_cc_2']   = esc_html__('Designation', ADL_TEAM_TEXTDOMAIN);
            $columns['date']   = esc_html__('Created at', ADL_TEAM_TEXTDOMAIN);
            return $columns;
        }
        public function manage_team_columns( $column_name, $post_id ) {
            global $ADL_team;
            $g_info = get_post_meta( $post_id, 'general' , true); // return serialized and encoded string of array value
            $general_info = (!empty($g_info) ? unserialize( base64_decode( $g_info )) : array());
            $post_link = admin_url( 'post.php?post='.$post_id.'&action=edit');
            switch($column_name){
                case 'adl_team_cc_1':
                    $img_info = wp_get_attachment_image_src( intval(@$general_info['_member_image_id']) , array(30, 30));
                    if (!empty($img_info[0])){
                        echo "<a href='{$post_link}'><img src='".esc_url($img_info[0])."' style='width: 50px; height: 50px;'/> </a>";
                    }else{
                        esc_html_e('No Image', ADL_TEAM_TEXTDOMAIN);
                    }
                    break;
                case 'adl_team_cc_2':
                    $ADL_team->display_terms_of_post($post_id, 'adl-team-designation');
                    break;

                default:
                    break;

            }
        }




        /**
         * Change the placeholder of title input box
         * @param string $title Name of the Post Type
         *
         * @return string Returns modified title
         */
        public function change_title_text( $title ){
           global $typenow;
            if ( ADL_TEAM_POST_TYPE == $typenow ) {
                $title = 'Enter member name';
            }elseif(ADL_TEAM_SHORT_CODE_POST_TYPE == $typenow){
                $title = 'Eg. Our Awesome Team';
            }
            return $title;


        }


        /**
         * It loads custom template for member single page
         * @param string $template The name of the current template
         *
         * @return string It returns custom template for single page of a member for the adl-team post type
         */
        public function load_custom_template($template) {
            global $post;
            // Is this a ADL_TEAM_POST_TYPE post?
            if ($post->post_type == ADL_TEAM_POST_TYPE){

                // The name of custom post type single template
                $template_name = 'single-'.ADL_TEAM_POST_TYPE.'.php';

                // A specific single template for my custom post type exists in theme folder? Or it also doesn't exist in my plugin?
                if($template === get_stylesheet_directory() . '/' . $template_name
                   || !file_exists(ADL_TEAM_TEMPLATES_DIR . $template_name)) {

                    //Then return "single.php" or "single-ADL_TEAM_POST_TYPE.php" from theme directory.
                    return $template;
                }
                wp_enqueue_style('adl-team-core-style');
                wp_enqueue_script('adl-team-public-js');
                // If not, return my plugin custom post type template.
                return ADL_TEAM_TEMPLATES_DIR . $template_name;
            }

            //This is not my custom post type, do nothing with $template
            return $template;
        }


    }

endif;