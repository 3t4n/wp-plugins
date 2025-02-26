<?php
function elquarto_load_widget()
{
    register_widget('Elquarto_SidebarWidget');
}
add_action('widgets_init', 'elquarto_load_widget');

class Elquarto_SidebarWidget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            // Base ID of widget
            'elquarto_wp_widget',
            // Widget name will appear in UI
            __('ElQuarto', 'wp_widget_elquarto'),
            // Widget description
            array('description' => __('Formulário de pesquisa de Hotéis no Elquarto.', 'wp_widget_elquarto'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['tags'] = (!empty($new_instance['tags'])) ? strip_tags($new_instance['tags']) : '';
        return $instance;
    }

    public function form($instance)
    {
        $tags = (isset($instance['tags']) ? $instance['tags'] : __('', 'wp_widget_elquarto'));

        ?>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Tags:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo esc_attr($tags); ?>" />
            </p>
        <?php
    }

    // Render Widget HTML
    public function widget($args, $instance)
    {
        $tags = apply_filters('widget_tags', $instance['tags']);

        $attrs_v = array(
            "theme" => 'widget',
            "tags" => (isset($tags) && $tags != "" ? $tags : ''),
        );

        $spromo = new ElQuarto_Public('', '');
        echo $spromo->elquarto_display_shortcode($attrs_v);
    }
}
