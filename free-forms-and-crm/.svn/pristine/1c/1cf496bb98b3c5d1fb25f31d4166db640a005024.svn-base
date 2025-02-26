<?php

class WBS_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct('free_forms_crm', 
                __('Free Forms &amp; CRM', 'free-forms-and-crm'), 
                array('description' => __('Form from Free Forms & CRM as widget', 'free-forms-and-crm'))
                );
    }
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        
        print $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        print isset($instance['wbs_widget_js_link']) ? $instance['wbs_widget_js_link'] : '';
        
        print $args['after_widget'];
    }
    
    public function form( $instance ) {
        $title = __('Free Forms &amp; CRM', 'free-forms-and-crm');
        $wbs_widget_id = NULL;
        if ( isset($instance['title']) ) {
            $title = $instance['title'];
        }
        if ( isset($instance['wbs_widget']) ) {
            $wbs_widget_id = $instance['wbs_widget'];
        }
        
        $wbs_widgets = array();
        
        $api = new WBS_Api(get_option('wbs_options'));
        $wbs_widgets = $api->connector_forms_getall();
       
	   if ( $wbs_widgets_data === FALSE /*|| !isset($_SESSION['wbs_token'])*/) {
/*			$plug = new WBS_Plugin();
			$plug->login_notice();*/
        } 
		
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'free-forms-and-crm' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
            <label for="<?php print $this->get_field_id('wbs_widget') ?>"><?php esc_html_e('Form to display:', 'free-forms-and-crm'); ?></label>
            <select class="widefat" id="<?php print $this->get_field_id('wbs_widget') ?>" name="<?php print $this->get_field_name('wbs_widget') ?>">
                <?php foreach ( $wbs_widgets as $wbs_widget): ?>
                <?php
                $selected = '';
                if ( !is_null($wbs_widget_id) && ($wbs_widget_id == $wbs_widget->id) ) {
                    $selected = 'selected="selected"';
                }
                ?>
                <option value="<?php print esc_attr($wbs_widget->id) ?>" <?php print $selected; ?>> <?php print esc_html($wbs_widget->name) ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
        
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] =  !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['wbs_widget'] = !empty($new_instance['wbs_widget']) ? strip_tags($new_instance['wbs_widget']):'';
        
        if ( !empty($instance['wbs_widget']) ) {
            $api = new WBS_Api(get_option('wbs_options'));
            $instance['wbs_widget_js_link'] = $api->connector_widgets_getJSlink($instance['wbs_widget']);
        }
        
        return $instance;
    }
    
}

