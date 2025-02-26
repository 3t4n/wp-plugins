<?php 

	/*
	Plugin Name: FourNodes Random Post
	Description: Displays Random WordPress Posts in a widget or in pages/posts. 
	Version: 1.0
	Author: Four Nodes
	Author URI: http://four-nodes.com
	License: GPLv2
	*/
	
class RandomPostPlugin_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
         
            // base ID of the widget
            'randompostplugin_widget',
             
            // name of the widget
            __('FourNodes Random Post Plugin', 'RandomPostPlugin' ),
             
            // widget options
            array (
                'description' => __( 'Widget to display Random Post', 'RandomPostPlugin' )
            )
             
        );

    }

    function form( $instance ) {
    	$defaults = array(
        'title' => '',
        'numofpost'=>'',
        'postcategory'=>''
    	);
    	
    	$title = $instance[ 'title' ];
    	$numofpost = $instance[ 'numofpost' ];
    	$postcategory = $instance[ 'postcategory' ];

    	 ?>

    	<p>
        	<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br/>
        	<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" >
    	</p>
    	<p>
        	<label for="<?php echo $this->get_field_id( 'numofpost' ); ?>">Number Of Posts:</label>
        	<br/>
            <input type="text" id="<?php echo $this->get_field_id( 'numofpost' ); ?>" name="<?php echo $this->get_field_name( 'numofpost' ); ?>" value="<?php echo esc_attr( $numofpost ); ?>" >
    	</p>
    	<p>
        	<label for="<?php echo $this->get_field_id( 'postcategory' ); ?>">Post Category:</label><br/>
        	<select id="<?php echo $this->get_field_id( 'postcategory' ); ?>" name="<?php echo $this->get_field_name( 'postcategory' ); ?>">
        		<?php   
                $args = array();
                $categories = get_categories( $args );

                echo '<option '.$selected.' value="0">All</option>';

				  foreach ( $categories as $category ) :
                    $stored_category_id = esc_attr($postcategory);
                    $selected = ( $stored_category_id ==  $category->term_id  ) ? 'selected' : '';
				    echo '<option '.$selected.' value="' . $category->term_id . '">' . $category->name . '</option>';

				  endforeach;
				  ?>
        	</select>

    	</p>
   <?php
    	
    }

    function update( $new_instance, $old_instance ) {

	    $instance = $old_instance;
	    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	    $instance[ 'numofpost' ] = strip_tags( $new_instance[ 'numofpost' ] );
	    $instance[ 'postcategory' ] = strip_tags( $new_instance[ 'postcategory' ] );


	    return $instance;
    }
       

    function widget( $args, $instance ) {
        
    	$args = array(
        'posts_per_page'   => $instance[ 'numofpost' ],
       	'post_type'        => 'post',
        'taxonomy'  => 'category',
        'orderby' => 'rand',
       	'category'	=>	$instance[ 'postcategory' ],
        'post_status'      => 'publish',
        'suppress_filters' => true
        
   		 );
    	
        $posts_array = get_posts( $args );

    	if($posts_array){
            if(isset($instance[ 'title' ])){
             echo '<h2>'.$instance[ 'title' ].'</h2>';
            }
    		foreach ( $posts_array as $post ){ 
                
                echo '
		    		
		        <div class="randompostplugin" >
		            <a href="'.get_post_permalink( $post->ID ).'">
		                <h4>'.get_the_title($post->ID).'</h4> ';
		                echo get_the_post_thumbnail( $post->ID , "thumbnail");
		                echo '<p>'.substr(strip_tags($post->post_content),0,50).'...</p>
		            </a>
		        </div>
		        ';
    		}
    		wp_reset_postdata();
        }
        else{
            echo "No post Found";
            
        }

    }//end of widget func
} //end of class




// Register Widget
function randompostplugin_widget($atts) {
 
	
    register_widget( 'RandomPostPlugin_Widget' );
 
}

add_action( 'widgets_init', 'randompostplugin_widget' );
//end of register widget




//shortcode
function randompostplugin_widget_shortcode($atts) {
    
    global $wp_widget_factory;

    $title = isset( $atts['title'] )? $atts['title'] : '';
    $num = isset( $atts['num'] )? $atts['num'] : '1';

    $atts = array(
            'title'=>$title,
            'numofpost'=>$num
        );
    
    $widget_name = 'RandomPostPlugin_Widget';
    
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-randompostplugin_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('randomposts','randompostplugin_widget_shortcode');
//end of shortcode




 ?>