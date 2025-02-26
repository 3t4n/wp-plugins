<?php

class Annfu_Widget extends WP_Widget
{

    // Main constructor
    public function __construct()
    {
        parent::__construct(
            'annfu_widget',
            __('Annuncifunebri', 'text_domain'),
            [
                'customize_selective_refresh' => true,
            ]
        );
    }

    // The widget form (for the backend )
    public function form($instance)
    {

        // Set widget defaults
        $defaults = [
            'title'            => '',
            'description'      => '',
            'results'          => ANNFU_CAROUSEL_RESULTS,
            'results_per_page' => ANNFU_CAROUSEL_RESULTS_PER_PAGE,
        ];

        // Parse current settings with defaults
        extract(wp_parse_args(( array )$instance, $defaults)); ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Titolo', 'annfu'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php _e('Descrizione', 'annfu'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('textarea')); ?>"
                      name="<?php echo esc_attr($this->get_field_name('textarea')); ?>"><?php echo wp_kses_post($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('results')); ?>"><?php _e('Annunci da visualizzare', 'annfu'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('results')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('results')); ?>" type="text"
                   value="<?php echo esc_attr($results); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('results_per_page')); ?>"><?php _e('Anncuni da visualizzare per pagina', 'annfu'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('results_per_page')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('results_per_page')); ?>" type="number" min="1"
                   max="12"
                   value="<?php echo esc_attr($results_per_page); ?>"/>
        </p>
    <?php }

    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        $instance                     = $old_instance;
        $instance['title']            = isset($new_instance['title']) ? wp_strip_all_tags($new_instance['title']) : '';
        $instance['description']      = isset($new_instance['description']) ? wp_kses_post($new_instance['description']) : '';
        $instance['results']          = isset($new_instance['results']) ? wp_strip_all_tags($new_instance['results']) : '';
        $instance['results_per_page'] = isset($new_instance['results_per_page']) ? wp_strip_all_tags($new_instance['results_per_page']) : '';

        return $instance;
    }

    // Display the widget
    public function widget($args, $instance)
    {
        include_once (ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_widget.php');
    }
}

// Register the widget
function annfu_widget()
{
    register_widget('Annfu_Widget');
}
