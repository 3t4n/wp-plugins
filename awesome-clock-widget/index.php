<?php 
/*
Plugin Name:Awesome Clock Widget
Description: This Plugin displays a digital clock as Widget or Shortcode. (Automatically detects local timezone, choose your color and time format)
Version:2.0
Author: Raihanul Islam
Author URI:http://raihanislamcse.me 
*/

class WorldClock_Widget extends WP_Widget {
     
    private $WorldClockColor;
    private $WorldClockFormat;

    function __construct() {
        parent::__construct(
         
            // base ID of the widget
            'worldclock_widget',
             
            // name of the widget
            __('Awesome Clock Widget', 'WorldClock' ),
             
            // widget options
            array (
                'description' => __( 'Widget to display local time', 'WorldClock' )
            )
             
        );

        //Settings default values
        $this->WorldClockColor = "black";
        $this->WorldClockFormat = "12";
    }
     
    function form( $instance ) {

        if (empty($instance)) {
                $instance['WorldClockColor'] = $this->WorldClockColor;
                $instance['WorldClockFormat'] = $this->WorldClockFormat;
            }

        echo '
        <div style="padding:5px;">
        <label style="width: 60px;float: left;height: 30px;line-height: 30px;">Color:</label>
        <select name="'.$this->get_field_name("WorldClockColor").'" id="'.$this->get_field_id("WorldClockColor").'">
            <option '.(($instance['WorldClockColor'] == "black")?'selected':'').' value="black">Black</option>
            <option '.(($instance['WorldClockColor'] == "grey")?'selected':'').' value="grey">Grey</option>
            <option '.(($instance['WorldClockColor'] == "brown")?'selected':'').' value="brown">Brown</option>
            <option '.(($instance['WorldClockColor'] == "red")?'selected':'').' value="red">Red</option>
            <option '.(($instance['WorldClockColor'] == "green")?'selected':'').' value="green">Green</option>
            <option '.(($instance['WorldClockColor'] == "light-green")?'selected':'').' value="light-green">Light Green</option>
            <option '.(($instance['WorldClockColor'] == "blue")?'selected':'').' value="blue">Blue</option>
            <option '.(($instance['WorldClockColor'] == "light-blue")?'selected':'').' value="light-blue">Light Blue</option>
            <option '.(($instance['WorldClockColor'] == "orange")?'selected':'').' value="orange">Orange</option>
            <option '.(($instance['WorldClockColor'] == "purple")?'selected':'').' value="purple">Purple</option>
            <option '.(($instance['WorldClockColor'] == "white")?'selected':'').' value="white">White</option>
        </select>
        </div>
        <div style="padding:5px;">
        <label style="width: 60px;float: left;height: 30px;line-height: 30px;">Format:</label>
        <select name="'.$this->get_field_name("WorldClockFormat").'" id="'.$this->get_field_id("WorldClockFormat").'">
            <option '.(($instance['WorldClockFormat'] == "hhmmssdA")?'selected':'').' value="hhmmssdA">12 Hours</option>
            <option '.(($instance['WorldClockFormat'] == "HHmmssd")?'selected':'').' value="HHmmssd">24 Hours</option>
        </select>
        </div>
        ';  
                
    }
     
    function widget( $args, $instance ) {
        
        wp_enqueue_script( 'world-clock-moment', plugins_url('js/moment.js',__FILE__), array('jquery'), false, true);
        wp_enqueue_script( 'world-clock-moment-timezone', plugins_url('js/moment-timezone-with-data.min.js',__FILE__), array('jquery'), false, true);
        wp_enqueue_script( 'world-clock-script', plugins_url('js/script.js',__FILE__), array('jquery','world-clock-moment','world-clock-moment-timezone'), false, true);
        
        wp_enqueue_style( 'world-clock-style', plugins_url('css/style.css',__FILE__));
        
        echo '
        <div id="world_clock_widget" class="'.$instance['WorldClockColor'].'">
         <a href="http://worldclockplugin.com">
            <div class="display">
                <div class="digits">
                </div>
        <span class="ampm"></span>
            </div>
            </a>
        </div>
        ';

        echo '<script type="text/javascript">
            var wc_format = "'.$instance['WorldClockFormat'].'";
        </script>';
    }
     
}

function world_clock_widget() {
 
    register_widget( 'WorldClock_Widget' );
 
}

add_action( 'widgets_init', 'world_clock_widget' );



function world_clock_widget_shortcode($atts) {
    
    global $wp_widget_factory;
    
    // extract(shortcode_atts(array(
    //     'widget_name' => FALSE
    // ), $atts));
    
    $widget_name = 'WorldClock_Widget';
    // $widget_name = wp_specialchars($widget_name);
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, array(), array('widget_id'=>'arbitrary-instance-swedishword_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('Awesome_clock','world_clock_widget_shortcode'); 
?>