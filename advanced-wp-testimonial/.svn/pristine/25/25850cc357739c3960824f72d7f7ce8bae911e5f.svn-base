<?php

class AWT_TESTIMONIAL_WIDGET extends WP_Widget {
        
    private $order;


    public function __construct() {
            $this->order = array(
                'rand'      => __('Random'      ,'awt'),
                'desc'      => __('Descending'  ,'awt'),
                'asc'       => __('Assending'   ,'awt'),
            );
            
            parent::__construct(
                'awt_testimonial_widget',
                __('AWT Testimonial Widget','awt'),
                array( 'description' => __( 'Display Testimonials of Customer','awt')) 
            );
	}

	public function widget( $args, $instance ) {
            
            global $awt_template;


            $templatefilename = 'widget-awt_testimonial.php';
            
            if (file_exists(get_stylesheet_directory() . '/' . $templatefilename)) {
                $return_template = get_stylesheet_directory() . '/' . $templatefilename;
            } else {
                $return_template = AWT_PLUGIN_DIR . '/template/' . $templatefilename;
            }
            
            extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
            $posts = awt_get_testimonials(array(
                'count' => 1, // $no
                'order' => $instance['order'],
            ));    
            $awt_template = new stdClass();
            $awt_template->title          = $title;
            $awt_template->before_title   = $before_title;
            $awt_template->after_title    = $after_title;
            $awt_template->before_widget  = $before_widget;
            $awt_template->after_widget   = $after_widget;
            $awt_template->posts          = $posts; 
            
            include($return_template);
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
                
		$instance['title'] = strip_tags( $new_instance['title'] );
                
                if(is_numeric($new_instance['no']))
                    $instance['no'] = strip_tags( $new_instance['no'] );
                else
                    $instance['no'] = 1;
                
                if(in_array($new_instance['order'], array_keys($this->order)))    
                    $instance['order'] = strip_tags( $new_instance['order'] );
                else
                    $instance['order'] = 'rand';
                
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
            if ( isset( $instance[ 'title' ] ) ) {
                    $title = $instance[ 'title' ];
                    $no    = $instance['no'];
                    $order = $instance['order'];
            }
            else {
                    $title  = __('Testimonial', 'awt');
                    $no     = 1;
                    $order  = 'rand';
            }
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo  __( 'Title','awt'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <!--<p>
                <label for="<?php echo $this->get_field_id( 'no' ); ?>"><?php echo __( 'Number of Testimonial','awt'); ?></label> 
                <input class="small-text" id="<?php echo $this->get_field_id( 'no' ); ?>" 
                       name="<?php echo $this->get_field_name( 'no' ); ?>" type="text" value="<?php echo esc_attr( $no ); ?>" />
            </p>-->
            <p>
                <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php echo __( 'Order','awt'); ?></label> 
                <select
                    id="<?php echo $this->get_field_id( 'order' ); ?>"
                    name="<?php echo $this->get_field_name( 'order' ); ?>"
                    >
                    <?PHP
                    foreach($this->order as $key=>$value){
                        if($key == $order){
                            ?>
                        <option value="<?PHP echo $key; ?>" selected="selected"><?PHP echo $value; ?></option>
                            <?PHP
                        }else{
                        ?>
                        <option value="<?PHP echo $key; ?>"><?PHP echo $value; ?></option>
                        <?PHP
                        }
                    }
                    ?>
                </select>
            </p>
            <?php 
	}

}