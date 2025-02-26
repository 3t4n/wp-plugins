<?php

/**
 * class.MelibuWidget.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
if (!class_exists('MB_AUTHOR_BOX_WIDGET')) {

    class MB_AUTHOR_BOX_WIDGET extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        public function __construct() {

            parent::__construct(
                    'melibu-author-box-pro-widget-id', // Base ID
                    'MB Author Box', // Name
                    array('description' => __('A MeliBu WordPress Widget by Professionals Developers.', 'author-box-pro'))
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance) {

            global $MB_AUTHOR_BOX, $MB_AUTHOR_BOX_HELPER;
            $mbPluginLPSoptions = $MB_AUTHOR_BOX_HELPER->options();

            // USER id
            $userID = get_the_author_meta('ID');

            /**
             * USER query
             */
            $user = new WP_User($userID);
            $userroles = array();
            foreach ($user->roles as $role) {
                $role = get_role($role);
                if ($role != null) {
                    $userroles[] = $role->name;
                }
            }

            // USER options
            $checkArray = array(
                isset($mbPluginLPSoptions['role-administrator']) ? 'administrator' : '',
                isset($mbPluginLPSoptions['role-editor']) ? 'editor' : '',
                isset($mbPluginLPSoptions['role-author']) ? 'author' : '',
                isset($mbPluginLPSoptions['role-contributer']) ? 'contributer' : '',
                isset($mbPluginLPSoptions['role-subscriber']) ? 'subscriber' : ''
            );

            /**
             * USER check if user role allowed
             */
            foreach ($userroles as $check) {
                if (!in_array($check, $checkArray)) {
                    return;
                }
            }

            // WIDGET title
            $title = '';
            if (isset($instance['title'])) {
                $title = apply_filters('widget_title', $instance['title']);
            }

            // WIDGET OUTPUT
            echo $args['before_widget'];
            if (!empty($title)) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            $content = '';
            $userPostTypes = $MB_AUTHOR_BOX_HELPER->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                if (is_singular($userPostType) && $userPostType == get_post_type()) {
                    if (isset($mbPluginLPSoptions[$userPostType]) && $mbPluginLPSoptions[$userPostType] == 'below') {
                        $content = $MB_AUTHOR_BOX->author_short();
                    } else if (isset($mbPluginLPSoptions[$userPostType]) && $mbPluginLPSoptions[$userPostType] == 'above') {
                        $content = $MB_AUTHOR_BOX->author_short();
                    }
                }
            }
            echo $content;
            echo $args['after_widget'];
            // WIDGET OUTPUT
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance) {

            $title = '';
            if (isset($instance['title'])) {
                $title = $instance['title'];
            }

            echo '<p>';
            echo '<label for="' . $this->get_field_name('title') . '">';
            _e('Title', 'author-box-pro');
            echo '</label>';
            echo '<input type="text" name="' . $this->get_field_name('title') . '" value="' . $title . '" class="widefat" id="' . $this->get_field_id('title') . '">';
            echo '</p>';

            _e("No more settings needed, place anywhere and show your author box", 'author-box-pro');
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {

            $instance = $old_instance;

            // Get new instance title
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

            // Delete all option caches
            wp_cache_delete('alloptions', 'options');

            return $instance;
        }

    }

}