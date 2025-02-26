<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://dexonline.ro/unelte
 * @since      1.0
 *
 * @package    Dexonline_Searchbox
 * @subpackage Dexonline_Searchbox/includes
 */

/**
 * Define the appearance of the widget
 *
 * Implements the methods needed to create and maintain the widget
 *
 * @package    Dexonline_Searchbox
 * @subpackage Dexonline_Searchbox/includes
 * @author     Alexandru Marian Grigoroiu <grigoroiualexandru@gmail.com>
 */

class Dexonline_Searchbox_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'dexonline_searchbox_widget', // Base ID
            __('Dexonline Searchbox', 'dexonline-searchbox') // Name
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args	Widget arguments.
     * @param array $instance	Saved values from database.
     */
    public function widget( $args, $instance ) {
        $instance['title'] = __('Dexonline Searchbox', 'dexonline-searchbox');

        // outputs the content of the widget
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        ?>
        <form id="ds-searchbox-form" action="https://dexonline.ro/search.php" method="GET" target="_blank">
            <input id="ds-searchbox" type="text" name="cuv" placeholder="<?php echo __( 'Search word', 'dexonline-searchbox' ); ?>">
        </form>
        <div id="ds-error-message-wrapper">
            <span id="ds-error-message">
                <?php echo __('Not a valid word', 'dexonline-searchbox'); ?>
            </span>
        </div>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array Current instance
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
	return $instance;
    }

    /**
     * Registers the widget to WordPress
     */
    public function register_dexonline_searchbox_widget() {
        register_widget( 'Dexonline_Searchbox_Widget' );
    }

}

