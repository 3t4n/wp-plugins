<?php
namespace AETS_Base\Admin;

/**
 * Show_Shortcode Class
 * 
 * Initialize the class for admin
 * Specifically for the shortcode column in the Elementor Library
 * So that users can easily copy the shortcode and use it in their posts/pages
 * 
 * @since 1.0.0
 */
class Show_Shortcode
{

    /**
     * Initialize the class for admin
     * Specifically for the shortcode column in the Elementor Library
     * So that users can easily copy the shortcode and use it in their posts/pages
     * 
     * @return void
     */
    public function run()
    {
        add_filter('manage_elementor_library_posts_columns', [$this, 'add_shortcode_column']);
        add_action('manage_elementor_library_posts_custom_column', [$this, 'populate_shortcode_column'], 10, 2);

    }

    /**
     * Add shortcode column to the Elementor Library
     * We will show a column with the shortcode for each template in the library
     * So that users can easily copy the shortcode and use it in their posts/pages
     *
     * @param array $columns
     * @return array
     */
    public function add_shortcode_column($columns)
    {
        $new_columns = [];
		$new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = $columns['title'];
        $new_columns['elementor_library_type'] = $columns['elementor_library_type'] ?? __('Type', 'anywhere-elementor-template');;
        $new_columns['shortcode'] = __('Shortcode', 'anywhere-elementor-template');
        return array_merge( $new_columns, $columns );
    }

    /**
     * Populate the shortcode column with the shortcode for each template
     * So that users can easily copy the shortcode and use it in their posts/pages
     *
     * @param string $column
     * @param int $post_id
     */
    public function populate_shortcode_column($column, $post_id)
    {
        if ($column === 'shortcode') {

            // Generate and render shortcode for the template
            $shortcode = sprintf("[AETS_Template id='%d']", $post_id);
            ?>
            <input type="text" readonly value="<?php echo esc_attr( $shortcode ); ?>" style="width: 100%; cursor: pointer;" onclick="this.select();">
            <?php 
        }
    }

}