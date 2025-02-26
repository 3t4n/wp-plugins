<?php
function ag_widget_init() {
    function ag_widget_view($args) {
        extract($args);
        $ag_options = get_option(AG_USER_OPTION_KEY);
        $title = empty($ag_options['ag_widget_title']) ? 'At a Glance' : $ag_options['ag_widget_title'];
        echo $before_widget;
        echo $before_title . $title . $after_title;
        ag_widget();
        echo $after_widget;
    }
    function ag_widget_control() {
        $ag_options = get_option(AG_USER_OPTION_KEY);
        if (isset($_POST["ag-widget-submit"])):
            $ag_options['ag_widget_title'] = strip_tags(stripslashes($_POST['ag-title']));
            update_option(AG_USER_OPTION_KEY, $ag_options);
        endif;
        $title = $ag_options['ag_widget_title'];
    ?>
        <p>
            <label for="ag-title">
                <?php _e('Title:'); ?> <input type="text" value="<?php echo $title; ?>" class="widefat" id="ag-title" name="ag-title" />
            </label>
        </p>
        <input type="hidden" name="ag-widget-submit" value="1" />
    <?php
    }
    wp_register_sidebar_widget('ag-widget', 'At a Glance', 'ag_widget_view');
    wp_register_widget_control('ag-widget', 'At a Glance', 'ag_widget_control' );
}
add_action('widgets_init', 'ag_widget_init');
?>