<?php
defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_Metabox')) {
    class FSDT_Metabox
    {
        function __construct()
        {
            add_action('add_meta_boxes', array($this, 'fsdt_meta_boxes'));
            add_action('save_post', array($this, 'fsdt_save_meta_box'), 10, 2);
        }



        function fsdt_meta_boxes()
        {
            $args = array(
                'public' => true,
            );
            $post_types = get_post_types($args, 'names');

            foreach ($post_types as $post_type) {
                $post_type_array[] = $post_type;
            }
            add_meta_box('fsdt-meta-box', esc_html__('Floating Side Tab', 'floating-side-tab'), array($this, 'fsdt_metabox'), $post_type_array, 'side');
        }


        function fsdt_metabox($post)
        {
            wp_enqueue_style('fsdt-metabox', FSDT_URL . '/assets/css/fsdt-metabox.css', [], filemtime(FSDT_PATH . '/assets/css/fsdt-metabox.css'));
            $fsdt_meta_details = get_post_meta($post->ID, 'fsdt_meta_detail', true);
            wp_nonce_field('fsdt_settings_post_nonce', 'fsdt_settings_post_nonce_field');

            $menu_status = (!empty($fsdt_meta_details['menu_status'])) ? $fsdt_meta_details['menu_status'] : '';
            $post_type_menu = (!empty($fsdt_meta_details['post_type_menu'])) ? $fsdt_meta_details['post_type_menu'] : '';

?>

            <div class="fsdt-field-wrap">
                <div class="fsdt-meta-flx">
                    <label>
                        <?php esc_html_e('Disable Status', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field fsdt-checkbox-toggle">
                        <input type="checkbox" id="fsdt-basic-status" name="fsdt_meta_detail[menu_status]" value="1" <?php checked($menu_status, '1'); ?> />
                        <label></label>
                    </div>
                </div>
                <div class="fsdt-meta-flx">
                    <label>
                        <?php esc_html_e('Select Menu', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <select name="fsdt_meta_detail[post_type_menu]">
                            <option value="Default">
                                <?php esc_html_e('Default', 'floating-side-tab'); ?>
                            </option>
                            <?php
                            $post_type_menu = (!empty($post_type_menu)) ? $post_type_menu : 'Default';
                            global $wpdb;
                            $menu_table = FSDT_MENU_SETTING_TABLE;
                            $menu_rows = $wpdb->get_results($wpdb->prepare("select * from %i order by menu_id desc", $menu_table));
                            if (!empty($menu_rows)) {
                                foreach ($menu_rows as $menu_row) {
                            ?>
                                    <option value="<?php echo esc_attr($menu_row->menu_id); ?>" <?php selected($post_type_menu, $menu_row->menu_id); ?>>
                                        <?php echo esc_attr($menu_row->menu_title); ?>
                                    </option>
                            <?php }
                            } ?>
                        </select>
                        <label></label>
                    </div>
                </div>
            </div>
<?php
        }

        function fsdt_save_meta_box($post_id, $post)
        {

            if (
                !empty($_POST['fsdt_settings_post_nonce_field']) &&
                wp_verify_nonce($_POST['fsdt_settings_post_nonce_field'], 'fsdt_settings_post_nonce')
            ) {

                $meta_details = $_POST['fsdt_meta_detail'];
                $menu_status = $meta_details['menu_status'];
                $post_type_menu = $meta_details['post_type_menu'];
                $menu_status = (isset($menu_status)) ? sanitize_text_field($menu_status) : '';
                $post_type_menu = (isset($post_type_menu)) ? sanitize_text_field($post_type_menu) : 'Default';

                $fsdt_meta_detail = array(
                    'menu_status' => $menu_status,
                    'post_type_menu' => $post_type_menu
                );

                update_post_meta($post_id, 'fsdt_meta_detail', $fsdt_meta_detail);
            }
        }
    }

    new FSDT_Metabox();
}
