<?php

namespace Bits\CodePenList\Modules;

class Widget extends \WP_Widget
{
    /**
     * Register widget with WordPress.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            'bits_codepen_list',
            __('Bits CodePen List', 'bits-codepen-list'),
            ['description' => __('Display custom CodePen user RSS feed.', 'bits-codepen-list')]
        );
    }

    /**
     * Register the Codepen List widget.
     * 
     * @return void
     */
    public static function register()
    {
        register_widget(get_class());
    }

    /**
     * Front-end display of widget.
     *
     * @param  array  $args
     * @param  array  $instance
     * @return void
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (! empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']). $args['after_title'];
        }

        do_action('bits_codepen_list_render', $instance);

        echo $args['after_widget'];
    }
    
    /**
     * Back-end widget form.
     *
     * @param  array  $instance
     * @return void
     */    
    public function form($instance)
    {
    ?>
        <!-- Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'bits-codepen-list'); ?></label>
			<input class="widefat" 
                   id="<?php echo $this->get_field_id('title'); ?>" 
                   name="<?php echo $this->get_field_name('title'); ?>" 
                   type="text" 
                   value="<?php echo esc_attr($instance['title'] ?: 'CodePen'); ?>"
            >
		</p>

        <!-- Username -->
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:', 'bits-codepen-list'); ?></label>
			<input class="widefat" 
                   id="<?php echo $this->get_field_id('username'); ?>" 
                   name="<?php echo $this->get_field_name('username'); ?>" 
                   type="text" 
                   value="<?php echo esc_attr($instance['username'] ?: ''); ?>"
            >
		</p>

        <!-- Number of Posts -->
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Posts:', 'bits-codepen-list'); ?></label>
			<input class="widefat" 
                   id="<?php echo $this->get_field_id('posts'); ?>" 
                   name="<?php echo $this->get_field_name('posts'); ?>" 
                   type="number" 
                   value="<?php echo esc_attr($instance['posts'] ?: 5); ?>"
            >
		</p>

        <!-- Feed Type -->
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type:', 'bits-codepen-list'); ?></label>
            <select id="<?php echo $this->get_field_id('type'); ?>" 
                   name="<?php echo $this->get_field_name('type'); ?>"
                   class="widefat"
            >
                <option value="public" <?php selected('public', $instance['type']); ?>><?php _e('Public', 'bits-codepen-list'); ?></option>
                <option value="popular" <?php selected('popular', $instance['type']); ?>><?php _e('Popular', 'bits-codepen-list'); ?></option>
                <option value="posts" <?php selected('posts', $instance['type']); ?>><?php _e('Posts', 'bits-codepen-list'); ?></option>
            </select>
		</p>

        <!-- Cache time -->
		<p>
			<label for="<?php echo $this->get_field_id('cachetime'); ?>"><?php _e('Cache time:'); ?></label>
            <select name="<?php echo $this->get_field_name('cachetime'); ?>" 
                    id="<?php echo $this->get_field_id('cachetime'); ?>"
                    class="widefat"
            >
                <option value="21600" <?php selected('21600', $instance['cachetime']); ?>>6 <?php _e('hours', 'bits-codepen-list'); ?></option>
                <option value="43200" <?php selected('43200', $instance['cachetime']); ?>>12 <?php _e('hours', 'bits-codepen-list'); ?></option>
                <option value="86400" <?php selected('86400', $instance['cachetime']); ?>>24 <?php _e('hours', 'bits-codepen-list'); ?></option>
            </select>
		</p>

        <!-- Link Target -->
		<p>
			<label for="<?php echo $this->get_field_id('target'); ?>"><?php _e('Target:'); ?></label>
            <select name="<?php echo $this->get_field_name('target'); ?>" 
                    id="<?php echo $this->get_field_id('target'); ?>"
                    class="widefat"
            >
                <option value="_self" <?php selected('_self', $instance['target']); ?>><?php _e('Same window', 'bits-codepen-list'); ?></option>
                <option value="_new" <?php selected('_new', $instance['target']); ?>><?php _e('New window', 'bits-codepen-list'); ?></option>
            </select>
		</p>
	<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @param  array  $newInstance
     * @param  array  $oldInstance
     * @return array
     */
    public function update($newInstance, $oldInstance)
    {
        foreach ($newInstance as $key => $instance) {
            $newInstance[$key] = strip_tags($instance);
        }

        $newInstance['widget'] = true;

        return $newInstance;
    }
}
