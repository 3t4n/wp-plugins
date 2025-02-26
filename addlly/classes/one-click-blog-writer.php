<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!class_exists('Addlly_One_Click_Blog_Writer')) {
    class Addlly_One_Click_Blog_Writer {

        // Constructor
        public function __construct() {
            add_action( 'admin_menu', array( $this, 'addlly_admin_menu' ), 99, 0 );
        }
        
        function addlly_admin_menu() {
            add_submenu_page('addlly', __('1-Click Blog Writer', 'addlly'), __('1-Click Blog Writer', 'addlly'), 'manage_options', 'one-click', array($this, 'addlly_one_click_page'));
        }
        
        public function addlly_one_click_page() {
            $current_url     = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
            $parsed_url      = wp_parse_url($current_url);
            $id = 0;
            $active_tab = 'article';
            if (isset($parsed_url['query'])) {
                parse_str($parsed_url['query'], $params);
                $id = isset($params['id']) ? $params['id'] : 0;
                $active_tab = isset($params['tab']) ? $params['tab'] : 'article';
            }
            ?>
            <div class="wrap <?php echo $id > 0 ? 'edit-one-click' : 'one-click'; ?>">
                <div class="addlly-container">
                    <?php if($id > 0){
                        set_query_var('idd', $id);
                        set_query_var('active_tab', $active_tab);
                        addlly_get_template_part('one-click-blog-writer/edit');
                    }else{ ?> 
                        <div class="addlly-header">
                            <h3><?php esc_html_e('1-Click Blog Writer', 'addlly'); ?></h3>
                            <p><?php esc_html_e('Generate human-like, SEO-optimized blogs on any topic with just a single click.', 'addlly'); ?></p>
                        </div>
                        <?php
                        addlly_get_template_part('one-click-blog-writer/add-form');
                        addlly_get_template_part('one-click-blog-writer/list');
                        ?>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }
    new Addlly_One_Click_Blog_Writer();
}