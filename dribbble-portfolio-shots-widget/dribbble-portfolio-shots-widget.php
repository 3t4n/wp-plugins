<?php
/**
 * @package dribbble-portfolio-shots-widget
*/
/*
Plugin Name: Dribbble Portfolio Shots Widget
Plugin URI: http://www.ramit-designs.com
Description: Dribbble Portfolio Shots Widget - Showcase your best design work you shared on your dribbble profile on your website also.
Version: 1.0
Author: Matt Armstrong
Author URI: http://www.ramit-designs.com
*/

class DribbblePortfolioShotsWidget extends WP_Widget{
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles_dribbble_portfolio_shots_widget' ) );
        $params = array(
            'description' => 'Dribbble Portfolio Shots Widget - Showcase your portfolio',
            'name' => 'Dribbble Portfolio Shots Widget'
        );
        parent::__construct('DribbblePortfolioShotsWidget','',$params);
    }
    function register_plugin_styles_dribbble_portfolio_shots_widget() {
        wp_register_style( 'dribbble_portfolio_shots_widget_flexboxgrid', plugins_url( 'assets/flexboxgrid.min.css' , __FILE__ ) );
        wp_register_style( 'dribbble_portfolio_shots_widget_style', plugins_url( 'assets/style.css' , __FILE__ ) );
        wp_register_script('dribbble_portfolio_shots_widget_jquery', '//code.jquery.com/jquery-latest.min.js');
        wp_register_script('dribbble_portfolio_shots_widget_dribbblejs', plugins_url('assets/dribbble.js', __FILE__));
        wp_enqueue_style( 'dribbble_portfolio_shots_widget_flexboxgrid' );
        wp_enqueue_style( 'dribbble_portfolio_shots_widget_style' );
        wp_enqueue_script('dribbble_portfolio_shots_widget_jquery');
        wp_enqueue_script('dribbble_portfolio_shots_widget_dribbblejs');
 }
    public function form($instance) {
        extract($instance);
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Dribbble Portfolio Shots Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('id');?>">Dribbble Username: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('id');?>"
	name="<?php echo $this->get_field_name('id');?>"
    value="<?php echo !empty($id) ? $id : "dribbble"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'column' ); ?>">No. of Columns: </label> 
    <select id="<?php echo $this->get_field_id( 'column' ); ?>"
        name="<?php echo $this->get_field_name( 'column' ); ?>"
        class="widefat" style="width:100%;">
            <option value="2" <?php if ($column == '2') echo 'selected="2"'; ?> >2</option>
            <option value="4" <?php if ($column == '4') echo 'selected="4"'; ?> >4</option>
            <option value="6" <?php if ($column == '6') echo 'selected="6"'; ?> >6</option>
    </select>
</p>
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
		if(empty($title)) $title = "Dribbble Portfolio Shots Widget";
        if(empty($id)) $id = "dribbble";
        if(empty($column)) $column = "2";
        $data = "";
        $data .= "
            <div class='dribble_box'>
                <div class='row center dribbble-shots'>
                </div>
            </div>";
        $data .= "
            <script>
                 var playerId = '$id';
                 var column = '$column';
                 get_dribbble(playerId,column);
            </script>
       ";
	   $data .= "<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.empirepromos.com/' title='click here' target='_blank'>Promotional Products</a></div>";
        echo $before_widget;
        echo $before_title . $title . $after_title;
            echo $data;
        echo $after_widget;
    }
}
//start registering the extension
add_action('widgets_init','register_DribbblePortfolioShotsWidget');
function register_DribbblePortfolioShotsWidget(){
    register_widget('DribbblePortfolioShotsWidget');
}